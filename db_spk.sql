-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2022 at 08:58 AM
-- Server version: 5.7.33
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bobot` int(11) NOT NULL,
  `type` enum('cost','benefit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama`, `bobot`, `type`) VALUES
(1, 'IPK', 40, 'benefit'),
(2, 'Penghasilan Orang Tua', 30, 'cost'),
(3, 'Jumlah Saudara', 10, 'benefit'),
(4, 'Semester', 20, 'benefit'),
(5, 'Kepemilikan Rumah', 20, 'cost'),
(6, 'Token Listrik', 35, 'cost'),
(7, 'Jumlah Kendaraan', 15, 'cost'),
(8, 'Organisasi', 25, 'benefit'),
(9, 'Prestasi', 30, 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `id_mhs` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `prodi` varchar(150) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`id_mhs`, `nim`, `nama`, `tgl_lahir`, `prodi`, `nohp`, `email`, `alamat`) VALUES
(1, 12, 'as', '2022-04-13', 'as', '123', 'ayam@gmail.com', 'Jalan Hang Tuah'),
(3, 124, 'Saya', '2022-04-06', 'as', '082369940750', 'melda@gmail.com', 'Aceh Tamiang'),
(4, 213, 'Test', '2022-05-19', 'SI', '093845', 'testcoba@gmail.com', 'AT'),
(5, 12321, 'Imelda Elvanni', '2022-05-24', 'SI', '4334324223', 'imelda@gmail.com', 'lkdaf');

-- --------------------------------------------------------

--
-- Table structure for table `seleksi`
--

CREATE TABLE `seleksi` (
  `id_seleksi` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seleksi`
--

INSERT INTO `seleksi` (`id_seleksi`, `id_mhs`, `id_subkriteria`) VALUES
(29, 1, 6),
(30, 1, 1),
(31, 1, 13),
(32, 1, 10),
(33, 1, 18),
(34, 1, 21),
(35, 1, 28),
(36, 1, 33),
(37, 1, 38),
(38, 3, 7),
(39, 3, 3),
(40, 3, 13),
(41, 3, 12),
(42, 3, 19),
(43, 3, 22),
(44, 3, 27),
(45, 3, 32),
(46, 3, 38),
(47, 4, 9),
(48, 4, 1),
(49, 4, 15),
(50, 4, 11),
(51, 4, 18),
(52, 4, 21),
(53, 4, 27),
(54, 4, 34),
(55, 4, 38);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama_sub` varchar(30) NOT NULL,
  `bobot_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `id_kriteria`, `nama_sub`, `bobot_sub`) VALUES
(1, 2, '&amp;lt; 1000000', 10),
(2, 2, '1000000 - 1999999', 20),
(3, 2, '2000000 - 3000000', 30),
(4, 2, '&gt; 3000000', 40),
(6, 1, '&amp;lt; 2.00', 10),
(7, 1, '2.00 - 3.00', 20),
(8, 1, '3.01 - 3.50', 30),
(9, 1, '&gt; 3.50', 40),
(10, 4, '&amp;lt; 4', 10),
(11, 4, '4 - 6', 20),
(12, 4, '&gt; 6', 30),
(13, 3, '&amp;lt;= 1', 10),
(14, 3, '2', 20),
(15, 3, '3', 30),
(16, 3, '4', 40),
(17, 3, '&gt; 4', 50),
(18, 5, 'Rumah Kontrak', 10),
(19, 5, 'Rumah Milik Keluarga', 20),
(20, 5, 'Rumah Pribadi', 30),
(21, 6, '450 kVA', 10),
(22, 6, '900 kVA', 20),
(23, 6, '1300 kVA', 30),
(24, 6, '2200 kVA', 40),
(25, 6, '3500 kVA', 50),
(26, 7, '0', 10),
(27, 7, '1', 20),
(28, 7, '2', 30),
(29, 7, '3', 40),
(30, 7, '&gt;= 4', 50),
(31, 8, '0', 10),
(32, 8, '1', 20),
(33, 8, '2', 30),
(34, 8, '3', 40),
(35, 8, '&gt;= 4', 50),
(36, 9, 'Tidak ada Prestasi', 10),
(37, 9, 'Tingkat Provinsi', 20),
(38, 9, 'Tingkat Nasional', 30),
(39, 9, 'Tingkat Internasional', 40);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '$2y$10$/0o4KaFiRmMCylT1EPrJTuq1SiomOX9STLZEwHSyiRBa6ii0Xb1/G', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id_mhs`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `seleksi`
--
ALTER TABLE `seleksi`
  ADD PRIMARY KEY (`id_seleksi`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seleksi`
--
ALTER TABLE `seleksi`
  MODIFY `id_seleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
