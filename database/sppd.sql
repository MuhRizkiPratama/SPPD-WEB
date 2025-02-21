-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 21, 2025 at 05:17 PM
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
-- Database: `sppd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `nama_admin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `password`, `created_at`, `updated_at`) VALUES
(6, 'Rizki Pratama', 'rizkipratama0550@gmail.com', '$2y$10$zO4y5eHBcEWZwQBar0xjNupVqqKGvGlRj4xinVcxbawW0v7MP6t8a', '2025-02-05 05:20:35', '2025-02-09 16:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int NOT NULL,
  `nama_jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `created_at`, `updated_at`) VALUES
(29, 'Staff', '2025-01-12 08:14:40', '2025-01-12 08:14:40'),
(30, 'Satpam', '2025-02-07 16:22:18', '2025-02-07 16:22:18'),
(33, 'Supervisor', '2025-02-21 16:34:11', '2025-02-21 16:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int NOT NULL,
  `no_badge` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nama_pegawai` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `uang_saku` int NOT NULL,
  `id_jabatan` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `no_badge`, `tanggal_lahir`, `nama_pegawai`, `uang_saku`, `id_jabatan`, `id_unit_kerja`, `created_at`, `updated_at`) VALUES
(15, '309-05-23', '1991-12-26', 'Agil Kelana Sangaji Roesyadhi', 100000, 29, 1, '2025-02-21 16:23:41', '2025-02-21 16:23:41'),
(16, '290-08-18', '1986-11-15', 'Bakti Raharja', 200000, 33, 1, '2025-02-21 16:35:08', '2025-02-21 16:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_sppd`
--

CREATE TABLE `pengajuan_sppd` (
  `id_pengajuan` int NOT NULL,
  `id_pegawai` int NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `tugas` varchar(255) NOT NULL,
  `pemberi_perintah` varchar(100) NOT NULL,
  `jumlah_hari` int NOT NULL,
  `laporan_perjalanan` varchar(255) NOT NULL,
  `biaya_penginapan` int DEFAULT NULL,
  `biaya_tol` int DEFAULT NULL,
  `biaya_bahan_bakar` int DEFAULT NULL,
  `biaya_lain` int DEFAULT NULL,
  `bukti_penginapan` varchar(255) DEFAULT NULL,
  `bukti_tol` varchar(255) DEFAULT NULL,
  `bukti_bahan_bakar` varchar(255) DEFAULT NULL,
  `bukti_lain` varchar(255) DEFAULT NULL,
  `total_biaya` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengajuan_sppd`
--

INSERT INTO `pengajuan_sppd` (`id_pengajuan`, `id_pegawai`, `tujuan`, `tanggal_berangkat`, `tanggal_kembali`, `tugas`, `pemberi_perintah`, `jumlah_hari`, `laporan_perjalanan`, `biaya_penginapan`, `biaya_tol`, `biaya_bahan_bakar`, `biaya_lain`, `bukti_penginapan`, `bukti_tol`, `bukti_bahan_bakar`, `bukti_lain`, `total_biaya`, `created_at`, `updated_at`) VALUES
(21, 15, 'Jakarta', '2025-01-01', '2025-02-01', 'Rapat', 'Bakti Raharja', 31, '-', 0, 0, 50000, 10000, '', '', '../../assets/bukti biaya/bahan bakar/1740155232-d1961d29560f41c0275095a84dfec990.png', '../../assets/bukti biaya/lain lain/1740155232-db8ce3b62335ed98078da69af34c44ea.png', 3160000, '2025-02-21 16:27:12', '2025-02-21 16:27:12'),
(22, 16, 'Karawang', '2025-02-05', '2025-02-08', 'Monitoring', 'Agil Kelana', 3, '-', 200000, 0, 0, 0, '../../assets/bukti biaya/penginapan/1740156564-33ea26650d9e2991f92d01c8f36481e7.png', '', '', '', 800000, '2025-02-21 16:37:52', '2025-02-21 16:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pengajuan`
--

CREATE TABLE `riwayat_pengajuan` (
  `id_riwayat` int NOT NULL,
  `id_pengajuan` int NOT NULL,
  `id_verifikator` int DEFAULT NULL,
  `tanggal_pengajuan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_pengajuan` enum('Pending','Ditolak','Disetujui') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Pending',
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `riwayat_pengajuan`
--

INSERT INTO `riwayat_pengajuan` (`id_riwayat`, `id_pengajuan`, `id_verifikator`, `tanggal_pengajuan`, `status_pengajuan`, `keterangan`, `created_at`, `updated_at`) VALUES
(19, 21, 6, '2025-02-21 16:27:12', 'Disetujui', 'Acc', '2025-02-21 16:27:12', '2025-02-21 16:29:20'),
(20, 22, 6, '2025-02-21 16:37:52', 'Disetujui', 'Acc', '2025-02-21 16:37:52', '2025-02-21 16:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `sppd_terverifikasi`
--

CREATE TABLE `sppd_terverifikasi` (
  `id_sppd` int NOT NULL,
  `id_riwayat` int NOT NULL,
  `no_surat` varchar(255) DEFAULT NULL,
  `tanggal_sppd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sppd_terverifikasi`
--

INSERT INTO `sppd_terverifikasi` (`id_sppd`, `id_riwayat`, `no_surat`, `tanggal_sppd`, `created_at`, `updated_at`) VALUES
(19, 19, '1/SPPD/KIKC/II/2025', '2025-02-21 16:29:20', '2025-02-21 16:29:20', '2025-02-21 16:29:20'),
(20, 20, '2/SPPD/KIKC/II/2025', '2025-02-21 16:55:54', '2025-02-21 16:55:54', '2025-02-21 16:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id_unit_kerja` int NOT NULL,
  `nama_unit_kerja` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `unit_kerja`
--

INSERT INTO `unit_kerja` (`id_unit_kerja`, `nama_unit_kerja`, `created_at`, `updated_at`) VALUES
(1, 'SDM dan Umum', '2025-01-02 03:35:44', '2025-01-18 15:16:50'),
(3, 'Pemasaran', '2025-02-07 16:22:31', '2025-02-07 16:22:31'),
(4, 'Akuntansi', '2025-02-08 03:13:46', '2025-02-08 03:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int NOT NULL,
  `id_pegawai` int DEFAULT NULL,
  `id_admin` int DEFAULT NULL,
  `role` enum('admin','pegawai') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `id_pegawai`, `id_admin`, `role`, `created_at`, `update_at`) VALUES
(16, NULL, 6, 'admin', '2025-02-05 05:20:35', '2025-02-05 05:20:35'),
(23, 15, NULL, 'pegawai', '2025-02-21 16:23:41', '2025-02-21 16:23:41'),
(24, 16, NULL, 'pegawai', '2025-02-21 16:35:08', '2025-02-21 16:35:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `no_badge` (`no_badge`),
  ADD UNIQUE KEY `no_badge_2` (`no_badge`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_unit_kerja` (`id_unit_kerja`);

--
-- Indexes for table `pengajuan_sppd`
--
ALTER TABLE `pengajuan_sppd`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `riwayat_pengajuan`
--
ALTER TABLE `riwayat_pengajuan`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `verifikator` (`id_verifikator`),
  ADD KEY `pengajuan_sppd` (`id_pengajuan`);

--
-- Indexes for table `sppd_terverifikasi`
--
ALTER TABLE `sppd_terverifikasi`
  ADD PRIMARY KEY (`id_sppd`),
  ADD KEY `riwayat_pengajuan` (`id_riwayat`);

--
-- Indexes for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id_unit_kerja`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD KEY `pegawai` (`id_pegawai`),
  ADD KEY `admin` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pengajuan_sppd`
--
ALTER TABLE `pengajuan_sppd`
  MODIFY `id_pengajuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `riwayat_pengajuan`
--
ALTER TABLE `riwayat_pengajuan`
  MODIFY `id_riwayat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sppd_terverifikasi`
--
ALTER TABLE `sppd_terverifikasi`
  MODIFY `id_sppd` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id_unit_kerja` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `id_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `id_unit_kerja` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id_unit_kerja`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `pengajuan_sppd`
--
ALTER TABLE `pengajuan_sppd`
  ADD CONSTRAINT `id_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_pengajuan`
--
ALTER TABLE `riwayat_pengajuan`
  ADD CONSTRAINT `pengajuan_sppd` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan_sppd` (`id_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `verifikator` FOREIGN KEY (`id_verifikator`) REFERENCES `admin` (`id_admin`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `sppd_terverifikasi`
--
ALTER TABLE `sppd_terverifikasi`
  ADD CONSTRAINT `riwayat_pengajuan` FOREIGN KEY (`id_riwayat`) REFERENCES `riwayat_pengajuan` (`id_riwayat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
