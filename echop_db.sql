-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 05:19 AM
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
-- Database: `echop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloglikebutton`
--

CREATE TABLE `bloglikebutton` (
  `id` int(11) NOT NULL,
  `Likes` int(11) NOT NULL,
  `Blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bloglikebutton`
--

INSERT INTO `bloglikebutton` (`id`, `Likes`, `Blog_id`, `user_id`) VALUES
(38, 1, 7, 5),
(39, 1, 7, 4),
(44, 1, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `url_address` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `post` varchar(200) NOT NULL,
  `image` varchar(300) NOT NULL,
  `date` datetime NOT NULL,
  `author` varchar(50) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `url_address`, `title`, `post`, `image`, `date`, `author`, `likes`) VALUES
(4, 'gtr-history', 'GTR HIstory', 'GTR HIstory 19 to 20', 'Blog_image/5YmOeiuzKZVv3KgVub8V.jpeg', '2023-08-01 15:34:36', '4', 2),
(5, 'craft', 'Craft', 'HEllo', 'Blog_image/4fQXa0epFn90meol6gNC.jpeg', '2023-08-04 16:01:16', '4', 0),
(6, 'craft', 'Craft', 'HEllo', 'Blog_image/AD2ml7zLfhaJDbkse4gl.jpeg', '2023-08-04 16:01:40', '4', 0),
(7, 'blog3', 'Blog3', 'We Are Talking About Fast Writing And Clean Code And Fast  Thinkink', 'Blog_image/4AJoNbRE3x9zE1mfyrD6.jpeg', '2023-08-04 16:05:32', '4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `Brand_Name` varchar(50) NOT NULL,
  `Product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `Brand_Name`, `Product_id`) VALUES
(1, 'NISSAN', 0),
(2, 'Adidas', 0),
(3, 'NISSAN', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `parent` int(11) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `parent`, `views`) VALUES
(1, 'Outfit', 0, 7),
(2, 'Cars', 0, 16);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `Blog` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `comment`, `Blog`, `date`) VALUES
(17, 4, 'Ok', 7, '2023-08-05 01:07:01'),
(18, 4, 'rr', 7, '2023-08-05 02:40:47'),
(19, 4, 'Nice', 7, '2023-08-05 02:41:10');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`) VALUES
(1, 'Syria'),
(2, 'Lebanon'),
(6, 'Mlisia'),
(7, 'America');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `delevery` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `states` int(11) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `tax` varchar(50) NOT NULL,
  `shipping` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `user_url` varchar(100) NOT NULL,
  `session` varchar(100) NOT NULL,
  `home_phone` varchar(30) NOT NULL,
  `mobile_phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `delevery`, `total`, `country`, `states`, `zip`, `tax`, `shipping`, `date`, `user_url`, `session`, `home_phone`, `mobile_phone`) VALUES
(26, 0, 238, 1, 2, '', '0', '0', '2023-08-03 15:53:16', '5nYkBC', '00kgmd5cmmvvgg3fk2105iuqr4', '70242375', '456'),
(27, 0, 238, 1, 2, '23456', '0', '0', '2023-08-03 15:58:59', '5nYkBC', '00kgmd5cmmvvgg3fk2105iuqr4', '70242375', '212312'),
(28, 0, 238, 2, 1, '3146', '0', '0', '2023-08-03 17:03:56', '5nYkBC', '00kgmd5cmmvvgg3fk2105iuqr4', '70242375', '212312'),
(29, 0, 23, 2, 1, '3146', '0', '0', '2023-08-03 17:04:57', '5nYkBC', '00kgmd5cmmvvgg3fk2105iuqr4', '70242375', '212312'),
(30, 0, 23, 2, 1, '3146', '0', '0', '2023-08-03 23:59:48', '5nYkBC', '00kgmd5cmmvvgg3fk2105iuqr4', '70242375', '456'),
(31, 0, 1044, 2, 1, '3146', '0', '0', '2023-08-04 02:40:43', '5nYkBC', '00kgmd5cmmvvgg3fk2105iuqr4', '70242375', '456'),
(32, 0, 975, 2, 1, '3146', '0', '0', '2023-08-04 05:08:22', '5nYkBC', '00kgmd5cmmvvgg3fk2105iuqr4', '70242375', '456'),
(33, 0, 476, 2, 1, '3434', '0', '0', '2023-08-04 05:42:28', '5nYkBC', '00kgmd5cmmvvgg3fk2105iuqr4', '70242375', '456');

-- --------------------------------------------------------

--
-- Table structure for table `order_detailes`
--

CREATE TABLE `order_detailes` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detailes`
--

INSERT INTO `order_detailes` (`id`, `order_id`, `qty`, `description`, `amount`, `total`, `product_id`) VALUES
(1, 2, 3, 'erjng', '23', '23', 9),
(2, 2, 23, 'eiorsjh', '238', '238', 8),
(3, 2, 1, 'wjkef', '1000', '1000', 1),
(4, 3, 3, 'erjng', '23', '23', 9),
(5, 3, 23, 'eiorsjh', '238', '238', 8),
(6, 3, 1, 'wjkef', '1000', '1000', 1),
(7, 4, 3, 'erjng', '23', '23', 9),
(8, 4, 23, 'eiorsjh', '238', '238', 8),
(9, 4, 1, 'wjkef', '1000', '1000', 1),
(10, 5, 3, 'erjng', '23', '23', 9),
(11, 5, 23, 'eiorsjh', '238', '238', 8),
(12, 5, 1, 'wjkef', '1000', '1000', 1),
(13, 6, 3, 'erjng', '23', '23', 9),
(14, 6, 23, 'eiorsjh', '238', '238', 8),
(15, 6, 1, 'wjkef', '1000', '1000', 1),
(16, 7, 3, 'erjng', '23', '23', 9),
(17, 7, 23, 'eiorsjh', '238', '238', 8),
(18, 7, 1, 'wjkef', '1000', '1000', 1),
(19, 8, 3, 'erjng', '23', '23', 9),
(20, 8, 23, 'eiorsjh', '238', '238', 8),
(21, 8, 1, 'wjkef', '1000', '1000', 1),
(22, 9, 3, 'erjng', '23', '23', 9),
(23, 9, 23, 'eiorsjh', '238', '238', 8),
(24, 9, 1, 'wjkef', '1000', '1000', 1),
(25, 10, 3, 'erjng', '23', '23', 9),
(26, 10, 23, 'eiorsjh', '238', '238', 8),
(27, 10, 1, 'wjkef', '1000', '1000', 1),
(28, 11, 3, 'erjng', '23', '23', 9),
(29, 11, 23, 'eiorsjh', '238', '238', 8),
(30, 11, 1, 'wjkef', '1000', '1000', 1),
(31, 12, 3, 'erjng', '23', '23', 9),
(32, 12, 23, 'eiorsjh', '238', '238', 8),
(33, 12, 1, 'wjkef', '1000', '1000', 1),
(34, 13, 3, 'erjng', '23', '23', 9),
(35, 13, 23, 'eiorsjh', '238', '238', 8),
(36, 13, 1, 'wjkef', '1000', '1000', 1),
(37, 14, 3, 'erjng', '23', '23', 9),
(38, 14, 23, 'eiorsjh', '238', '238', 8),
(39, 14, 2, 'qerjwah', '1248', '1248', 7),
(40, 15, 23, 'eiorsjh', '238', '238', 8),
(41, 16, 3, 'erjng', '23', '23', 9),
(42, 17, 23, 'eiorsjh', '238', '238', 8),
(43, 18, 23, 'eiorsjh', '238', '238', 8),
(44, 19, 1, 'headphone', '10', '10', 5),
(45, 20, 23, 'eiorsjh', '238', '238', 8),
(46, 21, 2, 'qerjwah', '1248', '1248', 7),
(47, 22, 3, 'erjng', '23', '23', 9),
(48, 23, 23, 'eiorsjh', '238', '238', 8),
(49, 24, 3, 'erjng', '23', '23', 9),
(50, 25, 3, 'erjng', '23', '23', 9),
(51, 26, 23, 'eiorsjh', '238', '238', 8),
(52, 27, 23, 'eiorsjh', '238', '238', 8),
(53, 28, 23, 'eiorsjh', '238', '238', 8),
(54, 29, 13, 'wejhf', '23', '23', 6),
(55, 30, 13, 'wejhf', '23', '23', 6),
(56, 31, 3, 'erjng', '23', '92', 9),
(57, 31, 23, 'eiorsjh', '238', '952', 8),
(58, 32, 3, 'erjng', '23', '23', 9),
(59, 32, 23, 'eiorsjh', '238', '952', 8),
(60, 33, 23, 'eiorsjh', '238', '476', 8);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_url` varchar(100) NOT NULL,
  `date` varchar(300) NOT NULL,
  `slag` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `image2` varchar(300) NOT NULL,
  `image3` varchar(300) NOT NULL,
  `image4` varchar(300) NOT NULL,
  `likes` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `description`, `price`, `quantity`, `user_url`, `date`, `slag`, `image`, `image2`, `image3`, `image4`, `likes`, `brand_id`) VALUES
(1, 2, 'wjkef', 1000, 1, 'UQnWROVw', '2023-08-01 14:20:26', 'wjkef', 'upload/YvGej4fiN4frWg8wGS6EXbjhFZdkfBw4lphRCBmq.jpg', '', '', '', 0, 0),
(4, 1, 'Loushon', 1000, 23, '5nYkBC', '2023-08-01 22:11:43', 'loushon', 'upload/ZQ6meIuV08WcMxVqr3kj3kdGdkCg47aqtV7vO5Cb.jpg', '', '', '', 0, 0),
(6, 2, 'wejhf', 23, 13, '5nYkBC', '2023-08-02 15:35:12', 'wejhf', 'upload/kHeRWYyi6pa8tdVwFnFHqciUKnK8UgWJZn9Afjkh.jpg', 'upload/92Bd3W3ET8WUY8g3WpyR7KOsQJgVozo4sHNKUTEC.jpg', 'upload/7JrnzTuxZ5I9E0ukyOvKveQ9C1aZ44ae73mIUd3x.jpg', '', 0, 0),
(7, 2, 'qerjwah', 1248, 2, '5nYkBC', '2023-08-02 15:36:17', 'qerjwah', 'upload/yjWBMlZVDfyqc8T8vpF7zS2Y71ptF8qvn5IwhTBj.jpg', 'upload/uSuUSHvc7CMLOJDvX4829BY8tT9HPrnuet8nd66r.jpg', 'upload/cfwmwbY0Lm4QPu1gOfmL91WT12fQdtBCG65yyJUL.jpg', '', 0, 0),
(8, 2, 'eiorsjh', 238, 23, '5nYkBC', '2023-08-02 15:38:59', 'eiorsjh', 'upload/yq6YGPr1BZSd829MeaCoNCmTbuuOnhXEHNY99WHy.jpg', 'upload/SVwwa67TALhtXyamrfoOp3wnCQmOzckABqOivq21.jpg', 'upload/yklxhH9hX80qR9645GMtSZhAkjFkaTwJ3extCrnz.jpg', '', 0, 0),
(9, 2, 'erjng', 23, 3, '5nYkBC', '2023-08-02 16:07:34', 'erjng', 'upload/1GAhv9J99q6Tt0G08goHseJtpFwBR2qrtZqvqJ0N.jpg', '', '', '', 0, 0),
(10, 1, 'Cat', 32, 1, '5nYkBC', '2023-08-03 23:59:13', 'cat', 'upload/3KEO3KxpPkWSwm5jGs2XxsWS7ChI2LSS0Eqm7p8j.jpg', '', '', '', 0, 0),
(11, 2, 'NissanAr', 44, 1, '5nYkBC', '2023-08-04 19:55:24', 'nissanar', 'upload/Xh3GrUJbjJLXIcTRqGh4sOlY0hhLi4v2EtorzucI.jpg', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `id` int(11) NOT NULL,
  `header1_text` varchar(300) NOT NULL,
  `header2_text` varchar(300) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`id`, `header1_text`, `header2_text`, `text`, `image`) VALUES
(1, 'kwejfuh', 'oweh', 'ujkweifhoeruhljefi', 'users_image/8ILNfIqV55BgBHvWOuHu.jpeg'),
(2, 'kwejfuh', 'oweh', 'ujkweifhoeruhljefi', 'users_image/8ILNfIqV55BgBHvWOuHu.jpeg'),
(4, 'erjkvn', 'ejrvn', 'erojhv', 'slider_image/ut3wqawx630liMMkWpKJ.jpeg'),
(5, 'About Cats', 'How To Have A Clean Cat', 'HEllo eoirjhioerjhfoerheh', 'slider_image/87l49uCkQt0xgkyC2aaJ.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `state` varchar(200) NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state`, `parent`) VALUES
(1, 'Saida', 2),
(2, 'Doma', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `url_address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `date` datetime NOT NULL,
  `rank` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `url_address`, `password`, `name`, `email`, `date`, `rank`, `image`) VALUES
(4, '5nYkBC', '$2y$10$C8KQ5F0zbv4UBoB6sMHDoObx14qgH3aKzVsmjEg58z2ZdsOGOofS2', 'mohamed', 'masarwam6@gmail.com', '2023-08-01 14:53:24', 'admin', 'users_image/8ILNfIqV55BgBHvWOuHu.jpeg'),
(5, 'O1sKMDXTKF', '$2y$10$Nc2QuXP.Kfz7bvLFEecuqe1cJBHDMVff4W2.WjyQ9tcUpPsG4FF/O', 'mohamedM', 'mohhxhtdi@gmail.com', '2023-08-04 16:22:02', 'customer', 'users_image/683W7kOjdHcc3V1YJTtf.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloglikebutton`
--
ALTER TABLE `bloglikebutton`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Blog_id` (`Blog_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detailes`
--
ALTER TABLE `order_detailes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloglikebutton`
--
ALTER TABLE `bloglikebutton`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `order_detailes`
--
ALTER TABLE `order_detailes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bloglikebutton`
--
ALTER TABLE `bloglikebutton`
  ADD CONSTRAINT `bloglikebutton_ibfk_1` FOREIGN KEY (`Blog_id`) REFERENCES `blogs` (`id`),
  ADD CONSTRAINT `bloglikebutton_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `countries` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
