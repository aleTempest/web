<?php
require 'crendentials.php';
require 'CareerDao.php';
$dao = new CareerDao($servername,$username,$password,$dbname);
$careers = $dao->getAllCareers();
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
    <title>Nuevo Estudiante</title>
</head>
<body>
<div class="container">
    <h2>Añadir Alumno</h2>
    <form action="crud.php" method="POST">
        <input type="hidden" name="id_alumno" ">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="name" ">
        </div>
        <div class="form-group">
            <label for="matricula">Matrícula</label>
            <input type="text" class="form-control" name="enrollment" " required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" ">
        </div>
        <div class="form-group">
            <label for="edad">Edad</label>
            <input type="text" class="form-control" name="age" ">
        </div>
        <div class="form-group">
            <label>
                <select name="id_career" >
                    <?php
                    foreach ($careers as $career) {
                        echo '<option value="' . $career->getId() . '">' . $career->getName() . '</option>';
                    }
                    ?>
                </select>
            </label>
        </div>
        <button type="submit" class="btn btn-primary" name="add_student">Guardar</button>
        <a href="student_list.php" class="btn btn-primary">Regresar</a>
    </form>
</div>

</body>
</html>
