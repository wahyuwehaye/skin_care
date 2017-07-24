-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2017 at 07:40 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pa_e-skincare`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `kd_produk` char(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `jml_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_pemesanan`, `kd_produk`, `nama_produk`, `jml_produk`, `harga`) VALUES
(1, 'P002', 'Common skin care misconceptions', 3, 10000),
(1, 'P003', 'Passion Flower Body Spray 100ml', 2, 50000),
(1, 'P005', 'Perfecting Skin Tint', 1, 67000),
(1, 'P009', 'Testing Aja', 1, 45000),
(2, 'P008', 'Jaksdfoj', 1, 9000),
(3, 'P009', 'Testing Aja', 1, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `forum_konsultasi`
--

CREATE TABLE `forum_konsultasi` (
  `id_forum` int(11) NOT NULL,
  `no_konsultasi` int(11) NOT NULL,
  `tgl_post` datetime NOT NULL,
  `komentar` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_konsultasi`
--

INSERT INTO `forum_konsultasi` (`id_forum`, `no_konsultasi`, `tgl_post`, `komentar`, `id_user`) VALUES
(1, 9, '2017-07-24 06:45:37', 'adada', 1),
(2, 9, '2017-07-24 06:49:27', 'sdsdc', 1),
(3, 9, '2017-07-24 06:50:09', 'asas', 1),
(4, 9, '2017-07-24 06:52:27', 'asasw', 1),
(5, 9, '2017-07-24 06:52:46', 'asaswcccc', 1),
(6, 9, '2017-07-24 06:53:12', 'ini baru komentar', 1),
(7, 9, '2017-07-24 06:56:42', 'a =ku kamu dia', 6),
(8, 9, '2017-07-24 07:33:25', 'harus sering belajar', 7),
(9, 10, '2017-07-24 07:35:39', 'ga papa', 7);

-- --------------------------------------------------------

--
-- Table structure for table `jasa_pengiriman`
--

