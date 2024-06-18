-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2024 at 08:33 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webkelas`
--

-- --------------------------------------------------------

--
-- Table structure for table `catatan_khusus`
--

CREATE TABLE `catatan_khusus` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `catatan_text` text NOT NULL,
  `guru_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catatan_khusus`
--

INSERT INTO `catatan_khusus` (`id`, `siswa_id`, `catatan_text`, `guru_id`) VALUES
(13, 14, 'saas\r\n', 212126),
(14, 16, 'Mantap', 212126),
(15, 14, 'Boleh uga lu', 212126),
(16, 14, 'Boleh uga lu', 212126),
(17, 15, 'Bab 1 - Bab 6', 212130),
(18, 15, 'Keren Gammara', 212130);

-- --------------------------------------------------------

--
-- Table structure for table `catatan_perkembangan`
--

CREATE TABLE `catatan_perkembangan` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `wali_kelas_id` int(11) NOT NULL,
  `catatan_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catatan_perkembangan`
--

INSERT INTO `catatan_perkembangan` (`id`, `siswa_id`, `wali_kelas_id`, `catatan_text`) VALUES
(11, 15, 1, 'Ganteng'),
(13, 15, 1, 'Anaknya Baik, Baik Dipukul'),
(14, 14, 212123, 'Disiplin'),
(15, 14, 212126, 'Sangat Pintar, teman\"nya Iri dengan Skill Ngodingnya'),
(16, 14, 0, 'Kern\r\n'),
(17, 14, 0, 'lanjut'),
(18, 14, 0, 'lanjut'),
(19, 14, 0, 'lanjut'),
(20, 14, 0, 'lanjut'),
(21, 15, 212126, 'Kamu Malas'),
(22, 15, 212126, 'Kamu Malas'),
(23, 15, 212125, 'Akhir\" ini Bombom sdh bisa naik Kelas'),
(24, 15, 1, 'Kamu bodoh');

-- --------------------------------------------------------

--
-- Table structure for table `curhat`
--

CREATE TABLE `curhat` (
  `id` int(11) NOT NULL,
  `curhat_text` text NOT NULL,
  `response_text` text NOT NULL,
  `siswa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `curhat`
--

INSERT INTO `curhat` (`id`, `curhat_text`, `response_text`, `siswa_id`) VALUES
(22, 'Saya sebenarnya suka sama ibu💘', 'Bombom ingat Jangan Pacar - Pacaran', 14),
(23, 'Curhatan dari bom-bom nih', 'apa sede', 15);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama`, `nip`) VALUES
(1, 'Ibrahim Mallombassang', 8129918),
(2, 'Alim S.Pd', 75987213),
(212123, 'Fajar Shiddiq S.Kom', 2147483647),
(212124, 'Saleh Burhan S.Pd', 2323029),
(212125, 'Adrianty S.Kom', 121973971),
(212126, 'Waroyah S.Pd, M.Pd', 32971721),
(212127, 'Anies S.Pd', 362813),
(212128, 'Tenri S.Pd', 5431823),
(212130, 'Fadhil ST., S.', 12345678);

-- --------------------------------------------------------

--
-- Table structure for table `ide`
--

CREATE TABLE `ide` (
  `id` int(11) NOT NULL,
  `ide_text` text NOT NULL,
  `response_text` text NOT NULL,
  `siswa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ide`
--

INSERT INTO `ide` (`id`, `ide_text`, `response_text`, `siswa_id`) VALUES
(4, 'ini ide dari alkawsar .....', 'mantap idenya alkwar', 14),
(5, 'Ini dari alkawsar\r\n', 'apa bikin', 14),
(6, 'Sebaiknya WC nya pasang CCTV', '', 14),
(7, 'sas', '', 14),
(8, 'Ide dari bom bom nih', '', 15),
(9, 'Sebaiknya pakaian sekolah cukup daleman aja khusus perempuan 👍', '', 15);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `wali_kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `wali_kelas_id`) VALUES
(5, 'XI RPL 2', 1),
(9, 'XI RPL 1', 212124),
(10, 'X RPL', 212123),
(11, 'XI AP 1', 212126),
(12, 'XI AP 2', 2),
(13, 'XI AP 3', 212125),
(14, 'XI AP 4', 212127);

