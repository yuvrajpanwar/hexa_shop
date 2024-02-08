-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2024 at 09:24 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hexa_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `backgrounds`
--

CREATE TABLE `backgrounds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `backgrounds`
--

INSERT INTO `backgrounds` (`id`, `title`, `description`, `image_name`, `created_at`, `updated_at`) VALUES
(10, 'New shoes collection', 'upto 50% off', 'liNkYRwYEizUHltDt3cjzhytjqBPaNTvQSI0Ohn7.jpg', '2023-12-26 23:04:48', '2023-12-26 23:04:48'),
(11, 'Color that suit your style', 'with 30+ color option', 'kmbD9Jb0MGiOkVQf6IL9jhjODP97wf6rOOhDTuMn.jpg', '2023-12-26 23:06:51', '2023-12-26 23:06:51'),
(12, 'Kid\'s toys collection', 'best toy collection', 'UpR5vw0WXbPX8hJyECll0QCIhJHCfKpvukIluQz9.jpg', '2023-12-27 06:08:52', '2023-12-27 06:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(15) NOT NULL,
  `product_id` bigint(15) NOT NULL,
  `quantity` int(15) NOT NULL DEFAULT 1,
  `user_type` enum('registered','not-registered') NOT NULL,
  `user_id` bigint(15) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `quantity`, `user_type`, `user_id`, `created_on`) VALUES
(44, 26, 1, 'not-registered', 8534484287, '2024-01-10 14:28:53'),
(45, 25, 1, 'not-registered', 8534484287, '2024-01-10 14:28:56'),
(49, 25, 1, 'not-registered', 1430217116, '2024-01-15 13:36:38'),
(51, 25, 1, 'not-registered', 8088158168, '2024-01-16 11:22:37'),
(52, 24, 1, 'not-registered', 6429841364, '2024-01-16 13:50:03'),
(53, 4, 1, 'not-registered', 7643283743, '2024-01-16 14:00:43'),
(54, 10, 1, 'not-registered', 3301249002, '2024-01-16 14:53:07'),
(55, 4, 1, 'not-registered', 1701274741, '2024-01-16 17:03:44'),
(56, 4, 1, 'not-registered', 4380899203, '2024-01-16 17:07:30'),
(57, 4, 1, 'not-registered', 8716482621, '2024-01-16 17:08:35'),
(58, 10, 1, 'not-registered', 7148291089, '2024-01-16 18:17:27'),
(59, 4, 1, 'not-registered', 3806499525, '2024-01-18 10:43:51'),
(60, 10, 1, 'not-registered', 6919818488, '2024-01-18 12:23:48'),
(61, 10, 1, 'registered', 28, '2024-01-18 12:28:47'),
(62, 16, 1, 'not-registered', 4389083246, '2024-01-18 12:29:27'),
(63, 17, 1, 'not-registered', 6321788562, '2024-01-18 12:31:07'),
(64, 17, 1, 'not-registered', 3485354661, '2024-01-18 12:32:32'),
(65, 17, 1, 'not-registered', 6158438309, '2024-01-18 12:35:11'),
(66, 17, 1, 'not-registered', 3648372535, '2024-01-18 12:40:37'),
(67, 17, 1, 'not-registered', 3184322269, '2024-01-18 12:43:02'),
(68, 15, 1, 'not-registered', 3184322269, '2024-01-18 12:43:05'),
(69, 4, 1, 'not-registered', 4451808785, '2024-01-18 14:00:07'),
(70, 16, 1, 'not-registered', 5013699902, '2024-01-18 15:00:54'),
(71, 17, 1, 'not-registered', 5013699902, '2024-01-18 15:01:02'),
(72, 4, 1, 'not-registered', 6058299342, '2024-01-18 15:06:18'),
(73, 10, 1, 'not-registered', 6058299342, '2024-01-18 15:06:22'),
(74, 4, 1, 'not-registered', 9917566115, '2024-01-18 17:16:19'),
(75, 10, 1, 'not-registered', 9917566115, '2024-01-18 17:16:23'),
(76, 4, 1, 'not-registered', 8195743938, '2024-01-19 10:21:06'),
(77, 10, 2, 'not-registered', 8195743938, '2024-01-19 10:21:10'),
(78, 11, 3, 'not-registered', 8195743938, '2024-01-19 10:21:13'),
(79, 4, 1, 'not-registered', 6506824643, '2024-01-19 11:03:52'),
(80, 10, 2, 'not-registered', 6506824643, '2024-01-19 11:03:55'),
(81, 11, 1, 'registered', 39, '2024-01-19 11:06:47'),
(82, 18, 1, 'registered', 39, '2024-01-19 11:06:53'),
(83, 4, 1, 'not-registered', 8861254738, '2024-01-19 16:49:22'),
(84, 10, 1, 'not-registered', 9518991455, '2024-01-19 17:02:35'),
(85, 10, 1, 'not-registered', 9825148891, '2024-01-19 17:05:22'),
(86, 11, 1, 'not-registered', 8131883296, '2024-01-19 17:08:00'),
(87, 11, 1, 'registered', 43, '2024-01-19 17:16:47'),
(88, 10, 1, 'not-registered', 1761605554, '2024-01-19 17:17:10'),
(89, 11, 1, 'not-registered', 1761605554, '2024-01-19 17:32:05'),
(90, 10, 1, 'not-registered', 7139587686, '2024-01-19 17:42:11'),
(91, 10, 1, 'not-registered', 7649244284, '2024-01-19 17:45:33'),
(92, 10, 1, 'not-registered', 2341685376, '2024-01-19 17:47:18'),
(93, 10, 1, 'not-registered', 3812536837, '2024-01-19 17:51:33'),
(95, 11, 2, 'not-registered', 9066162482, '2024-01-19 18:40:56'),
(96, 11, 2, 'not-registered', 4135986245, '2024-01-19 18:48:25'),
(97, 11, 3, 'not-registered', 4619386639, '2024-01-19 18:52:50'),
(98, 11, 3, 'not-registered', 7363791583, '2024-01-20 10:20:35'),
(100, 11, 2, 'registered', 52, '2024-01-20 10:52:48'),
(101, 10, 1, 'not-registered', 7663877635, '2024-01-22 13:53:51'),
(148, 30, 1, 'registered', 43, '2024-01-25 17:04:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Enabled','Disabled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Enabled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Men\'s', 'Enabled', NULL, NULL),
(2, 'Women\'s', 'Enabled', NULL, NULL),
(3, 'Kid\'s', 'Enabled', NULL, NULL),
(14, 'Electronics', 'Enabled', '2024-01-25 01:41:35', '2024-01-25 01:41:35'),
(15, 'Furniture', 'Enabled', '2024-01-25 01:42:31', '2024-01-25 01:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'trivi', 'trivi@gmail.com', 8888888888, NULL, '$2y$10$uhod5oe33HHsfOTXISQub.lZmtc.ciImFbsPvEotAyQ1hPy4pNa.K', 'rishivihar', NULL, '2023-08-18 02:40:53', '2023-08-18 02:40:53'),
(5, 'yuvraj', 'userone@gmail.com', 9999999999, NULL, '$2y$10$o8g6FrJ4cfSU1oI3LLlLNuaWVAj1od4ulLgpj9jXo/R6ahSrbxN8a', 'isbt2', NULL, '2023-08-18 02:29:13', '2024-01-06 06:08:59'),
(6, 'usertest', 'usertest@gmail.com', 123456789, NULL, '$2y$10$QFiX0R6LBiA/BscbuczRYeUN1PvmRxebTeVsWLIfVmi06L9MIW2lu', 'address my', NULL, '2024-01-06 02:16:21', '2024-01-06 02:16:21'),
(8, 'asdfgb', 'super@gmail.com', 1111111112, NULL, '$2y$10$ItYz/MPG.Q3MMOjK2sQ4E.QvC9niG5QHySGYk/L1/cAja6/hXJZ2O', 'sdfg', NULL, '2024-01-06 02:23:36', '2024-01-06 02:23:36'),
(10, 'sdfg', 'testname@gmail.com', 3333, NULL, '$2y$10$A9ww9KZaojm4Xflqwg8Bqe/N282S7LrbAycmSpisZTbreony/PzjW', 'G-Block Rishivihar', NULL, '2024-01-15 23:26:27', '2024-01-15 23:26:27'),
(11, 'sdf', 'one@gmail.com', 23454324, NULL, '$2y$10$qU/6Dt.MjoO8S0Edrfr4medFEjDZ5nkaHoeTVTC7y/vOK3ov2rjbG', 'df', NULL, '2024-01-16 00:03:24', '2024-01-16 00:03:24'),
(35, 'fhgdfcdf', 'dfggdfjn@hms.coj', 5433455345, NULL, '$2y$10$DhWVc.vFqW7uvbuxBTgTwe6i/ntTleC7gytO8VBiw22LcnBSAhI2u', 'gfgdgdlijSFAddress', NULL, '2024-01-18 03:01:01', '2024-01-18 03:01:01'),
(36, 'sdfvkjsdnvj', 'klfdsj@gmailc.om', 3523234232, NULL, '$2y$10$BafRFX.xF7C4dTeR0qzE1uT59JjzkHLnAVgMxjjwWGrwybUkmgtEe', 'dfnklsfs rihsivihar', NULL, '2024-01-18 04:01:55', '2024-01-18 04:01:55'),
(37, 'newnewName', 'newnewEmail@gmail.com', 9879456543, NULL, '$2y$10$H5RH/JQbPKy0F8N39E/XW.JVm8CHeyB0dh1ndifUQqsQOL21z2Sv2', 'G-Block Rishivihar', NULL, '2024-01-18 04:08:01', '2024-01-18 04:08:01'),
(38, 'fdghghn', 'dsffdfsddff@gmail.com', 342424242342423, NULL, '$2y$10$Ol6lGPN.rjuq4CuOEj329ubp5Wau4VsxfzBhclbCkM1cfIJ8Kvpca', 'dfsfsfsdfsdsfdsfsf', NULL, '2024-01-18 23:50:05', '2024-01-18 23:50:05'),
(39, 'testName', 'sdfg@gmail.comm', 679587603493, NULL, '$2y$10$5AxPoeqs9W4PRtCYTHHBa.XD0Sk6oZnMQQZuiCbSI0ev7OjD38rt2', 'sdfjsf adfsf', NULL, '2024-01-19 00:05:06', '2024-01-19 00:05:06'),
(40, 'newName', 'newEmail@gmai.com', 93478923874, NULL, '$2y$10$MYaMBJlPYBc5xpwHbJklTe/4YZPJFi2mB.FKEk3MWidfC.6TtZIYG', 'G-Block Rishivihar', NULL, '2024-01-19 05:50:47', '2024-01-19 05:50:47'),
(41, 'asdjahdkdad', 'asjfhuecb@gmail.com', 3457853353, NULL, '$2y$10$RtZj4ghDMq632eZZE8Zl/.UOL8BSQFe7UNg5lRB1udjki8yrfKWJu', 'G-Block Rishivihar', NULL, '2024-01-19 06:03:22', '2024-01-19 06:03:22'),
(42, 'sdaas', 'aa@gmail.com', 9640940965, NULL, '$2y$10$FJ.bbSzjhsZF38fIlHh8fumC2pWNr7XzvI7PZEoFRgAWRbY5mYFLq', 'sdf', NULL, '2024-01-19 06:05:47', '2024-01-19 06:05:47'),
(43, 'aaaaaa', 'a@gmail.com', 90090090, NULL, '$2y$10$MopTUGJOlXhRlQ3Fl4sMyejgp1EIYL8anbWXAMExTL14iNvqPI8si', 'G-Block Rishivihar,a', NULL, '2024-01-19 06:09:06', '2024-01-25 06:03:28'),
(44, 'lkfjsjskjfdkjff', 'shdisduhcsb@gmail.com', 938502024, NULL, '$2y$10$rindChjwvVu9QwZh7rgTLOnBJcX.VdtUENiLp9pni6cNOWw4VvP/q', 'G-Block Rishivihar', NULL, '2024-01-19 06:32:49', '2024-01-19 06:32:49'),
(45, 'idjfj@', 'idjfj@gmail.com', 345793485, NULL, '$2y$10$aBdC0zp2RmytcP.MeMJlZOEuS9aXMC6uIQYGwmTHxDXe/hC1Qb5sq', 'G-Block Rishivihar', NULL, '2024-01-19 06:42:39', '2024-01-19 06:42:39'),
(46, 'jdfskfsjkfjskf', 'jdfskfsjkfjskfW@gmail.com', 999992324, NULL, '$2y$10$nS72tbvSRh5qUEgnmBOZBubDqqs3Uyl0S2zf/5z07l90bWDGHbZKi', '999992324adresss', NULL, '2024-01-19 06:46:13', '2024-01-19 06:46:13'),
(47, 'new name for', 'newnamefor@gmail.com', 8503760345, NULL, '$2y$10$1ruayXJwO5wbcUdcIlIuM.iJp2ZQEEt2zhCL6CCYWnnaOt48wDTX2', 'sbne adress', NULL, '2024-01-19 06:48:01', '2024-01-19 06:48:01'),
(48, 'skfsknvdnfosjiovdvnd asdfsf', 'fjsjfnsnnfvn@gmail.com', 9399403954, NULL, '$2y$10$W3a/dxTreCkyeJcrYRyd.ux2oHKsNXwtaeYpuprR8bW/sCHCXdAAK', 'sjnsnxcvx cxmvnkxcv', NULL, '2024-01-19 06:52:03', '2024-01-19 06:52:03'),
(49, 'pankaj godiyal', 'pankajgodiyal90@gmail.com', 9557926081, NULL, '$2y$10$BjLEDAKsJeKQd3Xl9p9fGOYKTVZdIJrOhizozk3Cd8U9wUjgZoiY2', 'mobbewala', NULL, '2024-01-19 07:42:19', '2024-01-19 07:42:19'),
(50, 'ksdfjjksf gmai', 'jsfksjfdjhnvjf@gmailcmom.com', 898345349863, NULL, '$2y$10$vgsXz.BekZONTx/xPFS0HO2dvSybIp1U1co.8JkQ1rifVXGcqY79m', 'jsfksjfdjhnvjf@gmailcmom.com', NULL, '2024-01-19 07:51:13', '2024-01-19 07:51:13'),
(51, 'hfjbsa@ sdfsf', 'sdfhsbdfssg@gmail.com', 9348560347, NULL, '$2y$10$8JKK38gPXvNBQjZ20rHeuOFYcowT.ql1eVF4Q8MOlAUUKcsh.IEua', 'G-Block Rishivihar sdfsfs', NULL, '2024-01-19 07:53:44', '2024-01-19 07:53:44'),
(52, 'sajan rana', 'sajanrana0001@gmail.com', 100010001, NULL, '$2y$10$eJu2rOqlJZPN5U1eL3de8e0wEm8leuro5M176k/sBryVGqiSCFUBO', 'this is address of sajan rana', NULL, '2024-01-19 23:23:12', '2024-01-19 23:23:12'),
(53, 'shiani panwar', 'shivani@sjkhhjh.com', 889008978988, NULL, '$2y$10$YrUEB1AIkYlc01d4rcmnPOfuE9YkNkUdvs97dPsUJhDamHdyru3d.', 'G-Block Rishivihar', NULL, '2024-01-22 02:54:40', '2024-01-22 02:54:40'),
(55, 'ankush', 'ankush.panwar@witds.com', 398798578, NULL, '$2y$10$hImC9PCxXJSEMZZ1hsPKHuwQdn03xhVMABc/oyM4nfbA90EJEPQx2', 'isbt', NULL, '2024-01-23 03:32:27', '2024-01-23 03:32:27'),
(56, 'saajan rana', 'saajanrana001@gmail.com', 98989898989, NULL, '$2y$10$zb2Me5/M/fnJjleh.gnRSuCQ58ZuloZxmoJ0jKpsPKJyIfda1DW/e', 'kargi chowk', NULL, '2024-01-24 06:49:01', '2024-01-24 06:49:01'),
(57, 'helloName', 'helloEmail@gmail.com', 999999322234, NULL, '$2y$10$nlJKW0ZwhV0Ycq282pQQaeMnDwiiVsvmnvSn.rExQARUW8SXOL9ja', 'G-Block Rishivihar', NULL, '2024-01-25 00:56:02', '2024-02-05 00:18:09'),
(58, 'yuvrajpanwar', 'yuvrajpanwar@witds.com', 4563214562, NULL, '$2y$10$CBR5COpxODFR9VLyE/JKguz5DgtHFPRCgyUrwgQJjFeMoVMFbLJdm', 'G-Block Rishivihar', 'cBTNuL7peKenE8zMFVod5warF3eCk10AOXiDayCKYOO5y7tNSJXc9Gi8vUAO', '2024-01-31 03:20:17', '2024-02-05 00:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_enabled` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `name`, `is_enabled`, `created_at`, `updated_at`) VALUES
(3, 4, '1701158264_71rPbWARRlL._SX679_.jpg', 'yes', '2023-11-28 02:27:44', '2023-11-28 06:21:22'),
(5, 4, '1701158264_71pw5QxvRVL._SX679_.jpg', 'no', '2023-11-28 02:27:44', '2023-11-28 07:17:09'),
(6, 4, '1701158264_81b5cEI0MJL._SX679_.jpg', 'no', '2023-11-28 02:27:44', '2023-11-28 05:58:59'),
(7, 4, '1701163170_71cGw--ovHL._SX679_.jpg', 'yes', '2023-11-28 03:49:30', '2023-11-28 03:49:30'),
(8, 4, '1701163170_91sWzz1WRPL._SX679_.jpg', 'yes', '2023-11-28 03:49:30', '2023-11-28 03:49:30'),
(22, 11, '1701962056_jeans4.webp', 'yes', '2023-12-07 09:44:16', '2023-12-07 09:44:16'),
(23, 11, '1701962059_jeans3.webp', 'yes', '2023-12-07 09:44:19', '2023-12-07 09:44:19'),
(24, 11, '1701962060_jeans2.webp', 'yes', '2023-12-07 09:44:20', '2023-12-07 09:44:20'),
(25, 11, '1701962064_jeans1.webp', 'yes', '2023-12-07 09:44:24', '2023-12-07 09:44:24'),
(26, 13, '1701962094_shoe3.webp', 'yes', '2023-12-07 09:44:54', '2023-12-07 09:44:54'),
(27, 13, '1701962094_shoe1.webp', 'yes', '2023-12-07 09:44:54', '2023-12-07 09:44:54'),
(28, 13, '1701962094_shoe2.webp', 'yes', '2023-12-07 09:44:54', '2023-12-07 09:44:54'),
(29, 13, '1701962094_shoe4.webp', 'yes', '2023-12-07 09:44:54', '2023-12-07 09:44:54'),
(30, 12, '1701962125_track1.webp', 'yes', '2023-12-07 09:45:25', '2023-12-07 09:45:25'),
(31, 12, '1701962125_track2.webp', 'yes', '2023-12-07 09:45:25', '2023-12-07 09:45:25'),
(32, 10, '1701962158_watch5.jpg_2000Wx3000H', 'yes', '2023-12-07 09:45:58', '2023-12-07 09:45:58'),
(33, 10, '1701962158_watch2.jpg_2000Wx3000H', 'yes', '2023-12-07 09:45:58', '2023-12-07 09:45:58'),
(34, 10, '1701962158_watch4.jpg_2000Wx3000H', 'yes', '2023-12-07 09:45:58', '2023-12-07 09:45:58'),
(35, 10, '1701962158_watch3.jpg_2000Wx3000H', 'yes', '2023-12-07 09:45:58', '2023-12-07 09:45:58'),
(36, 10, '1701962158_watch1.jpg_2000Wx3000H', 'yes', '2023-12-07 09:45:58', '2023-12-07 09:45:58'),
(43, 15, '1703652489_big-size-funny-unicorn-stuffed-animal-plush-toy-100cm-40-64-original-imafyzdagshhj4gm.webp', 'yes', '2023-12-26 23:18:09', '2023-12-26 23:18:09'),
(44, 15, '1703652489_big-size-funny-unicorn-stuffed-animal-plush-toy-100-ozee-original-imagey35r9tgahf8.webp', 'yes', '2023-12-26 23:18:09', '2023-12-26 23:18:09'),
(45, 15, '1703652489_big-size-funny-unicorn-stuffed-animal-plush-toy-100cm-40-64-original-imafyzdagcabtezf.webp', 'yes', '2023-12-26 23:18:09', '2023-12-26 23:18:09'),
(46, 16, '1703652560_bear.webp', 'yes', '2023-12-26 23:19:20', '2023-12-26 23:19:20'),
(47, 17, '1703652611_91-cm-panda-89-009-teddy-bear-original-imafcuqqvuyzczsj.webp', 'yes', '2023-12-26 23:20:11', '2023-12-26 23:20:11'),
(48, 17, '1703652611_panda.webp', 'yes', '2023-12-26 23:20:11', '2023-12-26 23:20:11'),
(49, 19, '1703654964_whiteshirt2.webp', 'yes', '2023-12-26 23:59:24', '2023-12-26 23:59:24'),
(50, 19, '1703654964_wshirt.webp', 'yes', '2023-12-26 23:59:24', '2023-12-26 23:59:24'),
(51, 19, '1703654964_whiteshirt3.webp', 'yes', '2023-12-26 23:59:24', '2023-12-26 23:59:24'),
(52, 18, '1703655000_combo.webp', 'yes', '2023-12-27 00:00:00', '2023-12-27 00:00:00'),
(53, 22, '1703655266_boot.webp', 'yes', '2023-12-27 00:04:26', '2023-12-27 00:04:26'),
(54, 22, '1703655266_hero-boot-321-9-aadi-tan-original-imaev4r6yjwqzy5s-bb.webp', 'yes', '2023-12-27 00:04:26', '2023-12-27 00:04:26'),
(55, 21, '1703655302_black3.webp', 'yes', '2023-12-27 00:05:02', '2023-12-27 00:05:02'),
(56, 21, '1703655302_black2.webp', 'yes', '2023-12-27 00:05:02', '2023-12-27 00:05:02'),
(57, 21, '1703655302_black.webp', 'yes', '2023-12-27 00:05:02', '2023-12-27 00:05:02'),
(58, 24, '1703655865_tshirt.webp', 'yes', '2023-12-27 00:14:25', '2023-12-27 00:14:25'),
(59, 23, '1703655886_tomandjerry.webp', 'yes', '2023-12-27 00:14:46', '2023-12-27 00:14:46'),
(60, 23, '1703655886_tomj.webp', 'yes', '2023-12-27 00:14:46', '2023-12-27 00:14:46'),
(61, 23, '1703655886_tom.webp', 'yes', '2023-12-27 00:14:46', '2023-12-27 00:14:46'),
(62, 25, '1703655979_l-jc22-hd-fs-black-jmc-pckt-jump-cuts-original-imagg3yxfk48y7nt.webp', 'yes', '2023-12-27 00:16:19', '2023-12-27 00:16:19'),
(63, 25, '1703655979_l-jc22-hd-fs-black-jmc-pckt-jump-cuts-original-imagg3yxshqtv3dk.webp', 'yes', '2023-12-27 00:16:19', '2023-12-27 00:16:19'),
(64, 26, '1703656081_m-no-bmwj011000-5-dollar-original-imaguu86faavvu6r.webp', 'yes', '2023-12-27 00:18:01', '2023-12-27 00:18:01'),
(65, 26, '1703656081_m-no-bmwj011000-5-dollar-original-imaguu86b4avjfuk.webp', 'yes', '2023-12-27 00:18:01', '2023-12-27 00:18:01'),
(66, 26, '1703656081_m-no-bmwj011000-5-dollar-original-imaguu86atexzeyz.webp', 'yes', '2023-12-27 00:18:01', '2023-12-27 00:18:01'),
(68, 27, '1706163828_black_dress.webp', 'yes', '2024-01-25 00:53:48', '2024-01-25 00:53:48'),
(69, 27, '1706163899_black_dress_back.webp', 'yes', '2024-01-25 00:54:59', '2024-01-25 00:54:59'),
(70, 28, '1706164110_purple_dress.webp', 'yes', '2024-01-25 00:58:30', '2024-01-25 00:58:30'),
(71, 28, '1706164110_purple_dress_back.webp', 'yes', '2024-01-25 00:58:30', '2024-01-25 00:58:30'),
(72, 31, '1706167168_bed.webp', 'yes', '2024-01-25 01:49:28', '2024-01-25 01:49:28'),
(73, 30, '1706167198_xiomi 11i.webp', 'yes', '2024-01-25 01:49:58', '2024-01-25 01:49:58'),
(74, 30, '1706167198_xiomi 11i back.webp', 'yes', '2024-01-25 01:49:58', '2024-01-25 01:49:58'),
(75, 29, '1706167230_galaxy s24.webp', 'yes', '2024-01-25 01:50:30', '2024-01-25 01:50:30'),
(76, 29, '1706167230_galaxy s24 back.webp', 'yes', '2024-01-25 01:50:30', '2024-01-25 01:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_08_07_054425_add_admin_type_to_users', 2),
(7, '2023_08_09_110754_create_customers_table', 3),
(8, '2023_08_09_093305_create_orders_table', 4),
(9, '2023_08_09_093412_create_categories_table', 5),
(10, '2023_11_02_073731_create_images_table', 6),
(11, '2023_11_10_090627_create_permission_tables', 7),
(12, '2023_12_26_093023_create_backgrounds_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\Models\\User', 33),
(6, 'App\\Models\\User', 32);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `razorpay_order_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razorpay_payment_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razorpay_signature` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `special_notes` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` int(20) NOT NULL,
  `payment_method` enum('cod','gateway') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` enum('paid','not_paid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_paid',
  `order_status` enum('Processing','Shipped','Out for delivery','Delivered','Cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Processing',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `razorpay_order_id`, `razorpay_payment_id`, `razorpay_signature`, `customer_id`, `name`, `email`, `phone`, `address`, `special_notes`, `total_amount`, `payment_method`, `payment_status`, `order_status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 57, 'helloName', 'helloEmail@gmail.com', '999999322234', 'G-Block Rishivihar', NULL, 7705, 'cod', 'not_paid', 'Processing', '2024-01-25 01:39:33', '2024-01-25 01:39:33'),
(2, NULL, NULL, NULL, 57, 'helloName', 'helloEmail@gmail.com', '999999322234', 'G-Block Rishivihar', NULL, 40000, 'cod', 'not_paid', 'Shipped', '2024-01-25 01:51:17', '2024-01-25 02:11:57'),
(3, 'order_NX5XaqmNV73ykG', 'pay_NX5YFzfHYK9Gny', 'b5bb364ff3c3ad3cd42fac6f4234b17bf993e83a319337468efcd0c4a4682824', 57, 'helloName', 'helloEmail@gmail.com', '999999322234', 'G-Block Rishivihar', NULL, 33624, 'gateway', 'paid', 'Processing', '2024-01-25 01:52:53', '2024-02-05 00:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `price` int(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `quantity`, `total`) VALUES
(1, 1, 16, 680, 1, 680),
(2, 1, 4, 345, 2, 690),
(3, 1, 15, 345, 3, 1035),
(4, 1, 10, 950, 1, 950),
(5, 1, 22, 600, 1, 600),
(6, 1, 12, 550, 1, 550),
(7, 1, 28, 600, 2, 1200),
(8, 1, 27, 500, 4, 2000),
(9, 2, 30, 22000, 1, 22000),
(10, 2, 31, 18000, 1, 18000),
(11, 3, 10, 950, 10, 9500),
(12, 3, 27, 500, 31, 15500),
(13, 3, 17, 784, 11, 8624);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(16, 'View Order', 'web', 'Order', '2023-11-24 02:13:45', '2023-11-24 02:13:45'),
(17, 'Add Order', 'web', 'Order', '2023-11-24 02:13:52', '2023-11-24 02:13:52'),
(18, 'Update Order', 'web', 'Order', '2023-11-24 02:13:58', '2023-11-24 02:13:58'),
(19, 'Delete Order', 'web', 'Order', '2023-11-24 02:14:03', '2023-11-24 02:14:03'),
(20, 'View Product', 'web', 'Product', '2023-11-24 02:14:13', '2023-11-24 02:14:13'),
(21, 'Add Product', 'web', 'Product', '2023-11-24 02:14:29', '2023-11-24 02:14:29'),
(22, 'Update Product', 'web', 'Product', '2023-11-24 02:51:27', '2023-11-24 02:51:27'),
(23, 'Delete Product', 'web', 'Product', '2023-11-24 02:51:36', '2023-11-24 02:51:36'),
(24, 'View Customer', 'web', 'Customer', '2023-11-24 02:51:45', '2023-11-24 02:51:45'),
(25, 'Add Customer', 'web', 'Customer', '2023-11-24 02:51:51', '2023-11-24 02:51:51'),
(26, 'Update Customer', 'web', 'Customer', '2023-11-24 02:52:19', '2023-11-24 02:52:19'),
(27, 'Delete Customer', 'web', 'Customer', '2023-11-24 02:52:28', '2023-11-24 02:52:28'),
(28, 'View Sales', 'web', 'Sales', '2023-11-24 02:52:46', '2023-11-24 02:52:46'),
(29, 'Add Sales', 'web', 'Sales', '2023-11-24 02:52:52', '2023-11-24 02:52:52'),
(30, 'Update Sales', 'web', 'Sales', '2023-11-24 02:54:22', '2023-11-24 02:54:22'),
(31, 'Delete Sales', 'web', 'Sales', '2023-11-24 02:54:28', '2023-11-24 02:54:28'),
(32, 'View Users', 'web', 'Users', '2023-11-24 02:54:33', '2023-11-24 02:54:33'),
(33, 'Add Users', 'web', 'Users', '2023-11-24 02:54:39', '2023-11-24 02:54:39'),
(34, 'Update Users', 'web', 'Users', '2023-11-24 02:54:50', '2023-11-24 02:54:50'),
(35, 'Delete Users', 'web', 'Users', '2023-11-24 02:54:56', '2023-11-24 02:54:56'),
(36, 'View Role', 'web', 'Role', '2023-11-24 02:55:10', '2023-11-24 02:55:10'),
(37, 'Add Role', 'web', 'Role', '2023-11-24 02:55:15', '2023-11-24 02:55:15'),
(38, 'Update Role', 'web', 'Role', '2023-11-24 02:55:20', '2023-11-24 02:55:20'),
(39, 'Delete Role', 'web', 'Role', '2023-11-24 02:55:26', '2023-11-24 02:55:26'),
(44, 'View Report', 'web', 'Report', '2023-11-24 02:56:04', '2023-11-24 02:56:04'),
(46, 'View Category', 'web', 'Category', '2023-11-28 06:47:34', '2023-11-28 06:47:34'),
(47, 'Add Category', 'web', 'Category', '2023-11-28 07:03:43', '2023-11-28 07:03:43'),
(48, 'Update Category', 'web', 'Category', '2023-11-29 03:38:17', '2023-11-29 03:38:17'),
(49, 'Delete Category', 'web', 'Category', '2023-11-29 03:38:27', '2023-11-29 03:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('sold','available','sale') COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(50) NOT NULL DEFAULT 0,
  `is_enabled` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `is_deleted` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `status`, `views`, `is_enabled`, `is_deleted`, `created_at`, `updated_at`, `size`) VALUES
(4, 'Shirt', 'black shirt', 345, 1, 'sold', 18, 'yes', 'no', '2023-08-16 03:20:51', '2024-01-29 06:06:05', '32'),
(10, 'watch', 'watch for men', 950, 1, 'available', 38, 'yes', 'no', '2023-12-07 09:39:52', '2024-01-29 06:05:48', '3'),
(11, 'jeans', 'jeans for men slim fit', 342, 1, 'available', 10, 'yes', 'no', '2023-12-07 09:40:23', '2024-01-29 06:06:24', '34'),
(12, 'track pant', 'track pant for man', 550, 1, 'available', 8, 'yes', 'no', '2023-12-07 09:40:46', '2024-01-29 01:39:56', '34'),
(13, 'shoes', 'shoes for man', 700, 1, 'available', 5, 'yes', 'no', '2023-12-07 09:41:16', '2024-01-29 01:40:20', '6'),
(15, 'Unicorn', 'soft toy ajsdfksf dfsk dfs', 345, 3, 'sold', 16, 'yes', 'no', '2023-12-26 23:17:46', '2024-01-29 00:40:51', '4 feet'),
(16, 'bear', 'soft toy', 680, 3, 'available', 17, 'yes', 'no', '2023-12-26 23:18:58', '2024-01-29 02:55:27', '3feet'),
(17, 'panda', 'soft toy', 784, 3, 'sale', 7, 'yes', 'no', '2023-12-26 23:19:53', '2023-12-26 23:19:53', '5feet'),
(18, 'Combo shirts', '2 shirts', 800, 1, 'available', 6, 'yes', 'no', '2023-12-26 23:57:39', '2024-01-29 01:40:54', 'xl'),
(19, 'white shirt', 'slim fit shirt', 599, 1, 'sold', 10, 'yes', 'no', '2023-12-26 23:58:14', '2024-01-08 03:44:40', 'xl'),
(21, 'black shoe', 'dark black shoes for men', 900, 1, 'available', 5, 'yes', 'no', '2023-12-27 00:03:26', '2024-01-29 01:40:07', '34'),
(22, 'Boots', 'high sole boots for men , light shoes', 600, 1, 'available', 9, 'yes', 'no', '2023-12-27 00:04:02', '2024-01-30 01:10:37', '9'),
(23, 'Tom and Jerry t-shirt', 't-shirt for men', 400, 1, 'available', 2, 'yes', 'no', '2023-12-27 00:09:36', '2024-01-30 01:17:38', 'L'),
(24, 'T-shirt ganesh', 't-shirt for men', 399, 1, 'sold', 7, 'yes', 'no', '2023-12-27 00:10:04', '2024-01-29 01:41:06', 'xl'),
(25, 'Hood', 'Hoodie for men', 899, 1, 'available', 8, 'yes', 'no', '2023-12-27 00:16:00', '2024-01-29 01:41:10', 'L'),
(26, 'jacket', 'jacket for men man', 999, 1, 'available', 3, 'yes', 'no', '2023-12-27 00:17:33', '2024-01-30 01:12:40', 'xl'),
(27, 'Black dress', 'for women for ladki', 500, 2, 'available', 6, 'yes', 'no', '2024-01-25 00:53:20', '2024-01-30 01:16:35', '38'),
(28, 'Purple dress', 'this is the purple dress for women ladki', 600, 2, 'available', 7, 'yes', 'no', '2024-01-25 00:57:58', '2024-01-30 01:16:18', '39'),
(29, 'Galaxy s24', 'mobile phone', 79000, 14, 'available', 1, 'yes', 'no', '2024-01-25 01:45:24', '2024-01-29 01:15:04', '6in'),
(30, 'xiaomi 11i', 'black color phone mobile', 22000, 14, 'available', 7, 'yes', 'no', '2024-01-25 01:46:22', '2024-01-30 01:09:59', '6.5in'),
(31, 'Kendalwood Furniture Modern Home Furniture | Bed for Living Room', 'bed for living room', 18000, 15, 'available', 1, 'yes', 'no', '2024-01-25 01:49:13', '2024-01-29 01:08:45', 'large');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-11-20 06:05:26', '2023-11-20 06:05:26'),
(3, 'Viewer', 'web', '2023-11-20 06:10:37', '2023-11-20 06:10:37'),
(6, 'Super Admin', 'web', '2023-11-20 06:38:33', '2023-11-20 06:38:33'),
(8, 'Manager', 'web', '2023-11-22 05:58:55', '2023-11-22 05:58:55'),
(9, 'HR', 'web', '2023-11-29 03:31:24', '2023-11-29 03:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(16, 6),
(17, 6),
(18, 6),
(19, 6),
(20, 6),
(21, 6),
(22, 6),
(23, 6),
(24, 6),
(25, 6),
(26, 6),
(27, 6),
(28, 6),
(29, 6),
(30, 6),
(31, 6),
(32, 6),
(33, 6),
(34, 6),
(35, 6),
(36, 6),
(37, 6),
(38, 6),
(39, 6),
(44, 6),
(46, 6),
(47, 6),
(48, 6),
(49, 6);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `employee_name`, `amount`, `payment_date`) VALUES
(1, 'John Doe', '5000.00', '2023-01-01'),
(2, 'Jane Smith', '6000.50', '2023-01-02'),
(3, 'Bob Johnson', '5500.75', '2023-01-03'),
(4, 'Alice Williams', '7000.00', '2023-01-04'),
(5, 'Charlie Brown', '4800.25', '2023-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_type` enum('super_admin','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'super_admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `admin_type`) VALUES
(32, 'User One', 'userone@gmail.com', NULL, '$2y$10$o8g6FrJ4cfSU1oI3LLlLNuaWVAj1od4ulLgpj9jXo/R6ahSrbxN8a', NULL, '2023-11-24 06:25:33', '2023-11-24 06:46:48', 'super_admin'),
(33, 'ViewerUserOne', 'userviewer@gmail.com', NULL, '$2y$10$6N0bod5GQclGwSjGuXS/oOVfxPIalJXwwj/0JGfFUQ87WfcmWEdyi', NULL, '2023-11-25 09:17:25', '2023-11-25 09:21:34', 'super_admin');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(15) NOT NULL,
  `product_id` bigint(15) NOT NULL,
  `user_type` enum('registered','not-registered') NOT NULL,
  `user_id` bigint(15) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `product_id`, `user_type`, `user_id`, `created_on`) VALUES
(19, 25, 'registered', 5, '2024-01-08 14:01:58'),
(21, 10, 'registered', 37, '2024-01-18 15:06:27'),
(22, 4, 'registered', 37, '2024-01-18 15:06:39'),
(23, 11, 'registered', 37, '2024-01-18 15:06:51'),
(24, 4, 'not-registered', 8195743938, '2024-01-19 10:59:23'),
(25, 10, 'registered', 52, '2024-01-20 10:52:39'),
(26, 30, 'registered', 43, '2024-01-25 17:04:29'),
(27, 13, 'registered', 43, '2024-01-25 17:04:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backgrounds`
--
ALTER TABLE `backgrounds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_product_id_foreign` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backgrounds`
--
ALTER TABLE `backgrounds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
