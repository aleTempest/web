<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="mt-5 h3 mb-4 text-gray-800">Alta de empleado</h1>
            <form method="post" action="./index.php?controller=EmployeesController&action=add">
                <div class="form-group">
                    <label class="form-label" for="employee_name">Nombre</label>
                    <input type="text" name="employee_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="rfc">RFC</label>
                    <input type="text" name="rfc" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="employee_phone">Teléfono</label>
                    <input type="number" name="employee_phone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="employee_email">Email</label>
                    <input type="email" name="employee_email" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
</div>
