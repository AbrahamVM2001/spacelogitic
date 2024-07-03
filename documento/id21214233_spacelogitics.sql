-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2023 a las 21:23:46
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id21214233_spacelogitics`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `Matricula` int(11) NOT NULL,
  `IdPlaneta` int(11) DEFAULT NULL,
  `ClaveNave` int(11) DEFAULT NULL,
  `NombreCompleto` varchar(50) DEFAULT NULL,
  `NumeroCelular` int(11) DEFAULT NULL,
  `Peso` int(11) DEFAULT NULL,
  `PlanetaEnvio` varchar(20) DEFAULT NULL,
  `PlanetaDestino` varchar(20) DEFAULT NULL,
  `Distancia` int(11) DEFAULT NULL,
  `Estado` varchar(100) DEFAULT NULL,
  `fechaEntrega` date DEFAULT NULL,
  `fechaEnvio` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `naves`
--

CREATE TABLE `naves` (
  `ClaveNave` int(11) NOT NULL,
  `NombreRepresentante` varchar(50) DEFAULT NULL,
  `Distancia` int(11) DEFAULT NULL,
  `Combustible` int(11) DEFAULT NULL,
  `Imagen` blob NOT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `contrasena` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planetas`
--

CREATE TABLE `planetas` (
  `IdPlaneta` int(11) NOT NULL,
  `NombrePlaneta` varchar(20) DEFAULT NULL,
  `Combustible` int(11) DEFAULT NULL,
  `Distancia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `planetas`
--

INSERT INTO `planetas` (`IdPlaneta`, `NombrePlaneta`, `Combustible`, `Distancia`) VALUES
(1, 'Tierra', 500000, 0),
(2, 'Marte', 50000, 100000),
(3, 'Mercurio', 100000, 115000),
(4, 'Jupiter', 200000, 200000),
(5, 'Nepturno', 100000, 250000),
(6, 'Venus', 100000, 99000),
(7, 'Saturno', 100000, 500000),
(8, 'Urano', 2000, 620000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`Matricula`),
  ADD KEY `IdPlaneta` (`IdPlaneta`),
  ADD KEY `ClaveNave` (`ClaveNave`);

--
-- Indices de la tabla `naves`
--
ALTER TABLE `naves`
  ADD PRIMARY KEY (`ClaveNave`);

--
-- Indices de la tabla `planetas`
--
ALTER TABLE `planetas`
  ADD PRIMARY KEY (`IdPlaneta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `Matricula` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `naves`
--
ALTER TABLE `naves`
  MODIFY `ClaveNave` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `planetas`
--
ALTER TABLE `planetas`
  MODIFY `IdPlaneta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `envios`
--
ALTER TABLE `envios`
  ADD CONSTRAINT `envios_ibfk_1` FOREIGN KEY (`IdPlaneta`) REFERENCES `planetas` (`IdPlaneta`),
  ADD CONSTRAINT `envios_ibfk_2` FOREIGN KEY (`ClaveNave`) REFERENCES `naves` (`ClaveNave`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
