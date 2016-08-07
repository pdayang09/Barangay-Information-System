-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2016 at 03:51 AM
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
(' app003', 0, 'Gino', ' ', 'Gutierrez', ' ', ' ', 'San Isidro', ' ', '09119938211'),
('1', 1, 'Paul', 'Aquino', 'Dayang', '', 'Mayfair Street', '233 Maalikaya Street, Purok 21, Building No 1', ' ', ''),
('10', 10, 'Jenny', 'Alexander', 'Wu', '', 'Hany Street', '891 Maa', ' ', ''),
('11', 11, 'Ryan Benjamin', 'Saludo', 'Tedder', '', 'New Yorkshire Street', '672 jads aada', ' ', ''),
('2', 2, 'Pingris', 'Santos', 'Daya', 'Jr', 'J Street', 'New New City', ' ', ''),
('3', 3, 'Matteo', 'Ting', 'Perez', 'Jr', 'J Street', 'New New City', ' ', ''),
('5', 5, 'Gema', 'Peng', 'Gutierez', '', 'J Street', 'New New City', ' ', ''),
('7', 7, 'Lola', 'Ting', 'Dayang', '', 'Mayfair Street', '233 Maalikaya Street, Purok 21, Building No 1', ' ', ''),
('8', 8, 'Jenna', 'Alie', 'Dayang', '', 'Mayfair Street', '233 Maalikaya Street, Purok 21, Building No 1', ' ', ''),
('9', 9, 'Paulo', 'Ting', 'Perez', 'Jr', 'Mayfair Street', '911 Jan Street, Brgy. Sta ana, Malate, Manila', ' ', '');

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
  `strBusinessID` varchar(25) NOT NULL,
  `strBusinessName` varchar(45) NOT NULL,
  `strBusinessCateID` varchar(25) NOT NULL,
  `strBusinessDesc` varchar(45) NOT NULL,
  `strBusinessLocation` varchar(45) NOT NULL,
  `strBusinessContactPerson` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblbusinesscate`
--

CREATE TABLE `tblbusinesscate` (
  `strBusCatergory` int(25) NOT NULL,
  `strBusCateName` varchar(45) NOT NULL,
  `dblAmount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblbusinesscate`
--

INSERT INTO `tblbusinesscate` (`strBusCatergory`, `strBusCateName`, `dblAmount`) VALUES
(1, 'Hardware', 1000),
(3, 'Pet Shop', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tblbusinessstat`
--

