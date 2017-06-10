<?php
if(isset($_GET['page'])) {
	
	switch ($_GET['page']) {
		case 'karyawan_tampil' :
			require_once "karyawan_tampil.php";
			break;
			
		case 'karyawan_tambah' :
			require_once "karyawan_tambah.php";
			break;
			
		case 'karyawan_ubah' :
			require_once "karyawan_ubah.php";
			break;
			
		case 'karyawan_hapus' :
			require_once "karyawan_hapus.php";
			break;
			
		case 'karyawan_detail' :
			require_once "karyawan_detail.php";
			break;



		case 'pelanggan_tampil' :
			require_once "pelanggan_tampil.php";
			break;
			
		case 'pelanggan_tambah' :
			require_once "pelanggan_tambah.php";
			break;
			
		case 'pelanggan_ubah' :
			require_once "pelanggan_ubah.php";
			break;
			
		case 'pelanggan_hapus' :
			require_once "pelanggan_hapus.php";
			break;
			
		case 'pelanggan_detail' :
			require_once "pelanggan_detail.php";
			break;



		case 'kategori_tampil' :
			require_once "kategori_tampil.php";
			break;
			
		case 'kategori_tambah' :
			require_once "kategori_tambah.php";
			break;
			
		case 'kategori_ubah' :
			require_once "kategori_ubah.php";
			break;
			
		case 'kategori_hapus' :
			require_once "kategori_hapus.php";
			break;



		case 'barang_tampil' :
			require_once "barang_tampil.php";
			break;
			
		case 'barang_tambah' :
			require_once "barang_tambah.php";
			break;
			
		case 'barang_ubah' :
			require_once "barang_ubah.php";
			break;
			
		case 'barang_hapus' :
			require_once "barang_hapus.php";
			break;
			
		case 'barang_detail' :
			require_once "barang_detail.php";
			break;



		case 'penjualan_tampil' :
			require_once "penjualan_tampil.php";
			break;
			
		case 'penjualan_tambah' :
			require_once "penjualan_tambah.php";
			break;
			
		case 'penjualan_ubah' :
			require_once "penjualan_ubah.php";
			break;
			
		case 'penjualan_hapus' :
			require_once "penjualan_hapus.php";
			break;
			
		case 'penjualan_detail' :
			require_once "penjualan_detail.php";
			break;
			
	}
}
?>