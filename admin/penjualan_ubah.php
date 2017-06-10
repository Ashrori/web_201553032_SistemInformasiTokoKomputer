<?php
	error_reporting(0);
	require_once "../koneksi.php";

	if (!$_GET['id']=="") {
		$sql = mysql_query("SELECT * FROM penjualan WHERE id_faktur_jual='".$_GET['id']."'")
			or die (mysql_error());
		$data = mysql_fetch_array($sql);
	}
?>

<?php
	if (isset($_POST['btnUbah'])) {
		$sql_update = "UPDATE penjualan SET
			tanggal_jual='".$_POST['txttanggal_jual']."',
			id_karyawan='".$_POST['txtid_karyawan']."',
			id_pelanggan='".$_POST['txtid_pelanggan']."',
			id_barang='".$_POST['txtid_barang']."',
			harga='".$_POST['txtharga']."',
			jumlah='".$_POST['txtjumlah']."',
			total='".$_POST['txttotal']."'
			WHERE id_faktur_jual = '".$data['id_faktur_jual']."'";
		$query_update = mysql_query($sql_update) or die (mysql_error());
		
		if ($query_update) {
			echo "<div class='alert alert-success'>
				<a href='?page=penjualan_tampil' class='close' data-dismiss='alert'>&times;</a>
				Ubah berhasil
				</div>";
			echo "<meta http-equiv='refresh' content='0;url=?page=penjualan_tampil'>";
			
		}else{
			echo "<div class='alert alert-danger'>
				<a href='' class='close' data-dismiss='alert'>&times;</a>
				Ubah gagal !
				</div>";
		}
	}
?>

<!doctype html>
<html lang="id">
	<head>
		<title>Ubah Penjualan</title>
	</head>
	
	<body>
		<div class="col-sm-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Ubah Penjualan </h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" name="frmUbah" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="id_faktur_jual" class="control-label col-sm-2">ID Faktur Jual</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txtid_faktur_jual" placeholder="ID Faktur Jual" 
								value="<?php echo $data['id_faktur_jual']; ?>" readonly />
							</div>
						</div>
						
						<div class="form-group">
                        	<label for="tanggal_jual" class="control-label col-sm-2">Tanggal Jual</label>
                        	<div class="col-sm-4">
                        		<input type="text" class="form-control" name="txttanggal_jual" id="datepicker" placeholder="Tanggal Jual" value="<?php echo $data['tanggal_jual']; ?>"/>
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
										$pilih='';
										if ($data['id_karyawan']==$row['id_karyawan']){
											$pilih='selected';
										}
											echo '<option '.$pilih.' value="' . $row['id_karyawan'] . '">' . $row['id_karyawan'] . '</option>';
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
										$pilih='';
										if ($data['id_pelanggan']==$row['id_pelanggan']){
											$pilih='selected';
										}
											echo '<option '.$pilih.' value="' . $row['id_pelanggan'] . '">' . $row['id_pelanggan'] . '</option>';
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
										$pilih='';
										if ($data['id_barang']==$row['id_barang']){
											$pilih='selected';
										}
											echo '<option '.$pilih.' value="' . $row['id_barang'] . '">' . $row['id_barang'] . '</option>';
											$barang .= "barang['" . $row['id_barang'] . "'] = {harga:'" . addslashes($row['harga']) ."'};\n";
										}
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
								<input type="text" class="form-control" name="txtharga" placeholder="Jumlah" id="harga" onkeyup="perkalian();validAngka(this)"
								value="<?php echo $data['harga']; ?>" readonly />
							</div>
						</div>
						
						<div class="form-group">
							<label for="jumlah" class="control-label col-sm-2">Jumlah</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txtjumlah" placeholder="Jumlah" id="jumlah" onkeyup="perkalian();"
								value="<?php echo $data['jumlah']; ?>" />
							</div>
						</div>
						
						<div class="form-group">
							<label for="total" class="control-label col-sm-2">Total</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txttotal" placeholder="Total" id="total"
								value="<?php echo $data['total']; ?>" readonly />
							</div>
						</div>
				
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-3">
								<button type="submit" class="btn btn-primary" name="btnUbah">Ubah</button>
								<button type="reset" class="btn btn-info" name="btnBatal"
								onclick="window.location.href='?page=penjualan_tampil'">Batal</button>
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