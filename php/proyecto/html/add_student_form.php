<?php
require_once 'credentials.php';
// Primera consulta para obtener las carreras
$sql1 = "SELECT * FROM careers";
$res1 = $conn->query($sql1);

// Segunda consulta para obtener los tutores
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alta de estudiantes</title>
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
            <!-- Reciclar la barra de navegación -->
            <?php
            echo file_get_contents('./navbar.php');
            ?>
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
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Añadir estudiante</h5>
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="add_student.php" id="studentForm">
                                    <div class="mb-3">
                                        <label for="student_email" class="form-label">Email</label>
                                        <input name="student_email" type="email" class="form-control" aria-describedby="emailHelp">
                                        <div id="emailHelp" class="form-text">Nunca compartiremos el email con nadie más</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="student_name" class="form-label">Nombre</label>
                                        <input name="student_name" type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="student_career" class="form-label">Carrera</label>
                                        <select class="form-control" name="student_career" id="career">
                                            <?php
                                            while ($row1 = $res1->fetch_assoc())
                                            {
                                                // agrega cada carrera como opción del select
                                                echo '<option value="' . $row1['id_career'] . '">' . $row1['career_name'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <button name="new_student" type="submit" class="btn btn-primary">Guardar <i class="fa-solid fa-floppy-disk"></i></button>
                                </form>
                            </div>
                        </div>
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
