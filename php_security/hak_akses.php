<?php 

	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "testing";

	$koneksi = mysqli_connect($host, $user, $pass, $db);

	
	$id = $_GET['id'];
	$sql = "SELECT * FROM artikel WHERE id='$id'";

	$session_id = 3;




	if($result = $koneksi->query($sql)) {
		while ($obj = mysqli_fetch_object($result)) {
			if ($obj -> id_user == $session_id) {
				echo $obj -> subjek;
			} else
			{
				echo "tidak punya akses";
			}
		}
	}



?>