-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2023 at 04:57 AM
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
-- Table structure for table `danh_sach_tai_khoans`
--

CREATE TABLE `danh_sach_tai_khoans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_sinh` date NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ho_va_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_block` int(11) NOT NULL,
  `tinh_trang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `change_password_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkout_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_sach_tai_khoans`
--

INSERT INTO `danh_sach_tai_khoans` (`id`, `email`, `password`, `so_dien_thoai`, `ngay_sinh`, `dia_chi`, `ho_va_ten`, `is_block`, `tinh_trang`, `created_at`, `updated_at`, `active_code`, `change_password_code`, `checkout_code`) VALUES
(2, 'hienlemanh2002@gmail.com', '$2y$10$gAceQ3aeCnRnSt08ZG.scO.fWG2lkZNq33N48maxw6MglBdsHJ1r6', '0377191497', '2023-09-19', 'Quảng ngãi', 'Lê Mạnh Hiền', 0, 1, '2023-09-19 08:48:13', '2023-09-19 19:55:53', NULL, '3551679b-f1cf-4939-9276-4ff3f1f74045', NULL),
(3, 'lemanhhien2002@gmail.com', '$2y$10$3cXh6WTSSjjtd9DjxYa6/e4nsaMY2q5WDJBoQYWmXrGgKUPO4uxja', '0377191497', '2023-09-20', 'QJJAS', 'Lê Van a', 0, 1, '2023-09-19 11:04:50', '2023-09-19 11:06:21', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danh_sach_tai_khoans`
--
ALTER TABLE `danh_sach_tai_khoans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danh_sach_tai_khoans`
--
ALTER TABLE `danh_sach_tai_khoans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
