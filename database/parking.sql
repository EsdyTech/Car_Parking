-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2019 at 08:12 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `logtimes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `username`, `password`, `logtimes`) VALUES
(1, 'admin', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `parking_lots`
--

CREATE TABLE `parking_lots` (
  `lotId` int(12) NOT NULL,
  `zoneId` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `status` varchar(255) NOT NULL,
  `dateReg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parking_lots`
--

INSERT INTO `parking_lots` (`lotId`, `zoneId`, `name`, `amount`, `status`, `dateReg`) VALUES
(1, 1, 'PL0001', '500', 'Available', '0000-00-00'),
(2, 1, 'PL0002', '1200', 'Reserved', '0000-00-00'),
(3, 1, 'PL0003', '0', 'Reserved', '0000-00-00'),
(4, 1, 'PL0004', '0', 'Reserved', '0000-00-00'),
(5, 2, 'PL0001', '2300', 'Available', '2019-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reserveId` int(10) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `zoneId` int(10) NOT NULL,
  `plotId` int(10) NOT NULL,
  `carModel` varchar(255) NOT NULL,
  `carType` varchar(255) NOT NULL,
  `plateNo` varchar(255) NOT NULL,
  `price` decimal(20,0) NOT NULL,
  `total` decimal(20,0) NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `dateReg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reserveId`, `userId`, `zoneId`, `plotId`, `carModel`, `carType`, `plateNo`, `price`, `total`, `fromDate`, `toDate`, `status`, `dateReg`) VALUES
(7, 'aaa', 1, 3, 'Corolla', 'Car', 'ASD312312', '0', '0', '2019-06-09', '2019-06-18', 'APPROVED', '2019-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `street` text NOT NULL,
  `plot` text NOT NULL,
  `status` text NOT NULL,
  `model` text NOT NULL,
  `vehicle` text NOT NULL,
  `platenumber` text NOT NULL,
  `email` text NOT NULL,
  `account` text NOT NULL,
  `d1` text NOT NULL,
  `d2` text NOT NULL,
  `charge` text NOT NULL,
  `id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`street`, `plot`, `status`, `model`, `vehicle`, `platenumber`, `email`, `account`, `d1`, `d2`, `charge`, `id`) VALUES
('OGEMBO STREET', 'PL 002', 'RESERVED', 'MAZDA', 'volvo', 'KAB', 'vinnymosh@gmail.com', '40204304', '02.11.2014 11:05AM', '02.11.2014 12:05AM', '60', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `phone` text NOT NULL,
  `level` int(11) NOT NULL,
  `status` text NOT NULL,
  `joindate` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `password`, `phone`, `level`, `status`, `joindate`, `id`) VALUES
('ibrahim', 'aaa', 'aaa', '', 0, '', '', 2),
('vinny', 'vinny@yahoo.com', '9988', '0724229077', 0, 'Active', 'Array', 4),
('ibrahim maina', 'ibrahimond75@yahoo.com', 'ondabu', '0729667794', 1, '', '', 5),
('antony', 'bitmay2012@gmail.com', '14members', '0723136090', 0, 'Active', 'Array', 6),
('ruth', 'ruth@gmail.com', 'ruth', '0729667794', 0, 'Active', 'Array', 7),
('victor', 'victor@gmail.com', 'ogesi', '0704350482', 0, 'Active', 'Array', 8);

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `zoneId` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`zoneId`, `name`, `type`, `street`) VALUES
(1, 'Zone B', 'Car', 'adetiba'),
(2, 'Zone A', 'Lorry', 'shofolue');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `street` text NOT NULL,
  `plot` text NOT NULL,
  `status` text NOT NULL,
  `model` text NOT NULL,
  `vehicle` text NOT NULL,
  `platenumber` text NOT NULL,
  `email` text NOT NULL,
  `account` text NOT NULL,
  `d1` text NOT NULL,
  `d2` text NOT NULL,
  `charge` text NOT NULL,
  `id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`street`, `plot`, `status`, `model`, `vehicle`, `platenumber`, `email`, `account`, `d1`, `d2`, `charge`, `id`) VALUES
