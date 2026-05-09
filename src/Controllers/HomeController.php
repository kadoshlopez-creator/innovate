<?php

namespace App\Controllers;

use App\Models\Service;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index(): void
    {
        $services = Service::active();
        $siteName = Setting::get('site_name', 'Innovate');

        $this->view('home', [
            'title'     => $siteName,
            'services'  => $services,
            'site_name' => $siteName,
            'site_desc' => Setting::get('site_description', 'Soluciones Tecnológicas de Vanguardia'),
        ]);
    }
}
