<?php

declare(strict_types=1);

namespace App\Domain\Repository;

interface SaleRepositoryInterface
{
    public function create(array $payload): bool;
    public function count(): int;
    public function paginate(int $limit, int $offset): array;
    public function findById(int $id): ?array;
    public function update(int $id, array $payload): bool;
    public function delete(int $id): bool;
    public function deleteAll(): bool;
    public function sumRevenue(): int;
    public function allForExport(): array;
}
