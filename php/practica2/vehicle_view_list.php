<?php
require_once 'credentials.php';

$id = $_GET['id']; // id del auto
$sql = "SELECT * FROM vehicle_view WHERE id = $id"; // datos de servicios por auto
$sql2 = "SELECT SUM(cost) as total FROM vehicle_view WHERE id = $id"; // total de servicios

$res = $conn->query($sql);
$row_total = $conn->query($sql2)->fetch_assoc();
$total = $row_total['total'];
$headers = Array(
    "Desc",
    "Fecha",
    "Costo"
);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Costo</title>
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
                <a class="nav-link" href="vehicle_list.php">Vehículos <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="item_list.php">Catálogo</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <h1>Costo total</h1>
    <table class="table table-hover">
        <thead>
        <?php
        foreach($headers as $header)
        {
            echo '<th>' . $header . '</th>';
        }
        ?>
        </thead>
        <tbody>
        <?php
        // Obtener los valores de cada fila en la consulta de servicios
        while($row = $res->fetch_assoc())
        {
            echo '<tr>';
            $controls = array(
                "button_delete" => '<button type="submit" name="delete_service" value="' . $row['s_id'] . '" class="btn btn-danger">Eliminar</button>',
                "button_edit" => '<a href="update_service.php?id=' . $row['s_id'] . '"class="btn btn-primary">Editar</a>',
            );

            echo '<tr>';
            // Imprimir los valores
            echo '<td>' . $row['cat_desc'] . '</td>';
            echo '<td>' . $row['service_date'] . '</td>';
            echo '<td>' . $row['cost'] . '</td>';
            echo '<td><form action="crud.php" method="GET">';
            foreach ($controls as $control)
            {
                echo '<input type="hidden" name="v_id" value="' . $row['id'] .'">';
                echo $control . ' ';
            }
            echo '</form></td></tr>';
        }
        ?>
        </tbody>
    </table>
    <h3>Total: <?php echo $total?></h3>
    <br>
    <a href="vehicle_list.php" class="btn btn-primary">Regresar</a>
    <?php
    echo '<a class="btn btn-success" href="create_service.php?id=' . $id . '">Añadir</a>';
    ?>
</div>
</body>
</html>