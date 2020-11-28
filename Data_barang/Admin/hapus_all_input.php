<?php
include 'koneksi.php';
$delete = mysqli_query($conn, "DELETE FROM keluar ");


 if($delete){
	header('location: input.php');
}
else{
	echo "Gagal";
}

?>
