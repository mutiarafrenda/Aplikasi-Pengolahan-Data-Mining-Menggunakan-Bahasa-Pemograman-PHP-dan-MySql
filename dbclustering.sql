-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2018 at 12:07 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbclustering`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(15) NOT NULL,
  `email` varchar(15) NOT NULL,
  `telpon` varchar(12) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `telpon`, `username`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '082384669587', 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `idbarang` int(11) NOT NULL AUTO_INCREMENT,
  `data_barang` varchar(3) NOT NULL,
  `tanggal` date NOT NULL DEFAULT '0000-00-00',
  `nama_barang` varchar(25) NOT NULL,
  `stock` int(11) NOT NULL,
  `penjualan` int(11) NOT NULL,
  `satuan` varchar(4) NOT NULL,
  PRIMARY KEY (`idbarang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1818 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `data_barang`, `tanggal`, `nama_barang`, `stock`, `penjualan`, `satuan`) VALUES
(1798, 'M1', '2018-02-12', 'ENGSEL 1/2 BIASA', 50, 20, 'unit'),
(1799, 'M2', '2018-02-13', 'PIPA MIYA 4 x 1.2', 7, 2, 'unit'),
(1800, 'M3', '2018-02-14', 'PIPA MIYA 1 X 1', 19, 5, 'unit'),
(1801, 'M4', '2018-02-15', 'PLAT  4 x 8 x 2 M DOP', 9, 4, 'unit'),
(1802, 'M5', '2018-02-16', 'GOOD SANSE 9928 (2.8)', 5, 3, 'unit'),
(1803, 'M6', '2018-02-17', 'BUNGA POT BERTANGKAI', 17, 4, 'unit'),
(1804, 'M7', '2018-02-18', 'BOLA JADI 2', 56, 14, 'unit'),
(1805, 'M8', '2018-02-19', 'ELBOW 3/4', 7, 5, 'unit'),
(1806, 'M9', '2018-02-20', 'PIPA SEGI MIYA 15 x 15 x ', 49, 11, 'unit'),
(1807, 'M10', '2018-02-21', 'TT8841 LEMON YELLOW', 16, 9, 'unit'),
(1808, 'M11', '2018-02-22', 'TT8810 SILVER CHAMPAGN', 8, 3, 'unit'),
(1809, 'M12', '2018-02-23', 'ENGSEL 1 BIASA', 18, 4, 'unit'),
(1810, 'M13', '2018-02-24', 'BOLA JADI 1', 42, 22, 'unit'),
(1811, 'M14', '2018-02-25', 'TT8840 PURE YELLOW', 15, 8, 'unit'),
(1812, 'M15', '2018-02-26', 'DOP 1', 28, 18, 'unit'),
(1813, 'M16', '2018-02-27', 'TT8847 CHINESE RED', 7, 15, 'unit'),
(1814, 'M17', '2018-02-28', 'PIPA SEGI STAR 30 x 30 x ', 30, 11, 'unit'),
(1815, 'M18', '2018-03-01', 'BUNGA SAMBUNG 150 x 300 M', 55, 25, 'unit'),
(1816, 'M19', '2018-03-02', 'GOOD SANSE 9907', 17, 5, 'unit'),
(1817, 'M20', '2018-03-03', 'PLAT 430 1 x 2 x 0.8', 14, 8, 'unit');

-- --------------------------------------------------------

--
-- Table structure for table `cluster`
--

