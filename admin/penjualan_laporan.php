<?php
	session_start();

	if (isset($_SESSION['ses_id_karyawan'])=="") {
		echo"<meta http-equiv='refresh' content='0;url=../login.php'>";
	} else {
?>

<!doctype html>
<html lang="id"><head>
		<title>Laporan Data Penjualan</title>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
	</head>
	
    <body>
        <div class="col-sm-12">
            <!-- konten tabel -->
            <h1 style="text-align: center;">Laporan Data Penjualan</h1>
            <br><br><br><br>
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
							<th>No.</th>
							<th>ID Faktur Jual</th>
							<th>Tanggal Jual</th>
							<th>Nama Karyawan</th>
							<th>Nama Pelanggan</th>
							<th>Nama Barang</th>
							<th>Jumlah</th>
							<th>Total</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                            require_once "../koneksi.php";
							
							$sql = mysql_query("SELECT * FROM penjualan,karyawan,pelanggan,barang WHERE penjualan.id_karyawan=karyawan.id_karyawan AND penjualan.id_pelanggan=pelanggan.id_pelanggan AND penjualan.id_barang=barang.id_barang ORDER BY id_faktur_jual") 
                                    or die (mysql_error());
	                                    
                            $no=1;
                            while ($data = mysql_fetch_array($sql)) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $data['id_faktur_jual']; ?></td>
							<td><?php echo $data['tanggal_jual']; ?></td>
							<td><?php echo $data['nama_karyawan']; ?></td>
							<td><?php echo $data['nama_pelanggan']; ?></td>
							<td><?php echo $data['nama_barang']; ?></td>
							<td><?php echo $data['jumlah']; ?></td>
							<td><?php echo $data['total']; ?></td>
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