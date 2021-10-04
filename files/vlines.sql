-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 04:15 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vlines`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_desc` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `item_price` int(20) NOT NULL,
  `transaction_id` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `msg` text NOT NULL,
  `notify` varchar(10) NOT NULL,
  `reply_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `admin_email`, `client_email`, `client_name`, `date`, `msg`, `notify`, `reply_id`) VALUES
(1, 'mm@mm.com', 'contact@paulamissah.xyz', 'Paul Amissah', '2017-01-09 06:35:29', 'Testing', '', 0),
(4, '', 'contact@paulamissah.xyz', 'Stephen Paul II ', '2017-01-11 02:07:55', 'This is a reply to the "Testing Message"', 'Stephen Pa', 1),
(5, '', 'contact@paulamissah.xyz', 'Stephen Paul II ', '2017-01-11 02:28:36', 'This is a second reply to the "Testing Message"', 'Stephen Pa', 1),
(6, '', 'contact@paulamissah.xyz', 'Stephen Paul II ', '2017-01-11 02:48:41', 'This is a reply to the second', 'Stephen Pa', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tx_id` text NOT NULL,
  `amt` int(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `client_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tx_id`, `amt`, `date`, `client_email`) VALUES
(1, '2VK603025V147991M', 200, '2017-01-12 07:32:21', 'contact@paulamissah.xyz');

-- --------------------------------------------------------

--
-- Table structure for table `passreset`
--

CREATE TABLE `passreset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `code` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passreset`
--

INSERT INTO `passreset` (`id`, `email`, `token`, `code`, `status`, `date`) VALUES
(4, 'contact@paulamissah.xyz', 'b9f86653eb3c2da456b4fc3abf7df595', '032e45ff', 'FALSE', '2017-01-07 21:22:25'),
(5, 'paul@gmail.com', '3a13adc546ffbdc9611820ad5519d276', '1952bd15', 'TRUE', '2017-01-07 21:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_desc` varchar(255) NOT NULL,
  `item_price` int(20) NOT NULL,
  `file` varchar(100) NOT NULL,
  `category` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `item_name`, `item_desc`, `item_price`, `file`, `category`) VALUES
(1, 'Dubai Email List', 'Real Estate List in UAE Dubai 5000 Lists', 200, 'dubai.xlsx', 1),
(2, 'New York List', 'New York Real Estate List 10000 Lists', 500, 'newyork.xlsx', 1),
(3, 'Paris Email List', 'Paris Real Estate 2000 Lists', 100, 'paris.docx', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `membership` int(3) NOT NULL,
  `transaction_id` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profession` varchar(100) NOT NULL,
  `profile_status` int(5) NOT NULL,
  `summary` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `facebook_url` varchar(255) NOT NULL,
  `fileAttachment` varchar(255) NOT NULL,
  `no_certification` varchar(255) NOT NULL,
  `no_mem_status` int(3) NOT NULL,
  `no_mem_reason` int(3) NOT NULL,
  `package_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `location`, `sex`, `password`, `image`, `membership`, `transaction_id`, `date`, `profession`, `profile_status`, `summary`, `email`, `reason`, `facebook_url`, `fileAttachment`, `no_certification`, `no_mem_status`, `no_mem_reason`, `package_name`) VALUES
(2, 'Stephen Paul II', 'UAE', 'Secret', 'e11170b8cbd2d74102651cb967fa28e5', 'PaulAmissah.jpg', 2, '2VK603025V147991M', '2017-01-07 05:15:58', 'Sales Associate', 2, 'Select Reason for Membership: Select Reason for Membership: Select Reason for Membership: Select Reason for Membership: Select Reason for Membership: Select Reason for Membership: Select Reason for Membership:', 'contact@paulamissah.xyz', 'Not Defined', 'https://facebook.com/paul', 'claim-your-certificate.pdf', '', 2, 0, 'dubai.xlsx');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passreset`
--
ALTER TABLE `passreset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `passreset`
--
ALTER TABLE `passreset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
