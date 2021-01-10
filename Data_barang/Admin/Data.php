<?php
session_start();

if($_SESSION['password']=='')
{
    header("location:login.php");
}
include 'koneksi.php';
error_reporting(0);
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
  <form name='kirim' method='post'>
<div class="row">

  <div class="col-md-1">

  </div>

 <div class="col-md-5 col-sm-12 col-xs-12">
   <p><b>Nama Barang:</b></p>
<input class="form-control" type="text" placeholder="Nama Barang..." name='nama_b' required>
</div>


 <div class="col-md-5 col-sm-12 col-xs-12">
   <p><b>Jenis:</b></p>
   <select class="form-control" name='jenis' required>
     <option selected disabled value="">Jenis Barang...</option>
      <option value="Makanan">Makanan</option>
       <option value="Minuman">Minuman</option>
        <option value="Lainnya">Lainnya</option>
   </select>
</div>

</div>


<div class="row">
  <div class="col-md-1">

  </div>

 <div class="col-md-5 col-sm-12 col-xs-12">
   <p><b>Suplier:</b></p>
<input class="form-control" type="text" placeholder="Suplier..." name='suplier' required>
</div>


 <div class="col-md-5 col-sm-12 col-xs-12">
   <p><b>Harga Modal Per Unit:</b></p>
   <input class="form-control" type="number" placeholder="Harga Modal..." name='modal' required>
   </select>
</div>

</div>





<div class="row">
  <div class="col-md-1">

  </div>

 <div class="col-md-5 col-sm-12 col-xs-12">
   <p><b>Harga Jual:</b></p>
<input class="form-control" type="number" placeholder="Harga Jual..." name='jual' required>
</div>


 <div class="col-md-5 col-sm-12 col-xs-12">
   <p><b>Jumlah Barang:</b></p>
   <input class="form-control" type="number" placeholder="Jumlah Barang..." name='jumlah' required>
   </select>
</div>

</div>


<div class="row mt-3">
  <div class="col-md-1">

  </div>

  <div class="col-md-10 col-sm-12 col-xs-12">
<button type="submit" class="btn btn-primary btn-lg btn-block" name='kirim'>Kirim</button>

</form>

</div>





<?php
if(isset($_POST['kirim'])){
  $nama = htmlspecialchars($_POST['nama_b']);
  $jenis = htmlspecialchars($_POST['jenis']);
  $suplier = htmlspecialchars($_POST['suplier']);
  $modal = htmlspecialchars($_POST['modal']);
  $jual = htmlspecialchars($_POST['jual']);
  $jumlah = htmlspecialchars($_POST['jumlah']);
  $modald = $modal * $jumlah;




   $wet =mysqli_query($conn, "select * from masuk where nama ='$nama' and jenis ='$jenis' and suplier ='$suplier'");
   $chak = mysqli_num_rows($wet);
   if($chak > 0){

     $rew = mysqli_fetch_array($wet);
     $nama === $rew['nama'];
     $jenis === $rew['jenis'];
     $suplier === $rew['suplier'];



     echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
           echo "<div class='alert alert-warning mt-4 ml-5' role='alert'>";
          echo "<p><center>Data Yang Anda Kirim Sudah Tersedia</center></p>";
           echo   "</div>";
           echo "</div>";


   }else{


       $insert = mysqli_query($conn, "INSERT INTO masuk VALUES (
        NULL,
       '$nama',
       '$jenis',
       '$suplier',
       '$modal',
       '$jual',
       '$jumlah'
         )");

         $insert_1 = mysqli_query($conn, "INSERT INTO modal VALUES (
          NULL,
          '$modald'
        )");
        


        if($insert && $insert_1){

     echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
        echo "<div class='alert alert-primary mt-4 ml-5' role='alert'>";
       echo "<p><center>Menambakan Data Sukses</center></p>";
        echo   "</div>";
        echo "</div>";

      }else{

        echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
           echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
          echo "<p><center>Menambakan Data Gagal</center></p>";
           echo   "</div>";
           echo "</div>";


      }

   }




 }
 ?>






<div class="col-md-1">

</div>

</div>

<?php
$jumlah_produk=mysqli_query($conn,"SELECT COUNT(*) as id from masuk");
$row = mysqli_fetch_array($jumlah_produk);
$jum = $row['id'];


?>

<?php

  $Jumlah_modal=mysqli_query($conn, "select sum(jumlah_modal) as total from modal");
  $total=mysqli_fetch_array($Jumlah_modal);


?>

