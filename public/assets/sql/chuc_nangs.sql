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
-- Table structure for table `chuc_nangs`
--

CREATE TABLE `chuc_nangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_chuc_nang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chuc_nangs`
--

INSERT INTO `chuc_nangs` (`id`, `ten_chuc_nang`, `ten_group`, `created_at`, `updated_at`) VALUES
(100, 'Tạo Mới product', 'Product', NULL, NULL),
(101, 'Xem Thông Tin sản phẩm', 'Product', NULL, NULL),
(102, 'Đổi Trạng Thái Product', 'Product', NULL, NULL),
(103, 'Xem Chi Tiết Product', 'Product', NULL, NULL),
(104, 'Xóa Product', 'Product', NULL, NULL),
(105, 'Cập Nhật Product', 'Product', NULL, NULL),
(106, 'Tạo Mới Tài Khoản Khách Hàng', 'Tài Khoản Khách', NULL, NULL),
(107, 'Lấy Thông Tin Khách Hàng', 'Tài Khoản Khách', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chuc_nangs`
--
ALTER TABLE `chuc_nangs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chuc_nangs`
--
ALTER TABLE `chuc_nangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