CREATE TABLE `jasa_pengiriman` (
  `id_jasa_pengiriman` int(11) NOT NULL,
  `nama_jasa_pengiriman` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jasa_pengiriman`
--

INSERT INTO `jasa_pengiriman` (`id_jasa_pengiriman`, `nama_jasa_pengiriman`) VALUES
(1, 'JNE'),
(2, 'J&T Express'),
(3, 'POS Indonesia'),
(4, 'TIKI');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `id_jenis_produk` int(11) NOT NULL,
  `nama_jenis_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_produk`
--

INSERT INTO `jenis_produk` (`id_jenis_produk`, `nama_jenis_produk`) VALUES
(1, 'Mosturaizer'),
(2, 'Cream Malam'),
(3, 'Jenis 33');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `id_konsumen` char(11) NOT NULL,
  `id_pemesanan` char(11) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `nama_bank` char(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `status_konfirmasi` varchar(25) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `bukti_pembayaran` text NOT NULL,
  `nomor_resi` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi_pembayaran`
--

INSERT INTO `konfirmasi_pembayaran` (`id_konsumen`, `id_pemesanan`, `atas_nama`, `nama_bank`, `nominal`, `status_konfirmasi`, `alamat_pengiriman`, `bukti_pembayaran`, `nomor_resi`) VALUES
('2', '1', 'Jakta Style', 'BCA', 262000, 'Diterima', 'Komp Panghegar', 'payment_1_12600.png', '1334298239493');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `no_konsultasi` int(11) NOT NULL,
  `tgl_konsultasi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pertanyaan` text NOT NULL,
  `diagnosa` text NOT NULL,
  `id_konsumen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`no_konsultasi`, `tgl_konsultasi`, `pertanyaan`, `diagnosa`, `id_konsumen`) VALUES
(9, '2017-07-23 20:15:14', 'sa', 'sas', 1),
(10, '2017-07-23 20:24:41', 'kenapa sih?', 'air itu dingin?', 1),
(11, '2017-07-23 23:22:01', 'kun anta', 'kaifa haluk', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paket_pengiriman`
--

CREATE TABLE `paket_pengiriman` (
  `id_paket_pengiriman` int(11) NOT NULL,
  `paket_pengiriman` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_jasa_pengiriman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_pengiriman`
--

INSERT INTO `paket_pengiriman` (`id_paket_pengiriman`, `paket_pengiriman`, `harga`, `id_jasa_pengiriman`) VALUES
(1, 'Reg (3-4 Hari)', 5000, 1),
(2, 'Oke (2 Hari)', 15000, 1),
(3, 'Yes (1 Hari)', 20000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `paket_pengiriman` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `status_pembayaran` varchar(50) NOT NULL,
  `tanggal_pemesanan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_konsumen`, `paket_pengiriman`, `ongkir`, `total_biaya`, `status_pembayaran`, `tanggal_pemesanan`) VALUES
(1, 2, 3, 20000, 262000, 'Diterima', '2017-05-18 09:30:25'),
(2, 6, 3, 20000, 29000, 'Belum dibayar', '2017-05-18 23:27:18'),
(3, 1, 3, 20000, 65000, 'Belum dibayar', '2017-07-21 11:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `status` int(11) NOT NULL,
  `grup` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `email`, `nama_lengkap`, `tgl_lahir`, `alamat`, `no_hp`, `status`, `grup`) VALUES
(1, 'dinda', '594280c6ddc94399a392934cac9d80d5', 'dinda@gmail.com', 'Dinda Ayunda', '1997-01-23', 'Sukapura', '0827348348839', 1, 'pegawai'),
(2, 'yudi@gmail.com', 'cb28e00ef51374b841fb5c189b2b91c9', 'yudi@gmail.com', 'Yudi Stpratman', '1989-11-10', 'Bandung', '082378423489', 1, 'konsumen'),
(3, 'junaedi@gmail.com', 'cb28e00ef51374b841fb5c189b2b91c9', 'junaedi@gmail.com', 'Junaedi Ilham', '1997-11-18', 'Bandung', '08234678324', 1, 'konsumen'),
(4, 'testing', '5f4dcc3b5aa765d61d8327deb882cf99', 'testing@gmail.com', 'testing', '1940-01-02', 'adsfasfdsffasfdsf', '082834783242', 1, 'konsumen'),
(5, 'testing2', '5f4dcc3b5aa765d61d8327deb882cf99', 'testing2@gmail.com', 'Testing2', '1952-02-11', 'APa aja', '08234729349', 1, 'konsumen'),
(6, 'nia', '04a481486dd84d7c8bfdfc89d38136a6', 'nia@gmail.com', 'Nia Kurnia', '1943-04-05', 'Jl. Padasuka', '08236423498', 1, 'konsumen'),
(7, 'dokterdinda', '7ccd1e5df2aa33358a4ca560e553e075', 'dokterdinda@gmail.com', 'dokter Dinda Ayunda', '1996-06-05', 'Bandung', '081312555467', 1, 'dokter');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kd_produk` char(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `id_jenis_produk` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `stok` float NOT NULL,
  `min_stok` float NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kd_produk`, `nama_produk`, `id_jenis_produk`, `satuan`, `stok`, `min_stok`, `harga`, `deskripsi`, `gambar`) VALUES
('P001', 'Luminate Triple Action Serum', 3, 'pcs', 100, 10, 3000, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, Vivamus porttitor tincidunt elementum nisi a, euismod rhoncus urna. Curabitur scelerisque vulputate diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat\r\n- Brand : Fos Lighting\r\n- Dimensions : (LXBXH) in cms of...\r\n- Color : Brown\r\n- Material : Wood', 'produk_P001.jpg'),
('P002', 'Common skin care misconceptions', 1, 'pcs', 3, 23, 10000, '', 'produk_P002.jpg'),
('P003', 'Passion Flower Body Spray 100ml', 1, 'pcs', 34, 244, 50000, '', 'produk_P003.jpg'),
('P004', 'Retrinal 0.1 Intensive Cream', 3, 'pcs', 45, 233, 100000, '', 'produk_P004.jpg'),
('P005', 'Perfecting Skin Tint', 2, 'pcs', 56, 300, 67000, '', 'produk_P005.jpg'),
('P006', 'COntoh', 2, 'pcs', 90, 100, 40000, 'zldjlzjfsdjafjsflaksjdfasd\r\nfsdafsda\r\nfsda\r\nfsda\r\nfsad\r\nf\r\n\r\nasdf\r\n', 'produk_P006_587.jpg'),
('p007', 'adslfjsdlj', 3, 'pcs', 23, 2343, 92340, 'asdfsdafa', 'produk_p007_9027.jpg'),
('P008', 'Jaksdfoj', 2, 'pcs', 90, 899, 9000, 'asdfkjsdfjsdlfksdjakf', 'produk_P008_7616.jpg'),
('P009', 'Testing Aja', 3, 'pcs', 70, 100, 45000, 'asdfsdafdfsdafad', 'produk_P009_11129.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`,`kd_produk`);

--
-- Indexes for table `forum_konsultasi`
--
ALTER TABLE `forum_konsultasi`
  ADD PRIMARY KEY (`id_forum`);

--
-- Indexes for table `jasa_pengiriman`
--
ALTER TABLE `jasa_pengiriman`
  ADD PRIMARY KEY (`id_jasa_pengiriman`);

--
-- Indexes for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`id_jenis_produk`);

--
-- Indexes for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`id_konsumen`,`id_pemesanan`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`no_konsultasi`);

--
-- Indexes for table `paket_pengiriman`
--
ALTER TABLE `paket_pengiriman`
  ADD PRIMARY KEY (`id_paket_pengiriman`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kd_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forum_konsultasi`
--
ALTER TABLE `forum_konsultasi`
  MODIFY `id_forum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `jasa_pengiriman`
--
ALTER TABLE `jasa_pengiriman`
  MODIFY `id_jasa_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `id_jenis_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `no_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `paket_pengiriman`
--
ALTER TABLE `paket_pengiriman`
  MODIFY `id_paket_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
