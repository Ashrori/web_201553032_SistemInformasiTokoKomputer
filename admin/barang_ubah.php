<?php
	error_reporting(0);
	require_once "../koneksi.php";

	if (!$_GET['id']=="") {
		$sql = mysql_query("SELECT * FROM barang WHERE id_barang='".$_GET['id']."'")
			or die (mysql_error());
		$data = mysql_fetch_array($sql);
	}
?>

<?php
	if (isset($_POST['btnUbah'])) {
		if (!isset($_FILES['Foto']['name'])=="") {
			$nama_foto = $_FILES["Foto"]["name"];
			$file_foto = $_POST['txtid_barang'].".jpg";
			copy($_FILES['Foto']['tmp_name'],"imgFoto2/".$file_foto);
			
		}else{
			$nama_foto = $_POST['FotoH'];
			$file_foto = $nama_foto;
		}
		
		$sql_update = "UPDATE barang SET
			id_kategori='".$_POST['txtid_kategori']."',
			nama_barang='".$_POST['txtnama_barang']."',
			harga='".$_POST['txtharga']."',
			stok='".$_POST['txtstok']."',
			foto='".$file_foto."',
			tanggal_ubah='".$_POST['txttanggal_ubah']."',
			keterangan_barang='".$_POST['taketerangan_barang']."'
			WHERE id_barang = '".$data['id_barang']."'";
		$query_update = mysql_query($sql_update) or die (mysql_error());
		
		if ($query_update) {
			echo "<div class='alert alert-success'>
				<a href='?page=barang_tampil' class='close' data-dismiss='alert'>&times;</a>
				Ubah berhasil
				</div>";
			echo "<meta http-equiv='refresh' content='0;url=?page=barang_tampil'>";
			
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
		<title>Ubah Barang</title>
	</head>
	
	<body>
		<div class="col-sm-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Ubah Barang </h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" name="frmUbah" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="id_barang" class="control-label col-sm-2">ID Barang</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txtid_barang" placeholder="ID Barang" 
								value="<?php echo $data['id_barang']; ?>" readonly />
							</div>
						</div>
						
						<div class="form-group">
							<label for="id_kategori" class="control-label col-sm-2">ID kategori</label>
							<div class="col-sm-4">
								<select class="form-control" name="txtid_kategori" onChange="changes(this.value)" >
									<?php
										$result = mysql_query("SELECT * FROM kategori");
										$kategori = "var barang = new Array();\n";
										while ($row = mysql_fetch_array($result)) {
										$pilih='';
										if ($data['id_kategori']==$row['id_kategori']){
											$pilih='selected';
										}
											echo '<option '.$pilih.' value="' . $row['id_kategori'] . '">' . $row['id_kategori'] . '</option>';
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
								<input type="text" class="form-control" name="txtnama_barang" placeholder="Nama Barang" 
								value="<?php echo $data['nama_barang']; ?>" />
							</div>
						</div>
                 		
                 		<div class="form-group">
							<label for="harga" class="control-label col-sm-2">Harga</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txtharga" placeholder="Harga" onkeyup="validAngka(this)"
								value="<?php echo $data['harga']; ?>" />
							</div>
						</div>
                		
                		<div class="form-group">
							<label for="stok" class="control-label col-sm-2">Stok</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txtstok" placeholder="Stok" onkeyup="validAngka(this)"
								value="<?php echo $data['stok']; ?>" />
							</div>
						</div>
                 		
                 		<div class="form-group">
							<label for="foto" class="control-label col-sm-2">Foto</label>
							<div class="col-sm-4">
								<input name="Foto" type="file" size="31"/>
								<input name="FotoH" type="hidden" value="<?php echo $data['foto']; ?>">
							</div>
						</div>
                		
                		<div class="form-group">
                        	<label for="tanggal_ubah" class="control-label col-sm-2">Tanggal Ubah</label>
                        	<div class="col-sm-4">
                        		<input type="text" class="form-control" name="txttanggal_ubah" id="datepicker" placeholder="Tanggal Ubah" value="<?php echo $data['tanggal_ubah']; ?>"/>
                        	</div>
                 		</div>
                 		
                 		<div class="form-group">
							<label for="keterangan_barang" class="control-label col-sm-2">Keterangan</label>
							<div class="col-sm-4">
								<textarea class="form-control" name="taketerangan_barang" rows="3" placeholder="Keterangan"><?php echo $data['keterangan_barang']; ?></textarea>
							</div>
						</div>
				
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-3">
								<button type="submit" class="btn btn-primary" name="btnUbah">Ubah</button>
								<button type="reset" class="btn btn-info" name="btnBatal"
								onclick="window.location.href='?page=barang_tampil'">Batal</button>
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