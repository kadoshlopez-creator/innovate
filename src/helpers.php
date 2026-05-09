<?php

if (!function_exists('e')) {
    /** Escape HTML for safe output */
    function e(?string $value): string
    {
        return htmlspecialchars($value ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}

if (!function_exists('url')) {
    /** Build a URL using APP_URL */
    function url(string $path = ''): string
    {
        $base = rtrim($_ENV['APP_URL'] ?? '', '/');
        return $base . '/' . ltrim($path, '/');
    }
}

if (!function_exists('asset')) {
    /** URL to a public asset */
    function asset(string $path): string
    {
        return url('assets/' . ltrim($path, '/'));
    }
}

if (!function_exists('old')) {
    /** Retrieve old POST input from session flash */
    function old(string $key, string $default = ''): string
    {
        $old = $_SESSION['_old_input'] ?? [];
        return e($old[$key] ?? $default);
    }
}

if (!function_exists('csrf_field')) {
    function csrf_field(): string
    {
        return \App\Core\CSRF::field();
    }
}

if (!function_exists('nl2p')) {
    /** Convert newlines to <p> tags */
    function nl2p(string $text): string
    {
        $paragraphs = array_filter(array_map('trim', explode("\n\n", $text)));
        return implode('', array_map(fn($p) => '<p>' . nl2br(e($p)) . '</p>', $paragraphs));
    }
}
