-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2026 at 08:32 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `linkaura`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_18_063934_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `miniweb_aboutus`
--

CREATE TABLE `miniweb_aboutus` (
  `id` int NOT NULL,
  `mini_website_id` int NOT NULL,
  `aboutus_text` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `miniweb_aboutus`
--

INSERT INTO `miniweb_aboutus` (`id`, `mini_website_id`, `aboutus_text`, `created_at`, `m_date`) VALUES
(1, 2, 'Testing Abouts us 1', '2025-12-11 11:20:56', '2025-12-11 12:49:53'),
(3, 5, 'Order Online At Amazon Today — Choose From a Selection Of Kitchen Tools Like Countertop Sheets, Cutters, Cleaners & More. Amazon Offers an Array Of Unique Products From Hundreds Of Brands. Easy & Fast Delivery.', '2025-12-20 14:09:07', NULL),
(4, 4, 'Laravel is primarily used for building dynamic, full-stack web applications, APIs, e-commerce platforms, and custom CMS solutions. Its comprehensive documentation and large community make it accessible for beginners while still being powerful enough for large-scale enterprise applications. You can learn more about its features and documentation on the official Laravel website.', '2025-12-29 17:46:04', NULL),
(5, 6, 'fggsfvabvbadfvgfdgba vmnclu fkjfvkjgbjadfvXcbamfvbzbc <XMc McJHvamdfnabjh GdjhafhjGcghDVF', '2026-01-04 17:33:45', NULL),
(6, 7, 'app/Http/Kernel.php NO LONGER EXISTS\nLaravel moved everything to a new structure.\nSo let’s fix your CSRF issue the Laravel 12 way\napp/Http/Kernel.php NO LONGER EXISTS\nLaravel moved everything to a new structure.\nSo let’s fix your CSRF issue the Laravel 12 way\napp/Http/Kernel.php NO LONGER EXISTS\nLaravel moved everything to a new structure.\nSo let’s fix your CSRF issue the Laravel 12 way', '2026-01-04 18:12:18', NULL),
(7, 8, 'Good Services', '2026-01-27 10:51:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `miniweb_company_details`
--

CREATE TABLE `miniweb_company_details` (
  `id` int NOT NULL,
  `website_id` int NOT NULL,
  `websiteTemp_id` int NOT NULL,
  `user_id` int NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `owner_name` varchar(250) NOT NULL,
  `designation` varchar(250) NOT NULL,
  `logo_path` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_date` datetime DEFAULT NULL,
  `purchased_id` int NOT NULL,
  `plan_id` int NOT NULL,
  `plan_name` varchar(150) NOT NULL,
  `plan_amt` int NOT NULL,
  `plan_days` int NOT NULL,
  `purchased_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `miniweb_company_details`
--

INSERT INTO `miniweb_company_details` (`id`, `website_id`, `websiteTemp_id`, `user_id`, `company_name`, `owner_name`, `designation`, `logo_path`, `created_at`, `m_date`, `purchased_id`, `plan_id`, `plan_name`, `plan_amt`, `plan_days`, `purchased_date`) VALUES
(1, 0, 0, 1, 'Thirumurugan LinkAura', 'Balamurugan S', 'Founder & CEO', '1_Thirumurugan_LinkAura_20251205_103217.png', '2025-11-26 18:12:47', NULL, 0, 0, '', 0, 0, NULL),
(2, 5, 21, 1, 'Thirumurugan LinkAura', 'Balamurugan S', 'CEO', '1_Thirumurugan_LinkAura_20251205_104316.png', '2025-12-04 12:14:14', '2026-01-26 13:00:00', 1, 0, '', 0, 0, NULL),
(4, 3, 11, 1, 'Tm', 'Bala', 'CEO', '1_Tm_20251210_104052.webp', '2025-12-10 16:10:52', '2025-12-29 17:45:12', 1, 0, '', 0, 0, NULL),
(5, 1, 1, 1, 'TMinSBP Software Innovation Lab', 'Balamuruagan S', 'Full Stack Web Developer', '', '2025-12-20 14:06:40', '2025-12-20 14:06:48', 1, 0, '', 0, 0, NULL),
(6, 4, 16, 2, 'Bala Software PVT LTD', 'Bala', 'Web Developer', '2_Bala_Software_PVT_LTD_20260104_113835.jpg', '2026-01-04 17:08:35', '2026-01-04 17:44:35', 0, 0, '', 0, 0, NULL),
(7, 1, 1, 2, 'Sudha company', 'Sudha', 'Managing Director', '2_Sudha_company_20260104_123939.jpg', '2026-01-04 18:09:39', '2026-01-04 18:09:57', 0, 0, '', 0, 0, NULL),
(8, 5, 21, 3, 'Sendra Infotech', 'Parameswari', 'MD', '', '2026-01-27 10:50:22', '2026-01-27 10:51:08', 1, 0, '', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `miniweb_contact`
--

CREATE TABLE `miniweb_contact` (
  `id` int NOT NULL,
  `mini_website_id` int NOT NULL,
  `phone_number` bigint NOT NULL,
  `whatsapp_number` bigint NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `miniweb_contact`
--

INSERT INTO `miniweb_contact` (`id`, `mini_website_id`, `phone_number`, `whatsapp_number`, `email`, `address`, `created_at`, `m_date`) VALUES
(4, 2, 7548555555, 7548853487, 'info@tm.com', 'Erode-638186', '2025-12-10 15:15:22', '2025-12-11 12:49:29'),
(5, 4, 7548555555, 7548555555, 'bala@info.com', 'Erode', '2025-12-10 16:11:26', '2025-12-29 17:45:19'),
(6, 5, 7548555555, 7548555555, 'info@tm.com', '12-B Srinivasa, Valayakaranur Po, Komarapalayam - 638183', '2025-12-20 14:08:55', NULL),
(7, 6, 7548853487, 7548853487, 'info@g.com', 'asdfadsf', '2026-01-04 17:33:15', '2026-01-04 17:33:33'),
(8, 7, 7548853487, 7548853487, 'info@gmail.com', 'sdfadsfgadhfsdfwe', '2026-01-04 18:10:11', NULL),
(9, 8, 7548853486, 7548853486, 'info@sendrainfotech.com', '4/87 B , Rangan Poosari Kattuvalasu, Omalur, Pottipuram, Salem, Tamil Nadu 636309', '2026-01-27 10:51:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `miniweb_enquiries`
--

CREATE TABLE `miniweb_enquiries` (
  `id` int NOT NULL,
  `miniWebId` int NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone_number` bigint NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `enquiry_message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `miniweb_enquiries`
--

INSERT INTO `miniweb_enquiries` (`id`, `miniWebId`, `name`, `phone_number`, `product_name`, `enquiry_message`, `created_at`) VALUES
(1, 2, 'Balamurugan', 7548853487, 'Test1', 'cleaning tooth brush price list', '2025-12-16 06:26:01'),
(2, 2, 'bala', 7878787878, 'test 5', 'teat', '2025-12-15 02:31:39'),
(3, 2, 'Bala', 9874563210, 'Test 2', 'Website 1 enquiry', '2025-12-16 06:26:01'),
(4, 8, 'bala', 7548853487, 'Product1', '100 orders need', '2026-01-27 05:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `miniweb_feedback`
--

CREATE TABLE `miniweb_feedback` (
  `id` int NOT NULL,
  `miniWebId` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` bigint NOT NULL,
  `feedback_message` varchar(125) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verify` int NOT NULL COMMENT '0-pending,1-verified,2-rejected',
  `verify_at` datetime DEFAULT NULL,
  `reject_remarks` varchar(250) DEFAULT NULL,
  `reject_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `miniweb_feedback`
--

INSERT INTO `miniweb_feedback` (`id`, `miniWebId`, `name`, `phone`, `feedback_message`, `created_at`, `verify`, `verify_at`, `reject_remarks`, `reject_at`) VALUES
(2, 2, 'Balamurugan S', 7548853487, 'all service is fine vv good', '2025-12-15 04:21:45', 1, '2025-12-17 15:47:39', NULL, NULL),
(3, 2, 'Balamurugan', 9578412630, 'Website 1 feedback', '2025-12-16 06:29:10', 2, NULL, 'testing', '2025-12-17 16:31:49'),
(4, 4, 'Balamurugan', 7548853487, 'this is tresting feedback', '2025-12-29 07:14:19', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `miniweb_gallery`
--

CREATE TABLE `miniweb_gallery` (
  `id` int NOT NULL,
  `mini_website_id` int NOT NULL,
  `gallery` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `miniweb_gallery`
--

INSERT INTO `miniweb_gallery` (`id`, `mini_website_id`, `gallery`, `created_at`, `m_date`) VALUES
(1, 2, '2_la_20251212_093503_693be1c773e2a.jpg', '2025-12-12 15:05:03', '2025-12-12 15:06:03'),
(2, 2, '2_la_20251212_093531_693be1e38418e.jpeg', '2025-12-12 15:05:03', '2025-12-12 15:06:03'),
(3, 2, '2_la_20251212_093503_693be1c776c00.png', '2025-12-12 15:05:03', '2025-12-12 15:06:03'),
(4, 2, '2_la_20251212_093503_693be1c777f94.png', '2025-12-12 15:05:03', '2025-12-12 15:06:03'),
(5, 2, NULL, '2025-12-12 15:05:03', '2025-12-12 15:06:03'),
(6, 2, NULL, '2025-12-12 15:05:03', '2025-12-12 15:06:03'),
(7, 2, NULL, '2025-12-12 15:05:03', '2025-12-12 15:06:03'),
(8, 2, NULL, '2025-12-12 15:05:03', '2025-12-12 15:06:03'),
(9, 2, NULL, '2025-12-12 15:05:03', '2025-12-12 15:06:03'),
(10, 2, NULL, '2025-12-12 15:05:03', '2025-12-12 15:06:03'),
(11, 5, '5_la_20251220_085654_694664d69963e.png', '2025-12-20 14:10:43', '2025-12-20 14:26:54'),
(12, 5, '5_la_20251220_085654_694664d69c6bd.png', '2025-12-20 14:10:43', '2025-12-20 14:26:54'),
(13, 5, NULL, '2025-12-20 14:10:43', '2025-12-20 14:26:54'),
(14, 5, NULL, '2025-12-20 14:10:43', '2025-12-20 14:26:54'),
(15, 5, NULL, '2025-12-20 14:10:43', '2025-12-20 14:26:54'),
(16, 5, NULL, '2025-12-20 14:10:43', '2025-12-20 14:26:54'),
(17, 5, NULL, '2025-12-20 14:10:43', '2025-12-20 14:26:54'),
(18, 5, NULL, '2025-12-20 14:10:43', '2025-12-20 14:26:54'),
(19, 5, NULL, '2025-12-20 14:10:43', '2025-12-20 14:26:54'),
(20, 5, NULL, '2025-12-20 14:10:43', '2025-12-20 14:26:54'),
(21, 4, '4_la_20251229_121901_695271b5d1e17.jpg', '2025-12-29 17:49:01', NULL),
(22, 4, '4_la_20251229_121901_695271b5d3c69.png', '2025-12-29 17:49:01', NULL),
(23, 4, '4_la_20251229_121901_695271b5d5100.jpeg', '2025-12-29 17:49:01', NULL),
(24, 4, '4_la_20251229_121901_695271b5d7203.png', '2025-12-29 17:49:01', NULL),
(25, 4, NULL, '2025-12-29 17:49:01', NULL),
(26, 4, NULL, '2025-12-29 17:49:01', NULL),
(27, 4, NULL, '2025-12-29 17:49:01', NULL),
(28, 4, NULL, '2025-12-29 17:49:01', NULL),
(29, 4, NULL, '2025-12-29 17:49:01', NULL),
(30, 4, NULL, '2025-12-29 17:49:01', NULL),
(31, 6, '6_la_20260104_120602_695a57aa2110b.jpg', '2026-01-04 17:36:02', NULL),
(32, 6, '6_la_20260104_120602_695a57aa250a8.jpg', '2026-01-04 17:36:02', NULL),
(33, 6, '6_la_20260104_120602_695a57aa27dba.jpg', '2026-01-04 17:36:02', NULL),
(34, 6, '6_la_20260104_120602_695a57aa2b747.jpg', '2026-01-04 17:36:02', NULL),
(35, 6, NULL, '2026-01-04 17:36:02', NULL),
(36, 6, NULL, '2026-01-04 17:36:02', NULL),
(37, 6, NULL, '2026-01-04 17:36:02', NULL),
(38, 6, NULL, '2026-01-04 17:36:02', NULL),
(39, 6, NULL, '2026-01-04 17:36:02', NULL),
(40, 6, NULL, '2026-01-04 17:36:02', NULL),
(41, 7, '7_la_20260104_124448_695a60c0df857.jpg', '2026-01-04 18:14:48', NULL),
(42, 7, '7_la_20260104_124448_695a60c0e3de5.jpg', '2026-01-04 18:14:48', NULL),
(43, 7, '7_la_20260104_124448_695a60c0e6767.jpg', '2026-01-04 18:14:48', NULL),
(44, 7, '7_la_20260104_124448_695a60c0e9ccf.jpg', '2026-01-04 18:14:48', NULL),
(45, 7, NULL, '2026-01-04 18:14:48', NULL),
(46, 7, NULL, '2026-01-04 18:14:48', NULL),
(47, 7, NULL, '2026-01-04 18:14:48', NULL),
(48, 7, NULL, '2026-01-04 18:14:48', NULL),
(49, 7, NULL, '2026-01-04 18:14:49', NULL),
(50, 7, NULL, '2026-01-04 18:14:49', NULL),
(51, 8, '8_la_20260127_052744_69784cd0d56e9.jpg', '2026-01-27 10:57:44', NULL),
(52, 8, '8_la_20260127_052744_69784cd0d8b59.jpg', '2026-01-27 10:57:44', NULL),
(53, 8, '8_la_20260127_052744_69784cd0db74f.jpg', '2026-01-27 10:57:44', NULL),
(54, 8, '8_la_20260127_052744_69784cd0de492.jpg', '2026-01-27 10:57:44', NULL),
(55, 8, NULL, '2026-01-27 10:57:44', NULL),
(56, 8, NULL, '2026-01-27 10:57:44', NULL),
(57, 8, NULL, '2026-01-27 10:57:44', NULL),
(58, 8, NULL, '2026-01-27 10:57:44', NULL),
(59, 8, NULL, '2026-01-27 10:57:44', NULL),
(60, 8, NULL, '2026-01-27 10:57:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `miniweb_payments_details`
--

CREATE TABLE `miniweb_payments_details` (
  `id` int NOT NULL,
  `mini_website_id` int NOT NULL,
  `gpay_number` bigint NOT NULL,
  `phonepe_number` bigint NOT NULL,
  `paytm_number` bigint NOT NULL,
  `gpay_qr_code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `phonepe_qr_code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `paytm_qr_code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `miniweb_payments_details`
--

INSERT INTO `miniweb_payments_details` (`id`, `mini_website_id`, `gpay_number`, `phonepe_number`, `paytm_number`, `gpay_qr_code`, `phonepe_qr_code`, `paytm_qr_code`, `created_at`, `m_date`) VALUES
(1, 2, 7548853487, 7548853487, 7548853488, '2_la_20251213_074521_693d1991293ab.jpg', '2_la_20251213_074521_693d19912a1f1.png', '2_la_20251213_112818_693d4dd23bf88.png', '2025-12-13 13:15:21', '2025-12-16 16:32:24'),
(2, 5, 7548853487, 0, 0, '5_la_20251220_085724_694664f4dfea7.png', NULL, NULL, '2025-12-20 14:16:23', '2025-12-20 14:27:24'),
(3, 4, 0, 0, 0, NULL, NULL, NULL, '2025-12-29 17:52:52', '2025-12-29 18:10:42'),
(7, 6, 7548853487, 0, 0, '6_la_20260104_120616_695a57b8056ae.jpg', NULL, NULL, '2026-01-04 17:36:16', '2026-01-04 17:45:44'),
(8, 6, 0, 0, 0, NULL, NULL, NULL, '2026-01-04 17:43:07', NULL),
(9, 7, 7548853487, 0, 0, '7_la_20260104_124510_695a60d666a4e.jpg', NULL, NULL, '2026-01-04 18:15:10', NULL),
(10, 8, 7548853487, 0, 0, '8_la_20260127_052852_69784d1441a0d.jpg', NULL, NULL, '2026-01-27 10:58:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `miniweb_products`
--

CREATE TABLE `miniweb_products` (
  `id` int NOT NULL,
  `mini_website_id` int NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `orginal_price` int NOT NULL,
  `discount_price` int NOT NULL,
  `final_price` int NOT NULL,
  `product_img` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `miniweb_products`
--

INSERT INTO `miniweb_products` (`id`, `mini_website_id`, `product_name`, `orginal_price`, `discount_price`, `final_price`, `product_img`, `created_at`, `m_date`) VALUES
(1, 2, 'Test1', 58000, 250, 57750, '2_la_20251212_063421_693bb76d788c1.jpeg', '2025-12-12 12:03:46', '2025-12-12 12:04:21'),
(2, 2, 'Test 2', 69000, 90, 68910, '2_la_20251212_063421_693bb76d7a675.png', '2025-12-12 12:03:47', '2025-12-12 12:04:21'),
(3, 2, '', 0, 0, 0, NULL, '2025-12-12 12:03:47', '2025-12-12 12:04:21'),
(4, 2, '', 0, 0, 0, NULL, '2025-12-12 12:03:47', '2025-12-12 12:04:21'),
(5, 2, '', 0, 0, 0, NULL, '2025-12-12 12:03:47', '2025-12-12 12:04:21'),
(6, 2, '', 0, 0, 0, NULL, '2025-12-12 12:03:47', '2025-12-12 12:04:21'),
(7, 2, '', 0, 0, 0, NULL, '2025-12-12 12:03:47', '2025-12-12 12:04:21'),
(8, 2, '', 0, 0, 0, NULL, '2025-12-12 12:03:47', '2025-12-12 12:04:21'),
(9, 2, '', 0, 0, 0, NULL, '2025-12-12 12:03:47', '2025-12-12 12:04:21'),
(10, 2, '', 0, 0, 0, NULL, '2025-12-12 12:03:47', '2025-12-12 12:04:21'),
(11, 2, '', 0, 0, 0, NULL, '2025-12-12 12:03:47', '2025-12-12 12:04:21'),
(12, 2, '', 0, 0, 0, NULL, '2025-12-12 12:03:47', '2025-12-12 12:04:21'),
(13, 2, '', 0, 0, 0, NULL, '2025-12-12 12:03:47', '2025-12-12 12:04:21'),
(14, 2, '', 0, 0, 0, NULL, '2025-12-12 12:03:47', '2025-12-12 12:04:21'),
(15, 2, '', 0, 0, 0, NULL, '2025-12-12 12:03:47', '2025-12-12 12:04:21'),
(16, 2, '', 0, 0, 0, NULL, '2025-12-12 12:03:47', '2025-12-12 12:04:21'),
(17, 2, '', 0, 0, 0, NULL, '2025-12-12 12:03:47', '2025-12-12 12:04:21'),
(18, 2, '', 0, 0, 0, NULL, '2025-12-12 12:03:47', '2025-12-12 12:04:21'),
(19, 2, '', 0, 0, 0, NULL, '2025-12-12 12:03:47', '2025-12-12 12:04:21'),
(20, 2, '', 0, 0, 0, NULL, '2025-12-12 12:03:47', '2025-12-12 12:04:21'),
(21, 5, 'Pro 1', 750, 20, 730, '5_la_20251220_085327_694664076562d.png', '2025-12-20 14:09:12', '2025-12-20 14:23:27'),
(22, 5, '', 0, 0, 0, NULL, '2025-12-20 14:09:12', '2025-12-20 14:23:27'),
(23, 5, '', 0, 0, 0, NULL, '2025-12-20 14:09:12', '2025-12-20 14:23:27'),
(24, 5, '', 0, 0, 0, NULL, '2025-12-20 14:09:12', '2025-12-20 14:23:27'),
(25, 5, '', 0, 0, 0, NULL, '2025-12-20 14:09:12', '2025-12-20 14:23:27'),
(26, 5, '', 0, 0, 0, NULL, '2025-12-20 14:09:12', '2025-12-20 14:23:27'),
(27, 5, '', 0, 0, 0, NULL, '2025-12-20 14:09:12', '2025-12-20 14:23:27'),
(28, 5, '', 0, 0, 0, NULL, '2025-12-20 14:09:12', '2025-12-20 14:23:27'),
(29, 5, '', 0, 0, 0, NULL, '2025-12-20 14:09:12', '2025-12-20 14:23:27'),
(30, 5, '', 0, 0, 0, NULL, '2025-12-20 14:09:12', '2025-12-20 14:23:27'),
(31, 5, '', 0, 0, 0, NULL, '2025-12-20 14:09:12', '2025-12-20 14:23:27'),
(32, 5, '', 0, 0, 0, NULL, '2025-12-20 14:09:12', '2025-12-20 14:23:27'),
(33, 5, '', 0, 0, 0, NULL, '2025-12-20 14:09:12', '2025-12-20 14:23:27'),
(34, 5, '', 0, 0, 0, NULL, '2025-12-20 14:09:12', '2025-12-20 14:23:27'),
(35, 5, '', 0, 0, 0, NULL, '2025-12-20 14:09:12', '2025-12-20 14:23:27'),
(36, 5, '', 0, 0, 0, NULL, '2025-12-20 14:09:12', '2025-12-20 14:23:27'),
(37, 5, '', 0, 0, 0, NULL, '2025-12-20 14:09:12', '2025-12-20 14:23:27'),
(38, 5, '', 0, 0, 0, NULL, '2025-12-20 14:09:12', '2025-12-20 14:23:27'),
(39, 5, '', 0, 0, 0, NULL, '2025-12-20 14:09:12', '2025-12-20 14:23:27'),
(40, 5, '', 0, 0, 0, NULL, '2025-12-20 14:09:12', '2025-12-20 14:23:27'),
(41, 4, 'Visiting Card', 7500, 500, 7000, '4_la_20251229_121813_695271851cac3.jpg', '2025-12-29 17:48:13', NULL),
(42, 4, 'Happy New Year', 8500, 200, 8300, '4_la_20251229_121813_695271851f163.png', '2025-12-29 17:48:13', NULL),
(43, 4, 'WhatsApp Promotion', 12000, 250, 11750, '4_la_20251229_121813_6952718520a42.png', '2025-12-29 17:48:13', NULL),
(44, 4, 'Logo Design', 9500, 100, 9400, '4_la_20251229_121813_6952718521ee3.jpeg', '2025-12-29 17:48:13', NULL),
(45, 4, '', 0, 0, 0, NULL, '2025-12-29 17:48:13', NULL),
(46, 4, '', 0, 0, 0, NULL, '2025-12-29 17:48:13', NULL),
(47, 4, '', 0, 0, 0, NULL, '2025-12-29 17:48:13', NULL),
(48, 4, '', 0, 0, 0, NULL, '2025-12-29 17:48:13', NULL),
(49, 4, '', 0, 0, 0, NULL, '2025-12-29 17:48:13', NULL),
(50, 4, '', 0, 0, 0, NULL, '2025-12-29 17:48:13', NULL),
(51, 4, '', 0, 0, 0, NULL, '2025-12-29 17:48:13', NULL),
(52, 4, '', 0, 0, 0, NULL, '2025-12-29 17:48:13', NULL),
(53, 4, '', 0, 0, 0, NULL, '2025-12-29 17:48:13', NULL),
(54, 4, '', 0, 0, 0, NULL, '2025-12-29 17:48:13', NULL),
(55, 4, '', 0, 0, 0, NULL, '2025-12-29 17:48:13', NULL),
(56, 4, '', 0, 0, 0, NULL, '2025-12-29 17:48:13', NULL),
(57, 4, '', 0, 0, 0, NULL, '2025-12-29 17:48:13', NULL),
(58, 4, '', 0, 0, 0, NULL, '2025-12-29 17:48:13', NULL),
(59, 4, '', 0, 0, 0, NULL, '2025-12-29 17:48:13', NULL),
(60, 4, '', 0, 0, 0, NULL, '2025-12-29 17:48:13', NULL),
(61, 6, 'Product 1', 250, 50, 200, '6_la_20260104_120525_695a5785df12e.jpg', '2026-01-04 17:35:25', '2026-01-04 17:35:32'),
(62, 6, 'Product 12', 350, 5, 345, '6_la_20260104_120525_695a5785e3485.jpg', '2026-01-04 17:35:25', '2026-01-04 17:35:32'),
(63, 6, '', 0, 0, 0, NULL, '2026-01-04 17:35:25', '2026-01-04 17:35:32'),
(64, 6, '', 0, 0, 0, NULL, '2026-01-04 17:35:25', '2026-01-04 17:35:32'),
(65, 6, '', 0, 0, 0, NULL, '2026-01-04 17:35:25', '2026-01-04 17:35:32'),
(66, 6, '', 0, 0, 0, NULL, '2026-01-04 17:35:25', '2026-01-04 17:35:32'),
(67, 6, '', 0, 0, 0, NULL, '2026-01-04 17:35:25', '2026-01-04 17:35:32'),
(68, 6, '', 0, 0, 0, NULL, '2026-01-04 17:35:25', '2026-01-04 17:35:32'),
(69, 6, '', 0, 0, 0, NULL, '2026-01-04 17:35:26', '2026-01-04 17:35:32'),
(70, 6, '', 0, 0, 0, NULL, '2026-01-04 17:35:26', '2026-01-04 17:35:32'),
(71, 6, '', 0, 0, 0, NULL, '2026-01-04 17:35:26', '2026-01-04 17:35:32'),
(72, 6, '', 0, 0, 0, NULL, '2026-01-04 17:35:26', '2026-01-04 17:35:32'),
(73, 6, '', 0, 0, 0, NULL, '2026-01-04 17:35:26', '2026-01-04 17:35:32'),
(74, 6, '', 0, 0, 0, NULL, '2026-01-04 17:35:26', '2026-01-04 17:35:32'),
(75, 6, '', 0, 0, 0, NULL, '2026-01-04 17:35:26', '2026-01-04 17:35:32'),
(76, 6, '', 0, 0, 0, NULL, '2026-01-04 17:35:26', '2026-01-04 17:35:32'),
(77, 6, '', 0, 0, 0, NULL, '2026-01-04 17:35:26', '2026-01-04 17:35:32'),
(78, 6, '', 0, 0, 0, NULL, '2026-01-04 17:35:26', '2026-01-04 17:35:32'),
(79, 6, '', 0, 0, 0, NULL, '2026-01-04 17:35:26', '2026-01-04 17:35:32'),
(80, 6, '', 0, 0, 0, NULL, '2026-01-04 17:35:26', '2026-01-04 17:35:32'),
(81, 7, 'product 1', 520, 20, 500, '7_la_20260104_124323_695a606bb536f.jpg', '2026-01-04 18:13:23', NULL),
(82, 7, 'product 2', 600, 50, 550, '7_la_20260104_124323_695a606bb8de2.jpg', '2026-01-04 18:13:23', NULL),
(83, 7, '', 0, 0, 0, NULL, '2026-01-04 18:13:23', NULL),
(84, 7, '', 0, 0, 0, NULL, '2026-01-04 18:13:23', NULL),
(85, 7, '', 0, 0, 0, NULL, '2026-01-04 18:13:23', NULL),
(86, 7, '', 0, 0, 0, NULL, '2026-01-04 18:13:23', NULL),
(87, 7, '', 0, 0, 0, NULL, '2026-01-04 18:13:23', NULL),
(88, 7, '', 0, 0, 0, NULL, '2026-01-04 18:13:23', NULL),
(89, 7, '', 0, 0, 0, NULL, '2026-01-04 18:13:23', NULL),
(90, 7, '', 0, 0, 0, NULL, '2026-01-04 18:13:23', NULL),
(91, 7, '', 0, 0, 0, NULL, '2026-01-04 18:13:23', NULL),
(92, 7, '', 0, 0, 0, NULL, '2026-01-04 18:13:23', NULL),
(93, 7, '', 0, 0, 0, NULL, '2026-01-04 18:13:23', NULL),
(94, 7, '', 0, 0, 0, NULL, '2026-01-04 18:13:23', NULL),
(95, 7, '', 0, 0, 0, NULL, '2026-01-04 18:13:23', NULL),
(96, 7, '', 0, 0, 0, NULL, '2026-01-04 18:13:23', NULL),
(97, 7, '', 0, 0, 0, NULL, '2026-01-04 18:13:23', NULL),
(98, 7, '', 0, 0, 0, NULL, '2026-01-04 18:13:23', NULL),
(99, 7, '', 0, 0, 0, NULL, '2026-01-04 18:13:23', NULL),
(100, 7, '', 0, 0, 0, NULL, '2026-01-04 18:13:23', NULL),
(101, 8, 'Product1', 150, 50, 100, '8_la_20260127_052659_69784ca329228.jpg', '2026-01-27 10:56:59', NULL),
(102, 8, 'Product2', 250, 20, 230, '8_la_20260127_052659_69784ca32e1a8.jpg', '2026-01-27 10:56:59', NULL),
(103, 8, 'Product3', 360, 10, 350, '8_la_20260127_052659_69784ca33117d.jpg', '2026-01-27 10:56:59', NULL),
(104, 8, 'Product4', 520, 20, 500, '8_la_20260127_052659_69784ca33426f.jpg', '2026-01-27 10:56:59', NULL),
(105, 8, '', 0, 0, 0, NULL, '2026-01-27 10:56:59', NULL),
(106, 8, '', 0, 0, 0, NULL, '2026-01-27 10:56:59', NULL),
(107, 8, '', 0, 0, 0, NULL, '2026-01-27 10:56:59', NULL),
(108, 8, '', 0, 0, 0, NULL, '2026-01-27 10:56:59', NULL),
(109, 8, '', 0, 0, 0, NULL, '2026-01-27 10:56:59', NULL),
(110, 8, '', 0, 0, 0, NULL, '2026-01-27 10:56:59', NULL),
(111, 8, '', 0, 0, 0, NULL, '2026-01-27 10:56:59', NULL),
(112, 8, '', 0, 0, 0, NULL, '2026-01-27 10:56:59', NULL),
(113, 8, '', 0, 0, 0, NULL, '2026-01-27 10:56:59', NULL),
(114, 8, '', 0, 0, 0, NULL, '2026-01-27 10:56:59', NULL),
(115, 8, '', 0, 0, 0, NULL, '2026-01-27 10:56:59', NULL),
(116, 8, '', 0, 0, 0, NULL, '2026-01-27 10:56:59', NULL),
(117, 8, '', 0, 0, 0, NULL, '2026-01-27 10:56:59', NULL),
(118, 8, '', 0, 0, 0, NULL, '2026-01-27 10:56:59', NULL),
(119, 8, '', 0, 0, 0, NULL, '2026-01-27 10:56:59', NULL),
(120, 8, '', 0, 0, 0, NULL, '2026-01-27 10:56:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `miniweb_qrcode`
--

CREATE TABLE `miniweb_qrcode` (
  `id` int NOT NULL,
  `mini_website_id` int NOT NULL,
  `qr_code` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `miniweb_qrcode`
--

INSERT INTO `miniweb_qrcode` (`id`, `mini_website_id`, `qr_code`, `created_at`, `m_date`) VALUES
(1, 2, '2_1_1.png', '2025-12-14 11:31:29', '2025-12-16 16:32:26'),
(2, 5, '5_1_1.png', '2025-12-20 14:15:54', '2025-12-20 14:27:26'),
(3, 4, '4_3_11.png', '2025-12-29 17:52:56', '2025-12-29 18:10:42'),
(4, 6, '6_4_16.png', '2026-01-04 17:36:17', '2026-01-04 17:45:46'),
(5, 7, '7_1_1.png', '2026-01-04 18:15:11', NULL),
(6, 8, '8_5_21.png', '2026-01-27 10:58:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `miniweb_services`
--

CREATE TABLE `miniweb_services` (
  `id` int NOT NULL,
  `mini_website_id` int NOT NULL,
  `service_name` varchar(150) NOT NULL,
  `service_img` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `miniweb_services`
--

INSERT INTO `miniweb_services` (`id`, `mini_website_id`, `service_name`, `service_img`, `created_at`, `m_date`) VALUES
(1, 2, 'Youtube Service', '2_la_20251212_073340_693bc5541a4c9.png', '2025-12-12 12:58:58', '2025-12-12 14:34:03'),
(2, 2, 'Fb Service', '2_la_20251212_073148_693bc4e4a3d21.png', '2025-12-12 12:58:58', '2025-12-12 14:34:03'),
(3, 2, '', NULL, '2025-12-12 12:58:58', '2025-12-12 14:34:03'),
(4, 2, '', NULL, '2025-12-12 12:58:58', '2025-12-12 14:34:03'),
(5, 2, '', NULL, '2025-12-12 12:58:58', '2025-12-12 14:34:03'),
(6, 2, '', NULL, '2025-12-12 12:58:58', '2025-12-12 14:34:03'),
(7, 2, '', NULL, '2025-12-12 12:58:58', '2025-12-12 14:34:03'),
(8, 2, '', NULL, '2025-12-12 12:58:58', '2025-12-12 14:34:03'),
(9, 2, '', NULL, '2025-12-12 12:58:58', '2025-12-12 14:34:03'),
(10, 2, '', NULL, '2025-12-12 12:58:58', '2025-12-12 14:34:03'),
(11, 5, 'Female matrimony Serice', '5_la_20251220_085412_694664348dbe4.png', '2025-12-20 14:10:38', '2025-12-20 14:24:12'),
(12, 5, '', NULL, '2025-12-20 14:10:38', '2025-12-20 14:24:12'),
(13, 5, '', NULL, '2025-12-20 14:10:38', '2025-12-20 14:24:12'),
(14, 5, '', NULL, '2025-12-20 14:10:38', '2025-12-20 14:24:12'),
(15, 5, '', NULL, '2025-12-20 14:10:38', '2025-12-20 14:24:12'),
(16, 5, '', NULL, '2025-12-20 14:10:38', '2025-12-20 14:24:12'),
(17, 5, '', NULL, '2025-12-20 14:10:38', '2025-12-20 14:24:12'),
(18, 5, '', NULL, '2025-12-20 14:10:38', '2025-12-20 14:24:12'),
(19, 5, '', NULL, '2025-12-20 14:10:38', '2025-12-20 14:24:12'),
(20, 5, '', NULL, '2025-12-20 14:10:38', '2025-12-20 14:24:12'),
(21, 4, 'Visiting Card', '4_la_20251229_121845_695271a5e8962.jpg', '2025-12-29 17:48:45', NULL),
(22, 4, 'Logo Service', '4_la_20251229_121845_695271a5ea6e2.jpeg', '2025-12-29 17:48:45', NULL),
(23, 4, 'WhatsApp Service', '4_la_20251229_121845_695271a5eb859.png', '2025-12-29 17:48:45', NULL),
(24, 4, '', NULL, '2025-12-29 17:48:45', NULL),
(25, 4, '', NULL, '2025-12-29 17:48:45', NULL),
(26, 4, '', NULL, '2025-12-29 17:48:45', NULL),
(27, 4, '', NULL, '2025-12-29 17:48:45', NULL),
(28, 4, '', NULL, '2025-12-29 17:48:45', NULL),
(29, 4, '', NULL, '2025-12-29 17:48:45', NULL),
(30, 4, '', NULL, '2025-12-29 17:48:45', NULL),
(31, 6, 'Service 1', '6_la_20260104_120548_695a579cce6a2.jpg', '2026-01-04 17:35:48', NULL),
(32, 6, 'service 2', '6_la_20260104_120548_695a579cd27ee.jpg', '2026-01-04 17:35:48', NULL),
(33, 6, '', NULL, '2026-01-04 17:35:48', NULL),
(34, 6, '', NULL, '2026-01-04 17:35:48', NULL),
(35, 6, '', NULL, '2026-01-04 17:35:48', NULL),
(36, 6, '', NULL, '2026-01-04 17:35:48', NULL),
(37, 6, '', NULL, '2026-01-04 17:35:48', NULL),
(38, 6, '', NULL, '2026-01-04 17:35:48', NULL),
(39, 6, '', NULL, '2026-01-04 17:35:48', NULL),
(40, 6, '', NULL, '2026-01-04 17:35:48', NULL),
(41, 7, 'Service1', '7_la_20260104_124411_695a609bbb340.jpg', '2026-01-04 18:14:11', NULL),
(42, 7, 'Service2', '7_la_20260104_124411_695a609bbf705.jpg', '2026-01-04 18:14:11', NULL),
(43, 7, '', NULL, '2026-01-04 18:14:11', NULL),
(44, 7, '', NULL, '2026-01-04 18:14:11', NULL),
(45, 7, '', NULL, '2026-01-04 18:14:11', NULL),
(46, 7, '', NULL, '2026-01-04 18:14:11', NULL),
(47, 7, '', NULL, '2026-01-04 18:14:11', NULL),
(48, 7, '', NULL, '2026-01-04 18:14:11', NULL),
(49, 7, '', NULL, '2026-01-04 18:14:11', NULL),
(50, 7, '', NULL, '2026-01-04 18:14:11', NULL),
(51, 8, 'Service1', '8_la_20260127_052729_69784cc16a3da.jpg', '2026-01-27 10:57:29', NULL),
(52, 8, 'Service', '8_la_20260127_052729_69784cc16da54.jpg', '2026-01-27 10:57:29', NULL),
(53, 8, '', NULL, '2026-01-27 10:57:29', NULL),
(54, 8, '', NULL, '2026-01-27 10:57:29', NULL),
(55, 8, '', NULL, '2026-01-27 10:57:29', NULL),
(56, 8, '', NULL, '2026-01-27 10:57:29', NULL),
(57, 8, '', NULL, '2026-01-27 10:57:29', NULL),
(58, 8, '', NULL, '2026-01-27 10:57:29', NULL),
(59, 8, '', NULL, '2026-01-27 10:57:29', NULL),
(60, 8, '', NULL, '2026-01-27 10:57:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `miniweb_social_links`
--

CREATE TABLE `miniweb_social_links` (
  `id` int NOT NULL,
  `mini_website_id` int NOT NULL,
  `facebook_url` text NOT NULL,
  `instagram_url` text NOT NULL,
  `whatsapp_link` text NOT NULL,
  `youtube_Url1` text NOT NULL,
  `youtube_Url2` text NOT NULL,
  `instaReals_Url1` text NOT NULL,
  `instaReals_Url2` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `miniweb_social_links`
--

INSERT INTO `miniweb_social_links` (`id`, `mini_website_id`, `facebook_url`, `instagram_url`, `whatsapp_link`, `youtube_Url1`, `youtube_Url2`, `instaReals_Url1`, `instaReals_Url2`, `created_at`, `m_date`) VALUES
(1, 2, 'https://www.facebook.com/profile.php?id=100001896324695', 'https://www.instagram.com/slbm.balakarthi/?hl=en', 'https://www.facebook.com/profile.php?id=100001896324696', '', '', '', '', '2025-12-11 12:31:38', '2025-12-11 12:50:19'),
(2, 5, '', '', '', '', '', '', '', '2025-12-20 14:09:10', NULL),
(3, 4, 'https://www.facebook.com/profile.php?id=100001896324695', 'https://www.facebook.com/profile.php?id=100001896324695', 'https://www.facebook.com/profile.php?id=100001896324695', '', '', '', '', '2025-12-29 17:46:30', NULL),
(4, 6, 'https://www.facebook.com/profile.php?id=100001896324695', 'https://www.facebook.com/profile.php?id=100001896324695', 'https://www.facebook.com/profile.php?id=100001896324695', '', '', '', '', '2026-01-04 17:34:54', NULL),
(5, 7, 'https://www.facebook.com/profile.php?id=100001896324695', 'https://www.facebook.com/profile.php?id=100001896324695', 'https://www.facebook.com/profile.php?id=100001896324695', '', '', '', '', '2026-01-04 18:12:36', NULL),
(6, 8, 'https://www.justdial.com/Salem/Sendra-Infotech-Pottipuram/0427PX427-X427-180330152625-E6Q9_BZDET', 'https://www.justdial.com/Salem/Sendra-Infotech-Pottipuram/0427PX427-X427-180330152625-E6Q9_BZDET', 'https://www.justdial.com/Salem/Sendra-Infotech-Pottipuram/0427PX427-X427-180330152625-E6Q9_BZDET', 'https://www.justdial.com/Salem/Sendra-Infotech-Pottipuram/0427PX427-X427-180330152625-E6Q9_BZDET', 'https://www.justdial.com/Salem/Sendra-Infotech-Pottipuram/0427PX427-X427-180330152625-E6Q9_BZDET', 'https://www.justdial.com/Salem/Sendra-Infotech-Pottipuram/0427PX427-X427-180330152625-E6Q9_BZDET', 'https://www.justdial.com/Salem/Sendra-Infotech-Pottipuram/0427PX427-X427-180330152625-E6Q9_BZDET', '2026-01-27 10:55:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '9885b42dfde3ac275b6dc4eb00ff600908bd05fc67bae769fa961d4b870ba06f', '[\"*\"]', '2025-11-20 18:33:48', NULL, '2025-11-20 18:33:48', '2025-11-20 18:33:48'),
(2, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '56d8b03352826a217d8b87bd846313cfabd702b0dbb17d43b1bf28d697de4ab2', '[\"*\"]', '2025-11-20 18:35:15', NULL, '2025-11-20 18:35:15', '2025-11-20 18:35:15'),
(3, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '63409b5975065bf5bbd3dca338ad411b7354ec98b605bd0eeb240642f7ea4902', '[\"*\"]', NULL, NULL, '2025-11-20 18:46:01', '2025-11-20 18:46:01'),
(4, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', 'b1bc643e298d070386fa4b8b44f50526fca2c582bb5c5e91bb5d027fb4cf1730', '[\"*\"]', '2025-11-20 18:46:49', NULL, '2025-11-20 18:46:48', '2025-11-20 18:46:49'),
(5, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '1448142cb5ebe975be84ecd34239bc00ec6e2d9245bafa93ade53c238a54ce9a', '[\"*\"]', '2025-11-20 18:47:17', NULL, '2025-11-20 18:47:17', '2025-11-20 18:47:17'),
(6, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '511fffca3571aed41f163fd45913af0f8a16b20c4d9d6985dafeee2bec2714de', '[\"*\"]', '2025-11-20 18:50:21', NULL, '2025-11-20 18:50:21', '2025-11-20 18:50:21'),
(7, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '664ae82588a3618e7a06e46c7a57e789b36d684cf5586990da5fa12f353eb66e', '[\"*\"]', '2025-11-20 18:52:07', NULL, '2025-11-20 18:52:06', '2025-11-20 18:52:07'),
(8, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '7ce0dd834039d4fff7b01dfd35bb7765539a27e5bbe4684993e033798706a14c', '[\"*\"]', '2025-11-20 18:53:24', NULL, '2025-11-20 18:53:24', '2025-11-20 18:53:24'),
(9, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '73f1d6ef56f6a5849d6a317d27f4ca7fd63432c0c4a3a89aabf84f97f45cc22c', '[\"*\"]', '2025-11-20 18:58:36', NULL, '2025-11-20 18:58:35', '2025-11-20 18:58:36'),
(10, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '389a2be5e82fb5da5ae6442bbd4b1587e38832d3b1b5cdfd2913c4be9ddba0ed', '[\"*\"]', '2025-11-20 19:05:47', NULL, '2025-11-20 19:05:47', '2025-11-20 19:05:47'),
(11, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '3569048e8ed645ac315b305b4535289f21a7c0750848e9ab1c3a9c3a99d5b5e6', '[\"*\"]', '2025-11-20 19:06:42', NULL, '2025-11-20 19:06:42', '2025-11-20 19:06:42'),
(12, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '4be7694c7a6b8c5e3a88023b5a94c7f5e33fa987adbcbc29ec33690f5e7edaee', '[\"*\"]', '2025-11-20 19:11:34', NULL, '2025-11-20 19:11:33', '2025-11-20 19:11:34'),
(13, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', 'd99abde5ed37058fa5380203d8530c287a1945ed02dbae34f38720a5fc8076c7', '[\"*\"]', '2025-11-20 19:18:01', NULL, '2025-11-20 19:18:01', '2025-11-20 19:18:01'),
(14, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '7fcb4feedddfe8f9a3867763b2f6870c8a7e5f22074eb93f4a6d77894fb7041c', '[\"*\"]', '2025-11-20 19:29:33', NULL, '2025-11-20 19:29:33', '2025-11-20 19:29:33'),
(15, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', 'df6d73b34cd4901834ea314985c73fceb6fb0068ebde29c9bf684cf05e62b756', '[\"*\"]', '2025-11-20 19:36:18', NULL, '2025-11-20 19:36:18', '2025-11-20 19:36:18'),
(16, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '1f62ed9703872dcf9f6d585f34d3f00b2dd7bfb3666aa903a82225fbf50af306', '[\"*\"]', '2025-11-20 19:36:57', NULL, '2025-11-20 19:36:57', '2025-11-20 19:36:57'),
(17, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', 'db522d2d9d0250dc0fa35b73b05249974c8b68849e224a9c3f75e581703daa54', '[\"*\"]', '2025-11-20 19:38:00', NULL, '2025-11-20 19:38:00', '2025-11-20 19:38:00'),
(18, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', 'fd6461e7bdb0077803b8bf99fff100686511d392518fd152ca401e873f7549d5', '[\"*\"]', '2025-11-20 19:38:32', NULL, '2025-11-20 19:38:32', '2025-11-20 19:38:32'),
(19, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '44b47dfcbf62a6876bd33f2ade9925591af2ef7713534814e1b8683b4fd6f65a', '[\"*\"]', '2025-11-20 19:42:50', NULL, '2025-11-20 19:42:50', '2025-11-20 19:42:50'),
(20, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '8536ff3f5db6c4b82984f63a71b8488bfa000d64c5ea92992616e6f278a866e8', '[\"*\"]', '2025-11-20 19:45:06', NULL, '2025-11-20 19:45:06', '2025-11-20 19:45:06'),
(21, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '042661a35cc155bee5ae37359a9087412aa5e518523cdbf134dfaf9ba4224f57', '[\"*\"]', '2025-11-21 20:25:44', NULL, '2025-11-21 20:25:44', '2025-11-21 20:25:44'),
(22, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '763e721bd4ec2deec9664db73613cfceae51d0a6e88a86db6d497193825e185a', '[\"*\"]', '2025-11-22 01:52:51', NULL, '2025-11-22 01:52:50', '2025-11-22 01:52:51'),
(23, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '21210c7879037f938ecc256412246e5808010c24c50d8e0be2f19b6c8729ee0d', '[\"*\"]', '2025-11-22 02:30:21', NULL, '2025-11-22 02:30:21', '2025-11-22 02:30:21'),
(24, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '5d0e3dcaa136a2e9bd7eab17cfe0cc5f5cd821c649ba8e58e2656868f6c986b9', '[\"*\"]', '2025-11-22 02:34:12', NULL, '2025-11-22 02:34:12', '2025-11-22 02:34:12'),
(25, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '71b5a8c9c07497c7509f7370ee5b91a71d13d9d83f12d5d5a9b5d44c809bccbb', '[\"*\"]', '2025-11-25 00:39:42', NULL, '2025-11-25 00:39:42', '2025-11-25 00:39:42'),
(26, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '3ea4ea4e0bb6e73452bfef15569897bae5c98af5407178470440fad396b147b5', '[\"*\"]', '2025-11-25 19:29:10', NULL, '2025-11-25 19:29:09', '2025-11-25 19:29:10'),
(27, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '8aec9cd7516291f098b7b1a65ed8f89659639425fcfd3db8fabeadb01180c413', '[\"*\"]', '2025-11-25 19:44:11', NULL, '2025-11-25 19:44:11', '2025-11-25 19:44:11'),
(28, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', 'da2b54dbe6f5be3deb81224255f03a68748889faa187b1bd370690561e16a069', '[\"*\"]', '2025-12-08 17:33:52', NULL, '2025-12-08 17:33:51', '2025-12-08 17:33:52'),
(29, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '2817e52010927c008cb7c4762b16bc5a134822e334ea723f1b84c98197e36b3f', '[\"*\"]', '2025-12-09 23:39:35', NULL, '2025-12-09 23:39:34', '2025-12-09 23:39:35'),
(30, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', 'cd02e74982e2648fb5eac0d3bb50f9d6f65a239fa4cb4079a3b2b4d13367b093', '[\"*\"]', '2025-12-19 21:35:43', NULL, '2025-12-19 21:35:42', '2025-12-19 21:35:43'),
(31, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '2c3bf38622d420798d45ddec844d98a706295b30c9f15cf7691b5d11cc9a75b9', '[\"*\"]', '2025-12-22 18:06:22', NULL, '2025-12-22 18:06:21', '2025-12-22 18:06:22'),
(32, 'App\\Models\\User', 2, 'TMEA_Success_LinkAura', '6fcff084058b2338726b83373df54b6f8e79eb13e4ad902825a38179324a3fd5', '[\"*\"]', NULL, NULL, '2026-01-04 05:42:21', '2026-01-04 05:42:21'),
(33, 'App\\Models\\User', 2, 'TMEA_Success_LinkAura', 'd5df0be93ded17acdec108ecf6dc024a1a8030df42a922482743c43f9ebb85fd', '[\"*\"]', '2026-01-04 05:49:01', NULL, '2026-01-04 05:49:00', '2026-01-04 05:49:01'),
(34, 'App\\Models\\User', 2, 'TMEA_Success_LinkAura', 'da6be58784988a0832337640071f7bd39b42828b7d928efb46f07c77208c1905', '[\"*\"]', '2026-01-04 06:00:55', NULL, '2026-01-04 06:00:55', '2026-01-04 06:00:55'),
(35, 'App\\Models\\User', 2, 'TMEA_Success_LinkAura', 'c2a0a23c6e669ee8b19a98124e5d12a6f546e05ae2eef1dd67ae92f11b295c35', '[\"*\"]', '2026-01-04 06:07:34', NULL, '2026-01-04 06:07:33', '2026-01-04 06:07:34'),
(36, 'App\\Models\\User', 2, 'TMEA_Success_LinkAura', '03cc6a6282c83030936cdfa382cdf60ac87c4e66f0c2b27fbc4624cbf726ec4b', '[\"*\"]', '2026-01-04 07:07:15', NULL, '2026-01-04 07:07:14', '2026-01-04 07:07:15'),
(37, 'App\\Models\\User', 1, 'TMEA_Success_LinkAura', '40210d9f2b7161ccbd61a473caf1258d1a3e9b5850c45190a80ad14e1b47edda', '[\"*\"]', '2026-01-21 23:26:59', NULL, '2026-01-21 23:26:58', '2026-01-21 23:26:59'),
(38, 'App\\Models\\User', 3, 'TMEA_Success_LinkAura', 'f2a6bacc15ad9a8387ccfa1a1a46ab36e22119c57f2d659c59e807a0922034b3', '[\"*\"]', NULL, NULL, '2026-01-26 23:27:03', '2026-01-26 23:27:03'),
(39, 'App\\Models\\User', 3, 'TMEA_Success_LinkAura', '164be66175536ec5bb3bd764f1f3aba47e6dd846d6cbe47325416003070383c9', '[\"*\"]', '2026-01-26 23:27:24', NULL, '2026-01-26 23:27:23', '2026-01-26 23:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('d0IVmaF4zvOf3w9HtXiDqkTghYMOLYiFH9vNlnGu', NULL, '192.168.29.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaGZQTTltV1BpdDJCSDNOVEtGcWJoakFLa0hXSU5FR2N3c2w0SXFvSiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTEwOiJodHRwOi8vMTkyLjE2OC4yOS4yNDo4MDgwL1NlbmRyYSUyMEluZm90ZWNoL1dlYnNpdGVfVGVtcF9OUT09P2lscDg4TEFzQnZtPVkyUmZhV1E5T0NaMFpXMXdiR0YwWlY5cFpEMHlNUSUzRCUzRCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769498780);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` bigint NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_str` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cip` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mip` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `company_name`, `mobile_number`, `email`, `email_verified_at`, `password`, `password_str`, `remember_token`, `created_at`, `updated_at`, `cip`, `mip`) VALUES
(1, 'Bala', 'tmea', 7548555555, 'slbm.bala3@gmail.com', NULL, '$2y$12$z4gMlsdfqEmnaOXCpFexte/6Uw2LKBomtw8Z1tAih/IzIjaUAQ8tO', 'Success_300#', NULL, '2025-11-19 19:34:37', '2025-11-19 19:34:37', NULL, NULL),
(2, 'Balamurugan S', 'TMinSBP Software Innovation Lab', 7548853487, 'slbm.balakarthi@gmail.com', NULL, '$2y$12$xtxhLDj7v6vant7w5zVHN.N7zvpqKGB5NrzhuPlCpdGLxg6V9Ln8G', 'Success_400#', NULL, '2026-01-04 05:42:21', '2026-01-04 05:42:21', NULL, NULL),
(3, 'Balamurugan S', 'TMinSBP Software Innovation Lab', 7548853486, 'slbm.balakarthi88@gmail.com', NULL, '$2y$12$pBvq9x4P7z/8/y86.f5vcupaX./sBMlaPM9GMtLwLIHI1jvsRXQ8G', 'Success_100#', NULL, '2026-01-26 23:27:03', '2026-01-26 23:27:03', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miniweb_aboutus`
--
ALTER TABLE `miniweb_aboutus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mini_website_id` (`mini_website_id`);

--
-- Indexes for table `miniweb_company_details`
--
ALTER TABLE `miniweb_company_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `website_id` (`website_id`);

--
-- Indexes for table `miniweb_contact`
--
ALTER TABLE `miniweb_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mini_website_id` (`mini_website_id`);

--
-- Indexes for table `miniweb_enquiries`
--
ALTER TABLE `miniweb_enquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `miniWebId` (`miniWebId`);

--
-- Indexes for table `miniweb_feedback`
--
ALTER TABLE `miniweb_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `miniWebId` (`miniWebId`);

--
-- Indexes for table `miniweb_gallery`
--
ALTER TABLE `miniweb_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mini_website_id` (`mini_website_id`);

--
-- Indexes for table `miniweb_payments_details`
--
ALTER TABLE `miniweb_payments_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mini_website_id` (`mini_website_id`);

--
-- Indexes for table `miniweb_products`
--
ALTER TABLE `miniweb_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mini_website_id` (`mini_website_id`);

--
-- Indexes for table `miniweb_qrcode`
--
ALTER TABLE `miniweb_qrcode`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mini_website_id` (`mini_website_id`);

--
-- Indexes for table `miniweb_services`
--
ALTER TABLE `miniweb_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mini_website_id` (`mini_website_id`);

--
-- Indexes for table `miniweb_social_links`
--
ALTER TABLE `miniweb_social_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mini_website_id` (`mini_website_id`);

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
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `miniweb_aboutus`
--
ALTER TABLE `miniweb_aboutus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `miniweb_company_details`
--
ALTER TABLE `miniweb_company_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `miniweb_contact`
--
ALTER TABLE `miniweb_contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `miniweb_enquiries`
--
ALTER TABLE `miniweb_enquiries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `miniweb_feedback`
--
ALTER TABLE `miniweb_feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `miniweb_gallery`
--
ALTER TABLE `miniweb_gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `miniweb_payments_details`
--
ALTER TABLE `miniweb_payments_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `miniweb_products`
--
ALTER TABLE `miniweb_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `miniweb_qrcode`
--
ALTER TABLE `miniweb_qrcode`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `miniweb_services`
--
ALTER TABLE `miniweb_services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `miniweb_social_links`
--
ALTER TABLE `miniweb_social_links`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
