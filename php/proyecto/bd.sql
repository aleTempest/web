CREATE TABLE student_subject (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_student INT NOT NULL,
    id_subject INT NOT NULL,
    FOREIGN KEY (id_student) REFERENCES students (id_student) ON DELETE CASCADE,
    FOREIGN KEY (id_subject) REFERENCES subjects (id_subject) ON DELETE CASCADE
);

-- obtener las materias de las carreras
CREATE VIEW subject_career_view as
SELECT c.id_career, s.id_subject, c.career_name, s.subject_name FROM careers as c
    JOIN subjects s on c.id_career = s.id_career;
SELECT * FROM subject_career_view;

 -- obtener las materias de una carrera
SELECT subject_name FROM subject_career_view WHERE id_career = 1;

CREATE VIEW student_subject_career_view as
SELECT id, ss.id_student as id_student, ss.id_subject as id_subject, st.id_career as id_career, t.id_tutor, t.name as tutor_name, career_name, student_name, st.email as student_email, subject_name
FROM student_subject as ss
    JOIN students as st
    JOIN subjects as s
    JOIN careers as c
    JOIN tutors as t
WHERE ss.id_subject = s.id_subject AND s.id_career = c.id_career AND st.id_tutor = t.id_tutor AND st.id_student = ss.id_student;

SELECT * FROM student_subject_career_view;

CREATE VIEW students_tutors_view as
SELECT s.id_student, s.id_career, s.id_tutor, s.student_name as student_name, s.email as student_email,
        t.name as tutor_name, c.career_name as career_name
FROM students as s
    JOIN tutors as t
    JOIN careers as c
WHERE s.id_tutor = t.id_tutor AND c.id_career = s.id_career;

-- tutores y carreras
CREATE VIEW tutors_careers_view as
SELECT t.id_tutor as id_tutor, t.id_career as id_career, t.name as tutor_name, t.email as tutor_email, c.career_name
FROM tutors as t
    JOIN careers as c
WHERE t.id_career = c.id_career;

INSERT INTO careers (career_name) VALUES
    ('Licenciatura en Administración y Gestión de Pequeñas y Medianas Empresas'),
    ('Ingeniería en Tecnologías de la Información'),
    ('Ingeniería en Mecatrónica'),
    ('Ingeniería en Tecnologías de Manufactura'),
    ('Ingeniería en Sistemas Automotrices'),
    ('Licenciatura en Comercio Internacional y Aduanas'),
    ('Maestría en Ingeniería'),
    ('Maestría Energías Renovables');

-- Materias de layge
INSERT INTO subjects (id_career, subject_name) VALUES
    (1,'Desarrollo Humano y Valores'),
    (1,'Introducción a la Economía'),
    (1,'P.E. Fundamentos de Administración'),
    (1,'P.E. Introducción Mercadotecniaa'),
    (1,'P.E. Matemáticas para la Comercialización'),
    (1,'P.E. Metodología de la Investigación'),
    (1,'P.E. Contabilidad financiera'),
    (1,'P.E. Economía Internacional'),
    (1,'P.E. Geografía Económica'),
    (1,'P.E. Mercadotecnia Internacional'),
    (1,'P.E. Sistema Financiero Nacional e Internacional'),
    (1,'PE habilidades Organizacionales');

-- Materias de iti
INSERT INTO subjects (id_career, subject_name) VALUES
    (2,'Diseño de Interfaces'),
    (2,'Gestión del Desarrollo de Software'),
    (2,'Sistemas Inteligentes'),
    (2,'Tecnologías de Virtualización'),
    (2,'Tecnologías y Aplicaciones en Internet'),
    (2,'Administración de proyectos de Tecnologías de la Información'),
    (2,'Base de Datos'),
    (2,'Escalamiento de redes'),
    (2,'Etica Profesional'),
    (2,'Física para Ingeniería'),
    (2,'Fundamentos de Programación Orientada a Objetos'),
    (2,'Matemáticas para Ingeniería I');

-- 2 tutores en cada carrera
INSERT INTO tutors (id_career, name, email) VALUES
    (1,'Tutor1','tutor1@gmail.com'), -- LAYGE
    (1,'Tutor2','tutor2@gmail.com'),
    (2,'Tutor3','tutor3@gmail.com'), -- ITI
    (2,'Tutor4','tutor4@gmail.com'),
    (3,'Tutor5','tutor5@gmail.com'), -- MECA
    (3,'Tutor6','tutor6@gmail.com');

