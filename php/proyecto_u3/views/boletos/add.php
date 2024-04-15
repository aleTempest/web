<?php
require_once '././models/clientes.php'; 
$clienteModel = new Cliente(); 
$clientes = $clienteModel->getClientes(); 
require_once '././models/boletos.php'; 
$boletoModel = new Boleto(); 
$boletos = $boletoModel->getPeliculas(); 

?>
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="mt-5 h3 mb-4 text-gray-800">Alta de compra de boletos</h1>
            <form method="post" action="./index.php?controller=BoletosController&action=add">
                <!--Input para el ID de la película -->
                <input type="hidden" name="pelicula_id" value="<?php echo $_GET['pelicula_id']; ?>">
                <div class="form-group">
                    <label class="form-label" for="cliente">Cliente</label>
                    <select name="cliente" class="form-control" required>
                        <?php
                        $clienteID = $cliente['ClienteID'];
                        $clientes = $clienteModel->getClientes($clienteID);
                        foreach ($clientes as $cliente) {
                            echo "<option value=\"" . $cliente['ClienteID'] . "\">" . $cliente['Nombre'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                           <!-- Input para seleccionar el horario -->
                <div class="form-group">
                    <label class="form-label" for="horario">Horario</label>
                    <select name="horario" class="form-control" required>
                        <?php
                        $pelicula_id = $_GET['pelicula_id'];
                        $horarios = $boletoModel->getHorariosDisponibles($pelicula_id);
                        foreach ($horarios as $horario) {
                            echo "<option value=\"" . $horario['HorarioID'] . "\">" . $horario['Fecha'] . " - " . $horario['Hora'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                
                <!-- Input para la cantidad de boletos -->
                <div class="form-group">
                    <label class="form-label" for="cantidad_boletos">Cantidad de boletos</label>
                    <input type="number" name="cantidad_boletos" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
</div>
