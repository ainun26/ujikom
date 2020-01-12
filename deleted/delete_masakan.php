<?php 
include '../config.php';

$id_masakan = $_GET["id_masakan"];
$delete=mysqli_query($dbconnect,"DELETE FROM masakan WHERE id_masakan='$id_masakan'");
if($delete) {
	echo "
    	<script>
    	   alert('Data Berhasil di Hapus!!!');
    	   document.location.href ='../admin/entrireferensi.php'
    	</script>
    	";
} else {
	echo "
    	<script>
    	   alert('Data Gagal di Hapus!!!');
    	   document.location.href = '../admin/entrireferensi.php'
    	</script>
    	";
    }
 ?>