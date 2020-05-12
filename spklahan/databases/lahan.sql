-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 01:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Table structure for table `air`
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
-- Dumping data for table `air`
--

INSERT INTO `air` (`id_air`, `nama`, `kecamatan`, `desa`, `namapetugas`, `kekeruhan`, `sisakhlor`, `ph`, `hasil`) VALUES
(1, '1', 'WIROSARI', '0', 'Budi', 7, 7, 8, 0),
(2, '1', 'WIROSARI', '0', 'Budi', 1, 1, 1, 0),
(3, '1', 'WIROSARI', '0', 'Budi', 1, 1, 1, 0),
(4, 'budi', 'WIROSARI', '0', 'andi', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `id` int(20) NOT NULL,
  `kriteria` varchar(50) NOT NULL,
  `bobot` int(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `jenis` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`id`, `kriteria`, `bobot`, `keterangan`, `jenis`) VALUES
(1, 'sumberair', 30, '', 1),
(2, 'minatmasyarakat', 10, '', 1),
(3, 'segikesehatan', 20, '', 1),
(4, 'jaraksumberair', 10, '', 1),
(5, 'investor', 10, '', 2),
(6, 'perizinan', 5, '', 1),
(7, 'konturtanah', 10, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lahan`
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
-- Dumping data for table `lahan`
--

INSERT INTO `lahan` (`id`, `nama`, `namapetugas`, `kecamatan`, `desa`, `sumberair`, `minatmasyarakat`, `segikesehatan`, `jaraksumberair`, `perizinan`, `investor`, `konturtanah`, `hasil`, `status`) VALUES
(1, '', '', '', '', 1, 91, 1, 4, 1, 39, 1, 3.071185346778, 0),
(2, '', '', '', '', 2, 85, 2, 7, 2, 42, 2, 3.3292342346635, 0),
(3, '', '', '', '', 1, 64, 2, 4, 1, 42, 2, 3.1023716881346, 0),
(4, '', '', '', '', 1, 88, 1, 2, 2, 47, 2, 3.1002845894102, 0),
(5, '', '', '', '', 1, 86, 1, 2, 1, 36, 1, 3.0275664854897, 0),
(6, '', '', '', '', 1, 84, 1, 1, 1, 45, 2, 3.0639370237146, 0),
(7, '', '', '', '', 2, 60, 2, 15, 1, 22, 1, 3.2754061320644, 0),
(8, '', '', '', '', 1, 80, 1, 2, 2, 47, 2, 3.0916019623561, 0),
(9, '', '', '', '', 2, 55, 1, 3, 1, 28, 1, 3.1689121408522, 0),
(10, '', 'Budi', 'WIROSARI', '0', 2, 36, 2, 17, 0, 28, 2, 3.3191528658945, 0),
(11, '', 'Budi', '11', '1', 1, 100, 1, 13, 0, 50, 1, 3.1726431045686, 0),
(12, '2121', '', '11', '1', 1, 100, 1, 15, 1, 50, 1, 3.1855411855, 0),
(13, '2121', '', '11', '1', 1, 100, 1, 15, 1, 50, 1, 3.1855411855, 3),
(14, '2121', '', '11', 'SAMBIREJO', 1, 100, 1, 0, 1, 50, 1, 2.6476426939465, 0),
(15, '2121', '', '11', 'SAMBIREJO', 1, 100, 1, 0, 1, 50, 1, 2.6476426939465, 0),
(16, '3', '', 'WIROSARI', 'SAMBIREJO', 2, 100, 1, 4, 1, 50, 1, 3.2609256261589, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
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
-- Dumping data for table `pendaftaran`
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
-- Table structure for table `statuslahan`
--

CREATE TABLE `statuslahan` (
  `id_statuslahan` int(20) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuslahan`
--

INSERT INTO `statuslahan` (`id_statuslahan`, `kecamatan`, `desa`, `status`) VALUES
(8, 'WIROSARI', '0', 'Lahan Tidak layak'),
(9, 'WIROSARI', 'SAMBIREJO', 'Lahan Rekomendasi'),
(10, '11', '1', 'Lahan Rekomendasi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `level`, `gambar`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, ''),
(2, 'asdhakfillah', 'asdhakfillah', '1d76db61a86c8519cfcca35ff5642e2b', 2, 'default.png'),
(3, 'petugaslapangan', 'petugaslapangan', 'd5e66b6daf432554bcfd04cee0e3082c', 3, 'default.png'),
(4, 'petugaspusat', 'petugaspusat', 'a960144d9d4d524a6b87563157776dd6', 1, 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `air`
--
ALTER TABLE `air`
  ADD PRIMARY KEY (`id_air`);

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
