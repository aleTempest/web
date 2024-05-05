<?php
require_once 'Connection.php';
class CareerModel {
    private Connection $conn;
    public function __construct()
    {
        $this->conn = new Connection();
    }

    /*
    * Obtener carreras
    * */
    public function getCareers(): bool|mysqli_result
    {
        $query = "SELECT * FROM careers";
        return $this->conn->connect()->query($query);
    }

    /*
    * Obtener carrera por id
    * */
    public function getCareer(int $id): bool|mysqli_result
    {
        $query = "SELECT * FROM careers WHERE id_career = $id";
        return $this->conn->connect()->query($query);
    }

    /*
     * Crear una nueva carrera*/
    public function createCareer(string $name): bool|mysqli_result
    {
        $query = "INSERT INTO careers (career_name) VALUES ('$name')";
        return $this->conn->connect()->query($query);
    }

    /*
    * Actualizar carrera por id
    * */
    public function updateCareer(int $id, string $name): bool|mysqli_result
    {
        $query = "UPDATE careers SET career_name = '$name' WHERE id_career = $id";
        return $this->conn->connect()->query($query);
    }

    /*
     * Eliminar carrera por id
     * */
    public function deleteCareer(int $id): bool|mysqli_result
    {
        $query = "DELETE FROM careers WHERE id_career = $id";
        return $this->conn->connect()->query($query);
    }
}