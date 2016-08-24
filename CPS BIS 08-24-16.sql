-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2016 at 01:26 PM
-- Server version: 10.0.17-MariaDB
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
  `strOfficerID` varchar(25) NOT NULL,
  `strUsername` varchar(45) NOT NULL,
  `strPassword` varchar(45) NOT NULL,
  `strOfficerFName` varchar(45) NOT NULL,
  `strOfficerMName` varchar(45) NOT NULL,
  `strOfficerLName` varchar(45) NOT NULL,
  `dtmBirthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`strOfficerID`, `strUsername`, `strPassword`, `strOfficerFName`, `strOfficerMName`, `strOfficerLName`, `dtmBirthdate`) VALUES
('001', 'admin', 'admin', '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tblapplicant`
--

CREATE TABLE `tblapplicant` (
  `strApplicantID` varchar(25) NOT NULL,
  `strResidentId` int(11) NOT NULL,
  `strApplicantFName` varchar(45) NOT NULL,
  `strApplicantMName` varchar(45) DEFAULT NULL,
  `strApplicantLName` varchar(45) NOT NULL,
  `strNameExtension` varchar(5) DEFAULT NULL,
  `strApplicantAddress_street` varchar(45) NOT NULL,
  `strApplicantAddress_brgy` varchar(45) NOT NULL,
  `strApplicantAddress_city` varchar(45) NOT NULL,
  `strApplicantContactNo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblapplicant`
--

INSERT INTO `tblapplicant` (`strApplicantID`, `strResidentId`, `strApplicantFName`, `strApplicantMName`, `strApplicantLName`, `strNameExtension`, `strApplicantAddress_street`, `strApplicantAddress_brgy`, `strApplicantAddress_city`, `strApplicantContactNo`) VALUES
(' app001', 0, ' Juana', ' Senora', ' Lavarez', ' ', ' Samapaguita', ' San Isidro', ' Paranaque', ' 09089529546'),
(' app002', 0, ' Juanito', '', ' Hiro', ' ', 'Camia', ' San Isidro', ' Paranaque', ' 09089529546'),
(' app003', 0, 'Gino', ' ', 'Gutierrez', ' ', ' ', 'San Isidro', ' ', '09119938211');

-- --------------------------------------------------------

--
-- Table structure for table `tblbrgyofficial`
--

CREATE TABLE `tblbrgyofficial` (
  `intBrgyOfficialNum` int(11) NOT NULL,
  `strOfficerID` varchar(25) DEFAULT NULL,
  `dtmStartofTerm` date DEFAULT NULL,
  `dtmEndofTerm` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblbrgyposition`
--

CREATE TABLE `tblbrgyposition` (
  `strPositionnName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblbusiness`
--

CREATE TABLE `tblbusiness` (
  `strBusinessID` int(11) NOT NULL,
  `strBusinessName` varchar(45) NOT NULL,
  `strBusinessCateID` varchar(25) NOT NULL,
  `strBusinessDesc` varchar(45) NOT NULL,
  `strBusinessLocation` varchar(45) NOT NULL,
  `strBusinessContactPerson` varchar(45) NOT NULL,
  `strContactNum` varchar(15) NOT NULL,
  `strSignageType` varchar(20) NOT NULL,
  `strSignageSize` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblbusiness`
--

INSERT INTO `tblbusiness` (`strBusinessID`, `strBusinessName`, `strBusinessCateID`, `strBusinessDesc`, `strBusinessLocation`, `strBusinessContactPerson`, `strContactNum`, `strSignageType`, `strSignageSize`) VALUES
(1, 'Ala Hardware', '3', '', 'Mayfair Street 233 Maalikaya Street, Purok 21', 'Ala', '123455', '', 0),
(6, 'Ala Hardware', '1', '', 'Hany Street 891 Maa,  ', 'Ala', '870876', '', 0),
(7, 'Ala Hardware', '1', '', 'Hany Street 891 Maa,  ', 'Ala', '870876', '', 0),
(8, 'Ala II Hardware ', '1', '', '', 'Ala', '124', '', 0),
(9, 'Ala Hardware', '1', '', 'New Yorkshire Street 672 jads aada,  ', 'Ala', '7906', '', 0),
(10, 'Ala Hardware', '1', '', 'J Street New New City,  ', 'Ala', '124', '', 0),
(11, 'Ala Hardware 123', '1', '', 'J Street New New City,  ', 'Ala', '124', '', 0),
(15, 'Ala Restaurant', '4', '', 'Carolina Street, Dies', 'Jan Ala', '9065', '', 0),
(16, 'Ala Restaurant', '4', '', 'Carolina Street, Dies', 'Jan Ala', '9065', '', 0),
(17, 'Ala Restaurant', '6', '', 'Carolina Street, Dies', 'Jan Ala', '7906', '', 0),
(18, 'Ala Restaurant', '6', '', 'Carolina Street, Dies', 'Jan Ala', '870876', '', 0),
(19, 'Ala Restaurant', '6', '', 'Carolina Street, Dies', 'Jan Ala', '870876', '', 0),
(20, 'Ala Restaurant', '6', '', 'Carolina Street, Dies', 'Jan Ala', '870876', 'Single-faced', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tblbusinesscate`
--

CREATE TABLE `tblbusinesscate` (
  `strBusCatergory` int(25) NOT NULL,
  `strBusCateName` varchar(45) NOT NULL,
  `dblAmount` double NOT NULL,
  `strStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblbusinesscate`
--

INSERT INTO `tblbusinesscate` (`strBusCatergory`, `strBusCateName`, `dblAmount`, `strStatus`) VALUES
(1, 'Hardware', 1000, 'Enabled'),
(3, 'Pet Shop', 1000, 'Enabled'),
(5, 'Clean', 800.05, 'Enabled'),
(6, 'Restaurant', 999.95, 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `tblbusinesssignage`
--

CREATE TABLE `tblbusinesssignage` (
  `ID` int(11) NOT NULL,
  `strSignageType` varchar(20) NOT NULL,
  `strSignagePrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbusinesssignage`
--

INSERT INTO `tblbusinesssignage` (`ID`, `strSignageType`, `strSignagePrice`) VALUES
(1, 'Single-faced', 30),
(2, 'Double-faced', 50);

-- --------------------------------------------------------

--
-- Table structure for table `tblbusinessstat`
--

CREATE TABLE `tblbusinessstat` (
  `strBusStatID` int(11) NOT NULL,
  `strBusinessID` int(11) NOT NULL,
  `strBusOwnerID` int(11) NOT NULL,
  `strBSbusinessStat` varchar(45) NOT NULL,
  `datBCStat` date NOT NULL,
  `strClearanceStat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblbusinessstat`
--

INSERT INTO `tblbusinessstat` (`strBusStatID`, `strBusinessID`, `strBusOwnerID`, `strBSbusinessStat`, `datBCStat`, `strClearanceStat`) VALUES
(1, 1, 0, 'New', '2016-08-10', ''),
(2, 7, 1, 'New', '2016-08-19', ''),
(3, 8, 10, 'New', '2016-08-19', ''),
(4, 9, 11, 'New', '2016-08-19', ''),
(5, 10, 2, 'New', '2016-08-19', ''),
(6, 11, 2, 'New', '2016-08-19', ''),
(10, 15, 1, 'New', '2016-08-24', 'Unpaid'),
(11, 16, 1, 'New', '2016-08-24', 'Unpaid'),
(12, 17, 3, 'New', '2016-08-24', 'Unpaid'),
(13, 18, 3, 'New', '2016-08-24', 'Unpaid'),
(14, 19, 3, 'New', '2016-08-24', 'Unpaid'),
(15, 20, 3, 'New', '2016-08-24', 'Unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `strCategoryCode` int(25) NOT NULL,
  `strCategoryDesc` varchar(45) NOT NULL,
  `strCategoryType` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`strCategoryCode`, `strCategoryDesc`, `strCategoryType`) VALUES
(1, 'Covered Court', 'Facility'),
(2, 'Open Court', 'Facility'),
(3, 'Hall', 'Facility'),
(4, 'Net', 'Equipment'),
(5, 'Racket', 'Equipment'),
(6, 'Scoreboard', 'Equipment'),
(7, 'Ball', 'Equipment'),
(8, 'Other', 'Equipment');

-- --------------------------------------------------------

--
-- Table structure for table `tblctc`
--

CREATE TABLE `tblctc` (
  `strCTCNumber` varchar(25) NOT NULL,
  `dblTaxableAmount` double NOT NULL,
  `strDocRequestID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbldeceased`
--

CREATE TABLE `tbldeceased` (
  `intDeceasedNo` int(11) NOT NULL,
  `strFirstName` varchar(50) NOT NULL,
  `strMiddleName` varchar(50) NOT NULL,
  `strLastName` varchar(50) NOT NULL,
  `strNameExtension` varchar(50) NOT NULL,
  `charGender` char(1) NOT NULL,
  `dtBirthdate` date NOT NULL,
  `dtDied` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldeceased`
--

INSERT INTO `tbldeceased` (`intDeceasedNo`, `strFirstName`, `strMiddleName`, `strLastName`, `strNameExtension`, `charGender`, `dtBirthdate`, `dtDied`) VALUES
(1, 'Jenny', '', 'Santos', '', 'F', '1996-08-16', '2009-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbldocrequirements`
--

CREATE TABLE `tbldocrequirements` (
  `strDocID` int(11) NOT NULL,
  `strReqID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldocrequirements`
--

INSERT INTO `tbldocrequirements` (`strDocID`, `strReqID`) VALUES
(2, 7),
(2, 8),
(3, 1),
(3, 2),
(4, 5),
(4, 6),
(5, 9),
(5, 10),
(5, 11),
(5, 12),
(6, 5),
(6, 6),
(7, 13),
(7, 14),
(7, 15),
(7, 16),
(8, 4),
(8, 17),
(8, 18),
(8, 19);

-- --------------------------------------------------------

--
-- Table structure for table `tbldocument`
--

CREATE TABLE `tbldocument` (
  `intDocCode` int(11) NOT NULL,
  `strDocName` varchar(45) NOT NULL,
  `dblDocFee` double NOT NULL,
  `strStatus` varchar(45) NOT NULL,
  `strDocTemplate` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldocument`
--

INSERT INTO `tbldocument` (`intDocCode`, `strDocName`, `dblDocFee`, `strStatus`, `strDocTemplate`) VALUES
(2, 'Certification', 10, 'Enable', ''),
(3, 'Business Clearance New', 100, 'Enable', ''),
(4, 'Indigency', 95.95, 'Enable', ''),
(5, 'Excavation', 1500, 'Enabe', ''),
(6, 'Street Permit', 0, 'Enable', ''),
(7, 'Business Clearance Renewal', 0, 'Enable', ''),
(8, 'TRU Clearance', 100, 'Enable', ''),
(9, 'Utility Clearance', 100, 'Enable', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbldocumentpurpose`
--

CREATE TABLE `tbldocumentpurpose` (
  `intDocPurposeID` int(11) NOT NULL,
  `strPurposeName` varchar(30) NOT NULL,
  `dblPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldocumentpurpose`
--

INSERT INTO `tbldocumentpurpose` (`intDocPurposeID`, `strPurposeName`, `dblPrice`) VALUES
(1, 'for whatever purpose', 0),
(2, 'Funeral', 0),
(3, 'Local Employment', 50),
(4, 'Scholarship', 0),
(5, 'PAO', 150);

-- --------------------------------------------------------

--
-- Table structure for table `tbldocumentrequest`
--

CREATE TABLE `tbldocumentrequest` (
  `strDocRequestID` int(25) NOT NULL,
  `strDRdocCode` varchar(25) NOT NULL,
  `strDRapplicantID` varchar(25) NOT NULL,
  `strDRapprovedBy` varchar(25) NOT NULL,
  `datDRdateRequested` date NOT NULL,
  `strDocReqStat` varchar(25) NOT NULL,
  `strPurpose` varchar(40) NOT NULL,
  `strRequestOf` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldocumentrequest`
--

INSERT INTO `tbldocumentrequest` (`strDocRequestID`, `strDRdocCode`, `strDRapplicantID`, `strDRapprovedBy`, `datDRdateRequested`, `strDocReqStat`, `strPurpose`, `strRequestOf`) VALUES
(1, '1', '11', '3', '2016-07-23', '', '', ''),
(2, '1', '4', '1', '2016-07-23', '', '', ''),
(3, '1', '2', '1', '2016-07-23', '', '', ''),
(4, '2', '1', '1', '2016-08-10', 'Unpaid', 'Local Employment', ''),
(5, '2', '1', '1', '2016-08-10', 'Unpaid', 'Local Employment', ''),
(6, '2', '1', '1', '2016-08-10', '', '', ''),
(7, '2', '1', '1', '2016-08-10', 'Unpaid', 'Local Employment', 'Ala'),
(8, '2', '1', '1', '2016-08-10', '', 'Funeral', 'Ala'),
(9, '2', '1', '1', '2016-08-10', '', 'Funeral', 'Ala'),
(13, '2', '1', '1', '2016-08-10', 'Unpaid', 'PAO', 'Ala'),
(26, '2', '1', '1', '2016-08-19', 'For Approval', 'PAO', 'Ala Jr.'),
(27, '2', '1', '1', '2016-08-19', '', 'PAO', 'Ala Jr.'),
(28, '2', '1', '1', '2016-08-19', '', 'PAO', 'Ala Jr.'),
(29, '2', '1', '1', '2016-08-19', '', 'PAO', 'Ala Jr.'),
(30, '2', '1', '1', '2016-08-19', 'For Approval', 'Local Employment', 'Ala Jr.'),
(31, '2', '1', '1', '2016-08-19', 'For Approval', 'Local Employment', 'Ala II'),
(32, '2', '1', '1', '2016-08-19', 'For Approval', 'Local Employment', 'Ala Jr.'),
(33, '2', '1', '1', '2016-08-19', 'Unpaid', 'Local Employment', 'Ala II'),
(34, '2', '1', '1', '2016-08-19', '', 'Funeral', ''),
(35, '2', '1', '1', '2016-08-19', 'Unpaid', 'PAO', ''),
(36, '', '1', '1', '2016-08-19', '', 'PhilHealtyh', 'Family'),
(37, '2', '1', '1', '2016-08-22', 'Unpaid', 'Local Employment', ''),
(38, '0', '1', '1', '2016-08-23', '', 'Birthday', ''),
(39, '2', '1', '1', '2016-08-23', 'Unpaid', 'Local Employment', 'Ala Jr.'),
(40, '2', '8', '1', '2016-08-23', 'For approval', 'for whatever purpose', ''),
(41, '2', '8', '1', '2016-08-23', 'For approval', 'for whatever purpose', ''),
(42, '', '1', '1', '2016-08-24', 'Unpaid', 'building', ''),
(43, '0', '1', '1', '2016-08-24', 'For approval', 'Birthday', ''),
(45, '5', '1', '1', '2016-08-24', 'Unpaid', 'Digging lot', ''),
(46, '2', '3', '1', '2016-08-24', 'Unpaid', 'Local Employment', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblequipment`
--

CREATE TABLE `tblequipment` (
  `strEquipNo` int(25) NOT NULL,
  `strEquipName` varchar(85) NOT NULL,
  `strEquipCategory` varchar(25) NOT NULL,
  `intEquipQuantity` int(11) NOT NULL,
  `dblEquipFee` double NOT NULL,
  `dblEquipDiscount` double NOT NULL,
  `strStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblequipment`
--

INSERT INTO `tblequipment` (`strEquipNo`, `strEquipName`, `strEquipCategory`, `intEquipQuantity`, `dblEquipFee`, `dblEquipDiscount`, `strStatus`) VALUES
(1, 'Basketball', '8', 13, 50.51, 10, 'Enabled'),
(2, 'Volleyball', '8', 10, 50, 0, 'Enabled'),
(3, 'Tennis Ball', '8', 10, 50, 0, 'Enabled'),
(4, 'Shuttlecock', '8', 10, 50, 0, 'Enabled'),
(5, 'Volleyball Net', '4', 10, 0, 0, 'Enabled'),
(6, 'Tennis Net', '4', 3, 0, 0, 'Disabled'),
(7, 'Digital Scoreboard', '6', 5, 250, 0, 'Enabled'),
(8, 'Tennis', '5', 90, 20.6, 0, 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `tblfacility`
--

CREATE TABLE `tblfacility` (
  `strFaciNo` int(25) NOT NULL,
  `strFaciName` varchar(85) NOT NULL,
  `strFaciCategory` varchar(25) NOT NULL,
  `strFaciStatus` varchar(45) NOT NULL,
  `dblFaciDayCharge` double DEFAULT NULL,
  `dblFaciNightCharge` double DEFAULT NULL,
  `dblFaciDiscount` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblfacility`
--

INSERT INTO `tblfacility` (`strFaciNo`, `strFaciName`, `strFaciCategory`, `strFaciStatus`, `dblFaciDayCharge`, `dblFaciNightCharge`, `dblFaciDiscount`) VALUES
(1, 'Basketball Court', '1', 'Good Condition', 250, 300, 500),
(2, 'Badminton Court', '1', 'Good Condition', 250, 300, 500),
(3, 'Tennis Court', '1', 'Good Condition', 250, 300, 500),
(4, 'Wake Chapel', '3', 'Good Condition', 0, 0, 0),
(5, 'Multi Purpose Hall', '3', 'Good Condition', 250, 300, 500);

-- --------------------------------------------------------

--
-- Table structure for table `tblhousehold`
--

CREATE TABLE `tblhousehold` (
  `intHouseholdNo` int(11) NOT NULL,
  `strBuildingNo` varchar(100) DEFAULT NULL,
  `intForeignStreetId` int(25) NOT NULL,
  `strHouseholdLname` varchar(100) NOT NULL,
  `strResidence` varchar(10) NOT NULL,
  `strOldAddress` varchar(100) NOT NULL,
  `strStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblhousehold`
--

INSERT INTO `tblhousehold` (`intHouseholdNo`, `strBuildingNo`, `intForeignStreetId`, `strHouseholdLname`, `strResidence`, `strOldAddress`, `strStatus`) VALUES
(1, '21', 1, 'Dayang', 'Owned', '233 Maalikaya Street, Purok 21, Building No 11', 'Disabled'),
(2, '211 Interior', 1, 'Daya', 'Rent', 'J Street, Purok 21, Building No 21', 'Enable'),
(3, '922', 1, 'Perez', 'Rent', '911 Jan Street, Brgy. Sta ana, Malate, Manila', 'Enable'),
(4, '88', 1, 'Wu', 'Owned', '891 Maa', 'Enable'),
(5, '677', 1, 'Tedder', 'Owned', '672 jads aada', 'Enable'),
(6, '844 Interior 29', 1, 'Marquez', 'Rent', 'Pasig', 'Enabled'),
(9, '321', 1, 'Ara', 'Rent', 'New', 'Enabled'),
(10, '312', 1, 'Sista', 'Rent', 'sda', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `tblhousemember`
--

CREATE TABLE `tblhousemember` (
  `intMemberNo` int(11) NOT NULL,
  `strFirstName` varchar(100) NOT NULL,
  `strMiddleName` varchar(100) DEFAULT NULL,
  `strLastName` varchar(100) NOT NULL,
  `strNameExtension` varchar(50) DEFAULT NULL,
  `charGender` char(1) NOT NULL,
  `dtBirthdate` date NOT NULL,
  `strContactNo` varchar(11) DEFAULT NULL,
  `strOccupation` varchar(50) DEFAULT NULL,
  `strSSSNo` varchar(9) DEFAULT NULL,
  `strTINNo` varchar(50) DEFAULT NULL,
  `strVotersId` varchar(25) NOT NULL,
  `intForeignHouseholdNo` int(11) NOT NULL,
  `strCivilStatus` varchar(20) NOT NULL,
  `strStatus` varchar(10) NOT NULL,
  `strLifeStatus` varchar(10) NOT NULL,
  `charLiterate` char(1) NOT NULL,
  `charDisable` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblhousemember`
--

INSERT INTO `tblhousemember` (`intMemberNo`, `strFirstName`, `strMiddleName`, `strLastName`, `strNameExtension`, `charGender`, `dtBirthdate`, `strContactNo`, `strOccupation`, `strSSSNo`, `strTINNo`, `strVotersId`, `intForeignHouseholdNo`, `strCivilStatus`, `strStatus`, `strLifeStatus`, `charLiterate`, `charDisable`) VALUES
(1, 'Paul', 'Aquino', 'Dayang', '', 'M', '1996-05-12', '0920947581', 'Company Driver', '00010101', '', '09', 1, '', 'Head', 'Alive', 'Y', 'N'),
(2, 'Pingris', 'Santos', 'Daya', 'Jr', 'M', '1992-01-01', '09132321321', 'Dancer', '', 'ads', 'e3qeaaa', 2, '', 'Head', 'Alive', 'Y', 'N'),
(3, 'Matteo', 'Ting', 'Perez', 'Jr', 'M', '1980-05-21', '09123321243', 'Sales', '6543213', '331231', '232qe2qe', 2, 'Single', 'Spouse', 'Dead', 'Y', 'N'),
(4, 'Mikhael', 'Castro', 'Daya', '', 'M', '2016-05-04', '', '', '', '', '', 2, 'Single', 'Children', 'Moved', 'Y', 'N'),
(5, 'Gema', 'Peng', 'Gutierez', '', 'F', '1996-12-27', '02313321', 'Sales Clerk', '', 'sad', 'qe23', 2, 'Single', 'Cousin', 'Moved', 'Y', 'N'),
(7, 'Lola', 'Ting', 'Dayang', '', 'F', '1990-03-08', '09890930943', 'Sales Clerk', '', 'dd', '2qwewwe', 1, 'Single', 'Sister', 'Alive', 'Y', 'N'),
(8, 'Jenna', 'Alie', 'Dayang', '', 'F', '1989-07-06', '09999999', '', '', '', 'weewq', 1, 'Married', 'Spouse', 'Alive', 'Y', 'N'),
(9, 'Paulo', 'Ting', 'Perez', 'Jr', 'M', '1980-05-21', '09123321243', 'Sales Clerk', '', '331231', 'weewq', 3, 'Single', 'Head', 'Alive', 'Y', 'N'),
(10, 'Jenny', '', 'Wu', '', 'F', '1981-06-21', '09238472912', 'Accountant', '98121921', '921081', 'weewqeqw', 4, 'Single', 'Head', 'Alive', 'Y', 'Y'),
(11, 'Ryan Benjamin', 'Saludo', 'Tedder', '', 'M', '1979-06-26', '0921384913', 'Singer', '92192913', '12121', 'ewqeewq', 5, 'Single', 'Head', 'Alive', 'Y', 'N'),
(12, 'Angel', '', 'Marquez', '', 'M', '1986-01-01', '', '', '', '', 'weqeq', 6, 'Single', 'Head', 'Alive', 'N', 'N'),
(13, 'Kimmy', '', 'Marquez', '', 'F', '1982-01-01', '', '', '', '', '', 6, 'Married', 'Spouse', 'Dead', 'Y', 'Y'),
(20, 'dsa', 'sdaa', 'ds', '', 'M', '1992-08-14', '', '', '', '', '', 6, 'Single', 'Head', 'Alive', 'Y', 'N'),
(21, 'Mary', '', 'Ara', '', 'F', '1995-01-01', '12', 'Sales', '786', '56', '54', 9, 'Single', 'Head', 'Alive', 'Y', 'N'),
(22, 'Kimmy', '', 'Sista', '', 'F', '1992-08-03', '', '', '', '', '', 10, 'Single', 'Head', 'Alive', 'Y', 'N'),
(25, 'Maria Rosa', '', 'SpatNa', '', 'F', '1992-01-01', '', '', '', '', '', 2, 'Single', 'Tenant', 'Alive', '', ''),
(26, 'Paula', 'Ting', 'Perez', '', 'F', '1996-01-01', '', '', '', '', '', 3, 'Single', 'Spouse', 'Alive', '', ''),
(27, 'Carl', 'Ting', 'Perez', '', 'M', '2010-01-01', '0129931', 'Student', '', '', '', 3, 'Single', 'Children', 'Alive', '', ''),
(28, 'Mary Joan', '', 'Meno', '', 'F', '1992-01-01', '09283771829', 'Businesswoman', '', '', '', 3, 'Single', 'Tenant', 'Alive', 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tblofficialposition`
--

CREATE TABLE `tblofficialposition` (
  `strPositionName` varchar(45) NOT NULL,
  `strOfficerID` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblpaymentdetail`
--

CREATE TABLE `tblpaymentdetail` (
  `intNum` int(10) UNSIGNED NOT NULL,
  `strRequestID` varchar(25) NOT NULL,
  `dblReqPayment` double NOT NULL,
  `intRequestORNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpaymentdetail`
--

INSERT INTO `tblpaymentdetail` (`intNum`, `strRequestID`, `dblReqPayment`, `intRequestORNo`) VALUES
(1, '001', 250, 0),
(2, '002', 100, 0),
(3, '003', 600, 0),
(4, '004', 566.02, 0),
(5, '005', 1500, 0),
(6, '006', 625, 0),
(7, '007', 1650, 0),
(8, '008', 600, 0),
(9, '009', 1200, 0),
(10, '010', 1500, 0),
(11, '010', 1250, 0),
(12, '37', 50, 1),
(13, '39', 50, 1),
(17, '45', 1500, 0),
(18, 'RTU 123', 100, 1),
(19, '46', 50, 1),
(20, 'UTI 009', 100, 1),
(27, '19', 999.95, 0),
(28, '20', 1599.95, 0),
(29, 'UTI 367', 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpaymenttrans`
--

CREATE TABLE `tblpaymenttrans` (
  `intORNo` int(11) NOT NULL,
  `dtmPaymentDate` date NOT NULL,
  `dblPaymentAmount` double NOT NULL,
  `dblPaidAmount` double NOT NULL,
  `dblRemaining` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpaymenttrans`
--

INSERT INTO `tblpaymenttrans` (`intORNo`, `dtmPaymentDate`, `dblPaymentAmount`, `dblPaidAmount`, `dblRemaining`) VALUES
(0, '0000-00-00', 0, 0, 0),
(1, '2016-07-23', 250, 500, 0),
(2, '2016-07-23', 250, 500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblrequirements`
--

CREATE TABLE `tblrequirements` (
  `intReqID` int(11) NOT NULL,
  `strRequirementName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblrequirements`
--

INSERT INTO `tblrequirements` (`intReqID`, `strRequirementName`) VALUES
(1, 'DTI/SEC Registration'),
(2, 'Lease of Contract'),
(3, 'Land Title'),
(4, 'Certification from TODA Evaluation'),
(5, 'Valid ID'),
(6, 'No existing case'),
(7, 'Secure Authorization Endorsement Letter'),
(8, 'NBI/Police Clearance'),
(9, 'Letter Request from the owner'),
(10, 'Copy of Land Title'),
(11, 'Lay-out plan/Blueprint'),
(12, 'ID of Project Engineer'),
(13, 'Old Photocopy of Business Permit (BPLO)'),
(14, 'Photocopy of Business Permit (MDAD)'),
(15, 'Old Photocopy of Barangay Clearance'),
(16, 'Market Master''s Certification'),
(17, 'LTO Official Receipt'),
(18, 'Deed of Sale (if not the registered owner)'),
(19, 'Photocopy of operator/Driver''s License');

-- --------------------------------------------------------

--
-- Table structure for table `tblreservationrequest`
--

CREATE TABLE `tblreservationrequest` (
  `strReservationID` varchar(25) NOT NULL,
  `strRSresidentId` varchar(25) NOT NULL,
  `strRSapplicantId` varchar(25) NOT NULL,
  `datRSIssued` date NOT NULL,
  `datRSReserved` date NOT NULL,
  `dtmFrom` bigint(20) NOT NULL,
  `dtmTo` bigint(20) NOT NULL,
  `strRSapprovalStatus` varchar(45) NOT NULL,
  `strRSPurpose` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblreservationrequest`
--

INSERT INTO `tblreservationrequest` (`strReservationID`, `strRSresidentId`, `strRSapplicantId`, `datRSIssued`, `datRSReserved`, `dtmFrom`, `dtmTo`, `strRSapprovalStatus`, `strRSPurpose`) VALUES
('001', '', ' app002', '2016-08-10', '2016-08-19', 1471622400000, 1471626000000, 'Approved', 'Practice 1.0'),
('002', '', '10', '2016-08-10', '2016-08-13', 1471111200000, 1471127400000, 'Paid', 'Practice 2.0'),
('003', '', '11', '2016-08-10', '2016-08-13', 1471105800000, 1471120200000, 'For Approval', 'Party'),
('004', '', ' app003', '2016-08-10', '2016-08-15', 1471269600000, 1471280400000, 'For Approval', 'Practice 3.0'),
('005', '', ' app001', '2016-08-10', '2016-08-25', 1472148000000, 1472158800000, 'For Approval', 'Party 2.0'),
('006', '', '8', '2016-08-10', '2016-08-15', 1471289400000, 1471298400000, 'For Approval', 'Pa party'),
('007', '', ' app001', '2016-08-10', '2016-08-23', 1471995000000, 1472005800000, 'For Approval', 'Debut'),
('008', '', '7', '2016-08-10', '2016-08-30', 1472565600000, 1472572800000, 'For Approval', 'Badminton Tourn'),
('009', '', ' app002', '2016-08-10', '2016-08-24', 1472065200000, 1472072400000, 'For Approval', 'Tennis Play 1.0'),
('010', '', '10', '2016-08-10', '2016-08-30', 1472596200000, 1472614200000, 'For Approval', 'Pageant Night');

-- --------------------------------------------------------

--
-- Table structure for table `tblreserveequip`
--

CREATE TABLE `tblreserveequip` (
  `strReserveEquipNo` int(10) UNSIGNED NOT NULL,
  `strReservationID` varchar(25) NOT NULL,
  `strREEquipCode` varchar(25) NOT NULL,
  `dtmREFrom` datetime NOT NULL,
  `dtmRETo` datetime NOT NULL,
  `intREQuantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblreserveequip`
--

INSERT INTO `tblreserveequip` (`strReserveEquipNo`, `strReservationID`, `strREEquipCode`, `dtmREFrom`, `dtmRETo`, `intREQuantity`) VALUES
(1, '001', 'Tennis Ball', '2016-08-19 09:00:00', '2016-08-19 10:00:00', 0),
(2, '001', 'Tennis Net', '2016-08-19 09:00:00', '2016-08-19 10:00:00', 0),
(3, '002', 'Tennis Ball', '2016-08-13 11:00:00', '2016-08-13 15:30:00', 0),
(4, '002', 'Tennis Net', '2016-08-13 11:00:00', '2016-08-13 15:30:00', 0),
(5, '004', 'Basketball', '2016-08-15 07:00:00', '2016-08-15 10:00:00', 2),
(6, '009', 'Tennis Ball', '2016-08-24 12:00:00', '2016-08-24 14:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblreservefaci`
--

CREATE TABLE `tblreservefaci` (
  `strReserveFaciNo` int(10) UNSIGNED NOT NULL,
  `strReservationID` varchar(25) NOT NULL,
  `strREFaciCode` varchar(25) NOT NULL,
  `dtmREFrom` datetime NOT NULL,
  `dtmRETo` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblreservefaci`
--

INSERT INTO `tblreservefaci` (`strReserveFaciNo`, `strReservationID`, `strREFaciCode`, `dtmREFrom`, `dtmRETo`) VALUES
(1, '004', '', '2016-08-15 07:00:00', '2016-08-15 10:00:00'),
(2, '008', '', '2016-08-30 07:00:00', '2016-08-30 09:00:00'),
(3, '001', '', '2016-08-19 09:00:00', '2016-08-19 10:00:00'),
(5, '003', '', '2016-08-13 09:30:00', '2016-08-13 13:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblreturnequip`
--

CREATE TABLE `tblreturnequip` (
  `strReturnEquipNo` int(10) UNSIGNED NOT NULL,
  `strReservationID` varchar(25) NOT NULL,
  `strRTEquipCode` varchar(25) NOT NULL,
  `datRTDate` date NOT NULL,
  `intReturned` int(3) NOT NULL,
  `intUnreturned` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblreturnequip`
--

INSERT INTO `tblreturnequip` (`strReturnEquipNo`, `strReservationID`, `strRTEquipCode`, `datRTDate`, `intReturned`, `intUnreturned`) VALUES
(1, '001', 'Tennis Ball', '2016-08-19', 0, 2),
(2, '001', 'Tennis Net', '2016-08-19', 0, 1),
(3, '002', 'Tennis Ball', '2016-08-13', 0, 2),
(4, '002', 'Tennis Net', '2016-08-13', 0, 1),
(5, '004', 'Basketball', '2016-08-15', 0, 2),
(6, '009', 'Tennis Ball', '2016-08-24', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblstreet`
--

CREATE TABLE `tblstreet` (
  `intStreetId` int(25) NOT NULL,
  `intForeignZoneId` int(25) NOT NULL,
  `strStreetName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstreet`
--

INSERT INTO `tblstreet` (`intStreetId`, `intForeignZoneId`, `strStreetName`) VALUES
(1, 2, 'Carolina Street');

-- --------------------------------------------------------

--
-- Table structure for table `tblstreetpermit`
--

CREATE TABLE `tblstreetpermit` (
  `strSPdocReqID` int(25) NOT NULL,
  `strSPstreet` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblstreetpermit`
--

INSERT INTO `tblstreetpermit` (`strSPdocReqID`, `strSPstreet`) VALUES
(38, '1'),
(43, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbltoda`
--

CREATE TABLE `tbltoda` (
  `intTODAID` int(11) NOT NULL,
  `strTODAName` varchar(30) NOT NULL,
  `strTODADesc` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltoda`
--

INSERT INTO `tbltoda` (`intTODAID`, `strTODAName`, `strTODADesc`) VALUES
(1, 'VISAYAN TODA', ''),
(2, 'SLRTODA', 'San Lorenzo Ruiz TODA');

-- --------------------------------------------------------

--
-- Table structure for table `tbltru`
--

CREATE TABLE `tbltru` (
  `strTRUplateNo` varchar(25) NOT NULL,
  `intTODA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbltru`
--

INSERT INTO `tbltru` (`strTRUplateNo`, `intTODA`) VALUES
('QWS 123', 1),
('RTU 121', 1),
('RTU 123', 1),
('TW7777', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicle`
--

CREATE TABLE `tblvehicle` (
  `strVplateNo` varchar(25) NOT NULL,
  `strOperatorName` varchar(45) NOT NULL,
  `strOwnerName` varchar(45) NOT NULL,
  `strVehicleModel` varchar(45) NOT NULL,
  `strMotorNo` varchar(45) NOT NULL,
  `strChassisNo` varchar(45) NOT NULL,
  `strVehicleNo` varchar(45) NOT NULL,
  `intVehicleType` int(1) NOT NULL,
  `strVehicleStat` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblvehicle`
--

INSERT INTO `tblvehicle` (`strVplateNo`, `strOperatorName`, `strOwnerName`, `strVehicleModel`, `strMotorNo`, `strChassisNo`, `strVehicleNo`, `intVehicleType`, `strVehicleStat`) VALUES
('QWS 123', 'Jan Ala', '', 'Honda 567', 'KMYH 2134', 'KMYH 2134', '098YELLOW', 1, 'Active'),
('RTU 121', 'Jan Ala', 'Dayang, Paul Aquino ', 'Hyundai 567', 'KMYH 2134', 'KMYH 2134', '098YELLOW', 1, 'Active'),
('RTU 123', 'Jan Ala', 'Perez, Matteo Ting Jr', 'Hyundai 567', 'KMYH 2134', 'KMYH 2134', '098YELLOW', 1, 'Active'),
('TW7777', 'Ala', 'Paul Aquino Dayang', 'Kawasaki', 'KC125EEE', 'KC125EEE', '078 / YELLOW', 1, 'Active'),
('UTI 123', '', 'JAN PHILIP ALA', 'Honda', 'UTI125EEE', 'UTI125EEE', '09', 0, 'Active'),
('UTI 367', 'Jan Ala', 'Perez, Matteo Ting Jr', 'Hyundai 567', 'KMYH 2134', 'KMYH 2134', '098', 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicleclearance`
--

CREATE TABLE `tblvehicleclearance` (
  `intID` int(11) NOT NULL,
  `strVCplateNo` varchar(25) NOT NULL,
  `strVCvehicleStat` varchar(25) NOT NULL,
  `datVCStat` date NOT NULL,
  `strClearanceStat` varchar(25) NOT NULL,
  `strResidentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvehicleclearance`
--

INSERT INTO `tblvehicleclearance` (`intID`, `strVCplateNo`, `strVCvehicleStat`, `datVCStat`, `strClearanceStat`, `strResidentID`) VALUES
(1, 'TW7777', '0', '2016-08-18', '', 1),
(2, 'QWS 123', '0', '2016-08-19', '', 1),
(3, 'UTI 098', '0', '2016-08-21', '', 1),
(4, 'UTI 123', '0', '2016-08-21', '', 1),
(5, 'RTU 123', 'New', '2016-08-24', 'Unpaid', 3),
(6, 'UTI 367', 'New', '2016-08-24', 'Unpaid', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tblzone`
--

CREATE TABLE `tblzone` (
  `intZoneId` int(50) NOT NULL,
  `strZoneName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblzone`
--

INSERT INTO `tblzone` (`intZoneId`, `strZoneName`) VALUES
(1, '1'),
(2, 'Dies');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`strOfficerID`);

--
-- Indexes for table `tblapplicant`
--
ALTER TABLE `tblapplicant`
  ADD PRIMARY KEY (`strApplicantID`);

--
-- Indexes for table `tblbrgyofficial`
--
ALTER TABLE `tblbrgyofficial`
  ADD PRIMARY KEY (`intBrgyOfficialNum`),
  ADD KEY `strbrgyofficial_idx` (`strOfficerID`);

--
-- Indexes for table `tblbrgyposition`
--
ALTER TABLE `tblbrgyposition`
  ADD PRIMARY KEY (`strPositionnName`);

--
-- Indexes for table `tblbusiness`
--
ALTER TABLE `tblbusiness`
  ADD PRIMARY KEY (`strBusinessID`),
  ADD KEY `strBusinessCate_idx` (`strBusinessCateID`);

--
-- Indexes for table `tblbusinesscate`
--
ALTER TABLE `tblbusinesscate`
  ADD PRIMARY KEY (`strBusCatergory`);

--
-- Indexes for table `tblbusinesssignage`
--
ALTER TABLE `tblbusinesssignage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbusinessstat`
--
ALTER TABLE `tblbusinessstat`
  ADD PRIMARY KEY (`strBusStatID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`strCategoryCode`);

--
-- Indexes for table `tblctc`
--
ALTER TABLE `tblctc`
  ADD PRIMARY KEY (`strCTCNumber`),
  ADD KEY `strDocRequestID_idx` (`strDocRequestID`);

--
-- Indexes for table `tbldeceased`
--
ALTER TABLE `tbldeceased`
  ADD PRIMARY KEY (`intDeceasedNo`);

--
-- Indexes for table `tbldocrequirements`
--
ALTER TABLE `tbldocrequirements`
  ADD PRIMARY KEY (`strDocID`,`strReqID`);

--
-- Indexes for table `tbldocument`
--
ALTER TABLE `tbldocument`
  ADD PRIMARY KEY (`intDocCode`);

--
-- Indexes for table `tbldocumentpurpose`
--
ALTER TABLE `tbldocumentpurpose`
  ADD PRIMARY KEY (`intDocPurposeID`);

--
-- Indexes for table `tbldocumentrequest`
--
ALTER TABLE `tbldocumentrequest`
  ADD PRIMARY KEY (`strDocRequestID`),
  ADD KEY `strDRapplicantID_idx` (`strDRapplicantID`),
  ADD KEY `strDRapprovedBy_idx` (`strDRapprovedBy`),
  ADD KEY `strDRdocCode_idx` (`strDRdocCode`);

--
-- Indexes for table `tblequipment`
--
ALTER TABLE `tblequipment`
  ADD PRIMARY KEY (`strEquipNo`);

--
-- Indexes for table `tblfacility`
--
ALTER TABLE `tblfacility`
  ADD PRIMARY KEY (`strFaciNo`),
  ADD KEY `strCategoryCode_idx` (`strFaciCategory`);

--
-- Indexes for table `tblhousehold`
--
ALTER TABLE `tblhousehold`
  ADD PRIMARY KEY (`intHouseholdNo`);

--
-- Indexes for table `tblhousemember`
--
ALTER TABLE `tblhousemember`
  ADD PRIMARY KEY (`intMemberNo`);

--
-- Indexes for table `tblofficialposition`
--
ALTER TABLE `tblofficialposition`
  ADD PRIMARY KEY (`strPositionName`),
  ADD KEY `strOfficeriD_idx` (`strOfficerID`);

--
-- Indexes for table `tblpaymentdetail`
--
ALTER TABLE `tblpaymentdetail`
  ADD PRIMARY KEY (`intNum`),
  ADD KEY `strRequestID_idx` (`strRequestID`),
  ADD KEY `intRequestORNo_idx` (`intRequestORNo`);

--
-- Indexes for table `tblpaymenttrans`
--
ALTER TABLE `tblpaymenttrans`
  ADD PRIMARY KEY (`intORNo`);

--
-- Indexes for table `tblrequirements`
--
ALTER TABLE `tblrequirements`
  ADD PRIMARY KEY (`intReqID`);

--
-- Indexes for table `tblreservationrequest`
--
ALTER TABLE `tblreservationrequest`
  ADD PRIMARY KEY (`strReservationID`),
  ADD KEY `strRRapplicantID_idx` (`strRSapplicantId`);

--
-- Indexes for table `tblreserveequip`
--
ALTER TABLE `tblreserveequip`
  ADD PRIMARY KEY (`strReserveEquipNo`),
  ADD KEY `strReservationID_idx` (`strReservationID`);

--
-- Indexes for table `tblreservefaci`
--
ALTER TABLE `tblreservefaci`
  ADD PRIMARY KEY (`strReserveFaciNo`),
  ADD KEY `strReservationId_idx` (`strReservationID`),
  ADD KEY `strFaciControlNo_idx` (`strREFaciCode`);

--
-- Indexes for table `tblreturnequip`
--
ALTER TABLE `tblreturnequip`
  ADD PRIMARY KEY (`strReturnEquipNo`),
  ADD KEY `strReservationID_idx` (`strReservationID`);

--
-- Indexes for table `tblstreet`
--
ALTER TABLE `tblstreet`
  ADD PRIMARY KEY (`intStreetId`);

--
-- Indexes for table `tblstreetpermit`
--
ALTER TABLE `tblstreetpermit`
  ADD PRIMARY KEY (`strSPdocReqID`);

--
-- Indexes for table `tbltoda`
--
ALTER TABLE `tbltoda`
  ADD PRIMARY KEY (`intTODAID`);

--
-- Indexes for table `tbltru`
--
ALTER TABLE `tbltru`
  ADD PRIMARY KEY (`strTRUplateNo`),
  ADD KEY `fk_tblTRU_tblVehicle1_idx` (`strTRUplateNo`);

--
-- Indexes for table `tblvehicle`
--
ALTER TABLE `tblvehicle`
  ADD PRIMARY KEY (`strVplateNo`);

--
-- Indexes for table `tblvehicleclearance`
--
ALTER TABLE `tblvehicleclearance`
  ADD PRIMARY KEY (`intID`,`strVCplateNo`);

--
-- Indexes for table `tblzone`
--
ALTER TABLE `tblzone`
  ADD PRIMARY KEY (`intZoneId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbusiness`
--
ALTER TABLE `tblbusiness`
  MODIFY `strBusinessID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tblbusinesscate`
--
ALTER TABLE `tblbusinesscate`
  MODIFY `strBusCatergory` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblbusinesssignage`
--
ALTER TABLE `tblbusinesssignage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblbusinessstat`
--
ALTER TABLE `tblbusinessstat`
  MODIFY `strBusStatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `strCategoryCode` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbldeceased`
--
ALTER TABLE `tbldeceased`
  MODIFY `intDeceasedNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbldocument`
--
ALTER TABLE `tbldocument`
  MODIFY `intDocCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbldocumentpurpose`
--
ALTER TABLE `tbldocumentpurpose`
  MODIFY `intDocPurposeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbldocumentrequest`
--
ALTER TABLE `tbldocumentrequest`
  MODIFY `strDocRequestID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `tblequipment`
--
ALTER TABLE `tblequipment`
  MODIFY `strEquipNo` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tblfacility`
--
ALTER TABLE `tblfacility`
  MODIFY `strFaciNo` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblhousehold`
--
ALTER TABLE `tblhousehold`
  MODIFY `intHouseholdNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tblhousemember`
--
ALTER TABLE `tblhousemember`
  MODIFY `intMemberNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tblpaymentdetail`
--
ALTER TABLE `tblpaymentdetail`
  MODIFY `intNum` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tblrequirements`
--
ALTER TABLE `tblrequirements`
  MODIFY `intReqID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tblreserveequip`
--
ALTER TABLE `tblreserveequip`
  MODIFY `strReserveEquipNo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblreservefaci`
--
ALTER TABLE `tblreservefaci`
  MODIFY `strReserveFaciNo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblreturnequip`
--
ALTER TABLE `tblreturnequip`
  MODIFY `strReturnEquipNo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblstreet`
--
ALTER TABLE `tblstreet`
  MODIFY `intStreetId` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbltoda`
--
ALTER TABLE `tbltoda`
  MODIFY `intTODAID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblvehicleclearance`
--
ALTER TABLE `tblvehicleclearance`
  MODIFY `intID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblzone`
--
ALTER TABLE `tblzone`
  MODIFY `intZoneId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbrgyofficial`
--
ALTER TABLE `tblbrgyofficial`
  ADD CONSTRAINT `strbrgyofficial` FOREIGN KEY (`strOfficerID`) REFERENCES `tblaccount` (`strOfficerID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
