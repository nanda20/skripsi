-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19 Jul 2017 pada 08.12
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_pelanggan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `nama`, `jabatan`) VALUES
(1, 'nanda', '859a37720c27b9f70e11b79bab9318fe', 'dhitta nanda', 'supervisor'),
(6, 'dista', '54c4e9954a45edbd08909b5433002c1f', 'dista', 'superadmin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pel` int(15) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_tiang` varchar(30) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `long` varchar(100) NOT NULL,
  `kode_baca` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pel`, `nama`, `alamat`, `no_tiang`, `lat`, `long`, `kode_baca`) VALUES
(999, 'rahman', 'Malang', '231', '123', '234', 'Rbc1'),
(2147483647, 'arif', 'Klaten', '23', '99888', '88998', 'T121'),
(45, 'duso', 'hahaha', '1213', '213i10823', '256253265', 'hn'),
(49, 'hanif', 'karanganom', '09', '2131344335', '2342422', 'kl03010001'),
(1239, 'nanda', 'klaten', '12', '1616', '18181', 'ni1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
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
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_pel`, `tgl`, `stand_lalu`, `stand_kini`, `pemakaian`, `foto`, `keterangan`) VALUES
(35, 2147483647, '2017-07-19', 0, 4000, 4000, 'foto_170719035537.png', 'hahaha'),
(32, 1239, '2017-07-18', 0, 12121, 12121, 'foto_170718105756.jpg', 'hahahaha'),
(34, 999, '2017-07-13', 0, 5777, 5777, 'foto_170719035313.jpg', 'hahahha'),
(33, 999, '2017-07-06', 0, 5000, 5000, 'foto_170719035239.png', 'hahaha'),
(36, 2147483647, '2017-07-13', 0, 79000, 79000, 'foto_170719035628.png', 'hahhaha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
