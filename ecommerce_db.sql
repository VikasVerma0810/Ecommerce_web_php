-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2024 at 07:56 PM
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
-- Database: `ecommerce_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `quantity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `product_id`, `quantity`) VALUES
(3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `compare`
--

CREATE TABLE `compare` (
  `user_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compare`
--

INSERT INTO `compare` (`user_id`, `product_id`) VALUES
(3, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `user_id` int(20) NOT NULL,
  `order_id` int(20) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `paymentMethod` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `total_cost` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`user_id`, `order_id`, `timestamp`, `paymentMethod`, `status`, `total_cost`) VALUES
(3, 0, '2024-07-14 21:56:37', ' Direct Bank Transfer', '', 265);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(20) NOT NULL,
  `category` varchar(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `new_price` int(20) NOT NULL,
  `old_price` int(20) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `is_new` int(20) NOT NULL,
  `is_popular` int(20) NOT NULL,
  `is_featured` int(20) NOT NULL,
  `is_deal_of_the_day` int(20) NOT NULL,
  `is_hot_release` int(20) NOT NULL,
  `is_outlet` int(20) NOT NULL,
  `is_top_selling` int(20) NOT NULL,
  `is_trending` int(20) NOT NULL,
  `percent_discount` int(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `warranty` int(20) NOT NULL,
  `colors` varchar(255) NOT NULL,
  `sizes_available` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `stock_quantity` int(20) NOT NULL,
  `material` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `Country_of_Origin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category`, `pname`, `brand_name`, `new_price`, `old_price`, `image1`, `image2`, `image3`, `is_new`, `is_popular`, `is_featured`, `is_deal_of_the_day`, `is_hot_release`, `is_outlet`, `is_top_selling`, `is_trending`, `percent_discount`, `description`, `warranty`, `colors`, `sizes_available`, `tags`, `stock_quantity`, `material`, `weight`, `manufacturer`, `Country_of_Origin`) VALUES
(1, 'Shirt', 'Colorfull Pattern Shirts', 'Raymond', 245, 300, 'assets/img/shirt1_1.jpg', 'assets/img/shirt1_2.jpg', 'assets/img/shirt1_3.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 0, 'Classic and versatile, this cotton shirt blends comfort with style. Featuring a tailored fit and a crisp collar, it effortlessly transitions from casual to formal occasions. Perfect for everyday wear or dressing up with a blazer.', 4, 'red,green,blue,pink', 'S,M,XL,XLL', 'Shirt,Shirts,', 20, 'Cotton', '500', 'Indian', 'India'),
(2, 'bags', 'Styles Bag', 'HP', 400, 600, 'assets/img/bag1.jpg', 'assets/img/bag2.jpg', 'assets/img/bag3.jpg', 1, 1, 1, 0, 1, 1, 1, 1, 20, 'This sleek and durable bag is crafted from premium leather, combining style with functionality. It features multiple compartments for organized storage and adjustable straps for comfort.', 1, '', '', '', 0, '', '0', '', ''),
(3, 'Shirt', 'Henley Shirt', 'Raymond', 500, 800, 'assets/img/product-8-1.jpg', 'assets/img/product-8-2.jpg', 'assets/img/product-8-1.jpg', 1, 0, 1, 1, 1, 1, 1, 1, 10, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis provident repellendus debitis quas in voluptate architecto aliquam obcaecati voluptatum ad, quidem fugit error tenetur eum ullam consequatur aperiam ut soluta.', 1, 'red,pink,grey,yellow', 'S,M,XL,XLL', 'Shirt,new Shirt, trending', 20, 'Cotton', '200gm', 'Indian', 'India'),
(4, 'dress', 'Summer Collection New Morden Design', 'Raymond', 1500, 2000, 'assets/img/deals-1.jpg', 'assets/img/deals-1.jpg', 'assets/img/deals-1.jpg', 1, 1, 0, 0, 0, 0, 0, 0, 0, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis provident repellendus debitis quas in voluptate architecto aliquam obcaecati voluptatum ad, quidem fugit error tenetur eum ullam consequatur aperiam ut soluta.', 1, 'red,pink', 'M,XL', 'dress,new release', 2, 'cotton', '500gm', 'Indian', 'India'),
(5, 'shoes', 'Shoes', 'Spark', 4000, 5000, 'assets/img/shoes1_1.jpg', 'assets/img/shoes1_2.jpg', 'assets/img/shoes1_3.jpg', 1, 1, 1, 0, 1, 1, 1, 1, 10, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis provident repellendus debitis quas in voluptate architecto aliquam obcaecati voluptatum ad, quidem fugit error tenetur eum ullam consequatur aperiam ut soluta.', 1, 'black,grey,brown', '30,40,15,28', 'shoes, spark shoes', 2, 'Cloths', '500gm', 'Indian', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `product_id` int(20) NOT NULL,
  `review` varchar(255) NOT NULL,
  `rating` int(25) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `username`, `user_email`, `password`, `country`, `city`, `state`, `pincode`, `phonenumber`, `timestamp`) VALUES
(3, 'vikas', 'vikas@gmail.com', '$2y$10$ipFUkAHSnD3Zlu5x8pOuhep1Un3ulAXIHU1iT7LNHncOJtTTtORTe', ' India', 'Valsad', 'Gujarat', '396170', '9157943922', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `user_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`user_id`, `product_id`) VALUES
(3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
