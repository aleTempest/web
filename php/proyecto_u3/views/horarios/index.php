<?php
require_once '././models/horarios.php'; // Incluye el modelo de género
$horarioModel = new Horario(); 
$horarios = $horarioModel->getHorarios(); 
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
                            <h2 class="m-0 font-weight-bold text-primary">Horarios</h2>
                                <a class="btn btn-success"
                                    href="./index.php?controller=HorariosController&action=add"><i
                                        class="fa-solid fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Pelicula</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Controles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($horarios as $horario) {
                                        echo '<tr>';  
                                        $nombrePelicula = $horarioModel->getNombrePelicula($horario['PeliculaID']);
                                     

                                        echo '<td>' . $nombrePelicula . '</td>';
                                        echo '<td>' . $horario['Fecha'] . '</td>';
                                        echo '<td>' . $horario['Hora'] . '</td>';
                                        echo '<td><a class="btn btn-primary" href="./index.php?controller=HorariosController&action=edit&id=' . $horario['HorarioID'] . '"><i class="fa-solid fa-pencil"></i></a> ';
                                        
                                        $horarioID = $horario['HorarioID'];
                                        $totalHorarios = $horarioModel->countHorariosByBoletos($horarioID);
                                            if ($totalHorarios > 0) {
                                                echo '<button class="btn btn-danger" disabled><i class="fa-solid fa-trash"></i></button>';
                                            } else {
                                                echo '<a class="btn btn-danger" href="./index.php?controller=HorariosController&action=delete&id=' . $horario['HorarioID'] . '"><i class="fa-solid fa-trash"></i></a></td>';
                                            }
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
