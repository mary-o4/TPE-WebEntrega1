-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2022 a las 19:21:14
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_tpe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Biografia` longtext DEFAULT NULL,
  `Imagen` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`Id`, `Nombre`, `Biografia`, `Imagen`) VALUES
(1, 'Fiodor Dostoyevsky', 'dsfghjhgfdsf', NULL),
(2, 'Ana Frank', '', ''),
(3, 'Edgar Allan Poe', NULL, NULL),
(4, 'Stephen King', NULL, NULL),
(6, 'Franz Kafka', NULL, NULL),
(7, 'Gabriel García Márquez', NULL, NULL),
(8, 'Jorge Luis Borges', NULL, NULL),
(14, 'Agatha Christie', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `ID` int(11) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `Genero` varchar(50) DEFAULT NULL,
  `Fecha_de_Publicacion` varchar(50) DEFAULT NULL,
  `Editorial` varchar(50) DEFAULT NULL,
  `ISBN` bigint(11) DEFAULT NULL,
  `Sinopsis` longtext DEFAULT NULL,
  `Imagen` varchar(500) DEFAULT NULL,
  `ID_autor_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`ID`, `Titulo`, `Genero`, `Fecha_de_Publicacion`, `Editorial`, `ISBN`, `Sinopsis`, `Imagen`, `ID_autor_FK`) VALUES
(3, 'Crimen y Castigo', 'novela', '1866', 'Alianza', 9789873952036, 'hola', NULL, 1),
(4, 'Diario de Ana Frank', 'Autobiografia', '25 de junio de 1947', 'Contact', 9789878304151, 'En los relatos, se cuenta la historia y vida de Frank como adolescente y los dos años en que permaneció oculta junto a su familia de origen judío de los nazis en Ámsterdam, en plena Segunda Guerra Mun', 'images/634771078d837.jpg', 2),
(6, 'Los crímenes de la calle Morgue', 'Policial', '1841', ' Edaf', 9786071667991, ' Se produce el bárbaro asesinato de dos mujeres, madre e hija, en un apartamento de una populosa calle de París. Las primeras investigaciones no dan resultado alguno, evidenciándose la impotencia de l', '', 3),
(7, 'El Aleph ', 'Ficción', '1949', 'Punto de Encuentro', 9789875666481, 'El Aleph como cuento conforma una trilogía de relatos junto a El Zahir y La escritura del dios, cada uno de los cuales centra su atención en un elemento microcósmico, una suerte de referencia panteíst', 'images/63476fe192f80.jpg', 8),
(8, 'xdcfvgbn', 'sdfgh', '234', 'cfvgbhnjm', 3456, '', 'xdcfvgbhn', 1),
(9, 'nwkfiniaweñ NVMOwe', 'asetyjsn', '234', 'dfgh', 34567, 'sdfghjkmnhbgvfcd', '<sdrrgftfhyju', 7),
(10, 'detectives', 'suspenso', '1935', 'sdfghjk', 12345678, 'dfrgthjkjhngbfvdsadfrgh', 'sdfghjk', 14),
(13, 'cumbres borrascosas', 'ddfghyjuki', '123', 'dfghjk', 234567, 'fedrtyfhujhggcfdxzsadfgc', 'dfghjuk', 4),
(17, 'El gato Negro', 'Horror', '1881', 'cat', 2345654321234, 'Un joven matrimonio lleva una vida hogareña apacible en compañía de varios animales domésticos, entre ellos un misterioso gato negro. Todo cambia cuando el marido empieza a dejarse arrastrar por la bebida. El alcohol le vuelve irascible y en uno de sus accesos de furia acaba con la vida del animal.', 'images/6347622d0a0ac.jpg', 1),
(18, 'Ficciones', 'Cuento', '1945', 'Cuspide', 34567654323456, 'Ficciones es lun libro de cuentos de Jorge Luis Borges. Se divide en dos partes: El jardín de los senderos que se bifurcan y Artificios. Como casi todas las historias de Borges, trata temas como el tiempo, el infinito, mundos ficticios, realidades alternativas, reseñas de autores o libros inexistentes, entre otros.', 'images/634764271a691.jpg', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`, `nombre`) VALUES
(1, 'admin@web2.com', '$2a$12$bbKZOzqNnZSx76v.z.GJX.6/XSPGkYImW7I5v0h9IvEImKZwQvwma', 'Marito');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_autor_FK` (`ID_autor_FK`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`ID_autor_FK`) REFERENCES `autor` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
