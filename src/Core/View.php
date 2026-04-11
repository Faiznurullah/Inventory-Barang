<?php

declare(strict_types=1);

namespace App\Core;

final class View
{
    public static function render(string $view, array $data = []): void
    {
        extract($data, EXTR_SKIP);
        $file = __DIR__ . '/../Presentation/View/' . $view . '.php';

        if (!file_exists($file)) {
            http_response_code(500);
            echo 'View tidak ditemukan: ' . htmlspecialchars($view);
            exit;
        }

        require $file;
    }
}
