-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2024 at 06:56 PM
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
  `no_bukti` int NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pemasok` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id_brand` bigint UNSIGNED NOT NULL,
  `nama_brand` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `ukuran`, `qty`, `id_stok`, `id_user`) VALUES
(36, 's', 1, 54, 5),
(37, 'm', 2, 56, 5);

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
  `no_bukti` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ekspedisi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'JNE',
  `bukti_pembayaran` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jual`
--

INSERT INTO `jual` (`id_penjualan`, `no_bukti`, `tanggal`, `keterangan`, `ekspedisi`, `bukti_pembayaran`, `id_user`) VALUES
(22, 'OR520240618183510', '2024-06-18', 'Penjualan', 'JNE', 'bukti-pembayaran/171873571042.png', 5),
(23, 'OR520240618183625', '2024-06-18', 'Penjualan', 'JNE', 'bukti-pembayaran/171873578598.png', 5),
(24, 'OR520240618183647', '2024-06-18', 'Penjualan', 'JNE', 'bukti-pembayaran/171873580752.png', 5);

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
  `no_bukti` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masuk` int NOT NULL DEFAULT '0',
  `keluar` int NOT NULL DEFAULT '0',
  `harga` int NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_stok` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mutasi`
--

INSERT INTO `mutasi` (`id_mutasi`, `no_bukti`, `masuk`, `keluar`, `harga`, `keterangan`, `id_stok`, `created_at`, `updated_at`) VALUES
(14, 'OR520240618183510', 0, 1, 39960000, 'Keluar', 54, '2024-06-18 11:35:10', '2024-06-18 11:35:10'),
(16, 'OR520240618183625', 0, 2, 26500000, 'Keluar', 56, '2024-06-18 11:36:25', '2024-06-18 11:36:25'),
(17, 'OR520240618183647', 0, 1, 39960000, 'Keluar', 54, '2024-06-18 11:36:47', '2024-06-18 11:36:47'),
(18, 'OR520240618183647', 0, 1, 39960000, 'Keluar', 54, '2024-06-18 11:36:47', '2024-06-18 11:36:47'),
(19, 'OR520240618183647', 0, 2, 26500000, 'Keluar', 56, '2024-06-18 11:36:47', '2024-06-18 11:36:47');

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
(7, 'Piyama', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbpelanggan`
--

CREATE TABLE `tbpelanggan` (
  `id_pelanggan` bigint UNSIGNED NOT NULL,
  `alamat_pelanggan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `top` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbpelanggan`
--

INSERT INTO `tbpelanggan` (`id_pelanggan`, `alamat_pelanggan`, `nohp`, `top`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Jl. Yamagawa, Perum Mutiara Indah Blok G.24, Kec. Sarolangun, Kel. Kuvukiland, Kota Jamaica, Provinsi Osaka, 28829', '082388492829', '1', 6, '2024-06-11 17:18:50', '2024-06-11 17:18:50'),
(4, 'Jl. Todak', '08738449283', '1', 5, '2024-06-18 13:53:57', '2024-06-18 13:53:57');

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
(2, 'kg', NULL, NULL),
(3, 'g', NULL, NULL),
(4, 'oz', NULL, NULL),
(5, 'ton', NULL, NULL),
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
(54, 11243, 'BAROCCO SEA REVERSIBLE JACKET', '2', '37500000', '39960000', '38000000', '[\"171873386325.webp\",\"171873386345.webp\",\"171873386355.webp\"]', 'Jaket reversibel Barocco Sea dari Versace adalah pilihan stylish yang menampilkan motif Barocco khas Versace dengan sentuhan nuansa laut. Jaket ini memiliki desain dua sisi yang memungkinkan Anda memilih antara tampilan motif laut yang dinamis atau motif Barocco klasik yang elegan. Terbuat dari bahan berkualitas tinggi, jaket ini tidak hanya memberikan kenyamanan tetapi juga kesan mewah dan modis, cocok untuk berbagai kesempatan. Desainnya yang unik dan serbaguna menjadikan jaket ini tambahan yang sempurna untuk koleksi busana Anda.', 'tidak', 6, 1, 1, '2024-06-18 11:04:23', '2024-06-18 11:04:23'),
(55, 1014855, 'BAROCCO SEA WINDBREAKER JACKET', '6', '30000000', '32110000', '31000000', '[\"171873399246.webp\",\"171873399237.webp\",\"171873399222.webp\"]', 'Jaket Windbreaker Barocco Sea dari Versace adalah pilihan stylish yang memadukan motif Barocco khas Versace dengan elemen desain laut. Jaket ini menawarkan perlindungan dari angin dan cuaca ringan dengan bahan yang tahan lama dan nyaman. Desainnya yang reversible memungkinkan Anda memilih antara tampilan motif laut yang dinamis atau motif Barocco klasik yang mewah. Dengan detail yang elegan dan fungsi yang praktis, jaket ini adalah tambahan sempurna untuk gaya sehari-hari Anda.', 'tidak', 6, 1, 1, '2024-06-18 18:07:01', '2024-06-18 18:07:01'),
(56, 1011693, 'SLIM-FIT JEANS', '1', '12550000', '13250000', '12250000', '[\"171873444586.webp\",\"171873444547.webp\",\"171873444587.webp\"]', 'Slim-Fit Jeans pria dari Zara adalah celana jeans yang dirancang untuk memberikan tampilan yang modern dan ramping. Terbuat dari bahan denim berkualitas tinggi, jeans ini menawarkan kenyamanan dan daya tahan yang luar biasa. Potongannya yang slim-fit memeluk tubuh dengan sempurna, menciptakan siluet yang stylish dan kontemporer. Cocok untuk berbagai kesempatan, dari gaya kasual sehari-hari hingga acara semi-formal, jeans ini adalah pilihan ideal untuk pria yang menginginkan tampilan yang bersih dan trendi.', 'tidak', 6, 3, 2, '2024-06-18 18:41:52', '2024-06-18 18:41:52'),
(57, 1005602, 'BAROCCO ROBE', '2', '75202000', '77230000', '73232000', '[\"171873494770.webp\",\"171873494730.webp\",\"171873494758.webp\"]', 'Barocco Robe dari Calvin Klein adalah jubah mewah dengan motif Barocco yang khas dan sentuhan desain modern. Terbuat dari bahan yang lembut dan nyaman di kulit, jubah ini memberikan kenyamanan maksimal saat digunakan. Desainnya yang elegan dengan detail motif yang mencolok menjadikan jubah ini tidak hanya fungsional sebagai pakaian tidur atau homewear, tetapi juga sebagai pilihan gaya yang mewah di dalam rumah. Cocok untuk pria yang menghargai gaya dan kenyamanan dalam satu paket yang eksklusif.', 'tidak', 6, 7, 5, '2024-06-18 18:41:38', '2024-06-18 18:41:38'),
(58, 1015180, 'SEA OVERSIZED DENIM JACKET', '3', '24070000', '28070000', '25070000', '[\"171873528555.webp\",\"171873528535.webp\",\"171873528521.webp\"]', 'Sea Oversized Denim Jacket dari Prada adalah jaket denim yang menampilkan gaya oversized yang trendi. Terbuat dari denim berkualitas tinggi, jaket ini memberikan tampilan yang santai namun tetap modis. Desainnya yang oversized memberikan ruang gerak lebih dan memberikan kesan kasual yang stylish. Dengan detail motif laut yang unik, jaket ini menambahkan sentuhan eksklusif dan menarik pada setiap gaya pakaian. Cocok digunakan untuk gaya kasual sehari-hari yang ingin tetap terlihat fashionable dan berbeda.', 'tidak', 6, 6, 4, '2024-06-18 18:42:18', '2024-06-18 18:42:18');

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
(5, 'john doe', 'johndoe@gmail.com', NULL, '$2y$12$1coxVShK058Br114CCVcD.Om61YwgZsZHDm3.g6EPLpE4.mB8kkvC', NULL, '2024-01-27 06:03:00', '2024-01-27 06:03:00', 'admin'),
(6, 'Dont Hurt Me', 'erik@gmail.com', NULL, '$2y$12$2jwbRv2Tn2MPIHwAxtDseODU9sXDgJqEvdt/koAdOOZjn2e0r847q', NULL, '2024-06-11 10:29:49', '2024-06-11 10:29:49', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `beli_id_pemasok_index` (`id_pemasok`);

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
  MODIFY `id_pembelian` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jual`
--
ALTER TABLE `jual`
  MODIFY `id_penjualan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `id_mutasi` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbkategori`
--
ALTER TABLE `tbkategori`
  MODIFY `id_kategori` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  MODIFY `id_pelanggan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id_stok` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beli`
--
ALTER TABLE `beli`
  ADD CONSTRAINT `beli_id_pemasok_foreign` FOREIGN KEY (`id_pemasok`) REFERENCES `tbpemasok` (`id_pemasok`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `mutasi_id_stok_foreign` FOREIGN KEY (`id_stok`) REFERENCES `tbstok` (`id_stok`) ON DELETE CASCADE;

--
-- Constraints for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  ADD CONSTRAINT `tbpelanggan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbstok`
--
ALTER TABLE `tbstok`
  ADD CONSTRAINT `tbstok_ibfk_1` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id_brand`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tbstok_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `tbkategori` (`id_kategori`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbstok_id_satuan_foreign` FOREIGN KEY (`id_satuan`) REFERENCES `tbsatuan` (`id_satuan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
