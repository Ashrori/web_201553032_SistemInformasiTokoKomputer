<?php
	error_reporting(0);
	require_once "../koneksi.php";

	if (!$_GET['id']=="") {
		$sql = mysql_query("SELECT * FROM karyawan WHERE id_karyawan='".$_GET['id']."'")
			or die (mysql_error());
		$data = mysql_fetch_array($sql);
	}
?>

<?php
	if (isset($_POST['btnUbah'])) {
		if (!isset($_FILES['Foto']['name'])=="") {
			$nama_foto = $_FILES["Foto"]["name"];
			$file_foto = $_POST['txtid_karyawan'].".jpg";
			copy($_FILES['Foto']['tmp_name'],"imgFoto/".$file_foto);
			
		}else{
			$nama_foto = $_POST['FotoH'];
			$file_foto = $nama_foto;
		}
		
		$sql_update = "UPDATE karyawan SET
			nama_karyawan='".$_POST['txtnama_karyawan']."',
			tanggal_lahir='".$_POST['txttanggal_lahir']."',
			alamat='".$_POST['taalamat']."',
			jenis_kelamin='".$_POST['rbjenis_kelamin']."',
			foto='".$file_foto."',
			password='".$_POST['txtpassword']."'
			WHERE id_karyawan = '".$data['id_karyawan']."'";
		$query_update = mysql_query($sql_update) or die (mysql_error());
		
		if ($query_update) {
			echo "<div class='alert alert-success'>
				<a href='?page=karyawan_tampil' class='close' data-dismiss='alert'>&times;</a>
				Ubah berhasil
				</div>";
			echo "<meta http-equiv='refresh' content='0;url=?page=karyawan_tampil'>";
			
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
		<title>Ubah Karyawan</title>
	</head>
	
	<body>
		<div class="col-sm-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Ubah Karyawan </h3>
				</div>
				
				<div class="panel-body">
					<form class="form-horizontal" name="frmUbah" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="id_karyawan" class="control-label col-sm-2">ID Karyawan</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txtid_karyawan" placeholder="ID Karyawan" 
								value="<?php echo $data['id_karyawan']; ?>" readonly />
							</div>
						</div>
						
						<div class="form-group">
							<label for="nama_karyawan" class="control-label col-sm-2">Nama Karyawan</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txtnama_karyawan" placeholder="Nama Karyawan" 
								value="<?php echo $data['nama_karyawan']; ?>" />
							</div>
						</div>
						
						<div class="form-group">
                        	<label for="tanggal_lahir" class="control-label col-sm-2">Tanggal Lahir</label>
                        	<div class="col-sm-4">
                        		<input type="text" class="form-control" name="txttanggal_lahir" id="datepicker" placeholder="Tanggal Lahir" value="<?php echo $data['tanggal_lahir']; ?>"/>
                        	</div>
                 		</div>
                 		
                 		<div class="form-group">
							<label for="alamat" class="control-label col-sm-2">Alamat</label>
							<div class="col-sm-4">
								<textarea class="form-control" name="taalamat" rows="3" placeholder="Alamat"><?php echo $data['alamat']; ?></textarea>
							</div>
						</div>
					
						<div class="form-group">
							<label for="jenis_kelamin" class="control-label col-sm-2">Jenis Kelamin</label>
							<div class="col-sm-4">
								<div class="radio">
								<label>
									<input type="radio" name="rbjenis_kelamin" value="Pria"
									<?php if($data['jenis_kelamin']=="Pria"){ echo "checked"; }; ?> />
										Pria
								</label>
								<label>
									<input type="radio" name="rbjenis_kelamin" value="Wanita"
									<?php if($data['jenis_kelamin']=="Wanita"){ echo "checked"; }; ?> />
										Wanita
								</label>	
								</div>
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
							<label for="password" class="control-label col-sm-2">Password</label>
							<div class="col-sm-4">
								<input type="password" class="form-control" name="txtpassword" placeholder="Password"
								value="<?php echo $data['password']; ?>"/>
							</div>
						</div>
				
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-3">
								<button type="submit" class="btn btn-primary" name="btnUbah">Ubah</button>
								<button type="reset" class="btn btn-info" name="btnBatal"
								onclick="window.location.href='?page=karyawan_tampil'">Batal</button>
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