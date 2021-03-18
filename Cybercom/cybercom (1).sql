-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 02:30 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cybercom`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `description` mediumtext NOT NULL,
  `parentId` int(11) DEFAULT NULL,
  `pathId` varchar(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `pageId` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `identifier` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`pageId`, `title`, `identifier`, `content`, `status`, `createdDate`) VALUES
(1, 'abc', 122, 'Hellp', 1, '2021-03-17 23:15:53'),
(2, 'def', 133, 'hey', 1, '2021-03-18 10:44:22');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL,
  `groupId` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customeraddress`
--

CREATE TABLE `customeraddress` (
  `addressId` int(20) NOT NULL,
  `customerId` int(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `country` varchar(50) NOT NULL,
  `addressType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customergroup`
--

CREATE TABLE `customergroup` (
  `groupId` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `mediaId` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `small` tinyint(1) NOT NULL,
  `thumb` tinyint(1) NOT NULL,
  `base` tinyint(1) NOT NULL,
  `gallery` tinyint(1) NOT NULL,
  `productId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`mediaId`, `image`, `label`, `small`, `thumb`, `base`, `gallery`, `productId`) VALUES
(1, '', '', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` int(1) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentId`, `name`, `code`, `description`, `status`, `createdDate`) VALUES
(1, 'Ayush Raikundaliya', 'payment01', 'Books', 0, '2021-02-26 12:46:11');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `discount` int(3) NOT NULL,
  `quantity` int(10) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` int(1) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `sku`, `name`, `price`, `discount`, `quantity`, `description`, `status`, `createdDate`, `updatedDate`) VALUES
(59, 'novelrenter01', 'Intelligent Investor', '800', 10, 5, 'Business', 1, '2021-03-13 00:54:06', '2021-03-13 01:14:33'),
(61, 'novelrenter02', 'Ikigai', '500', 10, 10, 'Self Help', 1, '2021-03-13 01:16:53', '0000-00-00 00:00:00'),
(62, 'novelrenter03', 'Fios', '300', 10, 20, 'Romantic', 1, '2021-03-13 01:17:05', '0000-00-00 00:00:00'),
(63, 'novelrenter04', 'Think like a monk', '800', 10, 50, 'Self Help', 1, '2021-03-13 01:17:24', '2021-03-17 13:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shippingId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `amount` int(10) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` int(1) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shippingId`, `name`, `code`, `amount`, `description`, `status`, `createdDate`) VALUES
(4, 'Ayush Raikundaliya', 'shipping01', 6000, 'Novels', 1, '2021-03-17 22:20:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`),
  ADD KEY `parentId` (`parentId`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`pageId`),
  ADD UNIQUE KEY `identifier` (`identifier`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`),
  ADD KEY `groupId` (`groupId`);

--
-- Indexes for table `customeraddress`
--
ALTER TABLE `customeraddress`
  ADD PRIMARY KEY (`addressId`);

--
-- Indexes for table `customergroup`
--
ALTER TABLE `customergroup`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`mediaId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shippingId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `pageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customeraddress`
--
ALTER TABLE `customeraddress`
  MODIFY `addressId` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customergroup`
--
ALTER TABLE `customergroup`
  MODIFY `groupId` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `mediaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shippingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`groupId`) REFERENCES `customergroup` (`groupId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
