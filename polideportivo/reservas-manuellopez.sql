-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2020 a las 15:55:27
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reservas-manuellopez`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarioinstalacion`
--

CREATE TABLE `horarioinstalacion` (
  `idhorario` int(6) NOT NULL,
  `dia_semana` int(1) NOT NULL,
  `hora_inicio` int(2) NOT NULL,
  `hora_fin` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalacion`
--

CREATE TABLE `instalacion` (
  `IdInstalacion` int(6) NOT NULL,
  `Nombre` enum('Pista de Tenis','Pista de Padel','Cancha de Baloncesto','Piscina') NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `Imagen` varchar(1000) NOT NULL,
  `Precio` enum('4€/h','5€/h','6€/h','7€/h') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `instalacion`
--

INSERT INTO `instalacion` (`IdInstalacion`, `Nombre`, `Descripcion`, `Imagen`, `Precio`) VALUES
(1, 'Pista de Tenis', 'bonita pista de segunda mano', 'pista de tenis.jpg', '6€/h'),
(2, 'Cancha de Baloncesto', 'Nueva cancha de baloncesto para echar un partido con los colegas', 'cancha de baloncesto.jpg', '4€/h'),
(3, 'Piscina', 'Una piscina olímpica(porque pasamos olímpicamente de abrirla)', 'piscina.jpg', '6€/h');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `IdR` int(20) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` int(11) NOT NULL,
  `Precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido1` varchar(20) NOT NULL,
  `Apellido2` varchar(20) NOT NULL,
  `Dni` varchar(9) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `tipo` enum('Usuario','Administrador') NOT NULL,
  `Estado` enum('Activo','Borrado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Email`, `Password`, `Nombre`, `Apellido1`, `Apellido2`, `Dni`, `imagen`, `tipo`, `Estado`) VALUES
(1, 'manolo@gmail.com', 'manolo', 'Manuel', 'Lopez', 'Lopez', '54143622N', 'Administrador.PNG', 'Administrador', 'Activo'),
(2, 'javier@gmail.com', 'javier', 'Javier', 'Lopez', 'Morales', '72030720T', 'Usuario.PNG', 'Usuario', 'Activo'),
(3, 'rosendo@gmail.com', 'rosendo', 'Rosendo', 'De Quero', 'Granados', '12345678R', 'Usuario.PNG', 'Usuario', 'Activo'),
(4, 'MariaJesus@gmail.com', 'maria', 'Maria Jesus', 'Fernandez', 'Cobo', '15429592M', 'Usuario.PNG', 'Usuario', 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `horarioinstalacion`
--
ALTER TABLE `horarioinstalacion`
  ADD PRIMARY KEY (`idhorario`);

--
-- Indices de la tabla `instalacion`
--
ALTER TABLE `instalacion`
  ADD PRIMARY KEY (`IdInstalacion`),
  ADD UNIQUE KEY `IdInstalacion` (`IdInstalacion`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`IdR`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`),
  ADD UNIQUE KEY `Dni` (`Dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `horarioinstalacion`
--
ALTER TABLE `horarioinstalacion`
  MODIFY `idhorario` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instalacion`
--
ALTER TABLE `instalacion`
  MODIFY `IdInstalacion` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `IdR` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
