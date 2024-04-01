<?php
require_once 'credentials.php';

$sql = "SELECT * FROM careers";
$res = $conn->query($sql);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tutorías</title>
    <script src="https://kit.fontawesome.com/13fe039f9d.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
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
                <?php echo file_get_contents('./navbar.php') ?>
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
                        <h5 class="card-title fw-semibold mb-4">Lista de tutorías</h5>
                        <div class="mb-3">
                            <form action="add_tutoring_form.php" method="post" class="d-flex align-items-center">
                                <select class="form-control" name="career_id">
                                    <?php
                                    while ($row = $res->fetch_assoc()) {
                                        echo '<option value="' . $row['id_career'] . '">' . $row['career_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                                <button type="submit" class="btn btn-success "><i class="fa-solid fa-plus"></i></button>
                            </form>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tutor</th>
                                    <th>Alumno</th>
                                    <th>Materia</th>
                                    <th>Observaciones</th>
                                    <th>Fecha</th>
                                    <th>Controles</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM tutoring_sessions_view ";
                                $res = $conn->query($sql);
                                // iterar en los resultados de la consulta y imprimirlos en la tabla
                                while ($row = $res->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . $row['tutor_name'] . '</td>';
                                    echo '<td>' . $row['student_name'] . '</td>';
                                    echo '<td>' . $row['subject_name'] . '</td>';
                                    echo '<td>' . $row['observations'] . '</td>';
                                    echo '<td>' . $row['tutoring_date'] . '</td>';
                                    echo '<td><form action="crud.php" method="get">';
                                    echo '<button name="delete_tutoring" class="btn btn-danger" value="' . $row['id'] . '"><i class="fa-solid fa-trash"></i></button> ';
                                    echo '<a href="update_tutoring_form.php?id=' . $row['id'] . '&id_career=' . $row['id_career'] . '&id_student=' . $row['id_student'] . '&id_tutor=' . $row['id_tutor'] . '&id_subject=' . $row['id_subject'] . '" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a> ';
                                    echo '</form></td>';
                                    echo '</tr>';
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
