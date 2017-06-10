<!doctype html>
<html lang="id">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" contens="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<meta name="Description" content="deksripsi halaman ini"/>
		<meta name="Keywords" content="keyword1, keyword2, ..."/>
		
		<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="assets/css/web-temaku.css"/>		
	</head>

	<body>
		<nav class="navbar navbar-inverse navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="sr-only"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">Nama Webku</a>
				</div>

				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="?page=beranda">Beranda</a></li>
						<li><a href="?page=profil">Profil</a></li>
						<li><a href="?page=kontak">Kontak</a></li>
						<li><a href="?page=bantuan">Bantuan</a></li>
						<li><a href="admin/login.php">Login</a></li>
					</ul>
				</div>
			</div>
		</nav>	

			<div class="container">
				<div class="row">
					<?php
						require_once "bukafile.php";
					?>
				</div>
			</div>

		<footer class="footer">
			<div class="container">
				<p>&copy; 2017 www.namawebku.com</p>
			</div>
		</footer>

		<script src="assets/js/jquery-3.2.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
	</body>
</html>