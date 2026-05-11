<?php

namespace App\Core;

class Session
{
    public static function start(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            // ── Session Security Hardening ──────────────────────────────────
            $isSecure = ($_ENV['APP_ENV'] ?? 'local') === 'production';
            
            session_set_cookie_params([
                'lifetime' => 0, // session cookie
                'path'     => '/',
                'domain'   => '',
                'secure'   => $isSecure,
                'httponly' => true,
                'samesite' => 'Lax'
            ]);

            session_name('innovate_session');
            session_start();
        }
    }

    /** Regenerate session ID to prevent session fixation */
    public static function regenerate(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_regenerate_id(true);
        }
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return $_SESSION[$key] ?? $default;
    }

    public static function set(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function forget(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public static function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    /** Store a value that is consumed on the next request */
    public static function flash(string $key, mixed $value): void
    {
        $_SESSION['_flash'][$key] = $value;
    }

    /** Retrieve and remove a flash value */
    public static function getFlash(string $key, mixed $default = null): mixed
    {
        $value = $_SESSION['_flash'][$key] ?? $default;
        unset($_SESSION['_flash'][$key]);
        return $value;
    }

    /** Persist old form input for repopulation after validation failure */
    public static function flashOldInput(array $input): void
    {
        $_SESSION['_old_input'] = $input;
    }

    public static function clearOldInput(): void
    {
        unset($_SESSION['_old_input']);
    }

    public static function destroy(): void
    {
        session_unset();
        session_destroy();
    }
}
