<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Core\CSRF;
use App\Core\Request;
use App\Core\Session;
use App\Core\View;

abstract class Controller
{
    protected Request $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    protected function view(string $view, array $data = [], string $layout = 'main'): void
    {
        View::render($view, $data, $layout);
    }

    protected function redirect(string $url): never
    {
        header("Location: {$url}");
        exit;
    }

    protected function back(): never
    {
        $referer = $_SERVER['HTTP_REFERER'] ?? '/';
        $this->redirect($referer);
    }

    protected function validateCSRF(): void
    {
        if (!CSRF::verify()) {
            Session::flash('error', 'Token de seguridad inválido. Intenta de nuevo.');
            $this->back();
        }
    }

    protected function requireAdmin(): void
    {
        Auth::requireAuth();
    }

    /**
     * Require authenticated user to have a specific role.
     * Usage: $this->requireRole('admin');
     */
    protected function requireRole(string $role): void
    {
        Auth::requireRole($role);
    }

    protected function json(array $data, int $status = 200): never
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    /** Simple single-field validation: returns error string or empty string */
    protected function validateRequired(array $fields, array $post): array
    {
        $errors = [];
        foreach ($fields as $field => $label) {
            if (empty(trim($post[$field] ?? ''))) {
                $errors[] = "{$label} es requerido.";
            }
        }
        return $errors;
    }
}
