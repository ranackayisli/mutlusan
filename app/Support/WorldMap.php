<?php

namespace App\Support;

/**
 * Ana sayfadaki "Global Reach" haritası için enlem/boylam → harita koordinatı dönüşümü.
 *
 * Harita arka planı (public/images/world-dots.svg) scripts/generate-world-dots.mjs ile üretilir.
 * Buradaki sabitler o betikle AYNI olmak zorunda; biri değişirse diğeri de değişmeli,
 * yoksa şehir işaretleri haritada yanlış yerde durur.
 */
final class WorldMap
{
    public const WIDTH = 1000;

    private const LON_MIN = -25.0;
    private const LON_MAX = 125.0;
    private const LAT_MIN = 8.0;
    private const LAT_MAX = 62.0;

    /** Haritanın yüksekliği (viewBox birimi). */
    public static function height(): int
    {
        return (int) round((self::millerY(self::LAT_MAX) - self::millerY(self::LAT_MIN)) * self::scale());
    }

    /**
     * @return array{0: float, 1: float} [x, y] viewBox koordinatı
     */
    public static function project(float $lat, float $lon): array
    {
        $x = ($lon - self::LON_MIN) / (self::LON_MAX - self::LON_MIN) * self::WIDTH;
        $y = (self::millerY(self::LAT_MAX) - self::millerY($lat)) * self::scale();

        return [round($x, 1), round($y, 1)];
    }

    /**
     * İki nokta arasında yukarı doğru kavisli bir SVG yolu (kuadratik eğri) çizer.
     *
     * @param  array{0: float, 1: float}  $from
     * @param  array{0: float, 1: float}  $to
     */
    public static function arc(array $from, array $to, float $lift = 0.28): string
    {
        $midX = ($from[0] + $to[0]) / 2;
        $midY = ($from[1] + $to[1]) / 2;
        $distance = hypot($to[0] - $from[0], $to[1] - $from[1]);
        $controlY = $midY - $distance * $lift;

        return sprintf('M%s %s Q%s %s %s %s', $from[0], $from[1], round($midX, 1), round($controlY, 1), $to[0], $to[1]);
    }

    /** Miller projeksiyonu: yatay doğrusal, kutuplarda Mercator kadar gerilmez. */
    private static function millerY(float $latDeg): float
    {
        return 1.25 * log(tan(M_PI / 4 + 0.4 * deg2rad($latDeg)));
    }

    private static function scale(): float
    {
        return self::WIDTH / deg2rad(self::LON_MAX - self::LON_MIN);
    }
}
