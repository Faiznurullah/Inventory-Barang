<?php
$title = 'Profile';
$active = 'dashboard';
require __DIR__ . '/../layouts/header.php';
$show = $profileView ?? $profile;
?>
<?php require __DIR__ . '/../layouts/flash.php'; ?>
<div class="card shadow ml-4 mr-4 mt-4 mb-4">
  <div class="card-header py-3"><h1 class="h3 mb-0 text-gray-800">Profile</h1></div>
  <div class="row ml-5 mb-2">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <center><img class="img-profile rounded-circle" src="Admin/penampung/<?= htmlspecialchars((string) $show['foto']) ?>" alt="Gambar Profile" width="150" height="150"></center>
      <p><b><center><?= htmlspecialchars((string) $show['nama']) ?></center></b></p>
    </div>
    <div class="col-md-4"></div>
  </div>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
