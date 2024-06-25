-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 02:33 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `datos`
--

CREATE TABLE `datos` (
  `USUARIO` varchar(60) NOT NULL,
  `PASS` varchar(60) NOT NULL,
  `FECHA` varchar(60) NOT NULL,
  `MAIL` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datos`
--

INSERT INTO `datos` (`USUARIO`, `PASS`, `FECHA`, `MAIL`) VALUES
('lucho', '123', '', ''),
('lucho', '23', '04/06/24/19:29', ''),
('lucho', '23', '04/06/24/19:30', ''),
('zanini', '', '04/06/24/20:55', ''),
('zanini', '', '04/06/24/20:55', ''),
('lucho', '66', '04/06/24/20:56', ''),
('valen', '1898', '04/06/24/20:57', ''),
('valen', 'cae', '04/06/24/20:57', ''),
('', '', '04/06/24/20:58', ''),
('', '', '04/06/24/21:15', ''),
('Luciano abuin', '1234', '11/06/24/19:12', 'labuin@murialdo.edu.ar'),
('Luciano abuin', '1234', '11/06/24/19:14', 'labuin@murialdo.edu.ar'),
('Luciano abuin', '1234', '11/06/24/19:15', 'labuin@murialdo.edu.ar'),
('Luciano abuin', '1234', '11/06/24/19:15', 'labuin@murialdo.edu.ar'),
('Luciano abuin', '1234', '11/06/24/19:15', 'labuin@murialdo.edu.ar'),
('Luciano abuin', '123', '11/06/24/19:33', 'labuin@murialdo.edu.ar'),
('santi barrios', '17', '11/06/24/19:35', 'santi@murialdo.edu.ar'),
('Valentin Azpiazu', '6894', '11/06/24/19:38', 'vazpiazu@murialdo.edu.ar'),
('Juanpa', '12345', '11/06/24/21:08', 'juanpablo@gmail.com'),
('santi', '1234', '11/06/24/21:10', 'santi@gmail.com'),
('Lucho', '1234', '11/06/24/21:14', 'lucianoabuin2@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
