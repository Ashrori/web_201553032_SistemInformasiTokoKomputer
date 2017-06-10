<?php
    error_reporting(0);
    require_once "../koneksi.php";
	
	if (!$_GET['id']=="") {
		$sql = mysql_query("SELECT * FROM barang,kategori WHERE barang.id_kategori=kategori.id_kategori AND id_barang='".$_GET['id']."'")
			or die (mysql_error());
		$data = mysql_fetch_array($sql);                  
	}
?>

<!doctype html>
<html lang="id">
	<head>
		<title>Detail Barang</title>
	</head>
	
    <body>
		<div class="col-sm-12">
        	<div class="panel panel-success">
				<div class="panel-heading">
                	<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Detail Barang </h3> 
                </div>
				<div class="panel-body"> 
					<form class="form-horizontal" name="frmDetail">
				    	<div class="form-group">
					        <label class="control-label col-sm-2">ID Barang</label>
					        <div class="col-sm-4">
				            	<?php echo $data['id_barang']; ?>
        					</div>
   						</div>
   						
   						<div class="form-group">
					        <label class="control-label col-sm-2">Kategori</label>
					        <div class="col-sm-4">
				            	<?php echo $data['nama_kategori']; ?>
        					</div>
   						</div>
				    	
					    <div class="form-group">
					        <label class="control-label col-sm-2">Nama Barang</label>
					        <div class="col-sm-4">
				            	<?php echo $data['nama_barang']; ?>
        					</div>
   						</div>
   						
   						<div class="form-group">
					        <label class="control-label col-sm-2">Harga</label>
					        <div class="col-sm-4">
				            	<?php echo $data['harga']; ?>
        					</div>
   						</div>
   						
   						<div class="form-group">
					        <label class="control-label col-sm-2">Stok</label>
					        <div class="col-sm-4">
				            	<?php echo $data['stok']; ?>
        					</div>
   						</div>
   						
   						<div class="form-group">
                            <label class="control-label col-sm-2">Foto</label>
                            <div class="col-sm-4">
                                <img src="imgFoto2/<?php echo $data['foto']; ?>" width="200" height="200" border="1" />
                            </div>
                        </div>
					    
					    <div class="form-group">
                            <label class="control-label col-sm-2">Tanggal Ubah</label>
                            <div class="col-sm-4">
                                <?php echo $data['tanggal_ubah']; ?>
                            </div>
                        </div>
					    
					    <div class="form-group">
                            <label class="control-label col-sm-2">Keterangan</label>
                            <div class="col-sm-4">
                                <?php echo $data['keterangan_barang']; ?>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-3">
                                <a href="?page=barang_ubah&id=<?php echo $data['id_barang'];?>" class="btn btn-info btn-sm">Ubah</a>
                                <button type="reset" class="btn btn-danger btn-sm" name="btnBatal" 
                                onclick="window.location.href='?page=barang_tampil'">Kembali</button>
                            </div>
                        </div>
					</form>
				</div>        
        	</div>
		</div>
    </body>
</html>