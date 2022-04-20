-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 02:41 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `invitation`
--

CREATE TABLE `invitation` (
  `IDinvitation` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `reciver` int(11) NOT NULL,
  `etat` varchar(1000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invitation`
--

INSERT INTO `invitation` (`IDinvitation`, `sender`, `reciver`, `etat`, `date`) VALUES
(26, 3, 4, 'accepted', '2022-04-19'),
(27, 1, 3, 'accepted', '2022-04-19'),
(28, 1, 4, 'accepted', '2022-04-19'),
(29, 5, 3, 'accepted', '2022-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `IDmessage` int(11) NOT NULL,
  `senderM` int(11) NOT NULL,
  `reciverM` int(11) NOT NULL,
  `dateM` date NOT NULL,
  `content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`IDmessage`, `senderM`, `reciverM`, `dateM`, `content`) VALUES
(22, 3, 4, '2022-04-20', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `IDutilisateur` int(11) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IDutilisateur`, `email`, `password`, `image`) VALUES
(1, 'ayoub@mail.com', '123', 'images/pfp9.jpg'),
(3, 'hiba@mail.com', '123', 'images/pfp1.jpg'),
(4, 'ayoubid@mail.com', '123', 'images/pfp4.jpg'),
(5, 'test1@mail.com', '123', 'images/pfp5.jpg'),
(6, 'test2@mail.com', '123', 'images/pfp2.jpg'),
(7, 'test3@mail.com', '123', 'images/pfp5.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invitation`
--
ALTER TABLE `invitation`
  ADD PRIMARY KEY (`IDinvitation`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`IDmessage`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IDutilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invitation`
--
ALTER TABLE `invitation`
  MODIFY `IDinvitation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `IDmessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `IDutilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
