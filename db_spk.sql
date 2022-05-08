-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 08 Bulan Mei 2022 pada 11.59
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

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
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bobot` int(11) NOT NULL,
  `type` enum('cost','benefit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama`, `bobot`, `type`) VALUES
(1, 'IPK', 40, 'benefit'),
(2, 'Penghasilan Orang Tua', 30, 'cost'),
(3, 'Jumlah Saudara', 10, 'benefit'),
(4, 'Semester', 20, 'benefit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhs`
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
-- Dumping data untuk tabel `mhs`
--

INSERT INTO `mhs` (`id_mhs`, `nim`, `nama`, `tgl_lahir`, `prodi`, `nohp`, `email`, `alamat`) VALUES
(1, 12, 'as', '2022-04-13', 'as', '123', 'ayam@gmail.com', 'Jalan Hang Tuah'),
(3, 124, 'Saya', '2022-04-06', 'as', '082369940750', 'melda@gmail.com', 'Aceh Tamiang'),
(4, 213, 'Test', '2022-05-19', 'SI', '093845', 'testcoba@gmail.com', 'AT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `seleksi`
--

CREATE TABLE `seleksi` (
  `id_seleksi` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `seleksi`
--

INSERT INTO `seleksi` (`id_seleksi`, `id_mhs`, `id_subkriteria`) VALUES
(1, 1, 6),
(2, 1, 1),
(3, 1, 10),
(4, 1, 13),
(5, 3, 8),
(6, 3, 3),
(7, 3, 11),
(8, 3, 15),
(9, 4, 8),
(10, 4, 3),
(11, 4, 12),
(12, 4, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama_sub` varchar(30) NOT NULL,
  `bobot_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subkriteria`
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
(17, 3, '&gt; 4', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '$2y$10$/0o4KaFiRmMCylT1EPrJTuq1SiomOX9STLZEwHSyiRBa6ii0Xb1/G', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id_mhs`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indeks untuk tabel `seleksi`
--
ALTER TABLE `seleksi`
  ADD PRIMARY KEY (`id_seleksi`);

--
-- Indeks untuk tabel `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `seleksi`
--
ALTER TABLE `seleksi`
  MODIFY `id_seleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
