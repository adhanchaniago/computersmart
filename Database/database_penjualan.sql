-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2015 at 10:06 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `database_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_barang`
--

CREATE TABLE IF NOT EXISTS `tabel_barang` (
  `kode_barang` char(6) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `kode_kategori` char(5) NOT NULL,
  `kode_produsen` char(5) NOT NULL,
  `harga_beli` int(12) NOT NULL,
  `harga_jual` int(12) NOT NULL,
  `stok` int(3) NOT NULL,
  `kode_pemasok` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_barang`
--

INSERT INTO `tabel_barang` (`kode_barang`, `nama_barang`, `gambar`, `kode_kategori`, `kode_produsen`, `harga_beli`, `harga_jual`, `stok`, `kode_pemasok`) VALUES
('PB001', 'Macbook Pro', 'laptop apple.jpg', 'LA123', 'AP123', 9000000, 12000000, 5, 'PM001'),
('PB002', 'Asus Zenbook', 'laptop asus 2.jpg', 'LA123', 'AS123', 7000000, 9000000, 7, 'PM002'),
('PB003', 'Asus X450', 'laptop asus.jpg', 'LA123', 'AS123', 4000000, 5500000, 10, 'PM003'),
('PB004', 'Dell Vostro', 'laptop dell.jpg', 'LA123', 'DE123', 6800000, 8300000, 4, 'PM004'),
('PB005', 'Dell V500', 'laptop dell2.jpg', 'LA123', 'DE123', 5500000, 7000000, 5, 'PM005'),
('PB006', 'Toshiba Satellite 100', 'laptop toshiba.jpg', 'LA123', 'TO123', 7900000, 9200000, 4, 'PM002'),
('PB007', 'Flashdisk Sony 8 GB', 'fd sony.jpg', 'HF123', 'SO123', 90000, 120000, 10, 'PM004'),
('PB008', 'Flashdisk Sony 4 GB', 'fd sony2.jpg', 'HF123', 'SO123', 65000, 90000, 15, 'PM001'),
('PB009', 'Macintosh', 'pc apple.jpg', 'KO123', 'AP123', 15000000, 17000000, 4, 'PM001'),
('PB010', 'Macintosh Retina Display', 'pc apple2.jpg', 'KO123', 'AP123', 19000000, 23000000, 3, 'PM002'),
('PB011', 'Printer Sony X500', 'printer sony.jpg', 'PR123', 'SO123', 3500000, 4500000, 5, 'PM004'),
('PB012', 'Mouse Pad Apple', 'mousepad apple.jpg', 'AK123', 'AP123', 8000, 15000, 30, 'PM002'),
('PB013', 'Tablet Dell', 'tablet dell.jpg', 'TA123', 'DE123', 1700000, 2400000, 9, 'PM004'),
('PB014', 'Monitor Acer 21"', 'monitor acer.jpg', 'MO123', 'AC123', 1200000, 1900000, 6, 'PM005'),
('PB015', 'Mouse Pad Asus', 'mousepad asus.jpg', 'AK123', 'AS123', 6000, 11000, 25, 'PM001'),
('PB016', 'iPad 5 Mini', 'tablet apple.jpg', 'TA123', 'AP123', 6900000, 8200000, 9, 'PM003'),
('PB017', 'Tablet Toshiba', 'tablet toshiba.jpg', 'TA123', 'TO123', 2100000, 2500000, 7, 'PM001'),
('PB018', 'Printer Dell X100', 'printer dell2.jpg', 'PR123', 'DE123', 1550000, 1700000, 7, 'PM005'),
('PB019', 'Printer Dell X500', 'printer dell.jpg', 'PR123', 'DE123', 2400000, 2700000, 5, 'PM002'),
('PB020', 'Acer Smart PC', 'pc acer2.jpg', 'KO123', 'AC123', 8000000, 8700000, 8, 'PM002'),
('PB021', 'Screen Guard Apple', 'aksesoris apple.jpg', 'AK123', 'AP123', 6000, 10000, 35, 'PM003'),
('PB022', 'Sony Smart PC', 'pc sony2.jpg', 'KO123', 'SO123', 12000000, 12900000, 5, 'PM005'),
('PB023', 'Flashdisk Toshiba 8 GB', 'fd toshiba.jpg', 'HF123', 'TO123', 90000, 120000, 20, 'PM002'),
('PB024', 'Flashdisk Toshiba 16 GB', 'fd toshiba2.jpg', 'HF123', 'TO123', 210000, 240000, 15, 'PM005'),
('PB025', 'Harddisk Asus V 500 GB', 'hd asus.jpg', 'HF123', 'AS123', 800000, 1000000, 5, 'PM003'),
('PB026', 'Monitor Dell 32"', 'monitor dell.jpg', 'MO123', 'DE123', 1400000, 1750000, 4, 'PM003'),
('PB027', 'Monitor Asus 32" Touch Screen', 'monitor asus2.jpg', 'MO123', 'AS123', 2500000, 2800000, 3, 'PM003'),
('PB028', 'Monitor Asus 21"', 'monitor asus.jpg', 'MO123', 'AS123', 1200000, 1500000, 5, 'PM004'),
('PB029', 'Acer Pc', 'pc acer.jpg', 'KO123', 'AC123', 4800000, 5200000, 9, 'PM004'),
('PB030', 'Screen Guard Dell', 'aksesoris dell.jpg', 'AK123', 'DE123', 7000, 11000, 25, 'PM003');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_karyawan`
--

CREATE TABLE IF NOT EXISTS `tabel_karyawan` (
  `kode_karyawan` char(5) NOT NULL,
  `nama_karyawan` varchar(25) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_karyawan`
--

INSERT INTO `tabel_karyawan` (`kode_karyawan`, `nama_karyawan`, `gambar`, `alamat`, `no_hp`) VALUES
('KSC01', 'Didik Sazali', 'didik.jpg', 'Bengkalis', '082170002021'),
('KSC02', 'Didit', 'didik.jpg', 'Jakarta', '081277896391'),
('KSC03', 'Bro', 'didik.jpg', 'Bali', '081266451234'),
('KSC04', 'Bray', 'didik.jpg', 'Bengkulu', '082345112345'),
('KSC05', 'bangke', 'DSC_2192.JPG', 'rumah', '12100991');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kategori`
--

CREATE TABLE IF NOT EXISTS `tabel_kategori` (
  `kode_kategori` char(5) NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_kategori`
--

INSERT INTO `tabel_kategori` (`kode_kategori`, `kategori`) VALUES
('AK123', 'Aksesoris'),
('HF123', 'Harddisk & Flashdisk'),
('KO123', 'Komputer'),
('LA123', 'Laptop'),
('MO123', 'Monitor'),
('PR123', 'Printer'),
('TA123', 'Tablet');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pelanggan`
--

CREATE TABLE IF NOT EXISTS `tabel_pelanggan` (
  `kode_pelanggan` char(5) NOT NULL,
  `nama_pelanggan` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pelanggan`
--

INSERT INTO `tabel_pelanggan` (`kode_pelanggan`, `nama_pelanggan`, `alamat`, `no_hp`) VALUES
('PL001', 'Didik Sazali', 'Jl. Panglima Minal', '082170002021'),
('PL002', 'Muhammad Alfat', 'Jl. Bantan', '082314157890'),
('PL003', 'Ridwan Kamil', 'Bandung', '082355711291'),
('PL004', 'roy suryo', 'geng', '081911223344');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pemasok`
--

CREATE TABLE IF NOT EXISTS `tabel_pemasok` (
  `kode_pemasok` char(5) NOT NULL DEFAULT '',
  `pemasok` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pemasok`
--

INSERT INTO `tabel_pemasok` (`kode_pemasok`, `pemasok`, `alamat`, `no_hp`) VALUES
('PM001', 'Tekno Media Perkasa', 'Jl. Hayam Wuruk', '081123146621'),
('PM002', 'Sinema Art 12', 'Jakarta', '082170002020'),
('PM003', 'Tekno Media', 'Bali', '082219314491'),
('PM004', 'Anomedia 10', 'Mowkow', '082188001234'),
('PM005', 'Maju Terus Bro', 'Bandung', '081266451234'),
('PM006', 'Pantang Mundur 1', 'Bandung', '083451229981'),
('PM007', 'sazali', 'bengkalis', '081234567890'),
('PM008', 'AD11', 'Riau12', '089912123434');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_penjualan`
--

CREATE TABLE IF NOT EXISTS `tabel_penjualan` (
  `resi_penjualan` char(5) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(3) NOT NULL,
  `kode_barang` char(5) NOT NULL,
  `kode_pelanggan` char(5) NOT NULL,
  `kode_karyawan` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_penjualan`
--

INSERT INTO `tabel_penjualan` (`resi_penjualan`, `tanggal`, `jumlah`, `kode_barang`, `kode_pelanggan`, `kode_karyawan`) VALUES
('PJ001', '2015-05-19', 10, 'PB001', 'PL001', 'KSC01'),
('PJ002', '2015-05-19', 10, 'PB001', 'PL003', 'KSC02'),
('PJ003', '2015-12-06', 15, 'PB030', 'PL004', 'KSC02');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pesanan`
--

CREATE TABLE IF NOT EXISTS `tabel_pesanan` (
  `id` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `kode_barang` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pesanan`
--

INSERT INTO `tabel_pesanan` (`id`, `tanggal`, `nama`, `no_hp`, `email`, `kota`, `alamat`, `kode_pos`, `kode_barang`) VALUES
('PS001', '2015-05-19', 'DAMURA123', '123456', 'danganom.rumada48@gmail.com', 'bandung', 'Jl. Baru', 1231, 'PB005');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_produsen`
--

CREATE TABLE IF NOT EXISTS `tabel_produsen` (
  `kode_produsen` char(5) NOT NULL,
  `produsen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_produsen`
--

INSERT INTO `tabel_produsen` (`kode_produsen`, `produsen`) VALUES
('AC123', 'Acer'),
('AP123', 'Apple'),
('AS123', 'Asus'),
('DE123', 'Dell'),
('SO123', 'Sony'),
('TO123', 'Toshiba');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE IF NOT EXISTS `tbllogin` (
  `username` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`username`, `password`) VALUES
('admin', '21232f297a');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'admin'),
('sinto ', '958f62f9f8b7f348d08943189fda3b15', 'Sinto Gendeng', 'user'),
('joko', '4e5ad0dc4d478726661c8c2b3ea31777', 'Joko Sembung', 'user'),
('wiro', '7577bfe4fecd40c43e6140344d90ce0e', 'Wiro Sableng', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_barang`
--
ALTER TABLE `tabel_barang`
 ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
 ADD PRIMARY KEY (`kode_karyawan`);

--
-- Indexes for table `tabel_kategori`
--
ALTER TABLE `tabel_kategori`
 ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `tabel_pelanggan`
--
ALTER TABLE `tabel_pelanggan`
 ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indexes for table `tabel_pemasok`
--
ALTER TABLE `tabel_pemasok`
 ADD PRIMARY KEY (`kode_pemasok`);

--
-- Indexes for table `tabel_penjualan`
--
ALTER TABLE `tabel_penjualan`
 ADD PRIMARY KEY (`resi_penjualan`);

--
-- Indexes for table `tabel_pesanan`
--
ALTER TABLE `tabel_pesanan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_produsen`
--
ALTER TABLE `tabel_produsen`
 ADD PRIMARY KEY (`kode_produsen`);

--
-- Indexes for table `tbllogin`
--
ALTER TABLE `tbllogin`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
