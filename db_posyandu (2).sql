-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2021 at 04:49 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_posyandu`
--

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Table structure for table `posyandu1`
--

CREATE TABLE `posyandu1` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `usia` int(11) NOT NULL,
  `status_gizi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posyandu1`
--

INSERT INTO `posyandu1` (`id`, `nama`, `jenis_kelamin`, `berat_badan`, `tinggi_badan`, `usia`, `status_gizi`) VALUES
(1, 'ARYA AMAR H', 'L', 5, 70, 17, 'NORMAL'),
(2, 'SITI NURJANAH', 'P', 9, 80, 15, 'NORMAL'),
(3, 'AULIA MEKA', 'P', 8, 85, 19, 'NORMAL'),
(4, 'CALISA KIANA S', 'P', 9, 80, 15, 'NORMAL'),
(5, 'SAFANA', 'P', 6, 60, 6, 'BURUK'),
(6, 'RIZQIA KHUSNA', 'P', 6, 60, 3, 'BURUK'),
(7, 'AFIFAH', 'P', 10, 70, 21, 'NORMAL'),
(8, 'YUSUP', 'L', 8, 73, 25, 'NORMAL'),
(9, 'ALDI PASHA', 'L', 5, 60, 2, 'NORMAL'),
(10, 'KHAIRA', 'P', 6, 64, 3, 'BURUK'),
(11, 'SABIRA', 'P', 9, 70, 17, 'NORMAL'),
(12, 'HUSITA', 'P', 8, 81, 23, 'NORMAL'),
(13, 'HUMAIRA', 'P', 5, 60, 2, 'NORMAL'),
(14, 'SALSABILA', 'P', 5, 60, 2, 'NORMAL'),
(15, 'AGUNG', 'L', 9, 74, 16, 'NORMAL'),
(16, 'KYRA', 'P', 8, 70, 14, 'NORMAL'),
(17, 'NATHAN', 'L', 8, 68, 6, 'BURUK'),
(18, 'AZMI', 'L', 11, 79, 18, 'BURUK'),
(19, 'AULIA', 'P', 10, 80, 20, 'NORMAL'),
(20, 'SUCI', 'P', 9, 73, 16, 'NORMAL'),
(21, 'ARSYLA', 'P', 8, 72, 8, 'BURUK'),
(22, 'RIFA', 'P', 10, 88, 20, 'NORMAL'),
(23, 'AKDAN', 'L', 7, 60, 5, 'BURUK'),
(24, 'GIO', 'L', 12, 81, 21, 'BURUK'),
(25, 'YAMA', 'L', 10, 80, 11, 'BURUK'),
(26, 'KENZI', 'L', 12, 93, 30, 'BURUK'),
(27, 'KELSI', 'P', 7, 81, 24, 'NORMAL'),
(28, 'MIRZA', 'L', 4, 57, 18, 'BURUK'),
(29, 'MUKSIN', 'L', 12, 101, 40, 'NORMAL'),
(30, 'RIZKI', 'L', 12, 90, 21, 'BURUK'),
(31, 'NURUL', 'P', 11, 89, 20, 'BURUK'),
(32, 'AKSA', 'L', 12, 89, 20, 'BURUK'),
(33, 'SUCI', 'P', 10, 70, 14, 'NORMAL'),
(34, 'KAILA', 'P', 9, 72, 16, 'NORMAL'),
(35, 'ABI', 'L', 17, 108, 56, 'NORMAL'),
(36, 'FAWAZ', 'L', 14, 103, 55, 'NORMAL'),
(37, 'AINAYA', 'P', 15, 102, 37, 'NORMAL'),
(38, 'RESTI', 'P', 13, 70, 53, 'NORMAL'),
(39, 'KHOPI', 'P', 14, 85, 39, 'NORMAL'),
(40, 'ROPI', 'P', 12, 92, 39, 'NORMAL'),
(41, 'ZIHAN', 'P', 11, 95, 42, 'NORMAL'),
(42, 'HALWA', 'P', 16, 100, 42, 'NORMAL'),
(43, 'ANISA', 'P', 15, 108, 49, 'NORMAL'),
(44, 'UI', 'P', 12, 100, 60, 'NORMAL'),
(45, 'ARSYA', 'L', 10, 90, 60, 'BURUK'),
(46, 'WAFA', 'P', 11, 100, 34, 'BURUK'),
(47, 'DAFA', 'L', 18, 100, 38, 'NORMAL'),
(48, 'NISWA', 'P', 10, 97, 24, 'NORMAL'),
(49, 'AKMAL', 'L', 9, 100, 48, 'BURUK'),
(50, 'MUKSIN', 'L', 11, 105, 36, 'BURUK'),
(51, 'ENDEH APRIANI', 'P', 10, 90, 53, 'BURUK'),
(52, 'SYAVAI MUSTAKA', 'L', 13, 100, 60, 'NORMAL'),
(53, 'ARYA', 'L', 11, 100, 56, 'NORMAL'),
(54, 'ARSILA', 'P', 12, 101, 55, 'NORMAL'),
(55, 'SAHLA', 'P', 9, 93, 36, 'NORMAL'),
(56, 'GIBRAN', 'L', 9, 92, 41, 'BURUK'),
(57, 'ANDIN', 'P', 12, 104, 60, 'NORMAL'),
(58, 'ALIF', 'L', 9, 98, 48, 'BURUK'),
(59, 'FAWAZ', 'L', 11, 90, 48, 'NORMAL'),
(60, 'ZAHIRA', 'P', 11, 90, 48, 'NORMAL'),
(61, 'INARA', 'P', 10, 90, 36, 'NORMAL'),
(62, 'DEREN', 'L', 14, 98, 60, 'NORMAL'),
(63, 'ADE', 'L', 15, 100, 60, 'NORMAL'),
(64, 'ZULFIKAR', 'L', 14, 98, 48, 'NORMAL'),
(65, 'HAFIZ', 'L', 14, 100, 60, 'NORMAL'),
(66, 'JULIAN', 'L', 12, 78, 48, 'NORMAL'),
(67, 'ALWI', 'L', 12, 100, 24, 'BURUK'),
(68, 'DEVINA', 'P', 17, 105, 56, 'NORMAL'),
(69, 'SAMUDRA', 'L', 17, 100, 53, 'NORMAL'),
(70, 'ADIT', 'L', 16, 100, 60, 'NORMAL'),
(71, 'ARSYLA', 'P', 16, 108, 53, 'NORMAL'),
(72, 'DUSTAFA', 'L', 16, 100, 60, 'NORMAL'),
(73, 'ARYA', 'L', 16, 102, 48, 'NORMAL'),
(74, 'ANDIN', 'P', 16, 100, 60, 'NORMAL'),
(75, 'LEVYANA', 'P', 15, 100, 48, 'NORMAL'),
(76, 'ADIBA', 'P', 10, 105, 60, 'BURUK'),
(77, 'azkar', 'L', 4, 60, 19, 'BURUK'),
(78, 'ayu', 'p', 11, 60, 23, 'BURUK'),
(79, 'lala', 'p', 16, 71, 20, 'BURUK'),
(80, 'aulia', 'p', 12, 78, 20, 'BURUK'),
(81, 'celsi', 'p', 10, 50, 10, 'BURUK'),
(82, 'danang', 'l', 8, 66, 9, 'BURUK'),
(83, 'debi', 'p', 5, 77, 6, 'NORMAL'),
(84, 'delon', 'l', 5, 58, 3, 'NORMAL'),
(85, 'dabita', 'p', 5, 50, 2, 'NORMAL'),
(86, 'dina', 'p', 7, 100, 8, 'BURUK'),
(87, 'said', 'l', 8, 60, 11, 'BURUK'),
(88, 'parel', 'l', 8, 70, 12, 'BURUK'),
(89, 'grasia', 'p', 6, 60, 3, 'BURUK'),
(90, 'hasna', 'p', 8, 63, 4, 'BURUK'),
(91, 'anna', 'p', 11, 88, 16, 'BURUK'),
(92, 'kaila', 'p', 11, 73, 19, 'BURUK'),
(93, 'risma', 'p', 12, 76, 20, 'BURUK'),
(94, 'eja', 'l', 13, 111, 20, 'BURUK'),
(95, 'laskia', 'p', 13, 102, 23, 'BURUK'),
(96, 'abiyu', 'l', 10, 106, 23, 'NORMAL'),
(97, 'rafi', 'l', 11, 100, 23, 'BURUK'),
(98, 'aska', 'l', 11, 97, 19, 'BURUK'),
(99, 'nazril', 'l', 10, 90, 14, 'NORMAL'),
(100, 'layla', 'p', 5, 40, 2, 'NORMAL');

-- --------------------------------------------------------

--
-- Table structure for table `posyandu9`
--

CREATE TABLE `posyandu9` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `usia` int(11) NOT NULL,
  `status_gizi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posyandu9`
--

INSERT INTO `posyandu9` (`id`, `nama`, `jenis_kelamin`, `berat_badan`, `tinggi_badan`, `usia`, `status_gizi`) VALUES
(1, 'LAILA/MBER', 'p', 7, 59, 2, 'NORMAL'),
(2, 'RYUICHI MALIK', 'L', 6, 83, 8, 'NORMAL'),
(3, 'RAIZ', 'l', 10, 83, 8, 'NORMAL'),
(4, 'ALBI', 'l', 9, 78, 8, 'NORMAL'),
(5, 'PREA', 'p', 7, 64, 9, 'BURUK'),
(6, 'ALPIA', 'p', 6, 66, 9, 'BURUK'),
(7, 'DEISYA', 'p', 9, 80, 9, 'NORMAL'),
(8, 'APIPAH', 'p', 10, 80, 8, 'NORMAL'),
(9, 'RAPIKA', 'p', 5, 57, 6, 'NORMAL'),
(10, 'DEPINA', 'p', 12, 94, 10, 'BURUK'),
(11, 'PINDEA', 'p', 4, 60, 5, 'NORMAL'),
(12, 'REISYA', 'p', 6, 50, 4, 'NORMAL'),
(13, 'EMBUN', 'l', 10, 80, 11, 'NORMAL'),
(14, 'NAZWA', 'p', 11, 80, 20, 'NORMAL'),
(15, 'SAPA', 'p', 15, 50, 23, 'NORMAL'),
(16, 'KINAN', 'p', 8, 73, 7, 'NORMAL'),
(17, 'FIRZA', 'l', 9, 72, 7, 'BURUK'),
(18, 'DELISA', 'p', 16, 111, 20, 'BURUK'),
(19, 'NURUL', 'p', 15, 88, 19, 'NORMAL'),
(20, 'ARKA', 'l', 12, 89, 18, 'NORMAL'),
(21, 'HAFIZA', 'p', 18, 100, 20, 'BURUK'),
(22, 'NADIRA', 'p', 16, 112, 21, 'NORMAL'),
(23, 'AZMI', 'l', 10, 90, 5, 'BURUK'),
(24, 'NADA', 'p', 10, 87, 11, 'BURUK'),
(25, 'NOVAL', 'l', 9, 96, 10, 'BURUK'),
(26, 'BIYAN', 'l', 9, 80, 9, 'BURUK'),
(27, 'ZIDNA', 'l', 8, 65, 9, 'NORMAL'),
(28, 'AISAH', 'p', 8, 81, 8, 'BURUK'),
(29, 'KALIF', 'l', 9, 70, 8, 'NORMAL'),
(30, 'NAILA', 'p', 8, 66, 8, 'BURUK'),
(31, 'SATRIA', 'l', 16, 98, 20, 'BURUK'),
(32, 'AKILA', 'p', 17, 99, 21, 'BURUK'),
(33, 'M AKMAL ', 'L', 13, 82, 48, 'NORMAL'),
(34, 'QUENSHA KITTY', 'p', 15, 90, 60, 'NORMAL'),
(35, 'M FADLICA', 'l', 10, 79, 44, 'NORMAL'),
(36, 'NADHIRA AUFA', 'p', 14, 100, 60, 'NORMAL'),
(37, 'ZAHID HAICKAL', 'l', 11, 85, 35, 'NORMAL'),
(38, 'M PRADIPTA', 'l', 12, 88, 41, 'NORMAL'),
(39, 'DESYA ANINDITA', 'p', 13, 102, 60, 'NORMAL'),
(40, 'M RESYA', 'l', 12, 101, 60, 'NORMAL'),
(41, 'M KALIF', 'l', 9, 76, 36, 'NORMAL'),
(42, 'M NOVAL', 'l', 10, 100, 24, 'NORMAL'),
(43, 'NAILA SIDRIATU', 'p', 11, 105, 48, 'NORMAL'),
(44, 'VININDYA SAHLA', 'p', 16, 100, 48, 'NORMAL'),
(45, 'M AKNIAR', 'l', 12, 90, 48, 'BURUK'),
(46, 'M SIGGIT', 'l', 15, 67, 36, 'BURUK'),
(47, 'M RESTU ALAROBI', 'l', 13, 82, 24, 'NORMAL'),
(48, 'M DAFFA P', 'l', 13, 100, 53, 'NORMAL'),
(49, 'SHAZFA ALMAHYRA', 'p', 10, 93, 38, 'BURUK'),
(50, 'HESTI ANJANI', 'p', 11, 105, 48, 'BURUK');

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
  `is_admin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@mail.com', NULL, '$2y$10$Olkn3Ge.OechlbHDzhm2S.TcySvSTO.OasTWVVY6mA1J1RDZyq5FG', 1, NULL, '2021-01-20 07:17:35', '2021-01-20 07:17:35'),
(2, 'User', 'user@mail.com', NULL, '$2y$10$B1VvgVDIBqj9GV7rKqyFsuBBVO.SCVLf2b5pfxLZcfwR0JqQ0.vyy', 0, NULL, '2021-01-20 07:17:35', '2021-01-20 07:17:35');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posyandu1`
--
ALTER TABLE `posyandu1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posyandu9`
--
ALTER TABLE `posyandu9`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posyandu1`
--
ALTER TABLE `posyandu1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `posyandu9`
--
ALTER TABLE `posyandu9`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
