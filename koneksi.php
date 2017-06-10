<?php
	$server = "localhost"; 
	$user = "root"; 
	$pass = ""; 
	$db = "db_201553032"; 

	$koneksi = mysql_connect($server, $user, $pass);

	if ($koneksi) { 
	}else{
		echo "Koneksi Gagal";
	}

	mysql_select_db($db) 
		or die ("Database Tidak Ada : ".mysql_error()); 
?>