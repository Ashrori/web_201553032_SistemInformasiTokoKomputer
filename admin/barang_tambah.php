<?php
	error_reporting(0);
	require_once "../koneksi.php";

	// KODE OTOMATIS
	// membuat query max untuk kode
	$carikode = mysql_query("SELECT MAX(id_barang) FROM barang") or die (mysql_error());
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
	$hasilkode = "BRG".str_pad($kode, 3, "0", STR_PAD_LEFT);
	}else{
		$hasilkode = "BRG001";
	}
	// KODE OTOMATIS

	if (isset($_POST['btnSimpan'])) {
		$nama_foto = isset($_FILES["Foto"]["name"]);
		$file_foto = $_POST['txtid_barang'].".jpg";
		$sql_insert = "INSERT INTO barang (id_barang,id_kategori,nama_barang,harga,stok,foto,tanggal_ubah,keterangan_barang) VALUES (
					'".$_POST['txtid_barang']."',
					'".$_POST['txtid_kategori']."',
					'".$_POST['txtnama_barang']."',
					'".$_POST['txtharga']."',
					'".$_POST['txtstok']."',
					'".$file_foto."',
					'".$_POST['txttanggal_ubah']."',
					'".$_POST['taketerangan_barang']."')";
		$query_insert = mysql_query($sql_insert) or die (mysql_error());
		
		if($query_insert) {
			copy($_FILES['Foto']['tmp_name'],"imgFoto2/".$file_foto);
			echo "<div class='alert alert-success'>
				<a href='?page=barang_tampil' class='close' data-dismiss='alert'>&times;</a>
				Simpan Berhasil
				</div>";
			echo "<meta http-equiv='refresh' content='0;url=?page=barang_tampil'>";
			
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
		<title>Tambah Barang</title>
	</head>

	<body>
		<div class="col-sm-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Tambah Barang </h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" name="frmSimpan" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="id_barang" class="control-label col-sm-2">ID Barang</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txtid_barang" placeholder="ID Barang" value="<?php echo $hasilkode; ?>" readonly />
							</div>
						</div>

						<div class="form-group">
							<label for="id_kategori" class="control-label col-sm-2">ID Kategori</label>
							<div class="col-sm-4">
								<select class="form-control" name="txtid_kategori" onChange="changes(this.value)" >
                                	<?php
										$result = mysql_query("SELECT * FROM kategori");
										$kategori = "var kategori = new Array();\n";
										while ($row = mysql_fetch_array($result)) {
											echo '<option value="' . $row['id_kategori'] . '">' . $row['id_kategori'] . '</option>';
										}
									?>	
								</select>
							</div>
							<div class="col-sm-2">
                            	<a href="?page=kategori_tampil" target="_blank" class="btn btn-info">Lihat Kategori</a>
                       		</div>
						</div>
						
						<div class="form-group">
							<label for="nama_barang" class="control-label col-sm-2">Nama Barang</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txtnama_barang" placeholder="Nama Barang"/>
							</div>
						</div>

						<div class="form-group">
							<label for="harga" class="control-label col-sm-2">Harga</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txtharga" placeholder="Harga" onkeyup="validAngka(this)"/>
							</div>
						</div>

						<div class="form-group">
							<label for="stok" class="control-label col-sm-2">Stok</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txtstok" placeholder="Stok" onkeyup="validAngka(this)"/>
							</div>
						</div>
						
						<div class="form-group">
							<label for="foto" class="control-label col-sm-2">Foto</label>
							<div class="col-sm-4">
								<input name="Foto" type="file" size="31"/>
							</div>
						</div>
						
						<div class="form-group">
                        	<label for="tanggal_ubah" class="control-label col-sm-2">Tanggal Ubah</label>
                        	<div class="col-sm-4">
								<input type="text" class="form-control" name="txttanggal_ubah" id="datepicker" placeholder="Tanggal Ubah"/>
                        	</div>
                 		</div>
						
						<div class="form-group">
							<label for="keterangan_barang" class="control-label col-sm-2">Keterangan</label>
							<div class="col-sm-4">
								<textarea class="form-control" name="taketerangan_barang" rows="3" placeholder="Keterangan"></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-3">
								<button type="submit" class="btn btn-primary" name="btnSimpan">Simpan</button>
								<button type="reset" class="btn btn-info" name="btnBatal" onclick="window.location.href='?page=barang_tampil'">Batal</button>
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
		
		<script language="javascript">
			function validAngka(a){
				if(!/^[0-9.]+$/.test(a.value)){
					a.value = a.value.substring(0,a.value.length-1000)
				}
			}
		</script>
		
	</body>
</html>