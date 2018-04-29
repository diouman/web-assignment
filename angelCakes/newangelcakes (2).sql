-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2017 at 08:07 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newangelcakes`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `chkId` int(11) NOT NULL,
  `chkItem` int(11) NOT NULL,
  `chkRef` text NOT NULL,
  `chkTiming` datetime NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`chkId`, `chkItem`, `chkRef`, `chkTiming`, `qty`) VALUES
(1, 16, '17-04-24 04:09:43_1578008871', '2017-04-24 04:09:43', 4),
(2, 13, '17-04-24 04:35:36_1280247999', '2017-04-24 04:35:36', 4),
(3, 13, '17-04-24 04:49:45_1875963805', '2017-04-24 04:49:45', 4),
(4, 4, '17-04-24 05:36:15_929602755', '2017-04-24 05:36:15', 4),
(5, 4, '17-04-24 05:36:15_929602755', '2017-04-24 05:45:29', 4),
(6, 4, '17-04-24 05:36:15_929602755', '2017-04-24 05:49:44', 4),
(7, 13, '17-04-24 05:53:16_568937567', '2017-04-24 05:53:16', 4),
(8, 6, '17-04-24 05:55:08_1286256113', '2017-04-24 05:55:08', 4),
(9, 13, '17-04-24 06:13:51_1897340680', '2017-04-24 06:13:51', 4),
(10, 14, '17-04-24 06:13:51_1897340680', '2017-04-24 06:23:25', 4),
(11, 16, '17-04-24 06:23:41_1058718230', '2017-04-24 06:23:41', 4),
(12, 16, '17-04-24 06:23:41_1058718230', '2017-04-24 06:38:56', 4),
(13, 16, '17-04-24 06:54:25_1029843794', '2017-04-24 06:54:25', 4),
(14, 14, '17-04-24 06:54:25_1029843794', '2017-04-24 07:02:22', 4),
(15, 15, '17-04-24 07:03:48_1363202674', '2017-04-24 07:03:48', 4),
(16, 6, '17-04-24 07:03:48_1363202674', '2017-04-24 07:03:56', 4),
(17, 16, '17-04-24 07:06:13_814240642', '2017-04-24 07:06:13', 4),
(18, 4, '17-04-24 07:06:13_814240642', '2017-04-24 07:06:18', 4),
(19, 8, '17-04-24 09:23:33_1792235208', '2017-04-24 09:23:33', 4),
(20, 13, '17-04-24 09:23:33_1792235208', '2017-04-24 10:20:55', 4),
(21, 16, '17-04-24 10:48:45_1054237096', '2017-04-24 10:48:45', 4),
(22, 13, '17-04-24 10:55:37_1765159444', '2017-04-24 10:55:37', 4),
(23, 13, '17-04-24 11:28:25_865040322', '2017-04-24 11:28:25', 4),
(24, 16, '17-04-24 12:49:23_1254533482', '2017-04-24 12:49:23', 4),
(25, 6, '17-04-24 12:49:23_1254533482', '2017-04-24 12:50:14', 4),
(26, 4, '17-04-24 01:24:46_1233767639', '2017-04-24 01:24:46', 4);

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `custId` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `premium` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`custId`, `email`, `username`, `password`, `premium`) VALUES
(1, 'mehnaz@gmail.com', 'mehnaz', '123', 0),
(2, 'sara@gmail.com', 'sara', '1236', 0),
(3, 'Tom@gmail.com', 'tom', 'tom', 0),
(4, 'Jerry@gmail.com', 'jerry', '123', 0),
(10, 'Nayim@gmail.com', 'nayim', '123', 0),
(11, 'Adesh@gmail.com', 'adesh', '123', 0),
(15, 'keertydevi@gmail.com', 'keerty', 'keerty', 0),
(16, 'zoyanasroollah@gmail.com', 'Zoya', 'test', 0),
(17, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `o_name` varchar(30) NOT NULL,
  `o_contact` int(11) NOT NULL,
  `o_district` varchar(30) NOT NULL,
  `o_town` varchar(30) NOT NULL,
  `o_email` varchar(30) NOT NULL,
  `o_checkout_ref` text NOT NULL,
  `o_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `o_name`, `o_contact`, `o_district`, `o_town`, `o_email`, `o_checkout_ref`, `o_total`) VALUES
