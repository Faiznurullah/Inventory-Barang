<?php

declare(strict_types=1);

namespace App\Presentation\Controller;

use App\Application\Service\AuthService;
use App\Core\Auth;
use App\Core\Session;

final class AuthController extends BaseController
{
    public function __construct(private AuthService $authService)
    {
    }

    public function loginForm(): void
    {
        if (Auth::check()) {
            $this->redirect('dashboard');
        }

        $this->view('auth/login');
    }

    public function loginProcess(): void
    {
        $username = (string) ($_POST['username'] ?? '');
        $password = (string) ($_POST['password'] ?? '');

        $user = $this->authService->login($username, $password);
        if ($user === null) {
            Session::flash('error', 'Gagal Masuk Sebagai Admin');
            $this->redirect('login');
        }

        Auth::login((string) $user['password']);
        $this->redirect('dashboard');
    }

    public function logout(): void
    {
        Auth::logout();
        $this->redirect('login');
    }
}
