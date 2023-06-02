-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2023 a las 03:46:06
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisconasis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anios_escolar`
--

CREATE TABLE `anios_escolar` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `anios_escolar`
--

INSERT INTO `anios_escolar` (`id`, `nombre`) VALUES
(1, 'primer año'),
(2, 'segundo año'),
(3, 'tercer año'),
(4, 'cuarto año'),
(5, 'quinto año');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `id` int(11) NOT NULL,
  `cedula_personal` int(8) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `id_dias` int(11) NOT NULL,
  `horario_entrada` time NOT NULL,
  `horario_salida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`id`, `cedula_personal`, `id_seccion`, `id_dias`, `horario_entrada`, `horario_salida`) VALUES
(2, 26896589, 6, 1, '07:10:00', '08:10:00'),
(6, 26896589, 7, 2, '10:15:00', '11:15:00'),
(9, 26896589, 7, 1, '10:00:00', '11:21:00'),
(10, 26896589, 6, 4, '09:05:00', '10:51:00'),
(11, 26896589, 8, 4, '10:45:00', '11:50:00'),
(12, 26896589, 10, 3, '10:15:00', '11:45:00'),
(13, 25896356, 11, 1, '08:20:00', '10:25:00'),
(14, 23568958, 12, 5, '08:30:00', '09:45:00'),
(21, 26896589, 13, 2, '07:00:00', '08:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id` int(11) NOT NULL,
  `cedula` int(8) NOT NULL,
  `hora` time NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id`, `cedula`, `hora`, `fecha`) VALUES
(5, 26896589, '07:10:00', '2023-05-15'),
(6, 26896589, '11:21:00', '2023-05-15'),
(7, 25896356, '08:20:00', '2023-05-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diasemanas`
--

CREATE TABLE `diasemanas` (
  `id` int(11) NOT NULL,
  `abreviacion` varchar(3) COLLATE utf8_spanish2_ci NOT NULL,
  `dias` varchar(15) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `diasemanas`
--

INSERT INTO `diasemanas` (`id`, `abreviacion`, `dias`) VALUES
(1, 'mon', 'lunes'),
(2, 'tue', 'martes'),
(3, 'wed', 'miércoles'),
(4, 'thu', 'jueves'),
(5, 'fri', 'viernes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `accion` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `accion`, `fecha`, `id_usuario`) VALUES
(29, 'agregó al usuario - Joselu', '2023-04-16', 1),
(30, 'cambió el estado de usuario - Joselu', '2023-04-16', 1),
(33, 'agregó una nueva persona - cédula 21589698', '2023-04-16', 1),
(34, 'cambió el estado de la persona - cédula 21589698', '2023-04-16', 1),
(35, 'actualizó datos de usuario - Joselux', '2023-04-16', 1),
(36, 'actualizó datos de usuario - Joselux', '2023-04-16', 1),
(38, 'actualizó los datos de la persona - cédula 23587968', '2023-04-17', 1),
(39, 'actualizó los datos del docente - cédula 24715376', '2023-04-23', 1),
(40, 'agregó una materia - código: fis', '2023-04-24', 1),
(41, 'actualizó datos de la materia - código: mat', '2023-04-24', 1),
(44, 'agregó un nueva persona - cédula 26896589', '2023-04-30', 1),
(45, 'cambió el estado de la persona - cédula 26896589', '2023-04-30', 1),
(46, 'cambió el estado de la persona - cédula 26896589', '2023-04-30', 1),
(47, 'actualizó los datos de la persona - cédula 26896589', '2023-04-30', 1),
(48, 'periodo escolar actualizado', '2023-05-01', 1),
(49, 'periodo escolar actualizado', '2023-05-01', 1),
(50, 'secciones agregadas exitosamente', '2023-05-01', 1),
(51, 'Elimino sección', '2023-05-02', 1),
(52, 'secciones agregadas exitosamente', '2023-05-02', 1),
(53, 'agregó al usuario - Mary', '2023-05-02', 1),
(54, 'actualizó datos de usuario - Mary', '2023-05-02', 1),
(55, 'actualizó datos de usuario - Mary', '2023-05-02', 1),
(56, 'agregó un nueva persona - cédula 23568958', '2023-05-08', 1),
(57, 'actualizó los datos de la persona - cédula 23568958', '2023-05-08', 1),
(58, 'secciones agregadas exitosamente', '2023-05-08', 1),
(59, 'Elimino sección', '2023-05-08', 1),
(60, 'actualizó un horario', '2023-05-08', 1),
(67, 'actualizó un horario', '2023-05-08', 1),
(78, 'actualización de los roles', '2023-05-09', 1),
(79, 'secciones agregadas exitosamente', '2023-05-14', 1),
(80, 'secciones agregadas exitosamente', '2023-05-14', 1),
(81, 'agregó un nueva persona - cédula 21585693', '2023-05-17', 1),
(82, 'actualizó los datos de la persona - cédula 21585693', '2023-05-17', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periescobyaniosesco`
--

CREATE TABLE `periescobyaniosesco` (
  `id` int(11) NOT NULL,
  `id_perioesco` int(11) NOT NULL,
  `id_anioesco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `periescobyaniosesco`
--

INSERT INTO `periescobyaniosesco` (`id`, `id_perioesco`, `id_anioesco`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(16, 4, 1),
(17, 4, 2),
(18, 4, 3),
(19, 4, 4),
(20, 4, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo_escolar`
--

CREATE TABLE `periodo_escolar` (
  `id` int(11) NOT NULL,
  `inicio` date NOT NULL,
  `cierre` date NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `periodo_escolar`
--

INSERT INTO `periodo_escolar` (`id`, `inicio`, `cierre`, `id_usuario`) VALUES
(1, '2022-10-12', '2023-07-05', 1),
(4, '2023-10-10', '2024-07-03', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `cedula` int(8) NOT NULL,
  `motivo` varchar(500) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `ci` int(8) NOT NULL,
  `telefono` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `horas_totales` int(11) NOT NULL,
  `grado_instruccional` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`nombre`, `apellido`, `ci`, `telefono`, `correo`, `horas_totales`, `grado_instruccional`, `estado`) VALUES
('Juan', 'Ortiz', 21585693, '04141585963', 'juan@gmail.com', 300, 'Profesiona', 1),
('Mari', 'Lopez', 23568958, '0412569635', 'mario@gmail.com', 500, 'Profesional', 1),
('Victor', 'Hernandez', 25896356, '04125698569', 'prueba@hotmail.com', 500, 'Profesional', 1),
('Marisol', 'Gonzalez', 26896589, '04142589865', 'mari198@gmail.com', 500, 'Profesional', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `agregar` int(11) NOT NULL,
  `mostrar` int(11) NOT NULL,
  `editar` int(11) NOT NULL,
  `reportes` int(11) NOT NULL,
  `asistencias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`, `agregar`, `mostrar`, `editar`, `reportes`, `asistencias`) VALUES
(1, 'director', 1, 1, 1, 1, 1),
(2, 'subdirector', 1, 1, 1, 1, 1),
(3, 'secretaria', 1, 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(5) COLLATE utf8_spanish2_ci NOT NULL,
  `id_pba` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `nombre`, `id_pba`) VALUES
(6, 'A', 16),
(7, 'B', 16),
(8, 'C', 16),
(10, 'A', 17),
(11, 'B', 17),
(12, 'C', 17),
(13, 'D', 17),
(14, 'E', 17),
(15, 'A', 18),
(17, 'G', 18),
(18, 'C', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariobyrole`
--

CREATE TABLE `usuariobyrole` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuariobyrole`
--

INSERT INTO `usuariobyrole` (`id`, `id_role`, `id_usuario`) VALUES
(1, 1, 1),
(2, 3, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `ci` int(8) NOT NULL,
  `username` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `ci`, `username`, `password`, `estado`) VALUES
(1, 25896356, 'Admin', '7488e331b8b64e5794da3fa4eb10ad5d', 1),
(6, 26896589, 'Mariam10', '7488e331b8b64e5794da3fa4eb10ad5d', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anios_escolar`
--
ALTER TABLE `anios_escolar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cedula_personal` (`cedula_personal`),
  ADD KEY `id_seccion` (`id_seccion`),
  ADD KEY `id_dias` (`id_dias`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cedula` (`cedula`);

--
-- Indices de la tabla `diasemanas`
--
ALTER TABLE `diasemanas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historial_ibfk_1` (`id_usuario`);

--
-- Indices de la tabla `periescobyaniosesco`
--
ALTER TABLE `periescobyaniosesco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_anioesco` (`id_anioesco`),
  ADD KEY `periescobyaniosesco_ibfk_2` (`id_perioesco`);

--
-- Indices de la tabla `periodo_escolar`
--
ALTER TABLE `periodo_escolar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cedula` (`cedula`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pba` (`id_pba`);

--
-- Indices de la tabla `usuariobyrole`
--
ALTER TABLE `usuariobyrole`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci` (`ci`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anios_escolar`
--
ALTER TABLE `anios_escolar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `diasemanas`
--
ALTER TABLE `diasemanas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `periescobyaniosesco`
--
ALTER TABLE `periescobyaniosesco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `periodo_escolar`
--
ALTER TABLE `periodo_escolar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuariobyrole`
--
ALTER TABLE `usuariobyrole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `asignacion_ibfk_1` FOREIGN KEY (`cedula_personal`) REFERENCES `personal` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asignacion_ibfk_2` FOREIGN KEY (`id_seccion`) REFERENCES `secciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asignacion_ibfk_3` FOREIGN KEY (`id_dias`) REFERENCES `diasemanas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `personal` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `periescobyaniosesco`
--
ALTER TABLE `periescobyaniosesco`
  ADD CONSTRAINT `periescobyaniosesco_ibfk_1` FOREIGN KEY (`id_anioesco`) REFERENCES `anios_escolar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `periescobyaniosesco_ibfk_2` FOREIGN KEY (`id_perioesco`) REFERENCES `periodo_escolar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `periodo_escolar`
--
ALTER TABLE `periodo_escolar`
  ADD CONSTRAINT `periodo_escolar_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `personal` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD CONSTRAINT `secciones_ibfk_1` FOREIGN KEY (`id_pba`) REFERENCES `periescobyaniosesco` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuariobyrole`
--
ALTER TABLE `usuariobyrole`
  ADD CONSTRAINT `usuariobyrole_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuariobyrole_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `personal` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
