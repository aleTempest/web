<?php
require_once '././models/peliculas.php'; 
$peliculaModel = new Pelicula(); 
$peliculas = $peliculaModel->getPeliculas(); 
?>
<div id="wrapper">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid mt-4">

                <!-- Page Heading -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between">
                            <h2 class="m-0 font-weight-bold text-primary">Peliculas</h2>
                                <a class="btn btn-success"
                                    href="./index.php?controller=PeliculasController&action=add"><i
                                        class="fa-solid fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th>Duración</th>
                                        <th>Sinopsis</th>
                                        <th>Idioma</th>
                                        <th>Genero</th>
                                        <th>Estado</th>
                                        <th>Controles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($peliculas as $pelicula) {
                                        echo '<tr>';
                                        echo '<td>' . $pelicula['Titulo'] . '</td>';
                                        echo '<td>' . $pelicula['Duracion'] . '</td>';
                                        echo '<td>' . $pelicula['Sinopsis'] . '</td>';
                                        echo '<td>' . $pelicula['Idioma'] . '</td>';
                                        //nombre del género desde la tabla de géneros
                                        require_once './models/Conection.php';
                                       //instancia de la clase Conn para establecer la conexión a la base de datos
                                        $conn = new Conn();
                                        //conexión a la base de datos utilizando el método connect()
                                        $connection = $conn->connect();
                                        //Obtener el ID del género de la película actual del array $pelicula
                                        $generoID = $pelicula['GeneroID'];
                                        //SQL para seleccionar el nombre del género
                                        $query = "SELECT Nombre FROM generos WHERE GeneroID = $generoID";
                                        //Ejecutar la consulta SQL 
                                        $result = $connection->query($query);
                                        //Obtener el nombre del género
                                        $generoNombre = $result->fetch_assoc()['Nombre'];
                                        //iMPRIMIR el nombre del generp
                                        echo '<td>' . $generoNombre . '</td>';
                                        echo '<td>' . $pelicula['estado'] . '</td>';
                                        echo '<td><a class="btn btn-primary" href="./index.php?controller=PeliculasController&action=edit&id=' . $pelicula['PeliculaID'] . '"><i class="fa-solid fa-pencil"></i></a> ';
                                        //Verificar si hay películas asociadas a este género
                                        $peliculaID = $pelicula['PeliculaID'];
                                        $totalPeliculas = $peliculaModel->countPeliculasByBoletoID($peliculaID);

                                        $peliculaID2 = $pelicula['PeliculaID'];
                                        $totalPeliculas2 = $peliculaModel->countPeliculasByHorarioID($peliculaID2);
                                        if ($totalPeliculas > 0 || $totalPeliculas2 > 0) {
                                            echo '<button class="btn btn-danger" disabled><i class="fa-solid fa-trash"></i></button>';
                                        } else {
                                                echo '<a class="btn btn-danger" href="./index.php?controller=PeliculasController&action=delete&id=' . $pelicula['PeliculaID'] . '"><i class="fa-solid fa-trash"></i></a>';
                                        }
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
