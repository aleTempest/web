<?php
require_once '././models/boletos.php';
$boletoModel = new Boleto();
$boletos = $boletoModel->getVentasDiarias();
?>

<div class="container-fluid mt-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h4 class="m-0 font-weight-bold text-primary">Ventas Diarias</h4>
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
                        <?php foreach ($boletos as $boleto): ?>
                            <tr>
                                <td>Id: <?= $boleto['ClienteID'] ?>
                                    <br>Nombre: <?= $boletoModel->getNombreCliente($boleto['ClienteID']) ?>
                                </td>
                                <td>Id: <?= $boleto['PeliculaID'] ?>
                                    <br>Nombre: <?= $boletoModel->getNombrePelicula($boleto['PeliculaID']) ?>
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
    </div>
</div>
