-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2016 at 07:29 
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ControlAsistencia`
--

-- --------------------------------------------------------

--
-- Table structure for table `Becarios`
--

CREATE TABLE `Becarios` (
  `nickname` varchar(16) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(16) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `status` varchar(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `HorarioBecario`
--

CREATE TABLE `HorarioBecario` (
  `id_horariobecario` int(11) NOT NULL,
  `becario` varchar(16) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `hora_entrada` timestamp NULL DEFAULT NULL,
  `hora_salida` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Becarios`
--
ALTER TABLE `Becarios`
  ADD UNIQUE KEY `nickname` (`nickname`);

--
-- Indexes for table `HorarioBecario`
--
ALTER TABLE `HorarioBecario`
  ADD PRIMARY KEY (`id_horariobecario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `HorarioBecario`
--
ALTER TABLE `HorarioBecario`
  MODIFY `id_horariobecario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
