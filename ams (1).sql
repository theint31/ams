-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2022 at 07:51 AM
-- Server version: 8.0.25
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int NOT NULL,
  `emp_id` int NOT NULL,
  `date` varchar(255) NOT NULL,
  `shift_type_id` int NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `check_leave`
--

CREATE TABLE `check_leave` (
  `id` int NOT NULL,
  `emp_id` int NOT NULL,
  `leave_type_id` int NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `dept_ph` varchar(255) NOT NULL,
  `dept_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_name`, `dept_ph`, `dept_email`) VALUES
(1, 'Sales department', '01-45227', 'sales@gmail.com'),
(2, 'Human Resource department', '01-123456', 'hr@gmail.com'),
(3, 'Financial department', '01-789101', 'financial@gmail.com'),
(4, 'Marketing department', '01-111213', 'marketing@gmail.com'),
(5, 'Fabric inspection department', '01-141516', 'fabricinspection@gmail.com'),
(6, 'Accessory stores department', '01-171819', 'accessorystores@gmail.com'),
(7, 'Planning department', '01-202122', 'planning@gmail.com'),
(8, 'Laboratory department', '01-232425', 'laboratory@gmail.com'),
(9, 'Machine maintenance', '01-262728', 'machinemaintenance@gmail.com'),
(10, 'CAD section', '01-293031', 'cadsection@gmail.com'),
(11, 'Cutting section', '01-323334', 'cutting@gmail.com'),
(12, 'Production department', '01-353637', 'production@gmail.com'),
(13, 'Industrial engineering section (IE)', '01-383940', 'industrialengineering@gmail.com'),
(14, 'Embroidery department', '01-414243', 'embroidery@gmail.com'),
(15, 'Fabric washing section', '01-444546', 'fabricwashing@gmail.com'),
(16, 'Quality assurance department', '01-474849', 'qualityassurance@gmail.com'),
(17, 'Finishing department', '01-505152', 'finishing@gmail.com'),
(18, 'Design Deparment', '01-535455', 'design@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `nrc` varchar(255) NOT NULL,
  `emp_ph` varchar(255) NOT NULL,
  `emp_email` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `position_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_name`, `nrc`, `emp_ph`, `emp_email`, `dob`, `gender`, `address`, `position_id`) VALUES
(1, 'Kaung Kaung', '8/MaKhaNa(N)293090', '09771601312', 'kaung@gmail.com', '12/5/1998', 'male', 'Magway', 3),
(2, 'Phway', '8/NgaPhaNa(N)123321', '09787853888', 'phway@gmail.com', '1998-03-04', 'female', 'Magway', 10),
(3, 'Yu Ya', '8/MaKhaNa(N)123456', '09676790145', 'yuya@gmail.com', '1992-12-05', 'female', 'Magway', 4),
(4, 'Htet Htet', '5/SaGaNa(N)987654', '09442242204', 'htet@gmail.com', '2000-05-05', 'female', 'Sagaing', 11),
(5, 'ying', '8/MaKhaNa(N)123456', '09771601316', 'ying@gmail.com', '2000-06-01', 'female', 'Magway', 10),
(6, 'Mi Theint', '8/MaKhaNa(N)293099', '09771601315', 'thient@gmail.com', '2022-08-13', 'male', 'Magway', 13);

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `id` int NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int NOT NULL,
  `position_name` varchar(255) NOT NULL,
  `dept_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `position_name`, `dept_id`) VALUES
(2, 'Customer Service Manager', 1),
(3, 'Buyer', 1),
(4, 'Buyer Assistant', 1),
(5, 'Sales Manager', 1),
(6, 'Account Manager', 3),
(7, 'Accounting Assistant', 3),
(8, 'Head of Marketing', 4),
(9, 'HR Manager', 2),
(10, 'HR Adminstrator', 2),
(11, 'HR Assistant', 2),
(12, 'HR Advisor', 2),
(13, 'Senior Designer', 18);

-- --------------------------------------------------------

--
-- Table structure for table `shift_assignment`
--

CREATE TABLE `shift_assignment` (
  `id` int NOT NULL,
  `emp_id` int NOT NULL,
  `shift_type_id` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shift_assignment`
--

INSERT INTO `shift_assignment` (`id`, `emp_id`, `shift_type_id`, `start_date`, `end_date`) VALUES
(7, 4, 2, '2022-08-15', '2022-08-19'),
(8, 1, 1, '2022-08-01', '2022-08-05'),
(9, 2, 1, '2021-08-01', '2021-08-05'),
(10, 2, 2, '2021-09-06', '2021-09-10'),
(11, 5, 3, '2021-10-05', '2021-10-10'),
(12, 2, 1, '2022-09-01', '2022-09-03'),
(13, 6, 1, '2022-09-01', '2022-09-03'),
(14, 6, 2, '2022-09-04', '2022-09-09'),
(15, 6, 3, '2022-09-10', '2022-09-14'),
(16, 1, 1, '2022-09-01', '2022-09-05'),
(17, 6, 1, '2022-09-19', '2022-09-23'),
(18, 2, 2, '2022-09-05', '2022-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `shift_type`
--

CREATE TABLE `shift_type` (
  `id` int NOT NULL,
  `shift_name` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shift_type`
--

INSERT INTO `shift_type` (`id`, `shift_name`, `start_time`, `end_time`) VALUES
(1, 'Morning Duty', '8AM', '4PM'),
(2, 'Evening Duty', '4PM', '12AM'),
(3, 'Night Duty', '12AM', '8AM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `shift_type_id` (`shift_type_id`);

--
-- Indexes for table `check_leave`
--
ALTER TABLE `check_leave`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `leave_type_id` (`leave_type_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `position_id` (`position_id`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `shift_assignment`
--
ALTER TABLE `shift_assignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `shift_type_id` (`shift_type_id`);

--
-- Indexes for table `shift_type`
--
ALTER TABLE `shift_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `check_leave`
--
ALTER TABLE `check_leave`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shift_assignment`
--
ALTER TABLE `shift_assignment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `shift_type`
--
ALTER TABLE `shift_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`shift_type_id`) REFERENCES `shift_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `check_leave`
--
ALTER TABLE `check_leave`
  ADD CONSTRAINT `check_leave_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `check_leave_ibfk_2` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_type` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `position`
--
ALTER TABLE `position`
  ADD CONSTRAINT `position_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `shift_assignment`
--
ALTER TABLE `shift_assignment`
  ADD CONSTRAINT `shift_assignment_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `shift_assignment_ibfk_2` FOREIGN KEY (`shift_type_id`) REFERENCES `shift_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
