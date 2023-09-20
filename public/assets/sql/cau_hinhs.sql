-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2023 at 04:56 AM
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
-- Table structure for table `cau_hinhs`
--

CREATE TABLE `cau_hinhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_cau_hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cau_hinhs`
--

INSERT INTO `cau_hinhs` (`id`, `ten_cau_hinh`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, '6GB-256GB', 1, '2023-09-19 09:15:18', '2023-09-19 09:15:18'),
(2, '6GB-512GB', 1, '2023-09-19 09:15:27', '2023-09-19 09:15:27'),
(3, '6GB-1TB', 1, '2023-09-19 09:15:34', '2023-09-19 09:15:34'),
(4, '8GB-256GB', 1, '2023-09-19 09:15:51', '2023-09-19 09:15:51'),
(5, '8GB-512GB', 1, '2023-09-19 09:15:57', '2023-09-19 09:15:57'),
(6, '8GB-1TB', 1, '2023-09-19 09:16:08', '2023-09-19 09:16:08'),
(7, '16GB-512GB', 1, '2023-09-19 09:16:24', '2023-09-19 09:16:24'),
(8, '16GB-1TB', 1, '2023-09-19 09:16:33', '2023-09-19 09:16:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cau_hinhs`
--
ALTER TABLE `cau_hinhs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cau_hinhs`
--
ALTER TABLE `cau_hinhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
