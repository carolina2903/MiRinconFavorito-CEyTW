-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2019 a las 09:23:10
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
-- Base de datos: `mirinconfavorito`
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
  `passwd` varchar(255) NOT NULL,
  `id_direccion` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellidos`, `telefono`, `email`, `passwd`, `id_direccion`) VALUES
('cl1', '', '', '646362558', 'mirinconfavoritotienda@gmail.com', '$2y$10$dtRsfJ4f3FAc14GDiXBRuOQQ5cc5qOInXsE2jJS/JGBJ308myHUG.', ''),
('cl2', 'Cliente', 'Comercio Electrónico y Tecnologías Web', '666012345', 'cliente@email.com', '$2y$10$Jo.zeeP7RqSS00/lEl2LFO0P9g69wcqEu0OBpNbqe2mNwF/7f5uYe', ''),
('cl3', 'Carolina', 'Ordoño López', '123123123', 'carolina@email.com', '$2y$10$N15uFwR8tBgerlRj/JV8uO89Z4ywomZOjMywnbrTlFTnnw0VimTV.', ''),
('cl4', 'Pruebas', 'Pruebas', '666012345', 'pruebas@email.com', '$2y$10$GtC45BplObx/Jt/MhIBvpeenrnoLuhUMUr0iVn71uvHDnSL2Spe2S', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cojines_corazon_dobles_senor_senora`
--