-- --------------------------------------------------------

--
-- Table structure for table `pivot_guru_kelas`
--

CREATE TABLE `pivot_guru_kelas` (
  `id_pivot` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating_guru`
--

CREATE TABLE `rating_guru` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `rating` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating_guru`
--

INSERT INTO `rating_guru` (`id`, `siswa_id`, `guru_id`, `rating`) VALUES
(29, 15, 1, 5),
(30, 14, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nis` varchar(100) NOT NULL,
  `nisn` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `nis`, `nisn`, `alamat`, `tgl_lahir`, `id_kelas`) VALUES
(14, 'Andi Muh Raihan alkawsar', '22355', '0077865020', 'Jl GB Saraung LR 254/12A', '2024-06-12', 9),
(15, 'Abd Rahman N.', '22351', '0061352650', 'Sungai Preman', '2004-06-16', 9),
(16, 'Ahmad Anugrah Satra', '22352', '0082182', 'Malengkeri', '2024-06-03', 9),
(17, 'Ahsan Putri Ahyar', '22353', '00927826868', 'Jl Veteran ', '2024-06-14', 9),
(18, 'Andi Ashadela Maharani Anil', '22354', '90210980', 'Jl -', '2024-06-12', 9),
(19, 'Chairil Abizali Alim', '2256', '927127197', 'Jl itumo', '2024-06-12', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
('3', 'ibrahim', '3'),
('4', 'anty', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catatan_khusus`
--
ALTER TABLE `catatan_khusus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gr` (`guru_id`),
  ADD KEY `fk_siswa` (`siswa_id`);

--
-- Indexes for table `catatan_perkembangan`
--
ALTER TABLE `catatan_perkembangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkk` (`siswa_id`);

--
-- Indexes for table `curhat`
--
ALTER TABLE `curhat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curhat_fk` (`siswa_id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ide`
--
ALTER TABLE `ide`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ide` (`siswa_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk` (`wali_kelas_id`);

--
-- Indexes for table `pivot_guru_kelas`
--
ALTER TABLE `pivot_guru_kelas`
  ADD PRIMARY KEY (`id_pivot`),
  ADD KEY `guru` (`id_guru`),
  ADD KEY `kelas` (`id_kelas`);

--
-- Indexes for table `rating_guru`
--
ALTER TABLE `rating_guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_guru` (`siswa_id`),
  ADD KEY `rating_guru_guru` (`guru_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk` (`id_kelas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catatan_khusus`
--
ALTER TABLE `catatan_khusus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `catatan_perkembangan`
--
ALTER TABLE `catatan_perkembangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `curhat`
--
ALTER TABLE `curhat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212131;

--
-- AUTO_INCREMENT for table `ide`
--
ALTER TABLE `ide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pivot_guru_kelas`
--
ALTER TABLE `pivot_guru_kelas`
  MODIFY `id_pivot` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating_guru`
--
ALTER TABLE `rating_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `catatan_khusus`
--
ALTER TABLE `catatan_khusus`
  ADD CONSTRAINT `fk_gr` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_siswa` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `catatan_perkembangan`
--
ALTER TABLE `catatan_perkembangan`
  ADD CONSTRAINT `fkk` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `curhat`
--
ALTER TABLE `curhat`
  ADD CONSTRAINT `curhat_fk` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ide`
--
ALTER TABLE `ide`
  ADD CONSTRAINT `ide` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `fk` FOREIGN KEY (`wali_kelas_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pivot_guru_kelas`
--
ALTER TABLE `pivot_guru_kelas`
  ADD CONSTRAINT `guru` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating_guru`
--
ALTER TABLE `rating_guru`
  ADD CONSTRAINT `rating_guru` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_guru_guru` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `pk` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
