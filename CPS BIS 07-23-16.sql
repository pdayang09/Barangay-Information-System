-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2016 at 09:23 PM
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
  `strSignageStat` int(1) NOT NULL,
  `strSignageType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(4, 'Restaurant', 390.5, 'Enabled'),
(5, 'Clean', 800.05, 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `tblbusinessstat`
--

CREATE TABLE `tblbusinessstat` (
  `strBSbusinessID` varchar(25) NOT NULL,
  `strBSbusinessStat` varchar(45) NOT NULL,
  `strApplicantID` varchar(25) NOT NULL,
  `strResidentID` varchar(25) NOT NULL,
  `datBCStat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `tbldocument`
--

CREATE TABLE `tbldocument` (
  `intDocCode` int(11) NOT NULL,
  `strDocName` varchar(45) NOT NULL,
  `strDocFee` double NOT NULL,
  `strStatus` varchar(45) NOT NULL,
  `ForNonResident` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldocument`
--

INSERT INTO `tbldocument` (`intDocCode`, `strDocName`, `strDocFee`, `strStatus`, `ForNonResident`) VALUES
(1, 'Certificate o', 25, 'Enable', 0),
(2, 'Certification', 10, 'Enable', 0),
(3, 'Business Clearance', 100, 'Enable', 0),
(4, 'Indigency', 95.95, 'Enable', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbldocumentpurpose`
--

CREATE TABLE `tbldocumentpurpose` (
  `strDocPurposeID` int(11) NOT NULL,
  `strPurposeName` varchar(45) NOT NULL,
  `dblPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldocumentpurpose`
--

INSERT INTO `tbldocumentpurpose` (`strDocPurposeID`, `strPurposeName`, `dblPrice`) VALUES
(0, 'W', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbldocumentrequest`
--

CREATE TABLE `tbldocumentrequest` (
  `strDocRequestID` varchar(25) NOT NULL,
  `strDRdocCode` varchar(25) NOT NULL,
  `strDRapplicantID` varchar(25) NOT NULL,
  `strDRapprovedBy` varchar(25) NOT NULL,
  `datDRdateRequested` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldocumentrequest`
--

INSERT INTO `tbldocumentrequest` (`strDocRequestID`, `strDRdocCode`, `strDRapplicantID`, `strDRapprovedBy`, `datDRdateRequested`) VALUES
('001D', '1', '11', '3', '2016-07-23'),
('002D', '1', '4', '1', '2016-07-23'),
('003D', '1', '2', '1', '2016-07-23');

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
(1, '001', 1452.04, 0),
(2, '002', 4141.2, 0),
(3, '003', 0, 0);

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
('001', '11', '', '2016-08-21', '2016-08-24', 1472054400000, 1472065200000, 'For Approval', 'Practice 1.0'),
('002', '', ' app003', '2016-08-21', '2016-08-24', 1472047200000, 1472076000000, 'Approved', 'Practice 2.0'),
('003', '', ' app002', '2016-08-21', '2016-08-25', 1472131800000, 1472405400000, 'Approved', 'Lamay');

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
(1, '001', 'Basketball', '2016-08-24 09:00:00', '2016-08-24 12:00:00', 4),
(2, '001', 'Digital Scoreboard', '2016-08-24 09:00:00', '2016-08-24 12:00:00', 2),
(3, '002', 'Tennis Ball', '2016-08-24 07:00:00', '2016-08-24 15:00:00', 2),
(4, '002', 'Tennis', '2016-08-24 07:00:00', '2016-08-24 15:00:00', 2);

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
(1, '001', '1', '2016-08-24 09:00:00', '2016-08-24 12:00:00'),
(2, '002', '3', '2016-08-24 07:00:00', '2016-08-24 15:00:00'),
(3, '003', '4', '2016-08-25 06:30:00', '2016-08-28 10:30:00');

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
(1, '001', 'Basketball', '2016-08-24', 0, 4),
(2, '001', 'Digital Scoreboard', '2016-08-24', 0, 2),
(3, '002', 'Tennis Ball', '2016-08-24', 0, 2),
(4, '002', 'Tennis', '2016-08-24', 0, 2);

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
  `strSPdocReqID` varchar(25) NOT NULL,
  `strSPstreet` varchar(45) NOT NULL,
  `dtmSPend` date NOT NULL,
  `dtmSPstart` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbltru`
--

CREATE TABLE `tbltru` (
  `strTRUplateNo` varchar(25) NOT NULL,
  `strTODA` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `strVehicleStat` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblvehihcleclearance`
--

CREATE TABLE `tblvehihcleclearance` (
  `strVCplateNo` varchar(25) NOT NULL,
  `strVCvehicleStat` varchar(45) DEFAULT NULL,
  `datVCStat` date NOT NULL,
  `strApplicantID` varchar(25) NOT NULL,
  `strResidentID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `tblbusinessstat`
--
ALTER TABLE `tblbusinessstat`
  ADD PRIMARY KEY (`strBSbusinessID`);

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
-- Indexes for table `tblvehihcleclearance`
--
ALTER TABLE `tblvehihcleclearance`
  ADD KEY `strVCplateNo_idx` (`strVCplateNo`);

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
  MODIFY `strBusinessID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblbusinesscate`
--
ALTER TABLE `tblbusinesscate`
  MODIFY `strBusCatergory` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  MODIFY `intDocCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `intHouseholdNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tblhousemember`
--
ALTER TABLE `tblhousemember`
  MODIFY `intMemberNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tblpaymentdetail`
--
ALTER TABLE `tblpaymentdetail`
  MODIFY `intNum` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblrequirements`
--
ALTER TABLE `tblrequirements`
  MODIFY `intReqID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblreserveequip`
--
ALTER TABLE `tblreserveequip`
  MODIFY `strReserveEquipNo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblreservefaci`
--
ALTER TABLE `tblreservefaci`
  MODIFY `strReserveFaciNo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblreturnequip`
--
ALTER TABLE `tblreturnequip`
  MODIFY `strReturnEquipNo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblstreet`
--
ALTER TABLE `tblstreet`
  MODIFY `intStreetId` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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

--
-- Constraints for table `tblctc`
--
ALTER TABLE `tblctc`
  ADD CONSTRAINT `strDocRequestID` FOREIGN KEY (`strDocRequestID`) REFERENCES `tbldocumentrequest` (`strDocRequestID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
