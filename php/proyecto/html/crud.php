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
    // Datos necesarios para añadir un nuevo estudiante
    $career_id = $_POST['student_career'];
    $student_name = $_POST['student_name'];
    $student_email = $_POST['student_email'];
    $student_tutor = $_POST['student_tutor'];
    $sql = "INSERT INTO students (id_career,id_tutor,student_name,email) VALUES ($career_id,$student_tutor,'$student_name','$student_email')";
    $conn->query($sql);

    // Esta variable es un array y es opcional así que hay que verificar si existe
    if (isset ($_POST['subjects']))
    {
        // Obtener el id del estudiante recién insertado
        $student_id = $conn->query("SELECT LAST_INSERT_ID() as last")->fetch_assoc()['last'];
        $subjects = $_POST['subjects']; // Arreglo de materias
        foreach ($subjects as $subject_id)
        {
            $sql = "INSERT INTO student_subject (id_student,id_subject) VALUES ($student_id,$subject_id)";
            $conn->query($sql);
        }
    }
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

// Agregar un nuevo tutor
if (isset($_POST['new_tutor']))
{
    $tutor_name = $_POST['tutor_name'];
    $tutor_email = $_POST['tutor_email'];
    $career_id = $_POST['tutor_career'];
    $sql = "INSERT INTO tutors (id_career,name,email) VALUES ($career_id,'$tutor_name','$tutor_email')";
    $conn->query($sql);
    header('Location: list_tutors.php');
}

// Eliminar un tutor por id
if (isset($_GET['delete_tutor']))
{
    $tutor_id = $_GET['delete_tutor'];
    $sql = "DELETE FROM tutors WHERE id_tutor = $tutor_id";
    $conn->query($sql);
    header('Location: list_tutors.php');
}

// Editar un tutor por id
if (isset($_POST['edit_tutor']))
{
    $tutor_id = $_POST['tutor_id'];
    $tutor_name = $_POST['tutor_name'];
    $tutor_email = $_POST['tutor_email'];
    $career_id = $_POST['tutor_career'];
    $sql = "UPDATE tutors SET name = '$tutor_name', email = '$tutor_email', id_career = $career_id WHERE id_tutor = $tutor_id";
    $conn->query($sql);
    header('Location: list_tutors.php');
}

// Agregar una nueva materia
if (isset($_POST['new_subject']))
{
    $career_id = $_POST['career_id'];
    $subject_name = $_POST['subject_name'];
    $sql = "INSERT INTO subjects (id_career,subject_name) VALUES ($career_id,'$subject_name')";
    $conn->query($sql);
    header('Location: list_subjects.php');
}

// Eliminar una materia por id
if (isset($_GET['delete_subject']))
{
    $subject_id = $_GET['delete_subject'];
    $sql = "DELETE FROM subjects WHERE id_subject = $subject_id";
    $conn->query($sql);
    header('Location: list_subjects.php');
}

// Editar una materia por id
if (isset($_POST['edit_subject']))
{
    $subject_id = $_POST['subject_id'];
    $subject_name = $_POST['subject_name'];
    $sql = "UPDATE subjects SET subject_name = '$subject_name' WHERE id_subject = $subject_id";
    $conn->query($sql);
    header('Location: list_subjects.php');
}