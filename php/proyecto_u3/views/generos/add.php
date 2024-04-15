<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="mt-5 h3 mb-4 text-gray-800">Alta de Generos</h1>
            <form method="post" action="./index.php?controller=GenerosController&action=add">
                <div class="form-group">
                    <label class="form-label" for="genero_name">Nombre</label>
                    <input type="text" name="genero_name" class="form-control" required>
                </div>
              
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
</div>
