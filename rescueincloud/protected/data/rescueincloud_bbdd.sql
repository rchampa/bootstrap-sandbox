-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-11-2013 a las 22:37:23
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `rescueincloud`
--
-- --------------------------------------------------------

-- ------------------------------------------------------
-- -------------------USUARIOS---------------------------
-- ------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `email_usuario` varchar(100) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `genero` tinyint(1) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `centro_trabajo` varchar(100) NOT NULL,
  `usuario_creado_en` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `usuario_actualizado_en` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`email_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email_usuario`, `dni`, `nombre`, `apellidos`, `genero`, `fecha_nacimiento`, `centro_trabajo`, `usuario_creado_en`, `usuario_actualizado_en`, `borrado`) VALUES
('ale7jandra.89@gmail.com', '09135127X', 'Alejandra', 'González ', 2, '1989-08-03', 'Bayes', '2013-11-18 00:00:00', '0000-00-00 00:00:00', 0),
('ricardocb48@gmail.com', '51716889Ñ', 'Ricardo', 'Champa', 1, '1988-04-04', 'REDK', '2013-11-15 16:02:18', '0000-00-00 00:00:00', 0);





-- ------------------------------------------------------
-- -------------------FARMACOS---------------------------
-- ------------------------------------------------------

--
-- Estructura de tabla para la tabla `farmacos_publicos`
-- Detalle de fármacos disponibles para todos los usuarios.
--

