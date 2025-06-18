-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 21, 2025 at 12:30 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin', '$2y$10$BR8s.myVEocYcIfastJX0eTPHJ/7ZMcmuyfJ8bPFP9eTLQGYnytmm');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` varchar(5) NOT NULL,
  `categories` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories`) VALUES
('C001', 'Electronics'),
('C002', 'Books'),
('C003', 'Clothes');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `buyer_id` int DEFAULT NULL,
  `product_id` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `product_price` int DEFAULT NULL,
  `order_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `buyer_id`, `product_id`, `product_price`, `order_date`) VALUES
('ORD2025052112120635', 20, 'omJa9', 50000000, '2025-05-21 19:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(5) NOT NULL,
  `seller_id` int DEFAULT NULL,
  `categories_id` varchar(5) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `product_price` int NOT NULL,
  `description` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `seller_id`, `categories_id`, `status`, `product_name`, `image`, `product_price`, `description`) VALUES
('KRm2h', 18, 'C002', 'Available', 'Premium Account', '682d9ca99f968.png', 1200000, 'Get Super account for lucky people \r\nAdd some special authority\r\n- Discount every week\r\n- Special Notifications\r\n- Etc'),
('omJa9', 17, 'C001', 'Delivered', 'RTX 4090', '6825e6fdb67dd.jpg', 50000000, 'VGA NEW\r\nLIBAS CYBERPUNK 2077 RATA KANAN'),
('wzdX4', 17, 'C003', 'Available', 'Barang 2', '6820955d4fdbe.png', 10222, 'Deskripsi barang 2'),
('zhfol', 18, 'C001', 'Available', 'IDX 1945', '682627f8c7923.jpg', 30000000, 'Deskripsi Produk 17');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transactions_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `orders_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `payment_method` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `transactions_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transactions_id`, `orders_id`, `payment_method`, `status`, `transactions_date`) VALUES
('d2d37807-ace0-4d30-8e11-669d86ce6b78', 'ORD2025052112120635', 'COD', 'Success', '2025-05-21 19:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `address`, `phone_number`, `email`, `password`) VALUES
(16, 'noby dualitas', '-', '123', 'mthoriqulfadli@gmail.com', '$2y$10$ZCa3la8es7hUJ0WejyLa6e7n7xjrhHlfe7VgMKRIrg1RpttigmxnO'),
(17, 'riski ujung lorong', 'JLN rajabali tanjung pinang, Blok besar F/21', '081271218801', 'tester1@gmail.com', '$2y$10$V2LIW.Cq9yd1GviTqkTzPuOSLplSs0PUV6p.y6t6amDdDFEhBl4Ni'),
(18, 'Dani arisetiawan', 'Opi Jakabaring, JLN Cendrawasih V Blok A/18', '081271217782', 'tester2@gmail.com', '$2y$10$tohey.wp1C4ym3jbvOopxuXU5CQiqh/nF0PtqbYv8ZY4.W/y/AwPe'),
(19, 'jefri', '-JLN cendrawasih 15 Blok F/21', '081271218801', 'tester3@gmail.com', '$2y$10$PQfjjME2cToCfPWvnnFCDeWz5HkUp6wmDFZu0Y47cLzcXg6PCVJti'),
(20, 'jefri', 'JLN Kutilang IV Blok F/33', '081271218801', 'tester4@gmail.com', '$2y$10$WrBHUovM1GffpC4SWqCXfu4HE0CF/nRuMrnAek2yLEGW89OlC9xj2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `orders_ibfk_2` (`product_id`),
  ADD KEY `orders_ibfk_1` (`buyer_id`) USING BTREE;

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `categories_id` (`categories_id`),
  ADD KEY `products_ibfk_1` (`seller_id`) USING BTREE;

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactions_id`),
  ADD KEY `transactions_ibfk_1` (`orders_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`categories_id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`orders_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
