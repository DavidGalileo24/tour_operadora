-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-01-2020 a las 18:36:26
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tour_operadora`
--
CREATE DATABASE IF NOT EXISTS `tour_operadora` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tour_operadora`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_cliente_sp` (IN `id` INT)  BEGIN
DELETE FROM cliente WHERE id_cliente = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_usuario_sp` (IN `id` INT)  BEGIN
DELETE FROM usuario WHERE id_empleado = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `destino_sp` ()  BEGIN
SELECT d.id_destino,d.nombre_destino,d.descripcion,d.imagen,dp.nombre_departamento,c.nombre_categoria FROM destino d INNER JOIN departamentos dp on d.id_departamento = dp.id_departamento INNER JOIN categoria c on d.id_categoria = c.id_categoria;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `empleado_sp` ()  BEGIN
SELECT e.id_empleado,e.DUI,e.nombre_empleado,e.apellido_empleado,e.fecha_nac,e.direccion,e.correo,e.telefono,l.respuesta,c.nombre_cargo FROM empleado e INNER JOIN licencia l on e.id_licencia = l.id_licencia INNER JOIN cargo c on e.id_cargo = c.id_cargo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `establecimiente_sp` ()  BEGIN
SELECT es.id_establecimiento,es.nombre_establecimiento,es.direccion,es.telefono,z.nombre_zona FROM establecimiento es INNER JOIN zona z on es.id_zona = z.id_zona;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `establecimiento_destino_sp` ()  BEGIN
SELECT exd.id_exd,es.nombre_establecimiento,z.nombre_zona,d.nombre_destino,dp.nombre_departamento,c.nombre_categoria,exd.precio_adulto,exd.precio_ninos FROM establecimiento_destino exd INNER JOIN establecimiento es on exd.id_establecimiento = es.id_establecimiento INNER JOIN zona z on es.id_zona = z.id_zona INNER JOIN destino d on exd.id_destino = d.id_destino INNER JOIN departamentos dp on d.id_departamento = dp.id_departamento INNER JOIN categoria c on d.id_categoria = c.id_categoria;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `establecimiento_empleado` ()  BEGIN
SELECT exe.id_exe,e.nombre_empleado,e.apellido_empleado,c.nombre_cargo,es.nombre_establecimiento,z.nombre_zona FROM establecimiento_empleado exe INNER JOIN empleado e on exe.id_empleado = e.id_empleado INNER JOIN cargo c on e.id_cargo = c.id_cargo INNER JOIN establecimiento es on exe.id_establecimiento = es.id_establecimiento INNER JOIN zona z on es.id_zona = z.id_zona;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_calendario_sp` (IN `empleado` INT, IN `mes` INT, IN `exd` INT, IN `transporte` INT, IN `salida` DATE, IN `horas` TIME, IN `horar` TIME, IN `encuentro` TEXT, IN `cupos` INT)  BEGIN
INSERT INTO `asignacion_calendario` (`id_asignacion`, `id_empleado`, `id_mes`, `id_exd`, `id_transporte`, `fecha_salida`, `hora_salida`, `hora_regreso`, `lugares_encuentro`, `cupos`) VALUES (NULL, empleado,mes, exd,transporte, salida, horas,horar,encuentro, cupos);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_cliente_sp` (IN `name` VARCHAR(50), IN `lastname` VARCHAR(50), IN `dni` VARCHAR(10), IN `birth` DATE, IN `address` TEXT, IN `email` VARCHAR(50), IN `phone` VARCHAR(9))  BEGIN
INSERT INTO `cliente`(`id_cliente`, `nombre_cliente`, `apellido_cliente`, `DUI`, `fecha_nac`, `direccion`, `correo`, `telefono`) VALUES (null,name,lastname,dni,birth,address,email,phone);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reservacion_sp` ()  BEGIN
SELECT r.id_reservacion,r.fecha_reserva,e.nombre_empleado,e.apellido_empleado,c.nombre_cargo,es.nombre_establecimiento,z.nombre_zona, d.nombre_destino,cl.nombre_cliente,cl.apellido_cliente,exd.precio_adulto,exd.precio_ninos,r.n_adultos,r.n_ninos,r.abono, (r.n_adultos * exd.precio_adulto) + (r.n_ninos * exd.precio_ninos)as total_pagar, ((r.n_adultos * exd.precio_adulto) + (r.n_ninos * exd.precio_ninos) - r.abono) as residuo, et.nombre_estado FROM reservacion r INNER JOIN empleado e on r.id_empleado = e.id_empleado INNER JOIN asignacion_calendario ac on r.id_asignacion = ac.id_asignacion INNER JOIN establecimiento_destino exd on ac.id_exd = exd.id_exd INNER JOIN establecimiento es on exd.id_establecimiento = es.id_establecimiento INNER JOIN zona z on es.id_zona = z.id_zona INNER JOIN destino d on exd.id_destino = d.id_destino INNER JOIN cliente cl on r.id_cliente = cl.id_cliente INNER JOIN estado et on r.id_estado = et.id_estado INNER JOIN cargo c on e.id_cargo= c.id_cargo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectusuario_e_sp` ()  BEGIN
SELECT e.id_empleado,e.nombre_empleado,e.apellido_empleado,c.nombre_cargo FROM empleado e INNER JOIN cargo c on e.id_cargo = c.id_cargo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_reseva_sp` ()  BEGIN
SELECT exd.id_exd,es.nombre_establecimiento,z.nombre_zona,d.nombre_destino FROM establecimiento_destino exd INNER JOIN establecimiento es on exd.id_establecimiento = es.id_establecimiento INNER JOIN zona z on es.id_zona = z.id_zona INNER JOIN destino d on exd.id_destino = d.id_destino;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_tranporte_sp` ()  BEGIN
SELECT e.nombre_empleado,e.apellido_empleado,c.nombre_cargo,t.placa FROM transporte t INNER JOIN empleado e on t.id_empleado = e.id_empleado INNER JOIN cargo c on e.id_cargo = c.id_cargo WHERE c.id_cargo = 3;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `set_usuario_sp` (IN `empleado` INT, IN `user_name` VARCHAR(45), IN `pass` VARCHAR(45), IN `rol` INT)  BEGIN
INSERT INTO usuario (`id_empleado`, `usuario`, `clave`, `id_rol`) VALUES (empleado, user_name, MD5(pass), rol);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ejecutivos` ()  BEGIN

select * from empleado where id_cargo = 1;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `transporte_sp` ()  BEGIN
SELECT t.id_transporte,e.nombre_empleado,e.apellido_empleado,c.nombre_cargo,lc.respuesta,t.placa,t.modelo,t.marca,t.capacidad,et.nombre_estadoT FROM transporte t INNER JOIN empleado e on t.id_empleado = e.id_empleado INNER JOIN cargo c on e.id_cargo = c.id_cargo INNER JOIN estadot et on t.id_estadoT = et.id_estadoT INNER JOIN licencia lc on e.id_licencia = lc.id_licencia;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `usuario_empleado` ()  BEGIN
SELECT u.id_empleado,e.nombre_empleado,e.apellido_empleado,c.nombre_cargo,e.correo, u.usuario,r.nombre_rol FROM usuario u  INNER JOIN empleado e on u.id_empleado = e.id_empleado INNER JOIN rol r on u.id_rol = r.id_rol INNER JOIN cargo c on e.id_cargo = c.id_cargo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_calendario_sp` ()  BEGIN
SELECT a.id_asignacion,p.nombre_empleado,p.apellido_empleado,c.nombre_cargo,m.nombre_mes,es.nombre_establecimiento,d.nombre_destino,em.nombre_empleado,em.apellido_empleado,cg.nombre_cargo,a.fecha_salida,a.hora_salida,a.hora_regreso,a.lugares_encuentro,a.cupos 
FROM asignacion_calendario a 
INNER JOIN empleado p 
ON a.id_empleado = p.id_empleado 
INNER JOIN cargo c 
ON p.id_cargo = c.id_cargo 
INNER JOIN meses m ON a.id_mes = m.id_mes 
INNER JOIN establecimiento_destino exd 
ON a.id_exd = exd.id_exd 
INNER JOIN establecimiento es 
ON exd.id_establecimiento = es.id_establecimiento 
INNER JOIN destino d ON exd.id_destino = d.id_destino 
INNER JOIN transporte t 
ON a.id_transporte = t.id_transporte 
INNER JOIN empleado em 
ON t.id_empleado = em.id_empleado 
INNER JOIN cargo cg 
ON em.id_cargo = cg.id_cargo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_cliente_sp` ()  BEGIN
SELECT * FROM cliente;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_calendario`
--

