<?php
include 'db.php';
// $id_carrera = $_GET['id_carrera'];
$id_carrera = 1;
$sql = "SELECT * FROM carrera WHERE id_carrera = '$id_carrera'";
$res = $conn->query($sql);
$row = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <title>Carreras</title>
</head>
<body>
  <div class="container mt-5">
    <h2>Editar carrera</h2>
    <form action="crud.php" method="post">
      <input type="hidden" name="id_carrera" value="<?php $row['id_carrera']; ?>">
      <div class="form-group">
        <label for="nombre">Nombre de la carrera: </label>
        <input type="text" name="nombre" class="form-control">
      </div>
      <button type="submit" name="cambio_carrera" class="btn btn-primary">Guardar</button>
    </form>
  </div>
</body>
</html>