<?php
require 'factories.php';

$student_dao = createStudentDao();

if (isset($_POST['export_students'])) 
{
	$students = $student_dao->getAllStudents();

	// Specify the file name
	$file_name = 'exported_students.csv';

	// Set the HTTP headers to force download
	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename="' . $file_name . '"');

	// Open the output stream
	$output = fopen('php://output', 'w');

	// Write the header to the output stream
	fputcsv($output, array('Matricula', 'Nombre', 'Email', 'Edad', 'Carrera'));

	// Loop through each student and write their details to the output stream
	foreach ($students as $student) {
		fputcsv($output, array_values($student->toMap()));
	}

	// Close the output stream
	fclose($output);

	// Stop script execution
	exit();

}

