-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2023 at 11:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grad_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` int(11) NOT NULL,
  `name` varchar(254) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` text NOT NULL,
  `role` enum('Donor','patient') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`) VALUES
(1, ' ahmed', 'ahmed_test@gmail.com', '$2y$10$bzc7eDt9lCnl7P6OkSv1wudyS4N9QxFyzHR2F2', '01112850090', 'cairo', NULL),
(2, ' aaaaaaa', 'any@gmail.com', '$2y$10$zsCfvTW.sYnaaTo99jMz6.yzv5Uo7kXY20OEaq', '01112850098', 'cairo', NULL),
(3, ' ahmed', 'aaaaaaa@gmail.com', '$2y$10$lTJr5Q5bBgYLzZhYM6j7aegFkBfdxvclPFtWkL', '01112850099', 'cairo', NULL),
(4, ' aaaaaaa', 'aahmeddd@gmail.com', '$2y$10$XcmORN.gOw08WgfSSYXF/eq4.oooCGjjseIi.N', '01112850690', 'cairo', NULL),
(5, ' mohamed', 'mo@a.com', '$2y$10$Htx031Baa26bS5.rw8LZhu56ONHyBG1ydhFr00', '01112856690', 'cairo', NULL),
(6, ' mo', 'm@a.com', '$2y$10$nhbAJW1ih3qgN25aftJzAuVGX2FUdocrGYEXCO', '01112854400', 'cairo', NULL),
(7, ' mmm', 'mmm@a.com', '$2y$10$F5j/DsoyTyyRHgdU6pSB5OvSBUdIWxi/0YgaUW', '01112854491', 'cairo', NULL),
(8, ' mm', 'mmam@a.com', '$2y$10$Xwbe49bIKTEQB43Vi3WUDO72gofPmT8hrzuU83', '01112854495', 'cairo', NULL),
(9, ' donor', 'donor@gmail.com', '$2y$10$BC9iS0z21mMZpGfatx.U3u5uJksxfL9gGE/ofDns5Hf2SeWIHpygC', '01128500900', 'cairo', NULL),
(10, ' donora', 'donoar@gmail.com', '$2y$10$6QNs4Qls.9T3XW/j7e53YOAB.8bFIY/2c7kbyOaHjzwyOrR5GzQ02', '01128500901', 'cairo', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `med_id` int(11) NOT NULL,
  `med_name` varchar(45) NOT NULL,
  `med_exp` date NOT NULL,
  `med_pro` date NOT NULL,
  `status` enum('in stock','out of stock') DEFAULT NULL,
  `donor_id` int(11) DEFAULT NULL,
  `quanitiy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(254) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `email`, `password`, `phone`, `address`, `patient_id`) VALUES
(1, ' patient', 'patient@gmail.com', '$2y$10$PdMWI6PRD5qo8V4zbjeOielxtYQ9KCb8BLtPjBFHixtfxlrFglx5e', '01112850090', 'cairo', NULL),
(2, ' aaaaaaa', 'ahmed_test@gmail.com', '$2y$10$dEOkDsWqMJgRV9xVze2NOuhy7ngO3E/wdO9SiM1ZAE37C2W8a7po2', '01112850091', 'cairo', NULL),
(3, ' patientaa', 'pattt@gmail.com', '$2y$10$zgvIo7Ye1XJDoXMQWlyeMukXq6s04gpVZrKH6ko2n9l8W2rW708Ae', '01112850099', 'cairo', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `description`, `image`, `created_at`, `user_id`) VALUES
(1, 'title', 'descre', '1.png', '2023-04-03 00:38:47', 1),
(2, 'test dawwae2', 'desc for dwaaa', '1.png', '2023-04-03 00:53:37', 1),
(3, 'title dwaae', 'test for dwaae', '1.png', '2023-04-03 01:16:26', 1),
(4, 'assasaassasa', 'dfdfdfdfdfdfdfdfdfdfdfdfdfdfdfg', '642a12200ad7e1680478752.PNG', '2023-04-03 01:39:12', 1),
(5, 'dwaae', 'congestal', '642a13480a6351680479048.PNG', '2023-04-03 01:44:08', 1),
(6, 'jhjhjhjhjhjh', 'jhjhjhjhjhjh', '', '2023-04-03 02:09:49', 1),
(7, 'jhjhjhjhjh', 'jhjhjhjhjh', '', '2023-04-03 02:10:52', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`med_id`),
  ADD KEY `donor_rel_idx` (`donor_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `med_rel_idx` (`patient_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Donor_rel_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `donor_rel` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `med_rel` FOREIGN KEY (`patient_id`) REFERENCES `medicine` (`med_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `do_rel` FOREIGN KEY (`user_id`) REFERENCES `donor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
