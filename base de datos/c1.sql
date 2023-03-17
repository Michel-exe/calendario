-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-03-2023 a las 05:06:02
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `c1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `evento` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `idUbicacion` int(10) NOT NULL,
  `color` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `evento`, `description`, `idUbicacion`, `color`) VALUES
(1, 'Comida', 'Chilaquiles', 0, '#000'),
(2, 'Reunion', 'Lorem ipsum, dolor sit ipsa repellat sed non odit', 0, '#007bff'),
(3, 'Familia', 'Lorem ipsum, dolor sit amque, numquam!', 0, '#dc3545'),
(4, 'Comida', 'Lorem ipsum, dolor sit ametque, numquam!', 0, '#28a745'),
(5, 'Escuela', 'Lorem ipsum, dolor sit amet e, numquam!', 0, '#ec00b9'),
(6, 'Fiesta', 'Lorem ipsum, dolor sit amet con numquam!', 0, '#ffc107'),
(7, 'Trabajo ipsum, dolor sit amet numquam!', 'Lorem ipsum, dolor sit amet numquam!', 0, '#969696'),
(8, 'Comida', 'Chilaquiles', 0, '#000'),
(9, 'Comida3', 'Chilaquiles', 0, '#000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechas`
--

CREATE TABLE `fechas` (
  `id` int(11) NOT NULL,
  `idEvento` int(15) NOT NULL,
  `idUbicacion` int(10) NOT NULL,
  `day` varchar(10) NOT NULL,
  `mounth` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `i_fecha` varchar(20) NOT NULL,
  `t_fecha` varchar(20) NOT NULL,
  `i_hora` varchar(10) NOT NULL,
  `t_hora` varchar(10) NOT NULL,
  `color` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `fechas`
--

INSERT INTO `fechas` (`id`, `idEvento`, `idUbicacion`, `day`, `mounth`, `year`, `i_fecha`, `t_fecha`, `i_hora`, `t_hora`, `color`) VALUES
(1, 1, 16, '23', '02', '2023', '2023-02-23', '2023-02-23', '09:36', '', '#ec00b9'),
(2, 2, 16, '25', '02', '2023', '2023-02-25', '2023-02-25', '', '', '#ffc107'),
(3, 2, 16, '25', '02', '2023', '2023-02-25', '2023-02-25', '', '', '#007bff'),
(4, 3, 16, '04', '02', '2023', '2023-02-04', '2023-02-04', '', '', '#d51a1a'),
(6, 6, 16, '20', '02', '2023', '2023-02-28', '2023-02-28', '', '', '#ffc107'),
(7, 8, 16, '28', '02', '2023', '2023-02-28', '2023-02-28', '11:46', '', '#007bff'),
(8, 4, 16, '28', '02', '2023', '2023-02-28', '2023-02-28', '', '', '#28a745'),
(9, 9, 16, '16', '02', '2023', '2023-02-16', '2023-02-16', '', '', '#007bff'),
(10, 3, 16, '28', '02', '2023', '2023-02-28', '2023-02-28', '', '', '#dc3545'),
(11, 6, 16, '28', '02', '2023', '2023-02-28', '2023-02-28', '', '', '#007bff'),
(12, 3, 16, '25', '02', '2023', '2023-02-25', '2023-02-25', '', '', '#ec00b9'),
(13, 3, 16, '07', '02', '2023', '2023-02-07', '2023-02-07', '', '', '#007bff'),
(14, 5, 16, '11', '02', '2023', '2023-02-11', '2023-02-11', '', '', '#ffc107'),
(15, 6, 16, '04', '02', '2023', '2023-02-04', '2023-02-04', '', '', '#007bff'),
(16, 3, 16, '04', '03', '2023', '2023-03-04', '2023-03-04', '', '', '#da1de7'),
(17, 5, 16, '09', '02', '2023', '2023-02-09', '2023-02-09', '', '', '#ffc107'),
(18, 2, 16, '16', '03', '2023', '2023-03-16', '2023-03-16', '21:50', '', '#ec00b9'),
(19, 2, 16, '24', '03', '2023', '2023-03-24', '2023-03-24', '', '', '#ec00b9'),
(20, 3, 16, '22', '03', '2023', '2023-03-22', '2023-03-22', '', '', '#dc3545');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicaciones`
--

CREATE TABLE `ubicaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `calle` varchar(30) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `barrio` varchar(30) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `referencias` varchar(100) NOT NULL,
  `color` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ubicaciones`
--

INSERT INTO `ubicaciones` (`id`, `nombre`, `calle`, `numero`, `barrio`, `municipio`, `estado`, `referencias`, `color`) VALUES
(1, 'vacio', '1', '4', '3', '2', '5', '6', '#000000'),
(2, 'vacio', '1', '6', '3', '2', '4', '5', '#000000'),
(3, 'vacio', '12', '4', '3', '2', '4', '5', '#000000'),
(4, 'vacio', '1', '4', '3', '2', '5', '6', '#000000'),
(5, 'vacio', '5', '5', '5', '5', '5', '5', '#000000'),
(6, 'vacio', '5', '5', '5', '5', '5', '5', '#000000'),
(7, 'vacio', '5', '5', '5', '5', '5', '5', '#000000'),
(8, 'vacio', '4', '4', '4', '4', '4', '4', '#000000'),
(9, 'vacio', '', '', '', '', '', '', '#000000'),
(10, 'vacio', '1', '1', '1', '1', '1', '1', '#000000'),
(11, 'vacio', '', '', '', '', '', '', '#000000'),
(12, 'vacio', '1', '4', '3', '2', '5', '6', '#000000'),
(13, 'vacio', '', '', '', '', '', '', '#000000'),
(14, 'vacio', '', '', '', '', '', '', '#000000'),
(15, 'vacio', '', '', '', '', '', '', '#000000'),
(16, 'Oficina ', 'Prol. Blvd. la Libertad ', '208', 'Fátima', 'Apizaco', 'Tlaxcala', '', '#007bff');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fechas`
--
ALTER TABLE `fechas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `fechas`
--
ALTER TABLE `fechas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
