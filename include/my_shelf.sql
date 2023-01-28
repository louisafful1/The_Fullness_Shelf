-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2023 at 01:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_shelf`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Louis Afful', 'louisafful1@gmail.com', '@Salvation10');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `amount` int(11) NOT NULL,
  `num_of_items` int(11) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `fname`, `sname`, `phone`, `region`, `address`, `amount`, `num_of_items`, `payment`, `cart_id`, `order_date`, `status`) VALUES
(11778929, 0, 'Grace', 'Ababio', '09238475', 'Western', 'Takoradi', 985, 0, 'Mobile Money', 57, '2023-01-18', 'Confirmed'),
(26033490, 77, 'Romeo', 'Afful', '0591414352', 'hhuu', 'Elubo', 50, 1, 'Mobile Money', 71, '2023-01-26', 'Confirmed'),
(29438732, 0, 'Lawson', 'Buabassah', '0502649650', 'Central', 'Elubo', 1705, 0, 'Bank Account', 54, '2023-01-18', 'Confirmed'),
(37280926, 0, 'Margaret', 'Afful', '0553866775', 'Andhra Pradesh', 'Elubo', 85, 2, 'Cash on delivery', 61, '2023-01-18', 'Confirmed'),
(40503802, 0, 'Louis', 'Afful', '0591414352', 'sdfghj', 'Elubo', 85, 2, 'Cash on delivery', 61, '2023-01-18', 'Confirmed'),
(45218767, 0, 'Margaret', 'Afful', '0553866775', 'Centra', 'Elubo', 571, 0, 'Mobile Money', 49, '2023-01-18', 'Confirmed'),
(45473048, 0, 'Grace', 'Ababio', '09238475', 'Western', 'Takoradi', 985, 4, 'Mobile Money', 57, '2023-01-18', 'Confirmed'),
(64985381, 0, 'Margaret', 'Afful', '0553866775', 'Centra', 'Elubo', 665, 5, 'Cash on delivery', 65, '2023-01-25', 'Confirmed'),
(66754656, 0, 'Margaret', 'Afful', '0553866775', 'sdfghjk', 'Elubo', 537, 0, 'Mobile Money', 3, '2023-01-18', 'Confirmed'),
(76959072, 0, 'Margaret', 'Afful', '0553866775', 'Andhra Pradesh', 'Elubo', 85, 2, 'Cash on delivery', 61, '2023-01-18', 'Confirmed'),
(98577756, 0, 'Anthony', 'Bankah', '087654323', 'Northern', 'Tamale', 985, 4, 'Mobile Money', 57, '2023-01-18', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `title`, `author`, `quantity`, `unit`, `total`, `image`) VALUES
(48, 'The Seven Pillars of Wisdom', 'PASTOR OBED', 100, 90, 9000, 0x54686520536576656e2050696c6c617273206f6620576973646f6d2e706e67),
(50, 'Awaken the Giant Within', 'ANTHONY ROBBINS', 100, 50, 5000, 0x4177616b656e20746865204769616e742057697468696e2e706e67),
(52, 'How to Write Copy that Sells', 'Ray Edwards', 100, 35, 3500, 0x436f707920746861742073656c6c732e706e67),
(54, 'The 360 Leader', 'JOHN C MAXWELL', 100, 70, 7000, 0x54686520333630204c65616465722e706e67),
(56, 'The Fatherhood and Sonship Construct', 'PASTOR OBED', 100, 100, 10000, 0x54686520466174686572686f6f6420616e6420736f6e7368697020436f6e737472756375742e706e67),
(58, 'Awaken the Entrepreneur Within', 'MICHAEL E. GERBER', 100, 120, 12000, 0x4177616b656e696e672074686520456e7472657072656e6575722077697468696e2e706e67),
(60, 'The Psychology of Human Sexuality', 'JUSTIN J. LEHMILLER', 100, 35, 3500, 0x54686520507379636f6c6f6779206f662048756d616e2053657875616c6974792e706e67),
(64, 'The Elements of style', 'ROGER ANGELL', 100, 40, 4000, 0x54686520456c656d656e7473206f66205374796c652e706e67),
(66, 'Persuasive Copywriting', 'ANDY MASLEN', 100, 55, 5500, 0x5065727375617369766520636f707977726974696e672e706e67),
(68, 'F. U Money', 'Dan Lok', 34, 54, 1836, 0x53637265656e73686f745f32303232313233312d3038303434315f312e706e67),
(71, 'The Pro Blogger', 'DARREN ROWSE', 100, 67, 6700, 0x53637265656e73686f745f32303232313233312d3037353830325f312e706e67),
(77, 'CPP', 'WEDFGHJK', 2290, 23, 52670, 0x53637265656e73686f745f32303232313233312d3038303434315f312e706e67),
(79, 'dfg', 'MNB', 45678, 65, 2969070, 0x53637265656e73686f745f32303232313233312d3038303234325f312e706e67),
(83, 'trtuihg', 'MNB', 67, 32, 2144, 0x53637265656e73686f745f32303232313233312d3038303431355f312e706e67),
(86, 'fghjkkjhgfd', 'PASTOR OBED', 56778, 54, 3066012, 0x53637265656e73686f745f32303232313233312d3037353930305f312e706e67),
(89, 'dfgk', 'PASTOR OBED', 67, 87, 5829, 0x436f707920746861742073656c6c732e706e67),
(92, '2021/2022 Academic Year', 'POIJUHGF', 909, 88, 79992, 0x436f707920746861742073656c6c732e706e67),
(99, '2022/2023j Academic Year', 'MN', 67, 78, 5226, 0x4177616b656e20746865204769616e742057697468696e2e706e67),
(104, '2021/2022 Acadkemic Year', '', 56, 78, 4368, ''),
(108, 'NPPhjj', 'YYUU', 87, 89, 7743, 0x526963682044616420506f6f72204461642e706e67),
(111, 'NPP78', '988', 65, 89, 5785, 0x53637265656e73686f745f32303232313233312d3038303434315f312e706e67),
(116, 'CPPyy', 'YUGFF', 67, 543, 36381, 0x53637265656e73686f745f32303232313233312d3038303431355f312e706e67),
(159, 'Programming', 'GDERTYU', 34, 65, 2210, 0x53637265656e73686f745f32303232313233312d3038303635395f312e706e67),
(189, 'CPPhjio', 'JJ', 99, 9, 891, 0x5468652041647765656b2e706e67),
(200, '2021/2022 dfAcademic Year', 'WEDRFGSDFGB', 345, 2345, 809025, 0x4177616b656e20746865204769616e742057697468696e2e706e67),
(206, 'kjhgfdsjhg', 'YUIOP', 876, 9, 7884, 0x53637265656e73686f745f32303232313233312d3038303434315f312e706e67),
(208, '2022/2023 Academic Yearjh', 'SDFGH', 4567, 45678, 208611426, 0x53637265656e73686f745f32303232313233312d3038303434315f312e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `username`, `password`) VALUES
(60, 'Louis Afful', 'louisafful1@gmail.com', 'fdss', 'assd'),
(61, 'Louis Afful', 'louisafful1@gmail.com', 'fdss', 'assd'),
(62, 'Louis Afful', 'louisafful1@gmail.com', 'fdss', 'dfhkl'),
(63, 'Louis Afful', 'louisafful1@gmail.com', 'r', 'rew'),
(64, 'Louis Afful', 'louisafful1@gmail.com', 'r', 'rew'),
(65, 'Margaret Afful', 'affulmargaret@gmail.com', 'admin', 'dfgh'),
(66, 'Lawson Buabassah', 'lawson@gmail.com', 'thefullness', 'dfghj'),
(67, 'cobbinah Samuel', 'mansammy.cob@gmail.com', 'kjjl', 'hjioo'),
(68, 'cobbinah Samuel', 'mansammy.cob@gmail.com', 'kjjl', 'hjioo'),
(69, 'Louis Afful', 'louisafful1@gmail.com', 'admin', 'hhj'),
(70, 'Louis Afful', 'louisafful1@gmail.com', 'admin', 'hhj'),
(71, 'Margaret Afful', 'affulmargaret@gmail.com', ',mnb', 'lkjhgfd'),
(72, 'Margaret Afful', 'affulmargaret@gmail.com', ',mnb', 'lkjhgfd'),
(73, 'Margaret Afful', 'affulmargaret@gmail.com', ',mnb', 'lkjhgfd'),
(74, 'Margaret Afful', 'affulmargaret@gmail.com', 'thefullness', 'jhgfds'),
(75, 'Louis Afful', 'louisafful1@gmail.com', 'thefullness', '1234'),
(76, 'Louis Afful', 'louisafful1@gmail.com', 'thefullness', '1234'),
(77, 'Charles', 'lawson@gmail.com', 'thefullness', '@Salvation10'),
(78, 'Lawson Buabassah', 'lawson@gmail.com', 'lawson', '@Salvation10'),
(79, 'Kay', 'kay@gmail.com', 'kay_', '     '),
(80, 'Anthony Bankah', 'bankah@gmail.com', 'bankah', '@Salvation10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `title` (`title`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
