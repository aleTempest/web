<?php
require_once '././models/clientes.php'; 
$boletoModel = new Boleto(); 
$boletos = $boletoModel->getBoletos(); 
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
                            <h2 class="m-0 font-weight-bold text-primary">Venta de boletos</h2>
                            <a class="btn btn-primary mb-2" href="./index.php?controller=BoletosController&action=ventas_diarias">Ventas Diarias</a>
                                <a class="btn btn-success"
                                    href="./index.php?controller=BoletosController&action=index"><i
                                        class="fa-solid fa-plus"></i></a>
                                        <form action="./index.php?controller=BoletosController&action=ventas_rango_fechas" method="POST">
                        </div>                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Cliente</th>
                                        <th>Pelicula</th>
                                        <th>Fecha</th>
                                        <th>Cantidad de boletos</th>
                                        <th>Precio total</th>
                                        <th>Horario</th>
                                        <th>Controles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($boletos as $boleto): ?>
                                        <tr>
                                            <td>Id: <?= $boleto['ClienteID'] ?>
                                            <br>Nombre: <?= $boletoModel->getNombreCliente($boleto['ClienteID']) ?>
                                            </td>
                                    
                                        </td>
                                            <td>Id: <?= $boleto['PeliculaID'] ?>
                                            <br>Nombre: <?= $boletoModel->getNombrePelicula($boleto['PeliculaID']) ?>
                                            </td>
                                                                
                                        </td>
                                            <td><?= $boleto['Fecha'] ?></td>
                                            <td><?= $boleto['Cantidad_boletos'] ?></td>
                                            <td><?= $boleto['Precio_total'] ?></td>
                                            <td>
                                            <?php
                                                $horarioInfo = $boletoModel->getInfoHorario($boleto['HorarioID']);
                                                echo $horarioInfo['Fecha'] . ' ' . $horarioInfo['Hora'];
                                            ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary" href="./index.php?controller=BoletosController&action=edit&id=<?= $boleto['boletoID'] ?>">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-danger" href="./index.php?controller=BoletosController&action=delete&id=<?= $boleto['boletoID'] ?>">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <div class="mb-4 mr-4">
                            <form action="./index.php?controller=BoletosController&action=ventas_rango_fechas" method="POST">
                            <h5 class="m-0 font-weight-bold text-primary">Venta por rango de fecha</h6>

                                <div class="form-group">
                                    <label for="fecha_inicio">Fecha de inicio:</label>
                                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_fin">Fecha de fin:</label>
                                    <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </form>
                        </div>
                        <div class="mb-4">
                        <form action="./index.php?controller=BoletosController&action=buscar_clientes_mas_peliculas" method="POST">
                            <h5 class="m-0 font-weight-bold text-primary">Clientes que ven más películas en un rango de fecha</h6>

                            <div class="form-group">
                                    <label for="num_peliculas">Número de películas:</label>
                                    <input type="number" class="form-control" id="num_peliculas" name="num_peliculas" required>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_inicio_2">Fecha de inicio:</label>
                                    <input type="date" class="form-control" id="fecha_inicio_2" name="fecha_inicio_2" required>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_fin_2">Fecha de fin:</label>
                                    <input type="date" class="form-control" id="fecha_fin_2" name="fecha_fin_2" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </form>
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