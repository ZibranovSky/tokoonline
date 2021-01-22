-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2021 at 12:43 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_cupang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nama` text NOT NULL,
  `kontak` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `kontak`, `foto`) VALUES
(6, 'zibranov', 'f0d41169b915110691006ec2b6525ee9', 'zibranovsky', 'zibranov', '173-hibiki01011.jpg'),
(10, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', '325-admin logoZ.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_checkout`
--

CREATE TABLE `tb_checkout` (
  `id` int(11) NOT NULL,
  `kdpesanan` text NOT NULL,
  `kdproduk` text NOT NULL,
  `nm_produk` text NOT NULL,
  `kduser` text NOT NULL,
  `nmuser` text NOT NULL,
  `jml_beli` int(11) NOT NULL,
  `total` text NOT NULL,
  `foto` text NOT NULL,
  `tstamp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id` int(11) NOT NULL,
  `kduser` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nama` text NOT NULL,
  `kontak` text NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL,
  `tstamp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id`, `kduser`, `username`, `password`, `nama`, `kontak`, `alamat`, `foto`, `tstamp`) VALUES
(6, '5ff266fb27982', 'raphael.hasiando1@gmail.com', '0c95fad809534c582d3c32c53920aa2f', 'Hibiki Chan ', '08120202020202', 'Perumahan Bukit Cileungsi Indah Blok A2 no 3, Kec Klapanunggal, Kabupaten Bogor', '', '04-01-2021 07:53 am'),
(7, '5ff92c97ad9c7', 'zibranfitadiyatamamodapk@gmail.com', 'a302a27ce3dbcf7f6ace5d7e3bbd659f', 'Moehammad Zibran', 'kontak@gmail.com', 'Perumahan Jatiari', '', '09-01-2021 11:09 am'),
(8, '5ffceb98734df', 'ariesintyar@gmail.com', '0c95fad809534c582d3c32c53920aa2f', 'karyawan', 'kontak$gmail.com', 'fedfef', '', '12-01-2021 07:21 am'),
(9, '5fff95f468d10', 'moehammaddjibran191202@gmail.com', '0c95fad809534c582d3c32c53920aa2f', 'Moehammad Zibran F', '08120202020202', 'Bogor', '', '14-01-2021 07:53 am'),
(10, '600ab7d954bb6', 'pitakode@gmail.com', '76589f6f141e2235ea44ec829db94fe5', 'Pita Kode', '08120202020202', 'Jakarta Pusat', '', '22-01-2021 06:32 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id` int(11) NOT NULL,
  `kduser` text NOT NULL,
  `kdproduk` text NOT NULL,
  `nm_produk` text NOT NULL,
  `jenis` text NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` text NOT NULL,
  `tstamp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id` int(11) NOT NULL,
  `kdproduk` text NOT NULL,
  `nm_produk` text NOT NULL,
  `stok` text NOT NULL,
  `harga` text NOT NULL,
  `deskripsi` text NOT NULL,
  `jenis` text NOT NULL,
  `foto` text NOT NULL,
  `tstamp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id`, `kdproduk`, `nm_produk`, `stok`, `harga`, `deskripsi`, `jenis`, `foto`, `tstamp`) VALUES
(1, '3201293920', 'Cupang XYZ', '6', '10000', 'Cupang ini memiliki warna yang menarik', '', '313-cupang3.jpeg', '31-12-2020 02:34 pm'),
(4, 'KD002', 'Cupang BlueRay', '12', '5000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod       tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,       quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo       consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse       cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non       proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'partai', '262-cupang2.jpeg', '16-01-2021 07:53 am'),
(6, 'KD004', 'Cupang XYZ', '53', '10000', 'Cupang XYZ', 'satuan', '360-logoPita.jpg', '22-01-2021 06:30 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk_masuk`
--

CREATE TABLE `tb_produk_masuk` (
  `id` int(11) NOT NULL,
  `noinv` text NOT NULL,
  `kdproduk` text NOT NULL,
  `nm_produk` text NOT NULL,
  `stok` text NOT NULL,
  `jml_masuk` text NOT NULL,
  `tstamp` text NOT NULL,
  `admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk_masuk`
--

INSERT INTO `tb_produk_masuk` (`id`, `noinv`, `kdproduk`, `nm_produk`, `stok`, `jml_masuk`, `tstamp`, `admin`) VALUES
(4, '005', 'KD004', 'Cupang XYZ', '47', '6', '22-01-2021 06:31 pm', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `kdpesanan` text NOT NULL,
  `kdproduk` text NOT NULL,
  `nm_produk` text NOT NULL,
  `kduser` text NOT NULL,
  `nmuser` text NOT NULL,
  `alamat` text NOT NULL,
  `kontak` text NOT NULL,
  `jml_beli` text NOT NULL,
  `total` text NOT NULL,
  `status` text NOT NULL,
  `val` text NOT NULL,
  `foto` text NOT NULL,
  `tstamp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `kdpesanan`, `kdproduk`, `nm_produk`, `kduser`, `nmuser`, `alamat`, `kontak`, `jml_beli`, `total`, `status`, `val`, `foto`, `tstamp`) VALUES
(26, '5ffbcd33dcc78', '3201293920', 'Cupang XYZ', '5ff92c97ad9c7', 'Moehammad Zibran', 'Perumahan Jatiari', 'kontak@gmail.com', '3', '36000', '00', '0', '313-cupang3.jpeg', '11-01-2021 10:59 am'),
(27, '600ab813d3ce2', '3201293920', 'Cupang XYZ', '600ab7d954bb6', 'Pita Kode', 'Jakarta Pusat', '08120202020202', '5', '56000', '11', '1', '313-cupang3.jpeg', '22-01-2021 06:34 pm');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_temp`
--

CREATE TABLE `transaksi_temp` (
  `id` int(11) NOT NULL,
  `kdproduk` text NOT NULL,
  `nm_produk` text NOT NULL,
  `jumlah_beli` text NOT NULL,
  `total` text NOT NULL,
  `tstamp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_checkout`
--
ALTER TABLE `tb_checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_produk_masuk`
--
ALTER TABLE `tb_produk_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_temp`
--
ALTER TABLE `transaksi_temp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_checkout`
--
ALTER TABLE `tb_checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_produk_masuk`
--
ALTER TABLE `tb_produk_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `transaksi_temp`
--
ALTER TABLE `transaksi_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
