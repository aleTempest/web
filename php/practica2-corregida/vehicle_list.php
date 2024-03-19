<?php
require_once 'credentials.php';
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

// Crear conexión a la base de datos
$sql = "SELECT * FROM vehicles";
$res = $conn->query($sql);

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
                    // Iterar sobre los resultados de la query y mostrarlos en la tabla
                    while ($row = $res->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['brand'] . '</td>';
                        echo '<td>' . $row['sub_brand'] . '</td>';
                        echo '<td>' . $row['type'] . '</td>';
                        echo '<td>' . $row['model'] . '</td>';
                        echo '<td>' . $row['color'] . '</td>';
                        echo '<td>' . $row['capacity'] . '</td>';
                        echo '<td>' . $row['year'] . '</td>';
                        echo '<td>' . $row['origin'] . '</td>';
                        // El formualrio se inicia aquí para que cada campo de cada fila tenga acceso al crud
                        echo '<td><form action="crud.php" method="GET">';
                        echo '<button type="submit" name="delete_vehicle" value="' . $row['id'] . '" class="btn btn-danger">Eliminar</button> ';
                        echo '<a href="update_vehicle.php?id=' . $row['id'] . '"class="btn btn-primary">Editar</a> ';
                        echo '<a href="vehicle_view_list.php?id=' . $row['id'] . '" class="btn btn-info">Servicios</a> ';
                        echo '</form></td></tr>';
                    }
                    ?>
                </tbody>
            </table>
            <a href="create_vehicle.php" class="btn btn-success">Agregar Auto</a>
        </div>
    </body>
</html>
