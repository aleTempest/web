<?php
require_once '././models/Conection.php';

class Boleto
{
    private Conn $conn;
    //Constructor para inicializar la conexión a la base de datos
    public function __construct()
    {
        $this->conn = new Conn();
    }
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
    //Obtener todos los boletos de la base de datos
    public function getBoletos(): mysqli_result
    {
        $query = "SELECT * FROM boletos";
        return $this->conn->connect()->query($query);
    }
    //Obtener información de un Boleto específico por ID
    public function getBoletoById(int $id): array
    {
        $query = "SELECT * FROM boletos WHERE BoletoID  = $id";
        return $this->conn->connect()->query($query)->fetch_assoc();
    }
    //Eliminar un boleto por ID
    public function deleteBoleto(int $id): void
    {
        $query = "DELETE FROM boletos WHERE BoletoID = $id";
        $this->conn->connect()->query($query);
    }
    //Actualizar información de un boleto por ID
    public function updateBoleto(int $id,int  $cliente,int $boletos): void
    {
        $precio_total = $boletos * 67;
        $query = "UPDATE boletos SET  ClienteID = $cliente, Cantidad_boletos = $boletos, Precio_total = $precio_total WHERE BoletoID = $id";
        $this->conn->connect()->query($query);
    }
    //Agregar un nuevo boleto a la base de datos
    public function addBoleto(int $id_pelicula, int $cliente, int $cantidad, int $horario): void
    {
        //fecha actual
        $fecha = date("Y-m-d");
        //precio total multiplicando la cantidad de boletos por 67, QUE ES EL PRECIO DE CADA BOLETO
        $precio_total = $cantidad * 67;
        $query = "INSERT INTO boletos (ClienteID, PeliculaID, Fecha, Cantidad_boletos, Precio_total, HorarioID) VALUES ($cliente, $id_pelicula, '$fecha', $cantidad, $precio_total, $horario)";
        $this->conn->connect()->query($query);
    }
    public function countHorariosByPeliculas(int $peliculaID): int
    {
        $query = "SELECT COUNT(*) as total FROM horarios WHERE PeliculaID = $peliculaID";
        $result = $this->conn->connect()->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    public function getHorariosByPeliculaID(int $peliculaID): array
    {
        date_default_timezone_set('America/Mexico_City');
        $currentDateTime = date('Y-m-d H:i:s');
        $query = "SELECT * FROM horarios WHERE PeliculaID = $peliculaID AND Fecha >= CURDATE() AND CONCAT(Fecha, ' ', Hora) >= '$currentDateTime'";

        $result = $this->conn->connect()->query($query);
        $horarios = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $horarios[] = $row;
            }
        }
        return $horarios;
    }
    public function getVentasDiarias(): mysqli_result
    {
        $fecha_actual = date('Y-m-d');
        $query_ventas = "SELECT * FROM boletos WHERE Fecha = '$fecha_actual'";
        return $this->conn->connect()->query($query_ventas);
    }
    public function getNombreCliente(int $clienteID): string
    {
        $query = "SELECT Nombre FROM clientes WHERE ClienteID = $clienteID";
        $result = $this->conn->connect()->query($query);
        $nombreCliente = $result->fetch_assoc()['Nombre'];
        return $nombreCliente;
    }   
    public function getNombrePelicula(int $peliculaID): string
    {
        $query2 = "SELECT Titulo FROM peliculas WHERE PeliculaID = $peliculaID";
        $result2 = $this->conn->connect()->query($query2);
        $nombrePelicula = $result2->fetch_assoc()['Titulo'];
        return $nombrePelicula;
    }
    public function getInfoHorario(int $horarioID): array
    {
        $query = "SELECT Fecha, Hora FROM horarios WHERE HorarioID = $horarioID";
        $result = $this->conn->connect()->query($query);
        return $result->fetch_assoc();
    }

    public function getNombreGenero(int $generoID): string
    {
        $query = "SELECT Nombre FROM generos WHERE GeneroID = $generoID";
        $result = $this->conn->connect()->query($query);
        $nombreGenero = $result->fetch_assoc()['Nombre'];
        return $nombreGenero;

        /*        //nombre del género desde la tabla de géneros
        require_once './models/Conection.php';
        //instancia de la clase Conn para establecer la conexión a la base de datos
        $conn = new Conn();
        //conexión a la base de datos utilizando el método connect()
        $connection = $conn->connect();
        //Obtener el ID del género de la película actual del array $pelicula
        $generoID = $boleto['GeneroID'];
        //SQL para seleccionar el nombre del género
        $query = "SELECT Nombre FROM generos WHERE GeneroID = $generoID";
        //Ejecutar la consulta SQL 
        $result = $connection->query($query);
        //Obtener el nombre del género
        $generoNombre = $result->fetch_assoc()['Nombre'];
        //iMPRIMIR el nombre del generp
        echo '<p class="card-text">' . $generoNombre . '</p>';
        */
    }
    public function getVentasPorRangoFechas($fecha_inicio, $fecha_fin)
    {
        $query = "SELECT * FROM boletos WHERE Fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
        return $this->conn->connect()->query($query);
    }
    public function getClientesMasPeliculas(int $numPeliculas, string $fechaInicio, string $fechaFin): array
    {
        $query = "SELECT b.ClienteID, COUNT(*) AS total_peliculas
        FROM boletos b
        WHERE b.Fecha BETWEEN '$fechaInicio' AND '$fechaFin'
        GROUP BY b.ClienteID
        HAVING total_peliculas >= $numPeliculas";
        $result = $this->conn->connect()->query($query);
        $clientes = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $clientes[] = $row;
            }
        }
        return $clientes;
    }
 
    
    public function getCarteleraFiltrada(string $fecha_inicio, string $fecha_fin): array {
        $query = "SELECT DISTINCT p.* 
                  FROM peliculas p 
                  INNER JOIN horarios h ON p.PeliculaID = h.PeliculaID 
                  WHERE h.Fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
        $result = $this->conn->connect()->query($query);

        $carteleras = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $carteleras[] = $row;
            }
        }
        return $carteleras;
    }

    public function getHorariosDisponibles(int $pelicula_id) : array
    {
        // Obtener la fecha y hora actual en la zona horaria de Ciudad de México
        date_default_timezone_set('America/Mexico_City');
        $currentDateTime = date('Y-m-d H:i:s');
        // Separar la fecha y la hora actual
        list($currentDate, $currentTime) = explode(' ', $currentDateTime);
        // Consulta para obtener los horarios de la película
        $query = "SELECT * FROM horarios WHERE PeliculaID = $pelicula_id AND (Fecha > '$currentDate' OR (Fecha = '$currentDate' AND Hora >= '$currentTime'))";
        $result = $this->conn->connect()->query($query);
        $horarios = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $horarios[] = $row;
            }
        }
        return $horarios;
    }


}

