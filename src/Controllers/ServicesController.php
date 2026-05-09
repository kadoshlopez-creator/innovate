<?php

namespace App\Controllers;

use App\Models\Service;

class ServicesController extends Controller
{
    public function index(): void
    {
        $this->view('services', [
            'title'    => 'Servicios',
            'services' => Service::active(),
        ]);
    }

    public function show(string $slug): void
    {
        $service = Service::findBySlug($slug);

        if (!$service || !(bool) $service['active']) {
            http_response_code(404);
            $this->view('404', ['title' => 'Servicio no encontrado']);
            return;
        }

        $this->view('service-detail', [
            'title'   => $service['title'],
            'service' => $service,
            'others'  => array_filter(
                Service::active(),
                fn($s) => $s['id'] !== $service['id']
            ),
        ]);
    }
}
