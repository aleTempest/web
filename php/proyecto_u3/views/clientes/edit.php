<h1 class="mt-5 h3 mb-4 text-gray-800">Editar empleado</h1>
<form method="post" action="./index.php?controller=ClientesController&action=edit">
    <input type="hidden" name="id" value="<?php echo $cliente['ClienteID']; ?>">
    <div class="form-group">
        <label class="form-label" for="cliente_name">Nombre</label>
        <input type="text" name="cliente_name" class="form-control" value="<?php echo $cliente['Nombre']; ?>" required>
    </div>
    <div class="form-group">
        <label class="form-label" for="cliente_apellido">Apellido</label>
        <input type="text" name="cliente_apellido" class="form-control" value="<?php echo $cliente['Apellido']; ?>" required>
    </div>
    <div class="form-group">
        <label class="form-label" for="cliente_telefono">Teléfono</label>
        <input type="number" name="cliente_telefono" class="form-control" value="<?php echo $cliente['telefono']; ?>" required>
    </div>
    <div class="form-group">
        <label class="form-label" for="cliente_email">Email</label>
        <input type="email" name="cliente_email" class="form-control" value="<?php echo $cliente['Email']; ?>" required>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
