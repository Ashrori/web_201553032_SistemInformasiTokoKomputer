<?php
	error_reporting(0);
	require_once "../koneksi.php";

	// KODE OTOMATIS
	// membuat query max untuk kode
	$carikode = mysql_query("SELECT MAX(id_kategori) FROM kategori") or die (mysql_error());
	// menjadikannya array
	$datakode = mysql_fetch_array($carikode);
	// jika $datakode
	if ($datakode) {
	// membuat variabel baru untuk mengambil kode mulai dari 3
	$nilaikode = substr($datakode[0], 3);
	// menjadikan $nilaikode ( int )
	$kode = (int) $nilaikode;
	// setiap $kode di tambah 1
	$kode = $kode + 1;
	// hasil untuk menambahkan kode 
	// angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
	// atau angka sebelum $kode
	$hasilkode = "KAT".str_pad($kode, 3, "0", STR_PAD_LEFT);
	}else{
		$hasilkode = "KAT001";
	}
	// KODE OTOMATIS

	if (isset($_POST['btnSimpan'])) {
		$sql_insert = "INSERT INTO kategori (id_kategori,nama_kategori,keterangan_kategori) VALUES (
					'".$_POST['txtid_kategori']."',
					'".$_POST['txtnama_kategori']."',
					'".$_POST['taketerangan_kategori']."')";
		$query_insert = mysql_query($sql_insert) or die (mysql_error());
		
		if($query_insert) {
			echo "<div class='alert alert-success'>
				<a href='?page=karyawan_tampil' class='close' data-dismiss='alert'>&times;</a>
				Simpan Berhasil
				</div>";
			echo "<meta http-equiv='refresh' content='0;url=?page=kategori_tampil'>";
			
		}else{
			echo "<div class='alert alert-danger'>
				<a href='' class='close' data-dismiss='alert'>&times;</a>
				Simpan gagal !
				</div>";
		}
	}
?>

<!doctype html>
<html lang="id">
	<head>
		<title>Tambah Kategori</title>
	</head>

	<body>
		<div class="col-sm-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Tambah Kategori </h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" name="frmSimpan" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="id_kategori" class="control-label col-sm-2">ID Kategori </label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txtid_kategori" placeholder=" ID Kategori" value="<?php echo $hasilkode; ?>" readonly />
							</div>
						</div>
						
						<div class="form-group">
							<label for="nama_kategori" class="control-label col-sm-2">Nama Kategori</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txtnama_kategori" placeholder="Nama Kategori"/>
							</div>
						</div>
						
						<div class="form-group">
							<label for="keterangan_kategori" class="control-label col-sm-2">Keterangan</label>
							<div class="col-sm-4">
								<textarea class="form-control" name="taketerangan_kategori" rows="3" placeholder="Keterangan"></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-3">
								<button type="submit" class="btn btn-primary" name="btnSimpan">Simpan</button>
								<button type="reset" class="btn btn-info" name="btnBatal" onclick="window.location.href='?page=kategori_tampil'">Batal</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script src="../assets/js/jquery-3.2.1.min.js"></script>
		
	</body>
</html>