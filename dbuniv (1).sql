-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 16, 2024 at 01:54 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbuniv`
--

-- --------------------------------------------------------

--
-- Table structure for table `beli`
--

CREATE TABLE `beli` (
  `id_pembelian` bigint UNSIGNED NOT NULL,
  `no_bukti` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pemasok` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beli`
--

INSERT INTO `beli` (`id_pembelian`, `no_bukti`, `tanggal`, `keterangan`, `id_pemasok`) VALUES
(33, 'BUY520240716114717', '2024-07-16', 'Masuk', 2),
(34, 'BUY520240716124842', '2024-07-16', 'Masuk', 3);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id_brand` bigint UNSIGNED NOT NULL,
  `nama_brand` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id_brand`, `nama_brand`) VALUES
(1, 'Versace'),
(2, 'Zara'),
(3, 'Gucci'),
(4, 'Prada'),
(5, 'Calvin Klein'),
(6, 'Uniqlo'),
(7, 'No Brand');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int NOT NULL,
  `ukuran` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int NOT NULL,
  `id_stok` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `ukuran`, `qty`, `id_stok`, `id_user`) VALUES
(75, 'l', 1, 56, 7);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE `jual` (
  `id_penjualan` bigint UNSIGNED NOT NULL,
  `no_bukti` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ekspedisi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_pembayaran` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','success','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `id_user` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jual`
--

INSERT INTO `jual` (`id_penjualan`, `no_bukti`, `tanggal`, `keterangan`, `ekspedisi`, `bukti_pembayaran`, `status`, `id_user`) VALUES
(53, 'OR620240630124335', '2024-06-30', 'Penjualan', 'JNE', 'bukti-pembayaran/171975141588.png', 'success', 6),
(54, 'OR620240630124452', '2024-06-30', 'Penjualan', 'J&T Kargo', 'bukti-pembayaran/171975149274.png', 'rejected', 6),
(55, 'OR620240630124625', '2024-06-30', 'Penjualan', 'SiCepat', 'bukti-pembayaran/171975158516.png', 'rejected', 6),
(56, 'OR620240702132441', '2024-07-02', 'Penjualan', 'JNE', 'bukti-pembayaran/171992668123.png', 'success', 6),
(57, 'OR1020240709180411', '2024-07-09', 'Penjualan', 'SiCepat', 'bukti-pembayaran/17205482516.png', 'success', 10),
(58, 'OR520240709184022', '2024-07-09', 'Penjualan', 'SiCepat', 'bukti-pembayaran/172055042268.png', 'success', 5),
(59, 'OR520240709184139', '2024-07-09', 'Penjualan', 'SiCepat', 'bukti-pembayaran/172055049937.jpg', 'success', 5),
(60, 'OR520240709184445', '2024-07-09', 'Penjualan', 'J&T Kargo', 'bukti-pembayaran/172055068569.png', 'success', 5),
(61, 'OR520240709191906', '2024-07-09', 'Penjualan', 'JNE', 'bukti-pembayaran/172055274755.png', 'success', 5),
(62, 'OR520240714163032', '2024-07-14', 'Penjualan', 'SiCepat', 'bukti-pembayaran/172097463216.png', 'success', 5);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_11_151624_create_tbsatuan', 2),
(6, '2024_03_11_151657_create_tbpelanggan', 2),
(7, '2024_03_11_151701_create_tbpemasok', 2),
(8, '2024_03_18_080840_create_tbkategori', 2),
(9, '2024_03_11_151717_create_jual', 3),
(10, '2024_03_11_151720_create_beli', 3),
(11, '2024_03_18_073803_create_tbstok', 3),
(12, '2024_03_11_151727_create_mutasi', 4);

-- --------------------------------------------------------

--
-- Table structure for table `mutasi`
--

CREATE TABLE `mutasi` (
  `id_mutasi` bigint UNSIGNED NOT NULL,
  `no_bukti` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int NOT NULL,
  `harga` int NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','success','rejected','') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `id_stok` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mutasi`
--

