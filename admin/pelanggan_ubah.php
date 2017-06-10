<?php
	error_reporting(0);
	require_once "../koneksi.php";

	if (!$_GET['id']=="") {
		$sql = mysql_query("SELECT * FROM pelanggan WHERE id_pelanggan='".$_GET['id']."'")
			or die (mysql_error());
		$data = mysql_fetch_array($sql);
	}
?>

<?php
	if (isset($_POST['btnUbah'])) {
		$sql_update = "UPDATE pelanggan SET
			nama_pelanggan='".$_POST['txtnama_pelanggan']."',
			telepon='".$_POST['txttelepon']."',
			tanggal_lahir='".$_POST['txttanggal_lahir']."',
			alamat='".$_POST['taalamat']."',
			jenis_kelamin='".$_POST['rbjenis_kelamin']."'
			WHERE id_pelanggan = '".$data['id_pelanggan']."'";
		$query_update = mysql_query($sql_update) or die (mysql_error());
		
		if ($query_update) {
			echo "<div class='alert alert-success'>
				<a href='?page=pelanggan_tampil' class='close' data-dismiss='alert'>&times;</a>
				Ubah berhasil
				</div>";
			echo "<meta http-equiv='refresh' content='0;url=?page=pelanggan_tampil'>";
			
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
		<title>Ubah Pelanggan</title>
	</head>
	
	<body>
		<div class="col-sm-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Ubah Pelanggan </h3>
				</div>
				
				<div class="panel-body">
					<form class="form-horizontal" name="frmUbah" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="id_pelanggan" class="control-label col-sm-2">ID Pelanggan</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txtid_pelanggan" placeholder="ID Pelanggan" 
								value="<?php echo $data['id_pelanggan']; ?>" readonly />
							</div>
						</div>
						
						<div class="form-group">
							<label for="nama_pelanggan" class="control-label col-sm-2">Nama Pelanggan</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txtnama_pelanggan" placeholder="Nama Pelanggan" 
								value="<?php echo $data['nama_pelanggan']; ?>" />
							</div>
						</div>
						
						<div class="form-group">
							<label for="telepon" class="control-label col-sm-2">Telepon</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txttelepon" placeholder="Telepon" 
								value="<?php echo $data['telepon']; ?>" />
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
							<div class="col-sm-offset-2 col-sm-3">
								<button type="submit" class="btn btn-primary" name="btnUbah">Ubah</button>
								<button type="reset" class="btn btn-info" name="btnBatal"
								onclick="window.location.href='?page=pelanggan_tampil'">Batal</button>
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