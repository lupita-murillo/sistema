-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-07-2025 a las 02:57:48
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `apellido_paterno` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `apellido_materno` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `num_control` varchar(20) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`nombre`, `apellido_paterno`, `apellido_materno`, `telefono`, `num_control`, `fecha_hora`) VALUES
('SOFIA', 'murillo', 'feria', '2781229254', '22eb201179', '2025-07-17 00:23:49'),
('diana', 'feria', 'rojas', '2781094444', '22eb201180', '2025-07-17 00:31:05'),
('claudia', 'feria', 'rojas', '2711229987', '22eb201181', '2025-07-17 01:07:55'),
('sandra', 'perez', 'garcia', '2871235588', '22eb201182', '2025-07-17 01:21:31'),
('diana sofia', 'feria', 'rojas', '2871235580', '22eb201183', '2025-07-17 12:29:24'),
('diana sofia', 'feria', 'rojas', '2871235580', '22eb201183', '2025-07-17 12:34:59'),
('Danna', 'murillo', 'feria', '2781229255', '22eb201184', '2025-07-17 12:48:25'),
('Danna', 'murillo', 'feria', '2781229255', '22eb201184', '2025-07-17 12:48:37'),
('MARIA GUADALUPE ', 'murillo', 'feria', '2781229255', '22eb201179', '2025-07-17 13:03:52'),
('olivia', 'estrada', 'pavon', '2781092114', '22eb201190', '2025-07-17 13:17:38'),
('juana', 'estrada', 'garcia', '1233455678', '22eb201192', '2025-07-17 13:33:27'),
('irma', 'estrada', 'garcia', '2871234567', '22eb201192', '2025-07-17 13:43:09'),
('SOFIA', 'perez', 'pavon', '1234562345', '22eb201193', '2025-07-17 13:44:26'),
('jesus', 'feria', 'rojas', '2341872345', '22eb201194', '2025-07-17 13:51:46'),
('jesus', 'estrada', 'feria', '1230985643', '22eb201195', '2025-07-17 13:54:31'),
('monica', 'feria', 'rojas', '2781229254', '22eb201181', '2025-07-17 13:55:51'),
('yetlanetzy', 'ruis', 'garcia', '1234567890', '22eb201196', '2025-07-17 15:45:40'),
('SOFIA', 'feria', 'rojas', '2781094444', '22eb201179', '2025-07-17 16:25:47');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD UNIQUE KEY `nombre` (`nombre`,`telefono`,`num_control`,`fecha_hora`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
