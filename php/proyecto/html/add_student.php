<?php
require_once 'credentials.php';

$student_email = $_POST['student_email'];
$student_name = $_POST['student_name'];
$career_id = $_POST['student_career'];

$sql1 = "SELECT * FROM tutors WHERE id_career = $career_id";
$sql2 = "SELECT * FROM subjects WHERE id_career = $career_id";
$tutors_res = $conn->query($sql1);
$subjects_res = $conn->query($sql2);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Añadir estudiante</title>
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
                        <h5 class="card-title fw-semibold mb-4">Tutores</h5>
                        <form action="crud.php" method="post">
                            <div class="mb-3">
                                <input type="hidden" name="student_name" value="<?php echo $student_name ?>">
                                <input type="hidden" name="student_email" value="<?php echo $student_email ?>">
                                <input type="hidden" name="student_career" value="<?php echo $career_id ?>">
                                <label for="student_tutor" class="form-label">Tutor</label>
                                <select name="student_tutor" class="form-control">
                                    <?php
                                    while ($row = $tutors_res->fetch_assoc()) {
                                        echo "<option value='" . $row['id_tutor'] . "'>" . $row['name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <h5 class="card-title fw-semibold mb-4">Materias</h5>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Materia</th>
                                            <th>Seleccionar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row2 = $subjects_res->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>' . $row2['subject_name'] . '</td>';
                                            echo '<td> <div class="form-check form-switch"> <input class="form-check-input" id="flexSwitchCheckDefault" type="checkbox" name="subjects[]" value="' . $row2['id_subject'] . '"></div></td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-success" name="new_student">Guardar <i class="fa-solid fa-floppy-disk"></i></button>
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
