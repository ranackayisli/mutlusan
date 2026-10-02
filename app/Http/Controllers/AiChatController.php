<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Sağ alttaki yapay zekâ asistanının sunucu tarafı.
 *
 * Tarayıcı bu sınıfa (kendi sitemize) soru gönderir; biz de Mutlusan AI servisine ileteriz.
 * Böylece iç ağ adresi ziyaretçilere görünmez, CORS / HTTPS sorunu çıkmaz,
 * kullanım sınırı (rate limit) koyabiliriz ve servis çökerse düzgün bir mesaj döndürürüz.
 *
 * Servis adresi .env dosyasındaki MUTLUSAN_AI_URL değerinden okunur.
 */
class AiChatController extends Controller
{
    private const INTENTS = ['PRODUCT_SEARCH', 'DOCUMENT_SEARCH', 'PRODUCT_COMPARE', 'PROJECT_SOLUTION', 'GENERAL'];

    public function query(Request $request): JsonResponse
    {
        $data = $request->validate([
            'query' => ['required', 'string', 'min:2', 'max:2000'],
            'language' => ['required', 'in:tr,en'],
            'sessionId' => ['nullable', 'string', 'max:100', 'regex:/^[A-Za-z0-9._-]+$/'],
        ]);

        $baseUrl = rtrim((string) config('services.mutlusan_ai.url'), '/');

        if ($baseUrl === '') {
            // Servis adresi tanımlı değil: sadece yerel geliştirmede demo cevap ver
            return app()->environment('local') ? $this->demoResponse($data) : $this->unavailable();
        }

        try {
            $response = Http::acceptJson()
                ->connectTimeout(5)
                ->timeout((int) config('services.mutlusan_ai.timeout', 25))
                ->post($baseUrl.'/query', [
                    'query' => $data['query'],
                    'language' => $data['language'],
                    'sessionId' => $data['sessionId'] ?? null,
                ]);
        } catch (\Throwable $e) {
            Log::warning('Mutlusan AI servisine ulaşılamadı: '.$e->getMessage());

            return $this->unavailable();
        }

        if (! $response->successful()) {
            Log::warning('Mutlusan AI servisi hata döndürdü: HTTP '.$response->status());

            return $this->unavailable();
        }

        return response()->json($this->sanitize((array) $response->json()));
    }

    /** Servisin cevabından sadece bilinen alanları ve beklenen tipleri geçirir; iç detaylar sızmaz. */
    private function sanitize(array $payload): array
    {
        return [
            'answer' => is_string($payload['answer'] ?? null) ? $payload['answer'] : '',
            'intent' => in_array($payload['intent'] ?? null, self::INTENTS, true) ? $payload['intent'] : 'GENERAL',
            'products' => $this->cards($payload['products'] ?? [], ['id', 'code', 'name', 'image', 'url', 'attributes']),
            'documents' => $this->cards($payload['documents'] ?? [], ['title', 'page', 'url', 'type']),
            'suggestions' => collect($payload['suggestions'] ?? [])
                ->filter(fn ($item) => is_string($item) && $item !== '')
                ->map(fn ($item) => mb_substr($item, 0, 120))
                ->take(6)
                ->values()
                ->all(),
        ];
    }

    private function cards(mixed $items, array $allowedKeys): array
    {
        return collect(is_array($items) ? $items : [])
            ->filter('is_array')
            ->map(fn ($item) => Arr::only($item, $allowedKeys))
            ->take(6)
            ->values()
            ->all();
    }

    private function unavailable(): JsonResponse
    {
        return response()->json(['message' => 'AI service unavailable'], 503);
    }

    /** Yerel geliştirmede, gerçek servis bağlanana kadar arayüzü denemek için. */
    private function demoResponse(array $data): JsonResponse
    {
        $answer = $data['language'] === 'tr'
            ? "**Demo modu:** Mutlusan AI servisi henüz bağlı değil.\n\nServis bağlandığında \"{$data['query']}\" sorunuzun cevabı burada görünecek."
            : "**Demo mode:** the Mutlusan AI service is not connected yet.\n\nOnce it is, the answer to \"{$data['query']}\" will appear here.";

        return response()->json([
            'answer' => $answer,
            'intent' => 'GENERAL',
            'products' => [],
            'documents' => [],
            'suggestions' => $data['language'] === 'tr'
                ? ['Ürün ailelerini göster', 'Doküman talep et']
                : ['Show product families', 'Request documents'],
            'demo' => true,
        ]);
    }
}
