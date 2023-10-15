-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2023 at 03:18 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_php_uylab`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `about_title` varchar(100) NOT NULL,
  `about_text` text NOT NULL,
  `button_link` varchar(100) NOT NULL,
  `button_text` varchar(20) NOT NULL,
  `about_home_image` varchar(100) NOT NULL,
  `about_pase_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `about_title`, `about_text`, `button_link`, `button_text`, `about_home_image`, `about_pase_image`) VALUES
(1, 'Quia minima aut ad N', 'Veritatis culpa cum', 'Sint iste anim iste ', '  Ratione non deleni', 'about_home1697269268_980056.png', 'about_pase1697269488_891253.png');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `banner_id` int(11) NOT NULL,
  `banner_title` text NOT NULL,
  `banner_subtitle` varchar(250) NOT NULL,
  `banner_text` text NOT NULL,
  `button_link` text NOT NULL,
  `button_text` varchar(20) NOT NULL,
  `banner_image` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`banner_id`, `banner_title`, `banner_subtitle`, `banner_text`, `button_link`, `button_text`, `banner_image`, `status`) VALUES
(6, 'Possimus consequatufg', 'Eu animi sed harum ', 'Dicta qui aute et si', 'Tempore ut dolorum ', '  Suscipit sint vel ', 'banner_1697254985_860014.png', 'inactive'),
(7, 'banner title', 'banner subtitle', 'banner text', 'sdfasdfadsf', 'sdfasd', 'banner_1697221533_476707.jpg', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` int(11) NOT NULL,
  `counter_icon` varchar(50) NOT NULL,
  `counter_number` int(11) NOT NULL,
  `counter_title` varchar(100) NOT NULL,
  `counter_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `counter_icon`, `counter_number`, `counter_title`, `counter_text`) VALUES
(2, 'fa fa-users', 100, 'Sit cumque Nam sed ', 'Reiciendis quas aliq'),
(6, 'fa fa-address-book', 100, 'counter number', 'Counter Text');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_categoty`
--

CREATE TABLE `portfolio_categoty` (
  `id` int(11) NOT NULL,
  `portfolio_categoty_name` varchar(20) NOT NULL,
  `portfolio_categoty_slug` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio_categoty`
--

INSERT INTO `portfolio_categoty` (`id`, `portfolio_categoty_name`, `portfolio_categoty_slug`) VALUES
(1, 'Graphics Design', 'graphics-design'),
(2, 'Web Development', 'web-development'),
(3, 'Xena Rich', 'xena-rich'),
(4, 'Tana Simon', 'tana-simon'),
(7, 'Ariana England', 'ariana-england');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Author'),
(4, 'Editor'),
(5, 'User'),
(6, 'Subscriber');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_title` varchar(100) NOT NULL,
  `service_text` text NOT NULL,
  `button_link` varchar(100) NOT NULL,
  `button_text` varchar(20) NOT NULL,
  `service_image` varchar(100) NOT NULL,
  `service_icon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_title`, `service_text`, `button_link`, `button_text`, `service_image`, `service_icon`) VALUES
(3, 'Aliquip dolore nisi ', 'Consequuntur maxime ', 'Esse cupiditate modi', ' Eiusmod eum fugiat ', 'service_1697276533_274057.png', 'fa fa-address-book');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_username` varchar(30) NOT NULL,
  `user_slug` varchar(200) NOT NULL,
  `user_password` varchar(40) NOT NULL,
  `user_image` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_phone`, `user_email`, `user_username`, `user_slug`, `user_password`, `user_image`, `role_id`) VALUES
(3, 'User', '01718022214', 'user@gmail.com', 'user', 'U65296d02d0fd8', '698d51a19d8a121ce581499d7b701668', 'user_1697213698_676277.png', 5),
(4, 'editor', '+1 (684) 468-3324', 'webe@mailinator.com', 'editor', 'U6529708f0c9d7', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'user_1697214607_389267.png', 4),
(5, 'ruhocelor', '+1 (923) 471-2724', 'minygagyju@mailinator.com', 'admin', 'U6529733c829cf', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', 6),
(7, 'zytezyloz', '+1 (376) 148-2133', 'gazadeduq@mailinator.com', 'poqyresot', 'U652a87d71de07', '698d51a19d8a121ce581499d7b701668', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_categoty`
--
ALTER TABLE `portfolio_categoty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `portfolio_categoty`
--
ALTER TABLE `portfolio_categoty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
