<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hewo</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>

<body>
<?php
// cargar el header

require_once '../views/templates/header.php';

// Obtener el controlador y la acción
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];

    require_once "../controllers/$controller.php";

    $controller = new $controller();
    $controller->$action();
} else {
    require_once '../controllers/UserController.php';
    $defaultController = new UserController();
    $defaultController->login(); // se carga la pantalla de login por defecto
}

// cargar el footer
require_once '../views/templates/footer.php';
?>
</body>

</html>
<script src="./assets/form_validation.js"></script>
