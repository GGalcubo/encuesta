-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2018 a las 03:51:29
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `encuesta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `idpersonas` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `apellido` varchar(150) DEFAULT NULL,
  `empresa` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `sector` varchar(150) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `idpreguntas` int(11) NOT NULL,
  `pregunta` varchar(500) DEFAULT NULL,
  `tipo_pregunta` varchar(1) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`idpreguntas`, `pregunta`, `tipo_pregunta`, `orden`) VALUES
(1, 'En líneas generales ¿cómo calificarías el servicio de Logos Traslados?', '3', 1),
(2, '¿Cómo calificarías la atención de la mesa de operaciones?', '3', 2),
(3, '¿Cómo calificarías la velocidad de respuesta y la atención del sector de reservas?', '3', 3),
(4, '¿Cómo calificarías la velocidad de respuesta y la atención del sector de reservas en el interior del país?', '3', 4),
(5, '¿Cómo calificarías la velocidad de respuesta al pedido de cotizaciones?', '3', 5),
(6, '¿Cómo calificarías la presencia de nuestros choferes?', '3', 6),
(7, '¿Cómo calificarías la presencia de nuestras unidades?', '3', 7),
(8, '¿Cómo calificarías la puntualidad de nuestros servicio?', '3', 8),
(9, '¿Cómo calificarías nuestra velocidad de respuesta a los problemas que surgen durante los servicios?', '3', 9),
(10, '¿Cómo calificarías nuestros servicios en el interior del país?', '3', 10),
(11, '¿Cómo calificarías nuestro desempeño en comparación a años pasados?', '2', 11),
(12, '¿Cómo calificarías la atención de nuestro sector administrativo?', '3', 12),
(13, '¿Cómo calificarías el tiempo en el que recibís las liquidaciones / facturas?', '2', 13),
(14, '¿Recomendarías los servicios de LOGOS TRASLADOS a un colega?', '2', 14),
(15, '¿Qué mejorarías de nuestros servicios / atención?', '2', 15),
(16, 'Si quisieras hacernos algún comentario, te damos el espacio:', '1', 16),
(17, 'Si te gusta recibir saludos de cumpleaños, compartí con nosotros tu fecha de nacimiento. Para el caso de las mujeres no es obligatorio aclarar el año.', '4', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_fijas`
--

CREATE TABLE `respuestas_fijas` (
  `idrespuestas_fijas` int(11) NOT NULL,
  `pregunta_id` int(11) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respuestas_fijas`
--

INSERT INTO `respuestas_fijas` (`idrespuestas_fijas`, `pregunta_id`, `descripcion`) VALUES
(20, 11, 'Mejor.'),
(21, 11, 'Peor.'),
(22, 11, 'Similar.'),
(23, 11, 'No realicé actividades con Uds. anteriormente.'),
(25, 13, 'Extremadamente puntual.'),
(26, 13, 'Muy puntual.'),
(27, 13, 'Poco puntual.'),
(28, 13, 'Ligeramente puntual.'),
(29, 13, 'Nada puntual.'),
(30, 14, 'Extremadamente probable.'),
(31, 14, 'Muy probable.'),
(32, 14, 'Poco probable.'),
(33, 14, 'Ligeramente probable.'),
(34, 14, 'Nada probable.'),
(35, 15, 'Atención Operativa.'),
(36, 15, 'Vehículos y conductores.'),
(37, 15, 'Puntualidad.'),
(38, 15, 'Nada.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_persona`
--

CREATE TABLE `respuesta_persona` (
  `idrespuesta_persona` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `pregunta_id` int(11) NOT NULL,
  `respuesta_fija_id` int(11) DEFAULT NULL,
  `respuesta_txt` varchar(150) DEFAULT NULL,
  `respuesta_valoracion` int(11) NOT NULL,
  `respuesta_cumple` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`idpersonas`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`idpreguntas`);

--
-- Indices de la tabla `respuestas_fijas`
--
ALTER TABLE `respuestas_fijas`
  ADD PRIMARY KEY (`idrespuestas_fijas`),
  ADD KEY `pregunta_fk_idx` (`pregunta_id`);

--
-- Indices de la tabla `respuesta_persona`
--
ALTER TABLE `respuesta_persona`
  ADD PRIMARY KEY (`idrespuesta_persona`),
  ADD KEY `persona_fk_idx` (`persona_id`),
  ADD KEY `pregunta_fk_idx` (`pregunta_id`),
  ADD KEY `respuesta_fija_fk_idx` (`respuesta_fija_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `idpersonas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `idpreguntas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `respuestas_fijas`
--
ALTER TABLE `respuestas_fijas`
  MODIFY `idrespuestas_fijas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `respuesta_persona`
--
ALTER TABLE `respuesta_persona`
  MODIFY `idrespuesta_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=480;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `respuestas_fijas`
--
ALTER TABLE `respuestas_fijas`
  ADD CONSTRAINT `pregunta_fk` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`idpreguntas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuesta_persona`
--
ALTER TABLE `respuesta_persona`
  ADD CONSTRAINT `persona_fk` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`idpersonas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `preguntas_fk` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`idpreguntas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `respuesta_fija_fk` FOREIGN KEY (`respuesta_fija_id`) REFERENCES `respuestas_fijas` (`idrespuestas_fijas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
