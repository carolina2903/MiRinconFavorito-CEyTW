-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2019 a las 08:42:25
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `MiRinconFavorito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `email` varchar(35) NOT NULL,
  `passwd` varchar(32) NOT NULL,
  `id_direccion` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellidos`, `telefono`, `email`, `passwd`, `id_direccion`) VALUES
('cl1', 'Carmen', 'Moreno', '646263662', 'carmen98mi@gmail.com', 'cacita', 'dir1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cojines_corazon_dobles_senor-senora`
--

CREATE TABLE `cojines_corazon_dobles_senor-senora` (
  `id_tipo_producto` varchar(8) NOT NULL DEFAULT '1',
  `id_producto` varchar(8) NOT NULL,
  `nombre_tipo` varchar(40) NOT NULL DEFAULT 'Cojines Corazón Doble Señor/Señora',
  `nombre_senor` varchar(20) NOT NULL,
  `nombre_senora` varchar(20) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cojin_amistad`
--

CREATE TABLE `cojin_amistad` (
  `id_tipo_producto` varchar(8) NOT NULL DEFAULT '2',
  `id_producto` varchar(8) NOT NULL,
  `nombre_tipo` varchar(40) NOT NULL DEFAULT 'Cojín Amistad',
  `genero` enum('hombre','mujer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cojin_corazones_dobles`
--

CREATE TABLE `cojin_corazones_dobles` (
  `id_tipo_producto` varchar(8) NOT NULL DEFAULT '3',
  `id_producto` varchar(8) NOT NULL,
  `nombre_tipo` varchar(40) NOT NULL DEFAULT 'Cojines Corazón Doble',
  `nombre_izquierda` varchar(20) NOT NULL,
  `nombre_derecha` varchar(20) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cojin_dibujo_individual`
--

CREATE TABLE `cojin_dibujo_individual` (
  `id_tipo_producto` varchar(8) NOT NULL DEFAULT '4',
  `id_producto` varchar(8) NOT NULL,
  `nombre_tipo` varchar(40) NOT NULL DEFAULT 'Cojín Dibujo Individual',
  `nombre` varchar(20) NOT NULL,
  `dibujo` varchar(20) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cojin_familia`
--

CREATE TABLE `cojin_familia` (
  `id_tipo_producto` varchar(8) NOT NULL DEFAULT '5',
  `id_producto` varchar(8) NOT NULL,
  `nombre_tipo` varchar(40) NOT NULL DEFAULT 'Cojín Familia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cojin_natalicio`
--

CREATE TABLE `cojin_natalicio` (
  `id_tipo_producto` varchar(8) NOT NULL DEFAULT '6',
  `id_producto` varchar(8) NOT NULL,
  `nombre_tipo` varchar(40) NOT NULL DEFAULT 'Cojín Natalicio',
  `nombre` varchar(20) NOT NULL,
  `hora` time NOT NULL,
  `fecha` date NOT NULL,
  `peso` double NOT NULL,
  `medida` double NOT NULL,
  `color_primario` enum('Gris','Azul','Azul Claro','Azul Cielo','Lila','Rosa','Rosa Claro','Coral','Rojo','Rojo Vino','Naranja','Amarillo','Verde','Verde Esmeralda') NOT NULL,
  `color_secundario` enum('Gris','Azul','Azul Claro','Azul Cielo','Lila','Rosa','Rosa Claro','Coral','Rojo','Rojo Vino','Naranja','Amarillo','Verde','Verde Esmeralda') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cojin_personalizado`
--

CREATE TABLE `cojin_personalizado` (
  `id_tipo_producto` varchar(8) NOT NULL DEFAULT '7',
  `id_producto` varchar(8) NOT NULL,
  `nombre_tipo` varchar(40) NOT NULL DEFAULT 'Cojín Personalizado',
  `url_imagen` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cojin_profesion_doble`
--

CREATE TABLE `cojin_profesion_doble` (
  `id_tipo_producto` varchar(8) NOT NULL DEFAULT '8',
  `id_producto` varchar(8) NOT NULL,
  `nombre_tipo` varchar(40) NOT NULL DEFAULT 'Cojin Profesión Doble',
  `profesion_izquierda` varchar(20) NOT NULL,
  `profesion_derecha` varchar(20) NOT NULL,
  `nombre_izquierda` varchar(20) NOT NULL,
  `nombre_derecha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cojin_profesion_individual`
--

CREATE TABLE `cojin_profesion_individual` (
  `id_tipo_producto` varchar(8) NOT NULL DEFAULT '9',
  `id_producto` varchar(8) NOT NULL,
  `nombre_tipo` varchar(40) NOT NULL DEFAULT 'Cojín Profesión Individual',
  `nombre` varchar(20) NOT NULL,
  `profesion` varchar(20) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cojin_profesion_individual`
--

INSERT INTO `cojin_profesion_individual` (`id_tipo_producto`, `id_producto`, `nombre_tipo`, `nombre`, `profesion`, `fecha`) VALUES
('9', 'pr1', 'Cojín Profesión Individual', 'Laura', 'Médica', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupones`
--

CREATE TABLE `cupones` (
  `id_cupon` varchar(20) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `fecha_inicio` date NOT NULL DEFAULT current_timestamp(),
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion_postal`
--

CREATE TABLE `direccion_postal` (
  `id_direccion` varchar(5) NOT NULL,
  `calle` varchar(20) NOT NULL,
  `numero` int(3) NOT NULL,
  `bloque` varchar(2) NOT NULL,
  `piso` int(2) NOT NULL,
  `letra` varchar(1) NOT NULL,
  `escalera` varchar(1) NOT NULL,
  `localidad` varchar(20) NOT NULL,
  `codigo_postal` int(5) NOT NULL,
  `provincia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `direccion_postal`
--

INSERT INTO `direccion_postal` (`id_direccion`, `calle`, `numero`, `bloque`, `piso`, `letra`, `escalera`, `localidad`, `codigo_postal`, `provincia`) VALUES
('dir1', 'dinamarca', 12, '6', 0, 'A', 'i', 'Alcázar de San Juan', 13600, 'Ciudad Real');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE `envio` (
  `id_envio` enum('1','2','3') NOT NULL,
  `tipo_envio` varchar(20) NOT NULL,
  `costes_envio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `envio`
--

INSERT INTO `envio` (`id_envio`, `tipo_envio`, `costes_envio`) VALUES
('1', 'Normal', 6),
('2', 'Recogida Local', 0),
('3', 'Contrarrembolso', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_miembro`
--

CREATE TABLE `linea_miembro` (
  `id_producto` varchar(8) NOT NULL,
  `id_miembro` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_producto`
--

CREATE TABLE `linea_producto` (
  `id_producto` varchar(8) NOT NULL,
  `id_pedido` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembro`
--

CREATE TABLE `miembro` (
  `id_miembro` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `raza` varchar(8) NOT NULL,
  `tipo_familiar` enum('Padre','Madre','Hijo','Hija','Mascota') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(8) NOT NULL,
  `id_cliente` varchar(10) NOT NULL,
  `tipo_envio` varchar(20) NOT NULL,
  `cupon` varchar(20) DEFAULT NULL,
  `precio_total` int(11) NOT NULL,
  `fecha_compra` date NOT NULL DEFAULT current_timestamp(),
  `anotaciones` text NOT NULL,
  `estado` enum('Tramitado','Enviado','Recibido','Cancelado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_cliente`, `tipo_envio`, `cupon`, `precio_total`, `fecha_compra`, `anotaciones`, `estado`) VALUES
(1, 'cl1', '1', NULL, 22, '2019-11-14', '', 'Tramitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` varchar(8) NOT NULL,
  `id_tipo_producto` varchar(8) NOT NULL,
  `precio_unidad` int(11) NOT NULL,
  `tamaño` enum('30x50','40x40') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `id_tipo_producto`, `precio_unidad`, `tamaño`) VALUES
('pr1', '9', 12, '30x50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD UNIQUE KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `cupones`
--
ALTER TABLE `cupones`
  ADD PRIMARY KEY (`id_cupon`);

--
-- Indices de la tabla `direccion_postal`
--
ALTER TABLE `direccion_postal`
  ADD PRIMARY KEY (`id_direccion`);

--
-- Indices de la tabla `envio`
--
ALTER TABLE `envio`
  ADD PRIMARY KEY (`id_envio`);

--
-- Indices de la tabla `linea_miembro`
--
ALTER TABLE `linea_miembro`
  ADD PRIMARY KEY (`id_producto`,`id_miembro`);

--
-- Indices de la tabla `linea_producto`
--
ALTER TABLE `linea_producto`
  ADD PRIMARY KEY (`id_pedido`,`id_producto`) USING BTREE;

--
-- Indices de la tabla `miembro`
--
ALTER TABLE `miembro`
  ADD PRIMARY KEY (`id_miembro`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
