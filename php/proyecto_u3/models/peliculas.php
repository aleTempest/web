<?php
require_once './models/Conection.php';

class Pelicula
{
    private Conn $conn;
    //Constructor para inicializar la conexión a la base de datos
    public function __construct()
    {
        $this->conn = new Conn();
    }
    //Obtener todos los peliculas de la base de datos
    public function getPeliculas(): mysqli_result
    {
        $query = "SELECT * FROM peliculas";
        return $this->conn->connect()->query($query);
    }
    //Obtener información de un pelicula específico por ID
    public function getPeliculaById(int $id): array
    {
        $query = "SELECT * FROM peliculas WHERE PeliculaID  = $id";
        return $this->conn->connect()->query($query)->fetch_assoc();
    }
    //Eliminar un pelicula por ID
    public function deletePelicula(int $id): void
    {
        $query = "DELETE FROM peliculas WHERE PeliculaID   = $id";
        $this->conn->connect()->query($query);
    }
    //Actualizar información de un pelicula por ID
    public function updatePelicula(int $id, string $titulo,string $duracion,string $sinopsis, string  $idioma, string $genero, int $estado): void
    {
        $query = "UPDATE peliculas SET Titulo = '$titulo', Duracion = '$duracion', Sinopsis = '$sinopsis', Idioma = '$idioma', GeneroID = '$genero', estado='$estado' WHERE PeliculaID = $id";
        $this->conn->connect()->query($query);
    }
    public function addPelicula(string $titulo, string $duracion, string $sinopsis, string $idioma, string $genero, string $poster_name): void
    {
        $query = "INSERT INTO peliculas (Titulo, Duracion, Sinopsis, Idioma, GeneroID, Imagen,estado) 
                  VALUES ('$titulo', '$duracion', '$sinopsis', '$idioma', '$genero', '$poster_name', 1)";
        $result = $this->conn->connect()->query($query);
    }

    public function countPeliculasByBoletoID(int $peliculaID): int
    {
        $query = "SELECT COUNT(*) as total FROM boletos WHERE PeliculaID = $peliculaID";
        $result = $this->conn->connect()->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    
    public function countPeliculasByHorarioID(int $peliculaID2): int
    {
        $query = "SELECT COUNT(*) as total FROM horarios WHERE PeliculaID = $peliculaID2";
        $result = $this->conn->connect()->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    public function getGeneros(): array
    {
        $query = "SELECT * FROM generos";
        $result = $this->conn->connect()->query($query);
        $generos = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $generos[] = $row;
            }
        }
        return $generos;
    }

    
    

}
