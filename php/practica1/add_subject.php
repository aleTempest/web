<?php
require 'factories.php';
$careers = createCareerdao()->getAllCareers();
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
													 integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<title>Añadir Materia</title>
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
						<a class="nav-link" href="subject_list.php">Materias</a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="container">
			<h2>Nueva Materia</h2>
			<form action="crud.php" method="post">
				<div class="form-group">
					<label for="subject_name">Nombre de la materia:</label>
					<input type="text" name="subject_name" class="form-control">
				</div>
				<table class="table table-hover">
					<tbody>
						<?php
						foreach ($careers as $career) 
						{
						echo '<tr><td>' . $career->getName() . '</td>';
							echo '<td><input name="ids[]" type="checkbox" value="' . $career->getId() . '" /></td></tr>';
						}
						?>
					</tbody>
				</table>
				<button class="btn btn-success" type="submit">Guardar</button>
				<a href="subject_list.php" class="btn btn-primary">Regresar</a>
			</form>
		</div>
	</body>
</html>
