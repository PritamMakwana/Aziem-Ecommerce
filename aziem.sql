-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2024 at 11:04 AM
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
-- Database: `aziem`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shop_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `customer_id`, `quantity`, `payment_status`, `created_at`, `updated_at`, `shop_id`) VALUES
(105, 10, 2, 100, 0, '2023-11-02 00:09:26', '2023-11-02 00:09:26', 15);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Technology', '2023-07-12 20:42:11', '2023-10-11 05:26:07', '2023-10-11 05:26:07'),
(2, 'Public Event', '2023-07-12 21:23:34', '2023-07-12 21:23:34', NULL),
(3, 'Robot', '2023-07-12 21:23:40', '2023-07-12 21:23:40', NULL),
(4, 'Transport', '2023-07-12 21:23:48', '2023-07-14 00:43:40', NULL),
(5, 'Sports', '2023-07-12 21:23:53', '2023-07-12 21:23:53', NULL),
(6, 'Special Day', '2023-07-12 21:23:57', '2023-07-12 21:23:57', NULL),
(7, 'Games', '2023-07-12 21:24:02', '2023-07-12 21:24:02', NULL),
(8, 'Groceries', '2023-07-12 21:24:23', '2023-08-01 17:28:41', NULL),
(9, 'Shopping Center', '2023-07-12 21:24:30', '2023-07-13 20:28:17', NULL),
(10, 'Medical', '2023-07-12 21:24:40', '2023-07-12 21:24:40', NULL),
(11, 'Electronics', '2023-07-12 21:24:51', '2023-07-12 21:24:51', NULL),
(12, 'Politics', '2023-07-12 21:25:11', '2023-07-13 20:28:04', NULL),
(13, 'Other', '2023-07-12 21:25:20', '2023-07-13 21:47:08', NULL),
(24, 'dd', '2023-07-23 18:54:53', '2023-08-01 17:28:47', '2023-08-01 17:28:47'),
(25, 'dd', '2023-07-25 01:36:59', '2023-08-01 17:28:52', '2023-08-01 17:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `confirmed_orders`
--

CREATE TABLE `confirmed_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `total_amount` varchar(255) DEFAULT NULL,
  `discount_amount` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `confirmed_orders`
--

INSERT INTO `confirmed_orders` (`id`, `product_id`, `customer_id`, `shop_id`, `quantity`, `created_at`, `updated_at`, `order_id`, `status`, `total_amount`, `discount_amount`, `deleted_at`) VALUES
(34, 10, 2, 15, 1, '2023-08-22 01:38:58', '2023-10-11 05:48:43', '274011d3-a7ef-404d-a66b-7626c71d977b', 0, NULL, NULL, NULL),
(35, 16, 2, 15, 1, '2023-08-22 01:38:58', '2023-08-22 01:38:58', '274011d3-a7ef-404d-a66b-7626c71d977b', 0, NULL, NULL, NULL),
(36, 15, 2, 15, 1, '2023-08-22 01:38:58', '2023-08-22 01:38:58', '274011d3-a7ef-404d-a66b-7626c71d977b', 0, NULL, NULL, NULL),
(37, 13, 2, 15, 1, '2023-09-13 00:47:15', '2023-09-13 00:47:15', 'b1872672-1e72-42c1-9481-725361c3c0ac', 0, NULL, NULL, NULL),
(38, 10, 2, 15, 1, '2023-09-13 00:47:15', '2023-09-13 00:47:15', 'b1872672-1e72-42c1-9481-725361c3c0ac', 0, NULL, NULL, NULL),
(41, 10, 2, 15, 1, '2023-10-11 06:19:55', '2023-10-11 06:22:44', 'c64a29f0-9c58-4f1f-add3-5ffef3a4c9ef', 1, '20000', '100', NULL),
(42, 10, 12, 15, 1, '2023-10-16 05:18:30', '2023-10-16 05:18:30', '051514a8-c074-4a6b-9a88-9f2b24f34dd7', 0, NULL, NULL, NULL),
(43, 10, 12, 15, 1, '2023-10-16 06:47:47', '2023-10-16 06:47:47', '60b2c415-e7fd-4b9a-9a3e-7e970016283f', 0, NULL, NULL, NULL),
(44, 10, 12, 15, 1, '2023-10-27 04:14:40', '2023-10-27 04:14:40', '32388df7-586e-41bb-a379-080f3c7e355a', 0, NULL, NULL, NULL),
(45, 10, 2, 15, 1, '2023-10-27 04:14:40', '2023-10-27 04:14:40', '32388df7-586e-41bb-a379-080f3c7e355a', 0, NULL, NULL, NULL),
(46, 15, 2, 15, 1, '2023-10-29 23:59:14', '2023-10-29 23:59:14', 'ebbca033-c6f4-4968-8a65-986e1e542247', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile_image` mediumtext NOT NULL,
  `gender` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `offer` int(11) NOT NULL DEFAULT 0,
  `customer_id` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `has_seen_model` tinyint(1) NOT NULL DEFAULT 0,
  `hold` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = no hold, 1 = hold'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `email`, `password`, `mobile`, `address`, `profile_image`, `gender`, `remember_token`, `created_at`, `updated_at`, `first_name`, `last_name`, `offer`, `customer_id`, `deleted_at`, `has_seen_model`, `hold`) VALUES
(2, 'rohit@gmail.com', '$2y$10$8RxVTrvrDOmZZieVsOmC6.NAkpJxRRXxscut1Yb6h8P9qPj32/9sy', '9106711082', 'Anand, GJ, India', '1690954766.jpg', 'Male', NULL, '2023-07-18 23:08:57', '2023-11-16 02:37:28', 'Rohit', 'Sharma', 100, 'CS-101', NULL, 2, 0),
(3, 'rahul@yahoo.com', '$2y$10$FiIlKYiax47SnT8qj7qtJ.Wx9GIAyPi.8ylco8PcsSClOyjc35cwO', '7877754872', 'Ahmedabad, GJ, India', '1689834268.jpg', 'Male', NULL, '2023-07-19 19:24:28', '2023-11-07 03:48:56', 'Rahul', 'Ahuja', 226, 'CS-102', NULL, 0, 0),
(4, 'freya@google.com', '$2y$10$wfRYHHMkZaPjvLPt..idw.sZAJsl/p00TBxLSfHxmDWDlZrWMhPiy', '6134857452', 'Vadodara, Gj', '1689834785.jpg', 'Female', NULL, '2023-07-19 19:33:05', '2023-11-07 03:48:56', 'Freya', 'Sharma', 21, 'CS-103', NULL, 0, 0),
(5, 'navin@gmail.com', '$2y$10$Zec8s0CjZDdUDmNJEIAPIeOJhPgf8pOtgaU254AOVGaFeCaoazvu.', '9458722136', 'Vadodara, GJ, India', '1690806626.jpg', 'Male', NULL, '2023-07-31 01:30:26', '2023-11-07 03:48:56', 'Navin', 'Patel', 21, 'CS-604', NULL, 0, 0),
(6, 'demo@gmail.com', '$2y$10$iEYOhlzzJq6txUJ5pzseu.wFD4TnsZM0imj.TDsmkqcRtP1V2g1xG', '9458722136', 'Anand, GJ, India', '1691056938.jpg', 'Male', NULL, '2023-08-02 23:02:18', '2023-11-07 03:48:56', 'Demo', 'Customer', 21, 'CS-577', NULL, 0, 0),
(7, 'vinit@gmail.com', '$2y$10$i6o.ocdEIrXmdi9TlbEYhu0goPDFiUD8usjKv72tTQ0JZCZewgqgy', '9458722136', 'Anand, India', '1691057750.jpg', 'Male', NULL, '2023-08-02 23:15:50', '2023-11-07 03:48:56', 'Vinit', 'Seghal', 21, 'CS-007', NULL, 0, 0),
(12, 'pritam@gmail.com', '$2y$10$P2VY9x.iZItcyZH1BrcLl.x/cbmDT0CXKyUH9eDyGRD5FibpeH5tO', '1231231231', 'wansawd', '1697094232.png', 'Male', NULL, '2023-10-12 01:33:53', '2023-11-07 03:48:56', 'Pritam', 'Makwana', 21, 'CS-008', NULL, 2, 0),
(13, 'kelicerep@mailinator.com', '$2y$10$kZrf2DxlSd4yrGv731MxCe50bOBqGwjn6XYslJeLfVNAIHwrdXx9q', '1231231231', 'Ab dolor maxime fuga', '1697607416.jpg', 'Male', NULL, '2023-10-18 00:06:56', '2023-11-07 03:48:56', 'Hayes', 'Salas', 21, 'CS-013', NULL, 0, 0),
(14, 'admin@admin.com', '$2y$10$BfZxX3qjOC.jrHMcHDBV5.oD1sFMkY0orjWSBWnLB/zFRfxxu51hm', '1231231111', '12313', '1700115353.png', 'Male', NULL, '2023-11-16 00:45:53', '2023-11-16 00:45:53', 'Pritam', 'Makwana', 0, 'CS-014', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `email_otps`
--

CREATE TABLE `email_otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `created_at` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `phone`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Gopal Makwana', 'Minus velit providen', 'pritam@gmail.com', 'cwad ewdwfasd esedafwd c qwq      wda             dadw CASX WDCX WCXZWSAWFASDWSEFEGFDHrdgfhbnsdffsfjkasndfjknajkfsd asjfhajsdjfe awe0 i ejfkjsedkfj  woikjfdksdjfokj esdohfkshjioda afeo jhaoe meofajeohf a oiejfo  dsaeofajkngpvua0iwej maeiojfaekldaj owfijew w eofjoka', '2023-11-17 05:27:39', '2023-11-17 05:27:39');

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
-- Table structure for table `job_registrations`
--

CREATE TABLE `job_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `cv_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_registrations`
--

INSERT INTO `job_registrations` (`id`, `name`, `email`, `mobile`, `nationality`, `specialization`, `gender`, `cv_file`, `created_at`, `updated_at`) VALUES
(1, 'pritammakwana@gmail.com', 'pritammakwana17561@gmail.com', '9723417588', 'india', 'php', 'Male', 'pritammakwana@gmail.com-273.pdf', '2023-09-15 01:27:40', '2023-09-15 01:27:40'),
(2, 'pritam Makwana', 'pritammakwana17561@gmail.com', '9723417588', 'india', 'php', 'Female', 'pritam Makwana-452.pdf', '2023-09-15 01:57:17', '2023-09-15 01:57:17'),
(3, 'gopal makwana', 'gopalmakwana@gmail.com', '9723417588', 'amreli india', 'php', 'Female', 'gopal makwana-892.pdf', '2023-09-18 01:12:21', '2023-09-18 01:12:21'),
(4, 'pritam makwana', 'pritammakwana@gmail.com', '9723417588', 'amreli india', 'php', 'Male', 'pritam makwana-930.pdf', '2023-09-18 01:26:04', '2023-09-18 01:26:04'),
(5, 'pritam makwana', 'pritammakwana@gmail.com', '9723417588', 'amreli india', 'php', 'Female', 'pritam makwana-606.pdf', '2023-09-18 01:35:52', '2023-09-18 01:35:52'),
(6, 'pritam makwana', 'pritammakwana@gmail.com', '9723417588', 'amreli india', 'php', 'Male', 'pritam makwana-143.pdf', '2023-09-18 01:40:27', '2023-09-18 01:40:27'),
(7, 'pritam makwana', 'pritammakwana@gmail.com', '9723417588', 'amreli india', 'php', 'Male', 'pritam makwana-465.pdf', '2023-09-18 01:42:07', '2023-09-18 01:42:07'),
(8, 'pritam makwana', 'pritammakwana@gmail.com', '9723417588', 'amreli india', 'php', 'Male', 'pritam makwana-677.pdf', '2023-09-18 01:43:09', '2023-09-18 01:43:09'),
(9, 'pritam makwana', 'pritammakwan@gmail.com', '9723417588', 'india', 'php', 'Female', 'pritam makwana-126.pdf', '2023-09-18 01:43:34', '2023-09-18 01:43:34'),
(10, 'pritam makwana', 'pritammakwana@gmail.com', '9723417588', 'india', 'php', 'Male', 'pritam makwana-453.pdf', '2023-09-18 01:44:23', '2023-09-18 01:44:23'),
(11, 'pritam makwana', 'pritammakwana@gmail.com', '9723417588', 'india', 'php', 'Male', 'pritam makwana-341.pdf', '2023-09-18 01:54:09', '2023-09-18 01:54:09'),
(12, 'pritam makwana', 'pritammakwana@gmail.com', '9723417588', 'india', 'php', 'Female', 'pritam makwana-255.pdf', '2023-09-18 05:02:11', '2023-09-18 05:02:11'),
(13, 'pritam makwana', 'pritammakwana@gmail.com', '9723417588', 'indiahjk', 'php', 'Other', 'pritam makwana-494.pdf', '2023-09-18 05:02:54', '2023-09-18 05:02:54'),
(14, 'pritam makwana', 'pritammakwana@gmail.com', '9723417588', 'amreli india', 'php', 'Male', 'pritam makwana-728.pdf', '2023-09-18 05:04:18', '2023-09-18 05:04:18'),
(15, 'Home solar panels', 'nikhil@gmail.com', '1231231231', 'Quis nostrum volupta', 'Quis in itaque dolor', 'Female', 'Home solar panels-608.pdf', '2023-11-16 05:04:47', '2023-11-16 05:04:47'),
(16, 'Gopal Makwana', 'nikhil@gmail.com', '8888812312', 'Quis nostrum volupta', 'Quis in itaque dolor', 'Female', 'Gopal Makwana-838.pdf', '2023-11-16 05:31:07', '2023-11-16 05:31:07'),
(17, 'Gopal Makwana', 'pritam@gmail.com', '1231231111', 'fssad', 'Quis in itaque dolor', 'Female', 'Gopal Makwana-608.pdf', '2023-11-16 05:32:18', '2023-11-16 05:32:18'),
(18, 'gopal makwana', 'pritam@gmail.com', '1231231111', 'fssad', 'Quis in itaque dolor', 'Male', 'gopal makwana-976.pdf', '2023-11-16 05:33:40', '2023-11-16 05:33:40');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_12_084017_create_categories_table', 1),
(6, '2023_07_12_105642_create_shops_table', 1),
(7, '2023_07_12_110105_create_products_table', 1),
(8, '2023_07_13_061613_add_name_to_shops_table', 1),
(9, '2023_07_13_061731_add_email_to_shops_table', 1),
(10, '2023_07_14_053655_add_soft_deletes_to_categories_table', 1),
(11, '2023_07_14_100713_add_soft_deletes_to_shops_table', 1),
(12, '2023_07_14_100754_add_soft_deletes_to_products_table', 1),
(13, '2023_07_17_061448_add_status_to_shops_table', 1),
(14, '2023_07_18_103927_create_customers_table', 1),
(15, '2023_07_20_050832_add_first_name_to_customers_table', 1),
(16, '2023_07_20_102825_create_offers_table', 1),
(17, '2023_07_20_111850_create_shop_owners_table', 1),
(18, '2023_07_24_052323_create_carts_table', 1),
(19, '2023_07_24_062121_add_offer_to_customers_table', 1),
(20, '2023_07_27_121852_add_shop_id_to_carts_table', 1),
(21, '2023_07_28_093140_add_offer_to_shops_table', 1),
(22, '2023_07_28_093719_add_approved_to_shop_owners_table', 1),
(23, '2023_07_31_061444_create_confirmed_orders_table', 1),
(24, '2023_07_31_122129_add_customer_id_to_customers_table', 1),
(25, '2023_08_02_123544_add_order_id_to_confirmed_orders', 1),
(26, '2023_08_03_120007_add_so_id_to_shops_table', 1),
(27, '2023_08_07_080647_add_owner_id_to_shop_owners_table', 1),
(28, '2023_08_07_101547_add_status_to_confirmed_orders_table', 1),
(29, '2023_08_09_082632_add_amount_to_confirmed_orders_table', 1),
(30, '2023_08_09_113554_create_upload_receipts_table', 1),
(31, '2023_09_12_045219_add_soft_delete_to_offers_table', 1),
(32, '2023_09_15_052555_create_job_registrations_table', 2),
(33, '2023_10_06_084155_add_soft_delete_customers_table', 3),
(34, '2023_10_06_084418_add_soft_delete_shop_owners_table', 3),
(35, '2023_10_11_110727_add_soft_delete_confirmed_orders_table', 4),
(36, '2023_10_12_065148_add_has_seen_model_to_customers_table', 5),
(37, '2023_11_06_094843_create_email_otps_table', 6),
(38, '2023_11_10_092625_add_riyal_to_upload_receipts_table', 7),
(39, '2023_11_13_051054_add_location_to_shops_table', 8),
(40, '2023_11_16_044631_add_hold_to_customer_table', 9),
(41, '2023_11_16_045805_add_hold_to_shop_owners_table', 10),
(44, '2023_11_16_092747_create_notifications_table', 11),
(45, '2023_11_17_043620_add_otp_to_users_table', 12),
(46, '2023_11_17_103142_create_enquiries_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(255) NOT NULL,
  `number` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `section`, `number`, `created_at`, `updated_at`) VALUES
(1, 'shops', 2, NULL, '2023-11-16 05:00:46'),
(2, 'customers', 9, NULL, '2023-11-16 05:00:26'),
(3, 'receipts', 2, NULL, '2023-11-16 05:00:34'),
(4, 'shop_owners', 3, NULL, '2023-11-16 04:57:56'),
(5, 'orders', 11, NULL, '2023-11-16 04:56:38'),
(6, 'job_registration', 14, NULL, '2023-11-16 04:57:45'),
(7, 'enquiry', 1, NULL, '2023-11-17 05:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `offer_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '100 Riyal', NULL, '2023-11-16 03:08:06', NULL),
(2, '200 Riyal', NULL, '2023-11-16 03:08:06', NULL),
(3, '100 Riyal', '2023-09-13 00:52:20', '2023-11-16 03:08:06', NULL),
(4, '300 Riyal', '2023-09-13 01:10:43', '2023-09-13 01:10:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `image` mediumtext NOT NULL,
  `quantity_available` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `shop_id`, `product_name`, `description`, `image`, `quantity_available`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 11, 15, 'Headphones', 'Introducing AirPods Max — a perfect balance of exhilarating high-fidelity audio and the effortless magic of AirPods. The ultimate personal listening experience is here.', '1691065653.jpg', 29, '2023-08-03 01:27:33', '2023-10-11 06:22:44', NULL),
(12, 1, 15, 'Hikayat SSD', 'SSD super fast\r\n550 mb/s transfer rate\r\nAvailable in all colors', '1691163150.jpg', 70, '2023-08-04 04:32:30', '2023-08-21 18:05:08', '2023-08-21 18:05:08'),
(13, 7, 15, 'Monopoly', 'Monopoly is a multi-player economics-themed board game. In the game, players roll two dice to move around the game board, buying and trading properties and developing them with houses and hotels. Players collect rent from their opponents and aim to drive them into bankruptcy.', '1691163268.jpg', 40, '2023-08-04 04:34:28', '2023-08-04 04:34:28', NULL),
(15, 1, 15, 'Ipad', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed.', '1692707694.jpg', 25, '2023-08-22 01:34:54', '2023-08-22 01:34:54', NULL),
(16, 11, 15, 'Laptop Gaming Ultra', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed.', '1692707721.jpg', 30, '2023-08-22 01:35:21', '2023-08-22 01:35:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image` mediumtext NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `offer` bigint(20) UNSIGNED NOT NULL,
  `so_id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `category_id`, `image`, `address`, `mobile`, `created_at`, `updated_at`, `name`, `email`, `deleted_at`, `status`, `offer`, `so_id`, `location`) VALUES
(15, 11, '1691403117.jpg', 'Ahmedabad, GJ, India', '8342579954', '2023-08-03 01:08:57', '2023-11-13 00:25:18', 'Siddhi Super Store', 'nikhil@gmail.com', NULL, 1, 2, 15, '18.35151812362988, 79.16483902029091'),
(18, 11, '1691403117.jpg', 'Ahmedabad, GJ, India', '8342579954', '2023-10-11 04:15:53', '2023-10-11 04:15:53', 'Siddhi Super Store', 'nikhil@gmail.com', NULL, 0, 2, 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_owners`
--

CREATE TABLE `shop_owners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_category` bigint(20) UNSIGNED NOT NULL,
  `cr_number` varchar(255) NOT NULL,
  `offer` bigint(20) UNSIGNED NOT NULL,
  `images` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `owner_id` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `hold` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = no hold, 1 = hold'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_owners`
--

INSERT INTO `shop_owners` (`id`, `name`, `email`, `phone`, `password`, `nationality`, `city`, `address`, `shop_name`, `shop_category`, `cr_number`, `offer`, `images`, `created_at`, `updated_at`, `approved`, `owner_id`, `deleted_at`, `hold`) VALUES
(15, 'Nikhil Sharma', 'nikhil@gmail.com', '8342579954', '$2y$10$hlzPXDkxXl8wRkdL1TOj.OVIGVGDzW.x3sFCKmVu2VcrpK3Uu1isO', 'India', 'Ahmedabad', 'Ahmedabad, GJ, India', 'Siddhi Super Store', 11, '7333255106', 2, '1691403117.jpg', '2023-08-03 00:54:30', '2023-11-16 00:58:07', 1, 'SO-001', NULL, 1),
(33, 'Rahul Sharma', 'guestbatra44@gmail.com', '9106711042', '$2y$10$cAq0FsWdZ8WBgM02jeajEu4DMQIC5cirHKkFHzDt1tIW8JQWoML8i', 'Canada', 'Toronto', '5th Avenue', 'Subway', 8, '7333255109', 2, '1692162436.jpg', '2023-08-15 18:07:43', '2023-10-06 06:11:00', 0, 'SO-028', NULL, 0),
(35, 'wda', 'pritamphp.quantumitinnovation@gmail.com', '1231231231', '$2y$10$I1q0pO.v8accWY9LI/DFde4uu3maNiYfJKhJBfWhErIWGZT9THNRu', 'Bahrain', 'al-Manamah', 'wad', 'Ocam buy', 9, '201', 4, '1698385368.png', '2023-10-27 00:25:08', '2023-10-27 00:25:08', 0, 'SO-034', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `upload_receipts`
--

CREATE TABLE `upload_receipts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receipt` mediumtext NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` bigint(20) UNSIGNED NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `riyal` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upload_receipts`
--

INSERT INTO `upload_receipts` (`id`, `receipt`, `customer_id`, `shop_id`, `approved`, `riyal`, `created_at`, `updated_at`, `total_amount`) VALUES
(3, '1691582990.png', 2, 15, 0, NULL, '2023-08-09 01:09:50', '2023-08-09 01:09:50', NULL),
(5, '1697025006.png', 2, 15, 1, NULL, '2023-10-11 06:20:06', '2023-10-11 06:21:43', NULL);

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
  `otp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `otp`) VALUES
(1, 'Admin', 'pritamphp.quantumitinnovation@gmail.com', NULL, '$2y$10$woTCCfT14E1.VL5l/A.svemhzMPnx1kRqRkL8Qt789FeRAYsL/VWm', NULL, '2023-07-12 20:40:28', '2023-11-17 04:32:47', '515054');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_customer_id_foreign` (`customer_id`),
  ADD KEY `carts_shop_id_foreign` (`shop_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirmed_orders`
--
ALTER TABLE `confirmed_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `confirmed_orders_product_id_foreign` (`product_id`),
  ADD KEY `confirmed_orders_customer_id_foreign` (`customer_id`),
  ADD KEY `confirmed_orders_shop_id_foreign` (`shop_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `email_otps`
--
ALTER TABLE `email_otps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_otps_email_index` (`email`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `job_registrations`
--
ALTER TABLE `job_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_shop_id_foreign` (`shop_id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shops_category_id_foreign` (`category_id`),
  ADD KEY `shops_offer_foreign` (`offer`),
  ADD KEY `shops_so_id_foreign` (`so_id`);

--
-- Indexes for table `shop_owners`
--
ALTER TABLE `shop_owners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_owners_shop_category_foreign` (`shop_category`),
  ADD KEY `shop_owners_offer_foreign` (`offer`);

--
-- Indexes for table `upload_receipts`
--
ALTER TABLE `upload_receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upload_receipts_customer_id_foreign` (`customer_id`),
  ADD KEY `upload_receipts_shop_id_foreign` (`shop_id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `confirmed_orders`
--
ALTER TABLE `confirmed_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `email_otps`
--
ALTER TABLE `email_otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_registrations`
--
ALTER TABLE `job_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `shop_owners`
--
ALTER TABLE `shop_owners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `upload_receipts`
--
ALTER TABLE `upload_receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `confirmed_orders`
--
ALTER TABLE `confirmed_orders`
  ADD CONSTRAINT `confirmed_orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `confirmed_orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `confirmed_orders_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shops`
--
ALTER TABLE `shops`
  ADD CONSTRAINT `shops_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shops_offer_foreign` FOREIGN KEY (`offer`) REFERENCES `offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shops_so_id_foreign` FOREIGN KEY (`so_id`) REFERENCES `shop_owners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shop_owners`
--
ALTER TABLE `shop_owners`
  ADD CONSTRAINT `shop_owners_offer_foreign` FOREIGN KEY (`offer`) REFERENCES `offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shop_owners_shop_category_foreign` FOREIGN KEY (`shop_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `upload_receipts`
--
ALTER TABLE `upload_receipts`
  ADD CONSTRAINT `upload_receipts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `upload_receipts_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
