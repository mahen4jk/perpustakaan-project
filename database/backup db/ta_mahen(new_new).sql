-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jun 2023 pada 22.01
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_mahen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2023_03_07_142409_create_tb_peminjaman_table', 1),
(12, '2014_10_12_000000_create_users_table', 2),
(13, '2019_08_19_000000_create_failed_jobs_table', 2),
(14, '2023_02_28_142358_create_tb_penerbit_table', 2),
(15, '2023_02_28_142824_create_tb_kategori_table', 2),
(16, '2023_02_28_142942_create_tb_ddc_table', 2),
(17, '2023_03_01_152742_create_tb_kelas_table', 2),
(18, '2023_03_01_154247_create_tb_denda_table', 2),
(19, '2023_03_01_155456_create_tb_buku_table', 2),
(20, '2023_03_01_161043_create_tb_anggota_table', 2),
(21, '2023_03_07_142508_create_tb_peminjaman_table', 2),
(22, '2023_03_16_130722_create_tb_pengembalian_table', 3),
(23, '2023_05_15_210739_add_status_to_tb_pengembalian', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(10) UNSIGNED NOT NULL,
  `nis` char(25) NOT NULL,
  `nama_anggota` varchar(150) NOT NULL,
  `j_kelamin` enum('L','P') NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `alamat` longtext NOT NULL,
  `hp` char(25) NOT NULL,
  `status` enum('Aktif','Tdk_Aktif') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nis`, `nama_anggota`, `j_kelamin`, `kelas_id`, `alamat`, `hp`, `status`, `created_at`, `updated_at`) VALUES
(1, '3065', 'Mahendra Bagaskara', 'L', 18, 'Wisma Tropodo', '82131962354', 'Tdk_Aktif', '2023-03-14 07:40:25', '2023-03-16 05:40:07'),
(2, '3580', 'Yu Narukami', 'L', 10, 'Tokyo', '8102312942', 'Aktif', '2023-03-14 07:40:25', '2023-03-16 05:40:20'),
(3, '2822', 'Chie Satonaka', 'P', 10, 'Inaba', '82142123521', 'Aktif', '2023-03-14 07:40:25', '2023-03-16 05:41:02'),
(4, '1367', 'Yukiko Amagi', 'P', 10, 'Inaba', '8213192314', 'Aktif', '2023-03-14 07:40:25', '2023-03-27 05:50:56'),
(5, '3251', 'Yosuke Hanamura', 'L', 10, 'Tokyo', '8121231304', 'Aktif', '2023-03-14 07:40:25', '2023-03-27 05:51:07'),
(6, '1477', 'Kanji Tatsumi', 'L', 2, 'Inaba', '8213523421', 'Aktif', '2023-03-14 07:40:25', '2023-03-27 05:50:28'),
(7, '2709', 'Naoto Shirogane', 'P', 1, 'Inaba', '821392310', 'Aktif', '2023-03-14 07:40:25', '2023-03-27 05:50:40'),
(8, '2389', 'Teddy', 'L', 11, 'Television', '82131962412', 'Aktif', '2023-03-14 07:40:25', NULL),
(9, '2389', 'Rise Kujikawa', 'P', 2, 'Inaba', '932120321', 'Aktif', '2023-03-14 07:40:25', '2023-03-14 08:22:41'),
(10, '412314', 'Chavia Zagita', 'P', 23, 'Delta Sari', '8213123942', 'Tdk_Aktif', '2023-03-14 07:51:58', '2023-03-16 05:40:34'),
(11, '52131', 'Testing 123', 'L', 6, 'faaad', '083213142', 'Aktif', '2023-03-14 08:00:16', '2023-03-14 08:00:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` char(20) NOT NULL,
  `judul` char(200) NOT NULL,
  `isbn` char(25) NOT NULL,
  `pengarang` char(225) NOT NULL,
  `penerbit_id` int(10) UNSIGNED NOT NULL,
  `class_id` char(25) NOT NULL,
  `kategori_id` int(10) UNSIGNED NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `stok_buku` int(11) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul`, `isbn`, `pengarang`, `penerbit_id`, `class_id`, `kategori_id`, `tahun_terbit`, `stok_buku`, `deskripsi`, `created_at`, `updated_at`) VALUES
('000001', 'Bulan yang Berbahaya', '452131', 'Polares', 1, '000', 7, 2021, 18, 'Sebuah cerita dimana desa mengalami susahnya hidup mereka, di Malam yang begitu kejam', '2023-03-29 05:25:08', '2023-05-31 15:47:44'),
('000002', 'Bagaimana cara menggoda pria tampan', '2314921', 'Solear', 3, '000', 7, 2021, 12, '-', '2023-04-05 15:56:38', '2023-05-31 15:53:13'),
('000003', 'Yuk Menjadi Ahli Dalam Menjahit dan Merajut', '23129523', 'Selena', 5, '000', 9, 2015, 15, 'Buku ini, akan mengajarkan kamu bagaimana cara menjahit dan merajut pakaian dengan benar. Dan Tips dan Trick untuk menjadi mahir dalam membuat pakaian, benda, ataupun hewan - hewan lucu.', '2023-05-08 09:18:58', '2023-05-31 16:01:09'),
('000004', 'Cara Memasak Yang Benar dan Rasa Juga Pas', '1241425', 'Arnold Poernomo', 12, '000', 9, 2020, 19, 'Buku ini akan mengajarkan kita semua gimana sih memasak yang benar, dan juga memilih bahan makanan yang benar', '2023-05-08 09:49:10', '2023-05-31 16:03:49'),
('000005', 'Tetaplah Kuat Meskipun Berat', '9786025964343', 'Zee Zee Aurora', 5, '000', 12, 2022, 10, '-', '2023-05-31 03:17:25', '2023-05-31 15:16:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ddc`
--

CREATE TABLE `tb_ddc` (
  `id_class` char(25) NOT NULL,
  `ket` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_ddc`
--

INSERT INTO `tb_ddc` (`id_class`, `ket`, `created_at`, `updated_at`) VALUES
('000', 'Karya Umum', '2023-03-14 08:09:52', '2023-03-14 08:10:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_denda`
--

CREATE TABLE `tb_denda` (
  `id_denda` int(10) UNSIGNED NOT NULL,
  `nominal_denda` int(11) NOT NULL,
  `status` enum('A','N') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_denda`
--

INSERT INTO `tb_denda` (`id_denda`, `nominal_denda`, `status`, `created_at`, `updated_at`) VALUES
(1, 500, 'A', '2023-03-14 07:44:02', '2023-05-11 15:19:34'),
(2, 1000, 'N', '2023-05-03 06:23:40', '2023-05-11 15:19:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `kode_kategori` char(10) DEFAULT NULL,
  `kategori` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kode_kategori`, `kategori`, `created_at`, `updated_at`) VALUES
(7, 'F', 'Fiksi', '2023-03-28 15:26:48', '2023-03-28 15:36:31'),
(8, 'NF', 'Non-Fiksi', '2023-03-28 15:26:56', '2023-03-28 15:36:37'),
(9, 'R', 'Referensi', '2023-03-28 15:27:45', '2023-03-28 15:36:18'),
(10, 'AV', 'Audio Visual', '2023-03-28 15:27:54', '2023-03-28 15:34:58'),
(11, NULL, 'Kartografis', '2023-03-28 15:28:24', '2023-03-28 15:28:24'),
(12, 'M', 'Majalah', '2023-03-28 15:28:33', '2023-03-28 15:31:45'),
(13, 'B', 'Buletin', '2023-03-28 15:28:47', '2023-03-28 15:31:55'),
(14, 'K', 'Surat Kabar', '2023-03-28 15:28:55', '2023-03-28 15:34:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`, `created_at`, `updated_at`) VALUES
(1, 'Kelas-7.1', '2023-03-14 06:19:47', NULL),
(2, 'Kelas-7.2', '2023-03-14 06:19:47', NULL),
(3, 'Kelas-7.3', '2023-03-14 06:19:47', NULL),
(4, 'Kelas-7.4', '2023-03-14 06:19:47', NULL),
(5, 'Kelas-7.5', '2023-03-14 06:19:47', NULL),
(6, 'Kelas-7.6', '2023-03-14 06:19:47', NULL),
(7, 'Kelas-7.7', '2023-03-14 06:19:47', NULL),
(8, 'Kelas-7.8', '2023-03-14 06:19:47', NULL),
(9, 'Kelas-8.1', '2023-03-14 06:19:47', NULL),
(10, 'Kelas-8.2', '2023-03-14 06:19:47', NULL),
(11, 'Kelas-8.3', '2023-03-14 06:19:47', NULL),
(12, 'Kelas-8.4', '2023-03-14 06:19:47', NULL),
(13, 'Kelas-8.5', '2023-03-14 06:19:47', NULL),
(14, 'Kelas-8.6', '2023-03-14 06:19:47', NULL),
(15, 'Kelas-8.7', '2023-03-14 06:19:47', NULL),
(16, 'Kelas-8.8', '2023-03-14 06:19:47', NULL),
(17, 'Kelas-9.1', '2023-03-14 06:19:47', NULL),
(18, 'Kelas-9.2', '2023-03-14 06:19:47', NULL),
(19, 'Kelas-9.3', '2023-03-14 06:19:47', NULL),
(20, 'Kelas-9.4', '2023-03-14 06:19:47', NULL),
(21, 'Kelas-9.5', '2023-03-14 06:19:47', NULL),
(22, 'Kelas-9.6', '2023-03-14 06:19:47', NULL),
(23, 'Kelas-9.7', '2023-03-14 06:19:47', NULL),
(24, 'Kelas-9.8', '2023-03-14 06:19:47', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `kode_pinjam` char(50) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `anggota_id` int(10) UNSIGNED NOT NULL,
  `buku_id` char(20) NOT NULL,
  `status` char(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`kode_pinjam`, `tgl_pinjam`, `tgl_kembali`, `anggota_id`, `buku_id`, `status`, `created_at`, `updated_at`) VALUES
('OUT-31-05-2023-000001', '2023-05-31', '2023-06-03', 6, '000005', 'Kembali', '2023-05-31 03:41:52', '2023-05-31 03:42:57'),
('OUT-31-05-2023-000002', '2023-05-31', '2023-06-03', 4, '000001', 'Kembali', '2023-05-31 03:42:10', '2023-05-31 03:42:39'),
('OUT-31-05-2023-000003', '2023-05-31', '2023-06-03', 4, '000005', 'Kembali', '2023-05-31 03:46:02', '2023-05-31 03:46:20'),
('OUT-31-05-2023-000004', '2023-05-31', '2023-06-03', 2, '000003', 'Kembali', '2023-05-31 14:48:16', '2023-05-31 14:49:30'),
('OUT-31-05-2023-000005', '2023-05-31', '2023-06-03', 6, '000003', 'Kembali', '2023-05-31 14:50:40', '2023-05-31 14:57:05'),
('OUT-31-05-2023-000006', '2023-05-31', '2023-06-03', 5, '000002', 'Kembali', '2023-05-31 14:50:54', '2023-05-31 14:53:40'),
('OUT-31-05-2023-000007', '2023-05-31', '2023-06-03', 8, '000005', 'Kembali', '2023-05-31 15:12:37', '2023-05-31 15:13:11'),
('OUT-31-05-2023-000008', '2023-05-31', '2023-06-03', 9, '000002', 'Kembali', '2023-05-31 15:14:42', '2023-05-31 15:16:00'),
('OUT-31-05-2023-000009', '2023-05-31', '2023-06-03', 7, '000005', 'Kembali', '2023-05-31 15:15:44', '2023-05-31 15:16:42'),
('OUT-31-05-2023-000010', '2023-05-31', '2023-06-03', 7, '000002', 'Kembali', '2023-05-31 15:26:09', '2023-05-31 15:30:40'),
('OUT-31-05-2023-000011', '2023-05-31', '2023-06-03', 6, '000001', 'Kembali', '2023-05-31 15:26:29', '2023-05-31 15:26:54'),
('OUT-31-05-2023-000012', '2023-05-31', '2023-06-03', 4, '000002', 'Kembali', '2023-05-31 15:38:55', '2023-05-31 15:43:05'),
('OUT-31-05-2023-000013', '2023-05-31', '2023-06-03', 7, '000004', 'Kembali', '2023-05-31 15:40:29', '2023-05-31 15:40:45'),
('OUT-31-05-2023-000014', '2023-05-31', '2023-06-03', 3, '000002', 'Kembali', '2023-05-31 15:46:23', '2023-05-31 15:46:59'),
('OUT-31-05-2023-000015', '2023-05-31', '2023-06-03', 7, '000001', 'Kembali', '2023-05-31 15:47:44', '2023-05-31 15:49:18'),
('OUT-31-05-2023-000016', '2023-05-31', '2023-06-03', 8, '000003', 'Kembali', '2023-05-31 15:48:07', '2023-05-31 15:50:13'),
('OUT-31-05-2023-000017', '2023-05-31', '2023-06-03', 3, '000002', 'Kembali', '2023-05-31 15:53:13', '2023-05-31 15:54:52'),
('OUT-31-05-2023-000018', '2023-05-31', '2023-06-03', 7, '000003', 'Kembali', '2023-05-31 15:53:23', '2023-05-31 15:58:41'),
('OUT-31-05-2023-000019', '2023-05-31', '2023-06-03', 5, '000003', 'Kembali', '2023-05-31 15:54:37', '2023-05-31 16:01:09'),
('OUT-31-05-2023-000020', '2023-05-31', '2023-06-03', 2, '000004', 'Kembali', '2023-05-31 16:03:00', '2023-05-31 16:03:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penerbit`
--

CREATE TABLE `tb_penerbit` (
  `id_penerbit` int(10) UNSIGNED NOT NULL,
  `nama_penerbit` varchar(100) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `pic_hp` char(25) DEFAULT NULL,
  `email` char(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_penerbit`
--

INSERT INTO `tb_penerbit` (`id_penerbit`, `nama_penerbit`, `alamat`, `pic_hp`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Deepublish', 'Jl. Rajawali Gg. Elang 6 No.3, Drono, Sardonoharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta', '(0274) 283-6082', 'adminkonsultan@deepublish.co.id; cs@deepublish.co.id', '2023-03-14 06:19:55', '2023-03-14 06:19:55'),
(2, 'Bukunesia', 'Jl.Rajawali G. Elang 6 No 3 RT/RW 005/033, Drono, Sardonoharjo, Ngaglik, Sleman, D.I Yogyakarta 55581', '0811-2831-577', 'admin@bukunesia.com', '2023-03-14 06:19:55', '2023-03-14 06:19:55'),
(3, 'Gramedia Pustaka Utama', 'Gedung Kompas Gramedia Lantai 5, Jl. Palmerah Barat 29-37. Jakarta 10270', NULL, NULL, '2023-03-14 06:19:55', '2023-03-14 06:19:55'),
(4, 'Grasindo', 'Gedung Kompas Gramedia Blok 1/lantai 3 Jalan Palmerah Barat No. 29-37 Jakarta', NULL, 'redaksi@grasindo.id', '2023-03-14 06:19:55', '2023-03-14 06:19:55'),
(5, 'Kata Depan', 'Perum Executive Village E9 Jl. Curug Agung No. 36, Tanah Baru, Beji Depok 16426', NULL, 'katadepan@gmail.com', '2023-03-14 06:19:55', '2023-03-14 06:19:55'),
(6, 'Gradien Mediatama', 'Jl. Wora Wari No.A-74, Baciro, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55225', NULL, NULL, '2023-03-14 06:19:55', '2023-03-14 06:19:55'),
(7, 'Twigora', 'Jl. Delima Raya, RT.4/RW.2, Malaka Sari, Kec. Duren Sawit, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13460', NULL, NULL, '2023-03-14 06:19:55', '2023-03-14 06:19:55'),
(8, 'Media Kita', 'Jl. H. Montong No.57, RT.6/RW.2, Ciganjur, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12630', NULL, NULL, '2023-03-14 06:19:55', '2023-03-14 06:19:55'),
(9, 'Noura Books', 'Jl. Jagakarsa Raya no. 40 Rt 07/04 Jagakarsa, Jakarta Selatan, 12620', '-', 'redaksi@noura.mizan.com', '2023-03-14 06:19:55', '2023-03-14 07:55:28'),
(10, 'Haru', 'Jl. Sulawesi No.17, Nurmanan, Mangkujayan, Ponorogo, Jawa Timur', '(0352) 481444', NULL, '2023-03-14 06:19:55', '2023-03-14 06:19:55'),
(11, 'Bentang Belia', 'Jl. Palagan Tentara Pelajar No.101, RT.004/RW.035, Jongkang, Sariharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', NULL, 'redaksi@bentangpustaka.com', '2023-03-14 06:19:55', '2023-03-14 06:19:55'),
(12, 'Tiga Ananda', 'Tiga Ananda', NULL, NULL, '2023-03-14 06:19:55', '2023-03-14 06:19:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengembalian`
--

CREATE TABLE `tb_pengembalian` (
  `kode_kembali` char(50) NOT NULL,
  `pinjam_kode` char(50) NOT NULL,
  `tgl_dikembalikan` date NOT NULL,
  `terlambat` int(11) NOT NULL,
  `status` char(20) NOT NULL,
  `denda_id` int(10) UNSIGNED DEFAULT NULL,
  `total_denda` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_pengembalian`
--

INSERT INTO `tb_pengembalian` (`kode_kembali`, `pinjam_kode`, `tgl_dikembalikan`, `terlambat`, `status`, `denda_id`, `total_denda`, `created_at`, `updated_at`) VALUES
('IN-31-05-2023-000001', 'OUT-31-05-2023-000002', '2023-06-03', 0, 'Tepat', 1, 0, '2023-05-31 03:42:39', NULL),
('IN-31-05-2023-000002', 'OUT-31-05-2023-000001', '2023-06-03', 0, 'Tepat', 1, 0, '2023-05-31 03:42:57', NULL),
('IN-31-05-2023-000003', 'OUT-31-05-2023-000003', '2023-06-06', 3, 'Terlambat', 1, 1500, '2023-05-31 03:46:20', NULL),
('IN-31-05-2023-000004', 'OUT-31-05-2023-000004', '2023-06-03', 0, 'Tepat', 1, 0, '2023-05-31 14:49:30', NULL),
('IN-31-05-2023-000005', 'OUT-31-05-2023-000006', '2023-06-03', 0, 'Tepat', 1, 0, '2023-05-31 14:53:40', NULL),
('IN-31-05-2023-000006', 'OUT-31-05-2023-000005', '2023-06-05', 2, 'Terlambat', 1, 1000, '2023-05-31 14:57:05', NULL),
('IN-31-05-2023-000007', 'OUT-31-05-2023-000007', '2023-06-03', 0, 'Tepat', 1, 0, '2023-05-31 15:13:11', NULL),
('IN-31-05-2023-000008', 'OUT-31-05-2023-000008', '2023-06-03', 0, 'Tepat', 1, 0, '2023-05-31 15:16:00', NULL),
('IN-31-05-2023-000009', 'OUT-31-05-2023-000009', '2023-06-05', 2, 'Terlambat', 1, 1000, '2023-05-31 15:16:42', NULL),
('IN-31-05-2023-000010', 'OUT-31-05-2023-000011', '2023-06-06', 3, 'Terlambat', 1, 1500, '2023-05-31 15:26:54', NULL),
('IN-31-05-2023-000011', 'OUT-31-05-2023-000010', '2023-06-05', 2, 'Terlambat', 1, 1000, '2023-05-31 15:30:40', NULL),
('IN-31-05-2023-000012', 'OUT-31-05-2023-000013', '2023-06-03', 0, 'Tepat', 1, 0, '2023-05-31 15:40:45', NULL),
('IN-31-05-2023-000013', 'OUT-31-05-2023-000012', '2023-06-05', 2, 'Terlambat', 1, 1000, '2023-05-31 15:43:05', NULL),
('IN-31-05-2023-000014', 'OUT-31-05-2023-000014', '2023-06-06', 3, 'Terlambat', 1, 1500, '2023-05-31 15:46:59', NULL),
('IN-31-05-2023-000015', 'OUT-31-05-2023-000015', '2023-06-05', 2, 'Terlambat', 1, 1000, '2023-05-31 15:49:18', NULL),
('IN-31-05-2023-000016', 'OUT-31-05-2023-000016', '2023-06-05', 2, 'Terlambat', 1, 1000, '2023-05-31 15:50:13', NULL),
('IN-31-05-2023-000017', 'OUT-31-05-2023-000017', '2023-06-03', 0, 'Tepat', 1, 0, '2023-05-31 15:54:52', NULL),
('IN-31-05-2023-000018', 'OUT-31-05-2023-000018', '2023-06-06', 3, 'Terlambat', 1, 1500, '2023-05-31 15:58:41', NULL),
('IN-31-05-2023-000019', 'OUT-31-05-2023-000019', '2023-06-05', 2, 'Terlambat', 1, 1000, '2023-05-31 16:01:09', NULL),
('IN-31-05-2023-000020', 'OUT-31-05-2023-000020', '2023-06-03', 0, 'Tepat', 1, 0, '2023-05-31 16:03:49', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `gender`, `number`, `level`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mahendra Bagaskara', 'Wisma Tropodo Jl. Nusa Indah G-5', 'Laki-Laki', '082131962354', 'admin', 'bagadaw@gmail.com', NULL, '$2y$10$xEF5jxDyonVNEvVgS/4wBefypbKAxotQApoT3n0T7zzr03sXD8x2i', 'N99siTrOe2Q5pRwppXiSKIVw1yENbK1UzQp93JgKhMMCOv68ijW1r3Vn63jv', '2023-03-14 06:18:15', '2023-03-14 06:18:15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD UNIQUE KEY `tb_anggota_hp_unique` (`hp`),
  ADD KEY `tb_anggota_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `tb_buku_penerbit_id_foreign` (`penerbit_id`),
  ADD KEY `tb_buku_class_id_foreign` (`class_id`),
  ADD KEY `tb_buku_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `tb_ddc`
--
ALTER TABLE `tb_ddc`
  ADD PRIMARY KEY (`id_class`);

--
-- Indeks untuk tabel `tb_denda`
--
ALTER TABLE `tb_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`kode_pinjam`),
  ADD KEY `FR_anggota_id` (`anggota_id`),
  ADD KEY `FR_buku_id` (`buku_id`) USING BTREE;

--
-- Indeks untuk tabel `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indeks untuk tabel `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD PRIMARY KEY (`kode_kembali`),
  ADD KEY `tb_pengembalian_denda_id_foreign` (`denda_id`),
  ADD KEY `tb_pengembalian_pinjam_kode_foreign` (`pinjam_kode`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_denda`
--
ALTER TABLE `tb_denda`
  MODIFY `id_denda` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  MODIFY `id_penerbit` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `tb_anggota_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD CONSTRAINT `tb_buku_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `tb_ddc` (`id_class`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_buku_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_buku_penerbit_id_foreign` FOREIGN KEY (`penerbit_id`) REFERENCES `tb_penerbit` (`id_penerbit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD CONSTRAINT `tb_peminjaman_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_peminjaman_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD CONSTRAINT `tb_pengembalian_denda_id_foreign` FOREIGN KEY (`denda_id`) REFERENCES `tb_denda` (`id_denda`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pengembalian_pinjam_kode_foreign` FOREIGN KEY (`pinjam_kode`) REFERENCES `tb_peminjaman` (`kode_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
