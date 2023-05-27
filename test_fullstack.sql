-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2023 at 10:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_fullstack`
--

-- --------------------------------------------------------

--
-- Table structure for table `aturan_gaji`
--

CREATE TABLE `aturan_gaji` (
  `golongan` varchar(1) NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `uang_kehadiran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aturan_gaji`
--

INSERT INTO `aturan_gaji` (`golongan`, `gaji_pokok`, `uang_kehadiran`) VALUES
('A', 4800000, 50000),
('B', 5550000, 100000),
('C', 6400000, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `gaji_karyawan`
--

CREATE TABLE `gaji_karyawan` (
  `golongan` varchar(1) NOT NULL,
  `jumlah_kehadiran` int(11) NOT NULL,
  `jumlah_cuti` int(11) NOT NULL,
  `jam_lembur` int(11) NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gaji_karyawan`
--

INSERT INTO `gaji_karyawan` (`golongan`, `jumlah_kehadiran`, `jumlah_cuti`, `jam_lembur`, `gaji`) VALUES
('A', 22, 22, 2, 5963000);

-- --------------------------------------------------------

--
-- Table structure for table `parking_rates`
--

CREATE TABLE `parking_rates` (
  `id` varchar(255) NOT NULL,
  `jam_masuk` datetime NOT NULL,
  `jam_keluar` datetime NOT NULL,
  `tarif` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parking_rates`
--

INSERT INTO `parking_rates` (`id`, `jam_masuk`, `jam_keluar`, `tarif`, `created_at`) VALUES
('XX', '2023-05-27 00:00:00', '2023-05-27 00:00:00', 1000, '2023-05-27'),
('YY', '2023-05-27 00:00:00', '2023-05-27 00:00:00', 1000, '2023-05-27'),
('ZZZ', '2023-05-23 00:00:00', '2023-05-23 00:00:00', 1000, '2023-05-27'),
('ZZX', '2023-05-23 10:00:00', '2023-05-23 17:00:00', 1000, '2023-05-27'),
('64718b78352b0', '2023-05-23 10:00:00', '2023-05-23 17:00:00', 1000, '2023-05-27'),
('64718c50a9f70', '2023-05-01 11:00:00', '2023-05-31 14:10:00', 1000, '2023-05-27'),
('647199d54ada4', '2023-05-27 10:00:00', '2023-05-27 11:00:00', 2000, '2023-05-27'),
('64719a6d20611', '2023-05-27 13:00:00', '2023-05-27 14:00:00', 2000, '2023-05-27'),
('64719aeb29d24', '2023-05-27 12:12:00', '2023-05-27 12:12:00', 149000, '2023-05-27'),
('64719e3228dc4', '2023-05-27 12:00:00', '2023-05-27 13:00:00', 2000, '2023-05-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aturan_gaji`
--
ALTER TABLE `aturan_gaji`
  ADD PRIMARY KEY (`golongan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
