-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2023 at 05:44 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodfully`
--

-- --------------------------------------------------------

--
-- Table structure for table `acceptor`
--

CREATE TABLE `acceptor` (
  `name` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` int(10) NOT NULL,
  `id` varchar(20) NOT NULL,
  `verify_status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=no, 1=yes',
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `upload_url` varchar(30) DEFAULT NULL,
  `verify_token` varchar(50) DEFAULT NULL,
  `profile_pic` varchar(255) NOT NULL DEFAULT 'avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acceptor`
--

INSERT INTO `acceptor` (`name`, `address`, `email`, `contact`, `id`, `verify_status`, `username`, `password`, `upload_url`, `verify_token`, `profile_pic`) VALUES
('Pralisha', 'Mahaboudha', 'pralishakansakar@gmail.com', 0, '3242345', 1, 'pralisha._', 'RM/9ixLGDEGjlKna', 'IMG-63c2ba4872a508.67532690.pn', '5121e54dcd897601ba41defa32ce3709', 'IMG-63d3fd0c032039.23564035.jpg'),
('anuj', 'chetrapati', 'anujmali450@gmail.com', 2147483647, '898989898', 0, 'anuj450', '90jt2E3AL4Y=', 'IMG-63c69aacab7122.68380882.jp', 'c17d8555edc0cb65bf1a2660a133ee70', ''),
('Anuj', 'chetrapati', 'anujmali4500@gmail.com', 2147483647, 'ergertet', 0, 'anujret', 'VdPpjTuEVhM=', 'IMG-63c69bb8c477e1.79275015.pn', '1e199bd2b5527da6f28896217e6fdecb', ''),
('Anuj', 'chetrapati', 'anujmali4540@gmail.com', 2147483647, 'er56', 0, 'anuj2', 'VdPpjTuEVhM=', 'IMG-63c69d4408e5c0.67863124.pn', '1025949a451cac490de169fedf72acc1', ''),
('Pralisha', 'Mahaboudha', 'pralisha195@gmail.com', 0, '8767655443', 1, 'prals', 'RM/9ixLGDEGjlKna', 'IMG-63c69fff9b9966.46758997.jp', 'c35376281891bfe34a7cbd690dc983fd', ''),
('Anuj', 'chetrapati', 'lanifad112@quamox.com', 0, '456767', 1, 'anuj123', 'VdPpjTuEVhM=', 'IMG-63cb7f3833e1b5.51831072.pn', '542bd7885c1afcdc3267cc7fa7b38684', 'IMG-63cb84ba715677.21371933.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `username` varchar(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `best_before` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `pickup` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `id` int(100) NOT NULL,
  `delivery_status` tinyint(1) NOT NULL DEFAULT 0,
  `Category_of_Waste` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`username`, `title`, `description`, `best_before`, `image`, `pickup`, `status`, `id`, `delivery_status`, `Category_of_Waste`) VALUES
