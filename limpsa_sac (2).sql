-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-01-2017 a las 00:33:46
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `limpsa_sac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE IF NOT EXISTS `actividad` (
  `id_actividad` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_actividad` varchar(255) NOT NULL,
  `idTipoServicio` int(11) NOT NULL,
  PRIMARY KEY (`id_actividad`),
  KEY `idServicio` (`idTipoServicio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id_actividad`, `descripcion_actividad`, `idTipoServicio`) VALUES
(1, 'BARRER', 1),
(2, 'TRAPEAR', 1),
(3, 'LAVAR', 1),
(4, 'LUSTRAR', 1),
(5, 'DESMANCHADO Y SACUDIDO DE PAREDES, LIMPIEZA DE CUADROS', 1),
(6, 'LIMPIEZA DE CORTINAR Y PERSIANAS', 1),
(7, 'LIMPIEZA DE MUEBLES, ALFOMBRAS', 1),
(8, 'LIMPIEZA DE VIDRIOS', 1),
(9, 'DESRATIZACION', 3),
(10, 'FUMIGACION', 2),
(11, 'LIMPIEZA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambiente`
--

CREATE TABLE IF NOT EXISTS `ambiente` (
  `idAmbiente` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_ambiente` varchar(255) NOT NULL,
  PRIMARY KEY (`idAmbiente`),
  KEY `idAmbiente` (`idAmbiente`),
  KEY `idAmbiente_2` (`idAmbiente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `ambiente`
--

INSERT INTO `ambiente` (`idAmbiente`, `descripcion_ambiente`) VALUES
(1, 'SALA 1'),
(2, 'COCINA 1'),
(3, 'COMEDOR 1 '),
(4, 'DORMITORIO 1'),
(5, 'SS.HH 1'),
(6, 'AZOTEA'),
(7, 'PATIO 1'),
(8, 'AREAS COMUNES'),
(9, 'BIBLIOTECA 1'),
(10, 'AREA DE ESPERA1'),
(11, 'SALA COMEDOR 1'),
(12, 'SALA COMEDOR 2'),
(13, 'LAVANDERIA 1'),
(14, 'ESCRITORIO 1'),
(15, 'ESCALERA 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `idArea` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`idArea`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`idArea`, `descripcion`) VALUES
(1, 'VENTAS'),
(2, 'OPERACIONES'),
(3, 'COSTOS'),
(4, 'ALMACEN'),
(5, 'SISTEMAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(255) NOT NULL,
  `telefono_cliente` char(30) NOT NULL,
  `email_cliente` varchar(64) NOT NULL,
  `direccion_cliente` varchar(255) NOT NULL,
  `status_cliente` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `telefono_cliente`, `email_cliente`, `direccion_cliente`, `status_cliente`, `date_added`) VALUES
(1, 'Christian', '1231283', 'jose@hotmail', 'ajsdhkjadbmadhagdjh', 1, '2017-01-11 03:19:15'),
(2, 'Jose Marquez', '124235', 'christian_cabanillas2@hotmail.com', 'Gajsasjdknb', 1, '2017-01-11 03:19:53'),
(3, 'Christian Castillo Villa', '1231414', 'christian_cabanillas2@hotmail.com', 'kadhakjdhakj', 1, '2017-01-12 05:43:21'),
(4, 'Christian Castillo Villa', '1231283', 'jose@hotmail', 'adsadaafasd', 1, '2017-01-12 05:46:35'),
(5, 'jose marco', '123456', '12345@email.com', '12345', 1, '2017-01-22 03:19:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE IF NOT EXISTS `cotizacion` (
  `idcotizacion` int(11) NOT NULL AUTO_INCREMENT,
  `idPedido` int(11) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `FechaInicio` datetime NOT NULL,
  `FechaTermino` datetime NOT NULL,
  `Estado_Cotizacion` varchar(60) NOT NULL,
  `CostoTotal` int(11) NOT NULL,
  PRIMARY KEY (`idcotizacion`),
  KEY `idPedido` (`idPedido`),
  KEY `FechaInicio` (`FechaInicio`),
  KEY `FechaTermino` (`FechaTermino`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`idcotizacion`, `idPedido`, `FechaRegistro`, `FechaInicio`, `FechaTermino`, `Estado_Cotizacion`, `CostoTotal`) VALUES
(29, 3, '2017-01-16 03:39:49', '2017-01-16 00:00:00', '2017-01-17 00:00:00', 'Aprobado', 128),
(30, 2, '2017-01-17 05:16:16', '2017-01-18 00:00:00', '2017-01-20 00:00:00', 'Aprobado', 105),
(31, 4, '2017-01-18 05:19:05', '2017-01-20 00:00:00', '2017-01-22 00:00:00', 'Aprobado', 156);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_material`
--

CREATE TABLE IF NOT EXISTS `cotizacion_material` (
  `idMaterial` int(11) NOT NULL,
  `idCotizacion` int(11) NOT NULL,
  `Cantidad` double NOT NULL,
  PRIMARY KEY (`idMaterial`,`idCotizacion`),
  KEY `idMaterial` (`idMaterial`,`idCotizacion`),
  KEY `idCotizacion` (`idCotizacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cotizacion_material`
--

INSERT INTO `cotizacion_material` (`idMaterial`, `idCotizacion`, `Cantidad`) VALUES
(1, 30, 1),
(2, 30, 1),
(3, 30, 1),
(4, 30, 1),
(5, 30, 1),
(8, 30, 1),
(10, 30, 1),
(11, 30, 1),
(13, 30, 1),
(14, 30, 1),
(15, 30, 1),
(16, 30, 1),
(17, 30, 1),
(18, 30, 1),
(19, 30, 1),
(20, 30, 1),
(21, 30, 1),
(22, 30, 1),
(23, 30, 1),
(26, 30, 1),
(27, 30, 1),
(28, 30, 1),
(29, 30, 1),
(30, 30, 1),
(31, 29, 1),
(32, 29, 1),
(32, 31, 12),
(33, 29, 1),
(34, 31, 1),
(35, 31, 1),
(42, 29, 1),
(42, 30, 1),
(42, 31, 1),
(43, 29, 1),
(43, 30, 1),
(43, 31, 1),
(44, 29, 1),
(44, 30, 1),
(44, 31, 1),
(45, 29, 1),
(45, 30, 1),
(45, 31, 1),
(46, 29, 1),
(46, 30, 1),
(46, 31, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_personal`
--

CREATE TABLE IF NOT EXISTS `cotizacion_personal` (
  `idCotizacion` int(11) NOT NULL,
  `idPersonal` int(11) NOT NULL,
  PRIMARY KEY (`idCotizacion`,`idPersonal`),
  KEY `idCotizacion` (`idCotizacion`,`idPersonal`),
  KEY `idPersonal` (`idPersonal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cotizacion_personal`
--

INSERT INTO `cotizacion_personal` (`idCotizacion`, `idPersonal`) VALUES
(29, 2),
(30, 3),
(30, 4),
(31, 5),
(31, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_actividad`
--

CREATE TABLE IF NOT EXISTS `detalle_actividad` (
  `id_actividad` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  KEY `id_actividad` (`id_actividad`,`id_pedido`),
  KEY `id_pedido` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_actividad`
--

INSERT INTO `detalle_actividad` (`id_actividad`, `id_pedido`) VALUES
(1, 1),
(1, 2),
(3, 2),
(5, 2),
(6, 3),
(7, 4),
(11, 1),
(11, 2),
(11, 3),
(11, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ambiente`
--

CREATE TABLE IF NOT EXISTS `detalle_ambiente` (
  `idAmbiente` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `TipoPiso` varchar(255) NOT NULL,
  `Color` varchar(64) NOT NULL,
  `Area` double NOT NULL,
  PRIMARY KEY (`idAmbiente`,`idPedido`),
  KEY `idAmbiente` (`idAmbiente`,`idPedido`),
  KEY `idPedido` (`idPedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_ambiente`
--

INSERT INTO `detalle_ambiente` (`idAmbiente`, `idPedido`, `TipoPiso`, `Color`, `Area`) VALUES
(1, 1, 'Ceramica', '', 300),
(2, 1, 'Cemento', 'Rojo', 200),
(2, 2, 'Ceramica', '', 500),
(3, 2, 'Porcelanato', '', 300),
(5, 3, 'Porcelanato', '', 300),
(6, 3, 'Porcelanato', '', 500),
(7, 4, 'Ceramica', '', 302),
(10, 4, 'Cemento', '', 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_ambiente`
--

CREATE TABLE IF NOT EXISTS `estado_ambiente` (
  `idEstadoAmbiente` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_EstadoAmbiente` varchar(255) NOT NULL,
  PRIMARY KEY (`idEstadoAmbiente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_actividad`
--

CREATE TABLE IF NOT EXISTS `material_actividad` (
  `idMaterial` int(11) NOT NULL,
  `idActividad` int(11) NOT NULL,
  PRIMARY KEY (`idMaterial`,`idActividad`),
  KEY `idMaterial` (`idMaterial`,`idActividad`),
  KEY `idActividad` (`idActividad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `material_actividad`
--

INSERT INTO `material_actividad` (`idMaterial`, `idActividad`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(12, 2),
(10, 3),
(11, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(12, 4),
(22, 4),
(23, 4),
(24, 4),
(25, 4),
(1, 5),
(4, 5),
(5, 5),
(8, 5),
(19, 5),
(21, 5),
(22, 5),
(26, 5),
(27, 5),
(28, 5),
(29, 5),
(30, 5),
(31, 6),
(32, 6),
(33, 6),
(32, 7),
(34, 7),
(35, 7),
(22, 8),
(28, 8),
(30, 8),
(36, 8),
(37, 8),
(38, 8),
(39, 8),
(40, 8),
(41, 8),
(47, 9),
(48, 9),
(49, 9),
(50, 9),
(51, 9),
(52, 9),
(53, 9),
(54, 9),
(55, 9),
(51, 10),
(52, 10),
(53, 10),
(54, 10),
(55, 10),
(56, 10),
(57, 10),
(42, 11),
(43, 11),
(44, 11),
(45, 11),
(46, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_equipo`
--

CREATE TABLE IF NOT EXISTS `material_equipo` (
  `idMaterial` int(11) NOT NULL AUTO_INCREMENT,
  `idTipoMaterial` int(11) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `UnidadMedida` varchar(10) NOT NULL,
  `Precio` double NOT NULL,
  `Depreciacion` double NOT NULL,
  PRIMARY KEY (`idMaterial`),
  KEY `idTipoMaterial` (`idTipoMaterial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Volcado de datos para la tabla `material_equipo`
--

INSERT INTO `material_equipo` (`idMaterial`, `idTipoMaterial`, `Descripcion`, `UnidadMedida`, `Precio`, `Depreciacion`) VALUES
(1, 4, 'Escoba Clorinda', 'unid', 7.5, 0.1),
(2, 4, 'Escobon de Cerdas', 'uind', 8.5, 0.1),
(3, 4, 'Escobon de Paja', 'unid', 7, 0.1),
(4, 4, 'Recogedor de PVC', 'unid', 2.5, 0.1),
(5, 1, 'Bolsa 26x40 Negra', 'unid', 0.1, 1),
(6, 4, 'Base de Trapeador', 'unid', 5.5, 0.1),
(7, 1, 'Repuesto Trapeador', 'unid', 3.5, 1),
(8, 4, 'Balde Mediano', 'unid', 4, 0.1),
(9, 4, 'Guante de Jebe', 'unid', 7.5, 0.1),
(10, 4, 'Baldeador', 'unid', 4.5, 0.1),
(11, 4, 'Escobilla de mano', 'unid', 3, 0.1),
(12, 2, 'Lavadora', 'unid', 8500, 0.01),
(13, 2, 'Escobilla Lavar', 'unid', 35, 0.01),
(14, 4, 'Jalador de Agua', 'unid', 7.5, 0.1),
(15, 4, 'Espátula', 'unid', 3.5, 0.1),
(16, 4, 'Escobilla de Fierro', 'unid', 4, 0.1),
(17, 1, 'Lija de Agua', 'Pljo', 1, 1),
(18, 1, 'Quita Sarro', 'lt', 3, 1),
(19, 1, 'Detergente', 'kg', 2.5, 1),
(20, 1, 'Pulidor', 'Blsa', 1.5, 1),
(21, 1, 'Esponja Verde', 'unid', 1, 1),
(22, 1, 'Trapo Industrial de Color', 'unid', 0.2, 1),
(23, 2, 'Extensión Corriente 10 mt', 'unid', 25, 0.01),
(24, 2, 'Escobilla Lustrar', 'unid', 25, 0.01),
(25, 1, 'Cera (Color del Piso) y Agua', 'lt', 5, 1),
(26, 4, 'Balde Chico', 'unid', 4, 1),
(27, 4, 'Escobillón para Techo', 'unid', 12, 0.1),
(28, 1, 'Trapo bco x 50 cm', 'unid', 1.5, 1),
(29, 2, 'Escalera 06 Pasos', 'unid', 80, 0.01),
(30, 1, 'Franela', 'unid', 1.5, 1),
(31, 4, 'Sacudidor', 'unid', 2.5, 0.1),
(32, 2, 'Aspiradora', 'unid', 7500, 0.01),
(33, 2, 'Accesorio Redondo', 'unid', 25, 0.01),
(34, 2, 'Punta', 'unid', 10, 0.01),
(35, 2, 'Tubo Curvo', 'unid', 30, 0.01),
(36, 1, 'Navaja', 'unid', 0.5, 1),
(37, 1, 'Limpia Vidrios', 'lt', 0.8, 1),
(38, 4, 'Pulverizador Gatillo', 'unid', 1, 0.1),
(39, 4, 'Moop Luna Completo', 'unid', 25, 0.1),
(40, 1, 'Thinner Acrilico', 'lt', 5, 1),
(41, 1, 'Brocha', 'unid', 7.5, 1),
(42, 3, 'Casco/Barbiquejo', 'unid', 13, 0.1),
(43, 3, 'Arness', 'unid', 180, 0.1),
(44, 3, 'Chaleco Reflectivo', 'unid', 10, 0.1),
(45, 3, 'Botas de Jebe', 'par', 15, 0.1),
(46, 3, 'Uniforme Limpieza', 'jgo', 25, 0.1),
(47, 1, 'Racumin', 'gr', 0.24, 1),
(48, 1, 'Maíz', 'gr', 0.01, 1),
(49, 1, 'Salchipapero', 'und', 0.05, 1),
(50, 2, 'Trampa para Ratas', 'unid', 3.5, 0.01),
(51, 3, 'Lentes', 'par', 3.5, 0.1),
(52, 3, 'Mascarilla para gases 1 vía', 'unid', 25, 0.1),
(53, 3, 'Guantes de jebe', 'par', 7, 0.1),
(54, 3, 'Uniforme de PVC(Chaqueta + Pantalón)', 'jgo', 27, 0.1),
(55, 3, 'Botas', 'par', 15, 0.1),
(56, 1, 'Fumitrin', 'lt', 120, 1),
(57, 2, 'Mochila de Fumigar', 'unid', 250, 0.01);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_requerimiento`
--

CREATE TABLE IF NOT EXISTS `material_requerimiento` (
  `idRequerimiento` int(11) NOT NULL,
  `idMaterial` int(11) NOT NULL,
  `Cantidad` double NOT NULL,
  KEY `idRequerimiento` (`idRequerimiento`,`idMaterial`),
  KEY `idMaterial` (`idMaterial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `idpedido` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `idTipoServicio` int(11) NOT NULL,
  `AreaTotal` double NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `FechaInicio` datetime NOT NULL,
  `Estado_pedido` varchar(60) NOT NULL,
  `Estado_ambientes` varchar(60) NOT NULL,
  `DescripcionGeneral` varchar(255) NOT NULL,
  PRIMARY KEY (`idpedido`),
  KEY `id_cliente` (`id_cliente`,`idTipoServicio`),
  KEY `idTipoServicio` (`idTipoServicio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idpedido`, `id_cliente`, `idTipoServicio`, `AreaTotal`, `FechaRegistro`, `FechaInicio`, `Estado_pedido`, `Estado_ambientes`, `DescripcionGeneral`) VALUES
(1, 1, 1, 2500, '2017-01-03 00:00:00', '2017-02-28 00:00:00', 'Asignado', 'Muy Sucios', 'Se encuentra frente a comisaria de la zona'),
(2, 2, 1, 5000, '2017-01-04 00:00:00', '2017-02-28 00:00:00', 'Enviado', 'Semi Sucio', 'La fachada en blanca y al costado de una casa del frente con ceramica'),
(3, 3, 1, 300, '2017-01-09 00:00:00', '2017-02-28 00:00:00', 'Asignado', 'Poco Sucios', 'Es una sucursal de la empresa Atenea SAC (libreria)'),
(4, 4, 1, 400, '2017-01-03 00:00:00', '2017-02-28 00:00:00', 'Asignado', 'Poco Sucio', 'Ubicado frente al mercado Central'),
(13, 1, 3, 2520, '2017-01-02 00:00:00', '2017-02-28 00:00:00', 'Cancelado', 'Muy Sucios', 'No se que poner :D '),
(14, 3, 2, 1520, '2017-01-10 00:00:00', '2017-02-28 00:00:00', 'Asignado', 'Semi Sucio', 'sdjfshaga');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `idPersonal` int(11) NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(255) NOT NULL,
  `Apellidos` varchar(255) NOT NULL,
  `FechaNacimiento` datetime NOT NULL,
  `DNI` varchar(8) NOT NULL,
  `Cargo` varchar(60) NOT NULL,
  `idArea` int(11) NOT NULL,
  PRIMARY KEY (`idPersonal`),
  KEY `idArea` (`idArea`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`idPersonal`, `Nombres`, `Apellidos`, `FechaNacimiento`, `DNI`, `Cargo`, `idArea`) VALUES
(1, 'Luis', 'Villanueva García', '1990-11-01 00:00:00', '18092347', 'Operario', 2),
(2, 'Javier', 'Pacherres Sanchez', '1990-11-01 00:00:00', '18390246', 'Operario', 2),
(3, 'Claudia', 'Benites Reyes', '1990-11-01 00:00:00', '18934718', 'Operario', 2),
(4, 'Renato', 'Bolivar Castillo', '1990-11-01 00:00:00', '18323894', 'Operario', 2),
(5, 'Marco Enrrique', 'Carrazco Moncada', '1990-11-01 00:00:00', '70008542', 'Operario', 2),
(6, 'Christofer Carlos', 'Lozano Santos', '1990-11-01 00:00:00', '40774001', 'Operario', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requerimiento`
--

CREATE TABLE IF NOT EXISTS `requerimiento` (
  `idRequerimiento` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha_Registro` datetime NOT NULL,
  `Estado_Requerimiento` varchar(60) NOT NULL,
  `Costo_Total` double NOT NULL,
  PRIMARY KEY (`idRequerimiento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `requerimiento`
--

INSERT INTO `requerimiento` (`idRequerimiento`, `Fecha_Registro`, `Estado_Requerimiento`, `Costo_Total`) VALUES
(1, '2017-01-26 00:00:00', 'Aprobado', 0),
(3, '2017-01-26 00:00:00', 'Pendiente', 0),
(4, '2017-01-26 00:00:00', 'Pendiente', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_material`
--

CREATE TABLE IF NOT EXISTS `tipo_material` (
  `idTipoMaterial` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_tipo_material` varchar(255) NOT NULL,
  PRIMARY KEY (`idTipoMaterial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tipo_material`
--

INSERT INTO `tipo_material` (`idTipoMaterial`, `descripcion_tipo_material`) VALUES
(1, 'MATERIAL'),
(2, 'MAQUINA'),
(3, 'EQUIPAMIENTO'),
(4, 'IMPLEMENTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio`
--

CREATE TABLE IF NOT EXISTS `tipo_servicio` (
  `idTipoServicio` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_servicio` varchar(255) NOT NULL,
  PRIMARY KEY (`idTipoServicio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipo_servicio`
--

INSERT INTO `tipo_servicio` (`idTipoServicio`, `descripcion_servicio`) VALUES
(1, 'SERVICIO DE LIMPIEZA'),
(2, 'SERVICIO DE FUMIGACION'),
(3, 'SERVICIO DE DESRATIZACION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp_materiales`
--

CREATE TABLE IF NOT EXISTS `tmp_materiales` (
  `id_tmpMaterial` int(11) NOT NULL AUTO_INCREMENT,
  `id_material` int(11) NOT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `id_cotizacion` int(11) DEFAULT NULL,
  `cantidad_tmp` double NOT NULL,
  `precio_tmp` double NOT NULL,
  `depreciacion_tmp` double NOT NULL,
  `session_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tmpMaterial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=269 ;

--
-- Volcado de datos para la tabla `tmp_materiales`
--

INSERT INTO `tmp_materiales` (`id_tmpMaterial`, `id_material`, `id_pedido`, `id_cotizacion`, `cantidad_tmp`, `precio_tmp`, `depreciacion_tmp`, `session_id`) VALUES
(71, 1, NULL, 32, 1, 7.5, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(72, 2, NULL, 32, 1, 8.5, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(73, 3, NULL, 32, 1, 7, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(74, 4, NULL, 32, 2, 2.5, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(75, 5, NULL, 32, 1, 0.1, 1, 'f7tesvsn4vnhgothar10u50sn6'),
(76, 42, NULL, 32, 1, 13, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(77, 43, NULL, 32, 1, 180, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(78, 44, NULL, 32, 1, 10, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(79, 45, NULL, 32, 1, 15, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(80, 46, NULL, 32, 1, 25, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(81, 1, 2, NULL, 1, 7.5, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(82, 2, 2, NULL, 1, 8.5, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(83, 3, 2, NULL, 1, 7, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(84, 4, 2, NULL, 1, 2.5, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(85, 5, 2, NULL, 1, 0.1, 1, 'f7tesvsn4vnhgothar10u50sn6'),
(86, 10, 2, NULL, 1, 4.5, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(87, 11, 2, NULL, 1, 3, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(88, 13, 2, NULL, 1, 35, 0.01, 'f7tesvsn4vnhgothar10u50sn6'),
(89, 14, 2, NULL, 1, 7.5, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(90, 15, 2, NULL, 1, 3.5, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(91, 16, 2, NULL, 1, 4, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(92, 17, 2, NULL, 1, 1, 1, 'f7tesvsn4vnhgothar10u50sn6'),
(93, 18, 2, NULL, 1, 3, 1, 'f7tesvsn4vnhgothar10u50sn6'),
(94, 19, 2, NULL, 1, 2.5, 1, 'f7tesvsn4vnhgothar10u50sn6'),
(95, 20, 2, NULL, 1, 1.5, 1, 'f7tesvsn4vnhgothar10u50sn6'),
(96, 21, 2, NULL, 1, 1, 1, 'f7tesvsn4vnhgothar10u50sn6'),
(97, 22, 2, NULL, 1, 0.2, 1, 'f7tesvsn4vnhgothar10u50sn6'),
(98, 23, 2, NULL, 1, 25, 0.01, 'f7tesvsn4vnhgothar10u50sn6'),
(99, 42, 2, NULL, 1, 13, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(100, 43, 2, NULL, 1, 180, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(101, 44, 2, NULL, 1, 10, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(102, 45, 2, NULL, 1, 15, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(103, 46, 2, NULL, 1, 25, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(104, 8, 2, NULL, 1, 4, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(105, 26, 2, NULL, 1, 4, 1, 'f7tesvsn4vnhgothar10u50sn6'),
(106, 27, 2, NULL, 1, 12, 0.1, 'f7tesvsn4vnhgothar10u50sn6'),
(107, 28, 2, NULL, 1, 1.5, 1, 'f7tesvsn4vnhgothar10u50sn6'),
(108, 29, 2, NULL, 1, 80, 0.01, 'f7tesvsn4vnhgothar10u50sn6'),
(109, 30, 2, NULL, 1, 1.5, 1, 'f7tesvsn4vnhgothar10u50sn6'),
(110, 32, NULL, 31, 12, 7500, 0.01, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(111, 34, NULL, 31, 1, 10, 0.01, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(112, 35, NULL, 31, 1, 30, 0.01, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(113, 42, NULL, 31, 1, 13, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(114, 43, NULL, 31, 1, 180, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(115, 44, NULL, 31, 1, 10, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(116, 45, NULL, 31, 1, 15, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(117, 46, NULL, 31, 1, 25, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(118, 1, NULL, 30, 1, 7.5, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(119, 2, NULL, 30, 1, 8.5, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(120, 3, NULL, 30, 1, 7, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(121, 4, NULL, 30, 1, 2.5, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(122, 5, NULL, 30, 1, 0.1, 1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(123, 8, NULL, 30, 1, 4, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(124, 10, NULL, 30, 1, 4.5, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(125, 11, NULL, 30, 1, 3, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(126, 13, NULL, 30, 1, 35, 0.01, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(127, 14, NULL, 30, 1, 7.5, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(128, 15, NULL, 30, 1, 3.5, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(129, 16, NULL, 30, 1, 4, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(130, 17, NULL, 30, 1, 1, 1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(131, 18, NULL, 30, 1, 3, 1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(132, 19, NULL, 30, 1, 2.5, 1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(133, 20, NULL, 30, 1, 1.5, 1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(134, 21, NULL, 30, 1, 1, 1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(135, 22, NULL, 30, 1, 0.2, 1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(136, 23, NULL, 30, 1, 25, 0.01, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(137, 26, NULL, 30, 1, 4, 1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(138, 27, NULL, 30, 1, 12, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(139, 28, NULL, 30, 1, 1.5, 1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(140, 29, NULL, 30, 1, 80, 0.01, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(141, 30, NULL, 30, 1, 1.5, 1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(142, 42, NULL, 30, 1, 13, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(143, 43, NULL, 30, 1, 180, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(144, 44, NULL, 30, 1, 10, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(145, 45, NULL, 30, 1, 15, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(146, 46, NULL, 30, 1, 25, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(147, 1, 2, NULL, 1, 7.5, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(148, 2, 2, NULL, 1, 8.5, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(149, 3, 2, NULL, 1, 7, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(150, 4, 2, NULL, 1, 2.5, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(152, 10, 2, NULL, 1, 4.5, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(153, 11, 2, NULL, 1, 3, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(154, 13, 2, NULL, 1, 35, 0.01, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(155, 14, 2, NULL, 1, 7.5, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(156, 15, 2, NULL, 1, 3.5, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(157, 16, 2, NULL, 1, 4, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(158, 17, 2, NULL, 4, 1, 1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(159, 18, 2, NULL, 1, 3, 1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(160, 19, 2, NULL, 1, 2.5, 1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(161, 20, 2, NULL, 1, 1.5, 1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(162, 21, 2, NULL, 2, 1, 1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(163, 22, 2, NULL, 3, 0.2, 1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(164, 23, 2, NULL, 1, 25, 0.01, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(165, 42, 2, NULL, 1, 13, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(166, 43, 2, NULL, 1, 180, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(167, 44, 2, NULL, 1, 10, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(168, 45, 2, NULL, 1, 15, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(169, 46, 2, NULL, 1, 25, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(170, 8, 2, NULL, 1, 4, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(171, 26, 2, NULL, 1, 4, 1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(172, 27, 2, NULL, 14, 12, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(173, 28, 2, NULL, 1, 1.5, 1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(174, 29, 2, NULL, 1, 80, 0.01, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(176, 6, 2, NULL, 2, 5.5, 0.1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(177, 7, 2, NULL, 2, 3.5, 1, 'on8v3mg8gm4s5o774uj1c8jpk1'),
(178, 1, 2, NULL, 1, 7.5, 0.1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(179, 2, 2, NULL, 1, 8.5, 0.1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(180, 3, 2, NULL, 1, 7, 0.1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(181, 4, 2, NULL, 1, 2.5, 0.1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(182, 5, 2, NULL, 1, 0.1, 1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(183, 10, 2, NULL, 1, 4.5, 0.1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(184, 11, 2, NULL, 1, 3, 0.1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(185, 13, 2, NULL, 1, 35, 0.01, 'k429p0ajfqvo2fobb7pftiqvi1'),
(186, 14, 2, NULL, 1, 7.5, 0.1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(187, 15, 2, NULL, 1, 3.5, 0.1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(188, 16, 2, NULL, 1, 4, 0.1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(189, 17, 2, NULL, 1, 1, 1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(190, 18, 2, NULL, 1, 3, 1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(191, 19, 2, NULL, 1, 2.5, 1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(192, 20, 2, NULL, 1, 1.5, 1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(193, 21, 2, NULL, 1, 1, 1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(194, 22, 2, NULL, 1, 0.2, 1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(195, 23, 2, NULL, 1, 25, 0.01, 'k429p0ajfqvo2fobb7pftiqvi1'),
(196, 42, 2, NULL, 1, 13, 0.1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(197, 43, 2, NULL, 1, 180, 0.1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(198, 44, 2, NULL, 1, 10, 0.1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(199, 45, 2, NULL, 1, 15, 0.1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(200, 46, 2, NULL, 1, 25, 0.1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(201, 8, 2, NULL, 1, 4, 0.1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(202, 26, 2, NULL, 1, 4, 1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(203, 27, 2, NULL, 1, 12, 0.1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(204, 28, 2, NULL, 1, 1.5, 1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(205, 29, 2, NULL, 1, 80, 0.01, 'k429p0ajfqvo2fobb7pftiqvi1'),
(206, 30, 2, NULL, 1, 1.5, 1, 'k429p0ajfqvo2fobb7pftiqvi1'),
(207, 1, 2, NULL, 1, 7.5, 0.1, 'iqbrme07q042a2124b39cr8ar7'),
(208, 2, 2, NULL, 1, 8.5, 0.1, 'iqbrme07q042a2124b39cr8ar7'),
(209, 3, 2, NULL, 1, 7, 0.1, 'iqbrme07q042a2124b39cr8ar7'),
(210, 4, 2, NULL, 1, 2.5, 0.1, 'iqbrme07q042a2124b39cr8ar7'),
(211, 5, 2, NULL, 1, 0.1, 1, 'iqbrme07q042a2124b39cr8ar7'),
(212, 10, 2, NULL, 1, 4.5, 0.1, 'iqbrme07q042a2124b39cr8ar7'),
(213, 11, 2, NULL, 1, 3, 0.1, 'iqbrme07q042a2124b39cr8ar7'),
(214, 13, 2, NULL, 1, 35, 0.01, 'iqbrme07q042a2124b39cr8ar7'),
(215, 14, 2, NULL, 1, 7.5, 0.1, 'iqbrme07q042a2124b39cr8ar7'),
(216, 15, 2, NULL, 1, 3.5, 0.1, 'iqbrme07q042a2124b39cr8ar7'),
(217, 16, 2, NULL, 1, 4, 0.1, 'iqbrme07q042a2124b39cr8ar7'),
(218, 17, 2, NULL, 1, 1, 1, 'iqbrme07q042a2124b39cr8ar7'),
(219, 18, 2, NULL, 1, 3, 1, 'iqbrme07q042a2124b39cr8ar7'),
(220, 19, 2, NULL, 1, 2.5, 1, 'iqbrme07q042a2124b39cr8ar7'),
(221, 20, 2, NULL, 1, 1.5, 1, 'iqbrme07q042a2124b39cr8ar7'),
(222, 21, 2, NULL, 1, 1, 1, 'iqbrme07q042a2124b39cr8ar7'),
(223, 22, 2, NULL, 1, 0.2, 1, 'iqbrme07q042a2124b39cr8ar7'),
(224, 23, 2, NULL, 1, 25, 0.01, 'iqbrme07q042a2124b39cr8ar7'),
(225, 42, 2, NULL, 1, 13, 0.1, 'iqbrme07q042a2124b39cr8ar7'),
(226, 43, 2, NULL, 1, 180, 0.1, 'iqbrme07q042a2124b39cr8ar7'),
(227, 44, 2, NULL, 1, 10, 0.1, 'iqbrme07q042a2124b39cr8ar7'),
(228, 45, 2, NULL, 1, 15, 0.1, 'iqbrme07q042a2124b39cr8ar7'),
(229, 46, 2, NULL, 1, 25, 0.1, 'iqbrme07q042a2124b39cr8ar7'),
(230, 8, 2, NULL, 1, 4, 0.1, 'iqbrme07q042a2124b39cr8ar7'),
(231, 26, 2, NULL, 1, 4, 1, 'iqbrme07q042a2124b39cr8ar7'),
(232, 27, 2, NULL, 1, 12, 0.1, 'iqbrme07q042a2124b39cr8ar7'),
(233, 28, 2, NULL, 1, 1.5, 1, 'iqbrme07q042a2124b39cr8ar7'),
(234, 29, 2, NULL, 1, 80, 0.01, 'iqbrme07q042a2124b39cr8ar7'),
(235, 30, 2, NULL, 1, 1.5, 1, 'iqbrme07q042a2124b39cr8ar7'),
(236, 32, NULL, NULL, 1, 12, 1.2, 'asdhjgfgfakfbakfj'),
(237, 12, NULL, NULL, 1, 1, 1, '213143434'),
(239, 4, NULL, NULL, 5, 2.5, 0.1, 'pnidr5pih89gmtcr0dssjga521'),
(240, 1, 2, NULL, 1, 7.5, 0.1, 'pnidr5pih89gmtcr0dssjga521'),
(241, 2, 2, NULL, 1, 8.5, 0.1, 'pnidr5pih89gmtcr0dssjga521'),
(242, 3, 2, NULL, 1, 7, 0.1, 'pnidr5pih89gmtcr0dssjga521'),
(243, 4, 2, NULL, 1, 2.5, 0.1, 'pnidr5pih89gmtcr0dssjga521'),
(244, 5, 2, NULL, 1, 0.1, 1, 'pnidr5pih89gmtcr0dssjga521'),
(245, 10, 2, NULL, 1, 4.5, 0.1, 'pnidr5pih89gmtcr0dssjga521'),
(246, 11, 2, NULL, 1, 3, 0.1, 'pnidr5pih89gmtcr0dssjga521'),
(247, 13, 2, NULL, 1, 35, 0.01, 'pnidr5pih89gmtcr0dssjga521'),
(248, 14, 2, NULL, 1, 7.5, 0.1, 'pnidr5pih89gmtcr0dssjga521'),
(249, 15, 2, NULL, 1, 3.5, 0.1, 'pnidr5pih89gmtcr0dssjga521'),
(250, 16, 2, NULL, 1, 4, 0.1, 'pnidr5pih89gmtcr0dssjga521'),
(251, 17, 2, NULL, 1, 1, 1, 'pnidr5pih89gmtcr0dssjga521'),
(252, 18, 2, NULL, 1, 3, 1, 'pnidr5pih89gmtcr0dssjga521'),
(253, 19, 2, NULL, 1, 2.5, 1, 'pnidr5pih89gmtcr0dssjga521'),
(254, 20, 2, NULL, 1, 1.5, 1, 'pnidr5pih89gmtcr0dssjga521'),
(255, 21, 2, NULL, 1, 1, 1, 'pnidr5pih89gmtcr0dssjga521'),
(256, 22, 2, NULL, 1, 0.2, 1, 'pnidr5pih89gmtcr0dssjga521'),
(257, 23, 2, NULL, 1, 25, 0.01, 'pnidr5pih89gmtcr0dssjga521'),
(258, 42, 2, NULL, 1, 13, 0.1, 'pnidr5pih89gmtcr0dssjga521'),
(259, 43, 2, NULL, 1, 180, 0.1, 'pnidr5pih89gmtcr0dssjga521'),
(260, 44, 2, NULL, 1, 10, 0.1, 'pnidr5pih89gmtcr0dssjga521'),
(261, 45, 2, NULL, 1, 15, 0.1, 'pnidr5pih89gmtcr0dssjga521'),
(262, 46, 2, NULL, 1, 25, 0.1, 'pnidr5pih89gmtcr0dssjga521'),
(263, 8, 2, NULL, 1, 4, 0.1, 'pnidr5pih89gmtcr0dssjga521'),
(264, 26, 2, NULL, 1, 4, 1, 'pnidr5pih89gmtcr0dssjga521'),
(265, 27, 2, NULL, 1, 12, 0.1, 'pnidr5pih89gmtcr0dssjga521'),
(266, 28, 2, NULL, 1, 1.5, 1, 'pnidr5pih89gmtcr0dssjga521'),
(267, 29, 2, NULL, 1, 80, 0.01, 'pnidr5pih89gmtcr0dssjga521'),
(268, 30, 2, NULL, 1, 1.5, 1, 'pnidr5pih89gmtcr0dssjga521');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp_personal`
--

CREATE TABLE IF NOT EXISTS `tmp_personal` (
  `id_tmpPersonal` int(11) NOT NULL AUTO_INCREMENT,
  `id_personal` int(11) NOT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `id_cotizacion` int(11) DEFAULT NULL,
  `FechaInicio_tmp` datetime NOT NULL,
  `FechaFinal_tmp` datetime NOT NULL,
  `session_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tmpPersonal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=144 ;

--
-- Volcado de datos para la tabla `tmp_personal`
--

INSERT INTO `tmp_personal` (`id_tmpPersonal`, `id_personal`, `id_pedido`, `id_cotizacion`, `FechaInicio_tmp`, `FechaFinal_tmp`, `session_id`) VALUES
(41, 2, 1, NULL, '2017-01-23 00:00:00', '2017-09-01 00:00:00', '0llie0ju47putaco1ei45hb8b3'),
(42, 3, 1, NULL, '2017-01-23 00:00:00', '2017-09-01 00:00:00', '0llie0ju47putaco1ei45hb8b3'),
(100, 5, NULL, 31, '2017-01-20 00:00:00', '2017-01-22 00:00:00', '27feb0jqomc4t5gcvm35uib5i3'),
(101, 6, NULL, 31, '2017-01-20 00:00:00', '2017-01-22 00:00:00', '27feb0jqomc4t5gcvm35uib5i3'),
(138, 2, NULL, 32, '2017-02-01 00:00:00', '2017-02-02 00:00:00', 'f7tesvsn4vnhgothar10u50sn6'),
(139, 3, NULL, 32, '2017-02-01 00:00:00', '2017-02-02 00:00:00', 'f7tesvsn4vnhgothar10u50sn6'),
(140, 5, NULL, 31, '2017-01-20 00:00:00', '2017-01-22 00:00:00', 'on8v3mg8gm4s5o774uj1c8jpk1'),
(141, 6, NULL, 31, '2017-01-20 00:00:00', '2017-01-22 00:00:00', 'on8v3mg8gm4s5o774uj1c8jpk1'),
(142, 3, NULL, 30, '2017-01-18 00:00:00', '2017-01-20 00:00:00', 'on8v3mg8gm4s5o774uj1c8jpk1'),
(143, 4, NULL, 30, '2017-01-18 00:00:00', '2017-01-20 00:00:00', 'on8v3mg8gm4s5o774uj1c8jpk1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data' AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_name`, `user_password_hash`, `user_email`, `date_added`) VALUES
(2, 'Christian ', 'Cabanillas', 'admin', '$2y$10$NkOnPfVtyB75ziALz4exOOyFGE5gISm.sVdeK6AvJ7Z1gmwkhMHFC', 'christian_cabanillas2@hotmail.com', '2017-01-10 00:00:00'),
(3, 'Jose Carlos', 'Perez', 'jose', '$2y$10$Z568LY5qjOvyG8gUNSkwvudMvyNoY6Xlpe8h3aOdNe2Rtj7zI3q5.', 'jose_1@gmail.com', '2017-01-12 06:39:38');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`idTipoServicio`) REFERENCES `tipo_servicio` (`idTipoServicio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD CONSTRAINT `cotizacion_ibfk_1` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idpedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cotizacion_material`
--
ALTER TABLE `cotizacion_material`
  ADD CONSTRAINT `cotizacion_material_ibfk_1` FOREIGN KEY (`idMaterial`) REFERENCES `material_equipo` (`idMaterial`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cotizacion_material_ibfk_2` FOREIGN KEY (`idCotizacion`) REFERENCES `cotizacion` (`idcotizacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cotizacion_personal`
--
ALTER TABLE `cotizacion_personal`
  ADD CONSTRAINT `cotizacion_personal_ibfk_1` FOREIGN KEY (`idCotizacion`) REFERENCES `cotizacion` (`idcotizacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cotizacion_personal_ibfk_2` FOREIGN KEY (`idPersonal`) REFERENCES `personal` (`idPersonal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_actividad`
--
ALTER TABLE `detalle_actividad`
  ADD CONSTRAINT `detalle_actividad_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_actividad_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`idpedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_ambiente`
--
ALTER TABLE `detalle_ambiente`
  ADD CONSTRAINT `detalle_ambiente_ibfk_1` FOREIGN KEY (`idAmbiente`) REFERENCES `ambiente` (`idAmbiente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_ambiente_ibfk_2` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idpedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_actividad`
--
ALTER TABLE `material_actividad`
  ADD CONSTRAINT `material_actividad_ibfk_1` FOREIGN KEY (`idMaterial`) REFERENCES `material_equipo` (`idMaterial`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `material_actividad_ibfk_2` FOREIGN KEY (`idActividad`) REFERENCES `actividad` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_equipo`
--
ALTER TABLE `material_equipo`
  ADD CONSTRAINT `material_equipo_ibfk_1` FOREIGN KEY (`idTipoMaterial`) REFERENCES `tipo_material` (`idTipoMaterial`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_requerimiento`
--
ALTER TABLE `material_requerimiento`
  ADD CONSTRAINT `material_requerimiento_ibfk_1` FOREIGN KEY (`idRequerimiento`) REFERENCES `requerimiento` (`idRequerimiento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `material_requerimiento_ibfk_2` FOREIGN KEY (`idMaterial`) REFERENCES `material_equipo` (`idMaterial`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`idTipoServicio`) REFERENCES `tipo_servicio` (`idTipoServicio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`idArea`) REFERENCES `area` (`idArea`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
