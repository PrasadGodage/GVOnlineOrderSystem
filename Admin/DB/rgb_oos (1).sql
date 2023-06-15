-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 06:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rgb_oos`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ordercart_id` int(11) NOT NULL,
  `orderdate` date DEFAULT NULL,
  `ordertime` time NOT NULL DEFAULT current_timestamp(),
  `userid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `qun` varchar(3) NOT NULL,
  `rate` varchar(5) NOT NULL,
  `itemimage` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categorymaster`
--

CREATE TABLE `categorymaster` (
  `id` int(10) NOT NULL,
  `categoryname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorymaster`
--

INSERT INTO `categorymaster` (`id`, `categoryname`) VALUES
(1, 'starter'),
(3, 'Main Course');

-- --------------------------------------------------------

--
-- Table structure for table `firmmaster`
--

CREATE TABLE `firmmaster` (
  `firmid` int(10) NOT NULL,
  `firmname` varchar(50) NOT NULL,
  `firmdisc` varchar(500) NOT NULL,
  `firmaddress` varchar(100) NOT NULL,
  `firmcontact` varchar(13) NOT NULL,
  `parcelcontact` varchar(13) NOT NULL,
  `fassinumber` varchar(30) NOT NULL,
  `ownername` varchar(50) NOT NULL,
  `landmark` varchar(50) NOT NULL,
  `pincode` int(7) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `firmlogo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `firmmaster`
--

INSERT INTO `firmmaster` (`firmid`, `firmname`, `firmdisc`, `firmaddress`, `firmcontact`, `parcelcontact`, `fassinumber`, `ownername`, `landmark`, `pincode`, `location`, `firmlogo`) VALUES
(1, 'Mirchidli updated', 'Diesc for redto updated', 'addres for resto updated', '9878675611', '8978675600', '90733FSSA00', 'nawale updated', 'near landmarKK', 422602, NULL, 'uploads/restologo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `itemmaster`
--

CREATE TABLE `itemmaster` (
  `itemid` int(10) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `itemdisc` varchar(500) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `rate` varchar(100) NOT NULL,
  `itemcategoryname` varchar(100) NOT NULL,
  `itembehavior` varchar(100) NOT NULL,
  `makingtime` varchar(100) NOT NULL,
  `itemimage` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `itemmaster`
--

INSERT INTO `itemmaster` (`itemid`, `itemname`, `itemdisc`, `unit`, `rate`, `itemcategoryname`, `itembehavior`, `makingtime`, `itemimage`) VALUES
(1, 'masala papad', 'discription', 'plate', '30', 'starter', 'normal', '5', 'uploads/masalapapad.jpg'),
(2, 'Icecream 2x', 'disc', 'pices', '20', 'sweet', 'cold', '1', 'uploads/Saag-Paneer-FF.jpg'),
(8, 'checiken', 'test', 'plate', '500', 'maincource', 'normal', '', 'uploads/1.jpeg'),
(9, 'Burger', 'sfdsdf', 'item', '350', 'snacks', 'normal', '', 'uploads/2.jpeg'),
(10, 'Panner Masala ', 'test 2', 'item', '250', 'maincource', 'normal', '', 'uploads/3.webp'),
(11, 'Pizza', 'Pizza Hot 🔥 ', 'item', '249', 'snacks', 'normal', '', 'uploads/4.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderid` int(10) NOT NULL,
  `itemid` int(10) NOT NULL,
  `userid` int(5) NOT NULL,
  `qty` int(10) NOT NULL,
  `rate` int(10) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderid`, `itemid`, `userid`, `qty`, `rate`, `amount`) VALUES
(1, 1, 10, 1, 30, 30),
(1, 2, 10, 1, 20, 20),
(1, 9, 10, 1, 350, 350),
(1, 1, 10, 1, 30, 30),
(1, 2, 10, 1, 20, 20),
(1, 1, 10, 3, 30, 90);

-- --------------------------------------------------------

--
-- Table structure for table `ordermaster`
--

CREATE TABLE `ordermaster` (
  `orderid` int(10) NOT NULL,
  `orderdate` date NOT NULL,
  `ordertime` time NOT NULL DEFAULT current_timestamp(),
  `userid` varchar(10) NOT NULL,
  `address` varchar(250) NOT NULL,
  `landmark` varchar(50) NOT NULL,
  `pincode` int(6) NOT NULL,
  `lat` varchar(15) NOT NULL,
  `lan` varchar(15) NOT NULL,
  `orderdeliverytime` varchar(10) NOT NULL,
  `orderstatus` varchar(10) NOT NULL DEFAULT '0',
  `orderbillamount` decimal(10,2) NOT NULL,
  `orderpaymode` varchar(10) NOT NULL,
  `isdelivered` tinyint(1) NOT NULL,
  `isfreedelivery` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordermaster`
--

INSERT INTO `ordermaster` (`orderid`, `orderdate`, `ordertime`, `userid`, `address`, `landmark`, `pincode`, `lat`, `lan`, `orderdeliverytime`, `orderstatus`, `orderbillamount`, `orderpaymode`, `isdelivered`, `isfreedelivery`) VALUES
(1, '2023-06-15', '09:52:29', '10', 'Bajaj Showroom Top 10 Building', 'Near Yashodhan Karyalaya', 422890, '', '', '', 'Open', 540.00, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usermaster`
--

CREATE TABLE `usermaster` (
  `userid` int(10) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `landmark` varchar(100) NOT NULL,
  `pincode` varchar(7) NOT NULL,
  `address` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `registrationdate` date NOT NULL,
  `totalorderamt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usermaster`
--

INSERT INTO `usermaster` (`userid`, `usertype`, `name`, `contact`, `email`, `password`, `username`, `landmark`, `pincode`, `address`, `status`, `registrationdate`, `totalorderamt`) VALUES
(1, 'admin', 'admin', '00000000', 'admin@gmail.com', 'Admin@2023', 'admin', 'demo', '422605', 'demo', 0, '2023-06-10', 0),
(2, 'customer', 'test', '9595959595', 'test@gamil.com', 'cc03e747a6afbbcbf8be7668acfebee5', '', 'mainas jnjans', '422607', 'manin', 0, '0000-00-00', 0),
(10, 'customer', 'Krushna Dighe', '9011901190', 'krushna@gmail.com', '25035261615d9823cbc2ae8ac5ea28cb', '9011901190', 'Near Yashodhan Karyalaya', '422890', 'Bajaj Showroom Top 10 Building', 0, '2023-06-14', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ordercart_id`);

--
-- Indexes for table `categorymaster`
--
ALTER TABLE `categorymaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `firmmaster`
--
ALTER TABLE `firmmaster`
  ADD PRIMARY KEY (`firmid`);

--
-- Indexes for table `itemmaster`
--
ALTER TABLE `itemmaster`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `ordermaster`
--
ALTER TABLE `ordermaster`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `usermaster`
--
ALTER TABLE `usermaster`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ordercart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categorymaster`
--
ALTER TABLE `categorymaster`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `firmmaster`
--
ALTER TABLE `firmmaster`
  MODIFY `firmid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `itemmaster`
--
ALTER TABLE `itemmaster`
  MODIFY `itemid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ordermaster`
--
ALTER TABLE `ordermaster`
  MODIFY `orderid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usermaster`
--
ALTER TABLE `usermaster`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
