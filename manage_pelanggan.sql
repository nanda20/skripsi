-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2017 at 07:22 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manage_pelanggan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kode_baca`
--

CREATE TABLE `kode_baca` (
  `id` int(11) NOT NULL,
  `kabupaten` varchar(11) NOT NULL,
  `kecamatan` varchar(11) NOT NULL,
  `desa` varchar(11) NOT NULL,
  `baca_hari` varchar(11) NOT NULL,
  `kode_baca` varchar(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kode_baca`
--

INSERT INTO `kode_baca` (`id`, `kabupaten`, `kecamatan`, `desa`, `baca_hari`, `kode_baca`, `status`) VALUES
(2, '12', '12', '12', '002', '121212001', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `nama`, `jabatan`) VALUES
(1, 'nanda', '859a37720c27b9f70e11b79bab9318fe', 'dhitta nanda', 'supervisor'),
(6, 'dista', '54c4e9954a45edbd08909b5433002c1f', 'dista', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `log_pelanggan`
--

CREATE TABLE `log_pelanggan` (
  `id_pel` int(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_tiang` varchar(30) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `long` varchar(100) NOT NULL,
  `kode_baca` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_pelanggan`
--

INSERT INTO `log_pelanggan` (`id_pel`, `nama`, `alamat`, `no_tiang`, `lat`, `long`, `kode_baca`) VALUES
(999, 'hanif', 'Malang', '231', '123', '234', 'Rbc1');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pel` int(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_tiang` varchar(30) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `long` varchar(100) NOT NULL,
  `kode_baca` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pel`, `nama`, `alamat`, `no_tiang`, `lat`, `long`, `kode_baca`) VALUES
(2147483647, 'hafis', 'Klaten', '23', '99888', '88998', 'T121');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_pel` int(15) NOT NULL,
  `tgl` date NOT NULL,
  `stand_lalu` int(20) NOT NULL,
  `stand_kini` int(20) NOT NULL,
  `pemakaian` int(20) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_pel`, `tgl`, `stand_lalu`, `stand_kini`, `pemakaian`, `foto`, `keterangan`) VALUES
(24, 2147483647, '2017-07-29', 0, 500, 500, 'foto_170729183618.png', 'hahaha'),
(23, 2147483647, '2017-05-11', 0, 200, 200, 'foto_170729183410.jpg', 'hahahha'),
(25, 2147483647, '2017-05-05', 0, 2000, 2000, 'foto_170729184146.jpg', 'hahaha'),
(26, 2147483647, '2017-06-16', 0, 2000, 2000, 'foto_170729192125.jpg', 'hahaha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kode_baca`
--
ALTER TABLE `kode_baca`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_pelanggan`
--
ALTER TABLE `log_pelanggan`
  ADD PRIMARY KEY (`id_pel`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pel`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kode_baca`
--
ALTER TABLE `kode_baca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
