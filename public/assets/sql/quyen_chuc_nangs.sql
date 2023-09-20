-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2023 at 04:58 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopdientu`
--

-- --------------------------------------------------------

--
-- Table structure for table `quyen_chuc_nangs`
--

CREATE TABLE `quyen_chuc_nangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_quyen` int(11) NOT NULL,
  `id_chuc_nang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quyen_chuc_nangs`
--

INSERT INTO `quyen_chuc_nangs` (`id`, `id_quyen`, `id_chuc_nang`, `created_at`, `updated_at`) VALUES
(1, 1, 100, '2023-08-30 03:32:40', '2023-08-30 03:32:40'),
(2, 1, 101, '2023-08-30 03:32:40', '2023-08-30 03:32:40'),
(3, 1, 102, '2023-08-30 03:32:40', '2023-08-30 03:32:40'),
(4, 1, 103, '2023-08-30 03:32:40', '2023-08-30 03:32:40'),
(5, 1, 104, '2023-08-30 03:32:40', '2023-08-30 03:32:40'),
(6, 1, 105, '2023-08-30 03:32:40', '2023-08-30 03:32:40'),
(7, 1, 106, '2023-08-30 03:32:40', '2023-08-30 03:32:40'),
(8, 1, 107, '2023-08-30 03:32:40', '2023-08-30 03:32:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quyen_chuc_nangs`
--
ALTER TABLE `quyen_chuc_nangs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quyen_chuc_nangs`
--
ALTER TABLE `quyen_chuc_nangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
