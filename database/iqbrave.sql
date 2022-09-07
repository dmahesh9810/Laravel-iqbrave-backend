-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2022 at 05:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iqbrave`
--

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tc` double NOT NULL DEFAULT 10000,
  `gc` double NOT NULL DEFAULT 0,
  `gsg` double NOT NULL DEFAULT 0,
  `usd` double NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balances`
--

INSERT INTO `balances` (`id`, `tc`, `gc`, `gsg`, `usd`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 9986, 0, 0, 0, 4, '2022-08-24 17:25:57', '2022-08-26 04:21:18'),
(2, 9980, 0, 0, 0, 5, '2022-08-24 17:39:22', '2022-08-24 17:40:17'),
(3, 9954, 0, 0, 0, 6, '2022-08-24 17:42:21', '2022-08-24 17:50:35'),
(4, 10000, 1015, 0, 0, 7, '2022-08-24 18:30:01', '2022-08-24 18:59:37'),
(5, 10000, 1020, 0, 0, 8, '2022-08-24 18:34:55', '2022-08-26 04:32:56'),
(6, 9999, 1000, 0, 0, 9, '2022-08-25 15:44:56', '2022-08-25 16:24:04');

-- --------------------------------------------------------

--
-- Table structure for table `coins`
--

CREATE TABLE `coins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double(8,2) DEFAULT NULL,
  `rate` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coins`
--

INSERT INTO `coins` (`id`, `name`, `currency`, `value`, `rate`, `created_at`, `updated_at`) VALUES
(1, 'gc', 'USD', NULL, NULL, NULL, NULL),
(2, 'gem', 'USD', NULL, NULL, NULL, NULL),
(3, 'gsg', 'USD', 700.00, 80.00, NULL, '2022-08-26 04:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `coin_sells`
--

CREATE TABLE `coin_sells` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED DEFAULT NULL,
  `buyer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'usd',
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feed_backs`
--

CREATE TABLE `feed_backs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `match_numbers`
--

CREATE TABLE `match_numbers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `stake` int(11) NOT NULL,
  `coin_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `system_random` int(11) NOT NULL,
  `player_random` int(11) DEFAULT NULL,
  `bot_random` int(11) DEFAULT NULL,
  `player_click` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `match_numbers`
--

