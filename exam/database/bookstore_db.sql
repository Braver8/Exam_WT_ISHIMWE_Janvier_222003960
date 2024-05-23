-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 09:52 AM
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
-- Database: `bookstore_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `AdminID` int(11) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `Password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`AdminID`, `Username`, `email`, `Password`) VALUES
(1, 'Braver', 'braver@gmail.com', '$2y$10$IpzhJvlSfF.27r/lAfWLX.1bxOadApPzb/LXMoaNXcHDrIavWbkce'),
(2, 'rukundo', 'rukundo@gmail.com', '$2y$10$we.Ey8JreNuSU0c2ZKUXgeNc1RJnBWgGS3rxsjfJ253LWk7Wc.8Ly'),
(6, 'eee', 'eee@gamil.com', '$2y$10$dqLAzdyOwYzUG8F//r0YfO0UO9cJqM6Am5ezHGoxflPxRelrxiu7O'),
(7, 'aaa', 'aaa@gamil.com', '$2y$10$jOvm7/4frKix6UFw1hGnpudV79Vj4YvHpZxcD4daZPf3Whb7fNnMK');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `biography` text DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `first_name`, `last_name`, `biography`, `website`) VALUES
(1, 'janvier', 'braver', 'gggg', 'hhhh'),
(2, 'janvier', 'braver', 'gggg', 'hhhh'),
(3, 'ishime', 'braver', 'Gegghytredsdfghyu4567876543w', 'bookstore.com'),
(4, 'umwana', 'ishimwe', 'reka tugerageze turebe ibi bintu ko bikunda', 'bookstore.com'),
(5, 'umwana', 'ishimwe', 'reka tugerageze turebe ibi bintu ko bikunda', 'bookstore.com'),
(6, 'umwana', 'ishimwe', 'reka tugerageze turebe ibi bintu ko bikunda', 'bookstore.com'),
(7, 'umwana', 'ishimwe', 'reka tugerageze turebe ibi bintu ko bikunda', 'bookstore.com'),
(8, 'umwana', 'ishimwe', 'reka tugerageze turebe ibi bintu ko bikunda', 'bookstore.com'),
(9, 'umwana', 'ishimwe', 'reka tugerageze turebe ibi bintu ko bikunda', 'bookstore.com'),
(10, 'umwana', 'ishimwe', 'reka tugerageze turebe ibi bintu ko bikunda', 'bookstore.com'),
(11, 'uu', 'ishimwe', 'reka tugerageze turebe ibi bintu ko bikunda', 'bookstore.com'),
(12, 'uu', 'ishimwe', 'reka tugerageze turebe ibi bintu ko bikunda', 'bookstore.com'),
(13, 'uu', 'ishimwe', 'reka tugerageze turebe ibi bintu ko bikunda', 'bookstore.com'),
(14, 'uu', 'ishimwe', 'reka tugerageze turebe ibi bintu ko bikunda', 'bookstore.com'),
(15, 'bbbb', 'jhg', 'jh', 'nb'),
(16, 'bbbb', 'jhg', 'jh', 'nb'),
(18, 'ssssss', 'aaaaaa', 'mmmmmmm', 'bookstore'),
(19, 'ssssss', 'aaaaaa', 'mmmmmmm', 'bookstore'),
(20, 'ssssss', 'aaaaaa', 'mmmmmmm', 'bookstore'),
(21, 'ssssss', 'aaaaaa', 'mmmmmmm', 'bookstore'),
(22, 'jhgfdvfgff', 'ff', 'hgfd', 'gfd'),
(23, 'jhgfdvfgff', 'ff', 'rererere', 'gfd');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `publication_year` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_size` int(11) DEFAULT NULL,
  `file_type` varchar(50) DEFAULT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `author`, `genre`, `description`, `publication_year`, `price`, `file_name`, `file_size`, `file_type`, `upload_date`) VALUES
(2, 'ddd', 'dfgh', 'calassic', 'jhgfdsdfghj', 1999, 7654.00, 'Catgikondo.docx', 16045, 'application/vnd.openxmlformats-officedocument.word', '2024-05-18 18:08:49'),
(3, 'ddd', 'dfgh', 'calassic', 'fghjhgfghj', 1999, 7654.00, 'WhatsApp Image 2024-05-16 at 10.19.50 (1).jpeg', 45867, 'image/jpeg', '2024-05-21 14:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `city`, `state`, `postal_code`, `country`) VALUES
(1, 'John', 'Doe', 'john@example.com', '123456789', '123 Main St', 'Anytown', 'AnyState', '12345', 'AnyCountry'),
(2, 'Jane', 'Smith', 'jane@example.com', '987654321', '456 Elm St', 'Othercity', 'OtherState', '54321', 'OtherCountry');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `city`, `state`, `country`) VALUES
(1, 'janvier', 'braver', 'braver@gmail.com', '0733320377', '123eggh', 'kigali', 'huye', 'Rwanda'),
(2, 'alice', 'kaka', 'kazungu@gmail.com', '0733320377', 'huye', 'kigali', 'butare', 'Rwanda');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `liker_id` int(11) DEFAULT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `rating` tinyint(4) DEFAULT NULL,
  `review_text` text DEFAULT NULL,
  `review_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `first_name`, `last_name`, `registration_date`) VALUES
