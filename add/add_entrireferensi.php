<?php 
include '../admin/admin.php';
include '../config.php';
$dbconnect = mysqli_connect('localhost','root','','kasirrestoran');


function tambah($data) {
	$dbconnect = mysqli_connect('localhost','root','','kasirrestoran');

	// upload gambar
	$gambar = upload();
	if (!$gambar) {
		return false;
	}

	$query = "INSERT INTO masakan VALUES ('','$gambar')";
	mysqli_query($dbconnect, $query);
	return mysqli_affected_rows($dbconnect);
}
function upload() {
	$namafile = $_FILES['gambar']['name'];
	$ukuranfile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpname = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yg di apload

	if( $error===4) {
		echo "<script>
			alert('Silahkan pilih gambar terlebih dahulu !');
			</script>";
			return false;
	}

	// cek apakah yang di apload gambar

	$ekstensigambarValid = ['jpg','jpeg','png'];
	$ekstensigambar = explode('',$namafile);
	$ekstensigambar = strtolower(end($ekstensigambar)) ;
		if (!in_array($ekstensigambar, $ekstensigambarValid)) {
			echo "<script>
			alert('Yang anda upload bukan gambar !')
			</script>";
			return false;
		}

		// cek jika ukuran nya terlalu besar
		if ($ukuranfile > 500000000000000000000) {
			echo"<script>
				alert('Ukuran gambar terlalu besar!')
				</script>";
				return false;
		}
		// lolos pengecekan, gambar siap apload
		// generate nama gambar baru
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensigambar;
		$dirUpload = "gmb/";

		move_uploaded_file($tmpname, $dirUpload. $namaFileBaru);

		return $namaFileBaru;
	}

	if (isset($_POST['submit'])){
		$gambar = $_POST['gambar'];
		$nama_masakan = $_POST['nama_masakan'];
		$harga = $_POST['harga'];
		$status_masakan = $_POST['status_masakan'];
		$insert ="INSERT into masakan (gambar,nama_masakan,harga,status_masakan) values ('$gambar','$nama_masakan','$harga','$status_masakan')";
		mysqli_query($dbconnect,$insert);
		if (mysqli_affected_rows($dbconnect) >0 )
			echo "
				<script>
					alert('Data berhasil ditambahkan !!!');
					document.location.href = '../admin/entrireferensi.php'
					</script>";
	}


 ?>

 <!-- Ini pencapaian -->
 <h3 style="text-align: center; margin-top: 10px; margin-bottom: 20px;">Tambah masakan</h3>
 <hr>
 <br></br>

 <div class="container">
 	<form method="post">
 		<div class="row">
 			<div class="col-sm-9">
 				<label>Nama Menu</label><br>
 				<input type="text" name="nama_masakan" id="nama_masakan"><br><br>
 				<label>Harga</label><br>
 				<input type="text" name="harga" id="harga"><br><br>
 				<label>Status Menu</label><br>
 				<input type="text" name="status_masakan" id="status_masakan"><br><br>
 				<label>Gambar</label><br>
 				<input type="file" name="gambar"><br><br>
 				<button type="submit" name="submit">Submit</button>
 			</div>
 		</div>
 		
 	</form>
 </div>
 <br><br>

 <!-- ini akhir pencapaian -->
 <?php 
require "../footer.php";
  ?>