-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 10, 2014 at 07:09 AM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Belabour`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
  `eID` int(2) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`eID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`eID`, `description`) VALUES
(12, 'wall_plug'),
(15, 'light'),
(16, 'TV'),
(18, 'blender');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `eID` int(2) NOT NULL,
  `pID` int(2) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `pID` (`pID`),
  KEY `eID` (`eID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`ID`, `eID`, `pID`) VALUES
(1, 15, 1),
(2, 16, 2),
(3, 12, 3),
(4, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `pID` int(11) NOT NULL AUTO_INCREMENT,
  `AccessType` enum('high','medium','low') NOT NULL,
  `TimeStamp` time NOT NULL,
  `TimeStop` time NOT NULL,
  PRIMARY KEY (`pID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`pID`, `AccessType`, `TimeStamp`, `TimeStop`) VALUES
(1, 'high', '24:00:00', '24:00:00'),
(2, 'medium', '06:00:00', '22:00:00'),
(3, 'low', '18:00:00', '20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `userID` varchar(255) DEFAULT NULL,
  `groupID` int(11) DEFAULT NULL,
  KEY `rights_ibfk_1` (`userID`),
  KEY `rights_ibfk_2` (`groupID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rights`
--

INSERT INTO `rights` (`userID`, `groupID`) VALUES
('11111111111111', 1),
('11111111111112', 2),
('11111111111111', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userID` varchar(40) NOT NULL,
  `name` varchar(60) NOT NULL,
  `accessType` enum('high','medium','low') NOT NULL DEFAULT 'medium',
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `name`, `accessType`) VALUES
('11111111111111', 'Kevin Griffith', 'high'),
('11111111111112', 'Andres S', 'low');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
  `logID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` varchar(40) NOT NULL,
  `date` datetime NOT NULL,
  `day` int(2) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`logID`),
  KEY `user_id_fk` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`pID`) REFERENCES `permission` (`pID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `groups_ibfk_2` FOREIGN KEY (`eID`) REFERENCES `equipment` (`eID`) ON UPDATE CASCADE;

--
-- Constraints for table `rights`
--
ALTER TABLE `rights`
  ADD CONSTRAINT `rights_ibfk_2` FOREIGN KEY (`groupID`) REFERENCES `groups` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userlog`
--
ALTER TABLE `userlog`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
