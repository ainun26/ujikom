<?php 
include '../config.php';
$id_user = $_GET["id_user"];
$delete=mysqli_query($dbconnect,"delete from user where id_user='$id_user'");
if($delete) {
	echo "
    	<script>
    	   alert('Data Berhasil di Hapus!!!');
    	   document.location.href ='../admin/user.php'
    	</script>
    	";
} else {
	echo "
    	<script>
    	   alert('Data Gagal di Hapus!!!');
    	   document.location.href = '../admin/user.php'
    	</script>
    	";
    }

?>