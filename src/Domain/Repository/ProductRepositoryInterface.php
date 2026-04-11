<?php

declare(strict_types=1);

namespace App\Domain\Repository;

interface ProductRepositoryInterface
{
    public function existsDuplicate(string $name, string $type, string $supplier): bool;
    public function create(array $payload): bool;
    public function count(): int;
    public function sumQty(): int;
    public function paginate(int $limit, int $offset, ?string $search = null): array;
    public function findById(int $id): ?array;
    public function findByName(string $name): ?array;
    public function update(int $id, array $payload): bool;
    public function delete(int $id): bool;
    public function deleteAllWithModal(): bool;
}
