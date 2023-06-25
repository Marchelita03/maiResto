-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 04:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mairesto`
--

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `hak_akses` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `keterangan`, `hak_akses`, `username`, `password`) VALUES
(1, 'admin', 1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'umum', 2, 'umum', 'adfab9c56b8b16d6c067f8d3cff8818e');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `tgl_lahir`, `alamat`, `jabatan`) VALUES
(1, 'Marchelita', '2002-02-02', 'Yogyakarta', 'Admin'),
(2, 'Hendery', '1999-06-07', 'Bandung', 'Pramusaji');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `jenis` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `jenis`) VALUES
(1, 'Beban Gaji', 'beban'),
(2, 'Beban Sewa', 'beban'),
(3, 'Penjualan', 'masuk'),
(4, 'Beban Bahan Baku', 'keluar'),
(5, 'Penjualan Merchandise', 'masuk'),
(7, 'Kas', 'masuk'),
(8, 'Penjualan Merchandise', 'keluar'),
(10, 'Dll', 'keluar'),
(11, 'Beban Listrik dan Air', 'beban'),
(12, 'Dll', 'masuk');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `pendapatan` int(11) NOT NULL,
  `pengeluaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id_keuangan`, `jenis`, `tanggal`, `kategori`, `keterangan`, `pendapatan`, `pengeluaran`) VALUES
(1, 'masuk', '2023-01-09', 'Penjualan', 'Penjualan Merchandise', 1450000, 0),
(3, 'masuk', '2023-01-30', 'Penjualan Merchandise', 'Sofenir Tas Kain 26', 230000, 0),
(4, 'masuk', '2023-03-08', 'Penjualan', 'Penjualan ', 400000, 0),
(7, 'keluar', '2023-01-09', 'Beban Bahan Baku', 'Biaya Pengiriman', 0, 1100000),
(8, 'keluar', '2023-01-09', 'Beban Bahan Baku', 'Penjualan ', 0, 1600000),
(12, 'masuk', '2023-05-11', 'Kas', 'Penjualan Merchandise', 300000, 0),
(14, 'beban', '2023-05-11', 'Beban Gaji', 'Gaji Karyawan', 0, 160000),
(15, 'keluar', '2023-05-19', 'Dll', 'Daging', 0, 2100000),
(19, 'keluar', '2023-05-17', 'Dll', 'Penjualan Merchandise', 0, 1500000),
(20, 'beban', '2023-05-12', 'Beban Sewa', 'Sewa Ruko', 0, 1200000),
(21, 'beban', '2023-05-11', 'Beban Sewa', 'Sewa Peralatan', 0, 250000),
(22, 'masuk', '2023-05-31', 'Penjualan', 'Souvenir gantungan kunci 2 BOX', 160000, 0),
(23, 'keluar', '2023-06-02', 'Beban Bahan Baku', 'Sayuran', 0, 54000),
(24, 'masuk', '2023-05-31', 'Penjualan Merchandise', 'Biaya Pengiriman', 210000, 0),
(25, 'keluar', '2023-06-02', 'Beban Bahan Baku', 'Sofenir gantungan kunci 2 box', 0, 20000),
(26, 'beban', '2023-06-01', 'Beban Listrik dan Air', 'Biaya Pengiriman', 0, 200000),
(27, 'masuk', '2023-05-31', 'Penjualan', 'Penjualan Merchandise', 2100000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `harga` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga`) VALUES
(1, 'Bakso', '15000'),
(2, 'Soto', '12000'),
(3, 'Mie Ayam ', '10000'),
(4, 'Sup Buah', '8000');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga_lama` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tanggal`, `nama_menu`, `jumlah`, `harga_lama`, `total`) VALUES
(1, '2023-05-10', 'Soto', 2, 12000, 0),
(2, '2023-05-10', 'Bakso', 8, 15000, 0),
(4, '2023-05-11', 'Mie Ayam ', 3, 10000, 0),
(5, '2023-05-11', 'Bakso', 1, 15000, 0),
(6, '2023-05-17', 'Mie Ayam ', 2, 10000, 0),
(7, '2023-05-18', 'Soto', 2, 12000, 0),
(9, '2023-06-05', 'Bakso', 3, 15000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
