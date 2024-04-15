<?php
require_once '././models/clientes.php'; // Incluye el modelo de género
$clienteModel = new Cliente(); 
$clientes = $clienteModel->getClientes(); 
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
                            <h2 class="m-0 font-weight-bold text-primary">Clientes</h2>
                                <a class="btn btn-success"
                                    href="./index.php?controller=ClientesController&action=add"><i
                                        class="fa-solid fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th>Controles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($clientes as $cliente) {
                                        echo '<tr>';
                                        echo '<td>' . $cliente['Nombre'] . '</td>';
                                        echo '<td>' . $cliente['Apellido'] . '</td>';
                                        echo '<td>' . $cliente['Email'] . '</td>';
                                        echo '<td>' . $cliente['telefono'] . '</td>';
                                        echo '<td><a class="btn btn-primary" href="./index.php?controller=ClientesController&action=edit&id=' . $cliente['ClienteID'] . '"><i class="fa-solid fa-pencil"></i></a> ';
                                        $clienteID = $cliente['ClienteID'];
                                        $totalClientes = $clienteModel->countClientesByClienteID($clienteID);
                                        if ($totalClientes > 0) {
                                            echo '<button class="btn btn-danger" disabled><i class="fa-solid fa-trash"></i></button>';
                                        } else {
                                            echo '<a class="btn btn-danger" href="./index.php?controller=ClientesController&action=delete&id=' . $cliente['ClienteID'] . '"><i class="fa-solid fa-trash"></i></a>';
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
