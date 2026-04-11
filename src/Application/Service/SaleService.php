<?php

declare(strict_types=1);

namespace App\Application\Service;

use App\Domain\Repository\ProductRepositoryInterface;
use App\Domain\Repository\SaleRepositoryInterface;
use PDO;

final class SaleService
{
    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private SaleRepositoryInterface $saleRepository,
        private PDO $pdo
    ) {
    }

    public function create(array $payload): string
    {
        $date = (string) ($payload['tanggal'] ?? '');
        $productName = trim((string) ($payload['jenis'] ?? ''));
        $qty = (int) ($payload['jumlah'] ?? 0);

        if ($date === '' || $productName === '' || $qty <= 0) {
            return 'Memasukan Penjualan Gagal';
        }

        $product = $this->productRepository->findByName($productName);
        if ($product === null) {
            return 'Memasukan Penjualan Gagal';
        }

        $stock = (int) $product['JumlahB'];
        $left = $stock - $qty;
        if ($left < 0) {
            return 'Memasukan Penjualan Gagal';
        }

        $totalPrice = ((int) $product['hargaJ']) * $qty;

        try {
            $this->pdo->beginTransaction();
            $okSale = $this->saleRepository->create([
                'tanggal' => $date,
                'namabarang' => $productName,
                'hargaU' => $totalPrice,
                'JumlahB' => $qty,
            ]);

            $okProduct = $this->productRepository->update((int) $product['id'], [
                'nama' => $product['nama'],
                'jenis' => $product['jenis'],
                'suplier' => $product['suplier'],
                'hargaU' => (int) $product['hargaU'],
                'hargaJ' => (int) $product['hargaJ'],
                'JumlahB' => $left,
            ]);

            if (!$okSale || !$okProduct) {
                throw new \RuntimeException('transaction failed');
            }

            $this->pdo->commit();
            return 'Memasukan Penjualan Berhasil';
        } catch (\Throwable $throwable) {
            if ($this->pdo->inTransaction()) {
                $this->pdo->rollBack();
            }
            return 'Memasukan Penjualan Gagal';
        }
    }

    public function update(int $id, array $payload): bool
    {
        $productName = trim((string) ($payload['jenis'] ?? ''));
        $qty = (int) ($payload['jumlah'] ?? 0);
        $date = (string) ($payload['tanggal'] ?? '');

        if ($id <= 0 || $productName === '' || $qty <= 0 || $date === '') {
            return false;
        }

        $product = $this->productRepository->findByName($productName);
        if ($product === null) {
            return false;
        }

        $total = ((int) $product['hargaJ']) * $qty;

        return $this->saleRepository->update($id, [
            'tanggal' => $date,
            'namabarang' => $productName,
            'hargaU' => $total,
            'JumlahB' => $qty,
        ]);
    }
}
