-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2019 at 08:45 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` mediumtext COLLATE utf8mb4_bin NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(1, 1, 4, 'fvfgsg', '2019-11-14 07:35:31', 0),
(2, 4, 1, 'hi\nvxcvxvcvxcvxcxc', '2019-11-14 07:39:03', 0),
(3, 1, 4, 'fdgdfg', '2019-11-14 07:39:21', 0),
(4, 4, 1, 'dfgdfgfdgdf', '2019-11-14 07:39:28', 0),
(5, 1, 4, 'dfgdfgdfg', '2019-11-14 07:39:32', 0),
(6, 1, 3, 'vcbcvb', '2019-11-14 07:40:57', 0),
(7, 1, 4, 'cvbcv', '2019-11-14 07:41:09', 0),
(8, 3, 1, 'bcvbcvb', '2019-11-14 07:41:32', 0),
(9, 3, 1, 'cvbcvb', '2019-11-14 07:41:46', 0),
(10, 4, 1, 'cvbcvb', '2019-11-14 07:41:49', 0),
(11, 1, 4, 'cvbcvb', '2019-11-14 07:41:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `password`) VALUES
(1, 'Rakesh', '$2y$10$Rl2CMCu3FDAmNYoYUmX8oOloD5fmNJPaPdIV5TjsUIA2wDRZL8AY.'),
(2, 'Roshen', '$2y$10$Rl2CMCu3FDAmNYoYUmX8oOloD5fmNJPaPdIV5TjsUIA2wDRZL8AY.'),
(3, 'chittaranjan', '$2y$10$Rl2CMCu3FDAmNYoYUmX8oOloD5fmNJPaPdIV5TjsUIA2wDRZL8AY.'),
(4, 'abhi.aksingh83@gmail.com', '$2y$10$Rl2CMCu3FDAmNYoYUmX8oOloD5fmNJPaPdIV5TjsUIA2wDRZL8AY.');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(1, 4, '2019-11-14 07:45:42', 'no'),
(2, 1, '2019-11-14 07:42:48', 'no'),
(3, 3, '2019-11-14 07:45:39', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