INSERT INTO `match_numbers` (`id`, `user_id`, `stake`, `coin_type`, `system_random`, `player_random`, `bot_random`, `player_click`, `created_at`, `updated_at`) VALUES
(1, 4, 10, 'tc', 2, 2, 5, 2, '2022-08-24 17:33:52', '2022-08-24 17:34:59'),
(2, 5, 10, 'tc', 4, 7, 4, 3, '2022-08-24 17:39:52', '2022-08-24 17:39:59'),
(3, 5, 10, 'tc', 10, 1, 6, 0, '2022-08-24 17:40:17', '2022-08-24 17:41:26'),
(4, 6, 10, 'tc', 2, 1, 8, 0, '2022-08-24 17:43:14', '2022-08-24 17:46:50'),
(5, 9, 10, 'tc', 5, 5, 1, 2, '2022-08-25 16:22:51', '2022-08-25 16:23:22'),
(6, 4, 10, 'tc', 7, 4, 7, 3, '2022-08-26 04:18:33', '2022-08-26 04:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2021_09_20_142813_create_permission_tables', 1),
(6, '2021_10_11_192321_create_sellers_table', 1),
(7, '2021_10_12_164603_create_coins_table', 1),
(8, '2021_10_12_165030_create_packages_table', 1),
(9, '2021_10_13_103604_create_balances_table', 1),
(10, '2021_11_16_083018_create_match_numbers_table', 1),
(11, '2021_11_18_090912_create_snake_ladders_table', 1),
(12, '2021_11_18_090924_create_snake_ladder_rooms_table', 1),
(13, '2021_11_27_170213_create_coin_sells_table', 1),
(14, '2021_11_29_104544_create_questions_table', 1),
(15, '2021_12_04_162603_create_quiz_results_table', 1),
(16, '2021_12_05_185604_create_rise_falls_table', 1),
(17, '2021_12_16_183154_create_feed_backs_table', 1),
(18, '2023_09_13_103305_create_payments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `value` int(11) NOT NULL DEFAULT 0,
  `coin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `price`, `value`, `coin_id`, `created_at`, `updated_at`) VALUES
(1, 'silver', 10, 100, 1, '2022-08-24 17:22:29', '2022-08-24 17:22:29'),
(2, 'platinum', 100, 1000, 1, '2022-08-24 17:22:29', '2022-08-24 17:22:29'),
(3, 'diamond', 1000, 100000, 1, '2022-08-24 17:22:29', '2022-08-24 17:22:29'),
(4, 'master', 10000, 1000000, 1, '2022-08-24 17:22:29', '2022-08-24 17:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('dmahesh9810@gmail.com', '$2y$10$f5SCCG.6aDlknAIdh0z0wuNb0MluMwn.xDMt0qTC9WDd18qrm8wvG', '2022-08-26 04:35:22');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `amount`, `currency`, `status`, `user_id`, `package_id`, `created_at`, `updated_at`) VALUES
(1, 100.00, 'USD', 0, 9, 2, '2022-08-25 16:22:17', '2022-08-25 16:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 4, 'accessToken', '5295608139ef7ff2425a5f24923046d35106a8f9d946759ed2e0267d4060b02b', '[\"*\"]', '2022-08-24 17:30:57', '2022-08-24 17:26:05', '2022-08-24 17:30:57'),
(2, 'App\\Models\\User', 4, 'accessToken', '473e2674f2a7cd515c230cc22bd0287d5c7e52e10574af81de4441e05ecddac2', '[\"*\"]', '2022-08-24 17:32:25', '2022-08-24 17:31:13', '2022-08-24 17:32:25'),
(3, 'App\\Models\\User', 4, 'accessToken', '92427027453894e62171c4f95b5cc5509bb73ae8e0412147a609081ffebdfa1c', '[\"*\"]', '2022-08-24 17:38:50', '2022-08-24 17:33:23', '2022-08-24 17:38:50'),
(4, 'App\\Models\\User', 5, 'accessToken', '20ba1eee1ef78b94aadad60f51a966f3ba198c14a883761ca9b16eb20a18fda4', '[\"*\"]', '2022-08-24 17:41:26', '2022-08-24 17:39:32', '2022-08-24 17:41:26'),
(5, 'App\\Models\\User', 6, 'accessToken', '6462d1501739f5f7d223035fbef8335f60324f58fdaf20f9c62166187821708b', '[\"*\"]', '2022-08-24 17:58:07', '2022-08-24 17:42:28', '2022-08-24 17:58:07'),
(6, 'App\\Models\\User', 2, 'accessToken', '3dc3a4713f9d8a9c00e3afc0037a1a2592947a44f1274f0887310a667fe7625d', '[\"*\"]', '2022-08-24 18:58:47', '2022-08-24 17:59:51', '2022-08-24 18:58:47'),
(7, 'App\\Models\\User', 7, 'accessToken', 'a10a4ba061cbebd900c28bc04ef79b7152c5041bf34b2c4151cc425877df92be', '[\"*\"]', '2022-08-24 18:34:19', '2022-08-24 18:30:18', '2022-08-24 18:34:19'),
(8, 'App\\Models\\User', 8, 'accessToken', 'e07f859f934ef911bf0ea686dadca79a02243fd00eaaa8351f3528ea535bd680', '[\"*\"]', '2022-08-24 18:37:40', '2022-08-24 18:35:08', '2022-08-24 18:37:40'),
(9, 'App\\Models\\User', 7, 'accessToken', 'e1047924741b4b5e6494afbc321a5a08c7aeb9e2b42304dcdd881b0ceb02ea3f', '[\"*\"]', '2022-08-24 19:02:03', '2022-08-24 18:59:08', '2022-08-24 19:02:03'),
(10, 'App\\Models\\User', 9, 'accessToken', '3eae72c9a9f5dda5f277bcfd9ae5bcddacfc3eb3fd6bd975233bfff407cf5654', '[\"*\"]', '2022-08-25 16:24:20', '2022-08-25 15:45:23', '2022-08-25 16:24:20'),
(11, 'App\\Models\\User', 4, 'accessToken', '0ba0061b0cced35f7c184ddf341511d03e70ae4416fa47b6ae057d589b0d233b', '[\"*\"]', '2022-08-26 04:23:23', '2022-08-26 04:17:40', '2022-08-26 04:23:23'),
(12, 'App\\Models\\User', 100, 'accessToken', '927ed03ec41816835b3801ba9df64bedb669f2d6127c516e66d149bb65de5301', '[\"*\"]', '2022-08-26 04:29:06', '2022-08-26 04:29:05', '2022-08-26 04:29:06'),
(13, 'App\\Models\\User', 2, 'accessToken', '092c68fdb5ce5cee69f97a7ac0a8cee163046c86b9af8e441afbfa4c359af281', '[\"*\"]', '2022-08-26 04:30:02', '2022-08-26 04:29:46', '2022-08-26 04:30:02'),
(14, 'App\\Models\\User', 4, 'accessToken', '2003ca9ce06b95bcd2560f2c149890f14894090bffa04ff787bb0488a6f1e6ec', '[\"*\"]', '2022-08-26 04:31:20', '2022-08-26 04:30:40', '2022-08-26 04:31:20'),
(15, 'App\\Models\\User', 8, 'accessToken', '81c1a9258ee49f27200d29fd9283235b0d46aa8586d9ed74c0a751169473f38e', '[\"*\"]', '2022-08-26 04:34:18', '2022-08-26 04:32:05', '2022-08-26 04:34:18'),
(16, 'App\\Models\\User', 2, 'accessToken', '4fc740aa29d411592d843e1e2b22aeede75effb1f6527cfd6907e33fc4007ae4', '[\"*\"]', '2022-08-26 04:35:04', '2022-08-26 04:34:54', '2022-08-26 04:35:04'),
(17, 'App\\Models\\User', 2, 'accessToken', 'f898eda806290643101347bfd8229cf4c777df521f15bce95c57461900caa855', '[\"*\"]', '2022-08-29 14:17:00', '2022-08-29 14:16:23', '2022-08-29 14:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer4` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `approved` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `subject`, `quiz`, `answer1`, `answer2`, `answer3`, `answer4`, `correct`, `user_id`, `approved`, `created_at`, `updated_at`) VALUES
(1, 'ict', 'Which of the following searches websites by keyword(s)?', 'Web bugs', 'Search engine', 'Spyware', 'Portals', '2', 2, 1, '2022-08-24 18:07:17', '2022-08-24 18:32:44'),
(2, 'ict', 'A byte consists of how many bits?', '16', '4', '2', '8', '4', 2, 1, '2022-08-24 18:09:24', '2022-08-24 18:32:42'),
(3, 'ict', 'Which of the following cannot be done using e-mail?', 'Send an attachment', 'Forward an e-mail', 'Copy file from a remote computer', 'Reply to an e-mail', '3', 2, 1, '2022-08-24 18:10:18', '2022-08-24 18:32:41'),
(4, 'ict', 'Which one of the following is an extension of video file format in computers?', 'jpg', 'exe', 'mpg', 'bmp', '3', 2, 1, '2022-08-24 18:11:44', '2022-08-24 18:32:40'),
(5, 'ict', 'Which one of the following devices is required to connect a computer to the internet?', 'Pen Drive', 'Mouse', 'DVD', 'Modem', '4', 2, 1, '2022-08-24 18:12:33', '2022-08-24 18:32:38'),
(6, 'ict', 'Which one of the following devices is a must to run a computer?', 'Speaker', 'CD-ROM', 'USB Drive', 'Processor', '4', 2, 1, '2022-08-24 18:13:00', '2022-08-24 18:32:37'),
(7, 'ict', 'When you start your computer then which component works first?', 'BIOS', 'Processor', 'Hard disk', 'RAM', '2', 2, 1, '2022-08-24 18:13:34', '2022-08-24 18:32:36'),
(8, 'ict', 'When you start your computer then which component works first?', 'BIOS', 'Processor', 'Hard disk', 'RAM', '2', 2, 1, '2022-08-24 18:14:28', '2022-08-24 18:32:35'),
(9, 'ict', 'Which of the following is an example of system software?', 'Fire fox', 'Notepad', 'Windows98', 'Avira', '3', 2, 1, '2022-08-24 18:15:02', '2022-08-24 18:32:34'),
(10, 'ict', 'Which of the following is an input device?', 'CRT Monitor', 'speaker', 'Printer', 'keyboard', '4', 2, 1, '2022-08-24 18:15:43', '2022-08-24 18:32:32'),
(11, 'ict', 'Which of the following is not an example of secondary storage device?', 'Hard disks', 'RAM', 'Magnetic tapes', 'CD', '2', 2, 1, '2022-08-24 18:16:42', '2022-08-24 18:31:25'),
(12, 'ict', 'Which of the following is an Antivirus Software?', 'Photoshop', 'Norton', 'Yahoo', 'Flash', '2', 2, 1, '2022-08-24 18:17:32', '2022-08-24 18:31:23'),
(13, 'ict', 'Which one of the following is called the Brain of the computer?', 'Memory', 'CPU', 'Hard disk', 'RAM', '2', 2, 1, '2022-08-24 18:18:49', '2022-08-24 18:31:22'),
(14, 'ict', 'RAM is _', 'Non-volatile', 'Secondary storage', 'Permanent storage', 'Volatile', '4', 2, 1, '2022-08-24 18:19:46', '2022-08-24 18:31:21'),
(15, 'ict', 'Firmware is built using –', 'RAM', 'Video Memory', 'Cache Memory', 'ROM', '4', 2, 1, '2022-08-24 18:20:38', '2022-08-24 18:31:19'),
(16, 'ict', 'Which of the following is not an internet search engine?', 'Google', 'Yahoo', 'MSN', 'Windows', '4', 2, 1, '2022-08-24 18:21:51', '2022-08-24 18:31:18'),
(17, 'ict', 'Ram is placed on', 'Hard Disk', 'Extension board', 'Motherboard', 'USB', '3', 2, 1, '2022-08-24 18:23:30', '2022-08-24 18:31:16'),
(18, 'ict', 'Which one of the following is NOT a web browser?', 'Firefox', 'Facebook', 'Chrome', 'Safari', '2', 2, 1, '2022-08-24 18:24:28', '2022-08-24 18:31:14'),
(19, 'ict', 'Which of thebfollowing is not a/an web browser?', 'Internet Explorer', 'Mozilla Firefox', 'Google Chrome', 'Yahoo', '4', 2, 1, '2022-08-24 18:26:56', '2022-08-24 18:31:13'),
(20, 'ict', 'What is the name of a web page address?', 'Directory', 'Protocol', 'URL', 'Domain', '3', 2, 1, '2022-08-24 18:28:48', '2022-08-24 18:31:11'),
(21, 'maths', 'The average of first 50 natural numbers is …………. .', '25.30', '25.5', '25.00', '12.25', '2', 2, 1, '2022-08-24 18:39:32', '2022-08-24 18:58:15'),
(22, 'maths', 'A fraction which bears the same ratio to 1/27 as 3/11 bear to 5/9 is equal to ……….. .', '1/55', '55', '3/11', '1/11', '1', 2, 1, '2022-08-24 18:40:20', '2022-08-24 18:58:14'),
(23, 'maths', 'The number of 3-digit numbers divisible by 6, is ………….. .', '149', '166', '150', '151', '3', 2, 1, '2022-08-24 18:41:05', '2022-08-24 18:58:12'),
(24, 'maths', 'What is 1004 divided by 2', '52', '502', '520', '5002', '2', 2, 1, '2022-08-24 18:41:40', '2022-08-24 18:58:10'),
(25, 'maths', 'A clock strikes once at 1 o’clock, twice at 2 o’clock, thrice at 3 o’clock and so on. How many times will it strike in 24 hours?', '78', '136', '156', '196', '3', 2, 1, '2022-08-24 18:42:10', '2022-08-24 18:58:09'),
(26, 'maths', '106 × 106 – 94 × 94 =', '2004', '2400', '1904', '1906', '2', 2, 1, '2022-08-24 18:43:41', '2022-08-24 18:58:08'),
(27, 'maths', 'Which of the following numbers gives 240 when added to its own square?', '15', '16', '18', '20', '1', 2, 1, '2022-08-24 18:44:10', '2022-08-24 18:58:06'),
(28, 'maths', 'Evaluation of 83 × 82 × 8-5 is', '1', '9', '8', 'None of these.', '1', 2, 1, '2022-08-24 18:45:11', '2022-08-24 18:58:04'),
(29, 'maths', 'The simplest form of 1.5 : 2.5 is', '124', '120', '150', '100', '1', 2, 1, '2022-08-24 18:46:59', '2022-08-24 18:58:03'),
(30, 'maths', 'The smallest integer when added to 9547 × 9545 to make the sum a perfect square number, is', '8', '1', '2', '3', '2', 2, 1, '2022-08-24 18:49:01', '2022-08-24 18:58:02'),
(31, 'maths', 'Rohit multiplies a number by 2 instead of dividing the number by 2. Resultant number is what percentage of the correct value?', '200%', '300%', '50%', '400%', '4', 2, 1, '2022-08-24 18:49:28', '2022-08-24 18:58:01'),
(32, 'maths', 'The sum of two numbers is 5 times their difference. If the smaller number is 24, find the larger number.', '30', '32', '36', '48', '3', 2, 1, '2022-08-24 18:49:48', '2022-08-24 18:57:59'),
(33, 'maths', 'How much time (in seconds) does the earth take to rotate through an angle of 135 degrees about its axis?', '28800', '33600', '21600', '32400', '4', 2, 1, '2022-08-24 18:50:17', '2022-08-24 18:57:58'),
(34, 'science', 'Mendel conducted his famous breeding experiments by working on', 'Drosophila', 'Escherichiacoli', 'Pisum Sativum', 'All of these', '3', 2, 1, '2022-08-24 18:52:40', '2022-08-24 18:57:54'),
(35, 'science', 'Which section of DNA provides information for one protein', 'Nucleus', 'Chromosome', 'Trait', 'Gene', '2', 2, 1, '2022-08-24 18:53:11', '2022-08-24 18:57:52'),
(36, 'science', 'Which of the following is an example of genetic variation', 'One person has a scar but his friend doesn’t', 'One person is older than the other', 'Reeta eats meat but her sister Geeta is a vegetarian', 'Two children have different eye color', '4', 2, 1, '2022-08-24 18:53:35', '2022-08-24 18:57:51'),
(37, 'science', 'In peas, a pure tall (TT) is crossed with a pure short plant(tt). The ratio of pure tall plants to pure short plants in F2 generation is', '1:3', '3:1', '1:1', '2:1', '3', 2, 1, '2022-08-24 18:53:58', '2022-08-24 18:57:50'),
(38, 'science', 'Humans have two different sex chromosomes, X and Y. Based on Mendel’s laws, a male offspring will inherit which combination of chromosomes?', 'both the X chromosomes from one of its parents', 'both the Y chromosomes from one of its parents', 'combination of X chromosomes from either of its parents', 'combination of X and Y chromosome from either of its parents', '4', 2, 1, '2022-08-24 18:54:27', '2022-08-24 18:57:49'),
(39, 'science', 'A zygote which has an X-chromosome inherited from the father will develop into a:', 'boy', 'girl', 'X-Chromosome does not determine the sex of achild', 'either boy or girl', '2', 2, 1, '2022-08-24 18:55:11', '2022-08-24 18:57:47'),
(40, 'science', 'The surprise products formed in experiment conducted by Miller and Urey were', 'Peptides', 'Amino acids', 'Nucleotides', 'Nucleic acids', '2', 2, 1, '2022-08-24 18:55:35', '2022-08-24 18:57:46'),
(41, 'science', 'From the list given below select the character which can be acquired but not inherited:', 'colour of eyes', 'colour of skin', 'texture of hair', 'size of body', '4', 2, 1, '2022-08-24 18:56:00', '2022-08-24 18:57:45'),
(42, 'science', 'Darwin’s theory does not include', 'Natural Selection', 'Survival of the fittest', 'Evolution Through Inheritance', 'Struggle for existence of life', '3', 2, 1, '2022-08-24 18:56:24', '2022-08-24 18:57:44'),
(43, 'science', 'Exchange of genetic material takes place in', 'Vegetativereproduction', 'Asexualreproduction', 'Sexual reproduction', 'Budding', '3', 2, 1, '2022-08-24 18:56:48', '2022-08-24 18:57:43'),
(44, 'ict', 'What is ram', 'tawakalika', 'sdf', 'sdf', 'sdf', '1', 8, 1, '2022-08-26 04:34:16', '2022-08-26 04:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `stake` smallint(6) DEFAULT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day_counter` smallint(6) NOT NULL,
  `answer` smallint(6) NOT NULL,
  `result` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_results`
--

INSERT INTO `quiz_results` (`id`, `user_id`, `stake`, `question_id`, `subject`, `day_counter`, `answer`, `result`, `created_at`, `updated_at`) VALUES
(1, 7, 10, 1, 'ict', 1, 0, 2, '2022-08-24 18:33:01', '2022-08-24 18:33:14'),
(2, 7, 10, 2, 'ict', 2, 4, 1, '2022-08-24 18:33:20', '2022-08-24 18:33:26'),
(3, 7, 10, 3, 'ict', 3, 3, 1, '2022-08-24 18:34:11', '2022-08-24 18:34:19'),
(4, 8, 10, 1, 'ict', 1, 2, 1, '2022-08-24 18:35:38', '2022-08-24 18:35:43'),
(5, 8, 10, 2, 'ict', 2, 4, 1, '2022-08-24 18:35:44', '2022-08-24 18:35:48'),
(6, 8, 10, 3, 'ict', 3, 3, 1, '2022-08-24 18:35:50', '2022-08-24 18:35:53'),
(7, 8, 10, 4, 'ict', 4, 3, 1, '2022-08-24 18:35:55', '2022-08-24 18:36:02'),
(8, 8, 10, 5, 'ict', 5, 4, 1, '2022-08-24 18:36:03', '2022-08-24 18:36:09'),
(9, 8, 10, 6, 'ict', 6, 4, 1, '2022-08-24 18:36:12', '2022-08-24 18:36:19'),
(10, 8, 10, 7, 'ict', 7, 2, 1, '2022-08-24 18:36:21', '2022-08-24 18:36:26'),
(11, 8, 10, 8, 'ict', 8, 2, 1, '2022-08-24 18:36:33', '2022-08-24 18:36:37'),
(12, 8, 10, 9, 'ict', 9, 3, 1, '2022-08-24 18:36:39', '2022-08-24 18:36:45'),
(13, 8, 10, 10, 'ict', 10, 3, 2, '2022-08-24 18:36:46', '2022-08-24 18:36:48'),
(14, 7, 5, 4, 'ict', 4, 3, 1, '2022-08-24 18:59:18', '2022-08-24 18:59:24'),
(15, 7, 10, 34, 'science', 1, 3, 1, '2022-08-24 18:59:30', '2022-08-24 18:59:37'),
(16, 8, 10, 11, 'ict', 1, 2, 1, '2022-08-26 04:32:14', '2022-08-26 04:32:25'),
(17, 8, 10, 12, 'ict', 2, 3, 2, '2022-08-26 04:32:42', '2022-08-26 04:32:51'),
(18, 8, 10, 13, 'ict', 3, 0, 2, '2022-08-26 04:32:56', '2022-08-26 04:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `rise_falls`
--

CREATE TABLE `rise_falls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `stake` smallint(6) NOT NULL,
  `firstDigit` smallint(6) NOT NULL,
  `second_digit` smallint(6) NOT NULL,
  `third_digit` smallint(6) NOT NULL,
  `four_digit` smallint(6) NOT NULL,
  `five_digit` smallint(6) NOT NULL,
  `six_digit` smallint(6) NOT NULL,
  `seven_digit` smallint(6) NOT NULL,
  `eight_digit` smallint(6) NOT NULL,
  `nine_digit` smallint(6) NOT NULL,
  `ten_digit` smallint(6) NOT NULL,
  `user_digit` smallint(6) NOT NULL,
  `result` smallint(6) NOT NULL,
  `action` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rise_falls`
--

INSERT INTO `rise_falls` (`id`, `user_id`, `stake`, `firstDigit`, `second_digit`, `third_digit`, `four_digit`, `five_digit`, `six_digit`, `seven_digit`, `eight_digit`, `nine_digit`, `ten_digit`, `user_digit`, `result`, `action`, `created_at`, `updated_at`) VALUES
(1, 6, 10, 2, 5, 6, 2, 4, 2, 5, 3, 6, 5, 5, 0, 1, '2022-08-24 17:44:17', '2022-08-24 17:44:17'),
(2, 6, 10, 6, 9, 4, 10, 6, 3, 4, 7, 7, 8, 5, 0, 1, '2022-08-24 17:44:41', '2022-08-24 17:44:41'),
(3, 6, 10, 6, 6, 2, 3, 5, 1, 6, 5, 9, 1, 5, 0, 1, '2022-08-24 17:44:55', '2022-08-24 17:44:55'),
(4, 6, 10, 10, 6, 4, 1, 7, 1, 9, 10, 9, 10, 5, 1, 1, '2022-08-24 17:45:11', '2022-08-24 17:45:11'),
(5, 6, 10, 4, 2, 10, 10, 4, 4, 5, 6, 2, 1, 5, 0, 1, '2022-08-24 17:46:06', '2022-08-24 17:46:06'),
(6, 9, 10, 2, 7, 2, 3, 1, 9, 1, 5, 10, 6, 5, 0, 1, '2022-08-25 16:23:46', '2022-08-25 16:23:46'),
(7, 4, 10, 3, 7, 3, 5, 3, 5, 7, 2, 2, 4, 5, 0, 1, '2022-08-26 04:20:15', '2022-08-26 04:20:15'),
(8, 4, 10, 5, 2, 5, 3, 4, 9, 3, 7, 6, 10, 5, 1, 1, '2022-08-26 04:20:55', '2022-08-26 04:20:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'ROLE_ADMIN', 'web', '2022-08-24 17:22:29', '2022-08-24 17:22:29'),
(2, 'ROLE_MODERATOR', 'web', '2022-08-24 17:22:29', '2022-08-24 17:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `snake_ladders`
--

CREATE TABLE `snake_ladders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `game_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stake` smallint(6) NOT NULL,
  `player` smallint(6) NOT NULL,
  `bot` smallint(6) NOT NULL,
  `player_random` smallint(6) NOT NULL,
  `bot_random` smallint(6) NOT NULL,
  `active` smallint(6) NOT NULL,
  `result` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `snake_ladders`
--

INSERT INTO `snake_ladders` (`id`, `user_id`, `game_type`, `stake`, `player`, `bot`, `player_random`, `bot_random`, `active`, `result`, `created_at`, `updated_at`) VALUES
(1, 6, 'tc', 1, 100, 49, 5, 2, 0, 1, '2022-08-24 17:47:07', '2022-08-24 17:50:08'),
(2, 6, 'tc', 1, 0, 0, 0, 0, 1, 3, '2022-08-24 17:50:22', '2022-08-24 17:50:35'),
(3, 6, 'tc', 1, 0, 0, 0, 0, 1, 0, '2022-08-24 17:50:35', '2022-08-24 17:50:35'),
(4, 9, 'tc', 1, 0, 0, 0, 0, 1, 0, '2022-08-25 16:24:04', '2022-08-25 16:24:04'),
(5, 4, 'tc', 10, 16, 66, 5, 6, 1, 0, '2022-08-26 04:21:18', '2022-08-26 04:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `snake_ladder_rooms`
--

CREATE TABLE `snake_ladder_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `player_1` int(11) DEFAULT NULL,
  `player_2` int(11) DEFAULT NULL,
  `stake` int(11) NOT NULL,
  `player1_random` int(11) NOT NULL DEFAULT 0,
  `player2_random` int(11) NOT NULL DEFAULT 0,
  `player_click` int(11) NOT NULL DEFAULT 0,
  `autoplayer1` int(11) NOT NULL DEFAULT 0,
  `autoplayer2` int(11) NOT NULL DEFAULT 0,
  `counterplayer1` int(11) NOT NULL DEFAULT 0,
  `counterplayer2` int(11) NOT NULL DEFAULT 0,
  `player1_random_genarat` int(11) NOT NULL DEFAULT 0,
  `player2_random_genarat` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 0,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `country`, `city`, `mobile`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Carmine Senger II', 'Magdalen Welch', 'xwuckert@example.net', 'Greece', 'Pricestad', 78065594, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-08-24 17:22:29', 'tXY7dGbUXt', '2022-08-24 17:22:29', '2022-08-24 17:22:29'),
(2, 'mahesh', 'dissanayaka', 'dmahesh9810@gmail.com', 'srilanka', 'buttala', 773355669, '$2y$10$B8FBxwaM7.L6J8ZALGfVCuXOLJPW6FzsvxP4TgvsvY5OvMIll4J3S', '2022-08-24 17:22:29', 'j54psBrDYBfbLHvGIDmnvp4IhRlCPg9Ox5z4yirmPP87E1hpj7SpCIyuUaIM', '2022-08-24 17:22:29', '2022-08-24 17:59:31'),
(3, 'sachi', 'herath', 'sachiherath507@gmail.com', 'india', 'bandarawela', 773355667, '$2y$10$HHd4BAKY8AuZXmvlvlb3GOJ1h3f/CRip78GLY1WQcZMNEbBamUOiK', '2022-08-24 17:22:29', NULL, '2022-08-24 17:22:29', '2022-08-24 17:22:29'),
(4, 'mahesh', 'dissanayaka', 'user1@gmail.com', 'srilanka', 'buttala', 773132974, '$2y$10$TMrpT/aNcfhQzBCr.ikhj.PEOeaVtdK4XrZ1EUmpkUrSg9cxVmtp.', NULL, NULL, '2022-08-24 17:25:57', '2022-08-24 17:25:57'),
(5, 'mahesh', 'dissanayaka', 'user2@gmail.com', 'srilanka', 'buttala', 773132975, '$2y$10$ac8vK9hMOcCJOdMHTBGde.qi/nLd3zGeHPjFrsjACRNPPJfcC2AmG', NULL, NULL, '2022-08-24 17:39:22', '2022-08-24 17:39:22'),
(6, 'mahesh', 'dissanayaka', 'user3@gmail.com', 'srilanka', 'buttala', 773132976, '$2y$10$5V7azhCLolriA9Uz045oN.cjPv4yDne4T.8EnR5OJ52uvip9qu9TK', NULL, NULL, '2022-08-24 17:42:21', '2022-08-24 17:42:21'),
(7, 'mahesh', 'dissanayaka', 'user5@gmail.com', 'srilanka', 'buttala', 773132973, '$2y$10$iwR2oGetH1hDQ5SXlcvbSuDWr5/wOxptYho/oJ4WGFy8EaYrpeBBa', NULL, NULL, '2022-08-24 18:30:01', '2022-08-24 18:30:01'),
(8, 'mahesh', 'dissanayaka', 'user6@gmail.com', 'srilanka', 'buttala', 773132979, '$2y$10$kKgWI7JhNmP01owoPd4JYOYWaEDYnd0IEHyK22kVY0KS2D0TyQV/q', NULL, NULL, '2022-08-24 18:34:55', '2022-08-24 18:34:55'),
(9, 'mahesh', 'dissanayaka', 'mahesh456@gmail.com', 'srilanka', 'buttala', 773132944, '$2y$10$osItefuOh3VgC4vo1Wrrb.LArtK6d/P8BmD4oQJ6nc6W61fKai5ce', NULL, NULL, '2022-08-25 15:44:56', '2022-08-25 15:44:56'),
(100, 'Mahesh', 'Dissanayaka', 'mahesh44@gmail.com', 'srilanka', 'buttala', 7731333333, '$2y$10$osItefuOh3VgC4vo1Wrrb.LArtK6d/P8BmD4oQJ6nc6W61fKai5ce', '0000-00-00 00:00:00', '[value-10]', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coins`
--
ALTER TABLE `coins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coin_sells`
--
ALTER TABLE `coin_sells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feed_backs`
--
ALTER TABLE `feed_backs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `match_numbers`
--
ALTER TABLE `match_numbers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rise_falls`
--
ALTER TABLE `rise_falls`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sellers_account_id_unique` (`account_id`);

--
-- Indexes for table `snake_ladders`
--
ALTER TABLE `snake_ladders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `snake_ladder_rooms`
--
ALTER TABLE `snake_ladder_rooms`
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
-- AUTO_INCREMENT for table `balances`
--
ALTER TABLE `balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coins`
--
ALTER TABLE `coins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coin_sells`
--
ALTER TABLE `coin_sells`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feed_backs`
--
ALTER TABLE `feed_backs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `match_numbers`
--
ALTER TABLE `match_numbers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rise_falls`
--
ALTER TABLE `rise_falls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `snake_ladders`
--
ALTER TABLE `snake_ladders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `snake_ladder_rooms`
--
ALTER TABLE `snake_ladder_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
