-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-11-2017 a las 18:02:18
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `MyTravelHome`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adm_hotel`
--

CREATE TABLE `adm_hotel` (
  `id_adm_hotel` int(11) NOT NULL COMMENT 'Identificador del administrador del hotel',
  `id_usuario` int(11) NOT NULL COMMENT 'Identificador del usuario',
  `id_hotel` int(11) NOT NULL COMMENT 'Identificador del hotel',
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre del administrador/empleado del hotel',
  `apellido` varchar(100) NOT NULL COMMENT 'Apellido del administrador/empleado del hotel',
  `nacionalidad` int(11) NOT NULL COMMENT 'Id de la Nacionalidad del administrador/empleado del hotel',
  `genero` int(11) NOT NULL COMMENT 'Id del Genero del administrador/empleado del hotel',
  `cedula` varchar(100) NOT NULL COMMENT 'Cédula del administrador/empleado del hotel',
  `admin` int(11) NOT NULL DEFAULT '0' COMMENT 'Indica si es un empleado o un administrador del hotel'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Administradores de los hoteles' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `adm_hotel`
--

INSERT INTO `adm_hotel` (`id_adm_hotel`, `id_usuario`, `id_hotel`, `nombre`, `apellido`, `nacionalidad`, `genero`, `cedula`, `admin`) VALUES
(4, 22, 9, 'Nombre', 'Apellido', 1, 1, '116590468', 0),
(5, 33, 9, 'Nombre', 'Apellido', 1, 1, '1121212121', 4);

--
-- Disparadores `adm_hotel`
--
DELIMITER $$
CREATE TRIGGER `Actualizar_adm_hotel` BEFORE UPDATE ON `adm_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','adm_hotel','Actualizar adm_hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_adm_hotel` BEFORE DELETE ON `adm_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','adm_hotel','Borrado de un adm_hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insertar_adm_hotel` BEFORE INSERT ON `adm_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','adm_hotel','Nuevo adm_hotel',CURRENT_USER)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adm_plataforma`
--

