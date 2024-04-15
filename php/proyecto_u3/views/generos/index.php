<?php
require_once '././models/generos.php'; // Incluye el modelo de género
$generoModel = new Genero(); 
$generos = $generoModel->getGeneros(); 
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
                            <h2 class="m-0 font-weight-bold text-primary">Generos</h2>
                                <a class="btn btn-success"
                                    href="./index.php?controller=GenerosController&action=add"><i
                                        class="fa-solid fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Controles</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($generos as $genero): ?>
                                        <tr>
                                            <td><?= $genero['Nombre'] ?></td>
                                            <td>
                                                <a class="btn btn-primary" href="./index.php?controller=GenerosController&action=edit&id=<?= $genero['GeneroID'] ?>"><i class="fa-solid fa-pencil"></i></a>
                                                <?php
                                                // Verificar si hay películas asociadas a este género
                                                $generoID = $genero['GeneroID'];
                                                $totalPeliculas = $generoModel->countPeliculasByGeneroID($generoID);
                                                if ($totalPeliculas > 0) {
                                                    echo '<button class="btn btn-danger" disabled><i class="fa-solid fa-trash"></i></button>';
                                                } else {
                                                    echo '<a class="btn btn-danger" href="./index.php?controller=GenerosController&action=delete&id=' . $genero['GeneroID'] . '"><i class="fa-solid fa-trash"></i></a>';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        </tr>
                                        <?php endforeach; ?>
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
