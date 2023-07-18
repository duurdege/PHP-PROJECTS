-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2023 at 09:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `atten_id` int(11) NOT NULL,
  `EmployeID` int(11) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `monthly` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `time_in` varchar(50) NOT NULL,
  `time_out` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`atten_id`, `EmployeID`, `Date`, `monthly`, `status`, `time_in`, `time_out`) VALUES
(1, 1, '2023-07-14', '', '0', '01:00:00 AM', '06:00:00 PM'),
(2, 2, '2023-07-14', '', '1', '07:00:00 AM', '04:00:00 PM'),
(3, 3, '2023-07-14', '', '1', '01:00:00 AM', '12:00:00 PM'),
(4, 4, '2023-07-14', '', '1', '01:00:00 AM', '06:00:00 PM'),
(5, 1, '2023-07-13', '', '0', '01:00:00 AM', '06:00:00 PM'),
(6, 4, '2023-07-06', 'Jul', '0', '01:00:00 AM', '06:00:00 PM'),
(7, 1, '2023-07-15', 'Jul', '0', '01:00:00 AM', '06:00:00 PM'),
(8, 2, '2023-07-15', 'Jul', '1', '07:00:00 AM', '04:00:00 PM'),
(9, 1, '2023-07-15', 'Jul', '1', '01:00:00 AM', '06:00:00 PM'),
(10, 3, '2023-07-15', 'Jul', '1', '01:00:00 AM', '12:00:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `C_Date` date NOT NULL,
  `R_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`ID`, `Name`, `Phone`, `Email`, `Address`, `C_Date`, `R_Date`, `Gender`) VALUES
(7, 'Adan Mohamednur Bule', '  0617318902', 'Inaduurdage@gmail.com', 'deyniile', '2023-07-02', '2023-07-05 14:52:34', 'Male'),
(8, 'Musse Abdulkadir Hassan', '0615056565', 'musse@gmail.com', 'deyniile', '2023-07-02', '2023-07-02 08:19:55', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
(1, 'Taleex'),
(4, 'Bakaaro'),
(5, 'Suuqbacaad'),
(6, 'Ali kamiin'),
(7, 'Labodhaqax'),
(8, 'Warshadaha');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Emp_id` int(11) NOT NULL,
  `Emp_name` varchar(100) NOT NULL,
  `Emp_phone` varchar(50) NOT NULL,
  `Emp_address` varchar(100) NOT NULL,
  `Emp_gender` varchar(10) NOT NULL,
  `Dept_id` int(11) NOT NULL,
  `sche_id` int(11) NOT NULL,
  `Emp_photo` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Emp_id`, `Emp_name`, `Emp_phone`, `Emp_address`, `Emp_gender`, `Dept_id`, `sche_id`, `Emp_photo`, `created_at`, `updated_at`) VALUES
(1, 'Adan Mohamednur Bule', '0617318902', 'Warta Nabada', 'Male', 1, 2, 'img/adan.jpg', '2023-07-14 00:00:00', '0000-00-00 00:00:00'),
(2, 'Mohamed Ahmed Mohamud', '0615169279', 'Deyniile', 'Male', 5, 1, 'img/user8-128x128.jpg', '2023-07-14 00:00:00', NULL),
(3, 'Abdifitah Salat Nor', '0619394267', 'Warta Nabada', 'Male', 6, 3, 'img/user1-128x128.jpg', '2023-07-14 00:00:00', NULL),
(4, 'Aisha Abdullahi Abdi', '0617318902', 'Waaberi', 'Female', 7, 2, 'img/avatar3.png', '2023-07-14 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedual`
--

CREATE TABLE `schedual` (
  `sche_id` int(11) NOT NULL,
  `time_in` varchar(100) NOT NULL,
  `time_out` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedual`
--

INSERT INTO `schedual` (`sche_id`, `time_in`, `time_out`) VALUES
(1, '07:00:00 AM', '04:00:00 PM'),
(2, '01:00:00 AM', '06:00:00 PM'),
(3, '01:00:00 AM', '12:00:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `created_Date` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `fullname`, `username`, `password`, `Role`, `user_photo`, `created_Date`, `updated_time`) VALUES
(1, 'Maryan Mohamed Ali', 'maryan@gmail.com', '12341234', 'User', 'img/avatar3.png', '2023-07-13 00:00:00', '2023-07-13 00:00:00'),
(4, 'Abdifitah Abdullahi Ali', 'Abdifitah', 'neef', 'User', 'img/avatar4.png', '2023-07-13 00:00:00', '2023-07-13 00:00:00'),
(6, 'Mohamed Ahmed Mohamud', 'Msshaaf29@gmail.com', 'olad', 'Admin', 'img/user8-128x128.jpg', '2023-07-13 00:00:00', '2023-07-13 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`atten_id`),
  ADD KEY `Emp_ID` (`EmployeID`);

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Emp_id`),
  ADD KEY `Dept_id` (`Dept_id`),
  ADD KEY `sche_id` (`sche_id`);

--
-- Indexes for table `schedual`
--
ALTER TABLE `schedual`
  ADD PRIMARY KEY (`sche_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `atten_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `schedual`
--
ALTER TABLE `schedual`
  MODIFY `sche_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`EmployeID`) REFERENCES `employee` (`Emp_id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`sche_id`) REFERENCES `schedual` (`sche_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
