<h1 class="mt-5 h3 mb-4 text-gray-800">Alta de productos</h1>

<div class="table-responsive">
    <form action="./index.php?controller=SalesController&action=add" method="post">
        <div class="form-group">
            <select name="id_employee" class="form-control">
                <?php
                foreach ($employees as $employee) {
                    echo '<option value="' . $employee['id_empleado'] . '">' . $employee['nombre'] . '</option>';
                }
                ?>
            </select>
        </div>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($products as $product) {
                    echo '<tr>';
                    echo '<td>' . $product['nombre'] . '</td>';
                    echo '<td>' . $product['precio'] . '</td>';
                    echo '<td>';
                    echo '<input type="hidden" value="' . $product['id_producto'] . '" name="product_ids[]">';
                    echo '<input type="number" value="0" name="products[]">';
                    echo '</tr>';
                }
                ?>
                <button type="submit" class="btn btn-success">Guardar</button>
            </tbody>
        </table>
    </form>
</div>
