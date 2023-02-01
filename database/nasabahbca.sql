-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 01, 2023 at 03:41 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nasabahbca`
--

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `id_nasabah` varchar(64) NOT NULL,
  `nik_norek` varchar(64) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(64) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(32) NOT NULL,
  `product_offered` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id_nasabah`, `nik_norek`, `nama`, `jenis_kelamin`, `alamat`, `no_telp`, `product_offered`, `tgl_masuk`) VALUES
('NSBH0002', '327203090902000004', 'Libero et esse nesc', 'Laki-laki', 'Dolor accusamus temp', '082299921720', 'Kredit', '2023-02-01 15:41:20'),
('NSBH0001', '327203090902000006', 'Widdy', 'Laki-laki', 'Bhayangkara', '082299921720', NULL, '2023-02-01 15:25:15'),
('NSBH0003', '327203090902000009', 'Autem in omnis ut pl', 'Laki-laki', 'Ad facilis hic nesci', '082299921720', 'Valas', '2023-02-01 15:36:17');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `nasabah_id` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nominal` int DEFAULT NULL,
  `perihal` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_rekening` varchar(50) DEFAULT NULL,
  `nama_pemegang_rekening` varchar(50) DEFAULT NULL,
  `product_offered` varchar(256) DEFAULT NULL,
  `tanggal_transaksi` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nasabah_id`, `nominal`, `perihal`, `no_rekening`, `nama_pemegang_rekening`, `product_offered`, `tanggal_transaksi`) VALUES
(1, 'NSBH0001', 15000, 'Setoran', '327203090902000004', 'Irfan', NULL, '2023-02-01 15:25:15'),
(2, 'NSBH0001', 25000, 'Pemindahan', '327203090902000004', 'Irfan', NULL, '2023-02-01 15:25:36'),
(3, 'NSBH0001', NULL, 'Kliring\r\n', NULL, NULL, NULL, '2023-02-01 15:25:53'),
(4, 'NSBH0002', NULL, NULL, NULL, NULL, 'KKB', '2023-02-01 15:26:55'),
(5, 'NSBH0002', 13000, 'Tarikan', '327203090902000009', 'Dolor Mit', 'Kredit', '2023-02-01 15:27:39'),
(6, 'NSBH0002', 10000, 'Pemindahan', '327203090902000009', 'Ipsum Lorem', 'Kredit', '2023-02-01 15:28:09'),
(7, 'NSBH0002', 14000, 'Setoran', '327203090902000009', 'Ipsum Lorem', 'Asuransi', '2023-02-01 15:28:32'),
(8, 'NSBH0001', 50000, 'Pemindahan', '327203090902000004', 'Agung', NULL, '2023-02-01 15:30:37'),
(9, 'NSBH0003', NULL, NULL, NULL, NULL, 'Valas', '2023-02-01 15:31:42'),
(10, 'NSBH0003', 10000, 'Setoran', '327203090902000004', 'Dolor Mit', NULL, '2023-02-01 15:32:01'),
(11, 'NSBH0003', 13000, 'Tarikan', '327203090902000004', 'Dolor Mit', 'Kartu Kredit', '2023-02-01 15:36:02'),
(12, 'NSBH0003', 12000, 'Setoran', '327203090902000009', 'Ipsum Lorem', 'Valas', '2023-02-01 15:36:17'),
(13, 'NSBH0001', 50000, 'Tarikan', NULL, NULL, NULL, '2023-02-01 15:37:02'),
(14, 'NSBH0003', 35000, 'Pemindahan', '327203090902000004', 'Irfan', NULL, '2023-02-01 15:37:21'),
(15, 'NSBH0002', NULL, 'Pengubahan Data Nasabah', NULL, NULL, 'Kredit', '2023-02-01 15:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_admin` int NOT NULL,
  `username` varchar(128) NOT NULL,
  `role` enum('teller','admin') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_admin`, `username`, `role`, `password`, `nama`, `date_created`) VALUES
(1, 'admin', 'admin', '$2a$12$dGyWROpeMlbPjXONmLvwdOHG5/v69t.uSheCMIunruG6aSUEo2ZR2', 'Irfan', '2023-01-30 04:44:57'),
(2, 'teller', 'teller', '$2a$12$lQIWrsVqFjeVtH4oqCHLBusd2Q.6tC.bVnWlmqccLRixJkHjTUL1G', 'Widdy', '2023-01-30 04:51:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`nik_norek`),
  ADD UNIQUE KEY `id_nasabah` (`id_nasabah`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `nasabah_id` (`nasabah_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`nasabah_id`) REFERENCES `nasabah` (`id_nasabah`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
