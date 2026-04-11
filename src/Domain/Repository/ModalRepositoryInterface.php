<?php

declare(strict_types=1);

namespace App\Domain\Repository;

interface ModalRepositoryInterface
{
    public function create(int $amount): bool;
    public function sum(): int;
}
