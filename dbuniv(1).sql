-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2024 at 03:02 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.6

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
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int NOT NULL,
  `kode_fakultas` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_fakultas` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `id_dosen` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `kode_fakultas`, `nama_fakultas`, `id_dosen`) VALUES
(13, '22040', 'Ilmu Komputer', 19),
(14, '20221', 'Ilmu Komunikasi', 20),
(15, '82938', 'Hukum', 21),
(16, '28392', 'Teknik', 26),
(17, '73829', 'Pertanian', 28),
(18, '20328', 'Kedokteran', 29),
(19, '26423', 'Kehutanan', 23),
(21, '24793', 'Rtes', 26);

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id_hari` int NOT NULL,
  `nama_hari` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` int NOT NULL,
  `nama_jenjang` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `nama_jenjang`) VALUES
(1, 'S1'),
(2, 'S2'),
(3, 'S3'),
(4, 'D1'),
(5, 'D2'),
(6, 'D3'),
(7, 'D4');

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE `jual` (
  `id_penjualan` bigint UNSIGNED NOT NULL,
  `no_bukti` int NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pelanggan` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jual`
--

INSERT INTO `jual` (`id_penjualan`, `no_bukti`, `tanggal`, `keterangan`, `id_pelanggan`) VALUES
(3, 132, '2024-04-05', 'ASWG-114', 3),
(4, 442, '2024-04-04', 'ASWG-115', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int NOT NULL,
  `kode_kelas` int DEFAULT NULL,
  `nama_kelas` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_tahun_akademik` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kode_kelas`, `nama_kelas`, `id_tahun_akademik`) VALUES
(1, 20231, 'A1', 3),
(2, 20231, 'A2', 3),
(3, 20231, 'A3', 3),
(4, 20241, 'A1', 5),
(9, 15414, 'asda', 9);

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
  `masuk_keluar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int NOT NULL,
  `harga` int NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_stok` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mutasi`
--

INSERT INTO `mutasi` (`id_mutasi`, `no_bukti`, `masuk_keluar`, `qty`, `harga`, `keterangan`, `id_stok`, `created_at`, `updated_at`) VALUES
(1, 94823, 'Ok', 100, 200000, 'Hoodie 100 Pcs', 10, NULL, NULL),
(2, 9748, 'Approve', 400, 299999, 'Banana Clothes 400 Pcs', 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int NOT NULL,
  `kode_prodi` int DEFAULT NULL,
  `nama_prodi` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_jenjang` int DEFAULT NULL,
  `id_fakultas` int DEFAULT NULL,
  `tglsk` date DEFAULT NULL,
  `akreditasi` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_dosen` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `kode_prodi`, `nama_prodi`, `id_jenjang`, `id_fakultas`, `tglsk`, `akreditasi`, `id_dosen`) VALUES
(8, 22031, 'Sistem Informasi', 1, 13, '2023-12-10', 'A', 22),
(9, 22310, 'Hubungan Internasional', 1, 14, '2023-12-07', 'A', 20),
(10, 29382, 'Ilmu Hukum', 1, 15, '2023-12-22', 'A', 24),
(11, 83928, 'Teknik Nuklir', 1, 16, '2024-05-23', 'B', 25),
(12, 72384, 'Agro Teknologi', 1, 17, '2023-12-20', 'A', 27),
(13, 87428, 'Keperawatan', 1, 18, '2023-12-28', 'A', 30);

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int NOT NULL,
  `kode_ruang` int DEFAULT NULL,
  `nama_ruang` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `kode_ruang`, `nama_ruang`) VALUES
(2, 703, 'GR'),
(3, 701, 'GR'),
(4, 702, 'GR'),
(5, 704, 'GR'),
(6, 706, 'GR');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id_tahun_akademik` int NOT NULL,
  `kode_tahun_akademik` int DEFAULT NULL,
  `nama_tahun_akademik` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id_tahun_akademik`, `kode_tahun_akademik`, `nama_tahun_akademik`) VALUES
