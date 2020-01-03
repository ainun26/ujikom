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

?>