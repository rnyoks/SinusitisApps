-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2018 at 09:37 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diagnosa`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayes_admin`
--

CREATE TABLE `bayes_admin` (
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) NOT NULL,
  `level` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayes_admin`
--

INSERT INTO `bayes_admin` (`user`, `pass`, `level`) VALUES
('admin', 'admin', 'admin'),
('user', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `bayes_aturan`
--

CREATE TABLE `bayes_aturan` (
  `ID` int(11) NOT NULL,
  `kode_penyakit` varchar(16) NOT NULL,
  `kode_gejala` varchar(16) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayes_aturan`
--

INSERT INTO `bayes_aturan` (`ID`, `kode_penyakit`, `kode_gejala`, `nilai`) VALUES
(39, 'B', '1', 0.7),
(40, 'D', '1', 0.7),
(41, 'F', '1', 0.6),
(42, 'A', '2', 0.9),
(43, 'F', '2', 0.5),
(44, 'B', '2', 0.1),
(45, 'F', '3', 0.75),
(46, 'B', '3', 0.7),
(47, 'F', '4', 0.2),
(48, 'A', '6', 0.95),
(49, 'D', '2', 0.2),
(50, 'F', '5', 0.9),
(51, 'D', '3', 0.2),
(52, 'F', '6', 0.3),
(53, 'A', '1', 0.2),
(54, 'A', '3', 0.2),
(55, 'A', '4', 0.2),
(56, 'A', '5', 0.2),
(57, 'A', '7', 0.2),
(58, 'B', '4', 0.9),
(59, 'B', '5', 0.3),
(60, 'B', '6', 0.3),
(61, 'B', '7', 0.2),
(62, 'D', '4', 0.2),
(63, 'D', '5', 0.2),
(64, 'D', '6', 0.7),
(65, 'D', '7', 0.9),
(66, 'F', '7', 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `bayes_gejala`
--

CREATE TABLE `bayes_gejala` (
  `kode_gejala` varchar(16) NOT NULL,
  `nama_gejala` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayes_gejala`
--

INSERT INTO `bayes_gejala` (`kode_gejala`, `nama_gejala`) VALUES
('1', 'Badan Panas'),
('2', 'Sakit Kepala'),
('3', 'Bersin '),
('4', 'Batuk'),
('5', 'Pilek'),
('6', 'Lemas'),
('7', 'Kedinginan');

-- --------------------------------------------------------

--
-- Table structure for table `bayes_penyakit`
--

CREATE TABLE `bayes_penyakit` (
  `kode_penyakit` varchar(16) NOT NULL,
  `nama_penyakit` varchar(255) NOT NULL,
  `bobot` double NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayes_penyakit`
--

INSERT INTO `bayes_penyakit` (`kode_penyakit`, `nama_penyakit`, `bobot`, `keterangan`) VALUES
('A', 'Anemia', 0.5, ''),
('B', 'Bronkhitis', 0.6, ''),
('D', 'Demam', 0.6, ''),
('F', 'Flu', 0.7, '');

-- --------------------------------------------------------

--
-- Table structure for table `bayes_user`
--

CREATE TABLE `bayes_user` (
  `id_user` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL DEFAULT 'user',
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayes_user`
--

INSERT INTO `bayes_user` (`id_user`, `user`, `pass`, `email`, `nama`, `level`, `alamat`) VALUES
(1, 'user', 'user', 'user@mail.com', 'Nama User', 'user', ''),
(2, 'pakar', 'pakar', 'pakar@mail.com', 'Nama Pakar', 'pakar', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayes_admin`
--
ALTER TABLE `bayes_admin`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `bayes_aturan`
--
ALTER TABLE `bayes_aturan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `bayes_gejala`
--
ALTER TABLE `bayes_gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indexes for table `bayes_penyakit`
--
ALTER TABLE `bayes_penyakit`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- Indexes for table `bayes_user`
--
ALTER TABLE `bayes_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayes_aturan`
--
ALTER TABLE `bayes_aturan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `bayes_user`
--
ALTER TABLE `bayes_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
