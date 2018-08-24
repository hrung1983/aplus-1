-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2018 at 11:04 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbjoina`
--

CREATE TABLE `tbjoina` (
  `noa` int(11) NOT NULL,
  `joina` varchar(200) CHARACTER SET latin1 NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbjoina`
--

INSERT INTO `tbjoina` (`noa`, `joina`, `id`) VALUES
(1, 'A*A', 1),
(2, 'B*B', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbjoinb`
--

CREATE TABLE `tbjoinb` (
  `nob` int(11) NOT NULL,
  `joinb` varchar(200) CHARACTER SET latin1 NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbjoinb`
--

INSERT INTO `tbjoinb` (`nob`, `joinb`, `id`) VALUES
(1, 'A/A', 1),
(2, 'A/A', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbshow`
--

CREATE TABLE `tbshow` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `lname` varchar(200) CHARACTER SET latin1 NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbshow`
--

INSERT INTO `tbshow` (`id`, `name`, `lname`, `date`) VALUES
(1, 'Name 4', 'name4@email.com', '0000-00-00'),
(2, 'B', 'BB', '0000-00-00'),
(3, 'Name 5', 'name5@email.com', '0000-00-00'),
(4, 'C', 'CC', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbjoina`
--
ALTER TABLE `tbjoina`
  ADD PRIMARY KEY (`noa`);

--
-- Indexes for table `tbjoinb`
--
ALTER TABLE `tbjoinb`
  ADD PRIMARY KEY (`nob`);

--
-- Indexes for table `tbshow`
--
ALTER TABLE `tbshow`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbjoina`
--
ALTER TABLE `tbjoina`
  MODIFY `noa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbjoinb`
--
ALTER TABLE `tbjoinb`
  MODIFY `nob` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbshow`
--
ALTER TABLE `tbshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
