<?php
	require_once "../koneksi.php";
        
	$sql_hapus = "DELETE FROM penjualan WHERE id_faktur_jual='".$_GET['id']."'";
	$query_hapus = mysql_query($sql_hapus) or die (mysql_error());
		
		if ($query_hapus) {
            echo "<div class='alert alert-success'>
                	<a href='?page=penjualan_tampil' class='close' data-dismiss='alert'>&times;</a>
						Hapus Berhasil
				  </div>";
            echo "<meta http-equiv='refresh' content='0;url=?page=penjualan_tampil'>";
		}else{
			echo"<script>alert('Hapus Gagal !')</script>";
		}
?>