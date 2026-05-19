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
            'title'    => __('nav.contact', 'Contacto'),
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
            Session::flash('error', __('contact.error.rate_limit', 'Has enviado demasiados mensajes. Intenta de nuevo en :seconds segundos.', ['seconds' => $wait]));
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
            $errors[] = __('contact.validation.name_required', 'El nombre es requerido.');
        } elseif (mb_strlen($name) > 100) {
            $errors[] = __('contact.validation.name_max', 'El nombre no puede superar los 100 caracteres.');
        }

        if (!$email) {
            $errors[] = __('contact.validation.email_required', 'El email es requerido.');
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = __('contact.validation.email_invalid', 'El email no tiene un formato válido.');
        } elseif (mb_strlen($email) > 150) {
            $errors[] = __('contact.validation.email_max', 'El email no puede superar los 150 caracteres.');
        }

        if ($phone && mb_strlen($phone) > 30) {
            $errors[] = __('contact.validation.phone_max', 'El teléfono no puede superar los 30 caracteres.');
        }

        if ($company && mb_strlen($company) > 100) {
            $errors[] = __('contact.validation.company_max', 'El nombre de empresa no puede superar los 100 caracteres.');
        }

        if (!$message) {
            $errors[] = __('contact.validation.message_required', 'El mensaje es requerido.');
        } elseif (mb_strlen($message) < 10) {
            $errors[] = __('contact.validation.message_min', 'El mensaje debe tener al menos 10 caracteres.');
        } elseif (mb_strlen($message) > 5000) {
            $errors[] = __('contact.validation.message_max', 'El mensaje no puede superar los 5.000 caracteres.');
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

        Session::flash('success', __('contact.success', '¡Mensaje enviado! Nos pondremos en contacto pronto.'));
        $this->redirect('/contacto');
    }
}
