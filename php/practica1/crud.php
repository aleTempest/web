<?php
require 'crendentials.php';
require 'StudentDao.php';
require 'CareerDao.php';
require 'SubjectDao.php';

$student_dao = new StudentDao($servername,$username,$password,$dbname);
$career_dao = new CareerDao($servername,$username,$password,$dbname);
$subject_dao = new SubjectDao($servername,$username,$password,$dbname);

if (isset($_GET['delete_student'])) {
    $id = $_GET['delete_student'];
    $student_dao->deleteStudent($id);
    header('Location: student_list.php');
}

if (isset($_POST['add_student'])) {
    $id_career = $_POST['id_career'];
    $name = $_POST['name'];
    $enrollment = $_POST['enrollment'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $student_dao->createStudent($id_career,$enrollment,$name,$email,$age);
    header('Location: student_list.php');
}

if (isset($_POST['update_student'])) {
    $id = $_POST['id'];
    $id_career = $_POST['id_career'];
    $name = $_POST['name'];
    $enrollment = $_POST['enrollment'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    // $career_name = $_POST['career_name'];
    $student_dao->updateStudent($id,$id_career,$enrollment,$name,$email,$age);
    header('Location: student_list.php');
}

if (isset($_GET['delete_career'])) {
    $id = $_GET['delete_career'];
    $career_dao->deleteCareer($id);
    header('Location: career_list.php');
}

if (isset($_POST['add_career'])) {
    $name = $_POST['career_name'];
    $career_dao->createCareer($name);
    header('Location: career_list.php');
}

if (isset($_POST['update_career'])) {
    $id = $_POST['id_career'];
    $name = $_POST['career_name'];
    $career_dao->updateCareer($id,$name);
    header('Location: career_list.php');
}

if (isset($_POST['ids'])) 
{
	$subject_name = $_POST['subject_name'];
	$subject_dao->createSubject($subject_name);
	$id_subject = $subject_dao->getLastInsertedId();
	foreach ($_POST['ids'] as $id_career) 
	{
		$subject_dao->addCareer($id_subject,$id_career);
	}
	header('Location: add_subject.php');
}

if (isset($_GET['delete_subject']))
{
	$id_subject = $_GET['delete_subject'];
	$subject_dao->deleteSubjectCareer($id_subject,true);
	header('Location: subject_list.php');
}

if (isset($_POST['delete_career_subject'])) 
{
	$id = $_POST['delete_career_subject'];
	$subject_dao->deleteSubjectCareerByCareer($id);
	header('Location: subject_list.php');
}
