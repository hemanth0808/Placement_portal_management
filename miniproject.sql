-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2023 at 02:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `companyname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`companyname`) VALUES
('amazon'),
('apple'),
('capgemini'),
('google'),
('infosys'),
('microsoft'),
('TCS');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `regdno` varchar(11) NOT NULL,
  `cgpa` float(10,2) DEFAULT 0.00,
  `backlogs` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`regdno`, `cgpa`, `backlogs`) VALUES
('19331a1201', 7.50, 0),
('19331a1202', 8.00, 0),
('19331a1203', 7.00, 0),
('19331a1204', 8.70, 0),
('19331a1208', 0.00, 2),
('19331a1264', 0.00, 0),
('19331a1299', 0.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `regdno` varchar(11) NOT NULL,
  `id` int(11) NOT NULL,
  `companyname` varchar(30) NOT NULL,
  `package` float NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`regdno`, `id`, `companyname`, `package`, `file`) VALUES
('19331a1201', 123456, 'infosys', 7, '1156-Fundamentals of Network Security _ Beacon(2).pdf'),
('19331a1201', 987654, 'TCS', 6, '7511-Fundamentals of Cloud Security _ Beacon(3).pdf'),
('19331a1201', 987659, 'amazon', 9, '4610-final_certificate.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `role` varchar(20) NOT NULL,
  `staff_name` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`role`, `staff_name`, `password`) VALUES
('admin', 'admin', 'admin'),
('hod', 'hod', 'hod');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `regdno` varchar(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`regdno`, `name`, `email`, `contact`, `dob`, `password`) VALUES
('19331a1201', 'ganesh', 'ganesh@gmail.com', 9876543211, '2001-07-01', 'ganesh'),
('19331a1202', 'manasa', 'manasa@gmail.com', 9876543212, '2001-07-02', 'manasa'),
('19331a1203', 'raja', 'raja@gmail.com', 9876543213, '2001-07-03', 'raja'),
('19331a1204', 'dedeepya', 'dedeepya@gmail.com', 9876543214, '2001-07-04', 'dedeepya'),
('19331a1208', 'hemanth', 'hemanth@gmail.com', 9866489788, '2002-07-08', 'hemanth'),
('19331a1264', 'ankitha', 'ankitha@gmail.com', 9876543264, '2001-07-21', 'ankitha'),
('19331a1299', 'ramu', 'ramu@gmail.com', 9876543215, '2001-07-05', 'ramu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`companyname`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`regdno`),
  ADD KEY `regdno` (`regdno`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regdno` (`regdno`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`role`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`regdno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=987660;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks` FOREIGN KEY (`regdno`) REFERENCES `student` (`regdno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `regdno` FOREIGN KEY (`regdno`) REFERENCES `student` (`regdno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
