<?php $assetBase = \App\Core\Config::baseAssetPath(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Login</title>
  <link href="<?= $assetBase ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?= $assetBase ?>/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
<div class="container">
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
          <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center"><h1 class="h4 text-gray-900 mb-4">Admin Login</h1></div>
                <form class="user" action="index.php?r=auth-login" method="post">
                  <div class="form-group">
                    <input type="text" name="username" class="form-control form-control-user" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                      <input type="checkbox" class="custom-control-input" id="customCheck">
                      <label class="custom-control-label" for="customCheck">Remember Me</label>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                  <hr>
                </form>
              </div>
            </div>
            <div class="col-lg-3"></div>
          </div>
        </div>
      </div>
      <?php require __DIR__ . '/../layouts/flash.php'; ?>
    </div>
  </div>
</div>
<script src="<?= $assetBase ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= $assetBase ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= $assetBase ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= $assetBase ?>/js/sb-admin-2.min.js"></script>
</body>
</html>
