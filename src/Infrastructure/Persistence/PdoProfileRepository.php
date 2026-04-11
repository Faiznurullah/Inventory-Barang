<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence;

use App\Domain\Repository\ProfileRepositoryInterface;
use PDO;

final class PdoProfileRepository implements ProfileRepositoryInterface
{
    public function __construct(private PDO $pdo)
    {
    }

    public function first(): ?array
    {
        $stmt = $this->pdo->query('SELECT * FROM about ORDER BY id ASC LIMIT 1');
        $row = $stmt->fetch();

        return $row ?: null;
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM about WHERE id = :id LIMIT 1');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();

        return $row ?: null;
    }

    public function update(int $id, string $name, string $photo): bool
    {
        $stmt = $this->pdo->prepare('UPDATE about SET nama = :name, foto = :photo WHERE id = :id');
        return $stmt->execute(['id' => $id, 'name' => $name, 'photo' => $photo]);
    }
}
