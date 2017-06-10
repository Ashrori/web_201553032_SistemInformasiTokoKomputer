<?php
	error_reporting(0);
	require_once "../koneksi.php";

	if (!$_GET['id']=="") {
		$sql = mysql_query("SELECT * FROM kategori WHERE id_kategori='".$_GET['id']."'")
			or die (mysql_error());
		$data = mysql_fetch_array($sql);
	}
?>

<?php
	if (isset($_POST['btnUbah'])) {
		$sql_update = "UPDATE kategori SET
			nama_kategori='".$_POST['txtnama_kategori']."',
			keterangan_kategori='".$_POST['taketerangan_kategori']."'
			WHERE id_kategori = '".$data['id_kategori']."'";
		$query_update = mysql_query($sql_update) or die (mysql_error());
		
		if ($query_update) {
			echo "<div class='alert alert-success'>
				<a href='?page=kategori_tampil' class='close' data-dismiss='alert'>&times;</a>
				Ubah berhasil
				</div>";
			echo "<meta http-equiv='refresh' content='0;url=?page=kategori_tampil'>";
			
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
		<title>Ubah Kategori</title>
	</head>
	
	<body>
		<div class="col-sm-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Ubah Kategori </h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" name="frmUbah" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="id_kategori" class="control-label col-sm-2">ID Kategori</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txtid_kategori" placeholder="ID Kategori" 
								value="<?php echo $data['id_kategori']; ?>" readonly />
							</div>
						</div>
						
						<div class="form-group">
							<label for="nama_kategori" class="control-label col-sm-2">Nama Kategori</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="txtnama_kategori" placeholder="Nama Kategori" 
								value="<?php echo $data['nama_kategori']; ?>" />
							</div>
						</div>
                 		
                 		<div class="form-group">
							<label for="keterangan_kategori" class="control-label col-sm-2">Keterangan</label>
							<div class="col-sm-4">
								<textarea class="form-control" name="taketerangan_kategori" rows="3" placeholder="Keterangan"><?php echo $data['keterangan_kategori']; ?></textarea>
							</div>
						</div>
				
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-3">
								<button type="submit" class="btn btn-primary" name="btnUbah">Ubah</button>
								<button type="reset" class="btn btn-info" name="btnBatal"
								onclick="window.location.href='?page=kategori_tampil'">Batal</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<script src="../assets/js/jquery-3.2.1.min.js"></script>
		
	</body>
</html>