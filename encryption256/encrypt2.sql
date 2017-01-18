-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 18, 2017 at 06:19 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `encrypt2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'password'),
('admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `username`, `password`) VALUES
(1, 'Piyush', 'piyu.live@live.com', 'piyurox', 'f049725d33f7fec11d59da63f8324b6b'),
(2, 'Piyush', 'piyu.live@live.com', 'piyurox', 'f049725d33f7fec11d59da63f8324b6b'),
(3, 'Piyush', 'piyu.live@live.com', 'piyush', 'f049725d33f7fec11d59da63f8324b6b'),
(4, 'abc', 'hhh@yyy.com', 'leo', 'f049725d33f7fec11d59da63f8324b6b'),
(5, 'Roy', 'roy@gm.com', 'roy', 'f049725d33f7fec11d59da63f8324b6b'),
(6, 'James', 'james@gm.com', 'james', 'f049725d33f7fec11d59da63f8324b6b'),
(7, 'Tavleen Singh', 'tavleen@purdue.com', 'tavleen', '4acb6d104f002f38c44dd93b8589c837'),
(8, 'Ashrita', 'ashrita@apple.com', 'ashrita', '303c95bef82e751dcbf7e14ecbf4b75a'),
(9, 'Michael Tu', 'tu@purdue1.edu', 'mu', '5f4dcc3b5aa765d61d8327deb882cf99'),
(10, 'Manghai Tu', 'tu15@purdue.edu', 'mtu', '5f4dcc3b5aa765d61d8327deb882cf99'),
(11, 'Prerna J', 'pj@gmail.com', 'pj', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `encrypted_jobid` varchar(10000) NOT NULL,
  `encrypted_opnum` varchar(10000) NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `encrypted_jobid`, `encrypted_opnum`, `login_id`) VALUES
(21, 'h6f4nE0nvawEYbdOpW+MqytYMD0Pkot0AEXime01+Fc=', 'bxDMfZ88BDyvSN03xqsqazDFKPJsWTLn3SzeY287V04=', 3),
(23, 'HECday/ChVKSflew5oK+sgdi7pppsHa/i/bYGRj3N28=', 'lsLaOkX7O8BZnVkGjoIPFoULSJbz8ehRx7hp4Sn+VD8=', 1),
(24, 'QMaLR6opNcUvMrqtDjSRktS6oyZldNHsv7LsoTqYqHo=', 'oxyQQlOzldG/NTadL4J4+MO6i7tcSt9Mn4CtEuW/COw=', 1),
(25, 'iZ6G5ymTIiUkCZPxozHRZohUpwcsDsTDeWbaXJ+v0vQ=', 'oMB+VApInHTd9hZEEq7xAksAI6EGuO5Yy/yz3eOSLyE=', 3),
(26, 'cVS+P7rXX0dT3q/AvA4q3IZHt0imK6eO1AS7ZPJdqio=', 'iw6yV3DF+xfuiY2Kr5wgkSuKrvJdgAjVpMbME9O24s0=', 3),
(27, 'uN7MX9fn60sknHGpOodDfAM9U608kLmm/7VC670VNDo=', 'lexJQrVW7shICWDGO+WSRSEL1Ut9LlWnJpbaOZShBpE=', 3),
(28, 'JsBJf4s5d7dQyW7LrE7VsJBezwoJGIicbh2wxjvwqew=', 'eskyD5mnDvqQokKvMHlofHwUE54vBSTWZ2JTLHwpqX8=', 3),
(29, 'mSupuTf7a6MNNU/iCXWVHIY/xezBfjO9Xvm8xBactGM=', '5YGftXdt+xhsqdAjBjHrclJNLzz+yoSQKT9Fhk6Grso=', 3),
(30, 'otwEPN+bkoqXVniYrctEQH6QN/CZ6JN5+FUSNjZOfpQ=', 'dxPBTr4vGXXHyd7KFkZbHIDtF91Ubik3iLTMm1y4NOI=', 3),
(31, 'KswnEyxm2vqGkUGJ5mpK5DniwJ0dcFbPlOjApy5+zi8=', 'eTpi3YEiaTnbcgTX9FTWFuW3F7iimfRPINX0tuw78nU=', 3),
(32, 'esX7dxVbiHNwGHXHmvzXNIIXmR8usRJm0NURJHtnDeY=', '6B7wCZ+dZv+lunQCyjpS/3c1u/v44U0q69F7Gk7gLGA=', 3),
(33, '6wCvz5x0nZZluo1zyFlCT2Q/Q+9EbSorW2+rMyNCkpw=', 'CmsX1QiIYrKlvgrWdVL4Zx33/UMA1HuG9RX0aTEszdM=', 3),
(34, '/mtevN0RQ7VcX6+lhxdI5+Xu1xjmjPWVs5U1U5Nsac8=', '8gX5LSWzEQ9w6M2kAApew53dEm7DywM3t21c2MxK08M=', 6),
(35, 'Kid7uEwHHoabLPLXMdVtdRTXIcgjzrQGERHVWyY1Sy4=', 'xWFjsJS3amS63GOCI8EmkmcPwvRtVAQHZdRpEKVSK7w=', 7),
(36, 'RD0jnORI7gX5WNYc2Erg+ZRv4Bi6RxyvxMnddPP9NAI=', 'E3SuxvAUYVwDKwD+o+5vvJ20YeVWRw7FEB0uZa3jVdU=', 8),
(37, 't0uWGkrTTXZw+5Jaog38IL+BqdlBo7JZkngXXA3DDJg=', 'SEp+7EVub3tUaVoE9JdOoT65y6F9ICk2I1dKOHqT77A=', 9),
(38, 'A34VDI4u8EW7ew+9GQajXDZ37JjHiN5TLqhmZw/aSgQ=', 'kCrTjxcSrVYvUYArenHgyXQkw9vx2lEmtO4HPgbVcQg=', 1),
(39, 'bXhXmgQKAKcyVxsiq/jnFeH2CeoA0bPvXr1phQN+Id8=', 'RUZdjz5V3m7ZS1alvAOZ8cazlXU9U3R8J3lSCXWA8tI=', 1),
(40, 'CEeqcXP/S4kf/sgCY1Oq2Rq9ScFzVVumA4SzxJ8Mu0k=', '9lYRSU/4IY8QHWgLyaApk9ILEgkOBJmqViz/bSB+LOI=', 1),
(41, 'AiX6mB8HQdTh8+EuJrSuJq+icynILXwNbPrWNDua6N8=', '3BBuRZxgXPLxl4/OJ/HDNoJn1gPct9cpERCMYLifil0=', 1),
(42, '/cbFOy9bdkcHuo+PnPBwD0HNKPAGyeutuPd3m27KKAg=', '7Qw2uE0yMbBZynfk8b9/l1027aPjR1FupDqPIW007RE=', 1),
(43, 'HcILfv9P+PLgU5Vc4x9O3TsMvmhnLacit1anGrM2qbI=', '4kdayKHIqgvtDqqu6LNOUTUlRauNMq8DQxjTOTMrkyU=', 1),
(44, 'bhPeBVdaxmdD9C5WzCEele8Fnc6se62MsqHHuS9BEOk=', 'P4HBJvPJihR5VQ6jx9FLDW500Hd+SPp/4F57N3DjRNg=', 10),
(45, 'NHUjOrw2zyPI8fIWiJGDr6xlh2infjeHyShTNqEgPDU=', 'BRzQWJQWa+vUuI+8KDWfqRK5L+hfDCOme/HDFg7vDlM=', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_products_1` (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
