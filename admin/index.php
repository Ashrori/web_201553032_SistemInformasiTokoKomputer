<!doctype html>
<html lang="id">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" contens="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<meta name="Description" content="deksripsi halaman ini"/>
		<meta name="Keywords" content="keyword1, keyword2, ..."/>
		
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/css/simple-sidebar.css"/>
		<link rel="stylesheet" href="../assets/css/bootstrap-datepicker.css"/>		
	</head>

	<body>
		<nav class="navbar navbar-default no-margin">
			<div class="navbar-header fixed-brand">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" id="menu-toggle">
					<span class="sr-only"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"> HALAMAN ADMIN </a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active">
						<button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2">
							<span class="sr-only"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</li>
				</ul>
			</div>
		</nav>

		<div id="wrapper">
			<div id="sidebar-wrapper">
				<ul class="sidebar-nav nav-pills nav-stacked" id="menu">
					<li><a href="?page=karyawan_tampil">Data Karyawan</a></li>
					<li><a href="?page=pelanggan_tampil">Data Pelanggan</a></li>
					<li><a href="?page=kategori_tampil">Data Kategori</a></li>
					<li><a href="?page=barang_tampil">Data Barang</a></li>
					<li><a href="?page=penjualan_tampil">Data Penjualan</a></li>
					<li><a href="../admin/logout.php">Logout</a></li>
				</ul>
			</div>

			<div id="page-content-wrapper">
				<div class="container-fluid xyz">
					<div class="row">
						<?php
							session_start();
						
							if (isset($_SESSION['ses_id_karyawan'])=="")
								echo"<meta http-equiv='refresh' content='0; url=../admin/login.php'>";
						
							include "bukafile_admin.php";
						?>
					</div>
				</div>
			</div>
		</div>

		<script src="../assets/js/jquery-3.2.1.min.js"></script>
		<script src="../assets/js/bootstrap.min.js"></script>
		<script src="../assets/js/sidebar_menu.js"></script>
		
	</body>
</html>