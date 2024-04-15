<?php
require_once '././models/peliculas.php'; 
$peliculaModel = new Pelicula(); 
$peliculas = $peliculaModel->getPeliculas(); 
?>
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="mt-5 h3 mb-4 text-gray-800">Alta de Peliculas</h1>
            <form method="post" action="./index.php?controller=PeliculasController&action=add" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label" for="pelicula_titulo">Titulo</label>
                    <input type="text" name="pelicula_titulo" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="pelicula_duracion">Duracion (minutos)</label>
                    <input type="number" name="pelicula_duracion" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="pelicula_sinopsis">Sinopsis</label>
                    <input type="text" name="pelicula_sinopsis" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="pelicula_idioma">Idioma</label>
                    <input type="text" name="pelicula_idioma" class="form-control" required>
                </div>                
                <div class="form-group">
                    <label class="form-label" for="pelicula_genero">Genero</label>
                    <select name="pelicula_genero" class="form-control" required>
                        
                    <?php 
                    $generos = $peliculaModel->getGeneros();
                    foreach ($generos as $genero): ?>
                        <option value="<?= $genero['GeneroID'] ?>"><?= $genero['Nombre'] ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="pelicula_imagen">Poster</label>
                    <input type="file" name="pelicula_imagen" class="form-control-file" accept="image/*" required>
                </div>
              
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
</div>
