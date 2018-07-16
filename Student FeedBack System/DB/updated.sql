-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2018 at 12:59 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentfeedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `dep`
--

CREATE TABLE `dep` (
  `id` int(11) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dep`
--

INSERT INTO `dep` (`id`, `department`) VALUES
(1, 'MCA'),
(2, 'MBA');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `faculty_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Fed_No` int(3) NOT NULL,
  `Roll_No` int(3) NOT NULL,
  `Sub_Name` varchar(100) NOT NULL,
  `Feedback` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Fed_No`, `Roll_No`, `Sub_Name`, `Feedback`) VALUES
(1, 1, 'DBMS', 'The quick brown fox jumps over the lazy dogs.'),
(2, 1, 'English', 'The quick brown fox jumps over the lazy dogs.'),
(3, 2, 'DBMS', 'The quick brown fox jumps over the lazy dogs.'),
(4, 2, 'ST', 'The quick brown fox jumps over the lazy dogs.'),
(5, 1, 'HATF', 'Hate, bruv.'),
(6, 1, 'Hindi', 'KJVSCMBN dlsckn jhvmnv');

-- --------------------------------------------------------

--
-- Table structure for table `regno`
--

CREATE TABLE `regno` (
  `id` int(11) NOT NULL,
  `regno` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regno`
--

INSERT INTO `regno` (`id`, `regno`) VALUES
(1, 1662501),
(2, 1662502),
(3, 1662503),
(4, 1662504),
(5, 1662505),
(6, 1662506),
(7, 1662507),
(8, 1662508),
(9, 1662509),
(10, 1662510),
(11, 1662511),
(12, 1662512),
(13, 1662513),
(14, 1662514),
(15, 1662515),
(16, 1662516),
(17, 1662517),
(18, 1662518),
(19, 1662519),
(20, 1662520),
(21, 1662521),
(22, 1662522),
(23, 1662523),
(24, 1662524),
(25, 1662525),
(26, 1662526),
(27, 1662527),
(28, 1662528),
(29, 1662529),
(30, 1662530),
(31, 1662531),
(32, 1662532),
(33, 1662533),
(34, 1662534),
(35, 1662535),
(36, 1662536),
(37, 1662537),
(38, 1662538),
(39, 1662539),
(40, 1662540),
(41, 1662541),
(42, 1662542),
(43, 1662543),
(44, 1662544),
(45, 1662545),
(46, 1662546),
(47, 1662547),
(48, 1662548),
(49, 1662549),
(50, 1662550),
(51, 1662551),
(52, 1662552),
(53, 1662553),
(54, 1662554),
(55, 1662555),
(56, 1662556),
(57, 1662557),
(58, 1662558),
(59, 1662559),
(60, 1662560);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Sub_No` int(3) NOT NULL,
  `Sub_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Sub_No`, `Sub_Name`) VALUES
(1, 'c++'),
(2, 'java');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dep`
--
ALTER TABLE `dep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Fed_No`),
  ADD KEY `Roll_No` (`Roll_No`),
  ADD KEY `Sub_Name` (`Sub_Name`);

--
-- Indexes for table `regno`
--
ALTER TABLE `regno`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Sub_No`),
  ADD UNIQUE KEY `Sub_Name` (`Sub_Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dep`
--
ALTER TABLE `dep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Fed_No` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `regno`
--
ALTER TABLE `regno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `Sub_No` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`Roll_No`) REFERENCES `student` (`Roll_No`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`Sub_Name`) REFERENCES `subject` (`Sub_Name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
