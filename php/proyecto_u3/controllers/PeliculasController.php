<?php
require_once './models/peliculas.php';

class PeliculasController
{
    private Pelicula $peliculaModel;

    public function __construct()
    {
        $this->peliculaModel = new Pelicula();
    }
    //Mostrar la lista de Peliculas
    public function index(): void
    {
        $peliculas = $this->peliculaModel->getPeliculas();
        include './views/peliculas/index.php';
    }
    //Eliminar un pelicula

    public function delete(): void
    {
        $id = $_GET['id'];
        $this->peliculaModel->deletePelicula($id);
        header('Location: ./index.php?controller=PeliculasController&action=index');
    }
    //Editar un Pelicula
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['pelicula_name'];
            $titulo = $_POST['pelicula_titulo'];
            $duracion = $_POST['pelicula_duracion'];
            $sinopsis = $_POST['pelicula_sinopsis'];
            $idioma = $_POST['pelicula_idioma'];
            $genero = $_POST['pelicula_genero'];
            $estado = $_POST['estado_pelicula'];
            $this->peliculaModel->updatePelicula($id, $titulo, $duracion, $sinopsis, $idioma, $genero, $estado);
            header("Location: ./index.php?controller=PeliculasController&action=index");
        } else {
            $id = $_GET['id'];
            $pelicula = $this->peliculaModel->getPeliculaById($id);
            include './views/peliculas/edit.php';
        }
    }
    public function add(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['pelicula_imagen']) && $_FILES['pelicula_imagen']['error'] === UPLOAD_ERR_OK) {
                $titulo = $_POST['pelicula_titulo'];
                $duracion = $_POST['pelicula_duracion'];
                $sinopsis = $_POST['pelicula_sinopsis'];
                $idioma = $_POST['pelicula_idioma'];
                $genero = $_POST['pelicula_genero'];
                $poster_tmp = $_FILES['pelicula_imagen']['tmp_name'];// archivo temporal
                $poster_name = $_FILES['pelicula_imagen']['name']; //nombre del archivo
                //Carpeta de destino para guardar la imagen
                $targetDir = "./views/ImgPeliculas/";
                //nombre único para la imagen
                $fileName = uniqid() . '_' . basename($poster_name);
                //Ruta completa del archivo de destino
                $targetFilePath = $targetDir . $fileName;
                //Mover el archivo temporal a la carpeta de destino
                if (move_uploaded_file($poster_tmp, $targetFilePath)) {
                    $this->peliculaModel->addPelicula($titulo, $duracion, $sinopsis, $idioma, $genero, $fileName);
                    header("Location: ./index.php?controller=PeliculasController&action=index");
                }
            } else {
                echo "<script>alert('Debe seleccionar una imagen.');</script>";
            }
        } else {
            include './views/peliculas/add.php';
        }
    }

}
