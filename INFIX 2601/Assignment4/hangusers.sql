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
-- Table structure for table `hangusers`
--

CREATE TABLE IF NOT EXISTS `hangusers` (
`UserID` int(11) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Wins` int(11) NOT NULL,
  `Losses` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `hangusers`
--

INSERT INTO `hangusers` (`UserID`, `Username`, `Wins`, `Losses`) VALUES
(2, 'Mike', 0, 0),
(3, 'Biggy', 0, 1),
(4, 'Rick', 3, 0),
(5, 'Tim', 4, 3),
(6, 'Ross', 7, 5),
(7, 'Monica', 11, 5),
(8, 'Joey', 1, 8),
(9, 'Ted', 5, 0),
(10, 'Barney', 3, 3),
(11, 'Lily', 6, 3),
(12, 'Iggy', 1, 3),
(13, 'Bill', 0, 1),
(14, 'Andy', 0, 1),
(15, 'a', 0, 1),
(16, 'admin', 0, 2),
(17, 'Evan', 0, 27),
(18, 'Mo', 0, 2),
(19, 'C', 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hangusers`
--
ALTER TABLE `hangusers`
 ADD PRIMARY KEY (`UserID`), ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hangusers`
--
ALTER TABLE `hangusers`
MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
