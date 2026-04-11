<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence;

use App\Domain\Repository\ProductRepositoryInterface;
use PDO;

final class PdoProductRepository implements ProductRepositoryInterface
{
    public function __construct(private PDO $pdo)
    {
    }

    public function existsDuplicate(string $name, string $type, string $supplier): bool
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) AS total FROM masuk WHERE nama = :name AND jenis = :type AND suplier = :supplier');
        $stmt->execute(['name' => $name, 'type' => $type, 'supplier' => $supplier]);
        $row = $stmt->fetch();

        return ((int) ($row['total'] ?? 0)) > 0;
    }

    public function create(array $payload): bool
    {
        $stmt = $this->pdo->prepare('INSERT INTO masuk (nama, jenis, suplier, hargaU, hargaJ, JumlahB) VALUES (:nama, :jenis, :suplier, :hargaU, :hargaJ, :jumlah)');
        return $stmt->execute([
            'nama' => $payload['nama'],
            'jenis' => $payload['jenis'],
            'suplier' => $payload['suplier'],
            'hargaU' => (string) $payload['hargaU'],
            'hargaJ' => (string) $payload['hargaJ'],
            'jumlah' => (string) $payload['JumlahB'],
        ]);
    }

    public function count(): int
    {
        $stmt = $this->pdo->query('SELECT COUNT(*) AS total FROM masuk');
        $row = $stmt->fetch();

        return (int) ($row['total'] ?? 0);
    }

    public function sumQty(): int
    {
        $stmt = $this->pdo->query('SELECT COALESCE(SUM(JumlahB), 0) AS total FROM masuk');
        $row = $stmt->fetch();

        return (int) ($row['total'] ?? 0);
    }

    public function paginate(int $limit, int $offset, ?string $search = null): array
    {
        if ($search !== null && $search !== '') {
            $stmt = $this->pdo->prepare('SELECT * FROM masuk WHERE id LIKE :search OR nama LIKE :search OR jenis LIKE :search ORDER BY id DESC');
            $stmt->execute(['search' => '%' . $search . '%']);
            return $stmt->fetchAll();
        }

        $stmt = $this->pdo->prepare('SELECT * FROM masuk ORDER BY id DESC LIMIT :offset, :limit');
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM masuk WHERE id = :id LIMIT 1');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();

        return $row ?: null;
    }

    public function findByName(string $name): ?array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM masuk WHERE nama = :nama LIMIT 1');
        $stmt->execute(['nama' => $name]);
        $row = $stmt->fetch();

        return $row ?: null;
    }

    public function update(int $id, array $payload): bool
    {
        $stmt = $this->pdo->prepare('UPDATE masuk SET nama = :nama, jenis = :jenis, suplier = :suplier, hargaU = :hargaU, hargaJ = :hargaJ, JumlahB = :jumlah WHERE id = :id');
        return $stmt->execute([
            'id' => $id,
            'nama' => $payload['nama'],
            'jenis' => $payload['jenis'],
            'suplier' => $payload['suplier'],
            'hargaU' => (string) $payload['hargaU'],
            'hargaJ' => (string) $payload['hargaJ'],
            'jumlah' => (string) $payload['JumlahB'],
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare('DELETE FROM masuk WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }

    public function deleteAllWithModal(): bool
    {
        try {
            $this->pdo->beginTransaction();
            $this->pdo->exec('DELETE FROM masuk');
            $this->pdo->exec('DELETE FROM modal');
            $this->pdo->exec('ALTER TABLE masuk AUTO_INCREMENT = 1');
            $this->pdo->exec('ALTER TABLE modal AUTO_INCREMENT = 1');
            $this->pdo->commit();
            return true;
        } catch (\Throwable $throwable) {
            if ($this->pdo->inTransaction()) {
                $this->pdo->rollBack();
            }
            return false;
        }
    }
}
