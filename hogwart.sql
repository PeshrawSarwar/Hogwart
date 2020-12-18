-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2020 at 08:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hogwart`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `required_textbook` text NOT NULL,
  `required_equipment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--



-- --------------------------------------------------------

--
-- Table structure for table `enrolls_in`
--

CREATE TABLE `enrolls_in` (
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `exam` varchar(255) NOT NULL,
  `grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrolls_in`
--



-- --------------------------------------------------------

--
-- Table structure for table `head_of`
--

CREATE TABLE `head_of` (
  `professor_id` int(11) NOT NULL,
  `house_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `head_of`
--


-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `house_name` varchar(255) NOT NULL,
  `mascot` text NOT NULL,
  `motto` text NOT NULL,
  `house_ghost` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `houses`
--



-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `professor_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professors`
--


-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `class_year` text NOT NULL,
  `house_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--


-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `professor_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `classroom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teaches`
--



--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `enrolls_in`
--
ALTER TABLE `enrolls_in`
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `head_of`
--
ALTER TABLE `head_of`
  ADD PRIMARY KEY (`professor_id`),
  ADD UNIQUE KEY `house_name` (`house_name`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`house_name`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`professor_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `house_n2` (`house_name`);

--
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD KEY `professor_id` (`professor_id`),
  ADD KEY `course_id` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `professor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrolls_in`
--
ALTER TABLE `enrolls_in`
  ADD CONSTRAINT `enrolls_in_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `enrolls_in_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `house_n2` FOREIGN KEY (`house_name`) REFERENCES `houses` (`house_name`);

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `teaches_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `professors` (`professor_id`),
  ADD CONSTRAINT `teaches_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
