<?php

declare(strict_types=1);

namespace App\Application\Service;

use App\Domain\Repository\ModalRepositoryInterface;
use App\Domain\Repository\ProductRepositoryInterface;
use App\Domain\Repository\SaleRepositoryInterface;

final class DashboardService
{
    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private ModalRepositoryInterface $modalRepository,
        private SaleRepositoryInterface $saleRepository
    ) {
    }

    public function summary(): array
    {
        return [
            'modal_total' => $this->modalRepository->sum(),
            'revenue_total' => $this->saleRepository->sumRevenue(),
            'stock_count' => $this->productRepository->count(),
            'item_count' => $this->productRepository->sumQty(),
        ];
    }
}
