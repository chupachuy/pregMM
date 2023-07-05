-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-07-2022 a las 17:06:21
-- Versión del servidor: 5.7.21
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ruleta_b`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `EditPregunta`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `EditPregunta` (IN `edt_id_cat` INT, IN `edt_diff` INT, IN `edt_id_preg` INT, IN `edt_nombre_preg` VARCHAR(500), IN `edt_id_resp` INT, IN `edt_respuesta` VARCHAR(500), IN `id_op2` INT, IN `opcion2` VARCHAR(500), IN `id_op3` INT, IN `opcion3` VARCHAR(500))  begin
update preguntas set id_categoria = edt_id_cat, dificultad = edt_diff where id_pregunta = edt_id_preg;
  update preguntas set pregunta = edt_nombre_preg where id_pregunta = edt_id_preg;
    update respuestas set respuesta = edt_respuesta where id_pregunta = edt_id_preg and id_respuesta = edt_id_resp;
      update respuestas set respuesta = opcion2 where id_pregunta = edt_id_preg and id_respuesta = id_op2;
        update respuestas set respuesta = opcion3 where id_pregunta = edt_id_preg and id_respuesta = id_op3;
          end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `batallas`
--

DROP TABLE IF EXISTS `batallas`;
CREATE TABLE IF NOT EXISTS `batallas` (
  `id_batalla` int(11) NOT NULL AUTO_INCREMENT,
  `jugador1` int(11) NOT NULL,
  `jugador2` int(11) NOT NULL,
  `jugadorGanador` int(11) DEFAULT NULL,
  `id_estatusbatalla` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_batalla`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `batallas`
--

