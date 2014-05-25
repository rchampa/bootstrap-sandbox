-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-05-2014 a las 18:13:44
-- Versión del servidor: 5.5.36
-- Versión de PHP: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cajatexto`
--

INSERT INTO `cajatexto` (`id_caja_texto`, `tipo`, `contenido`, `id_protocolo`) VALUES
(0, 0, 'canción de fuego', 13),
(0, 0, 'canción de arena', 14),
(0, 0, 'llal', 15),
(0, 0, 'algo fácil', 16),
(0, 0, '¿cómo falla esto?', 17),
(0, 0, 'canción de fuego', 18),
(0, 0, 'dos', 19),
(0, 0, 'tres', 20),
(0, 0, 'cuatro', 21),
(0, 0, 'seis', 22),
(0, 0, 'canción de arena', 23),
(0, 0, 'prueba Ricardo', 24),
(1, 0, 'palabras con tildes: Lucía', 13),
(1, 0, 'já jaá', 14),
(1, 1, 'pregunta?', 15),
(1, 0, 'facil1', 16),
(1, 0, 'esto falla forque...', 17),
(1, 0, 'palabras con tildes: Lucía', 18),
(1, 0, 'lala', 19),
(1, 0, 'jajajaj', 20),
(1, 0, 'kkkkk', 21),
(1, 0, 'respect the people', 22),
(1, 0, 'já jaá', 23),
(1, 1, 'esta prueba funciona?', 24),
(2, 1, 'potra pregunta', 15),
(2, 0, 'facil2', 16),
(2, 1, 'Rajoy es un inútil?', 17),
(2, 0, 'uno', 18),
(2, 0, 'pedido', 23),
(2, 0, 'si, lo hace', 24),
(3, 0, 'jajajaj?', 15),
(3, 0, 'y edtiableeeeee', 16),
(3, 0, 'Que va...', 17),
(3, 0, 'pero esto funciona bien?', 23),
(3, 1, 'falta probar', 24),
(4, 0, 'pero esto que és?', 15),
(4, 1, 'y qué más?', 17),
(4, 0, 'sip', 23),
(4, 0, 'el qué?', 24),
(5, 1, 'cómo?¿¿?', 15),
(5, 1, 'seguro', 23),
(6, 1, 'como se ve?', 15),
(6, 0, 'pues si', 23),
(7, 1, 'esto funciona?', 15),
(7, 0, 'que va...', 23),
(8, 1, 'si que funciona?', 15),
(9, 0, 'no que va', 15),
(10, 1, 'como que no?', 15),
(11, 1, 'porque noooo', 15),
(12, 0, 'pues nooo', 15),
(13, 0, 'que sí hombre!', 15);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=94 ;

--
-- Volcado de datos para la tabla `cajatexto_hijos`
--

INSERT INTO `cajatexto_hijos` (`id`, `id_protocolo`, `id_hijo`, `id_padre`, `relacion`) VALUES
(29, 13, 0, 0, 0),
(30, 13, 1, 0, 2),
(31, 14, 0, 0, 0),
(32, 14, 1, 0, 2),
(50, 17, 0, 0, 0),
(51, 17, 1, 0, 2),
(52, 17, 2, 1, 2),
(53, 17, 3, 2, 1),
(54, 17, 4, 2, 0),
(55, 18, 1, 0, 2),
(56, 18, 2, 0, 0),
(57, 19, 0, 0, 0),
(58, 19, 1, 0, 2),
(59, 20, 0, 0, 0),
(60, 20, 1, 0, 2),
(61, 21, 0, 0, 0),
(62, 21, 1, 0, 2),
(63, 22, 0, 0, 0),
(64, 22, 1, 0, 2),
(65, 23, 1, 0, 2),
(66, 23, 2, 0, 0),
(67, 23, 3, 0, 2),
(68, 23, 4, 3, 2),
(69, 23, 5, 4, 2),
(70, 23, 6, 5, 0),
(71, 23, 7, 5, 1),
(72, 24, 0, 0, 0),
(73, 24, 1, 0, 2),
(74, 24, 2, 1, 0),
(75, 24, 3, 1, 1),
(76, 24, 4, 3, 1),
(77, 16, 1, 0, 2),
(78, 16, 2, 1, 2),
(79, 16, 3, 2, 2),
(80, 15, 1, 0, 2),
(81, 15, 2, 1, 0),
(82, 15, 3, 1, 1),
(83, 15, 4, 2, 0),
(84, 15, 5, 2, 1),
(85, 15, 6, 4, 2),
(86, 15, 7, 6, 0),
(87, 15, 8, 7, 0),
(88, 15, 9, 8, 1),
(89, 15, 10, 9, 2),
(90, 15, 11, 10, 1),
(91, 15, 12, 11, 1),
(92, 15, 13, 11, 0),
(93, 15, 13, 12, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10000 ;

--
-- Volcado de datos para la tabla `farmacos_propios`
--

/*INSERT INTO `farmacos_propios` (`id_farmaco`, `nombre_farmaco`, `nombre_fabricante`, `presentacion_farmaco`, `tipo_administracion`, `creado_en`, `modificado_en`, `descripcion_farmaco`, `borrado`) VALUES
(10001, 'prueba', 'canción', 'de una vez y la niñera', 'de una vez y la niñera', '2014-05-22 22:19:28', '0000-00-00 00:00:00', 'pues algo con tildes, canción.\r\n\r\nAlgo con ñ: niño.', 0);*/

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id_nota`, `nombre_nota`, `email_usuario`, `descripcion`, `nota_creada_en`, `nota_modificada_en`, `borrado`) VALUES
(1, 'Nota1 de esta sólido', 'ricardocb48@gmail.com', 'Esta es una descripción 1', '2014-05-13 13:07:27', '2014-05-13 13:24:31', 0),
(2, 'Nota2', 'ricardocb48@gmail.com', 'Esta es una descripción 2', '2014-05-13 13:08:24', '2014-05-13 13:08:24', 0),
(3, 'Nota3', 'ricardocb48@gmail.com', 'Esta es una descripción 3', '2014-05-13 13:08:24', '2014-05-13 13:08:24', 0),
(4, 'Nota4', 'ricardocb48@gmail.com', 'Esta es una descripción 4', '2014-05-13 13:08:24', '2014-05-13 13:08:24', 0),
(5, 'Nota5', 'ricardocb48@gmail.com', 'Esta es una descripción 5', '2014-05-13 13:08:24', '2014-05-13 13:08:24', 0),
(6, 'Canción de fuego', 'ricardocb48@gmail.com', 'pequeña prueba', '0000-00-00 00:00:00', '2014-05-22 21:05:25', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `protocolos`
--

CREATE TABLE IF NOT EXISTS `protocolos` (
  `id_protocolo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_protocolo` varchar(45) NOT NULL,
  `email_usuario` varchar(45) NOT NULL,
  `codigo_parseado` text NOT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  `creado_en` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `actualizado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_protocolo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `protocolos`
--

INSERT INTO `protocolos` (`id_protocolo`, `nombre_protocolo`, `email_usuario`, `codigo_parseado`, `creado_en`, `actualizado_en`) VALUES
(1, 'manejo de la hipotermia accidental severa', 'ricardocb48@gmail.com', '', '2014-05-05 17:52:11', '2014-05-13 13:04:58'),
(13, 'canción de fuego', 'ricardocb48@gmail.com', '1=>operation: palabras con tildes: Lucía\r\nst=>start: canción de fuego\r\n\r\nst->1\r\n', '2014-05-22 21:43:55', '2014-05-22 21:43:55'),
(14, 'canción de arena', 'ricardocb48@gmail.com', '1=>operation: já jaá\r\nst=>start: canción de arena\r\n\r\nst->1\r\n', '2014-05-22 21:48:19', '2014-05-22 21:48:19'),
(15, 'llal', 'ricardocb48@gmail.com', '13=>operation: que sí hombre!\r\n12=>operation: pues nooo\r\ncond11=>condition: porque noooo\r\ncond10=>condition: como que no?\r\n9=>operation: no que va\r\ncond8=>condition: si que funciona?\r\ncond7=>condition: esto funciona?\r\ncond6=>condition: como se ve?\r\ncond5=>condition: cómo?¿¿?\r\n4=>operation: pero esto que és?\r\n3=>operation: jajajaj?\r\ncond2=>condition: potra pregunta\r\ncond1=>condition: pregunta?\r\nst=>start: llal\r\n\r\nst->cond1\r\ncond1(yes, right)->cond2\r\ncond1(no)->3\r\ncond2(yes, right)->4\r\ncond2(no)->cond5\r\n4->cond6\r\ncond6(yes, right)->cond7\r\ncond7(yes, right)->cond8\r\ncond8(no)->9\r\n9->cond10\r\ncond10(no)->cond11\r\ncond11(no)->12\r\ncond11(yes, right)->13\r\n12->13\r\n', '2014-05-24 18:04:13', '2014-05-25 11:37:12'),
(16, 'algo fácil', 'ricardocb48@gmail.com', '3=>operation: y edtiableeeeee\r\n2=>operation: facil2\r\n1=>operation: facil1\r\nst=>start: algo fácil\r\n\r\nst->1\r\n1->2\r\n2->3\r\n', '2014-05-24 18:06:04', '2014-05-25 11:20:06'),
(17, '¿cómo falla esto?', 'ricardocb48@gmail.com', 'cond4=>condition: y qué más?\r\n3=>operation: Que va...\r\ncond2=>condition: Rajoy es un inútil?\r\n1=>operation: esto falla forque...\r\nst=>start: ¿cómo falla esto?\r\n\r\nst->1\r\n1->cond2\r\ncond2(no)->3\r\ncond2(yes, right)->cond4\r\n', '2014-05-24 18:11:38', '2014-05-24 18:11:38'),
(18, 'canción de fuego', 'ricardocb48@gmail.com', 'st=>start: uno\r\n\r\nst->', '2014-05-25 08:57:54', '2014-05-25 08:57:54'),
(19, 'dos', 'ricardocb48@gmail.com', '1=>operation: lala\r\nst=>start: dos\r\n\r\nst->1\r\n', '2014-05-25 08:58:26', '2014-05-25 08:58:26'),
(20, 'tres', 'ricardocb48@gmail.com', '1=>operation: jajajaj\r\nst=>start: tres\r\n\r\nst->1\r\n', '2014-05-25 08:58:44', '2014-05-25 08:58:44'),
(21, 'cuatro', 'ricardocb48@gmail.com', '1=>operation: kkkkk\r\nst=>start: cuatro\r\n\r\nst->1\r\n', '2014-05-25 08:59:02', '2014-05-25 08:59:02'),
(22, 'seis', 'ricardocb48@gmail.com', '1=>operation: respect the people\r\nst=>start: seis\r\n\r\nst->1\r\n', '2014-05-25 08:59:20', '2014-05-25 08:59:20'),
(23, 'canción de arena', 'ricardocb48@gmail.com', '7=>operation: que va...\r\n6=>operation: pues si\r\ncond5=>condition: seguro\r\n4=>operation: sip\r\n3=>operation: pero esto funciona bien?\r\nst=>start: pedido\r\n\r\nst->3\r\n3->4\r\n4->cond5\r\ncond5(yes, right)->6\r\ncond5(no)->7\r\n', '2014-05-25 09:35:33', '2014-05-25 09:35:33'),
(24, 'prueba Ricardo', 'ricardocb48@gmail.com', '4=>operation: el qué?\r\ncond3=>condition: falta probar\r\n2=>operation: si, lo hace\r\ncond1=>condition: esta prueba funciona?\r\nst=>start: prueba Ricardo\r\n\r\nst->cond1\r\ncond1(yes, right)->2\r\ncond1(no)->cond3\r\ncond3(no)->4\r\n', '2014-05-25 09:37:52', '2014-05-25 09:37:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel1n_farmacos_propios_usuarios`
--

CREATE TABLE IF NOT EXISTS `rel1n_farmacos_propios_usuarios` (
  `email_usuario` varchar(100) NOT NULL,
  `id_farmaco` int(11) NOT NULL,
  `rel_creada_en` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rel_actualizada_en` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`email_usuario`,`id_farmaco`),
  KEY `id_farmaco` (`id_farmaco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rel1n_farmacos_propios_usuarios`
--

/*INSERT INTO `rel1n_farmacos_propios_usuarios` (`email_usuario`, `id_farmaco`, `rel_creada_en`, `rel_actualizada_en`) VALUES
('ale7jandra.89@gmail.com', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('ricardocb48@gmail.com', 5, '2014-05-22 22:19:28', '0000-00-00 00:00:00');*/

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relnm_farmacos_publicos_usuarios`
--

CREATE TABLE IF NOT EXISTS `relnm_farmacos_publicos_usuarios` (
  `email_usuario` varchar(100) NOT NULL,
  `id_farmaco` int(11) NOT NULL,
  `rel_creada_en` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rel_actualizada_en` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`email_usuario`,`id_farmaco`),
  KEY `id_farmaco` (`id_farmaco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
