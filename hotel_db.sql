-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql310.infinityfree.com
-- Generation Time: Apr 04, 2025 at 07:38 AM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_37447439_hotel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_master`
--

CREATE TABLE `booking_master` (
  `BookingId` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `HotelId` int(11) DEFAULT NULL,
  `RoomId` int(11) DEFAULT NULL,
  `DateOfCheckIn` date DEFAULT NULL,
  `DateOfCheckout` date DEFAULT NULL,
  `MobileNumber` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_master`
--

INSERT INTO `booking_master` (`BookingId`, `UserId`, `HotelId`, `RoomId`, `DateOfCheckIn`, `DateOfCheckout`, `MobileNumber`) VALUES
(2, 4, 3, 3, '2024-12-02', '2024-12-03', '8787253841'),
(3, 5, 3, 3, '2024-12-20', '2024-12-21', '8787253841'),
(4, 4, 3, 3, '2025-01-01', '2025-01-02', '0878725384');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `CustomerId` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `PhoneNumber` varchar(10) DEFAULT NULL,
  `Concern` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_master`
--

CREATE TABLE `hotel_master` (
  `HotelId` int(11) NOT NULL,
  `LocationId` int(11) DEFAULT NULL,
  `Hotel_Name` varchar(255) DEFAULT NULL,
  `HotelImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_master`
--

INSERT INTO `hotel_master` (`HotelId`, `LocationId`, `Hotel_Name`, `HotelImage`) VALUES
(1, 1, 'Royal Park Resort', 'img20.png'),
(2, 2, 'One & Only The Palm', 'img14.png'),
(3, 3, 'Hotel Arafa Inn', 'img16.png'),
(4, 4, 'Trinty Heights', 'img18.png'),
(5, 5, 'Hotel Sun Park', 'img15.png');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room_alloted`
--

