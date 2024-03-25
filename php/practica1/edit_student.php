<?php
require 'crendentials.php';
require 'StudentDao.php';
require 'CareerDao.php';

$student_id = $_GET['id'];
$student_dao = new StudentDao($servername,$username,$password,$dbname);
$career_dao = new CareerDao($servername,$username,$password,$dbname);
$student = $student_dao->getStudent($student_id);
$careers = $career_dao->getAllCareers();
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport"
					content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
													 integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<title>Editar estudiante</title>
	</head>
	<body>

		<div class="container">
			<h2>Editar Alumno</h2>
			<form action="crud.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $student->getId()?>">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" name="name" value="<?php echo $student->getName()?>">
				</div>
				<div class="form-group">
					<label for="matricula">Matrícula</label>
					<input type="text" class="form-control" name="enrollment" value="<?php echo $student->getEnrollment()?>" required>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control" name="email" value="<?php echo $student->getEmail()?>">
				</div>
				<div class="form-group">
					<label for="edad">Edad</label>
					<input type="text" class="form-control" name="age" value="<?php echo $student->getAge()?>">
				</div>
				<div class="form-group">
					<label>
						<select name="id_career" class="form-control" >
							<?php
							foreach ($careers as $career) {
								echo '<option value="' . $career->getId() . '">' . $career->getName() . '</option>';
							}
							?>
						</select>
					</label>
				</div>
				<button type="submit" class="btn btn-primary" name="update_student">Guardar</button>
				<a href="student_list.php" class="btn btn-primary">Regresar</a>
			</form>
		</div>
	</body>
</html>
