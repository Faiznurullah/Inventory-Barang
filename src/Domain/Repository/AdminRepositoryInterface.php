<?php

declare(strict_types=1);

namespace App\Domain\Repository;

interface AdminRepositoryInterface
{
    public function findByCredentials(string $username, string $passwordMd5): ?array;
    public function first(): ?array;
    public function findById(int $id): ?array;
    public function updatePassword(string $username, string $newPasswordMd5): bool;
}
