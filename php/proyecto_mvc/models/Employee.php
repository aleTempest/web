<?php
require_once './models/Conection.php';

class Employee
{
    private Conn $conn;
    public function __construct()
    {
        $this->conn = new Conn();
    }

    public function getEmployees(): mysqli_result
    {
        $query = "SELECT * FROM empleados";
        return $this->conn->connect()->query($query);
    }

    public function getEmployeeById(int $id): array
    {
        $query = "SELECT * FROM empleados WHERE id_empleado = $id";
        return $this->conn->connect()->query($query)->fetch_assoc();
    }

    public function deleteEmployee(int $id): void
    {
        $query = "DELETE FROM empleados WHERE id_empleado = $id";
        $this->conn->connect()->query($query);
    }

    public function updateEmployee(int $id, string $name, string $rfc, string $email, string $phone): void
    {
        $query = "UPDATE empleados SET nombre = '$name', rfc = '$rfc', email = '$email', telefono = '$phone' WHERE id_empleado = $id";
        $this->conn->connect()->query($query);
    }

    public function addEmployee(string $name, string $rfc, string $email, string $phone): void
    {
        $query = "INSERT INTO empleados (nombre, rfc, email, telefono) VALUES ('$name', '$rfc', '$email', '$phone')";
        $this->conn->connect()->query($query);
    }
}
