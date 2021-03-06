<?php
	error_reporting(0);
	require_once "../koneksi.php";

	// KODE OTOMATIS
	// membuat query max untuk kode
	$carikode = mysql_query("SELECT MAX(id_pelanggan) FROM pelanggan") or die (mysql_error());
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
	$hasilkode = "PLG".str_pad($kode, 3, "0", STR_PAD_LEFT);
	}else{
		$hasilkode = "PLG001";
	}
	// KODE OTOMATIS

	if (isset($_POST['btnSimpan'])) {
		$sql_insert = "INSERT INTO pelanggan (id_pelanggan,nama_pelanggan,telepon,tanggal_lahir,alamat,jenis_kelamin) VALUES (
					'".$_POST['txtid_pelanggan']."',
					'".$_POST['txtnama_pelanggan']."',
					'".$_POST['txttelepon']."',
					'".$_POST['txttanggal_lahir']."',
					'".$_POST['taalamat']."',
					'".$_POST['rbjenis_kelamin']."')";
		$query_insert = mysql_query($sql_insert) or die (mysql_error());
		
		if($query_insert) {
			copy($_FILES['Foto']['tmp_name'],"imgFoto/".$file_foto);
			echo "<div class='alert alert-success'>
				<a href='?page=pelanggan_tampil' class='close' data-dismiss='alert'>&times;</a>
				Simpan Berhasil
				</div>";
			echo "<meta http-equiv='refresh' content='0;url=?page=pelanggan_tampil'>";
			
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
		<title>Tambah Pelanggan</title>
	</head>

	<body>
		<div class="col-sm-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Tambah Pelanggan </h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" name="frmSimpan" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="id_pelanggan" class="control-label col-sm-2">ID Pelanggan </label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txtid_pelanggan" placeholder="ID Pelanggan" value="<?php echo $hasilkode; ?>" readonly />
							</div>
						</div>
						
						<div class="form-group">
							<label for="nama_pelanggan" class="control-label col-sm-2">Nama Pelanggan</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txtnama_pelanggan" placeholder="Nama Pelanggan"/>
							</div>
						</div>
						
						<div class="form-group">
							<label for="telepon" class="control-label col-sm-2">Telepon</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txttelepon" placeholder="Telepon"/>
							</div>
						</div>
						
						<div class="form-group">
                        	<label for="tanggal_lahir" class="control-label col-sm-2">Tanggal Lahir</label>
                        	<div class="col-sm-4">
								<input type="text" class="form-control" name="txttanggal_lahir" id="datepicker" placeholder="Tanggal Lahir"/>
                        	</div>
                 		</div>
						
						<div class="form-group">
							<label for="alamat" class="control-label col-sm-2">Alamat</label>
							<div class="col-sm-4">
								<textarea class="form-control" name="taalamat" rows="3" placeholder="Alamat"></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label for="jenis_kelamin" class="control-label col-sm-2">Jenis Kelamin</label>
							<div class="col-sm-4">
								<div class="radio">
									<label>
									<input type="radio" name="rbjenis_kelamin" value="Pria" checked=""/>
										Pria
									</label>
									<label>
									<input type="radio" name="rbjenis_kelamin" value="Wanita" />
										Wanita
									</label>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-3">
								<button type="submit" class="btn btn-primary" name="btnSimpan">Simpan</button>
								<button type="reset" class="btn btn-info" name="btnBatal" onclick="window.location.href='?page=pelanggan_tampil'">Batal</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script src="../assets/js/jquery-3.2.1.min.js"></script>
		<script src="../assets/js/bootstrap-datepicker.js"></script>
		
		<script>
			 $('#datepicker').datepicker({
				 format: 'yyyy-mm-dd',
				 autoclose: true,
				 todayHighlight: true
			 })
		</script>
		
	</body>
</html>