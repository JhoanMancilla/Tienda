CREATE TABLE `persona` (
`id` int(5) NOT NULL AUTO_INCREMENT,
`nombre` varchar(25) NULL,
`apellido` varchar(25) NULL,
`correo` varchar(50) NULL,
`clave` varchar(225) NULL,
`tipo_persona` varchar(15) NOT NULL,
PRIMARY KEY (`id`) 
);
CREATE TABLE `alumno` (
`id_alumno` int(5) NOT NULL,
`codigo` varchar(15) NULL,
`institucion` varchar(25) NULL,
`progreso` double(5,2) NULL,
PRIMARY KEY (`id_alumno`) 
);
CREATE TABLE `profesor` (
`id_profesor` int(5) NOT NULL,
`codigo` varchar(15) NULL,
`institucion` varchar(25) NULL,
PRIMARY KEY (`id_profesor`) 
);
CREATE TABLE `administrador` (
`id_administrador` int(5) NOT NULL,
PRIMARY KEY (`id_administrador`) 
);
CREATE TABLE `curso` (
`id_curso` int(5) NOT NULL,
` codigo_curso` varchar(15) NOT NULL,
`fecha_inicio` date NOT NULL,
`fecha_fin` date NOT NULL,
PRIMARY KEY (`id_curso`) 
);
CREATE TABLE `horario` (
`id` int(5) NOT NULL AUTO_INCREMENT,
`hora_inicio` time NULL,
`hora fin` time NULL,
`Dia` enum('Lunes','Martes','Miercoles','Jueves','Viernes') NULL,
PRIMARY KEY (`id`) 
);
CREATE TABLE `curso_horario` (
`id_curso` varchar(15) NOT NULL,
`id_horario` int(5) NOT NULL,
PRIMARY KEY (`id_curso`, `id_horario`) 
);
CREATE TABLE `profesor_curso` (
`id_profesor` int(5) NOT NULL,
`id_curso` int(5) NOT NULL,
PRIMARY KEY (`id_curso`) 
);
CREATE TABLE `alumno_curso` (
`id_alumno` int(5) NOT NULL,
`id_curso` int(5) NOT NULL,
PRIMARY KEY (`id_alumno`, `id_curso`) 
);
CREATE TABLE `tipo_usuario` (
`nombre` varchar(15) NOT NULL,
`descripcion` varchar(50) NOT NULL,
PRIMARY KEY (`nombre`) 
);
CREATE TABLE `ejercicio` (
`id` int(5) NOT NULL AUTO_INCREMENT,
`titulo` varchar(25) NOT NULL,
`descripcion` varchar(255) NOT NULL,
`fecha_inicio` datetime NULL ON UPDATE CURRENT_TIMESTAMP,
`fecha_fin` datetime NULL ON UPDATE CURRENT_TIMESTAMP,
`sin_fecha` tinyint(1) NULL,
`autor` int(5) NOT NULL,
`tipo_ejercicio` enum('Progreso','Ejercicio de Clase','Tarea') NULL,
`estado` tinyint(1) NULL,
PRIMARY KEY (`id`) 
);
CREATE TABLE `solucion_profesor` (
`id_ejercicio` int(5) NOT NULL,
`descripcion` varchar(255) NULL,
PRIMARY KEY (`id_ejercicio`) 
);
CREATE TABLE `quiz` (
`id_quiz` int(5) NOT NULL AUTO_INCREMENT,
`autor` int(5) NOT NULL,
`titulo` varchar(25) NOT NULL,
`descripcion` varchar(255) NULL,
`fecha_inicio` datetime NULL ON UPDATE CURRENT_TIMESTAMP,
`fecha_fin` datetime NULL ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (`id_quiz`) 
);
CREATE TABLE `solucion_quiz` (
`id_quiz` int(5) NOT NULL,
`descripcion` varchar(255) NOT NULL,
PRIMARY KEY (`id_quiz`) 
);
CREATE TABLE `alumno_quiz` (
`id_alumno` int(5) NOT NULL,
`id_quiz` int(5) NOT NULL,
`fecha` datetime NULL ON UPDATE CURRENT_TIMESTAMP,
`id_solucion` varchar(255) NOT NULL,
PRIMARY KEY (`id_alumno`, `id_quiz`, `id_solucion`) 
);
CREATE TABLE `solucion` (
`id_solucion` int(5) NOT NULL,
`descripcion` varchar(255) NOT NULL,
`puntaje` int(3) NOT NULL,
PRIMARY KEY (`id_solucion`) 
);
CREATE TABLE `alumno_ejercicio` (
`id_alumno` int(5) NOT NULL,
`id_ejercicio` int(5) NOT NULL,
`fecha` datetime NULL ON UPDATE CURRENT_TIMESTAMP,
`id_solucion` int(5) NOT NULL,
PRIMARY KEY (`id_alumno`, `id_ejercicio`, `id_solucion`) 
);

ALTER TABLE `administrador` ADD CONSTRAINT `administrador_persona` FOREIGN KEY (`id_administrador`) REFERENCES `persona` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `alumno` ADD CONSTRAINT `alumno_persona` FOREIGN KEY (`id_alumno`) REFERENCES `persona` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `profesor` ADD CONSTRAINT `profesor_persona` FOREIGN KEY (`id_profesor`) REFERENCES `persona` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `curso_horario` ADD CONSTRAINT `curso_horario-curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (` codigo_curso`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `curso_horario` ADD CONSTRAINT `curso_horario-horario` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `profesor_curso` ADD CONSTRAINT `profesor_curso-profesor` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id_profesor`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `profesor_curso` ADD CONSTRAINT `profesor_curso-curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (` codigo_curso`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `alumno_curso` ADD CONSTRAINT `alumno_curso-alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `alumno_curso` ADD CONSTRAINT `alumno_curso-curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (` codigo_curso`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `persona` ADD CONSTRAINT `persona-tipo_persona` FOREIGN KEY (`tipo_persona`) REFERENCES `tipo_usuario` (`nombre`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `ejercicio` ADD CONSTRAINT `ejercicio_profesor` FOREIGN KEY (`autor`) REFERENCES `profesor` (`id_profesor`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `solucion_profesor` ADD CONSTRAINT `solucion_profesor-ejercicio` FOREIGN KEY (`id_ejercicio`) REFERENCES `ejercicio` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `quiz` ADD CONSTRAINT `quiz_profesor` FOREIGN KEY (`autor`) REFERENCES `profesor` (`id_profesor`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `solucion_quiz` ADD CONSTRAINT `solucion_quiz-quiz` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `alumno_quiz` ADD CONSTRAINT `alumno_quiz-alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `alumno_quiz` ADD CONSTRAINT `alumno_quiz-quiz` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `alumno_quiz` ADD CONSTRAINT `alumno_quiz-solucion` FOREIGN KEY (`id_solucion`) REFERENCES `solucion` (`id_solucion`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `alumno_ejercicio` ADD CONSTRAINT `alumno_ejercicio-alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `alumno_ejercicio` ADD CONSTRAINT `alumno_ejercicio-ejercicio` FOREIGN KEY (`id_ejercicio`) REFERENCES `ejercicio` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `alumno_ejercicio` ADD CONSTRAINT `alumno_ejercicio-solucion` FOREIGN KEY (`id_solucion`) REFERENCES `solucion` (`id_solucion`) ON DELETE RESTRICT ON UPDATE CASCADE;

