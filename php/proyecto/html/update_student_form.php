<?php
require_once 'credentials.php';

$student_id = $_GET['id_student'];
$career_id = $_GET['id_career'];

$sql1 = "SELECT * FROM student_subject_career_view WHERE id_student = $student_id";
$sql2 = "SELECT * FROM subjects WHERE id_career = $career_id";
$res_student = $conn->query($sql1);
$row_student = $conn->query($sql1)->fetch_assoc(); // array que contiene los datos del estudiante
$res_careers = $conn->query($sql2); // carreras disponibles para el estudiante
/**
 * Guardar los id de las materias que ya tiene el estudiante en un array para poder comparar.
 * pero se puede una función de orden superior para lograr lo mismo
 * https://www.php.net/manual/en/function.array-map.php
 * https://www.sitepoint.com/functional-programming-in-php-higher-order-functions/#:~:text=Are%20there%20any%20built%2Din,array_map%2C%20array_filter%2C%20and%20array_reduce.
 **/
/*$arr = Array();
while ($row = $res_student->fetch_assoc())
{
    $arr[] = $row['id_subject'];
}*/
$student_subject_id = array_map(function($row) {
    return $row['id_subject'];
}, $res_student->fetch_all(MYSQLI_ASSOC));

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar estudiante</title>
    <script src="https://kit.fontawesome.com/13fe039f9d.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png"/>
    <link rel="stylesheet" href="../assets/css/styles.min.css"/>
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
                    <img src="../assets/images/logos/dark-logo.svg" width="180" alt=""/>
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
                    <h5 class="card-title fw-semibold mb-4">Datos del estudiante</h5>
                    <form action="crud.php" method="post">
                        <div class="mb-3">
                            <input type="hidden" value="<?php echo $row_student['id_student'] ?>">
                            <label class="form-label" for="student_name" class="form-label">Nombre</label>
                            <input class="form-control" type="text" name="student_name" value="<?php echo $row_student['student_name'] ?>">
                            <label class="form-label" for="student_email">Email</label>
                            <input class="form-control" type="text" name="student_email" value="<?php echo $row_student['student_email'] ?>">
                        </div>
                        <button type="submit" class="btn btn-success" name="edit_student_data">Guardar <i class="fa-solid fa-floppy-disk"></i></button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Carreras disponibles</h5>
                    <form action="crud.php" method="post">
                        <div class="mb-3">
                            <input type="hidden" value="<?php echo $row_student['id_student'] ?>">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Materia</th>
                                    <th>Seleccionar</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $k = 0; // contador para iterar en el array de ids de materias del estudiante
                                while ($row_career = $res_careers->fetch_assoc())
                                {
                                    echo "<tr>";
                                    echo "<td>" . $row_career['subject_name'] . "</td>";
                                    // wn caso de que el estudiante ya tenga la matería, se marca el checkbox como checado
                                    if ($row_career['id_subject'] == $student_subject_id[$k] && $student_subject_id[$k]) // TODO arreglarlo
                                        // solo marca los primeros 3 y los demas los marca como undefined
                                        echo '<td> <div class="form-check form-switch"> <input class="form-check-input" id="flexSwitchCheckDefault" type="checkbox" name="subjects[]" value="' . $row_career['id_subject'] . '" checked></div></td>';
                                    // caso contrario se deja sin marcar
                                    else
                                        echo '<td> <div class="form-check form-switch"> <input class="form-check-input" id="flexSwitchCheckDefault" type="checkbox" name="subjects[]" value="' . $row_career['id_subject'] . '"></div></td>';
                                    $k++;
                                    echo "</tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <button class="btn btn-success" name="edit_student_subjects">Guardar <i class="fa-solid fa-floppy-disk"></i></button>
                    </form>
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
