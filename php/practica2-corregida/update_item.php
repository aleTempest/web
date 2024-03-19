<?php
require_once 'credentials.php';

$id = $_GET['id'];
$sql = "SELECT * FROM catalog WHERE id = $id";
$row = $conn->query($sql)->fetch_assoc();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Edit item</title>
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
    <h2>Editar catálogo</h2>
    <form action="crud.php" method="post">
        <input name="id" type="hidden" value="<?php echo $row['id'] ?>">
        <div class="form-group">
            <label for="desc">Descripción</label>
            <input class="form-control" type="text" name="desc" value="<?php echo $row['cat_desc'] ?>">
        </div>
        <div class="form-group">
            <label for="cost">Costo</label>
            <input class="form-control" type="text" name="cost" value="<?php echo $row['cost'] ?>">
        </div>
        <button name="update_item" type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
</body>
</html>
