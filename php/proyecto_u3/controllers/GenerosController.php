<?php
require_once './models/generos.php';

class GenerosController
{
    private Genero $generoModel;

    public function __construct()
    {
        $this->generoModel = new Genero();
    }
    //Mostrar la lista de generos
    public function index(): void
    {
        $generos = $this->generoModel->getGeneros();
        include './views/generos/index.php';
    }
    //Eliminar un genero

    public function delete(): void
    {
        $id = $_GET['id'];
        $this->generoModel->deleteGenero($id);
        header('Location: ./index.php?controller=GenerosController&action=index');
    }
    //Editar un genero
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['genero_name'];
            $this->generoModel->updateGenero($id, $name);
            header("Location: ./index.php?controller=GenerosController&action=index");
        } else {
            $id = $_GET['id'];
            $genero = $this->generoModel->getGeneroById($id);
            include './views/generos/edit.php';
        }
    }
    //Agregar un nuevo genero
    public function add(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['genero_name'];
            $this->generoModel->addGenero($name);
            header("Location: ./index.php?controller=GenerosController&action=index");
        } else {
            include './views/generos/add.php';
        }
    }
}
