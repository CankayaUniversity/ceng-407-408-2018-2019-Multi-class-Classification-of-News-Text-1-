-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2019 at 03:42 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mtlbl`
--

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `modelID` int(11) NOT NULL,
  `modelName` varchar(255) NOT NULL,
  `modelPath` varchar(255) NOT NULL,
  `modelVec` int(11) NOT NULL,
  `modelEp` int(11) NOT NULL,
  `modelLabel` varchar(255) NOT NULL,
  `modelRatio` float NOT NULL,
  `datasetName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`modelID`, `modelName`, `modelPath`, `modelVec`, `modelEp`, `modelLabel`, `modelRatio`, `datasetName`) VALUES
(1, 'test', 'test', 100, 2, 'b t e m', 0.2, '10kk'),
(2, 'something', 'something', 100, 2, 'b t e m', 0.2, 'example'),
(3, 'somethingw', 'somethingw', 100, 2, 'b t e m', 0.2, '10kk'),
(4, 'yy', 'yy', 100, 2, 'b t e m', 0.2, '10kk'),
(5, 'zz', 'zz', 100, 2, 'b t e m', 0.2, '10kk'),
(6, 'test', 'test', 100, 2, 'b t e m', 0.2, '10kk'),
(7, 'somethingz', 'somethingz', 100, 30, 'b t e m', 0.2, '10kk'),
(8, 'somethingh', 'somethingh', 100, 30, 'b t e m', 0.2, '10kk'),
(9, 'rip', 'rip', 100, 2, 'b t e m', 0.2, '10kk'),
(10, 'ree', 'ree', 100, 2, 'b t e m', 0.2, '10kk');

-- --------------------------------------------------------

--
-- Table structure for table `repo`
--

CREATE TABLE `repo` (
  `repoID` int(11) NOT NULL,
  `repoName` varchar(255) NOT NULL,
  `repoPath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repo`
--

INSERT INTO `repo` (`repoID`, `repoName`, `repoPath`) VALUES
(0, 'Test', 'data/test');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uID` int(11) NOT NULL,
  `uName` varchar(255) NOT NULL,
  `uEmail` varchar(255) NOT NULL,
  `uPassword` varchar(255) NOT NULL,
  `uType` varchar(100) NOT NULL,
  `isActive` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uID`, `uName`, `uEmail`, `uPassword`, `uType`, `isActive`) VALUES
(2, 'cliff', 'cliff@asd.com', '9e94e929e22a6c121307febc79ea549c', 'admin', 1),
(3, 'cliffuser', 'cliff@sdc.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 1),
(4, 'miray', 'yarim_padir06@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`modelID`);

--
-- Indexes for table `repo`
--
ALTER TABLE `repo`
  ADD PRIMARY KEY (`repoID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uID`),
  ADD UNIQUE KEY `uName` (`uName`),
  ADD UNIQUE KEY `uEmail` (`uEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `modelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
