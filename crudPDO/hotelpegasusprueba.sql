-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2023 a las 23:38:48
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
  `tipoDocumento_cli` varchar(30) NOT NULL,
  `correoElectronico_cli` varchar(200) NOT NULL,
  `nombres_cli` varchar(40) NOT NULL,
  `apellidos_cli` varchar(40) NOT NULL,
  `rol_cli` varchar(50) NOT NULL,
  `contrasena_cli` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_clientes`
--

INSERT INTO `tb_clientes` (`numeroDocumento_cli`, `tipoDocumento_cli`, `correoElectronico_cli`, `nombres_cli`, `apellidos_cli`, `rol_cli`, `contrasena_cli`) VALUES
('1030533045', 'CC', 'palmar.ivan0205@gmail.com', 'Ivan David', 'Palmar Martinez', 'Administrador', '$2y$10$jic0gvilr6LUKgaryLfwuukG6KM7jbyFFkhE7vSJW53ncWO2.WYry');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`numeroDocumento_cli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
