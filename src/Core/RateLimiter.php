<?php

namespace App\Core;

/**
 * Simple session-based rate limiter.
 *
 * Tracks attempts per key (e.g. "login:127.0.0.1") within a time window.
 * No external dependencies — uses PHP sessions.
 *
 * Usage:
 *   if (RateLimiter::tooManyAttempts('login:' . $ip, 5, 300)) {
 *       // blocked — too many attempts in 5-minute window
 *   }
 *   RateLimiter::hit('login:' . $ip);
 *   RateLimiter::clear('login:' . $ip); // on success
 */
class RateLimiter
{
    private const SESSION_KEY = '_rate_limits';

    /**
     * Check if the key has exceeded the allowed attempts within the decay window.
     *
     * @param string $key      Unique identifier (e.g. "login:127.0.0.1")
     * @param int    $maxAttempts
     * @param int    $decaySeconds  Window duration in seconds
     */
    public static function tooManyAttempts(string $key, int $maxAttempts, int $decaySeconds = 60): bool
    {
        self::prune($key, $decaySeconds);
        $hits = self::getHits($key, $decaySeconds);
        return count($hits) >= $maxAttempts;
    }

    /**
     * Record an attempt for the given key.
     */
    public static function hit(string $key): void
    {
        $data = $_SESSION[self::SESSION_KEY][$key] ?? [];
        $data[] = time();
        $_SESSION[self::SESSION_KEY][$key] = $data;
    }

    /**
     * Clear all attempts for the given key (e.g. on successful login).
     */
    public static function clear(string $key): void
    {
        unset($_SESSION[self::SESSION_KEY][$key]);
    }

    /**
     * Seconds remaining until the oldest attempt expires (i.e. cooldown left).
     * Returns 0 if not currently limited.
     */
    public static function availableIn(string $key, int $decaySeconds): int
    {
        $hits = self::getHits($key, $decaySeconds);
        if (empty($hits)) {
            return 0;
        }
        $oldest = min($hits);
        $remaining = ($oldest + $decaySeconds) - time();
        return max(0, $remaining);
    }

    // ── Private helpers ──────────────────────────────────────────────────────

    private static function getHits(string $key, int $decaySeconds): array
    {
        $all      = $_SESSION[self::SESSION_KEY][$key] ?? [];
        $cutoff   = time() - $decaySeconds;
        return array_filter($all, fn(int $t) => $t > $cutoff);
    }

    private static function prune(string $key, int $decaySeconds): void
    {
        $hits = self::getHits($key, $decaySeconds);
        if (empty($hits)) {
            unset($_SESSION[self::SESSION_KEY][$key]);
        } else {
            $_SESSION[self::SESSION_KEY][$key] = array_values($hits);
        }
    }
}
