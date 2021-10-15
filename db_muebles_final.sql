-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2021 at 04:50 AM
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
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `mail`, `pass`) VALUES
(1, 'admin1', '$2y$10$194ozgMXVLTpewyskXNvru6SDdiV3thmNKJHxH/oTbxwF2GeN/.IC'),
(2, 'admin1', '1234'),
(3, 'admin', '$2y$10$BW9WBeq6R0SXuji/i.CwDeorAMgEMWBvacjoX4aVNw18edPxQOs.6'),
(4, 'admin3', '$2y$10$ljJNH.7.BcnjW6HVnWADCuJ3UyDdHfJVnHwC6aiPN818IVbOJZDNi'),
(5, 'asd', '$2y$10$N0CGLfoF7xzgSJe88k6unOtob62a9xSvUi5KIAe9.Gme1Zv17zmSa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mueble`
--
ALTER TABLE `mueble`
  MODIFY `id_mueble` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mueble`
--
ALTER TABLE `mueble`
  ADD CONSTRAINT `mueble_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
