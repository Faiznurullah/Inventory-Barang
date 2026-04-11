<?php

declare(strict_types=1);

namespace App\Application\Service;

use App\Domain\Repository\AdminRepositoryInterface;

final class PasswordService
{
    public function __construct(private AdminRepositoryInterface $adminRepository)
    {
    }

    public function change(string $username, string $oldPassword, string $newPassword, string $repeatPassword): string
    {
        $user = $this->adminRepository->findByCredentials($username, md5($oldPassword));
        if ($user === null) {
            return 'gagal';
        }

        if ($newPassword !== $repeatPassword) {
            return 'tdksama';
        }

        $ok = $this->adminRepository->updatePassword($username, md5($newPassword));
        return $ok ? 'oke' : 'gagal';
    }
}
