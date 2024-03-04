<?
include 'db.php'
// alta de alumnos
if (isset($_POST[alta_alumno])) {
	// Obtener los datos del formulario
	$matricula	= $_POST['matricula'];
	$nombre			= $_POST['nombre'];
	$edad				= $_POST['edad'];
	$email			= $_POST['email'];
	$id_carrera = $_POST['id_carrera'];

	// Insert a la tabla
	$sql = "INSERT INTO alumnos (matricula,nombre,edad,email,id_carrera) 
		VALUES ('$matricula,$nombre,$edad,$email,$id_carrera')";
	$res = $conn->query($sql);
	header("Location: listado.php");
}
