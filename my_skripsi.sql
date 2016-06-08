-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 01, 2014 at 10:24 AM
-- Server version: 5.5.37-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stuz1377_kuesioner`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_dosen`
--

CREATE TABLE IF NOT EXISTS `mst_dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `id_matkul` varchar(50) NOT NULL,
  `kode_dosen` varchar(20) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `mst_dosen`
--

INSERT INTO `mst_dosen` (`id_dosen`, `id_matkul`, `kode_dosen`, `nama_dosen`) VALUES
(11, '11,9', 'D001', 'Rudi S'),
(12, '10,9', 'D002', 'Steven Sanjaya'),
(13, '11', 'D003', 'Wahyu B'),
(15, '12,10,14', 'D004', 'Monalisa Rizka'),
(18, '12', 'D013', 'Evha Syifa ');

-- --------------------------------------------------------

--
-- Table structure for table `mst_mata_kuliah`
--

CREATE TABLE IF NOT EXISTS `mst_mata_kuliah` (
  `id_matkul` int(11) NOT NULL AUTO_INCREMENT,
  `kode_matkul` varchar(20) NOT NULL,
  `mata_kuliah` varchar(100) NOT NULL,
  PRIMARY KEY (`id_matkul`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `mst_mata_kuliah`
--

INSERT INTO `mst_mata_kuliah` (`id_matkul`, `kode_matkul`, `mata_kuliah`) VALUES
(9, 'TI010', 'Web Programming'),
(11, 'TI003', 'Etika Profesi'),
(10, 'TI002', 'Pengantar Multimedia'),
(12, 'TI004', 'Pemrograman Android'),
(14, 'SI010', 'Struktur Data'),
(15, 'TI014', 'Kalkulus');

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE IF NOT EXISTS `mst_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `dt_created` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`id`, `username`, `password`, `nama`, `dt_created`) VALUES
(1, 'admin', '$P$D1WT/kYcRCEyMZLWB0J.0c3W4qb/0T/', 'Administrator', '2014-09-11'),
(2, 'hrd', '$P$Dy/XlPWgPIbnHAjB.qk.Vyv7gTpUIG1', 'HRD 1', '2014-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `trn_kusioner`
--

CREATE TABLE IF NOT EXISTS `trn_kusioner` (
  `id_kusioner` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) NOT NULL,
  `id_dosen` int(5) NOT NULL,
  `id_matkul` int(5) NOT NULL,
  `soal_1` int(5) NOT NULL,
  `soal_2` int(5) NOT NULL,
  `soal_3` int(5) NOT NULL,
  `soal_4` int(5) NOT NULL,
  `soal_5` int(5) NOT NULL,
  `soal_6` int(5) NOT NULL,
  `soal_7` int(5) NOT NULL,
  `soal_8` int(5) NOT NULL,
  `soal_9` int(5) NOT NULL,
  `soal_10` int(5) NOT NULL,
  `soal_11` int(5) NOT NULL,
  `total` int(5) NOT NULL,
  `dt_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_kusioner`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `trn_kusioner`
--

INSERT INTO `trn_kusioner` (`id_kusioner`, `session_id`, `id_dosen`, `id_matkul`, `soal_1`, `soal_2`, `soal_3`, `soal_4`, `soal_5`, `soal_6`, `soal_7`, `soal_8`, `soal_9`, `soal_10`, `soal_11`, `total`, `dt_created`) VALUES
(2, 'gntekevp6p5d14dl7vddpd53k6', 13, 11, 4, 3, 2, 4, 3, 4, 3, 4, 3, 4, 3, 37, '2014-09-10 19:49:24'),
(3, 'oifk88nkobivqrqibmvkj8t1i7', 12, 9, 3, 4, 1, 4, 2, 3, 4, 4, 4, 4, 3, 36, '2014-09-11 00:58:05'),
(4, 'h43dtk6s1lbralb2lrmb34otq7', 12, 10, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 44, '2014-09-11 01:00:43'),
(5, 'amev85n6fvlvanojod0iq8kp06', 11, 11, 4, 3, 2, 2, 2, 4, 2, 3, 3, 4, 3, 32, '2014-09-11 01:02:52'),
(18, 'b100f520ac28db03a8283db44aa6d4cc', 15, 14, 4, 3, 4, 4, 3, 3, 2, 3, 4, 4, 2, 0, '2014-09-26 17:51:39'),
(17, '1f8288bff31d79f850a53552a1cd28f2', 11, 11, 1, 2, 3, 4, 1, 1, 3, 2, 1, 1, 1, 0, '2014-09-25 15:46:56'),
(16, 'd08f83e900c9a907a0e60c34ea2c7409', 15, 12, 4, 3, 4, 4, 3, 4, 3, 4, 2, 4, 4, 0, '2014-09-25 14:55:34'),
(15, 'b968aacb07f1806e60b98f0ad188d5c8', 11, 11, 1, 2, 1, 1, 3, 3, 3, 1, 3, 1, 3, 0, '2014-09-25 10:04:55'),
(14, 'f85c70e8e17b8269d8299a22d3b9af76', 11, 15, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 0, '2014-09-23 13:03:51');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
