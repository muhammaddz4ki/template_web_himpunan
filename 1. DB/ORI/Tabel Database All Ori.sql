-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 23, 2025 at 08:25 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umko_nabila_skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `agendas`
--

CREATE TABLE `agendas` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyelenggara` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_peserta` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_capaian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `evaluasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `pamflet` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agendas`
--

INSERT INTO `agendas` (`id`, `title`, `penyelenggara`, `start`, `tempat`, `description`, `jmlh_peserta`, `target_capaian`, `evaluasi`, `status`, `pamflet`, `created_at`, `updated_at`) VALUES
(5, 'Dialog Publik dengan Bakal Calon Kepala Daerah', 'Komisariat', '2025-01-24T09:59', 'Aula', 'Formal', '25', 'Win', 'Oke mantap', '1', 'agenda_3-1736819886.jpg', '2025-01-14 01:58:06', '2025-01-14 01:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Berita', 'berita', '2023-05-25 02:55:00', '2023-05-27 06:10:17'),
(3, 'PC-IMM', 'pmii', '2023-05-25 02:55:01', '2025-01-12 09:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `category_books`
--

CREATE TABLE `category_books` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_books`
--

INSERT INTO `category_books` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'pmii', 'pmii', '2023-05-25 02:55:02', '2023-05-25 02:55:02'),
(2, 'filsafat', 'filsafat', '2023-05-25 02:55:03', '2023-05-25 02:55:03'),
(3, 'Romansa', 'romansa', '2023-05-25 05:27:29', '2023-05-25 05:27:29'),
(4, 'Sastra', 'sastra', '2023-05-25 05:27:41', '2023-05-25 05:27:41'),
(5, 'Islami', 'fiksi-islami', '2023-05-25 05:27:54', '2023-07-10 16:50:09'),
(6, 'Fantasi', 'fantasi', '2023-05-25 05:28:05', '2023-05-25 05:28:05'),
(7, 'Programming', 'programming', '2023-05-25 06:06:59', '2023-05-25 06:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` bigint UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `judul` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `img`, `user_id`, `judul`, `status`, `created_at`, `updated_at`) VALUES
(17, 'galeri_-1737485179.jpg', 1, 'Kegiatan Dialog Publik', '1', '2025-01-21 18:46:19', '2025-01-21 18:46:26'),
(18, 'galeri_-1737485221.jpg', 1, 'Pelantikan Ketua PC-IMM Lampura', '1', '2025-01-21 18:47:01', '2025-01-21 18:47:49'),
(19, 'galeri_-1737485262.jpg', 1, 'Sosialisasi Kader PC-IMM Lampura', '1', '2025-01-21 18:47:42', '2025-01-22 07:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `judul`, `deskripsi`, `link`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Mari Maju Bersama', 'Kotabumi Lampung Utara Bisa', 'https://www.youtube.com/', 'banner_update_-1737482597.jpg', '2023-05-25 02:54:59', '2025-01-21 18:03:17'),
(2, 'PC-IMM Lampung Utara', 'Bersama Menuju Kesuksesan!', 'https://www.instagram.com/', 'banner_update_-1737482616.jpg', '2023-05-25 02:54:59', '2025-01-21 18:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `h_b_n_s`
--

CREATE TABLE `h_b_n_s` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `h_b_n_s`
--

INSERT INTO `h_b_n_s` (`id`, `title`, `date`, `deskripsi`, `created_at`, `updated_at`) VALUES
(5, 'Hari Keluarga', '2023-05-29', 'aw aw aw aw', '2023-05-25 02:55:03', '2023-05-25 02:55:03'),
(6, 'Hari Tanpa Tembakau Sedunia', '2023-05-31', 'aw aw aw aw', '2023-05-25 02:55:03', '2023-05-25 02:55:03'),
(8, 'Idul adhw', '2023-06-29', NULL, '2023-06-05 03:16:34', '2023-06-05 03:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `indonesia_cities`
--

CREATE TABLE `indonesia_cities` (
  `id` bigint UNSIGNED NOT NULL,
  `code` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_code` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indonesia_districts`
--

CREATE TABLE `indonesia_districts` (
  `id` bigint UNSIGNED NOT NULL,
  `code` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_code` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indonesia_provinces`
--

CREATE TABLE `indonesia_provinces` (
  `id` bigint UNSIGNED NOT NULL,
  `code` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indonesia_provinces`
--

INSERT INTO `indonesia_provinces` (`id`, `code`, `name`, `meta`, `created_at`, `updated_at`) VALUES
(1, '11', 'Aceh', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(2, '12', 'Sumatera Utara', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(3, '13', 'Sumatera Barat', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(4, '14', 'Riau', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(5, '15', 'Jambi', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(6, '16', 'Sumatera Selatan', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(7, '17', 'Bengkulu', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(8, '18', 'Lampung', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(9, '19', 'Kepulauan Bangka Belitung', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(10, '21', 'Kepulauan Riau', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(11, '31', 'DKI Jakarta', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(12, '32', 'Jawa Barat', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(13, '33', 'Jawa Tengah', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(14, '34', 'DI Yogyakarta', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(15, '35', 'Jawa Timur', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(16, '36', 'Banten', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(17, '51', 'Bali', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(18, '52', 'Nusa Tenggara Barat', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(19, '53', 'Nusa Tenggara Timur', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(20, '61', 'Kalimantan Barat', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(21, '62', 'Kalimantan Tengah', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(22, '63', 'Kalimantan Selatan', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(23, '64', 'Kalimantan Timur', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(24, '65', 'Kalimantan Utara', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(25, '71', 'Sulawesi Utara', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(26, '72', 'Sulawesi Tengah', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(27, '73', 'Sulawesi Selatan', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(28, '74', 'Sulawesi Tenggara', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(29, '75', 'Gorontalo', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(30, '76', 'Sulawesi Barat', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(31, '81', 'Maluku', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(32, '82', 'Maluku Utara', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(33, '91', 'Papua', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11'),
(34, '92', 'Papua Barat', NULL, '2025-01-13 21:53:11', '2025-01-13 21:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `indonesia_villages`
--

CREATE TABLE `indonesia_villages` (
  `id` bigint UNSIGNED NOT NULL,
  `code` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_code` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kader`
--

CREATE TABLE `kader` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_lahir` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttl` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wa` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hobi` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sma` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thn_lulus` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesantren` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thn_kuliah` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fakultas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thn_mapaba` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penyelenggara_mapaba` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thn_pkd` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thn_pkl` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thn_pkn` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `informal` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penyelenggara_informal` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nonformal` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penyelenggara_nonformal` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2016_08_03_072729_create_provinces_table', 1),
(4, '2016_08_03_072750_create_cities_table', 1),
(5, '2016_08_03_072804_create_districts_table', 1),
(6, '2016_08_03_072819_create_villages_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2023_02_19_054536_create_kader_table', 1),
(10, '2023_02_25_134128_create_galeri_table', 1),
(11, '2023_02_26_134229_create_profile_table', 1),
(12, '2023_02_28_061757_create_home_table', 1),
(13, '2023_03_01_082528_create_perpus_table', 1),
(14, '2023_03_15_122250_create_role_table', 1),
(15, '2023_04_02_162405_create_posts_table', 1),
(16, '2023_04_02_163140_create_post_categories_table', 1),
(17, '2023_04_02_163351_create_post_tag_table', 1),
(18, '2023_04_02_163500_create_tags_table', 1),
(19, '2023_04_02_163605_add_active_to_posts_table', 1),
(20, '2023_04_15_092454_create_rayon_table', 1),
(21, '2023_04_22_154558_create_agendas_table', 1),
(22, '2023_04_23_132546_create_comments_table', 1),
(23, '2023_05_10_043209_create_penguruses_table', 1),
(24, '2023_05_10_043253_create_quotes_table', 1),
(25, '2023_05_16_083126_create_contacts_table', 1),
(26, '2023_05_17_192745_create_category_books_table', 1),
(27, '2023_05_21_072457_create_h_b_n_s_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('nabilaktb94@gmail.com', '$2y$10$5ekEI0rADIq8O0F9CuHQ/uEFPolGQCRzam/K0ROjEsqZmcjDeu0iy', '2025-01-12 07:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `penguruses`
--

CREATE TABLE `penguruses` (
  `id` bigint UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ig` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penguruses`
--

INSERT INTO `penguruses` (`id`, `img`, `name`, `username`, `jabatan`, `fb`, `ig`, `twt`, `created_at`, `updated_at`) VALUES
(1, 'pengurus_update_Nabila-1737481851.PNG', 'Nabila', 'rikiramdan', 'Ketua PC-IMM Lampung Utara', NULL, NULL, NULL, '2023-05-25 02:54:58', '2025-01-21 17:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `perpus`
--

CREATE TABLE `perpus` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thn_terbit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bahasa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `halaman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorybook_id` bigint UNSIGNED NOT NULL DEFAULT '1',
  `user_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perpus`
--

INSERT INTO `perpus` (`id`, `judul`, `slug`, `penulis`, `penerbit`, `thn_terbit`, `isbn`, `bahasa`, `halaman`, `deskripsi`, `categorybook_id`, `user_id`, `image`, `pdf`, `created_at`, `updated_at`) VALUES
(11, 'HTML5 Notes For Professionals', 'html5-notes-for-professionals', 'goalkicker.com', 'goalkicker.com', '2020', '-', 'english', '176', 'Membahas mengenai cara pembuatan website dengan html 5', 7, 1, 'perpus_-1685020274.png', 'perpus_-1685020274.pdf', '2023-05-25 06:11:14', '2023-05-25 06:11:14'),
(12, 'JavaScript Data Structures and Algorithms', 'javascript-data-structures-and-algorithms', 'Sammie Bae', '-', '-', '-', 'english', '351', 'JavaScript Data Structures and Algorithms', 1, 1, 'perpus_-1685020510.png', 'perpus_-1685020510.pdf', '2023-05-25 06:15:12', '2023-05-25 06:15:12'),
(13, 'Benturan NU - PKI', 'benturan-nu-pki', '-', '-', '2013', '-', 'Indonesia', '159', '-', 4, 1, 'perpus_Benturan NU - PKI-1685132485.jpg', 'perpus_Benturan NU - PKI-1685132485.pdf', '2023-05-26 13:21:25', '2023-05-26 13:21:25'),
(14, 'Analisis Sosial', 'analisis-sosial', '-', '-', '-', '-', 'Indonesia', '241', '-', 1, 1, 'perpus_Analisis Sosial-1685132884.jpg', 'perpus_Analisis Sosial-1685132884.pdf', '2023-05-26 13:28:04', '2023-05-26 13:28:04'),
(15, 'Filsafat Ilmu', 'filsafat-ilmu', '-', '-', '2013', '-', 'Indonesia', '95', '-', 2, 1, 'perpus_Filsafat Ilmu-1685133212.jpg', 'perpus_Filsafat Ilmu-1685133212.pdf', '2023-05-26 13:33:32', '2023-05-26 13:33:32'),
(16, 'Filsafat Islam', 'filsafat-islam', 'Abdallah Baehaqi :v', NULL, NULL, NULL, NULL, NULL, '!!إقرأ صحبة', 2, 9, 'perpus_-1685192467.jpg', 'perpus_-1685192467.pdf', '2023-05-27 06:01:07', '2023-05-27 06:01:07'),
(17, 'Desain Grafis', 'desain-grafis', '-', '-', '-', '-', '-', '100', '-', 7, 1, 'Desain Grafis_PMII_UNINUS-1689006705.JPG', 'Desain Grafis-PMII_UNINUS1689006705.pdf', '2023-07-10 16:31:50', '2023-07-10 16:31:50'),
(19, 'Distilasi Alkena', 'distilasi-alkena', 'Wira Nagara', '-', '2016', '-', 'indonesia', '173', 'Distilasi Alkena adalah sebuah proses memisahkan dua hati yang pada dasarnya tak bisa dipisahkan karena suatu ikatan perasaan. Walaupun dalam perjalanannya, hati akan tumbuh untuk bisa merelakan.', 3, 1, 'Distilasi Alkena_PMII_UNINUS-1689006977.JPG', 'Distilasi Alkena-PMII_UNINUS1689006977.pdf', '2023-07-10 16:36:17', '2023-07-10 16:36:17'),
(21, 'TEOLOGI ISLAM (DR. HARUN NASUTION)', 'teologi-islam-dr-harun-nasution', 'DR. HARUN NASUTION', '-', '-', '378-602-1602-08-7', 'indonesia', '24', 'lmu kalam yang mendasari segala pokok pemikiran yang ada di dunia Islam yang kemudian menjadi  produk pemikiran yang banyak mewarnai kemajuan zaman.', 4, 1, 'TEOLOGI ISLAM (DR. HARUN NASUTION)_PMII_UNINUS-1689007748.JPG', 'TEOLOGI ISLAM (DR. HARUN NASUTION)-PMII_UNINUS1689007748.pdf', '2023-07-10 16:49:08', '2023-07-10 16:49:08'),
(22, 'Hasil Muspimnas', 'hasil-muspimnas', 'PMII', 'PMII', '2022', '378-602-1892-08-7', 'indonesia', '400', 'Kegiatan Muspimnas PMII tahun 2022 sendiri direncanakan akan berlangsung di Tulungagung mulai tanggal 17 Nopember hingga 24 Nopember 2022', 1, 1, 'Hasil Muspimnas_PMII_UNINUS-1689008089.JPG', NULL, '2023-07-10 16:54:49', '2023-07-10 16:54:49'),
(23, 'Teori-Teori Hukum', 'teori-teori-hukum', 'Penulisnya ada di judul', '-', '-', '-', 'indonesia', '233', NULL, 4, 1, 'Teori-Teori Hukum_PMII_UNINUS-1689008650.JPG', 'Teori-Teori Hukum-PMII_UNINUS1689008650.pdf', '2023-07-10 17:04:11', '2023-07-10 17:04:11'),
(24, 'Seperti Dendam, Rindu Harus Dibayar Tuntas', 'seperti-dendam-rindu-harus-dibayar-tuntas', 'Eka Kurniawan', 'Eka Kurniawan', '-', '-', 'indonesia', '254', 'Eka Kurniawan', 3, 1, 'Seperti Dendam, Rindu Harus Dibayar Tuntas_PMII_UNINUS-1689008780.JPG', 'Seperti Dendam, Rindu Harus Dibayar Tuntas-PMII_UNINUS1689008780.pdf', '2023-07-10 17:06:22', '2023-07-10 17:06:22'),
(25, 'Sejarah Ideologi Dunia', 'sejarah-ideologi-dunia', 'Nur Sayyid Santoso Kristeva, S.Pd.I, M.A.', 'Nur Sayyid Santoso Kristeva, S.Pd.I, M.A.', 'ya nda tau kok tanya saya', 'ya nda tau kok tanya saya', 'indonesia', '46', 'Sejarah Ideologi Dunia Kapitalisme, Sosialisme, Komunisme, Fasisme, Anarkisme, Anarkisme dan Marxisme, Konservatisme by Nur Sayyid Santoso Kristeva, S.Pd.I, M.A.', 4, 1, 'Sejarah Ideologi Dunia_PMII_UNINUS-1689009015.JPG', 'Sejarah Ideologi Dunia-PMII_UNINUS1689009015.pdf', '2023-07-10 17:10:15', '2023-07-10 17:10:15'),
(26, 'Sejarah Tuhan', 'sejarah-tuhan', 'Karen Armstrong', 'Mizan Pustaka', '2014', 'ya nda tau kok tanya saya', 'indonesia', '280', 'Kisah 4.000 Tahun Pencarian Tuhan dalam Agama-Agama Manusia', 2, 1, 'Sejarah Tuhan_PMII_UNINUS-1689009285.JPG', 'Sejarah Tuhan-PMII_UNINUS1689009285.pdf', '2023-07-10 17:14:46', '2023-07-10 17:14:46'),
(27, 'Sebuah Seni untuk Bersikap Bodo Amat', 'sebuah-seni-untuk-bersikap-bodo-amat', 'by Mark Manson', 'nda tau juga', 'ya nda tau kok tanya saya', 'ya nda tau kok tanya saya', 'indonesia', '256', 'Sebuah Seni untuk Bersikap Bodo Amat adalah buku pertama karya Mark Manson, seorang narablog kenamaan dengan lebih dari 2 juta pembaca.', 4, 1, 'Sebuah Seni untuk Bersikap Bodo Amat_PMII_UNINUS-1689009522.JPG', 'Sebuah Seni untuk Bersikap Bodo Amat-PMII_UNINUS1689009522.pdf', '2023-07-10 17:18:45', '2023-07-10 17:18:45'),
(28, 'Retorika Aristoteles', 'retorika-aristoteles', 'ga tau', 'nda tau juga', 'ya nda tau kok tanya saya', 'ya nda tau kok tanya saya', 'indonesia', '120', 'Retorika Aristoteles adalah risalah Yunani kuno tentang seni persuasi, yang berasal dari abad ke-4 SM', 4, 1, 'Retorika Aristoteles_PMII_UNINUS-1689009733.jpg', 'Retorika Aristoteles-PMII_UNINUS1689009733.pdf', '2023-07-10 17:22:13', '2023-07-10 17:22:13'),
(29, 'Orang-orang Di Persimpangan Kiri Jalan', 'orang-orang-di-persimpangan-kiri-jalan', 'Soe Hok Gie', 'ya nda tau kok tanya saya', 'ya nda tau kok tanya saya', 'ya nda tau kok tanya saya', 'indonesia', '332', 'Orang-Orang Di Persimpangan Kiri Jalan salah satu karya Soe Hok Gie tentang pemberontakan PKI di Madiun ini dianyam demikian rupa seakan-akan kita membaca sebuah novel sejarah dramatis yang menegangkan', 4, 1, 'Orang-orang Di Persimpangan Kiri Jalan_PMII_UNINUS-1689010019.JPG', 'Orang-orang Di Persimpangan Kiri Jalan-PMII_UNINUS1689010019.pdf', '2023-07-10 17:27:05', '2023-07-10 17:27:05'),
(30, 'Perempuan Berbicara Kretek', 'perempuan-berbicara-kretek', 'ga tau', 'ya nda tau kok tanya saya', 'ya nda tau kok tanya saya', 'ya nda tau kok tanya saya', 'indonesia', '334', 'Secara umum buku ini dibagi dalam empat bagian. Pertama, Ritus. Keseharian, di sini mereka bercerita tentang kehadiran kretek dalam keseharian mereka', 6, 1, 'Perempuan Berbicara Kretek_PMII_UNINUS-1689010155.JPG', 'Perempuan Berbicara Kretek-PMII_UNINUS1689010155.pdf', '2023-07-10 17:29:18', '2023-07-10 17:29:18'),
(31, 'Nusa Jawa Silang Budaya', 'nusa-jawa-silang-budaya', 'ga tau', 'ya nda tau kok tanya saya', 'ya nda tau kok tanya saya', 'ya nda tau kok tanya saya', 'indonesia', '358', 'silang budaya kajian sejarah terpadu / Denys Lombard ; alih bahasa, Winarsih Partaningrat Arifin, Rahayu S. Hidayat, Nini Hidayati Yusuf.', 4, 1, 'Nusa Jawa Silang Budaya_PMII_UNINUS-1689010294.JPG', 'Nusa Jawa Silang Budaya-PMII_UNINUS1689010294.pdf', '2023-07-10 17:31:39', '2023-07-10 17:31:39'),
(32, 'My Public Speaking', 'my-public-speaking', 'Hilbram Dunar', 'ya nda tau kok tanya saya', 'ya nda tau kok tanya saya', 'ya nda tau kok tanya saya', 'indonesia', '192', 'ditulis berdasarkan pengalaman Hilbram Dunar selama dua belas tahun menjadi seorang public speaker. Bermula sebagai penyiar di MS Tri FM,', 4, 1, 'My Public Speaking_PMII_UNINUS-1689010388.JPG', 'My Public Speaking-PMII_UNINUS1689010388.pdf', '2023-07-10 17:33:09', '2023-07-10 17:33:09'),
(33, 'Aswaja', 'aswaja', '-', '-', '-', '-', 'Indonesia', '48', 'Buku panduan Aswaja PMII', 1, 1, 'Aswaja_PMII_UNINUS-1689010820.jpg', 'Aswaja-PMII_UNINUS1689010820.pdf', '2023-07-10 17:40:20', '2023-07-10 17:40:20'),
(34, 'Negeri Para Bedebah', 'negeri-para-bedebah', '-', '-', '-', '-', 'Indonesia', '444', NULL, 4, 1, 'Negeri Para Bedebah_PMII_UNINUS-1689010940.jpg', 'Negeri Para Bedebah-PMII_UNINUS1689010940.pdf', '2023-07-10 17:42:24', '2023-07-10 17:42:24'),
(35, 'MADILOG', 'madilog', 'Tan Malaka', '-', '-', '-', 'Indonesia', '388', NULL, 4, 1, 'MADILOG_PMII_UNINUS-1689011080.jpg', 'MADILOG-PMII_UNINUS1689011080.pdf', '2023-07-10 17:44:41', '2023-07-10 17:44:41'),
(36, 'Seni Perang Sun Tzu', 'seni-perang-sun-tzu', '-', '-', '-', '-', 'Indonesia', '122', NULL, 4, 1, 'Seni Perang Sun Tzu_PMII_UNINUS-1689011175.jpg', 'Seni Perang Sun Tzu-PMII_UNINUS1689011175.pdf', '2023-07-10 17:46:15', '2023-07-10 17:46:15'),
(37, 'Modul NDP', 'modul-ndp', '-', '-', '-', '-', 'Indonesia', '45', NULL, 1, 1, 'Modul NDP_PMII_UNINUS-1689011537.jpg', 'Modul NDP-PMII_UNINUS1689011537.pdf', '2023-07-10 17:52:17', '2023-07-10 17:52:17');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `views` int UNSIGNED NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `image`, `category_id`, `user_id`, `views`, `active`, `created_at`, `updated_at`) VALUES
(6, 'Kegiatan Terbaru PC IMM Lampung Utara: Dialog Publik dengan Bakal Calon Kepala Daerah', 'kegiatan-terbaru-pc-imm-lampung-utara-dialog-publik-dengan-bakal-calon-kepala-daerah', '<p>Pada 4 September 2024, PC IMM Lampung Utara sukses menggelar dialog publik bertema \"Seutuhnya Bumi Ragam Tunas Lampung\" di Universitas Muhammadiyah Kotabumi. Acara ini dihadiri oleh sekitar 700 peserta, termasuk mahasiswa, dosen, dan berbagai elemen masyarakat.</p><p><strong>Detail Kegiatan:</strong></p><ul><li><strong>Sesi 1:</strong> Dr. Ir. H. Hamartoni Ahadis, S.P., M.Si. (Bakal Calon Bupati Lampung Utara) dan Romli, S.Kom., M.H. (Bakal Calon Wakil Bupati Lampung Utara).</li><li><strong>Sesi 2:</strong> H. Ardian Saputra, S.H. (Bakal Calon Bupati Lampung Utara) dan H. Sofyan, S.P., M.H. (Bakal Calon Wakil Bupati Lampung Utara).</li></ul><p>Acara ini menjadi ajang penting bagi mahasiswa untuk bertukar gagasan dengan calon pemimpin daerah, serta menguji kesiapan mereka dalam menghadapi tantangan pembangunan daerah.</p>', 'blog_update_-1737481661.jpg', 1, 1, 4, 1, '2025-01-14 01:06:02', '2025-01-23 20:19:03'),
(7, 'PC IMM Lampung Utara: Pilar Penggerak Organisasi Mahasiswa di Universitas Muhammadiyah Kotabumi', 'pc-imm-lampung-utara-pilar-penggerak-organisasi-mahasiswa-di-universitas-muhammadiyah-kotabumi', '<p>PC IMM Lampung Utara telah menjadi pilar penting dalam pengembangan organisasi mahasiswa di Universitas Muhammadiyah Kotabumi. Sebagai cabang dari Ikatan Mahasiswa Muhammadiyah, PC IMM berperan aktif dalam berbagai kegiatan yang mendukung pengembangan karakter dan kepemimpinan mahasiswa.</p><p><strong>Peran Utama PC IMM:</strong></p><ul><li><strong>Pendidikan Karakter:</strong> Menyelenggarakan program pendidikan yang fokus pada pembentukan karakter dan kepemimpinan mahasiswa.</li><li><strong>Kegiatan Sosial:</strong> Mengorganisir kegiatan sosial yang melibatkan mahasiswa dalam pengabdian kepada masyarakat.</li><li><strong>Dialog Publik:</strong> Memfasilitasi diskusi dan dialog antara mahasiswa dengan berbagai elemen masyarakat, termasuk pemerintah dan organisasi lain.</li></ul><p>Melalui peran-peran tersebut, PC IMM Lampung Utara berkontribusi signifikan dalam mencetak generasi muda yang berintegritas dan siap menghadapi tantangan global.</p>', 'blog_update_-1737481636.jpg', 1, 1, 0, 1, '2025-01-14 01:18:54', '2025-01-21 17:47:16'),
(8, 'Madrasah IMMawati: Penguatan Peran Perempuan dalam Organisasi Mahasiswa', 'madrasah-immawati-penguatan-peran-perempuan-dalam-organisasi-mahasiswa', '<p>PC IMM Lampung Utara melalui Bidang IMMawati telah menyelenggarakan Madrasah IMMawati sebagai upaya penguatan peran perempuan dalam organisasi. Kegiatan ini bertujuan untuk meningkatkan kapasitas dan kualitas kader perempuan IMM dalam berbagai aspek.</p><p><strong>Tujuan Madrasah IMMawati:</strong></p><ul><li><strong>Peningkatan Kapasitas:</strong> Memberikan pelatihan dan pendidikan untuk meningkatkan kemampuan kader perempuan.</li><li><strong>Pemberdayaan:</strong> Mendorong partisipasi aktif perempuan dalam berbagai kegiatan organisasi.</li><li><strong>Pengembangan Kepemimpinan:</strong> Membekali kader perempuan dengan keterampilan kepemimpinan yang efektif.</li></ul><p>Melalui program ini, diharapkan dapat tercipta pemimpin perempuan yang tangguh dan berdaya saing.</p>', 'blog_update_-1737481597.jpg', 1, 1, 1, 1, '2025-01-14 01:30:32', '2025-01-21 17:46:37'),
(9, 'Pelantikan Pengurus PC IMM Lampung Utara: Langkah Baru Menuju Organisasi yang Lebih Baik', 'pelantikan-pengurus-pc-imm-lampung-utara-langkah-baru-menuju-organisasi-yang-lebih-baik', '<p>Pelantikan pengurus PC IMM Lampung Utara menjadi momentum penting dalam perjalanan organisasi. Dengan kepengurusan yang baru, diharapkan dapat membawa perubahan positif dan inovasi dalam setiap program kerja.</p><p><strong>Harapan dari Pelantikan:</strong></p><ul><li><strong>Inovasi Program:</strong> Menciptakan program kerja yang relevan dan bermanfaat bagi mahasiswa.</li><li><strong>Peningkatan Kualitas:</strong> Meningkatkan kualitas sumber daya manusia dalam organisasi.</li><li><strong>Kolaborasi:</strong> Membangun kerjasama yang lebih baik dengan berbagai pihak, termasuk organisasi lain dan pemerintah.</li></ul><p>Pelantikan ini diharapkan menjadi titik awal bagi PC IMM Lampung Utara untuk terus berkontribusi dalam pengembangan pendidikan dan kepemimpinan di lingkungan Universitas Muhammadiyah Kotabumi.</p>', 'blog_update_-1737481492.jpg', 1, 1, 2, 1, '2025-01-14 01:31:42', '2025-01-21 17:45:02'),
(10, 'Testing Judul oleh Kader PC-IMM Lampura', 'testing-judul-oleh-kader-pc-imm-lampura', '<p>Ini adalah contoh artikel blog yang saya posting sebagai contoh yaaa</p><p>hjhj</p><p>&nbsp;</p><p>jjkj</p><p>&nbsp;</p><p>hjioiuo</p>', 'blog_update_-1737481699.jpg', 3, 7, 2, 1, '2025-01-21 13:02:00', '2025-01-22 07:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` bigint UNSIGNED NOT NULL,
  `post_id` int UNSIGNED NOT NULL,
  `tag_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(11, 6, 1, NULL, NULL),
(12, 6, 2, NULL, NULL),
(13, 7, 1, NULL, NULL),
(14, 7, 4, NULL, NULL),
(15, 8, 1, NULL, NULL),
(16, 9, 1, NULL, NULL),
(18, 10, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` bigint UNSIGNED NOT NULL,
  `woo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` bigint UNSIGNED NOT NULL,
  `img` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `who` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quote` varchar(175) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `img`, `name`, `who`, `quote`, `created_at`, `updated_at`) VALUES
(1, 'quotes_update_Soe Hok Gie-1684701036.jpg', 'Soe Hok Gie', 'Aktivis Orde Lama', 'Hidup adalah keberanian menghadapi tanda tanya.', '2023-05-25 02:55:00', '2023-05-25 02:55:00'),
(2, 'quotes_update_Khalil Gibran-1684701466.jpeg', 'Khalil Gibran', 'Seniman, Penyair, Penulis', 'Apa saja yang membakar dan membuat orang lain terbakar adalah berguna.,\n', '2023-05-25 02:55:00', '2023-05-25 02:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `rayon`
--

CREATE TABLE `rayon` (
  `id` bigint UNSIGNED NOT NULL,
  `rayon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rayon`
--

INSERT INTO `rayon` (`id`, `rayon`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Fakultas Teknik & Ilmu Komputer', 'fakultas-teknik-ilmu-komputer', '2025-05-14 17:00:00', '2025-01-13 22:25:28'),
(2, 'Fakultas Keguruan & Ilmu Pendidikan', 'fakultas-keguruan-ilmu-pendidikan', '2023-05-25 02:55:02', '2025-01-13 22:25:43'),
(3, 'Fakultas Hukum & Ilmu Sosial', 'fakultas-hukum-ilmu-sosial', '2023-05-25 02:55:02', '2025-01-13 22:26:02'),
(4, 'Fakultas Pertanian & Peternakan', 'fakultas-pertanian-peternakan', '2023-05-25 02:55:02', '2025-01-13 22:26:16'),
(5, 'Pascasarjana', 'pascasarjana', '2025-01-13 22:26:27', '2025-01-13 22:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint UNSIGNED NOT NULL,
  `role` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'guest',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2023-05-25 02:54:57', '2023-05-25 02:54:57'),
(2, 'Ketua', '2023-05-25 02:54:57', '2023-05-25 02:54:57'),
(3, 'Anggota', '2023-05-25 02:54:57', '2023-05-25 02:54:57'),
(4, 'guest', '2023-05-25 02:54:57', '2023-05-25 02:54:57'),
(5, 'unverification', '2023-05-25 02:54:57', '2023-05-25 02:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'PC-IMM', 'pmii', '2023-05-25 02:55:01', '2025-01-12 09:31:48'),
(2, 'Lampung Utara', 'pmiiuninus', '2023-05-25 02:55:01', '2025-01-12 09:31:38'),
(4, 'Breaking News', 'pmiibandung', '2023-05-25 02:55:02', '2025-01-12 09:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `province_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelurahan_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesantren` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttl` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hobi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sma` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thn_lulus` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thn_kuliah` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ig` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint UNSIGNED NOT NULL DEFAULT '4',
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tangan terkepan dan maju kemuka!!!',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `centang` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `rayon_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kaderisasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Mapaba',
  `thn_mapaba` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thn_pkd` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thn_pkl` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thn_pkn` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `informal` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nonformal` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `kelamin`, `nim`, `img`, `province_id`, `city_id`, `kecamatan_id`, `kelurahan_id`, `alamat`, `pesantren`, `t_lahir`, `ttl`, `hobi`, `sma`, `thn_lulus`, `thn_kuliah`, `wa`, `twitter`, `fb`, `ig`, `role_id`, `bio`, `username`, `slug`, `email`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `centang`, `rayon_id`, `prodi`, `kaderisasi`, `thn_mapaba`, `thn_pkd`, `thn_pkl`, `thn_pkn`, `informal`, `nonformal`) VALUES
(1, 'Irfan Saputra', 'L', '12345678', 'profile_super-admin-1737486053.PNG', NULL, NULL, NULL, NULL, 'Kotabumi Lampung Utara', '-', 'Kotabumi', '2023-08-25', 'Membaca', 'SMA Kotabumi', '2020', '2020', '089673837363', '-', '-', '-', 1, 'Ini adalah moto saya...', 'super-admin', 'super-admin', 'superadmin@gmail.com', '$2a$12$lfP1nqwoZC0skzUVhIEifONw7k0mvgILIrZC7YwBJ8aycvwdnfNv2', NULL, NULL, '2023-08-25 03:46:35', '2025-01-21 19:00:53', '0', '1', 'S1 - Sistem dan Teknologi Informasi', 'DAM', 'DAD 2020', 'DAM 2021', '-', '-', '2', '4'),
(7, 'Nabila', 'P', '123456', 'user.png', NULL, NULL, NULL, NULL, 'Kotabumi Lampung Utara', '-', 'Kotabumi', '2025-01-15', NULL, 'SMA Kotabumi', '2020', '2020', '089765665533', NULL, NULL, NULL, 3, 'tangan terkepan dan maju kemuka!!!', 'nabila', 'nabila', 'nabila@gmail.com', '$2y$10$wcA.r5juJ3tMkEH2ABucJO80dHytlkDkmzPWti408e.K4zHWeaklu', NULL, NULL, '2025-01-13 22:44:39', '2025-01-21 12:58:50', '0', '3', 'S1 - Ilmu Komunikasi', 'DAD', 'DAD 2020', NULL, NULL, NULL, '0', '1'),
(8, 'Muhammad Alfarizi', 'L', '88888888', 'user.png', NULL, NULL, NULL, NULL, 'Jl. Cermai Sribasuki', '-', 'Kotabumi', '2025-01-09', NULL, 'SMA Apa ya', '2020', '2020', '0896476665444', NULL, NULL, NULL, 3, 'tangan terkepan dan maju kemuka!!!', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-14 20:43:18', '2025-01-14 20:43:39', '0', '1', 'S1 - Sistem dan Teknologi Informasi', 'DAM', NULL, 'DAM 2021', NULL, NULL, '1', '1'),
(9, 'Trio Sanjaya', 'L', '20072922', 'user.png', NULL, NULL, NULL, NULL, 'Tulang Bawang Barat', '-', 'Tulang Bawang Barat', '2025-01-15', NULL, 'SMA Tulang Bawang', '2020', '2020', '089623564567', NULL, NULL, NULL, 3, 'tangan terkepan dan maju kemuka!!!', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-15 14:01:14', '2025-01-15 14:01:14', '0', '1', 'S1 - Sistem dan Teknologi Informasi', 'DAD', 'DAD 2020', NULL, NULL, NULL, '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendas`
--
ALTER TABLE `agendas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `category_books`
--
ALTER TABLE `category_books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_books_slug_unique` (`slug`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `h_b_n_s`
--
ALTER TABLE `h_b_n_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indonesia_cities`
--
ALTER TABLE `indonesia_cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `indonesia_cities_code_unique` (`code`),
  ADD KEY `indonesia_cities_province_code_foreign` (`province_code`);

--
-- Indexes for table `indonesia_districts`
--
ALTER TABLE `indonesia_districts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `indonesia_districts_code_unique` (`code`),
  ADD KEY `indonesia_districts_city_code_foreign` (`city_code`);

--
-- Indexes for table `indonesia_provinces`
--
ALTER TABLE `indonesia_provinces`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `indonesia_provinces_code_unique` (`code`);

--
-- Indexes for table `indonesia_villages`
--
ALTER TABLE `indonesia_villages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `indonesia_villages_code_unique` (`code`),
  ADD KEY `indonesia_villages_district_code_foreign` (`district_code`);

--
-- Indexes for table `kader`
--
ALTER TABLE `kader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penguruses`
--
ALTER TABLE `penguruses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perpus`
--
ALTER TABLE `perpus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_title_index` (`title`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rayon`
--
ALTER TABLE `rayon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rayon_rayon_unique` (`rayon`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nim_unique` (`nim`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendas`
--
ALTER TABLE `agendas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category_books`
--
ALTER TABLE `category_books`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `h_b_n_s`
--
ALTER TABLE `h_b_n_s`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `indonesia_cities`
--
ALTER TABLE `indonesia_cities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `indonesia_districts`
--
ALTER TABLE `indonesia_districts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `indonesia_provinces`
--
ALTER TABLE `indonesia_provinces`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `indonesia_villages`
--
ALTER TABLE `indonesia_villages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kader`
--
ALTER TABLE `kader`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `penguruses`
--
ALTER TABLE `penguruses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `perpus`
--
ALTER TABLE `perpus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rayon`
--
ALTER TABLE `rayon`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `indonesia_cities`
--
ALTER TABLE `indonesia_cities`
  ADD CONSTRAINT `indonesia_cities_province_code_foreign` FOREIGN KEY (`province_code`) REFERENCES `indonesia_provinces` (`code`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `indonesia_districts`
--
ALTER TABLE `indonesia_districts`
  ADD CONSTRAINT `indonesia_districts_city_code_foreign` FOREIGN KEY (`city_code`) REFERENCES `indonesia_cities` (`code`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `indonesia_villages`
--
ALTER TABLE `indonesia_villages`
  ADD CONSTRAINT `indonesia_villages_district_code_foreign` FOREIGN KEY (`district_code`) REFERENCES `indonesia_districts` (`code`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
