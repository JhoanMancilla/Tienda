-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2021 at 07:45 AM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noanlearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumno`
--

CREATE TABLE `alumno` (
  `id_alumno` int NOT NULL,
  `codigo` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `institucion` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `progreso` double(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `codigo`, `institucion`, `progreso`) VALUES
(4, '1151615', 'UFPS2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `alumno_curso`
--

CREATE TABLE `alumno_curso` (
  `id_alumno` int NOT NULL,
  `id_curso` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumno_ejercicio`
--

CREATE TABLE `alumno_ejercicio` (
  `id_alumno` int NOT NULL,
  `id_ejercicio` int NOT NULL,
  `fecha` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_solucion` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumno_quiz`
--

CREATE TABLE `alumno_quiz` (
  `id_alumno` int NOT NULL,
  `id_quiz` int NOT NULL,
  `fecha` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_solucion` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE `curso` (
  `id_curso` int NOT NULL,
  ` codigo_curso` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ejercicio`
--

CREATE TABLE `ejercicio` (
  `id` int NOT NULL,
  `titulo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_inicio` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `fecha_fin` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `sin_fecha` tinyint(1) DEFAULT NULL,
  `autor` int NOT NULL,
  `tipo_ejercicio` enum('Progreso','Ejercicio de Clase','Tarea') COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `ejercicio`
--

INSERT INTO `ejercicio` (`id`, `titulo`, `descripcion`, `fecha_inicio`, `fecha_fin`, `sin_fecha`, `autor`, `tipo_ejercicio`, `estado`) VALUES
(12, 'Minado de BTC', 'Mina btc prro', '2021-12-11 00:00:00', '2021-12-15 00:00:00', 0, 3, 'Progreso', 0);

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `id` int NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `clave` varchar(225) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo_persona` varchar(15) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `apellido`, `correo`, `clave`, `tipo_persona`) VALUES
(1, 'Juan', 'Perez', 'juanito@gmail.com', 'contrasena', 'Profesor'),
(2, 'Juan2', 'Perez2', 'juanito2@gmail.com', 'contrasena2', 'Profesor'),
(3, 'Juan2', 'Perez2', 'juanito2@gmail.com', 'contrasena2', 'Profesor'),
(4, 'Juan2', 'Perez2', 'juanito2@gmail.com', 'contrasena2', 'Alumno'),
(5, 'Jose', 'Perea', 'correo1@gmail.com', 'clave1', 'Profesor'),
(6, 'Jose', 'Perea', 'correo1@gmail.com', 'clave2', 'Profesor'),
(7, 'Jose', 'Perea', 'correo1@gmail.com', 'clave3', 'Profesor'),
(8, 'Jose', 'Perea', 'correo1@gmail.com', 'clave4', 'Profesor'),
(9, 'Jose', 'Perea', 'correo1@gmail.com', 'clave5', 'Profesor'),
(10, 'Jose', 'Perea', 'correo1@gmail.com', 'clave1', 'Profesor'),
(11, 'Jose', 'Perea', 'correo1@gmail.com', 'clave2', 'Profesor'),
(12, 'Jose', 'Perea', 'correo1@gmail.com', 'clave3', 'Profesor'),
(13, 'Jose', 'Perea', 'correo1@gmail.com', 'clave4', 'Profesor'),
(14, 'Jose', 'Perea', 'correo1@gmail.com', 'clave5', 'Profesor'),
(15, 'Jose', 'Perea', 'correo1@gmail.com', 'clave1', 'Profesor'),
(16, 'Jose', 'Perea', 'correo1@gmail.com', 'clave2', 'Profesor'),
(17, 'Jose', 'Perea', 'correo1@gmail.com', 'clave3', 'Profesor'),
(18, 'Jose', 'Perea', 'correo1@gmail.com', 'clave4', 'Profesor'),
(19, 'Jose', 'Perea', 'correo1@gmail.com', 'clave5', 'Profesor');

-- --------------------------------------------------------

--
-- Table structure for table `profesor`
--

CREATE TABLE `profesor` (
  `id_profesor` int NOT NULL,
  `codigo` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `institucion` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `profesor`
--

INSERT INTO `profesor` (`id_profesor`, `codigo`, `institucion`) VALUES
(3, '1151612', 'UFPS2'),
(5, '1151611', 'UFPS'),
(6, '1151611', 'UFPS'),
(7, '1151611', 'UFPS'),
(8, '1151611', 'UFPS'),
(9, '1151611', 'UFPS'),
(10, '1151611', 'UFPS'),
(11, '1151611', 'UFPS'),
(12, '1151611', 'UFPS'),
(13, '1151611', 'UFPS'),
(14, '1151611', 'UFPS'),
(15, '1151611', 'UFPS'),
(16, '1151611', 'UFPS'),
(17, '1151611', 'UFPS'),
(18, '1151611', 'UFPS'),
(19, '1151611', 'UFPS');

-- --------------------------------------------------------

--
-- Table structure for table `profesor_curso`
--

CREATE TABLE `profesor_curso` (
  `id_profesor` int NOT NULL,
  `id_curso` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id_quiz` int NOT NULL,
  `autor` int NOT NULL,
  `titulo` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `fecha_fin` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id_quiz`, `autor`, `titulo`, `descripcion`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 3, 'Quiz 1', 'Los voy a rajar ptos', '2021-12-11 00:00:00', '2021-12-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `solucion`
--

CREATE TABLE `solucion` (
  `id_solucion` int NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `puntaje` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `solucion_profesor`
--

CREATE TABLE `solucion_profesor` (
  `id_ejercicio` int NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `solucion_quiz`
--

CREATE TABLE `solucion_quiz` (
  `id_quiz` int NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_persona`
--

CREATE TABLE `tipo_persona` (
  `nombre` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `tipo_persona`
--

INSERT INTO `tipo_persona` (`nombre`, `descripcion`) VALUES
('Administrador', 'Administrador de la plataforma.'),
('Alumno', 'Estudiante que pertenece a una institución y usa la plataforma para practicar.'),
('Profesor', 'Docente de alguna institución que usa la plataforma para subir ejercicios y evaluar alumnos.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indexes for table `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indexes for table `alumno_curso`
--
ALTER TABLE `alumno_curso`
  ADD PRIMARY KEY (`id_alumno`,`id_curso`),
  ADD KEY `alumno_curso-curso` (`id_curso`);

--
-- Indexes for table `alumno_ejercicio`
--
ALTER TABLE `alumno_ejercicio`
  ADD PRIMARY KEY (`id_alumno`,`id_ejercicio`,`id_solucion`),
  ADD KEY `alumno_ejercicio-ejercicio` (`id_ejercicio`),
  ADD KEY `alumno_ejercicio-solucion` (`id_solucion`);

--
-- Indexes for table `alumno_quiz`
--
ALTER TABLE `alumno_quiz`
  ADD PRIMARY KEY (`id_alumno`,`id_quiz`,`id_solucion`),
  ADD KEY `alumno_quiz-quiz` (`id_quiz`),
  ADD KEY `alumno_quiz-solucion` (`id_solucion`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indexes for table `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ejercicio_profesor` (`autor`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona-tipo_persona` (`tipo_persona`);

--
-- Indexes for table `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id_profesor`);

--
-- Indexes for table `profesor_curso`
--
ALTER TABLE `profesor_curso`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `profesor_curso-profesor` (`id_profesor`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id_quiz`),
  ADD KEY `quiz_profesor` (`autor`);

--
-- Indexes for table `solucion`
--
ALTER TABLE `solucion`
  ADD PRIMARY KEY (`id_solucion`);

--
-- Indexes for table `solucion_profesor`
--
ALTER TABLE `solucion_profesor`
  ADD PRIMARY KEY (`id_ejercicio`);

--
-- Indexes for table `solucion_quiz`
--
ALTER TABLE `solucion_quiz`
  ADD PRIMARY KEY (`id_quiz`);

--
-- Indexes for table `tipo_persona`
--
ALTER TABLE `tipo_persona`
  ADD PRIMARY KEY (`nombre`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ejercicio`
--
ALTER TABLE `ejercicio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id_quiz` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `solucion`
--
ALTER TABLE `solucion`
  MODIFY `id_solucion` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_persona` FOREIGN KEY (`id_administrador`) REFERENCES `persona` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_persona` FOREIGN KEY (`id_alumno`) REFERENCES `persona` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `alumno_curso`
--
ALTER TABLE `alumno_curso`
  ADD CONSTRAINT `alumno_curso-alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_curso-curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `alumno_ejercicio`
--
ALTER TABLE `alumno_ejercicio`
  ADD CONSTRAINT `alumno_ejercicio-alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ejercicio-ejercicio` FOREIGN KEY (`id_ejercicio`) REFERENCES `ejercicio` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ejercicio-solucion` FOREIGN KEY (`id_solucion`) REFERENCES `solucion` (`id_solucion`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `alumno_quiz`
--
ALTER TABLE `alumno_quiz`
  ADD CONSTRAINT `alumno_quiz-alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_quiz-quiz` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_quiz-solucion` FOREIGN KEY (`id_solucion`) REFERENCES `solucion` (`id_solucion`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD CONSTRAINT `ejercicio_profesor` FOREIGN KEY (`autor`) REFERENCES `profesor` (`id_profesor`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona-tipo_persona` FOREIGN KEY (`tipo_persona`) REFERENCES `tipo_persona` (`nombre`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `profesor_persona` FOREIGN KEY (`id_profesor`) REFERENCES `persona` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `profesor_curso`
--
ALTER TABLE `profesor_curso`
  ADD CONSTRAINT `profesor_curso-curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `profesor_curso-profesor` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id_profesor`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_profesor` FOREIGN KEY (`autor`) REFERENCES `profesor` (`id_profesor`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `solucion_profesor`
--
ALTER TABLE `solucion_profesor`
  ADD CONSTRAINT `solucion_profesor-ejercicio` FOREIGN KEY (`id_ejercicio`) REFERENCES `ejercicio` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `solucion_quiz`
--
ALTER TABLE `solucion_quiz`
  ADD CONSTRAINT `solucion_quiz-quiz` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
