<?php 
	include '../admin/admin.php';
	include '../config.php';
	$result = mysqli_query($dbconnect, "SELECT * FROM level");

	if (isset($_POST["register"])) {
		
		if (registrasi($_POST) > 0) {
			echo "<script>
					alert('User baru berhasil ditambahkan >_<');
					document.location.href = '../admin/user.php';
				</script>";
		}else{
			echo mysqli_error($config);
		}
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>

 	<h3>REGISTRASI</h3>

 	<form action="" method="post" class="login">
 		<p>
 		<label>Username</label>
 		<input type="text" name="username" class="form_login"></p>
 		<p>
 		<label>Password</label>
 		<input type="password" name="password" class="form_login"></p>
 		<p>
 		<label>Nama User</label>
 		<input type="text" name="nama_user" class="form_login"></p>
 		<p>
 		<label name="id_level">Hak Akses</label>
 		<select name="id_level" class="form_login">
 		<?php while($row = mysqli_fetch_assoc($result)) : ?>
 			<option value="<?= $row['id_level'] ?>"><?= $row['nama_level'] ?></option>
 		<?php endwhile; ?>
		</select></p>
		<p>
		<input type="submit" name="register" value="REGISTER">
		</p>
 	</form>
 </body>
 </html>

 <?php 
include '../footer.php';
  ?>
