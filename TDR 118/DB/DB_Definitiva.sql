-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2023 a las 03:08:48
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_de_ropa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_prenda` int(11) NOT NULL,
  `id_comprador` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` float NOT NULL,
  `fecha` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `id_prenda`, `id_comprador`, `cantidad`, `total`, `fecha`) VALUES
(25, 71, 2, 1, 4263.99, '2023-06-30 23:50:12 '),
(26, 37, 2, 1, 21567, '2023-07-01 00:01:22 '),
(27, 71, 4, 2, 8377.98, '2023-07-01 00:04:26 '),
(28, 30, 2, 3, 243360, '2023-07-01 00:07:56 '),
(29, 30, 2, 3, 243360, '2023-07-01 00:08:27 '),
(30, 70, 2, 4, 48070.8, '2023-07-01 00:08:56 '),
(31, 70, 2, 4, 48070.8, '2023-07-01 00:09:31 '),
(32, 70, 2, 4, 48070.8, '2023-07-01 00:10:24 '),
(33, 70, 2, 4, 48070.8, '2023-07-01 00:10:33 '),
(34, 36, 2, 8, 62101.9, '2023-07-01 00:18:56 '),
(35, 71, 2, 2, 8377.98, '2023-07-01 00:37:22 '),
(36, 71, 2, 2, 8377.98, '2023-07-01 00:37:46 '),
(37, 71, 2, 2, 8377.98, '2023-07-01 00:38:00 '),
(38, 71, 2, 2, 8377.98, '2023-07-01 00:38:09 '),
(39, 69, 2, 2, 2473.18, '2023-07-01 02:01:51 ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `user_id` int(11) NOT NULL,
  `nombre` varchar(32) COLLATE utf8_bin NOT NULL,
  `pass` varchar(32) COLLATE utf8_bin NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`user_id`, `nombre`, `pass`, `tipo`) VALUES
