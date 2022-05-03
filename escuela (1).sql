-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2022 a las 22:47:07
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `ID` int(11) NOT NULL,
  `nombre_consulta` varchar(30) NOT NULL,
  `Consulta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`ID`, `nombre_consulta`, `Consulta`) VALUES
(1, 'Listado Materias-Profesor', 'SELECT ma.id AS id, nombre_materia,nombre_semestre, CONCAT(nombre,\" \",a_materno,\" \",a_paterno) AS nombre, creditos, vigencia FROM     materia ma JOIN profesor pro ON(ma.id_prof=pro.ID) JOIN semestre sem ON (ma.id_sem=sem.ID)'),
(2, 'Actualizar materia', 'SELECT ma.id AS idMateria, nombre_materia, id_sem,nombre_semestre,id_prof CONCAT(nombre,\" \",a_materno,\" \",a_paterno) AS nombreProfesor, creditos, vigencia, proposito FROM\r\nmateria ma JOIN profesor pro ON(ma.id_prof=pro.ID) JOIN semestre sem ON (ma.id_sem=sem.ID) WHERE ma.id = 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `ID` int(11) NOT NULL,
  `nombre_materia` varchar(30) NOT NULL,
  `id_sem` int(11) NOT NULL,
  `id_prof` int(11) NOT NULL,
  `creditos` float NOT NULL,
  `vigencia` date NOT NULL,
  `Proposito` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`ID`, `nombre_materia`, `id_sem`, `id_prof`, `creditos`, `vigencia`, `Proposito`) VALUES
(0, 'Tecnologias de Desarrollo web', 4, 1, 7.5, '2022-08-17', ''),
(1, 'Tecnologias de Desarrollo web', 4, 1, 7.5, '2022-08-17', 'Desarrolla aplicaciones con base en las tecnologías HTML, XML, Java, JavaScript, AJAX, un framework Javascript y conexión a base de datos'),
(2, 'Analisis de imagenes', 7, 2, 7.5, '2022-08-01', 'El estudiante evalua varios algoritmios de analisis de imagenes digitales atreves de los dominios espacal, morfologico, y de frecuencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `a_paterno` varchar(40) NOT NULL,
  `a_materno` varchar(40) NOT NULL,
  `num_empleado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`ID`, `nombre`, `a_paterno`, `a_materno`, `num_empleado`) VALUES
(1, 'Efrain', 'Arredondo', 'Morales', '121156'),
(2, 'Rosendo', 'Vazquez', 'Rodriguez', '134578');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestre`
--

CREATE TABLE `semestre` (
  `ID` int(11) NOT NULL,
  `nombre_semestre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `semestre`
--

INSERT INTO `semestre` (`ID`, `nombre_semestre`) VALUES
(1, 'Primer Semstre'),
(2, 'Segundo Semstre'),
(3, 'Tercer Semstre'),
(4, 'CuartoSemstre'),
(5, 'Quinto Semstre'),
(6, 'Sexto Semstre'),
(7, 'Septimo Semstre'),
(8, 'Octavo Semstre'),
(9, 'Noveno Semstre'),
(10, 'Decimo Semstre');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `semestre`
--
ALTER TABLE `semestre`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
