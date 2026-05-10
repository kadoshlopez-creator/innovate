<?php

if (!function_exists('__')) {
    function __(string $key, $defaultOrReplace = null, array $replace = []): string
    {
        static $translations = null;

        if ($translations === null) {
            $lang = $_SESSION['lang'] ?? 'es';
            $path = dirname(dirname(__DIR__)) . "/languages/{$lang}.php";
            
            if (file_exists($path)) {
                $translations = require $path;
            } else {
                $translations = [];
            }
        }

        // Determine if second arg is default string or replace array
        $default = is_string($defaultOrReplace) ? $defaultOrReplace : $key;
        if (is_array($defaultOrReplace)) {
            $replace = $defaultOrReplace;
        }

        $translation = $translations[$key] ?? $default;

        foreach ($replace as $k => $v) {
            $translation = str_replace(":{$k}", $v, $translation);
        }

        return $translation;
    }
}

if (!function_exists('current_lang')) {
    function current_lang(): string
    {
        return $_SESSION['lang'] ?? 'es';
    }
}
