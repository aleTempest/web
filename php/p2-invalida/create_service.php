<?php
require_once 'factory.php';

$id = $_GET['id'];
$cat_dao = createCatalogDao();
$desc_items = $cat_dao->getAllItems();
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
													 integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<title>Servicio</title>
	</head>
	<body>
		<div class="container">
			<h1>Nuevo Serivicio para auto</h1>
			<form action="crud.php" method="post">
				<input name="id" type="hidden" value="<?php echo $id ?>">
				<div class="form-group">
					<label for="desc">Descripción</label>
					<select name="desc" class="form-control">
						<?php
						foreach($desc_items as $item)
						{
						  echo '<option value="' . $item->getId() . '" >' . $item->getDesc() . '</option>';
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="s_date">Fecha</label>
					<input type="date" class="form-control" name="s_date">
				</div>
				<button type="submit" class="btn btn-success" name="create_service">Guardar</button>
			</form>
		</div>
	</body>
</html>
