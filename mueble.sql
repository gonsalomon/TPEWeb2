-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 04:53 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mueble`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`) VALUES
(5, 'Muebles cocina', 'Son muebles que están normalmente en una cocina'),
(6, 'Muebles pieza', 'Son muebles que están normalmente en una pieza');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `mueble_id` int(11) NOT NULL,
  `user_mail` varchar(50) NOT NULL,
  `puntaje` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `mueble_id`, `user_mail`, `puntaje`) VALUES
(10, 'Hello world, first comment!', 1, 'asd', 5),
(29, 'Hello!', 1, 'asd', 3),
(30, 'hello haha', 1, 'asd', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mueble`
--

CREATE TABLE `mueble` (
  `id_mueble` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `precio` double NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mueble`
--

INSERT INTO `mueble` (`id_mueble`, `nombre`, `descripcion`, `precio`, `id_categoria`) VALUES
(1, 'Mesa pa desayunar', 'rocket science', 1234, 5),
(2, 'Cama', 'Es una cama. Esta tampoco es ciencia de cohetes.', 8750, 6),
(3, 'Silla', 'Una silla de pino. Asiento a 45cm de altura, respa', 1500, 5),
(4, 'Silla', 'Silla de pinotea (mejor madera). Asiento a 45cm de', 3000, 5),
(5, 'Mesa comedor', 'Mesa de pino, medidas 220x105x80.', 12500, 5),
(6, 'Cama', 'Cama de pino de una plaza, medidas 200x85x(30 colc', 8750, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `mail`, `pass`, `is_admin`) VALUES
(4, 'admin3', '$2y$10$ljJNH.7.BcnjW6HVnWADCuJ3UyDdHfJVnHwC6aiPN818IVbOJZDNi', 0),
(5, 'asd', '$2y$10$N0CGLfoF7xzgSJe88k6unOtob62a9xSvUi5KIAe9.Gme1Zv17zmSa', 1),
(6, 'test1', '$2y$10$weyJXzdNpOjzKea4R4F51./ZE0tjljemvxnbUXsOAkCmpciohhvfm', 0),
(7, 'matias', '$2y$10$CmWhdzV32kKf4S7BwooGUO7wif0j9bgGDgkuOdEGnJ0KQt5iRd04K', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mueble_id` (`mueble_id`),
  ADD KEY `user_mail` (`user_mail`);

--
-- Indexes for table `mueble`
--
ALTER TABLE `mueble`
  ADD PRIMARY KEY (`id_mueble`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `mueble`
--
ALTER TABLE `mueble`
  MODIFY `id_mueble` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `mueble_id` FOREIGN KEY (`mueble_id`) REFERENCES `mueble` (`id_mueble`),
  ADD CONSTRAINT `user_mail` FOREIGN KEY (`user_mail`) REFERENCES `users` (`mail`);

--
-- Constraints for table `mueble`
--
ALTER TABLE `mueble`
  ADD CONSTRAINT `mueble_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
