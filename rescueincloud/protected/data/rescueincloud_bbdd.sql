-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-05-2014 a las 00:36:10
-- Versión del servidor: 5.5.36
-- Versión de PHP: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rescueincloud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajatexto`
--

CREATE TABLE IF NOT EXISTS `cajatexto` (
  `id_caja_texto` int(3) NOT NULL,
  `tipo` tinyint(2) NOT NULL,
  `contenido` varchar(320) NOT NULL,
  `id_protocolo` int(11) NOT NULL,
  PRIMARY KEY (`id_caja_texto`,`id_protocolo`),
  KEY `fk_CajaTexto_Protocolos` (`id_protocolo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cajatexto`
--

INSERT INTO `cajatexto` (`id_caja_texto`, `tipo`, `contenido`, `id_protocolo`) VALUES
(0, 0, 'Nombre del protocolo', 1),
(1, 1, '¿Una decisión de texto?', 1),
(2, 1, 'una decision de con el número 5', 1),
(3, 0, 'la respuesta al la decision con el id 2, la caja anterior', 1),
(4, 0, 'una respuesta de 25kg', 1),
(5, 0, 'una respuesta de 30 mg de peso', 1),
(6, 0, 'un último texto', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajatexto_hijos`
--

CREATE TABLE IF NOT EXISTS `cajatexto_hijos` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_protocolo` int(11) NOT NULL,
  `id_hijo` int(3) NOT NULL,
  `id_padre` int(3) NOT NULL,
  `relacion` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`,`id_protocolo`),
  KEY `fk_CajaTexto_has_CajaTexto1_CajaTexto1` (`id_protocolo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `cajatexto_hijos`
--

INSERT INTO `cajatexto_hijos` (`id`, `id_protocolo`, `id_hijo`, `id_padre`, `relacion`) VALUES
(1, 1, 1, 0, 2),
(2, 1, 2, 1, 0),
(3, 1, 5, 1, 1),
(4, 1, 3, 2, 0),
(5, 1, 4, 2, 1),
(6, 1, 6, 5, 2),
(7, 1, 6, 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `farmacos_propios`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `farmacos_propios`
--

INSERT INTO `farmacos_propios` (`id_farmaco`, `nombre_farmaco`, `nombre_fabricante`, `presentacion_farmaco`, `tipo_administracion`, `creado_en`, `modificado_en`, `descripcion_farmaco`, `borrado`) VALUES
(1, 'Aspirina', 'Bayer', '500mg', 'comprimidos', '2014-01-13 22:46:18', '0000-00-00 00:00:00', '', 0),
(2, 'Diazepam', 'Bayer', 'sobres', 'oral', '2014-01-13 23:27:03', '0000-00-00 00:00:00', '', 0),
(3, 'Paracetamol', 'Cinfa', 'Comprimidos', 'oral', '2014-01-22 22:07:31', '0000-00-00 00:00:00', '', 0),
(4, 'Gelocatil', 'Bayer', 'Comprimidos', 'oral', '2014-01-22 22:31:51', '0000-00-00 00:00:00', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `farmacos_publicos`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `farmacos_publicos`
--

INSERT INTO `farmacos_publicos` (`id_farmaco`, `nombre_farmaco`, `nombre_fabricante`, `presentacion_farmaco`, `tipo_administracion`, `creado_en`, `modificado_en`, `descripcion_farmaco`, `borrado`) VALUES
(1, 'Aspirina', 'Bayer', '500mg', 'comprimidos', '2014-01-13 22:46:18', '0000-00-00 00:00:00', '', 0),
(2, 'Diazepam', 'Bayer', 'sobres', 'oral', '2014-01-13 23:27:03', '0000-00-00 00:00:00', '', 0),
(3, 'Paracetamol', 'Cinfa', 'Comprimidos', 'oral', '2014-01-22 22:07:31', '0000-00-00 00:00:00', '', 0),
(4, 'Gelocatil', 'Bayer', 'Comprimidos', 'oral', '2014-01-22 22:31:51', '0000-00-00 00:00:00', '', 0),
(5, 'Frenadol', 'Johnson&Johnson', 'Sobres', 'Oral', '2014-03-31 21:32:57', '0000-00-00 00:00:00', '', 0),
(6, 'Lizipaina', 'Boehringer Ingelheim', 'Comprimidos masticables', 'Bucofaringeo', '2014-03-31 22:50:39', '0000-00-00 00:00:00', '', 0),
(7, 'Neobrufen', 'Abbott', 'Comprimidos', 'Oral', '2014-03-31 21:35:45', '0000-00-00 00:00:00', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE IF NOT EXISTS `notas` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_nota` varchar(25) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `nota_creada_en` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nota_modificada_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_nota`,`email_usuario`),
  KEY `notas_ibfk_1` (`email_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id_nota`, `nombre_nota`, `email_usuario`, `descripcion`, `nota_creada_en`, `nota_modificada_en`, `borrado`) VALUES
(1, 'Nota1 de esta sólido', 'ricardocb48@gmail.com', 'Esta es una descripción 1', '2014-05-13 13:07:27', '2014-05-13 13:24:31', 0),
(2, 'Nota2', 'ricardocb48@gmail.com', 'Esta es una descripción 2', '2014-05-13 13:08:24', '2014-05-13 13:08:24', 0),
(3, 'Nota3', 'ricardocb48@gmail.com', 'Esta es una descripción 3', '2014-05-13 13:08:24', '2014-05-13 13:08:24', 0),
(4, 'Nota4', 'ricardocb48@gmail.com', 'Esta es una descripción 4', '2014-05-13 13:08:24', '2014-05-13 13:08:24', 0),
(5, 'Nota5', 'ricardocb48@gmail.com', 'Esta es una descripción 5', '2014-05-13 13:08:24', '2014-05-13 13:08:24', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `protocolos`
--

CREATE TABLE IF NOT EXISTS `protocolos` (
  `id_protocolo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_protocolo` varchar(45) NOT NULL,
  `email_usuario` varchar(45) NOT NULL,
  `codigo_parseado` text NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `actualizado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_protocolo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `protocolos`
--

INSERT INTO `protocolos` (`id_protocolo`, `nombre_protocolo`, `email_usuario`, `codigo_parseado`, `creado_en`, `actualizado_en`) VALUES
(1, 'manejo de la hipotermia accidental severa', 'ricardocb48@gmail.com', '', '2014-05-05 17:52:11', '2014-05-13 13:04:58'),
(2, 'p', 'user@miuser.com', '', '2014-05-13 13:04:58', '2014-05-13 13:04:58');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rel1n_farmacos_propios_usuarios`
--

INSERT INTO `rel1n_farmacos_propios_usuarios` (`email_usuario`, `id_farmaco`, `rel_creada_en`, `rel_actualizada_en`) VALUES
('ale7jandra.89@gmail.com', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `relnm_farmacos_publicos_usuarios`
--

INSERT INTO `relnm_farmacos_publicos_usuarios` (`email_usuario`, `id_farmaco`, `rel_creada_en`, `rel_actualizada_en`) VALUES
('ale7jandra.89@gmail.com', 1, '2013-11-15 15:30:25', '0000-00-00 00:00:00'),
('ale7jandra.89@gmail.com', 2, '2013-11-15 15:30:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `email_usuario` varchar(100) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `genero` tinyint(1) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `centro_trabajo` varchar(100) NOT NULL,
  `usuario_creado_en` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `usuario_actualizado_en` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`email_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email_usuario`, `nombre`, `apellidos`, `genero`, `fecha_nacimiento`, `centro_trabajo`, `usuario_creado_en`, `usuario_actualizado_en`, `borrado`) VALUES
('ale7jandra.89@gmail.com', 'Alejandra', 'González ', 2, '1989-08-03', 'Bayes', '2013-11-17 23:00:00', '0000-00-00 00:00:00', 0),
('ricardocb48@gmail.com', 'Ricardo', 'Champa', 1, '1988-04-04', 'REDK', '2013-11-15 15:02:18', '0000-00-00 00:00:00', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cajatexto`
--
ALTER TABLE `cajatexto`
  ADD CONSTRAINT `fk_CajaTexto_Protocolos` FOREIGN KEY (`id_protocolo`) REFERENCES `protocolos` (`id_protocolo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cajatexto_hijos`
--
ALTER TABLE `cajatexto_hijos`
  ADD CONSTRAINT `fk_CajaTexto_has_CajaTexto1_CajaTexto1` FOREIGN KEY (`id_protocolo`) REFERENCES `protocolos` (`id_protocolo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`email_usuario`) REFERENCES `usuarios` (`email_usuario`);

--
-- Filtros para la tabla `rel1n_farmacos_propios_usuarios`
--
ALTER TABLE `rel1n_farmacos_propios_usuarios`
  ADD CONSTRAINT `rel1M_farmacos_propios_usuarios_ibfk_1` FOREIGN KEY (`email_usuario`) REFERENCES `usuarios` (`email_usuario`);

--
-- Filtros para la tabla `relnm_farmacos_publicos_usuarios`
--
ALTER TABLE `relnm_farmacos_publicos_usuarios`
  ADD CONSTRAINT `relNM_farmacos_publicos_usuarios_ibfk_1` FOREIGN KEY (`email_usuario`) REFERENCES `usuarios` (`email_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
