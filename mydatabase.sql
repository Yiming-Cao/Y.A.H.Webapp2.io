-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jun 21, 2024 at 11:46 AM
-- Server version: 5.7.44
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `bestemmingen`
--

CREATE TABLE `bestemmingen` (
  `id` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `land` varchar(50) NOT NULL,
  `beschrijving` text NOT NULL,
  `HuurAuto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bestemmingen`
--

INSERT INTO `bestemmingen` (`id`, `naam`, `land`, `beschrijving`, `HuurAuto`) VALUES
(1, '1 week reizen', 'Tahiti', 'Kom een week reizen bij Tahiti', ''),
(2, 'Hongkong', 'China', 'Hotel', ''),
(3, 'saitama', 'Japan', 'Mooi appartement', ''),
(4, 'Florida', 'Amerika', 'Een erg goedkoope appartement', ''),
(5, 'Parijs', 'Frankrijk', 'De stad van love', '');

-- --------------------------------------------------------

--
-- Table structure for table `boekingen`
--

CREATE TABLE `boekingen` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `reis_id` int(255) NOT NULL,
  `persoonen` int(90) NOT NULL,
  `deTotalePrijs` decimal(65,0) NOT NULL,
  `startdatum` date NOT NULL,
  `einddatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reizen`
--

CREATE TABLE `reizen` (
  `id` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `beschrijving` text NOT NULL,
  `prijs` decimal(10,2) NOT NULL,
  `bestemmingen_id` int(11) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reizen`
--

INSERT INTO `reizen` (`id`, `naam`, `beschrijving`, `prijs`, `bestemmingen_id`, `file`) VALUES
(1, 'Italië', 'Een mooie tropische eiland', 260.00, 1, 'italië.jpg'),
(2, 'China', 'Een mooie vlieg rit ', 300.00, 2, 'hongkong.jpg'),
(3, 'Japan', 'Een erg populaire plek voor touristen', 150.00, 3, 'saitama.jpg'),
(4, 'Amerika', 'Met een prachtige vlieg rit', 360.00, 4, 'florida.jpeg'),
(5, 'Frankrijk', 'Een prachtige vlieg rit naar Parijs', 200.00, 5, 'parijs.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `id` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `Omschrijving` varchar(50) NOT NULL,
  `BestemmingenID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`id`, `naam`, `Omschrijving`, `BestemmingenID`) VALUES
(1, 'first naam', 'Omschrijving of FIRST naam', 0),
(2, 'second naam', 'Omschrijving of second naam', 0),
(3, 'third,naam', 'Omschrijving of third naam', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `user_data_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `user_data_id`) VALUES
(1, 'Abdelilah', 'abdelilah@gmail.com', '123', 1),
(2, 'Yiming', 'yiming@gmail.com', '123', 2),
(3, 'admin', 'admin@gmail.com', '123', 3),
(4, 'Bart', 'bart@gmail.com', '123', 4),
(5, 'Harm', 'harm@gmail.com', '123', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(255) NOT NULL,
  `voornaam` varchar(90) NOT NULL,
  `achternaam` varchar(90) NOT NULL,
  `leeftijd` int(90) NOT NULL,
  `woonadres` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `voornaam`, `achternaam`, `leeftijd`, `woonadres`) VALUES
(1, 'Abdelilah', 'Benhaddi', 20, 'Watertorstraat,22 6533PV'),
(2, 'Yiming', 'Cao', 22, 'Zwanenveld 3044, 6538zz'),
(3, 'admin', 'admin', 20, 'admin 34, 1234ad'),
(4, 'Bart', 'Kuppeveld', 28, 'somewhere 69, 2196go'),
(5, 'Harm', 'van Kempen', 17, 'idontknow 21, 2169ha'),
(6, 'test', 'test', 21, 'test 12, 1234ts');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bestemmingen`
--
ALTER TABLE `bestemmingen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boekingen`
--
ALTER TABLE `boekingen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reizen`
--
ALTER TABLE `reizen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bestemmingen`
--
ALTER TABLE `bestemmingen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `boekingen`
--
ALTER TABLE `boekingen`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reizen`
--
ALTER TABLE `reizen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
