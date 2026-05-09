<?php

namespace App\Core;

class CSRF
{
    public static function token(): string
    {
        if (!Session::has('csrf_token')) {
            Session::set('csrf_token', bin2hex(random_bytes(32)));
        }
        return Session::get('csrf_token');
    }

    public static function verify(): bool
    {
        $submitted = $_POST['_csrf'] ?? '';
        $stored    = Session::get('csrf_token', '');
        return $stored !== '' && hash_equals($stored, $submitted);
    }

    public static function field(): string
    {
        return '<input type="hidden" name="_csrf" value="' . self::token() . '">';
    }
}
