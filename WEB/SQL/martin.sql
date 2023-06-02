-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2023 at 08:56 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `martin`
--

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `number` int(16) NOT NULL,
  `path` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `difficulty` enum('Easy','Medium','Hard','Extreme') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `score` int(16) NOT NULL,
  `progression` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `score`, `progression`) VALUES
('dada', 'dada@student.junia.com', 'dada', 400, 5),
('df', 'h@junia.com', '$2y$10$h1QePfm3M0kmA1YDDoG8q.cmcf3Ddm50CVXLjdOfI8soO1/TElJyK', 0, 0),
('fr', 'j@junia.com', '$2y$10$.OQnTZQjDqh/coDjocoRQeqnKTLd1i5BKs8cknu1I58r18bEuDwiK', 0, 0),
('frrf', 't@junia.com', '$2y$10$Dff2BPf0Wrnl.HCh1zj4G.Tais.wGKf42vCNjOXwm/.6wFEIU/QrO', 0, 0),
('juju', 'juliette.saint-maxent@student.junia.com', '$2y$10$pgvnBaLxcTP3ZgwFoftJSe9yzgUo3QtwtGQIQTHZYj3tCaJsOTQOm', 0, 0),
('s', 'u@junia.com', '$2y$10$pGDAy4E8dHi.1Vv8QHZequLeqWyp6V/OpByX8/jW1wCS0jEnk2D9a', 0, 0),
('salut', 's@student.junia.com', 'salut', 50, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users_level`
--

CREATE TABLE `users_level` (
  `number` int(11) NOT NULL,
  `path` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `users_level`
--
ALTER TABLE `users_level`
  ADD UNIQUE KEY `user` (`user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
