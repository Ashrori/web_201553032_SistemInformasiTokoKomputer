<?php
	session_start();

	if (isset($_SESSION['ses_id_karyawan'])=="") {
		echo"<meta http-equiv='refresh' content='0;url=../login.php'>";
	} else {
?>

<!doctype html>
<html lang="id"><head>
		<title>Laporan Data Karyawan</title>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
	</head>
	
    <body>
        <div class="col-sm-12">
            <!-- konten tabel -->
            <h1 style="text-align: center;">Laporan Data Karyawan</h1>
            <br><br><br><br>
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
							<th>ID Karyawan</th>
							<th>Nama Karyawan</th>
							<th>Tanggal Lahir</th>
							<th>Alamat</th>
							<th>Jenis Kelamin</th>
							<th>Password</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                            require_once "../koneksi.php";
							
							$sql = mysql_query("SELECT * FROM karyawan ORDER BY id_karyawan") 
                                    or die (mysql_error());
	                                    
                            $no=1;
                            while ($data = mysql_fetch_array($sql)) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $data['id_karyawan']; ?></td>
							<td><?php echo $data['nama_karyawan']; ?></td>
							<td><?php echo $data['tanggal_lahir']; ?></td>
							<td><?php echo $data['alamat']; ?></td>
							<td><?php echo $data['jenis_kelamin']; ?></td>
                            <td><?php echo $data['password']; ?></td>
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