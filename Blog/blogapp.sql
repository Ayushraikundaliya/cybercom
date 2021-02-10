-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2021 at 02:52 PM
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
-- Database: `blogapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `publishedat` datetime NOT NULL,
  `createdat` datetime NOT NULL,
  `updatedat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `user_id`, `title`, `url`, `content`, `image`, `publishedat`, `createdat`, `updatedat`) VALUES
(1, 0, 'Student', '1.jpg', 'abc', '2.jpg', '0000-00-00 00:00:00', '2021-02-10 04:16:03', '2021-02-10 04:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parentcategoryid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `metatitle` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `createdat` datetime NOT NULL,
  `updatedat` datetime NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parentcategoryid`, `title`, `metatitle`, `url`, `content`, `createdat`, `updatedat`, `image`) VALUES
(4, 1, 'Student', 'Creation', '1.jpg', 'Cybercom', '2021-02-10 03:46:07', '2021-02-10 03:46:07', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `prefix` varchar(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `mobile` bigint(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwordhash` varchar(50) NOT NULL,
  `lastloginat` datetime NOT NULL,
  `information` longtext NOT NULL,
  `createdat` datetime NOT NULL,
  `updatedat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `prefix`, `firstname`, `lastname`, `mobile`, `email`, `passwordhash`, `lastloginat`, `information`, `createdat`, `updatedat`) VALUES
(10, 'mr', 'Ayush', 'Raikundaliya', 6353991690, 'ayushrk09@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2021-02-10 02:26:51', 'No ', '2021-02-10 02:26:51', '2021-02-10 02:26:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
