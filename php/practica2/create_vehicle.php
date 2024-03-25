<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<title>Añadir Vehículo</title>
	</head>
	<body>
		<div class="container">
			<h2>Editar Vehículo</h2>
			<form action="crud.php" method="post">
				<div class="form-group">
					<label for="brand">Marca</label>
					<input type="text" class="form-control" name="brand" >
				</div>
				<div class="form-group">
					<label for="sub_brand">Sub Marca</label>
					<input type="text" class="form-control" name="sub_brand" >
				</div>
				<div class="form-group">
					<label for="v_type">Tipo</label>
					<input type="text" class="form-control" name="v_type" >
				</div>
				<div class="form-group">
					<label for="model">Modelo</label>
					<input type="text" class="form-control" name="model" >
				</div>
				<div class="form-group">
					<label for="color">Color</label>
					<input type="text" class="form-control" name="color" >
				</div>
				<div class="form-group">
					<label for="capacity">Capacidad</label>
					<input type="text" class="form-control" name="capacity" >
				</div>
				<div class="form-group">
					<label for="year">Año</label>
					<input type="date" class="form-control" name="year" >
				</div>
				<div class="form-group">
					<label for="origin">Procedencia</label>
					<input type="text" class="form-control" name="origin" >
				</div>
				<button name="create_vehicle" class="btn btn-success">Guardar</button>
			</form>
		</div>
	</body>
</html>
