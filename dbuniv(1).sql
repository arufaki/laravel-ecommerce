-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2024 at 06:10 PM
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

--
-- Dumping data for table `beli`
--

INSERT INTO `beli` (`id_pembelian`, `no_bukti`, `tanggal`, `keterangan`, `id_pemasok`, `created_at`, `updated_at`) VALUES
(2, 8493, '2024-04-18', 'Strawberry Clothes 300 Pcs', 5, NULL, NULL),
(3, 9402, '2024-05-01', 'Banana Clothes 400 Pcs', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `qty` int NOT NULL,
  `id_stok` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `ukuran`, `qty`, `id_stok`, `id_user`) VALUES
(14, 'm', 1, 41, 5),
(20, 'm', 3, 47, 5),
(21, 'l', 2, 48, 5),
(22, 'l', 3, 45, 6),
(23, 'xxl', 4, 43, 6);

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
  `no_bukti` int NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `no_bukti` int NOT NULL,
  `masuk_keluar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int NOT NULL,
  `harga` int NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_stok` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 'Clothes', NULL, NULL),
(3, 'Pants', NULL, NULL),
(4, 'Hat', NULL, NULL),
(5, 'Outer', NULL, NULL);

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
(1, 'Jl. Yamagawa, Perum Mutiara Indah Blok G.24, Kec. Sarolangun, Kel. Kuvukiland, Kota Jamaica, Provinsi Osaka, 28829', '+62 823 8792 4582', '1', 5, '2024-06-11 17:18:50', '2024-06-11 17:18:50');

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
  `id_kategori` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbstok`
--

INSERT INTO `tbstok` (`id_stok`, `kode_stok`, `nama_stok`, `saldo_awal`, `harga_beli`, `harga_jual`, `harga_modal`, `image`, `deskripsi_barang`, `pajang`, `id_satuan`, `id_kategori`) VALUES
(41, 1234, 'White Hoodie', '150', '350000', '450000', '400000', '[\"171689881834.png\",\"171689881865.png\",\"171689881898.png\"]', 'This white hoodie epitomizes comfort and style. Crafted from soft, high-quality cotton, it offers a snug and cozy fit, perfect for casual outings or lounging at home. The minimalist design features a classic kangaroo pocket at the front, providing both functionality and a touch of urban flair. Its versatile color makes it an essential wardrobe staple, effortlessly pairing with any outfit choice. Whether you\'re layering up for a brisk morning walk or simply adding a layer of warmth on a chilly evening, this white hoodie promises both comfort and fashion-forward appeal. Upgrade your wardrobe with this timeless piece that seamlessly blends comfort and style.', 'tidak', 6, 1),
(43, 4321, 'Leather Jacket', '100', '550000', '750000', '600000', '[\"171690126727.png\",\"17169012687.png\",\"171690126832.png\"]', 'Experience the perfect blend of edgy style and premium quality with this leather jacket. Made from genuine, high-grade leather, it offers durability and a sleek, sophisticated look. The jacket features a classic zip-up front, multiple pockets for practicality, and a fitted design that flatters any silhouette. The interior is lined with a soft, comfortable fabric, ensuring you stay warm while looking effortlessly cool. Ideal for both casual wear and more dressed-up occasions, this leather jacket is a versatile addition to any wardrobe. Elevate your style and make a bold statement with this timeless piece that exudes confidence and class.', 'tidak', 6, 1),
(45, 3412, 'Sombrero Hat', '250', '320000', '350000', '320000', '[\"171811461865.png\",\"171811461897.png\",\"171811461851.png\"]', 'The Sombrero Hat is a traditional Mexican hat known for its wide brim and high, pointed crown, designed to provide excellent sun protection. Crafted from materials such as straw or felt, this iconic accessory often features intricate embroidery and colorful decorations, reflecting Mexican cultural heritage. Ideal for both functional wear and festive occasions, the Sombrero Hat combines practicality with vibrant style, making it a standout piece in any wardrobe.', 'tidak', 6, 4),
(46, 4123, 'Cream Pants', '100', '500000', '650000', '500000', '[\"171811469917.png\",\"171811469919.jpg\",\"171811469970.png\"]', 'Cream Pants are a versatile wardrobe staple, perfect for both casual and formal occasions. Crafted from high-quality, breathable fabric, these pants offer a comfortable and stylish fit. Their neutral cream color makes them easy to pair with a variety of tops and accessories, creating effortlessly chic ensembles. Whether for work, a day out, or an evening event, Cream Pants provide a timeless and elegant look that complements any personal style.', 'tidak', 6, 3),
(47, 4567, 'Vercase Barocco Shirt', '100', '550000', '250000', '600000', '[\"171811509657.png\",\"171811509636.png\",\"171811509626.png\"]', 'The Versace Barocco collection epitomizes luxury and opulence with its signature Baroque-inspired designs. Renowned for its intricate patterns, bold prints, and lavish detailing, this collection reflects the iconic aesthetic of the Versace brand. Each piece, whether clothing, accessories, or home decor, showcases a fusion of classic elegance and contemporary style. Perfect for those who appreciate high fashion and sophisticated artistry, the Versace Barocco collection adds a touch of extravagance to any wardrobe or living space.', 'tidak', 6, 2),
(48, 5674, 'Jumbo GG jogging pant', '124', '460000', '122000', '560000', '[\"17181153932.png\",\"171811539337.png\",\"171811539352.png\"]', 'The Jumbo GG Jogging Pant by Gucci is the epitome of luxury leisurewear. Crafted with meticulous attention to detail, these pants feature the iconic GG logo pattern in a bold, oversized design, showcasing the brand\'s unmistakable style. Made from high-quality materials, they offer both comfort and sophistication, ideal for casual outings or relaxing at home. With their relaxed fit and elasticized waistband, the Jumbo GG Jogging Pant provides effortless versatility and timeless elegance for the modern wardrobe.', 'tidak', 6, 3);

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
  ADD KEY `tbstok_id_kategori_index` (`id_kategori`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jual`
--
ALTER TABLE `jual`
  MODIFY `id_penjualan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `id_mutasi` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbkategori`
--
ALTER TABLE `tbkategori`
  MODIFY `id_kategori` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  MODIFY `id_pelanggan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id_stok` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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
  ADD CONSTRAINT `tbstok_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `tbkategori` (`id_kategori`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbstok_id_satuan_foreign` FOREIGN KEY (`id_satuan`) REFERENCES `tbsatuan` (`id_satuan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
