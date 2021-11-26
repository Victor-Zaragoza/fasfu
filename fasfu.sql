-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2021 a las 00:40:00
-- Versión del servidor: 8.0.26
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fasfu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int NOT NULL,
  `id_usuario` varchar(20) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_platillos`
--

CREATE TABLE `compras_platillos` (
  `id_compra` int NOT NULL,
  `id_platillo` int NOT NULL,
  `cantidad` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gustos`
--

CREATE TABLE `gustos` (
  `id_usuario` varchar(20) NOT NULL,
  `nombre_tipo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opiniones`
--

CREATE TABLE `opiniones` (
  `id_opinion` int NOT NULL,
  `id_platillo` int NOT NULL,
  `id_usuario` varchar(20) NOT NULL,
  `comentario` text,
  `calificacion` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platillos_bebidas`
--

CREATE TABLE `platillos_bebidas` (
  `id_platillo` int NOT NULL,
  `id_restaurante` int NOT NULL,
  `nombre_subtipo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nombre` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `descripcion` text,
  `imagen` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurante`
--

CREATE TABLE `restaurante` (
  `id_restaurante` int NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `nombre_tipo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `imagen` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtipo`
--

CREATE TABLE `subtipo` (
  `nombre_subtipo` varchar(20) NOT NULL,
  `imagen` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `subtipo`
--

INSERT INTO `subtipo` (`nombre_subtipo`, `imagen`) VALUES
('Bebidas', NULL),
('Platillos', NULL),
('Postres', NULL),
('Snacks', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `nombre_tipo` varchar(20) NOT NULL,
  `imagen` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`nombre_tipo`, `imagen`) VALUES
('China', NULL),
('Coreana', NULL),
('Española', NULL),
('Francesa', NULL),
('Indú', NULL),
('Italiana', NULL),
('Japonesa', NULL),
('Mexicana', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` varchar(20) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellidos` varchar(60) DEFAULT NULL,
  `contrasena` varchar(35) NOT NULL,
  `fecha` date DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `calle` varchar(30) DEFAULT NULL,
  `colonia` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`) USING BTREE,
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `compras_platillos`
--
ALTER TABLE `compras_platillos`
  ADD KEY `id_platillo` (`id_platillo`),
  ADD KEY `id_compra` (`id_compra`);

--
-- Indices de la tabla `gustos`
--
ALTER TABLE `gustos`
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `nombre_tipo` (`nombre_tipo`);

--
-- Indices de la tabla `opiniones`
--
ALTER TABLE `opiniones`
  ADD PRIMARY KEY (`id_opinion`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_platillo` (`id_platillo`);

--
-- Indices de la tabla `platillos_bebidas`
--
ALTER TABLE `platillos_bebidas`
  ADD PRIMARY KEY (`id_platillo`) USING BTREE,
  ADD KEY `id_restaurante` (`id_restaurante`),
  ADD KEY `nombre_subtipo` (`nombre_subtipo`);

--
-- Indices de la tabla `restaurante`
--
ALTER TABLE `restaurante`
  ADD PRIMARY KEY (`id_restaurante`),
  ADD KEY `nombre_tipo` (`nombre_tipo`);

--
-- Indices de la tabla `subtipo`
--
ALTER TABLE `subtipo`
  ADD PRIMARY KEY (`nombre_subtipo`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`nombre_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `opiniones`
--
ALTER TABLE `opiniones`
  MODIFY `id_opinion` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `platillos_bebidas`
--
ALTER TABLE `platillos_bebidas`
  MODIFY `id_platillo` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `restaurante`
--
ALTER TABLE `restaurante`
  MODIFY `id_restaurante` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras_platillos`
--
ALTER TABLE `compras_platillos`
  ADD CONSTRAINT `compras_platillos_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_compra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_platillos_ibfk_2` FOREIGN KEY (`id_platillo`) REFERENCES `platillos_bebidas` (`id_platillo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gustos`
--
ALTER TABLE `gustos`
  ADD CONSTRAINT `gustos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gustos_ibfk_2` FOREIGN KEY (`nombre_tipo`) REFERENCES `tipo` (`nombre_tipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `opiniones`
--
ALTER TABLE `opiniones`
  ADD CONSTRAINT `opiniones_ibfk_1` FOREIGN KEY (`id_platillo`) REFERENCES `platillos_bebidas` (`id_platillo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `opiniones_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `platillos_bebidas`
--
ALTER TABLE `platillos_bebidas`
  ADD CONSTRAINT `platillos_bebidas_ibfk_1` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurante` (`id_restaurante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `platillos_bebidas_ibfk_2` FOREIGN KEY (`nombre_subtipo`) REFERENCES `subtipo` (`nombre_subtipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `restaurante`
--
ALTER TABLE `restaurante`
  ADD CONSTRAINT `restaurante_ibfk_1` FOREIGN KEY (`nombre_tipo`) REFERENCES `tipo` (`nombre_tipo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
