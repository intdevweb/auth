-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2015 at 12:46 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `date_created`, `date_modified`) VALUES
(1, 'g@g.com', 'pseud', 'pass', '2015-07-20 14:13:12', NULL),
(2, 'asdfdsf@fdasfdas.com', 'gggg', '$2y$10$J4jMkH9Gp5oywByCTg327.A/pFqUoRf70TvaCDPDl7XS3.xpfHGb.', '2015-07-20 15:38:57', NULL),
(3, 'aa@aa.com', 'aaa', '$2y$10$AIwPaFz/MsaQqOgSMH.HreUe3kwGXg69S3yeVhwvdxebX2tHOus3C', '2015-07-20 16:59:44', NULL),
(4, 'asdf@asdf.com', 'ůůůůůůůů', '$2y$10$EsEW.kSK3FOBLgdkT2xNi.n5zf7W5y9krgxMVUS8lauzgPSG1qlJG', '2015-07-21 11:05:11', NULL),
(5, 'ui@ui.com', 'úůžýěéďč', '$2y$10$rs20bKIrY5nqsga9e..03urcXQ3kMZCqVoht2l5KJYkqZ2Ztn/qWK', '2015-07-21 11:06:56', NULL),
(6, 'bibi@bi.com', 'bibi', '$2y$10$jC9V6YKQj2ObwdIF9u38TeCVdRWGfXIJ.1LQ4FzCn6TBAufKBoT9m', '2015-07-21 11:07:15', NULL),
(7, 'b@b.com', 'bbb', '$2y$10$JE3QJfda7zQx5voZZ39iiuqvyeyL.UJPuEW2iWrQgB0yrU9antGeK', '2015-07-21 11:45:15', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
