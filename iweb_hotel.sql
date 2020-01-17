-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-01-2020 a las 04:00:45
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
  `descripcion` text NOT NULL DEFAULT 'Ninguna',
  `vistas` text NOT NULL DEFAULT 'Ninguna',
  `plazas` int(11) NOT NULL DEFAULT 0,
  `superficie` int(11) NOT NULL DEFAULT 0,
  `precio` int(11) NOT NULL DEFAULT 0,
  `categoria` text NOT NULL DEFAULT 'Ninguna',
  `wifi` tinyint(1) NOT NULL DEFAULT 0,
  `puntuacion` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Habitacion`
--

INSERT INTO `Habitacion` (`codigo`, `descripcion`, `vistas`, `plazas`, `superficie`, `precio`, `categoria`, `wifi`, `puntuacion`) VALUES
(1, 'Habitacion deluxe con buenas vistas', 'Buenas', 2, 50, 100, 'Individual', 1, 7),
(2, 'Habitacion familiar con vestidor y nevera', 'Regulares', 1, 30, 50, 'Familiar', 1, 5),
(3, 'Habitacion con galeria para diseñadores', 'Buenas', 1, 53, 25, 'Individual', 1, 7),
(4, 'Habitacion de pareja, ambiente romántico', 'Regulares', 2, 35, 40, 'Doble', 0, 6),
(5, 'Habitacion oferta para 3 personas, incluido 1 niño', 'Buenas', 3, 65, 65, 'Familiar', 1, 8),
(6, 'Estancia para personas mayores con asistencia', 'Regulares', 2, 32, 42, 'Especial', 1, 4),
(7, 'Habitacion deluxe con jacuzzi y caja fuerte', 'Buenas', 2, 63, 78, 'Doble', 1, 10),
(8, 'Habitacion especial, estancia corta de viaje', 'Regulares', 1, 20, 15, 'Individual', 0, 5),
(9, 'Habitacion pareja, precio medio, estancia corta', 'Regulares', 2, 24, 36, 'Doble', 1, 6),
(10, 'Habitacion con balcon y terraza para 4 personas', 'Buenas', 4, 45, 50, 'Familiar', 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Imagen`
--

