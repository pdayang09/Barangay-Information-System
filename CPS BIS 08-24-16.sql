-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2016 at 01:03 PM
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
  `strStatus` varchar(25) NOT NULL,
  `strSign` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`strOfficerID`, `intForeignMemberNo`, `strUsername`, `strPassword`, `intForeignPositionId`, `strEmailAdd`, `dtStart`, `dtEnd`, `strStatus`, `strSign`) VALUES
(1, 3, 'o''hara_donnell', '123456', 1, 'aa@gmail.com', '2016-09-09', '2019-09-09', 'Enabled', 'Images/OfficerSign/ohara_donnell.jpg'),
(2, 1, 'o''hara_eva', '45678', 2, 'gg@gmail.com', '2016-09-12', '2019-09-12', 'Enabled', 'Images/OfficerSign/ohara_eva.PNG'),
(9, 9, 'martinez_jennica', '768905', 3, '', '2016-09-12', '2019-09-12', 'Enabled', 'Images/OfficerSign/martinez_jennica.PNG');

--
-- Triggers `tblaccount`
--
DELIMITER $$
CREATE TRIGGER `account_add` AFTER INSERT ON `tblaccount` FOR EACH ROW BEGIN
DECLARE name varchar(100);
Set @name = (Select concat(strFirstName,' ',strMiddleName,' ',strLastName,' ',strNameExtension) as 'Name' from tblhouseMember as a inner join tblaccount as b on a.intMemberNo = b.intForeignMemberNo where strOfficerId =  @a);

Insert into `tblaudittrail`(strEmployee,strChange,strTable,dtDate) values(@name,'Insert','tblAccount',NOW());



END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `account_edit` AFTER UPDATE ON `tblaccount` FOR EACH ROW BEGIN
DECLARE name varchar(100);
Set @name = (Select concat(strFirstName,' ',strMiddleName,' ',strLastName,' ',strNameExtension) as 'Name' from tblhouseMember as a inner join tblaccount as b on a.intMemberNo = b.intForeignMemberNo where strOfficerId =  @a);

Insert into `tblaudittrail`(strEmployee,strChange,strTable,dtDate) values(@name,'Update','tblAccount',NOW());



END
$$
DELIMITER ;

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
-- Table structure for table `tblaudittrail`
--

