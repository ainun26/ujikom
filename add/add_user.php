<?php 
session_start();
if (!isset($_SESSION['username'])){
	header("location:index.php");
}
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Tambah Data User</title>
 </head>
 <body>

 	<h1 align="center"> Tambah Data User </h1>
 	<form method="post">
 		<table>
 			<tr>
 				<th>Username</th>
 				<th>:</th>
 				<th><input type="text" name="username"></th>
 			</tr>
 			<tr>
 				<th>Password</th>
 				<th>:</th>
 				<th><input type="password" name="password"></th>
 			</tr>
 			<tr>
 				<th>Nama User</th>
 				<th>:</th>
 				<th><input type="text" name="nama_user"></th>
 			</tr>
 			<tr>
 				<th>Level</th>
 				<th>:</th>
 				<th><select name="id_level">
 					<option value="--Pilih Level--" disabled="" selected="">--Pilih Level--</option>
					<?php
					include ('config.php');
					$level=mysqli_query($dbconnect,"select*from level");
					while ($data=mysqli_fetch_assoc($level)){
					?>
 					<option value="<?php echo $data['id_level']; ?>">
						<?php echo $data['nama_level']; ?></option>
					<?php 
					}
					?>
 				</select></td>
 			</tr>
 			<tr>
 				<td colspan="3"><input type="submit" name="add" value="Add"></td>
 			</tr>
 		</table>
 	</form>
 
 </body>
 </html>

<?php 
if (isset($_POST['add'])){
	$username=$_POST['username'];
	$password=($_POST['password']);
	$nama_user=$_POST['nama_user'];
	$id_level=$_POST['id_level'];

	$add=mysqli_query($dbconnect,"insert into user values ('','$username','$password','$nama_user','$id_level') ");
	if ($add) {
		echo "
    	<script>
    	   alert('Data Berhasil di Tambahkan!!!');
    	   document.location.href = 'user.php'
    	</script>
    	";
	}else {
		echo "
    	<script>
    	   alert('Data Gagal di Tambahkan!!!');
    	   document.location.href = 'user.php'
    	</script>
    	";	}
}
 ?>