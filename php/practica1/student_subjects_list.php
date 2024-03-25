<?php
require 'factories.php';
$id = $_GET['id'];
$subject_dao = createSubjectDao();
$data = $subject_dao->getStudentSubjects($id);
?>
<!doctype html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
			<form action="crud.php" method="post">
				<table class="table table-holder">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Calificación</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($data as $item)
						{
							echo '<tr><td>';
							echo $item['subject_name'] . '</td>';
							echo '<td><input type="text" value="' . $item['score'] . '" class="form-control name="subject_score"/></td>';
							echo '</tr>';
						}
						?>
					</tbody>
				</table>
				<button class="btn btn-success" type="submit">Guardar</button>
				<button class="btn btn-primary">Asignar Materia</button>
			</form>
		</div>
	</body>
</html>
