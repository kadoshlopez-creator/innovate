<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Core\Auth;
use App\Core\Session;
use App\Models\Setting;
use App\Models\User;

class SettingsController extends Controller
{
    public function index(): void
    {
        $this->requireAdmin();

        $this->view('admin/settings/index', [
            'title'    => 'Configuración',
            'settings' => [
                'general' => Setting::getGroup('general'),
                'contact' => Setting::getGroup('contact'),
                'social'  => Setting::getGroup('social'),
            ],
        ], 'admin');
    }

    public function update(): void
    {
        $this->requireAdmin();
        $this->validateCSRF();

        $keys = [
            'site_name', 'site_tagline', 'site_description',
            'contact_email', 'contact_phone', 'contact_address',
            'social_facebook', 'social_instagram', 'social_linkedin', 'social_twitter',
        ];

        $data = [];
        foreach ($keys as $key) {
            $data[$key] = trim($this->request->post($key, ''));
        }

        Setting::setMany($data);

        // Optional: change admin password
        $newPassword = trim($this->request->post('new_password', ''));
        if ($newPassword) {
            if (strlen($newPassword) < 8) {
                Session::flash('error', 'La contraseña debe tener al menos 8 caracteres.');
                $this->redirect('/admin/configuracion');
            }
            User::updatePassword((int) Auth::id(), $newPassword);
        }

        Session::flash('success', 'Configuración guardada exitosamente.');
        $this->redirect('/admin/configuracion');
    }
}
