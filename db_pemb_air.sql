-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 04:17 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pemb_air`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bulan`
--

CREATE TABLE `tb_bulan` (
  `id_bulan` char(3) NOT NULL,
  `nama_bulan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bulan`
--

INSERT INTO `tb_bulan` (`id_bulan`, `nama_bulan`) VALUES
('A', 'Januari'),
('B', 'Februari'),
('C', 'Maret'),
('D', 'April'),
('E', 'Mei'),
('F', 'Juni'),
('G', 'Juli'),
('H', 'Agustus'),
('I', 'September'),
('J', 'Oktober'),
('K', 'November'),
('L', 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `tb_foto`
--

CREATE TABLE `tb_foto` (
  `id_foto` int(11) NOT NULL,
  `id_tagihan` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_foto`
--

INSERT INTO `tb_foto` (`id_foto`, `id_tagihan`, `foto`) VALUES
(1, 84, 'trx240515-c2d6df11a1.jpg'),
(2, 86, 'trx240516-8f5e68d18c.jpg'),
(3, 85, 'trx240516-a0d59df1a9.jpg'),
(4, 82, 'trx240516-7ff466cb74.jpg'),
(5, 87, 'trx240516-a9c90beeaf.jpg'),
(6, 87, 'trx240516-1f2b4f7f1c.jpg'),
(7, 88, 'trx240517-e9715e8fb6.jpg'),
(8, 88, 'trx240517-c9040d6c01.jpg'),
(9, 89, 'trx240606-d3343b6b46.jpg'),
(10, 90, 'trx240607-6303f31f8b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_info`
--

CREATE TABLE `tb_info` (
  `id_info` int(11) NOT NULL,
  `isi_info` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_info`
--

INSERT INTO `tb_info` (`id_info`, `isi_info`) VALUES
(1, 'Untuk para pelanggan segera membayar tagihan bulan ini. Terimakasih.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_layanan`
--

CREATE TABLE `tb_layanan` (
  `id_layanan` int(11) NOT NULL,
  `layanan` varchar(20) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_layanan`
--

INSERT INTO `tb_layanan` (`id_layanan`, `layanan`, `tarif`) VALUES
(1, 'Layanan Air 1', 1500),
(2, 'Layanan Air 2', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pakai`
--

CREATE TABLE `tb_pakai` (
  `id_pakai` varchar(50) NOT NULL,
  `id_pelanggan` char(15) NOT NULL,
  `bulan` char(3) NOT NULL,
  `tahun` char(4) NOT NULL,
  `awal` int(11) NOT NULL,
  `akhir` int(11) NOT NULL,
  `pakai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pakai`
--

INSERT INTO `tb_pakai` (`id_pakai`, `id_pelanggan`, `bulan`, `tahun`, `awal`, `akhir`, `pakai`) VALUES
('TR2405090001', 'P001', 'A', '2023', 0, 20, 20),
('TR2405090002', 'P002', 'A', '2023', 0, 22, 22),
('TR2405090003', 'P003', 'A', '2023', 0, 32, 32),
('TR2405090004', 'P004', 'A', '2023', 0, 25, 25),
('TR2405090005', 'P007', 'A', '2023', 0, 22, 22),
('TR2405090006', 'P008', 'A', '2023', 0, 20, 20),
('TR2405090007', 'P001', 'B', '2023', 20, 40, 20),
('TR2405100001', 'P001', 'C', '2023', 40, 52, 12),
('TR2405100002', 'P002', 'B', '2023', 22, 40, 18),
('TRX6700045005', 'P008', 'B', '2023', 20, 40, 20),
('TRX6700045045', 'P003', 'B', '2023', 32, 60, 28),
('TRX6700055003', 'P003', 'C', '2023', 75, 102, 27),
('TRX6700066001', 'P004', 'B', '2023', 25, 40, 15),
('TRX670034002', 'P007', 'B', '2023', 22, 40, 18),
('TRX670077001', 'P003', 'B', '2023', 60, 75, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` char(15) NOT NULL,
  `nama_pelanggan` varchar(20) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `no_hp` char(15) NOT NULL,
  `status` char(10) NOT NULL DEFAULT 'Aktif',
  `id_layanan` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `no_hp`, `status`, `id_layanan`, `username`, `password`) VALUES
('P001', 'Andi', 'semarang', 'andi123', 'Aktif', 1, 'andi', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
('P002', 'Budi', 'semarang', '085878526042', 'Aktif', 1, 'budi', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
('P003', 'Candra', 'pati', '123', 'Aktif', 1, 'candra', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
('P004', 'Dedi', 'semarang', '087789987654', 'Aktif', 1, 'dedi', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
('P007', 'Jarvis', 'Kamulan', '0567545', 'Aktif', 2, 'jarvis', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
('P008', 'Friday', 'Kudus', '324343', 'Aktif', 1, 'friday123', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
('P009', 'Sunday Green', 'Kukulma', '0674655656', 'Aktif', 1, 'sunday', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_tagihan` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `uang_bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_tagihan`, `tgl_bayar`, `uang_bayar`, `kembali`) VALUES
(80, '2024-05-09', 30000, 0),
(79, '2024-05-09', 50000, 6000),
(77, '2024-05-09', 50000, 2000),
(75, '2024-05-09', 30000, 0),
(81, '2024-05-09', 50000, 20000),
(76, '2024-05-09', 33000, 0),
(83, '2024-05-10', 30000, 3000),
(78, '2024-05-10', 37500, 0),
(87, '2024-05-16', 36000, 0),
(88, '2024-05-17', 22500, 0),
(89, '2024-06-07', 22500, 0),
(90, '2024-06-07', 40500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `id_pakai` varchar(50) NOT NULL,
  `tagihan` int(11) NOT NULL,
  `status` char(50) NOT NULL DEFAULT 'Belum Bayar',
  `keterangan` varchar(100) NOT NULL,
  `refund` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tagihan`
--

INSERT INTO `tb_tagihan` (`id_tagihan`, `id_pakai`, `tagihan`, `status`, `keterangan`, `refund`) VALUES
(75, 'TR2405090001', 30000, 'Lunas', '', NULL),
(76, 'TR2405090002', 33000, 'Lunas', '', NULL),
(77, 'TR2405090003', 48000, 'Lunas', '', NULL),
(78, 'TR2405090004', 37500, 'Lunas', '', NULL),
(79, 'TR2405090005', 44000, 'Lunas', '', NULL),
(80, 'TR2405090006', 30000, 'Lunas', '', NULL),
(81, 'TR2405090007', 30000, 'Lunas', '', NULL),
(82, 'TR2405100001', 18000, 'Tolak', 'Nominal transfer kurang 10rb, silahkan transfer lagi kekurangannya', NULL),
(83, 'TR2405100002', 27000, 'Lunas', '', NULL),
(85, 'TRX6700045005', 30000, 'Tolak', 'Nominal transfer kurang 10rb, silahkan transfer lagi kekurangannya', NULL),
(87, 'TRX670034002', 36000, 'Lunas', 'Ok', NULL),
(88, 'TRX6700066001', 22500, 'Lunas', 'Ok', NULL),
(89, 'TRX670077001', 22500, 'Lunas', 'Kelebihan bayar 5000', 5000),
(90, 'TRX6700055003', 40500, 'Lunas', 'Ok', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(15) NOT NULL,
  `no_hp` char(13) NOT NULL,
  `no_rek` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `level`, `no_hp`, `no_rek`) VALUES
(1, 'Zainal Arifin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', '085878526022', ''),
(2, 'Arifin Z', 'opt', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Operator', '087789987654', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bulan`
--
ALTER TABLE `tb_bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indexes for table `tb_foto`
--
ALTER TABLE `tb_foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `tb_info`
--
ALTER TABLE `tb_info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `tb_layanan`
--
ALTER TABLE `tb_layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `tb_pakai`
--
ALTER TABLE `tb_pakai`
  ADD PRIMARY KEY (`id_pakai`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `bulan` (`bulan`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `tb_pelanggan_ibfk_1` (`id_layanan`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD KEY `tb_pembayaran_ibfk_1` (`id_tagihan`);

--
-- Indexes for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `id_pelanggan` (`id_pakai`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_foto`
--
ALTER TABLE `tb_foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_info`
--
ALTER TABLE `tb_info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_layanan`
--
ALTER TABLE `tb_layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pakai`
--
ALTER TABLE `tb_pakai`
  ADD CONSTRAINT `tb_pakai_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pakai_ibfk_2` FOREIGN KEY (`bulan`) REFERENCES `tb_bulan` (`id_bulan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD CONSTRAINT `tb_pelanggan_ibfk_1` FOREIGN KEY (`id_layanan`) REFERENCES `tb_layanan` (`id_layanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_tagihan`) REFERENCES `tb_tagihan` (`id_tagihan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
