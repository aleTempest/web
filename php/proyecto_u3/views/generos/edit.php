<h1 class="mt-5 h3 mb-4 text-gray-800">Editar empleado</h1>
<form method="post" action="./index.php?controller=GenerosController&action=edit">
    <input type="hidden" name="id" value="<?php echo $genero['GeneroID']; ?>">
    <div class="form-group">
        <label class="form-label" for="genero_name">Nombre</label>
        <input type="text" name="genero_name" class="form-control" value="<?php echo $genero['Nombre']; ?>" required>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
