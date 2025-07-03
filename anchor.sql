-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 07:45 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anchor`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `Id` int(11) NOT NULL,
  `EventName` text NOT NULL,
  `NumberOfParticipants` int(11) NOT NULL,
  `MaxNumberOfParticipant` int(11) NOT NULL,
  `EventPic` text NOT NULL,
  `EventDescription` text NOT NULL,
  `EventPrice` int(11) NOT NULL,
  `Type` text NOT NULL,
  `accountNum` int(11) NOT NULL,
  `isdeleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`Id`, `EventName`, `NumberOfParticipants`, `MaxNumberOfParticipant`, `EventPic`, `EventDescription`, `EventPrice`, `Type`, `accountNum`, `isdeleted`) VALUES
(1, 'Champions League Final', 75000, 75000, 'eventpic/istanbol.jpg', 'it\'s a final game between Man city and Ac milan  ', 100, 'sports', 2, 0),
(2, 'Painting course', 15, 15, 'eventpic/davinci.jpg', 'its a calss that teaching painting', 15, 'course', 3, 0),
(3, 'Night At The Races', 20, 20, 'eventpic/horses.jpg', 'the winner wins 100$ and the second one wins 50$', 100, 'sports tournament ', 4, 1),
(4, 'dwa', 20, 20, 'eventpic/horeia.png', 'km', 1, 'sports tournament course', 5, 1),
(5, 'Let\'s Cook', 30, 90, 'eventpic/cooking.jpg', 'cook coarse whith profeesional chef', 20, 'course', 6, 0),
(6, 'anchor21', 7, 21, 'eventpic/cooking.jpg', 'kjbvs', 23, 'sports tournament course', 2, 1),
(7, 'Hack Attack', 4, 90, 'eventpic/hackAttack.jpg', 'programming compettition at 5 am in street 16', 10, ' tournament ', 3, 0),
(8, 'Formula1', 9, 40, 'eventpic/formula.jpg', 'its a car racing at 4 pm', 120, 'sports tournament ', 4, 0),
(9, 'Piano Coarse', 23, 30, 'eventpic/piano.jpg', 'its a coarse for teching the Basics', 40, '  course', 5, 0),
(10, 'Road To Final', 59, 83, 'eventpic/RoadToFinal.jpg', 'Fifa Competition In Levelup at 4 am', 40, 'sports tournament ', 6, 0),
(11, 'BasketBall Final', 120, 300, 'eventpic/FinalB.jpg', 'Its a ?NBA Final Between Lakers and Newyork', 20, 'sports tournament ', 2, 0),
(12, 'Hi', 0, 312, 'eventpic/anchor1.jpg', 'kclacdscd', 12, 'sports  course', 2, 1),
(13, 'anchor', 0, 7687, 'eventpic/anchor1.jpg', 'kbkjhnhjl', 76875, 'sports  course', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `sendername` text NOT NULL,
  `senderemail` text NOT NULL,
  `msgcontent` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `sendername`, `senderemail`, `msgcontent`) VALUES
(1, 'shukri', 'shukri@gmail.com', 'nice Website'),
(2, 'Zaid Dass', 'ZAd@gmail.com', 'Hi The formula event is unlegal '),
(3, 'Zaid Dass', 'ZAd@gmail.com', 'ockjsjanj');

-- --------------------------------------------------------

--
-- Table structure for table `myaccounts`
--

CREATE TABLE `myaccounts` (
  `accountNum` int(11) NOT NULL,
  `Fname` text NOT NULL,
  `Lname` text DEFAULT NULL,
  `Password` text NOT NULL,
  `Email` text NOT NULL,
  `Adminuser` int(11) NOT NULL,
  `ProfPic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `myaccounts`
--

INSERT INTO `myaccounts` (`accountNum`, `Fname`, `Lname`, `Password`, `Email`, `Adminuser`, `ProfPic`) VALUES
(2, 'Yazan', 'AbuBakerman', '8cb2237d0679ca88db6464eac60da96345513964', 'yazan.walid2016@gmail.com', 0, 'image/horeia.png'),
(3, 'Osama', 'Dweikat', 'a8e4d523ac9fd0f183f3e098b00906faa8f99630', 'osama.dw12@gmail.com', 1, 'image/Anchor.jpg'),
(4, 'Zaid', 'Balout', 'eea281f2678037314a1c635eee3424f6e6613c6a', 'zaid4gamer@hotmail.com', 0, 'image/profImg.jpg'),
(5, 'Amr', 'Kurdi', 'd40a3ddb6161134bbe20351bcd491efa9d50ebf1', 'amr@gmailcom', 0, 'image/profImg.jpg'),
(6, 'mohammed', 'aker', '29160d5b9c1071984b764145c968c802bb97c820', 'aker@gmail.com', 0, 'image/profImg.jpg'),
(7, 'mohammed', 'kittani', 'd0b41a79e289668912a5c74e3ef7621b4f71faec', 'mohkit@hotmail.com', 0, 'image/profImg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `MemberId` int(11) NOT NULL,
  `FullName` text NOT NULL,
  `RegisterEmail` text NOT NULL,
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`MemberId`, `FullName`, `RegisterEmail`, `Id`) VALUES
(1, 'osama kjb', 'ore@gmail.com', 10),
(2, 'Mohammad qamar', 'abd@gmail.com', 8),
(3, 'Mohammad qamar', 'abd@gmail.com', 8),
(4, 'Mohammad qamar', 'abd@gmail.com', 8),
(5, 'Mohammad qamar', 'abd@gmail.com', 8),
(6, 'Mohammad qamar', 'abd@gmail.com', 8),
(7, 'Mohammad qamar', 'abd@gmail.com', 8),
(8, 'Mohammad qamar', 'abd@gmail.com', 8),
(9, 'Mohammad qamar', 'abd@gmail.com', 8),
(10, 'Mohammad qamar', 'abd@gmail.com', 8),
(26, 'osama kjb', 'ore@gmail.com', 5),
(27, 'osama kjb', 'ore@gmail.com', 5),
(28, 'Izzeddin Asmar ', 'ore@gmail.com', 5),
(29, 'ahmad mohsen', 'mo@gmail.com', 9),
(30, 'Maysoon', 'mo@gmail.com', 7),
(31, 'Maysoon', 'mo@gmail.com', 7),
(32, 'Maysoon', 'mo@gmail.com', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_ownerevent` (`accountNum`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myaccounts`
--
ALTER TABLE `myaccounts`
  ADD PRIMARY KEY (`accountNum`);

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`MemberId`),
  ADD KEY `Id` (`Id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `FK_ownerevent` FOREIGN KEY (`accountNum`) REFERENCES `myaccounts` (`accountNum`);

--
-- Constraints for table `registers`
--
ALTER TABLE `registers`
  ADD CONSTRAINT `registers_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `event` (`Id`),
  ADD CONSTRAINT `registers_ibfk_2` FOREIGN KEY (`Id`) REFERENCES `event` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
