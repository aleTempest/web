<?php
require_once './models/Conection.php';

class Horario
{
    private Conn $conn;
    //Constructor para inicializar la conexión a la base de datos
    public function __construct()
    {
        $this->conn = new Conn();
    }
    //Obtener todos los Horarios de la base de datos
    public function getHorarios(): mysqli_result
    {
        $query = "SELECT * FROM horarios";
        return $this->conn->connect()->query($query);
    }
    //Obtener información de un horario específico por ID
    public function getHorarioById(int $id): array
    {
        $query = "SELECT * FROM horarios WHERE HorarioID  = $id";
        return $this->conn->connect()->query($query)->fetch_assoc();
    }
    //Eliminar un Horario por ID
    public function deleteHorario(int $id): void
    {
        $query = "DELETE FROM horarios WHERE HorarioID = $id";
        $this->conn->connect()->query($query);
    }
    //Actualizar información de un Horario por ID
    public function updateHorario(int $id, string $pelicula, string $fecha, string $hora): void
    {
        $fecha = date_create($fecha)->format('Y-m-d');
        $query = "UPDATE horarios SET PeliculaID = '$pelicula', Fecha = '$fecha', Hora = '$hora' WHERE HorarioID = $id";
        $this->conn->connect()->query($query);
    }
    //Agregar un nuevo Horario a la base de datos
    public function addHorario(string $pelicula, string $fecha, string $hora): void
    {
        $fecha = date_create($fecha)->format('Y-m-d');
        $query = "INSERT INTO horarios (PeliculaID, Fecha, Hora) VALUES ('$pelicula', '$fecha', '$hora')";
        $this->conn->connect()->query($query);
    }
    
    public function countHorariosByBoletos(int $horarioID): int
    {
        $query = "SELECT COUNT(*) as total FROM boletos WHERE HorarioID = $horarioID";
        $result = $this->conn->connect()->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    public function getNombrePelicula(int $peliculaID): string
{
    $query = "SELECT Titulo FROM peliculas WHERE PeliculaID = $peliculaID";
    $result = $this->conn->connect()->query($query);
    $nombrePelicula = $result->fetch_assoc()['Titulo'];
    return $nombrePelicula;
}

    
    
}
