-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2022 at 07:54 PM
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
-- Database: `service_marketplace`
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
('Trainer', 'Personal training for any sport', NULL),
('Trainer', 'Personal training for any sport', 'Murad');

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
('Musashi Miyamoto', 123456, 'Musashi village', 'Miyamoto', 'mish1560@ig.com', 'da730e503d3a998c307bd4021552da49', '2022-12-17 13:01:41'),
('Vlad', 2147483647, 'Romania', 'Vlad', 'romania1451@gmail.com', '15afe50646e62907a102e2411dfaa13c', '2022-12-07 17:36:33'),
('Yuko123', 2147483647, 'Razarbaghz', 'Yuko', 'yu0406@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '2022-12-07 16:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Customer_Username` varchar(50) NOT NULL,
  `Catergory_name` varchar(32) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Post_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Customer_Username`, `Catergory_name`, `Description`, `Post_Date`) VALUES
('Hanzo', 'cameraman', 'Need someone to record my ninja skills', '2022-12-25 16:29:49'),
('Miyamoto', 'cameraman', 'Need someone to record my duel with Kojiro', '2022-12-25 15:05:12'),
('Miyamoto', 'trainer', 'Need someone to teach me how to use a sword', '2022-12-07 16:28:39');

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
  `rating` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`fullname`, `phone`, `address`, `username`, `email`, `password`, `create_datetime`, `rating`) VALUES
('Hanzo Hattori', 334242424, 'Yeppen', 'Hanzo', 'hz@gmail.com', '160cc4b2a2948fb0090335a6c2782165', '2022-12-07 16:28:39', '3.00'),
('Jason Hossain', 2147483647, 'Dhanmondi, Dhaka', 'Jason', 'jhossain18@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-12-07 18:37:55', '2.25'),
('Murad IV', 1650, 'Istanbul', 'Murad', 'murad123@yahoo.com', '17ff830fc0d26b5d43f5fe65d6c4e98a', '2022-12-07 16:47:45', '3.29');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `customer_username` varchar(32) NOT NULL,
  `provider_username` varchar(32) NOT NULL,
  `rating` int(5) NOT NULL,
  `comment` varchar(32) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`customer_username`, `provider_username`, `rating`, `comment`, `create_datetime`) VALUES
('Milo', 'Scooby', 5, 'Not good', '2021-12-06 18:33:43'),
('Miyamoto', 'Jason', 3, 'Average', '2022-12-25 10:56:12'),
('Miyamoto', 'Jason', 2, 'asdsa', '2022-12-25 18:40:48'),
('Miyamoto', 'Jason', 2, 'asdsa', '2022-12-25 18:40:50'),
('Miyamoto', 'Jason', 2, 'asdsa', '2022-12-25 18:50:53'),
('Murad', 'Murad', 2, 'Bad', '2022-12-25 16:47:21'),
('Murad', 'Murad', 1, 'Worst', '2022-12-25 16:47:38'),
('Murad', 'Murad', 4, 'Better now', '2022-12-25 16:50:13'),
('Murad', 'Murad', 4, 'Better now', '2022-12-25 16:55:08'),
('Murad', 'Murad', 2, 'Disappointing', '2022-12-25 16:55:25'),
('Murad', 'Murad', 5, 'Better now', '2022-12-25 16:55:36'),
('Murad', 'Murad', 5, 'Better now', '2022-12-25 18:16:52'),
('Murad', 'Murad', 5, 'Better now', '2022-12-25 18:19:22'),
('Murad', 'Murad', 5, 'Better now', '2022-12-25 18:19:41'),
('Murad', 'Murad', 5, 'Better now', '2022-12-25 18:21:36'),
('Murad', 'Murad', 5, 'Better now', '2022-12-25 18:22:39'),
('Murad', 'Murad', 1, 'Why even work?', '2022-12-25 18:23:13'),
('Murad', 'Murad', 1, 'Why even work?', '2022-12-25 18:23:16'),
('Murad', 'Murad', 1, 'Why even work?', '2022-12-25 18:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `saved_post`
--

CREATE TABLE `saved_post` (
  `customer_username` varchar(32) NOT NULL,
  `provider_username` varchar(32) NOT NULL,
  `category_name` varchar(32) NOT NULL,
  `post_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `saved_provider`
--

CREATE TABLE `saved_provider` (
  `customer_username` varchar(32) NOT NULL,
  `provider_username` varchar(32) NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saved_provider`
--

INSERT INTO `saved_provider` (`customer_username`, `provider_username`, `created_datetime`) VALUES
('Musashi', 'Hanzo', '2022-12-06 18:33:43'),
('Miyamoto', 'Jason', '2022-12-25 18:51:47'),
('Miyamoto', 'Jason', '2022-12-25 19:11:49'),
('Miyamoto', 'Jason', '2022-12-25 19:12:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Customer_Username`,`Catergory_name`,`Post_Date`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`customer_username`,`provider_username`,`create_datetime`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
