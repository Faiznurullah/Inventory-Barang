<?php

declare(strict_types=1);

namespace App\Application\Service;

use App\Domain\Repository\AdminRepositoryInterface;
use App\Domain\Repository\ProfileRepositoryInterface;

final class ContextService
{
    public function __construct(
        private ProfileRepositoryInterface $profileRepository,
        private AdminRepositoryInterface $adminRepository
    ) {
    }

    public function topbar(): array
    {
        return [
            'profile' => $this->profileRepository->first() ?? ['id' => 0, 'nama' => 'Admin', 'foto' => 'admin.png'],
            'admin' => $this->adminRepository->first() ?? ['id' => 0],
        ];
    }
}
