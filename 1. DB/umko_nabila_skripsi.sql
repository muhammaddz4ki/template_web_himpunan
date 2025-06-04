-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2025 at 07:57 AM
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
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyelenggara` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_peserta` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_capaian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `evaluasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `pamflet` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Berita', 'berita', '2023-05-25 02:55:00', '2023-05-27 06:10:17'),
(3, 'PC-IMM', 'pcimm', '2023-05-25 02:55:01', '2025-01-12 09:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` bigint UNSIGNED NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `judul` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
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
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penguruses`
--

CREATE TABLE `penguruses` (
  `id` bigint UNSIGNED NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ig` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
(7, 'PC IMM Lampung Utara: Pilar Penggerak Organisasi Mahasiswa di Universitas Muhammadiyah Kotabumi', 'pc-imm-lampung-utara-pilar-penggerak-organisasi-mahasiswa-di-universitas-muhammadiyah-kotabumi', '<p>PC IMM Lampung Utara telah menjadi pilar penting dalam pengembangan organisasi mahasiswa di Universitas Muhammadiyah Kotabumi. Sebagai cabang dari Ikatan Mahasiswa Muhammadiyah, PC IMM berperan aktif dalam berbagai kegiatan yang mendukung pengembangan karakter dan kepemimpinan mahasiswa.</p><p><strong>Peran Utama PC IMM:</strong></p><ul><li><strong>Pendidikan Karakter:</strong> Menyelenggarakan program pendidikan yang fokus pada pembentukan karakter dan kepemimpinan mahasiswa.</li><li><strong>Kegiatan Sosial:</strong> Mengorganisir kegiatan sosial yang melibatkan mahasiswa dalam pengabdian kepada masyarakat.</li><li><strong>Dialog Publik:</strong> Memfasilitasi diskusi dan dialog antara mahasiswa dengan berbagai elemen masyarakat, termasuk pemerintah dan organisasi lain.</li></ul><p>Melalui peran-peran tersebut, PC IMM Lampung Utara berkontribusi signifikan dalam mencetak generasi muda yang berintegritas dan siap menghadapi tantangan global.</p>', 'blog_update_-1737481636.jpg', 1, 1, 1, 1, '2025-01-14 01:18:54', '2025-01-23 22:51:06'),
(8, 'Madrasah IMMawati: Penguatan Peran Perempuan dalam Organisasi Mahasiswa', 'madrasah-immawati-penguatan-peran-perempuan-dalam-organisasi-mahasiswa', '<p>PC IMM Lampung Utara melalui Bidang IMMawati telah menyelenggarakan Madrasah IMMawati sebagai upaya penguatan peran perempuan dalam organisasi. Kegiatan ini bertujuan untuk meningkatkan kapasitas dan kualitas kader perempuan IMM dalam berbagai aspek.</p><p><strong>Tujuan Madrasah IMMawati:</strong></p><ul><li><strong>Peningkatan Kapasitas:</strong> Memberikan pelatihan dan pendidikan untuk meningkatkan kemampuan kader perempuan.</li><li><strong>Pemberdayaan:</strong> Mendorong partisipasi aktif perempuan dalam berbagai kegiatan organisasi.</li><li><strong>Pengembangan Kepemimpinan:</strong> Membekali kader perempuan dengan keterampilan kepemimpinan yang efektif.</li></ul><p>Melalui program ini, diharapkan dapat tercipta pemimpin perempuan yang tangguh dan berdaya saing.</p>', 'blog_update_-1737481597.jpg', 1, 1, 1, 1, '2025-01-14 01:30:32', '2025-01-21 17:46:37'),
(9, 'Pelantikan Pengurus PC IMM Lampung Utara: Langkah Baru Menuju Organisasi yang Lebih Baik', 'pelantikan-pengurus-pc-imm-lampung-utara-langkah-baru-menuju-organisasi-yang-lebih-baik', '<p>Pelantikan pengurus PC IMM Lampung Utara menjadi momentum penting dalam perjalanan organisasi. Dengan kepengurusan yang baru, diharapkan dapat membawa perubahan positif dan inovasi dalam setiap program kerja.</p><p><strong>Harapan dari Pelantikan:</strong></p><ul><li><strong>Inovasi Program:</strong> Menciptakan program kerja yang relevan dan bermanfaat bagi mahasiswa.</li><li><strong>Peningkatan Kualitas:</strong> Meningkatkan kualitas sumber daya manusia dalam organisasi.</li><li><strong>Kolaborasi:</strong> Membangun kerjasama yang lebih baik dengan berbagai pihak, termasuk organisasi lain dan pemerintah.</li></ul><p>Pelantikan ini diharapkan menjadi titik awal bagi PC IMM Lampung Utara untuk terus berkontribusi dalam pengembangan pendidikan dan kepemimpinan di lingkungan Universitas Muhammadiyah Kotabumi.</p>', 'blog_update_-1737481492.jpg', 1, 1, 2, 0, '2025-01-14 01:31:42', '2025-01-23 22:58:13');

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
(16, 9, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rayon`
--

CREATE TABLE `rayon` (
  `id` bigint UNSIGNED NOT NULL,
  `rayon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `role` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'guest',
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
(4, 'Bendahara', '2023-05-25 02:54:57', '2023-05-25 02:54:57'),
(5, 'Sekretaris', '2023-05-25 02:54:57', '2023-05-25 02:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesantren` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttl` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hobi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sma` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thn_lulus` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thn_kuliah` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ig` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint UNSIGNED NOT NULL DEFAULT '4',
  `bio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tangan terkepan dan maju kemuka!!!',
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `centang` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `rayon_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kaderisasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Mapaba',
  `thn_mapaba` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thn_pkd` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thn_pkl` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thn_pkn` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `informal` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nonformal` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `kelamin`, `nim`, `img`, `alamat`, `pesantren`, `t_lahir`, `ttl`, `hobi`, `sma`, `thn_lulus`, `thn_kuliah`, `wa`, `twitter`, `fb`, `ig`, `role_id`, `bio`, `username`, `slug`, `email`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `centang`, `rayon_id`, `prodi`, `kaderisasi`, `thn_mapaba`, `thn_pkd`, `thn_pkl`, `thn_pkn`, `informal`, `nonformal`) VALUES
(1, 'Irjun Saputra', 'L', '12345678', 'profile_super-admin-1737668951.PNG', 'Kotabumi Lampung Utara', '-', 'Kotabumi', '2023-08-25', 'Membaca', 'SMA Kotabumi', '2020', '2020', '089673837363', '-', '-', '-', 1, 'Ini adalah moto saya...', 'super-admin', 'super-admin', 'superadmin@gmail.com', '$2a$12$lfP1nqwoZC0skzUVhIEifONw7k0mvgILIrZC7YwBJ8aycvwdnfNv2', NULL, NULL, '2023-08-25 03:46:35', '2025-01-23 21:49:11', '0', '1', 'S1 - Sistem dan Teknologi Informasi', 'DAM', 'DAD 2020', 'DAM 2021', '-', '-', '2', '4'),
(7, 'Nabila', 'P', '123456', 'user.png', 'Kotabumi Lampung Utara', '-', 'Kotabumi', '2025-01-15', NULL, 'SMA Kotabumi', '2020', '2020', '089765665533', NULL, NULL, NULL, 3, 'tangan terkepan dan maju kemuka!!!', 'nabila', 'nabila', 'nabila@gmail.com', '$2y$10$wcA.r5juJ3tMkEH2ABucJO80dHytlkDkmzPWti408e.K4zHWeaklu', NULL, NULL, '2025-01-13 22:44:39', '2025-01-21 12:58:50', '0', '3', 'S1 - Ilmu Komunikasi', 'DAD', 'DAD 2020', NULL, NULL, NULL, '0', '1'),
(8, 'Muhammad Alfarizi', 'L', '88888888', 'user.png', 'Jl. Cermai Sribasuki', '-', 'Kotabumi', '2025-01-09', NULL, 'SMA Apa ya', '2020', '2020', '0896476665444', NULL, NULL, NULL, 3, 'tangan terkepan dan maju kemuka!!!', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-14 20:43:18', '2025-01-14 20:43:39', '0', '1', 'S1 - Sistem dan Teknologi Informasi', 'DAM', NULL, 'DAM 2021', NULL, NULL, '1', '1'),
(9, 'Trio Sanjaya', 'L', '20072922', 'user.png', 'Tulang Bawang Barat', '-', 'Tulang Bawang Barat', '2025-01-15', NULL, 'SMA Tulang Bawang', '2020', '2020', '089623564567', NULL, NULL, NULL, 3, 'tangan terkepan dan maju kemuka!!!', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-15 14:01:14', '2025-01-15 14:01:14', '0', '1', 'S1 - Sistem dan Teknologi Informasi', 'DAD', 'DAD 2020', NULL, NULL, NULL, '1', '1'),
(11, 'Khoirul Husen', NULL, '2007102132', 'user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'tangan terkepan dan maju kemuka!!!', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-04 06:02:09', '2025-02-04 06:02:09', '0', '3', 'S1 - Sistem dan Teknologi Informasi', 'Belum DAD', NULL, NULL, NULL, NULL, NULL, NULL);

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
