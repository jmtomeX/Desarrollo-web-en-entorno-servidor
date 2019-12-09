-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2019 a las 17:12:26
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_anuncios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE `anuncios` (
  `an_id` int(11) NOT NULL,
  `an_titulo` varchar(40) NOT NULL,
  `an_descripcion` varchar(200) DEFAULT NULL,
  `an_precio` float NOT NULL,
  `an_foto` varchar(40) DEFAULT NULL,
  `an_vistas` int(11) NOT NULL,
  `an_visitas` int(11) NOT NULL,
  `an_us_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`an_id`, `an_titulo`, `an_descripcion`, `an_precio`, `an_foto`, `an_vistas`, `an_visitas`, `an_us_id`) VALUES
(1, 'Coche eléctrico', 'losdaoisdfañsdfoijn dsafjñ sa\r\n asdfhjsfoahfñ\r\nf sdañfji', 21000, '', 21, 2, 1),
(6, 'gsarhoñ', 'ñsgilah', 534, '', 17, 0, 1),
(10, 'sdfg', 'sdfg', 4444, '', 14, 7, 1),
(15, 'sdfg', 'werw', 44, '', 14, 0, 1),
(21, 'Bici Montaña', 'Cannondale Habit', 4999, 'ac3e6ded68cbcfdfe91381d491dcbe97.jpg', 21, 3, 1),
(22, 'Bici carretera ', 'Orbea Orca', 2500, '68aed71dff6733a244297fd31c4b0396.jpg', 18, 12, 23),
(23, 'Coche eléctrico', 'losdaoisdfañsdfoijn dsafjñ sa\r\n asdfhjsfoahfñ\r\nf sdañfji', 21000, '', 21, 2, 1),
(24, 'gsarhoñ', 'ñsgilah', 534, '', 17, 0, 1),
(25, 'sdfg', 'sdfg', 4444, '', 14, 7, 1),
(26, 'sdfg', 'werw', 44, '', 14, 0, 1),
(27, 'Bici Montaña', 'Cannondale Habit', 4999, 'ac3e6ded68cbcfdfe91381d491dcbe97.jpg', 21, 3, 1),
(28, 'Bici carretera ', 'Orbea Orca', 2500, '68aed71dff6733a244297fd31c4b0396.jpg', 18, 12, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `activation` varchar(300) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `us_id` int(11) NOT NULL,
  `us_name` varchar(25) NOT NULL,
  `us_email` varchar(40) NOT NULL,
  `us_password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`us_id`, `us_name`, `us_email`, `us_password`) VALUES
(1, 'jose mari', 'jm@jm.com', '1234'),
(3, 'pp', 'pp@pp.com', '1234'),
(4, 'v', 'v@v.com', 'v'),
(14, '234', 'pp@pp.co', '111111'),
(15, 'gaw', 'pp@pp.co', '111111'),
(21, 'sadf', 'iremti2@gmail.com', '111111'),
(23, 'jm', '2@gmail.com', '111111'),
(24, 'yw554546', 'yww', '111111');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`an_id`),
  ADD KEY `an_us_id` (`an_us_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `activation` (`activation`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`us_id`),
  ADD KEY `us_email` (`us_email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `an_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `anuncios_ibfk_1` FOREIGN KEY (`an_us_id`) REFERENCES `usuarios` (`us_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