(1, 'john_doe', 'john@example.com', 'password123', 'John', 'Doe', '2024-04-27 15:17:59'),
(2, 'Umuseso', 'braver@gmail.com', '$2y$10$B0fPqO6XsvES9vyNTfju9.KPAaUoFqAQsgJhg5DDGjBxv.R1q2gIy', 'janvier', 'braver', '2024-05-07 15:12:54'),
(4, 'ishimwe', 'ishimwe@gmail.com', '$2y$10$s.jIrTrhd/dQp1FFwo/mdek0ZMFAW0Kc3qrE3hFn02FFpdHIB2usq', 'jj', 'aa', '2024-05-07 15:16:10'),
(5, 'janvier', 'janvier@gmail.com', '$2y$10$HTcjE/tlEKWqlqfBbA7J3uG2eoK0oXCqDMY2pQUZ6LL/YMKQAzD6S', 'janvier', 'braver', '2024-05-07 15:21:24'),
(6, 'gatoya', 'gatoya@gmail', '$2y$10$jyFcioZlaVCnHtEdzDeNIuAYF1XO6gF5uKPKiWuWptqQaxMDAjBhu', 'gg', 'aa', '2024-05-07 15:36:09'),
(7, 'umukozi', 'umukozi@gmail.com', '$2y$10$QHiUFVw3MgF887k1Ci8/aODrR5FmYJHi2YnzSknL6avlTA1Gp5fmq', 'umu', 'kozi', '2024-05-07 15:42:46'),
(8, 'umwana', '', '$2y$10$GxoxkQPwS91zQfPMQ3g7SeMKf8VWuau0AO4XUHiXttIHfdjdyDzty', NULL, NULL, '2024-05-08 11:25:47'),
(11, '', 'umu@gmail.com', '$2y$10$a0oGKWZDEMSuZ4JLqLeoTuQsxD71iaTvoZWeyyGTkxDVKCy8bFf0C', NULL, NULL, '2024-05-09 14:09:46'),
(18, 'peter1', 'peter@gmail.com', '$2y$10$aQvjVTMQmXjsBix5HgkllOwoD35maCcmbEHCGoZsKKzPxmMSTI/um', NULL, NULL, '2024-05-09 14:22:19'),
(19, 'rugira', 'rugira@gmail.com', '$2y$10$gjZ8V32zUGgiE.tWKaftA.uPyta13muxc8Bv.stc5pF.yYdsYHTY2', NULL, NULL, '2024-05-09 14:23:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`AdminID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `unique_file_name` (`file_name`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`),
  ADD UNIQUE KEY `unique_like` (`liker_id`,`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`liker_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
