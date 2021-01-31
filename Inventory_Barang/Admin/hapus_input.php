<?php
include 'koneksi.php';
$delete = mysqli_query($conn, "DELETE FROM keluar WHERE id = '".$_GET['id']."'");

 if($delete){
	header('location: input.php');
}
else{
	echo "Gagal";
}

?>
