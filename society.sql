-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 02, 2019 at 08:19 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `society`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `doorno` varchar(20) NOT NULL,
  `date` varchar(10) NOT NULL,
  `complaintid` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `problem` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`doorno`, `date`, `complaintid`, `type`, `problem`, `status`) VALUES
('1-E-12-799/12', '2019-11-09', '1-E-12-799/12_2019-11-09_4', 'facility', 'facility problem', 'filed'),
('1-E-12-799/12', '2019-11-09', '1-E-12-799/12_2019-11-09_5', 'miscellaneous', 'other problem', 'filed'),
('1-S-12-100/22', '2019-12-01', '1-S-12-100/22_2019-12-01_1', 'electric', 'my wiring fucked up', 'filed'),
('1-E-12-799/90', '2019-12-02', '1-E-12-799/90_2019-12-02_1', 'electric', 'electric problemi in my room', 'filed');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmpID` int(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `MobileNumber` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Salary` varchar(50) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Designation` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmpID`, `Department`, `MobileNumber`, `Email`, `Salary`, `Name`, `Designation`) VALUES
(125, 'CSE', '8840036943', 'prabhatarya646@gmail.com', '55000', 'Prabhat Kumar Arya', NULL),
(126, '494', 'aa4955498', 'a@54', '777', 'aaa', NULL),
(127, '494', 'aa4955498', 'a@54', '4946', 'aaa', NULL),
(128, '494', 'aa4955498', 'a@54', '4946', 'aaa', NULL),
(131, 'cse', '9511802278', 'mohdrahil7@gmail.com', '4444', 'roshni', 'fadf'),
(132, 'fasdf', '9511802278', 'mohdrahil7@gmail.com', '677', 'rohit', 'fa');

-- --------------------------------------------------------

--
-- Table structure for table `fundrequest`
--

