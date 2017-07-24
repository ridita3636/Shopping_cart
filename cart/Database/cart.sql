-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2015 at 09:29 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE IF NOT EXISTS `cart_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `desc` tinytext NOT NULL,
  `price` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `shipping` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `image`, `name`, `desc`, `price`, `quantity`, `shipping`) VALUES
(1, 'acer.jpg', 'Acer Laptop', 'This Is Acer New Brand Laptop.', '32000', 4, 100),
(2, 'hp.jpg', 'HP Laptop', 'This Is HP New Brand Laptop.', '34000', 4, 100),
(3, 'acer_com.jpg', 'Acer Computer', 'This Is Acer New Brand Computer.', '24000', 3, 100),
(4, 'camera.jpeg', 'Sony camera', 'This Is Sony New Brand Camera.', '14000', 5, 100),
(5, 'moto.jpg', 'Motorola Mobile', 'This Is Moto-E New Brand Mobile.', '8000', 4, 100),
(6, 'dell.jpg', 'Dell Laptop', 'This Is Dell New Brand Laptop.', '34000', 2, 100),
(7, 'hp_com.jpg', 'HP Computer', 'This Is HP New Brand Computer.', '18000', 3, 100);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
