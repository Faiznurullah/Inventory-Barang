<?php
$title = 'Admin Dashboard';
$active = 'dashboard';
require __DIR__ . '/../layouts/header.php';
?>
<?php require __DIR__ . '/../layouts/flash.php'; ?>
<div class="row">
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Modal Usaha</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><b>Rp.<?= number_format((int) $summary['modal_total']) ?>,-</b></div>
          </div>
          <div class="col-auto"><i class="fas fa-wallet fa-2x"></i></div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Uang Masuk</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><b>Rp.<?= number_format((int) $summary['revenue_total']) ?>,-</b></div>
          </div>
          <div class="col-auto"><i class="fas fa-cash-register fa-2x"></i></div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Barang</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format((int) $summary['item_count']) ?> Barang</div>
          </div>
          <div class="col-auto"><i class="fas fa-box fa-2x"></i></div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Stock</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= (int) $summary['stock_count'] ?> Produk</div>
          </div>
          <div class="col-auto"><i class="fas fa-chart-line fa-2x"></i></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
