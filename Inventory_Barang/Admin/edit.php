

<?php
session_start();

if($_SESSION['password']=='')
{
    header("location:login.php");
}
include 'koneksi.php';
error_reporting(0);

$t = mysqli_query($conn, "select * from about");
$profile = mysqli_fetch_array($t);

ob_start()


 ?>
<!doctype html>
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

      <!-- SidebarBrand -->
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


      <?php
        $id_brg= ($_GET['id']);
        $ggl = !$id_brg;
        if($ggl){

            echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5 mt-5'>";
               echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
              echo "<p><center>Maaf Data Ini Tidak Tersedia</center></p>";
               echo   "</div>";
               echo "</div>";

        }else{
        $det=mysqli_query($conn, "select * from masuk where id='$id_brg'");
        while($d=mysqli_fetch_array($det)){
        ?>

        <div class="row ml-5">
          <div class="col-md-10 col-sm-12 col-xs-12">
            <h2><center>Pengeditan Data</center></h2>

            <form method="post" name="edit">
              <div class="row">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Nama Barang..." value='<?php echo $d['nama'] ?>' name='nama' required>
                </div>
                <div class="col">
                  <select class="form-control" name='jenis'  required>
                    <option selected disabled value="">Jenis Barang</option>
                     <option value="Makanan">Makanan</option>
                      <option value="Minuman">Minuman</option>
                       <option value="Lainnya">Lainnya</option>
                  </select>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Suplier..." value='<?php echo $d['suplier'] ?>' name='suplier' required>
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Harga Unit..." value='<?php echo $d['hargaU'] ?>' name='hargaU' required>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Harga Jual..." value='<?php echo $d['hargaJ'] ?>' name='hargaJ' required>
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Jumlah Barang..." value='<?php echo $d['JumlahB'] ?>' name='JumlahB' required>
                </div>
              </div>

  <div class="row mt-5 ml-5">
                <div class="col-md-10 col-sm-12 col-xs-12 ml-5">
            <button type="submit" class="btn btn-info btn-lg btn-block" name='edit'>Update</button>

              </form>

              </div>

<?php

}
}
?>
          </div>


          <?php

            if(isset($_POST['edit'])){




           $edit = mysqli_query($conn, "UPDATE masuk SET
          nama ='".$_POST['nama']."',
         jenis ='".$_POST['jenis']."',
          suplier ='".$_POST['suplier']."',
          hargaU ='".$_POST['hargaU']."',
          hargaJ ='".$_POST['hargaJ']."',
          JumlahB ='".$_POST['JumlahB']."'
          WHERE id ='".$_GET['id']."'
              ");

            if($edit){
              header("location: Data.php");
            }else{


                              echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
                                 echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
                                echo "<p><center>Mengedit Data Gagal</center></p>";
                                 echo   "</div>";
                                 echo "</div>";

            }

            }



?>













</div>
</div>





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
