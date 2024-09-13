-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 05:04 AM
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
-- Database: `petadoptionsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `identification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `firstname`, `lastname`, `email`, `type`, `password`, `identification`) VALUES
(1, 'regie', 'jacinto', 'regie@gmail.com', 'admin', '1234', ''),
(15, 'regienald', 'jacinto', 'jacintoc735@gmail.com', 'user', '123', 'lisensya1.jpg'),
(16, 'Regie', 'jacinto', 'regienaldj@gmail.com', 'user', '123', 'lisensya1.jpg'),
(18, 'micaela ', 'Reyes', 'micamiks_24@yahoo.com', 'user', '123', 'id2.png');

-- --------------------------------------------------------

--
-- Table structure for table `adopted`
--

CREATE TABLE `adopted` (
  `pet_id` int(11) NOT NULL,
  `pet_name` varchar(50) NOT NULL,
  `pet_age` varchar(100) NOT NULL,
  `pet_color` varchar(100) NOT NULL,
  `vaccinated` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `breed` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `pet_img1` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adopted`
--

INSERT INTO `adopted` (`pet_id`, `pet_name`, `pet_age`, `pet_color`, `vaccinated`, `category`, `breed`, `description`, `pet_img1`) VALUES
(1, 'choco', 'Puppy', 'light Brow', 'YES', '', 'Dalmatian ', 'good and high quality', '20220601_185407.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `adoptionrequest`
--

CREATE TABLE `adoptionrequest` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `schedule` varchar(100) NOT NULL,
  `petname` varchar(100) NOT NULL,
  `agreement` varchar(300) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adoptionrequest`
--

INSERT INTO `adoptionrequest` (`id`, `firstname`, `lastname`, `email`, `phone`, `schedule`, `petname`, `agreement`, `message`, `status`) VALUES
(1, 'Regie', 'jacinto', 'jacintoc735@gmail.com', '09060618986', 'feb 24 at 5pm-6pm', 'choco', 'Yes, I will undertake another rescue instead.', 'jacinto Regie would like to request for adoption.', 2),
(2, 'Regie', 'jacinto', 'jacintoc735@gmail.com', '09060618986', 'feb 24 at 5pm-6pm', 'choco', 'Yes, I will undertake another rescue instead.', 'jacinto Regie would like to request for adoption.', 2),
(3, 'asdf', 'asdf', 'jacintoc735@gmail.com', 'asdf', 'asdf', 'asdf', 'Yes, I will undertake another rescue instead.', 'asdf asdf would like to request for adoption.', 2),
(4, 'adsf', 'asdf', 'jacintoc735@gmail.com', 'asdf', 'asdf', 'asdf', 'Yes, I will undertake another rescue instead.', 'asdf adsf would like to request for adoption.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `petdetails`
--

CREATE TABLE `petdetails` (
  `pet_id` int(11) NOT NULL,
  `pet_name` varchar(50) NOT NULL,
  `pet_age` varchar(100) NOT NULL,
  `pet_color` varchar(10) NOT NULL,
  `vaccinated` varchar(5) NOT NULL,
  `breed` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `pet_img1` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petdetails`
--

INSERT INTO `petdetails` (`pet_id`, `pet_name`, `pet_age`, `pet_color`, `vaccinated`, `breed`, `description`, `pet_img1`) VALUES
(2, 'tokio', 'Senior', 'brown', 'NO', 'Aspin', 'cute and playable ', '20220601_185410.jpg'),
(3, 'cookie', 'Adult', 'brown', 'YES', 'Aspin', 'good dog', '20220615_161753.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `identification` varchar(300) NOT NULL,
  `message` varchar(300) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adopted`
--
ALTER TABLE `adopted`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `adoptionrequest`
--
ALTER TABLE `adoptionrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petdetails`
--
ALTER TABLE `petdetails`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `adopted`
--
ALTER TABLE `adopted`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adoptionrequest`
--
ALTER TABLE `adoptionrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `petdetails`
--
ALTER TABLE `petdetails`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
