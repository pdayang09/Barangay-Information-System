-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2016 at 08:46 AM
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
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `strOfficerID` int(25) NOT NULL,
  `intForeignMemberNo` int(11) NOT NULL,
  `strUsername` varchar(45) NOT NULL,
  `strPassword` varchar(45) NOT NULL,
  `intForeignPositionId` int(11) NOT NULL,
  `strEmailAdd` varchar(25) NOT NULL,
  `dtStart` date NOT NULL,
  `dtEnd` date NOT NULL,
  `strStatus` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`strOfficerID`, `intForeignMemberNo`, `strUsername`, `strPassword`, `intForeignPositionId`, `strEmailAdd`, `dtStart`, `dtEnd`, `strStatus`) VALUES
(1, 1, 'dayang_paul', 'pauldayang', 1, ' ', '2016-08-29', '2018-08-29', 'Enabled'),
(2, 10, 'wu_jenny', 'jennywu', 2, 'JennyWu@yahoo.com', '2016-08-29', '2018-08-29', 'Enabled'),
(3, 21, 'ara_mary', 'maryara', 4, 'MariaAra@gmail.com', '2016-08-29', '2018-08-29', 'Enabled'),
(4, 2, 'perez_paula', 'paulaperez', 4, '', '2016-08-30', '2018-08-30', 'Enabled'),
(5, 3, 'perez_matteo', '12345', 4, '', '2016-08-30', '2018-08-30', 'Enabled');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`strOfficerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
  MODIFY `strOfficerID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
