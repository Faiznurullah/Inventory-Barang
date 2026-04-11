<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence;

use App\Domain\Repository\AdminRepositoryInterface;
use PDO;

final class PdoAdminRepository implements AdminRepositoryInterface
{
    public function __construct(private PDO $pdo)
    {
    }

    public function findByCredentials(string $username, string $passwordMd5): ?array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM admin WHERE username = :username AND password = :password LIMIT 1');
        $stmt->execute(['username' => $username, 'password' => $passwordMd5]);
        $row = $stmt->fetch();

        return $row ?: null;
    }

    public function first(): ?array
    {
        $stmt = $this->pdo->query('SELECT * FROM admin ORDER BY id ASC LIMIT 1');
        $row = $stmt->fetch();

        return $row ?: null;
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM admin WHERE id = :id LIMIT 1');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();

        return $row ?: null;
    }

    public function updatePassword(string $username, string $newPasswordMd5): bool
    {
        $stmt = $this->pdo->prepare('UPDATE admin SET password = :password WHERE username = :username');
        return $stmt->execute(['password' => $newPasswordMd5, 'username' => $username]);
    }
}
