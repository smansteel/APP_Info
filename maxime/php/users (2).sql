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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(256) NOT NULL,
  `creation` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `verified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `creation`, `nom`, `prenom`, `verified`) VALUES
(1, 'potate@captair.paris', '$2y$10$Lv76zGhAGk/I5GetxTYohOpf2DpZED5RrObQLpTzfFkKVByabKLyO', '2022-11-04 19:21:38', 'Tardieu', 'Maxime', 0),
(3, 'smansteelyt@gmail.com', '$2y$10$KbRRagN99DfFLh4tSTFuR.9eAOtVm7DfAQqVgt.fQP83UbrmRCZ8O', '2022-11-05 00:11:19', 'Tardieu', 'Maxime', 0),
(12, 'dd@gg.com', '$2y$10$nNO4Lxh/UbQimOwfQZ5ZA.bb7J4kDj6Z6vX/HKSw4JefmX7d9wgTG', '2022-11-05 00:29:53', 'Tardieu', 'Maxime', 0),
(13, 'ff@dd.com', '$2y$10$vc0qvlnX3NKcn6yKbmtGmenkIIOB.a0pWVjqcxC5US7uP.gogtjJO', '2022-11-05 00:31:21', 'Tardieu', 'Maxime', 0),
(14, 'll@jj.com', '$2y$10$o/lx7QBOEjE3ttC5sUUs0un5uiP2prOGfniYtlX95CwHbDvaNuHaS', '2022-11-05 00:31:55', 'Tardieu', 'Maxime', 0),
(15, 'kk@hgg.com', '$2y$10$sF1cNxqvekWGuEOVavGR1eZS7UO.1po15DU2gTbTuZIyq3WQN.3xC', '2022-11-05 00:32:20', 'd', 'd', 1),
(19, 'maxime.tardieu@gmail.com', '$2y$10$sMcTS3dm9J1hHNj7mhNPF..8ZaM2mXh68oYunhZ7PSDQlcOZ./sTi', '2022-11-05 01:03:18', 'Tardieu', 'Maxime', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
