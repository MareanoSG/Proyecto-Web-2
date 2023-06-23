-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2023 a las 00:56:27
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
  `fecha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `id_prenda`, `id_comprador`, `cantidad`, `total`, `fecha`) VALUES
(3, 20, 2, 4, 9800, 'Fecha indefinida'),
(4, 27, 2, 7, 57400, 'Fecha indefinida'),
(5, 22, 4, 5, 16000, 'Fecha indefinida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `user_id` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `tipo` int(11) NOT NULL,
  `saldo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`user_id`, `nombre`, `pass`, `tipo`, `saldo`) VALUES
(1, 'Elon Musk', 'b8$P#62D26w', 1, 2),
(2, 'Juan Elmascapo', '12345678', 1, 81.74),
(3, 'Will Smith', 't7F#hD5x', 1, 10000),
(4, 'Dwayne Johnson', 'R2pE9wK!-', 1, 286244),
(5, 'Jeff Bezos', 'sN9*m4qJAllg', 1, 17500),
(6, 'Alejandro Magno', '##%$&\"#4_DAdK', 2, 1001),
(7, 'Cristiano Ronaldo', '3v$F7sT#DD', 1, 0.27),
(8, 'Barack Obama', 'H@9z2jS7_', 1, 15000),
(9, 'Nadie', 'x5J!pA4blAK', 1, 0),
(10, 'Lionel Messi', 'krgekfj93i', 1, 99999.9),
(11, 'Paulo Londra', 'P7*rN3zB_23', 1, 47200),
(12, 'Angelina Jolie', 'W#5bM6f2pL@8kT9', 1, 35000),
(13, 'Madonna', '6D#9kL$F@', 1, 105000),
(14, 'Mauricio Ramayo', 'aaaaaaaa', 1, 3700);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prendas`
--

CREATE TABLE `prendas` (
  `id_prenda` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `precio` float NOT NULL,
  `imagen` varchar(500) NOT NULL,
  `detalles` varchar(1000) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `prendas`
--

INSERT INTO `prendas` (`id_prenda`, `nombre`, `precio`, `imagen`, `detalles`, `stock`) VALUES
(20, 'Camiseta básica de algodon', 2450, 'IMG/Camiseta basica de algodon.jpg', 'La camiseta básica de algodón es una prenda cómoda y versátil, con corte sencillo, mangas cortas y cuello redondo. Hecha de algodón suave y transpirable, es perfecta para uso diario, fácil de combinar y de cuidar. Es duradera, mantiene su forma y se adapta a diferentes estilos. ¡Un clásico imprescindible en cualquier guardarropa!', 20),
(22, 'Bufanda de lana a rayas', 3200, 'IMG/Bufanda de lana a rayas.jpg', 'La bufanda de lana a rayas es una prenda de invierno que combina estilo y calidez. Confeccionada en lana suave, brinda confort y protección contra el frío. Sus rayas de diferentes colores y grosores añaden un toque de diseño y personalidad. Perfecta para envolver alrededor del cuello, ofrece abrigo adicional y se adapta a cualquier outfit, ya sea casual o elegante. Una elección trendy y funcional para lucir con estilo en los días fríos.', 35),
(27, 'Sudadera con capucha', 8200, 'IMG/Sudadera con capucha.jpg', '\r\nLa sudadera con capucha es una prenda casual y cómoda, confeccionada en un tejido suave y cálido. Con mangas largas y un corte holgado, brinda abrigo y libertad de movimiento. La capucha ajustable añade un toque funcional y estilizado. Disponible en una amplia variedad de colores y diseños, es versátil y se puede combinar fácilmente con diferentes prendas. Ideal para actividades deportivas, relajarse en casa o para un look casual y moderno. Una prenda imprescindible para el confort y el estilo en cualquier ocasión.', 55),
(28, 'Zapatos clasicos de cuero', 25000, 'IMG/Zapatos clasicos de cuero.jpg', 'Los zapatos clásicos de cuero son un calzado elegante y sofisticado que perdura en el tiempo. Fabricados con cuero de alta calidad, ofrecen durabilidad y un aspecto refinado. Su diseño atemporal presenta líneas limpias y un acabado pulido. Estos versátiles zapatos se adaptan a diversas ocasiones, desde formales hasta informales elegantes. Disponibles en estilos como mocasines, oxfords o brogues, ofrecen opciones para todos los gustos. Con colores clásicos como negro o marrón, son fáciles de combinar. Los zapatos clásicos de cuero brindan estilo, durabilidad y una sensación de lujo en cada paso.', 16),
(30, 'Blazer de lana a cuadros', 67000, 'IMG/Blazer de lana a cuadros.jpg', 'Un blazer de lana a cuadros', 16);

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
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `prendas`
--
ALTER TABLE `prendas`
  MODIFY `id_prenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
