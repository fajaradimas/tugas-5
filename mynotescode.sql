-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 08, 2017 at 03:09 
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mynotescode`
--

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `jenis_kelamin`, `telp`, `alamat`) VALUES
('10110470111', 'Ani Lestari', 'Perempuan', '089228827727', 'Jakarta'),
('10110470112', 'Imam Maulana', 'Laki-laki', '08561777166', 'Bandung'),
('10110470113', 'Siska Melina Rachman', 'Perempuan', '0828817717', 'Bandung'),
('10110470114', 'Diki Somantri', 'Laki-laki', '081662662771', 'Padang'),
('10110470115', 'Shanty', 'Perempuan', '08552662771', 'Purwakarta'),
('10110470116', 'Rinrin Rosilawati', 'Perempuan', '082661551551', 'Banten'),
('10110470117', 'Anas Saepul', 'Laki-laki', '089988181717', 'Jakarta'),
('10110470118', 'Firman Ramdhan', 'Laki-laki', '089918827635', 'Solo'),
('10110470119', 'Resti Sri Wahyuni', 'Perempuan', '085661557281', 'Garut');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
