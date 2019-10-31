-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2019 a las 19:36:18
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
-- Base de datos: `bd_intranet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enlaces_videos`
--

CREATE TABLE `enlaces_videos` (
  `enl_id` int(11) NOT NULL,
  `enl_titulo` varchar(50) NOT NULL,
  `enl_url` varchar(150) NOT NULL,
  `enl_video_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `enlaces_videos`
--

INSERT INTO `enlaces_videos` (`enl_id`, `enl_titulo`, `enl_url`, `enl_video_id`) VALUES
(1, 'la familia adams', 'https://www.espinof.com/criticas/familia-addams-divertido-reboot-que-deja-ganas-aventuras-mitico-clan', 25),
(6, 'Trailer', 'https://www.youtube.com/watch?v=3ftA5qklI4M', 25),
(9, 'LA familia afams 3', 'https://as.com/meristation/2019/08/08/noticias/1565259021_910121.html', 25),
(10, 'paco', 'http://www.google.es', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_insert` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `date_insert`) VALUES
(1, 'josemari', '1234', '0000-00-00 00:00:00'),
(15, 'aaaa', 'aaaa', '0000-00-00 00:00:00'),
(17, 'peperi', '1111', '2019-10-21 16:56:41'),
(19, 'rdh', 'hd', '2019-10-22 19:27:11'),
(20, 'trht', 'trhrth', '2019-10-22 19:34:52'),
(21, 'tryr', 'rtrytr', '2019-10-22 19:35:21'),
(22, 'trhtr', 'trhtrhr', '2019-10-22 19:35:55'),
(23, 'sdfsfd', 'sdfsdf', '2019-10-22 19:36:50'),
(24, 'carlos', 'carlos', '2019-10-22 20:06:44'),
(25, '6754', '5474', '2019-10-22 20:09:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_videos`
--

CREATE TABLE `usuarios_videos` (
  `id_user` int(11) NOT NULL,
  `id_video` int(11) NOT NULL,
  `cont_vistas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios_videos`
--

INSERT INTO `usuarios_videos` (`id_user`, `id_video`, `cont_vistas`) VALUES
(1, 25, 16),
(1, 27, 3),
(24, 25, 2),
(24, 27, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `vid_url` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `titulo`, `vid_url`) VALUES
(25, 'Familia Adams', 'pDgn0IrXOVk'),
(27, 'Rambo ultima', '3WcrgWJXCHg');

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
  ADD PRIMARY KEY (`id_user`,`id_video`),
  ADD KEY `FK_videos` (`id_video`),
  ADD KEY `id_user` (`id_user`);

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
  MODIFY `enl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `enlaces_videos`
--
ALTER TABLE `enlaces_videos`
  ADD CONSTRAINT `FK_enl_video_id` FOREIGN KEY (`enl_video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios_videos`
--
ALTER TABLE `usuarios_videos`
  ADD CONSTRAINT `FK_usuarios` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `FK_videos` FOREIGN KEY (`id_video`) REFERENCES `videos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
