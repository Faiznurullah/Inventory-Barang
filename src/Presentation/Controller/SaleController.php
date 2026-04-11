<?php

declare(strict_types=1);

namespace App\Presentation\Controller;

use App\Application\Service\ContextService;
use App\Application\Service\SaleService;
use App\Domain\Repository\ProductRepositoryInterface;
use App\Domain\Repository\SaleRepositoryInterface;
use App\Core\Auth;
use App\Core\Session;

final class SaleController extends BaseController
{
    public function __construct(
        private SaleRepositoryInterface $saleRepository,
        private ProductRepositoryInterface $productRepository,
        private SaleService $saleService,
        private ContextService $contextService
    ) {
    }

    public function index(): void
    {
        Auth::requireAuth();

        $page = max(1, (int) ($_GET['page'] ?? 1));
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $sales = $this->saleRepository->paginate($limit, $offset);
        $count = $this->saleRepository->count();
        $products = $this->productRepository->paginate(1000, 0);
        $ctx = $this->contextService->topbar();

        $this->view('sale/index', [
            'sales' => $sales,
            'products' => $products,
            'page' => $page,
            'pages' => max(1, (int) ceil($count / $limit)),
            'profile' => $ctx['profile'],
            'admin' => $ctx['admin'],
        ]);
    }

    public function create(): void
    {
        Auth::requireAuth();

        $message = $this->saleService->create($_POST);
        if (str_contains($message, 'Berhasil')) {
            Session::flash('success', $message);
        } else {
            Session::flash('error', $message);
        }

        $this->redirect('sales');
    }

    public function editForm(): void
    {
        Auth::requireAuth();

        $id = (int) ($_GET['id'] ?? 0);
        $sale = $this->saleRepository->findById($id);
        $products = $this->productRepository->paginate(1000, 0);
        $ctx = $this->contextService->topbar();

        $this->view('sale/edit', [
            'sale' => $sale,
            'products' => $products,
            'profile' => $ctx['profile'],
            'admin' => $ctx['admin'],
        ]);
    }

    public function editProcess(): void
    {
        Auth::requireAuth();

        $id = (int) ($_GET['id'] ?? 0);
        $ok = $this->saleService->update($id, $_POST);

        Session::flash($ok ? 'success' : 'error', $ok ? 'Mengedit Data Sukses' : 'Mengedit Data Gagal');
        $this->redirect('sales');
    }

    public function delete(): void
    {
        Auth::requireAuth();

        $id = (int) ($_GET['id'] ?? 0);
        $this->saleRepository->delete($id);
        Session::flash('success', 'Menghapus Data Sukses');
        $this->redirect('sales');
    }

    public function deleteAll(): void
    {
        Auth::requireAuth();

        $ok = $this->saleRepository->deleteAll();
        Session::flash($ok ? 'success' : 'error', $ok ? 'Hapus Semua Data Berhasil' : 'Hapus Semua Data Gagal');
        $this->redirect('sales');
    }
}
