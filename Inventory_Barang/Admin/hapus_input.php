<?php
include 'koneksi.php';

$delete = mysqli_query($conn, "DELETE FROM keluar WHERE id = '".$_GET['id']."'");



$query = mysqli_query($conn, "SELECT * FROM keluar ORDER BY id");
$hasil = ($query);

// nilai awal increment
$no = 1;

while ($data  = mysqli_fetch_array($hasil))
{
   // membaca id dari record yang tersisa dalam tabel
   $id = $data['id'];

   // proses updating id dengan nilai $no
   $query2 = mysqli_query($conn, "UPDATE keluar SET id = $no WHERE id = $id");


   // increment $no
   $no++;
}

// mengubah nilai auto increment menjadi $no terakhir ditambah 1
$query = mysqli_query($conn, "ALTER TABLE keluar  AUTO_INCREMENT = $no");


 if($delete){
	header('location: input.php');
}
else{
	echo "Gagal";
}

?>
