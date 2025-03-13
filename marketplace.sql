-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 06 Mar 2025 pada 12.00
-- Versi server: 8.0.37
-- Versi PHP: 8.3.9

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
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `categories_id` varchar(5) NOT NULL,
  `categories` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`categories_id`, `categories`) VALUES
('C001', 'Electronics'),
('C002', 'Books'),
('C003', 'Clothing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `orders_id` varchar(5) NOT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` varchar(5) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `product_price` int DEFAULT NULL,
  `descriptions` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`orders_id`, `user_id`, `product_id`, `order_date`, `product_price`, `descriptions`) VALUES
('3656', 8, 'P001', '2024-01-20', 10000, NULL),
('3886', 9, 'xgL5o', '2024-01-20', 1000000000, NULL),
('5457', 8, 'hFNtn', '2024-01-20', 3, NULL),
('5501', 8, 'P004', '2024-01-20', 0, NULL),
('5963', NULL, 'L7kac', '2024-01-20', 100000000, NULL),
('8517', 8, 'P001', '2024-01-20', 10000, NULL),
('859', 9, 'L7kac', '2024-01-20', 100000000, NULL),
('9615', NULL, 'L7kac', '2024-01-20', 100000000, NULL),
('9774', NULL, 'L7kac', '2024-01-20', 100000000, NULL),
('O001', 1, 'P003', '2024-01-15', 150000, 'Purchase of Fiction Book'),
('O002', 2, 'P001', '2024-01-16', 3000000, 'Purchase of Smartphone'),
('O003', 3, 'P005', '2024-01-17', 100000, 'Purchase of T-shirt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `product_id` varchar(5) NOT NULL,
  `user_id` int DEFAULT NULL,
  `categories_id` varchar(5) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `product_price` int NOT NULL,
  `descriptions` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`product_id`, `user_id`, `categories_id`, `status`, `product_name`, `image`, `product_price`, `descriptions`) VALUES
('hFNtn', 7, 'C002', 'Available', 'asdfsaf', NULL, 3, 'aaasa'),
('L7kac', 8, 'C001', 'Available', 'Hp ROG', NULL, 100000000, 'Hp bekas mining'),
('P001', 1, 'C001', 'Available', 'Smartphone', '', 10000, 'anjay kelas slebew'),
('P003', 2, 'C002', 'Available', 'Fiction Book', '', 0, ''),
('P004', 2, 'C002', 'Available', 'Non-fiction Book', '', 0, ''),
('P005', 3, 'C003', 'Available', 'T-shirt', '', 0, ''),
('xgL5o', 7, 'C001', 'Available', 'ps 900', NULL, 1000000000, 'Spek gahar rata tanah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `transactions_id` varchar(5) NOT NULL,
  `orders_id` varchar(5) DEFAULT NULL,
  `transactions_date` date DEFAULT NULL,
  `payment_method` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`transactions_id`, `orders_id`, `transactions_date`, `payment_method`) VALUES
('T001', 'O001', '2024-01-15', 'Credit Card'),
('T002', 'O002', '2024-01-16', 'Bank Transfer'),
('T003', 'O003', '2024-01-17', 'Cash');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `name`, `address`, `phone_number`, `email`, `password`) VALUES
(1, 'John Doe', '123 Main St', '08123456789', 'johndoe@example.com', 'password123'),
(2, 'Jane Smith', '456 Elm St', '08198765432', 'janesmith@example.com', 'securepassword'),
(3, 'Mike Johnson', '789 Oak St', '08111222333', 'mikej@example.com', 'mypassword'),
(7, 'noby duas', '-aaaa', '12345', 'mthoriqulfadli@gmail.com', '$2y$10$zLkT8MYuxI5Ob9fADT9HoO3/lRWf/cWBF8WZzhjsQjpxfd2beWdXi'),
(8, 'noby dualitas', 'jalan kutilang 4 blok f 18', '12345', 'jirjatg@gmail.com', '$2y$10$oBQc6h0EhgcshxKRd9CDSegrO5dZ/xOSxgw1C2If9c/c5niQNdj0a'),
(9, 'naruto', '-', '081271217782', 'testing@gmail.com', '$2y$10$Fl2OtmyatZ.wzBae8.p9b.U6efGKOrkWDGfNY/yXuP89Vk.4AU.Mq');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactions_id`),
  ADD KEY `orders_id` (`orders_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`categories_id`);

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`orders_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
