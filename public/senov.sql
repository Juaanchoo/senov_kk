-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-10-2018 a las 22:45:32
-- Versión del servidor: 5.7.21-log
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `senov`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

DROP TABLE IF EXISTS `auditoria`;
CREATE TABLE IF NOT EXISTS `auditoria` (
  `id_auditoria` int(11) NOT NULL AUTO_INCREMENT,
  `fk_documento` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `accion` varchar(50) NOT NULL,
  `id_afectado` int(11) NOT NULL,
  `comentarios` mediumtext NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_auditoria`),
  KEY `fk_documento` (`fk_documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competencias`
--

DROP TABLE IF EXISTS `competencias`;
CREATE TABLE IF NOT EXISTS `competencias` (
  `id_competencia` int(11) NOT NULL AUTO_INCREMENT,
  `competencia` mediumtext NOT NULL,
  `fk_id_programa` int(11) NOT NULL,
  `trimestre_diurno` varchar(5) NOT NULL,
  `trimestre_especial` varchar(5) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_competencia`),
  KEY `fk_id_programa` (`fk_id_programa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `competencias`
--

INSERT INTO `competencias` (`id_competencia`, `competencia`, `fk_id_programa`, `trimestre_diurno`, `trimestre_especial`, `estado`) VALUES
(1, 'Produce Textos en ingles', 1, '1', '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_novedad`
--

DROP TABLE IF EXISTS `estado_novedad`;
CREATE TABLE IF NOT EXISTS `estado_novedad` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado_novedad`
--

INSERT INTO `estado_novedad` (`id_estado`, `estado`) VALUES
(1, 'En tramite'),
(2, 'Aprobado'),
(3, 'No Aprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas`
--

DROP TABLE IF EXISTS `fichas`;
CREATE TABLE IF NOT EXISTS `fichas` (
  `codigo_ficha` int(11) NOT NULL,
  `fk_id_sede` int(5) NOT NULL,
  `fk_id_jornada` int(11) NOT NULL,
  `fk_id_modalidad` int(11) NOT NULL,
  `fk_id_programa_formacion` int(11) NOT NULL,
  `fk_id_proyecto` int(11) NOT NULL,
  `trimestre_formacion` int(11) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`codigo_ficha`),
  KEY `fk_id_sede` (`fk_id_sede`,`fk_id_jornada`,`fk_id_modalidad`,`fk_id_programa_formacion`),
  KEY `fk_id_modalidad` (`fk_id_modalidad`),
  KEY `fk_id_programa_formacion` (`fk_id_programa_formacion`),
  KEY `fk_id_jornada` (`fk_id_jornada`),
  KEY `fk_id_proyecto` (`fk_id_proyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fichas`
--

INSERT INTO `fichas` (`codigo_ficha`, `fk_id_sede`, `fk_id_jornada`, `fk_id_modalidad`, `fk_id_programa_formacion`, `fk_id_proyecto`, `trimestre_formacion`, `estado`) VALUES
(1, 3, 3, 1, 1, 4, 5, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilitado`
--

DROP TABLE IF EXISTS `habilitado`;
CREATE TABLE IF NOT EXISTS `habilitado` (
  `documento` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada`
--

DROP TABLE IF EXISTS `jornada`;
CREATE TABLE IF NOT EXISTS `jornada` (
  `id_jornada` int(11) NOT NULL AUTO_INCREMENT,
  `jornada` varchar(50) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_jornada`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jornada`
--

INSERT INTO `jornada` (`id_jornada`, `jornada`, `estado`) VALUES
(1, 'Diurna', '1'),
(2, 'Nocturna', '1'),
(3, 'Fines de Semana', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidad`
--

DROP TABLE IF EXISTS `modalidad`;
CREATE TABLE IF NOT EXISTS `modalidad` (
  `id_modalidad` int(11) NOT NULL AUTO_INCREMENT,
  `modalidad` varchar(50) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_modalidad`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modalidad`
--

INSERT INTO `modalidad` (`id_modalidad`, `modalidad`, `estado`) VALUES
(1, 'Presencial', '1'),
(2, 'Virtual', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades`
--

DROP TABLE IF EXISTS `novedades`;
CREATE TABLE IF NOT EXISTS `novedades` (
  `fk_id_tipo_documento` int(11) NOT NULL,
  `id_novedad` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `fk_id_ficha` int(11) NOT NULL,
  `fk_id_tipo_novedad` int(11) NOT NULL,
  `acta_novedad` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `fk_id_estado` int(11) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_novedad`),
  KEY `fk_id_tipo_documento` (`fk_id_tipo_documento`),
  KEY `fk_id_ficha` (`fk_id_ficha`,`fk_id_tipo_novedad`,`fk_id_estado`),
  KEY `fk_id_estado` (`fk_id_estado`),
  KEY `fk_id_tipo_novedad` (`fk_id_tipo_novedad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_cargo`
--

DROP TABLE IF EXISTS `permiso_cargo`;
CREATE TABLE IF NOT EXISTS `permiso_cargo` (
  `id_permiso` int(5) NOT NULL AUTO_INCREMENT,
  `fk_id_cargo` int(5) NOT NULL,
  `fk_documento` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_permiso`),
  KEY `fk_documento` (`fk_id_cargo`),
  KEY `fk_documento_2` (`fk_documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_formacion`
--

DROP TABLE IF EXISTS `programa_formacion`;
CREATE TABLE IF NOT EXISTS `programa_formacion` (
  `id_programa_formacion` int(11) NOT NULL AUTO_INCREMENT,
  `programa_formacion` varchar(100) NOT NULL,
  `fk_id_tipo_formacion` int(11) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_programa_formacion`),
  KEY `fk_id_tipo_formacion` (`fk_id_tipo_formacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `programa_formacion`
--

INSERT INTO `programa_formacion` (`id_programa_formacion`, `programa_formacion`, `fk_id_tipo_formacion`, `estado`) VALUES
(1, 'Análisis y Desarrollo de Sistemas de Información', 1, '1'),
(2, 'Programación de Software', 2, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

DROP TABLE IF EXISTS `proyecto`;
CREATE TABLE IF NOT EXISTS `proyecto` (
  `id_proyecto` int(11) NOT NULL AUTO_INCREMENT,
  `fase_proyecto` varchar(255) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_proyecto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id_proyecto`, `fase_proyecto`, `estado`) VALUES
(1, 'Análisis', '1'),
(2, 'Planeación', '1'),
(3, 'Ejecución', '1'),
(4, 'Evaluación', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados_aprendizaje`
--

DROP TABLE IF EXISTS `resultados_aprendizaje`;
CREATE TABLE IF NOT EXISTS `resultados_aprendizaje` (
  `id_resultado_aprendizaje` int(11) NOT NULL AUTO_INCREMENT,
  `resultado_aprendizaje` mediumtext NOT NULL,
  `fk_id_competencia` int(11) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_resultado_aprendizaje`),
  KEY `fk_id_competencia` (`fk_id_competencia`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `resultados_aprendizaje`
--

INSERT INTO `resultados_aprendizaje` (`id_resultado_aprendizaje`, `resultado_aprendizaje`, `fk_id_competencia`, `estado`) VALUES
(1, 'Aprender ingles vato v:', 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

DROP TABLE IF EXISTS `sede`;
CREATE TABLE IF NOT EXISTS `sede` (
  `id_sede` int(5) NOT NULL AUTO_INCREMENT,
  `sede` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_sede`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`id_sede`, `sede`, `estado`) VALUES
(1, 'Colombia', '1'),
(2, 'Ricaurte', '1'),
(3, 'Complejo Sur', '1'),
(4, 'Álamos', '1'),
(5, 'Restrepo', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_acta`
--

DROP TABLE IF EXISTS `tipo_acta`;
CREATE TABLE IF NOT EXISTS `tipo_acta` (
  `id_formato` int(11) NOT NULL AUTO_INCREMENT,
  `formato` varchar(100) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_formato`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_acta`
--

INSERT INTO `tipo_acta` (`id_formato`, `formato`, `estado`) VALUES
(1, 'ACTA ACADÉMICO APLAZAMIENTO 2018.docx', '1'),
(2, 'ACTA CAMBIO DE JORNADA.docx', '1'),
(3, 'ACTA DESERCION.docx', '1'),
(4, 'ACTA DE REINTEGRO 2018.docx', '1'),
(5, 'CONDICIONAMIENTO MATRICULA.docx', '1'),
(6, 'ACTA ACADÉMICO RETIRO VOLUNTARIO 2018.docx', '1'),
(7, 'ACTO ACADÉMICO CANCELACIÓN DE MATRICULA POR DESERCIÓN.docx', '1'),
(8, 'ACTA TRASLADO.docx', '1'),
(9, 'ACTA CAMBIO DE SEDE.docx', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cargo`
--

DROP TABLE IF EXISTS `tipo_cargo`;
CREATE TABLE IF NOT EXISTS `tipo_cargo` (
  `id_cargo` int(5) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_cargo`
--

INSERT INTO `tipo_cargo` (`id_cargo`, `cargo`, `estado`) VALUES
(1, 'Administrador', '1'),
(2, 'Apoyo Administrativo', '1'),
(3, 'Usuario', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

DROP TABLE IF EXISTS `tipo_documento`;
CREATE TABLE IF NOT EXISTS `tipo_documento` (
  `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_documento` varchar(50) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_tipo_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id_tipo_documento`, `tipo_documento`, `estado`) VALUES
(1, 'Cédula de Ciudadanía', '1'),
(2, 'Tarjeta de Identidad', '1'),
(3, 'Cédula de Extranjería', '1'),
(4, 'Pasaporte', '1'),
(5, 'Número ciego SENA', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_formacion`
--

DROP TABLE IF EXISTS `tipo_formacion`;
CREATE TABLE IF NOT EXISTS `tipo_formacion` (
  `id_tipo_formacion` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_formacion` varchar(50) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_tipo_formacion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_formacion`
--

INSERT INTO `tipo_formacion` (`id_tipo_formacion`, `tipo_formacion`, `estado`) VALUES
(1, 'Tecnólogo', '1'),
(2, 'Técnico', '1'),
(3, 'Especialización', '1'),
(4, 'Complementaria', '1'),
(5, 'Curso Corto', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_novedad`
--

DROP TABLE IF EXISTS `tipo_novedad`;
CREATE TABLE IF NOT EXISTS `tipo_novedad` (
  `id_novedad` int(11) NOT NULL AUTO_INCREMENT,
  `novedad` varchar(80) NOT NULL,
  `fk_id_tipo_acta` int(11) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_novedad`),
  KEY `fk_id_tipo_acta` (`fk_id_tipo_acta`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_novedad`
--

INSERT INTO `tipo_novedad` (`id_novedad`, `novedad`, `fk_id_tipo_acta`, `estado`) VALUES
(1, 'Aplazamiento', 1, '1'),
(2, 'Cambio de jornada', 2, '1'),
(3, 'Deserción', 3, '1'),
(4, 'Reintegro', 4, '1'),
(5, 'Condicionamiento de matricula', 5, '1'),
(6, 'Retiro voluntario', 6, '1'),
(7, 'Cancelación de matricula', 7, '1'),
(8, 'Traslado', 8, '1'),
(9, 'Cambio de sede', 9, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_admin`
--

DROP TABLE IF EXISTS `usuarios_admin`;
CREATE TABLE IF NOT EXISTS `usuarios_admin` (
  `fk_id_tipo_documento` int(11) NOT NULL,
  `documento` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  `intentos` int(11) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`documento`),
  KEY `fk_id_tipo_documento` (`fk_id_tipo_documento`),
  KEY `documento` (`documento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD CONSTRAINT `auditoria_ibfk_1` FOREIGN KEY (`fk_documento`) REFERENCES `usuarios_admin` (`documento`);

--
-- Filtros para la tabla `competencias`
--
ALTER TABLE `competencias`
  ADD CONSTRAINT `competencias_ibfk_1` FOREIGN KEY (`fk_id_programa`) REFERENCES `programa_formacion` (`id_programa_formacion`);

--
-- Filtros para la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD CONSTRAINT `fichas_ibfk_1` FOREIGN KEY (`fk_id_modalidad`) REFERENCES `modalidad` (`id_modalidad`),
  ADD CONSTRAINT `fichas_ibfk_2` FOREIGN KEY (`fk_id_programa_formacion`) REFERENCES `programa_formacion` (`id_programa_formacion`),
  ADD CONSTRAINT `fichas_ibfk_3` FOREIGN KEY (`fk_id_jornada`) REFERENCES `jornada` (`id_jornada`),
  ADD CONSTRAINT `fichas_ibfk_4` FOREIGN KEY (`fk_id_sede`) REFERENCES `sede` (`id_sede`),
  ADD CONSTRAINT `fichas_ibfk_5` FOREIGN KEY (`fk_id_proyecto`) REFERENCES `proyecto` (`id_proyecto`);

--
-- Filtros para la tabla `novedades`
--
ALTER TABLE `novedades`
  ADD CONSTRAINT `novedades_ibfk_1` FOREIGN KEY (`fk_id_estado`) REFERENCES `estado_novedad` (`id_estado`),
  ADD CONSTRAINT `novedades_ibfk_3` FOREIGN KEY (`fk_id_tipo_novedad`) REFERENCES `tipo_novedad` (`id_novedad`),
  ADD CONSTRAINT `novedades_ibfk_4` FOREIGN KEY (`fk_id_ficha`) REFERENCES `fichas` (`codigo_ficha`),
  ADD CONSTRAINT `novedades_ibfk_5` FOREIGN KEY (`fk_id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`);

--
-- Filtros para la tabla `permiso_cargo`
--
ALTER TABLE `permiso_cargo`
  ADD CONSTRAINT `permiso_cargo_ibfk_1` FOREIGN KEY (`fk_id_cargo`) REFERENCES `tipo_cargo` (`id_cargo`),
  ADD CONSTRAINT `permiso_cargo_ibfk_2` FOREIGN KEY (`fk_documento`) REFERENCES `usuarios_admin` (`documento`);

--
-- Filtros para la tabla `programa_formacion`
--
ALTER TABLE `programa_formacion`
  ADD CONSTRAINT `programa_formacion_ibfk_1` FOREIGN KEY (`fk_id_tipo_formacion`) REFERENCES `tipo_formacion` (`id_tipo_formacion`);

--
-- Filtros para la tabla `resultados_aprendizaje`
--
ALTER TABLE `resultados_aprendizaje`
  ADD CONSTRAINT `resultados_aprendizaje_ibfk_1` FOREIGN KEY (`fk_id_competencia`) REFERENCES `competencias` (`id_competencia`);

--
-- Filtros para la tabla `tipo_novedad`
--
ALTER TABLE `tipo_novedad`
  ADD CONSTRAINT `tipo_novedad_ibfk_1` FOREIGN KEY (`fk_id_tipo_acta`) REFERENCES `tipo_acta` (`id_formato`);

--
-- Filtros para la tabla `usuarios_admin`
--
ALTER TABLE `usuarios_admin`
  ADD CONSTRAINT `usuarios_admin_ibfk_1` FOREIGN KEY (`fk_id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`),
  ADD CONSTRAINT `usuarios_admin_ibfk_2` FOREIGN KEY (`documento`) REFERENCES `habilitado` (`documento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
