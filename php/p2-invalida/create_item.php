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
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="index.html">
				<img src="img/upvlogo.png" alt="logo" width="60" height="60">
					Index
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="vehicle_list.php">Vehículos <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="item_list.php">Catálogo</a>
					</li>
				</ul>
			</div>
		</nav>

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
