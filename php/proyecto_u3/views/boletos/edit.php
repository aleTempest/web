<h1 class="mt-5 h3 mb-4 text-gray-800">Editar venta de boleto</h1>
<form method="post" action="./index.php?controller=BoletosController&action=edit">
    <input type="hidden" name="id" value="<?php echo $boleto['boletoID']; ?>">
    <!--<div class="form-group">
        <label class="form-label" for="pelicula">Pelicula</label>
        <select name="pelicula" class="form-control" required>
            <?php
            require_once './models/Conection.php';
            $conn = new Conn();
            $connection = $conn->connect();
            $query_peliculas = "SELECT * FROM peliculas";
            $result_peliculas = $connection->query($query_peliculas);
            $peliculas = $result_peliculas->fetch_all(MYSQLI_ASSOC);
            //Recorre la lista y crea una opción para cada uno
            foreach ($peliculas as $pelicula) {
                //Verifica si coincide con el ID de la tabla
                $selected = ($pelicula['PeliculaID'] == $boleto['PeliculaID']) ? 'selected' : '';
                echo "<option value=\"" . $pelicula['PeliculaID'] . "\" $selected>" . $pelicula['Titulo'] . "</option>";
            }
            ?>
        </select>
    </div>-->

    <div class="form-group">
        <label class="form-label" for="cliente">Cliente</label>
        <select name="cliente" class="form-control" required>
            <?php
            require_once './models/Conection.php';
            $conn = new Conn();
            $connection = $conn->connect();
            $query_clientes = "SELECT * FROM clientes";
            $result_clientes = $connection->query($query_clientes);
            $clientes = $result_clientes->fetch_all(MYSQLI_ASSOC);
            //Recorre la lista y crea una opción para cada uno
            foreach ($clientes as $cliente) {
                //Verifica si coincide con el ID de la tabla
                $selected = ($cliente['ClienteID'] == $boleto['ClienteID']) ? 'selected' : '';
                echo "<option value=\"" . $cliente['ClienteID'] . "\" $selected>" . $cliente['Nombre'] . "</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label class="form-label" for="horario">Horario</label>
        <select name="horario" class="form-control" required>
            <?php
            require_once './models/Conection.php';
            $conn = new Conn();
            $connection = $conn->connect();
            //Obtener la fecha y hora actual en la zona horaria de Ciudad de México
            date_default_timezone_set('America/Mexico_City');
            $currentDateTime = date('Y-m-d H:i:s');
            //Separar la fecha y la hora actual
            list($currentDate, $currentTime) = explode(' ', $currentDateTime);
            // Consulta para obtener los horarios de la película a partir de la fecha y hora actual
            $query_horarios = "SELECT * FROM horarios WHERE PeliculaID = {$boleto['PeliculaID']} AND (Fecha > '$currentDate' OR (Fecha = '$currentDate' AND Hora >= '$currentTime'))";
            $result_horarios = $connection->query($query_horarios);
            $horarios = $result_horarios->fetch_all(MYSQLI_ASSOC);
            //Recorre la lista y crea una opción para cada horario
            foreach ($horarios as $horario) {
                $selected = ($horario['HorarioID'] == $boleto['HorarioID']) ? 'selected' : '';
                echo "<option value=\"" . $horario['HorarioID'] . "\" $selected>" . $horario['Fecha'] . ' ' . $horario['Hora'] . "</option>";
            }
            ?>
        </select>
    </div>


    <div class="form-group">
        <label class="form-label" for="boletos">Cantidad de boletos</label>
        <input type="text" name="boletos" class="form-control" value="<?php echo $boleto['Cantidad_boletos']; ?>" required>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
