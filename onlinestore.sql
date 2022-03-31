-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2022 at 04:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`, `description`) VALUES
(1, '2022-03-30 18:25:04', '2022-03-30 18:25:04', 'Programming', 'Programing description'),
(2, '2022-03-30 18:25:04', '2022-03-30 18:25:04', 'Gaming', 'Gaming description'),
(3, '2022-03-30 18:25:04', '2022-03-30 18:25:04', '3D modeling', 'Modeling description'),
(4, '2022-03-30 18:25:04', '2022-03-30 18:25:04', 'Video editing', 'Video editing description'),
(5, '2022-03-30 18:25:04', '2022-03-30 18:25:04', 'Web browsing', 'Web browsing description ');

-- --------------------------------------------------------

--
-- Table structure for table `computers`
--

CREATE TABLE `computers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ram` bigint(20) NOT NULL,
  `gpu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `computers`
--

INSERT INTO `computers` (`id`, `name`, `cpu`, `ram`, `gpu`, `storage`, `image`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Lenovo', 'AMD Ryzen 5 2500U', 8, 'Nvidia GTX 1660', '1000', '1.jpg', 500, '2022-03-30 18:25:04', '2022-03-30 18:35:54'),
(2, 'HP', 'Intel Core i5-10210U', 16, 'AMD Radeon ', '1000', NULL, 1000, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(3, 'Dell', 'Intel Core i7-8565U', 16, 'Nvidia RTX 2070 ', '500', NULL, 700, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(4, 'Apple', 'Intel Core i7-8565U', 16, 'AMD Radeon ', '240', NULL, 600, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(5, 'Acer', 'AMD Ryzen 5', 8, 'Nvidia GTX 1660 ', '500', NULL, 1000, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(6, 'Asus', 'AMD Ryzen 3', 8, 'Intel graphics HD', '240', NULL, 400, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(7, 'Microsoft', 'Intel Core i5-6600K', 8, 'Intel graphics HD', '120', NULL, 700, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(8, 'Razer', 'Intel Core i7-8565U', 32, 'Nvidia RTX 2070 ', '2000', NULL, 1500, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(9, 'MSI', 'AMD Ryzen 5', 16, 'AMD Radeon ', '1000', NULL, 800, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(10, 'Legion', 'Intel Core i7-6700HQ', 16, 'Nvidia RTX 3060', '1000', NULL, 500, '2022-03-30 18:25:04', '2022-03-30 18:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `computer_category`
--

CREATE TABLE `computer_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `computer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `computer_category`
--

INSERT INTO `computer_category` (`id`, `category_id`, `computer_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(2, 5, 1, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(3, 1, 2, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(4, 2, 2, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(5, 3, 3, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(6, 4, 3, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(7, 4, 4, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(8, 1, 5, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(9, 2, 5, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(10, 3, 5, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(11, 2, 6, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(12, 3, 6, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(13, 4, 6, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(14, 1, 7, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(15, 5, 7, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(16, 1, 8, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(17, 2, 8, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(18, 3, 8, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(19, 4, 8, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(20, 5, 8, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(21, 2, 9, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(22, 3, 9, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(23, 2, 10, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(24, 3, 10, '2022-03-30 18:25:04', '2022-03-30 18:25:04'),
(25, 2, 1, '2022-03-30 18:36:01', '2022-03-30 18:36:01');

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
(5, '2022_02_12_140820_alter_users_table', 1),
(6, '2022_02_12_152713_create_orders_table', 1),
(7, '2022_03_30_004908_create_computers_table', 1),
(8, '2022_03_30_005126_create_order_computer_table', 1),
(9, '2022_03_30_034131_create_categories_table', 1),
(10, '2022_03_30_034322_create_computer_category_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 5000, 1, '2022-03-30 18:32:17', '2022-03-30 18:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `order_computer`
--

CREATE TABLE `order_computer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `computer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_computer`
--

INSERT INTO `order_computer` (`id`, `quantity`, `price`, `order_id`, `computer_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1000, 1, 2, '2022-03-30 18:32:17', '2022-03-30 18:32:17'),
(2, 1, 600, 1, 4, '2022-03-30 18:32:17', '2022-03-30 18:32:17'),
(3, 1, 400, 1, 6, '2022-03-30 18:32:17', '2022-03-30 18:32:17');

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
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'client',
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `balance`) VALUES
(1, 'Daniela Niño', 'daniela.niño@gmail.com', NULL, '$2y$10$dVb4Uk8GawBkZQtmDyipm.kBq8s/qUrAEk.Uu0Ew2sa6zAggjQbsq', NULL, '2022-03-30 18:25:04', '2022-03-30 18:32:17', 'admin', 99995000),
(2, 'Samuel Ceballos', 'samuel.ceballos@gmail.com', NULL, '$2y$10$IiuASWd04atin9XOCnv1a.D6z0ssPsYNbY1blebCvwL32esUDLB/u', NULL, '2022-03-30 18:25:04', '2022-03-30 18:25:04', 'client', 100000000),
(3, 'Juan Pablo Madrid', 'juan.madrid@gmail.com', NULL, '$2y$10$gY/3UQFJL.gZRkLKq73OEO9.wg9gusiRo1PHsiXsxjs58wCfJc44u', NULL, '2022-03-30 18:25:04', '2022-03-30 18:25:04', 'client', 100000000),
(4, 'Martin Villegas', 'martin.villegas@gmail.com', NULL, '$2y$10$g3mujjPLCR3e5geSma7/Au4hMSkW08hK8SO3YABk/M10GcX50a3Lm', NULL, '2022-03-30 18:25:04', '2022-03-30 18:25:04', 'client', 100000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `computers`
--
ALTER TABLE `computers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `computer_category`
--
ALTER TABLE `computer_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `computer_category_category_id_foreign` (`category_id`),
  ADD KEY `computer_category_computer_id_foreign` (`computer_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_computer`
--
ALTER TABLE `order_computer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_computer_order_id_foreign` (`order_id`),
  ADD KEY `order_computer_computer_id_foreign` (`computer_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `computers`
--
ALTER TABLE `computers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `computer_category`
--
ALTER TABLE `computer_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_computer`
--
ALTER TABLE `order_computer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `computer_category`
--
ALTER TABLE `computer_category`
  ADD CONSTRAINT `computer_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `computer_category_computer_id_foreign` FOREIGN KEY (`computer_id`) REFERENCES `computers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_computer`
--
ALTER TABLE `order_computer`
  ADD CONSTRAINT `order_computer_computer_id_foreign` FOREIGN KEY (`computer_id`) REFERENCES `computers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_computer_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
