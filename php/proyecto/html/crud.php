<?php
require_once 'credentials.php';

// Crear una carrera
if (isset($_POST['new_career']))
{
  $career_name = $_POST['career_name'];
  $sql = "INSERT INTO careers (career_name) VALUES ('$career_name')";
  $conn->query($sql);
  header('Location: list_career.php');
}

// Eliminar una carrera por id
if (isset($_GET['delete_career']))
{
  $career_id = $_GET['delete_career'];
  $sql = "DELETE FROM careers WHERE id_career = '$career_id'";
  $conn->query($sql);
  header('Location: list_career.php');
}

// Modificar una carrera por id
if (isset($_POST['edit_career']))
{
    $career_id = $_POST['career_id'];
    $career_name = $_POST['career_name'];
    $sql = "UPDATE careers SET career_name = '$career_name' WHERE id_career = $career_id";
    $conn->query($sql);
    header('Location: list_career.php');
}

// Crear un estudiante
if (isset($_POST['new_student']))
{
    $student_name = $_POST['student_name'];
    $student_email = $_POST['student_email'];
    $sql = "INSERT INTO students (name,email) VALUES ('$student_name,$student_email')";
    $conn->query($sql);
    header('Location: list_students.php');
}

// Eliminar un estudiante por id
if (isset($_GET['delete_student']))
{
    $student_id = $_GET['delete_student'];
    $sql = "DELETE FROM students WHERE id_student = $student_id";
    $conn->query($sql);
    header('Location: list_students.php');
}

// Editar un estudiante por id
if (isset($_POST['edit_student']))
{
    $student_id = $_POST['student_id'];
    $tutor_id = $_POST['tutor_id'];
    $student_name = $_POST['student_name'];
    $student_email = $_POST['student_email'];
    // TODO Obtener carreras
}