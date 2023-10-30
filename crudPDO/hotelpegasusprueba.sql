-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 30-10-2023 a las 16:54:41
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotelpegasusprueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `numeroDocumento_cli` varchar(10) NOT NULL,
  `tipoDocumento_cli` varchar(50) NOT NULL,
  `correoElectronico_cli` varchar(200) NOT NULL,
  `nombres_cli` varchar(70) NOT NULL,
  `apellidos_cli` varchar(70) NOT NULL,
  `rol_cli` varchar(60) NOT NULL,
  `contrasena_cli` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_clientes`
--

INSERT INTO `tb_clientes` (`numeroDocumento_cli`, `tipoDocumento_cli`, `correoElectronico_cli`, `nombres_cli`, `apellidos_cli`, `rol_cli`, `contrasena_cli`) VALUES
('1030533045', 'CC', 'palmar.ivan0205@gmail.com', 'Iván David', 'Palmar Martinez', 'Administrador', '$2y$10$UOJzh2iKlRkf60m6C0OZbep/IFPBLX6ebfad31zVFiiV8BivwAARG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_reserva`
--

CREATE TABLE `tb_reserva` (
  `codigo_res` int(11) NOT NULL,
  `numeroDoc_cli` varchar(10) NOT NULL,
  `fechaInicio` datetime NOT NULL,
  `fechaSalida` datetime NOT NULL,
  `cantidadJovenes` int(11) NOT NULL,
  `cantidadAdultos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipohabitacion`
--

CREATE TABLE `tb_tipohabitacion` (
  `codigo_tpH` int(11) NOT NULL,
  `tipo_tpH` varchar(50) NOT NULL,
  `precio_tpH` float NOT NULL,
  `cantidad_tpH` int(11) NOT NULL,
  `descripcion_tpH` text NOT NULL,
  `minimoPer_tpH` int(11) NOT NULL,
  `maximoPer_tph` int(11) NOT NULL,
  `imagen_tpH` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipohabitacion_tb_reserva`
--

CREATE TABLE `tb_tipohabitacion_tb_reserva` (
  `codigo_tpH` int(11) DEFAULT NULL,
  `codigo_res` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`numeroDocumento_cli`);

--
-- Indices de la tabla `tb_reserva`
--
ALTER TABLE `tb_reserva`
  ADD PRIMARY KEY (`codigo_res`),
  ADD KEY `FK1_tbReservar_tbCliente` (`numeroDoc_cli`);

--
-- Indices de la tabla `tb_tipohabitacion`
--
ALTER TABLE `tb_tipohabitacion`
  ADD PRIMARY KEY (`codigo_tpH`);

--
-- Indices de la tabla `tb_tipohabitacion_tb_reserva`
--
ALTER TABLE `tb_tipohabitacion_tb_reserva`
  ADD UNIQUE KEY `codigo_tpH` (`codigo_tpH`),
  ADD UNIQUE KEY `codigo_res` (`codigo_res`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_reserva`
--
ALTER TABLE `tb_reserva`
  MODIFY `codigo_res` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_tipohabitacion`
--
ALTER TABLE `tb_tipohabitacion`
  MODIFY `codigo_tpH` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_reserva`
--
ALTER TABLE `tb_reserva`
  ADD CONSTRAINT `FK1_tbReservar_tbCliente` FOREIGN KEY (`numeroDoc_cli`) REFERENCES `tb_clientes` (`numeroDocumento_cli`);

--
-- Filtros para la tabla `tb_tipohabitacion_tb_reserva`
--
ALTER TABLE `tb_tipohabitacion_tb_reserva`
  ADD CONSTRAINT `FK2_tb_TipoHabitacion_tb_Reserva` FOREIGN KEY (`codigo_tpH`) REFERENCES `tb_tipohabitacion` (`codigo_tpH`),
  ADD CONSTRAINT `FK3_tb_Reserva_tb_TipoHabitacion` FOREIGN KEY (`codigo_res`) REFERENCES `tb_reserva` (`codigo_res`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
