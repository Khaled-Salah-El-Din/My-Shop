-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2025 at 09:36 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'HP'),
(4, 'Asus'),
(5, 'Acer'),
(6, 'Lenovo'),
(7, 'Kia'),
(8, 'Fujitsu'),
(9, 'Dell'),
(10, 'Zara'),
(11, 'Adidas'),
(12, 'Nike'),
(13, 'LG'),
(14, 'Sharp'),
(15, 'Gillette'),
(16, 'Hisense');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `pro_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pro_id`, `quantity`) VALUES
(1, 5, 3, 2),
(2, 5, 2, 1),
(9, 7, 13, 1),
(25, 6, 3, 7),
(29, 0, 3, 9),
(30, 0, 15, 2),
(31, 6, 17, 17),
(32, 6, 18, 1),
(33, 6, 13, 1),
(34, 1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent`) VALUES
(1, 'Phones', 11),
(2, 'Laptops', 11),
(3, 'Desktops', 11),
(4, 'T-shirts', 12),
(5, 'Shoes', 12),
(6, 'TVs', 11),
(7, 'Cars', 13),
(8, 'Disposable Razors\r\n', 14),
(9, 'Printers', 11),
(10, 'Countertop Blenders\r\n', 11),
(11, 'Electronics', 0),
(12, 'Fashion & Acc', 0),
(13, 'Vehicles', 0),
(14, 'Health & Beauty\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contactmsgs`
--

CREATE TABLE `contactmsgs` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `msg` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contactmsgs`
--

INSERT INTO `contactmsgs` (`id`, `name`, `email`, `phone`, `msg`, `status`) VALUES
(6, 'John Smith', 'johnsmith@gmail.com', 123456789, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1),
(11, 'Mike Johnson', 'mike123@gmail.com', 345355555, 'I\'d like to offer feedback on the buying experience on My Shop', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(5, 'John', 'Smith', 'johnsmith@gmail.com', '234'),
(6, 'First', 'Last', 'FirstLast@gmail.com', '123'),
(7, 'Fourth', 'Example', 'fourthexample@gmail.com', '5567');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`) VALUES
(1, 'male'),
(2, 'female');

-- --------------------------------------------------------

--
-- Table structure for table `pr`
--

CREATE TABLE `pr` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pr`
--

INSERT INTO `pr` (`id`, `name`) VALUES
(1, 'owner'),
(2, 'admin'),
(3, 'supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cat` int(11) NOT NULL,
  `brand` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `description` text NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `cat`, `brand`, `count`, `description`, `views`) VALUES
(2, 'HP EliteBook 840 G8', 25000, '2.jpg', 2, 3, 12, 'Features a sleek and durable chassis crafted from aluminum, meeting MIL-STD 810H standards for ruggedness. Its slim profile and lightweight design make it perfect for professionals who need portability without compromising durability. The 14-inch Full HD display offers crisp visuals with narrow bezels, enhancing the viewing experience.', 0),
(3, 'size 20 tshirt', 50, '3.jpg', 4, 11, 3, 'Wrinkle Free: Developed for less wrinkles and easy care\n', 0),
(13, '43 Inch Frameless LED FHD Smart With Built-In Receiver Google TV - 2T-C43FG6EX', 13000, '1755545204120031sharptv.jpg', 6, 14, 22, 'SHARP Smart Frameless LED TV Screen Size : 43 Inch Resolution : 1366 x 768 ( HD ) Aspect Ratio : 16:09 Viewing Angle : 178° Picture Technology : Contrast Booster Total Internal Memory : 8 GB Broadcasting ', 0),
(14, 'adidas Unisex\'s Shift Run Sneaker', 2000, '175554665725894adidas.jpg', 5, 11, 55, 'A huge range of lifestyle clothing inspired by sport but designed for the street, adidas has extensive activewear and sport-specific collections.\n\n', 0),
(15, 'Gillette Blue 3 Sensitive Men\'s Disposable Razors 9+3 Razors – Pack of 12 – Packaging May Vary', 319, '175554695450716giletterazor.jpg', 8, 15, 16, 'Enhanced Lubricating strip for a comfortable shave, suitable for sensitive skin.\n', 0),
(16, 'HP OfficeJet Pro 9013 All-in-One Printer 1KR49B', 7777, '1755547111115495hpprinter.jpg', 9, 3, 3, 'A revolutionary smart printer that works the way you need it. Help save time with Smart Tasks shortcuts, Get automatic two-sided printing and scanning, seamless connections, and HP\'s security. Print and scan from your phone.', 0),
(17, 'Hisense 75 inches 4k UHD Smart TV 75A62NS. Black', 40000, '1755547479130537Hisensetv.jpg', 6, 16, 5, '4K UHD resolution for stunning visuals', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `pr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `gender`, `pr`) VALUES
(1, 'Ahmad ', '123', 'ahmad@gmail.com', 1, 1),
(2, 'Aya', '246', 'aya@gmail.com', 2, 2),
(3, 'Islam', '123456', 'islam@gmail.com', 1, 3),
(4, 'Faris', '777', 'Faris@gmail.com', 1, 3),
(9, 'Ahmad\'s2nd', '7676', 'ahmads2nd@gmail.com', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactmsgs`
--
ALTER TABLE `contactmsgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pr`
--
ALTER TABLE `pr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand` (`brand`),
  ADD KEY `category` (`cat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gender` (`gender`),
  ADD KEY `pr` (`pr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contactmsgs`
--
ALTER TABLE `contactmsgs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pr`
--
ALTER TABLE `pr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`cat`) REFERENCES `category` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`gender`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`pr`) REFERENCES `pr` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
