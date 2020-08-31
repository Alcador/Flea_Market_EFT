-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2020 at 07:22 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flea_market`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `image_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `Name`, `image_url`) VALUES
(1, 'Nuts', 'https://i.imgur.com/sLrhRuP.png'),
(2, 'Bolts', 'https://i.imgur.com/m6slYGz.png'),
(3, 'Vaseline', 'https://i.imgur.com/OQomKYV.png'),
(4, 'Goldenstar', 'https://i.imgur.com/D0aTV6t.png'),
(5, 'LEDX', 'https://i.imgur.com/cuiFAmO.png'),
(6, 'Red_Keycard', 'https://i.imgur.com/Lc9Q9YE.png'),
(7, 'Vaseline2', 'https://i.imgur.com/OQomKYV.png');

-- --------------------------------------------------------

--
-- Table structure for table `items_sale`
--

CREATE TABLE `items_sale` (
  `id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items_sale`
--

INSERT INTO `items_sale` (`id`, `UserID`, `ItemID`, `Amount`, `Price`) VALUES
(8, 9, 5, 2, 600),
(10, 2, 6, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rubel` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `rubel`) VALUES
(1, 'username', 'password', 2),
(2, 'Bob', 'Ross', 7247000),
(9, 'Boris', '123', 5007),
(11, 'Anita', 'Kovacev', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `user_inventory`
--

CREATE TABLE `user_inventory` (
  `userID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_inventory`
--

INSERT INTO `user_inventory` (`userID`, `itemID`, `amount`) VALUES
(1, 1, 1),
(2, 1, 5),
(2, 2, 4),
(2, 3, 8),
(2, 4, 2),
(2, 5, 508),
(2, 6, 3),
(2, 7, 1),
(9, 1, 3),
(9, 2, 2),
(9, 3, 3),
(9, 4, 3),
(9, 5, 1),
(9, 6, 3),
(9, 7, 2),
(11, 1, 5),
(11, 2, 2),
(11, 3, 1),
(11, 4, 1),
(11, 6, 3),
(11, 7, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_sale`
--
ALTER TABLE `items_sale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Users_ItemSale` (`UserID`),
  ADD KEY `FK_Items_ItemSale` (`ItemID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_inventory`
--
ALTER TABLE `user_inventory`
  ADD PRIMARY KEY (`userID`,`itemID`),
  ADD KEY `FK_Items_UserInventory` (`itemID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `items_sale`
--
ALTER TABLE `items_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items_sale`
--
ALTER TABLE `items_sale`
  ADD CONSTRAINT `FK_Items_ItemSale` FOREIGN KEY (`ItemID`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `FK_Users_ItemSale` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_inventory`
--
ALTER TABLE `user_inventory`
  ADD CONSTRAINT `FK_Items_UserInventory` FOREIGN KEY (`itemID`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `FK_User_UserInventory` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
