-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 09:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trotza`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_child`
--

CREATE TABLE `attendance_child` (
  `acid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance_child`
--

INSERT INTO `attendance_child` (`acid`, `sid`, `mid`, `status`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 0),
(19, 1, 10, 1),
(20, 2, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `attendance_master`
--

CREATE TABLE `attendance_master` (
  `aid` int(11) NOT NULL,
  `adate` date NOT NULL DEFAULT current_timestamp(),
  `class` int(11) NOT NULL,
  `fid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance_master`
--

INSERT INTO `attendance_master` (`aid`, `adate`, `class`, `fid`) VALUES
(1, '2023-06-06', 2, 1),
(10, '2023-06-13', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `cid` int(11) NOT NULL,
  `clname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`cid`, `clname`) VALUES
(1, '1'),
(2, '12'),
(3, '8'),
(4, '7');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_data`
--

CREATE TABLE `faculty_data` (
  `fid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_data`
--

INSERT INTO `faculty_data` (`fid`, `name`, `email`, `mobile`) VALUES
(0, 'Admin', 'admin123@gmail.com', 1234567890),
(1, 'Jino John', 'jinojohn@gmail.com', 9845628496),
(2, 'Riyas', 'riyas123@gmail.com', 9845628498);

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `feid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`feid`, `sid`, `amount`, `date`) VALUES
(1, 1, 2500.00, '2023-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `type`, `status`) VALUES
(2, 'riyas123@gmail.com', 'abc', 'faculty', 1),
(1, 'riyas123@gmail.com', '2146545135', 'student', 1),
(2, 'jinojohn@gmail.com', '9845628498', 'student', 1),
(0, 'admin123@gmail.com', 'Trotza@123@admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mark_child`
--

CREATE TABLE `mark_child` (
  `mcid` int(11) NOT NULL,
  `markid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `mark` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mark_child`
--

INSERT INTO `mark_child` (`mcid`, `markid`, `sid`, `mark`) VALUES
(5, 6, 1, 0),
(6, 6, 2, 0),
(9, 9, 1, 54),
(10, 9, 2, 65),
(11, 10, 1, 68),
(12, 10, 2, 89);

-- --------------------------------------------------------

--
-- Table structure for table `mark_master`
--

CREATE TABLE `mark_master` (
  `markid` int(11) NOT NULL,
  `date` date NOT NULL,
  `fid` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `subject` int(10) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mark_master`
--

INSERT INTO `mark_master` (`markid`, `date`, `fid`, `class`, `subject`, `total`) VALUES
(6, '2023-06-07', 0, 2, 0, 0),
(9, '2023-06-17', 0, 2, 1, 100),
(10, '2023-06-17', 0, 2, 3, 100);

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `sid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `school` varchar(100) NOT NULL,
  `board` varchar(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pmobile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`sid`, `name`, `class`, `mobile`, `email`, `school`, `board`, `pname`, `pmobile`) VALUES
(1, 'RiyasKH', '2', 2146545135, 'riyas123@gmail.com', 'Al Ameen', 'State', 'KH', 2147483647),
(2, 'Jino Joha', '2', 2147483647, 'jinojohn@gmail.com', 'Al Ameen School', 'CBSE', 'MANOJ', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subid` int(11) NOT NULL,
  `subname` varchar(100) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subid`, `subname`, `cid`) VALUES
(1, 'Chemistry', 2),
(2, 'History', 3),
(3, 'Physics', 2),
(4, 'Mathematics', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_child`
--
ALTER TABLE `attendance_child`
  ADD PRIMARY KEY (`acid`),
  ADD KEY `mid` (`mid`);

--
-- Indexes for table `attendance_master`
--
ALTER TABLE `attendance_master`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `faculty_data`
--
ALTER TABLE `faculty_data`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`feid`);

--
-- Indexes for table `mark_child`
--
ALTER TABLE `mark_child`
  ADD PRIMARY KEY (`mcid`),
  ADD KEY `markid` (`markid`);

--
-- Indexes for table `mark_master`
--
ALTER TABLE `mark_master`
  ADD PRIMARY KEY (`markid`);

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_child`
--
ALTER TABLE `attendance_child`
  MODIFY `acid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `attendance_master`
--
ALTER TABLE `attendance_master`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculty_data`
--
ALTER TABLE `faculty_data`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `feid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mark_child`
--
ALTER TABLE `mark_child`
  MODIFY `mcid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mark_master`
--
ALTER TABLE `mark_master`
  MODIFY `markid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_data`
--
ALTER TABLE `student_data`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance_child`
--
ALTER TABLE `attendance_child`
  ADD CONSTRAINT `attendance_child_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `attendance_master` (`aid`);

--
-- Constraints for table `mark_child`
--
ALTER TABLE `mark_child`
  ADD CONSTRAINT `mark_child_ibfk_1` FOREIGN KEY (`markid`) REFERENCES `mark_master` (`markid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
