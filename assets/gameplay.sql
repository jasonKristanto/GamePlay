-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 30, 2019 at 05:09 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gameplay`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin'),
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `ID` int(11) NOT NULL,
  `genre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`ID`, `genre`) VALUES
(1, 'action'),
(2, 'adventure'),
(3, 'music');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `developer` varchar(255) NOT NULL,
  `description` varchar(8000) NOT NULL,
  `genreID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `productName`, `price`, `stock`, `picture`, `developer`, `description`, `genreID`) VALUES
(1, 'God of War', 600000, 11, 'god_of_war1.jpg', 'Santa Monica Studio', 'While the first seven games were loosely based on Greek mythology, this instalment takes the series to Norse mythology. Six of the nine realms of Norse mythology can be explored. Predating the Vikings, the majority of the game takes place in ancient Norway in the realm of Midgard, inhabited by humans and other creatures and is the same realm that the Greek world had existed in.', '1;2'),
(2, 'Project Diva Future Tone DX', 500000, 5, 'Project_Diva_Future_Tone_DX.jpg', 'Sega', 'This version includes all previous songs (including DLC) alongside new content, including DECO*27\'s hit song ', '3'),
(3, 'adawda', 100000, 12, 'Kim_So_Hyun_(1)1.jpg', 'asdawd', 'adwad', '2;3'),
(4, 'adawda', 121231, 123134, 'Kim_So_Hyun_(3).jpg', 'asdawd', 'adwad', '2;3'),
(5, 'adawda', 121313, 12113, 'large.jpg', 'asdawd', 'adwad', '2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(7) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `email`, `picture`, `alamat`, `kota`) VALUES
(1, 'jasonkristanto', 'JKristant0', 'Jason Kristanto', 'jasonkristanto@jasonkristanto.com', 'ArimaKousei.jpg', 'Ruko Pascal Timur No. 5, Tangerang, Banten', 'Tangerang'),
(2, 'andi', 'andi', 'andi', 'andi@andi.com', 'SoraKeybladePose.jpg', 'Ruko Newton', 'Tangerang'),
(3, 'susi', 'susi', 'susi', 'susi@susi.com', 'Kaori_Miyazono2.png', 'Ruko Dalton', 'Tangerang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
