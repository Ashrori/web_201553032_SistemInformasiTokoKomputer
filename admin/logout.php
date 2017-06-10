<?php
	session_start();
	
	unset($_SESSION['ses_id_karyawan']);

	echo"<meta http-equiv='refresh' content='0; url=../admin/login.php'>";
?>