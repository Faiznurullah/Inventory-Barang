<?php

declare(strict_types=1);

namespace App\Presentation\Controller;

use App\Application\Service\ContextService;
use App\Application\Service\PasswordService;
use App\Domain\Repository\AdminRepositoryInterface;
use App\Core\Auth;
use App\Core\Session;

final class PasswordController extends BaseController
{
    public function __construct(
        private AdminRepositoryInterface $adminRepository,
        private PasswordService $passwordService,
        private ContextService $contextService
    ) {
    }

    public function form(): void
    {
        Auth::requireAuth();

        $id = (int) ($_GET['id'] ?? 0);
        $adminTarget = $this->adminRepository->findById($id);
        $ctx = $this->contextService->topbar();

        $this->view('profile/password', [
            'adminTarget' => $adminTarget,
            'profile' => $ctx['profile'],
            'admin' => $ctx['admin'],
        ]);
    }

    public function update(): void
    {
        Auth::requireAuth();

        $username = (string) ($_POST['username'] ?? '');
        $status = $this->passwordService->change(
            $username,
            (string) ($_POST['pertama'] ?? ''),
            (string) ($_POST['kedua'] ?? ''),
            (string) ($_POST['ketiga'] ?? '')
        );

        if ($status === 'oke') {
            Session::flash('success', 'Mengganti Password Sukses');
        } elseif ($status === 'tdksama') {
            Session::flash('warning', 'Password Yang Anda Masukan Tidak Sama');
        } else {
            Session::flash('error', 'Gagal Mengganti Password');
        }

        $this->redirect('password&id=' . (int) ($_GET['id'] ?? 0));
    }
}
