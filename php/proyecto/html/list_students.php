<?php
require_once 'credentials.php';
$headers = array(
    "Nombre",
    "Correo",
    "Tutor",
    "Carrera"
);
$sql = "SELECT * FROM students_tutors_view";
$res = $conn->query($sql);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Estudiantes</title>
    <script src="https://kit.fontawesome.com/13fe039f9d.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
            <div class="brand-logo d-flex align-items-center justify-content-between">
                <a href="./index.php" class="text-nowrap logo-img">
                    <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" />
                </a>
                <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                    <i class="ti ti-x fs-8"></i>
                </div>
            </div>
            <!-- Sidebar navigation -->
            <?php echo file_get_contents('./navbar.php')?>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item d-block d-xl-none">
                        <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
        <!--  Header End -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4 ">Lista de estudiantes</h5>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <?php
                            foreach ($headers as $header) {
                                echo '<th>' . $header . '</th>';
                            }
                            ?>
                            <td><a href="add_student_form.php" class="btn btn-success "><i class="fa-solid fa-plus"></i></a></td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        // iterar en los resultados de la consulta y imprimirlos en la tabla

                        while ($row = $res->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row['student_name'] . '</td>';
                            echo '<td>' . $row['student_email'] . '</td>';
                            echo '<td>' . $row['tutor_name'] . '</td>';
                            echo '<td>' . $row['career_name'] . '</td>';
                            echo '<td><form method="get" action="crud.php">';
                            echo '<button name="delete_student" class="btn btn-danger" value="' . $row['id_student'] . '"><i class="fa-solid fa-trash"></i></button> ';
                            echo '<a class="btn btn-primary" href="update_student_form.php?id_student=' . $row['id_student'] . '&id_career=' . $row['id_career'] . '"> <i class="fa-solid fa-pencil"></i></a>';
                            echo '</form></td></tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/sidebarmenu.js"></script>
<script src="../assets/js/app.min.js"></script>
<script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>