CREATE TABLE `fundrequest` (
  `Department` varchar(50) NOT NULL,
  `EmployeeId` varchar(50) NOT NULL,
  `Reason` varchar(500) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `RequestID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fundrequest`
--

INSERT INTO `fundrequest` (`Department`, `EmployeeId`, `Reason`, `Amount`, `Status`, `RequestID`) VALUES
('Electrical', 'E101', 'Lift needs to be updated', 50000, 'Approved', 'R101'),
('Civil', 'E236', 'Wing needs to be coloured', 300000, 'Approved', 'R102'),
('Plumbing', 'E104', 'Wing needs another water tank for summer storage purpose', 20000, 'Approved', 'R103');

-- --------------------------------------------------------

--
-- Table structure for table `letter`
--

CREATE TABLE `letter` (
  `id` varchar(50) NOT NULL,
  `date` varchar(15) NOT NULL,
  `reciever` varchar(20) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `File` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `letter`
--

INSERT INTO `letter` (`id`, `date`, `reciever`, `subject`, `File`, `status`) VALUES
('1-E-12-799_12_2019-11-22_1', '2019-11-22', '0', 'wanted to use the society compound for family function', 'letter/1-E-12-799_12_2019-11-22_1.pdf', '1'),
('1-E-12-799_12_2019-11-22_2', '2019-11-22', 'letter_rec', 'wanted to use the society compound for family function', '', '0'),
('1-S-12-100_22_2019-12-01_3', '2019-12-01', 'letter_rec', 'wanted to use the society compound for family function', '', '0'),
('1-S-12-100_22_2019-12-01_4', '2019-12-01', '0', 'wanted to use the society compound for family function this is fun', 'letter/1-S-12-100_22_2019-12-01_4.html', '1'),
('1-S-12-100_22_2019-12-01_5', '2019-12-01', 'letter_rec', 'greater', '', '1'),
('1-S-12-100_22_2019-12-01_6', '2019-12-01', '1-E-12-799/12', 'this is done', 'letter/1-S-12-100_22_2019-12-01_6.html', '0'),
('1-S-12-100_22_2019-12-01_7', '2019-12-01', '1-E-12-799/12', 'finel', 'letter/1-S-12-100_22_2019-12-01_7.pdf', '1'),
('1-S-12-100_22_2019-12-01_8', '2019-12-01', '1-E-12-799/11', 'final is dont', 'letter/1-S-12-100_22_2019-12-01_8.pdf', '0'),
('1-S-12-100_22_2019-12-01_9', '2019-12-01', '2-N-12-100/12', 'have a dinner', 'letter/1-S-12-100_22_2019-12-01_9.pdf', '1'),
('1-E-12-799_90_2019-12-02_6', '2019-12-02', '0', 'function is on', 'letter/1-E-12-799_90_2019-12-02_6.pdf', '0'),
('1-E-12-799_90_2019-12-02_7', '2019-12-02', '1-E-12-799/90', 'testing', 'letter/1-E-12-799_90_2019-12-02_7.pdf', '0');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `doorno` varchar(20) NOT NULL,
  `monthpaid` int(11) NOT NULL,
  `interest` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `amount_to_pay` int(11) NOT NULL,
  `due_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `doorno` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fathername` varchar(50) NOT NULL,
  `mothername` varchar(50) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `contactaddress` varchar(500) NOT NULL,
  `permanentaddress` varchar(500) NOT NULL,
  `flatstatus` varchar(20) NOT NULL,
  `profilepic` varchar(50) NOT NULL,
  `adharcard` varchar(50) NOT NULL,
  `addressproof` varchar(50) NOT NULL,
  `saledeed` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`doorno`, `name`, `phone`, `email`, `fathername`, `mothername`, `occupation`, `contactaddress`, `permanentaddress`, `flatstatus`, `profilepic`, `adharcard`, `addressproof`, `saledeed`, `password`, `type`) VALUES
('1-E-12-555/12', 'kray', '9511802278', 'mohdrahil7@gmail.com', 'krayf', 'kraym', 'mtech', 'AURANGABAD MAHARASHTRA 431010', 'AURANGABAD MAHARASHTRA 431010', 'staying', 'image/1-E-12-555_12_pf.JPG', 'image/1-E-12-555_12_adhar.png', 'image/1-E-12-555_12_address.png', 'image/1-E-12-555_12_sales.png', 'rahil', 'u'),
('1-E-12-799/12', 'Khilawan', '9511802278', 'mohdrahil7@gmail.com', 'rahee', 'rehana', 'studing', 'AURANGABAD MAHARASHTRA 431010', 'patel lawns beed', 'tenant', 'image/1-E-12-799_12_pf.JPG', 'image/1-E-12-799_12_adhar.png', 'image/1-E-12-799_12_address.png', 'image/1-E-12-799_12_sales.pdf', 'roy', 'o'),
('1-E-12-799/90', 'prakash', '9511802278', 'mohdrahil7@gmail.com', 'dasi', 'taess', 'mtech', 'AURANGABAD MAHARASHTRA 431010', 'AURANGABAD MAHARASHTRA 431010', 'tenant', 'image/1-E-12-799_90_pf.png', 'image/1-E-12-799_90_adhar.png', 'image/1-E-12-799_90_address.png', 'image/1-E-12-799_90_sales.pdf', 'pet', 'u'),
('1-N-12-799/22', 'abhay', '9911802278', 'mohdrahil7@gmail.com', 'papa', 'mama', 'mtech', 'AURANGABAD MAHARASHTRA 431010', 'AURANGABAD MAHARASHTRA 431010', 'staying', 'image/1-N-12-799/22_pf.png', 'image/1-N-12-799/22_adhar.png', 'image/1-N-12-799/22_address.png', 'image/1-N-12-799/22_sales.pdf', 'abhay', 'u'),
('1-N-12-799/24', 'roy', '9511802279', 'mohdrahil7@gmail.com', 'fdsfa', 'das', 'd', 'AURANGABAD MAHARASHTRA 431010', 'AURANGABAD MAHARASHTRA 431010', 'not staying', 'image/1-N-12-799/24_pf.JPG', 'image/1-N-12-799/24_adhar.png', 'image/1-N-12-799/24_address.png', 'image/1-N-12-799/24_sales.png', '1-N-12-799/24wFCeHlhE', 'u'),
('1-N-12-799/29', 'Praver R', '9511802278', 'mohdrahil7@gmail.com', 'raheem', 'rehana', 'mtech', 'AURANGABAD MAHARASHTRA 431010', 'AURANGABAD MAHARASHTRA 431010', 'staying', 'image/1-N-12-799_29_pf.JPG', 'image/1-N-12-799_29_adhar.png', 'image/1-N-12-799_29_address.png', 'image/1-N-12-799_29_sales.pdf', 'rahil', 't'),
('1-N-12-799/89', 'rahil', '9511802278', 'mohdrahil7@gmail.com', 'dad', 'mom', 'da', 'AURANGABAD MAHARASHTRA 431010', 'AURANGABAD MAHARASHTRA 431010', 'tenant', 'image/1-N-12-799_pf.jpg', 'image/1-N-12-799_adhar.jpg', 'image/1-N-12-799_address.png', 'image/1-N-12-799_sales.png', 'um', 'u'),
('1-N-15-799/12', 'Abhinav', '9511802278', 'mohdrahil7@gmail.com', 'daf', 'fsdfa', 'dafs', 'AURANGABAD MAHARASHTRA 431010', 'AURANGABAD MAHARASHTRA 431010', 'staying', 'image/1-N-15-799_12_pf.png', 'image/1-N-15-799_12_adhar.png', 'image/1-N-15-799_12_address.png', 'image/1-N-15-799_12_sales.png', 'deo', 'p'),
('1-S-12-100/22', 'Prabhat', '9511802278', 'mohdrahil7@gmail.com', 'sec father', 'sec mother', 'student', 'AURANGABAD MAHARASHTRA 431010', 'up', 'staying', 'image/1-S-12-100_22_pf.JPG', 'image/1-S-12-100_22_adhar.png', 'image/1-S-12-100_22_address.png', 'image/1-S-12-100_22_sales.png', 'sec', 's'),
('1-S-12-799', 'raheem', '9711802278', 'mohdrahil7@gmail.com', 'afd', 'fdas', 'da', 'AURANGABAD MAHARASHTRA 431010', 'AURANGABAD MAHARASHTRA 431010', 'staying', 'image/1-S-12-799_pf.png', 'image/1-S-12-799_adhar.png', 'image/1-S-12-799_address.jpg', 'image/1-S-12-799_sales.png', 'rahil', 'u'),
('1-S-12-799/67', 'abhinav', '9511802278', 'mohdrahil7@gmail.com', 'fasd', 'fdsa', 'fsda', 'AURANGABAD MAHARASHTRA 431010', 'RH-06 INSHAL ARCADE UMER COLONY PATEL NAGAR BEHIND PATEL LAWNS BEED BY PASS\r\nAURANGABAD MAHARASHTRA 431010', 'staying', 'image/1-S-12-799_67_pf.JPG', 'image/1-S-12-799_67_adhar.png', 'image/1-S-12-799_67_address.png', 'image/1-S-12-799_67_sales.png', 'pra', 'u'),
('1-W-12-799', 'rohssn', '9711802278', 'mohdrahil7@gmail.com', 'daf', 'fd', 'fdsa', 'AURANGABAD MAHARASHTRA 431010fdsfa', 'AURANGABAD MAHARASHTRA 431010fdsfa', 'not staying', 'image/1-W-12-799_pf.JPG', 'image/1-W-12-799_adhar.png', 'image/1-W-12-799_address.png', 'image/1-W-12-799_sales.png', 'uma', 'r'),
('2-N-12-100/12', 'praver', '9521802278', 'mohdrahil7@gmail.com', 'fasd', 'daf', 'fasdf', 'AURANGABAD MAHARASHTRA 431010', 'AURANGABAD MAHARASHTRA 431010', 'staying', 'image/2-N-12-100_12_pf.png', 'image/2-N-12-100_12_adhar.png', 'image/2-N-12-100_12_address.png', 'image/2-N-12-100_12_sales.pdf', 'par', 'u');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `Id` varchar(50) NOT NULL,
  `DoorNo` varchar(50) NOT NULL,
  `Subject` varchar(200) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Date` varchar(15) NOT NULL,
  `File` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`Id`, `DoorNo`, `Subject`, `Type`, `Date`, `File`) VALUES
('1notice', '1-N-12-799/22', 'society meeting notice', 'regular', '19/10/2019', 'notice/firstnotice.pdf'),
('2notice', '1-N-12-799/22', 'fund notice', 'regular', '29/11/2019', 'notice/firstnotice.pdf'),
('1-E-12-799_12_2019-11-30_3', '1-E-12-799/12', 'damn good for all', 'regular', '2019-11-30', 'notice/1-E-12-799_12_2019-11-30_3.pdf'),
('1-E-12-799_12_2019-11-30_3', '1-E-12-799/12', 'damn good for all again', 'regular', '2019-11-30', 'notice/1-E-12-799_12_2019-11-30_3.pdf'),
('1-E-12-799_12_2019-11-30_3', '1-E-12-799/12', 'fuck ua ll', 'regular', '2019-11-30', 'notice/1-E-12-799_12_2019-11-30_3.pdf'),
('1-S-12-100_22_2019-12-01_3', '1-S-12-100/22', 'dissss', 'regular', '2019-12-01', 'notice/1-S-12-100_22_2019-12-01_3.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `prac`
--

CREATE TABLE `prac` (
  `srno` int(10) NOT NULL,
  `location` varchar(20) NOT NULL,
  `adhar` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `sales` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prac`
--

INSERT INTO `prac` (`srno`, `location`, `adhar`, `address`, `sales`) VALUES
(10, 'image/rahil_pf.png', 'image/rahil_adhar.png', 'image/rahil_address.png', 'image/rahil_sales.JPG'),
(11, 'image/_pf.png', 'image/_adhar.png', 'image/_address.png', 'image/_sales.png'),
(12, 'image/_pf.png', 'image/_adhar.png', 'image/_address.png', 'image/_sales.png');

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `doorno` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `fathername` varchar(30) NOT NULL,
  `mothername` varchar(30) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `profilepic` varchar(30) NOT NULL,
  `adharcard` varchar(30) NOT NULL,
  `addressproof` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`doorno`, `name`, `phone`, `email`, `fathername`, `mothername`, `occupation`, `profilepic`, `adharcard`, `addressproof`) VALUES