CREATE TABLE `tblaudittrail` (
  `intAuditNo` int(11) NOT NULL,
  `strEmployee` varchar(100) NOT NULL,
  `strChange` varchar(100) NOT NULL,
  `strTable` varchar(100) NOT NULL,
  `dtDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblaudittrail`
--

INSERT INTO `tblaudittrail` (`intAuditNo`, `strEmployee`, `strChange`, `strTable`, `dtDate`) VALUES
(1, 'Eva Sta Maria O''Hara ', 'Update', 'tblbrgyPosition', '2016-09-12 17:19:50'),
(2, 'Eva Sta Maria O''Hara ', 'Update', 'tblStreet', '2016-09-12 17:20:43'),
(3, 'Eva Sta Maria O''Hara ', 'Insert', 'tblStreet', '2016-09-12 17:21:02'),
(4, 'Eva Sta Maria O''Hara ', 'Insert', 'tblAccount', '2016-09-12 17:30:07'),
(5, 'Eva Sta Maria O''Hara ', 'Insert', 'tblAccount', '2016-09-12 17:33:18'),
(6, 'Eva Sta Maria O''Hara ', 'Insert', 'tblAccount', '2016-09-12 17:34:14'),
(7, 'Eva Sta Maria O''Hara ', 'Update', 'tblAccount', '2016-09-12 17:38:31'),
(8, 'Eva Sta Maria O''Hara ', 'Update', 'tblAccount', '2016-09-12 17:39:14'),
(9, 'Eva Sta Maria O''Hara ', 'Update', 'tblAccount', '2016-09-12 17:39:31'),
(10, 'Eva Sta Maria O''Hara ', 'Update', 'tblbrgyPosition', '2016-09-12 17:40:27'),
(11, 'Eva Sta Maria O''Hara ', 'Insert', 'tbldocumenttemplate', '2016-09-12 17:43:07'),
(12, 'Eva Sta Maria O''Hara ', 'Insert', 'tbldocumenttemplate', '2016-09-12 17:45:04'),
(13, 'Eva Sta Maria O''Hara ', 'Update', 'tblbusinesscate', '2016-09-12 17:56:31'),
(14, 'Eva Sta Maria O''Hara ', 'Update', 'tblbusinesscate', '2016-09-12 17:56:38'),
(15, 'Eva Sta Maria O''Hara ', 'Insert', 'tblbusinesscate', '2016-09-12 17:57:00'),
(16, 'Eva Sta Maria O''Hara ', 'Update', 'tblbusinesssignage', '2016-09-12 18:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `tblbrgyposition`
--

CREATE TABLE `tblbrgyposition` (
  `intPositionId` int(11) NOT NULL,
  `strPositionName` varchar(45) NOT NULL,
  `strView` varchar(25) NOT NULL,
  `intNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblbrgyposition`
--

INSERT INTO `tblbrgyposition` (`intPositionId`, `strPositionName`, `strView`, `intNumber`) VALUES
(1, 'Secretary', 'Kap', 1),
(2, 'Barangay Captain', 'Kap', 1),
(3, 'Laiason', 'Liason', 1),
(4, 'Administrator', 'Admin', 4),
(5, 'Clerk', 'Sec', 1),
(6, 'Treasurer', 'Liason', 1),
(7, 'Engineer', 'Sec', 1);

--
-- Triggers `tblbrgyposition`
--
DELIMITER $$
CREATE TRIGGER `position_add` AFTER INSERT ON `tblbrgyposition` FOR EACH ROW BEGIN
DECLARE name varchar(100);
Set @name = (Select concat(strFirstName,' ',strMiddleName,' ',strLastName,' ',strNameExtension) as 'Name' from tblhouseMember as a inner join tblaccount as b on a.intMemberNo = b.intForeignMemberNo where strOfficerId =  @a);

Insert into `tblaudittrail`(strEmployee,strChange,strTable,dtDate) values(@name,'Insert','tblbrgyPosition',NOW());



END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `position_edit` AFTER UPDATE ON `tblbrgyposition` FOR EACH ROW BEGIN
DECLARE name varchar(100);
Set @name = (Select concat(strFirstName,' ',strMiddleName,' ',strLastName,' ',strNameExtension) as 'Name' from tblhouseMember as a inner join tblaccount as b on a.intMemberNo = b.intForeignMemberNo where strOfficerId =  @a);

Insert into `tblaudittrail`(strEmployee,strChange,strTable,dtDate) values(@name,'Update','tblbrgyPosition',NOW());



END
$$
DELIMITER ;

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
  `intSingleSignage` int(1) NOT NULL,
  `intSingleSize` int(11) NOT NULL,
  `intDoubleSignage` int(1) NOT NULL,
  `intDoubleSize` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblbusiness`
--

INSERT INTO `tblbusiness` (`strBusinessID`, `strBusinessName`, `strBusinessCateID`, `strBusinessDesc`, `strBusinessLocation`, `strBusinessContactPerson`, `strContactNum`, `intSingleSignage`, `intSingleSize`, `intDoubleSignage`, `intDoubleSize`) VALUES
(5, 'Ala Eh Petshop', '3', '', 'Carolina Street, Purok 1', 'Jan Ala', '7906', 1, 10, 1, 10);

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
(3, 'Pet Shop', 1000, 'Disabled'),
(5, 'Clean', 800.05, 'Enabled'),
(6, 'Restaurant', 999.95, 'Enable'),
(7, 'Bookstore', 190, 'Enabled');

--
-- Triggers `tblbusinesscate`
--
DELIMITER $$
CREATE TRIGGER `businesscategory_add` AFTER INSERT ON `tblbusinesscate` FOR EACH ROW BEGIN
DECLARE name varchar(100);
Set @name = (Select concat(strFirstName,' ',strMiddleName,' ',strLastName,' ',strNameExtension) as 'Name' from tblhouseMember as a inner join tblaccount as b on a.intMemberNo = b.intForeignMemberNo where strOfficerId =  @a);

Insert into `tblaudittrail`(strEmployee,strChange,strTable,dtDate) values(@name,'Insert','tblbusinesscate',NOW());



END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `businesscategory_edit` AFTER UPDATE ON `tblbusinesscate` FOR EACH ROW BEGIN
DECLARE name varchar(100);
Set @name = (Select concat(strFirstName,' ',strMiddleName,' ',strLastName,' ',strNameExtension) as 'Name' from tblhouseMember as a inner join tblaccount as b on a.intMemberNo = b.intForeignMemberNo where strOfficerId =  @a);

Insert into `tblaudittrail`(strEmployee,strChange,strTable,dtDate) values(@name,'Update','tblbusinesscate',NOW());



END
$$
DELIMITER ;

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
(1, 'Single-faced', 40),
(2, 'Double-faced', 50);

--
-- Triggers `tblbusinesssignage`
--
DELIMITER $$
CREATE TRIGGER `signage_edit` AFTER UPDATE ON `tblbusinesssignage` FOR EACH ROW BEGIN
DECLARE name varchar(100);
Set @name = (Select concat(strFirstName,' ',strMiddleName,' ',strLastName,' ',strNameExtension) as 'Name' from tblhouseMember as a inner join tblaccount as b on a.intMemberNo = b.intForeignMemberNo where strOfficerId =  @a);

Insert into `tblaudittrail`(strEmployee,strChange,strTable,dtDate) values(@name,'Update','tblbusinesssignage',NOW());



END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tblbusinessstat`
--

CREATE TABLE `tblbusinessstat` (
  `strBusStatID` int(11) NOT NULL,
  `strBusinessID` int(11) NOT NULL,
  `strBusOwnerID` varchar(25) NOT NULL,
  `strBSbusinessStat` varchar(45) NOT NULL,
  `intBusinessDoc` int(11) NOT NULL,
  `datBCStat` date NOT NULL,
  `strClearanceStat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblbusinessstat`
--

INSERT INTO `tblbusinessstat` (`strBusStatID`, `strBusinessID`, `strBusOwnerID`, `strBSbusinessStat`, `intBusinessDoc`, `datBCStat`, `strClearanceStat`) VALUES
(50, 5, '1', 'New', 3, '2016-09-09', 'Paid'),
(51, 5, '1', 'Renewal', 7, '2016-09-09', 'Paid'),
(52, 6, '1', 'New', 3, '2016-09-09', 'Unpaid');

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
(8, 'Other Things', 'Equipment'),
(9, 'Electronics', 'Equipment');

--
-- Triggers `tblcategory`
--
DELIMITER $$
CREATE TRIGGER `category_add` AFTER INSERT ON `tblcategory` FOR EACH ROW BEGIN
DECLARE name varchar(100);
Set @name = (Select concat(strFirstName,' ',strMiddleName,' ',strLastName,' ',strNameExtension) as 'Name' from tblhouseMember as a inner join tblaccount as b on a.intMemberNo = b.intForeignMemberNo where strOfficerId =  @a);

Insert into `tblaudittrail`(strEmployee,strChange,strTable,dtDate) values(@name,'Insert','tblcategory',NOW());



END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `category_edit` AFTER UPDATE ON `tblcategory` FOR EACH ROW BEGIN
DECLARE name varchar(100);
Set @name = (Select concat(strFirstName,' ',strMiddleName,' ',strLastName,' ',strNameExtension) as 'Name' from tblhouseMember as a inner join tblaccount as b on a.intMemberNo = b.intForeignMemberNo where strOfficerId =  @a);

Insert into `tblaudittrail`(strEmployee,strChange,strTable,dtDate) values(@name,'Update','tblcategory',NOW());



END
$$
DELIMITER ;

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
(1, 'for whatever purpose', 200),
(2, 'Funeral', 300),
(3, 'Local Employment', 50),
(4, 'Scholarship', 2000000000),
(5, 'PAO', 150),
(6, 'CCIS', 0),
(7, 'Hos', 0),
(8, 'House', 20);

--
-- Triggers `tbldocumentpurpose`
--
DELIMITER $$
CREATE TRIGGER `purpose_add` AFTER INSERT ON `tbldocumentpurpose` FOR EACH ROW BEGIN
DECLARE name varchar(100);
Set @name = (Select concat(strFirstName,' ',strMiddleName,' ',strLastName,' ',strNameExtension) as 'Name' from tblhouseMember as a inner join tblaccount as b on a.intMemberNo = b.intForeignMemberNo where strOfficerId =  @a);

Insert into `tblaudittrail`(strEmployee,strChange,strTable,dtDate) values(@name,'Insert','tbldocumentpurpose',NOW());



END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `purpose_edit` AFTER UPDATE ON `tbldocumentpurpose` FOR EACH ROW BEGIN
DECLARE name varchar(100);
Set @name = (Select concat(strFirstName,' ',strMiddleName,' ',strLastName,' ',strNameExtension) as 'Name' from tblhouseMember as a inner join tblaccount as b on a.intMemberNo = b.intForeignMemberNo where strOfficerId =  @a);

Insert into `tblaudittrail`(strEmployee,strChange,strTable,dtDate) values(@name,'Update','tbldocumentpurpose',NOW());



END
$$
DELIMITER ;

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
(3, '2', '3', '1', '2016-09-05', 'Paid', 'Local Employment', ''),
(4, '5', '3', '1', '2016-09-05', 'Paid', 'Digging', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbldocumenttemplate`
--

CREATE TABLE `tbldocumenttemplate` (
  `intTemplate_ID` int(11) NOT NULL,
  `strTemplate_Name` varchar(50) NOT NULL,
  `strTemplate_Path` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `dblEquipNResidentCharge` double NOT NULL,
  `strStatus` varchar(10) NOT NULL,
  `imageUpload` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblequipment`
--

INSERT INTO `tblequipment` (`strEquipNo`, `strEquipName`, `strEquipCategory`, `intEquipQuantity`, `dblEquipFee`, `dblEquipNResidentCharge`, `strStatus`, `imageUpload`) VALUES
(11, 'Badminton Racket', '5', 5, 30, 50, 'Enabled', '20160907050708.JPG'),
(12, 'Tennis Racket', '5', 3, 30, 50, 'Enabled', '20160907050734.jpg'),
(13, 'Basketball', '7', 4, 40, 70, 'Enabled', '20160907050809.png'),
(14, 'Shuttlecock', '8', 10, 20, 30, 'Enabled', '20160907050836.jpeg'),
(15, 'Tennis ball', '7', 10, 20, 30, 'Enabled', '20160907050928.jpg'),
(16, 'Digital Score Board', '6', 2, 100, 120, 'Enabled', '20160907050952.jpg');

--
-- Triggers `tblequipment`
--
DELIMITER $$
CREATE TRIGGER `equipment_add` AFTER INSERT ON `tblequipment` FOR EACH ROW BEGIN
DECLARE name varchar(100);
Set @name = (Select concat(strFirstName,' ',strMiddleName,' ',strLastName,' ',strNameExtension) as 'Name' from tblhouseMember as a inner join tblaccount as b on a.intMemberNo = b.intForeignMemberNo where strOfficerId =  @a);

Insert into `tblaudittrail`(strEmployee,strChange,strTable,dtDate) values(@name,'Insert','tblEquipment',NOW());



END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `equipment_edit` AFTER UPDATE ON `tblequipment` FOR EACH ROW BEGIN
DECLARE name varchar(100);
Set @name = (Select concat(strFirstName,' ',strMiddleName,' ',strLastName,' ',strNameExtension) as 'Name' from tblhouseMember as a inner join tblaccount as b on a.intMemberNo = b.intForeignMemberNo where strOfficerId =  @a);

Insert into `tblaudittrail`(strEmployee,strChange,strTable,dtDate) values(@name,'Update','tblEquipment',NOW());



END
$$
DELIMITER ;

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
  `dblFaciNResidentCharge` double DEFAULT NULL,
  `imageUpload` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblfacility`
--

INSERT INTO `tblfacility` (`strFaciNo`, `strFaciName`, `strFaciCategory`, `strFaciStatus`, `dblFaciDayCharge`, `dblFaciNightCharge`, `dblFaciNResidentCharge`, `imageUpload`) VALUES
(13, 'Basketball Court', '1', 'Good Condition', 300, 350, 400, '20160907045531.jpg'),
(14, 'Badminton Court', '1', 'Good Condition', 300, 350, 400, '20160907045602.jpg'),
(15, 'Multi-Purpose Hall', '3', 'Good Condition', 400, 450, 500, '20160907045628.jpg'),
(16, 'Tennis Court', '2', 'Good Condition', 250, 300, 350, '20160907045655.jpg');

--
-- Triggers `tblfacility`
--
DELIMITER $$
CREATE TRIGGER `facility_add` AFTER INSERT ON `tblfacility` FOR EACH ROW BEGIN
DECLARE name varchar(100);
Set @name = (Select concat(strFirstName,' ',strMiddleName,' ',strLastName,' ',strNameExtension) as 'Name' from tblhouseMember as a inner join tblaccount as b on a.intMemberNo = b.intForeignMemberNo where strOfficerId =  @a);

Insert into `tblaudittrail`(strEmployee,strChange,strTable,dtDate) values(@name,'Insert','tblFacility',NOW());



END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `facility_edit` AFTER UPDATE ON `tblfacility` FOR EACH ROW BEGIN
DECLARE name varchar(100);
Set @name = (Select concat(strFirstName,' ',strMiddleName,' ',strLastName,' ',strNameExtension) as 'Name' from tblhouseMember as a inner join tblaccount as b on a.intMemberNo = b.intForeignMemberNo where strOfficerId =  @a);

Insert into `tblaudittrail`(strEmployee,strChange,strTable,dtDate) values(@name,'Update','tblfacility',NOW());



END
$$
DELIMITER ;

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
(1, '554 Interior 1', 1, 'O''Hara', 'Owned', '221 Marie Street, Brgy Santo', 'Enabled'),
(2, 'Blk 74 Lot 15 ', 1, 'Boleche', 'Rent', 'Blk 74 Lot 15 Juniper St., Robinsons Homes East Subdivision', 'Enabled'),
(3, 'Blk 74 Lot 15 ', 2, 'Morcilla', 'Owned', 'Blk 74 Lot 15 Juniper St., Robinsons Homes East Subdivision', 'Enabled');

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
  `strLiterate` varchar(25) NOT NULL,
  `strEdAttain` varchar(100) NOT NULL,
  `charDisable` char(1) NOT NULL,
  `dtEntered` date NOT NULL,
  `strImage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblhousemember`
--

INSERT INTO `tblhousemember` (`intMemberNo`, `strFirstName`, `strMiddleName`, `strLastName`, `strNameExtension`, `charGender`, `dtBirthdate`, `strContactNo`, `strOccupation`, `strSSSNo`, `strTINNo`, `strVotersId`, `intForeignHouseholdNo`, `strCivilStatus`, `strStatus`, `strLifeStatus`, `strLiterate`, `strEdAttain`, `charDisable`, `dtEntered`, `strImage`) VALUES
(1, 'Eva', 'Sta Maria', 'O''Hara', '', 'F', '1984-01-01', '09121231312', 'Accountant', '23181', '321321', '122342', 1, 'Single', 'Head', 'Alive', 'Y', '', 'N', '2016-09-09', 'Images/BarangayPics/Eva Sta Maria OHara -1984-01-01.jpg'),
(2, 'Carl John', '', 'O''hara', '', 'M', '2014-01-01', '', '', '', '', '', 1, 'Single', 'Children', 'Alive', '', '', '', '2016-09-09', 'Images/BarangayPics/Carl John  Ohara -2014-01-01.jpg'),
(3, 'Donnell', '', 'O''hara', '', 'M', '1983-02-02', '09213212121', 'Business Executive', '32123', '213', '1231123', 1, 'Married', 'Spouse', 'Alive', '', '', '', '2016-09-09', 'Images/BarangayPics/Donnell  Ohara -1983-02-02.JPG'),
(4, 'Lolita', 'Esteban', 'Scar''o-San Luis', '', 'F', '1993-02-02', '', '', '', '', '', 1, 'Single', 'Tenant', 'Alive', 'Y', '', 'N', '2016-09-09', 'Images/BarangayPics/Lolita Esteban Scaro-San Luis -1993-02-02.jpg'),
(5, 'Kimmy', '', 'O''hara', '', 'F', '2011-01-01', '', '', '', '', '', 1, 'Single', 'Children', 'Alive', '', '', '', '2016-09-09', ''),
(6, 'Mae Ann', '', 'Boleche', '', 'M', '1985-09-21', '09062759022', '', '', '', '', 2, 'Single', 'Head', 'Alive', 'Y', '', 'N', '2016-09-09', 'Images/BarangayPics/Mae Ann  Boleche Julie Grace Morcilla-1985-09-21.jpg'),
(7, 'Mark', '', 'Boleche', '', 'M', '1978-01-01', '', '', '', '', '', 2, 'Single', 'Spouse', 'Alive', '', '', 'N', '2016-09-09', 'Images/BarangayPics/Mark  Boleche -1978-01-01.jpg'),
(8, 'Mark Anthony', '', 'Boleche', '', 'M', '2016-01-01', '', '', '', '', '', 2, 'Single', 'Children', 'Alive', '', '', 'N', '2016-09-09', 'Images/BarangayPics/Mark Anthony  Boleche -2016-01-01.jpg'),
(9, 'Jennica', '', 'Martinez', '', 'F', '1992-01-01', '09321432432', 'Waitress', '213', '123', '123', 2, 'Single', 'Tenant', 'Alive', 'Y', '', 'N', '2016-09-09', 'Images/BarangayPics/Jennica  Martinez -1992-01-01.jpg'),
(10, 'Delia', 'Zafra', 'Morcilla', '', 'M', '1957-01-01', '09062759022', '', '', '', '', 3, 'Single', 'Head', 'Alive', 'Undergraduate', 'Grade 9', 'N', '2016-09-09', 'Images/BarangayPics/Delia Zafra Morcilla -1957-01-01.jpg'),
(11, 'Mark', '', 'Morcilla', '', 'F', '1992-01-01', '', '', '', '', '', 3, 'Single', 'Spouse', 'Alive', 'Graduated', 'Grade 12', 'N', '2016-09-09', 'Images/BarangayPics/Mark  Morcilla -1992-01-01.png'),
(12, 'Jenny', '', 'Morcilla', '', 'F', '2005-01-01', '', '', '', '', '', 3, 'Single', 'Children', 'Alive', 'Currently Studying', 'Grade 11', 'Y', '2016-09-09', 'Images/BarangayPics/Jenny  Morcilla -2005-01-01.JPG'),
(13, 'Sierra', 'Trece', 'Martinez', '', 'F', '1987-01-01', '', 'Vendor', '', '', '', 3, 'Widower/Widow', 'Tenant', 'Alive', 'No Educational Attainment', 'None', 'N', '2016-09-09', 'Images/BarangayPics/Sierra Trece Martinez -1987-01-01.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `tblpaymentdetail`
--

CREATE TABLE `tblpaymentdetail` (
  `intNum` int(10) UNSIGNED NOT NULL,
  `strRequestID` varchar(25) NOT NULL,
  `dblReqPayment` double NOT NULL,
  `intRequestORNo` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpaymentdetail`
--

INSERT INTO `tblpaymentdetail` (`intNum`, `strRequestID`, `dblReqPayment`, `intRequestORNo`) VALUES
(1, '001', 100, '001'),
(2, '002', 1, '002'),
(3, '003', 500, '003'),
(5, '004', 150, '004'),
(7, '006', 2, '006'),
(8, '006', 2, '006'),
(9, '007', 500, '007'),
(10, '008', 2, '008');

-- --------------------------------------------------------

--
-- Table structure for table `tblpaymenttrans`
--

CREATE TABLE `tblpaymenttrans` (
  `intORNo` varchar(11) NOT NULL,
  `dtmPaymentDate` date NOT NULL,
  `dblPaymentAmount` double NOT NULL,
  `dblPaidAmount` double NOT NULL,
  `dblRemaining` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpaymenttrans`
--

INSERT INTO `tblpaymenttrans` (`intORNo`, `dtmPaymentDate`, `dblPaymentAmount`, `dblPaidAmount`, `dblRemaining`) VALUES
('001', '2016-09-01', 100, 100, 0),
('002', '0000-00-00', 1, 0, 1),
('003', '2016-09-01', 500, 500, 0),
('004', '0000-00-00', 150, 0, 150),
('006', '2016-08-31', 2, 2, 0),
('008', '0000-00-00', 2, 0, 2);

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
('001', '', ' app003', '2016-08-31', '2016-08-31', 1472655600000, 1472655600000, 'Paid', 'Practice'),
('002', '4', '', '2016-08-31', '2016-08-31', 1472655600000, 1472677200000, 'For Approval', 'Drama'),
('003', '5', '', '2016-08-31', '2016-08-31', 1472655600000, 1472662800000, 'Paid', 'Practical Test'),
('004', '3', '', '2016-08-31', '2016-08-31', 1472655600000, 1472662800000, 'For Approval', 'Hiram Bola'),
('005', '7', '', '2016-08-31', '2016-09-10', 1473525000000, 1473537600000, 'Forfeited', 'Wa lang'),
('006', '', ' app002', '2016-08-31', '2016-09-13', 1473778800000, 1473786000000, 'Paid', 'Palaro'),
('007', ' app002', '', '2016-08-31', '2016-09-10', 1473526800000, 1473534000000, 'For Approval', 'nhcka'),
('008', '', ' app001', '2016-09-01', '2016-09-10', 1473525000000, 1473534000000, 'Approved', 'fjsdofj');

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
(1, '001', 'Tennis Ball', '2016-08-31 08:00:00', '2016-08-31 08:00:00', 2),
(2, '003', 'Volleyball Net', '2016-08-31 08:00:00', '2016-08-31 10:00:00', 2),
(3, '004', 'Volleyball', '2016-08-31 08:00:00', '2016-08-31 10:00:00', 3);

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
(2, '002', '5', '2016-08-31 08:00:00', '2016-08-31 14:00:00'),
(3, '003', '3', '2016-08-31 08:00:00', '2016-08-31 10:00:00'),
(7, '006', '5', '2016-09-13 08:00:00', '2016-09-13 10:00:00'),
(9, '007', '2', '2016-09-10 10:00:00', '2016-09-10 12:00:00'),
(10, '008', '5', '2016-09-10 09:30:00', '2016-09-10 12:00:00');

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
(1, '001', 'Tennis Ball', '2016-08-31', 0, 2),
(2, '003', 'Volleyball Net', '2016-08-31', 0, 2),
(3, '004', 'Volleyball', '2016-08-31', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tblstreet`
--

CREATE TABLE `tblstreet` (
  `intStreetId` int(25) NOT NULL,
  `strPurok` varchar(25) NOT NULL,
  `strStreetName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstreet`
--

INSERT INTO `tblstreet` (`intStreetId`, `strPurok`, `strStreetName`) VALUES
(1, 'Purok 2', 'Carolinas Street'),
(2, 'Purok 2', 'Quezona Street'),
(4, 'Purok 1', 'Manyaman Street'),
(5, 'Purok 2', 'Markama Street'),
(6, 'Purok 3', 'Yemen Street'),
(7, 'Purok 3', 'Sanchez Street'),
(8, 'Purok 3', 'Cruz Street'),
(10, 'Purok 3', 'Lazaro Street'),
(11, 'Purok 1', 'Sta Ana Street'),
(12, 'Purok 1', 'Sta Cruz Street'),
(13, 'Purok 1', 'Martinez Street');

--
-- Triggers `tblstreet`
--
DELIMITER $$
CREATE TRIGGER `street_add` AFTER INSERT ON `tblstreet` FOR EACH ROW BEGIN
DECLARE name varchar(100);
Set @name = (Select concat(strFirstName,' ',strMiddleName,' ',strLastName,' ',strNameExtension) as 'Name' from tblhouseMember as a inner join tblaccount as b on a.intMemberNo = b.intForeignMemberNo where strOfficerId =  @a);

Insert into `tblaudittrail`(strEmployee,strChange,strTable,dtDate) values(@name,'Insert','tblStreet',NOW());



END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `street_edit` AFTER UPDATE ON `tblstreet` FOR EACH ROW BEGIN
DECLARE name varchar(100);
Set @name = (Select concat(strFirstName,' ',strMiddleName,' ',strLastName,' ',strNameExtension) as 'Name' from tblhouseMember as a inner join tblaccount as b on a.intMemberNo = b.intForeignMemberNo where strOfficerId =  @a);

Insert into `tblaudittrail`(strEmployee,strChange,strTable,dtDate) values(@name,'Update','tblStreet',NOW());



END
$$
DELIMITER ;

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
(2, 'SLRTODA', 'San Lorenzo Ruiz TODA'),
(3, 'RHEHAI', 'Robinson Homes TODA');

--
-- Triggers `tbltoda`
--
DELIMITER $$
CREATE TRIGGER `toda_add` AFTER INSERT ON `tbltoda` FOR EACH ROW BEGIN
DECLARE name varchar(100);
Set @name = (Select concat(strFirstName,' ',strMiddleName,' ',strLastName,' ',strNameExtension) as 'Name' from tblhouseMember as a inner join tblaccount as b on a.intMemberNo = b.intForeignMemberNo where strOfficerId =  @a);

Insert into `tblaudittrail`(strEmployee,strChange,strTable,dtDate) values(@name,'Insert','tblToda',NOW());



END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `toda_delete` AFTER DELETE ON `tbltoda` FOR EACH ROW BEGIN
DECLARE name varchar(100);
Set @name = (Select concat(strFirstName,' ',strMiddleName,' ',strLastName,' ',strNameExtension) as 'Name' from tblhouseMember as a inner join tblaccount as b on a.intMemberNo = b.intForeignMemberNo where strOfficerId =  @a);

Insert into `tblaudittrail`(strEmployee,strChange,strTable,dtDate) values(@name,'Delete','tblToda',NOW());



END
$$
DELIMITER ;

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
('RTU 120', 1),
('RTU 123', 1);

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
  `strVehicleColor` varchar(25) NOT NULL,
  `intVehicleType` int(1) NOT NULL,
  `strVehicleStat` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblvehicle`
--

INSERT INTO `tblvehicle` (`strVplateNo`, `strOperatorName`, `strOwnerName`, `strVehicleModel`, `strMotorNo`, `strChassisNo`, `strVehicleNo`, `strVehicleColor`, `intVehicleType`, `strVehicleStat`) VALUES
('RTU 120', 'Jan Ala', 'Perez, Matteo Ting Jr', 'Hyundai 567', 'KMYH 2134', 'KMYH 2134', '098', 'YELLOW', 1, 'Active'),
('RTU 123', 'Jan Ala', 'Perez, Matteo Ting Jr', 'Hyundai 567', 'KMYH 2134', 'KMYH 2134', '098', 'YELLOW', 1, 'Active'),
('UTI 008', 'Jan Ala', 'Perez, Matteo Ting Jr', 'Hyundai 567', 'KMYH 2134', 'KMYH 2134', '098', '', 0, 'Active');

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
(1, 'RTU 123', 'New', '2016-09-05', 'Paid', 3),
(2, 'RTU 120', 'New', '2016-09-07', 'Paid', 3),
(3, 'UTI 008', 'New', '2016-09-07', 'Paid', 3);

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
-- Indexes for table `tblaudittrail`
--
ALTER TABLE `tblaudittrail`
  ADD PRIMARY KEY (`intAuditNo`);

--
-- Indexes for table `tblbrgyposition`
--
ALTER TABLE `tblbrgyposition`
  ADD PRIMARY KEY (`intPositionId`);

--
-- Indexes for table `tblbusiness`
--
ALTER TABLE `tblbusiness`
  ADD PRIMARY KEY (`strBusinessID`),
  ADD UNIQUE KEY `strBusinessName` (`strBusinessName`),
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
-- Indexes for table `tbldocumenttemplate`
--
ALTER TABLE `tbldocumenttemplate`
  ADD PRIMARY KEY (`intTemplate_ID`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
  MODIFY `strOfficerID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tblaudittrail`
--
ALTER TABLE `tblaudittrail`
  MODIFY `intAuditNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tblbrgyposition`
--
ALTER TABLE `tblbrgyposition`
  MODIFY `intPositionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tblbusiness`
--
ALTER TABLE `tblbusiness`
  MODIFY `strBusinessID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblbusinesscate`
--
ALTER TABLE `tblbusinesscate`
  MODIFY `strBusCatergory` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tblbusinesssignage`
--
ALTER TABLE `tblbusinesssignage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblbusinessstat`
--
ALTER TABLE `tblbusinessstat`
  MODIFY `strBusStatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `strCategoryCode` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
  MODIFY `intDocPurposeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbldocumentrequest`
--
ALTER TABLE `tbldocumentrequest`
  MODIFY `strDocRequestID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbldocumenttemplate`
--
ALTER TABLE `tbldocumenttemplate`
  MODIFY `intTemplate_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tblequipment`
--
ALTER TABLE `tblequipment`
  MODIFY `strEquipNo` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tblfacility`
--
ALTER TABLE `tblfacility`
  MODIFY `strFaciNo` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tblhousehold`
--
ALTER TABLE `tblhousehold`
  MODIFY `intHouseholdNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblhousemember`
--
ALTER TABLE `tblhousemember`
  MODIFY `intMemberNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tblpaymentdetail`
--
ALTER TABLE `tblpaymentdetail`
  MODIFY `intNum` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tblrequirements`
--
ALTER TABLE `tblrequirements`
  MODIFY `intReqID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tblreserveequip`
--
ALTER TABLE `tblreserveequip`
  MODIFY `strReserveEquipNo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblreservefaci`
--
ALTER TABLE `tblreservefaci`
  MODIFY `strReserveFaciNo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tblreturnequip`
--
ALTER TABLE `tblreturnequip`
  MODIFY `strReturnEquipNo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblstreet`
--
ALTER TABLE `tblstreet`
  MODIFY `intStreetId` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbltoda`
--
ALTER TABLE `tbltoda`
  MODIFY `intTODAID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblvehicleclearance`
--
ALTER TABLE `tblvehicleclearance`
  MODIFY `intID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
