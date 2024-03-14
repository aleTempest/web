<?php
require 'factory.php';

$id = $_GET['id'];
$cat_dao = createCatalogDao();
$item = $cat_dao->getItem($id);
?>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
													 integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<title>Edit item</title>
	</head>
	<body>
		<div class="container">
			<h2>Editar catálogo</h2>
			<form action="crud.php" method="post">
				<input name="id" type="hidden" value="<?php echo $item->getId()?>">
				<div class="form-group">
					<label for="desc">Descripción</label>
					<input class="form-control" type="text" name="desc" value="<?php echo $item->getDesc()?>">
				</div>
				<div class="form-group">
					<label for="cost">Costo</label>
					<input class="form-control" type="text" name="cost" value="<?php echo $item->getCost()?>">
				</div>
				<button name="update_item" type="submit" class="btn btn-success">Guardar</button>
			</form>
		</div>
	</body>
</html>
