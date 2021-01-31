<?php
include 'koneksi.php';
$delete = mysqli_query($conn, "DELETE FROM masuk ");
$delete_mod = mysqli_query($conn, "DELETE FROM modal");

 if($delete && $delete_mod){
	header('location: Data.php');
}
else{
	echo "Gagal";
}

?>