INSERT INTO tutors (id_career, name, email) VALUES
    (4,'Tutor','tutor@gmail.com'), -- MANU
    (4,'Tutor','tutor@gmail.com'),
    (5,'Tutor','tutor@gmail.com'), -- ISA
    (5,'Tutor','tutor@gmail.com'),
    (6,'Tutor','tutor@gmail.com'), -- ADMIN
    (6,'Tutor','tutor@gmail.com'),
    (7,'Tutor','tutor@gmail.com'), -- MI
    (7,'Tutor','tutor@gmail.com'),
    (8,'Tutor','tutor@gmail.com'), -- MER
    (8,'Tutor','tutor@gmail.com');

INSERT INTO students (id_career, id_tutor, student_name, email) VALUES
    (2,1,'juanito','juanito@gmail.com'), -- juanito esta en LAYGE y tiene asignado al tutor 1
    (2,1,'juanito2','juanito2@gmail.com'), -- juanito2 esta en LAYGE y tiene asignado al tutor 1
    (2,1,'juanito2','juanito2@gmail.com'), -- juanito2 esta en LAYGE y tiene asignado al tutor 1
    (3,2,'juanito3','juanito3@gmail.com'), -- juanito3 esta en ITI y tiene asignado al tutor 1
    (3,2,'juanito4','juanito4@gmail.com'); -- juanito4 esta en ITI y tiene asignado al tutor 1

INSERT INTO tutoring_sessions (id_career, id_subject, id_student, id_tutor, observations, tutoring_date) VALUES
    (2,1,1,1,'observaciones','2021-01-01'),
    (2,1,2,1,'observaciones','2021-01-02'),
    (3,1,3,1,'observaciones','2021-01-03'),
    (3,1,4,1,'observaciones','2021-01-04');

INSERT INTO consulting_sessions (id_career, id_subject, id_student, id_tutor, observations, tutoring_date) VALUES
    (2,1,1,1,'observaciones','2021-01-01'),
    (2,1,2,1,'observaciones','2021-01-02'),
    (3,1,3,1,'observaciones','2021-01-03'),
    (3,1,4,1,'observaciones','2021-01-04');

CREATE VIEW tutoring_sessions_view as
SELECT id_tutoring as id,c.id_career, s.id_subject, st.id_student, t.id_tutor, c.career_name, s.subject_name, st.student_name, t.name as tutor_name, observations, tutoring_date
FROM tutoring_sessions
    JOIN careers c on tutoring_sessions.id_career = c.id_career
    JOIN subjects s on tutoring_sessions.id_subject = s.id_subject
    JOIN students st on tutoring_sessions.id_student = st.id_student
    JOIN tutors t on tutoring_sessions.id_tutor = t.id_tutor
;

CREATE VIEW consulting_sessions_view as
SELECT id_consulting as id, c.id_career, s.id_subject, st.id_student, t.id_tutor, c.career_name, s.subject_name, st.student_name, t.name as tutor_name, observations, tutoring_date
FROM consulting_sessions
    JOIN careers c on consulting_sessions.id_career = c.id_career
    JOIN subjects s on consulting_sessions.id_subject = s.id_subject
    JOIN students st on consulting_sessions.id_student = st.id_student
    JOIN tutors t on consulting_sessions.id_tutor = t.id_tutor
;

INSERT INTO tutoring_sessions (id_career,id_student,id_tutor,id_subject,observations,tutoring_date) VALUES (2,2,4,16,'asdasdasdasdasd','2024-03-26')


create table tutoring_sessions
(
    id_tutoring   int auto_increment
        primary key,
    id_career     int  not null,
    id_subject    int  not null,
    id_student    int  not null,
    id_tutor      int  not null,
    observations  text null,
    tutoring_date date not null,
    constraint tutoring_sessions_ibfk_1
        foreign key (id_career) references careers (id_career),
    constraint tutoring_sessions_ibfk_2
        foreign key (id_subject) references subjects (id_subject),
    constraint tutoring_sessions_ibfk_3
        foreign key (id_student) references students (id_student),
    constraint tutoring_sessions_ibfk_4
        foreign key (id_tutor) references tutors (id_tutor)
);

create index id_career
    on tutoring_sessions (id_career);

create index id_subject
    on tutoring_sessions (id_subject);

create index id_tutor
    on tutoring_sessions (id_tutor);


create table consulting_sessions
(
    id_consulting int auto_increment
        primary key,
    id_career     int  not null,
    id_subject    int  not null,
    id_student    int  not null,
    id_tutor      int  not null,
    observations  text null,
    tutoring_date date not null,
    constraint consulting_sessions_ibfk_1
        foreign key (id_career) references careers (id_career),
    constraint consulting_sessions_ibfk_2
        foreign key (id_subject) references subjects (id_subject),
    constraint consulting_sessions_ibfk_3
        foreign key (id_student) references students (id_student),
    constraint consulting_sessions_ibfk_4
        foreign key (id_tutor) references tutors (id_tutor)
);

