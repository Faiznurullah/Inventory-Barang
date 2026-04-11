<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence;

use App\Domain\Repository\SaleRepositoryInterface;
use PDO;

final class PdoSaleRepository implements SaleRepositoryInterface
{
    public function __construct(private PDO $pdo)
    {
    }

    public function create(array $payload): bool
    {
        $stmt = $this->pdo->prepare('INSERT INTO keluar (tanggal, namabarang, hargaU, JumlahB) VALUES (:tanggal, :nama, :harga, :jumlah)');
        return $stmt->execute([
            'tanggal' => $payload['tanggal'],
            'nama' => $payload['namabarang'],
            'harga' => (string) $payload['hargaU'],
            'jumlah' => (string) $payload['JumlahB'],
        ]);
    }

    public function count(): int
    {
        $stmt = $this->pdo->query('SELECT COUNT(*) AS total FROM keluar');
        $row = $stmt->fetch();

        return (int) ($row['total'] ?? 0);
    }

    public function paginate(int $limit, int $offset): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM keluar ORDER BY id DESC LIMIT :offset, :limit');
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM keluar WHERE id = :id LIMIT 1');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();

        return $row ?: null;
    }

    public function update(int $id, array $payload): bool
    {
        $stmt = $this->pdo->prepare('UPDATE keluar SET tanggal = :tanggal, namabarang = :nama, hargaU = :harga, JumlahB = :jumlah WHERE id = :id');
        return $stmt->execute([
            'id' => $id,
            'tanggal' => $payload['tanggal'],
            'nama' => $payload['namabarang'],
            'harga' => (string) $payload['hargaU'],
            'jumlah' => (string) $payload['JumlahB'],
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare('DELETE FROM keluar WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }

    public function deleteAll(): bool
    {
        try {
            $this->pdo->beginTransaction();
            $this->pdo->exec('DELETE FROM keluar');
            $this->pdo->exec('ALTER TABLE keluar AUTO_INCREMENT = 1');
            $this->pdo->commit();
            return true;
        } catch (\Throwable $throwable) {
            if ($this->pdo->inTransaction()) {
                $this->pdo->rollBack();
            }
            return false;
        }
    }

    public function sumRevenue(): int
    {
        $stmt = $this->pdo->query('SELECT COALESCE(SUM(hargaU), 0) AS total FROM keluar');
        $row = $stmt->fetch();

        return (int) ($row['total'] ?? 0);
    }

    public function allForExport(): array
    {
        $sql = 'SELECT k.id, k.tanggal, k.namabarang, k.JumlahB, k.hargaU, COALESCE(m.hargaJ, 0) AS hargaJ
                FROM keluar k
                LEFT JOIN masuk m ON m.nama = k.namabarang
                ORDER BY k.id ASC';
        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll();
    }
}
