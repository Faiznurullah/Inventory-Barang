<?php

declare(strict_types=1);

namespace App\Presentation\Controller;

use App\Application\Service\ContextService;
use App\Application\Service\ProductService;
use App\Domain\Repository\ModalRepositoryInterface;
use App\Domain\Repository\ProductRepositoryInterface;
use App\Domain\Repository\SaleRepositoryInterface;
use App\Core\Auth;
use App\Core\Session;

final class ProductController extends BaseController
{
    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private ProductService $productService,
        private ModalRepositoryInterface $modalRepository,
        private SaleRepositoryInterface $saleRepository,
        private ContextService $contextService
    ) {
    }

    public function index(): void
    {
        Auth::requireAuth();

        $page = max(1, (int) ($_GET['page'] ?? 1));
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $search = isset($_GET['cari']) ? trim((string) $_GET['cari']) : null;

        $products = $this->productRepository->paginate($limit, $offset, $search);
        $count = $this->productRepository->count();
        $ctx = $this->contextService->topbar();

        $this->view('product/index', [
            'products' => $products,
            'search' => $search,
            'summary' => [
                'modal_total' => $this->modalRepository->sum(),
                'stock_count' => $count,
                'item_count' => $this->productRepository->sumQty(),
                'revenue_total' => $this->saleRepository->sumRevenue(),
            ],
            'page' => $page,
            'pages' => max(1, (int) ceil($count / $limit)),
            'profile' => $ctx['profile'],
            'admin' => $ctx['admin'],
        ]);
    }

    public function create(): void
    {
        Auth::requireAuth();

        $message = $this->productService->create($_POST);
        if (str_contains($message, 'Sukses')) {
            Session::flash('success', $message);
        } elseif (str_contains($message, 'Sudah Tersedia')) {
            Session::flash('warning', $message);
        } else {
            Session::flash('error', $message);
        }

        $this->redirect('products');
    }

    public function detail(): void
    {
        Auth::requireAuth();

        $id = (int) ($_GET['id'] ?? 0);
        $product = $this->productRepository->findById($id);
        $ctx = $this->contextService->topbar();

        $this->view('product/detail', [
            'product' => $product,
            'profile' => $ctx['profile'],
            'admin' => $ctx['admin'],
        ]);
    }

    public function editForm(): void
    {
        Auth::requireAuth();

        $id = (int) ($_GET['id'] ?? 0);
        $product = $this->productRepository->findById($id);
        $ctx = $this->contextService->topbar();

        $this->view('product/edit', [
            'product' => $product,
            'profile' => $ctx['profile'],
            'admin' => $ctx['admin'],
        ]);
    }

    public function editProcess(): void
    {
        Auth::requireAuth();

        $id = (int) ($_GET['id'] ?? 0);
        $ok = $this->productRepository->update($id, [
            'nama' => trim((string) ($_POST['nama'] ?? '')),
            'jenis' => trim((string) ($_POST['jenis'] ?? '')),
            'suplier' => trim((string) ($_POST['suplier'] ?? '')),
            'hargaU' => (int) ($_POST['hargaU'] ?? 0),
            'hargaJ' => (int) ($_POST['hargaJ'] ?? 0),
            'JumlahB' => (int) ($_POST['JumlahB'] ?? 0),
        ]);

        if ($ok) {
            Session::flash('success', 'Mengedit Data Sukses');
            $this->redirect('products');
        }

        Session::flash('error', 'Mengedit Data Gagal');
        $this->redirect('products-edit&id=' . $id);
    }

    public function delete(): void
    {
        Auth::requireAuth();

        $id = (int) ($_GET['id'] ?? 0);
        $this->productRepository->delete($id);
        Session::flash('success', 'Menghapus Data Sukses');
        $this->redirect('products');
    }

    public function deleteAll(): void
    {
        Auth::requireAuth();

        $ok = $this->productRepository->deleteAllWithModal();
        Session::flash($ok ? 'success' : 'error', $ok ? 'Hapus Semua Data Berhasil' : 'Hapus Semua Data Gagal');
        $this->redirect('products');
    }
}
