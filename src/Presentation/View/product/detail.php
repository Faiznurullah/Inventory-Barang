<?php
$title = 'Detail Produk';
$active = 'products';
require __DIR__ . '/../layouts/header.php';
?>
<?php require __DIR__ . '/../layouts/flash.php'; ?>

<?php if (!$product): ?>
  <div class="alert alert-danger">Maaf Data Ini Tidak Tersedia</div>
<?php else: ?>
  <?php $modal = (int) $product['hargaU'] * (int) $product['JumlahB']; ?>
  <div class="row ml-5">
    <div class="col-md-10 col-sm-12 col-xs-12">
      <h2><center>Info Detail Produk</center></h2>
      <table class="table">
        <tr><td>Nama</td><td><?= htmlspecialchars((string) $product['nama']) ?></td></tr>
        <tr><td>Jenis</td><td><?= htmlspecialchars((string) $product['jenis']) ?></td></tr>
        <tr><td>Suplier</td><td><?= htmlspecialchars((string) $product['suplier']) ?></td></tr>
        <tr><td>Harga/Unit</td><td><?= htmlspecialchars((string) $product['hargaU']) ?></td></tr>
        <tr><td>Harga Jual</td><td><?= htmlspecialchars((string) $product['hargaJ']) ?></td></tr>
        <tr><td>Jumlah Barang</td><td><?= htmlspecialchars((string) $product['JumlahB']) ?></td></tr>
        <tr><td>Modal</td><td>Rp.<?= number_format($modal) ?></td></tr>
      </table>
    </div>
  </div>
<?php endif; ?>

<div class="row">
  <div class="col-md-9"></div>
  <div class="col-md-3"><a href="index.php?r=products" class="btn btn-info">Kembali Lagi</a></div>
</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
