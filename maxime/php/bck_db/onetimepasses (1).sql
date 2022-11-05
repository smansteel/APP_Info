-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 01:12 AM
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
-- Database: `captair`
--

-- --------------------------------------------------------

--
-- Table structure for table `onetimepasses`
--

CREATE TABLE `onetimepasses` (
  `id` int(11) NOT NULL,
  `token` varchar(36) NOT NULL,
  `utilisation` int(11) NOT NULL,
  `creation_time` text NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `onetimepasses`
--

INSERT INTO `onetimepasses` (`id`, `token`, `utilisation`, `creation_time`, `account_id`) VALUES
(3, '8QAkGw5kad3RcPK57damQz2fvVNZwj', 0, '05-11-22 01:01:06', 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `onetimepasses`
--
ALTER TABLE `onetimepasses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `onetimepasses`
--
ALTER TABLE `onetimepasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
