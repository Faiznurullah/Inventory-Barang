<?php
$title = 'Edit Produk';
$active = 'products';
require __DIR__ . '/../layouts/header.php';
?>
<?php require __DIR__ . '/../layouts/flash.php'; ?>

<?php if (!$product): ?>
  <div class="alert alert-danger">Maaf Data Ini Tidak Tersedia</div>
<?php else: ?>
<div class="row ml-5">
  <div class="col-md-10 col-sm-12 col-xs-12">
    <h2><center>Pengeditan Data</center></h2>
    <form method="post" action="index.php?r=products-edit&id=<?= (int) $product['id'] ?>">
      <div class="row">
        <div class="col"><input type="text" class="form-control" name="nama" value="<?= htmlspecialchars((string) $product['nama']) ?>" required></div>
        <div class="col">
          <select class="form-control" name="jenis" required>
            <option value="Makanan" <?= $product['jenis'] === 'Makanan' ? 'selected' : '' ?>>Makanan</option>
            <option value="Minuman" <?= $product['jenis'] === 'Minuman' ? 'selected' : '' ?>>Minuman</option>
            <option value="Lainnya" <?= $product['jenis'] === 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
          </select>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col"><input type="text" class="form-control" name="suplier" value="<?= htmlspecialchars((string) $product['suplier']) ?>" required></div>
        <div class="col"><input type="number" class="form-control" name="hargaU" value="<?= (int) $product['hargaU'] ?>" required></div>
      </div>
      <div class="row mt-4">
        <div class="col"><input type="number" class="form-control" name="hargaJ" value="<?= (int) $product['hargaJ'] ?>" required></div>
        <div class="col"><input type="number" class="form-control" name="JumlahB" value="<?= (int) $product['JumlahB'] ?>" required></div>
      </div>
      <div class="row mt-5 ml-5"><div class="col-md-10 col-sm-12 col-xs-12 ml-5"><button type="submit" class="btn btn-info btn-lg btn-block">Update</button></div></div>
    </form>
  </div>
</div>
<?php endif; ?>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
