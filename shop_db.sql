-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2023 at 11:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `quantity`, `image`) VALUES
(1, 2, 'My First Love', 1650, 1, 'My-Frist-Love.jpg'),
(2, 2, 'SYBIL', 3200, 2, 'SYBIL.jpg'),
(3, 3, 'The Hidden Truth', 1200, 1, 'The_hidden_truth.jpg'),
(4, 3, 'The Vendor Of Sweets', 1000, 1, 'The_Vendor_of_Sweets.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(1, '2', 'Keerthikan', 'keerthy@gmail.com', '0755808372', 'Can you deliver my books on or before 6th of October 2023?'),
(2, '3', 'Saro', 'saro@gmail.com', '0777244387', 'Hi,\r\nI\'m interested in your book \'The Fall of Darkness\'. But the price is little bit high, can you please provide information on any ongoing discounts or promotions?');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(1, 2, 'Keerthikan', '0755808372', 'keerthy@gmail.com', 'Cash on delivery', 'No78,Hambdan Residence, W.A Silwa Mavata,Colombo 06', 'David CopperField (2)', 4000, '29th of September 2023', 'pending'),
(2, 3, 'Saro', '0777244387', 'saro@gmail.com', 'Online payment', 'No74,Northpole Residence, W.A Silwa Mavata,Colombo 06', 'Aisha & the White Angel (2), The Moonstone (1)', 5300, '30th of September 2023', 'completed'),
(3, 3, 'Saro', '0777244387', 'saro@gmail.com', 'Cash on delivery', 'No74,Northpole Residence, W.A Silwa Mavata,Colombo 06', ', Osmosis A Play (2) , The Fall of Darkness (1) , The Mirror (1) ', 11350, '02-Oct-2023', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(1, 'Aisha & the White Angel', '1500', 'Aisha & the White Angel.jpg'),
(2, 'David Copperfield', '2000', 'david-copperfield.jpg'),
(3, 'My First Love', '1650', 'My-Frist-Love.jpg'),
(4, 'Osmosis A Play', '2500', 'Osmosis.jpg'),
(5, 'SYBIL', '3200', 'SYBIL.jpg'),
(6, 'The Fall of Darkness', '4000', 'The Fall of Darkness.jpg'),
(7, 'The Hidden Truth', '1200', 'The_hidden_truth.jpg'),
(8, 'The Moonstone', '2300', 'THE-MOONSTONE.jpg'),
(9, 'Vanity Fair', '2700', 'Vanity_Fair.jpg'),
(10, 'Victim Of Evil System', '1800', 'victim-of-evil-system.jpg'),
(11, 'The Mirror', '2350', 'The_mirror.jpg'),
(12, 'The Vendor Of Sweets', '1000', 'The_Vendor_of_Sweets.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Thuvaraki', 'thuvaraki12@gmail.com', 'Thuva1210', 'Admin'),
(2, 'Keerthikan', 'keerthy@gmail.com', 'Keerthy08', 'User'),
(3, 'Saro', 'saro@gmail.com', 'Saro15', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
