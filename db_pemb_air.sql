-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 05:36 AM
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
('TR2405090007', 'P001', 'B', '2023', 20, 40, 20);

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
('P008', 'Friday', 'Kudus', '324343', 'Aktif', 1, 'friday123', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

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
(76, '2024-05-09', 33000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `id_pakai` varchar(50) NOT NULL,
  `tagihan` int(11) NOT NULL,
  `status` char(50) NOT NULL DEFAULT 'Belum Bayar',
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tagihan`
--

INSERT INTO `tb_tagihan` (`id_tagihan`, `id_pakai`, `tagihan`, `status`, `foto`) VALUES
(75, 'TR2405090001', 30000, 'Lunas', 'trx240509-28f7303350.jpg'),
(76, 'TR2405090002', 33000, 'Lunas', 'trx240509-83c39e2c74.jpg'),
(77, 'TR2405090003', 48000, 'Lunas', ''),
(78, 'TR2405090004', 37500, 'Belum Bayar', ''),
(79, 'TR2405090005', 44000, 'Lunas', ''),
(80, 'TR2405090006', 30000, 'Lunas', ''),
(81, 'TR2405090007', 30000, 'Lunas', '');

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
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

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
