<?php

declare(strict_types=1);

namespace App\Application\Service;

use App\Domain\Repository\AdminRepositoryInterface;

final class AuthService
{
    public function __construct(private AdminRepositoryInterface $adminRepository)
    {
    }

    public function login(string $username, string $password): ?array
    {
        return $this->adminRepository->findByCredentials(trim($username), md5($password));
    }
}
