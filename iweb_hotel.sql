-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-01-2020 a las 19:51:29
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `iweb_hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Habitacion`
--

CREATE TABLE `Habitacion` (
  `codigo` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `vistas` text NOT NULL,
  `plazas` int(11) NOT NULL,
  `superficie` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `categoria` text NOT NULL,
  `wifi` tinyint(1) NOT NULL,
  `puntuacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `Habitacion` (`codigo`, `descripcion`, `vistas`, `plazas`, `superficie`, `precio`, `categoria`, `wifi`, `puntuacion`) VALUES
(0, 'deluxe', 'buenas', 3, 250, 75, 'alta', 0, 10),
(1, 'pareja', 'regulares', 2, 140, 30, 'normal', 1, 5),
(2, 'individual', 'buenas', 1, 75, 20, 'baja', 0, 7);
(3, 'familiar', 'malas', 4, 180, 45, 'alta', 1, 8);
(4, 'larga estancia', 'regulares', 2, 100, 47, 'normal', 0, 3);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Imagen`
--

CREATE TABLE `Imagen` (
  `codigo` int(11) NOT NULL,
  `url` text NOT NULL,
  `habitacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `Imagen` (`codigo`, `url`, `habitacion`) VALUES
(0, 'google', 0),
(1, 'youtube', 0),
(2, 'marca', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Regimen`
--

CREATE TABLE `Regimen` (
  `codigo` int(11) NOT NULL,
  `regimen` text NOT NULL,
  `porcentaje` float NOT NULL,
  `es_sala` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `Regimen` (`codigo`, `regimen`, `porcentaje`, `es_sala`) VALUES
(0, 'Solo Sala', 1, 1),
(1, 'Con Cátering', 1.2, 1),
(2, 'Con Asistentes', 1.5, 1),
(3, 'Solo Alojamiento', 1, 0),
(4, 'Alojamiento y Desayuno', 1.2, 0),
(5, 'Alojamiento y media pensión', 1.4, 0),
(6, 'Pensión completa', 1.6, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Reserva`
--

CREATE TABLE `Reserva` (
  `codigo` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `descripcion` text NOT NULL,
  `usuario` varchar(256) NOT NULL,
  `habitacion` int(11) DEFAULT NULL,
  `sala_conferencia` int(11) DEFAULT NULL,
  `regimen` int(11) NOT NULL,
  `tipo_reserva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `Reserva` (`codigo`, `fecha_inicio`, `fecha_fin`, `descripcion`, `usuario`, `habitacion`, `sala_conferencia`, `regimen`, `tipo_reserva`) VALUES
(0, '2020-01-16', '2020-01-22', 'Reservada deluxe para famoso', 'admin@ua.es', 0, NULL, 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Sala_conferencia`
--

CREATE TABLE `Sala_conferencia` (
  `codigo` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `proyector` tinyint(1) NOT NULL,
  `microfono` tinyint(1) NOT NULL,
  `pizarra` tinyint(1) NOT NULL,
  `mesas` int(11) NOT NULL,
  `asientos` int(11) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `Sala_conferencia` (`codigo`, `descripcion`, `proyector`, `microfono`, `pizarra`, `mesas`, `asientos`, `puntuacion`, `precio`) VALUES
(0, 'Charlas para actividades', 0, 1, 0, 10, 10, 10, 7),
(1, 'Presentacion del hotel', 1, 0, 0, 10, 23, 23, 7),
(2, 'Informacion adicional', 1, 1, 1, 10, 10, 10, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Temporada`
--

CREATE TABLE `Temporada` (
  `id` int(11) NOT NULL,
  `temporada` text NOT NULL,
  `fecha_inicio` varchar(5) NOT NULL,
  `fecha_fin` varchar(5) NOT NULL,
  `porcentaje` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `Temporada` (`id`, `temporada`, `fecha_inicio`, `fecha_fin`, `porcentaje`) VALUES
(0, 'Baja Primavera', '01-04', '31-05', 0.8),
(1, 'Baja invierno', '01-10', '31-11', 0.8),
(2, 'Media Primavera', '01-06', '15-07', 1),
(3, 'Media Invierno', '15-09', '30-09', 1),
(4, 'Media invierno', '15-02', '31-03', 1),
(5, 'Alta invierno', '01-12', '14-02', 1.4),
(6, 'Alta Verano', '16-07', '14-09', 1.4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipo_reserva`
--

CREATE TABLE `Tipo_reserva` (
  `codigo` int(11) NOT NULL,
  `tipo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `Tipo_reserva` (`codigo`, `tipo`) VALUES
(1, 'Mostrador'),
(2, 'Página web'),
(3, 'Teléfono'),
(4, 'Bloqueo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipo_usuario`
--

CREATE TABLE `Tipo_usuario` (
  `codigo` int(11) NOT NULL,
  `tipo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `Tipo_usuario` (`codigo`, `tipo`) VALUES
(0, 'Administrador'),
(1, 'Recepcionista'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `apellidos` text  NOT NULL,
  `telefono` int(9) DEFAULT NULL,
  `direccion` text  DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `rememberToken` varchar(256) DEFAULT NULL,
  `dni` varchar(10)  DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT 2 NOT NULL,
  `nacionalidad` text  DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `users` (`id`, `email`, `name`, `apellidos`, `telefono`, `direccion`, `password`, `rememberToken`, `dni`, `tipo_usuario`, `nacionalidad`) VALUES
(1, 'admin@ua.es', 'Pedro', 'Martinez', 111222333, 'Universidad de Alicante', '123456', NULL, '12345678A', 0, 'España'),
(2, 'recepcionista@ua.es', 'Maria', 'Garcia', 444555666, 'Universidad de Alicante', '123456', NULL, '12345678B', 1, 'Francia'),
(3, 'cliente@ua.es', 'Antonio', 'Sierra', 777888999, 'Universidad de Alicante', '123456', NULL, '12345678C', 2, 'Italia');


--
-- Indices de la tabla `Habitacion`
--
ALTER TABLE `Habitacion`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `Imagen`
--
ALTER TABLE `Imagen`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_habitacion_imagen` (`habitacion`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Regimen`
--
ALTER TABLE `Regimen`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `Reserva`
--
ALTER TABLE `Reserva`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_reserva_tipoReserva` (`tipo_reserva`),
  ADD KEY `fk_reserva_regimen` (`regimen`),
  ADD KEY `fk_reserva_habitacion` (`habitacion`),
  ADD KEY `fk_reserva_salaConferencia` (`sala_conferencia`),
  ADD KEY `fk_reserva_usuario` (`usuario`);

--
-- Indices de la tabla `Sala_conferencia`
--
ALTER TABLE `Sala_conferencia`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `Temporada`
--
ALTER TABLE `Temporada`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Tipo_reserva`
--
ALTER TABLE `Tipo_reserva`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `Tipo_usuario`
--
ALTER TABLE `Tipo_usuario`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_tipoUsuario_usuario` (`tipo_usuario`);


--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Tipo_usuario`
--
ALTER TABLE `Tipo_usuario`
  MODIFY `codigo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Sala_conferencia`
--
ALTER TABLE `Sala_conferencia`
  MODIFY `codigo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Reserva`
--
ALTER TABLE `Reserva`
  MODIFY `codigo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Tipo_reserva`
--
ALTER TABLE `Tipo_reserva`
  MODIFY `codigo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Habitacion`
--
ALTER TABLE `Habitacion`
  MODIFY `codigo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


--
-- AUTO_INCREMENT de la tabla `Imagen`
--
ALTER TABLE `Imagen`
  MODIFY `codigo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


--
-- AUTO_INCREMENT de la tabla `Regimen`
--
ALTER TABLE `Regimen`
  MODIFY `codigo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Temporada`
--
ALTER TABLE `Temporada`
  MODIFY `codigo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


--
-- Filtros para la tabla `Imagen`
--
ALTER TABLE `Imagen`
  ADD CONSTRAINT `fk_habitacion_imagen` FOREIGN KEY (`habitacion`) REFERENCES `Habitacion` (`codigo`);

--
-- Filtros para la tabla `Reserva`
--
ALTER TABLE `Reserva`
  ADD CONSTRAINT `fk_reserva_habitacion` FOREIGN KEY (`habitacion`) REFERENCES `Habitacion` (`codigo`),
  ADD CONSTRAINT `fk_reserva_regimen` FOREIGN KEY (`regimen`) REFERENCES `Regimen` (`codigo`),
  ADD CONSTRAINT `fk_reserva_salaConferencia` FOREIGN KEY (`sala_conferencia`) REFERENCES `Sala_conferencia` (`codigo`),
  ADD CONSTRAINT `fk_reserva_tipoReserva` FOREIGN KEY (`tipo_reserva`) REFERENCES `Tipo_reserva` (`codigo`),
  ADD CONSTRAINT `fk_reserva_usuario` FOREIGN KEY (`usuario`) REFERENCES `users` (`email`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_tipoUsuario_usuario` FOREIGN KEY (`tipo_usuario`) REFERENCES `Tipo_usuario` (`codigo`);
COMMIT;

--
-- Filtros para la tabla `habutacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `fk_tipoUsuario_usuario` FOREIGN KEY (`tipo_usuario`) REFERENCES `Tipo_usuario` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
