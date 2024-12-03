-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2024 at 06:21 PM
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
-- Table structure for table `adoption_requests`
--

CREATE TABLE `adoption_requests` (
  `id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoption_requests`
--

INSERT INTO `adoption_requests` (`id`, `pet_id`, `full_name`, `email`, `phone`, `message`, `request_date`) VALUES
(2, 20, 'Nirrav Sawla', 'nirravsawlaadobe@gmail.com', '09321732444', 'adfafaef', '2024-12-01 15:21:43'),
(3, 20, 'Nirrav Sawla', 'nirravsawlaadobe@gmail.com', '09321732444', 'sdfsdfsdf', '2024-12-01 15:24:09'),
(4, 20, 'Nirrav Sawla', 'nirravsawlaadobe@gmail.com', '09321732444', 'sgfsgsgsfg', '2024-12-01 15:26:44'),
(5, 20, 'Nirrav Sawla', 'nirravsawlaadobe@gmail.com', '09321732444', 'Dog lover', '2024-12-03 16:15:51');

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

-- --------------------------------------------------------

--
-- Table structure for table `appliedvolunteers`
--

CREATE TABLE `appliedvolunteers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appliedvolunteers`
--

INSERT INTO `appliedvolunteers` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(2, 'efwef', 'asdasd@gmail.com', 'afafadfdf', '2024-11-30 15:59:28'),
(3, 'Nirrav Sawla', 'nirravsawlaadobe@gmail.com', 'erswgrwgrsrg', '2024-12-03 16:34:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption_requests`
--
ALTER TABLE `adoption_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pet_id` (`pet_id`);

--
-- Indexes for table `animal_adoption`
--
ALTER TABLE `animal_adoption`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appliedvolunteers`
--
ALTER TABLE `appliedvolunteers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption_requests`
--
ALTER TABLE `adoption_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `animal_adoption`
--
ALTER TABLE `animal_adoption`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `appliedvolunteers`
--
ALTER TABLE `appliedvolunteers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoption_requests`
--
ALTER TABLE `adoption_requests`
  ADD CONSTRAINT `adoption_requests_ibfk_1` FOREIGN KEY (`pet_id`) REFERENCES `animal_adoption` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
