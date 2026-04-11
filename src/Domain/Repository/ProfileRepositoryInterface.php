<?php

declare(strict_types=1);

namespace App\Domain\Repository;

interface ProfileRepositoryInterface
{
    public function first(): ?array;
    public function findById(int $id): ?array;
    public function update(int $id, string $name, string $photo): bool;
}
