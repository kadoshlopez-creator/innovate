<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Core\Session;
use App\Models\Service;

class ServicesController extends Controller
{
    public function index(): void
    {
        $this->requireAdmin();

        $this->view('admin/services/index', [
            'title'    => 'Servicios',
            'services' => Service::all('order_index', 'ASC'),
        ], 'admin');
    }

    public function create(): void
    {
        $this->requireAdmin();

        $this->view('admin/services/form', [
            'title'   => 'Nuevo Servicio',
            'service' => null,
            'action'  => '/admin/servicios',
        ], 'admin');
    }

    public function store(): void
    {
        $this->requireAdmin();
        $this->validateCSRF();

        $data = $this->extractData();

        if (!$data['title']) {
            Session::flash('error', 'El título es requerido.');
            $this->redirect('/admin/servicios/crear');
        }

        if (!$data['slug']) {
            $data['slug'] = Service::generateSlug($data['title']);
        }

        Service::create($data);
        Session::flash('success', 'Servicio creado exitosamente.');
        $this->redirect('/admin/servicios');
    }

    public function edit(string $id): void
    {
        $this->requireAdmin();

        $service = Service::find((int) $id);
        if (!$service) {
            Session::flash('error', 'Servicio no encontrado.');
            $this->redirect('/admin/servicios');
        }

        $this->view('admin/services/form', [
            'title'   => 'Editar Servicio',
            'service' => $service,
            'action'  => "/admin/servicios/{$id}",
        ], 'admin');
    }

    public function update(string $id): void
    {
        $this->requireAdmin();
        $this->validateCSRF();

        $service = Service::find((int) $id);
        if (!$service) {
            Session::flash('error', 'Servicio no encontrado.');
            $this->redirect('/admin/servicios');
        }

        $data = $this->extractData();

        if (!$data['title']) {
            Session::flash('error', 'El título es requerido.');
            $this->redirect("/admin/servicios/{$id}/editar");
        }

        if (!$data['slug']) {
            $data['slug'] = Service::generateSlug($data['title']);
        }

        Service::update((int) $id, $data);
        Session::flash('success', 'Servicio actualizado exitosamente.');
        $this->redirect('/admin/servicios');
    }

    public function destroy(string $id): void
    {
        $this->requireRole('admin'); // only 'admin' role can delete
        $this->validateCSRF();

        Service::delete((int) $id);
        Session::flash('success', 'Servicio eliminado.');
        $this->redirect('/admin/servicios');
    }

    private function extractData(): array
    {
        return [
            'title'             => trim($this->request->post('title', '')),
            'title_en'          => trim($this->request->post('title_en', '')),
            'slug'              => trim($this->request->post('slug', '')),
            'icon'              => trim($this->request->post('icon', 'fas fa-cogs')),
            'short_description' => trim($this->request->post('short_description', '')),
            'short_description_en' => trim($this->request->post('short_description_en', '')),
            'description'       => trim($this->request->post('description', '')),
            'description_en'    => trim($this->request->post('description_en', '')),
            'active'            => (int) $this->request->post('active', 1),
            'order_index'       => (int) $this->request->post('order_index', 0),
        ];
    }
}
