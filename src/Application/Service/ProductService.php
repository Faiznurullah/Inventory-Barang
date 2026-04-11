<?php

declare(strict_types=1);

namespace App\Application\Service;

use App\Domain\Repository\ModalRepositoryInterface;
use App\Domain\Repository\ProductRepositoryInterface;

final class ProductService
{
    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private ModalRepositoryInterface $modalRepository
    ) {
    }

    public function create(array $payload): string
    {
        $name = trim((string) ($payload['nama_b'] ?? ''));
        $type = trim((string) ($payload['jenis'] ?? ''));
        $supplier = trim((string) ($payload['suplier'] ?? ''));
        $cost = (int) ($payload['modal'] ?? 0);
        $sell = (int) ($payload['jual'] ?? 0);
        $qty = (int) ($payload['jumlah'] ?? 0);

        if ($name === '' || $type === '' || $supplier === '' || $cost <= 0 || $sell <= 0 || $qty <= 0) {
            return 'Data tidak valid.';
        }

        if ($this->productRepository->existsDuplicate($name, $type, $supplier)) {
            return 'Data Yang Anda Kirim Sudah Tersedia';
        }

        $created = $this->productRepository->create([
            'nama' => $name,
            'jenis' => $type,
            'suplier' => $supplier,
            'hargaU' => $cost,
            'hargaJ' => $sell,
            'JumlahB' => $qty,
        ]);

        if (!$created) {
            return 'Menambakan Data Gagal';
        }

        $this->modalRepository->create($cost * $qty);

        return 'Menambakan Data Sukses';
    }
}
