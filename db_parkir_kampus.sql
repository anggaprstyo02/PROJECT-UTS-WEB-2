-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2025 at 11:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_parkir_kampus`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_parkir`
--

CREATE TABLE `area_parkir` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  `kampus_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `area_parkir`
--

INSERT INTO `area_parkir` (`id`, `nama`, `kapasitas`, `keterangan`, `kampus_id`) VALUES
(3, 'Area B3', 200, 'Parkir Motor', 3),
(6, 'Parkir A', 900, 'Parkir Mobil & Motor', 2),
(7, 'Area B1', 100, 'Parkir Motor', 3),
(8, 'Area B2', 150, 'Parkir Motor', 3);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `biaya` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `nama`, `biaya`) VALUES
(1, 'Motor', 3000),
(2, 'Mobil', 5000),
(7, 'Sepeda', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `kampus`
--

CREATE TABLE `kampus` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kampus`
--

INSERT INTO `kampus` (`id`, `nama`, `alamat`, `latitude`, `longitude`) VALUES
(2, 'Kampus A', 'Jl. RTM No.5', -100.09, 213),
(3, 'Kampus B', 'Jl. Sudirman No.10', -16.09, 106);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL,
  `merk` varchar(30) DEFAULT NULL,
  `pemilik_id` int(11) DEFAULT NULL,
  `nopol` varchar(20) DEFAULT NULL,
  `thn_beli` int(11) DEFAULT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `jenis_kendaraan_id` int(11) DEFAULT NULL,
  `pengunjung_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `mulai` time DEFAULT NULL,
  `akhir` time DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `biaya` double DEFAULT NULL,
  `kendaraan_id` int(11) DEFAULT NULL,
  `area_parkir_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area_parkir`
--
ALTER TABLE `area_parkir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kampus_id` (`kampus_id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kampus`
--
ALTER TABLE `kampus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jenis_kendaraan` (`jenis_kendaraan_id`),
  ADD KEY `fk_pengunjung` (`pengunjung_id`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kendaraan` (`kendaraan_id`),
  ADD KEY `fk_area_parkir` (`area_parkir_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area_parkir`
--
ALTER TABLE `area_parkir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kampus`
--
ALTER TABLE `kampus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `area_parkir`
--
ALTER TABLE `area_parkir`
  ADD CONSTRAINT `area_parkir_ibfk_1` FOREIGN KEY (`kampus_id`) REFERENCES `kampus` (`id`);

--
-- Constraints for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `fk_jenis_kendaraan` FOREIGN KEY (`jenis_kendaraan_id`) REFERENCES `jenis` (`id`),
  ADD CONSTRAINT `fk_pengunjung` FOREIGN KEY (`pengunjung_id`) REFERENCES `pengunjung` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kendaraan_ibfk_1` FOREIGN KEY (`jenis_kendaraan_id`) REFERENCES `jenis` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_area_parkir` FOREIGN KEY (`area_parkir_id`) REFERENCES `area_parkir` (`id`),
  ADD CONSTRAINT `fk_kendaraan` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraan` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraan` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`area_parkir_id`) REFERENCES `area_parkir` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
