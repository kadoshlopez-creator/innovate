<?php

namespace App\Controllers;

class LangController extends Controller
{
    public function switch(string $code): void
    {
        if (in_array($code, ['es', 'en', 'zh'])) {
            $_SESSION['lang'] = $code;
        }
        
        $referer = $_SERVER['HTTP_REFERER'] ?? '/';
        header("Location: $referer");
        exit;
    }
}