INSERT INTO `mutasi` (`id_mutasi`, `no_bukti`, `qty`, `harga`, `keterangan`, `status`, `id_stok`, `created_at`, `updated_at`) VALUES
(72, 'OR1020240709180411', 1, 77230000, 'Keluar', 'success', 57, '2024-07-09 11:04:12', '2024-07-09 11:04:12'),
(73, 'OR1020240709180411', 1, 13250000, 'Keluar', 'success', 56, '2024-07-09 11:04:12', '2024-07-09 11:04:12'),
(78, 'OR520240709184022', 1, 10110000, 'Keluar', 'success', 59, '2024-07-09 11:40:22', '2024-07-09 11:40:22'),
(79, 'OR520240709184139', 3, 119880000, 'Keluar', 'success', 54, '2024-07-09 11:41:39', '2024-07-09 11:41:39'),
(80, 'OR520240709184445', 1, 32110000, 'Keluar', 'success', 55, '2024-07-09 11:44:45', '2024-07-09 11:44:45'),
(81, 'OR520240709191906', 1, 39960000, 'Keluar', 'success', 54, '2024-07-09 12:19:07', '2024-07-09 12:19:07'),
(82, 'OR520240709191906', 1, 32110000, 'Keluar', 'success', 55, '2024-07-09 12:19:07', '2024-07-09 12:19:07'),
(83, 'OR520240714163032', 1, 10110000, 'Keluar', 'success', 59, '2024-07-14 09:30:33', '2024-07-14 09:30:33'),
(96, 'BUY520240716114717', 2, 75000000, 'Masuk', 'success', 54, '2024-07-16 04:47:29', '2024-07-16 04:47:29'),
(97, 'BUY520240716114717', 3, 37650000, 'Masuk', 'success', 56, '2024-07-16 04:47:29', '2024-07-16 04:47:29'),
(98, 'BUY520240716124842', 2, 150404000, 'Masuk', 'success', 57, '2024-07-16 05:48:57', '2024-07-16 05:48:57'),
(99, 'BUY520240716124842', 1, 24070000, 'Masuk', 'success', 58, '2024-07-16 05:48:57', '2024-07-16 05:48:57');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbkategori`
--

CREATE TABLE `tbkategori` (
  `id_kategori` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbkategori`
--

INSERT INTO `tbkategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Jacket', NULL, NULL),
(2, 'Suits', NULL, NULL),
(3, 'Pants', NULL, NULL),
(4, 'Hat', NULL, NULL),
(5, 'Blazers', NULL, NULL),
(6, 'Shirts', NULL, NULL),
(7, 'Piyama', NULL, NULL),
(8, 'Gym', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbpelanggan`
--

