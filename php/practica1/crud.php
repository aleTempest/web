<?
require 'db.php';
require 'crendentials.php';
require 'StudentDao.php';

$dao = new StudentDao($servername,$username,$password,$dbname);

// alta de alumnos
if (isset($_POST['alta_alumno'])) {
	$matricula	= $_POST['matricula'];
	$nombre = $_POST['nombre'];
	$edad = $_POST['edad'];
	$email = $_POST['email'];
	$id_carrera = $_POST['id_carrera'];

	$sql = "INSERT INTO alumnos (matricula,nombre,edad,email,id_carrera) 
		VALUES ('$matricula','$nombre','$edad','$email','$id_carrera')";
	$res = $conn->query($sql);
	header("Location: listado.php");
}

// baja de alumnos
if (isset($_GET['eliminar_alumnos'])) {
	$id		= $_GET['eliminar_alumno'];
	$sql	= "DELETE FROM alumnos WHERE id = $id";
	$res	= $conn->query($sql);
	header("Location: listado.php");
}

// modificar alumnos
if (isset($_POST['cambio_alumno'])) {
	$id = $_POST['id_alumno'];
	$matricula = $_POST['matricula'];
	$nombre = $_POST['nombre'];
	$edad = $_POST['edad'];
	$email = $_POST['email'];
	$id_carrera = $_POST['id_carrera'];
	$sql = "UPDATE alumnos SET 
		matricula = '$matricula',
		nombre = '$nombre',
		edad = '$edad',
		email = '$email',
		id_carrera = '$id_carrera'
		WHERE id = $id";
	$res = $conn->query($sql);
	header("Location: listado.php");
}

// alta de carrera
if (isset($_POST['alta_carrera'])) {
	$nombre = $_POST['nombre_carrera'];
	$sql = "INSERT INTO carreras (nombre) VALUES ($nombre)";
	$res = $conn->query($sql);
	header("Location: listado_carreras.php");
}

// baja de carrera
if (isset($_GET['baja_carrera'])) {
	$id = $_GET['eliminar_carrera'];
	$sql = "DELETE FROM carreras WHERE id = $id";
	$res = $conn->query($sql);
	header("Location: listado_carreras.php");
}

// modificar carrera
if (isset($_POST['cambio_carrera'])) {
	$id = $_POST['id_carrera'];
	$nombre = $_POST['nombre'];
	$sql = "UPDATE carrera SET nombre = '$nombre' WHERE id_carrera = $id";
	$res = $conn->query($sql);
	header("Location: listado_carreras.php");
}

if (isset($_GET['delete_student'])) {
    $id = $_GET['delete_student'];
    $dao->deleteStudent($id);
    header('Location: student_list.php');
}

if (isset($_POST['add_student'])) {
    $id_career = $_POST['id_career'];
    $name = $_POST['name'];
    $enrollment = $_POST['enrollment'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $dao->createStudent($id_career,$enrollment,$name,$email,$age);
    header('Location: student_list.php');
}

if (isset($_POST['update_student'])) {
    $id = $_POST['id'];
    $id_career = $_POST['id_career'];
    $name = $_POST['name'];
    $enrollment = $_POST['enrollment'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $dao->updateStudent($id,$id_career,$enrollment,$name,$email,$age);
    header('Location: student_list.php');
}