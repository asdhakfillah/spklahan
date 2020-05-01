-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Apr 2020 pada 05.18
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lahan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `air`
--

CREATE TABLE `air` (
  `id_air` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `desa` varchar(20) NOT NULL,
  `namapetugas` varchar(20) NOT NULL,
  `kekeruhan` int(50) NOT NULL,
  `sisakhlor` int(50) NOT NULL,
  `ph` int(50) NOT NULL,
  `hasil` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `air`
--

INSERT INTO `air` (`id_air`, `nama`, `kecamatan`, `desa`, `namapetugas`, `kekeruhan`, `sisakhlor`, `ph`, `hasil`) VALUES
(1, '1', 'WIROSARI', '0', 'Budi', 7, 7, 8, 0),
(2, '1', 'WIROSARI', '0', 'Budi', 1, 1, 1, 0),
(3, '1', 'WIROSARI', '0', 'Budi', 1, 1, 1, 0),
(4, 'budi', 'WIROSARI', '0', 'andi', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lahan`
--

CREATE TABLE `lahan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `namapetugas` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `sumberair` int(11) NOT NULL,
  `minatmasyarakat` int(11) NOT NULL,
  `segikesehatan` int(11) NOT NULL,
  `jaraksumberair` int(11) NOT NULL,
  `perizinan` int(11) NOT NULL,
  `investor` int(11) NOT NULL,
  `konturtanah` int(11) NOT NULL,
  `hasil` double NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lahan`
--

INSERT INTO `lahan` (`id`, `nama`, `namapetugas`, `kecamatan`, `desa`, `sumberair`, `minatmasyarakat`, `segikesehatan`, `jaraksumberair`, `perizinan`, `investor`, `konturtanah`, `hasil`, `status`) VALUES
(1, '', '', '', '', 1, 91, 1, 4, 1, 39, 1, 0.51272341136758, 0),
(2, '', '', '', '', 2, 85, 2, 7, 2, 42, 2, 0.83593110147476, 0),
(3, '', '', '', '', 1, 64, 2, 4, 1, 42, 2, 0.61517204398369, 0),
(4, '', '', '', '', 1, 88, 1, 2, 2, 47, 2, 0.53647258833984, 0),
(5, '', '', '', '', 1, 86, 1, 2, 1, 36, 1, 0.49257234327243, 0),
(6, '', '', '', '', 1, 84, 1, 1, 1, 45, 2, 0.49618218715124, 0),
(7, '', '', '', '', 2, 60, 2, 15, 1, 22, 1, 0.85947595125386, 0),
(8, '', '', '', '', 1, 80, 1, 2, 2, 47, 2, 0.53008707745256, 0),
(9, '', '', '', '', 2, 55, 1, 3, 1, 28, 1, 0.63239411353186, 0),
(10, '', 'Budi', 'WIROSARI', '0', 2, 36, 2, 17, 0, 28, 2, 0.42692857142857, 0),
(11, '', 'Budi', '11', '1', 1, 100, 1, 13, 0, 50, 1, 0.27123529411765, 0),
(12, '2121', '', '11', '1', 1, 100, 1, 15, 1, 50, 1, 0, 0),
(13, '2121', '', '11', '1', 1, 100, 1, 15, 1, 50, 1, 0, 3),
(14, '2121', '', '11', 'SAMBIREJO', 1, 100, 1, 0, 1, 50, 1, 0, 0),
(15, '2121', '', '11', 'SAMBIREJO', 1, 100, 1, 0, 1, 50, 1, 0, 0),
(16, '3', '', 'WIROSARI', 'SAMBIREJO', 2, 100, 1, 4, 1, 50, 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `desa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `nama`, `no_telpon`, `tanggal`, `kecamatan`, `desa`) VALUES
(1, '1', '1', '2020-03-09', 'WIROSARI', ''),
(2, '2121', '1', '2020-03-19', '11', ''),
(3, 'budi', '1', '2020-04-02', 'WIROSARI', ''),
(4, 'joko', '1', '2020-04-10', 'WIROSARI', '1'),
(5, 'bagus', '1', '2020-04-08', 'WIROSARI', '1'),
(6, 'bagus', '1', '2020-04-02', 'WIROSARI', '1'),
(7, '3', '1', '2020-04-16', 'WIROSARI', 'SAMBIREJO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statuslahan`
--

CREATE TABLE `statuslahan` (
  `id_statuslahan` int(20) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `statuslahan`
--

INSERT INTO `statuslahan` (`id_statuslahan`, `kecamatan`, `desa`, `status`) VALUES
(8, 'WIROSARI', '0', 'Lahan Tidak layak'),
(9, 'WIROSARI', 'SAMBIREJO', 'Lahan Rekomendasi'),
(10, '11', '1', 'Lahan Rekomendasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(10) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `level`, `gambar`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, ''),
(2, 'asdhakfillah', 'asdhakfillah', '1d76db61a86c8519cfcca35ff5642e2b', 2, 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `air`
--
ALTER TABLE `air`
  ADD PRIMARY KEY (`id_air`);

--
-- Indexes for table `lahan`
--
ALTER TABLE `lahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuslahan`
--
ALTER TABLE `statuslahan`
  ADD PRIMARY KEY (`id_statuslahan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `air`
--
ALTER TABLE `air`
  MODIFY `id_air` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lahan`
--
ALTER TABLE `lahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `statuslahan`
--
ALTER TABLE `statuslahan`
  MODIFY `id_statuslahan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
