<?php
require 'factory.php';
$headers = Array(
	"Marca",
	"Sub-marca",
	"Tipo",
	"Modelo",
	"Color",
	"Capacidad",
	"Año",
	"Procedencia",
	"Controles",
);

$vehicle_dao = createVehicleDao();
$items = $vehicle_dao->getAllVehicles();
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<title>Lista de vehículos</title>
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
			<h2>Lista de vehículos</h2>
			<table class="table table-hover">
				<thead>
<?php
					foreach($headers as $header)
					{
						echo '<th>' . $header . '</th>';
					}
					?>
				</thead>
				<tbody>
					<?php
					for($i = 0; $i < count($items); $i++)
					{
					  echo '<tr>';
						if ($i != count($items) + 1)
						{
							$controls = array(
						    "button_delete" => '<button type="submit" name="delete_vehicle" value="' . $items[$i]->getId() . '" class="btn btn-danger">Eliminar</button>',
						    "button_edit" => '<a href="update_vehicle.php?id=' . $items[$i]->getId() . '"class="btn btn-primary">Editar</a>',
								"button_view" => '<a href="vehicle_view_list.php?id=' . $items[$i]->getId() . '" class="btn btn-info">Servicios</a>'
							);
							echo '<td>' . $items[$i]->getBrand() . '</td>';
							echo '<td>' . $items[$i]->getSubBrand() . '</td>';
							echo '<td>' . $items[$i]->getVType() . '</td>';
							echo '<td>' . $items[$i]->getModel() . '</td>';
							echo '<td>' . $items[$i]->getColor() . '</td>';
							echo '<td>' . $items[$i]->getCapacity() . '</td>';
							echo '<td>' . $items[$i]->getYear() . '</td>';
							echo '<td>' . $items[$i]->getOrigin() . '</td>';
						}

			    echo '<td><form action="crud.php" method="GET">';
			    foreach ($controls as $control)
			    {
				    echo $control . ' ';
			    }
			    echo '</form></td></tr>'; // termina la fila
					}
					?>
				</tbody>
			</table>
			<a href="create_vehicle.php" class="btn btn-success">Agregar Auto</a>
		</div>
	</body>
</html>
