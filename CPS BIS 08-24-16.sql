-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2016 at 08:20 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brgydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbldocument`
--

CREATE TABLE `tbldocument` (
  `intDocCode` int(11) NOT NULL,
  `strDocName` varchar(45) NOT NULL,
  `dblDocFee` double NOT NULL,
  `strStatus` varchar(45) NOT NULL,
  `strDocTemplate` varchar(250) NOT NULL,
  `strDocuBody` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldocument`
--

INSERT INTO `tbldocument` (`intDocCode`, `strDocName`, `dblDocFee`, `strStatus`, `strDocTemplate`, `strDocuBody`) VALUES
(2, 'Certification', 10, 'Enabled', '', ''),
(3, 'Business Clearance New', 100, 'Enabled', '', ''),
(4, 'Indigency', 95.95, 'Enabled', '', ''),
(5, 'Excavation', 1500, 'Enabed', '', ''),
(6, 'Street Permit', 100, 'Enabled', '', ''),
(7, 'Business Clearance Renewal', 111111111111110, 'Enabled', '', ''),
(8, 'TRU Clearance', 100, 'Enabled', '', ''),
(9, 'Utility Clearance', 100, 'Enabled', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbldocument`
--
ALTER TABLE `tbldocument`
  ADD PRIMARY KEY (`intDocCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbldocument`
--
ALTER TABLE `tbldocument`
  MODIFY `intDocCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
