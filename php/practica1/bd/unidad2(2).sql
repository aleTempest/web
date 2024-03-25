-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Mar 12, 2024 at 06:30 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unidad2`
--

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id_career` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id_career`, `name`) VALUES
(1, 'ITI'),
(3, 'MECA'),
(8, 'ISA'),
(9, 'LAYGE'),
(11, 'MANU');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `id_career` int DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `enrollment` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `id_career`, `name`, `enrollment`, `email`, `age`) VALUES
(2, 1, 'ale', 'yo', 'test', 21),
(10, 8, 'asdasd', 'yea', 'asdas', 18),
(11, 3, 'aa', 'asies', 'e', 2),
(12, NULL, 'test', 'test', 'test', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `students_career_view`
-- (See below for the actual view)
--
CREATE TABLE `students_career_view` (
`age` int
,`career_name` varchar(100)
,`email` varchar(100)
,`enrollment` varchar(100)
,`id` int
,`id_career` int
,`name` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_subject_score_view`
-- (See below for the actual view)
--
CREATE TABLE `student_subject_score_view` (
`id` int
,`id_subject` int
,`score` float
,`score_id` int
,`subject_name` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id_subject` int NOT NULL,
  `subject_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id_subject`, `subject_name`) VALUES
(1, 'Matemáticas para Ing. 1'),
(2, 'Matemáticas para Ing. 2'),
(3, 'Algebra'),
(4, 'Física'),
(5, 'Física para Ing.'),
(6, 'Funciones Matemáticas'),
(7, 'Base de datos'),
(8, 'Programación Web');

-- --------------------------------------------------------

--
-- Table structure for table `subject_career`
--

CREATE TABLE `subject_career` (
  `id` int NOT NULL,
  `id_subject` int NOT NULL,
  `id_career` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subject_career`
--

INSERT INTO `subject_career` (`id`, `id_subject`, `id_career`) VALUES
(81, 1, 1),
(82, 1, 3),
(83, 1, 8),
(84, 1, 11),
(85, 2, 1),
(86, 2, 3),
(87, 2, 8),
(88, 2, 11),
(89, 3, 1),
(90, 3, 3),
(91, 3, 8),
(92, 3, 11),
(93, 4, 1),
(94, 4, 3),
(95, 4, 8),
(96, 4, 11),
(97, 5, 1),
(98, 5, 3),
(99, 5, 8),
(100, 5, 11),
(101, 6, 1),
(102, 6, 3),
(103, 6, 8),
(104, 6, 11),
(105, 8, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `subject_career_view`
-- (See below for the actual view)
--
CREATE TABLE `subject_career_view` (
`career_name` varchar(100)
,`id_career` int
,`id_subject` int
,`subject_name` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `subject_student`
--

CREATE TABLE `subject_student` (
  `id` int NOT NULL,
  `id_subject_career` int NOT NULL,
  `id_student` int NOT NULL,
  `score` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subject_student`
--

INSERT INTO `subject_student` (`id`, `id_subject_career`, `id_student`, `score`) VALUES
(6, 82, 10, 5),
(7, 83, 11, 8),
(8, 84, 12, 7),
(14, 85, 2, 10),
(15, 89, 2, 10),
(16, 93, 2, 10);

-- --------------------------------------------------------

--
-- Structure for view `students_career_view`
--
DROP TABLE IF EXISTS `students_career_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ale`@`%` SQL SECURITY DEFINER VIEW `students_career_view`  AS SELECT `s`.`id` AS `id`, `s`.`id_career` AS `id_career`, `s`.`name` AS `name`, `s`.`enrollment` AS `enrollment`, `s`.`email` AS `email`, `s`.`age` AS `age`, `c`.`name` AS `career_name` FROM (`students` `s` join `careers` `c`) WHERE (`s`.`id_career` = `c`.`id_career`) ;

-- --------------------------------------------------------

--
-- Structure for view `student_subject_score_view`
--
DROP TABLE IF EXISTS `student_subject_score_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `student_subject_score_view`  AS SELECT `st`.`id` AS `id`, `s`.`id_subject` AS `id_subject`, `s`.`subject_name` AS `subject_name`, `ss`.`id` AS `score_id`, `ss`.`score` AS `score` FROM (((`subject` `s` join `subject_career` `sc` on((`s`.`id_subject` = `sc`.`id_subject`))) join `subject_student` `ss` on((`ss`.`id_subject_career` = `sc`.`id`))) join `students` `st` on((`ss`.`id_student` = `st`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `subject_career_view`
--
DROP TABLE IF EXISTS `subject_career_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `subject_career_view`  AS SELECT `S`.`id_subject` AS `id_subject`, `S`.`subject_name` AS `subject_name`, `C`.`id_career` AS `id_career`, `C`.`name` AS `career_name` FROM ((`subject` `S` join `subject_career` `SC` on((`S`.`id_subject` = `SC`.`id_subject`))) join `careers` `C` on((`SC`.`id_career` = `C`.`id_career`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id_career`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CAREER` (`id_career`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id_subject`);

--
-- Indexes for table `subject_career`
--
ALTER TABLE `subject_career`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_subject` (`id_subject`),
  ADD KEY `id_career` (`id_career`);

--
-- Indexes for table `subject_student`
--
ALTER TABLE `subject_student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_index` (`id_subject_career`,`id_student`),
  ADD KEY `id_student` (`id_student`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id_career` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id_subject` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subject_career`
--
ALTER TABLE `subject_career`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `subject_student`
--
ALTER TABLE `subject_student`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `FK_CAREER` FOREIGN KEY (`id_career`) REFERENCES `careers` (`id_career`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `subject_career`
--
ALTER TABLE `subject_career`
  ADD CONSTRAINT `subject_career_ibfk_1` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`id_subject`),
  ADD CONSTRAINT `subject_career_ibfk_2` FOREIGN KEY (`id_career`) REFERENCES `careers` (`id_career`);

--
-- Constraints for table `subject_student`
--
ALTER TABLE `subject_student`
  ADD CONSTRAINT `subject_student_ibfk_1` FOREIGN KEY (`id_subject_career`) REFERENCES `subject_career` (`id`),
  ADD CONSTRAINT `subject_student_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
