<?php
	error_reporting(0);
	require_once "../koneksi.php";

	// KODE OTOMATIS
	// membuat query max untuk kode
	$carikode = mysql_query("SELECT MAX(id_faktur_jual) FROM penjualan") or die (mysql_error());
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
	$hasilkode = "PJL".str_pad($kode, 3, "0", STR_PAD_LEFT);
	}else{
		$hasilkode = "PJL001";
	}
	// KODE OTOMATIS

	if (isset($_POST['btnSimpan'])) {
		$sql_insert = "INSERT INTO penjualan (id_faktur_jual,tanggal_jual,id_karyawan,id_pelanggan,id_barang,harga,jumlah,total) VALUES (
					'".$_POST['txtid_faktur_jual']."',
					'".$_POST['txttanggal_jual']."',
					'".$_POST['txtid_karyawan']."',
					'".$_POST['txtid_pelanggan']."',
					'".$_POST['txtid_barang']."',
					'".$_POST['txtharga']."',
					'".$_POST['txtjumlah']."',
					'".$_POST['txttotal']."')";
		$query_insert = mysql_query($sql_insert) or die (mysql_error());
		
		if($query_insert) {
			echo "<div class='alert alert-success'>
				<a href='?page=penjualan_tampil' class='close' data-dismiss='alert'>&times;</a>
				Simpan Berhasil
				</div>";
			echo "<meta http-equiv='refresh' content='0;url=?page=penjualan_tampil'>";
			
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
		<title>Tambah Penjualan</title>
	</head>

	<body>
		<div class="col-sm-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Tambah Penjualan </h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" name="frmSimpan" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="id_faktur_jual" class="control-label col-sm-2">ID Faktur Jual</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txtid_faktur_jual" placeholder="ID Faktur Jual" value="<?php echo $hasilkode; ?>" readonly />
							</div>
						</div>
						
						<div class="form-group">
                        	<label for="tanggal_jual" class="control-label col-sm-2">Tanggal Jual</label>
                        	<div class="col-sm-4">
								<input type="text" class="form-control" name="txttanggal_jual" id="datepicker" placeholder="Tanggal Jual"/>
                        	</div>
                 		</div>

						<div class="form-group">
							<label for="id_karyawan" class="control-label col-sm-2">ID Karyawan</label>
							<div class="col-sm-4">
								<select class="form-control" name="txtid_karyawan" onChange="changes(this.value)" >
                                	<?php
										$result = mysql_query("SELECT * FROM karyawan");
										$karyawan = "var karyawan = new Array();\n";
										while ($row = mysql_fetch_array($result)) {
											echo '<option value="' . $row['id_karyawan'] . '">' . $row['id_karyawan'] . '</option>';
										}
									?>	
								</select>
							</div>
							<div class="col-sm-2">
                            	<a href="?page=karyawan_tampil" target="_blank" class="btn btn-info">Lihat Karyawan</a>
                       		</div>
						</div>
						
						<div class="form-group">
							<label for="id_pelanggan" class="control-label col-sm-2">ID Pelanggan</label>
							<div class="col-sm-4">
								<select class="form-control" name="txtid_pelanggan" onChange="changes(this.value)" >
                                	<?php
										$result = mysql_query("SELECT * FROM pelanggan");
										$pelanggan = "var pelanggan = new Array();\n";
										while ($row = mysql_fetch_array($result)) {
											echo '<option value="' . $row['id_pelanggan'] . '">' . $row['id_pelanggan'] . '</option>';
										}
									?>	
								</select>
							</div>
							<div class="col-sm-2">
                            	<a href="?page=pelanggan_tampil" target="_blank" class="btn btn-info">Lihat Pelanggan</a>
                       		</div>
						</div>
						
						<div class="form-group">
							<label for="id_barang" class="control-label col-sm-2">ID Barang</label>
							<div class="col-sm-4">
								<select class="form-control" name="txtid_barang" onChange="changes(this.value)" >
                                	<?php
										$result = mysql_query("SELECT * FROM barang");
										$barang = "var barang = new Array();\n";
										while ($row = mysql_fetch_array($result)) {
											echo '<option value="' . $row['id_barang'] . '">' . $row['id_barang'] . '</option>';
											$barang .= "barang['" . $row['id_barang'] . "'] = {harga:'" . addslashes($row['harga']) ."'};\n";
										}
										echo '</select>';
									?>	
								</select>
							</div>
							<div class="col-sm-2">
                            	<a href="?page=barang_tampil" target="_blank" class="btn btn-info">Lihat Barang</a>
                       		</div>
						</div>
						
						<div class="form-group">
							<label for="harga" class="control-label col-sm-2">Harga</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txtharga" placeholder="Harga" id="harga" onkeyup="perkalian();" readonly />
							</div>
						</div>
						
						<div class="form-group">
							<label for="jumlah" class="control-label col-sm-2">Jumlah</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txtjumlah" placeholder="Jumlah" id="jumlah" onkeyup="perkalian();validAngka(this)" />
							</div>
						</div>
						
						<div class="form-group">
							<label for="total" class="control-label col-sm-2">Total</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txttotal" placeholder="Total" id="total" readonly />
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-3">
								<button type="submit" class="btn btn-primary" name="btnSimpan">Simpan</button>
								<button type="reset" class="btn btn-info" name="btnBatal" onclick="window.location.href='?page=penjualan_tampil'">Batal</button>
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
		
		<script type="text/javascript">
			<?php echo $barang; ?>
				function changes(id) {
					document.getElementById('harga').value = barang[id].harga;
				};
		</script>
		
		<script>
			function perkalian() {
				var txtFirstNumberValue = document.getElementById('jumlah').value;
				var txtSecondNumberValue = document.getElementById('harga').value;
				var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
				
				if (!isNaN(result)) {
					document.getElementById('total').value = result;}
			}
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