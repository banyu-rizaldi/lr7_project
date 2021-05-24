-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 03:52 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indirection`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `nama_kota` varchar(255) NOT NULL,
  `total_lis` varchar(255) NOT NULL,
  `total_alert` varchar(255) NOT NULL,
  `total_churn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `nama_kota`, `total_lis`, `total_alert`, `total_churn`) VALUES
(151, 'Botswana', '6537052', '723749', '439'),
(152, 'Uruguay', '9242818', '497352', '488'),
(153, 'jakpus', '1321', '8765', '0983'),
(154, 'jakbar', '777', '12121', '678768'),
(155, 'Botswana', '6537052', '723749', '439'),
(156, 'Uruguay', '9242818', '497352', '488'),
(157, 'jakpus', '1321', '8765', '0983'),
(158, 'jakbar', '777', '12121', '678768'),
(159, 'Botswana', '6537052', '723749', '439');

-- --------------------------------------------------------

--
-- Table structure for table `dossier_datek`
--

CREATE TABLE `dossier_datek` (
  `NOTEL` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `abrv_art` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Iart` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Itarif` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dossier_datek`
--

INSERT INTO `dossier_datek` (`NOTEL`, `abrv_art`, `Iart`, `Itarif`, `created_at`, `updated_at`) VALUES
('1122', 'ASD', 'ZXC', 'MNB', NULL, NULL),
('1123', 'ASD', 'ZXCvbnm', 'MNB', NULL, NULL),
('1124', 'ASD', 'ZXC', 'MNB', NULL, NULL),
('1125', 'ASD', 'ZXC', 'MNB', NULL, NULL),
('1126', 'ASD', 'ZXC', 'MNB', NULL, NULL),
('1128', 'ASD', 'ZXC', 'MNB', NULL, NULL),
('1129', 'ASD', 'ZXC', 'MNB', NULL, NULL),
('1130', 'fgh', 'hgf', 'jkl', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dossier_kuadran`
--

CREATE TABLE `dossier_kuadran` (
  `NOTEL` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `KAWASAN` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ND_REF` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `WITEL` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DATEL` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `STO` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `GROUP_IH` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `KWADRAN_INDIHOME` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `KWADRAN_INTERNET` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CITEM` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SPEED` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dossier_kuadran`
--

INSERT INTO `dossier_kuadran` (`NOTEL`, `KAWASAN`, `ND_REF`, `WITEL`, `DATEL`, `STO`, `GROUP_IH`, `KWADRAN_INDIHOME`, `KWADRAN_INTERNET`, `CITEM`, `SPEED`, `created_at`, `updated_at`) VALUES
('', 'DIVRE 2', '', '', '', '', 'INDIHOME', '', '', '', '', NULL, NULL),
('098', 'jakarta', '9', 'b', '2', 'k', 'jakarta', 'n', 'jakarta', 'o', 'q', NULL, NULL),
('1', 'DIVRE 2', '2', '3', '4', '5', 'INDIHOME', '6', '7', '8', '9', NULL, NULL),
('2', 'DIVRE 2', '3', '4', '5', '6', 'INDIHOME', '7', '8', '9', '10', NULL, NULL),
('n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_11_11_020200_create_data_barang_table', 2),
(5, '2020_11_11_055554_add_nama_barang_to_data_barang_table', 3),
(6, '2014_10_12_100000_create_password_resets_table', 4),
(7, '2020_11_18_022055_add_column_to_users_table', 4),
(8, '2020_12_31_025818_create__d_o_s_s_i_e_r__k_u_a_d_r_a_n_table', 5),
(9, '2021_01_04_020059_create__d_o_s_s_i_e_r__d_a_t_e_k_table', 6),
(10, '2021_01_04_033910_create__n_o_s_s__s_e_r_v_i_c_e__i_n_f_o_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `noss_service_info`
--

CREATE TABLE `noss_service_info` (
  `NOTEL` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TECHNOLOGY` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `STP_TARGET` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `STP_PORT` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SP_TARGET` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SP_PORT` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SERVICE_STATUS` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `noss_service_info`
--

INSERT INTO `noss_service_info` (`NOTEL`, `TECHNOLOGY`, `STP_TARGET`, `STP_PORT`, `SP_TARGET`, `SP_PORT`, `SERVICE_STATUS`, `created_at`, `updated_at`) VALUES
('1234', 'v', 'l', 'k', 'p', 'o', 'u', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setup_aplikasi`
--

CREATE TABLE `setup_aplikasi` (
  `id` int(11) NOT NULL,
  `jumlah_hari_kerja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'abdul', 'abdul', 'abdul@gmail.com', NULL, '$2y$10$t9EJLk.lg6YMzaYVmXbIhe3jj10hjQbL4wClqSi8Dv/l9xttiD4.m', 'szo0JmfQDu2Wqphg3r1xchOjPaVogvdcKnKVnQJ32FS1iDeKYhDE69RKX7PF', '2020-11-10 23:40:54', '2020-11-10 23:40:54'),
(2, 'rizal', '32042931089890005', 'rizal@gmail.com', NULL, '$2y$10$XMxSLBKGaeFuOCfFQpBX5.32N8VzJImgCPrG6pmXFAoYovnpYsX1S', NULL, '2020-12-22 01:56:51', '2020-12-22 01:56:51'),
(6, 'asd', 'asd', 'asd@gmail.com', NULL, '$2y$10$40vjxXh4wp3AoBvsTSOOQOYMDxBVpV04oU0QdCX/AILkVO2jQYJAq', 'pn5CWI3UfX8bqn0pgwiuWdLspy0BLA4fNrkoImpd4NwFwlnymuzS12nzb9KG', '2020-12-26 19:08:00', '2020-12-26 19:08:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dossier_datek`
--
ALTER TABLE `dossier_datek`
  ADD PRIMARY KEY (`NOTEL`);

--
-- Indexes for table `dossier_kuadran`
--
ALTER TABLE `dossier_kuadran`
  ADD PRIMARY KEY (`NOTEL`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noss_service_info`
--
ALTER TABLE `noss_service_info`
  ADD PRIMARY KEY (`NOTEL`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `setup_aplikasi`
--
ALTER TABLE `setup_aplikasi`
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
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

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
-- AUTO_INCREMENT for table `setup_aplikasi`
--
ALTER TABLE `setup_aplikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
