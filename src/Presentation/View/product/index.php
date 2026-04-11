<?php
$title = 'Data Barang';
$active = 'products';
require __DIR__ . '/../layouts/header.php';
$profit = (int) $summary['revenue_total'] - (int) $summary['modal_total'];
?>
<?php require __DIR__ . '/../layouts/flash.php'; ?>

<form method="post" action="index.php?r=products-create">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-5"><p><b>Nama Barang:</b></p><input class="form-control" type="text" name="nama_b" placeholder="Nama Barang..." required></div>
    <div class="col-md-5">
      <p><b>Jenis:</b></p>
      <select class="form-control" name="jenis" required>
        <option selected disabled value="">Jenis Barang...</option>
        <option value="Makanan">Makanan</option><option value="Minuman">Minuman</option><option value="Lainnya">Lainnya</option>
      </select>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-1"></div>
    <div class="col-md-5"><p><b>Suplier:</b></p><input class="form-control" type="text" name="suplier" placeholder="Suplier..." required></div>
    <div class="col-md-5"><p><b>Harga Modal Per Unit:</b></p><input class="form-control" type="number" name="modal" placeholder="Harga Modal..." required></div>
  </div>

  <div class="row mt-3">
    <div class="col-md-1"></div>
    <div class="col-md-5"><p><b>Harga Jual:</b></p><input class="form-control" type="number" name="jual" placeholder="Harga Jual..." required></div>
    <div class="col-md-5"><p><b>Jumlah Barang:</b></p><input class="form-control" type="number" name="jumlah" placeholder="Jumlah Barang..." required></div>
  </div>

  <div class="row mt-3 mb-5">
    <div class="col-md-1"></div>
    <div class="col-md-10"><button type="submit" class="btn btn-primary btn-lg btn-block">Kirim</button></div>
  </div>
</form>

<div class="row"><div class="col-md-8 mt-4"><h2><center>Data Produk Warung Kita</center></h2></div></div>
<p class="ml-5">Jumlah Modal:<b> Rp.<?= number_format((int) $summary['modal_total']) ?>,-</b></p>
<p class="ml-5">Jumlah Produk: <?= (int) $summary['stock_count'] ?></p>
<p class="ml-5">Jumlah Barang: <?= number_format((int) $summary['item_count']) ?> Barang</p>
<p class="ml-5">Keuntungan Dagang: Rp.<?= number_format((int) $summary['revenue_total']) ?>-Rp.<?= number_format((int) $summary['modal_total']) ?></p>
<p class="ml-5">Total: <b>Rp.<?= number_format($profit) ?></b></p>

<div class="card shadow ml-4 mr-4">
  <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Data Barang</h6></div>
  <div class="row mt-3">
    <div class="col-md-8 mt-4"></div>
    <div class="col-md-4 mt-5">
      <form class="form-inline my-2 my-lg-0" action="index.php" method="get">
        <input type="hidden" name="r" value="products">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" name="cari" value="<?= htmlspecialchars((string) $search) ?>" required>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>

  <div class="col-md-12 col-sm-12 col-xs-12 mt-5">
    <div class="table-responsive service">
      <table class="table table-bordered table-hover mt-3 text-nowrap css-serial">
        <thead>
          <tr><th>No</th><th>Nama Produk</th><th>Suplier</th><th>Harga/Unit</th><th>Jumlah Barang</th><th>Opsi</th></tr>
        </thead>
        <tbody>
        <?php foreach ($products as $row): ?>
          <tr>
            <th scope="row"><?= (int) $row['id'] ?></th>
            <td><?= htmlspecialchars((string) $row['nama']) ?></td>
            <td><?= htmlspecialchars((string) $row['suplier']) ?></td>
            <td><?= htmlspecialchars((string) $row['hargaU']) ?></td>
            <td><?= htmlspecialchars((string) $row['JumlahB']) ?></td>
            <td>
              <a href="index.php?r=products-edit&id=<?= (int) $row['id'] ?>" class="btn btn-success">Edit</a>
              <a href="index.php?r=products-delete&id=<?= (int) $row['id'] ?>" class="btn btn-danger">Hapus</a>
              <a href="index.php?r=products-detail&id=<?= (int) $row['id'] ?>" class="btn btn-info">Detail</a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>

      <?php if (count($products) === 0): ?>
        <div class="alert alert-danger">Data Anda Masih Kosong</div>
      <?php endif; ?>

      <div class="row">
        <div class="col-md-10"></div>
        <?php if (count($products) > 0): ?>
          <div class="col-md-2"><a href="index.php?r=products-delete-all" class="btn btn-danger">Hapus Semua</a></div>
        <?php endif; ?>
      </div>

      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <?php for ($x = 1; $x <= $pages; $x++): ?>
            <li class="page-item"><a class="page-link" href="index.php?r=products&page=<?= $x ?><?= $search ? '&cari=' . urlencode((string) $search) : '' ?>"><?= $x ?></a></li>
          <?php endfor; ?>
        </ul>
      </nav>
    </div>
  </div>
</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
