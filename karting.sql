-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2022 at 03:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karting`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnikID` int(10) NOT NULL,
  `ime` varchar(255) DEFAULT NULL,
  `prezime` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `korisnickoIme` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `vreme_pravljenja` timestamp NULL DEFAULT current_timestamp(),
  `drzava` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnikID`, `ime`, `prezime`, `email`, `korisnickoIme`, `password`, `vreme_pravljenja`, `drzava`) VALUES
(7, 'Petar', 'Milenkovic', 'pm20180025@student.fon.bg.ac.rs', 'petar', 'petar123', '2022-05-20 13:45:00', 'Serbia'),
(8, 'Sofija', 'Davidovic', 'zoff@gmail.com', 'sofija', 'sofija123', '2022-05-20 13:45:30', 'Spain'),
(9, 'Jovan', 'Markovic', 'jovan@gmail.com', 'jovan', 'jovan123', '2022-05-20 13:45:59', 'Montenegro');

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `sportID` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`sportID`, `naziv`) VALUES
(1, 'Drag'),
(2, 'Drift'),
(3, 'Time Attack'),
(4, 'Race'),
(5, 'Hot Lap');

-- --------------------------------------------------------

--
-- Table structure for table `termin2`
--

CREATE TABLE `termin2` (
  `terminID` int(11) NOT NULL,
  `rb` int(50) NOT NULL,
  `sportID` int(50) NOT NULL,
  `rezervisao` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datumRezervacije` datetime NOT NULL,
  `cena` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `termin2`
--

INSERT INTO `termin2` (`terminID`, `rb`, `sportID`, `rezervisao`, `datumRezervacije`, `cena`) VALUES
(44, 3, 2, 'Janko Milosevic', '2022-05-23 00:00:00', 5000),
(45, 2, 3, 'Stefan Mandzukic', '2022-05-29 00:00:00', 3000),
(46, 5, 1, 'Marko Nikolic', '2022-06-14 00:00:00', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `trajanje`
--

CREATE TABLE `trajanje` (
  `rb` int(11) NOT NULL,
  `trajanje` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trajanje`
--

INSERT INTO `trajanje` (`rb`, `trajanje`) VALUES
(1, '15'),
(2, '30'),
(3, '60'),
(5, '480');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnikID`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`sportID`);

--
-- Indexes for table `termin2`
--
ALTER TABLE `termin2`
  ADD PRIMARY KEY (`terminID`);

--
-- Indexes for table `trajanje`
--
ALTER TABLE `trajanje`
  ADD PRIMARY KEY (`rb`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnikID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `sportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `termin2`
--
ALTER TABLE `termin2`
  MODIFY `terminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `trajanje`
--
ALTER TABLE `trajanje`
  MODIFY `rb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
