-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2020 a las 23:57:39
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ssu`
--
CREATE DATABASE IF NOT EXISTS `ssu` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ssu`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

DROP TABLE IF EXISTS `actividades`;
CREATE TABLE `actividades` (
  `id` int(4) NOT NULL,
  `fk_proyecto` int(4) NOT NULL,
  `actividad` varchar(50) NOT NULL,
  `horas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `fk_proyecto`, `actividad`, `horas`) VALUES
(1, 1, 'Armar los equipos a utilizar', 1.5),
(2, 1, 'Protegerse de los rayos del sol UV', 0.3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargados`
--

DROP TABLE IF EXISTS `encargados`;
CREATE TABLE `encargados` (
  `id` int(11) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `fk_proyecto` int(5) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `telefonooficina` int(11) NOT NULL,
  `telefonomovil` int(11) NOT NULL,
  `funcion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `encargados`
--

INSERT INTO `encargados` (`id`, `cedula`, `fk_proyecto`, `nombre`, `apellido`, `correo`, `telefonooficina`, `telefonomovil`, `funcion`) VALUES
(1, '', 1, 'Belen', 'Bonilla', 'belenbonilla@utp.ac.pa', 2412312, 2342342, 'Responsable'),
(2, '', 1, 'Amarilis', 'Alvarado', 'amarilisalvarado@utp.ac.pa', 213123, 8973443, 'Supervisor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultades`
--

DROP TABLE IF EXISTS `facultades`;
CREATE TABLE `facultades` (
  `id` int(4) NOT NULL,
  `fk_proyecto` int(4) NOT NULL,
  `facultad` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facultades`
--

INSERT INTO `facultades` (`id`, `fk_proyecto`, `facultad`) VALUES
(1, 1, 'Industrial'),
(2, 1, 'Eléctrica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones`
--

DROP TABLE IF EXISTS `funciones`;
CREATE TABLE `funciones` (
  `id` int(4) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `funciones`
--

INSERT INTO `funciones` (`id`, `categoria`, `nombre`, `imagen`, `direccion`) VALUES
(1, 'Proyectos', 'Registrar proyecto', 'media/registrodeproyecto.jpg', 'registro.html'),
(2, 'Proyectos', 'Listado de proyectos', 'media/listadeproyectos.jpg', 'listado.php'),
(3, 'Cuentas', 'Crear usuario', 'media/agregarusuario.png', 'otrasfuncionalidades.php'),
(5, 'Configuracion', 'Subir brillo', 'media/random.png', 'otrasfuncionalidades.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes`
--

DROP TABLE IF EXISTS `participantes`;
CREATE TABLE `participantes` (
  `id` int(4) NOT NULL,
  `fk_proyecto` int(4) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `correoutp` varchar(50) NOT NULL,
  `movil` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `participantes`
--

INSERT INTO `participantes` (`id`, `fk_proyecto`, `cedula`, `nombre`, `apellido`, `correoutp`, `movil`) VALUES
(1, 1, '88888888', 'Sergio', 'Arauz', 'sergioarauz@utp.ac.pa', 1231232),
(2, 1, '8-768-88', 'Juan', 'Huerta', 'juanhuerta@utp.ac.pa', 1245532),
(3, 1, '', 'Sergio', 'Flores', 'sergioflores@utp.ac.pa', 12123434);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

DROP TABLE IF EXISTS `proyectos`;
CREATE TABLE `proyectos` (
  `id` int(4) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `nivel` varchar(30) NOT NULL,
  `clasificacion` varchar(50) NOT NULL,
  `categoria` varchar(75) NOT NULL,
  `modalidad` varchar(30) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccionimg` varchar(100) NOT NULL,
  `fecha` date DEFAULT NULL,
  `proponente` varchar(30) NOT NULL,
  `objetivo` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `lugar` varchar(30) NOT NULL,
  `descripcionlugar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `tipo`, `nivel`, `clasificacion`, `categoria`, `modalidad`, `nombre`, `direccionimg`, `fecha`, `proponente`, `objetivo`, `descripcion`, `lugar`, `descripcionlugar`) VALUES
(1, 'Actividad', 'Voluntariado', 'Medio ambiente', 'Limpieza de playas', 'Grupal', 'Limpieza de la playa de costa del este', 'media/proyectos/limpiezadeplayasce.jpg', '2020-11-03', 'Ernesto Solís', 'Dejar la playa limpia', 'Los equipos los proporcionara la empresa x.', 'Costa del Este', 'Por el este de la ciudad'),
(2, 'Actividad', 'Voluntariado', 'Medio ambiente', 'Limpieza de playas', 'Grupal', 'Limpieza de la playa de Veracruz', 'media/proyectos/lpveracruz.jpg', NULL, '', '', '', '', ''),
(3, 'Actividad', 'Voluntariado', 'Medio ambiente', 'Limpieza de ríos', 'Grupal', 'Limpieza de río Matías Hernández', 'media/proyectos/lrmatiashernandez.jpg', NULL, '', '', '', '', ''),
(4, 'Actividad', 'Servicio Social', 'Medio ambiente', 'Reforestación', 'Grupal', 'Reforestación en el área del canal', 'media/proyectos/reforestacioncanal.jpg', NULL, '', '', '', '', ''),
(5, 'Producto', 'Voluntariado', 'Desarrollo tecnológico', 'Respirador mecánico', 'Grupal', 'Desarrollo y construcción de un respirador mecánico', 'media/proyectos/respiradormecautp.jpg', NULL, '', '', '', '', ''),
(6, 'Producto', 'Voluntariado', 'Desarrollo de productos', 'Fertilizante para arboles', 'Grupal', 'Creación del fertilizante', 'media/proyectos/fertilizanteutp.jpg', NULL, '', '', '', '', ''),
(7, 'Actividad', 'Servicio Social', 'Caridad', 'Asistencia a la tercera edad', 'Grupal', 'Servir y ayudar el hogar \"la paz\"', 'media/proyectos/caridadlapaz.jpg', NULL, '', '', '', '', ''),
(8, 'Actividad', 'Voluntariado', 'Caridad', 'Asistencia a enfermos', 'Grupal', 'Compartir con los niños en FANLYC', 'media/proyectos/caridadfanlyc.jpg', NULL, '', '', '', '', ''),
(9, 'Actividad', 'Voluntariado', 'Caridad', 'Asistencia a damnificados', 'Grupal', 'Transportar, organizar y repartir víveres afectados en Chiriquí.', 'media/proyectos/damnificadoschirqui.jpg', NULL, '', '', '', '', ''),
(10, 'Actividad', 'Servicio Social', 'Caridad', 'Asistencia a la tercera edad', 'Grupal', 'Servir y ayudar el hogar \"Teresa de Calcuta\"', 'media/proyectos/caridadteresadecalculta.jpg', NULL, '', '', '', '', ''),
(11, 'Actividad', 'Voluntariado', 'Caridad', 'Asistencia a enfermos', 'Grupal', 'Compartir con las personas en el oncológico', 'media/proyectos/caridadoncologico.jpg', NULL, '', '', '', '', ''),
(12, 'Actividad', 'Voluntariado', 'Caridad', 'Asistencia a damnificados', 'Grupal', 'Transportar, organizar y repartir víveres afectados en Ngäbe Bugle', 'media/proyectos/damnificadosngabe.jpg', NULL, '', '', '', '', ''),
(13, 'Producto', 'Voluntariado', 'Donaciones', 'Donación de víveres', 'Individual', 'Víveres para damnificados en Chiriquí, Bocas del Toro y Ngäbe bugle', 'media/proyectos/donaciondamni.jpg', NULL, '', '', '', '', ''),
(14, 'Producto', 'Voluntariado', 'Donaciones', 'Donación de ropa', 'Individual', 'Víveres para personas con alta necesidad', 'media/proyectos/ropagente.jpg', NULL, '', '', '', '', ''),
(15, 'Actividad', 'Servicio Social', 'Limpieza urbana', 'Limpieza de avenidas', 'Grupal', 'Limpieza de la calzada de amador', 'media/proyectos/calzadaamador.jpg', NULL, '', '', '', '', ''),
(16, 'Actividad', 'Voluntariado', 'Limpieza urbana', 'Limpieza de avenidas', 'Grupal', 'Limpieza de la cinta costera', 'media/proyectos/limpiezacintacostera.jpg', NULL, '', '', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_actividades_proyectos` (`fk_proyecto`);

--
-- Indices de la tabla `encargados`
--
ALTER TABLE `encargados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_encargados_proyectos` (`fk_proyecto`);

--
-- Indices de la tabla `facultades`
--
ALTER TABLE `facultades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_facultades_proyectos` (`fk_proyecto`);

--
-- Indices de la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_participantes_proyectos` (`fk_proyecto`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `encargados`
--
ALTER TABLE `encargados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `facultades`
--
ALTER TABLE `facultades`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `funciones`
--
ALTER TABLE `funciones`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `participantes`
--
ALTER TABLE `participantes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `fk_actividades_proyectos` FOREIGN KEY (`fk_proyecto`) REFERENCES `proyectos` (`id`);

--
-- Filtros para la tabla `encargados`
--
ALTER TABLE `encargados`
  ADD CONSTRAINT `fk_encargados_proyectos` FOREIGN KEY (`fk_proyecto`) REFERENCES `proyectos` (`id`);

--
-- Filtros para la tabla `facultades`
--
ALTER TABLE `facultades`
  ADD CONSTRAINT `fk_facultades_proyectos` FOREIGN KEY (`fk_proyecto`) REFERENCES `proyectos` (`id`);

--
-- Filtros para la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD CONSTRAINT `fk_participantes_proyectos` FOREIGN KEY (`fk_proyecto`) REFERENCES `proyectos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
