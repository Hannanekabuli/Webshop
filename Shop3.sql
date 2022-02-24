-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Creato il: Feb 24, 2022 alle 10:20
-- Versione del server: 5.7.34
-- Versione PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Shop3`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `unique_code` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `cards`
--

INSERT INTO `cards` (`id`, `customer_id`, `unique_code`, `product_id`, `price`, `quantity`, `created_at`) VALUES
(1, 1, 1900, 1, 1699, 1, '2022-02-09 19:34:58'),
(2, 1, 1900, 2, 3700, 1, '2022-02-09 19:35:00'),
(3, 1, 1900, 3, 399, 1, '2022-02-09 19:35:02');

-- --------------------------------------------------------

--
-- Struttura della tabella `categories`
--

CREATE TABLE `categories` (
  `ID` int(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `categories`
--

INSERT INTO `categories` (`ID`, `name`) VALUES
(1, 'Action Camera'),
(2, 'Analog Camera'),
(3, 'Compact Camera'),
(4, 'System Camera');

-- --------------------------------------------------------

--
-- Struttura della tabella `categorydetails`
--

CREATE TABLE `categorydetails` (
  `productID` int(10) NOT NULL,
  `categoryID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `categorydetails`
--

INSERT INTO `categorydetails` (`productID`, `categoryID`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 3),
(6, 3),
(7, 4),
(8, 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `customers`
--

CREATE TABLE `customers` (
  `ID` int(20) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `customers`
--

INSERT INTO `customers` (`ID`, `fName`, `lName`, `email`, `phone`, `password`) VALUES
(1, 'Anders', 'Larsson', 'AL@gmail.com', '12345 ', 'vegsdga');

-- --------------------------------------------------------

--
-- Struttura della tabella `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderID` int(10) NOT NULL,
  `country` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `full_address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `orderdetails`
--

INSERT INTO `orderdetails` (`orderID`, `country`, `city`, `full_address`, `created_at`) VALUES
(1, 'germany', 'berlin', 'pelak 1', '2022-02-09 19:22:23');

-- --------------------------------------------------------

--
-- Struttura della tabella `products`
--

CREATE TABLE `products` (
  `ID` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `quantity` int(3) NOT NULL,
  `price` decimal(6,0) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `products`
--

INSERT INTO `products` (`ID`, `name`, `quantity`, `price`, `description`) VALUES
(1, 'Kitvision Venture 4K', 10, '1699', 'Kitvision Venture 4K Action Camera with Wi-Fi and 2\" LCD, Black.'),
(2, 'GoPro Hero', 10, '3700', 'GoPro HERO9 Black Waterproof Action Camera with Front LCD and Touch Rear Screens, 5K Ultra HD Video'),
(3, 'ZOOM', 10, '399', 'Analog CCTV Camera HD 1080P 4-in-1 (TVI/AHD/CVI/CVBS) Security Dome Camera,(White).'),
(4, 'Zosi', 10, '259', 'ZOSI 2.0MP HD 1080p View Angle Weatherproof Surveillance CCTV Bullet Camera.'),
(5, 'Canon G7', 10, '4999', 'Canon PowerShot Digital Camera with Wi-Fi & NFC, LCD Screen, and 1-Inch Sensor - Black.'),
(6, 'NEZINI', 10, '539', 'Digital Camera, 16X Zoom Compact Pocket Camera Point and Shoot Camera for Kids Beginners (Blue). '),
(7, 'Sony a7 III', 10, '21980', 'Full-frame Mirrorless Interchangeable-Lens Camera with 28-70mm Lens with 3-Inch LCD, Black \r\n'),
(8, 'Sony RX10 IV', 10, '16980', 'Sony Cyber‑Shot RX10 IV with 0.03 Second Auto-Focus & 25x Optical Zoom');

-- --------------------------------------------------------

--
-- Struttura della tabella `shippers`
--

CREATE TABLE `shippers` (
  `ID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `info` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `shippers`
--

INSERT INTO `shippers` (`ID`, `name`, `info`, `date`) VALUES
(1, 'Post Nord', 'Delivery within 3 days', '2021-10-10'),
(2, 'Express', 'Delivery within 5 days', '2021-10-10'),
(3, 'DHL', 'International delevry ', '2021-10-10');

-- --------------------------------------------------------

--
-- Struttura della tabella `subscription`
--

CREATE TABLE `subscription` (
  `ID` int(11) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `subscription`
--

INSERT INTO `subscription` (`ID`, `fName`, `lName`, `email`) VALUES
(49, 'Mikela', 'Gustavsson', 'Mikela@medieinstitutet.se');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unique_code` (`unique_code`);

--
-- Indici per le tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `categorydetails`
--
ALTER TABLE `categorydetails`
  ADD PRIMARY KEY (`productID`,`categoryID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `productID` (`productID`);

--
-- Indici per le tabelle `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indici per le tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `shippers`
--
ALTER TABLE `shippers`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `orderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `categorydetails`
--
ALTER TABLE `categorydetails`
  ADD CONSTRAINT `categorydetails_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
