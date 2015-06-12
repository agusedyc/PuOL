-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2015 at 02:41 PM
-- Server version: 5.6.24-0ubuntu2
-- PHP Version: 5.6.4-4ubuntu6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pulsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE IF NOT EXISTS `harga` (
`id_harga` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id_harga`, `nama_produk`, `kode_produk`, `harga`) VALUES
(2, 'Telkomsel', 'S10', '10750'),
(3, 'Indosat', 'I10', '10500'),
(4, 'Indosat', 'I25', '25075'),
(5, 'XL', 'X5', '6000'),
(7, 'XL', 'X10', '1100'),
(9, 'Three', 'T1', '1075'),
(10, 'Three', 'T2', '2075'),
(11, 'Three', 'T3', '3075'),
(12, 'Three', 'T4', '4075'),
(13, 'Three', 'T5', '5025'),
(14, 'Three', 'T10', '9925'),
(15, 'Three', 'T20', '19925'),
(16, 'Three', 'T25', '24725'),
(17, 'Three', 'T30', '29625'),
(18, 'Three', 'T50', '49775'),
(19, 'Three', 'T100', '98075'),
(20, 'Telkomsel', 'S5', '5700'),
(21, 'Telkomsel', 'S20', '20175'),
(22, 'Telkomsel', 'S25', '25075'),
(23, 'Telkomsel', 'S50', '49375'),
(24, 'Telkomsel', 'S100', '97850'),
(25, 'Indosat', 'I5', '5500'),
(26, 'Indosat', 'I20', '20275'),
(27, 'Indosat', 'I30', '30275'),
(28, 'Indosat', 'I50', '49575'),
(29, 'Indosat', 'I100', '99075'),
(30, 'XL', 'X25', '25100'),
(31, 'XL', 'X50', '49875'),
(32, 'XL', 'X100', '98975'),
(33, 'Esia', 'E1', '1250'),
(34, 'Esia', 'E5', '5250'),
(35, 'Esia', 'E10', '10225'),
(36, 'Esia', 'E25', '24575'),
(37, 'Esia', 'E50', '48975'),
(38, 'Esia', 'E100', '97775'),
(39, 'Smartfren', 'SF5', '5075'),
(40, 'Smartfren', 'SF10', '10025'),
(41, 'Smartfren', 'SF20', '19925'),
(42, 'Smartfren', 'SF25', '24925'),
(43, 'Smartfren', 'SF30', '29825'),
(44, 'Smartfren', 'SF50', '49575'),
(45, 'Smartfren', 'SF100', '99375');

-- --------------------------------------------------------

--
-- Table structure for table `harga_jual`
--

CREATE TABLE IF NOT EXISTS `harga_jual` (
`id_hj` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `harga_jual` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga_jual`
--

INSERT INTO `harga_jual` (`id_hj`, `id_user`, `kode_produk`, `harga_jual`) VALUES
(1, 2, 'I5', '6000'),
(2, 2, 'I10', '12000'),
(3, 2, 'X5', '6000'),
(4, 1, 'S10', '11000'),
(5, 1, 'I25', '26000'),
(6, 1, 'I20', '21000'),
(7, 1, 'I30', '31000'),
(8, 1, 'I50', '51000'),
(9, 1, 'I100', '110000'),
(10, 1, 'X10', '11000'),
(11, 1, 'X25', '26000'),
(12, 1, 'X50', '51000'),
(13, 1, 'X100', '110000'),
(14, 1, 'S5', '6000'),
(15, 1, 'S20', '21000'),
(16, 1, 'S25', '26000'),
(17, 1, 'S50', '51000'),
(18, 1, 'S100', '110000'),
(19, 1, 'E1', '2000'),
(20, 1, 'E5', '6000'),
(22, 1, 'E10', '11000'),
(23, 1, 'E25', '26000'),
(24, 1, 'E50', '51000'),
(25, 1, 'E100', '110000'),
(26, 1, 'SF5', '6000'),
(27, 1, 'SF10', '11000'),
(28, 1, 'SF20', '21000'),
(29, 1, 'SF25', '26000'),
(30, 1, 'SF30', '31000'),
(31, 1, 'SF50', '51000'),
(32, 1, 'SF100', '110000'),
(33, 1, 'T1', '2000'),
(34, 1, 'T2', '3000'),
(35, 1, 'T4', '5000'),
(36, 1, 'T5', '6000'),
(37, 1, 'T10', '11000'),
(38, 1, 'T20', '21000'),
(39, 1, 'T25', '26000'),
(40, 1, 'T30', '31000'),
(41, 1, 'T50', '51000'),
(42, 1, 'T100', '110000');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
`id_trx` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `bayar` varchar(50) NOT NULL,
  `tgl_bayar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL,
  `saldo` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_trx`, `id_user`, `tgl`, `no_hp`, `kode_produk`, `bayar`, `tgl_bayar`, `status`, `saldo`) VALUES
(11, 2, '2015-06-23', '46546', 'I5', '2000', '2015-06-11 05:12:21', '-4000', '342'),
(12, 2, '2015-06-11', '0999898989', 'I10', '7000', '2015-06-11 05:12:26', '-4000', '100000'),
(13, 2, '2015-06-11', '567890', 'I10', '11000', '2015-06-11 05:12:29', 'LUNAS', '676'),
(19, 2, '2015-06-11', '0987654', 'S10', '5000', '2015-06-11 05:18:07', '-5000', '67567'),
(20, 2, '2015-06-23', '345345', 'I5', '4000', '2015-06-11 05:17:48', '-2000', '65464564'),
(21, 2, '2015-06-23', '456456', 'X10', '4000', '2015-06-11 05:24:49', '-4000', '456456'),
(22, 1, '2015-06-11', '0899909090', 'T10', '10000', '2015-06-11 05:30:50', '1000', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kode_agen` varchar(12) NOT NULL,
  `pin` varchar(6) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `group` enum('Upline','Downline') NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `user`, `nama`, `kode_agen`, `pin`, `pass`, `group`, `create_at`) VALUES
(1, 'syukur', 'Ahmad Syukur', '34', '1234', 'ac43724f16e9241d990427ab7c8f4228', 'Downline', '2015-06-10 15:38:50'),
(2, 'agus', 'Agus Edy Cahyono', 'IND0015', '12354', '4209facdda71a98f8c8a942564ad07d4', 'Upline', '2015-06-10 15:38:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
 ADD PRIMARY KEY (`id_harga`), ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `harga_jual`
--
ALTER TABLE `harga_jual`
 ADD PRIMARY KEY (`id_hj`), ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`id_trx`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `harga_jual`
--
ALTER TABLE `harga_jual`
MODIFY `id_hj` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
MODIFY `id_trx` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
