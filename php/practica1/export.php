<?php
require 'factories.php';

$student_dao = createStudentDao();
$career_dao = createCareerdao();
$subject_dao = createSubjectDao();

if (isset($_POST['export_students'])) 
{
	$students = $student_dao->getAllStudents();
	$file_name = 'exported_students.csv';
	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename="' . $file_name . '"');
	$output = fopen('php://output', 'w');
	fputcsv($output, array('Matricula', 'Nombre', 'Email', 'Edad', 'Carrera'));
	foreach ($students as $student) {
		fputcsv($output, array_values($student->toMap()));
	}
	fclose($output);
	exit();
}

if (isset($_POST['export_subjects'])) {
    // Get subjects from your data source, assuming $subject_dao is already defined
    $subjects = $subject_dao->getAllSubjects();

    // Set headers to indicate CSV content
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="subjects.csv"');

    // Open the output stream
    $output = fopen('php://output', 'w');

    // Write header row
    fputcsv($output, ['Subject', 'Careers']);

    // Write data rows
    foreach ($subjects as $subject) {
        // Get subject name
        $subjectName = $subject->getName();

        // Get careers related to the subject
        $careers = $subject_dao->getCareersBySubject($subject->getId());

        // Write subject name and related careers to CSV row
        fputcsv($output, [$subjectName, implode(', ', $careers)]);
    }

    // Close the output stream
    fclose($output);

    // Exit script to prevent further output
    exit;
}
