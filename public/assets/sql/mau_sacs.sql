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
-- Table structure for table `mau_sacs`
--

CREATE TABLE `mau_sacs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_mau_sac` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_anh` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mau_sacs`
--

INSERT INTO `mau_sacs` (`id`, `ten_mau_sac`, `hinh_anh`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'Đen', 'https://haycafe.vn/wp-content/uploads/2022/03/background-black-background-den.jpg', 1, '2023-08-23 11:36:35', '2023-08-24 01:19:48'),
(2, 'Đỏ', 'https://antimatter.vn/wp-content/uploads/2022/05/background-do-sang-trong-1.jpg', 1, '2023-08-23 11:40:08', '2023-08-24 01:17:11'),
(4, 'Cam', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRcnk_VQtlNul6nquL14ORwZQ0Yquy5IWmHDQ&usqp=CAU', 1, '2023-08-24 01:28:54', '2023-08-24 01:28:54'),
(5, 'Hồng', 'https://tophinhanhdep.com/wp-content/uploads/2021/10/Plain-Pink-Wallpapers.jpg', 1, '2023-08-24 01:29:27', '2023-08-24 01:29:27'),
(7, 'Trắng', 'https://img.freepik.com/premium-photo/top-view-abstract-paper-texture-background_225709-2718.jpg?w=2000', 1, '2023-08-24 01:43:38', '2023-08-24 01:43:38'),
(8, 'Nâu', 'https://phunugioi.com/wp-content/uploads/2021/11/Background-nau.jpg', 1, '2023-08-24 08:58:38', '2023-08-24 08:58:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mau_sacs`
--
ALTER TABLE `mau_sacs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mau_sacs`
--
ALTER TABLE `mau_sacs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
