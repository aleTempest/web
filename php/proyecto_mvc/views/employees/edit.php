<h1 class="mt-5 h3 mb-4 text-gray-800">Editar empleado</h1>
<form method="post" action="./index.php?controller=EmployeesController&action=edit">
    <input type="hidden" name="id" value="<?php echo $employee['id_empleado']; ?>">
    <div class="form-group">
        <label class="form-label" for="employee_name">Nombre</label>
        <input type="text" name="employee_name" class="form-control" value="<?php echo $employee['nombre']; ?>" required>
    </div>
    <div class="form-group">
        <label class="form-label" for="rfc">RFC</label>
        <input type="text" name="rfc" class="form-control" value="<?php echo $employee['rfc']; ?>" required>
    </div>
    <div class="form-group">
        <label class="form-label" for="employee_phone">Teléfono</label>
        <input type="number" name="employee_phone" class="form-control" value="<?php echo $employee['telefono']; ?>" required>
    </div>
    <div class="form-group">
        <label class="form-label" for="employee_email">Email</label>
        <input type="email" name="employee_email" class="form-control" value="<?php echo $employee['email']; ?>" required>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