CREATE TABLE `hotel_room_alloted` (
  `S_No` int(11) NOT NULL,
  `HotelId` int(11) DEFAULT NULL,
  `RoomId` int(11) DEFAULT NULL,
  `No_Of_Rooms` int(11) DEFAULT NULL,
  `No_Of_Guests` int(11) DEFAULT NULL,
  `RatePerNight` decimal(10,2) DEFAULT NULL,
  `RoomImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_room_alloted`
--

INSERT INTO `hotel_room_alloted` (`S_No`, `HotelId`, `RoomId`, `No_Of_Rooms`, `No_Of_Guests`, `RatePerNight`, `RoomImage`) VALUES
(1, 4, 3, 150, 2, '2900.00', 'img6.png'),
(2, 2, 1, 180, 2, '3200.00', 'img2.png'),
(3, 1, 1, 150, 2, '2800.00', 'img1.png'),
(4, 3, 3, 250, 2, '3800.00', 'img2.png'),
(5, 5, 2, 100, 4, '5600.00', 'img13.png'),
(6, 5, 4, 200, 4, '3800.00', 'img12.png');

-- --------------------------------------------------------

--
-- Table structure for table `location_master`
--

CREATE TABLE `location_master` (
  `LocationId` int(11) NOT NULL,
  `Location` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location_master`
--

INSERT INTO `location_master` (`LocationId`, `Location`) VALUES
(1, 'Manali'),
(2, 'Dubai'),
(3, 'Bangalore'),
(4, 'Dharamshala'),
(5, 'Chandigarh');

-- --------------------------------------------------------

--
-- Table structure for table `room_master`
--

CREATE TABLE `room_master` (
  `RoomId` int(11) NOT NULL,
  `Room_Type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_master`
--

INSERT INTO `room_master` (`RoomId`, `Room_Type`) VALUES
(1, 'Double AC'),
(2, 'Deluxe AC'),
(3, 'Double Non AC'),
(4, 'Deluxe Non AC');

-- --------------------------------------------------------

--
-- Table structure for table `users_master`
--

CREATE TABLE `users_master` (
  `UserId` int(11) NOT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `UserTypeId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_master`
--

INSERT INTO `users_master` (`UserId`, `UserName`, `Email`, `Password`, `UserTypeId`) VALUES
(4, 'Hargun Singh Khera', 'hargunsinghkhera@gmail.com', '$2y$10$gH5XLUfgaxsOolsyki.nQeohMXa6rttTB/WQl8Wy1kiW42eLWSb7W', 2),
(5, 'Hargun', 'hargun@gmail.com', '$2y$10$E8gYPq66a1Kr4qTzygqwRe0s7AHq/E1lb6/J2Nm9Q.ViGeWNFx1RK', 1),
(6, 'a', 'a@mail.com', '$2y$10$caucHH91JhoGP7wQdPJZGeLngTcbDcW3zlxs6fB4QEuLgM9pNe/GK', 2),
(7, 'Hargun', 'hargunsinghkhera8@gmail.com', '$2y$10$nlIzI2EPfR.HgKDZQKXBge3u3D22ADs8xYWHvIE9kYSUQhiTMG8bq', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_type_master`
--

CREATE TABLE `user_type_master` (
  `usertypeid` int(11) NOT NULL,
  `user_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_type_master`
--

INSERT INTO `user_type_master` (`usertypeid`, `user_type`) VALUES
(1, 'Admin'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_master`
--
ALTER TABLE `booking_master`
  ADD PRIMARY KEY (`BookingId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `HotelId` (`HotelId`),
  ADD KEY `RoomId` (`RoomId`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`CustomerId`);

--
-- Indexes for table `hotel_master`
--
ALTER TABLE `hotel_master`
  ADD PRIMARY KEY (`HotelId`),
  ADD KEY `LocationId` (`LocationId`);

--
-- Indexes for table `hotel_room_alloted`
--
ALTER TABLE `hotel_room_alloted`
  ADD PRIMARY KEY (`S_No`),
  ADD KEY `HotelId` (`HotelId`),
  ADD KEY `RoomId` (`RoomId`);

--
-- Indexes for table `location_master`
--
ALTER TABLE `location_master`
  ADD PRIMARY KEY (`LocationId`);

--
-- Indexes for table `room_master`
--
ALTER TABLE `room_master`
  ADD PRIMARY KEY (`RoomId`);

--
-- Indexes for table `users_master`
--
ALTER TABLE `users_master`
  ADD PRIMARY KEY (`UserId`),
  ADD KEY `usertypeid` (`UserTypeId`);

--
-- Indexes for table `user_type_master`
--
ALTER TABLE `user_type_master`
  ADD PRIMARY KEY (`usertypeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_master`
--
ALTER TABLE `booking_master`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `CustomerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel_master`
--
ALTER TABLE `hotel_master`
  MODIFY `HotelId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hotel_room_alloted`
--
ALTER TABLE `hotel_room_alloted`
  MODIFY `S_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `location_master`
--
ALTER TABLE `location_master`
  MODIFY `LocationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room_master`
--
ALTER TABLE `room_master`
  MODIFY `RoomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_master`
--
ALTER TABLE `users_master`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_type_master`
--
ALTER TABLE `user_type_master`
  MODIFY `usertypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_master`
--
ALTER TABLE `booking_master`
  ADD CONSTRAINT `booking_master_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users_master` (`UserId`),
  ADD CONSTRAINT `booking_master_ibfk_2` FOREIGN KEY (`HotelId`) REFERENCES `hotel_master` (`HotelId`),
  ADD CONSTRAINT `booking_master_ibfk_3` FOREIGN KEY (`RoomId`) REFERENCES `room_master` (`RoomId`);

--
-- Constraints for table `hotel_master`
--
ALTER TABLE `hotel_master`
  ADD CONSTRAINT `hotel_master_ibfk_1` FOREIGN KEY (`LocationId`) REFERENCES `location_master` (`LocationId`);

--
-- Constraints for table `hotel_room_alloted`
--
ALTER TABLE `hotel_room_alloted`
  ADD CONSTRAINT `hotel_room_alloted_ibfk_1` FOREIGN KEY (`HotelId`) REFERENCES `hotel_master` (`HotelId`),
  ADD CONSTRAINT `hotel_room_alloted_ibfk_2` FOREIGN KEY (`RoomId`) REFERENCES `room_master` (`RoomId`);

--
-- Constraints for table `users_master`
--
ALTER TABLE `users_master`
  ADD CONSTRAINT `users_master_ibfk_1` FOREIGN KEY (`UserTypeId`) REFERENCES `user_type_master` (`usertypeid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
