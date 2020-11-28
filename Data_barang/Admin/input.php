<?php
session_start();

if($_SESSION['password']=='')
{
    header("location:login.php");
}
include 'koneksi.php';
ob_start()

 ?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="Data.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Barang</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="input.php">
          <i class="fas fa-fw fa-plus"></i>
          <span>Input Pemasukan</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">



      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>



          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
<?php
            $nama = mysqli_query($conn, "select * from about");
            $profile = mysqli_fetch_array($nama);
?>




            <div class="topbar-divider d-none d-sm-block"></div>

            <?php
   $sss = mysqli_query($conn, "select * from admin");
   $rrr = mysqli_fetch_array($sss);


             ?>

            <!-- Nav Item - User Information -->
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $profile['nama'] ?></span>
                <img class="img-profile rounded-circle" src=" penampung/<?php echo$profile['foto'] ?>" alt="Profile"  width="100px" height="100px">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="setting.php?id=<?php echo $profile['id']; ?>">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="change.php?id=<?php echo $rrr['id']; ?>">
                  <i class="fas fa-ruler-horizontal fa-sm fa-fw mr-2 text-gray-400"></i>
                Ganti Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->


<!--ini bagian konten-->

<!-- Page Heading -->


  <div class="row mr-3">
    <div class="col-md-10">

    </div>
<div class="col-md-2 mb-3">
  <a href="export_excel.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>
</div>



<!-- Content Row -->
<form name='kirim'  method='post'>
  <div class="card shadow  ml-4 mr-4">
<div class="card-header py-3">
  <h1 class="h3 mb-0 text-gray-800">Data Barang Terjual</h1>
</div>
<div class="row ml-5 mb-2">
  <div class="col-md-5 col-sm-12 col-xs-12">
    <p><b>Tanggal:</b></p>
  <input class="form-control" type="date" name='tanggal' required>
  </div>

  <div class="col-md-5 col-sm-12 col-xs-12">
    <p><b>Nama Barang:</b></p>
    <select class="form-control" name='jenis' required>
    <option selected disabled value="">Nama Produk</option>
      <?php
       $brg=mysqli_query($conn, "select * from masuk");
       while($b=mysqli_fetch_array($brg)){
         ?>
      <option value="<?php echo $b['nama']; ?>"><?php echo $b['nama']; ?></option>

         <?php } ?>
    </select>
  </div>
</div>

<div class="row ml-5 mb-4">

  <div class="col-md-5 col-sm-12 col-xs-12">
    <p><b>Jumlah Barang:</b></p>
  <input class="form-control" type="number" name='jumlah' placeholder="Jumlah Barang" required>
  </div>

<div class="col-md-5 col-sm-12 col-xs-12 mt-4">
<button type="submit" class="btn btn-primary btn-lg btn-block" name='kirim'>Kirim</button>


</div>


</div>




</form>

<?php





if(isset($_POST['kirim'])){

  $tanggal = htmlspecialchars($_POST['tanggal']);
  $jenis = htmlspecialchars($_POST['jenis']);
  $jumlah = htmlspecialchars($_POST['jumlah']);
  $data= mysqli_query($conn, "select * from masuk where nama = '$jenis'");
  $di = mysqli_fetch_array($data);
  $harga = $di['hargaJ'];
  $untung = $harga * $jumlah;


  $insert = mysqli_query($conn, "INSERT INTO keluar VALUES (
   NULL,
  '$tanggal',
  '$jenis',
  '$untung',
  '$jumlah'
    )");



$manggil=mysqli_query($conn, "select * from masuk where nama = '$jenis'");
$total =mysqli_fetch_array($manggil);
$jadi = $total['JumlahB'];
$pengurangan = $jadi - $jumlah;
$update = mysqli_query($conn, "UPDATE masuk SET JumlahB = '$pengurangan' WHERE nama = '$jenis'");



    if($insert AND $update){



  echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
   echo "<div class='alert alert-primary mt-4 ml-5' role='alert'>";
  echo "<p><center>Memasukan Penjualan Berhasil</center></p>";
   echo   "</div>";
   echo "</div>";




 }else{
   echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
      echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
     echo "<p><center>Memasukan Penjualan Gagal</center></p>";
      echo   "</div>";
      echo "</div>";

 }


}
 ?>
 <?php

 $jumlah_produk=mysqli_query($conn,"SELECT COUNT(*) as id from keluar");
 $row = mysqli_fetch_array($jumlah_produk);
 $jum = $row['id'];


 ?>


<div class="row mt-5 mr-4">
  <div class="col-md-8">
    <?php

    $hmm= $jum;
    $hal= 10;
    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
    $start = ($page - 1) * $hal;


     ?>
  </div>

  <div class="col-md-4">

  </div>
</div>

 <div class="col-md-12 col-sm-12 col-xs-12  mt-5">
 <table class="table mb-5">
   <thead>
     <tr>

       <th scope="col">No</th>
       <th scope="col">Tanggal</th>
       <th scope="col">Nama</th>
       <th scope="col">Total</th>
       <th scope="col">Jumlah Barang</th>
       <th scope="col">Opsi</th>

     </tr>

   </thead>

   <?php

   $cek=mysqli_query($conn, "select * from keluar limit $start, $hal");

   while($isi=mysqli_fetch_array($cek)){
     ?>

   <tbody>
     <tr>
       <th scope="row"><?php echo $isi['id'] ?></th>
       <td><?php echo $isi['tanggal'] ?></td>
       <td><?php echo $isi['namabarang'] ?></td>
       <td><?php echo "". number_format($isi['hargaU'])."" ?></td>
       <td><?php echo $isi['JumlahB'] ?></td>
       <td><a href="edit_input.php?id=<?php echo $isi['id']; ?>"><button type="button" class="btn btn-primary">Edit</button></a>&nbsp;<a href="hapus_input.php?id=<?php echo $isi['id']; ?>"><button type="button" class="btn btn-warning">Hapus</button></a></td>
     </tr>
       </tbody>
       <?php }  ?>
 </table>

 <div class="row">

     <div class="col-md-5">

     </div>

     <div class="col-md-5">

     </div>

     <?php
$cep = mysqli_query($conn, "select * from keluar");
$tesd= mysqli_num_rows($cep);


if($tesd > 0 ){
    echo "<div class='col-md-2'>";
    echo " <a href='hapus_all_input.php'><button type='button' class='btn btn-danger'>Hapus Semua</button></a>";
     echo "</div>";
}else{


}?>
 </div>



 <nav aria-label="Page navigation example">
 <ul class="pagination">

   <?php
   for($x=1; $x<=$hal ;$x++){
     ?>
     <li class="page-item"><a class="page-link" href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
     <?php
   }

   ?>



 </ul>
 </nav>

</div>

</div>













</div>
<!-- End of Content Wrapper -->


</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin Mau Keluar?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Jika Keluar Anda Harus Login Terlebih Dahulu !</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a class="btn btn-primary" href="logout.php">Keluar</a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
<?php ob_end_flush() ?>
