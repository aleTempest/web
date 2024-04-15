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
                            <h4 class="m-0 font-weight-bold text-primary">Ventas</h6>
                                <a class="btn btn-success" href="./index.php?controller=SalesController&action=add"><i class="fa-solid fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th>Controles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($sales as $sale) {
                                        echo '<tr>';
                                        echo '<td>' . $sale['fecha'] . '</td>';
                                        echo '<td>' . $sale['total'] . '</td>';
                                        echo '<td><a class="btn btn-primary" href="./index.php?controller=SalesController&action=edit&id=' . $sale['id_venta'] . '"><i class="fa-solid fa-pencil"></i></a> ';
                                        echo '<a class="btn btn-danger" href="./index.php?controller=SalesController&action=delete&id=' . $sale['id_venta'] . '"><i class="fa-solid fa-trash"></i></a></td>';
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
