-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-12-2019 a las 15:20:34
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `IWEB_Hotel`
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
  `wifi` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Imagen`
--

CREATE TABLE `Imagen` (
  `codigo` int(11) NOT NULL,
  `url` text NOT NULL,
  `habitacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Regimen`
--

CREATE TABLE `Regimen` (
  `codigo` int(11) NOT NULL,
  `regimen` text NOT NULL,
  `porcentaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `asientos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Temporada`
--

CREATE TABLE `Temporada` (
  `id` int(11) NOT NULL,
  `temporada` text NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `porcentaje` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipo_reserva`
--

CREATE TABLE `Tipo_reserva` (
  `codigo` int(11) NOT NULL,
  `tipo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipo_usuario`
--

CREATE TABLE `Tipo_usuario` (
  `codigo` int(11) NOT NULL,
  `tipo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `email` varchar(256) NOT NULL,
  `nombre` text NOT NULL,
  `apellidos` text NOT NULL,
  `telefono` int(9) DEFAULT NULL,
  `direccion` text NOT NULL,
  `password` text NOT NULL,
  `foto_perfil` text NOT NULL,
  `dni` varchar(10) NOT NULL,
  `tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`email`),
  ADD KEY `fk_tipoUsuario_usuario` (`tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Reserva`
--
ALTER TABLE `Reserva`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Tipo_reserva`
--
ALTER TABLE `Tipo_reserva`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

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
  ADD CONSTRAINT `fk_reserva_usuario` FOREIGN KEY (`usuario`) REFERENCES `Usuario` (`email`);

--
-- Filtros para la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD CONSTRAINT `fk_tipoUsuario_usuario` FOREIGN KEY (`tipo_usuario`) REFERENCES `Tipo_usuario` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