(1, 'diouman', 57978508, 'moka', 'Nouvelle France', 'mehnaz@gmail.com', '17', 630),
(2, 'adesh', 12424, 'granport', 'sf', 'adesh@gmail.com', '17', 330),
(3, 'Tom', 454, 'granport', 'fs', 'adesh@gmail.com', '17', 430),
(4, 'fr', 45, 'granport', 'fds', 'email@email.com', '17', 426),
(5, '', 0, '', '', '', '17', 830),
(6, 'fsdf', 424, 'savanne', 'vdf', 'mehnaz@gmail.com', '17-04-24 06:54:25_1029843794', 330),
(7, 'mehnaz', 0, '', '', '', '17-04-24 06:54:25_1029843794', 330),
(8, 'mehnaz', 45785, 'granport', 'jnjk', 'mehnaz@gmail.com', '17-04-24 07:03:48_1363202674', 846),
(9, 'Adesh ', 5, 'plaineswilhems', 'Lalmatie', 'adesh@gmail.com', '17-04-24 07:06:13_814240642', 480),
(10, 'keerty', 5945854, 'portlouis', 'curepipe', 'keertydevi@gmail.com', '17-04-24 09:23:33_1792235208', 1550),
(11, 'dfgvfs', 56475, 'moka', 'tger', 'email@email.com', '17-04-24 10:48:45_1054237096', 430),
(12, 'dfsd', 345, 'moka', 'drgfgd', 'email@email.com', '17-04-24 11:28:25_865040322', 210),
(13, 'rdjj', 547555, 'flacq', 'cpr', 'nn@nn.nn', '17-04-24 12:49:23_1254533482', 380),
(14, 'mgn', 15645, 'flacq', 'fgfdf', 'email@email.com', '17-04-24 01:24:46_1233767639', 230);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentId` int(11) NOT NULL,
  `pay_name` varchar(30) NOT NULL,
  `credit_num` int(11) NOT NULL,
  `expiryDate` date NOT NULL,
  `cvv_num` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `ref` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentId`, `pay_name`, `credit_num`, `expiryDate`, `cvv_num`, `total`, `ref`) VALUES
(1, 'Mehnaz', 123654789, '2017-04-26', 123, 630, '17'),
(2, 'sds', 2542, '2017-04-26', 123, 330, '17'),
(3, 'sdfs', 454, '2017-04-25', 121, 430, '17'),
(4, 'sdfs', 454, '2017-04-25', 121, 430, '17'),
(5, 'werw', 41, '0000-00-00', 0, 426, '17'),
(6, '', 0, '0000-00-00', 0, 830, '17'),
(7, 'sadas', 4245, '2017-04-26', 0, 330, '17-04-24 06:54:25_1029843794'),
(8, '', 0, '0000-00-00', 0, 330, '17-04-24 06:54:25_1029843794'),
(9, '', 0, '0000-00-00', 0, 846, '17-04-24 07:03:48_1363202674'),
(10, 'dfs', 454, '2017-04-19', 12, 480, '17-04-24 07:06:13_814240642'),
(11, 'keerty', 123456789, '2017-04-26', 1234, 1550, '17-04-24 09:23:33_1792235208'),
(12, 'dfgdvf', 42345, '2017-04-18', 345, 430, '17-04-24 10:48:45_1054237096'),
(13, 'sdfsd', 4253, '2017-04-25', 453, 210, '17-04-24 11:28:25_865040322'),
(14, 'nn', 4577004, '2017-04-10', 2147483647, 380, '17-04-24 12:49:23_1254533482');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `photo` text NOT NULL,
  `description` varchar(50) NOT NULL,
  `quantityInstock` int(11) NOT NULL,
  `deliveryCharge` int(11) NOT NULL,
  `isFeatured` tinyint(1) NOT NULL,
  `discountedPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodId`, `name`, `price`, `photo`, `description`, `quantityInstock`, `deliveryCharge`, `isFeatured`, `discountedPrice`) VALUES
(3, 'dgf', 75, 'images\\products\\bear.jpg', 'Bear Cupcakes are our new cakes.', 20, 120, 0, 0),
(4, 'Chritsmas Cupcakes', 50, 'images\\products\\Christmas.jpg', '', 12, 30, 0, 0),
(5, 'Mockery Cupcakes', 100, 'images\\products\\mokery.jpg', '', 20, 70, 0, 0),
(6, 'Mushroom Cupcakes', 75, 'images\\products\\mushroom.jpg', '', 45, 30, 0, 0),
(7, 'Olaf Cupcakes', 120, 'images\\products\\olaf.jpg', '', 12, 40, 0, 0),
(8, 'Panda Cupcakes', 150, 'images\\products\\panda.jpg', '', 40, 50, 0, 0),
(9, 'Popcorn Cupcakes', 75, 'images\\products\\popcorn.jpg', '', 20, 80, 0, 0),
(10, 'Rabbit Cupcake', 175, 'images\\products\\rabbit.jpg', '', 13, 60, 0, 0),
(11, 'Rainbow Cupcakes', 120, 'images\\products\\rainbow.jpg', '', 12, 80, 0, 0),
(12, 'Wedding Cupcakes', 300, 'images\\products\\wedding.jpg', '', 10, 90, 0, 0),
(13, 'Couple Cupcakes', 200, 'images/slide/slide1.jpg', '', 25, 30, 1, 20),
(14, 'Rose Cupcakes', 100, 'images/slide/slide2.jpg', '', 130, 30, 1, 30),
(15, 'Mickey Cupcakes', 152, 'images/slide/slide3.jpg', '', 30, 30, 1, 23),
(16, 'Flower Cupcake', 132, 'images\\slide\\slide4.jpg', '', 20, 30, 1, 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`chkId`),
  ADD KEY `itemFK` (`chkItem`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`custId`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `chkId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `custId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `itemFK` FOREIGN KEY (`chkItem`) REFERENCES `product` (`prodId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
