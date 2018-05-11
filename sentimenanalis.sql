-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2018 at 05:48 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sentimenanalis`
--

-- --------------------------------------------------------

--
-- Table structure for table `datacorpus`
--

CREATE TABLE `datacorpus` (
  `id` int(11) NOT NULL,
  `feature` varchar(100) NOT NULL,
  `frequency` int(11) NOT NULL,
  `label` varchar(20) NOT NULL,
  `valueChiSquare` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datacorpus`
--

INSERT INTO `datacorpus` (`id`, `feature`, `frequency`, `label`, `valueChiSquare`) VALUES
(1, 'tiket ', 3, 'netral', 4.3589743589744),
(2, 'bisa', 3, 'netral', 2.8274078862314),
(3, 'berangkat', 6, 'netral', 6.0355029585799),
(4, 'batal', 2, 'netral', 2.8021978021978),
(5, 'sancaka', 2, 'netral', 2.8021978021978),
(6, 'khauripan', 2, 'netral', 2.8021978021978),
(7, 'akhir', 2, 'netral', 2.8021978021978),
(8, 'kiaracondong', 2, 'netral', 2.8021978021978),
(9, 'bandung', 2, 'netral', 2.8021978021978),
(10, 'kediri', 2, 'netral', 2.8021978021978),
(11, 'alami', 2, 'netral', 2.8021978021978),
(12, 'tunda', 2, 'netral', 2.8021978021978),
(13, 'naik', 1, 'positif', 2.8027950310559),
(14, 'api', 1, 'positif', 3.3990147783251),
(15, 'taksaka', 1, 'positif', 3.3990147783251),
(16, 'jurusan', 1, 'positif', 3.3990147783251),
(17, 'layan', 1, 'positif', 3.4989648033126),
(18, 'bagus', 1, 'positif', 3.3990147783251),
(19, 'dingin', 1, 'positif', 3.3990147783251),
(20, 'sms', 1, 'positif', 3.3990147783251),
(21, 'minta', 1, 'positif', 3.3990147783251),
(22, 'selimut', 1, 'positif', 3.3990147783251),
(23, 'langsung', 1, 'positif', 3.3990147783251),
(24, 'datang', 1, 'positif', 3.3990147783251),
(25, 'terima', 1, 'positif', 3.3990147783251),
(26, 'kasih', 1, 'positif', 3.3990147783251),
(27, 'kembali', 1, 'positif', 3.3990147783251),
(28, 'apresiasi', 1, 'positif', 3.3990147783251),
(29, 'sampai', 1, 'positif', 3.3990147783251),
(30, 'jadi', 2, 'positif', 5.6174516908213),
(31, 'motivasi', 1, 'positif', 3.3990147783251),
(32, 'kami', 1, 'positif', 3.3990147783251),
(33, 'terus', 1, 'positif', 3.3990147783251),
(34, 'tingkat', 1, 'positif', 3.3990147783251),
(35, 'layan', 1, 'positif', 3.4989648033126),
(36, 'lebih', 1, 'positif', 3.3990147783251),
(37, 'baik', 1, 'positif', 3.3990147783251),
(38, 'depan', 1, 'positif', 3.3990147783251),
(39, 'satu', 2, 'positif', 5.6174516908213),
(40, 'inovasi', 2, 'positif', 7.0408163265306),
(41, 'sembah', 2, 'positif', 7.0408163265306),
(42, 'buatan', 2, 'positif', 7.0408163265306),
(43, 'asli ', 2, 'positif', 3.4989648033126),
(44, 'hadir', 2, 'positif', 7.0408163265306),
(45, 'untuk ', 2, 'positif', 3.4989648033126),
(46, 'negeri', 2, 'positif', 7.0408163265306),
(47, 'moga', 1, 'positif', 2.8027950310559),
(48, 'sukses', 1, 'positif', 3.3990147783251),
(49, 'pak', 2, 'positif', 5.0873281308064),
(50, 'sudah', 1, 'positif', 3.3990147783251),
(51, 'Keren', 1, 'positif', 3.3990147783251),
(52, 'tipe', 1, 'positif', 3.3990147783251),
(53, 'macam', 2, 'negatif', 4.2857142857143),
(54, 'kereta', 6, 'negatif', 4.3218954248366),
(55, 'stasiun', 3, 'negatif', 2.9881422924901),
(56, 'jam', 2, 'negatif', 4.1257142857143),
(57, 'tidak', 2, 'negatif', 4.2857142857143),
(58, 'argo', 1, 'negatif', 4.2857142857143),
(59, 'jam', 1, 'negatif', 4.1257142857143),
(60, 'semua', 2, 'negatif', 3.0315656565657),
(61, 'gubeng', 2, 'negatif', 4.2857142857143),
(62, 'lambat', 2, 'negatif', 4.2857142857143),
(63, 'imbas', 2, 'negatif', 4.2857142857143),
(64, 'celaka', 2, 'negatif', 4.2857142857143),
(65, 'kemarin', 2, 'negatif', 4.2857142857143),
(66, 'tidak', 2, 'negatif', 4.2857142857143);