(3, 20231, 'Ganjil'),
(4, 20232, 'Genap'),
(5, 20241, 'Ganjil'),
(6, 20242, 'Genap'),
(9, 20252, 'Genap'),
(13, 20261, 'Ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `tbkategori`
--

CREATE TABLE `tbkategori` (
  `id_kategori` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `tbldosen`
--

CREATE TABLE `tbldosen` (
  `id_dosen` int NOT NULL,
  `nid` varchar(23) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_dosen` varchar(1222) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(1222) COLLATE utf8mb4_general_ci NOT NULL,
  `nohp` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldosen`
--

INSERT INTO `tbldosen` (`id_dosen`, `nid`, `nama_dosen`, `jenis_kelamin`, `alamat`, `nohp`) VALUES
(19, '21131', 'Alvi Alvarizy S.Kom., MMSI', 'laki-laki', 'Jl. Cemara Tretes', '08238794213'),
(20, '412421', 'Samsul Arif S.I.Kom., M.I.Kom', 'laki-laki', 'Jl. Tarikat', '089530412223'),
(21, '2203242', 'Dwi Ningrat S.H., M.H', 'laki-laki', 'Jl. Todak', '08781029302'),
(22, '2304920', 'Alfredo Yamazaki S.Kom., MMSI', 'laki-laki', 'Jl. Jati No.56', '083180677767'),
(23, '837282', 'Rahman Zulhadi S.I.Kom., M.I.Kom', 'laki-laki', 'Jl. Sepakat', '082389945927'),
(24, '928391', 'Indira Nabila S.H., M.H', 'perempuan', 'Jl. Sudirman', '087837482912'),
(25, '182932', 'Fakhri Barokah S.T., M.T', 'laki-laki', 'Jl. Sudrajat No.77', '082398649201'),
(26, '938291', 'Siska Wulandari S.T., M.T', 'perempuan', 'Jl. Pegangsaan Timur No.99', '089573829102'),
(27, '28392', 'Joko Suparman S.P., M.P', 'laki-laki', 'Jl. Sukaramai No.20', '089534948293'),
(28, '76853', 'Suhardi Harnadi S.P., M.P', 'laki-laki', 'Jl. Jawa No.20', '082273849129'),
(29, '84728', 'Sahira Rahma S.Ked., M.Ked', 'perempuan', 'Jl. Ubi Jalar No.33', '087636472323'),
(30, '72647', 'Rizky Rihadanta S.Ked., M.Ked', 'laki-laki', 'Jl. Adi Sucipto No.78', '087636472832');

-- --------------------------------------------------------

--
-- Table structure for table `tblmhs`
--

CREATE TABLE `tblmhs` (
  `id` int NOT NULL,
  `nim` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `nohp` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `id_prodi` int NOT NULL,
  `id_dosen` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblmhs`
--

INSERT INTO `tblmhs` (`id`, `nim`, `nama`, `jenis_kelamin`, `alamat`, `nohp`, `id_prodi`, `id_dosen`) VALUES
(23, '220402072', 'Alfakih Anggi Subekti', 'laki-laki', 'Jl. Cemara Tretes', '0822387482323', 8, 22),
(24, '220402121', 'Alvis Johanda', 'laki-laki', 'Jl. Kesadaran', '0813214412', 11, 25),
(25, '220402042', 'Rehan Zulkarnain', 'laki-laki', 'Jl. Cemara Angin', '0814244124', 10, 24),
(26, '220402075', 'Riski Nur Maulana', 'laki-laki', 'Jl. Angin Hujan', '082387748231', 12, 27),
(27, '220402023', 'Raden Hadi Toto Negoro', 'laki-laki', 'Jl. Kosambi', '0855832921', 13, 29);

-- --------------------------------------------------------

--
-- Table structure for table `tbpelanggan`
--

CREATE TABLE `tbpelanggan` (
  `id_pelanggan` bigint UNSIGNED NOT NULL,
  `kode_pelanggan` int NOT NULL,
  `nama_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `top` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbpelanggan`
--

INSERT INTO `tbpelanggan` (`id_pelanggan`, `kode_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `nohp`, `top`, `created_at`, `updated_at`) VALUES
(2, 12333123, 'Aswangga Pasyaan', 'Jl. Nangka No. 04', '083384742', '12444213', NULL, NULL),
(3, 4231, 'Rehan Subrantas', 'Jl. Tidore No. 3', '08238229230', 'Apa Coba', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbpemasok`
--

CREATE TABLE `tbpemasok` (
  `id_pemasok` bigint UNSIGNED NOT NULL,
  `kode_pemasok` int NOT NULL,
  `nama_pemasok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pemasok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `top` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `nama_satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `nama_stok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo_awal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jual` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_modal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pajang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_satuan` bigint UNSIGNED DEFAULT NULL,
  `id_kategori` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbstok`
--

INSERT INTO `tbstok` (`id_stok`, `kode_stok`, `nama_stok`, `saldo_awal`, `harga_beli`, `harga_jual`, `harga_modal`, `image`, `deskripsi_barang`, `pajang`, `id_satuan`, `id_kategori`, `created_at`, `updated_at`) VALUES
(10, 123, 'Hoddie', '400000', '400000', '499000', '400000', 'foto-barang/fGb9XgGmYfdp44LYAv2ZkxYuOiCme8jsl5ZaX6F6.png', 'Fine texture with a pilling-resistant lining. Hood has a stylish contoured appearance.', 'tidak', NULL, NULL, NULL, NULL),
(11, 9402, 'Banana Clothes', '400000', '400000', '499999', '400000', 'foto-barang/rCZuGemu12avYxjhWHTxME6PUrney0yEqovNCGxm.jpg', 'Baju Logo Pisang', 'tidak', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(3, 'rehan', 'rehan@gmail.com', NULL, '$2y$12$9BU2cdQVlLDzULIZ80XV9.U/4wcVrl2K8yghR14fbFpQ2BScWuDka', 'li7PmbgzJhKCWZ3n5SUzdq9nrmIwy7M4HH2e5E42uLkwWfJLhfdkKJnm9Two', '2024-01-15 10:45:56', '2024-01-15 10:45:56', 'admin'),
(5, 'john doe', 'johndoe@gmail.com', NULL, '$2y$12$1coxVShK058Br114CCVcD.Om61YwgZsZHDm3.g6EPLpE4.mB8kkvC', NULL, '2024-01-27 06:03:00', '2024-01-27 06:03:00', 'admin');

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `jual_id_pelanggan_index` (`id_pelanggan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_tahun_akademik` (`id_tahun_akademik`);

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
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_jenjang` (`id_jenjang`),
  ADD KEY `id_kaprodi` (`id_dosen`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id_tahun_akademik`);

--
-- Indexes for table `tbkategori`
--
ALTER TABLE `tbkategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbldosen`
--
ALTER TABLE `tbldosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tblmhs`
--
ALTER TABLE `tblmhs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD KEY `id_dosenpa` (`id_dosen`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hari` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id_jenjang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jual`
--
ALTER TABLE `jual`
  MODIFY `id_penjualan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id_tahun_akademik` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbkategori`
--
ALTER TABLE `tbkategori`
  MODIFY `id_kategori` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbldosen`
--
ALTER TABLE `tbldosen`
  MODIFY `id_dosen` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblmhs`
--
ALTER TABLE `tblmhs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id_stok` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beli`
--
ALTER TABLE `beli`
  ADD CONSTRAINT `beli_id_pemasok_foreign` FOREIGN KEY (`id_pemasok`) REFERENCES `tbpemasok` (`id_pemasok`) ON DELETE CASCADE;

--
-- Constraints for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD CONSTRAINT `fakultas_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `tbldosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jual`
--
ALTER TABLE `jual`
  ADD CONSTRAINT `jual_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `tbpelanggan` (`id_pelanggan`) ON DELETE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_tahun_akademik`) REFERENCES `tahun_akademik` (`id_tahun_akademik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD CONSTRAINT `mutasi_id_stok_foreign` FOREIGN KEY (`id_stok`) REFERENCES `tbstok` (`id_stok`) ON DELETE CASCADE;

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prodi_ibfk_2` FOREIGN KEY (`id_jenjang`) REFERENCES `jenjang` (`id_jenjang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prodi_ibfk_3` FOREIGN KEY (`id_dosen`) REFERENCES `tbldosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblmhs`
--
ALTER TABLE `tblmhs`
  ADD CONSTRAINT `tblmhs_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `tbldosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblmhs_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;

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
