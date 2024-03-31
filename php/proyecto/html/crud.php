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

    // Esta variable es un array y es opcional
    if (isset ($_POST['subjects']))
    {
        // Obtener el id del estudiante recién insertado
        $student_id = $conn->query("SELECT LAST_INSERT_ID() as last")->fetch_assoc()['last'];
        $subjects = $_POST['subjects']; // array de materias
        foreach ($subjects as $subject_id) // por cada materia seleccionada se hace un insert
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
if (isset($_POST['edit_student_data']))
{
    $student_id = $_POST['student_id'];
    $tutor_id = $_POST['tutor_id'];
    $student_name = $_POST['student_name'];
    $student_email = $_POST['student_email'];
    $sql = "UPDATE students SET id_tutor = $tutor_id, student_name = '$student_name', email = '$student_email' WHERE id_student = $student_id";
    $conn->query($sql);

    // Obtener las materias selecionadas
    if (isset($_POST['subjects']))
    {
        $subjects = $_POST['subjects'];
        // Borrar todas las materias del estudiante y volver a insertar las seleccionadas, la otra opción sería
        // obtener las viejas y compararlas con las nuevas
        $sql = "DELETE FROM student_subject WHERE id_student = $student_id"; // cheese
        $conn->query($sql);
        foreach($subjects as $subject_id)
        {
            $sql = "INSERT INTO student_subject (id_student,id_subject) VALUES ($student_id,$subject_id)";
            $conn->query($sql);
        }
    }
    header('Location: list_students.php');
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

// Crear una nueva tutoría por id
if (isset($_POST['new_tutoring']))
{
    $career_id = $_POST['career_id'];
    $subject_id = $_POST['subject_id'];
    $student_id = $_POST['student_id'];
    $tutor_id = $_POST['tutor_id'];
    $observations = $_POST['observations'];
    $date = $_POST['tutoring_date'];
    $sql = "INSERT INTO tutoring_sessions (id_career,id_student,id_tutor,id_subject,observations,tutoring_date) VALUES ($career_id,$student_id,$tutor_id,$subject_id,'$observations','$date')";
    $conn->query($sql);
    header('Location: list_tutoring.php');
}

// Eliminar una tutoría por id
if (isset($_GET['delete_tutoring']))
{
    $tutoring_id = $_GET['delete_tutoring'];
    $sql = "DELETE FROM tutoring_sessions WHERE id_tutoring = $tutoring_id";
    $conn->query($sql);
    header('Location: list_tutoring.php');
}

// Editar una tutoría por id
if (isset($_POST['update_tutoring'])) {
    $tutoring_id = $_POST['tutoring_id'];
    $student_id = $_POST['student_id'];
    $tutor_id = $_POST['tutor_id'];
    $subject_id = $_POST['subject_id'];
    $observations = $_POST['observations'];
    $tutoring_date = $_POST['tutoring_date'];

    $sql = "UPDATE tutoring_sessions SET id_student = $student_id, id_tutor = $tutor_id, id_subject = $subject_id, observations = '$observations', tutoring_date = '$tutoring_date' WHERE id_tutoring = $tutoring_id";
    $conn->query($sql);
    header('Location: list_tutoring.php');
}