CREATE TABLE `Imagen` (
  `codigo` int(11) NOT NULL,
  `url` text NOT NULL DEFAULT 'Ninguna',
  `habitacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Imagen`
--

INSERT INTO `Imagen` (`codigo`, `url`, `habitacion`) VALUES
(1, 'https://www.trhhoteles.com/cache/cc/f8/ccf8830071140e1004e00d0426e39903.jpg', 1),
(2, 'https://www.palia.es/dms/multiHotel-Palia-Hotels-New/hotel-maria-eugenia/clasic-rooms/habitacion-doble-1/doble-1.jpg', 1),
(3, 'https://www.trhhoteles.com/cache/ac/36/ac36d46dea2e46e6942e876af7732fac.jpg', 2),
(4, 'https://www.medplaya.es/files/hotel/calypso/tour-2018/Calypso%20Habitacio%E2%95%A0%C3%BCn%20Family%20Superior%20D%2002%20900%20x%20500.jpg', 2),
(5, 'https://www.trhhoteles.com/cache/28/e7/28e7d4bbfc566c977a4f984a32280d45.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Regimen`
--

CREATE TABLE `Regimen` (
  `codigo` int(11) NOT NULL,
  `regimen` text NOT NULL DEFAULT 'Ninguno',
  `porcentaje` float NOT NULL DEFAULT 0,
  `es_sala` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Regimen`
--

INSERT INTO `Regimen` (`codigo`, `regimen`, `porcentaje`, `es_sala`) VALUES
(1, 'Solo Sala', 1, 1),
(2, 'Con Cátering', 1.2, 1),
(3, 'Con Asistentes', 1.5, 1),
(4, 'Solo Alojamiento', 1, 0),
(5, 'Alojamiento y Desayuno', 1.2, 0),
(6, 'Alojamiento y media pensión', 1.4, 0),
(7, 'Pensión completa', 1.6, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Reserva`
--

CREATE TABLE `Reserva` (
  `codigo` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `descripcion` text NOT NULL DEFAULT 'Ninguna',
  `usuario` varchar(256) NOT NULL,
  `habitacion` int(11) DEFAULT NULL,
  `sala_conferencia` int(11) DEFAULT NULL,
  `regimen` int(11) NOT NULL,
  `tipo_reserva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Reserva`
--

INSERT INTO `Reserva` (`codigo`, `fecha_inicio`, `fecha_fin`, `descripcion`, `usuario`, `habitacion`, `sala_conferencia`, `regimen`, `tipo_reserva`) VALUES
(1, '2020-01-16', '2020-01-22', 'Reserva deluxe para famoso', '1', 1, NULL, 5, 2),
(2, '2020-01-16', '2020-01-22', 'Sala de reuniones para empresa', '1', NULL, 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Sala_conferencia`
--

CREATE TABLE `Sala_conferencia` (
  `codigo` int(11) NOT NULL,
  `descripcion` text NOT NULL DEFAULT 'Ninguna',
  `proyector` tinyint(1) NOT NULL,
  `microfono` tinyint(1) NOT NULL,
  `pizarra` tinyint(1) NOT NULL,
  `mesas` int(11) NOT NULL,
  `asientos` int(11) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Sala_conferencia`
--

INSERT INTO `Sala_conferencia` (`codigo`, `descripcion`, `proyector`, `microfono`, `pizarra`, `mesas`, `asientos`, `puntuacion`, `precio`) VALUES
(1, 'Charlas sobre actividades', 1, 0, 0, 20, 20, 7, 25),
(2, 'Informacion sobre el hotel', 0, 1, 0, 30, 30, 10, 15),
(3, 'Otras charlas', 0, 1, 0, 20, 20, 5, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Temporada`
--

CREATE TABLE `Temporada` (
  `id` int(11) NOT NULL,
  `temporada` text NOT NULL DEFAULT 'Ninguna',
  `fecha_inicio` varchar(5) NOT NULL,
  `fecha_fin` varchar(5) NOT NULL,
  `porcentaje` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Temporada`
--

INSERT INTO `Temporada` (`id`, `temporada`, `fecha_inicio`, `fecha_fin`, `porcentaje`) VALUES
(1, 'Baja Primavera', '01-04', '31-05', 0.8),
(2, 'Baja invierno', '01-10', '31-11', 0.8),
(3, 'Media Primavera', '01-06', '15-07', 1),
(4, 'Media Invierno', '15-09', '30-09', 1),
(5, 'Media invierno', '15-02', '31-03', 1),
(6, 'Alta invierno', '01-12', '14-02', 1.4),
(7, 'Alta Verano', '16-07', '14-09', 1.4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipo_reserva`
--

CREATE TABLE `Tipo_reserva` (
  `codigo` int(11) NOT NULL,
  `tipo` text NOT NULL DEFAULT 'Ninguno'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Tipo_reserva`
--

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
  `tipo` text NOT NULL DEFAULT 'Ninguno'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Tipo_usuario`
--

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
  `name` varchar(256) NOT NULL DEFAULT 'Ninguno',
  `apellidos` text NOT NULL,
  `telefono` int(9) DEFAULT 0,
  `direccion` text DEFAULT 'Ninguna',
  `password` varchar(256) NOT NULL DEFAULT 'Ninguna',
  `rememberToken` varchar(256) DEFAULT 'Ninguno',
  `dni` varchar(10) DEFAULT 'Ninguno',
  `tipo_usuario` int(11) NOT NULL,
  `nacionalidad` text DEFAULT 'Ninguna'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `apellidos`, `telefono`, `direccion`, `password`, `rememberToken`, `dni`, `tipo_usuario`, `nacionalidad`) VALUES
(1, 'admin@ua.es', 'Pedro', 'Martinez', 658951247, 'Universidad de Alicante', '123456', 'Ninguno', '12345678A', 0, 'España'),
(2, 'cliente@ua.es', 'Antonio', 'Sierra', 652325684, 'Universidad de Alicante', '123456', 'Ninguno', '12345678B', 2, 'Francia'),
(3, 'recepcionista@ua.es', 'Maria', 'Garcia', 632552214, 'Universidad de Alicante', '123456', 'Ninguno', '12345678C', 1, 'Italia');

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
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD KEY `fk_tipoUsuario_usuario` (`tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Habitacion`
--
ALTER TABLE `Habitacion`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `Imagen`
--
ALTER TABLE `Imagen`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Regimen`
--
ALTER TABLE `Regimen`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `Reserva`
--
ALTER TABLE `Reserva`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Sala_conferencia`
--
ALTER TABLE `Sala_conferencia`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Temporada`
--
ALTER TABLE `Temporada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `Tipo_reserva`
--
ALTER TABLE `Tipo_reserva`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Tipo_usuario`
--
ALTER TABLE `Tipo_usuario`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
