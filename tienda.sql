-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2022 a las 12:08:28
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `IDCLIENTE` varchar(20) NOT NULL,
  `NOMBRE` varchar(30) NOT NULL,
  `APELLIDO` varchar(30) NOT NULL,
  `TELEFONO` varchar(10) NOT NULL,
  `DIRECCION` varchar(50) NOT NULL,
  `E-MAIL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `customer`
--

INSERT INTO `customer` (`IDCLIENTE`, `NOMBRE`, `APELLIDO`, `TELEFONO`, `DIRECCION`, `E-MAIL`) VALUES
('1234', 'Luis', 'Hernandez', '3120550', 'pereira', 'luis@gmail.com'),
('1235', 'JULIO', 'FLOREZ', '1111111111', 'Cra 9#12-12', 'Julio@gmail.com'),
('1236', 'Carlos', 'FLOREZ', '3120550', 'Cra 9#12-12', 'carlos@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `IDPRODUCTO` varchar(30) NOT NULL,
  `NOMBRE` varchar(30) NOT NULL,
  `DESCRIPCION` varchar(35) NOT NULL COMMENT 'Opcional',
  `VALOR_UNIT` double NOT NULL,
  `CANT_DISP` int(11) NOT NULL,
  `IMG` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`IDPRODUCTO`, `NOMBRE`, `DESCRIPCION`, `VALOR_UNIT`, `CANT_DISP`, `IMG`) VALUES
('10001', 'Producto 1', 'lorem ipsum lorem ipsum', 10000, 10, NULL),
('10002', 'Producto 2', 'lorem ipsum lorem ipsum', 8000, 20, NULL),
('10003', 'Producto 3', 'lorem ipsum lorem ipsum', 8000, 10, NULL),
('10004', 'Producto 4', 'lorem ipsum lorem ipsum', 1500, 3, NULL),
('1225090251', 'Fabiola Herrera', 'producto 100% colombiano', 2500, 3, NULL),
('1234', 'Caja de leche', 'producto 100% colombiano', 2500, 12, NULL),
('160325', 'Play 5', 'la nueva consola revolucionaria', 120002, 16, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale`
--

CREATE TABLE `sale` (
  `IDFACTURA` varchar(30) NOT NULL,
  `IDPRODUCTO` varchar(30) NOT NULL,
  `IDCLIENTE` varchar(30) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `VALOR` double NOT NULL,
  `FECHAVENTA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sale`
--

INSERT INTO `sale` (`IDFACTURA`, `IDPRODUCTO`, `IDCLIENTE`, `CANTIDAD`, `VALOR`, `FECHAVENTA`) VALUES
('FAC61efd3c6a295d', '10001', '1234', 10, 90, '2022-01-25'),
('FAC61efd3c6a295d', '10002', '1234', 10, 180, '2022-01-25'),
('FAC61efd3c6a295d', '10003', '1234', 10, 270, '2022-01-25'),
('FAC61efd3c6a295d', '10004', '1234', 10, 360, '2022-01-25'),
('FAC61efd3c799583', '10001', '1234', 10, 90, '2022-01-25'),
('FAC61efd3c799583', '10002', '1234', 10, 180, '2022-01-25'),
('FAC61efd3c799583', '10003', '1234', 10, 270, '2022-01-25'),
('FAC61efd3c799583', '10004', '1234', 10, 360, '2022-01-25'),
('FAC61efd3c900ab4', '10001', '1234', 10, 90, '2022-01-25'),
('FAC61efd3c900ab4', '10002', '1234', 10, 180, '2022-01-25'),
('FAC61efd3c900ab4', '10003', '1234', 10, 270, '2022-01-25'),
('FAC61efd3c900ab4', '10004', '1234', 10, 360, '2022-01-25'),
('FAC61efd3d9e0210', '10001', '1235', 10, 90, '2022-01-25'),
('FAC61efd3d9e0210', '10002', '1235', 10, 180, '2022-01-25'),
('FAC61efd3d9e0210', '10003', '1235', 10, 270, '2022-01-25'),
('FAC61efd3d9e0210', '10004', '1235', 10, 360, '2022-01-25');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`IDCLIENTE`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`IDPRODUCTO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
