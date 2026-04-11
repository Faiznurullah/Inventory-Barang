<?php
$title = 'Edit Pemasukan';
$active = 'sales';
require __DIR__ . '/../layouts/header.php';
?>
<?php require __DIR__ . '/../layouts/flash.php'; ?>

<?php if (!$sale): ?>
  <div class="alert alert-danger">Maaf Data Ini Tidak Tersedia</div>
<?php else: ?>
<form method="post" action="index.php?r=sales-edit&id=<?= (int) $sale['id'] ?>">
  <div class="col-md-10 col-sm-12 col-xs-12">
    <h2><center>Pengeditan Data</center></h2>
    <div class="row ml-5">
      <div class="col-md-6"><input class="form-control" type="date" name="tanggal" value="<?= htmlspecialchars((string) $sale['tanggal']) ?>" required></div>
      <div class="col-md-6">
        <select class="form-control" name="jenis" required>
          <option selected disabled value="">Nama Produk</option>
          <?php foreach ($products as $product): ?>
            <option value="<?= htmlspecialchars((string) $product['nama']) ?>" <?= $sale['namabarang'] === $product['nama'] ? 'selected' : '' ?>><?= htmlspecialchars((string) $product['nama']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="row ml-5 mt-3">
      <div class="col-md-6"><input type="number" class="form-control" name="jumlah" value="<?= (int) $sale['JumlahB'] ?>" required></div>
      <div class="col-md-6"><button type="submit" class="btn btn-info btn-lg btn-block">Update</button></div>
    </div>
  </div>
</form>
<?php endif; ?>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
