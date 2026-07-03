-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2026 at 10:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_cucian`
--

CREATE TABLE `daftar_cucian` (
  `id_cucian` int(11) NOT NULL,
  `no_resi` varchar(50) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `berat_laundry` decimal(4,2) NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `tgl_masuk` datetime DEFAULT current_timestamp(),
  `status_cucian` enum('Diproses','Selesai Dicuci') DEFAULT 'Diproses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` int(11) NOT NULL,
  `nama_kasir` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama_kasir`, `email`, `password`) VALUES
(1, 'Siti Aminah', 'siti@laundry.com', '$2y$12$5hGlkmQBG3XenQiRXZqvM.W6y13dLX30F9UHGEw9xPugl8ay/oVFa'),
(2, 'Rian Hidayat', 'rian@laundry.com', '$2y$12$gA2blraazVTD6q1nfDix0.fkotXILazNNNO0ts96xuxG7ONoaCd8y'),
(3, 'Test Kasir', 'test@laundry.com', '$2y$12$cK74KC3BF.r34UYUeaxl6eUacbENGAtraxEXo.ZvsURkH9n1jRRs6'),
(4, 'rou', 'rou@gmail.com', '$2y$12$mOKGe/yoBSXz97/1AlnLEuvFX.8PLu298.MRnY8bkJnjPaRG.O6tK'),
(5, 'Test User', 'test@test.com', '$2y$12$WN5zyyqAmusum9lFU27S5eXDZMhMuPTPcO8eRWLbAsgRth8MZ0sqS'),
(6, 'Dwi', 'Dwi@gmail.com', '$2y$12$Yyh3RtD1FGdiTX41aj6EsOO1jDmN4zVWIz04.Wz2buaW0jX6D1bpK');

-- --------------------------------------------------------

--
-- Table structure for table `paket_laundry`
--

CREATE TABLE `paket_laundry` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga_per_kg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paket_laundry`
--

INSERT INTO `paket_laundry` (`id_paket`, `nama_paket`, `harga_per_kg`) VALUES
(1, 'Cuci + Setrika', 7000),
(2, 'Cuci Kering', 5000),
(3, 'Cuci Saja', 4000),
(4, 'Setrika Aja', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `nomor_wa` varchar(15) NOT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `nomor_wa`, `alamat`) VALUES
(1, 'Ahmad Fauzi', '081234567890', 'Jl. Merpati No. 12, Mataram'),
(2, 'Rina Amanda', '087765432100', 'Kost Bahagia Room 4, Pagutan'),
(3, 'Andi Wijaya', '081900112233', 'Perumahan Asri Blok C, Ampenan'),
(4, 'Ahmad Test', '081234567890', 'Jl Test No 1'),
(5, 'Budi Lestari', '087712345678', 'Perum Griya Asri Blok B 5'),
(6, 'Rou', '087786767333333', 'Perumahan'),
(7, 'DWI', '098198181', 'Gebang'),
(8, 'Dwi 1', '03828284', 'Baru'),
(9, 'idddb', '9173701', 'ffqouf'),
(10, 'qdhqhd', '4232354', 'qwnfjqf'),
(11, 'uofufaf', '46342292', 'ifgfff'),
(12, 'ihwhefuwef', '8314844', 'dhqbfebff'),
(13, 'ufuefef', '269343', 'ugcyyi'),
(14, 'cica', '2989482174', 'UODua'),
(15, 'aiaaa', '3824289', 'fkjbcv'),
(16, 'Fia', '284282', 'fwjff'),
(17, 'you', '7486587', 'fyyhvh'),
(18, 'nadna', '123456', 'fuff'),
(19, 'dwi', '1813', 'ufqf'),
(20, 'wijfw', '1804', 'ff w'),
(21, 'wfouf', '28032', 'wjf');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `no_resi` varchar(50) NOT NULL,
  `id_cucian` int(11) NOT NULL,
  `nama_pelanggan_arsip` varchar(100) NOT NULL,
  `nomor_wa_arsip` varchar(20) DEFAULT NULL,
  `nama_paket_arsip` varchar(100) NOT NULL,
  `total_biaya_final` int(11) NOT NULL,
  `berat_laundry` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tgl_diambil` datetime DEFAULT current_timestamp(),
  `status_cucian` varchar(20) DEFAULT 'Diproses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `no_resi`, `id_cucian`, `nama_pelanggan_arsip`, `nomor_wa_arsip`, `nama_paket_arsip`, `total_biaya_final`, `berat_laundry`, `tgl_diambil`, `status_cucian`) VALUES
(11, 'LND-20260702-002', 16, 'you', '7486587', 'Setrika Aja', 32000, 0.00, '2026-07-03 05:54:09', 'Selesai Dicuci'),
(12, 'LND-20260702-001', 15, 'Fia', '284282', 'Cuci + Setrika', 35000, 0.00, '2026-07-03 09:29:31', 'Selesai Dicuci'),
(13, 'LND-20260703-002', 18, 'dwi', '1813', 'Cuci Kering', 22500, 4.50, '2026-07-03 09:53:50', 'Selesai'),
(14, 'LND-20260703-003', 20, 'wfouf', '28032', 'Cuci Saja', 28000, 7.00, '2026-07-03 10:17:11', 'Selesai'),
(15, 'LND-20260703-001', 17, 'nadna', '123456', 'Cuci + Setrika', 40600, 5.80, '2026-07-03 10:17:26', 'Selesai'),
(16, 'LND-20260703-002', 19, 'wijfw', '1804', 'Cuci + Setrika', 616000, 88.00, '2026-07-03 10:25:24', 'Selesai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_cucian`
--
ALTER TABLE `daftar_cucian`
  ADD PRIMARY KEY (`id_cucian`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_kasir` (`id_kasir`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `paket_laundry`
--
ALTER TABLE `paket_laundry`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_cucian`
--
ALTER TABLE `daftar_cucian`
  MODIFY `id_cucian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `paket_laundry`
--
ALTER TABLE `paket_laundry`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_cucian`
--
ALTER TABLE `daftar_cucian`
  ADD CONSTRAINT `daftar_cucian_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE,
  ADD CONSTRAINT `daftar_cucian_ibfk_2` FOREIGN KEY (`id_kasir`) REFERENCES `kasir` (`id_kasir`) ON DELETE CASCADE,
  ADD CONSTRAINT `daftar_cucian_ibfk_3` FOREIGN KEY (`id_paket`) REFERENCES `paket_laundry` (`id_paket`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
