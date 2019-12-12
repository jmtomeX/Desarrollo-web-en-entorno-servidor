-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql.bymhost.com
-- Tiempo de generación: 13-11-2019 a las 08:19:08
-- Versión del servidor: 5.7.25-log
-- Versión de PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_apuestas`
--
CREATE DATABASE IF NOT EXISTS `bd_apuestas` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bd_apuestas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apuestas`
--

CREATE TABLE `apuestas` (
  `bet_user_id` int(11) NOT NULL,
  `bet_game_id` int(11) NOT NULL,
  `bet_cant_apostada` int(11) NOT NULL,
  `bet_minuto_apuesta` int(2) NOT NULL,
  `bet_fecha_apuesta` datetime NOT NULL,
  `bet_premio` decimal(10,2) NOT NULL,
  `bet_estado` tinyint(4) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `apuestas`
--

INSERT INTO `apuestas` (`bet_user_id`, `bet_game_id`, `bet_cant_apostada`, `bet_minuto_apuesta`, `bet_fecha_apuesta`, `bet_premio`, `bet_estado`) VALUES
(2, 1, 10, 30, '2019-11-07 20:00:00', '0.00', -1),
(2, 2, 20, 60, '2019-11-07 20:00:00', '0.00', -1),
(2, 3, 10, 25, '2019-11-07 20:00:00', '0.00', -1),
(2, 4, 20, 60, '2019-11-07 20:00:00', '0.00', -1),
(2, 5, 20, 30, '2019-11-07 20:00:00', '0.00', -1),
(3, 1, 10, 65, '2019-11-07 00:00:00', '0.00', -1),
(3, 2, 10, 54, '2019-11-07 00:00:00', '0.00', -1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movs`
--

CREATE TABLE `movs` (
  `mov_id` int(11) NOT NULL,
  `mov_user` int(11) NOT NULL,
  `mov_game` int(11) NOT NULL,
  `mov_cantidad` decimal(10,2) NOT NULL,
  `mov_fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movs`
--

INSERT INTO `movs` (`mov_id`, `mov_user`, `mov_game`, `mov_cantidad`, `mov_fecha`) VALUES
(1, 2, 1, '10.00', '2019-11-07 20:00:00'),
(2, 2, 2, '20.00', '2019-11-07 20:00:00'),
(3, 2, 3, '10.00', '2019-11-07 20:00:00'),
(4, 2, 4, '20.00', '2019-11-07 20:00:00'),
(5, 2, 5, '20.00', '2019-11-07 20:00:00'),
(6, 3, 1, '10.00', '2019-11-07 00:00:00'),
(7, 3, 2, '10.00', '2019-11-07 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `game_id` int(11) NOT NULL,
  `game_partido` varchar(150) NOT NULL,
  `game_fecha` datetime NOT NULL,
  `game_resultado` int(11) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`game_id`, `game_partido`, `game_fecha`, `game_resultado`) VALUES
(1, 'Real Sociedad - Leganes', '2019-11-08 21:00:00', -1),
(2, 'Alaves - Valladolid', '2019-11-09 13:00:00', -1),
(3, 'Valencia - Granada', '2019-11-09 16:00:00', -1),
(4, 'Eibar - Real Madrid', '2019-11-09 18:30:00', -1),
(5, 'Barcelona - Celta', '2019-11-09 21:00:00', -1),
(6, '0', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` int(11) NOT NULL,
  `user_mail` varchar(30) NOT NULL,
  `user_nick` varchar(15) NOT NULL,
  `user_password` varchar(25) NOT NULL,
  `user_saldo` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `user_mail`, `user_nick`, `user_password`, `user_saldo`) VALUES
(1, 'admin@admin.com', 'admin', 'admin', 0),
(2, 'carlos@mail.com', 'carlos', 'carlos', 20),
(3, 'jm@mail.com', 'jm', 'jm', 80),
(11, 'correo@gmail.com', '', '', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apuestas`
--
ALTER TABLE `apuestas`
  ADD PRIMARY KEY (`bet_user_id`,`bet_game_id`),
  ADD KEY `bet_user_id` (`bet_user_id`,`bet_game_id`),
  ADD KEY `FK_partidos_game` (`bet_game_id`);

--
-- Indices de la tabla `movs`
--
ALTER TABLE `movs`
  ADD PRIMARY KEY (`mov_id`),
  ADD KEY `mov_user` (`mov_user`,`mov_game`),
  ADD KEY `FK_apuestas_game` (`mov_game`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`game_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_mail` (`user_mail`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `movs`
--
ALTER TABLE `movs`
  MODIFY `mov_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `apuestas`
--
ALTER TABLE `apuestas`
  ADD CONSTRAINT `FK_partidos_game` FOREIGN KEY (`bet_game_id`) REFERENCES `partidos` (`game_id`),
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`bet_user_id`) REFERENCES `usuarios` (`user_id`);

--
-- Filtros para la tabla `movs`
--
ALTER TABLE `movs`
  ADD CONSTRAINT `FK_apuestas_game` FOREIGN KEY (`mov_game`) REFERENCES `apuestas` (`bet_game_id`),
  ADD CONSTRAINT `FK_apuestas_user` FOREIGN KEY (`mov_user`) REFERENCES `apuestas` (`bet_user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
