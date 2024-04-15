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
                            <h4 class="m-0 font-weight-bold text-primary">Empleados</h6>
                                <a class="btn btn-success"
                                    href="./index.php?controller=EmployeesController&action=add"><i
                                        class="fa-solid fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>RFC</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th>Controles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($employees as $employee) {
                                        echo '<tr>';
                                        echo '<td>' . $employee['nombre'] . '</td>';
                                        echo '<td>' . $employee['rfc'] . '</td>';
                                        echo '<td>' . $employee['email'] . '</td>';
                                        echo '<td>' . $employee['telefono'] . '</td>';
                                        echo '<td><a class="btn btn-primary" href="./index.php?controller=EmployeesController&action=edit&id=' . $employee['id_empleado'] . '"><i class="fa-solid fa-pencil"></i></a> ';
                                        echo '<a class="btn btn-danger" href="./index.php?controller=EmployeesController&action=delete&id=' . $employee['id_empleado'] . '"><i class="fa-solid fa-trash"></i></a></td>';
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
