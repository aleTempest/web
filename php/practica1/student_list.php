<?php
require 'StudentDao.php';
require 'crendentials.php';
// Encabezados de la tabla, agregar aquí los encabezados para poder generarlos
// de manera automatica
$table_headers = Array(
    "Matricula",
    "Nombre",
    "Email",
    "Edad",
    "Carrera",
    "Controles"
);

$dao = new StudentDao($servername,$username,$password,$dbname);
$students = $dao->getAllStudents(); // arreglo de estudiantes sacado de base de datos
?>
<!doctype html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de alumnos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
            <?php
            // Generar encabezado para la tabla del listado por cada propiedad del objeto alumno
            foreach ($table_headers as $header) {
                echo '<th>' . $header . '</th>';
            }
            ?>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < count($students); $i++) {
						// Controles de la tabla, este arreglo contiene todos los elementos interactivos que se desean tener en cada fila de la tabla
            $controls = array(
                "button_delete" => '<button type="submit" name="delete_student" value="' . $students[$i]->getId() . '" class="btn btn-danger">Eliminar</button>',
                "button_edit" => '<a href="edit_student.php?id=' . $students[$i]->getId() . '"class="btn btn-primary">Editar</a>',
								"button_careers" => '<a href="student_subjects_list.php?id=' . $students[$i]->getId() . '"class="btn btn-info">Materias</a>',
								// "button_scores" => '<button type="submit" name="export_student_scores" class="btn btn-success" value="' . $students[$i]->getId() . '">Exportar</button>'
            );
            echo '<tr>';
						// Generar contenido de cada fila con los datos de cada estudiante
            $attributes = array_values($students[$i]->toMap()); // Propiedades de un estudiante
            for ($j = 0; $j < count($attributes) + 1; $j++) {
                if ($j != count($attributes)) {
                    echo '<td>' . $attributes[$j] . '</td>';
                } else {
                    echo '<form action="crud.php" method="GET">';
                    echo '<td>';
                    foreach ($controls as $control) { // Generar los controles de la tabla
                        echo $control . ' ';
                    }
                    echo '<td>';
                    echo '</form>';
                }
            }
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
		<form action="export.php" method="post">
		  <button name="export_students" type="submit" class="btn btn-success">Exportar</button>
			<a href="add_student.php" class="btn btn-primary">Añadir</a>
    </form>
</div>
</body>
</html>
