-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2019 a las 03:54:55
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escuelabd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_clases`
--

CREATE TABLE `alumnos_clases` (
  `Id` int(7) NOT NULL,
  `Id_alumno` int(4) NOT NULL,
  `Id_clase` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos_clases`
--

INSERT INTO `alumnos_clases` (`Id`, `Id_alumno`, `Id_clase`) VALUES
(1, 101, 1),
(2, 102, 3),
(3, 103, 5),
(4, 104, 7),
(5, 105, 9),
(6, 106, 11),
(7, 107, 1),
(8, 108, 3),
(9, 109, 5),
(10, 110, 7),
(11, 111, 9),
(12, 112, 11),
(13, 113, 1),
(14, 114, 3),
(15, 115, 5),
(16, 116, 7),
(17, 117, 9),
(18, 118, 11),
(19, 119, 1),
(20, 120, 3),
(21, 121, 5),
(22, 122, 7),
(23, 123, 9),
(24, 124, 11),
(25, 125, 1),
(26, 126, 3),
(27, 127, 5),
(28, 128, 7),
(29, 129, 9),
(30, 130, 11),
(31, 131, 1),
(32, 132, 3),
(33, 133, 5),
(34, 134, 7),
(35, 135, 9),
(36, 136, 11),
(37, 137, 1),
(38, 138, 3),
(39, 139, 5),
(40, 140, 7),
(41, 141, 9),
(42, 142, 11),
(43, 143, 1),
(44, 144, 3),
(45, 145, 5),
(46, 146, 7),
(47, 147, 9),
(48, 148, 11),
(49, 149, 1),
(50, 150, 3),
(51, 151, 5),
(52, 152, 7),
(53, 153, 9),
(54, 154, 11),
(55, 155, 1),
(56, 156, 3),
(57, 157, 5),
(58, 158, 7),
(59, 159, 9),
(60, 160, 11),
(61, 161, 1),
(62, 162, 3),
(63, 163, 5),
(64, 164, 7),
(65, 165, 9),
(66, 166, 11),
(67, 167, 1),
(68, 168, 3),
(69, 169, 5),
(70, 170, 7),
(71, 171, 9),
(72, 172, 11),
(73, 173, 1),
(74, 174, 3),
(75, 175, 5),
(76, 176, 7),
(77, 177, 9),
(78, 178, 11),
(79, 179, 1),
(80, 180, 3),
(81, 181, 5),
(82, 182, 7),
(83, 183, 9),
(84, 184, 11),
(85, 185, 1),
(86, 186, 3),
(87, 187, 5),
(88, 188, 7),
(89, 189, 9),
(90, 190, 11),
(91, 191, 1),
(92, 192, 3),
(93, 193, 5),
(94, 194, 7),
(95, 195, 9),
(96, 196, 11),
(97, 197, 1),
(98, 198, 3),
(99, 199, 5),
(100, 200, 7),
(101, 201, 9),
(102, 202, 11),
(103, 203, 1),
(104, 204, 3),
(105, 205, 5),
(106, 206, 7),
(107, 207, 9),
(108, 208, 11),
(109, 209, 1),
(110, 210, 3),
(111, 211, 5),
(112, 212, 7),
(113, 213, 9),
(114, 214, 11),
(115, 215, 1),
(116, 216, 3),
(117, 217, 5),
(118, 218, 7),
(119, 219, 9),
(120, 220, 11),
(121, 101, 2),
(122, 102, 4),
(123, 103, 6),
(124, 104, 8),
(125, 105, 10),
(126, 106, 12),
(127, 107, 2),
(128, 108, 4),
(129, 109, 6),
(130, 110, 8),
(131, 111, 10),
(132, 112, 12),
(133, 113, 2),
(134, 114, 4),
(135, 115, 6),
(136, 116, 8),
(137, 117, 10),
(138, 118, 12),
(139, 119, 2),
(140, 120, 4),
(141, 121, 6),
(142, 122, 8),
(143, 123, 10),
(144, 124, 12),
(145, 125, 2),
(146, 126, 4),
(147, 127, 6),
(148, 128, 8),
(149, 129, 10),
(150, 130, 12),
(151, 131, 2),
(152, 132, 4),
(153, 133, 6),
(154, 134, 8),
(155, 135, 10),
(156, 136, 12),
(157, 137, 2),
(158, 138, 4),
(159, 139, 6),
(160, 140, 8),
(161, 141, 10),
(162, 142, 12),
(163, 143, 2),
(164, 144, 4),
(165, 145, 6),
(166, 146, 8),
(167, 147, 10),
(168, 148, 12),
(169, 149, 2),
(170, 150, 4),
(171, 151, 6),
(172, 152, 8),
(173, 153, 10),
(174, 154, 12),
(175, 155, 2),
(176, 156, 4),
(177, 157, 6),
(178, 158, 8),
(179, 159, 10),
(180, 160, 12),
(181, 161, 2),
(182, 162, 4),
(183, 163, 6),
(184, 164, 8),
(185, 165, 10),
(186, 166, 12),
(187, 167, 2),
(188, 168, 4),
(189, 169, 6),
(190, 170, 8),
(191, 171, 10),
(192, 172, 12),
(193, 173, 2),
(194, 174, 4),
(195, 175, 6),
(196, 176, 8),
(197, 177, 10),
(198, 178, 12),
(199, 179, 2),
(200, 180, 4),
(201, 181, 6),
(202, 182, 8),
(203, 183, 10),
(204, 184, 12),
(205, 185, 2),
(206, 186, 4),
(207, 187, 6),
(208, 188, 8),
(209, 189, 10),
(210, 190, 12),
(211, 191, 2),
(212, 192, 4),
(213, 193, 6),
(214, 194, 8),
(215, 195, 10),
(216, 196, 12),
(217, 197, 2),
(218, 198, 4),
(219, 199, 6),
(220, 200, 8),
(221, 201, 10),
(222, 202, 12),
(223, 203, 2),
(224, 204, 4),
(225, 205, 6),
(226, 206, 8),
(227, 207, 10),
(228, 208, 12),
(229, 209, 2),
(230, 210, 4),
(231, 211, 6),
(232, 212, 8),
(233, 213, 10),
(234, 214, 12),
(235, 215, 2),
(236, 216, 4),
(237, 217, 6),
(238, 218, 8),
(239, 219, 10),
(240, 220, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `Id` int(3) NOT NULL,
  `Id_clase` int(3) NOT NULL,
  `Id_alumno` int(4) NOT NULL,
  `Fecha` date NOT NULL,
  `Id_tipo_asistencia` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calles`
--

CREATE TABLE `calles` (
  `Id` int(3) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calles`
--

INSERT INTO `calles` (`Id`, `Nombre`) VALUES
(1, 'El caballo'),
(2, 'Miguel Hidalgo'),
(3, 'Sol');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `Id` int(3) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`Id`, `Nombre`) VALUES
(1, 'Aguascalientes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `Id` int(3) NOT NULL,
  `Id_materia` int(3) NOT NULL,
  `Id_maestro` int(4) NOT NULL,
  `Hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`Id`, `Id_materia`, `Id_maestro`, `Hora`) VALUES
(1, 1, 11, '07:00:00'),
(2, 2, 11, '08:00:00'),
(3, 3, 12, '07:00:00'),
(4, 4, 12, '08:00:00'),
(5, 5, 13, '07:00:00'),
(6, 6, 13, '08:00:00'),
(7, 7, 14, '07:00:00'),
(8, 8, 14, '08:00:00'),
(9, 9, 15, '07:00:00'),
(10, 10, 15, '08:00:00'),
(11, 11, 16, '07:00:00'),
(12, 12, 16, '08:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colonias`
--

CREATE TABLE `colonias` (
  `Id` int(3) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colonias`
--

INSERT INTO `colonias` (`Id`, `Nombre`) VALUES
(1, 'El llano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `isbn` varchar(13) NOT NULL,
  `nom_libro` varchar(100) DEFAULT NULL,
  `fecha_sub` date DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `grado` varchar(10) DEFAULT NULL,
  `ruta` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`isbn`, `nom_libro`, `fecha_sub`, `id_materia`, `grado`, `ruta`) VALUES
('1234567891234', 'español', '2019-11-17', 5, '1', 'files/unik_frente.pdf'),
('7984548754521', 'Desafíos matemáticos 2', '2019-11-17', 4, '2', 'files/a3_rose_cp.pdf'),
('8765417451245', 'Español lecturas 4', '2019-11-17', 7, '4', 'files/internet2016_0.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `Id` int(3) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `Grado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`Id`, `Nombre`, `Descripcion`, `Grado`) VALUES
(1, 'Español 1', 'Introduccion al Abcdarios', 1),
(2, 'Matematicas 1', 'Los numeros', 1),
(3, 'Español 2', 'Introduccion a la lectura', 2),
(4, 'Matematicas 2', 'La sumas', 2),
(5, 'Español 3', 'Comprension lectora', 3),
(6, 'Matematicas 3', 'La resta', 3),
(7, 'Español 4', 'Narracion', 4),
(8, 'Matematicas 4', 'La division', 4),
(9, 'Español 5', 'Oratoria', 5),
(10, 'Matematicas 5', 'La multiplicacion', 5),
(11, 'Español 6', 'Ortografia y gramatica', 6),
(12, 'Matematicas 6', 'Ecuaciones', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `Id` int(4) NOT NULL,
  `Id_alumno` int(4) NOT NULL,
  `Calificacion` double DEFAULT NULL,
  `Id_clase` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_asistencias`
--

CREATE TABLE `tipo_asistencias` (
  `Id` int(1) NOT NULL,
  `Descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_asistencias`
--

INSERT INTO `tipo_asistencias` (`Id`, `Descripcion`) VALUES
(1, 'Asistencia'),
(2, 'Falta'),
(3, 'Justificante'),
(4, 'Retardo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `Id` int(3) NOT NULL,
  `Titulo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`Id`, `Titulo`) VALUES
(1, 'Administrador'),
(2, 'Maestro'),
(3, 'Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(4) NOT NULL,
  `Id_tipo_usuario` int(3) NOT NULL,
  `Nombres` varchar(40) NOT NULL,
  `Apellidos` varchar(40) NOT NULL,
  `Fecha de Nacimiento` date NOT NULL,
  `Situacion de Vigencia` varchar(20) NOT NULL,
  `Clave CURP` varchar(18) NOT NULL,
  `Correo Electronico` varchar(30) NOT NULL,
  `Grado` int(1) DEFAULT NULL,
  `Id_calle` int(3) NOT NULL,
  `Num` varchar(4) NOT NULL,
  `Id_colonia` int(3) NOT NULL,
  `Id_ciudad` int(3) NOT NULL,
  `C.P.` int(5) NOT NULL,
  `Telefono Domicilio` int(15) DEFAULT NULL,
  `Telefono Celular` int(10) DEFAULT NULL,
  `Pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Id_tipo_usuario`, `Nombres`, `Apellidos`, `Fecha de Nacimiento`, `Situacion de Vigencia`, `Clave CURP`, `Correo Electronico`, `Grado`, `Id_calle`, `Num`, `Id_colonia`, `Id_ciudad`, `C.P.`, `Telefono Domicilio`, `Telefono Celular`, `Pass`) VALUES
(1, 1, 'Gilberto', 'Anduaga', '2019-10-01', 'Vigente', 'Gil11111', 'admin@gmail.com', NULL, 1, '102', 1, 1, 111111, 111111, 111111, 'admin'),
(11, 2, 'Jessica', 'Salvidar', '2019-10-01', 'Vigente', 'jessica1111', 'jessica@gmail.com', 1, 1, '203', 1, 1, 11111, 111111, 11111, 'maestro'),
(12, 2, 'Martin', 'Campos', '2019-10-01', 'Vigente', 'Campos1111', 'martin@gmail.com', 2, 2, '21', 1, 1, 111111, 111111, 1111111, 'maestro'),
(13, 2, 'Juan', 'Carlos', '2019-10-01', 'Vigente', 'meño1111', 'meño@gmail.com', 3, 3, '223', 1, 1, 11111, 111111, 111111, 'maestro'),
(14, 2, 'Maestro', '4', '2019-10-01', 'Vigente', '11111', 'maestro@gmail.com', 4, 3, '223', 1, 1, 11111, 111111, 111111, 'maestro'),
(15, 2, 'Maestro', '5', '2019-10-01', 'Vigente', '11111', 'maestro@gmail.com', 5, 3, '223', 1, 1, 11111, 111111, 111111, 'maestro'),
(16, 2, 'Maestro', '6', '2019-10-01', 'Vigente', '11111', 'maestro@gmail.com', 6, 3, '223', 1, 1, 11111, 111111, 111111, 'maestro'),
(101, 3, 'Alumno', '101', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 1, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(102, 3, 'Alumno', '102', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 1, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(103, 3, 'Alumno', '103', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 1, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(104, 3, 'Alumno', '104', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 1, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(105, 3, 'Alumno', '105', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 1, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(106, 3, 'Alumno', '106', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 1, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(107, 3, 'Alumno', '107', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 1, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(108, 3, 'Alumno', '108', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 1, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(109, 3, 'Alumno', '109', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 1, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(110, 3, 'Alumno', '110', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 1, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(111, 3, 'Alumno', '111', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 1, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(112, 3, 'Alumno', '112', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 1, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(113, 3, 'Alumno', '113', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 1, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(114, 3, 'Alumno', '114', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 1, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(115, 3, 'Alumno', '115', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 1, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(116, 3, 'Alumno', '116', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 1, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(117, 3, 'Alumno', '117', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 1, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(118, 3, 'Alumno', '118', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 1, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(119, 3, 'Alumno', '119', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 1, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(120, 3, 'Alumno', '120', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 1, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(121, 3, 'Alumno', '121', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 2, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(122, 3, 'Alumno', '122', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 2, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(123, 3, 'Alumno', '123', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 2, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(124, 3, 'Alumno', '124', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 2, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(125, 3, 'Alumno', '125', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 2, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(126, 3, 'Alumno', '126', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 2, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(127, 3, 'Alumno', '127', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 2, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(128, 3, 'Alumno', '128', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 2, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(129, 3, 'Alumno', '129', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 2, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(130, 3, 'Alumno', '130', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 2, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(131, 3, 'Alumno', '131', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 2, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(132, 3, 'Alumno', '132', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 2, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(133, 3, 'Alumno', '133', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 2, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(134, 3, 'Alumno', '134', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 2, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(135, 3, 'Alumno', '135', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 2, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(136, 3, 'Alumno', '136', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 2, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(137, 3, 'Alumno', '137', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 2, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(138, 3, 'Alumno', '138', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 2, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(139, 3, 'Alumno', '139', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 2, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(140, 3, 'Alumno', '140', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 2, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(141, 3, 'Alumno', '141', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 3, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(142, 3, 'Alumno', '142', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 3, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(143, 3, 'Alumno', '143', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 3, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(144, 3, 'Alumno', '144', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 3, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(145, 3, 'Alumno', '145', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 3, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(146, 3, 'Alumno', '146', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 3, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(147, 3, 'Alumno', '147', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 3, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(148, 3, 'Alumno', '148', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 3, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(149, 3, 'Alumno', '149', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 3, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(150, 3, 'Alumno', '150', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 3, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(151, 3, 'Alumno', '151', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 3, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(152, 3, 'Alumno', '152', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 3, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(153, 3, 'Alumno', '153', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 3, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(154, 3, 'Alumno', '154', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 3, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(155, 3, 'Alumno', '155', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 3, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(156, 3, 'Alumno', '156', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 3, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(157, 3, 'Alumno', '157', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 3, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(158, 3, 'Alumno', '158', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 3, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(159, 3, 'Alumno', '159', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 3, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(160, 3, 'Alumno', '160', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 3, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(161, 3, 'Alumno', '161', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 4, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(162, 3, 'Alumno', '162', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 4, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(163, 3, 'Alumno', '163', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 4, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(164, 3, 'Alumno', '164', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 4, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(165, 3, 'Alumno', '165', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 4, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(166, 3, 'Alumno', '166', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 4, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(167, 3, 'Alumno', '167', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 4, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(168, 3, 'Alumno', '168', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 4, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(169, 3, 'Alumno', '169', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 4, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(170, 3, 'Alumno', '170', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 4, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(171, 3, 'Alumno', '171', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 4, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(172, 3, 'Alumno', '172', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 4, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(173, 3, 'Alumno', '173', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 4, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(174, 3, 'Alumno', '174', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 4, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(175, 3, 'Alumno', '175', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 4, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(176, 3, 'Alumno', '176', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 4, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(177, 3, 'Alumno', '177', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 4, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(178, 3, 'Alumno', '178', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 4, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(179, 3, 'Alumno', '179', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 4, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(180, 3, 'Alumno', '180', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 4, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(181, 3, 'Alumno', '181', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 5, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(182, 3, 'Alumno', '182', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 5, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(183, 3, 'Alumno', '183', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 5, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(184, 3, 'Alumno', '184', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 5, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(185, 3, 'Alumno', '185', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 5, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(186, 3, 'Alumno', '186', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 5, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(187, 3, 'Alumno', '187', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 5, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(188, 3, 'Alumno', '188', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 5, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(189, 3, 'Alumno', '189', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 5, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(190, 3, 'Alumno', '190', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 5, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(191, 3, 'Alumno', '191', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 5, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(192, 3, 'Alumno', '192', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 5, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(193, 3, 'Alumno', '193', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 5, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(194, 3, 'Alumno', '194', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 5, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(195, 3, 'Alumno', '195', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 5, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(196, 3, 'Alumno', '196', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 5, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(197, 3, 'Alumno', '197', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 5, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(198, 3, 'Alumno', '198', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 5, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(199, 3, 'Alumno', '199', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 5, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(200, 3, 'Alumno', '200', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 5, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(201, 3, 'Alumno', '201', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 6, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(202, 3, 'Alumno', '202', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 6, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(203, 3, 'Alumno', '203', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 6, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(204, 3, 'Alumno', '204', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 6, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(205, 3, 'Alumno', '205', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 6, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(206, 3, 'Alumno', '206', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 6, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(207, 3, 'Alumno', '207', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 6, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(208, 3, 'Alumno', '208', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 6, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(209, 3, 'Alumno', '209', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 6, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(210, 3, 'Alumno', '210', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 6, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(211, 3, 'Alumno', '211', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 6, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(212, 3, 'Alumno', '212', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 6, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(213, 3, 'Alumno', '213', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 6, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(214, 3, 'Alumno', '214', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 6, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(215, 3, 'Alumno', '215', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 6, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(216, 3, 'Alumno', '216', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 6, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(217, 3, 'Alumno', '217', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 6, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(218, 3, 'Alumno', '218', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 6, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(219, 3, 'Alumno', '219', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 6, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno'),
(220, 3, 'Alumno', '220', '2019-10-01', 'Vigente', '11111', 'alumno@gmail.com', 6, 3, '223', 1, 1, 11111, 111111, 111111, 'alumno');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos_clases`
--
ALTER TABLE `alumnos_clases`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_usuario` (`Id_alumno`),
  ADD KEY `Id_clase` (`Id_clase`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_clase` (`Id_clase`),
  ADD KEY `Id_alumno` (`Id_alumno`),
  ADD KEY `Id_tipo_asistencia` (`Id_tipo_asistencia`);

--
-- Indices de la tabla `calles`
--
ALTER TABLE `calles`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_materia` (`Id_materia`),
  ADD KEY `Id_maestro` (`Id_maestro`);

--
-- Indices de la tabla `colonias`
--
ALTER TABLE `colonias`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `fk_materia` (`id_materia`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_alumno` (`Id_alumno`),
  ADD KEY `Id_clase` (`Id_clase`);

--
-- Indices de la tabla `tipo_asistencias`
--
ALTER TABLE `tipo_asistencias`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_tipo_usuario` (`Id_tipo_usuario`),
  ADD KEY `Id_calle` (`Id_calle`),
  ADD KEY `Id_colonia` (`Id_colonia`),
  ADD KEY `Id_ciudad` (`Id_ciudad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos_clases`
--
ALTER TABLE `alumnos_clases`
  MODIFY `Id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calles`
--
ALTER TABLE `calles`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `colonias`
--
ALTER TABLE `colonias`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos_clases`
--
ALTER TABLE `alumnos_clases`
  ADD CONSTRAINT `alumnos_clases_ibfk_1` FOREIGN KEY (`Id_clase`) REFERENCES `clases` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumnos_clases_ibfk_2` FOREIGN KEY (`Id_alumno`) REFERENCES `usuarios` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`Id_clase`) REFERENCES `clases` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asistencias_ibfk_2` FOREIGN KEY (`Id_tipo_asistencia`) REFERENCES `tipo_asistencias` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asistencias_ibfk_3` FOREIGN KEY (`Id_alumno`) REFERENCES `usuarios` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `clases_ibfk_1` FOREIGN KEY (`Id_materia`) REFERENCES `materias` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clases_ibfk_2` FOREIGN KEY (`Id_maestro`) REFERENCES `usuarios` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `tareas_ibfk_1` FOREIGN KEY (`Id_alumno`) REFERENCES `usuarios` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tareas_ibfk_2` FOREIGN KEY (`Id_clase`) REFERENCES `clases` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Id_tipo_usuario`) REFERENCES `tipo_usuario` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`Id_calle`) REFERENCES `calles` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`Id_colonia`) REFERENCES `colonias` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_4` FOREIGN KEY (`Id_ciudad`) REFERENCES `ciudades` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
