<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence;

use App\Domain\Repository\ModalRepositoryInterface;
use PDO;

final class PdoModalRepository implements ModalRepositoryInterface
{
    public function __construct(private PDO $pdo)
    {
    }

    public function create(int $amount): bool
    {
        $stmt = $this->pdo->prepare('INSERT INTO modal (jumlah_modal) VALUES (:amount)');
        return $stmt->execute(['amount' => (string) $amount]);
    }

    public function sum(): int
    {
        $stmt = $this->pdo->query('SELECT COALESCE(SUM(jumlah_modal), 0) AS total FROM modal');
        $row = $stmt->fetch();

        return (int) ($row['total'] ?? 0);
    }
}
