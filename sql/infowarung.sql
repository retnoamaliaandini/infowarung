-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2021 at 04:41 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infowarung`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_warung` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `id_kategori`, `id_warung`, `nama`, `gambar`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 'Luwak White Coffee', '774f654e0918f8bd3bbc2cea6cc96489.jpg', 2000, 24, '2021-12-19 18:03:40', '2021-12-19 14:05:18'),
(3, 3, 2, 'Kecap Bango', '078ecd231bf79187021b300fe1bca631.jpg', 7000, 21, '2021-12-19 18:05:06', '2021-12-19 18:05:06'),
(10, 2, 2, 'Freshtea', 'ebddb0f519281d9b62d5616be02632b7.jpg', 5000, 20, '2021-12-19 19:33:27', '2021-12-19 19:33:27'),
(11, 3, 2, 'Gas 3 Kg', '19c9820953d983b64676a975232e7386.jpg', 24000, 13, '2021-12-19 20:06:05', '2021-12-19 20:06:05'),
(12, 4, 2, 'Bodrex', '4fc2da2e71b80a787cad00d64b4521e0.png', 6000, 11, '2021-12-19 20:07:41', '2021-12-19 20:07:41'),
(13, 3, 3, 'Beras', '524ca370447aecaf94655771f1a97315.jpg', 9000, 20, '2021-12-24 18:46:56', '2021-12-24 18:46:56'),
(14, 7, 3, 'Susu', '7fc6ebf8c156173f9ead8cefdc5ff6fe.jfif', 2000, 20, '2021-12-24 18:47:45', '2021-12-24 18:47:45'),
(15, 2, 3, 'Fruit Tea', 'c0ba633cecaa1ac8b7c57d5cf5c3368f.png', 5000, 12, '2021-12-24 18:50:22', '2021-12-24 18:50:22'),
(16, 3, 4, 'Beras', '34e07a81cd454a82bd28b5b708dcce47.jpg', 8000, 30, '2021-12-24 18:51:59', '2021-12-24 18:51:59'),
(17, 5, 4, 'Pepsodent', '78eab9d64338fb3e35a9e339bd8457aa.jpg', 7000, 15, '2021-12-24 18:52:31', '2021-12-24 18:52:31'),
(18, 2, 4, 'Teh Botol', 'e6f294335ad8e9422b6d179bbe2f71fb.jpg', 4000, 20, '2021-12-24 18:52:49', '2021-12-24 18:52:49'),
(19, 8, 2, 'Penghapus', 'fd84fb6165509c6d1fae1a24a30a1e30.jpg', 2000, 23, '2021-12-25 03:05:35', '2021-12-25 03:05:35'),
(20, 5, 2, 'Sabun Nuvo', '927a2d7431363f9f990cc162bd52776c.jpg', 5000, 12, '2021-12-25 03:14:21', '2021-12-25 03:14:21'),
(21, 8, 2, 'Pulpen', '1b0e512d75b183ea30907c11b4d791ce.jpg', 2500, 21, '2021-12-25 03:27:18', '2021-12-25 03:27:18');

-- --------------------------------------------------------

--
-- Table structure for table `produk_kategori`
--

CREATE TABLE `produk_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_kategori`
--

INSERT INTO `produk_kategori` (`id`, `kategori`) VALUES
(1, 'Makanan Ringan'),
(2, 'Minuman'),
(3, 'Keperluan Dapur'),
(4, 'Obat Obatan'),
(5, 'Keperluan Rumah Tangga'),
(6, 'Makanan Instan'),
(7, 'Produk Susu'),
(8, 'ATK');

-- --------------------------------------------------------

--
-- Table structure for table `stok_history`
--

