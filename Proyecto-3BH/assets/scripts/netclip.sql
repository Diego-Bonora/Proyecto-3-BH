-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-08-2021 a las 16:16:06
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
  `Precio` varchar(15) NOT NULL,
  `Categoria` varchar(15) NOT NULL,
  `Img_link` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`ID_productos`, `Nombre`, `Precio`, `Categoria`, `Img_link`) VALUES
(1, 'Arroz Saman', '$50', 'Arroz', 'arroz saman.jpg'),
(2, 'Arroz Blue Patna', '$65', 'Arroz', 'arroz blue patna.jpg'),
(3, 'Fideos Cololo con Morron', '$53', 'Fideos', 'fideos cololo morron.jpg'),
(4, 'Fideos Cololo con Espinaca', '$60', 'Fideos', 'fideos cololo espinaca.jpg'),
(5, 'Fideos Adria', '$65', 'Fideos', 'fideos adria.jpg'),
(6, 'Tallarines Adria', '$65', 'Fideos', 'tallarines adria.jpg'),
(7, 'Aceite Optimo 1L ', '$120', 'Aceites', 'aceite optimo 1L.jpg'),
(8, 'Aceite Optimo 5L', '$650', 'Aceites', 'aceite optimo 5L.jpg'),
(9, 'Aceite Saman 1L', '$140', 'Aceites', 'aceite saman 1L.jpg'),
(10, 'Aceite Saman 3L', '$450', 'Aceites', 'aceite saman 3L.jpg'),
(11, 'Aceite de Oliva Extra Virgen MAZZA 1Lt', '$600', 'Aceites', 'aceite de oliva.jpg'),
(12, 'Schneck Clásica', '$90', 'Hamburguesas', 'schneck clásica.jpg'),
(13, 'Schneck XL', '$120', 'Hamburguesas', 'schneck XL.jpg'),
(14, 'Nuggets Ardo 1KG', '$535', 'Nuggets', 'nuggets ardo 1KG.jpg'),
(15, 'Nuggets Baita 700GR', '$170', 'Nuggets', 'nuggets baita 700GR.jpg'),
(16, 'Nuggets Sadia 900GR', '$296', 'Nuggets', 'nuggets sadia 900GR.jpg'),
(17, 'Coca cola 2.25L ', '$150', 'Bebida', 'coca cola 2.25L.jpg'),
(18, 'Fanta 3L', '$160', 'Bebida', 'fanta 3L.jpg'),
(19, 'Sprite 1.5L', '$115', 'Bebida', 'sprite 1.5L.jpg'),
(20, 'Fanta 1.5L', '$115', 'Bebida', 'fanta 1.5L.jpg'),
(21, 'Chocolate cailler', '$315', 'Chocolate', 'chocolate cailler 1.jpg'),
(22, 'Chocolate cailler', '$270', 'Chocolate', 'chocolate cailler 2.jpg'),
(23, 'Chocolate cailler', '$435', 'Chocolate', 'chocolate cailler 3.jpg'),
(24, 'Chocolate Lindor', '$420', 'Chocolate', 'chocolate lindor 1.jpg'),
(25, 'Chocolate Lindor', '$255', 'Chocolate', 'chocolate lindor 2.jpg'),
(26, 'Chocolate Milka', '$136', 'Chocolate', 'chocolate milka.jpg'),
(27, 'Chocolate nestle', '$80', 'Chocolate', 'chocolate nestle.jpg'),
(28, 'JOHNNIE WALKER BLACK', '$1990', 'Whisky', 'johnnie walker black.jpg'),
(29, 'Chivas Regal 18', '$3699', 'Whisky', 'chivas regal 18.jpg'),
(30, 'Chivas Regal 13', '$1699', 'Whisky', 'chivas regal 13.jpg'),
(31, 'JOHNNIE WALKER RED', '$990', 'Whisky', 'johnnie walker red.jpg'),
(32, 'Jack Daniels', '$1880', 'Whisky', 'jack_daniels.jpg'),
(33, 'Don pascual tinto', '$289', 'Vinos', 'don pascual tinto.jpg'),
(34, 'Don pascual blanco', '$289', 'Vinos', 'don pascual blanco.jpg'),
(35, 'Casillero del diablo Cabernet\nsauvignon', '$459', 'Vinos', 'casillero del diablo cabernet.jpg'),
(36, 'Casillero del diablo tinto', '$459', 'Vinos', 'Casillero del diablo tinto.jpg'),
(37, 'Don Perignon', '$12.266', 'Champagne', 'don perignon.jpg'),
(38, 'BOLLINGER', '$4.900', 'Champagne', 'bollinger.jpg'),
(39, 'Moet & Chandon', '$3.599', 'Champagne', 'moet chandon.jpg');

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
  `Num_tarjeta` decimal(20,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_usuarios`, `Password`, `Nombre`, `Apellido`, `Email`, `Num_tarjeta`) VALUES
(3, '$2y$10$vUXs.TpyGniNpsflZyrLcup2r8xMufdw6X4Ij8BN4wbMePIablNQ2', 'diego', 'bonora', 'bonoradi@gmail.com', NULL),
(4, '$2y$10$CtN4sU0FQzKEmY8x9rSbtOmly5GtoFya.GNDoue1rD3TnZ34MVW/W', 'diego', 'bonora', 'bonoradi@gmail.com', NULL),
(5, '$2y$10$FMcCPpsqG6Ipxm/ufCkAIOj7.miYF8pP2bQK2KnpUe51kFxjYgIpm', 'puto', 'reputo', 'reputo123@gmail.com', NULL),
(6, '$2y$10$R3rJKjIrXeu6OETgTSVP0OypJLAFVf5Lxq6tGuU4RDtn.ZlyIQsIW', 'pedro', 'perdin', 'perdote@gmail.com', NULL),
(7, '$2y$10$Ef/vNCju7bKrePDBEwdKp.377.gjGGPDZN0Jd7Jh5x6M/pKBuJF2G', 'rodolfo', 'ferruto', 'ferrutor@gmail.com', NULL),
(8, '$2y$10$qwi78.0d9N9zQWcZ4Qtx6ORf9Bzg0a2LA.hEhOOYmHxb4y6hrI9Pu', 'pepito', 'alfonso', 'alfonsoz@gmail.com', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`ID_productos`);

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
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
