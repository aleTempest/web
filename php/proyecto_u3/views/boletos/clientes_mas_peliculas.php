<?php
    require_once '././models/boletos.php';
    $boletoModel = new Boleto();
    $boletos = $boletoModel->getVentasDiarias();
?>

<div class="container-fluid mt-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Clientes con más películas</h4>
            <a class="btn btn-success float-xl-right" href="index.php?controller=BoletosController&action=list"><i class="fa-solid fa-list"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Cliente ID</th>
                            <th>Total Películas</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientes as $cliente): ?>
                            <tr>
                                <td><?= $cliente['ClienteID'] ?></td>
                                <td><?= $cliente['total_peliculas'] ?></td>
                                <?php
                                    $nombreCliente = $boletoModel->getNombreCliente($cliente['ClienteID']);
                                ?>
                                <td><?= $nombreCliente ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
