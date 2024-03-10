<?php
require 'crendentials.php';
require 'CareerDao.php';

$dao = new CareerDao($servername,$username,$password,$dbname);
$careers = $dao->getAllCareers();
$table_headers = Array("Nombre","Controles");
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
    <title>Listado de carreras</title>
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
</body>
<div class="container">
    <table class="table table-hover">
        <thead>
        <tr>
	        <?php
	        foreach ($table_headers as $header)
	        {
		        echo '<th>' . $header . '</th>';
	        }
	        ?>
        </tr>
        </thead>
        <tbody>
		    <?php
		    for ($i = 0; $i < count($careers); $i++)
		    {
			    if ($i != count($careers) + 1)
			    {
				    $controls = array(
						    "button_delete" => '<button type="submit" name="delete_career" value="' . $careers[$i]->getId() . '" class="btn btn-danger">Eliminar</button>',
						    "button_edit" => '<a href="edit_career.php?id=' . $careers[$i]->getId() . '"class="btn btn-primary">Editar</a>'
				    );
				    echo '<tr><td>' . $careers[$i]->getName() . '</td>';
			    }

			    echo '<td><form action="crud.php" method="GET">';
			    foreach ($controls as $control)
			    {
				    echo $control . ' ';
			    }
			    echo '</form></td></tr>';
		    }
		    ?>
        </tbody>
    </table>
    <a href="add_career.php" class="btn btn-success">Añadir</a>
</div>
</html>