CREATE TABLE `stok_history` (
  `id` int(11) NOT NULL,
  `id_warung` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tipe` varchar(10) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `stok_akhir` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_history`
--

INSERT INTO `stok_history` (`id`, `id_warung`, `id_barang`, `tipe`, `stok_awal`, `jumlah`, `stok_akhir`, `created_at`) VALUES
(2, 2, 3, 'masuk', 15, 3, 18, '2021-12-19 22:08:35'),
(3, 2, 2, 'masuk', 15, 2, 17, '2021-12-19 22:10:45'),
(4, 2, 2, 'masuk', 17, 1, 18, '2021-12-19 22:10:54'),
(5, 2, 10, 'masuk', 18, 2, 20, '2021-12-19 22:10:54'),
(6, 2, 2, 'masuk', 18, 2, 20, '2021-12-19 22:12:12'),
(7, 11, 11, 'masuk', 8, 2, 10, '2021-12-19 22:13:09'),
(8, 2, 2, 'masuk', 20, 2, 22, '2021-12-25 03:07:01'),
(9, 3, 3, 'masuk', 18, 2, 20, '2021-12-25 03:07:02'),
(10, 10, 10, 'masuk', 16, 2, 18, '2021-12-25 03:07:02'),
(11, 11, 11, 'masuk', 10, 3, 13, '2021-12-25 03:07:02'),
(12, 12, 12, 'masuk', 10, 1, 11, '2021-12-25 03:07:02'),
(13, 19, 19, 'masuk', 20, 1, 21, '2021-12-25 03:07:02'),
(14, 2, 2, 'masuk', 22, 2, 24, '2021-12-25 03:16:00'),
(15, 3, 3, 'masuk', 20, 1, 21, '2021-12-25 03:16:00'),
(16, 10, 10, 'masuk', 18, 2, 20, '2021-12-25 03:16:00'),
(17, 19, 19, 'masuk', 21, 2, 23, '2021-12-25 03:28:40'),
(18, 20, 20, 'masuk', 10, 2, 12, '2021-12-25 03:28:40'),
(19, 21, 21, 'masuk', 20, 1, 21, '2021-12-25 03:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_warung` int(11) NOT NULL,
  `pemasukan` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_warung`, `pemasukan`, `created_at`) VALUES
(1, 2, 2000000, '2021-10-19 22:08:35'),
(2, 2, 3000000, '2021-11-19 22:08:35'),
(3, 2, 1000000, '2021-12-19 22:08:35'),
(4, 2, 18000, '2021-12-24 18:28:21'),
(5, 2, 24000, '2021-12-25 03:17:53'),
(6, 2, 21000, '2021-12-25 03:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi`, `id_produk`, `quantity`, `total_harga`) VALUES
(4, 2, 2, 4000),
(4, 3, 2, 14000),
(5, 3, 2, 14000),
(5, 10, 2, 10000),
(6, 2, 3, 6000),
(6, 10, 3, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `telepon`, `password`, `created_at`, `updated_at`) VALUES
(2, 'pakeko@gmail.com', '085714502548', '$2y$10$PO4WEnwRHqpmPvpGOMfdxOzwGxjO8im/Djgck1r5cWY/ihEjRSQNa', '2021-12-17 09:09:48', '2021-12-17 09:09:48'),
(3, 'aldibos@gmail.com', '085888899990', '$2y$10$NrXYvm4hffcu.zOus8ik0eMyWn0NNc4pWh9lADIvwkyuT715Rf1K2', '2021-12-17 09:14:27', '2021-12-17 09:14:27'),
(4, 'bangkumis@gmail.com', '082299735350', '$2y$10$G.cEsrkURNjaeht12LdnbODtft0oVjXC0CFfxCoqCekrmgqIeKELu', '2021-12-17 09:16:16', '2021-12-17 09:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `warung`
--

CREATE TABLE `warung` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `alamat` text NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = tutup\r\n1 = buka',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warung`
--

INSERT INTO `warung` (`id`, `id_user`, `nama`, `foto`, `alamat`, `penanggung_jawab`, `telepon`, `email`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 'Warung Pak Eko', 'dd394b48fbae829f714cfbf945588bf8.jpg', 'Jl. Amil Abas No.80, RT.002/RW.002, Jaticempaka, Kec. Pondokgede, Kota Bks, Jawa Barat 17411', 'Pak Eko', '085714502548', 'pakeko@gmail.com', 1, '2021-12-17 09:09:48', '2021-12-24 21:26:23'),
(3, 3, 'Toko Aldi', '32bc6b06fe9f85f40db11e0357a3defd.png', 'Jl. Amir Abas No.90C, RT.004/RW.7, Jaticempaka, Kec. Pondokgede, Kota Bks, Jawa Barat 17411', 'Aldi Bahrudin', '085888899990', 'aldibos@gmail.com', 1, '2021-12-17 09:14:27', '2021-12-24 12:45:54'),
(4, 4, 'Warung Bang Kumis', 'fae3341468377c54ee870f5019d2faf9.png', 'Jl. Amir Abas No.36D, RT.004/RW.002, Jaticempaka, Kec. Pondokgede, Kota Bks, Jawa Barat 17411', 'Bang Kumis', '082299735350', 'bangkumis@gmail.com', 1, '2021-12-17 09:16:16', '2021-12-24 12:51:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_kategori`
--
ALTER TABLE `produk_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_history`
--
ALTER TABLE `stok_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warung`
--
ALTER TABLE `warung`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `produk_kategori`
--
ALTER TABLE `produk_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stok_history`
--
ALTER TABLE `stok_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `warung`
--
ALTER TABLE `warung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
