-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 05, 2022 at 07:41 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moview`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `first_name`, `last_name`, `phone`, `password`) VALUES
(1, 'rahaf123', 'rahaf', 'almoqbel', '0544965987', '$2y$10$.u0Nc0NO8felFWW9pRTbounuIczByOHN82QxrqN.Lelk1Q3kmFlHq');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(20) NOT NULL,
  `movie_name` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL,
  `type` varchar(250) NOT NULL,
  `story` text NOT NULL,
  `where_to_watch` varchar(300) NOT NULL,
  `poster` varchar(100) NOT NULL,
  `adminID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `movie_name`, `status`, `type`, `story`, `where_to_watch`, `poster`, `adminID`) VALUES
(1, 'father stu', 'coming soon', 'drama', 'Follows the life of Father Stuart Long, a boxer-turned-priest who inspired countless people during his journey from self-destruction to redemption.		', '-', 'Poster-62742360d2fb77.53319831.jpg', 1),
(2, 'champions', 'available', 'comedy', 'Khaled is the assistant coach of a top Saudi Arabian football team. One day, after a stressful match, his frustration and bad attitude lands him in disciplinary court. He loses his job and is sentenced to the worst possible punishment for his ego: coaching a group of players with intellectual disabilities. Through their innocence, tenderness and plenty of good humor, they will teach Khaled the things that really matter in life.	', 'vox cinemas', 'Poster-627423a1955680.75068840.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(20) NOT NULL,
  `review` text NOT NULL,
  `movie_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `review`, `movie_id`) VALUES
(1, 'hiiii', 1),
(2, 'wow im so excited ;)', 1),
(3, 'good', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminID` (`adminID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`adminID`) REFERENCES `admin` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
