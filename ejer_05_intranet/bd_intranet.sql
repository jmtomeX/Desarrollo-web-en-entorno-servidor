-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2019 a las 22:26:36
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_intranet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enlaces_videos`
--

CREATE TABLE `enlaces_videos` (
  `enl_id` int(11) NOT NULL,
  `enl_titulo` varchar(60) NOT NULL,
  `enl_url` varchar(60) NOT NULL,
  `enl_video_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `enlaces_videos`
--

INSERT INTO `enlaces_videos` (`enl_id`, `enl_titulo`, `enl_url`, `enl_video_id`) VALUES
(1, 'DEF CON DOS', 'https://www.mondosonoro.com/artistas-musica/def-con-dos/', 3),
(2, '', '', 3),
(3, 'yrklylr', 'ylrlry', 3),
(6, 'tkeek', 'kettek', 3),
(8, 'gvf', 'iugiugi', 4),
(9, 'o8yiughiu', 'kmbgkgjkg', 3),
(11, '', '', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(8) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `password` varchar(16) NOT NULL,
  `date_insert` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `date_insert`) VALUES
(1, 'josemari', '1234', '0000-00-00 00:00:00'),
(4, 'Aitor', '1111', '0000-00-00 00:00:00'),
(8, 'jdyjd', 'djydjy', '0000-00-00 00:00:00'),
(9, 'fhydj', 'djyj', '0000-00-00 00:00:00'),
(10, 'erueu', 'rjejhu', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_videos`
--

CREATE TABLE `usuarios_videos` (
  `id_user` int(11) NOT NULL,
  `id_video` int(11) NOT NULL,
  `cont_vistas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` int(10) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `vid_url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `titulo`, `vid_url`) VALUES
(2, 'Pink Floyd,Dire Straits, bgfdsfadfa', '<iframe width="560" height="315" src="https://www.youtube.com/embed/_tQerMEpbn4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'),
(3, 'CLÃSSICOS DO ROCK - MELHORES MÃšSICAS D', '<iframe width="560" height="315" src="https://www.youtube.com/embed/BWcmD_de99g" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'),
(4, 'Def Con Dos - Mamarrachismo Power (Video', '<iframe width="560" height="315" src="https://www.youtube.com/embed/PkI31FumiUU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `enlaces_videos`
--
ALTER TABLE `enlaces_videos`
  ADD PRIMARY KEY (`enl_id`),
  ADD KEY `enl_video_id` (`enl_video_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_videos`
--
ALTER TABLE `usuarios_videos`
  ADD PRIMARY KEY (`id_user`,`id_video`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `enlaces_videos`
--
ALTER TABLE `enlaces_videos`
  MODIFY `enl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `enlaces_videos`
--
ALTER TABLE `enlaces_videos`
  ADD CONSTRAINT `enlaces_videos_ibfk_1` FOREIGN KEY (`enl_video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