CREATE TABLE `tblbusinessstat` (
  `strBSbusinessID` varchar(25) NOT NULL,
  `strBSdocRequestID` varchar(25) NOT NULL,
  `strBSbusinessStat` varchar(45) NOT NULL
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
(1, 'Facility', 'Covered Court'),
(2, 'Facility', 'Open Court'),
(3, 'Facility', 'Hall'),
(4, 'Equipment', 'Net'),
(5, 'Equipment', 'Racket'),
(6, 'Equipment', 'Scoreboard'),
(7, 'Equipment', 'Other'),
(8, 'Equipment', 'Ball');

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
-- Table structure for table `tbldocument`
--

CREATE TABLE `tbldocument` (
  `strDocCode` varchar(25) NOT NULL,
  `strDocName` varchar(45) NOT NULL,
  `strDocFee` double NOT NULL,
  `strStatus` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldocument`
--

INSERT INTO `tbldocument` (`strDocCode`, `strDocName`, `strDocFee`, `strStatus`) VALUES
('', 'Certificate o', 25, 'Enable'),
('1', 'Certification', 10, 'Enable'),
('2', 'Business Clearance', 100, 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `tbldocumentpurpose`
--

CREATE TABLE `tbldocumentpurpose` (
  `strDocPurposeID` varchar(25) NOT NULL,
  `strDocID` varchar(25) NOT NULL,
  `strPurposeName` varchar(45) NOT NULL,
  `strOfficerID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldocumentpurpose`
--

INSERT INTO `tbldocumentpurpose` (`strDocPurposeID`, `strDocID`, `strPurposeName`, `strOfficerID`) VALUES
('1', '1', 'Funeral', ''),
('2', '1', 'Scholarship', ''),
('8', '2', 'Business Clearance New', ''),
('9', '2', 'Business Clearance Renew', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbldocumentrequest`
--

CREATE TABLE `tbldocumentrequest` (
  `strDocRequestID` varchar(25) NOT NULL,
  `strDocPurposeID` varchar(25) DEFAULT NULL,
  `strDRdocCode` varchar(25) NOT NULL,
  `strDRapplicantID` varchar(25) NOT NULL,
  `strDRapprovedBy` varchar(25) NOT NULL,
  `datDRdateRequested` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldocumentrequest`
--

INSERT INTO `tbldocumentrequest` (`strDocRequestID`, `strDocPurposeID`, `strDRdocCode`, `strDRapplicantID`, `strDRapprovedBy`, `datDRdateRequested`) VALUES
('001D', '2', '1', '11', '3', '2016-07-23'),
('002D', '1', '1', '4', '1', '2016-07-23'),
('003D', '2', '1', '2', '1', '2016-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `tblequipment`
--

CREATE TABLE `tblequipment` (
  `strEquipNo` int(25) NOT NULL,
  `strEquipName` varchar(85) NOT NULL,
  `strEquipCategoryCode` varchar(25) NOT NULL,
  `intEquipQuantity` int(11) NOT NULL,
  `dblEquipFee` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblequipment`
--

INSERT INTO `tblequipment` (`strEquipNo`, `strEquipName`, `strEquipCategoryCode`, `intEquipQuantity`, `dblEquipFee`) VALUES
(1, 'Basketball', '8', 10, 50),
(2, 'Volleyball', '8', 10, 50),
(3, 'Tennis Ball', '8', 10, 50),
(4, 'Shuttlecock', '8', 10, 50),
(5, 'Volleyball Net', '4', 10, 0),
(6, 'Tennis Net', '4', 3, 0),
(7, 'Digital Scoreboard', '6', 5, 250);

-- --------------------------------------------------------

--
-- Table structure for table `tblfacility`
--

CREATE TABLE `tblfacility` (
  `strFaciControlNo` int(25) NOT NULL,
  `strFaciName` varchar(85) NOT NULL,
  `strFaciCategoryCode` varchar(25) NOT NULL,
  `strFaciStatus` varchar(45) NOT NULL,
  `dblFaciFixedChargePerHour` double DEFAULT NULL,
  `dblFaciDayChargePerHour` double DEFAULT NULL,
  `dblFaciNightChargePerHour` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblfacility`
--

INSERT INTO `tblfacility` (`strFaciControlNo`, `strFaciName`, `strFaciCategoryCode`, `strFaciStatus`, `dblFaciFixedChargePerHour`, `dblFaciDayChargePerHour`, `dblFaciNightChargePerHour`) VALUES
(1, 'Basketball Court', '1', 'Good Condition', 155, 150, 150),
(2, 'Badminton Court', '1', 'Good Condition', 150, 150, 150),
(3, 'Tennis Court', '1', 'Good Condition', 150, 150, 150),
(4, 'Wake Chapel', '3', 'Good Condition', 1, 0, 0),
(5, 'Multi Purpose Hall', '3', 'Good Condition', 150, 150, 150);

-- --------------------------------------------------------

--
-- Table structure for table `tblhousehold`
--

CREATE TABLE `tblhousehold` (
  `Householdno` int(11) NOT NULL,
  `Street` varchar(100) NOT NULL,
  `Purok` varchar(100) NOT NULL,
  `BuildingNo` varchar(100) DEFAULT NULL,
  `HouseholdLname` varchar(100) NOT NULL,
  `Residence` varchar(10) NOT NULL,
  `OldAddress` varchar(100) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblhousehold`
--

INSERT INTO `tblhousehold` (`Householdno`, `Street`, `Purok`, `BuildingNo`, `HouseholdLname`, `Residence`, `OldAddress`, `Status`) VALUES
(1, 'Mayfair Street', '3', '21', 'Dayang', 'Owned', '233 Maalikaya Street, Purok 21, Building No 11', 'Enable'),
(2, 'J Street', '21', '21', 'Daya', 'Moved', 'New New City', 'Enable'),
(3, 'Mayfair Street', '21', '922', 'Perez', 'Rent', '911 Jan Street, Brgy. Sta ana, Malate, Manila', 'Enable'),
(4, 'Hany Street', '3', '88', 'Wu', 'Owned', '891 Maa', 'Enable'),
(5, 'New Yorkshire Street', '21', '677', 'Tedder', 'Owned', '672 jads aada', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `tblhousemember`
--

CREATE TABLE `tblhousemember` (
  `Memberno` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) NOT NULL,
  `NameExtension` varchar(50) DEFAULT NULL,
  `Gender` char(1) NOT NULL,
  `Birthdate` date NOT NULL,
  `ContactNo` varchar(11) DEFAULT NULL,
  `Occupation` varchar(50) DEFAULT NULL,
  `SSSNo` varchar(9) DEFAULT NULL,
  `TINNo` varchar(50) DEFAULT NULL,
  `ForeignHouseholdNo` int(11) NOT NULL,
  `CivilStatus` varchar(20) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `LifeStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblhousemember`
--

INSERT INTO `tblhousemember` (`Memberno`, `FirstName`, `MiddleName`, `LastName`, `NameExtension`, `Gender`, `Birthdate`, `ContactNo`, `Occupation`, `SSSNo`, `TINNo`, `ForeignHouseholdNo`, `CivilStatus`, `Status`, `LifeStatus`) VALUES
(0, 'Paul', '', 'Daya', '', 'M', '1990-07-07', '', '', '', '', 2, 'Single', 'Children', 'Alive'),
(1, 'Paul', 'Aquino', 'Dayang', '', 'M', '1996-05-12', '0920947581', 'Company Driver', '00010101', '', 1, '', 'Head', 'Alive'),
(2, 'Pingris', 'Santos', 'Daya', 'Jr', 'M', '1996-05-19', '09132321321', 'Dancer', '', 'ads', 2, 'Married', 'Head', 'Alive'),
(3, 'Matteo', 'Ting', 'Perez', 'Jr', 'M', '1980-05-21', '09123321243', 'Sales', '6543213', '331231', 2, 'Single', 'Spouse', 'Alive'),
(4, 'Mikhael', 'Castro', 'Daya', '', 'M', '2016-05-04', '', '', '', '', 2, 'Single', 'Children', 'Moved'),
(5, 'Gema', 'Peng', 'Gutierez', '', 'F', '1996-12-27', '02313321', 'Sales Clerk', '', 'sad', 2, 'Single', 'Cousin', 'Alive'),
(6, 'Jenny', 'Akihiro', 'Dayang', '', 'F', '2016-07-09', '', '', '', '', 2, 'Single', 'Cousin', 'Diseased'),
(7, 'Lola', 'Ting', 'Dayang', '', 'F', '1990-03-08', '09890930943', 'Sales Clerk', '', 'dd', 1, 'Single', 'Sister', 'Alive'),
(8, 'Jenna', 'Alie', 'Dayang', '', 'F', '1989-07-06', '09999999', '', '', '', 1, 'Married', 'Spouse', 'Alive'),
(9, 'Paulo', 'Ting', 'Perez', 'Jr', 'M', '1980-05-21', '09123321243', 'Sales Clerk', '', '331231', 3, 'Single', 'Head', 'Alive'),
(10, 'Jenny', 'Alexander', 'Wu', '', 'F', '1981-06-21', '09238472912', 'Accountant', '98121921', '921081', 4, 'Single', 'Head', 'Alive'),
(11, 'Ryan Benjamin', 'Saludo', 'Tedder', '', 'M', '1979-06-26', '0921384913', 'Singer', '92192913', '12121', 5, 'Single', 'Head', 'Alive');

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
(1, '001', 450, 2),
(2, '002', 625, 1),
(3, '003', 200, 0),
(4, '006', 0, 0),
(5, '007', 150, 0),
(6, '008', 225, 0),
(7, '009', 450, 0),
(8, '010', 300, 0),
(10, '001D', 250, 0),
(11, '002D', 250, 0),
(12, '003D', 250, 0);

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
-- Table structure for table `tblreservationrequest`
--

CREATE TABLE `tblreservationrequest` (
  `strReservationID` varchar(25) NOT NULL,
  `strRRapplicantID` varchar(25) NOT NULL,
  `datRRdateIssued` date NOT NULL,
  `datRReservedDate` date NOT NULL,
  `dtmFrom` bigint(20) NOT NULL,
  `dtmTo` bigint(20) NOT NULL,
  `strRRapprovalStatus` varchar(45) NOT NULL,
  `strRRpurpose` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblreservationrequest`
--

INSERT INTO `tblreservationrequest` (`strReservationID`, `strRRapplicantID`, `datRRdateIssued`, `datRReservedDate`, `dtmFrom`, `dtmTo`, `strRRapprovalStatus`, `strRRpurpose`) VALUES
(' 0001', '5', '2016-07-21', '2016-07-27', 1469628000000, 1469638800000, 'For Approval', ' Dance Practice'),
(' 002', '5', '2016-07-21', '2016-07-25', 1469476800000, 1469484000000, 'For Approval', ' Tennis Play'),
('001', '1', '2016-07-22', '2016-07-30', 1469887200000, 1469898000000, 'Approved', 'Dance Practice'),
('002', '1', '2016-07-22', '2016-07-30', 1469894400000, 1469907000000, 'Approved', 'Tennis Practice'),
('003', '3', '2016-07-22', '2016-07-30', 1469910600000, 1469916000000, 'Approved', 'Dance Practice 2.0'),
('006', '10', '2016-07-22', '2016-07-31', 1469973600000, 1469980800000, 'Approved', 'Pabasa'),
('007', '10', '2016-07-22', '2016-07-26', 1469548800000, 1469556000000, 'Paid', 'Laro'),
('008', '9', '2016-07-22', '2016-07-28', 1469719800000, 1469725200000, 'For Approval', 'Dance 3.0'),
('009', '7', '2016-07-22', '2016-07-26', 1469545200000, 1469556000000, 'For Approval', 'Dance 4.0'),
('010', '10', '2016-07-22', '2016-07-30', 1469905200000, 1469912400000, 'For Approval', 'Zumba');

-- --------------------------------------------------------

--
-- Table structure for table `tblreserveequip`
--

CREATE TABLE `tblreserveequip` (
  `strREreserveEquip` int(10) UNSIGNED NOT NULL,
  `strREreservationID` varchar(25) NOT NULL,
  `strREEquipCode` varchar(25) NOT NULL,
  `dtmREdateofUseFrom` datetime NOT NULL,
  `dtmREdateofUseTo` datetime NOT NULL,
  `intREequipQuantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblreserveequip`
--

INSERT INTO `tblreserveequip` (`strREreserveEquip`, `strREreservationID`, `strREEquipCode`, `dtmREdateofUseFrom`, `dtmREdateofUseTo`, `intREequipQuantity`) VALUES
(1, '002', 'Tennis Ball', '2016-07-30 09:00:00', '2016-07-30 12:30:00', 2),
(2, '003', 'Tennis Ball', '2016-07-30 13:30:00', '2016-07-30 15:00:00', 2),
(3, '007', 'Basketball', '2016-07-26 09:00:00', '2016-07-26 11:00:00', 3),
(4, '008', 'Tennis Net', '2016-07-28 08:30:00', '2016-07-28 10:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblreservefaci`
--

CREATE TABLE `tblreservefaci` (
  `strReserveFaci` int(10) UNSIGNED NOT NULL,
  `strResReservationID` varchar(25) NOT NULL,
  `strResFaciControlNo` varchar(25) NOT NULL,
  `dtmResDateofUseFrom` datetime NOT NULL,
  `dtmResDateofUseTo` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblreservefaci`
--

INSERT INTO `tblreservefaci` (`strReserveFaci`, `strResReservationID`, `strResFaciControlNo`, `dtmResDateofUseFrom`, `dtmResDateofUseTo`) VALUES
(1, '001', '5', '2016-07-30 07:00:00', '2016-07-30 10:00:00'),
(2, '002', '3', '2016-07-30 09:00:00', '2016-07-30 12:30:00'),
(3, '006', '4', '2016-07-31 07:00:00', '2016-07-31 09:00:00'),
(4, '008', '5', '2016-07-28 08:30:00', '2016-07-28 10:00:00'),
(5, '009', '5', '2016-07-26 08:00:00', '2016-07-26 11:00:00'),
(6, '010', '5', '2016-07-30 12:00:00', '2016-07-30 14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblreturnequip`
--

CREATE TABLE `tblreturnequip` (
  `strReturnEquip` int(10) UNSIGNED NOT NULL,
  `strReservationID` varchar(25) NOT NULL,
  `strEquipCode` varchar(25) NOT NULL,
  `dtmReturnDate` date NOT NULL,
  `intReturned` int(3) NOT NULL,
  `intUnreturned` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblreturnequip`
--

INSERT INTO `tblreturnequip` (`strReturnEquip`, `strReservationID`, `strEquipCode`, `dtmReturnDate`, `intReturned`, `intUnreturned`) VALUES
(1, '002', 'Tennis Ball', '2016-07-30', 0, 2),
(2, '003', 'Tennis Ball', '2016-07-30', 0, 2),
(3, '007', 'Basketball', '2016-07-26', 5, -2),
(4, '008', 'Tennis Net', '2016-07-28', 2, -1);

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
  `strVCdocReqID` varchar(25) NOT NULL,
  `strVCplateNo` varchar(25) NOT NULL,
  `strVCvehicleStat` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`strBSbusinessID`),
  ADD KEY `strDocRequestID_idx` (`strBSdocRequestID`);

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
-- Indexes for table `tbldocument`
--
ALTER TABLE `tbldocument`
  ADD PRIMARY KEY (`strDocCode`);

--
-- Indexes for table `tbldocumentpurpose`
--
ALTER TABLE `tbldocumentpurpose`
  ADD PRIMARY KEY (`strDocPurposeID`,`strDocID`),
  ADD KEY `strDocID_idx` (`strDocID`);

--
-- Indexes for table `tbldocumentrequest`
--
ALTER TABLE `tbldocumentrequest`
  ADD PRIMARY KEY (`strDocRequestID`),
  ADD KEY `strDRapplicantID_idx` (`strDRapplicantID`),
  ADD KEY `strDocPurposeID_idx` (`strDocPurposeID`),
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
  ADD PRIMARY KEY (`strFaciControlNo`),
  ADD KEY `strCategoryCode_idx` (`strFaciCategoryCode`);

--
-- Indexes for table `tblhousehold`
--
ALTER TABLE `tblhousehold`
  ADD PRIMARY KEY (`Householdno`);

--
-- Indexes for table `tblhousemember`
--
ALTER TABLE `tblhousemember`
  ADD PRIMARY KEY (`Memberno`);

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
-- Indexes for table `tblreservationrequest`
--
ALTER TABLE `tblreservationrequest`
  ADD PRIMARY KEY (`strReservationID`),
  ADD KEY `strRRapplicantID_idx` (`strRRapplicantID`);

--
-- Indexes for table `tblreserveequip`
--
ALTER TABLE `tblreserveequip`
  ADD PRIMARY KEY (`strREreserveEquip`),
  ADD KEY `strReservationID_idx` (`strREreservationID`);

--
-- Indexes for table `tblreservefaci`
--
ALTER TABLE `tblreservefaci`
  ADD PRIMARY KEY (`strReserveFaci`),
  ADD KEY `strReservationId_idx` (`strResReservationID`),
  ADD KEY `strFaciControlNo_idx` (`strResFaciControlNo`);

--
-- Indexes for table `tblreturnequip`
--
ALTER TABLE `tblreturnequip`
  ADD PRIMARY KEY (`strReturnEquip`),
  ADD KEY `strReservationID_idx` (`strReservationID`);

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
  ADD PRIMARY KEY (`strVCdocReqID`),
  ADD KEY `strVCplateNo_idx` (`strVCplateNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbusinesscate`
--
ALTER TABLE `tblbusinesscate`
  MODIFY `strBusCatergory` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `strCategoryCode` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tblequipment`
--
ALTER TABLE `tblequipment`
  MODIFY `strEquipNo` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tblfacility`
--
ALTER TABLE `tblfacility`
  MODIFY `strFaciControlNo` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tblpaymentdetail`
--
ALTER TABLE `tblpaymentdetail`
  MODIFY `intNum` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tblreserveequip`
--
ALTER TABLE `tblreserveequip`
  MODIFY `strREreserveEquip` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblreservefaci`
--
ALTER TABLE `tblreservefaci`
  MODIFY `strReserveFaci` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblreturnequip`
--
ALTER TABLE `tblreturnequip`
  MODIFY `strReturnEquip` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbrgyofficial`
--
ALTER TABLE `tblbrgyofficial`
  ADD CONSTRAINT `strbrgyofficial` FOREIGN KEY (`strOfficerID`) REFERENCES `tblaccount` (`strOfficerID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblbusinessstat`
--
ALTER TABLE `tblbusinessstat`
  ADD CONSTRAINT `strBSBusinessID` FOREIGN KEY (`strBSbusinessID`) REFERENCES `tblbusiness` (`strBusinessID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `strBSdocRequestID` FOREIGN KEY (`strBSdocRequestID`) REFERENCES `tbldocumentrequest` (`strDocRequestID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblctc`
--
ALTER TABLE `tblctc`
  ADD CONSTRAINT `strDocRequestID` FOREIGN KEY (`strDocRequestID`) REFERENCES `tbldocumentrequest` (`strDocRequestID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbldocumentpurpose`
--
ALTER TABLE `tbldocumentpurpose`
  ADD CONSTRAINT `strDocID` FOREIGN KEY (`strDocID`) REFERENCES `tbldocument` (`strDocCode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblofficialposition`
--
ALTER TABLE `tblofficialposition`
  ADD CONSTRAINT `postion` FOREIGN KEY (`strPositionName`) REFERENCES `tblbrgyposition` (`strPositionnName`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `strOfficeriD` FOREIGN KEY (`strOfficerID`) REFERENCES `tblbrgyofficial` (`strOfficerID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblstreetpermit`
--
ALTER TABLE `tblstreetpermit`
  ADD CONSTRAINT `strDocReqID` FOREIGN KEY (`strSPdocReqID`) REFERENCES `tbldocumentrequest` (`strDocRequestID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbltru`
--
ALTER TABLE `tbltru`
  ADD CONSTRAINT `strTRUplateNo` FOREIGN KEY (`strTRUplateNo`) REFERENCES `tblvehicle` (`strVplateNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblvehihcleclearance`
--
ALTER TABLE `tblvehihcleclearance`
  ADD CONSTRAINT `strVCDocReqID` FOREIGN KEY (`strVCdocReqID`) REFERENCES `tbldocumentrequest` (`strDocRequestID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `strVCplateNo` FOREIGN KEY (`strVCplateNo`) REFERENCES `tblvehicle` (`strVplateNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
