-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 08:30 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `last_name` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`) VALUES
(1, 'donya', 'bavan', 'bavan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-16 17:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `unique_code` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `name`) VALUES
(1, 'Action Camera'),
(2, 'Analog Camera'),
(3, 'Compact Camera'),
(4, 'System Camera');

-- --------------------------------------------------------

--
-- Table structure for table `categorydetails`
--

CREATE TABLE `categorydetails` (
  `productID` int(10) NOT NULL,
  `categoryID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorydetails`
--

INSERT INTO `categorydetails` (`productID`, `categoryID`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 2),
(4, 2),
(5, 3),
(6, 3),
(7, 4),
(8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `last_name` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `terms` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `password`, `terms`, `created_at`) VALUES
(1, 'sanaz', 'shahed', 'shahed@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2022-02-23 18:52:31'),
(3, 'Ali', 'Hassani', 'hasani@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2022-02-27 22:05:09'),
(4, 'saddsa', 'sadsdasda', 'asdsda@gmil.com', 'd41d8cd98f00b204e9800998ecf8427e', 0, '2022-03-02 18:34:32'),
(5, 'Asghar', 'Mohseni', 'mohseni@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2022-02-28 17:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `country` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `full_address` varchar(255) NOT NULL,
  `shipperID` int(10) NOT NULL,
  `customerID` int(10) DEFAULT NULL,
  `total` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `email`, `mobile`, `country`, `city`, `full_address`, `shipperID`, `customerID`, `total`, `status`, `created_at`) VALUES
(93, 'qdwwdq', 'wqdwqdwdq', 'dsasdads@gmail.com', '09163004020', 'US', 'semnan', 'semnan p 1', 3, 0, 259, 0, '2022-03-02 17:14:09'),
(94, 'efwfew', 'ewfewf', 'mrhaghgooyan@gmail.com', 'mrhaghgooyan@gm', 'US', 'semnan', 'semnan p 1', 3, 0, 259, 0, '2022-03-02 17:14:54'),
(95, '', '', '', '', '', '', '', 3, 0, -75369, 0, '2022-03-02 19:20:15'),
(96, '', '', '', '', '', '', '', 3, 0, 259, 0, '2022-03-02 19:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `price`, `quantity`, `created_at`) VALUES
(25, 93, 4, 259, 1, '2022-03-02 17:14:09'),
(26, 94, 6, 259, 1, '2022-03-02 18:47:00'),
(27, 95, 4, 1813, 8, '2022-03-02 19:20:15'),
(28, 96, 4, 259, 1, '2022-03-02 19:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `quantity` int(3) NOT NULL,
  `price` decimal(6,0) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `name`, `quantity`, `price`, `description`, `image`) VALUES
(1, 'Kitvision Venture 4K', 0, '1699', 'Kitvision Venture 4K Action Camera with Wi-Fi and 2\" LCD, Black.', 'Kitvision_Venture_4K.jpg'),
(2, 'GoPro Hero', 0, '3700', 'GoPro HERO9 Black Waterproof Action Camera with Front LCD and Touch Rear Screens, 5K Ultra HD Video', 'Go_Pro_Hero.jpg'),
(3, 'ZOOM', 0, '399', 'Analog CCTV Camera HD 1080P 4-in-1 (TVI/AHD/CVI/CVBS) Security Dome Camera,(White).', 'ZOOM.jpg'),
(4, 'Zosi', 90, '259', 'ZOSI 2.0MP HD 1080p View Angle Weatherproof Surveillance CCTV Bullet Camera.', 'Zosi.jpg'),
(5, 'Canon G7', 105, '4999', 'Canon PowerShot Digital Camera with Wi-Fi & NFC, LCD Screen, and 1-Inch Sensor - Black.', 'Canon_G7.jpg'),
(6, 'NEZINI', 103, '539', 'Digital Camera, 16X Zoom Compact Pocket Camera Point and Shoot Camera for Kids Beginners (Blue). ', 'NEZINI.jpg'),
(7, 'Sony a7 III', 1052, '21980', 'Full-frame Mirrorless Interchangeable-Lens Camera with 28-70mm Lens with 3-Inch LCD, Black \r\n', 'Sony_a7_III.jpg'),
(8, 'Sony RX10 IV', 105, '16980', 'Sony Cyber‑Shot RX10 IV with 0.03 Second Auto-Focus & 25x Optical Zoom', 'Sony_RX10_IV.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shippers`
--

CREATE TABLE `shippers` (
  `ID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `info` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shippers`
--

INSERT INTO `shippers` (`ID`, `name`, `info`, `date`) VALUES
(1, 'Post Nord', 'Delivery within 3 days', '2021-10-10'),
(2, 'Express', 'Delivery within 5 days', '2021-10-10'),
(3, 'DHL', 'International delevry ', '2021-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `ID` int(11) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`ID`, `fName`, `lName`, `email`) VALUES
(1, 'wdqwqd', 'dqwdwq', 'Mahtatootfarangi@gmail.com'),
(2, 'Mikela', 'Gustavsson', 'Mikela@medieinstitutet.se'),
(3, 'Ali Rezaei', 'asadi', 'admin@khabaronline.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `categorydetails`
--
ALTER TABLE `categorydetails`
  ADD PRIMARY KEY (`productID`,`categoryID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipperID` (`shipperID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `shippers`
--
ALTER TABLE `shippers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categorydetails`
--
ALTER TABLE `categorydetails`
  ADD CONSTRAINT `categorydetails_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
