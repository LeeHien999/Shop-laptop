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
-- Table structure for table `thuong_hieus`
--

CREATE TABLE `thuong_hieus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_thuong_hieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thuong_hieus`
--

INSERT INTO `thuong_hieus` (`id`, `ten_thuong_hieu`, `mo_ta`, `hinh_anh`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'Apple', '<p>apple</p>', 'https://media.designrush.com/inspiration_images/134802/conversions/_1511456315_653_apple-preview.jpg', 1, '2023-09-19 09:18:44', '2023-09-19 09:18:44'),
(2, 'Lenovo', '<p>lenovo</p>', 'https://upload.wikimedia.org/wikipedia/commons/1/1a/Lenovo_Corporate_Logo.png', 1, '2023-09-19 09:19:13', '2023-09-19 09:19:13'),
(3, 'Asus', '<p>asus</p>', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/de/AsusTek-black-logo.png/1200px-AsusTek-black-logo.png', 1, '2023-09-19 09:19:41', '2023-09-19 09:19:41'),
(4, 'Msi', '<p>msi</p>', 'https://upload.wikimedia.org/wikipedia/vi/6/6c/Msi_logo.png', 1, '2023-09-19 09:20:22', '2023-09-19 09:20:22'),
(5, 'Dell', '<p>dell</p>', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Dell_Logo.svg/768px-Dell_Logo.svg.png', 1, '2023-09-19 09:21:48', '2023-09-19 09:21:48'),
(6, 'Acer', '<p>acer</p>', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a1/Acer_Logo.svg/2560px-Acer_Logo.svg.png', 1, '2023-09-19 09:47:01', '2023-09-19 09:47:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `thuong_hieus`
--
ALTER TABLE `thuong_hieus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `thuong_hieus`
--
ALTER TABLE `thuong_hieus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