INSERT INTO `batallas` (`id_batalla`, `jugador1`, `jugador2`, `jugadorGanador`, `id_estatusbatalla`) VALUES
(1, 1, 6, 6, 2),
(2, 5, 9, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES
(1, 'CODIGO DE ETICA'),
(2, 'POSICIONAMIENTO'),
(3, 'BASICOS DE CALIDAD'),
(4, 'BIOSEGURIDAD'),
(5, 'FILOSOFIA'),
(6, 'LINEAS DE NEGOCIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus_batallas`
--

DROP TABLE IF EXISTS `estatus_batallas`;
CREATE TABLE IF NOT EXISTS `estatus_batallas` (
  `id_estatusbatalla` int(11) NOT NULL AUTO_INCREMENT,
  `estatus_batalla` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_estatusbatalla`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estatus_batallas`
--

INSERT INTO `estatus_batallas` (`id_estatusbatalla`, `estatus_batalla`) VALUES
(1, 'Batalla en progreso'),
(2, 'Batalla terminada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus_jugadores`
--

DROP TABLE IF EXISTS `estatus_jugadores`;
CREATE TABLE IF NOT EXISTS `estatus_jugadores` (
  `id_estatus` int(11) NOT NULL AUTO_INCREMENT,
  `estatus` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_estatus`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estatus_jugadores`
--

INSERT INTO `estatus_jugadores` (`id_estatus`, `estatus`) VALUES
(1, 'Sin sesión'),
(2, 'Buscando partida'),
(3, 'Jugando');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `Puntaje` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `id_turno` int(11) NOT NULL,
  `turno` int(11) NOT NULL,
  `Pts` int(11) NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id_login`, `username`, `password`, `level`, `nombre`, `Puntaje`, `status`, `id_turno`, `turno`, `Pts`) VALUES
(1, 'admin', 'oexl2020', 2, 'OEXL', 0, 0, 0, 0, 0),
(2, 'saul', '28059419', 1, 'Saul León', 0, 0, 0, 0, 0),
(6, 'raul', 'oexl2020', 1, 'Raul Cedillo', 0, 0, 0, 0, 0),
(7, 'alan', 'oexl2020', 1, 'Alan Flores', 0, 0, 0, 0, 0),
(8, 'janely', 'oexl2020', 1, 'Janelly Villanueva', 0, 0, 0, 0, 0),
(9, 'andrea', 'oexl2020', 1, 'Andrea Escoto', 0, 0, 0, 0, 0),
(12, 'user_1', 'bachoco2020', 1, 'Usuario 1', 3, 0, 0, 0, 0),
(13, 'user_2', 'bachoco2020', 1, 'Usuario 2', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_copy`
--

DROP TABLE IF EXISTS `login_copy`;
CREATE TABLE IF NOT EXISTS `login_copy` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `Puntaje` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `id_turno` int(11) NOT NULL,
  `turno` int(11) NOT NULL,
  `id_estatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login_copy`
--

INSERT INTO `login_copy` (`id_login`, `username`, `password`, `level`, `nombre`, `Puntaje`, `status`, `id_turno`, `turno`, `id_estatus`) VALUES
(1, 'admin', 'oexl2020', 2, 'OEXL', 0, 0, 0, 0, 2),
(2, 'saul', '28059419', 1, 'Saul León', 0, 0, 0, 0, 1),
(3, 'developer', '181010', 1, 'Saúl Hernández León', 0, 0, 0, 0, 1),
(5, 'oexl_atd', 'oexl2020', 2, 'ATD', 0, 0, 0, 0, 2),
(6, 'raul', 'oexl2020', 1, 'Raul Cedillo', 0, 0, 0, 0, 2),
(7, 'alan', 'oexl2020', 1, 'Alan Flores', 0, 0, 0, 0, 1),
(8, 'janelly', 'oexl2020', 1, 'Janelly Villanueva', 0, 0, 0, 0, 1),
(9, 'andrea', 'oexl2020', 1, 'Andrea Escoto', 0, 0, 0, 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE IF NOT EXISTS `preguntas` (
  `id_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `pregunta` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `dificultad` int(11) NOT NULL,
  `img` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vio` int(11) NOT NULL,
  PRIMARY KEY (`id_pregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id_pregunta`, `id_categoria`, `pregunta`, `dificultad`, `img`, `vio`) VALUES
(1, 1, 'Cumplir el Código de ética es un compromiso para:', 2, 'img/prop01b.png', 1),
(2, 1, 'Conocer, entender, cumplir y promover que todos cumplan el Código de ética se refiere al ...', 2, 'img/prop01b.png', 1),
(3, 1, '¿Dónde podemos denunciar algo que vaya en contra del Código de ética?', 2, 'img/prop01b.png', 0),
(4, 2, 'Es el lugar que hemos ocupado en la producción de pollo en México ...', 2, 'img/prop01b.png', 1),
(5, 2, 'Se trata de nuestro Sistema Interno de Calidad y Seguridad Alimentaria que, además, se apoya en el programa de calidad internacional SQF.', 2, 'img/prop01b.png', 1),
(6, 2, 'Es un programa global de certificación que garantiza que los alimentos que consumimos no causan daño a nuestra salud.', 2, 'img/prop01b.png', 0),
(7, 3, '¿Quiénes son los responsables del cumplimiento de la calidad?', 2, 'img/prop01b.png', 1),
(8, 3, '¿Cómo se puede prevenir que haya contaminación en nuestros procesos y productos?', 2, 'img/prop01b.png', 1),
(9, 3, 'A qué se refiere el término \"inocuidad\"', 2, 'img/prop01b.png', 1),
(10, 3, 'Son beneficios que brinda la calidad:', 2, 'img/prop01b.png', 1),
(11, 5, 'La Visión de Bachoco es ser la empresa de alimentos multiproteína más importante en ...', 2, 'img/prop01b.png', 1),
(12, 5, 'La Misión representa:', 2, 'img/prop01b.png', 1),
(13, 5, 'Nuestro Valores son:', 2, 'img/prop01b.png', 1),
(14, 6, 'Es la principal línea de negocio de Bachoco:', 2, 'img/prop01b.png', 1),
(15, 6, 'Es el país que consume más huevo, y Bachoco aprovecha esa oportunidad de mercado.', 2, 'img/prop01b.png', 0),
(16, 6, 'Es una característica de Productos de Valor Agregado.', 2, 'img/prop01b.png', 0),
(17, 4, 'Son beneficios que brinda la bioseguridad:', 2, 'img/prop01b.png', 1),
(18, 4, '¿Cuáles son los componentes de un sistema de bioseguridad?', 2, 'img/prop01b.png', 0),
(19, 4, '¿Cuál es la razón principal para desinfectar materiales o vehículos antes de ingresar a incubadoras o granjas?', 2, 'img/prop01b.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premios`
--

DROP TABLE IF EXISTS `premios`;
CREATE TABLE IF NOT EXISTS `premios` (
  `id_premio` int(11) NOT NULL AUTO_INCREMENT,
  `premio` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `dificultad` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id_premio`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `premios`
--

INSERT INTO `premios` (`id_premio`, `premio`, `dificultad`, `stock`) VALUES
(1, 'Memoria USB 16GB', 2, 17),
(2, 'Mouse', 2, 16),
(3, 'Lapicero', 0, 17),
(4, 'Taza', 2, 17),
(5, 'Chocolate', 0, 18),
(6, 'Camiseta', 0, 17),
(7, 'Hub USB', 2, 18),
(8, 'Camiseta del Evento', 0, 13),
(9, 'Teclado', 2, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

DROP TABLE IF EXISTS `respuestas`;
CREATE TABLE IF NOT EXISTS `respuestas` (
  `id_respuesta` int(11) NOT NULL AUTO_INCREMENT,
  `respuesta` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `correcta` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  PRIMARY KEY (`id_respuesta`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id_respuesta`, `respuesta`, `correcta`, `id_pregunta`) VALUES
(1, 'Todos somos responsables para llevarlo a cabo.', 1, 1),
(2, 'Jefes y directivos, ellos ponen el ejemplo.', 0, 1),
(3, 'Operativos, ellos le dan vida a la empresa.', 0, 1),
(5, 'Capítulo 1. Principios generales', 1, 2),
(7, 'Capítulo 3. Disciplina', 0, 2),
(8, 'Capítulo 8. Conflicto de intereses', 0, 2),
(9, 'En el Comité de Auditoría o canal Resguarda.', 1, 3),
(11, 'Con un colaborador de mayor experiencia o al área de reclutamiento.', 0, 3),
(12, 'Al Comité ejecutivo por medio de un correo.', 0, 3),
(13, 'El primer lugar', 1, 4),
(14, 'El sexto lugar.', 0, 4),
(15, 'El tercer lugar.', 0, 4),
(17, 'SICSA', 1, 5),
(19, 'Calidad suprema', 0, 5),
(20, 'Sello TIF', 0, 5),
(21, 'SQF Safe Quality Food', 1, 6),
(22, 'TIF', 0, 6),
(24, 'Sabor del año.', 0, 6),
(25, 'Todos somos responsables.', 1, 7),
(26, 'Tienen mayor responsabilidad los que almacenan y transportan el producto.', 0, 7),
(27, 'Tienen mayor responsabilidad los directores y gerentes de cada área.', 0, 7),
(29, 'Conociendo, aplicando y exigiendo que se cumplan las buenas prácticas pecuarias, de manufactura y de distribución.', 1, 8),
(30, 'Dando cursos de capacitación a jefes y supervisores de centros de operación, y también a proveedores.', 0, 8),
(32, 'Exhibiendo a los responsables del error y retirándolos de la relación laboral.', 0, 8),
(33, 'A los principios, prácticas y medidas de control aplicados a la producción y fabricación de alimentos para garantizar que no causan daños a la salud.', 1, 9),
(35, 'A que haya buena higiene en las instalaciones y en el uniforme o vestimenta de trabajo.', 0, 9),
(36, 'A que los procesos de producción de alimentos sean eficientes y, así, aprovechar lo mejor posible cada una de sus partes.', 0, 9),
(37, 'Mejora y mantiene el uso adecuado de equipos, tiempo e insumos.', 1, 10),
(38, 'Fomenta y provoca un ambiente de respeto entre los colaboradores.', 0, 10),
(40, 'Promueve y demuestra la cultura organizacional en su apartado de principios institucionales.', 0, 10),
(41, 'México y relevante a nivel internacional.', 1, 11),
(42, 'México y toda Latinoamérica.', 0, 11),
(44, 'Todas las regiones de nuestro país.', 0, 11),
(45, 'Nuestra razón de ser.', 1, 12),
(46, 'Lo que somos.', 0, 12),
(47, 'Lo que opinamos.', 0, 12),
(49, 'Integridad, confianza, bien, común, austeridad, innovación, eficiencia y servicio.', 1, 13),
(50, 'Servicio, solidaridad, tolerancia, innovación, confianza y comunicación.', 0, 13),
(52, 'Bien común, eficiencia, respeto, solidaridad y autocrítica.', 0, 13),
(53, 'Pollo.', 1, 14),
(54, 'Res.', 0, 14),
(55, 'Huevo.', 0, 14),
(57, 'México.', 1, 15),
(58, 'Estados Unidos.', 0, 15),
(60, 'Brasil.', 0, 15),
(61, 'Empanizado crujiente.', 1, 16),
(63, 'Producto vivo.', 0, 16),
(64, 'Productos importados.', 0, 16),
(65, 'Aporta mayores ganancias y previene la entrada de enfermedades.', 1, 17),
(67, 'Ayuda a generar más productos de los estimados.', 0, 17),
(68, 'Ayuda a tener mejores condiciones de trabajo.', 0, 17),
(69, 'Las certificaciones de nuestros procesos y la desinfección.', 1, 18),
(70, 'Cercos, buena administración y medicación.', 0, 18),
(71, 'El aislamiento, la infraestructura y los procedimientos.', 0, 18),
(73, 'Reducimos el riesgo de introducir o transmitir microorganismos patógenos.', 1, 19),
(74, 'Ser una empresa reconocida.', 0, 19),
(75, 'Si no lo hacemos, damos una imagen negativa de la empresa a la comunidad.', 0, 19);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_preguntas`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_preguntas`;
CREATE TABLE IF NOT EXISTS `vista_preguntas` (
`pregunta` varchar(300)
,`dificultad` int(11)
,`id_pregunta` int(11)
,`vio` int(11)
,`img` varchar(50)
,`categoria` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_respuestas`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_respuestas`;
CREATE TABLE IF NOT EXISTS `vista_respuestas` (
`id_respuesta` int(11)
,`dificultad` int(11)
,`respuesta` varchar(500)
,`id_pregunta` int(11)
,`pregunta` varchar(300)
,`correcta` int(11)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_preguntas`
--
DROP TABLE IF EXISTS `vista_preguntas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_preguntas`  AS  select `pr`.`pregunta` AS `pregunta`,`pr`.`dificultad` AS `dificultad`,`pr`.`id_pregunta` AS `id_pregunta`,`pr`.`vio` AS `vio`,`pr`.`img` AS `img`,`cat`.`categoria` AS `categoria` from (`preguntas` `pr` join `categoria` `cat` on((`cat`.`id_categoria` = `pr`.`id_categoria`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_respuestas`
--
DROP TABLE IF EXISTS `vista_respuestas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_respuestas`  AS  select `rp`.`id_respuesta` AS `id_respuesta`,`pr`.`dificultad` AS `dificultad`,`rp`.`respuesta` AS `respuesta`,`pr`.`id_pregunta` AS `id_pregunta`,`pr`.`pregunta` AS `pregunta`,`rp`.`correcta` AS `correcta` from (`respuestas` `rp` join `preguntas` `pr` on((`pr`.`id_pregunta` = `rp`.`id_pregunta`))) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
