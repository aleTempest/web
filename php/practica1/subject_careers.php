<?php
require 'factories.php';
$id = $_GET['id'];
$careers = createSubjectDao()->getCareersBySubject($id);
?>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
													 integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<title>Materias</title>
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
						<a class="nav-link" href="career_list.php">Carreras <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="student_list.php">Alumnos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="subject_list.php">Materias</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="container">
			<h2>Listado de carreras por materia</h2>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Controles</th>
					</tr>
				</thead>
				<tbody>
					<form action="" method="post">
						<?php
						for ($i = 0; $i < count($careers); $i++) 
						{
							echo '<tr><td>' . $careers[$i]->getName() . '</td>';
							echo '<td><button type="button" class="btn btn-danger">Eliminar</button></td></tr>';
						}
						?>
				</tbody>
			</table>
			<button class="btn btn-success">Añadir carrera</button>
			<a href="subject_list.php" class="btn btn-primary">Regresar</a>
					</form>
		</div>
	</body>
</html>
