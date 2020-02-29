-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2020 at 04:03 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smac_task_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `email`, `password`, `isactive`) VALUES
(1, 'Dashrath', 'dash@gmail.com', 'e19d5cd5af0378da05f63f891c7467af', 1),
(2, 'dash', 'qw@gmail.com', '12', 1),
(3, 'dash', '123@gmail.com', '123', 1),
(4, 'dash', 'dashrath159@gmail.com', '', 1),
(6, 'mahesh', 'dashrath159@gmail.com', '', 1),
(7, 'dash2', 'dashrath159@gmail.com', '', 1),
(8, 'dash3', 'dashrath159@gmail.com', '', 1),
(9, 'dash', 'dashrath159@gmail.com', '37693cfc748049e45d87b8c7d8b9aacd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_list`
--

CREATE TABLE `project_list` (
  `pid` int(11) NOT NULL,
  `project_name` text NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_list`
--

INSERT INTO `project_list` (`pid`, `project_name`, `isactive`) VALUES
(1, 'abc', 1),
(2, 'def', 1),
(3, 'ghi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `task` text NOT NULL,
  `hrs` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `project_id`, `task`, `hrs`, `created_by`, `date`, `created_on`) VALUES
(1, 0, 'dash', '12', 1, '0000-00-00 00:00:00', '2020-02-28 10:24:03'),
(2, 1, 'task1', '1', 1, '2020-02-28 00:00:00', '2020-02-28 21:01:02'),
(3, 1, 'task1', '1', 0, '0000-00-00 00:00:00', '2020-02-28 00:00:00'),
(4, 1, '', '1', 0, '2020-02-28 00:00:00', '2020-02-28 21:02:26'),
(5, 1, 'task 2', '12', 1, '2020-02-28 00:00:00', '2020-02-28 21:27:23'),
(8, 1, '', '4', 1, '2020-02-29 00:00:00', '2020-02-29 19:06:06'),
(9, 1, 'task1', '1', 9, '2020-02-29 00:00:00', '2020-02-29 19:39:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_list`
--
ALTER TABLE `project_list`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_list`
--
ALTER TABLE `project_list`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
