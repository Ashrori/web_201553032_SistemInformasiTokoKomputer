<?php
	require_once "../koneksi.php";
        
	$sql_hapus = "DELETE FROM kategori WHERE id_kategori='".$_GET['id']."'";
	$query_hapus = mysql_query($sql_hapus) or die (mysql_error());
		
		if ($query_hapus) {
            echo "<div class='alert alert-success'>
                	<a href='?page=kategori_tampil' class='close' data-dismiss='alert'>&times;</a>
						Hapus Berhasil
				  </div>";
            echo "<meta http-equiv='refresh' content='0;url=?page=kategori_tampil'>";
		}else{
			echo"<script>alert('Hapus Gagal !')</script>";
		}
?>