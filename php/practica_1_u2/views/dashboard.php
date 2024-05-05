<?php
if (isset($_SESSION['ok'])) {
    echo '<a href="../public/index.php?controller=UserController&action=index" class="btn btn-primary">CRUD Universidad</a>';
    echo '<a href="../public/index.php?controller=CareerController&action=index" class="btn btn-primary">CRUD Carreras</a>';
} else {
    echo '<h1>No</h1>';
}