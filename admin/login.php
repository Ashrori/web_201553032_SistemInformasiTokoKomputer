<!doctype html>
<html lang="id">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" contens="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		
		<title>Login Admin</title>
		
		<meta name="Description" content="deksripsi halaman ini"/>
		<meta name="Keywords" content="keyword1, keyword2, ..."/>
		
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/css/web-temaku.css"/>		
	</head>

	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<form name="frmLogin" method="post">
						<h1 style="text-align: center;">ADMINISTRATOR</h1>
						<div class="form-group">
							<input type="text" name="txtid_karyawan" class="form-control" placeholder="ID Karyawan" />
						</div>
						
						<div class="form-group">
							<input type="password" name="txtpassword" class="form-control" placeholder="Password" />
						</div>
						
						<div class="form-group">
							<button class="btn btn-lg btn-primary btn-block" name="btnLogin" type="submit">LOGIN</button>
						</div>
						
						<div class="form-group" align="center">
							<a href="../index.php">Kembali</a>
                        </div>
					</form>
				</div>
			</div>
		</div>

		<script src="../assets/jquery-3.2.1.min.js"></script>
		<script src="../assets/js/bootstrap.min.js"></script>
		
	</body>
</html>

<?php
	require_once "../koneksi.php";

	if (isset($_POST['btnLogin'])) {
		$sql= mysql_query("SELECT * FROM karyawan WHERE id_karyawan='".$_POST['txtid_karyawan']."'
			AND password='".$_POST['txtpassword']."'") or die (mysql_error());
		$cek=mysql_num_rows($sql);
		$data=mysql_fetch_array($sql);

		if ($cek >=1 ){
			session_start();
			$_SESSION["ses_id_karyawan"]=$data["id_karyawan"];
			echo "<meta http-equiv='refresh' content='0; url=../admin/index.php'>";
		}else{
		echo "
			<div align='center'>
			<font color='red'> Login Gagal !!! </font>
			</div>
			";
		}
	}
?>