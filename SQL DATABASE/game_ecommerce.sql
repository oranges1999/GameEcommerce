-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 03:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `avatar`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$1P04mTX.5As4MkAvtRd3iOXia4DfP/6O.uQhqlTgpiMKNlRaCrm8.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `admin_id` bigint(20) NOT NULL,
  `status` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug`, `admin_id`, `status`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 'Racing Games', 'racing-games', 1, 1, 'public/IJZHfaF4wrC8xVK0pRDy9ZhcyydV2l9JS8xDr6Wn.jpg', '2023-11-20 04:06:47', '2023-11-20 04:06:47'),
(2, 'Soul-Like', 'soul-like', 1, 1, 'public/EcpVrWH3xTUH4bM6pmgVMCSUN71wnSWm8lS1otLX.jpg', '2023-11-23 08:03:11', '2023-11-23 08:03:11'),
(3, 'Survival', 'survival', 1, 1, 'public/IHmvAc0G0NLovaTL3R9YZGRSKgx2Vdjv52d91dJd.jpg', '2023-11-23 08:03:31', '2023-11-23 08:03:31'),
(4, 'Shooting', 'shooting', 1, 1, 'public/2cwgDlR6BWnJt65TQ7Gx8QXxlM8yZE9YfB0q0hXk.jpg', '2023-11-23 08:03:43', '2023-11-23 08:03:43'),
(5, 'RTS Games', 'rts-games', 1, 1, 'public/gfEKxOXutL5BBHCbuUXaWhDY3JwkzKVml2IrzS2A.jpg', '2023-11-23 08:15:35', '2023-11-23 08:15:35'),
(6, 'Open-world', 'open-world', 1, 1, 'public/3ValxFxMt17BgGrudwSfKn2X4wzzoq0J1GQGvDQd.jpg', '2023-11-23 08:20:24', '2023-11-23 08:20:24'),
(7, 'Stealth', 'stealth', 1, 1, 'public/Lg0r22Kf9ROK4VBbe1awYatItnZKkHP6oTENBimW.jpg', '2023-11-23 08:34:00', '2023-11-23 08:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `score` decimal(8,2) NOT NULL DEFAULT 5.00,
  `comment` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `score`, `comment`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 16, 5.00, '<p>đasadasdsa</p>', '2023-12-04 07:01:45', '2023-12-07 08:39:00', 1),
(2, 1, 16, 5.00, '<p>dsadasdsadsa</p>', '2023-12-04 07:31:14', '2023-12-07 08:39:02', 1),
(3, 1, 16, 1.00, '<p>tệ</p>', '2023-12-04 08:20:19', '2023-12-06 05:07:36', 1),
(4, 1, 2, 5.00, '<p>dsadsadsa</p>', '2023-12-06 06:08:08', '2023-12-07 08:39:04', 1),
(5, 1, 3, 4.00, '<p>dsadsadsa</p>', '2023-12-06 06:18:46', '2023-12-07 08:39:06', 1),
(6, 1, 4, 3.00, '<p>Tạm</p>', '2023-12-07 08:39:30', '2023-12-07 09:15:04', 1),
(7, 1, 5, 2.00, '<p>hơi tệ</p>', '2023-12-07 08:39:43', '2023-12-07 09:15:02', 1),
(8, 1, 6, 1.00, '<p>Siêu tệ</p>', '2023-12-07 08:39:53', '2024-01-05 08:22:33', 0),
(9, 1, 15, 5.00, '<p>oke</p>', '2023-12-29 06:50:31', '2023-12-29 06:50:31', 0),
(10, 1, 15, 5.00, '<p>Ngon</p>', '2023-12-30 06:30:43', '2023-12-30 06:30:43', 0),
(11, 4, 14, 5.00, '<p>Sản phẩm tốt</p>', '2024-01-05 08:02:16', '2024-01-05 08:02:16', 0),
(12, 6, 15, 5.00, '<p>Sản phẩm tốt</p>', '2024-01-05 08:19:18', '2024-01-05 08:22:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logistic`
--

