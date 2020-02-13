-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2019 at 09:39 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rapidshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filePath` varchar(255) NOT NULL,
  `userCreated` int(11) NOT NULL,
  `worldPermission` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `filePath`, `userCreated`, `worldPermission`) VALUES
(24, 'dont-worry-be-happy-2560x1080.jpg', 9, ''),
(25, 'dodge-challenger-srt-angel-lights-rk-2560x1080.jpg', 7, 'F'),
(27, 'good-things-take-time-6q-2560x1080.jpg', 7, 'F'),
(28, 'night-commute-3440x1440.jpg', 7, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_Name`) VALUES
(1, 'Johan se Groepie'),
(2, 'Waterberry'),
(6, 'sdf'),
(7, 'Hellllo'),
(8, 'HelloGroepie1'),
(9, 'JJ123');

-- --------------------------------------------------------

--
-- Table structure for table `sessionstable`
--

CREATE TABLE `sessionstable` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `clockinTime` varchar(255) NOT NULL,
  `clockoutTime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessionstable`
--

INSERT INTO `sessionstable` (`id`, `userID`, `clockinTime`, `clockoutTime`) VALUES
(3, 7, 'May,18,2019 11:27:22 PM', 'May,19,2019 09:36:45 AM'),
(4, 7, 'May,18,2019 11:32:34 PM', 'May,19,2019 09:36:45 AM'),
(5, 9, 'May,18,2019 11:41:17 PM', 'May,19,2019 09:02:21 AM'),
(6, 9, 'May,18,2019 11:41:32 PM', 'May,19,2019 09:02:21 AM'),
(7, 7, 'May,18,2019 11:41:59 PM', 'May,19,2019 09:36:45 AM'),
(8, 7, 'May,18,2019 11:47:56 PM', 'May,19,2019 09:36:45 AM'),
(9, 9, 'May,18,2019 11:54:05 PM', 'May,19,2019 09:02:21 AM'),
(10, 7, 'May,19,2019 12:09:40 AM', 'May,19,2019 09:36:45 AM'),
(11, 9, 'May,19,2019 12:09:51 AM', 'May,19,2019 09:02:21 AM'),
(12, 7, 'May,19,2019 12:10:43 AM', 'May,19,2019 09:36:45 AM'),
(13, 9, 'May,19,2019 12:28:21 AM', 'May,19,2019 09:02:21 AM'),
(14, 7, 'May,19,2019 12:29:34 AM', 'May,19,2019 09:36:45 AM'),
(15, 9, 'May,19,2019 12:29:50 AM', 'May,19,2019 09:02:21 AM'),
(16, 7, 'May,19,2019 12:34:53 AM', 'May,19,2019 09:36:45 AM'),
(17, 7, 'May,19,2019 12:44:36 AM', 'May,19,2019 09:36:45 AM'),
(18, 7, 'May,19,2019 12:56:34 AM', 'May,19,2019 09:36:45 AM'),
(19, 9, 'May,19,2019 01:03:40 AM', 'May,19,2019 09:02:21 AM'),
(20, 7, 'May,19,2019 01:04:11 AM', 'May,19,2019 09:36:45 AM'),
(21, 9, 'May,19,2019 01:17:45 AM', 'May,19,2019 09:02:21 AM'),
(22, 7, 'May,19,2019 01:24:56 AM', 'May,19,2019 09:36:45 AM'),
(23, 7, 'May,19,2019 01:33:37 AM', 'May,19,2019 09:36:45 AM'),
(24, 9, 'May,19,2019 01:33:54 AM', 'May,19,2019 09:02:21 AM'),
(25, 7, 'May,19,2019 01:34:04 AM', 'May,19,2019 09:36:45 AM'),
(26, 9, 'May,19,2019 01:34:15 AM', 'May,19,2019 09:02:21 AM'),
(27, 7, 'May,19,2019 01:34:39 AM', 'May,19,2019 09:36:45 AM'),
(28, 7, 'May,19,2019 01:42:28 AM', 'May,19,2019 09:36:45 AM'),
(29, 7, 'May,19,2019 08:32:04 AM', 'May,19,2019 09:36:45 AM'),
(30, 9, 'May,19,2019 08:42:25 AM', 'May,19,2019 09:02:21 AM'),
(31, 7, 'May,19,2019 08:42:55 AM', 'May,19,2019 09:36:45 AM'),
(32, 9, 'May,19,2019 08:43:43 AM', 'May,19,2019 09:02:21 AM'),
(33, 7, 'May,19,2019 08:43:50 AM', 'May,19,2019 09:36:45 AM'),
(34, 9, 'May,19,2019 09:02:17 AM', 'May,19,2019 09:02:21 AM'),
(35, 7, 'May,19,2019 09:02:24 AM', 'May,19,2019 09:36:45 AM'),
(36, 7, 'May,19,2019 09:37:00 AM', '');

-- --------------------------------------------------------

--
-- Table structure for table `usergroups`
--

CREATE TABLE `usergroups` (
  `id` int(11) NOT NULL,
  `id_User` int(11) NOT NULL,
  `id_Group` int(11) NOT NULL,
  `fileID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usergroupslink`
--

CREATE TABLE `usergroupslink` (
  `id` int(11) NOT NULL,
  `id_User` int(11) NOT NULL,
  `id_Group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usergroupslink`
--

INSERT INTO `usergroupslink` (`id`, `id_User`, `id_Group`) VALUES
(1, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`) VALUES
(5, 'christiaan@gmail.com', '$1$3ChaP9tB$lWP8QfNdKdbLQtNWeKh1d.', 'Christiaan'),
(7, 'ludickmarius@gmail.com', '$1$rusQh9Q8$CWj31u.zoW148gnsa2s0j1', 'Marius'),
(9, 'cornelius@gmail.com', '$1$5FldfFeX$NXOzmYiaQYuVaFEf6PgOR0', 'Cornelius');

-- --------------------------------------------------------

--
-- Table structure for table `usershare`
--

CREATE TABLE `usershare` (
  `id` int(11) NOT NULL,
  `id_User` int(11) NOT NULL,
  `id_UserSharedWith` int(11) NOT NULL,
  `fileID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usershare`
--

INSERT INTO `usershare` (`id`, `id_User`, `id_UserSharedWith`, `fileID`) VALUES
(3, 9, 7, 24),
(10, 7, 9, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessionstable`
--
ALTER TABLE `sessionstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usergroups`
--
ALTER TABLE `usergroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usergroupslink`
--
ALTER TABLE `usergroupslink`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usershare`
--
ALTER TABLE `usershare`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sessionstable`
--
ALTER TABLE `sessionstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `usergroups`
--
ALTER TABLE `usergroups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usergroupslink`
--
ALTER TABLE `usergroupslink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usershare`
--
ALTER TABLE `usershare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
