<?php
    error_reporting(0);
    require_once "../koneksi.php";
	
	if (!$_GET['id']=="") {
		$sql = mysql_query("SELECT * FROM pelanggan WHERE id_pelanggan='".$_GET['id']."'")
			or die (mysql_error());
		$data = mysql_fetch_array($sql);                  
	}
?>

<!doctype html>
<html lang="id">
	<head>
		<title>Detail Pelanggan</title>
	</head>
	
    <body>
		<div class="col-sm-12">
        	<div class="panel panel-success">
				<div class="panel-heading">
                	<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Detail Pelanggan </h3> 
                </div>
				<div class="panel-body"> 
					<form class="form-horizontal" name="frmDetail">
				    	<div class="form-group">
					        <label class="control-label col-sm-2">ID Pelanggan</label>
					        <div class="col-sm-4">
				            	<?php echo $data['id_pelanggan']; ?>
        					</div>
   						</div>
				    	
					    <div class="form-group">
					        <label class="control-label col-sm-2">Nama Pelanggan</label>
					        <div class="col-sm-4">
				            	<?php echo $data['nama_pelanggan']; ?>
        					</div>
   						</div>
   						
   						<div class="form-group">
					        <label class="control-label col-sm-2">Telepon</label>
					        <div class="col-sm-4">
				            	<?php echo $data['telepon']; ?>
        					</div>
   						</div>
   						
   						<div class="form-group">
					        <label class="control-label col-sm-2">Tanggal Lahir</label>
						    <div class="col-sm-4">
						    	<?php echo $data['tanggal_lahir']; ?>
						    </div>
					    </div>
					    
					    <div class="form-group">
                            <label class="control-label col-sm-2">Alamat</label>
                            <div class="col-sm-4">
                                <?php echo $data['alamat']; ?>
                            </div>
                        </div>
    					
                        <div class="form-group">
        					<label class="control-label col-sm-2">Jenis Kelamin</label>
        					<div class="col-sm-4">
						        <div class="radio">
            					<?php echo $data['jenis_kelamin']; ?>
        						</div>
        					</div>
    					</div>
    
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-3">
                                <a href="?page=pelanggan_ubah&id=<?php echo $data['id_pelanggan'];?>" class="btn btn-info btn-sm">Ubah</a>
                                <button type="reset" class="btn btn-danger btn-sm" name="btnBatal" 
                                onclick="window.location.href='?page=pelanggan_tampil'">Kembali</button>
                            </div>
                        </div>
					</form>
				</div>        
        	</div>
		</div>
    </body>
</html>