-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2021 a las 14:14:11
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `netclip`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

CREATE TABLE `catalogo` (
  `ID_productos` int(11) NOT NULL,
  `Nombre` varchar(70) NOT NULL,
  `Precio` decimal(5,0) DEFAULT NULL,
  `Categoria` varchar(15) NOT NULL,
  `Img_link` varchar(200) DEFAULT NULL,
  `especial` varchar(255) DEFAULT NULL,
  `stock` decimal(5,0) DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`ID_productos`, `Nombre`, `Precio`, `Categoria`, `Img_link`, `especial`, `stock`) VALUES
(1, 'Arroz Saman', '50', 'Arroz', 'arroz saman.jpg', 'especial', '100'),
(2, 'Arroz Blue Patna', '65', 'Arroz', 'arroz blue patna.jpg', 'especial', '100'),
(3, 'Fideos Cololo con Morron', '53', 'Fideos', 'fideos cololo morron.jpg', 'especial', '100'),
(4, 'Fideos Cololo con Espinaca', '60', 'Fideos', 'fideos cololo espinaca.jpg', 'especial', '100'),
(5, 'Fideos Adria', '65', 'Fideos', 'fideos adria.jpg', 'especial', '100'),
(6, 'Tallarines Adria', '65', 'Fideos', 'tallarines adria.jpg', 'especial', '100'),
(7, 'Aceite Optimo 1L ', '120', 'Aceites', 'aceite optimo 1L.jpg', 'especial', '100'),
(8, 'Aceite Optimo 5L', '650', 'Aceites', 'aceite optimo 5L.jpg', 'especial', '100'),
(9, 'Aceite Saman 1L', '140', 'Aceites', 'aceite saman 1L.jpg', NULL, '100'),
(10, 'Aceite Saman 3L', '450', 'Aceites', 'aceite saman 3L.jpg', NULL, '100'),
(11, 'Aceite de Oliva Extra Virgen MAZZA 1Lt', '600', 'Aceites', 'aceite de oliva.jpg', NULL, '100'),
(12, 'Schneck Clásica', '90', 'Hamburguesas', 'schneck clásica.jpg', NULL, '100'),
(13, 'Schneck XL', '120', 'Hamburguesas', 'schneck XL.jpg', NULL, '100'),
(14, 'Nuggets Ardo 1KG', '535', 'Nuggets', 'nuggets ardo 1KG.jpg', NULL, '100'),
(15, 'Nuggets Baita 700GR', '170', 'Nuggets', 'nuggets baita 700GR.jpg', NULL, '100'),
(16, 'Nuggets Sadia 900GR', '296', 'Nuggets', 'nuggets sadia 900GR.jpg', NULL, '100'),
(17, 'Coca cola 2.25L ', '150', 'Bebida', 'coca cola 2.25L.jpg', NULL, '100'),
(18, 'Fanta 3L', '160', 'Bebida', 'fanta 3L.jpg', NULL, '100'),
(19, 'Sprite 1.5L', '115', 'Bebida', 'sprite 1.5L.jpg', NULL, '100'),
(20, 'Fanta 1.5L', '115', 'Bebida', 'fanta 1.5L.jpg', NULL, '100'),
(21, 'Chocolate cailler', '315', 'Chocolate', 'chocolate cailler 1.jpg', NULL, '100'),
(22, 'Chocolate cailler', '270', 'Chocolate', 'chocolate cailler 2.jpg', NULL, '100'),
(23, 'Chocolate cailler', '435', 'Chocolate', 'chocolate cailler 3.jpg', NULL, '100'),
(24, 'Chocolate Lindor', '420', 'Chocolate', 'chocolate lindor 1.jpg', NULL, '100'),
(25, 'Chocolate Lindor', '255', 'Chocolate', 'chocolate lindor 2.jpg', NULL, '100'),
(26, 'Chocolate Milka', '136', 'Chocolate', 'chocolate milka.jpg', NULL, '100'),
(27, 'Chocolate nestle', '80', 'Chocolate', 'chocolate nestle.jpg', NULL, '100'),
(28, 'JOHNNIE WALKER BLACK', '1990', 'Whisky', 'johnnie walker black.jpg', NULL, '100'),
(29, 'Chivas Regal 18', '3699', 'Whisky', 'chivas regal 18.jpg', NULL, '100'),
(30, 'Chivas Regal 13', '1699', 'Whisky', 'chivas regal 13.jpg', NULL, '100'),
(31, 'JOHNNIE WALKER RED', '990', 'Whisky', 'johnnie walker red.jpg', NULL, '100'),
(32, 'Jack Daniels', '1880', 'Whisky', 'jack_daniels.jpg', NULL, '100'),
(33, 'Don pascual tinto', '289', 'Vinos', 'don pascual tinto.jpg', NULL, '100'),
(34, 'Don pascual blanco', '289', 'Vinos', 'don pascual blanco.jpg', NULL, '100'),
(35, 'Casillero del diablo Cabernet\nsauvignon', '459', 'Vinos', 'casillero del diablo cabernet.jpg', NULL, '100'),
(36, 'Casillero del diablo tinto', '459', 'Vinos', 'Casillero del diablo tinto.jpg', NULL, '100'),
(37, 'Don Perignon', '12266', 'Champagne', 'don perignon.jpg', NULL, '100'),
(38, 'BOLLINGER', '4900', 'Champagne', 'bollinger.jpg', NULL, '100'),
(39, 'Moet & Chandon', '3599', 'Champagne', 'moet chandon.jpg', NULL, '100');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `consulta` varchar(300) NOT NULL,
  `respuesta` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `chatbot`
