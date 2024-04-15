<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="mt-5 h3 mb-4 text-gray-800">Alta de clientes</h1>
            <form method="post" action="./index.php?controller=ClientesController&action=add">
                <div class="form-group">
                    <label class="form-label" for="cliente_name">Nombre</label>
                    <input type="text" name="cliente_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="cliente_apellido">Apellido</label>
                    <input type="text" name="cliente_apellido" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="cliente_telefono">Teléfono</label>
                    <input type="number" name="cliente_telefono" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="cliente_email">Email</label>
                    <input type="email" name="cliente_email" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
</div>
