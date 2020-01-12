<?php
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'kasirrestoran');

$dbconnect = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

if ($dbconnect->connect_error) {
die('Database Not Connect. Error : ' . $dbconnect->connect_error);
        }

function registrasi($data) {
		global $dbconnect;

		$username = strtolower(stripcslashes($data["username"]));
		$password = mysqli_real_escape_string($dbconnect,$data["password"]);
		$nama_user = strtolower(stripcslashes($data["nama_user"]));
		$level = strtolower(stripcslashes($data["id_level"]));

		//tambah user baru ke database

		$result = mysqli_query($dbconnect, "SELECT username, nama_user FROM user WHERE username = '$username' and nama_user = '$nama_user'");
			if ( mysqli_fetch_assoc($result) ) {
				echo "<script>
						alert('Username yang dipilih sudah di pakai');
					</script>";
					return false;
			}

		mysqli_query($dbconnect, "INSERT INTO user VALUES ('','$username','$password','$nama_user','$level')");

		return mysqli_affected_rows($dbconnect);
		header("location:index.php");
	}

	function upload(){
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

		$ekstensigambarValid=['jpg','jpeg','png'];
		$ekstensigambar=explode('.',$namafile);
		$ekstensigambar=strtolower(end($ekstensigambar));

		if(!in_array($ekstensigambar, $ekstensigambarValid)){
			echo "
				<script>
				alert('Yang anda upload bukan gambar !')
				</script>";
				return false;
		}

		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensigambar;
		$dirUpload = "gmb/";

		move_uploaded_file($tmpname, $dirUpload. $namaFileBaru);

		return $namaFileBaru;
	}


	// Ubah masakan
	function query_mas($query) {
		global $dbconnect;
		$result = mysqli_query($dbconnect, $query);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows [] = $row;
		}
		return $rows;
	}

	function ubah_mas($data){
		global $dbconnect;
		$id_masakan = $data["id_masakan"];
		$gambarLama = htmlspecialchars($data["gambarLama"]);
		$nama_masakan = htmlspecialchars($data["nama_masakan"]);
		$harga = htmlspecialchars($data["harga"]);
		$status_masakan = htmlspecialchars($data["status_masakan"]);

		// apakah yg dipilih gambar
		if($_FILES['gambar']['error'] === 4){
			$gambar = $gambarLama;
		} else {
			$gambar = upload();
		}

		$query="UPDATE masakan SET
			nama_masakan='$nama_masakan',
			harga='$harga',
			status_masakan='$status_masakan',
			gambar='$gambar'
			WHERE
			id_masakan=$id_masakan
			";

			mysqli_query($dbconnect,$query);
			return mysqli_affected_rows($dbconnect);
	}

?>