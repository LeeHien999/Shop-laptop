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
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `cau_hinh_id` int(11) NOT NULL,
  `mau_sac_id` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia_dieu_chinh` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `luot_xem` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `cau_hinh_id`, `mau_sac_id`, `so_luong`, `hinh_anh`, `gia_dieu_chinh`, `created_at`, `updated_at`, `luot_xem`) VALUES
(1, 1, 4, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/a/i/air_m2.png', 18750000, '2023-09-19 09:25:07', '2023-09-19 09:25:07', 0),
(2, 1, 4, 2, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/a/i/air_m2.png', 18750000, '2023-09-19 09:25:07', '2023-09-19 09:25:07', 0),
(3, 1, 4, 4, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/a/i/air_m2.png', 18750000, '2023-09-19 09:25:07', '2023-09-19 09:25:07', 0),
(4, 1, 5, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/a/i/air_m2.png', 20750000, '2023-09-19 09:25:07', '2023-09-19 09:25:07', 0),
(5, 1, 5, 2, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/a/i/air_m2.png', 20750000, '2023-09-19 09:25:07', '2023-09-19 09:25:07', 0),
(6, 1, 5, 4, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/a/i/air_m2.png', 20750000, '2023-09-19 09:25:07', '2023-09-19 09:25:07', 0),
(7, 1, 7, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/a/i/air_m2.png', 22750000, '2023-09-19 09:25:07', '2023-09-19 09:25:07', 0),
(8, 1, 7, 2, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/a/i/air_m2.png', 22750000, '2023-09-19 09:25:07', '2023-09-19 09:25:07', 0),
(9, 2, 7, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/5/h/5h53.png', 17990000, '2023-09-19 09:27:59', '2023-09-19 09:27:59', 0),
(10, 2, 7, 5, 199, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/5/h/5h53.png', 17990000, '2023-09-19 09:27:59', '2023-09-19 10:39:45', 0),
(11, 2, 8, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/5/h/5h53.png', 19990000, '2023-09-19 09:27:59', '2023-09-19 09:27:59', 0),
(12, 2, 8, 5, 199, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/5/h/5h53.png', 19990000, '2023-09-19 09:27:59', '2023-09-19 10:39:45', 0),
(13, 3, 5, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_ng_n_-_2023-06-08t005130.908.png', 13450000, '2023-09-19 09:30:02', '2023-09-19 09:30:02', 0),
(14, 4, 5, 7, 200, 'https://cdn2.cellphones.com.vn/x358,webp,q100/media/catalog/product/a/s/asus_x515ma-br481w.png', 7290000, '2023-09-19 09:33:02', '2023-09-19 09:33:02', 0),
(15, 4, 4, 7, 200, 'https://cdn2.cellphones.com.vn/x358,webp,q100/media/catalog/product/a/s/asus_x515ma-br481w.png', 6990000, '2023-09-19 09:33:02', '2023-09-19 09:33:02', 0),
(16, 5, 5, 7, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/2/h/2h08.png', 19990000, '2023-09-19 09:34:53', '2023-09-19 09:34:53', 0),
(17, 6, 4, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/p/r/pro-m2.jpg', 29690000, '2023-09-19 09:40:12', '2023-09-19 09:40:12', 0),
(18, 6, 4, 7, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/p/r/pro-m2.jpg', 29690000, '2023-09-19 09:40:12', '2023-09-19 09:40:12', 0),
(19, 6, 5, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/p/r/pro-m2.jpg', 33990000, '2023-09-19 09:40:12', '2023-09-19 09:40:12', 0),
(20, 6, 5, 7, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/p/r/pro-m2.jpg', 33990000, '2023-09-19 09:40:12', '2023-09-19 09:40:12', 0),
(21, 6, 7, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/p/r/pro-m2.jpg', 39990000, '2023-09-19 09:40:12', '2023-09-19 09:40:12', 0),
(22, 6, 7, 7, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/p/r/pro-m2.jpg', 39990000, '2023-09-19 09:40:12', '2023-09-19 09:40:12', 0),
(23, 7, 7, 7, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_d_i_5__1.png', 17890000, '2023-09-19 09:41:48', '2023-09-19 09:44:48', 0),
(24, 8, 7, 1, 200, 'https://cdn2.cellphones.com.vn/x358,webp,q100/media/catalog/product/t/e/text_ng_n_21_.png', 14890000, '2023-09-19 09:43:50', '2023-09-19 09:43:50', 0),
(25, 9, 7, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_ng_n_2__1.png', 14990000, '2023-09-19 09:50:36', '2023-09-19 09:50:36', 0),
(26, 10, 4, 7, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/m/a/macbook_mini_m2.png', 19990000, '2023-09-19 09:53:40', '2023-09-19 09:53:40', 0),
(27, 10, 5, 7, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/m/a/macbook_mini_m2.png', 20990000, '2023-09-19 09:53:40', '2023-09-19 09:53:40', 0),
(28, 10, 6, 7, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/m/a/macbook_mini_m2.png', 21990000, '2023-09-19 09:53:40', '2023-09-19 09:53:40', 0),
(29, 10, 7, 7, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/m/a/macbook_mini_m2.png', 22990000, '2023-09-19 09:53:40', '2023-09-19 09:53:40', 0),
(30, 10, 8, 7, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/m/a/macbook_mini_m2.png', 24990000, '2023-09-19 09:53:40', '2023-09-19 09:53:40', 0),
(31, 11, 4, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_ng_n_22__28.png', 11090000, '2023-09-19 09:56:58', '2023-09-19 09:56:58', 0),
(32, 12, 4, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_ng_n_-_2023-06-19t181236.684.png', 12190000, '2023-09-19 09:59:57', '2023-09-19 09:59:57', 0),
(33, 12, 4, 2, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_ng_n_-_2023-06-19t181236.684.png', 12190000, '2023-09-19 09:59:57', '2023-09-19 09:59:57', 0),
(34, 12, 5, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_ng_n_-_2023-06-19t181236.684.png', 13190000, '2023-09-19 09:59:57', '2023-09-19 09:59:57', 0),
(35, 12, 5, 2, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_ng_n_-_2023-06-19t181236.684.png', 13190000, '2023-09-19 09:59:57', '2023-09-19 09:59:57', 0),
(36, 12, 7, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_ng_n_-_2023-06-19t181236.684.png', 15190000, '2023-09-19 09:59:57', '2023-09-19 09:59:57', 0),
(37, 12, 7, 2, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_ng_n_-_2023-06-19t181236.684.png', 15190000, '2023-09-19 09:59:57', '2023-09-19 09:59:57', 0),
(38, 13, 7, 7, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/1/0/10h45_2.png', 18950000, '2023-09-19 10:04:11', '2023-09-19 10:04:11', 0),
(39, 13, 7, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/1/0/10h45_2.png', 18950000, '2023-09-19 10:04:11', '2023-09-19 10:04:11', 0),
(40, 14, 5, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/4/h/4h43.png', 17890000, '2023-09-19 10:06:44', '2023-09-19 10:06:44', 0),
(41, 14, 6, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/4/h/4h43.png', 19890000, '2023-09-19 10:06:44', '2023-09-19 10:06:44', 0),
(42, 14, 7, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/4/h/4h43.png', 20890000, '2023-09-19 10:06:44', '2023-09-19 10:06:44', 0),
(43, 14, 8, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/4/h/4h43.png', 22890000, '2023-09-19 10:06:44', '2023-09-19 10:06:44', 0),
(44, 15, 7, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_d_i_12__1.png', 17490000, '2023-09-19 10:09:17', '2023-09-19 10:09:17', 0),
(45, 16, 7, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_d_i_21_.png', 28890000, '2023-09-19 10:11:18', '2023-09-19 10:11:18', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
