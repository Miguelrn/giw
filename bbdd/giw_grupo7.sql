-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2014 a las 15:11:59
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `giw_grupo7`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `email` varchar(40) CHARACTER SET latin1 NOT NULL,
  `contrasena` varchar(12) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`email`, `contrasena`) VALUES
('admin@admin.com', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE IF NOT EXISTS `articulo` (
  `id_articulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `id_categoria` varchar(12) NOT NULL,
  `anno` int(11) DEFAULT NULL,
  `valoracion` int(11) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `precio` decimal(4,2) NOT NULL,
  `descuento` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_articulo`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_articulo`, `nombre`, `cantidad`, `descripcion`, `id_categoria`, `anno`, `valoracion`, `foto`, `precio`, `descuento`) VALUES
(1, '24 Shots', 40, NULL, '6', 2003, 8, '50_Cent-24_Shots-Frontal.jpg', '13.00', 0),
(2, 'ABBA', 50, NULL, '2', 1975, 7, 'Abba-Abba-Frontal.jpg', '11.00', 0),
(3, 'Black Ice', 49, NULL, '1', 2008, 8, 'Ac_Dc-Black_Ice-Frontal.jpg', '19.00', 0),
(4, 'Aerosmith', 48, NULL, '1', 1973, 9, 'Aerosmith-Aerosmith-Frontal.jpg', '15.00', 0),
(5, 'Alanis', 50, NULL, '2', 1991, 7, 'Alanis_Morissette-Alanis-Frontal.jpg', '9.00', 0),
(6, 'Con el alma al aire', 50, NULL, '2', 2000, 7, 'Alejandro_Sanz-El_Alma_Al_Aire-Frontal.jpg', '14.00', 0),
(7, 'As I Am', 43, NULL, '8', 2007, 8, 'Alicia_Keys-As_I_Am-Frontal.jpg', '6.00', 0),
(8, 'Aquarium', 50, NULL, '3', 1997, 8, 'Aqua-Aquarium-Frontal.jpg', '6.00', 0),
(9, 'Avril Lavigne', 47, NULL, '1', 2011, 8, 'avril_lavigne-avril_lavigne-Frontal.jpg', '13.00', 0),
(10, 'Buleria', 50, NULL, '9', 2004, 8, 'David_Bisbal-Buleria-Frontal.jpg', '8.00', 0),
(11, 'Violator', 50, NULL, '1', 1990, 7, 'Depeche_Mode-Violator-Frontal.jpg', '13.00', 0),
(12, 'Kaleidoscope', 48, NULL, '3', 2008, 9, 'Dj_Tiesto-Kaleidoscope-Frontal.jpg', '13.00', 0),
(13, 'Canciones', 50, NULL, '2', 1986, 7, 'Duncan_Dhu-Canciones-Frontal.jpg', '13.00', 0),
(14, 'Europop', 44, NULL, '3', 1999, 8, 'Eiffel_65-Europop-Frontal.jpg', '12.00', 0),
(15, 'A Mi Na Ma', 50, NULL, '9', 2005, 7, 'El_Arrebato-A_Mi_Na_Ma_(CD_Single)-Frontal.jpg', '10.00', 0),
(16, 'Angel Malherido', 50, NULL, '9', 2003, 8, 'El_Barrio-Angel_Malherido-Frontal.jpg', '16.00', 0),
(17, 'Eminem Is Back', 48, NULL, '6', 2004, 8, 'Eminem-Eminem_Is_Back-Frontal.jpg', '16.00', 0),
(18, 'Destrangis', 50, NULL, '2', 2001, 8, 'Estopa-Destrangis-Frontal.jpg', '15.00', 0),
(19, 'Bring Me To Life', 50, NULL, '1', 2001, 8, 'Evanescence-Bring_Me_To_Life_(Daredevil_Promo)-Frontal.jpg', '13.00', 0),
(20, 'Agila', 50, NULL, '1', 1996, 8, 'Extremoduro-Agila-Frontal.jpg', '11.00', 0),
(21, 'Back To Bedlam', 50, NULL, '2', 2004, 8, 'James_Blunt-Back_To_Bedlam-Frontal.jpg', '20.00', 0),
(22, 'Sex Machine', 49, NULL, '8', 1970, 8, 'James_Brown-Sex_Machine-Frontal.jpg', '12.00', 0),
(23, 'A Funk Oddyssey', 49, NULL, '5', 2001, 7, 'Jamiroquai-A_Funk_Oddyssey-Frontal.jpg', '15.00', 0),
(24, 'Love?', 50, NULL, '8', 2011, 7, 'jennifer_lopez-love_-Frontal.jpg', '16.00', 0),
(25, 'Blue Wild Angel', 50, NULL, '1', 2002, 8, 'Jimi_Hendrix-Blue_Wild_Angel-Frontal.jpg', '13.00', 0),
(26, 'A Dios Le Pido', 50, NULL, '1', 2002, 8, 'juanes-a_dios_le_pido-Frontal.jpg', '12.00', 0),
(27, '1100 Bel Air Plac', 50, NULL, '2', 1984, 9, 'julio_iglesias-1100_bel_air_place-Frontal.jpg', '16.00', 0),
(28, 'Be Here Now', 50, NULL, '1', 1997, 7, 'Oasis-Be_Here_Now-Frontal.jpg', '13.00', 0),
(29, 'Antropop', 43, NULL, '3', 1991, 9, 'Obk-Antropop-Frontal.jpg', '10.00', 0),
(30, 'Ixnay On The Hombr', 50, NULL, '1', 1997, 8, 'Offspring-Ixnay_On_The_Hombre-Frontal.jpg', '16.00', 0),
(31, 'A Lo Cubano', 49, NULL, '6', 1999, 6, 'Orishas-A_Lo_Cubano-Frontal.jpg', '13.00', 0),
(32, 'Almoraima', 50, NULL, '9', 1976, 10, 'Paco_De_Lucia-Almoraima-Frontal.jpg', '13.00', 0),
(33, 'El Mono Espabilado', 50, NULL, '2', 2011, 8, 'pedro_guerra-el_mono_espabilado-Frontal.jpg', '16.00', 0),
(34, 'Algo Para Cantar', 50, NULL, '2', 2002, 7, 'Pereza-Algo_Para_Cantar-Frontal.jpg', '14.00', 0),
(35, 'Actually', 50, NULL, '3', 1987, 8, 'Pet_Shop_Boys-Actually-Frontal.jpg', '15.00', 0),
(36, 'Both Sides of the ', 50, NULL, '2', 1993, 7, 'phil_collins-both_sides_of_the_story_(cd_single)-Frontal.jpg', '13.00', 0),
(37, '8th Rd From The Moon', 49, NULL, '1', 1969, 9, 'Pink_Floyd-8th_Rd_From_The_Moon-Frontal.jpg', '16.00', 0),
(38, 'Burrock N Roll', 50, NULL, '1', 1992, 8, 'Platero_Y_Tu-Burrock_N_Roll-Frontal.jpg', '13.00', 0),
(39, 'Amerika', 50, NULL, '1', 2004, 9, 'Rammstein-Amerika_(Cd_Single)-Frontal.jpg', '14.00', 0),
(40, 'californication', 50, NULL, '1', 1999, 9, 'Red_Hot_Chili_Peppers-Californication-Frontal.jpg', '20.00', 0),
(41, 'Body y Soul', 50, NULL, '2', 1993, 10, 'rick_astley-body_y_soul-Frontal.jpg', '16.00', 0),
(42, 'Be a Boy', 50, NULL, '1', 1999, 7, 'robbie_williams-be_a_boy_(cd_single)-Frontal.jpg', '13.00', 0),
(43, 'Canciones Que Amo', 50, NULL, '9', 1984, 7, 'roberto_carlos-canciones_que_amo-Frontal.jpg', '5.00', 0),
(44, 'Amor Eterno', 50, NULL, '9', 2006, 8, 'Rocio_Durcal-Amor_Eterno-Frontal.jpg', '14.00', 0),
(45, 'Como las Alas al Vi', 50, NULL, '9', 1993, 8, 'Rocio_Jurado-Como_Las_Alas_Al_Viento-Frontal.jpg', '8.00', 0),
(46, 'Frontal', 50, NULL, '2', 2003, 7, 'Rosa-Ahora-Frontal.jpg', '15.00', 0),
(47, 'A Night To Remember', 50, NULL, '2', 1994, 8, 'Roxette-A_Night_To_Remember-Frontal.jpg', '15.00', 0),
(48, 'The Best', 50, NULL, '2', 2006, 9, 'TATU-The_Best-Frontal.jpg', '13.00', 0),
(49, 'Outnumber', 50, NULL, '3', 2004, 10, 'The _Prodigy-Always_Outnumbered_Never_Outgunned-Frontal.jpg', '10.00', 0),
(50, 'Abbey Road', 50, NULL, '2', 1969, 10, 'The_Beatles-Abbey_Road-Frontal.jpg', '11.00', 0),
(51, 'Brotherhood', 50, NULL, '3', 2008, 10, 'The_Chemical_Brothers-Brotherhood-Frontal.jpg', '8.00', 0),
(52, 'Borrowed Heaven', 49, NULL, '2', 2004, 8, 'The_Corrs-Borrowed_Heaven-Frontal.jpg', '19.00', 0),
(53, '4 13 Dream', 50, NULL, '1', 2008, 7, 'The_Cure-4_13_Dream-Frontal.jpg', '13.00', 0),
(54, 'Every Breath You ', 50, NULL, '1', 1983, 8, 'The_Police-Every_Breath_You_Take-Frontal.jpg', '13.00', 0),
(55, 'Jilted Generation', 50, NULL, '3', 1995, 10, 'The_Prodigy-Music_For_The_Jilted_Generation-Frontal.jpg', '13.00', 0),
(56, 'Endless Wire', 50, NULL, '1', 2006, 8, 'The_Who-Endless_Wire-Frontal.jpg', '15.00', 0),
(57, '52 Classic Hits', 49, NULL, '2', 2006, 8, 'Tom_Jones-52_Classic_Hits-Frontal.jpg', '12.00', 0),
(58, 'En Libertad', 50, NULL, '1', 1991, 7, 'Triana-En_Libertad-Frontal.jpg', '13.00', 0),
(59, 'I Look To You', 50, NULL, '2', 2009, 8, 'Whitney_Houston-I_Look_To_You-Frontal.jpg', '12.00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo_pedido`
--

CREATE TABLE IF NOT EXISTS `articulo_pedido` (
  `id_articulo` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_repartidor` int(11) NOT NULL,
  KEY `id_articulo` (`id_articulo`,`id_pedido`),
  KEY `id_pedido` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articulo_pedido`
--

INSERT INTO `articulo_pedido` (`id_articulo`, `id_pedido`, `id_repartidor`) VALUES
(4, 11, 0),
(9, 12, 0),
(31, 14, 0),
(14, 15, 0),
(14, 15, 0),
(14, 15, 0),
(14, 15, 0),
(14, 15, 0),
(29, 16, 0),
(29, 16, 0),
(29, 16, 0),
(29, 16, 0),
(29, 16, 0),
(29, 16, 0),
(29, 16, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `id_autor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `nombre`) VALUES
(1, '50Cents'),
(2, 'ABBA'),
(3, 'ACDC'),
(4, 'Aerosmith'),
(5, 'Alanis Morrisette'),
(6, 'A.Sanz'),
(7, 'AliciaKey'),
(8, 'Aqua'),
(9, 'Avril Lavigne'),
(10, 'David Bisbal'),
(11, 'Depeche Mode'),
(12, 'Tiesto'),
(13, 'DuncanDhu'),
(14, 'Eiffel65'),
(15, 'El Arrebato'),
(16, 'El Barrio'),
(17, 'Eminem'),
(18, 'Estopa'),
(19, 'Evanescence'),
(20, 'Extremoduro'),
(21, 'James Blunt'),
(22, 'James Brown'),
(23, 'Jamiroquei'),
(24, 'Jennifer Lopez'),
(25, 'Jimi Hendrix'),
(26, 'Juanes'),
(27, 'J. Iglesias'),
(28, 'Oasis'),
(29, 'Obk'),
(30, 'Offspring'),
(31, 'Orishas'),
(32, 'Paco de Lucia'),
(33, 'P. Guerra'),
(34, 'Perez'),
(35, 'Pet Shop Boys'),
(36, 'P. Collins'),
(37, 'P. Floyd'),
(38, 'Platero y Tu'),
(39, 'Rammstein'),
(40, 'RHCP'),
(41, 'Rick Astley'),
(42, 'R. Williams'),
(43, 'R. Carlos'),
(44, 'Rocio Durcal'),
(45, 'R. Jurado'),
(46, 'Rosa'),
(47, 'Roxette'),
(48, 'TATU'),
(49, 'Prodigy'),
(50, 'The Beatles'),
(51, 'Chemical Brothers'),
(52, 'The Corrs'),
(53, 'The Cure'),
(54, 'The Police'),
(55, 'Prodigy'),
(56, 'The Who'),
(57, 'Tom Jones'),
(58, 'Triana'),
(59, 'W. Houston');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor_articulo`
--

CREATE TABLE IF NOT EXISTS `autor_articulo` (
  `id_autor` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  KEY `id_autor` (`id_autor`),
  KEY `id_articulo` (`id_articulo`),
  KEY `id_autor_2` (`id_autor`),
  KEY `id_articulo_2` (`id_articulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `autor_articulo`
--

INSERT INTO `autor_articulo` (`id_autor`, `id_articulo`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31),
(32, 32),
(33, 33),
(34, 34),
(35, 35),
(36, 36),
(37, 37),
(38, 38),
(39, 39),
(40, 40),
(41, 41),
(42, 42),
(43, 43),
(44, 44),
(45, 45),
(46, 46),
(47, 47),
(48, 48),
(49, 49),
(50, 50),
(51, 51),
(52, 52),
(53, 53),
(54, 54),
(55, 55),
(56, 56),
(57, 57),
(58, 58),
(59, 59);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(12) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(12) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Rock & Roll'),
(2, 'Pop'),
(3, 'Electronica'),
(4, 'Clasica'),
(5, 'Jazz'),
(6, 'Rap'),
(7, 'Blues'),
(8, 'R&B'),
(9, 'Folclorica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `correo` varchar(40) NOT NULL,
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `precio` decimal(2,0) NOT NULL,
  `localizacion_actual` varchar(100) NOT NULL DEFAULT 'Almacenes centrales, Calle del pez nº3',
  `estado` varchar(50) NOT NULL DEFAULT 'En almacén',
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `correo` (`correo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`correo`, `id_pedido`, `precio`, `localizacion_actual`, `estado`, `fecha`) VALUES
('a@a.com', 11, '15', 'AlmacÃ©n de Madrid', 'En almacÃ©n', '2014-03-20'),
('a@a.com', 12, '13', 'Almacenes centrales', 'En almacÃ©n', '2014-03-20'),
('a@a.com', 14, '13', 'Almacenes centrales', 'En almacÃ©n', '2014-03-18'),
('a@a.com', 15, '60', 'China', 'En envÃ­o', '2014-01-14'),
('a@a.com', 16, '70', 'Almacenes centrales', 'En almacÃ©n', '2014-03-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repartidor`
--

CREATE TABLE IF NOT EXISTS `repartidor` (
  `id_repartidor` int(11) NOT NULL,
  `nombre` varchar(20) CHARACTER SET latin1 NOT NULL,
  `apellidos` varchar(30) CHARACTER SET latin1 NOT NULL,
  `email` varchar(40) CHARACTER SET latin1 NOT NULL,
  `contrasena` int(12) NOT NULL,
  PRIMARY KEY (`id_repartidor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `repartidor`
--

INSERT INTO `repartidor` (`id_repartidor`, `nombre`, `apellidos`, `email`, `contrasena`) VALUES
(0, 'Jaime', 'De la cueva', 'jdcueva@gmail.com', 12345),
(1, 'pep', 'pepito', 'pep@pep.com', 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `correo` varchar(40) NOT NULL,
  `contrasena` varchar(12) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `domicilio` varchar(100) NOT NULL,
  `datosBancarios` varchar(100) NOT NULL,
  PRIMARY KEY (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`correo`, `contrasena`, `nombre`, `apellidos`, `domicilio`, `datosBancarios`) VALUES
('a@a.com', '123', 'Juan', 'Jaja', 'mi casa', '45534563453'),
('pepe@pepe.com', 'pepe', 'Pepe', 'Pepe', 'calle desconocida', '5644578439275');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion_articulo`
--

CREATE TABLE IF NOT EXISTS `valoracion_articulo` (
  `correo` varchar(40) CHARACTER SET utf8 NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `nota` int(2) NOT NULL,
  KEY `correo` (`correo`),
  KEY `id_articulo` (`id_articulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `valoracion_articulo`
--

INSERT INTO `valoracion_articulo` (`correo`, `id_articulo`, `nota`) VALUES
('a@a.com', 2, 9),
('a@a.com', 18, 0),
('a@a.com', 46, 0),
('a@a.com', 18, 10),
('a@a.com', 46, 10),
('a@a.com', 17, 8);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo_pedido`
--
ALTER TABLE `articulo_pedido`
  ADD CONSTRAINT `articulo_pedido_ibfk_1` FOREIGN KEY (`id_articulo`) REFERENCES `articulo` (`id_articulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `articulo_pedido_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `autor_articulo`
--
ALTER TABLE `autor_articulo`
  ADD CONSTRAINT `autor_articulo_ibfk_1` FOREIGN KEY (`id_articulo`) REFERENCES `articulo` (`id_articulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `autor_articulo_ibfk_2` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`correo`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `valoracion_articulo`
--
ALTER TABLE `valoracion_articulo`
  ADD CONSTRAINT `valoracion_articulo_ibfk_2` FOREIGN KEY (`correo`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `valoracion_articulo_ibfk_1` FOREIGN KEY (`id_articulo`) REFERENCES `articulo` (`id_articulo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