('DARAJA MBILI/UHURU PLAZA', 'PL 001', 'RESERVED', 'TOYOTA', 'volvo', 'BMW 600H', 'ibrahimond75@gmail.com', '7777777', '02.11.2014 11:05AM', '02.11.2014 12:05AM', '60', 3),
('DARAJA MBILI/UHURU PLAZA', 'PL 003', 'RESERVED', 'toyota nissan', 'volvo', 'kbz 220k', 'bitmay2012@gmail.com', '6666666', '02.11.2014 11:05AM', '02.11.2014 12:05AM', '60', 4),
('OGEMBO STREET', 'PL 005', 'RESERVED', 'toyota', 'volvo', 'KCA  899', 'victor@gmail.com', '78889998888844', '02.11.2014 11:05AM', '02.11.2014 12:05AM', '60', 5),
('OGEMBO STREET', 'PL 003', 'RESERVED', 'toyota', 'volvo', 'KCA  899', 'cmaubi.cm@gmail.cm', '55889999999999', '02.11.2014 11:05AM', '02.11.2014 12:05AM', '60', 7),
('OGEMBO STREET', 'PL 009', 'RESERVED', 'toyota', 'volvo', 'KCA  899', 'ibrahimond75@yahoo.com', '23456789', '02.11.2014 11:05AM', '02.11.2014 12:05AM', '60', 8),
('NATIONAL BANK/LEVEL FIVE STREET', 'PL 001', 'RESERVED', 'premier', 'volvo', 'kca 700j', 'ogesi@gmail.com', '19999999999999999999999999999999999999999999', '02.11.2014 11:05AM', '02.11.2014 12:05AM', '60', 9),
('OGEMBO STREET', 'PL 001', 'RESERVED', 'premier', 'volvo', 'kca 700j', 'ogesi@gmail.com', '19999999999999999999999999999999999999999999', '02.11.2014 11:05AM', '02.11.2014 12:05AM', '60', 10),
('OGEMBO STREET', 'PL 001', 'RESERVED', 'premier', 'volvo', 'kca 700j', 'ogesi@yahoo.com', '77777777777777', '02.11.2014 11:05AM', '02.11.2014 12:05AM', '60', 11),
('MAIN BUS/MATATU STAGE', 'PL 001', 'RESERVED', 'premier', 'volvo', 'kca 700j', 'ibrahimond75@gmail.com', '77777777777777', '02.11.2014 11:05AM', '02.11.2014 12:05AM', '60', 12),
('OGEMBO STREET', 'PL 004', 'RESERVED', 'lexus', 'volvo', 'kca 700j', 'aliasha94@yahoo.com', '785685789', '02.11.2014 11:05AM', '02.11.2014 12:05AM', '60', 13),
('AGAKHAN STREET', 'PL 001', 'RESERVED', 'premier', 'volvo', 'kca 700j', 'ibrahimond75@gmail.com', '785685789', '02.11.2014 11:05AM', '02.11.2014 12:05AM', '60', 14),
('OGEMBO STREET', 'PL 001', 'RESERVED', 'premier', 'volvo', 'kca 700j', 'ibrahimond75@gmail.com', '785685789', '02.11.2014 11:05AM', '02.11.2014 12:05AM', '60', 15),
('AGAKHAN STREET', 'PL 002', 'RESERVED', 'premier', 'volvo', 'kca 700j', 'ibrahimond75@gmail.com', '785685789', '02.11.2014 11:05AM', '02.11.2014 12:05AM', '60', 16),
('OGEMBO STREET', 'PL 001', 'RESERVED', 'premier', 'volvo', 'KCC 800H', 'kashmir@gmail.com', '8889999444444', '02.11.2014 11:05AM', '02.11.2014 12:05AM', '60', 17),
('OGEMBO STREET', 'PL 001', 'RESERVED', 'premier', 'volvo', 'KCC 800H', 'ibrahimond75@gmail.com', '77886766666556', '02.11.2014 11:05AM', '02.11.2014 12:05AM', '60', 18),
('OGEMBO STREET', 'PL 006', 'RESERVED', 'dfsdfsd', 'volvo', 'sfsdfsdf', 'ibrahimond75@gmail.com', '42525252', '02.11.2014 11:05AM', '02.11.2014 12:05AM', '1000', 19),
('', '2', 'PENDING', 'ddfdgfd', 'volvo', 'hfsdkjfhksjd', 'aaa', '', '', '', '', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `parking_lots`
--
ALTER TABLE `parking_lots`
  ADD PRIMARY KEY (`lotId`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reserveId`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`zoneId`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `parking_lots`
--
ALTER TABLE `parking_lots`
  MODIFY `lotId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reserveId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `zoneId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
