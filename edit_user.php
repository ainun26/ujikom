<?php 
include ('config.php');
$id_user=$_GET['id_user'];

$edit=mysqli_query($dbconnect,"select * from user where id_user='$id_user'");
$data=mysqli_fetch_assoc($edit);
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Edit Data User</title>
 </head>
 <body>

 	<h1 align="center"> Edit Data User </h1>
 	<form method="post">
 		<table>
 			<tr>
 				<th>Username</th>
 				<th>:</th>
 				<th><input type="text" name="username" value="<?php echo $data['username']; ?>"></th>
 			</tr>
 			<tr>
 				<th>Password</th>
 				<th>:</th>
 				<th><input type="password" name="password" value="<?php echo $data['password']; ?>"></th>
 			</tr>
 			<tr>
 				<th>Nama User</th>
 				<th>:</th>
 				<th><input type="text" name="nama_user" value="<?php echo $data['nama_user']; ?>"></th>
 			</tr>
 			<tr>
 				<th>Level</th>
 				<th>:</th>
 				<th><select name="id_level">
 					<option value="<?php echo $data['id_level']; ?>" selected=""><?php echo $data['id_level']; ?></option>
 					<?php $level=mysqli_query($dbconnect,"select*from level"); 
 					while ($data=mysqli_fetch_assoc($level)) {
 						?>
 						<option value="<?php echo $data['id_level']; ?>"><?php echo $data['nama_level']; ?></option>
 						<?php }  ?>
 					
 				</select></td>
 			</tr>
 			<tr>
 				<td colspan="3"><input type="submit" name="ubah" value="Edit"></td>
 			</tr>
 		</table>
 	</form>
 
 </body>
 </html>

 <?php 
if (isset($_POST['ubah'])) {

	$username=$_POST['username'];
	$password=($_POST['password']);
	$nama_user=$_POST['nama_user'];
	$id_level=$_POST['id_level'];

	$update=mysqli_query($dbconnect,"UPDATE user SET username='$username',password='$password',nama_user='$nama_user',id_level='$id_level' WHERE id_user='$id_user'");
	if ($update) {
		echo "
    	<script>
    	   alert('Data Berhasil di Edit :)');
    	   document.location.href = 'user.php'
    	</script>
    	";
	}else{
		echo "
    	<script>
    	   alert('Data Gagal di Edit !!!');
    	   document.location.href = 'user.php'
    	</script>
    	";
	}
}
  ?>