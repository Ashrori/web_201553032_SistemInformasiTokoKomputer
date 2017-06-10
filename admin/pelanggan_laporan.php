<?php
	session_start();

	if (isset($_SESSION['ses_id_karyawan'])=="") {
		echo"<meta http-equiv='refresh' content='0;url=../login.php'>";
	} else {
?>

<!doctype html>
<html lang="id"><head>
		<title>Laporan Data Pelanggan</title>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
	</head>
	
    <body>
        <div class="col-sm-12">
            <!-- konten tabel -->
            <h1 style="text-align: center;">Laporan Data Pelanggan</h1>
            <br><br><br><br>
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
							<th>ID Pelanggan</th>
							<th>Nama Pelanggan</th>
							<th>Telepon</th>
							<th>Tanggal Lahir</th>
							<th>Alamat</th>
							<th>Jenis Kelamin</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                            require_once "../koneksi.php";
							
							$sql = mysql_query("SELECT * FROM pelanggan ORDER BY id_pelanggan") 
                                    or die (mysql_error());
	                                    
                            $no=1;
                            while ($data = mysql_fetch_array($sql)) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $data['id_pelanggan']; ?></td>
							<td><?php echo $data['nama_pelanggan']; ?></td>
							<td><?php echo $data['telepon']; ?></td>
							<td><?php echo $data['tanggal_lahir']; ?></td>
							<td><?php echo $data['alamat']; ?></td>
							<td><?php echo $data['jenis_kelamin']; ?></td>
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