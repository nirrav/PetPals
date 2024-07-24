-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2024 at 06:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petpals`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal_adoption`
--

CREATE TABLE `animal_adoption` (
  `id` int(5) NOT NULL,
  `name` text NOT NULL,
  `animalType` text NOT NULL,
  `color` text NOT NULL,
  `bloodGroup` varchar(20) NOT NULL,
  `age` int(10) NOT NULL,
  `note` mediumtext NOT NULL,
  `photo` varchar(100) NOT NULL,
  `photo_album` text DEFAULT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animal_adoption`
--

INSERT INTO `animal_adoption` (`id`, `name`, `animalType`, `color`, `bloodGroup`, `age`, `note`, `photo`, `photo_album`, `location`) VALUES
(20, 'Browny', 'Dog', 'Brown', 'AB+', 6, 'Browny 🐶 is a gentle and affectionate brown dog who loves spending time with people. At 6 years old, he enjoys leisurely walks 🚶‍♂️ and cuddling up on the couch 🛋️. Browny is well-behaved, gets along with other pets 🐾, and is looking for a forever home 🏡 where he can be a loyal companion ❤️.', 'uploads/p8.png', 'uploads/p2.png,uploads/p3.png,uploads/p4.png,uploads/p5.png,uploads/p6.png', 'Kandivali, Maharashta'),
(21, 'Rocky', 'Dog', 'white', 'B-', 2, 'This is a demo note', 'uploads/p7.png', 'uploads/1.png,uploads/3.png,uploads/4.png,uploads/5.png,uploads/6.png', 'Goregaon, Maharashtra'),
(22, 'Joey', 'Dog', 'Grey', 'B+', 8, 'Browny 🐶 is a gentle and affectionate brown dog who loves spending time with people. At 6 years old, he enjoys leisurely walks 🚶‍♂️ and cuddling up on the couch 🛋️. Browny is well-behaved, gets along with other pets 🐾, and is looking for a forever home 🏡 where he can be a loyal companion ❤️.', 'uploads/p6.png', 'uploads/p2.png,uploads/p3.png,uploads/p4.png,uploads/p5.png,uploads/p6.png', 'Bandra');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal_adoption`
--
ALTER TABLE `animal_adoption`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal_adoption`
--
ALTER TABLE `animal_adoption`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
