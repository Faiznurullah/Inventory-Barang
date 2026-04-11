<?php

declare(strict_types=1);

namespace App\Core;

final class Config
{
    public static function db(): array
    {
        return [
            'host' => '127.0.0.1',
            'port' => 3306,
            'dbname' => 'databarang',
            'user' => 'root',
            'pass' => '',
            'charset' => 'utf8mb4',
        ];
    }

    public static function baseAssetPath(): string
    {
        return 'Admin';
    }
}
