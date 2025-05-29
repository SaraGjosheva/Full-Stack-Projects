-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2024 at 04:25 AM
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
-- Database: `vehicle_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `username`, `email`, `password`) VALUES
(8, 'Sara', 'Gjosheva', 'Sara123', 'sara_gj@gmail.com', '$2y$10$zgD1TcQ2PEKKSHJhvh0m3u.pxJT21.V8ey9nqIEiy9p2ehyPBh3Gm');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_type`
--

CREATE TABLE `fuel_type` (
  `id` int(11) NOT NULL,
  `f_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fuel_type`
--

INSERT INTO `fuel_type` (`id`, `f_type`) VALUES
(1, 'Diesel'),
(2, 'Gasoline'),
(3, 'Gas'),
(4, 'EV'),
(5, 'hybrid');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `vehicle_type_id` int(11) NOT NULL,
  `chassis_number` varchar(255) NOT NULL,
  `production_year` year(4) NOT NULL,
  `registration_number` varchar(255) NOT NULL,
  `fuel_type_id` int(11) NOT NULL,
  `registration_till` date NOT NULL,
  `vehicle_model_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `vehicle_type_id`, `chassis_number`, `production_year`, `registration_number`, `fuel_type_id`, `registration_till`, `vehicle_model_id`) VALUES
(7, 1, 'vh9234cjpt825', '2010', 'sk-4392-ab', 1, '2025-09-24', 7),
(8, 2, '65456456456451', '2010', 'sk-4392-cc', 1, '2026-08-11', 6),
(9, 2, 'sdadadassdad', '2020', 'ss-dddd-dd', 5, '2025-05-07', 5);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_model`
--

CREATE TABLE `vehicle_model` (
  `id` int(11) NOT NULL,
  `model` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_model`
--

INSERT INTO `vehicle_model` (`id`, `model`) VALUES
(1, '\nMercedes-Benz C-Class'),
(2, '\nMercedes-Benz E-Class'),
(3, 'Mercedes-Benz S-Class'),
(4, 'Mercedes-Benz G-Class'),
(5, 'Toyota Prius'),
(6, 'Toyota Corolla'),
(7, 'Toyota Rav4'),
(8, 'Toyota Yaris'),
(9, 'BMW 3 Series'),
(10, 'BMW 5 Series'),
(11, 'BMW 7 Series'),
(12, 'BMW X3'),
(13, 'Volkswagen Golf'),
(14, 'Volkswagen Passat'),
(15, 'Volkswagen Polo'),
(16, 'Volkswagen Tiguan'),
(17, 'Opel Astra'),
(18, 'Opel Corsa'),
(19, 'Opel Insignia'),
(20, 'Opel Mokka'),
(21, 'Honda CR-V'),
(22, 'Honda Civic'),
(23, 'Honda Accord'),
(24, 'Honda HR-V'),
(25, 'Hyundai Tucson'),
(26, 'Hyundai i20'),
(27, 'Hyundai Sonata'),
(28, 'Hyundai Elantra');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_type`
--

CREATE TABLE `vehicle_type` (
  `id` int(11) NOT NULL,
  `type` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_type`
--

INSERT INTO `vehicle_type` (`id`, `type`) VALUES
(1, 'SUV'),
(2, 'Hatchback'),
(3, 'Sedan'),
(4, 'Station Wagon'),
(5, 'Minivan'),
(6, 'Cupe'),
(7, 'Crossover'),
(8, 'Pickup truck'),
(9, 'Convertible');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel_type`
--
ALTER TABLE `fuel_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_type_id` (`vehicle_type_id`),
  ADD KEY `fuel_type_id` (`fuel_type_id`),
  ADD KEY `vehicle_model_id` (`vehicle_model_id`);

--
-- Indexes for table `vehicle_model`
--
ALTER TABLE `vehicle_model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `fuel_type`
--
ALTER TABLE `fuel_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vehicle_model`
--
ALTER TABLE `vehicle_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`vehicle_type_id`) REFERENCES `vehicle_type` (`id`),
  ADD CONSTRAINT `vehicle_ibfk_2` FOREIGN KEY (`fuel_type_id`) REFERENCES `fuel_type` (`id`),
  ADD CONSTRAINT `vehicle_ibfk_3` FOREIGN KEY (`vehicle_model_id`) REFERENCES `vehicle_model` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
