<?php
require_once './models/Conection.php';

class Cliente
{
    private Conn $conn;
    //Constructor para inicializar la conexión a la base de datos
    public function __construct()
    {
        $this->conn = new Conn();
    }
    //Obtener todos los clientes de la base de datos
    public function getClientes(): mysqli_result
    {
        $query = "SELECT * FROM clientes";
        return $this->conn->connect()->query($query);
    }
    //Obtener información de un cliente específico por ID
    public function getClienteById(int $id): array
    {
        $query = "SELECT * FROM clientes WHERE ClienteID  = $id";
        return $this->conn->connect()->query($query)->fetch_assoc();
    }
    //Eliminar un cliente por ID
    public function deleteCliente(int $id): void
    {
        $query = "DELETE FROM clientes WHERE ClienteID   = $id";
        $this->conn->connect()->query($query);
    }
    //Actualizar información de un cliente por ID
    public function updateCliente(int $id, string $name, string $apellido, string $email, int $phone): void
    {
        $query = "UPDATE clientes SET Nombre = '$name', Apellido = '$apellido', Email = '$email', telefono = '$phone' WHERE ClienteID = $id";
        $this->conn->connect()->query($query);
    }
    //Agregar un nuevo cliente a la base de datos
    public function addCliente(string $name, string $apellido, string $email, int $phone): void
    {
        $query = "INSERT INTO clientes (Nombre, Apellido, Email, telefono) VALUES ('$name', '$apellido', '$email', '$phone')";
        $this->conn->connect()->query($query);
    }
    public function countClientesByClienteID(int $clienteID): int
    {
        $query = "SELECT COUNT(*) as total FROM boletos WHERE ClienteID = $clienteID";
        $result = $this->conn->connect()->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
}
