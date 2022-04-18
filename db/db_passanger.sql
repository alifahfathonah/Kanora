-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2022 at 03:38 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_passanger`
--

-- --------------------------------------------------------

--
-- Table structure for table `airlane`
--

CREATE TABLE `airlane` (
  `airline_id` int(11) NOT NULL,
  `airlane_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airlane`
--

INSERT INTO `airlane` (`airline_id`, `airlane_name`) VALUES
(1, 'Garuda Indonesia'),
(2, 'Singapore Airlines'),
(3, 'Emirates'),
(4, 'Malaysia Airlines'),
(5, 'China Airlines');

-- --------------------------------------------------------

--
-- Table structure for table `passanger`
--

CREATE TABLE `passanger` (
  `id_passanger` int(11) NOT NULL,
  `passport_number` varchar(20) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(15) NOT NULL,
  `country` varchar(100) NOT NULL,
  `flight_number` varchar(20) NOT NULL,
  `airline_id` int(11) NOT NULL,
  `visa` text NOT NULL,
  `flight_date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passanger`
--

INSERT INTO `passanger` (`id_passanger`, `passport_number`, `role_id`, `name`, `birth_date`, `gender`, `country`, `flight_number`, `airline_id`, `visa`, `flight_date`, `created_at`) VALUES
(10, 'X00000', 1, 'Brian Dominic', '1997-07-16', 'Male', 'United Kingdom', 'GA 3660', 1, '1649404930_00ee3fe8d736801b4a90.png', '2022-04-08', '2022-04-08 11:10:00'),
(11, '367722', 1, 'muller', '1890-12-07', 'Female', 'Indonesian', 'GA 3660', 1, '1649420143_9b9ffc180a04c2cd3cd0.jpg', '2022-05-12', '2022-04-08 19:13:56'),
(12, '213454542', 2, 'Dika Indra', '1994-06-08', 'Male', 'Indonesian', 'MH 3003', 4, '1649424004_fb4d8c441d49c382ce44.png', '2022-02-07', '2022-04-08 20:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_type`) VALUES
(1, 'Warga Negara Asing / Foreign Citizen'),
(2, 'Warga Negara Indonesia / Indonesian Citizens');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `keterangan`) VALUES
(1, 'admin', 'adminkkp@kkpbsh.com', '21232f297a57a5a743894a0e4a801fc3', 'admin di aplikasi ini');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airlane`
--
ALTER TABLE `airlane`
  ADD PRIMARY KEY (`airline_id`);

--
-- Indexes for table `passanger`
--
ALTER TABLE `passanger`
  ADD PRIMARY KEY (`id_passanger`),
  ADD KEY `airlane` (`airline_id`),
  ADD KEY `role` (`role_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `passanger`
--
ALTER TABLE `passanger`
  MODIFY `id_passanger` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `passanger`
--
ALTER TABLE `passanger`
  ADD CONSTRAINT `airlane` FOREIGN KEY (`airline_id`) REFERENCES `airlane` (`airline_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
