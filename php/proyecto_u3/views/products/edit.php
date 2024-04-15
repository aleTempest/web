<h1 class="mt-5 h3 mb-4 text-gray-800">Editar producto</h1>
<form method="post" action="./index.php?controller=ProductsController&action=edit">
    <input type="hidden" value="<?php echo $product['id_producto'] ?>" name="id">
    <div class="form-group">
        <label for="exampleFormControlFile1" for="product_image">Seleccionar imagen</label>
        <input type="file" class="form-control-file" value="<?php echo $product['img_url'] ?>" id="exampleFormControlFile1" name="product_image">
    </div>
    <div class="form-group">
        <label class="form-label" for="product_name">Nombre</label>
        <input type="text" name="product_name" class="form-control" value="<?php echo $product['nombre'] ?>" required>
    </div>
    <div class="form-group">
        <label class="form-label" for="product_price">Precio</label>
        <input type="number" name="product_price" class="form-control" value="<?php echo $product['precio'] ?>" required>
    </div>
    <div class="form-group">
        <label for="form-label" for="product_exists">Disponible</label>
        <input type="checkbox" name="product_exists" class="form-control" required <?php echo $product['existencia'] == 1
                                                                                        ? 'checked' : '' ?>>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
</div>
