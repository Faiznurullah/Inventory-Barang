<?php
$title = 'Input Pemasukan';
$active = 'sales';
require __DIR__ . '/../layouts/header.php';
?>
<?php require __DIR__ . '/../layouts/flash.php'; ?>

<div class="row mr-3">
  <div class="col-md-10"></div>
  <div class="col-md-2 mb-3">
    <a href="index.php?r=report-excel" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>
</div>

<form method="post" action="index.php?r=sales-create">
  <div class="card shadow ml-4 mr-4">
    <div class="card-header py-3"><h1 class="h3 mb-0 text-gray-800">Data Barang Terjual</h1></div>
    <div class="row ml-5 mb-2">
      <div class="col-md-5 col-sm-12 col-xs-12">
        <p><b>Tanggal:</b></p>
        <input class="form-control" type="date" name="tanggal" required>
      </div>
      <div class="col-md-5 col-sm-12 col-xs-12">
        <p><b>Nama Barang:</b></p>
        <select class="form-control" name="jenis" required>
          <option selected disabled value="">Nama Produk</option>
          <?php foreach ($products as $product): ?>
            <option value="<?= htmlspecialchars((string) $product['nama']) ?>"><?= htmlspecialchars((string) $product['nama']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="row ml-5 mb-4">
      <div class="col-md-5 col-sm-12 col-xs-12">
        <p><b>Jumlah Barang:</b></p>
        <input class="form-control" type="number" name="jumlah" placeholder="Jumlah Barang" required>
      </div>
      <div class="col-md-5 col-sm-12 col-xs-12 mt-4"><button type="submit" class="btn btn-primary btn-lg btn-block">Kirim</button></div>
    </div>
  </div>
</form>

<div class="col-md-12 col-sm-12 col-xs-12 mt-5">
  <div class="table-responsive service">
    <table class="table table-bordered table-hover mt-3 text-nowrap css-serial">
      <thead>
        <tr><th>No</th><th>Tanggal</th><th>Nama</th><th>Total</th><th>Jumlah Barang</th><th>Opsi</th></tr>
      </thead>
      <tbody>
        <?php foreach ($sales as $sale): ?>
          <tr>
            <th scope="row"><?= (int) $sale['id'] ?></th>
            <td><?= htmlspecialchars((string) $sale['tanggal']) ?></td>
            <td><?= htmlspecialchars((string) $sale['namabarang']) ?></td>
            <td><?= number_format((int) $sale['hargaU']) ?></td>
            <td><?= htmlspecialchars((string) $sale['JumlahB']) ?></td>
            <td>
              <a href="index.php?r=sales-edit&id=<?= (int) $sale['id'] ?>" class="btn btn-primary">Edit</a>
              <a href="index.php?r=sales-delete&id=<?= (int) $sale['id'] ?>" class="btn btn-warning">Hapus</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <?php if (count($sales) === 0): ?>
      <div class="alert alert-danger">Data Anda Masih Kosong</div>
    <?php endif; ?>

    <div class="row">
      <div class="col-md-10"></div>
      <?php if (count($sales) > 0): ?>
        <div class="col-md-2"><a href="index.php?r=sales-delete-all" class="btn btn-danger">Hapus Semua</a></div>
      <?php endif; ?>
    </div>

    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <?php for ($x = 1; $x <= $pages; $x++): ?>
          <li class="page-item"><a class="page-link" href="index.php?r=sales&page=<?= $x ?>"><?= $x ?></a></li>
        <?php endfor; ?>
      </ul>
    </nav>
  </div>
</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
