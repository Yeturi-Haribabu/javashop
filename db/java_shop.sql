-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2021 at 03:54 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `java_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John', 'john@mail.com', '$2y$10$GCbQawZ2Hifr1mVW9dmiFOeQ.A0knUgRlB5Qpwzn8A.dYHYhfYqGm', 'grrrQ19GPGH2bVJblSQbAyt7MytaqYcQgKw0U3oLfpHs7RP1NSLIN9R0jSdL', NULL, NULL),
(2, 'raju', 'raju@gmail.com', '$2y$10$UYKqd5WDC6KT67IOaNWyFegnDdcMTOSL6MHGshvZIyL3FnnkkSevy', 'J27RoGY87PSawQu6m5M5YxB2y6UiZvbr1hDWpMWWUwNRjpWAK0ozCOPeKePD', NULL, NULL);

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
(3, '2020_11_17_064056_create_products_table', 1),
(4, '2020_11_19_102219_create_orders_table', 2),
(6, '2020_11_19_103845_create_order_items_table', 3),
(8, '2020_11_21_065539_create_admin_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `date`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-12-05 05:46:03', 'Flat No:101, Nagaram', 0, '2020-11-19 02:52:23', '2020-12-05 00:16:03'),
(2, 2, '2020-12-05 05:46:09', 'Flat No:102, Begumpet', 1, '2020-11-19 03:57:27', '2020-12-05 00:16:09'),
(3, 1, '2020-11-21 04:48:28', 'Flat No:102, Begumpet', 0, '2020-11-19 03:57:27', '2020-11-20 00:08:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 15, 150.00, '2020-11-19 11:42:45', '2020-11-19 11:42:45'),
(2, 2, 2, 150, 150.00, '2020-11-19 11:42:45', '2020-11-19 11:42:45'),
(3, 3, 6, 100, 150.00, '2020-11-19 11:42:45', '2020-11-19 11:42:45');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'test', 150.00, 'test', '01.jpg', '2020-11-18 05:33:34', '2020-11-19 02:46:19'),
(2, 'test mmn', 25.00, 'testestttttttttttttttttttttttttttttt', '02.jpg', '2020-11-18 05:34:26', '2020-11-19 02:56:01'),
(3, 'test', 50.00, 'test', '03.jpg', '2020-11-18 05:36:27', '2020-11-19 02:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alex', 'alex@example.com', '$2y$10$HCGCNngjLt30jWzQrroIqugM27tMmf5Ec9zIb7p7RkQZ5JHafNS2y', NULL, '2020-11-19 03:55:31', '2020-11-19 02:54:25'),
(2, 'John', 'john@example.com', '$2y$10$HCGCNngjLt30jWzQrroIqugM27tMmf5Ec9zIb7p7RkQZ5JHafNS2y', '0kctCzxGeKgwivS2IbS2HtUzPyQOJjgAVWaFCTr9xBkapA5WQaHgt81bimrZ', '2020-11-19 00:50:20', '2020-11-19 02:52:25'),
(3, 'Billy', 'billy@gmail.com', '$2y$10$HCGCNngjLt30jWzQrroIqugM27tMmf5Ec9zIb7p7RkQZ5JHafNS2y', 'HNblgFk7id1eyxHtEi3WI8zGq56JSheRHJBmCLYen6UH7Ct66MrDwy9HYzP8', '2020-11-25 01:46:17', '2020-11-25 01:46:17'),
(5, 'john', 'john@gmail.com', '$2y$10$HCGCNngjLt30jWzQrroIqugM27tMmf5Ec9zIb7p7RkQZ5JHafNS2y', NULL, '2020-11-25 01:51:04', '2020-11-25 01:51:04'),
(6, 'raju', 'raju@gmail.com', '$2y$10$J.IwPJCJXDZtNR.ozNNnJu9jTa5FaiM/9fkNDi50/k3lrqJytAhSe', 'eSajzkuvrHMrmdEBGGvoq86MTDGAaFjLUthX9JZkITeCiKL6lCATKooyj7MQ', '2020-11-25 01:52:40', '2020-11-25 01:52:40'),
(7, 'kiran', 'kiran@gmail.com', '$2y$10$M1Sgfij3RI.ZRetY9ZXcHuwIPWDTgI8Q5FyUYTAX0qHVuw9bf/N0u', NULL, '2020-11-28 01:51:49', '2020-11-28 01:51:49'),
(8, 'javed', 'javed@gmail.com', '$2y$10$HCGCNngjLt30jWzQrroIqugM27tMmf5Ec9zIb7p7RkQZ5JHafNS2y', '99CmpUfBVhg8AYKaFeUzoV1hDPxDKRE3Mb4uajmBaAvJGQEXcMrfZCqK54FD', '2020-11-29 09:15:43', '2020-11-29 09:15:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_email_unique` (`email`);

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
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
