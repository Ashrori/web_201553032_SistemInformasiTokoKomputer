<!doctype html>
<html lang="id">
	<head>
		<title>Data Penjualan</title>
	</head>
	
	<body>
		<div class="col-sm-12">
			<h1 style="text-align: center;">Data Penjualan</h1>
			<form class="form-horizontal" name="frmCari" method="post">
				<div class="form-group">
					<div class="col-sm-1">
						<a href="?page=penjualan_tambah" class="btn btn-primary btn-sm">Tambah</a>
					</div>

					<div class="col-sm-3">
						<a href="penjualan_laporan.php" class="btn btn-danger btn-sm" target="_blank">Cetak Laporan</a>
					</div>
					
					<div class="col-sm-3">
						
					</div>

					<div class="col-sm-4">
						<input type="text" class="form-control" name="txtCari" placeholder="ID Faktur Jual"/>
					</div>

					<div class="col-sm-1">
						<button type="submit" class="btn btn-success" name="btnCari">Cari</button>
					</div>
				</div>
			</form>
			
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No.</th>
							<th>ID Faktur Jual</th>
							<th>Tanggal Jual</th>
							<th>Nama Barang</th>
							<th>Harga</th>
							<th>Jumlah</th>
							<th>Total</th>
							<th>Kelola</th>
						</tr>
					</thead>
					
					<tbody>
						<?php
							require_once "../koneksi.php";
						
							$batas = 10;
						
							if (isset($_GET['hal'])) {
								$hal = ($_GET['hal']);
								$posisi = ($hal-1) *$batas;
							}else{
								$posisi = 0;
								$hal =  1;
							}
						
							if (isset($_POST['btnCari'])) {
								$sql = mysql_query("SELECT * FROM penjualan WHERE id_faktur_jual LIKE '%".$_POST['txtCari']."%' ORDER BY id_faktur_jual LIMIT $posisi,$batas") or die(mysql_error());
							}else{
								$sql = mysql_query("SELECT * FROM penjualan,karyawan,pelanggan,barang WHERE penjualan.id_karyawan=karyawan.id_karyawan AND penjualan.id_pelanggan=pelanggan.id_pelanggan AND penjualan.id_barang=barang.id_barang ORDER BY id_faktur_jual LIMIT $posisi,$batas") or die (mysql_error());
							}
						
							$no=1;
							while ($data = mysql_fetch_array($sql)) {	
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data['id_faktur_jual']; ?></td>
							<td><?php echo $data['tanggal_jual']; ?></td>
							<td><?php echo $data['nama_barang']; ?></td>
							<td><?php echo $data['harga']; ?></td>
							<td><?php echo $data['jumlah']; ?></td>
							<td><?php echo $data['total']; ?></td>
							<td>
								<a href="?page=penjualan_detail&id=<?php echo $data['id_faktur_jual'];?>" class="btn btn-danger btn-sm">Detail</a>
								<a href="?page=penjualan_hapus&id=<?php echo $data['id_faktur_jual']; ?>"
								onclick="return confirm('Hapus data ?');" class="btn btn-warning btn-sm">Hapus</a>
							</td>
						</tr>
							<?php
								$no++;
								}
						
								$sql2 = mysql_query("SELECT * FROM penjualan") or die (mysql_error());
								$jumlahdata = mysql_num_rows($sql2);
							?>
					</tbody>
				</table>
				
				<center> <b>JUMLAH DATA : <?php echo $jumlahdata ?></b></center>
				<?php
					$jmlhal = ceil($jumlahdata/$batas);
					$url = "?page=penjualan_tampil";
					
					echo "<center>";
					if ($hal>1) {
						$previous=$hal-1;
						echo " << <a href=$url&hal=1>First</a> | <a href=$url&hal=$previous>Prev</a> | ";
					} else {
						echo "<< First | < Prev |";
					}

					if ($hal < $jmlhal) {
						$next = $hal+1;
						echo "| <a href=$url&hal=$next> Next</a> | <a href=$url&hal=$jmlhal>Last</a> >> ";
					} else {
						echo " Next > | Last >>";
					}
					echo "</center>";
				?>
			</div>
		</div>
	</body>
</html>