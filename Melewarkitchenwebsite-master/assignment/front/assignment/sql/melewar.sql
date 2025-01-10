-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 04:24 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `melewar`
--

-- --------------------------------------------------------

--
-- Table structure for table `dessert`
--

CREATE TABLE `dessert` (
  `dessertID` int(11) UNSIGNED NOT NULL,
  `dessertName` varchar(100) NOT NULL,
  `dessertDesc` text NOT NULL,
  `dessertPrice` float(11,2) NOT NULL,
  `dessertLoc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dessert`
--

INSERT INTO `dessert` (`dessertID`, `dessertName`, `dessertDesc`, `dessertPrice`, `dessertLoc`) VALUES
(1, 'Puding', 'Puding glowing!', 3.50, 'puding.jpg'),
(2, 'Kek', 'Kek gebu.', 4.00, 'kek.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `drink`
--

CREATE TABLE `drink` (
  `drinkID` int(11) UNSIGNED NOT NULL,
  `drinkName` varchar(100) NOT NULL,
  `drinkDesc` text NOT NULL,
  `drinkPrice` float(11,2) NOT NULL,
  `drinkLoc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drink`
--

INSERT INTO `drink` (`drinkID`, `drinkName`, `drinkDesc`, `drinkPrice`, `drinkLoc`) VALUES
(1, 'Jus', 'Jus segar!', 3.50, 'jus.jpg'),
(2, 'Air Batu Campur', 'ABC sangat enak.', 2.00, 'abc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `foodID` int(11) UNSIGNED NOT NULL,
  `foodName` varchar(100) NOT NULL,
  `foodDesc` text NOT NULL,
  `foodPrice` float(11,2) NOT NULL,
  `foodLoc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodID`, `foodName`, `foodDesc`, `foodPrice`, `foodLoc`) VALUES
(1, 'Nasi Putih', 'Nasi putih sedap', 3.00, 'nasiputih.jpg'),
(2, 'Nasi Bujang', 'Nasi bujang ada telur', 3.00, 'nasibujang.jpg'),
(3, 'Tom Yam', 'Tom Yam panas2', 4.00, 'tomyam.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` text NOT NULL,
  `date` date NOT NULL,
  `time` int(11) NOT NULL,
  `guests` int(11) NOT NULL,
  `table_number` int(11) NOT NULL,
  `item1` text NOT NULL,
  `item1_quantity` int(11) NOT NULL,
  `item2` text NOT NULL,
  `item2_quantity` int(11) NOT NULL,
  `item3` text NOT NULL,
  `item3_quantity` int(11) NOT NULL,
  `item4` text NOT NULL,
  `item4_quantity` int(11) NOT NULL,
  `item5` text NOT NULL,
  `item5_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `email`, `phone`, `date`, `time`, `guests`, `table_number`, `item1`, `item1_quantity`, `item2`, `item2_quantity`, `item3`, `item3_quantity`, `item4`, `item4_quantity`, `item5`, `item5_quantity`) VALUES
(13, 'Rafiz', 'r@gmail.com', '0179578535', '2023-06-23', 1, 1, 1, 'Nasi Putih', 1, 'Nasi Bujang', 1, 'Tom Yam', 1, 'Puding', 1, 'Kek', 1),
(14, 'Rafiz', 'r@gmail.com', '0179578535', '2023-06-23', 4, 1, 1, 'Nasi Putih', 1, 'Nasi Bujang', 1, 'Tom Yam', 1, 'Puding', 1, 'Kek', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `table_number` varchar(100) DEFAULT NULL,
  `status` enum('available','unavailable') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `table_number`, `status`) VALUES
(1, 'Table 1', 'available'),
(2, 'Table 2', 'available'),
(3, 'Table 3', 'available'),
(4, 'Table 4', 'available'),
(5, 'Table 5', 'available'),
(6, 'Table 6', 'available'),
(7, 'Table 7', 'available'),
(8, 'Table 8', 'available'),
(9, 'Table 9', 'available'),
(10, 'Table 10', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `birthDate` date DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userName`, `email`, `phoneNumber`, `password`, `birthDate`, `address`) VALUES
(1, 'ra', 'r@gmail.com', 'r', 'r', '2022-03-10', 'r'),
(4, 'rafiz', 'feez1247@gmail.com', '0179578535', 'rafi', '2023-06-01', 'n'),
(5, 'anep', 'anep@gmail.com', '', '123', '2023-06-15', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dessert`
--
ALTER TABLE `dessert`
  ADD PRIMARY KEY (`dessertID`);

--
-- Indexes for table `drink`
--
ALTER TABLE `drink`
  ADD PRIMARY KEY (`drinkID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dessert`
--
ALTER TABLE `dessert`
  MODIFY `dessertID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drink`
--
ALTER TABLE `drink`
  MODIFY `drinkID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `foodID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
