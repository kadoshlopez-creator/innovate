<?php

namespace App\Controllers;

use App\Core\RateLimiter;
use App\Core\Session;
use App\Models\Contact;
use App\Models\Service;

class ContactController extends Controller
{
    /** Max contact form submissions per IP in the decay window */
    private const MAX_ATTEMPTS  = 10;
    private const DECAY_SECONDS = 600; // 10 minutes

    public function index(): void
    {
        $this->view('contact', [
            'title'    => 'Contacto',
            'services' => Service::active(),
        ]);
    }

    public function store(): void
    {
        $this->validateCSRF();

        $ip  = $this->request->ip();
        $key = 'contact:' . $ip;

        // ── Rate limit ────────────────────────────────────────────────────────
        if (RateLimiter::tooManyAttempts($key, self::MAX_ATTEMPTS, self::DECAY_SECONDS)) {
            $wait = RateLimiter::availableIn($key, self::DECAY_SECONDS);
            Session::flash('error', "Has enviado demasiados mensajes. Intenta de nuevo en {$wait} segundos.");
            $this->redirect('/contacto');
        }

        $post = $this->request->postAll();

        $name    = trim($post['name']    ?? '');
        $email   = trim($post['email']   ?? '');
        $phone   = trim($post['phone']   ?? '');
        $company = trim($post['company'] ?? '');
        $service = trim($post['service'] ?? '');
        $message = trim($post['message'] ?? '');

        // ── Validation ────────────────────────────────────────────────────────
        $errors = [];

        if (!$name) {
            $errors[] = 'El nombre es requerido.';
        } elseif (mb_strlen($name) > 100) {
            $errors[] = 'El nombre no puede superar los 100 caracteres.';
        }

        if (!$email) {
            $errors[] = 'El email es requerido.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'El email no tiene un formato válido.';
        } elseif (mb_strlen($email) > 150) {
            $errors[] = 'El email no puede superar los 150 caracteres.';
        }

        if ($phone && mb_strlen($phone) > 30) {
            $errors[] = 'El teléfono no puede superar los 30 caracteres.';
        }

        if ($company && mb_strlen($company) > 100) {
            $errors[] = 'El nombre de empresa no puede superar los 100 caracteres.';
        }

        if (!$message) {
            $errors[] = 'El mensaje es requerido.';
        } elseif (mb_strlen($message) < 10) {
            $errors[] = 'El mensaje debe tener al menos 10 caracteres.';
        } elseif (mb_strlen($message) > 5000) {
            $errors[] = 'El mensaje no puede superar los 5.000 caracteres.';
        }

        if ($errors) {
            Session::flash('error', implode(' ', $errors));
            Session::flashOldInput($post);
            $this->redirect('/contacto');
            return;
        }

        // ── Persist & rate-limit hit ──────────────────────────────────────────
        RateLimiter::hit($key);
        Contact::create(compact('name', 'email', 'phone', 'company', 'service', 'message'));

        Session::flash('success', '¡Mensaje enviado! Nos pondremos en contacto pronto.');
        $this->redirect('/contacto');
    }
}
