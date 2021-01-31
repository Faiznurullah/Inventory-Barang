<?php
include 'koneksi.php';
$delete = mysqli_query($conn, "DELETE FROM masuk WHERE id = '".$_GET['id']."'");

 if($delete){
	header('location: Data.php');
}
else{
	echo "Gagal";
}

?>
