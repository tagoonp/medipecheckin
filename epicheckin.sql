-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 02:28 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epicheckin`
--

-- --------------------------------------------------------

--
-- Table structure for table `rs19_checkin_info`
--

CREATE TABLE `rs19_checkin_info` (
  `ID` int(10) UNSIGNED NOT NULL,
  `cindatetime` datetime DEFAULT NULL,
  `coutdatetime` datetime DEFAULT NULL,
  `clat` varchar(255) DEFAULT NULL,
  `clng` varchar(255) DEFAULT NULL,
  `cip` varchar(100) DEFAULT NULL,
  `cstage` enum('complete','in-complete') NOT NULL DEFAULT 'in-complete',
  `cuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rs19_checkin_info`
--

INSERT INTO `rs19_checkin_info` (`ID`, `cindatetime`, `coutdatetime`, `clat`, `clng`, `cip`, `cstage`, `cuid`) VALUES
(1, '2020-06-07 23:29:18', NULL, NULL, NULL, '::1', 'in-complete', 'MTU5MTU0NzM1OA=='),
(2, '2020-06-07 23:34:13', '0000-00-00 00:00:00', NULL, NULL, '::1', 'complete', 'MTU5MTU0NzY1Mw=='),
(3, '2020-06-07 23:54:31', '2020-06-07 23:55:56', NULL, NULL, '::1', 'complete', 'MTU5MTU0ODg3MQ=='),
(4, '2020-06-07 23:54:44', '2020-06-07 23:55:56', NULL, NULL, '::1', 'complete', 'MTU5MTU0ODg3MQ=='),
(5, '2020-06-07 23:55:45', '2020-06-07 23:55:56', NULL, NULL, '::1', 'complete', 'MTU5MTU0ODg3MQ=='),
(6, '2020-06-07 23:59:29', '2020-06-08 00:00:08', NULL, NULL, '::1', 'complete', 'MTU5MTU0ODg3MQ=='),
(7, '2020-06-07 23:59:54', '2020-06-08 00:00:08', NULL, NULL, '::1', 'complete', 'MTU5MTU0ODg3MQ=='),
(8, '2020-06-08 00:01:33', '2020-06-08 00:02:24', NULL, NULL, '::1', 'complete', 'MTU5MTU0OTI5Mw=='),
(9, '2020-06-08 00:01:45', '2020-06-08 00:02:24', NULL, NULL, '::1', 'complete', 'MTU5MTU0OTI5Mw=='),
(10, '2020-06-08 00:21:06', '2020-06-08 00:21:11', NULL, NULL, '::1', 'complete', 'MTU5MTU1MDQ2Ng=='),
(11, '2020-06-08 00:31:46', NULL, NULL, NULL, '::1', 'in-complete', 'MTU5MTU0ODg3MQ==');

-- --------------------------------------------------------

--
-- Table structure for table `rs19_user`
--

CREATE TABLE `rs19_user` (
  `ID` int(10) UNSIGNED NOT NULL,
  `UID` varchar(255) NOT NULL,
  `PID` varchar(255) DEFAULT NULL,
  `Fullname` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('common','admin','staff') NOT NULL DEFAULT 'common',
  `login` enum('N','Y') NOT NULL DEFAULT 'N',
  `Regdatetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rs19_user`
--

INSERT INTO `rs19_user` (`ID`, `UID`, `PID`, `Fullname`, `username`, `password`, `role`, `login`, `Regdatetime`) VALUES
(1, 'MTU5MTU0ODg3MQ==', '60193', 'Tagoon Prappre', 'tagoon.p@gmail.com', 'bWFuZHltb3Jlbm4=', 'admin', 'Y', '2020-06-07 23:29:18'),
(2, 'MTU5MTU0NzM1OA==', '60193', 'Tagoon Prappre', NULL, NULL, 'common', 'N', '2020-06-07 23:34:13'),
(3, 'MTU5MTU0NzM1OA==', '60193', 'Tagoon Prappre', NULL, NULL, 'common', 'N', '2020-06-07 23:54:31'),
(4, 'MTU5MTU0OTI5Mw==', '60193', 'Tagoon Prappre', NULL, NULL, 'common', 'N', '2020-06-08 00:01:33'),
(5, 'MTU5MTU1MDQ2Ng==', '60193', 'Tagoon Prappre', NULL, NULL, 'common', 'N', '2020-06-08 00:21:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rs19_checkin_info`
--
ALTER TABLE `rs19_checkin_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rs19_user`
--
ALTER TABLE `rs19_user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rs19_checkin_info`
--
ALTER TABLE `rs19_checkin_info`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rs19_user`
--
ALTER TABLE `rs19_user`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
