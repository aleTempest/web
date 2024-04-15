<?php
require_once '././models/boletos.php';

class BoletosController
{
    private Boleto $boletoModel;

    public function __construct()
    {
        $this->boletoModel = new Boleto();
    }
    //Mostrar la lista de Boletos
    public function index(): void
    {
        $peliculas = $this->boletoModel->getPeliculas();
        include './views/boletos/index.php';
    }
        //Mostrar la lista de Boletos
    public function list(): void
    {
        $boletos = $this->boletoModel->getBoletos();
        include './views/boletos/list.php';
    }
    //Eliminar un Boleto

    public function delete(): void
    {
        $id = $_GET['id'];
        $this->boletoModel->deleteBoleto($id);
        header('Location: ./index.php?controller=BoletosController&action=list');
    }
    //Editar un Boleto
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
        //    $pelicula = $_POST['pelicula'];
            $cliente = $_POST['cliente'];
            $boletos = $_POST['boletos'];
            $horario  = $_POST['horario'];
            $this->boletoModel->updateBoleto($id, $cliente, $boletos,$horario );
            header("Location: ./index.php?controller=BoletosController&action=list");
        } else {
            $id = $_GET['id'];
            $boleto = $this->boletoModel->getBoletoById($id);
            include './views/boletos/edit.php';
        }
    }
    //Agregar un nuevo Boleto
    public function add(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_pelicula = $_POST['pelicula_id'];
            $cliente = $_POST['cliente'];
            $cantidad = $_POST['cantidad_boletos'];
            $horario  = $_POST['horario'];

            $this->boletoModel->addBoleto($id_pelicula, $cliente, $cantidad,$horario);
            header("Location: ./index.php?controller=BoletosController&action=list");
        } else {
            include './views/boletos/add.php';
        }
    }
    //Ventas diarias
    public function ventas_diarias() {
        $boletos = $this->boletoModel->getVentasDiarias();
        require_once './views/boletos/ventas_diarias.php';
    }
    //Ventas por rango de fechas
    public function ventas_rango_fechas()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_fin = $_POST['fecha_fin'];
            $ventas = $this->boletoModel->getVentasPorRangoFechas($fecha_inicio, $fecha_fin);
            require_once './views/boletos/ventas_rango_fechas.php';
        } else {
            include './views/boletos/list.php';

        }
    }
    //Listado de clientes que ven más de "X" películas en un rango de fecha
    public function buscar_clientes_mas_peliculas()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $numPeliculas = $_POST['num_peliculas'];
            $fechaInicio = $_POST['fecha_inicio_2'];
            $fechaFin = $_POST['fecha_fin_2'];
            $clientes = $this->boletoModel->getClientesMasPeliculas($numPeliculas, $fechaInicio, $fechaFin);
            include './views/boletos/clientes_mas_peliculas.php';
        } else {
            // Si no es un POST, incluir la vista del formulario
            include './views/boletos/list.php';
        }
    }


    public function mostrarCarteleraFiltrada() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_fin = $_POST['fecha_fin'];
             $carteleras = $this->boletoModel->getCarteleraFiltrada($fecha_inicio, $fecha_fin);
            require_once './views/boletos/cartelera_filtrada.php';
        } else {
            include './views/boletos/list.php';
        }
    }
    
    

}
