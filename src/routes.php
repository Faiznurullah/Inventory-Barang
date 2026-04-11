<?php

declare(strict_types=1);

use App\Application\Service\AuthService;
use App\Application\Service\ContextService;
use App\Application\Service\DashboardService;
use App\Application\Service\PasswordService;
use App\Application\Service\ProductService;
use App\Application\Service\SaleService;
use App\Application\Service\SettingService;
use App\Core\Database;
use App\Core\Router;
use App\Infrastructure\Persistence\PdoAdminRepository;
use App\Infrastructure\Persistence\PdoModalRepository;
use App\Infrastructure\Persistence\PdoProductRepository;
use App\Infrastructure\Persistence\PdoProfileRepository;
use App\Infrastructure\Persistence\PdoSaleRepository;
use App\Presentation\Controller\AuthController;
use App\Presentation\Controller\DashboardController;
use App\Presentation\Controller\PasswordController;
use App\Presentation\Controller\ProductController;
use App\Presentation\Controller\ProfileController;
use App\Presentation\Controller\ReportController;
use App\Presentation\Controller\SaleController;
use App\Presentation\Controller\SettingController;

$pdo = Database::connection();

$adminRepo = new PdoAdminRepository($pdo);
$profileRepo = new PdoProfileRepository($pdo);
$productRepo = new PdoProductRepository($pdo);
$modalRepo = new PdoModalRepository($pdo);
$saleRepo = new PdoSaleRepository($pdo);

$authService = new AuthService($adminRepo);
$dashboardService = new DashboardService($productRepo, $modalRepo, $saleRepo);
$productService = new ProductService($productRepo, $modalRepo);
$saleService = new SaleService($productRepo, $saleRepo, $pdo);
$passwordService = new PasswordService($adminRepo);
$settingService = new SettingService($profileRepo);
$contextService = new ContextService($profileRepo, $adminRepo);

$authController = new AuthController($authService);
$dashboardController = new DashboardController($dashboardService, $contextService);
$productController = new ProductController($productRepo, $productService, $modalRepo, $saleRepo, $contextService);
$saleController = new SaleController($saleRepo, $productRepo, $saleService, $contextService);
$profileController = new ProfileController($profileRepo, $contextService);
$settingController = new SettingController($profileRepo, $settingService, $contextService);
$passwordController = new PasswordController($adminRepo, $passwordService, $contextService);
$reportController = new ReportController($saleRepo);

$router = new Router();

$router->add('GET', 'login', static fn() => $authController->loginForm());
$router->add('POST', 'auth-login', static fn() => $authController->loginProcess());
$router->add('GET', 'logout', static fn() => $authController->logout());

$router->add('GET', 'dashboard', static fn() => $dashboardController->index());

$router->add('GET', 'products', static fn() => $productController->index());
$router->add('POST', 'products-create', static fn() => $productController->create());
$router->add('GET', 'products-detail', static fn() => $productController->detail());
$router->add('GET', 'products-edit', static fn() => $productController->editForm());
$router->add('POST', 'products-edit', static fn() => $productController->editProcess());
$router->add('GET', 'products-delete', static fn() => $productController->delete());
$router->add('GET', 'products-delete-all', static fn() => $productController->deleteAll());

$router->add('GET', 'sales', static fn() => $saleController->index());
$router->add('POST', 'sales-create', static fn() => $saleController->create());
$router->add('GET', 'sales-edit', static fn() => $saleController->editForm());
$router->add('POST', 'sales-edit', static fn() => $saleController->editProcess());
$router->add('GET', 'sales-delete', static fn() => $saleController->delete());
$router->add('GET', 'sales-delete-all', static fn() => $saleController->deleteAll());

$router->add('GET', 'profile', static fn() => $profileController->index());
$router->add('GET', 'settings', static fn() => $settingController->form());
$router->add('POST', 'settings', static fn() => $settingController->update());
$router->add('GET', 'password', static fn() => $passwordController->form());
$router->add('POST', 'password', static fn() => $passwordController->update());

$router->add('GET', 'report-excel', static fn() => $reportController->excel());

return $router;
