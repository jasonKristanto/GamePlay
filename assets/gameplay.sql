-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 19, 2019 at 10:46 AM
-- Server version: 10.2.3-MariaDB-log
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uaspemweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `ID` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`ID`, `genre`) VALUES
(2, 'action'),
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
  `description` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `productName`, `price`, `stock`, `picture`, `developer`, `description`) VALUES
(2, 'God of War', 600000, 6, 'asdasdasd/asdasdads', 'Santa Monica Studio', 'While the first seven games were loosely based on Greek mythology, this instalment takes the series to Norse mythology. Six of the nine realms of Norse mythology can be explored. Predating the Vikings, the majority of the game takes place in ancient Norway in the realm of Midgard, inhabited by humans and other creatures and is the same realm that the Greek world had existed in.'),
(3, 'Project Diva Future Tone DX', 500000, 2, 'asdasdasd/asdasd', 'Sega', 'This version includes all previous songs (including DLC) alongside new content, including DECO*27\'s hit song \"Ghost Rule,\" two modules, one for the former song, and one to commemorate Hatsune Miku\'s 10th anniversary. Two editions will be released. A regular edition at 7,990 yen, and a Limited Edition (Memorial Pack) at 11,990 yen, which includes the game, 3 Blu Ray discs which consist of 200 promotional videos from the series\' history, and special box featuring an illustration created by long time Vocaloid artist KEI.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privilege` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `privilege`) VALUES
('admin', 'admin', 'admin'),
('user', 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `genre`
--
ALTER TABLE `genre`
  ADD CONSTRAINT `genre_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `product` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