CREATE TABLE `adm_plataforma` (
  `id_adm_plataforma` int(11) NOT NULL COMMENT 'Identificador del administrador de la plataforma',
  `id_usuario` int(11) NOT NULL COMMENT 'Identificador del usuario',
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre del administrador de la plataforma',
  `apellido` varchar(100) NOT NULL COMMENT 'Apellido del administrador de la plataforma',
  `nacionalidad` int(11) NOT NULL COMMENT 'Id de la nacionalidad del administrador de la plataforma',
  `genero` int(11) NOT NULL COMMENT 'Id del genero del administrador/empleado del hotel',
  `cedula` int(11) NOT NULL COMMENT 'Cedula del administrador de la plataforma',
  `fecha_nacimiento` date NOT NULL COMMENT 'fecha de nacimiento del administrador de la plataforma'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Administradores de la plataforma' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `adm_plataforma`
--

INSERT INTO `adm_plataforma` (`id_adm_plataforma`, `id_usuario`, `nombre`, `apellido`, `nacionalidad`, `genero`, `cedula`, `fecha_nacimiento`) VALUES
(1, 30, 'Silvia', 'Calderon', 1, 1, 1, '2017-11-21');

--
-- Disparadores `adm_plataforma`
--
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: adm_plataforma` BEFORE UPDATE ON `adm_plataforma` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','adm_plataforma','Actualizar adm_plataforma',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Borrar: adm_hotel` BEFORE DELETE ON `adm_plataforma` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','adm_hotel','Borrado de un adm_hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: adm_plataforma` BEFORE INSERT ON `adm_plataforma` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','adm_plataforma','Nuevo adm_plataforma',CURRENT_USER)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agencia`
--

CREATE TABLE `agencia` (
  `id_agencia` int(11) NOT NULL COMMENT 'Identificador de la agencia',
  `id_usuario` int(11) NOT NULL COMMENT 'Identificador del usuario',
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre de la agencia',
  `foto` varchar(100) NOT NULL COMMENT 'Url de la foto de la agencia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Datos de las agencias' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `agencia`
--

INSERT INTO `agencia` (`id_agencia`, `id_usuario`, `nombre`, `foto`) VALUES
(1, 7, 'Nombre de la agencia', '133328963logo.png');

--
-- Disparadores `agencia`
--
DELIMITER $$
CREATE TRIGGER `Actualizar_agencias` BEFORE UPDATE ON `agencia` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','agencia','Actualizar agencia',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_agencia` BEFORE DELETE ON `agencia` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','agencia','Borrado de un agencia',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insertar_agencia` BEFORE INSERT ON `agencia` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','agencia','Nuevo agencia',CURRENT_USER)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id_bitacora` int(11) NOT NULL COMMENT 'Identificador de la biblioteca',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha del cambio en la base ',
  `tipo_cambio` varchar(100) NOT NULL COMMENT 'Descripción del tipo de cambio en la base',
  `objeto` varchar(100) NOT NULL COMMENT 'Objeto modificado',
  `descripcion` text NOT NULL COMMENT 'Descripción de los objetos',
  `Usuario` varchar(100) NOT NULL COMMENT 'Usuario que aplica el cambio'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Bitácora de cambios' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id_bitacora`, `fecha`, `tipo_cambio`, `objeto`, `descripcion`, `Usuario`) VALUES
(7, '2017-11-12 15:58:03', 'UPDATE', 'adm_hotel', 'Actualizar hotel', ''),
(8, '2017-11-12 15:58:37', 'UPDATE', 'adm_hotel', 'Actualizar hotel', ''),
(9, '2017-11-12 16:03:41', 'INSERT', 'adm_hotel', 'Nuevo hotel', 'root@localhost');

--
-- Disparadores `bitacora`
--
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: bitacora` BEFORE UPDATE ON `bitacora` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','bitacora','Actualizar bitacora',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: bitacora` BEFORE INSERT ON `bitacora` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','bitacora','Nuevo bitacora',CURRENT_USER)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id_calificacion` int(11) NOT NULL COMMENT 'Identificador de la calificación ',
  `id_hotel` int(11) NOT NULL COMMENT 'Identificador del hotel',
  `id_usuario` int(11) NOT NULL COMMENT 'Identificador del usuario',
  `puntaje` int(11) NOT NULL COMMENT 'Puntaje dado a la calificación 1-5',
  `comentario` text NOT NULL COMMENT 'Comentario de la calificación '
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Calificaciones de los hoteles' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`id_calificacion`, `id_hotel`, `id_usuario`, `puntaje`, `comentario`) VALUES
(49, 9, 15, 3, 'Comentario'),
(50, 10, 15, 1, 'MALP'),
(51, 10, 15, 5, 'Bueno'),
(52, 10, 15, 3, 'Regular'),
(53, 10, 15, 5, 'Bueno');

--
-- Disparadores `calificacion`
--
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: calificacion` BEFORE UPDATE ON `calificacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','calificacion','Actualizar calificacion',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: calificacion` BEFORE INSERT ON `calificacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','calificacion','Nuevo calificacion',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_calificacion` BEFORE DELETE ON `calificacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','calificacion','Borrado de un calificacion',CURRENT_USER)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canton`
--

CREATE TABLE `canton` (
  `id_canton` int(11) NOT NULL COMMENT 'Identificador del canton',
  `id_provincia` int(11) NOT NULL COMMENT 'Identificador de la provincia',
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre del canton'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catalogo de cantones' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `canton`
--

INSERT INTO `canton` (`id_canton`, `id_provincia`, `nombre`) VALUES
(1, 1, 'Aserri');

--
-- Disparadores `canton`
--
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: canton` BEFORE UPDATE ON `canton` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','canton','Actualizar canton',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: canton` BEFORE INSERT ON `canton` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','canton','Nuevo canton',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_canton` BEFORE DELETE ON `canton` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','canton','Borrado de un canton',CURRENT_USER)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_hotel`
--

CREATE TABLE `categoria_hotel` (
  `id_categoria_hotel` int(11) NOT NULL COMMENT 'Identificador de la categoria del hotel',
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre de la categoria'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catalogo de categorias del hotel' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `categoria_hotel`
--

INSERT INTO `categoria_hotel` (`id_categoria_hotel`, `nombre`) VALUES
(1, 'Hostel');

--
-- Disparadores `categoria_hotel`
--
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: categoria_hotel` BEFORE UPDATE ON `categoria_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','categoria_hotel','Actualizar categoria_hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: categoria_hotel` BEFORE INSERT ON `categoria_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','categoria_hotel','Nuevo categoria_hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_categoria_hotel` BEFORE DELETE ON `categoria_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','categoria_hotel','Borrado de un categoria_hotel',CURRENT_USER)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL COMMENT 'Identificador del cliente',
  `id_usuario` int(11) NOT NULL COMMENT 'Identificador del usuario',
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre del cliente',
  `apellido` varchar(100) NOT NULL COMMENT 'Apellido del cliente',
  `genero` int(11) NOT NULL COMMENT 'ID genero del cliente',
  `cedula` int(100) NOT NULL COMMENT 'Cédula de cliente',
  `fecha_nacimiento` date NOT NULL COMMENT 'Fecha de nacimiento del cliente',
  `cuenta_bancaria` varchar(100) NOT NULL COMMENT 'Numero de cuenta bancaria del cliente',
  `nacionalidad` int(11) NOT NULL COMMENT 'ID nacionalidad del cliente',
  `fotografia` varchar(100) NOT NULL COMMENT 'URL de la fotografia del cliente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Datos de los clientes' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `id_usuario`, `nombre`, `apellido`, `genero`, `cedula`, `fecha_nacimiento`, `cuenta_bancaria`, `nacionalidad`, `fotografia`) VALUES
(2, 15, 'nombre', 'apellido', 1, 1232312, '1221-12-12', '123132', 1, '392795488logo.png'),
(5, 22, 'nombre2', '2apellido', 1, 2121, '1221-12-12', '123132', 1, '392795488logo.png');

--
-- Disparadores `cliente`
--
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: cliente` BEFORE UPDATE ON `cliente` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','cliente','Actualizar cliente',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: cliente` BEFORE INSERT ON `cliente` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','cliente','Nuevo cliente',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_cliente` BEFORE DELETE ON `cliente` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','cliente','Borrado de un cliente',CURRENT_USER)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuento`
--

CREATE TABLE `descuento` (
  `id_descuento` int(11) NOT NULL COMMENT 'Identificador del descuento',
  `id_agencia` int(11) NOT NULL COMMENT 'Identificador de la agencia',
  `id_habitacion` int(11) NOT NULL COMMENT 'Identificador de la habitacion',
  `porcentaje` int(11) NOT NULL COMMENT 'Porcentaje de descuento'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Descuentos de las agencias a habitaciones' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `descuento`
--

INSERT INTO `descuento` (`id_descuento`, `id_agencia`, `id_habitacion`, `porcentaje`) VALUES
(1, 1, 5, 10);

--
-- Disparadores `descuento`
--
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: descuento` BEFORE UPDATE ON `descuento` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','descuento','Actualizar descuento',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: descuento` BEFORE INSERT ON `descuento` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','descuento','Nuevo descuento',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_descuento` BEFORE DELETE ON `descuento` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','descuento','Borrado de un descuento',CURRENT_USER)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `id_distrito` int(11) NOT NULL COMMENT 'Identificador del distrito',
  `id_canton` int(11) NOT NULL COMMENT 'Identificador del canton',
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre del distrito'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catalogo de los distritos' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id_distrito`, `id_canton`, `nombre`) VALUES
(1, 1, 'Aserri Centro');

--
-- Disparadores `distrito`
--
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: distrito` BEFORE UPDATE ON `distrito` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','distrito','Actualizar distrito',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: distrito` BEFORE INSERT ON `distrito` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','distrito','Nuevo distrito',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_distrito` BEFORE DELETE ON `distrito` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','distrito','Borrado de un distrito',CURRENT_USER)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL COMMENT 'Identificador del genero',
  `nombre` varchar(50) NOT NULL COMMENT 'Nombre del genero'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Catalogo de generos' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `nombre`) VALUES
(1, 'Masculino');

--
-- Disparadores `genero`
--
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: genero` BEFORE UPDATE ON `genero` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','genero','Actualizar genero',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: genero` BEFORE INSERT ON `genero` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','genero','Nuevo genero',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_genero` BEFORE DELETE ON `genero` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','genero','Borrado de un genero',CURRENT_USER)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `id_habitacion` int(11) NOT NULL COMMENT 'Identificador de la habitación',
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre de la habitación ',
  `id_hotel` int(11) NOT NULL COMMENT 'Identificador del hotel',
  `tipo_habitacion` int(11) NOT NULL COMMENT 'ID del tipo de la habitación ',
  `precio` varchar(100) NOT NULL COMMENT 'Precio de la habitación ',
  `numero_habitacion` int(11) NOT NULL COMMENT 'Numero de la habitación ',
  `estado` int(1) NOT NULL DEFAULT '1' COMMENT 'Estado en el que se encuentra 1-0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catalogo de habitaciones por hotel' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`id_habitacion`, `nombre`, `id_hotel`, `tipo_habitacion`, `precio`, `numero_habitacion`, `estado`) VALUES
(5, 'habitacion 1', 9, 1, '121', 123, 1),
(6, 'habitacion 2', 10, 1, '121', 123, 1);

--
-- Disparadores `habitacion`
--
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: habitacion` BEFORE UPDATE ON `habitacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','habitacion','Actualizar habitacion',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: habitacion` BEFORE INSERT ON `habitacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','habitacion','Nuevo habitacion',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_habitacion` BEFORE DELETE ON `habitacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','habitacion','Borrado de un habitacion',CURRENT_USER)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

CREATE TABLE `hotel` (
  `id_hotel` int(11) NOT NULL COMMENT 'Identificador del hotel',
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre del hotel',
  `tipo_hotel` int(11) NOT NULL COMMENT 'ID del tipo de hotel',
  `caracteristica` text NOT NULL COMMENT 'Características del hotel',
  `distrito` int(11) NOT NULL COMMENT 'ID del distrito donde se encuentra',
  `localizacion` varchar(100) NOT NULL COMMENT 'Localización mediante coordenadas',
  `estado` int(1) NOT NULL DEFAULT '1' COMMENT 'Estado del hotel 1-0',
  `rango_precio` int(11) NOT NULL COMMENT 'ID del rango de precio',
  `categoria` int(11) NOT NULL COMMENT 'ID de la categoria del hotel'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Hoteles registrados' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `nombre`, `tipo_hotel`, `caracteristica`, `distrito`, `localizacion`, `estado`, `rango_precio`, `categoria`) VALUES
(9, 'HILTON', 1, 'caracte', 1, '10.366594442332268,-84.88303711328126', 1, 1, 1),
(10, 'HILTON2', 1, 'caracte', 1, '10.366594442332268,-83.88303711328126', 1, 1, 1);

--
-- Disparadores `hotel`
--
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: hotel` BEFORE UPDATE ON `hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','hotel','Actualizar hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: hotel` BEFORE INSERT ON `hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','hotel','Nuevo hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_hotel` BEFORE DELETE ON `hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','hotel','Borrado de un hotel',CURRENT_USER)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes_calificacion`
--

CREATE TABLE `likes_calificacion` (
  `id_likes_calificacion` int(11) NOT NULL COMMENT 'Identificador del like por comentario',
  `id_calificacion` int(11) NOT NULL COMMENT 'ID de la calificación / comentario',
  `id_usuario` int(11) NOT NULL COMMENT 'ID del usuario que efectua el like'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Likes de los comentarios de las calificaciones' ROW_FORMAT=COMPACT;

--
-- Disparadores `likes_calificacion`
--
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: likes_calificacion` BEFORE UPDATE ON `likes_calificacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','likes_calificacion','Actualizar likes_calificacion',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: likes_calificacion` BEFORE INSERT ON `likes_calificacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','likes_calificacion','Nuevo likes_calificacion',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_likes_calificacion` BEFORE DELETE ON `likes_calificacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','likes_calificacion','Borrado de un likes_calificacion',CURRENT_USER)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidad`
--

CREATE TABLE `nacionalidad` (
  `id_nacionalidad` int(11) NOT NULL COMMENT 'Identificador de la nacionalidad',
  `nombre` varchar(50) NOT NULL COMMENT 'Nombre de la nacionalidad'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Catalogo de las nacionalidades' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `nacionalidad`
--

INSERT INTO `nacionalidad` (`id_nacionalidad`, `nombre`) VALUES
(1, 'Costarricense');

--
-- Disparadores `nacionalidad`
--
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: nacionalidad` BEFORE UPDATE ON `nacionalidad` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','nacionalidad','Actualizar nacionalidad',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: nacionalidad` BEFORE INSERT ON `nacionalidad` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','nacionalidad','Nuevo nacionalidad',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_nacionalidad` BEFORE DELETE ON `nacionalidad` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','nacionalidad','Borrado de un nacionalidad',CURRENT_USER)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL COMMENT 'Identificador del pais',
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre del pais'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catalogo de los países ' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id_pais`, `nombre`) VALUES
(1, 'Costa Rica\r\n');

--
-- Disparadores `pais`
--
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: pais` BEFORE UPDATE ON `pais` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','pais','Actualizar pais',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: pais` BEFORE INSERT ON `pais` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','pais','Nuevo pais',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_pais` BEFORE DELETE ON `pais` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','pais','Borrado de un pais',CURRENT_USER)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id_provincia` int(11) NOT NULL COMMENT 'Identificador de la provincia',
  `id_pais` int(11) NOT NULL COMMENT 'ID del pais',
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre de la provincia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catalogo de las provincias' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id_provincia`, `id_pais`, `nombre`) VALUES
(1, 1, 'San Jose\r\n');

--
-- Disparadores `provincia`
--
DELIMITER $$
CREATE TRIGGER `Bitácora Actualizar: provincia` BEFORE UPDATE ON `provincia` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','provincia','Actualizar provincia',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Bitácora Insertar: provincia` BEFORE INSERT ON `provincia` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','provincia','Nuevo provincia',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_provincia` BEFORE DELETE ON `provincia` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','provincia','Borrado de un provincia',CURRENT_USER)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rango_precio`
--

CREATE TABLE `rango_precio` (
  `id_rango` int(11) NOT NULL COMMENT 'Identificador del rango de precio',
  `precio_inicial` varchar(100) NOT NULL COMMENT 'Precio inicial en símbolos $',
  `precio_final` varchar(100) NOT NULL COMMENT 'Precio final en símbolos $'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catalogo de los rangos de precio ' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `rango_precio`
--

INSERT INTO `rango_precio` (`id_rango`, `precio_inicial`, `precio_final`) VALUES
(1, '$', '$$$');

--
-- Disparadores `rango_precio`
--
DELIMITER $$
CREATE TRIGGER `Actualizar_rango_precio` BEFORE UPDATE ON `rango_precio` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','rango_precio','Actualizar rango_precio',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_rango_precio` BEFORE DELETE ON `rango_precio` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','rango_precio','Borrado de un rango_precio',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insertar_rango_precio` BEFORE INSERT ON `rango_precio` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','rango_precio','Nuevo rango_precio',CURRENT_USER)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE `reservacion` (
  `id_reservacion` int(11) NOT NULL COMMENT 'Identificador de la reservación ',
  `id_usuario` int(11) NOT NULL COMMENT 'Identificador del usuario',
  `id_habitacion` int(11) NOT NULL COMMENT 'Identificador de la habitación ',
  `fecha_entrada` date NOT NULL COMMENT 'Fecha de entrada de la reservación  ',
  `fecha_salida` date NOT NULL COMMENT 'Fecha de salida de la reservación '
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Reservaciones a habitaciones por los clientes' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`id_reservacion`, `id_usuario`, `id_habitacion`, `fecha_entrada`, `fecha_salida`) VALUES
(5, 15, 5, '2017-11-09', '2017-11-11');

--
-- Disparadores `reservacion`
--
DELIMITER $$
CREATE TRIGGER `Actualizar_reservacion` BEFORE UPDATE ON `reservacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','reservacion','Actualizar reservacion',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_reservacion` BEFORE DELETE ON `reservacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','reservacion','Borrado de un reservacion',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insertar_reservacion` BEFORE INSERT ON `reservacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','reservacion','Nuevo reservacion',CURRENT_USER)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_hotel`
--

CREATE TABLE `servicios_hotel` (
  `id_servicio_hotel` int(11) NOT NULL COMMENT 'Identificador del servicio',
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre del servicio'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catalogo de los servicios de los hoteles' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `servicios_hotel`
--

INSERT INTO `servicios_hotel` (`id_servicio_hotel`, `nombre`) VALUES
(1, 'WiFi'),
(2, 'Aire Acondicionado'),
(3, 'Restaurante'),
(4, 'Mascotas');

--
-- Disparadores `servicios_hotel`
--
DELIMITER $$
CREATE TRIGGER `Actualizar_servicios_hotel` BEFORE UPDATE ON `servicios_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','servicios_hotel','Actualizar servicios_hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_servicios_hotel` BEFORE DELETE ON `servicios_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','servicios_hotel','Borrado de un servicios_hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insertar_servicios_hotel` BEFORE INSERT ON `servicios_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','servicios_hotel','Nuevo servicios_hotel',CURRENT_USER)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_por_hotel`
--

CREATE TABLE `servicios_por_hotel` (
  `id_servicios_por_hotel` int(11) NOT NULL COMMENT 'Identificador del servicio por hotel',
  `id_hotel` int(11) DEFAULT '0' COMMENT 'Identificador del hotel',
  `id_servicio` int(11) DEFAULT '0' COMMENT 'Identificador del servicio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Servicios ofrecidos por un hotel' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `servicios_por_hotel`
--

INSERT INTO `servicios_por_hotel` (`id_servicios_por_hotel`, `id_hotel`, `id_servicio`) VALUES
(3, 9, 1),
(4, 9, 3);

--
-- Disparadores `servicios_por_hotel`
--
DELIMITER $$
CREATE TRIGGER `Actualizar_servicios_por_hotel` BEFORE UPDATE ON `servicios_por_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','servicios_por_hotel','Actualizar servicios_por_hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_servicios_por_hotel` BEFORE DELETE ON `servicios_por_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','servicios_por_hotel','Borrado de un servicios_por_hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insertar_servicios_por_hotel` BEFORE INSERT ON `servicios_por_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','servicios_por_hotel','Nuevo servicios_por_hotel',CURRENT_USER)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_habitacion`
--

CREATE TABLE `tipo_habitacion` (
  `id_tipo_habitacion` int(11) NOT NULL COMMENT 'Identificador del tipo de habitación ',
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre del tipo de habitación '
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catalogo de tipos de habitaciones' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `tipo_habitacion`
--

INSERT INTO `tipo_habitacion` (`id_tipo_habitacion`, `nombre`) VALUES
(1, 'Deluxe'),
(4, 'Individuales'),
(5, 'Suit');

--
-- Disparadores `tipo_habitacion`
--
DELIMITER $$
CREATE TRIGGER `Actualizar_tipo_habitacion` BEFORE UPDATE ON `tipo_habitacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','tipo_habitacion','Actualizar tipo_habitacion',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_tipo_habitacion` BEFORE DELETE ON `tipo_habitacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','tipo_habitacion','Borrado de un tipo_habitacion',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insertar_tipo_habitacion` BEFORE INSERT ON `tipo_habitacion` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','tipo_habitacion','Nuevo tipo_habitacion',CURRENT_USER)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_hotel`
--

CREATE TABLE `tipo_hotel` (
  `id_tipo_hotel` int(11) NOT NULL COMMENT 'Identificador del tipo de hotel',
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre del tipo de hotel',
  `descripcion` text NOT NULL COMMENT 'Descripción del tipo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catalogo del tipo de hotel' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `tipo_hotel`
--

INSERT INTO `tipo_hotel` (`id_tipo_hotel`, `nombre`, `descripcion`) VALUES
(1, 'Sin Estrellas', 'TEX'),
(3, '5 Estrellas', 'Hotel'),
(4, '2 Estrellas', 'Hotel categorÃ­a baja'),
(5, '1 Estrella', 'Deficiente');

--
-- Disparadores `tipo_hotel`
--
DELIMITER $$
CREATE TRIGGER `Actualizar_tipo_hotel` BEFORE UPDATE ON `tipo_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','tipo_hotel','Actualizar tipo_hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_tipo_hotel` BEFORE DELETE ON `tipo_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','tipo_hotel','Borrado de un tipo_hotel',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insertar_tipo_hotel` BEFORE INSERT ON `tipo_hotel` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','tipo_hotel','Nuevo tipo_hotel',CURRENT_USER)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL COMMENT 'Identificador de usuario',
  `usuario` varchar(100) NOT NULL COMMENT 'Nombre de usuario para el login',
  `contrasena` varchar(100) NOT NULL COMMENT 'Contraseña del login, en md5',
  `tipo` int(11) NOT NULL DEFAULT '0' COMMENT 'Tipo de usuario: 0 cliente, 2 agencia, 1 hotel, 3 administrador'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Datos de login para los usuarios generales' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `contrasena`, `tipo`) VALUES
(7, 'agencia', '21232f297a57a5a743894a0e4a801fc3', 2),
(15, 'cliente', '21232f297a57a5a743894a0e4a801fc3', 0),
(22, 'hotel', '21232f297a57a5a743894a0e4a801fc3', 1),
(30, 'admin', '21232f297a57a5a743894a0e4a801fc3', 3),
(33, 'hotel2', '21232f297a57a5a743894a0e4a801fc3', 1);

--
-- Disparadores `usuario`
--
DELIMITER $$
CREATE TRIGGER `Actualizar_usuario` BEFORE UPDATE ON `usuario` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('UPDATE','usuario','Actualizar usuario',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar_usuario` BEFORE DELETE ON `usuario` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('DELETE','usuario','Borrado de un usuario',CURRENT_USER)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insertar_usuario` BEFORE INSERT ON `usuario` FOR EACH ROW INSERT INTO `bitacora`(`tipo_cambio`, `objeto`, `descripcion`,`usuario`) VALUES ('INSERT','usuario','Nuevo usuario',CURRENT_USER)
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adm_hotel`
--
ALTER TABLE `adm_hotel`
  ADD PRIMARY KEY (`id_adm_hotel`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_hotel` (`id_hotel`),
  ADD KEY `id_hotel_2` (`id_hotel`),
  ADD KEY `genero` (`genero`),
  ADD KEY `nacionalidad` (`nacionalidad`);

--
-- Indices de la tabla `adm_plataforma`
--
ALTER TABLE `adm_plataforma`
  ADD PRIMARY KEY (`id_adm_plataforma`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `genero` (`genero`),
  ADD KEY `nacionalidad` (`nacionalidad`);

--
-- Indices de la tabla `agencia`
--
ALTER TABLE `agencia`
  ADD PRIMARY KEY (`id_agencia`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id_bitacora`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id_calificacion`),
  ADD KEY `id_hotel` (`id_hotel`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_hotel_2` (`id_hotel`),
  ADD KEY `id_usuario_2` (`id_usuario`),
  ADD KEY `id_hotel_3` (`id_hotel`),
  ADD KEY `id_usuario_3` (`id_usuario`),
  ADD KEY `id_hotel_4` (`id_hotel`),
  ADD KEY `id_usuario_4` (`id_usuario`);

--
-- Indices de la tabla `canton`
--
ALTER TABLE `canton`
  ADD PRIMARY KEY (`id_canton`),
  ADD KEY `id_provincia` (`id_provincia`);

--
-- Indices de la tabla `categoria_hotel`
--
ALTER TABLE `categoria_hotel`
  ADD PRIMARY KEY (`id_categoria_hotel`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `genero` (`genero`),
  ADD KEY `nacionalidad` (`nacionalidad`);

--
-- Indices de la tabla `descuento`
--
ALTER TABLE `descuento`
  ADD PRIMARY KEY (`id_descuento`),
  ADD KEY `id_agencia` (`id_agencia`),
  ADD KEY `id_habitacion` (`id_habitacion`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`id_distrito`),
  ADD KEY `id_canton` (`id_canton`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`id_habitacion`),
  ADD KEY `id_hotel` (`id_hotel`),
  ADD KEY `tipo_habitacion` (`tipo_habitacion`),
  ADD KEY `numero_habitacion` (`numero_habitacion`);

--
-- Indices de la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_hotel`),
  ADD KEY `tipo_hotel` (`tipo_hotel`),
  ADD KEY `distrito` (`distrito`),
  ADD KEY `rango_precio` (`rango_precio`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `likes_calificacion`
--
ALTER TABLE `likes_calificacion`
  ADD PRIMARY KEY (`id_likes_calificacion`),
  ADD KEY `id_calificacion` (`id_calificacion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `nacionalidad`
--
ALTER TABLE `nacionalidad`
  ADD PRIMARY KEY (`id_nacionalidad`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id_provincia`),
  ADD KEY `id_pais` (`id_pais`);

--
-- Indices de la tabla `rango_precio`
--
ALTER TABLE `rango_precio`
  ADD PRIMARY KEY (`id_rango`);

--
-- Indices de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD PRIMARY KEY (`id_reservacion`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_habitacion` (`id_habitacion`);

--
-- Indices de la tabla `servicios_hotel`
--
ALTER TABLE `servicios_hotel`
  ADD PRIMARY KEY (`id_servicio_hotel`);

--
-- Indices de la tabla `servicios_por_hotel`
--
ALTER TABLE `servicios_por_hotel`
  ADD PRIMARY KEY (`id_servicios_por_hotel`),
  ADD KEY `id_hotel` (`id_hotel`),
  ADD KEY `id_servicio` (`id_servicio`);

--
-- Indices de la tabla `tipo_habitacion`
--
ALTER TABLE `tipo_habitacion`
  ADD PRIMARY KEY (`id_tipo_habitacion`);

--
-- Indices de la tabla `tipo_hotel`
--
ALTER TABLE `tipo_hotel`
  ADD PRIMARY KEY (`id_tipo_hotel`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adm_hotel`
--
ALTER TABLE `adm_hotel`
  MODIFY `id_adm_hotel` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del administrador del hotel', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `adm_plataforma`
--
ALTER TABLE `adm_plataforma`
  MODIFY `id_adm_plataforma` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del administrador de la plataforma', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `agencia`
--
ALTER TABLE `agencia`
  MODIFY `id_agencia` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la agencia', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la biblioteca', AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la calificación ', AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT de la tabla `canton`
--
ALTER TABLE `canton`
  MODIFY `id_canton` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del canton', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `categoria_hotel`
--
ALTER TABLE `categoria_hotel`
  MODIFY `id_categoria_hotel` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la categoria del hotel', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del cliente', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `descuento`
--
ALTER TABLE `descuento`
  MODIFY `id_descuento` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del descuento', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `id_distrito` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del distrito', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del genero', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  MODIFY `id_habitacion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la habitación', AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del hotel', AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `likes_calificacion`
--
ALTER TABLE `likes_calificacion`
  MODIFY `id_likes_calificacion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del like por comentario';
--
-- AUTO_INCREMENT de la tabla `nacionalidad`
--
ALTER TABLE `nacionalidad`
  MODIFY `id_nacionalidad` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la nacionalidad', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del pais', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la provincia', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `rango_precio`
--
ALTER TABLE `rango_precio`
  MODIFY `id_rango` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del rango de precio', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  MODIFY `id_reservacion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la reservación ', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `servicios_hotel`
--
ALTER TABLE `servicios_hotel`
  MODIFY `id_servicio_hotel` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del servicio', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `servicios_por_hotel`
--
ALTER TABLE `servicios_por_hotel`
  MODIFY `id_servicios_por_hotel` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del servicio por hotel', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_habitacion`
--
ALTER TABLE `tipo_habitacion`
  MODIFY `id_tipo_habitacion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del tipo de habitación ', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipo_hotel`
--
ALTER TABLE `tipo_hotel`
  MODIFY `id_tipo_hotel` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del tipo de hotel', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de usuario', AUTO_INCREMENT=34;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adm_hotel`
--
ALTER TABLE `adm_hotel`
  ADD CONSTRAINT `Genero` FOREIGN KEY (`genero`) REFERENCES `genero` (`id_genero`),
  ADD CONSTRAINT `Nacionalidad` FOREIGN KEY (`nacionalidad`) REFERENCES `nacionalidad` (`id_nacionalidad`),
  ADD CONSTRAINT `Usuario por hotel` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`);

--
-- Filtros para la tabla `adm_plataforma`
--
ALTER TABLE `adm_plataforma`
  ADD CONSTRAINT `Genero por plataforma` FOREIGN KEY (`genero`) REFERENCES `genero` (`id_genero`),
  ADD CONSTRAINT `Nacionalidad por plataforma` FOREIGN KEY (`nacionalidad`) REFERENCES `nacionalidad` (`id_nacionalidad`),
  ADD CONSTRAINT `Usuario plataforma` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `agencia`
--
ALTER TABLE `agencia`
  ADD CONSTRAINT `Usuario agencia` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `Hotel` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`);

--
-- Filtros para la tabla `canton`
--
ALTER TABLE `canton`
  ADD CONSTRAINT `Provincia Canton` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id_provincia`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `Genero por cliente` FOREIGN KEY (`genero`) REFERENCES `genero` (`id_genero`),
  ADD CONSTRAINT `Nacionalidad por cliente` FOREIGN KEY (`nacionalidad`) REFERENCES `nacionalidad` (`id_nacionalidad`),
  ADD CONSTRAINT `Usuario por cliente` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `descuento`
--
ALTER TABLE `descuento`
  ADD CONSTRAINT `Agencia por descuento` FOREIGN KEY (`id_agencia`) REFERENCES `agencia` (`id_agencia`),
  ADD CONSTRAINT `Habitacion por descuento` FOREIGN KEY (`id_habitacion`) REFERENCES `habitacion` (`id_habitacion`);

--
-- Filtros para la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD CONSTRAINT `id_canton` FOREIGN KEY (`id_canton`) REFERENCES `canton` (`id_canton`);

--
-- Filtros para la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `Hotel por habitacion` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`),
  ADD CONSTRAINT `Tipo de habitacion` FOREIGN KEY (`tipo_habitacion`) REFERENCES `tipo_habitacion` (`id_tipo_habitacion`);

--
-- Filtros para la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `Categoria` FOREIGN KEY (`categoria`) REFERENCES `categoria_hotel` (`id_categoria_hotel`),
  ADD CONSTRAINT `Localizacion` FOREIGN KEY (`distrito`) REFERENCES `distrito` (`id_distrito`),
  ADD CONSTRAINT `Rango de precio` FOREIGN KEY (`rango_precio`) REFERENCES `rango_precio` (`id_rango`),
  ADD CONSTRAINT `Tipo de Hotel` FOREIGN KEY (`tipo_hotel`) REFERENCES `tipo_hotel` (`id_tipo_hotel`);

--
-- Filtros para la tabla `likes_calificacion`
--
ALTER TABLE `likes_calificacion`
  ADD CONSTRAINT `Calificacion` FOREIGN KEY (`id_calificacion`) REFERENCES `calificacion` (`id_calificacion`),
  ADD CONSTRAINT `Usuario de la calificacion` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `Id_pais` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`);

--
-- Filtros para la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD CONSTRAINT `Habitacion` FOREIGN KEY (`id_habitacion`) REFERENCES `habitacion` (`id_habitacion`),
  ADD CONSTRAINT `Usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `servicios_por_hotel`
--
ALTER TABLE `servicios_por_hotel`
  ADD CONSTRAINT `Hotel por servicio` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`),
  ADD CONSTRAINT `Servicio del hotel` FOREIGN KEY (`id_servicio`) REFERENCES `servicios_hotel` (`id_servicio_hotel`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
