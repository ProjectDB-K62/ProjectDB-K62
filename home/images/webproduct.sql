-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 11:13 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webproduct`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `gmail` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `gmail`) VALUES
(32, 'Trần Ngọc Công', 'TranCong', 'c3725bde386e9fa2b4498699df403986', 'TranCong@gmail.com'),
(33, 'Ninh Thị Bích', 'NinhBich', 'c3725bde386e9fa2b4498699df403986', 'NinhBich@gmail.com'),
(35, 'Nguyễn Văn Công', 'NguyenCong', 'c3725bde386e9fa2b4498699df403986', 'NguyenCong@gmail.com'),
(36, 'Dương Văn Đức', 'DuongDuc', 'c3725bde386e9fa2b4498699df403986', 'DuongDuc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `sort_oder` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `parent_id`, `sort_oder`) VALUES
(3, 'Laptop', 0, 0),
(11, 'ASUS-Laptop', 3, 3),
(6, 'Phone', 0, 2),
(8, 'Apple-Phone', 6, 3),
(9, 'Samsung-Phone', 6, 1),
(10, 'Apple-Laptop', 3, 1),
(13, 'DELL-Laptop', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `discount` decimal(15,2) NOT NULL,
  `image_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_list` text COLLATE utf8_unicode_ci NOT NULL,
  `count_buy` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `catalog_id`, `name`, `price`, `discount`, `image_link`, `image_list`, `count_buy`, `description`, `amount`) VALUES
(56, 10, 'Macbook pro 15 inch 2019', '40000000.00', '1000000.00', '651656-meet-the-2019-apple-macbook-pro-15-inch1.jpg', '[\"651656-meet-the-2019-apple-macbook-pro-15-inch11.jpg\",\"651656-meet-the-2019-apple-macbook-pro-15-inch12.jpg\",\"651656-meet-the-2019-apple-macbook-pro-15-inch13.jpg\"]', 0, '6G RAM, MacOS', 13),
(36, 9, 'Samsung S10', '27300000.00', '300000.00', 'download_(7).jpg', '[\"download_(7)1.jpg\",\"download_(7)2.jpg\"]', 0, '8G ram, android', 6),
(35, 9, 'Sumsung Note 10', '25000000.00', '300000.00', 'download_(4).jpg', '[\"download_(4)1.jpg\",\"download_(4)2.jpg\",\"download_(4)3.jpg\"]', 0, '6G ram, android', 20),
(34, 8, 'Iphone X', '31000000.00', '1000000.00', 'download_(2).jpg', '[\"download_(2)1.jpg\"]', 0, '4G ram, IOS', 6),
(57, 8, 'Iphone XI', '35000000.00', '500000.00', 'Puro-0-3-Nude-TPU-Case-for-iPhone-11-Pro-Max-Transparent-8033830281204-19092019-001-p.jpg', '[\"Puro-0-3-Nude-TPU-Case-for-iPhone-11-Pro-Max-Transparent-8033830281204-19092019-001-p1.jpg\",\"Puro-0-3-Nude-TPU-Case-for-iPhone-11-Pro-Max-Transparent-8033830281204-19092019-001-p2.jpg\",\"Puro-0-3-Nude-TPU-Case-for-iPhone-11-Pro-Max-Transparent-8033830281204-19092019-001-p3.jpg\"]', 0, '4G ram, IOS 12.0.1', 10),
(58, 13, 'Dell XPS 15', '36000000.00', '500000.00', 'download.jpg', '[\"download1.jpg\",\"download2.jpg\",\"download3.jpg\"]', 0, '8G RAM, WINDOW 10, CORE I7', 5),
(59, 11, 'ASUS X555U', '13000000.00', '0.00', '1540398807-340-asus-x555u-21.jpg', '[\"1540398807-340-asus-x555u-22.jpg\",\"1540398807-340-asus-x555u-23.jpg\"]', 0, '4G RAM, WINDOW 10, CORE I5', 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