('1-N-12-799', 'ummair', '9711802278', 'tenant_mohdrahil7@gmail.com', 'dfa', 'dd', 'a', 'image/1-N-12-799_tpf.png', 'image/1-N-12-799_tadhar.png', 'image/1-N-12-799_taddress.jpg'),
('1-N-12-799/30', 'raj', '9511802278', 'tenant_mohdrahil7@gmail.com', 'fadsf', 'dd', 'a', 'image/1-N-12-799_30_tpf.png', 'image/1-N-12-799_30_tadhar.png', 'image/1-N-12-799_30_taddress.JPG'),
('1-E-12-799/12', 'tummair', '9611802278', 'tenant_mohdrahil7@gmail.com', 'fadsf', 'das', 'da', 'image/1-E-12-799_12_tpf.png', 'image/1-E-12-799_12_tadhar.png', 'image/1-E-12-799_12_taddress.png'),
('1-E-12-799/90', 'umakant', '9511802278', 'tenant_mohdrahil7@gmail.com', 'fasa', 'fdasfsd', 'adsfdsdf', 'image/1-E-12-799_90_tpf.JPG', 'image/1-E-12-799_90_tadhar.png', 'image/1-E-12-799_90_taddress.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TransactionId` varchar(50) NOT NULL,
  `DoorNo` varchar(50) NOT NULL,
  `TransactionDate` int(11) NOT NULL,
  `ValidTillDate` int(11) NOT NULL,
  `Amount` int(50) NOT NULL,
  `CardName` varchar(50) NOT NULL,
  `CardNumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TransactionId`, `DoorNo`, `TransactionDate`, `ValidTillDate`, `Amount`, `CardName`, `CardNumber`) VALUES