(1, 'Elon Musk', 'b8$P#62D26w', 1),
(2, 'Juan Elmascapo', '12345678', 1),
(3, 'Will Smith', '12345678', 1),
(4, 'Dwayne Johnson', 'R2pE9wK!-', 1),
(5, 'Jeff Bezos', 'sN9*m4qJAllg', 1),
(6, 'Alejandro Magno', '12345678', 2),
(7, 'Cristiano Ronaldo', '3v$F7sT#DD', 1),
(8, 'Barack Obama', 'H@9z2jS7_', 1),
(9, 'Nadie', 'x5J!pA4blAK', 1),
(10, 'Lionel Messi', 'krgekfj93i', 1),
(11, 'Paulo Londra', 'P7*rN3zB_23', 1),
(12, 'Angelina Jolie', 'W#5bM6f2pL@8kT9', 1),
(13, 'Madonna', '6D#9kL$F@', 1),
(14, 'Anuel AA', 'aaaaaaaa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prendas`
--

CREATE TABLE `prendas` (
  `id_prenda` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_bin NOT NULL,
  `precio` double NOT NULL,
  `tipo` varchar(15) COLLATE utf8_bin NOT NULL,
  `imagen` varchar(500) COLLATE utf8_bin NOT NULL,
  `detalles` varchar(700) COLLATE utf8_bin NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `prendas`
--

INSERT INTO `prendas` (`id_prenda`, `nombre`, `precio`, `tipo`, `imagen`, `detalles`, `stock`) VALUES
(26, 'Camiseta simple de algodon', 4849.99, '0', 'IMG/Camiseta basica de algodon.jpg', 'La camiseta simple de algodón es una prenda básica y cómoda. Está confeccionada con algodón suave y transpirable, brindando una sensación agradable al contacto con la piel. Su diseño es sencillo y versátil, sin estampados ni adornos, lo que la convierte en una opción fácil de combinar con diferentes prendas. Ideal para un look casual y relajado, la camiseta de algodón es una elección práctica y duradera para el uso diario.', 15),
(27, 'Buzo con capucha', 8199.99, '0', 'IMG/Sudadera con capucha.jpg', '\r\nLa sudadera con capucha es una prenda casual y cómoda, confeccionada en un tejido suave y cálido. Con mangas largas y un corte holgado, brinda abrigo y libertad de movimiento. La capucha ajustable añade un toque funcional y estilizado. Disponible en una amplia variedad de colores y diseños, es versátil y se puede combinar fácilmente con diferentes prendas. Ideal para actividades deportivas, relajarse en casa o para un look casual y moderno. Una prenda imprescindible para el confort y el estilo en cualquier ocasión.', 55),
(28, 'Zapatos clasicos de cuero', 24999.99, '1', 'IMG/Zapatos clasicos de cuero.jpg', 'Los zapatos clásicos de cuero son un calzado elegante y sofisticado que perdura en el tiempo. Fabricados con cuero de alta calidad, ofrecen durabilidad y un aspecto refinado. Su diseño atemporal presenta líneas limpias y un acabado pulido. Estos versátiles zapatos se adaptan a diversas ocasiones, desde formales hasta informales elegantes. Disponibles en estilos como mocasines, oxfords o brogues, ofrecen opciones para todos los gustos. Con colores clásicos como negro o marrón, son fáciles de combinar. Los zapatos clásicos de cuero brindan estilo, durabilidad y una sensación de lujo en cada paso.', 28),
(30, 'Blazer de lana a cuadros', 66999.99, '2', 'IMG/Blazer de lana a cuadros.jpg', 'mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmmm mmmm', 20),
(33, 'Guantes grises de invierno', 1999.99, '0', 'IMG/guantes.jpg', 'Guantes que abrigan las manos', 16),
(34, 'Pantalon negro', 16899.99, '0', 'IMG/pan.jpg', 'Prenda versátil y elegante que combina la comodidad de unos pantalones con la sofisticación de detalles únicos. Su color negro clásico le otorga un aspecto atemporal y fácil de combinar, mientras que las mangas en la parte inferior agregan un toque distintivo y moderno. Ideal para quienes buscan una opción de vestimenta que destaque sin sacrificar la comodidad.', 12),
(35, 'Bufanda de lana a rayas', 7199.99, '0', 'IMG/bufanda.jpg', 'Una bufanda ideal para utilizar en verano. Abrigada y de diferentes colores.', 22),
(36, 'Gorro de pescador negro', 6399.99, '0', 'IMG/gorro-pescador.jpg', 'Gorro de pescador, color negro.', 18),
(37, 'Camisa con rayas', 17699.99, '1', 'IMG/camisaaaaaaaa.jpg', 'Una camisa de manga corta con rayas rojas y azules', 9),
(38, 'Gorra con helice', 1999.99, '3', 'IMG/gorrahelice.jpg', 'Una gorra con una hélice arriba, multicolor e ideal para tus hijos.', 32),
(39, 'Abrigo de algodon', 15399.99, '2', 'IMG/abrigoalgodon.jpg', 'Abrigo de algodón muy cómodo, ideal para damas.', 12),
(41, 'Buzo con capucha para dama', 15999.99, '2', 'IMG/buzomujer.jpg', 'Buzo con capucha especialmente diseñado para ellas.', 10),
(66, 'Bufanda floreada azul', 1199.99, '2', 'IMG/bufanda floreada.jpg', 'Bufanda floreada color azul ideal para tu abuela o para personas de todas las edades.', 11),
(68, 'Bolso Prada Milano', 446999.99, '2', 'IMG/bolsoprada.jpg', 'Bolso para dama importado especialmente de sus fábricas en Milán, Italia.', 40),
(69, 'Calcetines color salame', 959.99, '1', 'IMG/calcetines salame.jpg', 'Calcetines de color salame para los pies', 38),
(70, 'Tacon rojo', 9900.99, '2', 'IMG/taconrojo.jpg', 'Tacón rojo ideal para dama.', 20),
(71, 'Gorro de invierno rojo', 3399.99, '3', 'IMG/gorroninos.jpg', 'Gorro de invierno rojo ideal para niños y niñas.', 7),
(72, 'Camisa blanca de manga corta', 11499.99, '1', 'IMG/camisablancamangacorta.jpg', 'La camisa blanca de manga corta es una prenda clásica y versátil que no puede faltar en tu armario. Confeccionada en un suave y ligero tejido, te proporciona comodidad y frescura en los días más cálidos. Su diseño de manga corta resalta tus brazos y te brinda libertad de movimiento. Además, el color blanco puro de esta camisa te permite crear infinitas combinaciones de estilo. Ya sea para una ocasión casual o un evento más formal, esta camisa blanca de manga corta es la elección perfecta para lucir elegante y a la moda.', 20);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `prendas`
--
ALTER TABLE `prendas`
  ADD PRIMARY KEY (`id_prenda`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT de la tabla `prendas`
--
ALTER TABLE `prendas`
  MODIFY `id_prenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