CREATE TABLE IF NOT EXISTS `cluster` (
  `id_cluster` int(11) NOT NULL AUTO_INCREMENT,
  `data_barang` varchar(3) NOT NULL,
  `tanggal` date NOT NULL DEFAULT '0000-00-00',
  `nama_barang` varchar(25) NOT NULL,
  `nilai_c1` double NOT NULL,
  `nilai_c2` double NOT NULL,
  `nilai_c3` double NOT NULL,
  `keterangan` varchar(15) NOT NULL,
  PRIMARY KEY (`id_cluster`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1014 ;

--
-- Dumping data for table `cluster`
--

INSERT INTO `cluster` (`id_cluster`, `data_barang`, `tanggal`, `nama_barang`, `nilai_c1`, `nilai_c2`, `nilai_c3`, `keterangan`) VALUES
(994, 'M1', '2018-02-12', 'ENGSEL 1/2 BIASA', 32.934008258941, 1.6492422502471, 45.272704801017, 'C2'),
(995, 'M2', '2018-02-13', 'PIPA MIYA 4 x 1.2', 13.712363034867, 46.395258378416, 3.3343365157104, 'C3'),
(996, 'M3', '2018-02-14', 'PIPA MIYA 1 X 1', 3.0180954259268, 34.139712945483, 11.834601809947, 'C1'),
(997, 'M4', '2018-02-15', 'PLAT  4 x 8 x 2 M DOP', 11.077404930759, 43.832864382789, 2.262255511652, 'C3'),
(998, 'M5', '2018-02-16', 'GOOD SANSE 9928 (2.8)', 15.17724942142, 47.940796822748, 3.183991206018, 'C3'),
(999, 'M6', '2018-02-17', 'BUNGA POT BERTANGKAI', 4.6291359884972, 36.371967227523, 9.9195665227872, 'C1'),
(1000, 'M7', '2018-02-18', 'BOLA JADI 2', 37.157622367423, 7.1217975259059, 49.593727425956, 'C2'),
(1001, 'M8', '2018-02-19', 'ELBOW 3/4', 12.689716308886, 45.421580773901, 0.37121422386541, 'C3'),
(1002, 'M9', '2018-02-20', 'PIPA SEGI MIYA 15 x 15 x ', 29.821282668591, 7.5312681535051, 42.212531314765, 'C2'),
(1003, 'M10', '2018-02-21', 'TT8841 LEMON YELLOW', 3.4769095472848, 35.661183379131, 9.5623114360493, 'C1'),
(1004, 'M11', '2018-02-22', 'TT8810 SILVER CHAMPAGN', 12.384219797791, 45.110087563648, 2.4734186867573, 'C3'),
(1005, 'M12', '2018-02-23', 'ENGSEL 1 BIASA', 4.2153173071549, 35.455888086466, 10.911361051675, 'C1'),
(1006, 'M13', '2018-02-24', 'BOLA JADI 1', 26.64449098782, 9.1389277270367, 38.613699641448, 'C2'),
(1007, 'M14', '2018-02-25', 'TT8840 PURE YELLOW', 4.33, 36.896070251451, 8.2727141858038, 'C1'),
(1008, 'M15', '2018-02-26', 'DOP 1', 13.23513883569, 22.403571143905, 24.380684978072, 'C1'),
(1009, 'M16', '2018-02-27', 'TT8847 CHINESE RED', 14.178466066539, 43.532976006701, 9.6714941968653, 'C3'),
(1010, 'M17', '2018-02-28', 'PIPA SEGI STAR 30 x 30 x ', 11.083722298939, 21.70069123323, 23.523558404289, 'C1'),
(1011, 'M18', '2018-03-01', 'BUNGA SAMBUNG 150 x 300 M', 39.513907678183, 8.0448741444475, 51.716707165093, 'C2'),
(1012, 'M19', '2018-03-02', 'GOOD SANSE 9907', 3.7985391929003, 35.987775702313, 9.8355376060488, 'C1'),
(1013, 'M20', '2018-03-03', 'PLAT 430 1 x 2 x 0.8', 5.33, 37.856571424259, 7.3333348484847, 'C1');

-- --------------------------------------------------------

--
-- Table structure for table `cluster_baru`
--

CREATE TABLE IF NOT EXISTS `cluster_baru` (
  `id_cluster_baru` int(11) NOT NULL AUTO_INCREMENT,
  `data_barang` varchar(3) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `nilai_c1` double NOT NULL,
  `nilai_c2` double NOT NULL,
  `nilai_c3` double NOT NULL,
  `keterangan` varchar(15) NOT NULL,
  PRIMARY KEY (`id_cluster_baru`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=274 ;

--
-- Dumping data for table `cluster_baru`
--

INSERT INTO `cluster_baru` (`id_cluster_baru`, `data_barang`, `tanggal`, `nama_barang`, `nilai_c1`, `nilai_c2`, `nilai_c3`, `keterangan`) VALUES
(254, 'M1', '2018-02-12', 'ENGSEL 1/2 BIASA', 36.41431723924, 30.413812651491, 43.289721643827, 'C2'),
(255, 'M2', '2018-02-13', 'PIPA MIYA 4 x 1.2', 11.278408575681, 18.38477631085, 13, 'C1'),
(256, 'M3', '2018-02-14', 'PIPA MIYA 1 X 1', 6.3641574461982, 10.049875621121, 15.620499351813, 'C1'),
(257, 'M4', '2018-02-15', 'PLAT  4 x 8 x 2 M DOP', 8.45, 15.556349186104, 11.180339887499, 'C1'),
(258, 'M5', '2018-02-16', 'GOOD SANSE 9928 (2.8)', 12.177951387651, 19.209372712299, 12.165525060596, 'C3'),
(259, 'M6', '2018-02-17', 'BUNGA POT BERTANGKAI', 6.2771410689899, 11.401754250991, 14.866068747319, 'C1'),
(260, 'M7', '2018-02-18', 'BOLA JADI 2', 41.199544900399, 36.013886210738, 49.010203019371, 'C2'),
(261, 'M8', '2018-02-19', 'ELBOW 3/4', 9.4075767336759, 16.401219466857, 10, 'C1'),
(262, 'M9', '2018-02-20', 'PIPA SEGI MIYA 15 x 15 x ', 34.016209371416, 29.274562336609, 42.190046219458, 'C2'),
(263, 'M10', '2018-02-21', 'TT8841 LEMON YELLOW', 1.3793114224134, 7.211102550928, 10.816653826392, 'C1'),
(264, 'M11', '2018-02-22', 'TT8810 SILVER CHAMPAGN', 9.8642029581715, 16.970562748477, 12.041594578792, 'C1'),
(265, 'M12', '2018-02-23', 'ENGSEL 1 BIASA', 6.6635200907628, 11.180339887499, 15.556349186104, 'C1'),
(266, 'M13', '2018-02-24', 'BOLA JADI 1', 29.566915632172, 23.08679276123, 35.693136595149, 'C2'),
(267, 'M14', '2018-02-25', 'TT8840 PURE YELLOW', 1.95, 8.6023252670426, 10.630145812735, 'C1'),
(268, 'M15', '2018-02-26', 'DOP 1', 15.290601688619, 8.5440037453175, 21.213203435596, 'C2'),
(269, 'M16', '2018-02-27', 'TT8847 CHINESE RED', 9.4605760923952, 13, 0, 'C3'),
(270, 'M17', '2018-02-28', 'PIPA SEGI STAR 30 x 30 x ', 15.036705091209, 10.770329614269, 23.345235059858, 'C2'),
(271, 'M18', '2018-03-01', 'BUNGA SAMBUNG 150 x 300 M', 42.737600540976, 36.400549446403, 49.030602688525, 'C2'),
(272, 'M19', '2018-03-02', 'GOOD SANSE 9907', 5.338773267334, 10.440306508911, 14.142135623731, 'C1'),
(273, 'M20', '2018-03-03', 'PLAT 430 1 x 2 x 0.8', 2.1914607000811, 9.2195444572929, 9.8994949366117, 'C1');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_cluster`
--

CREATE TABLE IF NOT EXISTS `hasil_cluster` (
  `id_hasil_cluster` int(11) NOT NULL AUTO_INCREMENT,
  `data_barang` varchar(3) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `nilai_c1` double NOT NULL,
  `nilai_c2` double NOT NULL,
  `nilai_c3` double NOT NULL,
  `keterangan` varchar(15) NOT NULL,
  PRIMARY KEY (`id_hasil_cluster`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `hasil_cluster`
--

