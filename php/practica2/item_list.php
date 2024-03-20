<?php
require_once 'credentials.php';

// realizar la query a la base de datos
$res = $conn->query("SELECT * FROM catalog");
$headers = Array(
    "Desc",
    "Costo",
    "Controles",
);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Catálogo</title>
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
    <h2>Catálogo</h2>
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
        // Iterar en los valores de cada fila
        while($row = $res->fetch_assoc())
        {
            echo '<tr>';
            $controls = array(
                "button_delete" => '<button type="submit" name="delete_item" value="' . $row['id'] . '" class="btn btn-danger">Eliminar</button>',
                "button_edit" => '<a href="update_item.php?id=' . $row['id'] . '"class="btn btn-primary">Editar</a>'
            );
            // Imprimir los valores
            echo '<td>' . $row['cat_desc'] . '</td>';
            echo '<td>' . $row['cost'] . '</td>';
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
    <a href="create_item.php" class="btn btn-success">Agregar al catálogo</a>
</div>
</body>
</html>