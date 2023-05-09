-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2023 at 12:46 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `type`) VALUES
(1, 'fertilisers'),
(2, 'inserticides'),
(3, 'seeds'),
(4, 'tools');

-- --------------------------------------------------------

--
-- Table structure for table `products_description`
--

CREATE TABLE `products_description` (
  `id` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price_per_quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_description`
--

INSERT INTO `products_description` (`id`, `product_name`, `description`, `price_per_quantity`) VALUES
(1, 'fertilisers', 'NPK mmea fertiliser packed in 50 kg bag', 6000),
(2, 'seeds', 'Hybrid 6213 from kenya seed company', 400),
(3, 'seeds', 'Hybrid Dh04', 350),
(4, 'fertilisers', 'DAP from Osho company\r\npacked in 90 kg ', 5500),
(5, 'inserticides', 'Jackpot inserticides sold in 1litre per sale ', 550),
(6, 'inserticides', 'Duduthrin sold in half a litre ', 400);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(10) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `totalprice` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `type`, `name`, `quantity`, `price`, `totalprice`, `user_id`, `status`) VALUES
(2, 'seeds', 'Hybrid Dh04', 4, 6000, 24000, 2, 1),
(3, 'inserticides', 'Jackpot inserticides sold in 1litre per sale ', 7, 6000, 42000, 2, 1),
(4, 'seeds', 'Hybrid Dh04', 8, 6000, 48000, 2, 1),
(5, 'inserticides', 'Jackpot inserticides sold in 1litre per sale ', 7, 6000, 42000, 2, 2),
(6, 'fertilisers', 'NPK mmea fertiliser packed in 50 kg bag', 45, 6000, 270000, 2, 1),
(7, 'inserticides', 'Jackpot inserticides sold in 1litre per sale ', 7, 6000, 42000, 2, 2),
(8, 'fertilisers', 'NPK mmea fertiliser packed in 50 kg bag', 5, 6000, 30000, 2, 0),
(9, 'inserticides', 'Duduthrin sold in half a litre ', 6, 400, 2400, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `quantity` int(20) NOT NULL,
  `price` int(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `total` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `type`, `quantity`, `price`, `description`, `total`, `user_id`, `status`) VALUES
(1, 'Maize', 56, 6000, 'Dh04 hybrid from kenya seed', 0, 2, 1),
(3, 'beans', 7, 6000, 'sdfghj', 0, 2, 2),
(5, 'beans', 8, 9000, 'the Hybrid 6213', 0, 2, 0),
(6, 'maize', 8, 5000, 'dfghj', 0, 2, 0),
(7, 'maize', 8, 5000, 'hybri dh04', 40000, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales_description`
--

CREATE TABLE `sales_description` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_description`
--

INSERT INTO `sales_description` (`id`, `name`, `price`) VALUES
(1, 'maize', 5000),
(2, 'beans', 9000),
(3, 'Groundnuts', 10000),
(4, 'frencbeans', 6000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(10) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `location`, `profile_image`, `password`) VALUES
(1, 'Logan Armstrong', 'bacuzagud@mailinator.com', NULL, NULL, '', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
(2, 'Abraham Kibet', 'abukbt13@gmail.com', 742909149, 'Chebara', '247419008254705767297_status_e7078e4f7a95403b80a6c63b7c6f2e32.jpg', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'Nita Juarez', 'tuhedad@mailinator.com', 742909149, 'Chebara', '700489302Screenshot from 2023-04-05 20-26-01.png', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
(4, 'Aaron', 'aron@gmail.com', 728548760, 'Eldoret', '1506175967254710500095_status_f15b7ea27e6a40708cf1957cd4cf6ae9.jpg', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'Naomi Savage', 'rytuzub@mailinator.com', NULL, NULL, NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_description`
--
ALTER TABLE `products_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_description`
--
ALTER TABLE `sales_description`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products_description`
--
ALTER TABLE `products_description`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales_description`
--
ALTER TABLE `sales_description`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
