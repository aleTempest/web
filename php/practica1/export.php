<?php
require 'factories.php';

// Crear instancias de los DAOs para estudiantes, carreras y asignaturas
$student_dao = createStudentDao();
$career_dao = createCareerdao();
$subject_dao = createSubjectDao();

// verificar si se ha enviado la solicitud para exportar estudiantes
if (isset($_POST['export_students'])) 
{
	$students = $student_dao->getAllStudents();
	$file_name = 'exported_students.csv'; // nombre del archivo
	header('Content-Type: text/csv'); // headers para la respuesta http
	header('Content-Disposition: attachment; filename="' . $file_name . '"');
	$output = fopen('php://output', 'w'); // abrir el archivo con permisos de escritura
	fputcsv($output, array('Matricula', 'Nombre', 'Email', 'Edad', 'Carrera')); // headers del csv
	foreach ($students as $student) { // iterar en el arreglo de estudiantes y escribirlos en el csv
		fputcsv($output, array_values($student->toMap()));
	}
	fclose($output); // cerrar el archivo
	exit();
}

// verificar si se ha enviado la solicitud para exportar las materias
if (isset($_POST['export_subjects'])) {
    $subjects = $subject_dao->getAllSubjects();
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="subjects.csv"');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['Subject', 'Careers']);
    foreach ($subjects as $subject) {
        $subjectName = $subject->getName();
        $careers = $subject_dao->getCareersBySubject($subject->getId());
        fputcsv($output, [$subjectName, implode(', ', $careers)]);
    }
    fclose($output);
    exit;
}