-- --------------------------------------------------------

--
-- Table structure for table `datafeature`
--

CREATE TABLE `datafeature` (
  `id` int(11) NOT NULL,
  `feature` varchar(100) NOT NULL,
  `frequency` int(11) NOT NULL,
  `label` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datafeature`
--

INSERT INTO `datafeature` (`id`, `feature`, `frequency`, `label`) VALUES
(1, 'apa', 3, 'netral'),
(2, 'tiket ', 3, 'netral'),
(3, 'bisa', 3, 'netral'),
(4, 'pesan', 1, 'netral'),
(5, 'satu', 1, 'netral'),
(6, 'jam', 2, 'netral'),
(7, 'sebelum', 1, 'netral'),
(8, 'berangkat', 6, 'netral'),
(9, 'batal', 2, 'netral'),
(10, 'serta', 1, 'netral'),
(11, 'semua', 1, 'netral'),
(12, 'identitas', 1, 'netral'),
(13, 'asli', 1, 'netral'),
(14, 'fotokopi', 1, 'netral'),
(15, 'setiap', 1, 'netral'),
(16, 'wakil', 1, 'netral'),
(17, 'saya', 1, 'netral'),
(18, 'mau', 1, 'netral'),
(19, 'tanya', 1, 'netral'),
(20, 'untuk', 1, 'netral'),
(21, 'bulan', 1, 'netral'),
(22, 'februari', 1, 'netral'),
(23, 'tanggal', 1, 'netral'),
(24, 'ada', 1, 'netral'),
(25, 'promo', 1, 'netral'),
(26, 'tolong', 1, 'netral'),
(27, 'cara', 1, 'netral'),
(28, 'harus', 1, 'netral'),
(29, 'stasiun', 4, 'netral'),
(30, 'dekat', 1, 'netral'),
(31, 'mudah', 1, 'netral'),
(32, 'langgan', 1, 'netral'),
(33, 'Jadwal ', 1, 'netral'),
(34, 'baru', 1, 'netral'),
(35, 'sancaka', 2, 'netral'),
(36, 'jogja', 2, 'netral'),
(37, 'semula', 1, 'netral'),
(38, 'masih', 1, 'netral'),
(39, 'tetap', 1, 'netral'),
(40, 'batu ', 1, 'netral'),
(41, 'ceper', 1, 'netral'),
(42, 'rangkasbitung', 1, 'netral'),
(43, 'ada', 1, 'netral'),
(44, 'kereta', 4, 'netral'),
(45, 'suka', 1, 'netral'),
(46, 'gara', 1, 'netral'),
(47, 'film', 1, 'netral'),
(48, 'arini', 1, 'netral'),
(49, 'jenis', 1, 'netral'),
(50, 'buat', 1, 'netral'),
(51, 'kelas', 1, 'netral'),
(52, 'bisnis', 1, 'netral'),
(53, 'pesawat', 1, 'netral'),
(54, 'terbang', 1, 'netral'),
(55, 'khauripan', 2, 'netral'),
(56, 'tujuan', 2, 'netral'),
(57, 'akhir', 2, 'netral'),
(58, 'kiaracondong', 2, 'netral'),
(59, 'bandung', 2, 'netral'),
(60, 'kediri', 2, 'netral'),
(61, 'alami', 2, 'netral'),
(62, 'tunda', 2, 'netral'),
(63, 'atur', 1, 'netral'),
(64, 'antisipasi', 1, 'netral'),
(65, 'dampak', 1, 'netral'),
(66, 'demo', 1, 'netral'),
(67, 'moga', 1, 'netral'),
(68, 'keluarga', 1, 'netral'),
(69, 'bapak', 1, 'netral'),
(70, 'mustofa', 1, 'netral'),
(71, 'masinis', 1, 'netral'),
(72, 'sore ', 1, 'netral'),
(73, 'beri', 1, 'netral'),
(74, 'tabah', 1, 'netral'),
(75, 'bogor', 2, 'netral'),
(76, 'naik', 1, 'positif'),
(77, 'kereta', 2, 'positif'),
(78, 'api', 1, 'positif'),
(79, 'taksaka', 1, 'positif'),
(80, 'jurusan', 1, 'positif'),
(81, 'layan', 1, 'positif'),
(82, 'bagus', 1, 'positif'),
(83, 'dingin', 1, 'positif'),
(84, 'sms', 1, 'positif'),
(85, 'minta', 1, 'positif'),
(86, 'selimut', 1, 'positif'),
(87, 'langsung', 1, 'positif'),
(88, 'datang', 1, 'positif'),
(89, 'terima', 1, 'positif'),
(90, 'kasih', 1, 'positif'),
(91, 'kembali', 1, 'positif'),
(92, 'apresiasi', 1, 'positif'),
(93, 'sampai', 1, 'positif'),
(94, 'jadi', 2, 'positif'),
(95, 'motivasi', 1, 'positif'),
(96, 'kami', 1, 'positif'),
(97, 'terus', 1, 'positif'),
(98, 'tingkat', 1, 'positif'),
(99, 'layan', 1, 'positif'),
(100, 'lebih', 1, 'positif'),
(101, 'baik', 1, 'positif'),
(102, 'depan', 1, 'positif'),
(103, 'satu', 2, 'positif'),
(104, 'inovasi', 2, 'positif'),
(105, 'sembah', 2, 'positif'),
(106, 'buatan', 2, 'positif'),
(107, 'asli ', 2, 'positif'),
(108, 'hadir', 2, 'positif'),
(109, 'untuk ', 2, 'positif'),
(110, 'negeri', 2, 'positif'),
(111, 'moga', 1, 'positif'),
(112, 'sukses', 1, 'positif'),
(113, 'pak', 2, 'positif'),
(114, 'sudah', 1, 'positif'),
(115, 'mas', 1, 'positif'),
(116, 'Keren', 1, 'positif'),
(117, 'tipe', 1, 'positif'),
(118, 'apa', 1, 'positif'),
(119, 'banyak', 1, 'negatif'),
(120, 'penunjuk', 1, 'negatif'),
(121, 'arah', 1, 'negatif'),
(122, 'notifikasi', 1, 'negatif'),
(123, 'salah', 1, 'negatif'),
(124, 'macam', 2, 'negatif'),
(125, 'naik', 1, 'negatif'),
(126, 'kereta', 6, 'negatif'),
(127, 'stasiun', 3, 'negatif'),
(128, 'mau', 1, 'negatif'),
(129, 'singa', 1, 'negatif'),
(130, 'udara', 1, 'negatif'),
(131, 'bisa', 1, 'negatif'),
(132, 'jam', 2, 'negatif'),
(133, 'penumpang', 1, 'negatif'),
(134, 'jalur', 1, 'negatif'),
(135, 'numpuk', 1, 'negatif'),
(136, 'jadwal', 1, 'negatif'),
(137, 'tidak', 2, 'negatif'),
(138, 'tepat', 1, 'negatif'),
(139, 'waktu', 1, 'negatif'),
(140, 'argowilis', 1, 'negatif'),
(141, 'ada', 1, 'negatif'),
(142, 'apa', 1, 'negatif'),
(143, 'argo', 1, 'negatif'),
(144, 'bromo', 1, 'negatif'),
(145, 'anggrek', 1, 'negatif'),
(146, 'gerbong', 1, 'negatif'),
(147, 'tujuan ', 1, 'negatif'),
(148, 'jatinegara', 1, 'negatif'),
(149, 'enak', 1, 'negatif'),
(150, 'tidur', 1, 'negatif'),
(151, 'rokok', 1, 'negatif'),
(152, 'Ayah', 1, 'negatif'),
(153, 'pagi', 1, 'negatif'),
(154, 'guna', 1, 'negatif'),
(155, 'Malioboro', 1, 'negatif'),
(156, 'express', 1, 'negatif'),
(157, 'jam', 1, 'negatif'),
(158, 'hingga ', 1, 'negatif'),
(159, 'masih ', 1, 'negatif'),
(160, 'tahan', 1, 'negatif'),
(161, 'hari', 1, 'negatif'),
(162, 'saya', 1, 'negatif'),
(163, 'rasa', 1, 'negatif'),
(164, 'kecawa', 1, 'negatif'),
(165, 'dengan', 1, 'negatif'),
(166, 'layan', 1, 'negatif'),
(167, 'hampir', 2, 'negatif'),
(168, 'semua', 2, 'negatif'),
(169, 'gubeng', 2, 'negatif'),
(170, 'lambat', 2, 'negatif'),
(171, 'imbas', 2, 'negatif'),
(172, 'celaka', 2, 'negatif'),
(173, 'kemarin', 2, 'negatif'),
(174, 'umumkan', 2, 'negatif'),
(175, 'jadi', 2, 'negatif'),
(176, 'tidak', 2, 'negatif'),
(177, 'ruang', 2, 'negatif'),
(178, 'tunggu', 2, 'negatif'),
(179, 'motor', 1, 'negatif'),
(180, 'tabrak', 1, 'negatif'),
(181, 'sendiri', 1, 'negatif');

-- --------------------------------------------------------

--
-- Table structure for table `datanb`
--

CREATE TABLE `datanb` (
  `id` int(11) NOT NULL,
  `feature` varchar(100) NOT NULL,
  `frequency` int(11) NOT NULL,
  `label` varchar(20) NOT NULL,
  `naivebayesvalue` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `datastemming`
--

CREATE TABLE `datastemming` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `tweet` text NOT NULL,
  `label` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datastemming`
--

INSERT INTO `datastemming` (`id`, `username`, `tweet`, `label`) VALUES
(1, 'kalimat 1', 'apa tiket bisa pesan satu jam sebelum berangkat', 'netral'),
(2, 'kalimat 6', 'batal tiket apa serta semua identitas asli fotokopi setiap bisa wakil\n', 'netral'),
(3, 'kalimat 8', 'saya mau tanya untuk bulan februari tanggal ada promo', 'netral'),
(4, 'kalimat 9 ', 'tolong cara batal tiket harus stasiun dekat bisa mudah langgan', 'netral'),
(5, 'kalimat 13', 'Jadwal baru sancaka jogja semula jam masih tetap apa', 'netral'),
(6, 'kalimat 15', 'stasiun batu ceper rangkasbitung ada kereta', 'netral'),
(7, 'kalimat 17', 'suka stasiun gara film arini kereta', 'netral'),
(8, 'kalimat 20', 'jenis buat kelas bisnis pesawat terbang', 'netral'),
(9, 'kalimat 22', 'kereta khauripan tujuan akhir kiaracondong bandung kediri alami tunda berangkat', 'netral'),
(10, 'kalimat 24', 'atur berangkat kereta antisipasi dampak demo', 'netral'),
(11, 'kalimat 25', 'moga keluarga bapak mustofa masinis sancaka sore beri tabah', 'netral'),
(12, 'kalimat 26', 'stasiun bogor', 'netral'),
(13, 'kalimat 2', 'naik kereta api taksaka jurusan layan bagus dingin sms minta selimut langsung datang', 'positif'),
(14, 'kalimat 4', 'terima kasih kembali apresiasi sampai jadi motivasi kami terus tingkat layan lebih baik depan', 'positif'),
(15, 'kalimat 18', 'satu inovasi sembah buatan asli hadir untuk negeri', 'positif'),
(16, 'kalimat 19', 'moga sukses pak', 'positif'),
(17, 'kalimat 28', 'sudah jadi mas', 'positif'),
(18, 'kalimat 29', 'satu inovasi sembah buatan asli hadir untuk negeri', 'positif'),
(19, 'kalimat 30', 'Keren pak kereta tipe apa', 'positif'),
(20, 'kalimat 12', 'kereta khauripan tujuan akhir kiaracondong bandung kediri alami tunda berangkat', 'netral'),
(21, 'kalimat 3', 'banyak penunjuk arah notifikasi salah macam', 'negatif'),
(22, 'kalimat 5', 'naik kereta stasiun macam mau singa udara bisa jam', 'negatif'),
(23, 'kalimat 7', 'penumpang jalur numpuk jadwal tidak tepat waktu', 'negatif'),
(24, 'kalimat 10', 'jam kereta argowilis ada apa', 'negatif'),
(25, 'kalimat 11', 'argo bromo anggrek gerbong tujuan jatinegara enak tidur ada rokok kereta', 'negatif'),
(26, 'kalimat 14', 'Ayah pagi guna kereta Malioboro express jam hingga masih tahan', 'negatif'),
(27, 'kalimat 21', 'hari saya rasa kecawa dengan layan', 'negatif'),
(28, 'kalimat 23', 'hampir semua kereta stasiun gubeng lambat imbas celaka kemarin umumkan jadi tidak ruang tunggu', 'negatif'),
(29, 'kalimat 27', 'hamir semua kereta stasiun gubeng lambat imbas celaka kemarin', 'negatif'),
(30, 'kalimat 16', 'motor tabrak sendiri', 'negatif');

-- --------------------------------------------------------

--
-- Table structure for table `datatraining`
--

CREATE TABLE `datatraining` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `tweet` text NOT NULL,
  `label` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datatraining`
--

INSERT INTO `datatraining` (`id`, `username`, `tweet`, `label`) VALUES
(1, 'feyhaysnamrif', 'RT @ayokepariaman: Minangkabau Ekspres , rute : Stasiun Padang - Bandara Internasional Minangkabau (PP) @PTKAI  https://t.co/eLyuX0hmzl #kai', 'positif'),
(2, 'ekofandi8', '@pemkotsby \n@PTKAI \n@e100ss tolong dong segera diselesaikan perlintasan kereta api dekat rsi, sdh berapa bulan tidak tersentuh sama sekali.', 'negatif'),
(3, 'dimasrizky_ch', 'RT @fransfirlana: Hai @PTKAI Tolong dong tenggang waktu bayar utk pemesanan tiket KA jarak jauh diperpanjang lg jd 3 jam lagi. Ini kl 1 jam…', 'netral'),
(4, 'Daratina_', '@PTKAI selamat malam, maaf mau tanya, buat tiket kereta penatanan, yang dari SGU ke malang buat jam 17.41 apa masih ada?? terimakasih', 'netral'),
(5, 'Dwi_ihsan89', 'Udah pasin waktu tapi hasilnya nihil, goblog emang managementnya @PTKAI sama @CommuterLine', ''),
(6, 'ItsAlfin', '@PTKAI ini perlintasan kereta api kalibata ga ada jadwalnya yaa..masa tiap detik kereta lewat, malah bikin maceeeee… https://t.co/NK3fVsIzAA', ''),
(7, 'tempewarrior', 'Berkah untuk @PTKAI besok2 kereta jakarta bandung gerbongnya ditambah dong, saya mau naik https://t.co/fkam7Y6lYa', 'positif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datacorpus`
--
ALTER TABLE `datacorpus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datafeature`
--
ALTER TABLE `datafeature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datanb`
--
ALTER TABLE `datanb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datastemming`
--
ALTER TABLE `datastemming`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datatraining`
--
ALTER TABLE `datatraining`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datacorpus`
--
ALTER TABLE `datacorpus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `datafeature`
--
ALTER TABLE `datafeature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;
--
-- AUTO_INCREMENT for table `datanb`
--
ALTER TABLE `datanb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `datastemming`
--
ALTER TABLE `datastemming`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `datatraining`
--
ALTER TABLE `datatraining`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