CREATE TABLE IF NOT EXISTS `farmacos_publicos` (
  `id_farmaco` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_farmaco` varchar(100) NOT NULL,
  `nombre_fabricante` varchar(100) NOT NULL,
  `presentacion_farmaco` varchar(100) NOT NULL,
  `tipo_administracion` varchar(100) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modificado_en` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `descripcion_farmaco` varchar(500) NOT NULL,
  `borrado` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_farmaco`),
  UNIQUE KEY `id_farmaco` (`id_farmaco`),
  UNIQUE KEY `nombre_farmaco` (`nombre_farmaco`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--
-- Volcar la base de datos para la tabla `farmacos_publicos`
--

INSERT INTO `farmacos_publicos` (`id_farmaco`, `nombre_farmaco`, `nombre_fabricante`, `presentacion_farmaco`, `tipo_administracion`, `creado_en`, `modificado_en`, `descripcion_farmaco`, `borrado`) VALUES
(1, 'Aspirina', 'Bayer', '500mg', 'comprimidos', '2014-01-13 23:46:18', '0000-00-00 00:00:00', '', 0),
(2, 'Diazepam', 'Bayer', 'sobres', 'oral', '2014-01-14 00:27:03', '0000-00-00 00:00:00', '', 0),
(3, 'Paracetamol', 'Cinfa', 'Comprimidos', 'oral', '2014-01-22 23:07:31', '0000-00-00 00:00:00', '', 0),
(4, 'Gelocatil', 'Bayer', 'Comprimidos', 'oral', '2014-01-22 23:31:51', '0000-00-00 00:00:00', '', 0);


-- ------------------------------------------------------

--
-- Estructura de tabla para la tabla `farmacos_propios`
-- Detalle de fármacos disponibles para cada usuario.
--


CREATE TABLE IF NOT EXISTS `farmacos_propios` (
  `id_farmaco` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_farmaco` varchar(100) NOT NULL,
  `nombre_fabricante` varchar(100) NOT NULL,
  `presentacion_farmaco` varchar(100) NOT NULL,
  `tipo_administracion` varchar(100) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modificado_en` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `descripcion_farmaco` varchar(500) NOT NULL,
  `borrado` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_farmaco`),
  UNIQUE KEY `id_farmaco` (`id_farmaco`),
  UNIQUE KEY `nombre_farmaco` (`nombre_farmaco`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--
-- Volcar la base de datos para la tabla `farmacos_propios`
--




-- --------------------------------------------------------
-- ----------------------NOTAS-----------------------------
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE IF NOT EXISTS `notas` (
  `nombre_nota` varchar(25) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `nombre_protocolo` varchar(25) NOT NULL,
  `descripcion` text NOT NULL,
  `nota_creada_en` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nota_modificada_en` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nombre_nota`,`email_usuario`),
  KEY `email_usuario` (`email_usuario`),
  KEY `nombre_protocolo` (`nombre_protocolo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `notas`
--



-- --------------------------------------------------------
-- ----------------------PROTOCOLOS------------------------
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajatexto`
--

CREATE TABLE IF NOT EXISTS `cajatexto` (
  `idCajaTexto` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  `subTipo` varchar(45) NOT NULL,
  `text` varchar(250) NOT NULL,
  `Protocolos_nombre_protocolo` varchar(45) NOT NULL,
  PRIMARY KEY (`idCajaTexto`,`Protocolos_nombre_protocolo`),
  KEY `fk_CajaTexto_Protocolos` (`Protocolos_nombre_protocolo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Volcado de datos para la tabla `cajatexto`
--

INSERT INTO `cajatexto` (`idCajaTexto`, `tipo`, `subTipo`, `text`, `Protocolos_nombre_protocolo`) VALUES
(1, 'decision', 'numerica', 'nmv 45.7kg ujgu', 'p'),
(2, 'decision', 'numerica', 'jhfv 45 kn', 'p'),
(77, 'decision', 'texto', 'lkndfloaksfnlk lknjvkoan kjfnkl', 'p'),
(78, 'decision', 'texto', 'lkndfloaksfnlk lknjvkoan kjfnkl', 'p'),
(79, 'texto', 'texto', 'primera exploracion', 'manejo de la hipotermia accidental severa'),
(80, 'decision', 'texto', '¿es reactivo?', 'manejo de la hipotermia accidental severa'),
(81, 'decision', 'texto', '¿tiembla?', 'manejo de la hipotermia accidental severa'),
(82, 'texto', 'texto', 'cambiar de ropa mojada', 'manejo de la hipotermia accidental severa'),
(83, 'texto', 'texto', 'recalentamiento activo opcional', 'manejo de la hipotermia accidental severa'),
(84, 'decision', 'texto', '¿lesiones mortales?', 'manejo de la hipotermia accidental severa'),
(85, 'decision', 'texto', '¿respira?', 'manejo de la hipotermia accidental severa'),
(86, 'texto', 'texto', 'control respiracion', 'manejo de la hipotermia accidental severa'),
(90, 'texto', 'texto', 'control lesiones asociadas', 'manejo de la hipotermia accidental severa'),
(91, 'texto', 'texto', 'recalentamiento externo sobre las areas tronc', 'manejo de la hipotermia accidental severa'),
(94, 'texto', 'texto', 'traslado con SVA eficaz hasta hospital con UV', 'manejo de la hipotermia accidental severa'),
(95, 'decision', 'numerica', '¿asistolia pos-asfixia y K mayor de 12mmol/l', 'manejo de la hipotermia accidental severa'),
(96, 'texto', 'texto', 'certificar exito', 'manejo de la hipotermia accidental severa'),
(97, 'texto', 'texto', 'certificar muerte', 'manejo de la hipotermia accidental severa'),
(98, 'decision', 'texto', '¿tiene pulso central?', 'manejo de la hipotermia accidental severa'),
(99, 'texto', 'texto', 'intubar/ventilar', 'manejo de la hipotermia accidental severa'),
(100, 'texto', 'texto', 'sva', 'manejo de la hipotermia accidental severa'),
(102, 'texto', 'numerica', 'volver 3 pasos atrás', 'manejo de la hipotermia accidental severa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajatexto_has_hijo`
--

CREATE TABLE IF NOT EXISTS `cajatexto_has_hijo` (
  `idCajaTextoHijo` int(11) NOT NULL AUTO_INCREMENT,
  `CajaTexto_idCajaTexto` int(11) NOT NULL,
  `CajaTexto_idHijo` int(11) NOT NULL,
  `Relacion` enum('SI','NO') DEFAULT NULL,
  PRIMARY KEY (`idCajaTextoHijo`),
  KEY `fk_CajaTexto_has_CajaTexto1_CajaTexto1` (`CajaTexto_idCajaTexto`),
  KEY `fk_CajaTexto_has_CajaTexto1_CajaTexto2` (`CajaTexto_idHijo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `cajatexto_has_hijo`
--

INSERT INTO `cajatexto_has_hijo` (`idCajaTextoHijo`, `CajaTexto_idCajaTexto`, `CajaTexto_idHijo`, `Relacion`) VALUES
(1, 1, 2, 'SI'),
(6, 2, 77, NULL),
(7, 2, 78, NULL),
(10, 79, 80, NULL),
(11, 80, 81, 'SI'),
(12, 81, 82, 'SI'),
(13, 82, 83, NULL),
(14, 81, 82, 'NO'),
(15, 82, 91, NULL),
(16, 91, 94, NULL),
(17, 94, 95, NULL),
(18, 95, 96, 'SI'),
(19, 80, 84, 'NO'),
(20, 84, 85, 'NO'),
(21, 85, 86, 'SI'),
(22, 86, 90, NULL),
(23, 90, 91, NULL),
(24, 84, 97, 'SI'),
(25, 85, 98, 'NO'),
(26, 98, 99, 'SI'),
(27, 98, 100, 'NO'),
(28, 99, 90, NULL),
(29, 100, 90, NULL),
(30, 95, 102, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajatexto_has_padre`
--

CREATE TABLE IF NOT EXISTS `cajatexto_has_padre` (
  `idCajaTextoPadre` int(11) NOT NULL AUTO_INCREMENT,
  `CajaTexto_idCajaTexto` int(11) NOT NULL,
  `CajaTexto_idCajaPadre` int(11) NOT NULL,
  PRIMARY KEY (`idCajaTextoPadre`),
  KEY `fk_CajaTexto_has_CajaTexto_CajaTexto1` (`CajaTexto_idCajaTexto`),
  KEY `fk_CajaTexto_has_CajaTexto_CajaTexto2` (`CajaTexto_idCajaPadre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Volcado de datos para la tabla `cajatexto_has_padre`
--

INSERT INTO `cajatexto_has_padre` (`idCajaTextoPadre`, `CajaTexto_idCajaTexto`, `CajaTexto_idCajaPadre`) VALUES
(32, 79, 79),
(33, 80, 79),
(34, 81, 80),
(35, 82, 81),
(36, 83, 82),
(37, 91, 82),
(38, 94, 91),
(39, 95, 94),
(40, 96, 95),
(41, 84, 80),
(42, 97, 84),
(43, 85, 84),
(44, 86, 85),
(45, 90, 86),
(46, 98, 85),
(47, 99, 98),
(48, 100, 98),
(49, 102, 95);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `protocolos`
--

CREATE TABLE IF NOT EXISTS `protocolos` (
  `nombre_protocolo` varchar(45) NOT NULL,
  `email_usuario` varchar(45) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`nombre_protocolo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `protocolos`
--

INSERT INTO `protocolos` (`nombre_protocolo`, `email_usuario`, `creado_en`) VALUES
('manejo de la hipotermia accidental severa', '', '2014-03-19 10:01:45'),
('p', 'user@miuser.com', '2012-12-12 11:12:12');



-- --------------------------------------------------------
-- ------------------TABLAS DE RELACION--------------------
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel1n_farmacos_propios_usuarios`
--

CREATE TABLE IF NOT EXISTS `rel1n_farmacos_propios_usuarios` (
  `email_usuario` varchar(100) NOT NULL,
  `id_farmaco` int(11) NOT NULL,
  `rel_creada_en` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rel_actualizada_en` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`email_usuario`,`id_farmaco`),
  KEY `id_farmaco` (`id_farmaco`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `rel1n_farmacos_propios_usuarios`
--
/*
INSERT INTO `rel1n_farmacos_propios_usuarios` (`email_usuario`, `id_farmaco`, `rel_creada_en`, `rel_actualizada_en`) VALUES
('ale7jandra.89@gmail.com', '1', '2013-11-15 16:30:25', '0000-00-00 00:00:00'),
('ale7jandra.89@gmail.com', '2', '2013-11-15 16:30:34', '0000-00-00 00:00:00');
*/

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relnm_farmacos_publicos_usuarios`
--

CREATE TABLE IF NOT EXISTS `relnm_farmacos_publicos_usuarios` (
  `email_usuario` varchar(100) NOT NULL,
  `id_farmaco` int(11) NOT NULL,
  `rel_creada_en` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rel_actualizada_en` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`email_usuario`,`id_farmaco`),
  KEY `id_farmaco` (`id_farmaco`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Volcar la base de datos para la tabla `relnm_farmacos_publicos_usuarios`
--

INSERT INTO `relnm_farmacos_publicos_usuarios` (`email_usuario`, `id_farmaco`, `rel_creada_en`, `rel_actualizada_en`) VALUES
('ale7jandra.89@gmail.com', '1', '2013-11-15 16:30:25', '0000-00-00 00:00:00'),
('ale7jandra.89@gmail.com', '2', '2013-11-15 16:30:34', '0000-00-00 00:00:00');



-- --------------------------------------------------------
-- ---------------------FOREIGN KEY------------------------
-- --------------------------------------------------------


--
-- Filtros para la tabla `relnm_farmacos_publicos_usuarios`
--
ALTER TABLE `relnm_farmacos_publicos_usuarios`
  ADD CONSTRAINT `relNM_farmacos_publicos_usuarios_ibfk_1` FOREIGN KEY (`email_usuario`) REFERENCES `usuarios` (`email_usuario`),
  ADD CONSTRAINT `relNM_farmacos_publicos_usuarios` FOREIGN KEY (`id_farmaco`) REFERENCES `farmacos_publicos` (`id_farmaco`);

--
-- Filtros para la tabla `rel1n_farmacos_propios_usuarios`
--
ALTER TABLE `rel1n_farmacos_propios_usuarios`
  ADD CONSTRAINT `rel1M_farmacos_propios_usuarios_ibfk_1` FOREIGN KEY (`email_usuario`) REFERENCES `usuarios` (`email_usuario`),
  ADD CONSTRAINT `rel1M_farmacos_propios_usuarios` FOREIGN KEY (`id_farmaco`) REFERENCES `farmacos_propios` (`id_farmaco`);
  
--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`email_usuario`) REFERENCES `usuarios` (`email_usuario`),
  ADD CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`nombre_protocolo`) REFERENCES `protocolos` (`nombre_protocolo`);

--
-- Filtros para la tabla `cajatexto`
--
ALTER TABLE `cajatexto`
  ADD CONSTRAINT `fk_CajaTexto_Protocolos` FOREIGN KEY (`Protocolos_nombre_protocolo`) REFERENCES `protocolos` (`nombre_protocolo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cajatexto_has_hijo`
--
ALTER TABLE `cajatexto_has_hijo`
  ADD CONSTRAINT `fk_CajaTexto_has_CajaTexto1_CajaTexto1` FOREIGN KEY (`CajaTexto_idCajaTexto`) REFERENCES `cajatexto` (`idCajaTexto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CajaTexto_has_CajaTexto1_CajaTexto2` FOREIGN KEY (`CajaTexto_idHijo`) REFERENCES `cajatexto` (`idCajaTexto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cajatexto_has_padre`
--
ALTER TABLE `cajatexto_has_padre`
  ADD CONSTRAINT `fk_CajaTexto_has_CajaTexto_CajaTexto1` FOREIGN KEY (`CajaTexto_idCajaTexto`) REFERENCES `cajatexto` (`idCajaTexto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CajaTexto_has_CajaTexto_CajaTexto2` FOREIGN KEY (`CajaTexto_idCajaPadre`) REFERENCES `cajatexto` (`idCajaTexto`) ON DELETE NO ACTION ON UPDATE NO ACTION;




 





/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
