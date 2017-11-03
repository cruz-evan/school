-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 11, 2015 at 01:55 AM
-- Server version: 5.6.17-debug-log
-- PHP Version: 5.6.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `hangwords`
--

CREATE TABLE IF NOT EXISTS `hangwords` (
`HangID` int(11) NOT NULL,
  `HangWord` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `hangwords`
--

INSERT INTO `hangwords` (`HangID`, `HangWord`) VALUES
(1, 'Tacks\r\n'),
(2, 'Rigged\r\n'),
(3, 'Rug\r\n'),
(4, 'Cheese\r\n'),
(5, 'Apple\r\n'),
(6, 'Winter\r\n'),
(7, 'Summer\r\n'),
(8, 'Killer\r\n'),
(9, 'Perfect\r\n'),
(10, 'Robber');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hangwords`
--
ALTER TABLE `hangwords`
 ADD PRIMARY KEY (`HangID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hangwords`
--
ALTER TABLE `hangwords`
MODIFY `HangID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
