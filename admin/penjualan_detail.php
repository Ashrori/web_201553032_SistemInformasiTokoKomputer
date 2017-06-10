<?php
    error_reporting(0);
    require_once "../koneksi.php";
	
	if (!$_GET['id']=="") {
		$sql = mysql_query("SELECT * FROM penjualan,karyawan,pelanggan,barang WHERE penjualan.id_karyawan=karyawan.id_karyawan AND penjualan.id_pelanggan=pelanggan.id_pelanggan AND penjualan.id_barang=barang.id_barang AND id_faktur_jual='".$_GET['id']."'")
			or die (mysql_error());
		$data = mysql_fetch_array($sql);                  
	}
?>

<!doctype html>
<html lang="id">
	<head>
		<title>Detail Penjualan</title>
	</head>
	
    <body>
		<div class="col-sm-12">
        	<div class="panel panel-success">
				<div class="panel-heading">
                	<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Detail Penjualan </h3> 
                </div>
				<div class="panel-body"> 
					<form class="form-horizontal" name="frmDetail">
				    	<div class="form-group">
					        <label class="control-label col-sm-2">ID Faktur Jual</label>
					        <div class="col-sm-4">
				            	<?php echo $data['id_faktur_jual']; ?>
        					</div>
   						</div>
   						
   						<div class="form-group">
					        <label class="control-label col-sm-2">Tanggal Jual</label>
					        <div class="col-sm-4">
				            	<?php echo $data['tanggal_jual']; ?>
        					</div>
   						</div>
   						
   						<div class="form-group">
					        <label class="control-label col-sm-2">Nama Karyawan</label>
					        <div class="col-sm-4">
				            	<?php echo $data['nama_karyawan']; ?>
        					</div>
   						</div>
   						
   						<div class="form-group">
					        <label class="control-label col-sm-2">Nama Pelanggan</label>
					        <div class="col-sm-4">
				            	<?php echo $data['nama_pelanggan']; ?>
        					</div>
   						</div>
   						
   						<div class="form-group">
					        <label class="control-label col-sm-2">Nama Barang</label>
					        <div class="col-sm-4">
				            	<?php echo $data['nama_barang']; ?>
        					</div>
   						</div>
   						
   						<div class="form-group">
					        <label class="control-label col-sm-2">Jumlah</label>
					        <div class="col-sm-4">
				            	<?php echo $data['jumlah']; ?>
        					</div>
   						</div>
   						
   						<div class="form-group">
					        <label class="control-label col-sm-2">Total</label>
					        <div class="col-sm-4">
				            	<?php echo $data['total']; ?>
        					</div>
   						</div>
    
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-3">
                                <a href="?page=penjualan_ubah&id=<?php echo $data['id_faktur_jual'];?>" class="btn btn-info btn-sm">Ubah</a>
                                <button type="reset" class="btn btn-danger btn-sm" name="btnBatal" 
                                onclick="window.location.href='?page=penjualan_tampil'">Kembali</button>
                            </div>
                        </div>
					</form>
				</div>        
        	</div>
		</div>
    </body>
</html>