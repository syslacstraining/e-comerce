-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 05, 2017 at 12:30 AM
-- Server version: 5.6.31
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ycamposdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `codigo`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'C001', 'CATEGORIA 1', '2017-06-19 21:59:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) NOT NULL,
  `dni` char(8) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `apellido_paterno`, `apellido_materno`, `dni`, `correo_electronico`, `direccion`, `fecha_nacimiento`, `login`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Yerson Yordy', 'Campos', 'de la cruz', '75669712', 'ycamposde@gmail.com', 'dhgfghgfgf', '2017-08-09', 'ycamposde@gmail.com', '12345678', '2017-08-29 21:06:36', '0000-00-00 00:00:00'),
(2, 'gfdgfdgfd', 'gfdgfdgfdgfd', 'gfdgfdgfd', '54545454', 'gfgfgfdgfd', 'gfdgfdgfdgfd', '2017-08-02', 'admin@gmail.com', 'admin', '2017-08-29 23:14:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_venta`
--

CREATE TABLE IF NOT EXISTS `detalle_venta` (
  `id` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` decimal(11,0) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detalle_venta`
--

INSERT INTO `detalle_venta` (`id`, `idventa`, `idproducto`, `cantidad`, `precio_venta`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 2, '81', 2017, 2017),
(2, 4, 3, 1, '81', 2017, 2017),
(3, 4, 2, 1, '201', 2017, 2017),
(4, 4, 4, 1, '50', 2017, 2017),
(5, 5, 2, 1, '201', 2017, 2017),
(6, 5, 3, 1, '81', 2017, 2017),
(7, 6, 1, 1, '0', 2017, 2017),
(8, 7, 4, 1, '50', 2017, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
  `id` int(11) NOT NULL,
  `idtransaccion` varchar(100) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `idclientepago` varchar(100) NOT NULL,
  `fechepago` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pago`
--

INSERT INTO `pago` (`id`, `idtransaccion`, `estado`, `idclientepago`, `fechepago`, `created_at`, `updated_at`) VALUES
(1, 'PAY-29H04556UA275674ELGSKQUQ', 'approved', 'FVCVCWTMKJF4L', '0000-00-00 00:00:00', '2017-08-29 04:34:06', '2017-08-29 04:34:06'),
(2, 'PAY-05B24700GH360013SLGSLIRI', 'approved', 'FVCVCWTMKJF4L', '0000-00-00 00:00:00', '2017-08-29 05:25:33', '2017-08-29 05:25:33'),
(3, 'PAY-22844325D3265120ULGSLJ4Q', 'approved', 'FVCVCWTMKJF4L', '0000-00-00 00:00:00', '2017-08-29 05:27:54', '2017-08-29 05:27:54'),
(4, 'PAY-9WU92590GT6960152LGSLKLY', 'approved', 'FVCVCWTMKJF4L', '0000-00-00 00:00:00', '2017-08-29 05:28:53', '2017-08-29 05:28:53'),
(5, 'PAY-0UG27460P6248091CLGS5PMY', 'approved', 'FVCVCWTMKJF4L', '0000-00-00 00:00:00', '2017-08-30 02:09:33', '2017-08-30 02:09:33'),
(6, 'PAY-3DE93159E25267635LGS5RFQ', 'approved', 'FVCVCWTMKJF4L', '0000-00-00 00:00:00', '2017-08-30 02:12:21', '2017-08-30 02:12:21'),
(7, 'PAY-84D550377F773063BLGS5X6I', 'approved', 'FVCVCWTMKJF4L', '0000-00-00 00:00:00', '2017-08-30 02:26:52', '2017-08-30 02:26:52'),
(8, 'PAY-18S95827DW732641YLGS52EA', 'approved', 'FVCVCWTMKJF4L', '0000-00-00 00:00:00', '2017-08-30 02:31:15', '2017-08-30 02:31:15'),
(9, 'PAY-3G396169CH1979615LGS53LY', 'approved', 'FVCVCWTMKJF4L', '0000-00-00 00:00:00', '2017-08-30 02:33:48', '2017-08-30 02:33:48'),
(10, 'PAY-11G68386EF114320GLGS536I', 'approved', 'FVCVCWTMKJF4L', '0000-00-00 00:00:00', '2017-08-30 02:35:19', '2017-08-30 02:35:19'),
(11, 'PAY-29519807TT445374VLGS7YWI', 'approved', 'FVCVCWTMKJF4L', '0000-00-00 00:00:00', '2017-08-30 04:44:45', '2017-08-30 04:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `ruta_imagen` varchar(1000) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `nombre`, `descripcion`, `precio`, `ruta_imagen`, `idcategoria`, `created_at`, `updated_at`) VALUES
(1, 'P001', 'Perfumen desodrante para utilidad', 'La buena ultidad de las personas en el paseo', '0.05', '/img/p1.png', 1, '2017-07-11 21:55:39', '0000-00-00 00:00:00'),
(2, 'P002', 'Linpieza de vidrio', 'Para una buena limpia de habitacion o en su cuarto', '200.99', '/img/p2.png', 1, '2017-07-11 21:59:12', '0000-00-00 00:00:00'),
(3, 'P003', 'Canchito de ahorro', 'La creencia de tener mucho ahorro en  la familia', '80.50', '/img/p3.png', 1, '2017-07-11 22:00:14', '0000-00-00 00:00:00'),
(4, 'P004', 'Ganchos para ropa', 'Para proteger todas las ropas de aire.', '50.00', '/img/p4.jpg', 1, '2017-07-11 22:33:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `email`, `login`, `password`, `create_at`, `update_at`) VALUES
(1, 'Yerson', 'Campos De la cruz', 'ycamposde@gmail.com', 'ycamposde@gmail.com', '12345678', '2017-07-03 22:37:52', '0000-00-00 00:00:00'),
(2, 'Juan', 'Carlos Perez', 'jperez@gmail.com', 'jperez', '12345678', '2017-07-03 22:09:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `fecha_venta` datetime NOT NULL,
  `idpago` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ventas`
--

INSERT INTO `ventas` (`id`, `idcliente`, `fecha_venta`, `idpago`, `total`, `created_at`, `updated_at`) VALUES
(3, 1, '2017-08-29 21:09:33', 5, '0.00', 2017, 2017),
(4, 1, '2017-08-29 21:12:21', 6, '0.00', 2017, 2017),
(5, 1, '2017-08-29 21:33:48', 9, '0.00', 2017, 2017),
(6, 1, '2017-08-29 21:35:19', 10, '0.00', 2017, 2017),
(7, 1, '2017-08-29 23:44:45', 11, '0.00', 2017, 2017);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_venta` (`idventa`),
  ADD KEY `fk_producto` (`idproducto`);

--
-- Indexes for table `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoria` (`idcategoria`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clientes` (`idcliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pago`
--
ALTER TABLE `pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`idventa`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
