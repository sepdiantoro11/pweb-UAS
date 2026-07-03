-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2026 at 12:59 PM
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

--
-- Dumping data for table `daftar_cucian`
--

INSERT INTO `daftar_cucian` (`id_cucian`, `no_resi`, `id_pelanggan`, `id_kasir`, `id_paket`, `berat_laundry`, `total_biaya`, `tgl_masuk`, `status_cucian`) VALUES
(1, '', 1, 1, 1, 3.00, 21000, '2026-06-26 14:25:09', 'Diproses'),
(3, '', 4, 1, 1, 3.00, 21000, '2026-07-02 11:02:49', 'Diproses'),
(4, '', 5, 3, 2, 2.50, 12500, '2026-07-02 11:04:03', 'Diproses');

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
(4, 'rou', 'rou@gmail.com', '$2y$12$mOKGe/yoBSXz97/1AlnLEuvFX.8PLu298.MRnY8bkJnjPaRG.O6tK');

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
(6, 'Rou', '087786767333333', 'Perumahan');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `no_resi` varchar(50) NOT NULL,
  `id_cucian` int(11) NOT NULL,
  `nama_pelanggan_arsip` varchar(100) NOT NULL,
  `nama_paket_arsip` varchar(100) NOT NULL,
  `total_biaya_final` int(11) NOT NULL,
  `tgl_diambil` datetime DEFAULT current_timestamp(),
  `status_cucian` varchar(20) DEFAULT 'Diproses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `no_resi`, `id_cucian`, `nama_pelanggan_arsip`, `nama_paket_arsip`, `total_biaya_final`, `tgl_diambil`, `status_cucian`) VALUES
(1, '', 99, 'Budi Utomo', 'Cuci + Setrika', 35000, '2026-06-25 09:30:00', 'Selesai Dicuci'),
(2, '', 100, 'Siti Sarah', 'Setrika Aja', 16000, '2026-06-25 14:15:00', 'Diproses'),
(3, '', 5, 'Rou', 'Cuci + Setrika', 35000, '2026-07-02 12:39:03', 'Diproses'),
(4, '', 2, 'Rina Amanda', 'Cuci Kering', 12500, '2026-07-02 12:39:12', 'Selesai Dicuci');

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
  MODIFY `id_cucian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paket_laundry`
--
ALTER TABLE `paket_laundry`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
