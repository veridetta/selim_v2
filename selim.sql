-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table selim.absenses
CREATE TABLE IF NOT EXISTS `absenses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_users` int NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `in` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `out` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table selim.absenses: ~2 rows (approximately)
INSERT INTO `absenses` (`id`, `id_users`, `nip`, `nama`, `tanggal`, `in`, `out`, `ket`, `created_at`, `updated_at`) VALUES
	(1, 2, '32232323', 'Jafar Sahid', '2023-01-03', '12:00', '19:00', 'Hadir', '2023-01-03 01:50:43', '2023-01-03 01:50:43');

-- Dumping structure for table selim.cutis
CREATE TABLE IF NOT EXISTS `cutis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_users` int NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table selim.cutis: ~0 rows (approximately)
INSERT INTO `cutis` (`id`, `id_users`, `nip`, `nama`, `jabatan`, `tanggal`, `status`, `lama`, `alasan`, `created_at`, `updated_at`) VALUES
	(1, 2, '32232323', 'Jafar Sahid', 'Apoteker', '2022-02-22', 'Ditolak', '2 hari', 'Menikah', '2023-01-03 01:32:31', '2023-01-04 06:16:50');

-- Dumping structure for table selim.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table selim.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table selim.lamarans
CREATE TABLE IF NOT EXISTS `lamarans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_users` int NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tpl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table selim.lamarans: ~2 rows (approximately)
INSERT INTO `lamarans` (`id`, `id_users`, `nip`, `nama`, `tpl`, `tgl`, `jk`, `telp`, `email`, `alamat`, `foto`, `posisi`, `cv`, `created_at`, `updated_at`) VALUES
	(1, 3, '233232323', 'Antowiryo', 'Cirebon', '2002-02-22', 'Laki-laki', '088333777', 'anto@gmail.com', 'Cirebon Sejahtera, Cirebon', 'foto/1672726076.foto.png', 'Operator Produksi 2', 'cv/1672726076.cv.pdf', '2023-01-02 23:07:56', '2023-01-02 23:12:35'),
	(2, 2, '32232323', 'Javar Sahid', 'Cirebon', '20002-02-22', 'Laki-laki', '0888222', 'jafar@gmail.com', 'Jl Javar S, Cirebon', 'foto/1672728775.foto.png', 'karyawan', 'karyawan', '2023-01-02 23:52:55', '2023-01-02 23:52:55');

-- Dumping structure for table selim.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table selim.migrations: ~13 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(31, '2014_10_12_000000_create_users_table', 1),
	(32, '2014_10_12_100000_create_password_resets_table', 1),
	(33, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
	(34, '2019_08_19_000000_create_failed_jobs_table', 1),
	(35, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(36, '2023_01_01_041151_create_sessions_table', 1),
	(37, '2023_01_01_151532_create_informases_table', 1),
	(38, '2023_01_01_151837_create_kegiatans_table', 1),
	(39, '2023_01_01_151901_create_pengundurans_table', 1),
	(40, '2023_01_01_151929_create_keluhans_table', 1),
	(43, '2023_01_03_030052_create_lamarans_table', 2),
	(45, '2023_01_03_074916_create_absenses_table', 3),
	(46, '2023_01_03_082142_create_cutis_table', 4),
	(47, '2023_01_03_121236_create_mundurs_table', 5),
	(48, '2023_01_03_144944_create_pelanggarans_table', 6);

-- Dumping structure for table selim.mundurs
CREATE TABLE IF NOT EXISTS `mundurs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_users` int NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table selim.mundurs: ~1 rows (approximately)
INSERT INTO `mundurs` (`id`, `id_users`, `nip`, `nama`, `file`, `status`, `created_at`, `updated_at`) VALUES
	(1, 2, '32232323', 'Jafar Sahid', 'cv/1672749265.cv.pdf', 'Pengajuan', '2023-01-03 05:34:25', '2023-01-03 05:34:25');

-- Dumping structure for table selim.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table selim.password_resets: ~0 rows (approximately)

-- Dumping structure for table selim.pelanggarans
CREATE TABLE IF NOT EXISTS `pelanggarans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_users` int NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table selim.pelanggarans: ~0 rows (approximately)
INSERT INTO `pelanggarans` (`id`, `id_users`, `nip`, `nama`, `jenis`, `tanggal`, `keterangan`, `created_at`, `updated_at`) VALUES
	(2, 2, '32232323', 'Jafar Sahid', 'Terlambat', '2023-01-04', 'Sering terlambat', '2023-01-04 06:57:54', '2023-01-04 06:57:54');

-- Dumping structure for table selim.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table selim.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table selim.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table selim.sessions: ~2 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('5bfyLl3iExuggeJ5fj6dDxk0TGJoiMxi7Vtlk0xR', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQ3BJWGNtUllnc3JMS3ZDMjJPSDk1TnpMR1ZXZkJQNXpvdjNnSlN1ZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9zZWxpbS50ZXN0L2FkbWluL3BlbGFuZ2dhcmFuIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1672841824);

-- Dumping structure for table selim.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table selim.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `username`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Abdul Admin', 'abdul@gmail.com', '$2y$10$JRyjr9eSC4YhMhzI.CdkoO/uhNFzT97IH.ACoS9duHiFYTPcDtVNW', NULL, NULL, NULL, 'abdul', 'admin', NULL, '2023-01-01 22:00:16', '2023-01-01 22:00:16'),
	(2, 'Jafar Sahid', 'jafar@gmail.com', '$2y$10$JRyjr9eSC4YhMhzI.CdkoO/uhNFzT97IH.ACoS9duHiFYTPcDtVNW', NULL, NULL, NULL, 'jafar', 'karyawan', NULL, '2023-01-01 22:00:16', '2023-01-01 22:00:16'),
	(3, 'Anto', 'anto@gmail.com', '$2y$10$JRyjr9eSC4YhMhzI.CdkoO/uhNFzT97IH.ACoS9duHiFYTPcDtVNW', NULL, NULL, NULL, 'anto', 'pelamar', NULL, '2023-01-01 22:00:16', '2023-01-01 22:00:16'),
	(4, 'Pimpinan', 'pimpinan@gmail.com', '$2y$10$JRyjr9eSC4YhMhzI.CdkoO/uhNFzT97IH.ACoS9duHiFYTPcDtVNW', NULL, NULL, NULL, 'atasan', 'pimpinan', NULL, '2023-01-01 22:00:16', '2023-01-01 22:00:16');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
