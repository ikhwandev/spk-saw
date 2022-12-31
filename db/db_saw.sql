-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2022 at 08:58 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_saw`
--

CREATE TABLE `kriteria_saw` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `bobot` double NOT NULL,
  `jenis` enum('cost','benefit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_saw`
--

INSERT INTO `kriteria_saw` (`id_kriteria`, `nama_kriteria`, `bobot`, `jenis`) VALUES
(1, 'EPS', 0.2, 'benefit'),
(2, 'PER', 0.2, 'benefit'),
(3, 'PBV', 0.2, 'benefit'),
(4, 'ROE', 0.2, 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_saw`
--

CREATE TABLE `nilai_saw` (
  `id_nilai` int(11) NOT NULL,
  `id_saham` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_saw`
--

INSERT INTO `nilai_saw` (`id_nilai`, `id_saham`, `id_kriteria`, `nilai`) VALUES
(1, 1, 1, 1129.34),
(2, 1, 2, 3.49),
(3, 1, 3, 1.66),
(4, 1, 4, 47.66),
(5, 2, 1, 60.39),
(6, 2, 2, 39.58),
(7, 2, 3, 10.72),
(8, 2, 4, 27.08),
(9, 3, 1, 127),
(10, 3, 2, 15.04),
(11, 3, 3, 2.14),
(12, 3, 4, 14.22),
(13, 4, 1, 4.17),
(14, 4, 2, 1461.43),
(15, 4, 3, 10.21),
(16, 4, 4, 0.7),
(17, 5, 1, 897.85),
(18, 5, 2, 7.27),
(19, 5, 3, 1.44),
(20, 5, 4, 19.78),
(21, 6, 1, 292.83),
(22, 6, 2, 28.17),
(23, 6, 3, 5.01),
(24, 6, 4, 17.78),
(25, 7, 1, 944.11),
(26, 7, 2, 9.16),
(27, 7, 3, 1.28),
(28, 7, 4, 13.94),
(29, 8, 1, 327.08),
(30, 8, 2, 13.51),
(31, 8, 3, 2.37),
(32, 8, 4, 17.54),
(33, 9, 1, 277.8),
(34, 9, 2, 5.4),
(35, 9, 3, 0.76),
(36, 9, 4, 14.02),
(37, 10, 1, 103.83),
(38, 10, 2, 10.35),
(39, 10, 3, 2.12),
(40, 10, 4, 20.44),
(41, 11, 1, 866.11),
(42, 11, 2, 10.77),
(43, 11, 3, 2.15),
(44, 11, 4, 19.96),
(45, 12, 1, 103.64),
(46, 12, 2, 13.75),
(47, 12, 3, 2.21),
(48, 12, 4, 16.08),
(49, 13, 1, 5.74),
(50, 13, 2, 142.87),
(51, 13, 3, 3.01),
(52, 13, 4, 2.12),
(53, 14, 1, 166.76),
(54, 14, 2, 1.62),
(55, 14, 3, 0.86),
(56, 14, 4, 53.36),
(57, 15, 1, 294.79),
(58, 15, 2, 18.74),
(59, 15, 3, 3.51),
(60, 15, 4, 18.76),
(61, 16, 1, 88.34),
(62, 16, 2, 18.57),
(63, 16, 3, 3.06),
(64, 16, 4, 16.48),
(65, 17, 1, 63.64),
(66, 17, 2, 6.57),
(67, 17, 3, 1.06),
(68, 17, 4, 16.16),
(69, 18, 1, 114.67),
(70, 18, 2, 21.63),
(71, 18, 3, 1.32),
(72, 18, 4, 6.08),
(73, 19, 1, -23.05),
(74, 19, 2, -10.33),
(75, 19, 3, 1.94),
(76, 19, 4, -18.82),
(77, 20, 1, 52.41),
(78, 20, 2, 17.03),
(79, 20, 3, 4.22),
(80, 20, 4, 24.56),
(81, 21, 1, 320.72),
(82, 21, 2, 5.49),
(83, 21, 3, 2.5),
(84, 21, 4, 45.54),
(85, 22, 1, 331.03),
(86, 22, 2, 27.11),
(87, 22, 3, 2.92),
(88, 22, 4, 10.76),
(89, 23, 1, 451.81),
(90, 23, 2, 14.77),
(91, 23, 3, 1.93),
(92, 23, 4, 13.06),
(93, 24, 1, 660.73),
(94, 24, 2, 9.19),
(95, 24, 3, 1.03),
(96, 24, 4, 11.22),
(97, 25, 1, 1143.59),
(98, 25, 2, 2.81),
(99, 25, 3, 1.15),
(100, 25, 4, 41.1),
(101, 26, 1, 2145.54),
(102, 26, 2, 4.17),
(103, 26, 3, 0.64),
(104, 26, 4, 15.4),
(105, 27, 1, 158.4),
(106, 27, 2, 58.08),
(107, 27, 3, 1.85),
(108, 27, 4, 3.18),
(109, 28, 1, 12111.07),
(110, 28, 2, 3.47),
(111, 28, 3, 2.15),
(112, 28, 4, 61.92),
(113, 29, 1, 189.61),
(114, 29, 2, 7.7),
(115, 29, 3, 1.36),
(116, 29, 4, 17.64),
(117, 30, 1, 69.84),
(118, 30, 2, 26.85),
(119, 30, 3, 4.61),
(120, 30, 4, 17.18),
(121, 31, 1, 119.61),
(122, 31, 2, 32.02),
(123, 31, 3, 6.01),
(124, 31, 4, 18.76),
(125, 32, 1, 319.08),
(126, 32, 2, 3.07),
(127, 32, 3, 1.27),
(128, 32, 4, 41.3),
(129, 33, 1, 74.37),
(130, 33, 2, 38.05),
(131, 33, 3, 8.16),
(132, 33, 4, 21.44),
(133, 34, 1, 159.84),
(134, 34, 2, 5.1),
(135, 34, 3, 0.68),
(136, 34, 4, 13.32),
(137, 35, 1, 292.21),
(138, 35, 2, 6.25),
(139, 35, 3, 1.16),
(140, 35, 4, 18.62),
(141, 36, 1, 1068.82),
(142, 36, 2, 3.95),
(143, 36, 3, 2.17),
(144, 36, 4, 54.84),
(145, 37, 1, 279.44),
(146, 37, 2, 26.66),
(147, 37, 3, 1.21),
(148, 37, 4, 4.56),
(149, 38, 1, 72.93),
(150, 38, 2, 35.38),
(151, 38, 3, 4.63),
(152, 38, 4, 13.08),
(153, 39, 1, 290.57),
(154, 39, 2, 4.73),
(155, 39, 3, 1.45),
(156, 39, 4, 30.68),
(157, 40, 1, 268.72),
(158, 40, 2, 16.11),
(159, 40, 3, 3.57),
(160, 40, 4, 22.14),
(161, 41, 1, 66.3),
(162, 41, 2, 18.48),
(163, 41, 3, 4.84),
(164, 41, 4, 26.22),
(165, 42, 1, -7.47),
(166, 42, 2, -327.92),
(167, 42, 3, 5.07),
(168, 42, 4, -1.56),
(169, 43, 1, 5552.94),
(170, 43, 2, 5.82),
(171, 43, 3, 1.55),
(172, 43, 4, 26.64),
(173, 44, 1, 179.81),
(174, 44, 2, 26.53),
(175, 44, 3, 39.85),
(176, 44, 4, 150.24),
(177, 45, 1, -2.97),
(178, 45, 2, -323.05),
(179, 45, 3, 0.64),
(180, 45, 4, -0.2);

-- --------------------------------------------------------

--
-- Table structure for table `saham_saw`
--

CREATE TABLE `saham_saw` (
  `id_saham` int(3) NOT NULL,
  `nama_saham` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saham_saw`
--

INSERT INTO `saham_saw` (`id_saham`, `nama_saham`) VALUES
(1, 'ADRO'),
(2, 'AMRT'),
(3, 'ANTM'),
(4, 'ARTO'),
(5, 'ASII'),
(6, 'BBCA'),
(7, 'BBNI'),
(8, 'BBRI'),
(9, 'BBTN'),
(10, 'BFIN'),
(11, 'BMRI'),
(12, 'BRIS'),
(13, 'BRPT'),
(14, 'BUKA'),
(15, 'CPIN'),
(16, 'EMTK'),
(17, 'ERAA'),
(18, 'EXCL'),
(19, 'GOTO'),
(20, 'HMSP'),
(21, 'HRUM'),
(22, 'ICBP'),
(23, 'INCO'),
(24, 'INDF'),
(25, 'INDY'),
(26, 'INKP'),
(27, 'INTP'),
(28, 'ITMG'),
(29, 'JPFA'),
(30, 'KLBF'),
(31, 'MDKA'),
(32, 'MEDC'),
(33, 'MIKA'),
(34, 'MNCN'),
(35, 'PGAS'),
(36, 'PTBA'),
(37, 'SMGR'),
(38, 'TBIG'),
(39, 'TINS'),
(40, 'TLKM'),
(41, 'TOWR'),
(42, 'TPIA'),
(43, 'UNTR'),
(44, 'UNVR'),
(45, 'WIKA');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$sf2q.DCpk8WWrRdxvt4tXeAHv5Z.iDrlZ7rejOSDpvRLp5q8qtldq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kriteria_saw`
--
ALTER TABLE `kriteria_saw`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai_saw`
--
ALTER TABLE `nilai_saw`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_saham` (`id_saham`);

--
-- Indexes for table `saham_saw`
--
ALTER TABLE `saham_saw`
  ADD PRIMARY KEY (`id_saham`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kriteria_saw`
--
ALTER TABLE `kriteria_saw`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nilai_saw`
--
ALTER TABLE `nilai_saw`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `saham_saw`
--
ALTER TABLE `saham_saw`
  MODIFY `id_saham` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai_saw`
--
ALTER TABLE `nilai_saw`
  ADD CONSTRAINT `nilai_saw_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria_saw` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_saw_ibfk_2` FOREIGN KEY (`id_saham`) REFERENCES `saham_saw` (`id_saham`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