CREATE TABLE `logistic` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) NOT NULL,
  `note` longtext NOT NULL DEFAULT 'Nhập hàng',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logistic`
--

INSERT INTO `logistic` (`id`, `admin_id`, `note`, `created_at`, `updated_at`) VALUES
(10, 1, 'Nhập hàng', '2024-01-05 07:34:19', '2024-01-05 07:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `logistic_details`
--

CREATE TABLE `logistic_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logistic_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `qty` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logistic_details`
--

INSERT INTO `logistic_details` (`id`, `logistic_id`, `product_id`, `qty`, `created_at`, `updated_at`) VALUES
(60, 10, 2, 10.00, '2024-01-05 07:34:19', '2024-01-05 07:34:19'),
(61, 10, 3, 10.00, '2024-01-05 07:34:19', '2024-01-05 07:34:19'),
(62, 10, 4, 10.00, '2024-01-05 07:34:19', '2024-01-05 07:34:19'),
(63, 10, 5, 10.00, '2024-01-05 07:34:19', '2024-01-05 07:34:19'),
(64, 10, 6, 10.00, '2024-01-05 07:34:19', '2024-01-05 07:34:19'),
(65, 10, 7, 10.00, '2024-01-05 07:34:19', '2024-01-05 07:34:19'),
(66, 10, 8, 10.00, '2024-01-05 07:34:19', '2024-01-05 07:34:19'),
(67, 10, 9, 10.00, '2024-01-05 07:34:19', '2024-01-05 07:34:19'),
(68, 10, 10, 10.00, '2024-01-05 07:34:19', '2024-01-05 07:34:19'),
(69, 10, 11, 10.00, '2024-01-05 07:34:19', '2024-01-05 07:34:19'),
(70, 10, 12, 10.00, '2024-01-05 07:34:19', '2024-01-05 07:34:19'),
(71, 10, 13, 10.00, '2024-01-05 07:34:19', '2024-01-05 07:34:19'),
(72, 10, 14, 10.00, '2024-01-05 07:34:19', '2024-01-05 07:34:19'),
(73, 10, 15, 10.00, '2024-01-05 07:34:19', '2024-01-05 07:34:19'),
(74, 10, 16, 10.00, '2024-01-05 07:34:19', '2024-01-05 07:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(27, '2014_10_12_000000_create_users_table', 1),
(28, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(29, '2019_08_19_000000_create_failed_jobs_table', 1),
(30, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(31, '2023_10_31_153433_create_category', 1),
(32, '2023_10_31_153552_create_comments', 1),
(33, '2023_10_31_153558_create_orders', 1),
(34, '2023_10_31_153610_create_order_details', 1),
(35, '2023_10_31_153616_create_product', 1),
(36, '2023_10_31_153638_create_scores', 1),
(37, '2023_10_31_153644_create_statuses', 1),
(38, '2023_10_31_161910_create_admin', 1),
(39, '2023_10_31_175834_alter_admin_table_add_avatar', 1),
(40, '2023_11_16_175351_create_sessions_table', 1),
(41, '2023_11_17_144125_alter_user_tables', 1),
(42, '2023_11_18_133404_alter_order_details_table_add_price', 1),
(43, '2023_11_18_150638_alter_order_table_add_payment', 1),
(44, '2023_11_22_143821_alter_order_table_add_total_column', 2),
(45, '2023_11_28_132124_alter_order_table_add_ward_and_district', 3),
(46, '2023_11_28_132247_alter_user_table_add_ward_and_district', 3),
(47, '2023_11_28_164710_alter_users_table_add_city', 4),
(48, '2023_11_29_150035_alter_order_table_add_city', 5),
(49, '2023_11_29_150148_alter_order_table_add_phone_address', 6),
(50, '2023_12_04_121023_create_comment_table', 7),
(51, '2023_12_04_121313_create_content_table', 7),
(52, '2023_12_04_124608_alter_products_table_add_content', 8),
(53, '2023_12_04_135048_delete_table_comments', 9),
(54, '2023_12_04_135139_create_comments_table', 10),
(55, '2023_12_05_125306_alter_table_comment_add_status', 11),
(56, '2023_12_07_154742_alter_table_user_add_avatar', 12),
(57, '2023_12_07_155915_alter_table_user_add_avatar', 13),
(58, '2023_12_07_161244_alter_table_user_add_avatar', 14),
(59, '2023_12_08_105616_create_logistic_table', 15),
(60, '2023_12_08_110133_create_logistic_details_table', 15),
(61, '2023_12_30_140546_alter_product_table_change_content_data_type', 16),
(62, '2023_12_30_142613_alter_product_table_change_content_data_type', 17),
(63, '2023_12_30_143108_alter_product_table_change_content_data_type', 18),
(64, '2024_01_04_131423_alter_products_table_delete_qty_column', 19),
(65, '2024_01_04_132010_alter_products_table_delete_qty_column', 20);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `status` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_method` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `ward` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `created_at`, `updated_at`, `payment_method`, `total`, `ward`, `district`, `city`, `phone`, `address`) VALUES
(18, 1, 0, '2023-11-22 07:52:52', '2023-11-22 07:52:52', 'VNPAY', '100000', '', '', '', '', ''),
(19, 1, 0, '2023-11-22 08:01:00', '2023-11-22 08:01:00', 'VNPAY', '200000', '', '', '', '', ''),
(20, 1, 0, '2023-11-22 08:08:32', '2023-11-22 08:08:32', 'VNPAY', '100000', '', '', '', '', ''),
(21, 1, 0, '2023-11-22 08:13:19', '2023-11-22 08:13:19', 'VNPAY', '100000', '', '', '', '', ''),
(22, 1, 0, '2023-11-22 08:27:38', '2023-11-22 08:27:38', 'VNPAY', '100000', '', '', '', '', ''),
(23, 1, 0, '2023-11-22 08:28:51', '2023-11-22 08:28:51', 'VNPAY', '200000', '', '', '', '', ''),
(24, 1, 0, '2023-11-22 08:30:38', '2023-11-22 08:30:38', 'VNPAY', '100000', '', '', '', '', ''),
(25, 1, 0, '2023-11-22 08:31:26', '2023-11-22 08:31:26', 'VNPAY', '100000', '', '', '', '', ''),
(26, 1, 0, '2023-11-22 08:36:33', '2023-11-22 08:36:33', 'VNPAY', '100000', '', '', '', '', ''),
(27, 1, 0, '2023-11-22 08:37:09', '2023-11-22 08:37:09', 'VNPAY', '100000', '', '', '', '', ''),
(28, 1, 0, '2023-11-22 08:38:36', '2023-11-22 08:38:36', 'VNPAY', '100000', '', '', '', '', ''),
(29, 1, 0, '2023-11-22 08:38:58', '2023-11-22 08:38:58', 'VNPAY', '100000', '', '', '', '', ''),
(30, 1, 0, '2023-11-22 08:41:03', '2023-11-22 08:41:03', 'VNPAY', '100000', '', '', '', '', ''),
(31, 1, 0, '2023-11-22 08:42:50', '2023-11-22 08:42:50', 'VNPAY', '100000', '', '', '', '', ''),
(32, 1, 0, '2023-11-22 08:44:13', '2023-11-22 08:44:13', 'VNPAY', '100000', '', '', '', '', ''),
(33, 1, 0, '2023-11-22 08:44:30', '2023-11-22 08:44:30', 'VNPAY', '100000', '', '', '', '', ''),
(34, 1, 0, '2023-11-22 08:45:46', '2023-11-22 08:45:46', 'VNPAY', '100000', '', '', '', '', ''),
(35, 1, 0, '2023-11-22 08:46:37', '2023-11-22 08:46:37', 'VNPAY', '100000', '', '', '', '', ''),
(36, 1, 0, '2023-11-22 08:47:04', '2023-11-22 08:47:04', 'VNPAY', '100000', '', '', '', '', ''),
(37, 1, 0, '2023-11-22 08:47:18', '2023-11-22 08:47:18', 'VNPAY', '100000', '', '', '', '', ''),
(38, 1, 0, '2023-11-22 08:55:37', '2023-11-22 08:55:37', 'VNPAY', '100000', '', '', '', '', ''),
(39, 1, 0, '2023-11-22 08:56:44', '2023-11-22 08:56:44', 'VNPAY', '100000', '', '', '', '', ''),
(40, 1, 0, '2023-11-22 08:57:02', '2023-11-22 08:57:02', 'VNPAY', '100000', '', '', '', '', ''),
(41, 1, 0, '2023-11-22 09:10:06', '2023-11-22 09:10:06', 'VNPAY', '100000', '', '', '', '', ''),
(42, 1, 0, '2023-11-22 09:11:16', '2023-11-22 09:11:16', 'VNPAY', '100000', '', '', '', '', ''),
(43, 1, 1, '2023-11-22 09:12:40', '2023-11-23 07:09:43', 'VNPAY', '1000000', '', '', '', '', ''),
(44, 1, 1, '2023-11-22 09:18:44', '2023-11-22 10:30:04', 'VNPAY', '100000', '', '', '', '', ''),
(45, 1, 0, '2023-11-22 09:21:42', '2023-11-22 09:21:42', 'COD', '100000', '', '', '', '', ''),
(46, 1, 1, '2023-11-23 06:48:57', '2023-11-24 01:51:31', 'VNPAY', '100000', '', '', '', '', ''),
(47, 1, 0, '2023-11-23 07:11:22', '2023-11-23 07:11:22', 'VNPAY', '100000', '', '', '', '', ''),
(48, 1, 0, '2023-11-23 07:11:58', '2023-11-23 07:11:58', 'COD', '100000', '', '', '', '', ''),
(49, 1, 0, '2023-11-23 07:14:46', '2023-11-23 07:14:46', 'VNPAY', '100000', '', '', '', '', ''),
(50, 1, 0, '2023-11-23 07:21:36', '2023-11-23 07:21:36', 'COD', '100000', '', '', '', '', ''),
(51, 1, 0, '2023-11-23 07:29:05', '2023-11-23 07:29:05', 'COD', '100000', '', '', '', '', ''),
(52, 1, 0, '2023-11-23 07:29:27', '2023-11-23 07:29:27', 'COD', '100000', '', '', '', '', ''),
(53, 1, 0, '2023-11-23 07:30:13', '2023-11-23 07:30:13', 'COD', '100000', '', '', '', '', ''),
(54, 2, 0, '2023-11-23 07:56:37', '2023-11-23 07:56:37', 'COD', '100000', '', '', '', '', ''),
(55, 2, 0, '2023-11-23 08:06:08', '2023-11-23 08:06:08', 'COD', '700000', '', '', '', '', ''),
(56, 2, 1, '2023-11-23 22:57:20', '2023-11-23 22:58:03', 'VNPAY', '550000', '', '', '', '', ''),
(57, 2, 0, '2023-11-23 22:59:33', '2023-11-23 22:59:33', 'COD', '550000', '', '', '', '', ''),
(58, 2, 1, '2023-11-24 05:16:47', '2023-11-24 05:17:18', 'VNPAY', '1050000', '', '', '', '', ''),
(59, 2, 0, '2023-11-24 05:26:42', '2023-11-24 05:26:42', 'VNPAY', '250000', '', '', '', '', ''),
(60, 2, 1, '2023-11-24 05:35:59', '2023-11-24 06:25:26', 'VNPAY', '200000', '', '', '', '', ''),
(61, 2, 0, '2023-11-24 06:47:02', '2023-11-24 06:47:02', 'VNPAY', '250000', '', '', '', '', ''),
(62, 2, 0, '2023-11-24 06:47:02', '2023-11-24 06:47:02', 'VNPAY', '250000', '', '', '', '', ''),
(63, 2, 0, '2023-11-24 08:14:48', '2023-11-24 08:14:48', 'VNPAY', '250000', '', '', '', '', ''),
(64, 2, 0, '2023-11-24 08:43:05', '2023-11-24 08:43:05', 'VNPAY', '250000', '', '', '', '', ''),
(65, 2, 0, '2023-11-24 08:51:54', '2023-11-24 08:51:54', 'VNPAY', '250000', '', '', '', '', ''),
(66, 2, 0, '2023-11-24 08:53:52', '2023-11-24 08:53:52', 'VNPAY', '250000', '', '', '', '', ''),
(67, 2, 0, '2023-11-24 08:55:01', '2023-11-24 08:55:01', 'VNPAY', '250000', '', '', '', '', ''),
(68, 2, 0, '2023-11-24 09:33:31', '2023-11-24 09:33:31', 'VNPAY', '250000', '', '', '', '', ''),
(69, 2, 0, '2023-11-24 09:33:54', '2023-11-24 09:33:54', 'VNPAY', '250000', '', '', '', '', ''),
(70, 2, 1, '2023-11-24 09:34:56', '2023-11-24 09:37:40', 'VNPAY', '250000', '', '', '', '', ''),
(71, 2, 0, '2023-11-24 09:40:25', '2023-11-24 09:40:25', 'VNPAY', '100000', '', '', '', '', ''),
(72, 2, 0, '2023-11-24 09:40:49', '2023-11-24 09:40:49', 'VNPAY', '100000', '', '', '', '', ''),
(73, 2, 0, '2023-11-24 09:44:51', '2023-11-24 09:44:51', 'VNPAY', '200000', '', '', '', '', ''),
(74, 2, 0, '2023-11-24 09:45:27', '2023-11-24 09:45:27', 'VNPAY', '200000', '', '', '', '', ''),
(75, 1, 0, '2023-11-28 06:12:57', '2023-11-28 06:12:57', 'VNPAY', '250000', '', '', '', '', ''),
(76, 1, 0, '2023-11-29 08:41:18', '2023-11-29 08:41:18', 'COD', '100000', 'Xã Dương Xá', 'Huyện Gia Lâm', 'Thành phố Hà Nội', '08350302999', '16 ngõ 48 Kim Đồng'),
(77, 1, 0, '2023-11-29 08:42:47', '2023-11-29 08:42:47', 'COD', '100000', 'Xã Dương Xá', 'Huyện Gia Lâm', 'Thành phố Hà Nội', '08350302999', '16 ngõ 48 Kim Đồng'),
(78, 1, 0, '2023-12-30 06:30:34', '2023-12-30 06:30:34', 'COD', '250000', 'Xã Dương Xá', 'Huyện Gia Lâm', 'Thành phố Hà Nội', '08350302999', '16 ngõ 48 Kim Đồng'),
(79, 1, 1, '2024-01-05 07:47:14', '2024-01-05 07:47:52', 'VNPAY', '1200000', 'Xã Sín Chéng', 'Huyện Si Ma Cai', 'Tỉnh Lào Cai', '08350302999', '16 ngõ 48 Kim Đồn'),
(80, 4, 1, '2024-01-05 08:01:08', '2024-01-05 08:01:45', 'VNPAY', '1325000', 'Xã Dền Sáng', 'Huyện Bát Xát', 'Tỉnh Lào Cai', '0987654321', '16 ngõ 28 Bạch Mai'),
(81, 5, 1, '2024-01-05 08:11:45', '2024-01-05 08:12:16', 'VNPAY', '1950000', 'Phường Phúc Xá', 'Quận Ba Đình', 'Thành phố Hà Nội', '0123456789', '123456'),
(82, 6, 1, '2024-01-05 08:18:33', '2024-01-05 08:18:55', 'VNPAY', '750000', 'Phường Noong Bua', 'Thành phố Điện Biên Phủ', 'Tỉnh Điện Biên', '0123456789', '321321');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `qty` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `created_at`, `updated_at`, `price`) VALUES
(1, 2, 2, 3, '2023-11-20 04:22:28', '2023-11-20 04:22:28', '100000'),
(6, 10, 2, 1, '2023-11-20 06:57:54', '2023-11-20 06:57:54', '100000'),
(7, 11, 2, 1, '2023-11-20 06:58:37', '2023-11-20 06:58:37', '100000'),
(8, 12, 2, 1, '2023-11-20 07:00:23', '2023-11-20 07:00:23', '100000'),
(9, 13, 2, 1, '2023-11-20 07:02:32', '2023-11-20 07:02:32', '100000'),
(10, 14, 2, 1, '2023-11-22 07:47:28', '2023-11-22 07:47:28', '100000'),
(11, 15, 2, 1, '2023-11-22 07:48:27', '2023-11-22 07:48:27', '100000'),
(12, 16, 2, 1, '2023-11-22 07:48:44', '2023-11-22 07:48:44', '100000'),
(13, 17, 2, 1, '2023-11-22 07:48:56', '2023-11-22 07:48:56', '100000'),
(14, 18, 2, 1, '2023-11-22 07:52:52', '2023-11-22 07:52:52', '100000'),
(15, 19, 2, 2, '2023-11-22 08:01:00', '2023-11-22 08:01:00', '100000'),
(16, 20, 2, 1, '2023-11-22 08:08:32', '2023-11-22 08:08:32', '100000'),
(17, 21, 2, 1, '2023-11-22 08:13:19', '2023-11-22 08:13:19', '100000'),
(18, 22, 2, 1, '2023-11-22 08:27:38', '2023-11-22 08:27:38', '100000'),
(19, 23, 2, 2, '2023-11-22 08:28:51', '2023-11-22 08:28:51', '100000'),
(20, 24, 2, 1, '2023-11-22 08:30:38', '2023-11-22 08:30:38', '100000'),
(21, 25, 2, 1, '2023-11-22 08:31:26', '2023-11-22 08:31:26', '100000'),
(22, 26, 2, 1, '2023-11-22 08:36:33', '2023-11-22 08:36:33', '100000'),
(23, 27, 2, 1, '2023-11-22 08:37:09', '2023-11-22 08:37:09', '100000'),
(24, 28, 2, 1, '2023-11-22 08:38:36', '2023-11-22 08:38:36', '100000'),
(25, 29, 2, 1, '2023-11-22 08:38:58', '2023-11-22 08:38:58', '100000'),
(26, 30, 2, 1, '2023-11-22 08:41:03', '2023-11-22 08:41:03', '100000'),
(27, 31, 2, 1, '2023-11-22 08:42:50', '2023-11-22 08:42:50', '100000'),
(28, 33, 2, 1, '2023-11-22 08:44:30', '2023-11-22 08:44:30', '100000'),
(29, 34, 2, 1, '2023-11-22 08:45:46', '2023-11-22 08:45:46', '100000'),
(30, 35, 2, 1, '2023-11-22 08:46:37', '2023-11-22 08:46:37', '100000'),
(31, 37, 2, 1, '2023-11-22 08:47:18', '2023-11-22 08:47:18', '100000'),
(32, 38, 2, 1, '2023-11-22 08:55:37', '2023-11-22 08:55:37', '100000'),
(33, 40, 2, 1, '2023-11-22 08:57:02', '2023-11-22 08:57:02', '100000'),
(34, 41, 2, 1, '2023-11-22 09:10:06', '2023-11-22 09:10:06', '100000'),
(35, 42, 2, 1, '2023-11-22 09:11:16', '2023-11-22 09:11:16', '100000'),
(36, 43, 2, 10, '2023-11-22 09:12:40', '2023-11-22 09:12:40', '100000'),
(37, 44, 2, 1, '2023-11-22 09:18:44', '2023-11-22 09:18:44', '100000'),
(38, 45, 2, 1, '2023-11-22 09:21:42', '2023-11-22 09:21:42', '100000'),
(39, 46, 2, 1, '2023-11-23 06:48:57', '2023-11-23 06:48:57', '100000'),
(40, 47, 2, 1, '2023-11-23 07:11:22', '2023-11-23 07:11:22', '100000'),
(41, 48, 2, 1, '2023-11-23 07:11:58', '2023-11-23 07:11:58', '100000'),
(42, 49, 2, 1, '2023-11-23 07:14:46', '2023-11-23 07:14:46', '100000'),
(43, 50, 2, 1, '2023-11-23 07:21:36', '2023-11-23 07:21:36', '100000'),
(44, 51, 2, 1, '2023-11-23 07:29:05', '2023-11-23 07:29:05', '100000'),
(45, 53, 2, 1, '2023-11-23 07:30:13', '2023-11-23 07:30:13', '100000'),
(46, 54, 2, 1, '2023-11-23 07:56:37', '2023-11-23 07:56:37', '100000'),
(47, 55, 5, 1, '2023-11-23 08:06:08', '2023-11-23 08:06:08', '400000'),
(48, 55, 3, 1, '2023-11-23 08:06:08', '2023-11-23 08:06:08', '200000'),
(49, 55, 2, 1, '2023-11-23 08:06:08', '2023-11-23 08:06:08', '100000'),
(50, 56, 16, 1, '2023-11-23 22:57:20', '2023-11-23 22:57:20', '250000'),
(51, 56, 7, 1, '2023-11-23 22:57:20', '2023-11-23 22:57:20', '200000'),
(52, 56, 2, 1, '2023-11-23 22:57:20', '2023-11-23 22:57:20', '100000'),
(53, 57, 16, 1, '2023-11-23 22:59:33', '2023-11-23 22:59:33', '250000'),
(54, 57, 7, 1, '2023-11-23 22:59:33', '2023-11-23 22:59:33', '200000'),
(55, 57, 2, 1, '2023-11-23 22:59:33', '2023-11-23 22:59:33', '100000'),
(56, 58, 2, 1, '2023-11-24 05:16:47', '2023-11-24 05:16:47', '100000'),
(57, 58, 3, 1, '2023-11-24 05:16:47', '2023-11-24 05:16:47', '200000'),
(58, 58, 8, 3, '2023-11-24 05:16:47', '2023-11-24 05:16:47', '250000'),
(59, 59, 15, 1, '2023-11-24 05:26:42', '2023-11-24 05:26:42', '250000'),
(60, 60, 7, 1, '2023-11-24 05:35:59', '2023-11-24 05:35:59', '200000'),
(61, 61, 16, 1, '2023-11-24 06:47:02', '2023-11-24 06:47:02', '250000'),
(62, 62, 16, 1, '2023-11-24 06:47:02', '2023-11-24 06:47:02', '250000'),
(63, 63, 16, 1, '2023-11-24 08:14:48', '2023-11-24 08:14:48', '250000'),
(64, 64, 16, 1, '2023-11-24 08:43:05', '2023-11-24 08:43:05', '250000'),
(65, 65, 16, 1, '2023-11-24 08:51:54', '2023-11-24 08:51:54', '250000'),
(66, 66, 16, 1, '2023-11-24 08:53:52', '2023-11-24 08:53:52', '250000'),
(67, 67, 16, 1, '2023-11-24 08:55:01', '2023-11-24 08:55:01', '250000'),
(68, 68, 16, 1, '2023-11-24 09:33:31', '2023-11-24 09:33:31', '250000'),
(69, 69, 16, 1, '2023-11-24 09:33:54', '2023-11-24 09:33:54', '250000'),
(70, 70, 16, 1, '2023-11-24 09:34:56', '2023-11-24 09:34:56', '250000'),
(71, 71, 2, 1, '2023-11-24 09:40:25', '2023-11-24 09:40:25', '100000'),
(72, 72, 2, 1, '2023-11-24 09:40:49', '2023-11-24 09:40:49', '100000'),
(73, 73, 2, 2, '2023-11-24 09:44:51', '2023-11-24 09:44:51', '100000'),
(74, 74, 2, 2, '2023-11-24 09:45:27', '2023-11-24 09:45:27', '100000'),
(75, 75, 16, 1, '2023-11-28 06:12:57', '2023-11-28 06:12:57', '250000'),
(76, 76, 2, 1, '2023-11-29 08:41:18', '2023-11-29 08:41:18', '100000'),
(77, 77, 2, 1, '2023-11-29 08:42:47', '2023-11-29 08:42:47', '100000'),
(78, 78, 15, 1, '2023-12-30 06:30:34', '2023-12-30 06:30:34', '250000'),
(79, 79, 4, 2, '2024-01-05 07:47:14', '2024-01-05 07:47:14', '300000'),
(80, 79, 7, 3, '2024-01-05 07:47:14', '2024-01-05 07:47:14', '200000'),
(81, 80, 15, 2, '2024-01-05 08:01:08', '2024-01-05 08:01:08', '250000'),
(82, 80, 10, 3, '2024-01-05 08:01:08', '2024-01-05 08:01:08', '275000'),
(83, 81, 11, 2, '2024-01-05 08:11:45', '2024-01-05 08:11:45', '375000'),
(84, 81, 12, 2, '2024-01-05 08:11:45', '2024-01-05 08:11:45', '600000'),
(85, 82, 15, 3, '2024-01-05 08:18:33', '2024-01-05 08:18:33', '250000');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `admin_id` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `status` smallint(6) NOT NULL,
  `product_img_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `slug`, `category_id`, `admin_id`, `price`, `status`, `product_img_url`, `created_at`, `updated_at`, `content`) VALUES
(2, 'Grand Torismo', 'grand-torismo', 1, 1, 100000, 1, 'public/LDTg5n9QsZgjwGTcx3Zrur54OABlWHL49bluvRHV.jpg', '2023-11-20 04:11:40', '2023-12-30 07:43:33', '<p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'),
(3, 'Sekiro - Shadow Die Twice', 'sekiro-shadow-die-twice', 2, 1, 200000, 1, 'public/ZltrRpJrc9M2pSp2MJzS9cM4eMlWKQC2M8aNEyNy.jpg', '2023-11-23 08:04:21', '2024-01-04 06:37:53', '<p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'),
(4, 'Raft', 'raft', 3, 1, 300000, 1, 'public/cF6YXb5bTf3pUtK5Sc9aN98KImvovkp6Z8BtyifM.jpg', '2023-11-23 08:04:50', '2024-01-04 06:37:43', '<p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'),
(5, 'Battlefield', 'battlefield', 4, 1, 400000, 1, 'public/WfiWv9pxyC0RKtr4qk3fxdMakzkHWw9QXrEtIVhs.jpg', '2023-11-23 08:05:19', '2024-01-04 06:37:32', '<p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'),
(6, 'Civilizations', 'civilizations', 5, 1, 500000, 1, 'public/Gx6Eva4jVBsC0xVut9ydCVedqEw3Ejwzdct8OLWe.jpg', '2023-11-23 08:16:05', '2024-01-04 06:37:08', '<p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'),
(7, 'Forza Horizon 5', 'forza-horizon-5', 1, 1, 200000, 1, 'public/0XRDwkI0ngFwIF93ByHGyflpqWkXhDnXTytcywcL.jpg', '2023-11-23 08:16:57', '2023-12-30 07:42:55', '<p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'),
(8, 'Grounded', 'grounded', 3, 1, 250000, 1, 'public/3RS8sblPhTzyEFWTThYiQ68mMvmiyjkE1XLljMwT.jpg', '2023-11-23 08:17:21', '2024-01-04 06:36:51', '<p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'),
(9, 'Remnant 2', 'remnant-2', 2, 1, 350000, 1, 'public/evhZTyjWAmiyu9naqzLbOnRgnIJTtQJgBZwcJDEP.jpg', '2023-11-23 08:18:00', '2024-01-04 06:36:44', '<p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'),
(10, 'Ready Or Not', 'ready-or-not', 4, 1, 275000, 1, 'public/2K750tRLqQA97H5pO3fD1HszGOKlkInhyv1DAldy.jpg', '2023-11-23 08:18:46', '2024-01-04 06:36:36', '<p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'),
(11, 'Destiny 2', 'destiny-2', 4, 1, 375000, 1, 'public/9phvpr7lRjRG9EjvluWLkVPTOebdK9cDXapAJJY9.jpg', '2023-11-23 08:19:22', '2024-01-04 06:36:28', '<p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'),
(12, 'Lord of the fallen', 'lord-of-the-fallen', 2, 1, 600000, 1, 'public/7xgKv5kHQHvSBGyNUMQyhMn3THzMcSadzKEpY0wE.jpg', '2023-11-23 08:19:56', '2024-01-04 06:36:21', '<p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'),
(13, 'Hogwarts Legacy', 'hogwarts-legacy', 6, 1, 700000, 1, 'public/loWlHMEs56UHySvkOIj2409bB8F9QBja6aEgAYoQ.jpg', '2023-11-23 08:20:57', '2024-01-04 06:36:12', '<p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'),
(14, 'God of War', 'god-of-war', 6, 1, 599000, 1, 'public/IyMd1zLQnWkYNbp6YXk7EeE9Hc9FpQJMrKresslv.jpg', '2023-11-23 08:21:24', '2024-01-04 06:35:58', '<p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'),
(15, 'Sea of thieves', 'sea-of-thieves', 6, 1, 250000, 1, 'public/Fy6AmFutxCcDsWP1UgaEjLLAvtSYQiZ1RamIsg1u.jpg', '2023-11-23 08:21:58', '2024-01-04 06:35:50', '<p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. tum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'),
(16, 'Dishonored 2', 'dishonored-2', 7, 1, 250000, 1, 'public/Uf1TevY10GjWw3eQFxcvQyc0bcNYT3luru5F5HIm.jpg', '2023-11-23 08:34:32', '2023-12-30 09:59:53', '<p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mean` varchar(255) NOT NULL,
  `admin_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mean` varchar(255) NOT NULL,
  `admin_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `ward` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'https://media.dolenglish.vn/PUBLIC/MEDIA/9590ffca-47b8-43ef-98a7-742ca207ca23.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `address`, `phone`, `ward`, `district`, `city`, `avatar`) VALUES
(1, 'Huy', 'abc@xyz.com', NULL, '$2y$10$pfvesJ4AT1sEX.9WRVmZ7e5b6izo700ZpxyoP045vJxkGSw9TAxYC', NULL, '2023-11-20 04:12:13', '2024-01-05 07:51:00', '16 ngõ 48 Kim Đồn', '0123456789', 'Xã Đức Vân', 'Huyện Ngân Sơn', 'Tỉnh Bắc Kạn', 'public/HyBVmxarMnmHjB4aaQHcWsvAlqs3BF5dcTHcthfH.png'),
(2, 'Long', 'huy@gmail.com', NULL, '$2y$10$MDF2JJnrJX0yzcZ.hwg0TOEJy0tHZhkiDTOvdpjbITGt5ZMsT1oLe', NULL, '2023-11-23 07:56:02', '2023-11-23 07:56:25', 'Hoang Mai, Ha Noi', '0323213921', '', '', '', 'https://media.dolenglish.vn/PUBLIC/MEDIA/9590ffca-47b8-43ef-98a7-742ca207ca23.jpg'),
(3, 'Huy', 'huynguyen@itplus.com', NULL, '$2y$10$5KbHSSL6uqNQ6J7o0yjw5e4Ck43LbPg.6sKELeY692vlAfdZHtGb.', NULL, '2024-01-05 07:57:30', '2024-01-05 07:57:30', NULL, NULL, '', '', '', 'https://media.dolenglish.vn/PUBLIC/MEDIA/9590ffca-47b8-43ef-98a7-742ca207ca23.jpg'),
(4, 'Huy', 'huy@itplus.com', NULL, '$2y$10$oksN7lux/gDuxLjkmiuYp.pGUKxI18RWRRmkNGTGpjGpTBPYX3YEO', NULL, '2024-01-05 07:58:19', '2024-01-05 07:59:04', '16 ngõ 28 Bạch Mai', '0123456789', 'Xã Dền Sáng', 'Huyện Bát Xát', 'Tỉnh Lào Cai', 'public/GVtfs8xW0f9pmp9EweJsA590yP8OlF0csh6lVNgu.png'),
(5, 'Thành', 'yuhuhn@itplus.com', NULL, '$2y$10$9CRIDUnZtJLcsZDLT8bCTuuICPJY60AZlQ1cJ2XLGC10RMARNU1ye', NULL, '2024-01-05 08:09:06', '2024-01-05 08:09:06', NULL, NULL, '', '', '', 'https://media.dolenglish.vn/PUBLIC/MEDIA/9590ffca-47b8-43ef-98a7-742ca207ca23.jpg'),
(6, 'Hùng', 'yuhuhn3299@itplus.com', NULL, '$2y$10$ZykfJPl0Sr9UmdS1wpAVHekAFZUjTUHrYRRwZYFXMeOXVdl0/dYn2', NULL, '2024-01-05 08:16:15', '2024-01-05 08:16:50', '321321', '0123456789', 'Phường Noong Bua', 'Thành phố Điện Biên Phủ', 'Tỉnh Điện Biên', 'public/BMivGttXS2DBUto9LSI2i4NQplXqPlAjGhnJxGon.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `logistic`
--
ALTER TABLE `logistic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logistic_details`
--
ALTER TABLE `logistic_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logistic`
--
ALTER TABLE `logistic`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `logistic_details`
--
ALTER TABLE `logistic_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
