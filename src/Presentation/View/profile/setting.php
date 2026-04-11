<?php
$title = 'Setting';
$active = 'dashboard';
require __DIR__ . '/../layouts/header.php';
?>
<?php require __DIR__ . '/../layouts/flash.php'; ?>

<?php if (!$profileSetting): ?>
  <div class="alert alert-danger">Maaf Data Ini Tidak Tersedia</div>
<?php else: ?>
  <div class="card shadow ml-4 mr-4">
    <div class="card-header py-3"><h1 class="h3 mb-0 text-gray-800">Setting</h1></div>
    <form method="post" action="index.php?r=settings&id=<?= (int) $profileSetting['id'] ?>" enctype="multipart/form-data">
      <div class="row ml-5 mb-2 mt-3">
        <div class="col-md-4">
          <p><b>Ganti Nama</b></p>
          <input class="form-control" type="text" value="<?= htmlspecialchars((string) $profileSetting['nama']) ?>" placeholder="Ganti Nama..." name="name" required>
          <p><b>Ganti Foto Profile</b></p>
          <input class="form-control" type="file" name="pict" accept="image/jpeg, image/png, image/svg+xml" required>
        </div>
      </div>
      <div class="row ml-5 mb-2 mt-3"><div class="col-md-5"><button type="submit" class="btn btn-info">Update</button> <input type="reset" class="btn btn-danger" value="Reset"></div></div>
    </form>
  </div>
<?php endif; ?>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