CREATE TABLE `tbpelanggan` (
  `id_pelanggan` bigint UNSIGNED NOT NULL,
  `alamat_pelanggan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbpelanggan`
--

INSERT INTO `tbpelanggan` (`id_pelanggan`, `alamat_pelanggan`, `nohp`, `top`, `id_user`) VALUES
(1, 'Jl. Adi Sucipto No.1 kel, Sidomulyo Tim., Kec. Marpoyan Damai, Kota Pekanbaru, Riau 28125', '628738839482', '1', 6),
(4, 'Jl. Merpati Gg. Ketitiran No.31, Tengkerang Tengah, Kec. Marpoyan Damai, Kota Pekanbaru, Riau 28125', '6285362273829', '1', 5),
(5, 'Jl. Pandu No.151, Simpang Tiga, Kec. Bukit Raya, Kota Pekanbaru, Riau 28286', '6282387734926', NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbpemasok`
--

CREATE TABLE `tbpemasok` (
  `id_pemasok` bigint UNSIGNED NOT NULL,
  `kode_pemasok` int NOT NULL,
  `nama_pemasok` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pemasok` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `top` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbpemasok`
--

INSERT INTO `tbpemasok` (`id_pemasok`, `kode_pemasok`, `nama_pemasok`, `alamat_pemasok`, `nohp`, `top`, `created_at`, `updated_at`) VALUES
(2, 1241, 'Rehan Sudrajat', 'Jl. Todak No. 3', '08338332', 'Hoodie Supply', NULL, NULL),
(3, 4232, 'Riki Hermansyah', 'Jl. Garuda No.3', '082393231', 'Tofu Speed', NULL, NULL),
(4, 9402, 'Aji Pisang', 'Jl. Lokomotif No.98', '08392783', 'Pisang Design', NULL, NULL),
(5, 5232, 'Asep Stroberi', 'Jl. Limau No.44', '08392783', 'Strawberry Clothes', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbsatuan`
--

CREATE TABLE `tbsatuan` (
  `id_satuan` bigint UNSIGNED NOT NULL,
  `nama_satuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbsatuan`
--

INSERT INTO `tbsatuan` (`id_satuan`, `nama_satuan`, `created_at`, `updated_at`) VALUES
(6, 'pcs', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbstok`
--

CREATE TABLE `tbstok` (
  `id_stok` bigint UNSIGNED NOT NULL,
  `kode_stok` int NOT NULL,
  `nama_stok` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo_awal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jual` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_modal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_barang` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pajang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_satuan` bigint UNSIGNED NOT NULL,
  `id_kategori` bigint UNSIGNED NOT NULL,
  `id_brand` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbstok`
--

INSERT INTO `tbstok` (`id_stok`, `kode_stok`, `nama_stok`, `saldo_awal`, `harga_beli`, `harga_jual`, `harga_modal`, `image`, `deskripsi_barang`, `pajang`, `id_satuan`, `id_kategori`, `id_brand`, `created_at`, `updated_at`) VALUES
(54, 11243, 'BAROCCO SEA REVERSIBLE JACKET', '13', '37500000', '39960000', '38000000', '[\"171873386325.webp\",\"171873386345.webp\",\"171873386355.webp\"]', 'Jaket reversibel Barocco Sea dari Versace adalah pilihan stylish yang menampilkan motif Barocco khas Versace dengan sentuhan nuansa laut. Jaket ini memiliki desain dua sisi yang memungkinkan Anda memilih antara tampilan motif laut yang dinamis atau motif Barocco klasik yang elegan. Terbuat dari bahan berkualitas tinggi, jaket ini tidak hanya memberikan kenyamanan tetapi juga kesan mewah dan modis, cocok untuk berbagai kesempatan. Desainnya yang unik dan serbaguna menjadikan jaket ini tambahan yang sempurna untuk koleksi busana Anda.', 'tidak', 6, 1, 1, '2024-06-21 03:48:27', '2024-06-21 03:48:27'),
(55, 1014855, 'BAROCCO SEA WINDBREAKER JACKET', '16', '30000000', '32110000', '31000000', '[\"171873399246.webp\",\"171873399237.webp\",\"171873399222.webp\"]', 'Jaket Windbreaker Barocco Sea dari Versace adalah pilihan stylish yang memadukan motif Barocco khas Versace dengan elemen desain laut. Jaket ini menawarkan perlindungan dari angin dan cuaca ringan dengan bahan yang tahan lama dan nyaman. Desainnya yang reversible memungkinkan Anda memilih antara tampilan motif laut yang dinamis atau motif Barocco klasik yang mewah. Dengan detail yang elegan dan fungsi yang praktis, jaket ini adalah tambahan sempurna untuk gaya sehari-hari Anda.', 'tidak', 6, 1, 1, '2024-06-21 03:48:27', '2024-06-21 03:48:27'),
(56, 1011693, 'SLIM-FIT JEANS', '13', '12550000', '13250000', '12250000', '[\"171873444586.webp\",\"171873444547.webp\",\"171873444587.webp\"]', 'Slim-Fit Jeans pria dari Zara adalah celana jeans yang dirancang untuk memberikan tampilan yang modern dan ramping. Terbuat dari bahan denim berkualitas tinggi, jeans ini menawarkan kenyamanan dan daya tahan yang luar biasa. Potongannya yang slim-fit memeluk tubuh dengan sempurna, menciptakan siluet yang stylish dan kontemporer. Cocok untuk berbagai kesempatan, dari gaya kasual sehari-hari hingga acara semi-formal, jeans ini adalah pilihan ideal untuk pria yang menginginkan tampilan yang bersih dan trendi.', 'tidak', 6, 3, 2, '2024-06-25 14:07:13', '2024-06-25 14:07:13'),
(57, 1005602, 'BAROCCO ROBE', '12', '75202000', '77230000', '73232000', '[\"171873494770.webp\",\"171873494730.webp\",\"171873494758.webp\"]', 'Barocco Robe dari Calvin Klein adalah jubah mewah dengan motif Barocco yang khas dan sentuhan desain modern. Terbuat dari bahan yang lembut dan nyaman di kulit, jubah ini memberikan kenyamanan maksimal saat digunakan. Desainnya yang elegan dengan detail motif yang mencolok menjadikan jubah ini tidak hanya fungsional sebagai pakaian tidur atau homewear, tetapi juga sebagai pilihan gaya yang mewah di dalam rumah. Cocok untuk pria yang menghargai gaya dan kenyamanan dalam satu paket yang eksklusif.', 'tidak', 6, 7, 5, '2024-06-21 03:48:27', '2024-06-21 03:48:27'),
(58, 1015180, 'SEA OVERSIZED DENIM JACKET', '12', '24070000', '28070000', '25070000', '[\"171873528555.webp\",\"171873528535.webp\",\"171873528521.webp\"]', 'Sea Oversized Denim Jacket dari Prada adalah jaket denim yang menampilkan gaya oversized yang trendi. Terbuat dari denim berkualitas tinggi, jaket ini memberikan tampilan yang santai namun tetap modis. Desainnya yang oversized memberikan ruang gerak lebih dan memberikan kesan kasual yang stylish. Dengan detail motif laut yang unik, jaket ini menambahkan sentuhan eksklusif dan menarik pada setiap gaya pakaian. Cocok digunakan untuk gaya kasual sehari-hari yang ingin tetap terlihat fashionable dan berbeda.', 'tidak', 6, 6, 4, '2024-06-21 03:48:27', '2024-06-21 03:48:27'),
(59, 1012594, 'LOGO RAFFIA BUCKET HAT', '14', '8110000', '10110000', '9110000', '[\"171894352663.webp\",\"171894352795.webp\",\"171894352793.webp\"]', 'Logo Raffia Bucket Hat dari Gucci adalah aksesori yang sempurna untuk melengkapi tampilan musim panas Anda. Topi ini dibuat dengan bahan raffia alami yang memberikan tekstur unik dan kesan santai namun tetap elegan. Desain bucket hat yang klasik memastikan perlindungan optimal dari sinar matahari, menjadikannya pilihan ideal untuk hari-hari yang cerah di pantai atau berjalan-jalan di kota.', 'tidak', 6, 4, 3, '2024-06-23 16:01:55', '2024-06-23 16:01:55'),
(60, 1015805, 'EMBELLISHED MOHAIR-BLEND BLAZER', '8', '50150000', '58150000', '52020000', '[\"171894393537.webp\",\"171894393594.webp\",\"171894393520.webp\"]', 'Embossed Mohair-Blend Blazer dari Uniqlo adalah sebuah perwujudan dari kemewahan dan keanggunan dalam dunia fashion modern. Terbuat dari campuran mohair berkualitas tinggi, blazer ini menawarkan kehangatan dan kenyamanan tanpa mengorbankan gaya. Didesain dengan detail yang memukau, blazer ini menjadi pilihan sempurna untuk berbagai acara formal maupun semi-formal.', 'tidak', 6, 5, 6, '2024-06-29 16:08:58', '2024-06-29 16:08:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(3, 'rehan', 'rehan@gmail.com', NULL, '$2y$12$9BU2cdQVlLDzULIZ80XV9.U/4wcVrl2K8yghR14fbFpQ2BScWuDka', 'li7PmbgzJhKCWZ3n5SUzdq9nrmIwy7M4HH2e5E42uLkwWfJLhfdkKJnm9Two', '2024-01-15 10:45:56', '2024-01-15 10:45:56', 'admin'),
(5, 'John Doe', 'johndoe@gmail.com', NULL, '$2y$12$1coxVShK058Br114CCVcD.Om61YwgZsZHDm3.g6EPLpE4.mB8kkvC', NULL, '2024-01-27 06:03:00', '2024-01-27 06:03:00', 'admin'),
(6, 'Dont Hurt Me', 'erik@gmail.com', NULL, '$2y$12$2jwbRv2Tn2MPIHwAxtDseODU9sXDgJqEvdt/koAdOOZjn2e0r847q', NULL, '2024-06-11 10:29:49', '2024-06-11 10:29:49', 'user'),
(7, 'Budiono Siregar', 'kapallawd@gmail.com', NULL, '$2y$12$IbQ7tzsZwcQ013JuolihW.F5NMt5N0YO.cUGw7fF20iQQoeTFtRKO', NULL, '2024-07-01 06:40:12', '2024-07-01 06:40:12', 'user'),
(10, 'John Dalton', 'johndalton@gmail.com', NULL, '$2y$12$wr0znhfWVIf1RlIex2K1KOSeTIO2TyR7GaEuIkMEf7UALm9kut1uq', NULL, '2024-07-02 11:16:17', '2024-07-02 11:16:17', 'user');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vsaldo7`
-- (See below for the actual view)
--
CREATE TABLE `vsaldo7` (
`id_stok` bigint unsigned
,`saldo` decimal(33,0)
,`totalkeluar` decimal(32,0)
,`totalmasuk` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vsaldoakhir2`
-- (See below for the actual view)
--
CREATE TABLE `vsaldoakhir2` (
`id_stok` bigint unsigned
,`nama_stok` varchar(255)
,`saldo_awal` varchar(255)
,`saldoakhir` double
,`totalkeluar` decimal(32,0)
,`totalmasuk` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Structure for view `vsaldo7`
--
DROP TABLE IF EXISTS `vsaldo7`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vsaldo7`  AS SELECT `mutasi`.`id_stok` AS `id_stok`, sum(if((`mutasi`.`keterangan` = 'Masuk'),`mutasi`.`qty`,0)) AS `totalmasuk`, sum(if((`mutasi`.`keterangan` = 'Keluar'),`mutasi`.`qty`,0)) AS `totalkeluar`, (sum(if((`mutasi`.`keterangan` = 'Masuk'),`mutasi`.`qty`,0)) - sum(if((`mutasi`.`keterangan` = 'Keluar'),`mutasi`.`qty`,0))) AS `saldo` FROM `mutasi` GROUP BY `mutasi`.`id_stok` ;

-- --------------------------------------------------------

--
-- Structure for view `vsaldoakhir2`
--
DROP TABLE IF EXISTS `vsaldoakhir2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vsaldoakhir2`  AS SELECT `tbstok`.`id_stok` AS `id_stok`, `tbstok`.`nama_stok` AS `nama_stok`, coalesce(`tbstok`.`saldo_awal`,0) AS `saldo_awal`, coalesce(`vsaldo7`.`totalmasuk`,0) AS `totalmasuk`, coalesce(`vsaldo7`.`totalkeluar`,0) AS `totalkeluar`, ((coalesce(`tbstok`.`saldo_awal`,0) + coalesce(`vsaldo7`.`totalmasuk`,0)) - coalesce(`vsaldo7`.`totalkeluar`,0)) AS `saldoakhir` FROM (`tbstok` left join `vsaldo7` on((`tbstok`.`id_stok` = `vsaldo7`.`id_stok`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_stok` (`id_stok`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `jual_id_pelanggan_index` (`id_user`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`id_mutasi`),
  ADD KEY `mutasi_id_stok_index` (`id_stok`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbkategori`
--
ALTER TABLE `tbkategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbpemasok`
--
ALTER TABLE `tbpemasok`
  ADD PRIMARY KEY (`id_pemasok`);

--
-- Indexes for table `tbsatuan`
--
ALTER TABLE `tbsatuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tbstok`
--
ALTER TABLE `tbstok`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `tbstok_id_satuan_index` (`id_satuan`),
  ADD KEY `tbstok_id_kategori_index` (`id_kategori`),
  ADD KEY `id_brand` (`id_brand`);

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
-- AUTO_INCREMENT for table `beli`
--
ALTER TABLE `beli`
  MODIFY `id_pembelian` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jual`
--
ALTER TABLE `jual`
  MODIFY `id_penjualan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `id_mutasi` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbkategori`
--
ALTER TABLE `tbkategori`
  MODIFY `id_kategori` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  MODIFY `id_pelanggan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbpemasok`
--
ALTER TABLE `tbpemasok`
  MODIFY `id_pemasok` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbsatuan`
--
ALTER TABLE `tbsatuan`
  MODIFY `id_satuan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbstok`
--
ALTER TABLE `tbstok`
  MODIFY `id_stok` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_stok`) REFERENCES `tbstok` (`id_stok`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jual`
--
ALTER TABLE `jual`
  ADD CONSTRAINT `jual_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD CONSTRAINT `mutasi_id_stok_foreign` FOREIGN KEY (`id_stok`) REFERENCES `tbstok` (`id_stok`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  ADD CONSTRAINT `tbpelanggan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `tbstok`
--
ALTER TABLE `tbstok`
  ADD CONSTRAINT `tbstok_ibfk_1` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id_brand`),
  ADD CONSTRAINT `tbstok_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `tbkategori` (`id_kategori`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbstok_id_satuan_foreign` FOREIGN KEY (`id_satuan`) REFERENCES `tbsatuan` (`id_satuan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
