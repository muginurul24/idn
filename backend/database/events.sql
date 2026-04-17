-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2025 at 03:39 PM
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
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint UNSIGNED NOT NULL,
  `label` enum('all','new','limited') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'all',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `label`, `title`, `slug`, `banner`, `description`, `created_at`, `updated_at`) VALUES
(1, 'all', 'title all 1', 'title-all-1', 'events/all1.jpg', 'nanti aja di isinya', '2025-05-09 14:31:11', '2025-05-09 14:31:11'),
(2, 'all', 'title all 2', 'title-all-2', 'events/all2.jpg', 'nanti aja di isinya', '2025-05-10 14:31:11', '2025-05-10 14:31:11'),
(3, 'new', 'title new 1', 'title-new-1', 'events/new1.jpeg', '<h4>EVENT SUPER BONUS UP LEVEL BERHADIAH IPHONE 15 PRO</h4>\n                                                    <p>\n                                                        <span style=\"font-size: 13px;\">\n                                                            <p>\n                                                                <span style=\"font-size: 18px; color: rgb(0, 0, 0); font-weight: bold;\">BONUS NAIK LEVEL DI Liga788</span>\n                                                                <br>\n                                                            </p>\n                                                            <p>\n                                                                <span style=\"font-size: 14px;\">* Promo berlaku untuk semua member Liga788.</span>\n                                                            </p>\n                                                            <p>\n                                                                <span style=\"font-size: 14px;\">* Bonus Level up dihitung berdasarkan turnover semua games.</span>\n                                                            </p>\n                                                            <p>\n                                                                <span style=\"font-size: 14px;\">* Wajib screenshot saat muncul notifikasi kenaikan level.</span>\n                                                            </p>\n                                                            <p>\n                                                                <span style=\"font-size: 14px;\">\n                                                                    * Share Ke Grup Official Facebook Liga788 Dan Berikan Hastag <span style=\"font-weight: bold; font-style: italic;\">#naiklevelLiga788 &amp;#username</span>\n                                                                </span>\n                                                            </p>\n                                                            <p>\n                                                                <span style=\"font-size: 14px;\">Link Official Facebook &gt;&gt;&nbsp;</span>\n                                                                <a href=\"https://www.facebook.com/groups/officialliga788\" style=\"font-weight: bold;\">Officiall Facebook Liga788</a>\n                                                            </p>\n                                                            <p>\n                                                                <span style=\"font-size: 14px;\">* Klaim bonus level up bisa langsung ke CS Liga788 via LiveChat / WhatsApp.</span>\n                                                            </p>\n                                                            <p>\n                                                                <span style=\"font-size: 14px; font-weight: bold; font-style: italic;\">BRONZE Hadiah Kredit Rp 25.000</span>\n                                                            </p>\n                                                            <p>\n                                                                <span style=\"font-size: 14px; font-weight: bold; font-style: italic;\">SILVER Hadiah Kredit Rp. 75.000</span>\n                                                            </p>\n                                                            <p>\n                                                                <span style=\"font-size: 14px; font-weight: bold; font-style: italic;\">GOLD Hadiah Kredit Rp 200.000</span>\n                                                            </p>\n                                                            <p>\n                                                                <span style=\"font-size: 14px; font-weight: bold; font-style: italic;\">DIAMOND Hadiah Kredit 1.500.000</span>\n                                                            </p>\n                                                            <p>\n                                                                <span style=\"font-size: 14px; font-weight: bold; font-style: italic;\">PLATIUM Hadiah SAMSUNG S22 ULTRA</span>\n                                                            </p>\n                                                            <p>\n                                                                <span style=\"font-size: 14px; font-weight: bold; font-style: italic;\">VIP Hadiah IPHONE 15 Pro</span>\n                                                            </p>\n                                                            <p>\n                                                                <br>\n                                                            </p>\n                                                            <p>\n                                                                <span style=\"font-size: 18px; font-weight: bold;\">Syarat &amp;ketentuan</span>\n                                                            </p>\n                                                            <p>\n                                                                <span style=\"font-size: 14px;\">* Event Bonus Up Level Ini Dimulai Pada Tanggal 23 Januari 2023</span>\n                                                            </p>\n                                                            <p>\n                                                                <span style=\"font-size: 14px;\">\n                                                                    * Claim Postingan &nbsp;<span style=\"font-weight: bold;\">WAJIB</span>\n                                                                    &nbsp;menggunakan facebook yang sama dengan nama rekening yang terdaftar.\n                                                                </span>\n                                                            </p>\n                                                            <p>\n                                                                <span style=\"font-size: 14px;\">* Kami pihak Liga788 berhak membatalkan bonus apabila terindikasi adanya kecurangan atau penipuan yang terjadi. Liga788 berhak banned User id tersebut tanpa adanya pemberitahuan terlebih dahulu.</span>\n                                                            </p>\n                                                            <p>\n                                                                <span style=\"font-size: 14px;\">*&nbsp;</span>\n                                                                <span style=\"font-size: 14px; color: rgb(0, 0, 0);\">Promo Ini Dapat Berubah Kapan Saja Tanpa Pemberitahauan Terlebih Dahulu.</span>\n                                                            </p>\n                                                            <p>\n                                                                <span style=\"font-size: 14px;\">* Semua keputusan Liga788 mutlak &amp;tidak di ganggu gugat</span>\n                                                            </p>\n                                                        </span>\n                                                    </p>', '2025-05-09 14:33:02', '2025-05-09 14:33:02'),
(4, 'new', 'title new 2', 'title-new-2', 'events/new2.jpg', 'nanti aja di isinya', '2025-05-10 14:33:02', '2025-05-10 14:33:02'),
(5, 'limited', 'title limited 1', 'title-limited-1', 'events/limited1.webp', 'nanti aja di isinya', '2025-05-09 14:34:28', '2025-05-09 14:34:28'),
(6, 'limited', 'title limited 2', 'title-limited-2', 'events/limited2.webp', 'nanti aja di isinya', '2025-05-10 14:34:28', '2025-05-10 14:34:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `events_slug_unique` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
