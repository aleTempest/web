<?
// Conexion a la base de datos
$server_name = "localhost";
$username = "ale";
$password = "elaina";
$db_name	= "universidad";

$conn = new msqli($server_name,$username,$password,$db_name);
if ($conn->connect_error) {
	die("Conexión fallida");
}

echo 'hewo';
