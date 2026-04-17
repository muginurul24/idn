-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2025 at 09:58 AM
-- Server version: 8.0.42-0ubuntu0.24.04.1
-- PHP Version: 8.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idn`
--

-- --------------------------------------------------------

--
-- Table structure for table `carousels`
--

CREATE TABLE `carousels` (
  `id` bigint UNSIGNED NOT NULL,
  `sequence` int NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carousels`
--

INSERT INTO `carousels` (`id`, `sequence`, `image`, `alt`, `link`, `created_at`, `updated_at`) VALUES
(1, 1, 'carousels/1.png', 'Welcome Banner', NULL, '2025-04-30 23:08:15', '2025-04-30 23:08:19'),
(2, 1, 'carousels/2.png', 'Warning Banner', NULL, '2025-05-01 23:08:22', '2025-05-01 23:08:24'),
(3, 1, 'carousels/3.png', 'Diamond', NULL, '2025-05-02 23:08:26', '2025-05-02 23:08:28'),
(4, 2, 'carousels/2-1.png', 'Bonus Rollingan', '/promotion', '2025-05-03 23:08:30', '2025-05-03 23:08:32'),
(5, 2, 'carousels/2-2.png', 'Bonus harian dan new member', '/promotion', '2025-05-04 23:08:35', '2025-05-04 23:08:36'),
(6, 3, 'carousels/3-1.jpg', 'Bonus Level Up', '/promotion', '2025-05-05 23:08:39', '2025-05-05 23:08:41'),
(7, 3, 'carousels/3-2.jpeg', 'Garansi Kekalahan', '/promotion', '2025-05-06 23:08:43', '2025-05-06 23:08:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carousels`
--
ALTER TABLE `carousels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carousels`
--
ALTER TABLE `carousels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
