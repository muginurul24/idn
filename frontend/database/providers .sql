-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2025 at 08:24 PM
-- Server version: 8.0.42-0ubuntu0.24.04.1
-- PHP Version: 8.4.6

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
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('slot','casino') COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_promo` tinyint(1) NOT NULL DEFAULT '0',
  `is_new` tinyint(1) NOT NULL DEFAULT '0',
  `is_maintenance` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`id`, `code`, `name`, `slug`, `type`, `logo`, `short_name`, `is_promo`, `is_new`, `is_maintenance`, `created_at`, `updated_at`) VALUES
(1, 'PRAGMATIC', 'Pragmatic', 'pragmatic', 'slot', 'pragmatic', 'PP', 1, 0, 0, '2025-02-20 19:37:16', '2025-02-20 19:37:16'),
(2, 'HABANERO', 'Habanero', 'habanero', 'slot', 'hbn', 'HB', 1, 0, 0, '2025-02-20 19:37:16', '2025-02-20 19:37:16'),
(3, 'BOOONGO', 'Booongo', 'booongo', 'slot', 'btg', 'BTG', 0, 0, 0, '2025-02-20 19:37:16', '2025-02-20 19:37:16'),
(4, 'PLAYSON', 'Playson', 'playson', 'slot', 'netent', 'NET', 0, 0, 0, '2025-02-20 19:37:16', '2025-02-20 19:37:16'),
(5, 'CQ9', 'Cq9', 'cq9', 'slot', 'cq9', 'CQ9', 0, 1, 0, '2025-02-20 19:37:16', '2025-02-20 19:37:16'),
(6, 'EVOPLAY', 'Evoplay', 'evoplay', 'slot', 'reevo', 'RVO', 0, 0, 0, '2025-02-20 19:37:16', '2025-02-20 19:37:16'),
(7, 'TOPTREND', 'Toptrend', 'toptrend', 'slot', 'ttg', 'TTG', 0, 0, 0, '2025-02-20 19:37:16', '2025-02-20 19:37:16'),
(8, 'DREAMTECH', 'Dreamtech', 'dreamtech', 'slot', 'simpleplay', 'SP', 0, 0, 0, '2025-02-20 19:37:16', '2025-02-20 19:37:16'),
(9, 'GENESIS', 'Genesis', 'genesis', 'slot', 'gameplay', 'GMP', 0, 0, 0, '2025-02-20 19:37:16', '2025-02-20 19:37:16'),
(10, 'PGSOFT', 'Pgsoft', 'pgsoft', 'slot', 'pg', 'PG', 1, 0, 0, '2025-02-20 19:37:16', '2025-02-20 19:37:16'),
(11, 'MICROGAMING', 'Microgaming', 'microgaming', 'slot', 'mg', 'MG', 0, 0, 0, '2025-02-20 19:37:16', '2025-02-20 19:37:16'),
(12, 'GAMEART', 'Gameart', 'gameart', 'slot', '5g', '5G', 0, 0, 0, '2025-02-20 19:37:16', '2025-02-20 19:37:16'),
(13, 'PLAYSTAR', 'Playstar', 'playstar', 'slot', 'playstar', 'PS', 0, 0, 0, '2025-02-20 19:37:16', '2025-02-20 19:37:16'),
(14, 'GMW', 'Gmw', 'gmw', 'slot', 'gmw', 'GMW', 0, 0, 0, '2025-02-20 19:37:16', '2025-02-20 19:37:16'),
(15, 'REDTIGER', 'Redtiger', 'redtiger', 'slot', 'redtiger', 'RT', 0, 0, 0, '2025-02-20 19:37:16', '2025-02-20 19:37:16'),
(16, 'HACKSAW', 'Hacksaw', 'hacksaw', 'slot', 'fp', 'FP', 0, 0, 0, '2025-02-20 19:37:16', '2025-02-20 19:37:16'),
(17, 'NAGA', 'Naga', 'naga', 'slot', 'gg', 'GG', 0, 0, 0, '2025-02-20 19:37:16', '2025-02-20 19:37:16'),
(18, 'QUICKSPIN', 'Quickspin', 'quickspin', 'slot', 'fastspin', 'FS', 0, 0, 0, '2025-02-20 19:37:16', '2025-02-20 19:37:16'),
(19, 'ASPECT', 'Aspect', 'aspect', 'slot', 'mg-sr', 'SR', 0, 0, 0, '2025-02-20 19:37:16', '2025-02-20 19:37:16'),
(20, 'AVATARUX', 'Avatarux', 'avatarux', 'slot', 'mannaplay', 'MNP', 0, 0, 0, '2025-02-20 19:37:16', '2025-02-20 19:37:16'),
(21, 'RELAX', 'Relax', 'relax', 'slot', 'rtg', 'RTG', 0, 0, 0, '2025-02-20 19:37:16', '2025-02-20 19:37:16'),
(22, 'BGAMING', 'Bgaming', 'bgaming', 'slot', 'upg', 'UPG', 0, 0, 0, '2025-02-20 19:37:16', '2025-02-20 19:37:16'),
(23, 'SPRIBE', 'Spribe', 'spribe', 'slot', 'spade', 'SG', 0, 0, 0, '2025-02-20 19:37:16', '2025-02-20 19:37:16'),
(24, 'REELKINGDOM', 'Reel Kingdom', 'reel-kingdom', 'slot', 'pragmatic-slot-mania', 'SM', 0, 0, 0, '2025-02-20 19:37:17', '2025-02-20 19:37:17'),
(25, 'EVOLUTION', 'Evolution', 'evolution', 'casino', 'evo', 'EVO', 0, 0, 0, '2025-02-20 19:37:17', '2025-02-20 19:37:17'),
(26, 'PRAGMATICLIVE', 'Pragmatic Play Live', 'pragmatic-play-live', 'casino', 'pp-live', 'PPL', 0, 0, 0, '2025-02-20 19:37:17', '2025-02-20 19:37:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `providers_code_unique` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
