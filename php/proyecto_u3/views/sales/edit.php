<h1 class="mt-5 h3 mb-4 text-gray-800">Editar venta</h1>

<div class="table-responsive">
    <form action="./index.php?controller=SalesController&action=edit" method="post">
        <select name="id_employee" id="">
            <?php
            foreach ($employees as $employee) {
                $selected = $employee['id_empleado'] == $id_employee ? 'selected' : '';
                echo '<option value="' . $employee['id_empleado'] . '"' . $selected . '>' . $employee['nombre'] . '</option>';
            }
            ?>
        </select>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                <?php
                // array para almacenar los productos ya mostrados
                $done = array();
                foreach ($products_old as $product) {
                    echo '<tr>';
                    echo '<td>' . $product['nombre_producto'] . '</td>';
                    echo '<td>' . $product['precio'] . '</td>';
                    echo '<td>';
                    echo '<input type="hidden" value="' . $product['id_producto'] . '" name="product_ids[]">';
                    echo '<input type="number" value="' . $product['cantidad'] . '" name="products[]">';
                    $done[] = $product['id_producto'];
                    echo '</td>';
                    echo '</tr>';
                }

                foreach ($products_new as $product) {
                    // Si el producto ya está mostrado entonces no se agrega a la tabla
                    if (!in_array($product['id_producto'], $done)) {
                        echo '<tr>';
                        echo '<td>' . $product['nombre'] . '</td>';
                        echo '<td>' . $product['precio'] . '</td>';
                        echo '<td>';
                        echo '<input type="hidden" value="' . $product['id_producto'] . '" name="product_ids[]">';
                        echo '<input type="number" value="0" name="products[]">';
                        echo '</td>';
                        echo '</tr>';
                    }
                }
                ?>
                <button type="submit" class="btn btn-success">Guardar</button>
            </tbody>
        </table>
    </form>
</div>