<?php

  $Jumlah_pemasukan=mysqli_query($conn, "select sum(hargaJ * JumlahB) as dari from masuk");
  $pemasukan=mysqli_fetch_array($Jumlah_pemasukan);


?>


<?php

  $Jumlah_B=mysqli_query($conn, "select sum(JumlahB) as jumlah from masuk");
  $jumlahB=mysqli_fetch_array($Jumlah_B);


    $Jumlah_y=mysqli_query($conn, "select sum(hargaU) as tor from keluar");
    $jumlahd=mysqli_fetch_array($Jumlah_y);


?>


<?php

$untung = ($jumlahd['tor']) - ($total['total']);

?>


<div class="row">
<div class="col-md-8  mt-4">
<h2><center> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Data Produk Warung Kita</center></h2>
</div>
</div>

<p class="ml-5">Jumlah Modal:<?php   echo "<b> Rp.". number_format($total['total']).",-</b>";  ?></p>
<p class="ml-5">Jumlah Produk: &nbsp; <?php echo "$jum"; ?></p>
<p class="ml-5">Jumlah Barang: &nbsp; <?php echo "". number_format($jumlahB['jumlah'])."&nbsp; Barang"; ?></p>
<p class="ml-5">Keuntungan Dagang: &nbsp; <?php echo "Rp.". number_format($jumlahd['tor']).""."-"."Rp.". number_format($total['total']).""; ?></p>
<p class="ml-5">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Total: <?php echo "<b> Rp.".number_format($untung).""; ?></p>

  <div class="card shadow  ml-4 mr-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
  </div>




<div class="row mt-3">


<div class="col-md-8  mt-4">
<br>



</div>

<div class="col-md-4 mt-5">
  <form class="form-inline my-2 my-lg-0" action="cari.php" method="get" name='cari'>
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name='cari'  required>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
</div>

</div>

<div class="row">
  <div class="col-md-8  mt-4">

</div>
</div>
<?php

$hmm= $jum;
$hal= 10;
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $hal;


 ?>


<div class="col-md-12 col-sm-12 col-xs-12  mt-5">
<table class="table mb-5">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Suplier</th>
      <th scope="col">Harga/Unit</th>
      <th scope="col">Jumlah Barang</th>
      <th scope="col">Opsi</th>

    </tr>

  </thead>
  <?php
  if(isset($_GET['cari'])){
		$cari=mysqli_real_escape_string($conn, $_GET['cari']);
    $brg=mysqli_query($conn, "select * from masuk where id like '%".$cari."%' or nama like '%".$cari."%' or jenis like '%".$cari."%' ");

if(mysqli_num_rows($brg) > 0){
        echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
        echo "<div class='alert alert-primary mt-4 ml-5' role='alert'>";
        echo "<p><center>Data Yang Anda Cari  Ditemukan</center></p>";
        echo   "</div>";
        echo "</div>";

}else{

      echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
      echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
      echo "<p><center>$cari Yang Anda Cari Tidak Ditemukan</center></p>";
      echo   "</div>";
      echo "</div>";


}




	}else{
		$brg=mysqli_query($conn, "select * from masuk limit $start, $hal");
	}




if(mysqli_num_rows($brg)){





     while($row = mysqli_fetch_array($brg)){


     ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id'] ?></th>
      <td><?php echo $row['nama'] ?></td>
      <td><?php echo $row['suplier'] ?></td>
      <td><?php echo $row['hargaU'] ?></td>
      <td><?php echo $row['JumlahB'] ?></td>
      <td>&nbsp;<a href="edit.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-success">Edit</button></a> &nbsp; <a href="hapus.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger">Hapus</button></a> &nbsp; <a href="detail.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-info">Detail</button></a></td>

    </tr>

  </tbody>

<?php }}elseif(mysqli_num_rows($brg) <= 0 AND !$cari){


        echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
        echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
        echo "<p><center>Data Anda Masih Kosong</center></p>";
        echo "</div>";
        echo "</div>";


} ?>


</table>

<div class="row">
    <div class="col-md-5">

    </div>

    <div class="col-md-5">

    </div>
    <?php
   $cep = mysqli_query($conn, "select * from masuk");
   $tesd= mysqli_num_rows($cep);


   if($tesd > 0 ){
   echo "<div class='col-md-2'>";
   echo " <a href='hapus_all_modal.php'><button type='button' class='btn btn-danger'>Hapus Semua</button></a>";
    echo "</div>";
   }else{


   }?>

</div>


<nav aria-label="Page navigation example">
<ul class="pagination">
  <?php
  for($x=1;$x<=$hal ;$x++){
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
