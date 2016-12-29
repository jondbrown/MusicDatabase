-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Host: db662455209.db.1and1.com
-- Generation Time: Dec 28, 2016 at 07:36 PM
-- Server version: 5.5.53-0+deb7u1-log
-- PHP Version: 5.4.45-0+deb7u6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db662455209`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `albumID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `artistID` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`albumID`),
  KEY `artistID` (`artistID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE IF NOT EXISTS `artists` (
  `name` varchar(255) NOT NULL,
  `yearformed` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `artistID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`artistID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`name`, `yearformed`, `country`, `artistID`) VALUES
('Muse', 1994, 'United Kingdom', 1),
('Nirvana', 1987, 'United States', 2),
('Vince Guaraldi', 1953, 'United States', 3);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE IF NOT EXISTS `songs` (
  `title` varchar(255) NOT NULL,
  `albumID` int(11) NOT NULL,
  `artistID` int(11) NOT NULL,
  KEY `albumID` (`albumID`),
  KEY `artistID` (`artistID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`artistID`) REFERENCES `artists` (`artistID`);

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`albumID`) REFERENCES `albums` (`albumID`),
  ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`artistID`) REFERENCES `artists` (`artistID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
