-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 03:03 PM
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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_name` varchar(32) DEFAULT NULL,
  `cat_description` varchar(32) DEFAULT NULL,
  `providers` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_name`, `cat_description`, `providers`) VALUES
('cameraman', 'Shoots videos and photos', 'Jason'),
('Guitarist', 'Plays guitar', 'Jason'),
('Goalkeeper', 'Plays as a goalkeeper in a footb', 'Murad');

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
('Vlad', 2147483647, 'Romania', 'dracula', 'romania1451@gmail.com', '15afe50646e62907a102e2411dfaa13c', '2022-12-07 17:36:33'),
('Maya Citadel', 2147483647, 'Moghbazar', 'Maya', 'maya7@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-12-06 18:33:43'),
('Musashi Miyamoto', 123456, 'Musashi village', 'Miyamoto', 'swordsaint16@gmail.com', '578ed5a4eecf5a15803abdc49f6152d6', '2022-12-17 13:01:41'),
('Yuko123', 2147483647, 'Razarbaghz', 'Yuko', 'yu0406@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '2022-12-07 16:27:33');

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
  `create_datetime` datetime NOT NULL,
  `categories` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`fullname`, `phone`, `address`, `username`, `email`, `password`, `create_datetime`, `categories`) VALUES
('Hanzo Hattori', 334242424, 'Yeppen', 'Hanzo', 'hz@gmail.com', '160cc4b2a2948fb0090335a6c2782165', '2022-12-07 16:28:39', NULL),
('Jason Hossain', 2147483647, 'Dhanmondi, Dhaka', 'Jason', 'jhossain18@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-12-07 18:37:55', NULL),
('Murad IV', 1650, 'Istanbul', 'Murad', 'murad123@yahoo.com', '17ff830fc0d26b5d43f5fe65d6c4e98a', '2022-12-07 16:47:45', NULL);

--
-- Indexes for dumped tables
--

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
