<?php
	session_start();

	if (isset($_SESSION['ses_id_karyawan'])=="") {
		echo"<meta http-equiv='refresh' content='0;url=../login.php'>";
	} else {
?>

<!doctype html>
<html lang="id"><head>
		<title>Laporan Data Barang</title>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
	</head>
	
    <body>
        <div class="col-sm-12">
            <!-- konten tabel -->
            <h1 style="text-align: center;">Laporan Data Barang</h1>
            <br><br><br><br>
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
							<th>ID Barang</th>
							<th>Kategori</th>
							<th>Nama Barang</th>
							<th>Harga</th>
							<th>Stok</th>
							<th>Tanggal Ubah</th>
							<th>Keterangan</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                            require_once "../koneksi.php";
							
							$sql = mysql_query("SELECT * FROM barang,kategori WHERE barang.id_kategori=kategori.id_kategori ORDER BY id_barang")
                                    or die (mysql_error());
	                                    
                            $no=1;	//nilai awal no 1
                            while ($data = mysql_fetch_array($sql)) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $data['id_barang']; ?></td>
                            <td><?php echo $data['nama_kategori']; ?></td>
							<td><?php echo $data['nama_barang']; ?></td>
							<td><?php echo $data['harga']; ?></td>
							<td><?php echo $data['stok']; ?></td>
							<td><?php echo $data['tanggal_ubah']; ?></td>
							<td><?php echo $data['keterangan_barang']; ?></td>
                         </tr>
                            <?php    
                                $no++;
                                }
                            ?>                                                             
                    </tbody>
                        <tr>
							<td colspan="12" align="right">
								<b>
									<br><br><br>
									Kudus, <?php
                                    	echo date('d-m-Y');
                                    ?>
                              		<br><br><br><br><br>
                              		(Pimpinan)
                          		</b>
							</td>
						</tr>
                </table>
            </div>
        </div> 
    </body>
</html>

<script>
	window.print();
</script>
<?php
}
?>