-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2020 at 12:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `space-for.me`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account_owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_branch_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `bank_name`, `bank_account_number`, `bank_account_owner`, `bank_branch_name`, `created_at`, `updated_at`) VALUES
(1, 'BRI', '478346723', 'Sayas', 'Ambulu', '2020-12-13 14:39:40', '2020-12-13 14:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `event_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  `lokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_privacy` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_participant` int(11) NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','publish','end','proses') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `user_id`, `event_name`, `deskripsi`, `start_date`, `start_time`, `end_date`, `end_time`, `lokasi`, `image`, `kategori`, `event_privacy`, `package`, `price`, `limit_participant`, `link`, `email_contact`, `status`, `created_at`, `updated_at`) VALUES
(4, 2, 'sEvent Tester', 'testing aja', '2020-12-18', '10:48:00', '2020-12-18', '03:48:00', 'Google Meet', 'public/event_images/3sRvZmiCEdXCYZ3Ps2DrliHIdohFMRN58uLwgtxU.png', 'Pendidikan', 'Umum', 'Free', NULL, 0, 'http://127.0.0.1:8000/admin/events/create', 'test@gmail.com', 'publish', '2020-12-04 02:51:31', '2020-12-17 09:16:13'),
(5, 2, 'Event Akhir Tahun', 'event ini diakadakan 1 tahun sekali', '2020-12-31', '12:00:00', '2021-01-01', '01:00:00', 'Google Meet', 'public/event_images/9WhTCTBZdMDvEc2WJdScxF3pQOq11nPDtXVZXNhm.png', 'Pendidikan', 'Umum', 'Professional', NULL, 0, 'http://127.0.0.1:8000/admin/events/create', 'test@gmail.com', 'publish', '2020-12-08 06:31:32', '2020-12-20 16:04:57'),
(8, 2, 'Webinar Laravel 8.*', 'jaangan error plissss', '2020-12-04', '10:48:00', '2020-12-05', '15:19:00', 'Via Zoom', 'public/event_images/FO1X9Dzfb4YoK8geKAjQY2Z545hyyogr6yivAcQZ.jpg', 'Pendidikan', 'Umum', 'Professional', '100000', 0, 'http://127.0.0.1:8000/admin/events/create', 'test@gmail.com', 'publish', '2020-12-13 08:20:35', '2020-12-13 15:28:05'),
(9, 2, 'Webinar Laravel 7.*', 'yang semangat doong', '2020-12-13', '20:47:00', '2020-12-13', '20:47:00', 'Google Meet', 'public/event_images/c2oogawSyongevZ2rB5JTjQwB0CXQhviXXdVLEf4.jpg', 'Pendidikan', 'Event Privacy', 'Professional', '100000', 0, 'http://127.0.0.1:8000/admin/events/create', 'test@gmail.com', 'publish', '2020-12-13 13:47:24', '2020-12-13 15:20:26'),
(10, 2, 'Webinar Laravel 5', 'ayoo yang semangaat', '2020-12-13', '09:36:00', '2020-12-16', '09:36:00', 'Google Meet', 'public/event_images/Z5GjvrdtNXiRmrIsOOFo9HTOrvLsBBObl28m2NAQ.jpg', 'Pendidikan', 'Event Privacy', 'Professional', '100000', 0, 'http://127.0.0.1:8000/admin/events/create', 'test@gmail.com', 'proses', '2020-12-16 02:36:50', '2020-12-16 05:23:59'),
(12, 2, 'Webinar Laravel 1.*', 'ayo dong semnagat, jangan males males doong', '2020-12-17', '12:22:00', '2020-12-17', '13:22:00', 'Google Meet', 'public/event_images/utco6SQ8P7eVDNiPuuXP0C2aIGyd2IBSyPXcXg74.jpg', 'Kewirausahaan', 'Umum', 'Professional', '100000', 100, 'http://127.0.0.1:8000/admin/events/create', 'test@gmail.com', 'pending', '2020-12-16 05:23:10', '2020-12-16 05:23:10'),
(14, 2, 'Nonton Barenng', 'ayo nonton sekarang', '2020-12-18', '16:45:00', '2020-12-19', '16:45:00', 'Google Meet', 'public/event_images/lRpU4cz2qRPRfZndf2fCOo5xVWDOAaIlPpM49EcS.jpg', 'Kewirausahaan', 'Mahasiswa', 'Free', NULL, 100, 'http://127.0.0.1:8000/admin/events/create', 'test@gmail.com', 'pending', '2020-12-17 09:46:39', '2020-12-17 09:46:39'),
(15, 2, '222', 'asasas', '2020-12-22', '06:13:00', '2020-12-23', '06:15:00', 'jember', 'public/event_images/Ky03ZGYutz0c3GuYuUwYsODFelfyT3q0CNqPq2lF.jpg', 'Pendidikan', 'Mahasiswa', 'Free', NULL, 150, 'asasas', 'asas@gmail.com', 'pending', '2020-12-20 23:21:01', '2020-12-20 23:21:01');

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
(3, '2020_11_27_223751_create_event_table', 1),
(4, '2020_12_03_090439_create_participants_table', 2),
(5, '2020_12_04_013309_create_add_participants_column', 3),
(6, '2020_12_08_175403_create_pembayarans_table', 4),
(7, '2020_12_11_191534_create_organizations_table', 5),
(8, '2020_12_13_145333_create_pembayarans_table', 6),
(9, '2020_12_13_211015_create_admins_table', 7),
(10, '2020_12_13_215205_create_pembayaran_admin_table', 8),
(11, '2020_12_13_223723_create_sertifikat_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_organisasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_perusahaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rek` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pemilik_rekening` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_cabang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kartu_identitas` enum('npwp','ktp') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_npwp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_npwp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_npwp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ktp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_ktp` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `user_id`, `nama`, `alamat`, `website`, `email`, `no_telp`, `logo_organisasi`, `foto_perusahaan`, `nama_bank`, `no_rek`, `nama_pemilik_rekening`, `nama_cabang`, `kartu_identitas`, `foto_npwp`, `no_npwp`, `nama_npwp`, `nik`, `nama_ktp`, `foto_ktp`, `created_at`, `updated_at`) VALUES
(2, 4, 'tesst oiiiii', 'Jl. Mana saja dehhhhhhhh', 'singkong.com', 'admin@example.com', '099787978786', 'image/HE1rI5FHhORo0egyx4eRcwIESwxX7W5AmE8EMPm2.jpg', 'image/dqtKmIxzK7fr45jYVBV5QN3FhbhCOjm3wfzx7Y4V.jpg', 'BRI', '5874597289', 'Saya', 'Sumbersari', 'ktp', NULL, NULL, NULL, '3509112606990002', 'Saya', 'image/aVrX7tjoq0AbE8ZXSPhh1KCmGI8m4g3P70OMBFdN.jpg', '2020-12-12 11:34:13', '2020-12-12 11:34:13'),
(3, 2, 'Tester', 'Jl. Mana saja dehhhhhhhh', 'wirausaha@gmail.com', 'admin@example.com', 'asasa', 'image/YxmEI6ALUcMUuG39UV8F8qZem9FWHcqn1MwibwoY.jpg', 'image/ABPxrK4wiMRsOI4tnLEkxtxVeN20K1Rugf8zyfiz.jpg', 'BRI', '5874597289', 'Saya', 'Sumbersari', 'npwp', 'image/11BAay8HQINREEIXC21mVV7d13BbwzsbY0zdHuF2.jpg', '111318378173', 'Saya', NULL, NULL, NULL, '2020-12-13 05:59:42', '2020-12-20 23:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('absent','present','belum bayar','sudah bayar','proses') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `user_id`, `event_id`, `created_at`, `updated_at`, `status`, `nama_lengkap`, `no_hp`, `email`) VALUES
(7, '3', '5', '2020-12-08 06:35:38', '2020-12-08 06:35:38', 'belum bayar', NULL, NULL, NULL),
(9, '3', '8', '2020-12-13 08:21:32', '2020-12-13 13:07:24', 'present', 'Nadia', '089179176189', 'admin@example.com'),
(11, '3', '9', '2020-12-20 23:38:52', '2020-12-20 23:38:52', 'belum bayar', NULL, NULL, NULL);

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
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tf_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tf_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_tf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('proses','berhasil','cancel') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayarans`
--

INSERT INTO `pembayarans` (`id`, `user_id`, `event_id`, `organization_id`, `tf_date`, `tf_time`, `bukti_tf`, `status`, `created_at`, `updated_at`) VALUES
(5, '3', '8', '3', '2020-12-13', '19:32', 'image/de716duOdayEwVMK6nAWwiKSmPUfpFiY5A1UYiNE.jpg', 'berhasil', '2020-12-13 12:32:43', '2020-12-13 13:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_admin`
--

CREATE TABLE `pembayaran_admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tf_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tf_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_tf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('proses','berhasil','gagal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran_admin`
--

INSERT INTO `pembayaran_admin` (`id`, `event_id`, `tf_date`, `tf_time`, `bukti_tf`, `status`, `created_at`, `updated_at`) VALUES
(1, '9', '2020-12-13', '21:58', 'image/QjWmofwhT1m7jazGAbTQd7RpunA1rdziIFUv7NLC.jpg', 'berhasil', NULL, NULL),
(2, '8', '2020-12-13', '22:23', 'image/VitoKPH4V9Rve6q2DZs2aBGMAWOihHntYZAtm69y.jpg', 'berhasil', NULL, NULL),
(3, '5', '2020-12-13', '22:28', 'image/CEqy21gNoMKemid3jVzz99ZZPLhvVkadQzKkpGkU.jpg', 'berhasil', NULL, NULL),
(4, '5', '2020-12-13', '22:29', 'image/RatkPTPoUWnrQafgYIV9OfbsFFINvZiBNE0rzkxY.jpg', 'proses', NULL, NULL),
(5, '10', '2020-12-17', '12:28', 'image/NVZK288PQiVrsN3IVxK7DKSevdakJcKHgOWXwXPb.jpg', 'proses', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sertifikat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`id`, `event_id`, `sertifikat`, `created_at`, `updated_at`) VALUES
(1, '9', 'image/c2iX98k1oKikkYhSwf1jrrMfTP0iFlNsenMr1Vlo.jpg', NULL, NULL),
(2, '8', 'image/iUhXpE5Uu3JqQk67aCW5PgEh647laSHhj61Jx4AQ.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `level`, `gender`, `no_hp`, `email`, `email_verified_at`, `password`, `jenis`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nadia', 'admin', 'Perempuan', '081216451783', 'nad@gmail.com', NULL, '$2y$10$2/w4hAMnOFt0ZKH5VWgAJuAxfV2uciEJChB6gpEuFtaMuq6JjL60y', 'penyedia', NULL, '2020-11-30 16:35:32', '2020-11-30 16:41:46'),
(2, 'nadia', 'penyedia', 'Perempuan', '081216451783', 'penyedia@gmail.com', NULL, '$2y$10$2/w4hAMnOFt0ZKH5VWgAJuAxfV2uciEJChB6gpEuFtaMuq6JjL60y', 'penyedia', NULL, '2020-11-30 16:35:32', '2020-11-30 16:41:46'),
(3, 'nadia', 'user', 'Perempuan', '081216451783', 'user@gmail.com', NULL, '$2y$10$2/w4hAMnOFt0ZKH5VWgAJuAxfV2uciEJChB6gpEuFtaMuq6JjL60y', 'user', NULL, '2020-11-30 16:35:32', '2020-11-30 16:41:46'),
(4, 'test', 'penyedia', 'Perempuan', '089878876651', 'test@gmail.com', NULL, '$2y$10$xkZ.ttAve7/1VMfHGtlrZuKfBppMHS8dsqX3LtvqDjOypDZKv4woS', 'penyedia', NULL, '2020-12-02 12:05:22', '2020-12-02 12:05:22'),
(5, 'cimo', 'user', 'Perempuan', '098788676767', 'rahasia@gmail.com', NULL, '$2y$10$tYjpJ0.8/QCHE8yPTpK6NuOPYybf4bOajGRxbOLCh2BEACujQYFFa', 'user', NULL, '2020-12-17 09:36:11', '2020-12-17 09:36:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran_admin`
--
ALTER TABLE `pembayaran_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran_admin`
--
ALTER TABLE `pembayaran_admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
