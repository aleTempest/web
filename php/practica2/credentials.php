<?php
// Credenciales para la base de datos
$servername = "db";
$username = "ale";
$password = "elaina";
$dbname = "practica2_corregida";

// Instanciar objeto de conexión a mysql
$conn = new mysqli($servername, $username, $password, $dbname);

// Checar si la conexión tuvo exitosa
if ($conn->connect_error)
{
    die("Conexión fallida" . $conn->connect_error);
}
