-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2017 at 10:45 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webims`
--

-- --------------------------------------------------------

--
-- Table structure for table `dispach`
--

CREATE TABLE `dispach` (
  `cad` int(11) NOT NULL,
  `name` char(50) CHARACTER SET utf8 NOT NULL,
  `location` text NOT NULL,
  `resource` varchar(25) NOT NULL,
  `time` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `dispach`
--

INSERT INTO `dispach` (`cad`, `name`, `location`, `resource`, `time`) VALUES
(10, 'Flooding', 'SR 20 Crill ave at RR Under pass', 'Radio Operator', '2017-06-05 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `doc`
--

CREATE TABLE `doc` (
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `incident`
--

CREATE TABLE `incident` (
  `tactical` char(50) CHARACTER SET utf8 NOT NULL,
  `name` char(100) CHARACTER SET utf8 NOT NULL,
  `type` char(50) CHARACTER SET utf8 NOT NULL,
  `status` char(50) CHARACTER SET utf8 NOT NULL,
  `location` char(50) CHARACTER SET utf8 NOT NULL,
  `latitude` char(10) CHARACTER SET utf8 NOT NULL,
  `longitude` char(10) CHARACTER SET utf8 NOT NULL,
  `map_name` char(50) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `sheltered` char(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incident`
--

INSERT INTO `incident` (`tactical`, `name`, `type`, `status`, `location`, `latitude`, `longitude`, `map_name`, `description`, `sheltered`) VALUES
('Road Flooding', 'Road Flooding SR-20 underpass', 'Flood', 'Active', 'ST -20', '29.000', '081.000', 'Google', 'Flooding at St road 20 underpass', '0');

-- --------------------------------------------------------

--
-- Table structure for table `maps`
--

CREATE TABLE `maps` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `location` char(50) CHARACTER SET utf8 NOT NULL,
  `info` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shelter`
--

CREATE TABLE `shelter` (
  `tactical` char(50) CHARACTER SET utf8 NOT NULL,
  `name` char(100) CHARACTER SET utf8 NOT NULL,
  `type` char(50) CHARACTER SET utf8 NOT NULL,
  `status` char(50) CHARACTER SET utf8 NOT NULL,
  `adult` char(10) CHARACTER SET utf8 NOT NULL,
  `children` char(10) CHARACTER SET utf8 NOT NULL,
  `leo` char(10) CHARACTER SET utf8 NOT NULL,
  `ems` char(10) CHARACTER SET utf8 NOT NULL,
  `pets` char(10) CHARACTER SET utf8 NOT NULL,
  `sheltered` char(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shelter`
--

INSERT INTO `shelter` (`tactical`, `name`, `type`, `status`, `adult`, `children`, `leo`, `ems`, `pets`, `sheltered`) VALUES
('KSES', 'Kelley Smith Elementry School', 'Special Needs', 'Closed', '0', '0', '0', '0', '0', '0'),
('QIR', 'QI Roberts', 'General Needs', 'Closed', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `sheltered`
--

CREATE TABLE `sheltered` (
  `id` int(11) NOT NULL,
  `people_id` int(11) NOT NULL,
  `adults` char(50) CHARACTER SET utf8 NOT NULL,
  `children` char(50) CHARACTER SET utf8 NOT NULL,
  `leo` char(50) CHARACTER SET utf8 NOT NULL,
  `ems` char(50) CHARACTER SET utf8 NOT NULL,
  `pets` char(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `Realname` varchar(50) NOT NULL,
  `password` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `Realname`, `password`) VALUES
(1, 'admin', 'Adminsistrator', 'admin'),
(2, 'QIR', 'QI Roberts Middle School', 'QIR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dispach`
--
ALTER TABLE `dispach`
  ADD PRIMARY KEY (`cad`);

--
-- Indexes for table `doc`
--
ALTER TABLE `doc`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `incident`
--
ALTER TABLE `incident`
  ADD PRIMARY KEY (`tactical`),
  ADD UNIQUE KEY `tactical` (`tactical`);

--
-- Indexes for table `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shelter`
--
ALTER TABLE `shelter`
  ADD UNIQUE KEY `tactical` (`tactical`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
