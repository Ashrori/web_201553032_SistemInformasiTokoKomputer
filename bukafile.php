<?php
if(isset($_GET['page'])) {
	
	switch ($_GET['page']) {
		case 'beranda' :
			require_once "beranda.php";
			break;
			
		case 'profil' :
			require_once "profil.php";
			break;
			
		case 'kontak' :
			require_once "kontak.php";
			break;
			
		case 'bantuan' :
			require_once "bantuan.php";
			break;
	}
}else{
	require_once "beranda.php";
}
?>