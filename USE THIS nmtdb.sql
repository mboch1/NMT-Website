-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2017 at 09:11 PM
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
-- Database: `nmtdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`) VALUES
(1, 'admin@email.com', '1234'),
(2, 'admin2@email.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(10) NOT NULL,
  `invoice` varchar(300) NOT NULL,
  `transaction_id` varchar(600) NOT NULL,
  `log_id` int(10) NOT NULL,
  `course_id` varchar(300) NOT NULL,
  `course_name` varchar(300) NOT NULL,
  `course_category_id` int(10) NOT NULL,
  `course_venue_id` int(10) NOT NULL,
  `product_quantity` varchar(300) NOT NULL,
  `course_price` varchar(300) NOT NULL,
  `user_email` text NOT NULL,
  `user_first_name` varchar(300) NOT NULL,
  `user_last_name` varchar(300) NOT NULL,
  `user_address` varchar(300) NOT NULL,
  `user_city` varchar(300) NOT NULL,
  `user_post_code` varchar(300) NOT NULL,
  `user_country` varchar(300) NOT NULL,
  `payment_status` varchar(300) NOT NULL,
  `posted_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `course_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_ip_address` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`course_id`, `username`, `user_ip_address`, `qty`) VALUES
(4, 'test', '::1', 5),
(4, 'test', '::1', 5);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) NOT NULL,
  `course_category_id` int(10) NOT NULL,
  `course_venue_id` int(10) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `course_description` text NOT NULL,
  `course_price` int(10) NOT NULL,
  `course_availability` int(10) NOT NULL,
  `product_image` text NOT NULL,
  `course_keywords` text NOT NULL,
  `course_posted_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_category_id`, `course_venue_id`, `course_title`, `course_description`, `course_price`, `course_availability`, `product_image`, `course_keywords`, `course_posted_date`) VALUES
(12, 3, 2, '123123', '123123', 3213, 1, '', '', '2017-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `courses_venue`
--

CREATE TABLE `courses_venue` (
  `course_venue_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `venue_name` int(11) NOT NULL,
  `venue_address` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

CREATE TABLE `course_categories` (
  `course_category_id` int(10) NOT NULL,
  `admin_id` int(10) NOT NULL,
  `category_name` varchar(300) NOT NULL,
  `category_start_date` date NOT NULL,
  `category_end_date` date NOT NULL,
  `category_status` varchar(50) NOT NULL,
  `category_deleted` varchar(5) NOT NULL,
  `category_erased` varchar(5) NOT NULL,
  `category_posted_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paypal_log`
--

CREATE TABLE `paypal_log` (
  `id` int(10) NOT NULL,
  `txn_id` varchar(600) NOT NULL,
  `log` text NOT NULL,
  `posted_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Usless', 'User', 'user@gmail.com', '1234'),
(2, 'Useful', 'User', 'user2@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_venue`
--
ALTER TABLE `courses_venue`
  ADD PRIMARY KEY (`course_venue_id`);

--
-- Indexes for table `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`course_category_id`);

--
-- Indexes for table `paypal_log`
--
ALTER TABLE `paypal_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
