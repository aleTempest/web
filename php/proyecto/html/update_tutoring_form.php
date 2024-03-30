<?php
require_once 'credentials.php';

$id = $_GET['id'];
$student_id = $_GET['id_student'];
$career_id = $_GET['id_career'];
$tutor_id = $_GET['id_tutor'];
$subject_id = $_GET['id_subject'];
$sql1 = "SELECT * FROM subjects WHERE id_career = $career_id";
$sql2 = "SELECT * FROM tutors WHERE id_career = $career_id";
$sql3 = "SELECT * FROM students WHERE id_career = $career_id";
$sql4 = "SELECT * FROM tutoring_sessions WHERE id_tutoring = $id";

$res_subjects = $conn->query($sql1);
$res_tutors = $conn->query($sql2);
$res_students = $conn->query($sql3);
$res_tutoring = $conn->query($sql4);
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
                    <h5 class="card-title fw-semibold mb-4">Añadir tutoría</h5>
                    <form action="crud.php" method="post">
                        <div class="mb-3">
                            <input type="hidden" name="career_id" value="<?php echo $career_id ?>">
                            <label for="student_id" class="form-label">Alumno</label>
                            <select class="form-control" name="student_id" class="form-control">
                                <?php
                                while ($row_students = $res_students->fetch_assoc())
                                {
                                    $selected = $row_students['id_student'] == $student_id ? 'selected' : '';
                                    echo "<option value='" . $row_students['id_student'] . "' $selected>" . $row_students['student_name'] . "</option>";
                                }
                                ?>
                            </select>
                            <label for="tutor_id" class="form-label">Tutor</label>
                            <select name="tutor_id" class="form-control">
                                <?php
                                while ($row_tutors = $res_tutors->fetch_assoc())
                                {
                                    $selected = $row_tutors['id_tutor'] == $tutor_id ? 'selected' : '';
                                    echo "<option value='" . $row_tutors['id_tutor'] . "' $selected>" . $row_tutors['name'] . "</option>";
                                }
                                ?>
                            </select>
                            <label for="subject_id" class="form-label">Materia</label>
                            <select name="subject_id" class="form-control" >
                                <?php
                                while ($row_subjects = $res_subjects->fetch_assoc())
                                {
                                    $selected = $row_subjects['id_subject'] == $subject_id ? 'selected' : '';
                                    echo "<option value='" . $row_subjects['id_subject'] . "' $selected>" . $row_subjects['subject_name'] . "</option>";
                                }
                                ?>
                            </select>
                            <label for="observations" class="form-label">Observaciones</label>
                            <textarea type="text" name="observations" class="form-control" rows="3">
                                <?php
                                $row = $res_tutoring->fetch_assoc();
                                echo $row['observations'];
                                ?>
                            </textarea>
                            <label for="tutoring_date" class="form-label" >Fecha</label>
                            <input type="date" name="tutoring_date" class="form-control" value="<?php echo $row['tutoring_date'] ?>">
                        </div>
                        <button name="new_tutoring" type="submit" class="btn btn-primary">Guardar</button>
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
