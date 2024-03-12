<?php
require 'factory.php';

$id = $_GET['id'];
$vehicle_dao = createVehicleDao();
$item = $vehicle_dao->getVehicleById($id);
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<title>Modificar Vehículo</title>
	</head>
	<body>
		<div class="container">
			<h2>Editar Vehículo</h2>
			<form action="crud.php" method="post">
				<input type="hidden" name="id_vehicle" value="<?php  echo $item->getId()?>">
				<div class="form-group">
					<label for="brand">Marca</label>
					<input type="text" class="form-control" name="brand" value="<?php echo $item->getBrand() ?>">
				</div>
				<div class="form-group">
					<label for="v_type">Tipo</label>
					<input type="text" class="form-control" name="v_type" value="<?php echo $item->getVType() ?>">
				</div>
				<div class="form-group">
					<label for="v_type">Tipo</label>
					<input type="text" class="form-control" name="model" value="<?php echo $item->getModel() ?>">
				</div>
				<div class="form-group">
					<label for="v_type">Tipo</label>
					<input type="text" class="form-control" name="color" value="<?php echo $item->getColor() ?>">
				</div>
				<div class="form-group">
					<label for="v_type">Tipo</label>
					<input type="text" class="form-control" name="capacity" value="<?php echo $item->getCapacity() ?>">
				</div>
				<div class="form-group">
					<label for="v_type">Tipo</label>
					<input type="text" class="form-control" name="year" value="<?php echo $item->getYear() ?>">
				</div>
				<div class="form-group">
					<label for="v_type">Tipo</label>
					<input type="text" class="form-control" name="origin" value="<?php echo $item->getOrigin() ?>">
				</div>
				<button name="update_vehicle" class="btn btn-success">Guardar</button>
			</form>
		</div>
	</body>
</html>
