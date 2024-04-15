<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="mt-5 h3 mb-4 text-gray-800">Alta de Horario</h1>
            <form method="post" action="./index.php?controller=HorariosController&action=add">
                <div class="form-group">
                    <label class="form-label" for="pelicula">PeliculaID</label>
                    <select name="pelicula" class="form-control" required>
                        <?php
                        require_once './models/Conection.php';

                        // conexión
                        $conn = new Conn();
                        $connection = $conn->connect();
                        //Consulta para obtener los géneros
                        $query = "SELECT * FROM peliculas";
                        $result = $connection->query($query);

                        //Mostrar opciones de género
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value=\"" . $row['PeliculaID'] . "\">" . $row['Titulo'] . "</option>";
                        }

                        // Cerrar conexión
                        $connection->close();
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="fecha">Fecha</label>
                    <input type="date" name="fecha" class="form-control" min="<?= date('Y-m-d') ?>" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="hora">Hora</label>
                    <input type="time" name="hora" class="form-control" required>
                </div>
                
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
</div>
