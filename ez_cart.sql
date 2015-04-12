-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2013 at 12:09 PM
-- Server version: 5.5.28
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ez_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `autologin`
--

CREATE TABLE IF NOT EXISTS `autologin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `agent` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `autologin`
--

INSERT INTO `autologin` (`username`, `password`, `ip`, `agent`) VALUES
('ronak', 'ronak', '192.168.75.107', 'Firefox'),
('ronak', 'ronak', '192.168.75.104', 'Firefox'),
('ronak', 'ronak', '192.168.75.107', 'Firefox'),
('ronak', 'ronak', '192.168.75.104', 'Firefox'),
('imranloon123', 'amaankhan', '192.168.75.124', 'Firefox');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `product_name` varchar(50) NOT NULL,
  `product_count` int(10) NOT NULL DEFAULT '1',
  `product_price` int(10) NOT NULL,
  `product_active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) DEFAULT NULL,
  `generic_category_id` int(11) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `generic_category_id`) VALUES
(12, 'gym', 4),
(15, 'mens', 2),
(16, 'womens', 2),
(18, 'kids', 2);

-- --------------------------------------------------------

--
-- Table structure for table `generic_category`
--

CREATE TABLE IF NOT EXISTS `generic_category` (
  `generic_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `generic_category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`generic_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `generic_category`
--

INSERT INTO `generic_category` (`generic_category_id`, `generic_category_name`) VALUES
(2, 'Clothes'),
(4, 'fitness'),
(5, 'sports'),
(6, 'furniture');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(500) NOT NULL,
  `product_image` varchar(500) NOT NULL DEFAULT 'default_image.jpg',
  `product_price` int(11) NOT NULL,
  `no_of_product` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_desc` varchar(5000) NOT NULL,
  `generic_category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `product_price`, `no_of_product`, `category_id`, `product_desc`, `generic_category_id`, `category_name`) VALUES
(67, 'Harley Leather Jacket', 'harley_jacket.jpg', 17000, 247, 15, 'Pure leather', 2, 'mens'),
(68, 'Leather Pants ', 'leather_pants.jpg', 13000, 17, 15, 'Boys dont cry', 2, 'mens'),
(69, 'Prada Jeans', 'prada_jeans.jpg', 9000, 32, 15, 'jeans and fashion go hand in hand', 2, 'mens'),
(70, 'Raid n Taylor ', 'raidntaylor.jpg', 25999, 26, 15, 'Feel Like Heaven', 2, 'mens'),
(71, 'Dulhan Saree', 'dulhan_saree.jpg', 30000, 23, 16, 'Ever Bride''s dream', 2, 'womens'),
(72, 'Punjabi Dress', 'punjabi_dress.jpg', 3999, 14, 16, 'Northern Style', 2, 'womens'),
(73, 'One Piece', 'one_piece.jpg', 16999, 30, 16, 'Glamorous and Fashionable', 2, 'womens'),
(74, 'Salwaar Kameez', 'salwaar_kameez.jpg', 8999, 46, 16, 'Traditional Indian wear', 2, 'womens'),
(75, 'Kids Jeans', 'kid1.jpg', 2999, 20, 18, 'make your kid stylish', 2, 'kids'),
(76, 'Kids Frock', 'kid2.jpg', 2999, 15, 18, 'mak', 2, 'kids'),
(77, 'Kids One piece', 'kid3.jpg', 1999, 66, 18, 'Make you kid cute', 2, 'kids'),
(78, 'Kids T-shirts', 'kid4.jpg', 3599, 45, 18, 'make you kid modern', 2, 'kids'),
(79, 'Kids jacket', 'kid5.jpg', 7999, 49, 18, 'Make your kid warm', 2, 'kids'),
(80, 'Dumbells', 'dumbbells.jpg', 8889, 67, 12, 'For your arm', 4, 'gym'),
(83, 'Chest instrument', 'chest.jpg', 45999, 70, 12, 'For your chest', 4, 'gym'),
(94, 'Boxing Gloves', 'boxing.jpg', 9999, 49, 0, 'Muhhammad Ali autgraphed', 5, ''),
(95, 'Hockey Kit', 'hockey.jpg', 6799, 37, 0, 'for hockey fans', 5, ''),
(96, 'Tennis kit', 'tennis.jpg', 5799, 45, 0, 'For tennis fans', 5, ''),
(97, 'Bathroom Slideboard', 'bathroom_sideboard.jpg', 17999, 31, 0, 'Bathroom Cupboard', 6, ''),
(98, 'Chairset', 'chairset.jpg', 43999, 55, 0, 'For hall chairs', 6, ''),
(100, 'Glass Cupboard', 'glass_cupboard.jpg', 56789, 26, 0, 'Glass cupboard with 10 shelves', 6, ''),
(101, 'Chelsea Footbal', 'chelsea_ball.jpg', 4999, 27, 0, 'Bleed blue', 5, ''),
(102, 'Traditional Saree', 'Traditional_Saree.jpg', 26999, 48, 16, 'Indian Classic Beauties', 2, 'womens');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `level` int(5) DEFAULT '2',
  `address` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `gender` varchar(50) COLLATE utf8_bin NOT NULL,
  `languages` varchar(50) COLLATE utf8_bin NOT NULL,
  `firstname` varchar(50) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=61 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `level`, `address`, `gender`, `languages`, `firstname`, `lastname`) VALUES
(31, 'prasad', '46bf36a7193438f81fccc9c4bcc8343e', 'prasad514nair@gmail.com', 1, 0, 1, 'pimpri', 'Female', 'English,Hindi,', 'prasad', 'nair'),
(34, 'ronak', 'b51dedb33ef8d983d741d5e035760a08', 'rr@g.com', 1, 1, 2, 'asasas', 'Male', 'English,Hindi,Marathi,', 'ronak', 'makadiya'),
(35, 'vishal', 'bb2495c2b8e05a7b27d14bdf986ec113', 'vishal.k.chothani@gmail.com', 1, 1, 2, 'rastapeth', 'Male', 'english,', 'vishal', 'chothani'),
(38, 'utkarsh', '4dae8edd4b2cdd15e95d0a5b3cf1a18f', 'utkarsh@ags.com', 1, 0, 2, 'kharadi', 'Male', 'english,hindi,', 'utkarsh', 'gupta'),
(55, 'sumeet', '7812e8b74f6837fba66f86fe86688a2b', 'sumeet@ags.com', 1, 1, 2, 'shanivarpeth', 'Male', 'english,', 'sumeet', 'suryavanshi'),
(57, 'admin', '0192023a7bbd73250516f069df18b500', 'admin@admin.com', 1, 0, 0, 'pune', 'Male', 'english,', 'admin', 'admin'),
(58, 'pawan', '46bf36a7193438f81fccc9c4bcc8343e', 'pawan@ags.com', 1, 0, 2, 'pimpri', 'Male', 'english,hindi,', 'pawan', 'sonawane'),
(59, 'rohit', '1dc90e80c77fe245a82ea7ed30d1f849', 'rohit@ags.com', 1, 0, 2, 'khadki', 'Male', 'english,hindi,', 'rohit', 'kumar'),
(60, 'mohit', '1e2a796539042ca860c3091662aa4346', 'mohit@ags.com', 1, 0, 2, 'kharadi', 'Male', 'english,', 'mohit', 'kumat');

-- --------------------------------------------------------

--
-- Table structure for table `view_order`
--

CREATE TABLE IF NOT EXISTS `view_order` (
  `username` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_count` int(10) NOT NULL,
  `purchase_date` date NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `view_order`
--

INSERT INTO `view_order` (`username`, `address`, `email`, `product_name`, `product_count`, `purchase_date`, `firstname`, `lastname`) VALUES
('admin', 'pune', 'admin@admin.com', 'Chairset', 1, '2013-04-08', 'admin', 'admin'),
('prasad', 'pimpri', 'prasad514nair@gmail.com', 'Bathroom Slideboard', 2, '2013-04-08', 'prasad', 'nair'),
('admin', 'pune', 'admin@admin.com', 'Harley Leather Jacket', 2, '2013-04-09', 'admin', 'admin'),
('admin', 'pune', 'admin@admin.com', 'Kids Jeans', 2, '2013-04-09', 'admin', 'admin'),
('admin', 'pune', 'admin@admin.com', 'Bathroom Slideboard', 1, '2013-04-09', 'admin', 'admin'),
('admin', 'pune', 'admin@admin.com', 'Harley Leather Jacket', 1, '2013-04-09', 'admin', 'admin'),
('admin', 'pune', 'admin@admin.com', 'Kids One piece', 1, '2013-04-09', 'admin', 'admin'),
('admin', 'pune', 'admin@admin.com', 'Kids Jeans', 7, '2013-04-09', 'admin', 'admin'),
('admin', 'pune', 'admin@admin.com', 'Kids Frock', 1, '2013-04-09', 'admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
