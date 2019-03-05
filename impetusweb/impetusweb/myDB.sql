-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 23, 2019 at 11:07 AM
-- Server version: 5.6.33-0ubuntu0.14.04.1
-- PHP Version: 7.2.12-1+ubuntu14.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_email`
--

CREATE TABLE `user_email` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_email`
--

INSERT INTO `user_email` (`id`, `email`) VALUES
(1, 'aefadf@gmail.com'),
(2, 'kguitkgiuuy@gmail.com'),
(3, 'fdghbeiaes@gmail.com'),
(4, 'aergae@gmail.com'),
(5, 'ahbdfuhbu@gmail.com'),
(6, 'dhzbudasyu@gmail.com'),
(7, 'duhfu8ys@gmail.com'),
(8, 'vahid@gmail.com'),
(9, 'jbhjb@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email2` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `phone`, `email2`, `company`) VALUES
(1, 'jhjgvmvhj', '5457766767', 'ghfdhdjnfgj@gmail.com', 'ghjhgghghjghj'),
(2, 'ghsbrighireuhgiuern', '4765823745', 'fjggijjudrhb@gmail.com', 'bfgijb'),
(3, 'erasdfreg', '7682743672', 'vshdvfgdv@gmail.com', 'hbdfhubwh'),
(4, 'aeijfhjeirhbgjebjrbg', '9568274368', 'vdgfugbfuydbsfu@gmail.com', '`hdfbhebuhergfhuh'),
(5, 'dsf sdf sd f', '1212121212', 'as@gmail.com', 'asd as d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_email`
--
ALTER TABLE `user_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_email`
--
ALTER TABLE `user_email`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
