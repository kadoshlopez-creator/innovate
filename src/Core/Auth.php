<?php

namespace App\Core;

class Auth
{
    public static function login(array $user): void
    {
        Session::set('auth_id',    (int) $user['id']);
        Session::set('auth_name',  $user['name']);
        Session::set('auth_email', $user['email']);
        Session::set('auth_role',  $user['role']);
    }

    public static function logout(): void
    {
        Session::forget('auth_id');
        Session::forget('auth_name');
        Session::forget('auth_email');
        Session::forget('auth_role');
    }

    public static function check(): bool
    {
        return Session::has('auth_id');
    }

    public static function user(): ?array
    {
        if (!self::check()) {
            return null;
        }
        return [
            'id'    => Session::get('auth_id'),
            'name'  => Session::get('auth_name'),
            'email' => Session::get('auth_email'),
            'role'  => Session::get('auth_role'),
        ];
    }

    public static function id(): ?int
    {
        return Session::get('auth_id');
    }

    public static function role(): ?string
    {
        return Session::get('auth_role');
    }

    public static function is(string $role): bool
    {
        return self::role() === $role;
    }

    /** Redirect to login if not authenticated */
    public static function requireAuth(): void
    {
        if (!self::check()) {
            header('Location: /admin/login');
            exit;
        }
    }

    /**
     * Require a specific role. Must be called after requireAuth().
     * Redirects to /admin/dashboard with an error flash if the role doesn't match.
     *
     * @param string $role  e.g. 'admin'
     */
    public static function requireRole(string $role): void
    {
        self::requireAuth();
        if (self::role() !== $role) {
            Session::flash('error', 'No tienes permisos para realizar esta acción.');
            header('Location: /admin/dashboard');
            exit;
        }
    }
}