('1', '1-E-12-799/12', 20191121, 20191121, 6000, 'Khilawan', '67567654564'),
('12594994', '1-N-12-799/30', 0, 0, 50000, 'ii', 'ii'),
('20481116', '1-N-12-799/30', 0, 0, 1000, 'pp', '[pp'),
('21248255', '1-N-12-799/30', 11, 12, 2000, 'rr', 'gg'),
('21690029', '1-N-12-799/30', 11, 12, 150000, '444', '44'),
('22166756', '1-E-12-799/90', 12, 1, 200000, 'rahil', 'vsdz'),
('23306939', '1-N-12-799/30', 0, 0, 59000, 'pp', '87'),
('23906017', '1-E-12-799/12', 7, 8, 50000, 'bfbs', '64357657'),
('23906018', '1-E-12-799/12', 11, 12, 5000, 'rahil', 'dfasdf'),
('24356789', '1-E-12-799/90', 7, 8, 6666, 'kjghg', 'tfged'),
('25344304', '1-N-12-799/30', 11, 12, 100000, '6666', '555'),
('25542782', '1-N-12-799/30', 11, 12, 1000, 'qq', 'qqq'),
('27454784', '1-N-12-799/30', 11, 12, 59000, '999', '999'),
('30480033', '1-N-12-799/30', 11, 12, 7900, '3839', 'kjd3'),
('30823058', '1-N-12-799/30', 11, 12, 599, 'qqqqq', 'q'),
('32718254', '1-N-12-799/30', 11, 12, 59000, '999', '999'),
('32756585', '1-N-12-799/30', 11, 12, 5000, 'sdh', 'aaldcj'),
('33999010', '1-N-12-799/30', 0, 0, 41000, 'qqqq', 'q'),
('35578709', '1-N-12-799/30', 0, 0, 59000, '999', '999'),
('38051023', '1-N-12-799/30', 0, 0, 100, 'oo', 'oo'),
('38700115', '1-N-12-799/30', 0, 0, 59000, 'pp', '87'),
('39673254', '1-N-12-799/30', 11, 12, 5000, '234', '2325'),
('40700691', '1-N-12-799/30', 11, 12, 150000, 'q', 'q'),
('46532187', '1-N-12-799/30', 11, 12, 160000, 'w', 'w'),
('50688636', '1-N-12-799/30', 11, 12, 150000, '88', '88'),
('50696444', '1-N-12-799/30', 11, 12, 10401, 'sahca', 'a928'),
('51856174', '1-N-12-799/30', 0, 0, 50000, 'ii', 'ii'),
('54126928', '1-N-12-799/30', 0, 0, 100, 'oo', 'oo'),
('57041499', '1-N-12-799/30', 11, 12, 6000, '6000', '777'),
('57388689', '1-N-12-799/30', 11, 12, 50000, '8888', '888'),
('57508426', '1-N-12-799/30', 11, 12, 50000, '8888', '888'),
('59645099', '1-N-12-799/30', 11, 12, 600000, '666', '666'),
('66292372', '1-N-12-799/30', 0, 0, 10000, 'ooo', 'oooo'),
('66652464', '1-N-12-799/30', 0, 0, 1000, 's', 'ss'),
('68855469', '1-E-12-799/90', 12, 1, 100000, 'rahil', 'gsgd'),
('69027959', '1-N-12-799/30', 0, 0, 50000, 'ii', 'ii'),
('69115760', '1-E-12-799/12', 11, 12, 150000, 'rahil', 'gsfds'),
('71779401', '1-N-12-799/30', 0, 0, 1000, 'pp', '[pp'),
('73508720', '1-N-12-799/30', 11, 12, 790, 'ash', '273'),
('78507728', '1-N-12-799/30', 0, 0, 1000, 'ppp', 'ppp'),
('78668079', '1-N-12-799/30', 11, 12, 30000, 'qwi', 'qdhwo'),
('86657401', '1-N-12-799/30', 0, 0, 41000, 'qqqq', 'q'),
('90200811', '1-N-12-799/30', 0, 0, 50000, 'ii', 'ii'),
('92688774', '1-N-12-799/30', 0, 0, 41000, 'qqqq', 'q'),
('93627535', '1-N-12-799/30', 11, 12, 100, '234', '23r'),
('93859335', '1-N-12-799/30', 11, 12, 150000, '44444444', '444'),
('97715112', '1-N-12-799/30', 11, 12, 61000, 'pp', 'sldc'),
('97873916', '1-N-12-799/30', 0, 0, 1000, 'kash', '91686'),
('97920573', '1-N-12-799/30', 0, 0, 1000, 'kash', '91686'),
('99298125', '1-N-12-799/30', 11, 12, 150000, 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `transactionhistory`
--

CREATE TABLE `transactionhistory` (
  `TransactionId` varchar(50) NOT NULL,
  `MMC` int(50) NOT NULL,
  `DueAmount` int(50) DEFAULT 0,
  `DoorNo` varchar(50) NOT NULL,
  `last_payment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactionhistory`
--

INSERT INTO `transactionhistory` (`TransactionId`, `MMC`, `DueAmount`, `DoorNo`, `last_payment`) VALUES
('50688636', 12000, 2000, '1-N-12-799/30', 8),
('69115760', 12000, 7000, '1-E-12-799/12', 8),
('68855469', 12000, 3000, '1-E-12-799/90', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmpID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`doorno`);

--
-- Indexes for table `prac`
--
ALTER TABLE `prac`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TransactionId`),
  ADD KEY `DoorNo` (`DoorNo`);

--
-- Indexes for table `transactionhistory`
--
ALTER TABLE `transactionhistory`
  ADD KEY `TransactionId` (`TransactionId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmpID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `prac`
--
ALTER TABLE `prac`
  MODIFY `srno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactionhistory`
--
ALTER TABLE `transactionhistory`
  ADD CONSTRAINT `transactionhistory_ibfk_1` FOREIGN KEY (`TransactionId`) REFERENCES `transaction` (`TransactionId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
