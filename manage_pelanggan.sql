-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2017 at 03:17 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

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
(1, 'nanda', '827ccb0eea8a706c4c34a16891f84e7b', 'dhitta nanda', 'supervisor'),
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
(99, 'Bokir Men', 'Jl. Semanggi 43B', '231893', '2323312', '21321', 'BBC'),
(999, 'hanif', 'Malang', '231', '123', '234', 'Rbc1'),
(2222, 'nanda Aja', 'Jl.Senggani 43b', '109213', '131312', '221432', 'ABC');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(2) NOT NULL,
  `id_pel` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `no_tiang` varchar(30) DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `long` varchar(50) DEFAULT NULL,
  `kode_baca` varchar(9) DEFAULT NULL,
  `tanggal_baca` date DEFAULT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `id_pel`, `nama`, `alamat`, `no_tiang`, `lat`, `long`, `kode_baca`, `tanggal_baca`, `status`) VALUES
(1, '151135246', 'MP KARANGDUWET', 'KARANGDUWET RT30/RW11 KRAJAN, JATINOM', 'K2-151/49', '-7.61292', '110.58787', 'JTN04001A', '2017-08-07', 'selesai'),
(2, '151121114', 'MP KUNCEN', 'KUNCEN RT27/RW10 KRAJAN,JATINOM', 'K2-151/44', '-7.61450', '110.58657', 'JTN04002A', '2017-08-07', ''),
(3, '161773861', 'MP KRAJAN', 'KRAJAN RT07/RW02 KRAJAN JATINOM', 'K2-16/6      ', '-7.62693', '110.59597', 'JTN04003A', '0000-00-00', ''),
(4, '161770186', 'MP KRAJAN', 'KRAJAN RT07/RW02 KRAJAN JATINOM', 'K2-5D/A', '-7.62819', '110.59576', 'JTN04004A', '0000-00-00', ''),
(5, '162822287', 'MP BURIKAN', 'BURIKAN RT. 38 RW. 18 SOCOKANGSI JATINOM', 'K2-19/17', '-7.62703', '110.56516', 'JTN10002A', '0000-00-00', ''),
(6, '8099484', 'MP SLUWENG', 'SLUWENG RT. 7 RW. 4 TLOGOWATU  KEMALANG', 'K2-12/36O', '-7.60646', '110.49545', 'KML01001B', '0000-00-00', ''),
(7, '162817499', 'MP KARANGJATI', 'DK KARANGJATI RT10 RW05 GUMUL KARANGNONGKO', 'K2-120L/13B', '-7.69209', '110.53553', 'KNK01001B', '0000-00-00', ''),
(8, '162803064', 'MP TEMPEL', 'DK TEMPEL RT09/RW05 GUMUL KARANGNONGKO', 'K2-120L/14', '-7.69296', '110.53709', 'KNK01002B', '0000-00-00', ''),
(9, '162817608', 'MP KLEGENKIDUL', 'DK. KLEGEN KIDUL RT. 3/2 GUMUL KARANGNONGKO', 'K2-103L815A', '-7.70175', '110.53959', 'KNK01003B', '0000-00-00', ''),
(10, '151122479', 'MP SABRANG', 'DK.SABRANG RT2/RW6 KARANGAN KARANGANOM', 'K4-136B', '-7.64646', '110.63241', 'KRA06001A', '0000-00-00', ''),
(11, '151135067', 'MP NGAWINAN', 'DK. NGAWINAN RT. 01 RW. 03 JURANGJERO KARANGANOM', 'K4-153/14A', '-7.63730', '110.63697', 'KRA07001A', '0000-00-00', ''),
(12, '162796235', 'MP SENENG1', 'DK. SENENG RT. 6 RW. 3 BRANGKAL KARANGANOM', 'K4-153/33', '-7.64095', '110.64600', 'KRA08001A', '0000-00-00', ''),
(13, '151135081', 'MP SENENG2', 'DK. SENENG RT. 6 RW. 3 BRANGKAL KARANGANOM', 'K4-153/34', '-7.64108', '110.64668', 'KRA08002A', '0000-00-00', ''),
(14, '151134688', 'MP SOKOKULON', 'DK. SOKOKULON RT. 8 RW. 4 BRANGKAL KARANGANOM', 'K4-153/39', '-7.64198', '110.64854', 'KRA08003A', '0000-00-00', ''),
(15, '151135252', 'MP SOKOWETAN', 'DK. SOKOWETAN RT. 10 RW. 5 BRANGKAL KARANGANOM', 'K4-150/48   ', '-7.64459', '110.65155', 'KRA08004A', '0000-00-00', ''),
(16, '162822433', 'MP TEGALKRAGILAN', 'TEGAL KRAGILAN BRANGKAL KARANGANOM', 'K4-15E/2', '-7.64792', '110.65021', 'KRA08005B', '0000-00-00', ''),
(17, '162822305', 'MP BRANGKAL', 'BRANGKAL RT18 RW09 BRANGKAL KARANGANOM', 'K4-25/7I', '-7.65047', '110.64616', 'KRA08006B', '0000-00-00', ''),
(18, '161773936', 'MP NGENTAK', 'NGENTAK RT15/08 BRANGKAL KARANGANOM KLATEN', 'K4-25/7C', '-7.65229', '110.64909', 'KRA08007B', '0000-00-00', ''),
(19, '151134613', 'MP BANGSAN', 'DK. BANGSAN RT. 17 RW. 08 KUNDEN KARANGANOM', 'K4-25/21B', '-7.65155', '110.65572', 'KRA15001B', '0000-00-00', ''),
(20, '151134679', 'MP JLAPAN', 'DK. JLAPAN KUNDEN KARANGANOM', 'K4-25/9', '-7.65276', '110.65170', 'KRA15002B', '0000-00-00', ''),
(21, '151122434', 'MP TEGALSARI', 'DK. TEGALSARI RT.9 RW. 4 KUNDEN KARANGANOM', 'K4-25/1', '-7.65700', '110.64893', 'KRA15003B', '0000-00-00', ''),
(22, '162817656', 'MP TEGALREJO', 'TEGALREJO RT. 3 RW. 1 TEGALREJO SAWIT', 'K4-30G/2B', '-7.58611', '110.66365', 'SWT01001C', '0000-00-00', ''),
(23, '162817925', 'MP NGORO-ORO', 'NGORO-ORO RT. 4 RW. 1 TEGALREJO SAWIT', 'K4-30G/2C', '-7.58597', '110.66316', 'SWT01002C', '0000-00-00', ''),
(24, '8099488', 'MP TEGALREJO 2', 'TEGALREJO RT. 1 RW. 1 TEGALREJO SAWIT', 'K4-2/3', '-7.58675', '110.66531', 'SWT01003C', '0000-00-00', ''),
(25, '8099389', 'MP TEGALREJO 3', 'TEGALREJO RT. 2 RW. 1 TEGALREJO SAWIT', 'K4-30E/5', '-7.58607', '110.66520', 'SWT01004C', '0000-00-00', ''),
(26, '151135246', 'MP KARANGDUWET', 'KARANGDUWET RT30/RW11 KRAJAN, JATINOM', 'K2-151/49', '-7.61292', '110.58787', 'JTN04001A', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id1` int(11) NOT NULL,
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

INSERT INTO `transaksi` (`id`, `id1`, `id_pel`, `tgl`, `stand_lalu`, `stand_kini`, `pemakaian`, `foto`, `keterangan`) VALUES
(27, 1, 151135246, '2017-07-30', 2000, 5000, 3000, 'IMG_20170730_132447.jpg', 'Komponen dalam rusak parah tapi ga parah parah amat'),
(23, 2, 2147483647, '2017-05-11', 0, 200, 200, 'foto_170729183410.jpg', 'hahahha'),
(25, 3, 2147483647, '2017-05-05', 0, 2000, 2000, 'foto_170729184146.jpg', 'hahaha'),
(26, 4, 2147483647, '2017-06-16', 0, 2000, 2000, 'foto_170729192125.jpg', 'hahaha'),
(76, 1, 151135246, '2017-08-07', 5000, 10000, 5000, 'IMG_20170807_225123.jpg', 'kobongan');

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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
