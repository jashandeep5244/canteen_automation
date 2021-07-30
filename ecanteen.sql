-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 07:13 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecanteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `about` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `about`) VALUES
(1, 'We are the world\'s biggest committed online food retailer with more than 880,000 dynamic clients shopping with us today. Our goal is to give our clients the best shopping background as far as service, range and value, which assembles a solid business and ');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_cpassword` varchar(255) NOT NULL,
  `admin_mobile` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_username`, `admin_password`, `admin_cpassword`, `admin_mobile`, `admin_email`) VALUES
(1, 'Jashan', 'Jashandeep', '$2y$10$xUoARmcoGJivY1hou14EyeGJDWx8UFzUD1zsfNiKjCUIeuyZ2JXlq', '$2y$10$GgbYxnxmSlMvGUcHR0QatOsieCNfWOPz64QmjSKdCIkfru.xoeD/G', '7056200450', 'csecec.1802060@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `canteen`
--

CREATE TABLE `canteen` (
  `canteen_id` int(255) NOT NULL,
  `handler_name` varchar(255) NOT NULL,
  `handler_username` varchar(255) NOT NULL,
  `handler_email` varchar(255) NOT NULL,
  `handler_mobile` varchar(255) NOT NULL,
  `handler_password` varchar(255) NOT NULL,
  `handler_cpassword` varchar(255) NOT NULL,
  `admin_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `canteen`
--

INSERT INTO `canteen` (`canteen_id`, `handler_name`, `handler_username`, `handler_email`, `handler_mobile`, `handler_password`, `handler_cpassword`, `admin_id`) VALUES
(4, 'kamaldeep', 'kamaldeep', 'kamal4318@gmail.com', '9416119706', '$2y$10$fLw2QXWKkdBy9FVnJI7q7.V8xagWtswZQf.m9uPDxIcMJR3SZ/Zh.', '$2y$10$z18tJkwegJ.OKFLxm2cxxOINIkUzKIQwi1gE11caKUkPEUEBaBsw2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `canteen_items`
--

CREATE TABLE `canteen_items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_des` varchar(255) NOT NULL,
  `item_cost` int(11) NOT NULL,
  `item_time` int(11) NOT NULL,
  `item_avail` int(11) NOT NULL,
  `item_profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `canteen_items`
--

INSERT INTO `canteen_items` (`item_id`, `item_name`, `item_des`, `item_cost`, `item_time`, `item_avail`, `item_profile`) VALUES
(1, 'PaniPuri', 'Gol gappe or fuchka or gupchup or golgappa or Pani ke Patake is a type of snack originated in the Indian subcontinent, and is one of the most common street foods in India.', 40, 10, 1, 'pani-puri'),
(2, 'Death By Chocolate Pancake', 'Death by chocolate cake is layers upon layers of chocolate and the ultimate chocolate dessert. ', 300, 25, 1, 'pancake'),
(5, 'Burger', 'Burgur\r\n ', 60, 15, 1, 'burger'),
(6, 'Sandwich', 'sandwich', 80, 20, 1, 'sandwich'),
(7, 'Chinese_Platter', 'chine platter', 150, 25, 1, 'chinese_platter'),
(8, 'Apple Pie', 'apple-pie is the dessert made from apple.', 100, 35, 1, 'apple_pie');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` enum('1','0') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total_price`, `created`, `modified`, `status`) VALUES
(1, 1, 40, '2021-05-23 19:05:09', '2021-05-23 19:05:09', '1'),
(2, 1, 40, '2021-05-23 19:05:16', '2021-05-23 19:05:16', '1'),
(3, 1, 40, '2021-05-23 19:05:44', '2021-05-23 19:05:44', '1'),
(4, 1, 400, '2021-05-23 19:06:21', '2021-05-23 19:06:21', '1'),
(5, 1, 600, '2021-05-23 19:07:01', '2021-05-23 19:07:01', '1'),
(6, 1, 420, '2021-05-23 19:07:35', '2021-05-23 19:07:35', '1'),
(7, 1, 340, '2021-05-23 19:08:24', '2021-05-23 19:08:24', '1'),
(8, 1, 700, '2021-05-23 19:09:02', '2021-05-23 19:09:02', '1'),
(9, 1, 40, '2021-05-24 06:54:59', '2021-05-24 06:54:59', '1');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `item_id`, `quantity`) VALUES
(1, 3, 1, 1),
(2, 4, 5, 1),
(3, 4, 2, 1),
(4, 4, 1, 1),
(5, 5, 2, 2),
(6, 6, 6, 1),
(7, 6, 2, 1),
(8, 6, 1, 1),
(9, 7, 2, 1),
(10, 7, 1, 1),
(11, 8, 7, 2),
(12, 8, 5, 1),
(13, 8, 2, 1),
(14, 8, 1, 1),
(15, 9, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_mobile` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_cpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_username`, `user_email`, `user_mobile`, `user_password`, `user_cpassword`) VALUES
(1, 'JanviMadhu', 'janvimadhu06', 'ceccse.1802058@gmail.com', '9992904060', '$2y$10$uMUhJnjhayLcq4o.5EViw.snkhpVhctTAossOfaVRyzskJoA8A27S', '$2y$10$lccsazwGHkGQSvrM2nect./kvQxUrcMeDkFIKSEGSyk3gbBRqB3A6'),
(2, 'yashika', 'yashikapopli', 'yashikapopli08@gmail.com', '9812511886', '$2y$10$s5z5He98xK4Zg2lpPFe9f.00Q5IVLcV1ITXzjJ3sn4lEBreAnN8Uy', '$2y$10$mTaKJ5YwIAU0oS8Zv81gmOVOYU8Imj3UYtWWsohxFb7WdSNQJyi5S'),
(3, 'aman ', 'amanverma', 'amanverma5419@gmail.com', '8053500450', '$2y$10$jx6Qp95z03h6N330FxvCceOxOoyUn4mkvI6CDdv4hJGpNmm..CSN2', '$2y$10$LpwN5OhJ8ippbssYYuFMJ.NxZ.fI8rjEN9i5pMRjT0DYysXFk3G2S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `canteen`
--
ALTER TABLE `canteen`
  ADD PRIMARY KEY (`canteen_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `canteen_items`
--
ALTER TABLE `canteen_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `canteen`
--
ALTER TABLE `canteen`
  MODIFY `canteen_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `canteen_items`
--
ALTER TABLE `canteen_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `canteen`
--
ALTER TABLE `canteen`
  ADD CONSTRAINT `canteen_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
