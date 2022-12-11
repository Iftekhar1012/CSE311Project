-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 09:19 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `catergory`
--

CREATE TABLE `catergory` (
  `ID` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `fullname` varchar(80) NOT NULL,
  `phone` int(20) DEFAULT NULL,
  `address` varchar(32) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`fullname`, `phone`, `address`, `username`, `email`, `password`, `create_datetime`) VALUES
('Maya Citadel', 2147483647, 'Moghbazar', 'Maya', 'maya7@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-12-06 18:33:43'),
('Riot Gone', 1234567, '3/7, Block-A, Lalmatia', 'riot', 'tanvirchowdhury35@gmail.com', '4cf7f5089db4fa4489f00cc5a90639fa', '2022-12-11 19:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `fullname` varchar(80) NOT NULL,
  `phone` int(20) DEFAULT NULL,
  `address` varchar(32) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`fullname`, `phone`, `address`, `username`, `email`, `password`, `create_datetime`) VALUES
('Jason', 2147483647, 'ctg', 'Json', 'jason@gmail.com', 'c134p128', '2022-12-06 22:33:43'),
('Tanvir Chowdhury', 1234567, '3/7, Block-A, Lalmatia', 'Tanvir', 'tanvirchowdhury35@gmail.com', '5a69648c3510250a45622cc946465fff', '2022-12-11 18:21:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catergory`
--
ALTER TABLE `catergory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
