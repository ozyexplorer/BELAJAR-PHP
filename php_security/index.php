<?php 

	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "testing";

	$koneksi = mysqli_connect($host, $user, $pass, $db);

	
	$nama = "rhozi";
	$password = "1' OR '1' = '1";


	/*untuk mengubah password menjadi type md5
	die(md5($password));*/

	/*untuk mengubah password menjadi type password hash
	die(password_hash($password, PASSWORD_DEFAULT));*/

	$hash = "$2y$10$/d9xkKapJgtKIsZ0lgzg2eQ2nkQ/mrKB2MhmjQ40SMEDMBGs.8fpy";

	$password = password_verify($password, $hash);

	if ($password) {
		die("berhasil login");
	}

	//mencegah sql injection
	$nama = $koneksi->real_escape_string($nama);
	$password = $koneksi->real_escape_string($password);

	$query = "SELECT * FROM user WHERE username='$nama' AND password='$password'";


	if($result = $koneksi->query($query)) {
		print_r($result -> fetch_object());
	}



?>