<?
$servername = "db"; // docker
$username = "ale";
$password = "elaina";
$dbname = "unidad2";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password,$dbname);

// Check 
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>