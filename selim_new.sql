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
  `id_karyawan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `in` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `out` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table selim.absenses: ~0 rows (approximately)
INSERT INTO `absenses` (`id`, `id_users`, `id_karyawan`, `nama`, `tanggal`, `in`, `out`, `status`, `created_at`, `updated_at`, `jabatan`) VALUES
	(1, 1, '12345', 'Johan', '2023-04-01', '19:59', '21:33', 'Telat', '2023-03-31 12:59:41', '2023-03-31 18:19:57', '1');

-- Dumping structure for table selim.cutis
CREATE TABLE IF NOT EXISTS `cutis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_users` int NOT NULL,
  `id_karyawan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table selim.cutis: ~1 rows (approximately)
INSERT INTO `cutis` (`id`, `id_users`, `id_karyawan`, `jabatan`, `nama`, `tanggal`, `foto`, `ket`, `created_at`, `updated_at`) VALUES
	(1, 1, '12345', '1', 'Johan', '2023-04-02', 'foto/1680297390.foto.jpg', 'Izin', '2023-03-31 14:16:30', '2023-03-31 14:16:30');

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

-- Dumping structure for table selim.jabatans
CREATE TABLE IF NOT EXISTS `jabatans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `bagian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pokok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttetap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tjabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinsentif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttransport` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lembur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table selim.jabatans: ~1 rows (approximately)
INSERT INTO `jabatans` (`id`, `bagian`, `jabatan`, `pokok`, `ttetap`, `tjabatan`, `tinsentif`, `ttransport`, `lembur`, `masa`, `kode`, `created_at`, `updated_at`) VALUES
	(1, 'QC', 'Leader', '2500000', '500000', '500000', '100000', '100000', '50000', '1 tahun', 'QC', NULL, NULL);

-- Dumping structure for table selim.lamarans
CREATE TABLE IF NOT EXISTS `lamarans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_karyawan` int NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tpl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mulai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_users` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table selim.lamarans: ~1 rows (approximately)
INSERT INTO `lamarans` (`id`, `id_karyawan`, `nama`, `tpl`, `tgl`, `jk`, `mulai`, `email`, `kota`, `jabatan`, `created_at`, `updated_at`, `id_users`) VALUES
	(1, 12345, 'Johan 2', 'Cirebon 2', '2007-10-31', 'Laki-laki', '2023-12-30', 'johan@gmail.com', 'Cirebon', '1', '2023-03-31 12:31:56', '2023-03-31 18:25:04', 1);

-- Dumping structure for table selim.lemburs
CREATE TABLE IF NOT EXISTS `lemburs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_users` int NOT NULL,
  `id_karyawan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table selim.lemburs: ~1 rows (approximately)
INSERT INTO `lemburs` (`id`, `id_users`, `id_karyawan`, `jabatan`, `nama`, `tanggal`, `lama`, `created_at`, `updated_at`) VALUES
	(1, 1, '12345', '1', 'Johan', '2023-04-01', '3', '2023-03-31 15:02:24', '2023-03-31 15:02:24');

-- Dumping structure for table selim.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table selim.migrations: ~12 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(37, '2023_01_01_151532_create_informases_table', 1),
	(38, '2023_01_01_151837_create_kegiatans_table', 1),
	(39, '2023_01_01_151901_create_pengundurans_table', 1),
	(40, '2023_01_01_151929_create_keluhans_table', 1),
	(50, '2014_10_12_000000_create_users_table', 2),
	(51, '2014_10_12_100000_create_password_resets_table', 2),
	(52, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
	(53, '2019_08_19_000000_create_failed_jobs_table', 2),
	(54, '2019_12_14_000001_create_personal_access_tokens_table', 2),
	(55, '2023_01_01_041151_create_sessions_table', 2),
	(56, '2023_01_03_030052_create_lamarans_table', 2),
	(57, '2023_01_03_074916_create_absenses_table', 2),
	(59, '2023_01_03_121236_create_mundurs_table', 2),
	(60, '2023_01_03_144944_create_pelanggarans_table', 2),
	(61, '2023_03_29_133049_create_jabatans_table', 2),
	(62, '2023_01_03_082142_create_cutis_table', 3),
	(63, '2023_03_31_211621_create_lemburs_table', 4);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table selim.mundurs: ~0 rows (approximately)

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table selim.pelanggarans: ~0 rows (approximately)

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

-- Dumping data for table selim.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('2fMvltS4KaxECk07jYrJWNz5Zd1cqAK1HOHR2HrT', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVnJvaHJjNHd5VW92ZGI2MGdHQmpZOUZCTGx0V2dNbm5xanV5ODE1UiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTc6Imh0dHA6Ly9zZWxpbS50ZXN0Ijt9fQ==', 1680316354);

-- Dumping structure for table selim.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_karyawan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_id_kayawan_unique` (`id_karyawan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table selim.users: ~3 rows (approximately)
INSERT INTO `users` (`id`, `name`, `id_karyawan`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `status`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Johan', '12345', '$2y$10$9B2xI9qyEoJJzHfbTHwKS.beqIb5cuj/6G80vnco2IRh7jXChljWK', NULL, NULL, '2023-04-01 00:02:59', 'Karyawan Tetap', 'karyawan', NULL, '2023-03-31 12:19:55', '2023-03-31 12:19:55'),
	(2, 'Admin', '111111', '$2y$10$nwYh0/jDLnZbi0F4oPU/AuqPqP4MzzPvfrSFmm0z8Fg/h4rx2bbb6', NULL, NULL, NULL, 'Karyawan Tetap', 'admin', NULL, '2023-03-31 17:02:39', '2023-03-31 17:02:39'),
	(3, 'Pimpinan', '22222', '$2y$10$nwYh0/jDLnZbi0F4oPU/AuqPqP4MzzPvfrSFmm0z8Fg/h4rx2bbb6', NULL, NULL, NULL, 'Karyawan Tetap', 'pimpinan', NULL, '2023-03-31 17:02:39', '2023-03-31 17:02:39'),
	(4, 'Ahmad', '12344', '$2y$10$9ZB5wQvLmhoI1KGNUoyUZeNggh9jNBhGQcPp7cSYsCUGiMA26Ablq', NULL, NULL, NULL, 'Karyawan Tetap', 'karyawan', NULL, '2023-03-31 19:07:05', '2023-03-31 19:07:05');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
