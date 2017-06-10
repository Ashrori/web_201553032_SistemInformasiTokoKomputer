-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2017 at 09:06 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_201553032`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` varchar(15) NOT NULL DEFAULT '',
  `id_kategori` varchar(15) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `foto` text,
  `tanggal_ubah` date DEFAULT NULL,
  `keterangan_barang` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `nama_barang`, `harga`, `stok`, `foto`, `tanggal_ubah`, `keterangan_barang`) VALUES
('BRG001', 'KAT001', 'ASUS Motherboard', '500000', 10, '', '2017-06-09', ''),
('BRG002', 'KAT002', 'Intel Core i7', '3850000', 10, '', '2017-06-09', ''),
('BRG003', 'KAT003', 'NVIDIA GT950', '1900000', 10, '', '2017-06-09', ''),
('BRG004', 'KAT004', 'Patriot 1x4GB', '400000', 10, '', '2017-06-09', ''),
('BRG005', 'KAT005', 'Hitachi 1TB', '850000', 10, '', '2017-06-09', ''),
('BRG006', 'KAT006', 'Logic High Tower', '650000', 10, '', '2017-06-09', ''),
('BRG007', 'KAT007', 'Logitech Wireless', '210000', 10, '', '2017-06-09', ''),
('BRG008', 'KAT008', 'LG 15,6inch', '3500000', 10, '', '2017-06-09', ''),
('BRG009', 'KAT009', 'King PSU', '1020000', 10, '', '2017-06-09', ''),
('BRG010', 'KAT010', 'LiteOn OEM', '320000', 10, '', '2017-06-09', ''),
('BRG011', 'KAT007', 'Logitech', '100000', 10, 'BRG011.jpg', '2017-06-10', '');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `id_karyawan` varchar(15) NOT NULL DEFAULT '',
  `nama_karyawan` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `foto` text,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `tanggal_lahir`, `alamat`, `jenis_kelamin`, `foto`, `password`) VALUES
('KRW001', 'Roi', '1996-01-01', 'Pati', 'Pria', '', 'root'),
('KRW002', 'Nolan', '1996-01-01', 'Pati', 'Pria', '', 'root'),
('KRW003', 'Lee', '1996-01-01', 'Pati', 'Pria', '', 'root'),
('KRW004', 'Kim', '1996-01-01', 'Pati', 'Pria', '', 'root'),
('KRW005', 'Nirwa', '1996-01-01', 'Pati', 'Pria', '', 'root'),
('KRW006', 'Roi2', '1996-01-01', 'Pati', 'Pria', '', 'root'),
('KRW007', 'Nolan2', '1996-01-01', 'Pati', 'Pria', '', 'root'),
('KRW008', 'Lee2', '1996-01-01', 'Pati', 'Pria', '', 'root'),
('KRW009', 'Kim2', '1996-01-01', 'Pati', 'Pria', '', 'root'),
('KRW010', 'Nirwa2', '1996-01-01', 'Pati', 'Pria', '', 'root'),
('KRW011', 'Labib Ashrori', '1996-05-10', 'Pati', 'Pria', 'KRW011.jpg', 'labib');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` varchar(15) NOT NULL DEFAULT '',
  `nama_kategori` varchar(50) DEFAULT NULL,
  `keterangan_kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `keterangan_kategori`) VALUES
('KAT001', 'Motherboard', ''),
('KAT002', 'CPU', ''),
('KAT003', 'GPU', ''),
('KAT004', 'RAM', ''),
('KAT005', 'Hardisk, SSD', ''),
('KAT006', 'Casing', ''),
('KAT007', 'Mouse, Keyboard', ''),
('KAT008', 'Monitor', ''),
('KAT009', 'PSU', ''),
('KAT010', 'DVD-RW', '');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` varchar(15) NOT NULL DEFAULT '',
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `telepon`, `tanggal_lahir`, `alamat`, `jenis_kelamin`) VALUES
('PLG001', 'Lia', '', '1997-01-01', 'Pati', 'Pria'),
('PLG002', 'Ananda', '', '1997-01-01', 'Pati', 'Pria'),
('PLG003', 'Ronav', '', '1997-01-01', 'Pati', 'Pria'),
('PLG004', 'Jimmy', '', '1997-01-01', 'Pati', 'Pria'),
('PLG005', 'Sumo', '', '1997-01-01', 'Pati', 'Pria'),
('PLG006', 'Lia2', '', '1997-01-01', 'Pati', 'Pria'),
('PLG007', 'Ananda2', '', '1997-01-01', 'Pati', 'Pria'),
('PLG008', 'Rona2', '', '1997-01-01', 'Pati', 'Pria'),
('PLG009', 'Jimmy2', '', '1997-01-01', 'Pati', 'Pria'),
('PLG010', 'Sumo2', '', '1997-01-01', 'Pati', 'Pria'),
('PLG011', 'Farid', '085', '2017-06-10', 'Kudus', 'Pria');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_faktur_jual` varchar(15) NOT NULL,
  `tanggal_jual` date DEFAULT NULL,
  `id_karyawan` varchar(15) DEFAULT NULL,
  `id_pelanggan` varchar(15) DEFAULT NULL,
  `id_barang` varchar(15) DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_faktur_jual`, `tanggal_jual`, `id_karyawan`, `id_pelanggan`, `id_barang`, `harga`, `jumlah`, `total`) VALUES
('PJL001', '2017-06-10', 'KRW001', 'PLG001', 'BRG001', '500000', 1, '500000'),
('PJL002', '2017-06-10', 'KRW002', 'PLG002', 'BRG002', '3850000', 1, '3850000'),
('PJL003', '2017-06-10', 'KRW003', 'PLG003', 'BRG003', '1900000', 1, '1900000'),
('PJL004', '2017-06-10', 'KRW004', 'PLG004', 'BRG004', '400000', 1, '400000'),
('PJL005', '2017-06-10', 'KRW005', 'PLG005', 'BRG005', '850000', 1, '850000'),
('PJL006', '2017-06-10', 'KRW006', 'PLG006', 'BRG006', '650000', 1, '650000'),
('PJL007', '2017-06-10', 'KRW007', 'PLG007', 'BRG007', '210000', 1, '210000'),
('PJL008', '2017-06-10', 'KRW008', 'PLG008', 'BRG008', '3500000', 1, '3500000'),
('PJL009', '2017-06-10', 'KRW009', 'PLG009', 'BRG009', '1020000', 1, '1020000'),
('PJL010', '2017-06-10', 'KRW010', 'PLG010', 'BRG010', '320000', 1, '320000'),
('PJL011', '2017-06-10', 'KRW011', 'PLG011', 'BRG005', '850000', 1, '850000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_faktur_jual`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`),
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `penjualan_ibfk_3` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
