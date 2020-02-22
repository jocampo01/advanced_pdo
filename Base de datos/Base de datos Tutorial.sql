-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2020 a las 19:15:02
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tutorial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(50) NOT NULL DEFAULT '',
  `rememberme` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `name`, `location`) VALUES
(1, '2.mp4', 'videos/2.mp4'),
(2, '2750input.mp4', 'videos/2750input.mp4'),
(3, 'input.mp4', 'videos/input.mp4'),
(4, 'input.mp4', 'videos/input.mp4'),
(5, 'input.mp4', 'videos/input.mp4'),
(6, 'input.mp4', 'videos/input.mp4'),
(7, 'videoviral1.mp4', 'videos/videoviral1.mp4'),
(8, 'videoviral1.mp4', 'videos/videoviral1.mp4'),
(9, 'videoviral1.mp4', 'videos/videoviral1.mp4'),
(10, 'videoviral1.mp4', 'videos/videoviral1.mp4'),
(11, 'videoviral1.mp4', 'videos/videoviral1.mp4'),
(12, 'videoviral1.mp4', 'videos/videoviral1.mp4'),
(13, 'videoviral1.mp4', 'videos/videoviral1.mp4'),
(14, 'input.mp4', 'videos/input.mp4'),
(15, 'input.mp4', 'videos/input.mp4'),
(16, 'videoviral1.mp4', 'videos/videoviral1.mp4'),
(17, 'input.mp4', 'videos/input.mp4'),
(18, 'videoviral1.mp4', 'videos/videoviral1.mp4'),
(19, 'diegobautista.mp4', 'videos/diegobautista.mp4'),
(20, 'diegobautista.mp4', 'videos/diegobautista.mp4'),
(21, 'diegobautista.mp4', 'videos/diegobautista.mp4'),
(22, 'diegobautista.mp4', 'videos/diegobautista.mp4'),
(23, 'videoviral1.mp4', 'videos/videoviral1.mp4'),
(24, 'videoviral1.mp4', 'videos/videoviral1.mp4'),
(25, 'Wildlife.wmv', 'videos/Wildlife.wmv'),
(26, 'Wildlife.wmv', 'videos/Wildlife.wmv'),
(27, 'Wildlife.wmv', 'videos/Wildlife.wmv'),
(28, 'videoviral1.mp4', 'videos/videoviral1.mp4'),
(29, 'videoviral1.mp4', 'videos/videoviral1.mp4');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
