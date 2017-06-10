<?php
    error_reporting(0);
    require_once "../koneksi.php";
	
	if (!$_GET['id']=="") {
		$sql = mysql_query("SELECT * FROM karyawan WHERE id_karyawan='".$_GET['id']."'")
			or die (mysql_error());
		$data = mysql_fetch_array($sql);                  
	}
?>

<!doctype html>
<html lang="id">
	<head>
		<title>Detail Karyawan</title>
	</head>
	
    <body>
		<div class="col-sm-12">
        	<div class="panel panel-success">
				<div class="panel-heading">
                	<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Detail Karyawan </h3> 
                </div>
				<div class="panel-body"> 
					<form class="form-horizontal" name="frmDetail">
				    	<div class="form-group">
					        <label class="control-label col-sm-2">ID Karyawan</label>
					        <div class="col-sm-4">
				            	<?php echo $data['id_karyawan']; ?>
        					</div>
   						</div>
				    	
					    <div class="form-group">
					        <label class="control-label col-sm-2">Nama Karyawan</label>
					        <div class="col-sm-4">
				            	<?php echo $data['nama_karyawan']; ?>
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
                            <label class="control-label col-sm-2">Foto</label>
                            <div class="col-sm-4">
                                <img src="imgFoto/<?php echo $data['foto']; ?>" width="90" height="120" border="1" />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-sm-2">Password</label>
                            <div class="col-sm-4">
                                <?php echo $data['password']; ?>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-3">
                                <a href="?page=karyawan_ubah&id=<?php echo $data['id_karyawan'];?>" class="btn btn-info btn-sm">Ubah</a>
                                <button type="reset" class="btn btn-danger btn-sm" name="btnBatal" 
                                onclick="window.location.href='?page=karyawan_tampil'">Kembali</button>
                            </div>
                        </div>
					</form>
				</div>        
        	</div>
		</div>
    </body>
</html>