-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 03-06-2022 a las 02:24:56
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fotografia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE `album` (
  `id` int(255) NOT NULL,
  `titulo` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(3000) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`id`, `titulo`, `descripcion`, `fecha`) VALUES
(5, 'titulo-1', 'Una descripcion larga pero no tan larga', '2022-05-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id` int(255) NOT NULL,
  `foto` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `album` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id`, `foto`, `descripcion`, `fecha`, `album`) VALUES
(18, '84Captura de pantalla (16).png', 'Una descripcion larga pero no tan larga', '2022-05-26 03:02:05', 5),
(19, '415Captura de pantalla (1).png', '', '2022-06-03 02:13:01', 5),
(20, '480Captura de pantalla (3).png', '', '2022-06-03 02:13:02', 5),
(21, '407Captura de pantalla (4).png', '', '2022-06-03 02:13:02', 5),
(22, '763Captura de pantalla (5).png', '', '2022-06-03 02:13:02', 5),
(23, '125Captura de pantalla (12).png', '', '2022-06-03 02:13:02', 5),
(24, '322Captura de pantalla (14).png', '', '2022-06-03 02:13:02', 5),
(25, '35Captura de pantalla (15).png', '', '2022-06-03 02:13:02', 5),
(26, '111Captura de pantalla (16).png', '', '2022-06-03 02:13:02', 5),
(27, '781Captura de pantalla (23).png', '', '2022-06-03 02:13:02', 5),
(28, '29Captura de pantalla (24).png', '', '2022-06-03 02:13:02', 5),
(29, '525Captura de pantalla (25).png', '', '2022-06-03 02:13:02', 5),
(30, '81Captura de pantalla (26).png', '', '2022-06-03 02:13:03', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(8) NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `password` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(22, 'Lucas123', 'lucas@mail.com', 12345678);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album` (`album`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `album`
--
ALTER TABLE `album`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`album`) REFERENCES `album` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
