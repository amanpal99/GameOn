-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2020 at 09:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gameon_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `gamesdata`
--

CREATE TABLE `gamesdata` (
  `gid` int(11) NOT NULL,
  `gname` varchar(50) NOT NULL,
  `gtplayed` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gamesdata`
--

INSERT INTO `gamesdata` (`gid`, `gname`, `gtplayed`) VALUES
(1, 'Snake2', 0),
(2, 'Pong', 0),
(3, 'Tic-Tac-Toe', 0),
(4, 'Pacman', 0),
(5, 'FlappyBird', 0);

-- --------------------------------------------------------

--
-- Table structure for table `game_user_data`
--

CREATE TABLE `game_user_data` (
  `id` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `uscore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_user_data`
--

INSERT INTO `game_user_data` (`id`, `gid`, `uid`, `uscore`) VALUES
(1, 1, 1, 17),
(2, 2, 1, 8),
(3, 3, 1, 4),
(4, 4, 1, 15),
(10, 5, 1, 70),
(12, 1, 5, 20),
(13, 4, 5, 36),
(14, 2, 5, 8),
(15, 5, 5, 40),
(16, 3, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usersdata`
--

CREATE TABLE `usersdata` (
  `uid` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `upswd` varchar(100) NOT NULL,
  `uemail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersdata`
--

INSERT INTO `usersdata` (`uid`, `uname`, `upswd`, `uemail`) VALUES
(1, 'aman17', '$2y$10$s5T6a0zf5ck8vlirVgS/POhp1FuW4jjPf/uCRmUfGTATRJrGawYkq', 'amanpal@gameon.com'),
(5, 'admin', '$2y$10$oODCLQh0PUfjmg6GOfb7gOJtTM0PTrIjGxB/YVn5ItBxWtl4KvThS', 'admin@gameon.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gamesdata`
--
ALTER TABLE `gamesdata`
  ADD PRIMARY KEY (`gid`),
  ADD UNIQUE KEY `unique1` (`gname`);

--
-- Indexes for table `game_user_data`
--
ALTER TABLE `game_user_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gconn` (`gid`),
  ADD KEY `uconn` (`uid`);

--
-- Indexes for table `usersdata`
--
ALTER TABLE `usersdata`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `unique1` (`uname`),
  ADD UNIQUE KEY `unique2` (`uemail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gamesdata`
--
ALTER TABLE `gamesdata`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `game_user_data`
--
ALTER TABLE `game_user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `usersdata`
--
ALTER TABLE `usersdata`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game_user_data`
--
ALTER TABLE `game_user_data`
  ADD CONSTRAINT `gconn` FOREIGN KEY (`gid`) REFERENCES `gamesdata` (`gid`),
  ADD CONSTRAINT `uconn` FOREIGN KEY (`uid`) REFERENCES `usersdata` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
