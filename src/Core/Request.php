<?php

namespace App\Core;

class Request
{
    public function method(): string
    {
        return strtoupper($_SERVER['REQUEST_METHOD']);
    }

    public function path(): string
    {
        $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
        $uri = rtrim($uri, '/');
        return $uri === '' ? '/' : $uri;
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return $_GET[$key] ?? $default;
    }

    public function post(string $key, mixed $default = null): mixed
    {
        return $_POST[$key] ?? $default;
    }

    public function postAll(): array
    {
        return $_POST;
    }

    public function file(string $key): ?array
    {
        $file = $_FILES[$key] ?? null;
        return ($file && $file['error'] !== UPLOAD_ERR_NO_FILE) ? $file : null;
    }

    public function isPost(): bool
    {
        return $this->method() === 'POST';
    }

    public function ip(): string
    {
        // Only trust X-Forwarded-For when running behind a trusted proxy (TRUST_PROXY=true in .env)
        if (($_ENV['TRUST_PROXY'] ?? 'false') === 'true') {
            $forwarded = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? '';
            if ($forwarded !== '') {
                // X-Forwarded-For can be a comma-separated list; take the first (client) IP
                $ip = trim(explode(',', $forwarded)[0]);
                if (filter_var($ip, FILTER_VALIDATE_IP)) {
                    return $ip;
                }
            }
        }
        return $_SERVER['REMOTE_ADDR'] ?? '';
    }
}
