-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2021 a las 21:41:34
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

--
-- Volcado de datos para la tabla `gustos`
--

INSERT INTO `gustos` (`id_usuario`, `nombre_tipo`) VALUES
('cynthia_aa', 'China'),
('maria_ii', 'Francesa');

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
  `precio` float NOT NULL,
  `imagen` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `platillos_bebidas`
--

INSERT INTO `platillos_bebidas` (`id_platillo`, `id_restaurante`, `nombre_subtipo`, `nombre`, `descripcion`, `precio`, `imagen`) VALUES
(1, 2, 'Postres', 'Camelia', 'Gelatina de café servida con leche endulzada y licor de café', 47, 'imagenes/platillos/platillo-1.png'),
(4, 2, 'Bebidas', 'Calpis', 'Bebida láctea típica japonesa de 280 ml', 44, 'imagenes/platillos/platillo-4.png'),
(7, 3, 'Bebidas', 'Ramune de Fresa', 'Bebida gaseosa japonesa sabor fresa de 200 ml', 63, 'imagenes/platillos/platillo-7.png'),
(8, 3, 'Bebidas', 'Ramune Natural', 'Bebida gaseosa japonesa de 200 ml', 63, 'imagenes/platillos/platillo-8.png'),
(11, 1, 'Platillos', 'Sushi Ebi', 'Pieza de sushi con Ebi (camarón)', 37, 'imagenes/platillos/platillo-11.png'),
(17, 1, 'Platillos', 'Nigiri Especial', 'Combinación de 9 piezas de pescados y mariscos importados', 445, 'imagenes/platillos/platillo-17.png'),
(18, 1, 'Platillos', 'Sashimi Suzuki', 'Frescos cortes de filete de pescado crudo Robalo', 235, 'imagenes/platillos/platillo-18.png'),
(20, 1, 'Platillos', 'Sushi Futomaki Shake', 'Tradicional rollo grueso, relleno de camarón, aguacate, pepino, kampyo y huevo, con salmón fresco.', 154, 'imagenes/platillos/platillo-20.png'),
(22, 1, 'Platillos', 'Rollo Filadelfia', 'Arroz por fuera, relleno de salmón ahumado, queso crema y pepino', 134, 'imagenes/platillos/platillo-22.png'),
(23, 2, 'Platillos', 'Inari Sushi', 'Queso de soya frito y sazonado, relleno de arroz', 106, 'imagenes/platillos/platillo-23.png'),
(24, 2, 'Platillos', 'Chirashi Sushi', 'Combinación de pescados y mariscos nacionales sobre una cama de arroz', 275, 'imagenes/platillos/platillo-24.png'),
(25, 2, 'Platillos', 'Tekkadon', 'Frescas rebanadas de atún marinadas en soya y wasabi sobre una cama de arroz', 225, 'imagenes/platillos/platillo-25.png'),
(26, 2, 'Platillos', 'Gyu Tataki', 'Sashimi de filete de res marinado en ponzu de ajo y nabo molidos con cebollín', 225, 'imagenes/platillos/platillo-26.png'),
(30, 3, 'Platillos', 'Nabeyaki Udon', 'Tallarines con caldo ligero de soya y verduras, preparado en cazuela de barro con camarones capeados, pastel de pescado, huevo y verduras', 209, 'imagenes/platillos/platillo-30.png'),
(34, 3, 'Platillos', 'Hiyashi Chuka', 'Fideos estilo ramen servidos en frío con verduras, jamón y huevo, en vinagreta de soya y ajonjolí', 190, 'imagenes/platillos/platillo-34.png'),
(35, 3, 'Platillos', 'Yamakake', 'Cubos de atún marinados cubiertos de yamaimo (papa japonesa)', 182, 'imagenes/platillos/platillo-35.png'),
(36, 3, 'Platillos', 'Edamame', 'Frijol tierno de soya en vaina, cocido', 56, 'imagenes/platillos/platillo-36.png'),
(37, 8, 'Bebidas', 'Café de Olla', 'Café de olla endulzado con piloncillo y especias', 20, 'imagenes/platillos/platillo-37.png'),
(40, 8, 'Bebidas', 'Agua de Horchata', 'Bebida tradicional refrescante a base de arroz', 20, 'imagenes/platillos/platillo-40.png'),
(41, 8, 'Platillos', 'Mole con Pechuga', 'Porción de aproximadamente 250 gramos de mole con pechuga de pollo, acompañada de arroz,', 175, 'imagenes/platillos/platillo-41.png'),
(42, 7, 'Platillos', 'Burro de bistec', 'Burro de 30cm de bistec, acompañado de un costra de queso y salsa.', 125, 'imagenes/platillos/platillo-42.png'),
(43, 7, 'Platillos', 'Tacos de Pastor', 'Orden de 5 tacos de pastor', 85, 'imagenes/platillos/platillo-43.png'),
(44, 7, 'Platillos', 'Tacos de Suadero', 'Orden de 5 tacos de suadero.', 85, 'imagenes/platillos/platillo-44.png'),
(46, 4, 'Platillos', 'Crispy Fried Wings', 'Porción de 12 alitas tradicionales.', 170, 'imagenes/platillos/platillo-46.png'),
(47, 4, 'Platillos', 'Thai Sweet Chilli Wings', 'Porción de 12 alitas de aderezo thai.', 170, 'imagenes/platillos/platillo-47.png'),
(48, 4, 'Platillos', 'Honey Wasabi Wings', 'Porción de 12 alitas con aderezo de salsa de soya, miel y un toque de wasabi.', 175, 'imagenes/platillos/platillo-48.png'),
(49, 4, 'Platillos', 'Smokey BBQ Wings', 'Porción de 12 alitas a la parrilla con salsa BBQ.', 180, 'imagenes/platillos/platillo-49.png'),
(50, 11, 'Platillos', 'Terrine de la casa', 'Elaborada en nuestros hornos y acompañada con ensalada, pepinillos y mostaza. Porción de 100 gramos.', 75, 'imagenes/platillos/platillo-50.png'),
(51, 11, 'Platillos', 'Salmón Marinado', 'Carpaccio espeso de salmón crudo marinado en salsa de pesto y soya.', 95, 'imagenes/platillos/platillo-51.png'),
(52, 12, 'Platillos', 'Ensalada Roquefort', 'Mezcla de lechuga, jitomate, croutones, roquefort en pedazos y aderezo del mismo.', 60, 'imagenes/platillos/platillo-52.png'),
(53, 12, 'Platillos', 'Ensalada de Chevre Chaud', 'Ensalada verde, jitomate, tocino caliente y queso de cabra gratinado sobre un pan tostado.', 65, 'imagenes/platillos/platillo-53.png'),
(54, 12, 'Platillos', 'Ensalada Feta', 'Mezcla de lechuga, queso feta marinado, jitomate y tocino.', 60, 'imagenes/platillos/platillo-54.png'),
(55, 11, 'Platillos', 'Carne a las Finas Hierbas', 'Tierno medallón de filete de res, sazonado con hierbas y un toque de vino blanco (200gr, Nacional) flameado al brandy acompañado de papas a la francesa (100gr).', 280, 'imagenes/platillos/platillo-55.png'),
(62, 11, 'Bebidas', 'Stella Artois', 'Cerveza Stella Artois de 330 ml.', 50, 'imagenes/platillos/platillo-62.png'),
(63, 13, 'Platillos', 'Pappardelle Mecelleria', 'La pasta del capo. Hecha en casa con ragú de costillas mixtas braseadas en jitomate.', 213, 'imagenes/platillos/platillo-63.png'),
(64, 13, 'Postres', 'Tiramisú Brooklyn', 'Receta tradicional de tiramisú, un delicioso postre de café.', 135, 'imagenes/platillos/platillo-64.png'),
(67, 13, 'Platillos', 'Pasta Alla Ruota', 'Nuestra pasta artesanal preparada dentro de una rueda de queso Grana Padano.', 227, 'imagenes/platillos/platillo-67.png'),
(68, 13, 'Snacks', 'Dip de Alcachofa', 'Con espinaca y mezcla de quesos cremosos acompañado de pan campesino a la parrilla.', 135, 'imagenes/platillos/platillo-68.png'),
(69, 12, 'Platillos', 'Pizza Margherita', 'Pizza tradicional con jitomate, mozzarella fresca, aceite de olivo y albahaca.', 178, 'imagenes/platillos/platillo-69.png'),
(70, 12, 'Platillos', 'De Higo', 'Pizza blanca con queso mozzarella, gorgonzola e higos, terminada con arúgula.', 205, 'imagenes/platillos/platillo-70.png'),
(71, 5, 'Postres', 'Fresh Mango Waffle', 'Waffle con crema batida y mango de temporada. ', 90, 'imagenes/platillos/platillo-71.png'),
(72, 5, 'Bebidas', 'Signature Hot Chocolate', 'Bebida caliente de chocolate de leche de 300 ml', 80, 'imagenes/platillos/platillo-72.png'),
(73, 5, 'Bebidas', 'Caffe Latte', 'Bebida caliente de shot de expreso con leche', 70, 'imagenes/platillos/platillo-73.png'),
(74, 5, 'Bebidas', 'Black Tea', 'Infusión de té negro con frutos rojos y miel, bajo en calorías', 79, 'imagenes/platillos/platillo-74.png'),
(77, 10, 'Postres', 'Mousse de Chocolate', 'Postre hecho a base de chocolate amargo, con leche y con praliné.', 60, 'imagenes/platillos/platillo-77.png'),
(78, 10, 'Postres', 'Isla flotante', 'Helado de vainilla cubierto con crema batida y un shot de café.', 90, 'imagenes/platillos/platillo-78.png'),
(79, 10, 'Postres', 'Tarte aux pommes', 'Delicada tarta de manzana y canela.', 50, 'imagenes/platillos/platillo-79.png'),
(80, 10, 'Postres', 'Profiteroles', 'Orden de 10 pastelillos relleno de crema de vainilla cubiertos de chocolate.', 90, 'imagenes/platillos/platillo-80.png'),
(81, 14, 'Platillos', 'Fabada Asturiana con Fabes de la Granja', 'Orden para 2 personas de fabes asturiana de la granja con chorizo, morcilla y tocino.', 315, 'imagenes/platillos/platillo-81.png'),
(82, 14, 'Platillos', 'Paella Valenciana', 'Orden para 2 personas de arroz, acompañado por mariscos, pollo, legumbres.', 315, 'imagenes/platillos/platillo-82.png'),
(83, 14, 'Snacks', 'Jamón Serrano', 'Orden de 100 grs de jamón serrano', 200, 'imagenes/platillos/platillo-83.png'),
(84, 14, 'Platillos', 'Robalo en Salsa Verde', 'Tronco de robalo en salsa de perejil con camarones y almejas.', 200, 'imagenes/platillos/platillo-84.png'),
(85, 15, 'Platillos', 'Pulpo a la Gallega', 'Orden para 3 personas del platillo gallego de pulpo con pimentón acompañado de papas.', 450, 'imagenes/platillos/platillo-85.png'),
(86, 15, 'Platillos', 'Tortilla de Papa', 'Tradicional tortilla de papa con chorizo español.', 185, 'imagenes/platillos/platillo-86.png'),
(87, 15, 'Platillos', 'Cabrito Adobado al Horno', 'Preparación elaborada con cabrito cortado en piezas y horneado con trozos de jitomate, cebolla en rodajas, ajo picado, laurel, sal, pimienta y vino blanco.', 600, 'imagenes/platillos/platillo-87.png'),
(88, 15, 'Bebidas', 'Limón Sprite Zero', 'Bebida embotellada de Limón Sprite sin azúcar', 50, 'imagenes/platillos/platillo-88.png'),
(89, 16, 'Platillos', 'Arroz Basmati', 'Arroz aromático, largo típico de la India, está porción es individual.', 65, 'imagenes/platillos/platillo-89.png'),
(90, 16, 'Platillos', 'Butter Chicken', 'Es un platillo tradicional en distintas ceremonias de la India, a base de un pollo marinado previamente con especias y mantequilla el cual se mezcla con una ligera salsa de curry.', 170, 'imagenes/platillos/platillo-90.png'),
(91, 16, 'Platillos', 'Tarka Dhal', 'Lentejas al estilo hindú.', 95, 'imagenes/platillos/platillo-91.png'),
(92, 16, 'Platillos', 'Vegetable Masala', 'Variedad de vegetales cocinados al modo masala.', 95, 'imagenes/platillos/platillo-92.png'),
(93, 17, 'Platillos', 'Tandoori', 'Platillo de carne marinado en una salsa de yogur y mezcla de garam Masala: una mezcla de especias, jengibre, ajo y de aceite de oliva para luego asarse en el horno de cerámica tandoor.', 165, 'imagenes/platillos/platillo-93.png'),
(94, 17, 'Platillos', 'Masala', 'Es una mezcla de diferentes especial usadas en la cocina india que le confiere un sabor y un aroma característicos, los platillos son cocinados en una exquisita crema con esencia de coco y almendra para darles un sabor particularmente dulce.', 165, 'imagenes/platillos/platillo-94.png'),
(95, 17, 'Platillos', 'Pan Naan', 'Pan tradicional indio cubierto de ajo, cilantro y matequilla.', 40, 'imagenes/platillos/platillo-95.png'),
(96, 17, 'Postres', 'Gulam jamun', 'Dulce típico de la India, hecho con masa y especias.', 45, 'imagenes/platillos/platillo-96.png'),
(97, 18, 'Platillos', 'Spring Rolls Vegetales', 'Orden de 4 rollos fritos de vegetales frescos y finamente picados.', 78, 'imagenes/platillos/platillo-97.png'),
(98, 18, 'Platillos', 'Teppan Wok', 'Versión de la casa del clásico teppanyaki, pero hecho al wok combinacion de chicharos chinos, pimientos, cebolla, brocoli, zanahoria, bambu, hongos chinos, zucchini, germinado de soya, jicama y elotitos chinos.', 186, 'imagenes/platillos/platillo-98.png'),
(99, 18, 'Platillos', 'Chopsuey', 'Platillo fusión, a base de germen de soya y vegetales salteados al wok', 168, 'imagenes/platillos/platillo-99.png'),
(100, 18, 'Platillos', 'Noodles ( Chow Mein )', 'Tallarines chinos. Pasta Fresca hecha en casa salteada al wok en salsa obscura, acompañados de pimientos, zanahoria,cebolla, brocoli y carne de cerdo', 180, 'imagenes/platillos/platillo-100.png'),
(101, 19, 'Platillos', 'Singapur', 'Fideos de arroz chinos preparados al curry, acompañados de pimientos, zanahoria, apio, cebolla y huevo.', 180, 'imagenes/platillos/platillo-101.png'),
(102, 19, 'Platillos', 'Sopa Vietnamita', 'Exquisita sopa picosita a base de curry; elaborada con tallarines, brócoli, láminas de filete y chícharo chino, única en México.', 112, 'imagenes/platillos/platillo-102.png'),
(103, 19, 'Platillos', 'Pollo Dragón', 'Cubos de pechuga de pollo salteados al wok en mezcla de chiles, cinco especies chinas, cebolla y cebollín.', 236, 'imagenes/platillos/platillo-103.png'),
(104, 19, 'Platillos', 'Lomo Hunan', 'Láminas de cerdo crujiente, bañadas en una exquisita salsa dulce con un ligero toque de picante, ajonjolí y cebollín.', 250, 'imagenes/platillos/platillo-104.png'),
(105, 19, 'Postres', 'Litchis Flameados', 'Deliciosa Fruta Oriental, flameado al wok.', 145, 'imagenes/platillos/platillo-105.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurante`
--

CREATE TABLE `restaurante` (
  `id_restaurante` int NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `nombre_tipo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `imagen` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `restaurante`
--

INSERT INTO `restaurante` (`id_restaurante`, `nombre`, `nombre_tipo`, `imagen`) VALUES
(1, 'Sushi Factory', 'Japonesa', 'imagenes/restaurantes/sushi-factory.png'),
(2, 'Tokyo Town', 'Japonesa', 'imagenes/restaurantes/tokyo-town.png'),
(3, 'Suntory', 'Japonesa', 'imagenes/restaurantes/suntory.png'),
(4, 'Kyochon Chicken', 'Coreana', 'imagenes/restaurantes/kyochon-chicken.png'),
(5, 'Little Coffee', 'Coreana', 'imagenes/restaurantes/little-coffee.png'),
(7, 'Los Mariachis', 'Mexicana', 'imagenes/restaurantes/los-mariachis.png'),
(8, 'La Piñata', 'Mexicana', 'imagenes/restaurantes/la-piñata.png'),
(10, 'French Desserts', 'Francesa', 'imagenes/restaurantes/french-desserts.png'),
(11, 'Bistro VI', 'Francesa', 'imagenes/restaurantes/bistro-VI.png'),
(12, 'De la Granja a la Mesa', 'Italiana', 'imagenes/restaurantes/granja.png'),
(13, 'dItalia', 'Italiana', 'imagenes/restaurantes/dItalia.png'),
(14, 'Flamenco', 'Española', 'imagenes/restaurantes/flamenco.png'),
(15, 'La Puerta', 'Española', 'imagenes/restaurantes/la-puerta.png'),
(16, 'Swagat', 'Comida India', 'imagenes/restaurantes/swagat.png'),
(17, 'La casa del curry', 'Comida India', 'imagenes/restaurantes/casa-curry.png'),
(18, 'Lao Tou', 'China', 'imagenes/restaurantes/lao-tou.png'),
(19, 'Made in China', 'China', 'imagenes/restaurantes/made-china.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtipo`
--

CREATE TABLE `subtipo` (
  `nombre_subtipo` varchar(20) NOT NULL,
  `imagen` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `subtipo`
--

INSERT INTO `subtipo` (`nombre_subtipo`, `imagen`) VALUES
('Bebidas', 'imagenes/categorias/bebidas.png'),
('Platillos', 'imagenes/categorias/platillo.png'),
('Postres', 'imagenes/categorias/postres.png'),
('Snacks', 'imagenes/categorias/snacks.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `nombre_tipo` varchar(20) NOT NULL,
  `imagen` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`nombre_tipo`, `imagen`) VALUES
('China', 'imagenes/categorias/china-2.png'),
('Comida India', 'imagenes/categorias/india-2.png'),
('Coreana', 'imagenes/categorias/corea-2.png'),
('Española', 'imagenes/categorias/españa-2.png'),
('Francesa', 'imagenes/categorias/francia-2.png'),
('Italiana', 'imagenes/categorias/italia-2.png'),
('Japonesa', 'imagenes/categorias/japon-2.png'),
('Mexicana', 'imagenes/categorias/mexico-2.png');

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
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidos`, `contrasena`, `fecha`, `email`, `telefono`, `calle`, `colonia`) VALUES
('cynthia_aa', 'Cynthia Maritza', 'Terán Carranza', '1234', '2001-09-25', 'al226582@edu.uaa.mx', '4491808868', 'Huejucar #306', 'Canteras de San José'),
('maria_ii', 'Maria', 'Macías', '1234', '2004-08-25', 'maria@edu.uaa.mx', '4491980011', 'Loma #302', 'Canteras de San Agustín');

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
  MODIFY `id_platillo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `restaurante`
--
ALTER TABLE `restaurante`
  MODIFY `id_restaurante` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
