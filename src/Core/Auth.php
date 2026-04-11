<?php

declare(strict_types=1);

namespace App\Core;

final class Auth
{
    public static function check(): bool
    {
        return (string) \App\Core\Session::get('auth_password', '') !== '';
    }

    public static function requireAuth(): void
    {
        if (!self::check()) {
            header('Location: index.php?r=login');
            exit;
        }
    }

    public static function login(string $passwordHash): void
    {
        \App\Core\Session::set('auth_password', $passwordHash);
    }

    public static function logout(): void
    {
        \App\Core\Session::destroy();
    }
}
