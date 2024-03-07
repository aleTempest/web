<?php
require 'crendentials.php';
require 'CareerDao.php';

$dao = new CareerDao($servername,$username,$password,$dbname);
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
    <title>Nueva carrera</title>
</head>
<body>
<div class="container">
    <h2>Añadir carrera</h2>
    <form action="crud.php" method="POST">
        <div class="form-group">
            <label for="career_name">Nombre de la carrera:</label>
            <input class="form-control" type="text" name="career_name">
        </div>
        <button type="submit" class="btn btn-success" name="add_career">Guardar</button>
        <a href="career_list.php" class="btn btn-primary">Regresar</a>
    </form>
</div>
</body>
</html>