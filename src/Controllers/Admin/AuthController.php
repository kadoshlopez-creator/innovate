<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Core\Auth;
use App\Core\RateLimiter;
use App\Core\Session;
use App\Models\User;

class AuthController extends Controller
{
    /** Max failed login attempts before lockout */
    private const MAX_ATTEMPTS   = 5;
    /** Lockout window in seconds (5 minutes) */
    private const DECAY_SECONDS  = 300;

    public function index(): void
    {
        $this->redirect(Auth::check() ? '/admin/dashboard' : '/admin/login');
    }

    public function loginForm(): void
    {
        if (Auth::check()) {
            $this->redirect('/admin/dashboard');
        }
        $this->view('admin/login', ['title' => 'Iniciar Sesión'], 'none');
    }

    public function login(): void
    {
        $this->validateCSRF();

        $ip  = $this->request->ip();
        $key = 'login:' . $ip;

        // ── Rate limit check ─────────────────────────────────────────────────
        if (RateLimiter::tooManyAttempts($key, self::MAX_ATTEMPTS, self::DECAY_SECONDS)) {
            $wait = RateLimiter::availableIn($key, self::DECAY_SECONDS);
            Session::flash('error', "Demasiados intentos fallidos. Intenta de nuevo en {$wait} segundos.");
            $this->redirect('/admin/login');
        }

        $email    = trim($this->request->post('email', ''));
        $password = $this->request->post('password', '');

        if (!$email || !$password) {
            RateLimiter::hit($key);
            Session::flash('error', 'Email y contraseña son requeridos.');
            $this->redirect('/admin/login');
        }

        $user = User::findByEmail($email);

        if (!$user || !User::verifyPassword($user, $password)) {
            RateLimiter::hit($key);
            $remaining = self::MAX_ATTEMPTS - count(array_filter(
                $_SESSION['_rate_limits'][$key] ?? [],
                fn($t) => $t > time() - self::DECAY_SECONDS
            ));
            $msg = 'Credenciales incorrectas.';
            if ($remaining > 0) {
                $msg .= " Te quedan {$remaining} intento(s) antes del bloqueo temporal.";
            }
            Session::flash('error', $msg);
            $this->redirect('/admin/login');
        }

        // ── Success: clear rate limit and start session ───────────────────────
        RateLimiter::clear($key);
        Session::regenerate();
        Auth::login($user);
        $this->redirect('/admin/dashboard');
    }

    public function logout(): void
    {
        Auth::logout();
        $this->redirect('/admin/login');
    }
}
