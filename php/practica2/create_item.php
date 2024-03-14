<?php
require 'factory.php';

$cat_dao = createCatalogDao();
?>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<title>Catálogo</title>
	</head>
	<body>
		<div class="container">
			<h2>Añadir servicio al catálogo</h2>
			<form action="crud.php" method="post">
				<div class="form-group">
					<label for="desc">Descripción del servicio</label>
					<input type="text" name="desc" class="form-control">
				</div>
				<div class="form-group">
					<label for="cost">Costo</label>
					<input type="text" class="form-control" name="cost">
				</div>
				<button type="submit" class="btn btn-success" name="create_item">Guardar</button>
			</form>
		</div>
	</body>
</html>
