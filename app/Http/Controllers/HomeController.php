<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    private const BLOG_CACHE_KEY = 'mutlusan-blog-posts';

    public function index()
    {
        $posts = $this->getMutlusanBlogPosts();

        return view('home', compact('posts'));
    }

    /**
     * post.mutlusan.com.tr (WordPress) sitesinden son haberleri kendi API'sinden çeker.
     *
     *  - Başarılı sonuç 15 dakika cache'lenir; yeni bir yazı en geç 15 dakika içinde ana sayfada görünür.
     *  - Son başarılı sonuç ayrıca "yedek" olarak saklanır. Blog sitesi yavaşlar ya da çökerse
     *    ziyaretçilere boş bölüm yerine bu yedek gösterilir.
     *  - Başarısızlık sadece 1 dakika cache'lenir; blog düzelince hızla toparlanır.
     *  - Bekleme süresi 2 saniye ile sınırlı; blog sitesi yüzünden ana sayfa uzun süre donmaz.
     */
    private function getMutlusanBlogPosts(int $count = 3): array
    {
        $cached = Cache::get(self::BLOG_CACHE_KEY);
        if ($cached !== null) {
            return $cached;
        }

        $posts = $this->fetchBlogPosts($count);

        if ($posts === null) {
            $lastGood = Cache::get(self::BLOG_CACHE_KEY.':last-good', []);
            Cache::put(self::BLOG_CACHE_KEY, $lastGood, now()->addMinute());

            return $lastGood;
        }

        Cache::put(self::BLOG_CACHE_KEY, $posts, now()->addMinutes(15));
        Cache::forever(self::BLOG_CACHE_KEY.':last-good', $posts);

        return $posts;
    }

    /** Blog yazılarını çeker; blog sitesine ulaşılamazsa null döner. */
    private function fetchBlogPosts(int $count): ?array
    {
        try {
            $response = Http::connectTimeout(2)->timeout(2)->get('https://post.mutlusan.com.tr/wp-json/wp/v2/posts', [
                'per_page' => $count,
                '_embed' => 1, // öne çıkan görseli de beraberinde getirir
            ]);

            if (! $response->successful()) {
                return null;
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
            Log::warning('Mutlusan blog API çekilemedi: '.$e->getMessage());

            return null;
        }
    }
}
