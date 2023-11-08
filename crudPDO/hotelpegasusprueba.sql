-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 08-11-2023 a las 15:28:08
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
  `codigo_tpD` int(11) NOT NULL,
  `correoElectronico_cli` varchar(200) NOT NULL,
  `nombres_cli` varchar(70) NOT NULL,
  `apellidos_cli` varchar(70) NOT NULL,
  `codigo_rl` int(11) NOT NULL,
  `contrasena_cli` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_clientes`
--

INSERT INTO `tb_clientes` (`numeroDocumento_cli`, `codigo_tpD`, `correoElectronico_cli`, `nombres_cli`, `apellidos_cli`, `codigo_rl`, `contrasena_cli`) VALUES
('1030533045', 1, 'palmar.ivan0205@gmail.com', 'Ivan David', 'Palmar Martinez', 3, '$2y$10$L0.bgDYOEptklgEtc4orL.pNF7PHsSILU2M6ITgTzQZhM2T6suc1K');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_reserva`
--

CREATE TABLE `tb_reserva` (
  `codigo_res` int(11) NOT NULL,
  `numeroDoc_cli` varchar(10) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaSalida` date NOT NULL,
  `cantidadJovenes` int(11) NOT NULL,
  `cantidadAultos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_reserva`
--

INSERT INTO `tb_reserva` (`codigo_res`, `numeroDoc_cli`, `fechaInicio`, `fechaSalida`, `cantidadJovenes`, `cantidadAultos`) VALUES
(1, '1030533045', '2023-11-09', '2023-11-10', 2, 1),
(2, '1030533045', '2023-11-09', '2023-11-10', 2, 1),
(3, '1030533045', '2023-11-11', '2023-11-10', 1, 1),
(4, '1030533045', '2023-11-09', '2023-11-09', 1, 3),
(5, '1030533045', '2023-11-03', '2023-11-05', 1, 1),
(6, '1030533045', '2023-11-03', '2023-11-10', 1, 2),
(7, '1030533045', '2023-11-08', '2023-11-09', 2, 0),
(8, '1030533045', '2023-11-10', '2023-11-09', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_rol`
--

CREATE TABLE `tb_rol` (
  `codigo_rl` int(11) NOT NULL,
  `tipo_rl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_rol`
--

INSERT INTO `tb_rol` (`codigo_rl`, `tipo_rl`) VALUES
(1, 'Administrador'),
(2, 'Cliente'),
(3, 'Recepcionista'),
(4, 'Mesero'),
(5, 'Room Service');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipodocumento`
--

CREATE TABLE `tb_tipodocumento` (
  `codigo_tpD` int(11) NOT NULL,
  `tipo_tpD` varchar(60) NOT NULL,
  `abreviatura_tpD` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_tipodocumento`
--

INSERT INTO `tb_tipodocumento` (`codigo_tpD`, `tipo_tpD`, `abreviatura_tpD`) VALUES
(1, 'Cedula de ciudadania', 'CC'),
(2, 'Tarjeta de Identidad', 'TI'),
(3, 'Permiso de estadia', 'Permiso'),
(4, 'Pasaporte extranjero', 'Pasaporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipohabitacion`
--

CREATE TABLE `tb_tipohabitacion` (
  `codigo_tpH` int(11) NOT NULL,
  `tipo_tpH` varchar(50) NOT NULL,
  `precio_tpH` float NOT NULL,
  `cantidadDisponible_tpH` int(11) NOT NULL,
  `descripcion_tpH` text NOT NULL,
  `minimoPer_tpH` int(11) NOT NULL,
  `maximoPer_tpH` int(11) NOT NULL,
  `imagen_tpH` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_tipohabitacion`
--

INSERT INTO `tb_tipohabitacion` (`codigo_tpH`, `tipo_tpH`, `precio_tpH`, `cantidadDisponible_tpH`, `descripcion_tpH`, `minimoPer_tpH`, `maximoPer_tpH`, `imagen_tpH`) VALUES
(1, 'Doble', 500000, 1, 'Comoda y buena', 1, 2, 0x72656769737472617273652e6a7067),
(2, 'Sencilla', 250000, 10, 'Demasiado cómoda para una sola persona', 1, 1, 0x73656e63696c6c612e6a7067),
(3, 'Triple', 650000, 7, 'Comodidad, privacidad y un toque de alegría para ti', 1, 3, 0x747269706c652e6a7067),
(4, 'Presidencial', 860000, 2, 'Una maravilla para pasar tus mejores vacaciones', 2, 6, 0x707265736964656e6369616c2e6a7067),
(5, 'Matrimonial', 1000000, 4, 'Pasa la mejor luna de miel con tu pareja', 2, 2, 0x6d617472696d6f6e69616c2e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipohabitacion_tb_reserva`
--

CREATE TABLE `tb_tipohabitacion_tb_reserva` (
  `codigo_tpH` int(11) DEFAULT NULL,
  `codigo_res` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_tipohabitacion_tb_reserva`
--

INSERT INTO `tb_tipohabitacion_tb_reserva` (`codigo_tpH`, `codigo_res`) VALUES
(1, 6),
(3, 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`numeroDocumento_cli`),
  ADD KEY `FK1_tbclientes_tbRol` (`codigo_rl`),
  ADD KEY `FK1_tbclientes_tbTipoDocumento` (`codigo_tpD`);

--
-- Indices de la tabla `tb_reserva`
--
ALTER TABLE `tb_reserva`
  ADD PRIMARY KEY (`codigo_res`),
  ADD KEY `FK1_tbReservar_tbCliente` (`numeroDoc_cli`);

--
-- Indices de la tabla `tb_rol`
--
ALTER TABLE `tb_rol`
  ADD PRIMARY KEY (`codigo_rl`);

--
-- Indices de la tabla `tb_tipodocumento`
--
ALTER TABLE `tb_tipodocumento`
  ADD PRIMARY KEY (`codigo_tpD`);

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
  MODIFY `codigo_res` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tb_rol`
--
ALTER TABLE `tb_rol`
  MODIFY `codigo_rl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tb_tipodocumento`
--
ALTER TABLE `tb_tipodocumento`
  MODIFY `codigo_tpD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_tipohabitacion`
--
ALTER TABLE `tb_tipohabitacion`
  MODIFY `codigo_tpH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD CONSTRAINT `FK1_tbclientes_tbRol` FOREIGN KEY (`codigo_rl`) REFERENCES `tb_rol` (`codigo_rl`),
  ADD CONSTRAINT `FK1_tbclientes_tbTipoDocumento` FOREIGN KEY (`codigo_tpD`) REFERENCES `tb_tipodocumento` (`codigo_tpD`);

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
