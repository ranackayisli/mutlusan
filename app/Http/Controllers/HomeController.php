<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $posts = $this->getMutlusanBlogPosts();

        return view('home', compact('posts'));
    }

    /**
     * post.mutlusan.com.tr (WordPress) sitesinden son haberleri
     * kendi API'sinden canlı çeker. 15 dakika cache'lenir, yani
     * yeni bir yazı yayınlandığında en geç 15 dakika içinde
     * otomatik olarak ana sayfada görünür - manuel işlem gerekmez.
     */
    private function getMutlusanBlogPosts(int $count = 3): array
    {
        return Cache::remember('mutlusan-blog-posts', now()->addMinutes(15), function () use ($count) {
            try {
                $response = Http::timeout(5)->get('https://post.mutlusan.com.tr/wp-json/wp/v2/posts', [
                    'per_page' => $count,
                    '_embed' => 1, // öne çıkan görseli de beraberinde getirir
                ]);

                if (! $response->successful()) {
                    return [];
                }

                return collect($response->json())->map(function ($post) {
                    $image = $post['_embedded']['wp:featuredmedia'][0]['source_url'] ?? null;

                    return [
                        'title' => html_entity_decode(strip_tags($post['title']['rendered'] ?? '')),
                        'excerpt' => trim(html_entity_decode(strip_tags($post['excerpt']['rendered'] ?? ''))),
                        'link' => $post['link'] ?? 'https://post.mutlusan.com.tr',
                        'image' => $image,
                        'date' => isset($post['date']) ? \Carbon\Carbon::parse($post['date'])->translatedFormat('d F Y') : null,
                    ];
                })->toArray();
            } catch (\Throwable $e) {
                // Blog sitesine erişilemezse ana sayfa yine de çalışmaya devam etsin
                Log::warning('Mutlusan blog API çekilemedi: '.$e->getMessage());

                return [];
            }
        });
    }
}
