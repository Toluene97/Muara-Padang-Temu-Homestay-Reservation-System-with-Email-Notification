-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2019 at 06:19 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mptemu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `staffId` bigint(20) UNSIGNED NOT NULL,
  `staffName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `SupervisorId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`staffId`, `staffName`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `SupervisorId`) VALUES
(1, 'nabil', 'nabil@gmail.com', '$2y$10$OkAG4OzrtvEggUBAEG0ecev8RWIPlFL11Hi0oT9nr8ikNpygNo6oG', NULL, '2019-10-07 21:13:22', '2019-10-07 21:13:22', '3'),
(2, 'ha', 'ha@gmail.com', '$2y$10$FmESFuCa4ABFJdqiHptJwO6zo1pgRJ90O3p2v3tgOLuAdjekURC2m', NULL, '2019-11-12 07:32:10', '2019-11-12 07:32:10', '3'),
(3, 'FitriAdmin', 'FitriAdmin@gmail.com', '$2y$10$SyBHr/wK93EU0iG7.ccTx.lbYma4KDkNn00Bf25A3SVmpyst9Uani', NULL, '2019-11-20 05:25:24', '2019-11-20 05:25:24', '3');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_weekday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `capacity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `name`, `price_weekday`, `detail`, `created_at`, `updated_at`, `capacity`) VALUES
(1, 'Marriott', 'RM 250.00', '3 Bedroom ( 3 queen bed )', NULL, NULL, 'max 8'),
(2, 'Sutra', 'RM 200.00', '2 Bedroom ( 1 queen bed & 2 single bed)', NULL, NULL, 'max 6'),
(3, 'Maya', 'RM 250.00', '3 Bedroom ( 3 queen bed )', NULL, NULL, 'max 8');

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
(3, '2019_07_05_143743_create_posts_table', 1),
(4, '2019_09_14_034054_add_user_id_to_posts', 1),
(5, '2019_09_15_031900_add_cover_image_to_posts', 1),
(34, '2019_09_16_063522_create_admins_table', 2),
(35, '2019_10_03_085439_create_hotels_table', 3),
(36, '2019_10_12_034314_create_rooms_table', 4),
(46, '2019_10_03_085439_create_houses_table', 5),
(47, '2019_10_25_143700_create_reservations_table', 5),
(48, '2019_10_12_053929_create_reservations_table', 6),
(49, '2019_11_14_105638_add_recipt_image_to_reservations', 7),
(50, '2019_12_09_113642_add_capacity_to_houses', 8),
(51, '2019_12_09_115253_add__supervisor_id_to_admins', 9),
(52, '2019_12_17_122813_add_status_to_reservations', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`, `user_id`, `cover_image`) VALUES
(2, 'event 1 di Homestay', 'yeah !!!!', '2019-11-04 04:57:11', '2019-11-04 05:01:32', 5, 'test masuk post_1572872492.jpg'),
(3, 'n', 'jo', '2019-11-14 22:28:43', '2019-11-14 22:28:43', 5, 'noimage.jpg'),
(4, 'haha', 's', '2019-11-16 23:17:35', '2019-11-16 23:17:35', 4, 'beautiful_morning-wide_1573975055.jpg'),
(5, 'Rombongan pengantin lelaki', 'Rombongan pengantin lelaki dari Marang Terengganu utk majlis kenduri kahwin anak En Latif pd 26 Julai 2019. Homestay sangat memuaskan, tempat bersih. Owner sangat peramah. Homestay dekat je dengan bandar', '2019-11-18 20:29:11', '2019-11-18 20:29:11', 4, 'rombongan pengantin_1574137751.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `ReservationId` bigint(20) UNSIGNED NOT NULL,
  `check_in` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_out` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_of_guests` int(11) NOT NULL,
  `final_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HouseId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `recipt_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`ReservationId`, `check_in`, `check_out`, `num_of_guests`, `final_price`, `user_id`, `HouseId`, `created_at`, `updated_at`, `recipt_image`, `status`) VALUES
