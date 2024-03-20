<?php
require 'credentials.php';

$id = $_GET['id'];
$sql = "SELECT * FROM vehicles WHERE id = $id";
$row = $conn->query($sql)->fetch_assoc();
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
				<input type="hidden" name="id_vehicle" value="<?php echo $row['id']?>">
				<div class="form-group">
					<label for="brand">Marca</label>
					<input type="text" class="form-control" name="brand" value="<?php echo $row['brand'] ?>">
				</div>
				<div class="form-group">
					<label for="sub_brand">Sub Marca</label>
					<input type="text" class="form-control" name="sub_brand" value="<?php echo $row['sub_brand'] ?>">
				</div>
				<div class="form-group">
					<label for="v_type">Tipo</label>
					<input type="text" class="form-control" name="v_type" value="<?php echo $row['type'] ?>">
				</div>
				<div class="form-group">
					<label for="v_type">Modelo</label>
					<input type="text" class="form-control" name="model" value="<?php echo $row['model'] ?>">
				</div>
				<div class="form-group">
					<label for="v_type">Color</label>
					<input type="text" class="form-control" name="color" value="<?php echo $row['color'] ?>">
				</div>
				<div class="form-group">
					<label for="v_type">Capacidad</label>
					<input type="text" class="form-control" name="capacity" value="<?php echo $row['capacity'] ?>">
				</div>
				<div class="form-group">
					<label for="v_type">Año</label>
					<input type="date" class="form-control" name="year" value="<?php echo $row['year'] ?>">
				</div>
				<div class="form-group">
					<label for="v_type">Origen</label>
					<input type="text" class="form-control" name="origin" value="<?php echo $row['origin'] ?>">
				</div>
				<button name="update_vehicle" class="btn btn-success">Guardar</button>
			</form>
		</div>
	</body>
</html>
