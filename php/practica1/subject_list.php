<?php
require 'factories.php';
$dao = createSubjectDao();
$subjects = $dao->getAllSubjects();
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
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Materia</th>
						<th>Controles</th>
					</tr>
				</thead>
				<tbody>
					<form action="crud.php" method="get">
					<?php
					for ($i = 0; $i < count($subjects); $i++ ) {
						echo '<tr><td>' . $subjects[$i]->getName() . '</td>';
						echo '<td><a href="subject_careers.php?id=' . $subjects[$i]->getId() . '" class="btn btn-info">Ver carreras</a> ';
						echo '<button  type="submit" name="delete_subject" class="btn btn-danger" value="' . $subjects[$i]->getId() . '">Eliminar</button></td>' . '</tr>';
					}
					?>
				</tbody>
			</table>
			<a href="add_subject.php" class="btn btn-success">Nueva materia</a>
			</form>
		</div>
	</body>
</html>