(10, '12/01/2019', '12/03/2019', 8, 'RM 200', '5', 2, '2019-11-14 22:37:34', '2019-11-14 22:37:34', 'noimage.jpg', ''),
(11, '12/02/2019', '12/16/2019', 6, 'RM ?? 000', '5', 2, '2019-11-14 22:46:12', '2019-11-14 22:46:12', 'noimage.jpg', ''),
(12, '11/18/2019', '11/20/2019', 7, 'RM ?? 3000', '1', 3, '2019-11-16 09:51:20', '2019-11-18 22:46:52', 'noimage.jpg', ''),
(13, '11/23/2019', '11/24/2019', 1001, 'RM ?? 000', '4', 1, '2019-11-16 10:01:52', '2019-12-09 06:42:50', 'artistic_headshot.jpg', ''),
(21, '12/05/2019', '12/07/2019', 6, 'RM 200', '8', 2, '2019-11-24 10:29:42', '2019-12-17 04:38:54', 'bank dummy_LI_1576586334.jpg', 'Approved'),
(22, '12/11/2019', '12/12/2019', 6, 'RM 200', '8', 3, '2019-11-24 10:33:21', '2019-11-24 10:33:21', 'noimage.jpg', 'Pending'),
(30, '12/17/2019', '12/21/2019', 2, 'RM ??', '9', 3, '2019-11-28 21:03:01', '2019-11-28 21:03:01', 'noimage.jpg', ''),
(31, '01/01/2020', '02/04/2020', 8, 'RM ??', '9', 1, '2019-11-28 22:40:33', '2019-11-28 22:40:33', 'noimage.jpg', ''),
(32, '01/06/2020', '01/08/2020', 100, 'RM ??', '9', 2, '2019-11-28 22:42:24', '2019-12-01 22:22:27', 'intro_1575267747.jpg', ''),
(33, '12/10/2019', '12/14/2019', 1, 'RM ??', '9', 3, '2019-11-28 22:51:51', '2019-11-28 22:51:51', 'intro_1575010311.jpg', ''),
(37, '12/12/2019', '12/14/2019', 9, 'RM 600', '4', 3, '2019-12-01 19:03:17', '2019-12-02 07:20:45', 'maxresdefault_1575300045.jpg', 'Approved'),
(39, '12/12/2019', '12/14/2019', 2, 'RM 600', '4', 3, '2019-12-09 09:02:25', '2019-12-09 09:02:25', 'noimage.jpg', ''),
(40, '12/13/2019', '12/14/2019', 2, 'RM 400', '4', 2, '2019-12-09 09:03:02', '2019-12-09 09:03:02', 'noimage.jpg', ''),
(42, '12/25/2019', '12/26/2019', 3, 'RM 400', '9', 2, '2019-12-09 09:11:40', '2019-12-09 09:11:40', 'noimage.jpg', ''),
(43, '12/21/2019', '12/23/2019', 6, 'RM 600', '9', 2, '2019-12-17 10:05:28', '2019-12-17 10:05:28', 'noimage.jpg', 'Pending'),
(44, '12/21/2019', '12/23/2019', 6, 'RM 600', '9', 2, '2019-12-17 10:06:02', '2019-12-17 10:06:02', 'noimage.jpg', 'Pending'),
(45, '12/21/2019', '12/23/2019', 6, 'RM 600', '9', 2, '2019-12-17 10:07:54', '2019-12-17 10:07:54', 'noimage.jpg', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phoneNo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fitri 2', 'fitri2@gmail.com', '019-886672', NULL, '$2y$10$YIYUuYYx6z17QCyMpkU3hurRX/7SoM4lyD2i8vzGpvs4NfDfHFOQe', NULL, '2019-09-15 22:28:09', '2019-09-15 22:28:09'),
(2, 'Fitri Pro', 'fitripro@gmail.com', '019-99897821', NULL, '$2y$10$tgpjHMF7BxktWJnrppId3u4EiAvfzMv7ut0uhi6hktFEHCOu661Zy', NULL, '2019-09-16 06:41:44', '2019-09-16 06:41:44'),
(4, 'MUHAMMAD NUR FITRI BIN RUSLI', 'nurfitri385@gmail.com', '089587545', NULL, '$2y$10$AE05hJbCtfQfVVyU./abROBbl4Tm6tl7mBSIg.phzEeFf40AoM602', NULL, '2019-09-18 11:58:10', '2019-09-18 11:58:10'),
(5, 'haziq', 'kitkat@gmail.com', '0192237462', NULL, '$2y$10$lLp3lxV.X40K570iGnfPXOYzE18aO6w2M0cm6A35H7TaxbLmIY6/u', NULL, '2019-09-23 19:40:57', '2019-09-23 19:40:57'),
(8, 'Alif bin Ahmad', 'AlifAhmad@gmail.com', '012 49305524', NULL, '$2y$10$GWTF59oZo5oe/2Qlz4JhyeM5M9zR9OfWTXYPrfK2i7ZqsAx.DvkyS', NULL, '2019-11-20 05:15:46', '2019-11-20 05:15:46'),
(9, 'Azhan', 'fikryazhan79@gmail.com', '0198887722', NULL, '$2y$10$pHO.qPSNGNQ/VAHsbv6Azu./puS1Pcn/ndnRa3WjCMuzuYAVyVXn.', NULL, '2019-11-28 20:28:06', '2019-11-28 20:28:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`staffId`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`ReservationId`),
  ADD KEY `reservations_houseid_foreign` (`HouseId`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `staffId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `ReservationId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_houseid_foreign` FOREIGN KEY (`HouseId`) REFERENCES `houses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
