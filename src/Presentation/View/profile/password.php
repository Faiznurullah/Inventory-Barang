<?php
$title = 'Ganti Password';
$active = 'dashboard';
require __DIR__ . '/../layouts/header.php';
?>
<?php require __DIR__ . '/../layouts/flash.php'; ?>

<?php if (!$adminTarget): ?>
  <div class="alert alert-danger">Maaf Data Ini Tidak Tersedia</div>
<?php else: ?>
  <div class="card shadow ml-4 mr-4">
    <div class="card-header py-3"><h1 class="h3 mb-0 text-gray-800">Ubah Password</h1></div>
    <form action="index.php?r=password&id=<?= (int) $adminTarget['id'] ?>" method="post">
      <div class="row ml-5 mb-2 mt-3">
        <div class="col-md-6">
          <input class="form-control" type="hidden" name="username" value="<?= htmlspecialchars((string) $adminTarget['username']) ?>" required>
          <p><b>Password Lama</b></p>
          <input class="form-control" type="password" name="pertama" placeholder="Password Lama..." required>
          <p><b>Password Baru</b></p>
          <input class="form-control" type="password" name="kedua" placeholder="Password Baru..." required>
          <p><b>Ulangi Password Baru</b></p>
          <input class="form-control" type="password" name="ketiga" placeholder="Password Baru..." required>
        </div>
      </div>
      <div class="row ml-5 mb-4 mt-3"><div class="col-md-5"><button type="submit" class="btn btn-info">Update</button> <input type="reset" class="btn btn-danger" value="Reset"></div></div>
    </form>
  </div>
<?php endif; ?>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
