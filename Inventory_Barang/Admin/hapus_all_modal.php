<?php
include 'koneksi.php';


$delete = mysqli_query($conn, "DELETE FROM masuk WHERE id = '".$_GET['id']."'");



$query = mysqli_query($conn, "SELECT * FROM masuk ORDER BY id");
$hasil = ($query);

// nilai awal increment
$no = 1;

while ($data  = mysqli_fetch_array($hasil))
{
   // membaca id dari record yang tersisa dalam tabel
   $id = $data['id'];

   // proses updating id dengan nilai $no
   $query2 = mysqli_query($conn, "UPDATE masuk SET id = $no WHERE id = $id");


   // increment $no
   $no++;
}

// mengubah nilai auto increment menjadi $no terakhir ditambah 1
$query = mysqli_query($conn, "ALTER TABLE masuk  AUTO_INCREMENT = $no");



//


$delete_mod = mysqli_query($conn, "DELETE FROM modal WHERE id = '".$_GET['id']."'");



$query = mysqli_query($conn, "SELECT * FROM modal ORDER BY id");
$hasil = ($query);

// nilai awal increment
$no = 1;

while ($data  = mysqli_fetch_array($hasil))
{
   // membaca id dari record yang tersisa dalam tabel
   $id = $data['id'];

   // proses updating id dengan nilai $no
   $query2 = mysqli_query($conn, "UPDATE modal SET id = $no WHERE id = $id");


   // increment $no
   $no++;
}

// mengubah nilai auto increment menjadi $no terakhir ditambah 1
$query = mysqli_query($conn, "ALTER TABLE modal  AUTO_INCREMENT = $no");






 if($delete && $delete_mod){
	header('location: Data.php');
}
else{
	echo "Gagal";
}

?>
