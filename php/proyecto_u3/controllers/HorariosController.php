<?php
require_once './models/horarios.php';

class HorariosController
{
    private Horario $horarioModel;

    public function __construct()
    {
        $this->horarioModel = new Horario();
    }
    //Mostrar la lista de Horarios
    public function index(): void
    {
        $horarios = $this->horarioModel->getHorarios();
        include './views/horarios/index.php';
    }
    // Eliminar un horario

    public function delete(): void
    {
        $id = $_GET['id'];
        $this->horarioModel->deleteHorario($id);
        header('Location: ./index.php?controller=HorariosController&action=index');
    }
    // Editar un Horario
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $pelicula = $_POST['pelicula'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $this->horarioModel->updateHorario($id,$pelicula,$fecha,$hora);
            header("Location: ./index.php?controller=HorariosController&action=index");
        } else {
            $id = $_GET['id'];
            $horario = $this->horarioModel->getHorarioById($id);
            include './views/horarios/edit.php';
        }
    }
    // Agregar un nuevo horario
    public function add(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pelicula = $_POST['pelicula'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $this->horarioModel->addHorario($pelicula, $fecha, $hora);
            header("Location: ./index.php?controller=HorariosController&action=index");
        } else {
            include './views/horarios/add.php';
        }
    }
    
    
}
