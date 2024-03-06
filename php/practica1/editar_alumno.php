<?php
include 'db.php';
$id = $_GET['id_alumno'];
$sql = "SELECT * FROM alumnos WHERE id_alumno = $id";
$res = $conn->query($sql);
$row = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
  integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h2>Editar Alumno</h2>
    <form action="crud.php" method="POST">
      <input type="hidden" name="id_alumno" value="<?php $row['id_alumno'] ?>">
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="<?php $row['nombre'] ?>">
      </div>
      <div class="form-group">
        <label for="matricula">Matrícula</label>
        <input type="text" class="form-control" name="matricula" value="<?php $row['matricula'] ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" value="<?php $row['email'] ?>">
      </div>
      <div class="form-group">
        <label for="edad">Edad</label>
        <input type="text" class="form-control" name="edad" value="<?php $row['edad'] ?>">
      </div>
      <button type="submit" class="btn btn-primary" name="alta_alumno">Ok</button>
    </form>
  </div>
  </body> 
</html>