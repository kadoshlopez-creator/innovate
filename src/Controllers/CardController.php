<?php

namespace App\Controllers;

use App\Models\Service;
use App\Models\Setting;

class CardController extends Controller
{
    public function index(): void
    {
        $services = Service::active();
        $settings = Setting::all();

        // Convert settings to a simple key-value array for easy access
        $config = [];
        foreach ($settings as $s) {
            $config[$s['key']] = $s['value'];
        }

        // We use a specific layout or 'none' since it's a standalone card page
        $this->view('card/index', [
            'title'    => 'Innovate — Enlaces',
            'services' => $services,
            'config'   => $config
        ], 'none');
    }
}
