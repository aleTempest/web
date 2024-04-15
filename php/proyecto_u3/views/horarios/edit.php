<h1 class="mt-5 h3 mb-4 text-gray-800">Editar Horario</h1>
<form method="post" action="./index.php?controller=HorariosController&action=edit">
    <input type="hidden" name="id" value="<?php echo $horario['HorarioID']; ?>">
    <div class="form-group">
        <label class="form-label" for="pelicula">Película</label>
        <select name="pelicula" class="form-control" required>
            <?php
            require_once './models/Conection.php';
            //Obtener las l¿peliculas
            $conn = new Conn();
            $connection = $conn->connect();
            $query = "SELECT * FROM peliculas";
            $result = $connection->query($query);
            $peliculas = $result->fetch_all(MYSQLI_ASSOC);
            //Recorre la lista de peliculas y crea una opción para cada uno
            foreach ($peliculas as $pelicula) {
                //Verifica si la pelicula actual coincide
                $selected = ($pelicula['PeliculaID'] == $horario['PeliculaID']) ? 'selected' : '';
                echo "<option value=\"" . $pelicula['PeliculaID'] . "\" $selected>" . $pelicula['Titulo'] . "</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label class="form-label" for="fecha">Fecha</label>
        <input type="date" name="fecha" class="form-control" min="<?= date('Y-m-d') ?>" value="<?php echo $horario['Fecha']; ?>" required>
    </div>
    <div class="form-group">
        <label class="form-label" for="hora">Hora</label>
        <input type="time" name="hora" class="form-control" value="<?php echo $horario['Hora']; ?>" required>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
