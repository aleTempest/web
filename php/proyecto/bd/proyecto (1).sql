-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 01, 2024 at 06:12 AM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyecto`
--

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id_career` int NOT NULL,
  `career_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id_career`, `career_name`) VALUES
(1, 'Licenciatura en Administración y Gestión de Pequeñas y Medianas Empresas'),
(2, 'Ingeniería en Tecnologías de la Información'),
(3, 'Ingeniería en Mecatrónica'),
(4, 'Ingeniería en Tecnologías de Manufactura'),
(5, 'Ingeniería en Sistemas Automotrices'),
(6, 'Licenciatura en Comercio Internacional y Aduanas'),
(7, 'Maestría en Ingeniería'),
(8, 'Maestría Energías Renovables');

-- --------------------------------------------------------

--
-- Stand-in structure for view `consulting_report`
-- (See below for the actual view)
--
CREATE TABLE `consulting_report` (
`career_name` text
,`observations` text
,`student_name` text
,`tutor_name` text
);

-- --------------------------------------------------------

--
-- Table structure for table `consulting_sessions`
--

CREATE TABLE `consulting_sessions` (
  `id_consulting` int NOT NULL,
  `id_career` int NOT NULL,
  `id_subject` int NOT NULL,
  `id_student` int NOT NULL,
  `id_tutor` int NOT NULL,
  `observations` text,
  `tutoring_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `consulting_sessions_view`
-- (See below for the actual view)
--
CREATE TABLE `consulting_sessions_view` (
`career_name` text
,`id` int
,`id_career` int
,`id_student` int
,`id_subject` int
,`id_tutor` int
,`observations` text
,`student_name` text
,`subject_name` text
,`tutor_name` text
,`tutoring_date` date
);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id_student` int NOT NULL,
  `id_career` int NOT NULL,
  `id_tutor` int NOT NULL,
  `student_name` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id_student`, `id_career`, `id_tutor`, `student_name`, `email`) VALUES
(1, 2, 1, 'juanito', 'juanito@gmail.com'),
(2, 2, 1, 'juanito2', 'juanito2@gmail.com'),
(3, 2, 1, 'juanito2', 'juanito2@gmail.com'),
(4, 3, 2, 'juanito3', 'juanito3@gmail.com'),
(5, 3, 2, 'juanito4', 'juanito4@gmail.com'),
(6, 2, 1, 'juanito', 'juanito@gmail.com'),
(7, 2, 1, 'juanito2', 'juanito2@gmail.com'),
(8, 2, 1, 'juanito2', 'juanito2@gmail.com'),
(9, 3, 2, 'juanito3', 'juanito3@gmail.com'),
(10, 3, 2, 'juanito4', 'juanito4@gmail.com');

-- --------------------------------------------------------

--
-- Stand-in structure for view `students_report`
-- (See below for the actual view)
--
CREATE TABLE `students_report` (
`career_name` text
,`student_email` text
,`student_name` text
,`tutor_name` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `students_tutors_view`
-- (See below for the actual view)
--
CREATE TABLE `students_tutors_view` (
`career_name` text
,`id_career` int
,`id_student` int
,`id_tutor` int
,`student_email` text
,`student_name` text
,`tutor_name` text
);

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

CREATE TABLE `student_subject` (
  `id` int NOT NULL,
  `id_student` int NOT NULL,
  `id_subject` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_subject_career_view`
-- (See below for the actual view)
--
CREATE TABLE `student_subject_career_view` (
`career_name` text
,`id` int
,`id_career` int
,`id_student` int
,`id_subject` int
,`id_tutor` int
,`student_email` text
,`student_name` text
,`subject_name` text
,`tutor_name` text
);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id_subject` int NOT NULL,
  `id_career` int NOT NULL,
  `subject_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id_subject`, `id_career`, `subject_name`) VALUES
(1, 1, 'Desarrollo Humano y Valores'),
(2, 1, 'Introducción a la Economía'),
(3, 1, 'P.E. Fundamentos de Administración'),
(4, 1, 'P.E. Introducción Mercadotecniaa'),
(5, 1, 'P.E. Matemáticas para la Comercialización'),
(6, 1, 'P.E. Metodología de la Investigación'),
(7, 1, 'P.E. Contabilidad financiera'),
(8, 1, 'P.E. Economía Internacional'),
(9, 1, 'P.E. Geografía Económica'),
(10, 1, 'P.E. Mercadotecnia Internacional'),
(11, 1, 'P.E. Sistema Financiero Nacional e Internacional'),
(12, 1, 'PE habilidades Organizacionales'),
(13, 2, 'Diseño de Interfaces'),
(14, 2, 'Gestión del Desarrollo de Software'),
(15, 2, 'Sistemas Inteligentes'),
(16, 2, 'Tecnologías de Virtualización'),
(17, 2, 'Tecnologías y Aplicaciones en Internet'),
(18, 2, 'Administración de proyectos de Tecnologías de la Información'),
(19, 2, 'Base de Datos'),
(20, 2, 'Escalamiento de redes'),
(21, 2, 'Etica Profesional'),
(22, 2, 'Física para Ingeniería'),
(23, 2, 'Fundamentos de Programación Orientada a Objetos'),
(24, 2, 'Matemáticas para Ingeniería I'),
(25, 1, 'Desarrollo Humano y Valores'),
(26, 1, 'Introducción a la Economía'),
(27, 1, 'P.E. Fundamentos de Administración'),
(28, 1, 'P.E. Introducción Mercadotecniaa'),
(29, 1, 'P.E. Matemáticas para la Comercialización'),
(30, 1, 'P.E. Metodología de la Investigación'),
(31, 1, 'P.E. Contabilidad financiera'),
(32, 1, 'P.E. Economía Internacional'),
(33, 1, 'P.E. Geografía Económica'),
(34, 1, 'P.E. Mercadotecnia Internacional'),
(35, 1, 'P.E. Sistema Financiero Nacional e Internacional'),
(36, 1, 'PE habilidades Organizacionales'),
(37, 2, 'Diseño de Interfaces'),
(38, 2, 'Gestión del Desarrollo de Software'),
(39, 2, 'Sistemas Inteligentes'),
(40, 2, 'Tecnologías de Virtualización'),
(41, 2, 'Tecnologías y Aplicaciones en Internet'),
(42, 2, 'Administración de proyectos de Tecnologías de la Información'),
(43, 2, 'Base de Datos'),
(44, 2, 'Escalamiento de redes'),
(45, 2, 'Etica Profesional'),
(46, 2, 'Física para Ingeniería'),
(47, 2, 'Fundamentos de Programación Orientada a Objetos'),
(48, 2, 'Matemáticas para Ingeniería I');

-- --------------------------------------------------------

--
-- Stand-in structure for view `subject_career_view`
-- (See below for the actual view)
--
CREATE TABLE `subject_career_view` (
`career_name` text
,`id_career` int
,`id_subject` int
,`subject_name` text
);

-- --------------------------------------------------------

--
-- Table structure for table `tutoring`
--

CREATE TABLE `tutoring` (
  `id_tutoring` int NOT NULL,
  `id_career` int NOT NULL,
  `id_subject` int NOT NULL,
  `id_student` int NOT NULL,
  `id_tutor` int NOT NULL,
  `observations` text,
  `tutoring_date` date NOT NULL,
  `type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `tutoring_report`
-- (See below for the actual view)
--
CREATE TABLE `tutoring_report` (
`career_name` text
,`observations` text
,`student_name` text
,`tutor_name` text
,`tutoring_date` date
);

-- --------------------------------------------------------

--
-- Table structure for table `tutoring_sessions`
--

CREATE TABLE `tutoring_sessions` (
  `id_tutoring` int NOT NULL,
  `id_career` int NOT NULL,
  `id_subject` int NOT NULL,
  `id_student` int NOT NULL,
  `id_tutor` int NOT NULL,
  `observations` text,
  `tutoring_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tutoring_sessions`
--

INSERT INTO `tutoring_sessions` (`id_tutoring`, `id_career`, `id_subject`, `id_student`, `id_tutor`, `observations`, `tutoring_date`) VALUES
(5, 2, 15, 1, 19, 'k', '2024-04-24');

-- --------------------------------------------------------

--
-- Stand-in structure for view `tutoring_sessions_view`
-- (See below for the actual view)
--
CREATE TABLE `tutoring_sessions_view` (
`career_name` text
,`id` int
,`id_career` int
,`id_student` int
,`id_subject` int
,`id_tutor` int
,`observations` text
,`student_name` text
,`subject_name` text
,`tutor_name` text
,`tutoring_date` date
);

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `id_tutor` int NOT NULL,
  `id_career` int NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`id_tutor`, `id_career`, `name`, `email`) VALUES
(1, 1, 'Tutor1', 'tutor1@gmail.com'),
(2, 1, 'Tutor2', 'tutor2@gmail.com'),
(3, 2, 'Tutor3', 'tutor3@gmail.com'),
(4, 2, 'Tutor4', 'tutor4@gmail.com'),
(6, 3, 'Tutor6', 'tutor6@gmail.com'),
(11, 6, 'Tutor', 'tutor@gmail.com'),
(17, 1, 'Tutor1', 'tutor1@gmail.com'),
(19, 2, 'Tutor3', 'tutor3@gmail.com'),
(20, 2, 'Tutor4', 'tutor4@gmail.com'),
(21, 3, 'Tutor5', 'tutor5@gmail.com'),
(22, 3, 'Tutor6', 'tutor6@gmail.com');

-- --------------------------------------------------------

--
-- Stand-in structure for view `tutors_careers_view`
-- (See below for the actual view)
--
CREATE TABLE `tutors_careers_view` (
`career_name` text
,`id_career` int
,`id_tutor` int
,`tutor_email` text
,`tutor_name` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tutors_report`
-- (See below for the actual view)
--
CREATE TABLE `tutors_report` (
`career_name` text
,`tutor_email` text
,`tutor_name` text
);

-- --------------------------------------------------------

--
-- Structure for view `consulting_report`
--
DROP TABLE IF EXISTS `consulting_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ale`@`%` SQL SECURITY DEFINER VIEW `consulting_report`  AS SELECT `t`.`name` AS `tutor_name`, `s`.`student_name` AS `student_name`, `c`.`career_name` AS `career_name`, `ts`.`observations` AS `observations` FROM ((((`consulting_sessions` `ts` join `careers` `c` on((`c`.`id_career` = `ts`.`id_career`))) join `students` `s` on((`ts`.`id_student` = `s`.`id_student`))) join `subjects` `sb` on((`ts`.`id_subject` = `sb`.`id_subject`))) join `tutors` `t` on((`ts`.`id_tutor` = `t`.`id_tutor`))) ;

-- --------------------------------------------------------

--
-- Structure for view `consulting_sessions_view`
--
DROP TABLE IF EXISTS `consulting_sessions_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ale`@`%` SQL SECURITY DEFINER VIEW `consulting_sessions_view`  AS SELECT `consulting_sessions`.`id_consulting` AS `id`, `c`.`id_career` AS `id_career`, `s`.`id_subject` AS `id_subject`, `st`.`id_student` AS `id_student`, `t`.`id_tutor` AS `id_tutor`, `c`.`career_name` AS `career_name`, `s`.`subject_name` AS `subject_name`, `st`.`student_name` AS `student_name`, `t`.`name` AS `tutor_name`, `consulting_sessions`.`observations` AS `observations`, `consulting_sessions`.`tutoring_date` AS `tutoring_date` FROM ((((`consulting_sessions` join `careers` `c` on((`consulting_sessions`.`id_career` = `c`.`id_career`))) join `subjects` `s` on((`consulting_sessions`.`id_subject` = `s`.`id_subject`))) join `students` `st` on((`consulting_sessions`.`id_student` = `st`.`id_student`))) join `tutors` `t` on((`consulting_sessions`.`id_tutor` = `t`.`id_tutor`))) ;

-- --------------------------------------------------------

--
-- Structure for view `students_report`
--
DROP TABLE IF EXISTS `students_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ale`@`%` SQL SECURITY DEFINER VIEW `students_report`  AS SELECT `s`.`student_name` AS `student_name`, `s`.`email` AS `student_email`, `t`.`name` AS `tutor_name`, `c`.`career_name` AS `career_name` FROM ((`students` `s` join `tutors` `t`) join `careers` `c`) WHERE ((`s`.`id_tutor` = `t`.`id_tutor`) AND (`c`.`id_career` = `s`.`id_career`)) ;

-- --------------------------------------------------------

--
-- Structure for view `students_tutors_view`
--
DROP TABLE IF EXISTS `students_tutors_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ale`@`%` SQL SECURITY DEFINER VIEW `students_tutors_view`  AS SELECT `s`.`id_student` AS `id_student`, `s`.`id_career` AS `id_career`, `s`.`id_tutor` AS `id_tutor`, `s`.`student_name` AS `student_name`, `s`.`email` AS `student_email`, `t`.`name` AS `tutor_name`, `c`.`career_name` AS `career_name` FROM ((`students` `s` join `tutors` `t`) join `careers` `c`) WHERE ((`s`.`id_tutor` = `t`.`id_tutor`) AND (`c`.`id_career` = `s`.`id_career`)) ;

-- --------------------------------------------------------

--
-- Structure for view `student_subject_career_view`
--
DROP TABLE IF EXISTS `student_subject_career_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ale`@`%` SQL SECURITY DEFINER VIEW `student_subject_career_view`  AS SELECT `ss`.`id` AS `id`, `ss`.`id_student` AS `id_student`, `ss`.`id_subject` AS `id_subject`, `st`.`id_career` AS `id_career`, `t`.`id_tutor` AS `id_tutor`, `t`.`name` AS `tutor_name`, `c`.`career_name` AS `career_name`, `st`.`student_name` AS `student_name`, `st`.`email` AS `student_email`, `s`.`subject_name` AS `subject_name` FROM ((((`student_subject` `ss` join `students` `st`) join `subjects` `s`) join `careers` `c`) join `tutors` `t`) WHERE ((`ss`.`id_subject` = `s`.`id_subject`) AND (`s`.`id_career` = `c`.`id_career`) AND (`st`.`id_tutor` = `t`.`id_tutor`) AND (`st`.`id_student` = `ss`.`id_student`)) ;

-- --------------------------------------------------------

--
-- Structure for view `subject_career_view`
--
DROP TABLE IF EXISTS `subject_career_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ale`@`%` SQL SECURITY DEFINER VIEW `subject_career_view`  AS SELECT `c`.`id_career` AS `id_career`, `s`.`id_subject` AS `id_subject`, `c`.`career_name` AS `career_name`, `s`.`subject_name` AS `subject_name` FROM (`careers` `c` join `subjects` `s` on((`c`.`id_career` = `s`.`id_career`))) ;

-- --------------------------------------------------------

--
-- Structure for view `tutoring_report`
--
DROP TABLE IF EXISTS `tutoring_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ale`@`%` SQL SECURITY DEFINER VIEW `tutoring_report`  AS SELECT `t`.`name` AS `tutor_name`, `s`.`student_name` AS `student_name`, `c`.`career_name` AS `career_name`, `ts`.`observations` AS `observations`, `ts`.`tutoring_date` AS `tutoring_date` FROM ((((`tutoring_sessions` `ts` join `careers` `c` on((`c`.`id_career` = `ts`.`id_career`))) join `students` `s` on((`ts`.`id_student` = `s`.`id_student`))) join `subjects` `sb` on((`ts`.`id_subject` = `sb`.`id_subject`))) join `tutors` `t` on((`ts`.`id_tutor` = `t`.`id_tutor`))) ;

-- --------------------------------------------------------

--
-- Structure for view `tutoring_sessions_view`
--
DROP TABLE IF EXISTS `tutoring_sessions_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ale`@`%` SQL SECURITY DEFINER VIEW `tutoring_sessions_view`  AS SELECT `tutoring_sessions`.`id_tutoring` AS `id`, `c`.`id_career` AS `id_career`, `s`.`id_subject` AS `id_subject`, `st`.`id_student` AS `id_student`, `t`.`id_tutor` AS `id_tutor`, `c`.`career_name` AS `career_name`, `s`.`subject_name` AS `subject_name`, `st`.`student_name` AS `student_name`, `t`.`name` AS `tutor_name`, `tutoring_sessions`.`observations` AS `observations`, `tutoring_sessions`.`tutoring_date` AS `tutoring_date` FROM ((((`tutoring_sessions` join `careers` `c` on((`tutoring_sessions`.`id_career` = `c`.`id_career`))) join `subjects` `s` on((`tutoring_sessions`.`id_subject` = `s`.`id_subject`))) join `students` `st` on((`tutoring_sessions`.`id_student` = `st`.`id_student`))) join `tutors` `t` on((`tutoring_sessions`.`id_tutor` = `t`.`id_tutor`))) ;

-- --------------------------------------------------------

--
-- Structure for view `tutors_careers_view`
--
DROP TABLE IF EXISTS `tutors_careers_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ale`@`%` SQL SECURITY DEFINER VIEW `tutors_careers_view`  AS SELECT `t`.`id_tutor` AS `id_tutor`, `t`.`id_career` AS `id_career`, `t`.`name` AS `tutor_name`, `t`.`email` AS `tutor_email`, `c`.`career_name` AS `career_name` FROM (`tutors` `t` join `careers` `c`) WHERE (`t`.`id_career` = `c`.`id_career`) ;

-- --------------------------------------------------------

--
-- Structure for view `tutors_report`
--
DROP TABLE IF EXISTS `tutors_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ale`@`%` SQL SECURITY DEFINER VIEW `tutors_report`  AS SELECT `t`.`name` AS `tutor_name`, `t`.`email` AS `tutor_email`, `c`.`career_name` AS `career_name` FROM (`tutors` `t` join `careers` `c` on((`c`.`id_career` = `t`.`id_career`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id_career`);

--
-- Indexes for table `consulting_sessions`
--
ALTER TABLE `consulting_sessions`
  ADD PRIMARY KEY (`id_consulting`),
  ADD KEY `consulting_sessions_ibfk_1` (`id_career`),
  ADD KEY `consulting_sessions_ibfk_2` (`id_subject`),
  ADD KEY `consulting_sessions_ibfk_3` (`id_student`),
  ADD KEY `consulting_sessions_ibfk_4` (`id_tutor`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_student`),
  ADD KEY `id_career` (`id_career`),
  ADD KEY `id_tutor` (`id_tutor`);

--
-- Indexes for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_student` (`id_student`),
  ADD KEY `id_subject` (`id_subject`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id_subject`),
  ADD KEY `id_career` (`id_career`);

--
-- Indexes for table `tutoring`
--
ALTER TABLE `tutoring`
  ADD PRIMARY KEY (`id_tutoring`),
  ADD KEY `id_career` (`id_career`),
  ADD KEY `id_subject` (`id_subject`),
  ADD KEY `id_tutor` (`id_tutor`);

--
-- Indexes for table `tutoring_sessions`
--
ALTER TABLE `tutoring_sessions`
  ADD PRIMARY KEY (`id_tutoring`),
  ADD KEY `tutoring_sessions_ibfk_1` (`id_career`),
  ADD KEY `tutoring_sessions_ibfk_2` (`id_subject`),
  ADD KEY `tutoring_sessions_ibfk_3` (`id_student`),
  ADD KEY `tutoring_sessions_ibfk_4` (`id_tutor`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`id_tutor`),
  ADD KEY `id_career` (`id_career`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id_career` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `consulting_sessions`
--
ALTER TABLE `consulting_sessions`
  MODIFY `id_consulting` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id_student` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_subject`
--
ALTER TABLE `student_subject`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id_subject` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tutoring`
--
ALTER TABLE `tutoring`
  MODIFY `id_tutoring` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tutoring_sessions`
--
ALTER TABLE `tutoring_sessions`
  MODIFY `id_tutoring` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id_tutor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consulting_sessions`
--
ALTER TABLE `consulting_sessions`
  ADD CONSTRAINT `consulting_sessions_ibfk_1` FOREIGN KEY (`id_career`) REFERENCES `careers` (`id_career`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `consulting_sessions_ibfk_2` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `consulting_sessions_ibfk_3` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `consulting_sessions_ibfk_4` FOREIGN KEY (`id_tutor`) REFERENCES `tutors` (`id_tutor`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`id_career`) REFERENCES `careers` (`id_career`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`id_tutor`) REFERENCES `tutors` (`id_tutor`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD CONSTRAINT `student_subject_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_subject_ibfk_2` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`) ON DELETE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`id_career`) REFERENCES `careers` (`id_career`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `tutoring`
--
ALTER TABLE `tutoring`
  ADD CONSTRAINT `tutoring_ibfk_1` FOREIGN KEY (`id_career`) REFERENCES `careers` (`id_career`),
  ADD CONSTRAINT `tutoring_ibfk_2` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`),
  ADD CONSTRAINT `tutoring_ibfk_3` FOREIGN KEY (`id_subject`) REFERENCES `students` (`id_student`),
  ADD CONSTRAINT `tutoring_ibfk_4` FOREIGN KEY (`id_tutor`) REFERENCES `tutors` (`id_tutor`);

--
-- Constraints for table `tutoring_sessions`
--
ALTER TABLE `tutoring_sessions`
  ADD CONSTRAINT `tutoring_sessions_ibfk_1` FOREIGN KEY (`id_career`) REFERENCES `careers` (`id_career`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `tutoring_sessions_ibfk_2` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `tutoring_sessions_ibfk_3` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `tutoring_sessions_ibfk_4` FOREIGN KEY (`id_tutor`) REFERENCES `tutors` (`id_tutor`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `tutors`
--
ALTER TABLE `tutors`
  ADD CONSTRAINT `tutors_ibfk_1` FOREIGN KEY (`id_career`) REFERENCES `careers` (`id_career`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
