<?php
require_once '././models/peliculas.php'; 
$peliculaModel = new Pelicula(); 
$peliculas = $peliculaModel->getPeliculas(); 
?>
<h1 class="mt-5 h3 mb-4 text-gray-800">Editar Pelicula</h1>
<form method="post" action="./index.php?controller=PeliculasController&action=edit">
    <input type="hidden" name="id" value="<?php echo $pelicula['PeliculaID']; ?>">
    <div class="form-group">
        <label class="form-label" for="pelicula_titulo">Titulo</label>
    <input type="text" name="pelicula_titulo" class="form-control" value="<?php echo $pelicula['Titulo']; ?>" required>
    </div>
    <div class="form-group">
        <label class="form-label" for="pelicula_duracion">Duracion (minutos)</label>
        <input type="number" name="pelicula_duracion" class="form-control" value="<?php echo $pelicula['Duracion']; ?>" required>
    </div>
    <div class="form-group">
        <label class="form-label" for="pelicula_sinopsis">Sinopsis</label>
        <input type="text" name="pelicula_sinopsis" class="form-control" value="<?php echo $pelicula['Sinopsis']; ?>" required>
    </div>
    <div class="form-group">
        <label class="form-label" for="pelicula_idioma">Idioma</label>
        <input type="text" name="pelicula_idioma" class="form-control" value="<?php echo $pelicula['Idioma']; ?>" required>
    </div>    
    <div class="form-group">
        <label class="form-label" for="pelicula_genero">Genero</label>
        <select name="pelicula_genero" class="form-control" required>
            <?php
            $generos = $peliculaModel->getGeneros();
            // Recorre la lista de géneros y crea una opción para cada uno
            foreach ($generos as $genero) {
                // Verifica si el género actual coincide con el género de la película
                $selected = ($genero['GeneroID'] == $pelicula['GeneroID']) ? 'selected' : '';
                echo "<option value=\"" . $genero['GeneroID'] . "\" $selected>" . $genero['Nombre'] . "</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
    <label class="form-label" for="estado_pelicula">Estado de la Película</label>
    <select name="estado_pelicula" class="form-control" required>
        <option value="1" <?php echo ($pelicula['estado'] == 1) ? 'selected' : ''; ?>>Activa</option>
        <option value="0" <?php echo ($pelicula['estado'] == 0) ? 'selected' : ''; ?>>Inactiva</option>
    </select>
</div>

    
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
