-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2020 at 10:11 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `proyek2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE IF NOT EXISTS `bobot` (
  `id_bobot` int(11) NOT NULL AUTO_INCREMENT,
  `angka` int(11) NOT NULL,
  `keterangan` varchar(15) NOT NULL,
  PRIMARY KEY (`id_bobot`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `angka`, `keterangan`) VALUES
(1, 1, 'Sangat rendah'),
(2, 2, 'Rendah'),
(3, 3, 'Sedang'),
(4, 4, 'Tinggi'),
(5, 5, 'Sangat tinggi');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE IF NOT EXISTS `divisi` (
  `id_divisi` int(11) NOT NULL AUTO_INCREMENT,
  `kode_divisi` varchar(10) NOT NULL,
  `nama_divisi` varchar(20) NOT NULL,
  PRIMARY KEY (`id_divisi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `kode_divisi`, `nama_divisi`) VALUES
(1, 'SLS', 'Sales'),
(2, 'ADM', 'Administrasi'),
(3, 'LGS', 'Logistik'),
(4, 'APT', 'Apoteker');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_akhir`
--

CREATE TABLE IF NOT EXISTS `hasil_akhir` (
  `nip` int(11) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `nilai_s` float NOT NULL,
  `hasil` float NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_akhir`
--

INSERT INTO `hasil_akhir` (`nip`, `nama_pegawai`, `nilai_s`, `hasil`) VALUES
(1245, 'Poppy', 0, 0),
(11110, 'Udin', 0, 0),
(14788, 'Rudi', 0, 0),
(18961, 'Nissa', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(20) NOT NULL,
  `bobot` int(11) NOT NULL,
  `normalisasi` decimal(3,2) NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `bobot`, `normalisasi`) VALUES
(1, 'KDS', 'Kedisiplinan', 5, '0.19'),
(2, 'KST', 'Kerjasama tim', 4, '0.15'),
(3, 'PRD', 'Produktivitas', 5, '0.19'),
(4, 'PRS', 'Presensi', 3, '0.11'),
(5, 'SKL', 'Skill', 4, '0.15'),
(6, 'SKP', 'Sikap', 4, '0.15');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `nip` int(11) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `nama_divisi` varchar(20) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama_pegawai`, `nama_divisi`) VALUES
(1245, 'Poppy', 'Administrasi'),
(11110, 'Udin', 'Sales'),
(14788, 'Rudi', 'Sales'),
(18961, 'Nova', 'Sales');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE IF NOT EXISTS `penilaian` (
  `id_penilaian` int(11) NOT NULL AUTO_INCREMENT,
  `nip` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  PRIMARY KEY (`id_penilaian`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `nip`, `id_kriteria`, `nilai`) VALUES
(1, 1245, 1, 4),
(2, 11110, 1, 1),
(3, 14788, 1, 0),
(4, 18961, 1, 0),
(5, 1245, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `bagian` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `bagian`, `password`) VALUES
(1, 'Harry', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Budi', 'budi778', 'pimpinan', '571c985d2615c919c4bd2d1782ffc682'),
(26, 'Rudi', '14788', 'pegawai', 'c322182e6279fd00cf24101223265689'),
(28, 'Tom', 'tom', 'admin', '34b7da764b21d298ef307d04d8152dc5');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