CREATE TABLE IF NOT EXISTS `asignacion_calendario` (
  `id_asignacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(11) NOT NULL,
  `id_mes` int(11) NOT NULL,
  `id_exd` int(11) NOT NULL,
  `id_transporte` int(11) NOT NULL,
  `fecha_salida` date NOT NULL,
  `hora_salida` time NOT NULL,
  `hora_regreso` time NOT NULL,
  `lugares_encuentro` text NOT NULL,
  `cupos` int(11) NOT NULL,
  PRIMARY KEY (`id_asignacion`),
  KEY `id_destino` (`id_exd`,`id_transporte`,`id_empleado`),
  KEY `placa` (`id_transporte`),
  KEY `id_destino_2` (`id_exd`),
  KEY `id_placa` (`id_transporte`),
  KEY `id_empleado` (`id_empleado`),
  KEY `id_mes` (`id_mes`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignacion_calendario`
--

INSERT INTO `asignacion_calendario` (`id_asignacion`, `id_empleado`, `id_mes`, `id_exd`, `id_transporte`, `fecha_salida`, `hora_salida`, `hora_regreso`, `lugares_encuentro`, `cupos`) VALUES
(3, 5, 1, 2, 1, '2020-01-10', '07:06:01', '18:00:00', 'texaco,puma,salvador del mundo, los proceres', 40),
(5, 7, 3, 2, 1, '2019-12-20', '08:00:00', '08:00:00', 'sdddddddddddd', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cargo` varchar(45) NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nombre_cargo`) VALUES
(1, 'Ejecutivo de ventas'),
(2, 'Gerente'),
(3, 'Motorista'),
(4, 'Guia turistico'),
(5, 'Asistente de Gerente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Playas'),
(2, 'Zoologicos'),
(3, 'Lagos'),
(4, 'Cerros y volcanes'),
(5, 'Parques'),
(6, 'Aguas termales'),
(7, 'Ruinas arqueologicas'),
(8, 'Museos'),
(9, 'Rios'),
(10, 'Cascadas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(45) NOT NULL,
  `apellido_cliente` varchar(45) NOT NULL,
  `DUI` varchar(10) NOT NULL,
  `fecha_nac` date NOT NULL,
  `direccion` text NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre_cliente`, `apellido_cliente`, `DUI`, `fecha_nac`, `direccion`, `correo`, `telefono`) VALUES
(1, 'Isaac Alexander', 'Castillo Lopez', '05867414-6', '1999-04-21', 'Comunidad San Lorenzo kilometro 50 hacia Costa del Sol, Canton El Pedregal, poligono 6, casa numero 3, El Rosario La Paz', 'castillo.lopez2199@gmail.com', '7915-6162'),
(4, 'adss', 'dsddf', 'sddddddddd', '2019-12-10', 'seffddddddddddddddd', 'efdsdsd', 'wdcsf'),
(5, 'rgeef', 'sdfgdsfgsdfg', 'sdgsdfsd', '2019-12-12', 'asdas', 'dcccc', 'ccccc'),
(6, 'sdsdffffffff', 'dsffffffffffffffgs', 'fggggggggg', '1999-02-21', 'sdfsdf', 'castillo.lopez2199@gmail.com', 'dsfffffff');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE IF NOT EXISTS `departamentos` (
  `id_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_departamento` varchar(25) NOT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_departamento`, `nombre_departamento`) VALUES
(1, 'Santa Ana'),
(2, 'Ahuachapan'),
(3, 'San Vicente'),
(4, 'Cabañas'),
(5, 'Sonsonate'),
(6, 'La Libertad'),
(7, 'Usulutan'),
(8, 'San Miguel'),
(9, 'San Salvador'),
(10, 'La Paz'),
(11, 'La Unión'),
(12, 'Morazán'),
(13, 'Cuscatlan'),
(14, 'Chalatenango');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE IF NOT EXISTS `destino` (
  `id_destino` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_destino` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `direccion` text NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_destino`),
  KEY `id_departamento` (`id_departamento`),
  KEY `id_departamento_2` (`id_departamento`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`id_destino`, `nombre_destino`, `descripcion`, `id_departamento`, `direccion`, `id_categoria`) VALUES
(1, 'Playa y Estero Barra de Santiago', 'Es un lugar perfecto para observación de pájaros y es una oportunidad para ver cocodrilos en su hábitat natural. Barra de Santiago es también un pionero en la conservación de la tortuga marina a través de las fincas de tortuguitas.', 2, 'La Barra de Santiago queda ubicada a unos minutos del kilómetro 98.5 de la carretera CA2 que conduce a la Frontera de La Hachadura, en el municipio de Jujutla, departamento de Ahuachapán.', 1),
(3, 'Parque Nacional El Imposible', 'Esta área natural protegida es considerada la reliquia natural más importante del país por ser un ecosistema amenazado a nivel mundial (bosque tropical seco y tropical seco premontano), pero también por ser uno de los últimos refugios para una comunidad increíblemente diversa de vida silvestre', 2, 'está ubicado en las elevaciones costeras del pacífico de Ahuachapán, entre los municipios de San Francisco Menéndez y Tacuba, al sur-oeste de la Ruta de las Flores.', 4),
(4, 'Laberinto de Albania', 'Se trata de un laberinto único en El Salvador y considerado como uno de los mejores cinco en el mundo; está formado por más de 2,000 árboles de ciprés los cuales han sido cuidadosamente cuidados para darle esta curiosa forma y que de esta manera los turistas puedan entretenerse en su estadía de este lugar', 2, 'Laberinto de Apaneca, Apanhecat', 5),
(5, 'Parque Geotérmico Termales Santa Teresa', 'El parque de Santa Teresa le ofrece la oportunidad única de apreciar el Ausol Santa Teresa, el Ausol más grande de Centroamérica, el sendero de los laguitos, la piscina mágica, la piscina romántica y la laguna azul, que en conjunto hacen de Termales Santa Teresa el principal destino turístico del Occidente de El Salvador.', 2, 'Entre Ahuachapán y Ataco, a solo 2 kilómetros del Centro de Ahuachapán, Ahuachapan 2101 El Salvador', 6),
(6, 'Volcán de Izalco', 'Era un volcán sin cono, un volcán en formación al que los indígenas comarcanos dieron el nombre de “infiernillo de los españoles” (1633).', 5, 'Ubicado a unos 15 km al noreste de la ciudad de Sonsonate. Se halla contiguo al Cerro Verde y al Volcán de Santa Ana', 4),
(7, 'Los Chorros de la Calera', 'La caída de agua de los Chorros de la Calera es de unos 20 metros y sus aguas son recogidas en dos piscinas de unos quince metros de largo por siete de ancho, de donde siguen su curso por otras caídas pequeñas.\r\n\r\nLas pozas no son profundas las de arriba llegan a la cintura y las pozas de abajo llegan a las rodillas, por ende los niños son felices en estás pozas. También podrás ver paredes de roca cubiertas con las raíces de los árboles.', 5, 'Están ubicadas a 2 Km del casco urbano en Juayúa, departamento de Sonsonate.', 10),
(8, 'Jasmin', 'xfdgbhnh', 2, 'zdfgrfjnh', 3),
(9, 'sfv', 'segd', 12, 'fdg', 2),
(10, 'sfv', 'segd', 12, 'fdg', 2),
(11, 'sfv', 'segd', 12, 'fdg', 2),
(12, 'sfv', 'segd', 12, 'fdg', 2),
(13, 'sfv', 'segd', 12, 'fdg', 2),
(14, 'sfv', 'segd', 12, 'fdg', 2),
(15, 'sfv', 'segd', 12, 'fdg', 2),
(16, 'sfv', 'segd', 12, 'fdg', 2),
(17, 'sfv', 'segd', 12, 'fdg', 2),
(18, 'sfv', 'segd', 12, 'fdg', 2),
(19, 'sfv', 'segd', 12, 'fdg', 2),
(20, 'sfv', 'segd', 12, 'fdg', 2),
(21, 'sfv', 'segd', 12, 'fdg', 2),
(22, 'sfv', 'segd', 12, 'fdg', 2),
(23, 'sfv', 'segd', 12, 'fdg', 2),
(24, 'dfhgdfth', 'wrygf', 10, 'sdg', 2),
(25, 'dd  cccc', 'thjtr', 11, 'fgdf', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `DUI` varchar(10) NOT NULL,
  `nombre_empleado` varchar(45) NOT NULL,
  `apellido_empleado` varchar(45) NOT NULL,
  `fecha_nac` date NOT NULL,
  `direccion` text NOT NULL,
  `correo` varchar(40) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `id_licencia` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `id_licencia` (`id_licencia`),
  KEY `id_cargo` (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `DUI`, `nombre_empleado`, `apellido_empleado`, `fecha_nac`, `direccion`, `correo`, `telefono`, `id_licencia`, `id_cargo`) VALUES
(5, '01234567-8', 'Wilfredo Alexander', 'Monterroza', '1980-04-23', 'San Salvador Ecuador Argentina', 'a@a.com', '1234-5678', 2, 1),
(6, '98765432-1', 'Roberto Edmundo', 'Duke Colorado', '1777-10-24', 'avenida españa Colombia', 'a@a.com', '5678-1234', 1, 3),
(7, '6516165165', 'David Galileo', 'Salgado', '2019-12-06', 'Apopa San Salvador', 'a@a.com', '8765-4321', 1, 4),
(8, '05867414-6', 'Isaac Alexander', 'Castillo Lopez', '1999-04-21', 'mi home', 'castillo.lopez2199@gmail.com', '7915-6162', 2, 2),
(24, '3465476547', '645cfghjcghn', ' cvnbcvhnbfgc', '2019-12-20', 'xd', 'xfgjhxfgjxgxg', 'xgxgdh', 1, 4),
(25, 'drfghdfgh', 'dxfbxcvb', 'xdfbxfcb', '2019-12-04', 'xdgf', 'xdb', 'xdnbv', 1, 4),
(26, '65754567', 'fxvdbcvb', ' cvbxdfgb', '2019-11-28', 'xcvbcxvb', 'cbvxcvb', 'cv', 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimiento`
--

CREATE TABLE IF NOT EXISTS `establecimiento` (
  `id_establecimiento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_establecimiento` varchar(45) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `id_zona` int(11) NOT NULL,
  PRIMARY KEY (`id_establecimiento`),
  KEY `nombre_establecimiento` (`nombre_establecimiento`,`id_zona`),
  KEY `id_zona` (`id_zona`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `establecimiento`
--

INSERT INTO `establecimiento` (`id_establecimiento`, `nombre_establecimiento`, `direccion`, `telefono`, `id_zona`) VALUES
(1, 'Tour Operadora San Miguel', 'direccion', '1124-5456', 3),
(2, 'San Salvador', 'direccion', '23454435', 2),
(3, 'Santa Ana', 'direccion', '23454435', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimiento_destino`
--

CREATE TABLE IF NOT EXISTS `establecimiento_destino` (
  `id_exd` int(11) NOT NULL AUTO_INCREMENT,
  `id_establecimiento` int(11) NOT NULL,
  `id_destino` int(11) NOT NULL,
  `precio_adulto` decimal(10,2) NOT NULL,
  `precio_ninos` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_exd`),
  KEY `id_establecimiento` (`id_establecimiento`,`id_destino`),
  KEY `id_destino` (`id_destino`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `establecimiento_destino`
--

INSERT INTO `establecimiento_destino` (`id_exd`, `id_establecimiento`, `id_destino`, `precio_adulto`, `precio_ninos`) VALUES
(2, 2, 4, '40.00', '20.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimiento_empleado`
--

CREATE TABLE IF NOT EXISTS `establecimiento_empleado` (
  `id_exe` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(11) NOT NULL,
  `id_establecimiento` int(11) NOT NULL,
  PRIMARY KEY (`id_exe`),
  KEY `id_empleado` (`id_empleado`,`id_establecimiento`),
  KEY `id_establecimiento` (`id_establecimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `establecimiento_empleado`
--

INSERT INTO `establecimiento_empleado` (`id_exe`, `id_empleado`, `id_establecimiento`) VALUES
(1, 5, 1),
(2, 6, 1),
(3, 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_estado` varchar(25) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `nombre_estado`) VALUES
(1, 'Reservado'),
(2, 'Pago total'),
(3, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadot`
--

CREATE TABLE IF NOT EXISTS `estadot` (
  `id_estadoT` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_estadoT` varchar(45) NOT NULL,
  PRIMARY KEY (`id_estadoT`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadot`
--

INSERT INTO `estadot` (`id_estadoT`, `nombre_estadoT`) VALUES
(1, 'Disponible'),
(2, 'Saturado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencia`
--

CREATE TABLE IF NOT EXISTS `licencia` (
  `id_licencia` int(11) NOT NULL AUTO_INCREMENT,
  `respuesta` varchar(8) NOT NULL,
  PRIMARY KEY (`id_licencia`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `licencia`
--

INSERT INTO `licencia` (`id_licencia`, `respuesta`) VALUES
(1, 'si posee'),
(2, 'no posee');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meses`
--

CREATE TABLE IF NOT EXISTS `meses` (
  `id_mes` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_mes` varchar(30) NOT NULL,
  PRIMARY KEY (`id_mes`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `meses`
--

INSERT INTO `meses` (`id_mes`, `nombre_mes`) VALUES
(1, 'Enero'),
(2, 'Febrero'),
(3, 'Marzo'),
(4, 'Abril'),
(5, 'Mayo'),
(6, 'Junio'),
(7, 'Julio'),
(8, 'Agosto'),
(9, 'Septiembre'),
(10, 'Octubre'),
(11, 'Noviembre'),
(12, 'Diciembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_reserva`
--

CREATE TABLE IF NOT EXISTS `registro_reserva` (
  `id_registro` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(11) NOT NULL,
  `id_reservacion` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `total_pagar` decimal(10,2) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_registro`),
  KEY `id_reservacion` (`id_reservacion`,`id_estado`),
  KEY `id_estado` (`id_estado`),
  KEY `id_empleado` (`id_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE IF NOT EXISTS `reservacion` (
  `id_reservacion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_reserva` date NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_asignacion` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `n_adultos` int(11) NOT NULL,
  `n_ninos` int(11) NOT NULL,
  `total_pagar` decimal(10,2) NOT NULL,
  `abono` decimal(10,2) NOT NULL,
  `residuo` decimal(10,2) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_reservacion`),
  KEY `id_destino` (`id_cliente`,`id_estado`),
  KEY `id_estado` (`id_estado`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_exd` (`id_asignacion`),
  KEY `id_empleado` (`id_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`id_reservacion`, `fecha_reserva`, `id_empleado`, `id_asignacion`, `id_cliente`, `n_adultos`, `n_ninos`, `total_pagar`, `abono`, `residuo`, `id_estado`) VALUES
(3, '2019-12-19', 7, 3, 1, 2, 2, '474.00', '55.00', '88.00', 1),
(4, '2020-01-08', 5, 5, 1, 33, 55, '0.00', '12.00', '0.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(45) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Guia Turistico'),
(3, 'Transportista'),
(4, 'Ejecutivo de ventas'),
(5, 'Asistente de Gerente'),
(6, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte`
--

CREATE TABLE IF NOT EXISTS `transporte` (
  `id_transporte` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(8) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `capacidad` int(20) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_estadoT` int(11) NOT NULL,
  PRIMARY KEY (`id_transporte`),
  UNIQUE KEY `placa` (`placa`),
  KEY `id_empleado` (`id_empleado`,`id_estadoT`),
  KEY `id_estadoT` (`id_estadoT`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transporte`
--

INSERT INTO `transporte` (`id_transporte`, `placa`, `modelo`, `marca`, `capacidad`, `id_empleado`, `id_estadoT`) VALUES
(1, 'P246-128', 'tercera generacion', 'Toyota Coaster', 20, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_empleado` int(11) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `id_empleado` (`id_empleado`),
  KEY `id_rol` (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_empleado`, `usuario`, `clave`, `id_rol`) VALUES
(5, 'tghgdfhdf', '27ff3b293affe7f2db8fb837069d4f83', 1),
(8, 'Alex_castillo21', '123', 1),
(26, 'david', '5c7a3b81a677c639c76989610183c0e0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_cliente`
--

CREATE TABLE IF NOT EXISTS `usuario_cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre_usuario` varchar(15) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `id_rol` (`id_rol`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE IF NOT EXISTS `zona` (
  `id_zona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_zona` varchar(45) NOT NULL,
  PRIMARY KEY (`id_zona`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`id_zona`, `nombre_zona`) VALUES
(1, 'Zona Occidental'),
(2, 'Zona Central'),
(3, 'Zona Oriental');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion_calendario`
--
ALTER TABLE `asignacion_calendario`
  ADD CONSTRAINT `asignacion_calendario_ibfk_2` FOREIGN KEY (`id_transporte`) REFERENCES `transporte` (`id_transporte`),
  ADD CONSTRAINT `asignacion_calendario_ibfk_3` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`),
  ADD CONSTRAINT `asignacion_calendario_ibfk_4` FOREIGN KEY (`id_exd`) REFERENCES `establecimiento_destino` (`id_exd`),
  ADD CONSTRAINT `asignacion_calendario_ibfk_5` FOREIGN KEY (`id_mes`) REFERENCES `meses` (`id_mes`);

--
-- Filtros para la tabla `destino`
--
ALTER TABLE `destino`
  ADD CONSTRAINT `destino_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id_departamento`),
  ADD CONSTRAINT `destino_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`),
  ADD CONSTRAINT `empleado_ibfk_3` FOREIGN KEY (`id_licencia`) REFERENCES `licencia` (`id_licencia`);

--
-- Filtros para la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  ADD CONSTRAINT `establecimiento_ibfk_1` FOREIGN KEY (`id_zona`) REFERENCES `zona` (`id_zona`);

--
-- Filtros para la tabla `establecimiento_destino`
--
ALTER TABLE `establecimiento_destino`
  ADD CONSTRAINT `establecimiento_destino_ibfk_1` FOREIGN KEY (`id_destino`) REFERENCES `destino` (`id_destino`),
  ADD CONSTRAINT `establecimiento_destino_ibfk_2` FOREIGN KEY (`id_establecimiento`) REFERENCES `establecimiento` (`id_establecimiento`);

--
-- Filtros para la tabla `establecimiento_empleado`
--
ALTER TABLE `establecimiento_empleado`
  ADD CONSTRAINT `establecimiento_empleado_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`),
  ADD CONSTRAINT `establecimiento_empleado_ibfk_2` FOREIGN KEY (`id_establecimiento`) REFERENCES `establecimiento` (`id_establecimiento`);

--
-- Filtros para la tabla `registro_reserva`
--
ALTER TABLE `registro_reserva`
  ADD CONSTRAINT `registro_reserva_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `registro_reserva_ibfk_2` FOREIGN KEY (`id_reservacion`) REFERENCES `reservacion` (`id_reservacion`),
  ADD CONSTRAINT `registro_reserva_ibfk_3` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`);

--
-- Filtros para la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `reservacion_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `reservacion_ibfk_4` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`),
  ADD CONSTRAINT `reservacion_ibfk_5` FOREIGN KEY (`id_asignacion`) REFERENCES `asignacion_calendario` (`id_asignacion`);

--
-- Filtros para la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD CONSTRAINT `transporte_ibfk_2` FOREIGN KEY (`id_estadoT`) REFERENCES `estadot` (`id_estadoT`),
  ADD CONSTRAINT `transporte_ibfk_3` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`);

--
-- Filtros para la tabla `usuario_cliente`
--
ALTER TABLE `usuario_cliente`
  ADD CONSTRAINT `usuario_cliente_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `usuario_cliente_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