--

INSERT INTO `chatbot` (`id`, `consulta`, `respuesta`) VALUES
(1, 'donde se encuentra el local|donde està el local|donde esta el local|donde se encuentran|por donde andan ', 'Nos encontramos en la utu de Solymar.'),
(2, 'cual es su numero de telefono|como es su numero|cual es su numero|pasame el numero de telefono', 'El numero telefonico es: 099345876'),
(3, 'Se puede pagar en efectivo|cuales son los metodos de pago|como puedo pagar|', 'Se puede pagar tanto como en efectivo, como con tarjeta'),
(4, 'Como funciona la modalidad de click&go|como funciona click&go|click&go', 'Debes hacer el pago on-line y pasarte directamente por la sucursal mas cercana, allí estarán nuestros empleados esperando para cargarte la mercadería en tu vehículo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
  `ID_tarjetas` int(11) NOT NULL,
  `Nombre_T` varchar(15) NOT NULL,
  `Apellido_T` varchar(15) NOT NULL,
  `Numero_T` varchar(20) NOT NULL,
  `Vencimiento_T` varchar(50) NOT NULL,
  `CVV_T` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`ID_tarjetas`, `Nombre_T`, `Apellido_T`, `Numero_T`, `Vencimiento_T`, `CVV_T`) VALUES
(38, 'pepe', 'popo', '7856658774522145', '03/24', '245'),
(39, 'giovanni', 'garcia', '4521123665411254', '5/33', '456'),
(40, 'pepe', 'pepe', '456698556322145', '5/45', '245'),
(41, 'gabriel', 'alzamendi', '4523652112544896', '12/31', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_usuarios` int(11) NOT NULL,
  `Password` varchar(70) NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `Apellido` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Num_tarjeta` decimal(20,0) DEFAULT NULL,
  `suscripto` varchar(10) DEFAULT 'no',
  `puntos` varchar(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_usuarios`, `Password`, `Nombre`, `Apellido`, `Email`, `Num_tarjeta`, `suscripto`, `puntos`) VALUES
(21, '$2y$10$nw.S1N.dK4UlW17srLN52.fGacIbbYU.JmoqpOJeLdmz4KOlCa09O', 'diego', 'bonora', 'dbonora@gmail.com', NULL, 'si', '100'),
(22, '$2y$10$eA./omb0zekTzVZtEu.4.es09kHzYlN1hteHpcgU.JOm6q//bAmUG', 'pepe', 'popo', 'pepepo@gmail.com', NULL, 'si', '100'),
(23, '$2y$10$22yPaBd92kIxvIF4.bJAyebquYEQKZBhT0nCOsaB2siDDSnxP4qAq', 'giovanni', 'garcia ', 'ggarcia@gmail.com', NULL, 'si', '300'),
(24, '$2y$10$bVgLa1uNsWegvdAUrZDUgOha6QpWiTCVa75QoJWJawB.mvZdi78mC', 'pepe', 'pepe', 'pepe@gmail.com', NULL, 'si', '3000'),
(25, '$2y$10$5NWcqIwVfY0yFxb1C9PKfuYQkED5Dc.jItaUBfq5UMly1oaXiwi1u', 'gabriel', 'alzamendi', 'galzamendi@gmail.com', NULL, 'si', '3000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`ID_productos`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`ID_tarjetas`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  MODIFY `ID_productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `ID_tarjetas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
