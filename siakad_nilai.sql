-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2021 at 06:44 PM
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
-- Database: `siakad_nilai`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` int(12) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `username`, `password`, `nama_guru`, `alamat`, `jenis_kelamin`, `email`, `telp`, `photo`, `id_mapel`) VALUES
(1, 12345, 'asd', 'Diah Agil', 'Solo', 'Perempuan', 'Diah@gmail.com', 214565327, 'default-7.jpg', 11),
(8, 12346, 'guru123', 'Adithya', 'Surakarta', 'Laki-Laki', 'muhammad.0718@students.amikom.ac.id', 0, 'default-61.jpg', 7),
(15, 12347, 'guru123', 'Siti', 'Surakarta', 'Perempuan', 'zidnie.iz@students.amikom.ac.id', 0, 'default-3.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(3, 'IPA 1'),
(5, 'IPA 2'),
(7, 'IPA 3'),
(8, 'IPS 1'),
(9, 'IPS 2');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL,
  `kkm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `kkm`) VALUES
(1, 'Bahasa Indonesia', 78),
(7, 'Bahasa Jawa', 77),
(10, 'Bahasa Jerman', 75),
(11, 'Matematika', 68),
(12, 'Fisika', 78);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `tugas` int(100) NOT NULL,
  `uts` int(100) NOT NULL,
  `uas` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nis`, `id_guru`, `id_mapel`, `semester`, `tugas`, `uts`, `uas`) VALUES
(69, 123, 30, 12, 1, 44, 66, 55),
(70, 124, 30, 12, 1, 55, 88, 66),
(71, 125, 30, 12, 1, 66, 88, 99),
(72, 123, 1, 11, 1, 44, 66, 55),
(73, 124, 1, 11, 1, 55, 88, 66),
(74, 125, 1, 11, 1, 66, 88, 99),
(75, 123, 8, 7, 1, 88, 66, 55),
(76, 124, 8, 7, 1, 55, 88, 66),
(77, 125, 8, 7, 1, 66, 55, 34),
(78, 123, 1, 11, 2, 44, 66, 55),
(79, 124, 1, 11, 2, 55, 88, 66),
(80, 125, 1, 11, 2, 66, 88, 99),
(81, 123, 15, 10, 1, 88, 97, 99),
(82, 124, 15, 10, 1, 98, 99, 97),
(83, 125, 15, 10, 1, 99, 88, 98);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `username`, `password`, `nama_siswa`, `jenis_kelamin`, `alamat`, `photo`, `id_kelas`) VALUES
(7, 123, 'asd', 'Reiner', 'Perempuan', 'Magelang', 'default-94.jpg', 3),
(8, 124, '0', 'Budhi', 'Laki-Laki', 'Wonosobo', 'default-21.jpg', 3),
(11, 125, '0', 'Muhammad', 'Laki-Laki', 'Grabag', 'default-4.jpg', 9),
(13, 127, '0', 'Setiawan', 'Laki-Laki', 'Jogja', 'default-910.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` enum('admin','wali_kelas') NOT NULL,
  `blokir` enum('N','Y') NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `level`, `blokir`, `id_kelas`) VALUES
(11, 'Roberto', 'sss', 'sss@gmail.com', 'wali_kelas', 'Y', 9),
(12, 'admin', 'admin', 'admin@gmail.com', 'admin', 'N', 3),
(14, 'Adit', 'asd', 'admin@gmail.com', 'wali_kelas', 'N', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_kelas` (`id_mapel`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
