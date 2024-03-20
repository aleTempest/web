<?php
require_once 'credentials.php';
$id = $_GET['id']; // id del auto
 // Consultar los servicios de un auto
$sql = "SELECT * FROM services WHERE id = $id";
// Consultar todos los servicios disponibles en el catalogo
$sql2 = "SELECT * FROM catalog";
$res = $conn->query($sql2); // resultado de la query del catalogo
$actual_row = $conn->query($sql)->fetch_assoc(); // resultado de la consulta de los servicios
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
    <title>Editar Servicio</title>
</head>
<body>
<div class="container">
    <form action="crud.php" method="post">
        <input type="hidden" name="s_id" value="<?php echo $id?>">
        <input type="hidden" name="v_id" value="<?php echo $actual_row['id_vehicle'] ?>">
        <div class="form-group">
            <label for="id_catalog">Descripción</label>
            <select name="id_catalog" class="form-control">
                <?php
                // Cargar los datos del auto
                while ($row = $res->fetch_assoc())
                {
                    // Selecciona por defecto el item del catálogo que ya tiene consigo el auto
                    if ($actual_row['id_catalog'] == $row['id'])
                        echo '<option value="' . $row['id'] . '" selected>' . $row['cat_desc'] . '</option>';
                    else
                        echo '<option value="' . $row['id'] . '" >' . $row['cat_desc'] . '</option>';
                }
                ?>
            </select>
            <label for="date">Fecha</label>
            <input type="date" class="form-control" name="date" value="<?php echo $actual_row['service_date']?>">
        </div>
        <button name="update_service" class="btn btn-success">Guardar</button>
    </form>
</div>
</body>
</html>
