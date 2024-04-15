<?php
require_once './models/Conection.php';

class Genero
{
    private Conn $conn;
    //Constructor para inicializar la conexión a la base de datos
    public function __construct()
    {
        $this->conn = new Conn();
    }
    //Obtener todos los generos de la base de datos
    public function getGeneros(): mysqli_result
    {
        $query = "SELECT * FROM generos";
        return $this->conn->connect()->query($query);
    }
    //Obtener información de un Genero específico por ID
    public function getGeneroById(int $id): array
    {
        $query = "SELECT * FROM generos WHERE GeneroID  = $id";
        return $this->conn->connect()->query($query)->fetch_assoc();
    }
    //Eliminar un Genero por ID
    public function deleteGenero(int $id): void
    {
        $query = "DELETE FROM generos WHERE GeneroID = $id";
        $this->conn->connect()->query($query);
    }
    //Actualizar información de un Genero por ID
    public function updateGenero(int $id, string $name): void
    {
        $query = "UPDATE generos SET Nombre = '$name' WHERE GeneroID = $id";
        $this->conn->connect()->query($query);
    }
    //Agregar un nuevo Genero a la base de datos
    public function addGenero(string $name): void
    {
        $query = "INSERT INTO generos (Nombre) VALUES ('$name')";
        $this->conn->connect()->query($query);
    }
    public function countPeliculasByGeneroID(int $generoID): int
    {
        $query = "SELECT COUNT(*) as total FROM peliculas WHERE GeneroID = $generoID";
        $result = $this->conn->connect()->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
}