('anuj1234', 'sendemail', 'ewrewr', '2023-02-02', 'IMG-63cbbea9415a93.99774560.png', 'werwrwe', 1, 7, 0, NULL),
('anuj1234', 'firstt', 'e rwtyet', '2023-01-07', 'IMG-63cbca7ef3f465.09378419.png', 'dgdrf', 1, 10, 0, NULL),
('anuj1234', 'updatinh', 'e rwtyet', '2023-03-07', 'IMG-63cbe4453cc583.26788264.png', 'dgdrf', 1, 11, 0, NULL),
('anuj1234', 't4thrtyjryj', 'e rwtyet', '2023-01-07', 'IMG-63cbe4315a6532.54390966.png', 'dgdrf', 1, 12, 0, NULL),
('anuj', 'anuj', 'ergerg', '2023-01-04', 'IMG-63d3bd64a43280.96585447.jpg', 'mahaboudha', 1, 13, 0, NULL),
('anuj1234', 'rrtrtyry', 'iueruijiutjter', '2023-01-07', 'IMG-63d3cb90ba9f23.97677790.jpg', 'rtyrty', 1, 14, 0, NULL),
('anuj', 'wekfjojf', 'kfemklrf', '2023-02-11', 'IMG-63db408f8b1c80.92811519.png', 'chetrapati', 0, 15, 0, NULL),
('simran', 'donation4', 'food food', '2023-02-06', 'IMG-63df32a94e7f26.07789732.jpg', 'balaju', 0, 19, 0, 'animal food product');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `name` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `lat` float(10,6) DEFAULT NULL COMMENT 'latitude',
  `lng` float(10,6) DEFAULT NULL COMMENT 'longitude',
  `email` varchar(30) NOT NULL,
  `contact` int(10) NOT NULL,
  `id` varchar(20) NOT NULL,
  `verify_status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=no, 1=yes',
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `upload_url` varchar(30) DEFAULT NULL,
  `verify_token` varchar(50) DEFAULT NULL,
  `profile_pic` varchar(255) NOT NULL DEFAULT 'avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`name`, `address`, `lat`, `lng`, `email`, `contact`, `id`, `verify_status`, `username`, `password`, `upload_url`, `verify_token`, `profile_pic`) VALUES
('Anuj', 'chetrapati', NULL, NULL, 'anujmali450@gmail.com', 2147483647, '2345678', 1, 'anuj', 'VdPpjTuEVhM=', 'IMG-63c6a2219253b4.52384659.pn', '7d52c37dbb29ad0697507042047136b1', ''),
('Anuj', 'chetrapati', NULL, NULL, 'anujmali450@gmail.com', 0, '56565', 1, 'anuj1234', 'VdPpjTuEVhM=', 'IMG-63cb7f9509e371.49645614.jp', '0a1648d5fdf418c47499dd8587fbe527', 'IMG-63d3ba92188ae3.42336241.jpeg'),
('Simran', 'Balaju', NULL, NULL, 'simranstha2u@gmail.com', 2147483647, '2000', 1, 'simran', 'R9TxlRrbXBDA', 'IMG-63df2445c37ad3.22291378.jp', '0d80a1af31d71dc7a678e67d293dfd18', 'avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL,
  `donor_name` varchar(1231) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`, `donor_name`) VALUES
(9, 'thrth', 3, '[\'p', 1674921726, ''),
(10, 'adsad', 5, 'adsad', 1674925616, ''),
(11, 'anuj123', 4, 'qwerty', 1674926038, ''),
(12, 'anuj123', 5, 'assad', 1674926388, ''),
(14, 'anuj123', 5, '#teamwork', 1674926727, 'anuj1234'),
(15, 'anuj123', 3, 'asdsad', 1674926818, 'anuj1234'),
(16, 'anuj123', 3, 'hello\n', 1674926870, 'anuj1234'),
(17, 'pralisha._', 5, '#fun', 1674927095, 'anuj1234'),
(18, 'pralisha._', 5, '#pralisha', 1674929245, 'anuj1234'),
(19, 'pralisha._', 4, 'donationsss', 1674929275, 'anuj'),
(20, 'anuj123', 3, 'second', 1675313429, 'anuj');

-- --------------------------------------------------------

--
-- Table structure for table `stars`
--

CREATE TABLE `stars` (
  `id` int(11) NOT NULL,
  `rateIndex` tinyint(4) NOT NULL,
  `rating` int(11) NOT NULL,
  `remark` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stars`
--

INSERT INTO `stars` (`id`, `rateIndex`, `rating`, `remark`, `status`, `date_time`) VALUES
(4, 3, 0, '', 0, '2023-01-28 21:06:50'),
(5, 4, 0, '', 0, '2023-01-28 21:06:50'),
(6, 1, 0, '', 0, '2023-01-28 21:06:50'),
(7, 1, 0, '', 0, '2023-01-28 21:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `waste_management_category`
--

CREATE TABLE `waste_management_category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `waste_management_category`
--

INSERT INTO `waste_management_category` (`id`, `name`) VALUES
(1, 'animal food product'),
(2, 'compost manure');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `stars`
--
ALTER TABLE `stars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waste_management_category`
--
ALTER TABLE `waste_management_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `stars`
--
ALTER TABLE `stars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `waste_management_category`
--
ALTER TABLE `waste_management_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`username`) REFERENCES `donor` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
