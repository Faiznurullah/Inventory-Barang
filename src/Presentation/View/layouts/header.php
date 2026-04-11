<?php

use App\Core\Config;

$assetBase = Config::baseAssetPath();
$title = $title ?? 'Admin Dashboard';
$active = $active ?? 'dashboard';
$profile = $profile ?? ['id' => 0, 'nama' => 'Admin', 'foto' => 'admin.png'];
$admin = $admin ?? ['id' => 0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= htmlspecialchars($title) ?></title>
  <link href="<?= $assetBase ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?= $assetBase ?>/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
<div id="wrapper">
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?r=dashboard">
      <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
      <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item <?= $active === 'dashboard' ? 'active' : '' ?>">
      <a class="nav-link" href="index.php?r=dashboard"><i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a>
    </li>

    <li class="nav-item <?= $active === 'products' ? 'active' : '' ?>">
      <a class="nav-link" href="index.php?r=products"><i class="fas fa-fw fa-table"></i><span>Data Barang</span></a>
    </li>

    <li class="nav-item <?= $active === 'sales' ? 'active' : '' ?>">
      <a class="nav-link" href="index.php?r=sales"><i class="fas fa-fw fa-plus"></i><span>Input Pemasukan</span></a>
    </li>

    <hr class="sidebar-divider">
    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
  </ul>

  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>

        <ul class="navbar-nav ml-auto">
          <div class="topbar-divider d-none d-sm-block"></div>

          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= htmlspecialchars((string) $profile['nama']) ?></span>
              <img class="img-profile rounded-circle" src="<?= $assetBase ?>/penampung/<?= htmlspecialchars((string) $profile['foto']) ?>" alt="Profile" width="100" height="100">
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="index.php?r=profile"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profile</a>
              <a class="dropdown-item" href="index.php?r=settings&id=<?= (int) $profile['id'] ?>"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>Settings</a>
              <a class="dropdown-item" href="index.php?r=password&id=<?= (int) $admin['id'] ?>"><i class="fas fa-ruler-horizontal fa-sm fa-fw mr-2 text-gray-400"></i>Ganti Password</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="index.php?r=logout" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="container-fluid">
