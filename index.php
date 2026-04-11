<?php

declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';

$router = require __DIR__ . '/src/routes.php';
$router->dispatch($_SERVER['REQUEST_METHOD'] ?? 'GET', $_GET['r'] ?? 'dashboard');
