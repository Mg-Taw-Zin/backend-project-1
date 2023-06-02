-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 08:57 AM
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
-- Database: `clone`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'SportsWear'),
(2, 'Mens'),
(3, 'Womens'),
(4, 'Kids'),
(5, 'Fashion'),
(6, 'HouseHolds'),
(7, 'Interiors'),
(8, 'Clothings'),
(9, 'Bags'),
(10, 'Shoes'),
(11, 'Medecine'),
(12, 'Computers'),
(13, 'Phones'),
(24, 'Bicycle'),
(25, 'Cars'),
(26, 'Home Decoration'),
(27, 'testing products'),
(28, 'Custom Testing'),
(29, 'hello testing'),
(30, 'Game Products'),
(31, 'PremierLeague'),
(32, '12pmClass'),
(33, 'cartoon');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `feature` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `product_stock` int(11) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `name`, `slug`, `image`, `price`, `model`, `color`, `feature`, `description`, `product_stock`, `weight`, `created_date`, `updated_date`) VALUES
(1, 1, 1, 'Nike-one', 'nike_one', 'nike1.png', '200', '2022', 'black', 1, 'new model', 50, '5gm', '2022-01-24 19:05:05', '2022-01-24 19:05:05'),
(2, 1, 1, 'nike-two', 'nike_two', 'nike2.png', '200', '2022', 'grey', 1, 'new model and edition', 10, '1.5gm', '2022-01-24 19:05:05', '2022-01-24 19:05:05'),
(3, 25, 0, 'Toyota-202', 'toyota_202', '1643097536photo10.jpg', '200000', '2022', 'white', 1, 'brand new', 1000, '20000lb', '2022-01-25 14:28:56', '2022-01-25 14:28:56'),
(4, 1, 0, 'apolo 2022', 'apolo_22', '1643285842nike3.png', '200000', '2022', 'white', 1, 'brand new', 122, '12gm', '2022-01-27 18:47:22', '2022-01-27 18:47:22'),
(5, 29, 0, 'hello hello', 'helohello', '1656565835computer-767781__340.webp', '200', '2022', 'black', 1, 'testing', 20, '200', '2022-06-30 11:40:35', '2022-06-30 11:40:35'),
(6, 30, 0, 'Gaming CD', 'game cd', '1656658895office-820390__340.webp', '300', '2022', 'white', 1, 'new condition', 30, '200', '2022-07-01 13:31:35', '2022-07-01 13:31:35'),
(7, 31, 0, 'Son', 'Son houng min', '1658370991aa.jpg', '200', '2022', 'black', 1, 'testing', 1, '200', '2022-07-21 09:06:31', '2022-07-21 09:06:31'),
(8, 32, 0, 'Luke Stark', 'Nisi quas voluptate ', '1659227134laptop-2838921__340.webp', '148', 'Velit dolor dolores ', 'Consectetur alias c', 32, 'Velit ullamco qui s', 46, 'Qui alias similique ', '2022-07-31 06:55:34', '2022-07-31 06:55:34'),
(9, 27, 0, 'Rhonda Carter', 'Molestias ipsa adip', '1659227178office-925806__340.webp', '621', 'Laboris id eiusmod q', 'Necessitatibus aliqu', 1, 'Ipsum laborum Null', 73, 'Eu numquam quisquam ', '2022-07-31 06:56:18', '2022-07-31 06:56:18'),
(10, 33, 0, 'Cathleen Pearson', 'Tenetur rem et rerum', '1661631267student-849824__340.webp', '426', 'Cumque qui dolor sin', 'Facere eos consequun', 1, 'Eos delectus occaec', 87, 'Ut ipsum dolorum ci', '2022-08-28 02:44:27', '2022-08-28 02:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`) VALUES
(1, 1, 'nike'),
(2, 1, 'UNDER ARMOUR'),
(3, 1, 'Adidas'),
(4, 1, 'Puma'),
(5, 1, 'Asics'),
(6, 1, 'Sckecher'),
(7, 1, 'Erke'),
(8, 1, 'Timbarland'),
(9, 1, 'Zara'),
(10, 1, 'Ipanema'),
(11, 25, 'Toyota'),
(12, 2, 'Shoe'),
(13, 27, 'tesing one products'),
(14, 2, 'men shirts'),
(15, 28, 'tesing one'),
(16, 29, 'helo1'),
(17, 30, 'Ps4'),
(18, 30, 'Ps5'),
(19, 31, 'Spur club'),
(20, 32, 'class One'),
(21, 32, 'class 2'),
(22, 33, 'cartton1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `create_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `phone`, `address`, `create_date`, `updated_date`) VALUES
(27, 'Hector Poole', 'sode@mailinator.com', '202cb962ac59075b964b07152d234b70', '55', 'Itaque in delectus ', '2022-09-07 14:36:08', '2022-09-07 14:36:08'),
(28, 'Nola Ashley', 'paforido@mailinator.com', '202cb962ac59075b964b07152d234b70', '88', 'Aut ducimus suscipi', '2022-09-07 14:36:26', '2022-09-07 14:36:26'),
(29, 'Ila Franklin', 'gajufojafo@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '93', 'Neque officia eos li', '2022-09-07 14:36:34', '2022-09-07 14:36:34'),
(30, 'Logan Benjamin', 'larymodyv@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '37', 'Ipsa distinctio In', '2022-09-07 14:36:40', '2022-09-07 14:36:40'),
(31, 'Malik Hoover', 'sexaha@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '10', 'Et esse excepturi ut', '2022-09-07 14:36:53', '2022-09-07 14:36:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