CREATE TABLE `cojines_corazon_dobles_senor_senora` (
  `idinterno` int(11) NOT NULL,
  `id_tipo_producto` varchar(8) NOT NULL DEFAULT '1',
  `id_producto` varchar(8) NOT NULL,
  `nombre_tipo` varchar(40) NOT NULL DEFAULT 'Cojines Corazón Doble Señor/Señora',
  `nombre_senor` varchar(20) NOT NULL,
  `nombre_senora` varchar(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `tipo_letra` enum('Mayúsculas','Minúsculas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cojines_corazon_dobles_senor_senora`
--

INSERT INTO `cojines_corazon_dobles_senor_senora` (`idinterno`, `id_tipo_producto`, `id_producto`, `nombre_tipo`, `nombre_senor`, `nombre_senora`, `fecha`, `tipo_letra`) VALUES
(1, '1', 'pr1', 'Cojines Corazón Doble Señor/Señora', 'Carlos', 'Cristina', '2019-12-19', 'Mayúsculas'),
(2, '1', 'pr333', 'Cojines Corazón Doble Señor/Señora', 'Juan', 'maria', NULL, NULL),
(3, '1', 'pr11', 'Cojines Corazón Doble Señor/Señora', 'sdsad', 'asdsd', '2019-12-21', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cojin_amistad`
--

CREATE TABLE `cojin_amistad` (
  `idinterno` int(11) NOT NULL,
  `id_tipo_producto` varchar(8) NOT NULL DEFAULT '2',
  `id_producto` varchar(8) NOT NULL,
  `nombre_tipo` varchar(40) NOT NULL DEFAULT 'Cojín Amistad',
  `genero` enum('hombre','mujer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cojin_amistad`
--

INSERT INTO `cojin_amistad` (`idinterno`, `id_tipo_producto`, `id_producto`, `nombre_tipo`, `genero`) VALUES
(1, '2', 'pr2', 'Cojín Amistad', 'mujer'),
(2, '2', 'pr10', 'Cojín Amistad', 'mujer'),
(3, '2', 'pr14', 'Cojín Amistad', 'mujer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cojin_corazones_dobles`
--

CREATE TABLE `cojin_corazones_dobles` (
  `idinterno` int(11) NOT NULL,
  `id_tipo_producto` varchar(8) NOT NULL DEFAULT '3',
  `id_producto` varchar(8) NOT NULL,
  `nombre_tipo` varchar(40) NOT NULL DEFAULT 'Cojines Corazón Doble',
  `nombre_izquierda` varchar(20) NOT NULL,
  `nombre_derecha` varchar(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `tipo_letra` enum('Mayúsculas','Minúsculas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cojin_corazones_dobles`
--

INSERT INTO `cojin_corazones_dobles` (`idinterno`, `id_tipo_producto`, `id_producto`, `nombre_tipo`, `nombre_izquierda`, `nombre_derecha`, `fecha`, `tipo_letra`) VALUES
(1, '3', 'pr3', 'Cojines Corazón Doble', 'Cristina', 'Carlos', '2019-12-19', 'Mayúsculas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cojin_dibujo_individual`
--

CREATE TABLE `cojin_dibujo_individual` (
  `idinterno` int(11) NOT NULL,
  `id_tipo_producto` varchar(8) NOT NULL DEFAULT '4',
  `id_producto` varchar(8) NOT NULL,
  `nombre_tipo` varchar(40) NOT NULL DEFAULT 'Cojín Dibujo Individual',
  `nombre` varchar(20) NOT NULL,
  `dibujo` varchar(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `tipo_letra` enum('Mayúsculas','Minúsculas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cojin_dibujo_individual`
--

INSERT INTO `cojin_dibujo_individual` (`idinterno`, `id_tipo_producto`, `id_producto`, `nombre_tipo`, `nombre`, `dibujo`, `fecha`, `tipo_letra`) VALUES
(1, '4', 'pr4', 'Cojín Dibujo Individual', 'Carol', 'Ordenador', '2019-12-04', 'Mayúsculas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cojin_familia`
--

CREATE TABLE `cojin_familia` (
  `idinterno` varchar(11) NOT NULL,
  `id_tipo_producto` varchar(8) NOT NULL DEFAULT '5',
  `id_producto` varchar(8) NOT NULL,
  `nombre_tipo` varchar(40) NOT NULL DEFAULT 'Cojín Familia',
  `informacion_adicional` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cojin_familia`
--

INSERT INTO `cojin_familia` (`idinterno`, `id_tipo_producto`, `id_producto`, `nombre_tipo`, `informacion_adicional`) VALUES
('1', '5', 'pr5', 'Cojín Familia', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cojin_natalicio`
--

CREATE TABLE `cojin_natalicio` (
  `idinterno` int(11) NOT NULL,
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

--
-- Volcado de datos para la tabla `cojin_natalicio`
--

INSERT INTO `cojin_natalicio` (`idinterno`, `id_tipo_producto`, `id_producto`, `nombre_tipo`, `nombre`, `hora`, `fecha`, `peso`, `medida`, `color_primario`, `color_secundario`) VALUES
(1, '6', 'pr6', 'Cojín Natalicio', 'Carol', '04:00:00', '2019-07-01', 3, 53, 'Lila', 'Rosa Claro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cojin_profesion_doble`
--

CREATE TABLE `cojin_profesion_doble` (
  `idinterno` int(11) NOT NULL,
  `id_tipo_producto` varchar(8) NOT NULL DEFAULT '7',
  `id_producto` varchar(8) NOT NULL,
  `nombre_tipo` varchar(40) NOT NULL DEFAULT 'Cojines Profesión Dobles',
  `profesion_izquierda` varchar(20) NOT NULL,
  `profesion_derecha` varchar(20) NOT NULL,
  `nombre_izquierda` varchar(20) NOT NULL,
  `nombre_derecha` varchar(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `tipo_letra` enum('Mayúsculas','Minúsculas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cojin_profesion_doble`
--

INSERT INTO `cojin_profesion_doble` (`idinterno`, `id_tipo_producto`, `id_producto`, `nombre_tipo`, `profesion_izquierda`, `profesion_derecha`, `nombre_izquierda`, `nombre_derecha`, `fecha`, `tipo_letra`) VALUES
(1, '8', 'pr8', 'Cojines Profesión Dobles', 'Enfermera', 'Ingeniero', 'Cristina', 'Carlos', '2019-12-05', 'Mayúsculas'),
(2, '8', 'pr11', 'Cojines Profesión Dobles', 'Profesion2izda', 'Profesion2dcha', 'Nombre2izda', 'Nombre2dcha', '2019-12-19', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cojin_profesion_doble_sr_sra`
--

CREATE TABLE `cojin_profesion_doble_sr_sra` (
  `idinterno` int(11) NOT NULL,
  `id_tipo_producto` varchar(8) NOT NULL DEFAULT '8',
  `id_producto` varchar(8) DEFAULT NULL,
  `nombre_tipo` varchar(40) NOT NULL DEFAULT 'Cojines Profesión Dobles Sr Sra',
  `srsraizquierda` enum('Sr','Sra') NOT NULL,
  `profesionizquierda` varchar(20) NOT NULL,
  `nombreizquierda` varchar(20) NOT NULL,
  `srsraderecha` enum('Sr','Sra') NOT NULL,
  `profesionderecha` varchar(20) NOT NULL,
  `nombrederecha` varchar(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `tipo_letra` enum('Mayúsculas','Minúsculas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cojin_profesion_doble_sr_sra`
--

INSERT INTO `cojin_profesion_doble_sr_sra` (`idinterno`, `id_tipo_producto`, `id_producto`, `nombre_tipo`, `srsraizquierda`, `profesionizquierda`, `nombreizquierda`, `srsraderecha`, `profesionderecha`, `nombrederecha`, `fecha`, `tipo_letra`) VALUES
(1, '7', 'pr7', 'Cojines Profesión Dobles Sr Sra', 'Sra', 'Enfermera', 'Cristina', 'Sr', 'Agricultor', 'Carlos', NULL, 'Mayúsculas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cojin_profesion_individual`
--

CREATE TABLE `cojin_profesion_individual` (
  `idinterno` int(11) NOT NULL,
  `id_tipo_producto` varchar(8) NOT NULL DEFAULT '9',
  `id_producto` varchar(8) NOT NULL,
  `nombre_tipo` varchar(40) NOT NULL DEFAULT 'Cojín Profesión Individual',
  `nombre` varchar(20) NOT NULL,
  `profesion` varchar(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `tipo_letra` enum('Mayúsculas','Minúsculas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cojin_profesion_individual`
--

INSERT INTO `cojin_profesion_individual` (`idinterno`, `id_tipo_producto`, `id_producto`, `nombre_tipo`, `nombre`, `profesion`, `fecha`, `tipo_letra`) VALUES
(1, '9', 'pr1', 'Cojín Profesión Individual', 'Laura', 'Médica', '0000-00-00', 'Mayúsculas'),
(2, '9', 'pr10', 'Cojines Corazón Doble', 'aaaaaa', 'aasssssss', NULL, '');

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
  `numero_linea_id` int(11) NOT NULL,
  `idinterno_cojin` int(11) NOT NULL,
  `id_miembro` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `linea_miembro`
--

INSERT INTO `linea_miembro` (`numero_linea_id`, `idinterno_cojin`, `id_miembro`) VALUES
(1, 1, '1'),
(2, 1, '2'),
(3, 1, '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_producto`
--

CREATE TABLE `linea_producto` (
  `num_linea` int(11) NOT NULL,
  `id_producto` varchar(8) NOT NULL,
  `id_pedido` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `linea_producto`
--

INSERT INTO `linea_producto` (`num_linea`, `id_producto`, `id_pedido`) VALUES
(1, 'pr1', 1),
(2, 'pr2', 1),
(3, 'pr3', 1),
(4, 'pr4', 1),
(5, 'pr5', 1),
(6, 'pr6', 1),
(7, 'pr7', 1),
(8, 'pr8', 1),
(9, 'pr9', 1),
(55, 'pr10', 2);

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

--
-- Volcado de datos para la tabla `miembro`
--

INSERT INTO `miembro` (`id_miembro`, `nombre`, `raza`, `tipo_familiar`) VALUES
('1', 'Carlos', 'Persona', 'Padre'),
('2', 'Cristina', 'Persona', 'Madre'),
('3', 'Carolina', 'Persona', 'Hija');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(8) NOT NULL,
  `id_cliente` varchar(10) NOT NULL,
  `precio_total` int(11) NOT NULL,
  `fecha_compra` date NOT NULL DEFAULT current_timestamp(),
  `tipo_envio` varchar(1) NOT NULL,
  `anotaciones` text NOT NULL,
  `estado` enum('Tramitado','Enviado','Recibido','Cancelado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_cliente`, `precio_total`, `fecha_compra`, `tipo_envio`, `anotaciones`, `estado`) VALUES
(1, 'cl2', 22, '2019-11-14', '1', '', 'Tramitado'),
(2, 'cl4', 14, '2019-12-16', '1', '', 'Tramitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` varchar(8) NOT NULL,
  `id_tipo_producto` varchar(8) NOT NULL,
  `precio_unidad` int(11) NOT NULL,
  `tamano` enum('30x50','40x40') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `id_tipo_producto`, `precio_unidad`, `tamano`) VALUES
('pr1', '1', 12, '30x50'),
('pr10', '9', 14, '30x50'),
('pr2', '2', 22, '30x50'),
('pr3', '3', 33, '40x40'),
('pr4', '4', 44, '30x50'),
('pr5', '5', 22, '30x50'),
('pr6', '6', 22, '30x50'),
('pr7', '7', 22, '30x50'),
('pr8', '8', 22, '30x50'),
('pr9', '9', 22, '30x50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD UNIQUE KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `cojines_corazon_dobles_senor_senora`
--
ALTER TABLE `cojines_corazon_dobles_senor_senora`
  ADD PRIMARY KEY (`idinterno`);

--
-- Indices de la tabla `cojin_amistad`
--
ALTER TABLE `cojin_amistad`
  ADD PRIMARY KEY (`idinterno`);

--
-- Indices de la tabla `cojin_corazones_dobles`
--
ALTER TABLE `cojin_corazones_dobles`
  ADD PRIMARY KEY (`idinterno`);

--
-- Indices de la tabla `cojin_dibujo_individual`
--
ALTER TABLE `cojin_dibujo_individual`
  ADD PRIMARY KEY (`idinterno`);

--
-- Indices de la tabla `cojin_familia`
--
ALTER TABLE `cojin_familia`
  ADD PRIMARY KEY (`idinterno`);

--
-- Indices de la tabla `cojin_natalicio`
--
ALTER TABLE `cojin_natalicio`
  ADD PRIMARY KEY (`idinterno`);

--
-- Indices de la tabla `cojin_profesion_doble`
--
ALTER TABLE `cojin_profesion_doble`
  ADD PRIMARY KEY (`idinterno`);

--
-- Indices de la tabla `cojin_profesion_doble_sr_sra`
--
ALTER TABLE `cojin_profesion_doble_sr_sra`
  ADD PRIMARY KEY (`idinterno`);

--
-- Indices de la tabla `cojin_profesion_individual`
--
ALTER TABLE `cojin_profesion_individual`
  ADD PRIMARY KEY (`idinterno`);

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
  ADD PRIMARY KEY (`numero_linea_id`);

--
-- Indices de la tabla `linea_producto`
--
ALTER TABLE `linea_producto`
  ADD PRIMARY KEY (`num_linea`);

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
-- AUTO_INCREMENT de la tabla `cojines_corazon_dobles_senor_senora`
--
ALTER TABLE `cojines_corazon_dobles_senor_senora`
  MODIFY `idinterno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- AUTO_INCREMENT de la tabla `cojin_amistad`
--
ALTER TABLE `cojin_amistad`
  MODIFY `idinterno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3325;

--
-- AUTO_INCREMENT de la tabla `cojin_corazones_dobles`
--
ALTER TABLE `cojin_corazones_dobles`
  MODIFY `idinterno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cojin_dibujo_individual`
--
ALTER TABLE `cojin_dibujo_individual`
  MODIFY `idinterno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cojin_natalicio`
--
ALTER TABLE `cojin_natalicio`
  MODIFY `idinterno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cojin_profesion_doble`
--
ALTER TABLE `cojin_profesion_doble`
  MODIFY `idinterno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cojin_profesion_doble_sr_sra`
--
ALTER TABLE `cojin_profesion_doble_sr_sra`
  MODIFY `idinterno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cojin_profesion_individual`
--
ALTER TABLE `cojin_profesion_individual`
  MODIFY `idinterno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `linea_miembro`
--
ALTER TABLE `linea_miembro`
  MODIFY `numero_linea_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `linea_producto`
--
ALTER TABLE `linea_producto`
  MODIFY `num_linea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
