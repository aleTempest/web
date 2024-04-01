<?php
require_once 'credentials.php';

$career_id = $_POST['career_id'];
$sql1 = "SELECT * FROM subjects WHERE id_career = $career_id";
$sql2 = "SELECT * FROM tutors WHERE id_career = $career_id";
$sql3 = "SELECT * FROM students WHERE id_career = $career_id";

// consultas con los datos del formulario
$res_subjects = $conn->query($sql1);
$res_tutors = $conn->query($sql2);
$res_students = $conn->query($sql3);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
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
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
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
                        <h5 class="card-title fw-semibold mb-4">Añadir asesoría</h5>
                        <form action="crud.php" method="post" class="needs-validation" novalidate>
                            <!-- Cada uno de los selects es llenado iterando en cada una de sus consultas respectivas -->
                            <input type="hidden" name="career_id" value="<?php echo $career_id ?>">
                            <div class="mb-3">
                                <label for="student_id" class="form-label">Alumno</label>
                                <select class="form-control" name="student_id" class="form-control">
                                    <?php
                                    while ($row_students = $res_students->fetch_assoc()) {
                                        echo "<option value='" . $row_students['id_student'] . "'>" . $row_students['student_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <label for="tutor_id" class="form-label">Asesor</label>
                            <div class="mb-3">
                                <select name="tutor_id" class="form-control">
                                    <?php
                                    while ($row_tutors = $res_tutors->fetch_assoc()) {
                                        echo "<option value='" . $row_tutors['id_tutor'] . "'>" . $row_tutors['name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <label for="subject_id" class="form-label">Materia</label>
                            <div class="mb-3">
                                <select name="subject_id" class="form-control">
                                    <?php
                                    while ($row_subjects = $res_subjects->fetch_assoc()) {
                                        echo "<option value='" . $row_subjects['id_subject'] . "'>" . $row_subjects['subject_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <label for="observations" class="form-label">Observaciones</label>
                            <div class="mb-3">
                                <textarea type="text" name="observations" class="form-control" rows="3"
                                    required></textarea>
                                <div class="invalid-feedback">
                                    Por favor, escribe una observación.
                                </div>
                            </div>
                            <label for="consulting_date" class="form-label">Fecha</label>
                            <div class="mb-3">
                                <input type="date" name="consulting_date" class="form-control" required>
                                <div class="invalid-feedback">
                                    Por favor, ingresa una fecha.
                                </div>
                            </div>
                            <button name="new_consulting" type="submit" class="btn btn-primary">Guardar</button>
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
    <script src="form_validation.js"></script>
</body>

</html>
