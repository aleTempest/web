<?php
require_once '././models/boletos.php';
$boletoModel = new Boleto();
$boletos = $boletoModel->getVentasDiarias();
?>

<div class="container-fluid mt-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h4 class="m-0 font-weight-bold text-primary">Ventas por rango de fecha </h4>
                <a class="btn btn-success float-xl-right" href="index.php?controller=BoletosController&action=list"><i class="fa-solid fa-list"></i></a>
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
                        <?php foreach ($ventas as $venta): ?>
                            <tr>
                                <td>Id: <?= $venta['ClienteID'] ?>
                                    <br>Nombre: <?= $boletoModel->getNombreCliente($venta['ClienteID']) ?>
                                </td>
                                <td>Id: <?= $venta['PeliculaID'] ?>
                                    <br>Nombre: <?= $boletoModel->getNombrePelicula($venta['PeliculaID']) ?>
                                </td>
                                <td><?= $venta['Fecha'] ?></td>
                                <td><?= $venta['Cantidad_boletos'] ?></td>
                                <td><?= $venta['Precio_total'] ?></td>
                                <td>
                                    <?php
                                        $horarioInfo = $boletoModel->getInfoHorario($venta['HorarioID']);
                                        echo $horarioInfo['Fecha'] . ' ' . $horarioInfo['Hora'];
                                    ?>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="./index.php?controller=BoletosController&action=edit&id=<?= $venta['boletoID'] ?>">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <a class="btn btn-danger" href="./index.php?controller=BoletosController&action=delete&id=<?= $venta['boletoID'] ?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
