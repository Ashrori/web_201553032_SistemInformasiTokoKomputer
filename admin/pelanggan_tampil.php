<!doctype html>
<html lang="id">
	<head>
		<title>Data Pelanggan</title>
	</head>
	
	<body>
		<div class="col-sm-12">
			<h1 style="text-align: center;">Data Pelanggan</h1>
			<form class="form-horizontal" name="frmCari" method="post">
				<div class="form-group">
					<div class="col-sm-1">
						<a href="?page=pelanggan_tambah" class="btn btn-primary btn-sm">Tambah</a>
					</div>

					<div class="col-sm-3">
						<a href="pelanggan_laporan.php" class="btn btn-danger btn-sm" target="_blank">Cetak Laporan</a>
					</div>
					
					<div class="col-sm-3">
						
					</div>

					<div class="col-sm-4">
						<input type="text" class="form-control" name="txtCari" placeholder="Nama Pelanggan"/>
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
							<th>ID Pelanggan</th>
							<th>Nama Pelanggan</th>
							<th>Telepon</th>
							<th>Tanggal Lahir</th>
							<th>Alamat</th>
							<th>Jenis Kelamin</th>
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
								$sql = mysql_query("SELECT * FROM pelanggan WHERE nama_pelanggan LIKE '%".$_POST['txtCari']."%' ORDER BY id_pelanggan LIMIT $posisi,$batas") or die(mysql_error());
							}else{
								$sql = mysql_query("SELECT * FROM pelanggan ORDER BY id_pelanggan LIMIT $posisi,$batas") or die (mysql_error());
							}
						
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
							<td>
								<a href="?page=pelanggan_detail&id=<?php echo $data['id_pelanggan'];?>" class="btn btn-danger btn-sm">Detail</a>
								<a href="?page=pelanggan_ubah&id=<?php echo $data['id_pelanggan']; ?>" class="btn btn-info btn-sm">Ubah</a>
								<a href="?page=pelanggan_hapus&id=<?php echo $data['id_pelanggan']; ?>"
								onclick="return confirm('Hapus data ?');" class="btn btn-warning btn-sm">Hapus</a>
							</td>
						</tr>
							<?php
								$no++;
								}
						
								$sql2 = mysql_query("SELECT * FROM pelanggan") or die (mysql_error());
								$jumlahdata = mysql_num_rows($sql2);
							?>
					</tbody>
				</table>
				
				<center> <b>JUMLAH DATA : <?php echo $jumlahdata ?></b></center>
				<?php
					$jmlhal = ceil($jumlahdata/$batas);
					$url = "?page=pelanggan_tampil";
					
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