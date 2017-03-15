-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2017 at 11:06 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `departement_id` int(11) NOT NULL,
  `facility_id` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `type` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=incidental  1=regular',
  `day_regular` char(7) NOT NULL,
  `file_attacment` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `departement_id`, `facility_id`, `date_from`, `date_to`, `time_from`, `time_to`, `name`, `description`, `type`, `day_regular`, `file_attacment`) VALUES
(554, 35, 34, '2017-01-09', '2017-01-13', '07:00:00', '09:19:00', 'Andi', '<p>Melakukan Sosialisasi terhadap para konsument.</p>', '0', '0000000', 'file_554.jpg'),
(555, 35, 27, '2017-01-10', '2017-01-12', '09:00:00', '12:00:00', 'Andi R', '<p>Untuk Bepergian Belanja ATK</p>', '0', '0000000', 'file_555.txt'),
(553, 32, 27, '2017-01-06', '2017-01-09', '08:12:00', '14:00:00', 'Achmad Arifin', '<p>Untuk Beli Peralatan</p>', '0', '0000000', 'file_553.jpg'),
(552, 33, 33, '2017-01-07', '2017-01-15', '09:00:00', '14:00:00', 'Achmad Arifin', '<p>Membahas Keuangan Perusahaan</p>', '1', '1000100', 'file_552.jpg'),
(550, 31, 21, '2017-01-08', '2017-01-11', '07:00:00', '09:19:00', 'Achmad Arifin', '<p>Di gunakan Untuk melakukan kepentingan kantor di luar</p>', '0', '0000000', 'file_550.jpg'),
(551, 32, 36, '2017-01-08', '2017-01-11', '07:00:00', '09:19:00', 'Achmad Arifin', '<p>Untuk Test Karyawan IT.</p>', '1', '1100010', 'file_551.jpg'),
(549, 32, 28, '2017-01-08', '2017-01-19', '08:12:00', '14:00:00', 'Achmad Arifin', '<p>Di gunakan untuk melakukan sosialisasi Karyawan departemen IT.</p>', '1', '1100000', 'file_549.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_delete` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=not delete, 1=delete'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`id`, `name`, `is_delete`) VALUES
(36, 'Owner', '0'),
(35, 'Marketing', '0'),
(34, 'Klinik', '0'),
(33, 'Kasir', '0'),
(32, 'IT', '0'),
(31, 'Human Resource', '0'),
(30, 'Headmaster', '0'),
(29, 'Facility', '1'),
(39, 'Faciliti', '0'),
(42, 'OB', '1');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_delete` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=not delete, 1=delete'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`id`, `name`, `is_delete`) VALUES
(21, 'Mobil', '0'),
(27, 'Motor', '0'),
(28, 'Ruangan Presentasi', '0'),
(34, 'Lahan Parkir', '0'),
(33, 'Ruangan Rapat', '0'),
(35, 'Loby', '0'),
(36, 'Ruang LAB', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `member_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=556;
--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
