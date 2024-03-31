<?php
require_once 'credentials.php';
$tutor_id = $_GET['id_tutor'];
$career_id = $_GET['id_career'];
$sql = "SELECT * FROM tutors WHERE id_tutor = $tutor_id";
$row = $conn->query($sql)->fetch_assoc();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Tutor</title>
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
                    <h5 class="card-title fw-semibold mb-4">Datos del tutor</h5>
                    <form action="crud.php" method="post" class="needs-validation" novalidate>
                        <input type="hidden" name="tutor_id" value="<?php echo $row['id_tutor'] ?>">
                        <label class="form-label" for="tutor_name">Nombre</label>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="tutor_name" value="<?php echo $row['name'] ?>">
                            <div class="invalid-feedback">
                                Por favor, escribe un nombre.
                            </div>
                        </div>
                        <label class="form-label" for="tutor_email">Email</label>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="tutor_email" value="<?php echo $row['email'] ?>">
                            <div class="invalid-feedback">
                                Por favor, escribe un email.
                            </div>
                        </div>
                        <label for="career_id">Carrera</label>
                        <div class="mb-3">
                            <select name="career_id" class="form-control">
                                <?php
                                $sql = "SELECT * FROM careers";
                                $res = $conn->query($sql);
                                while ($row = $res->fetch_assoc())
                                {
                                    $selected = $row['id_career'] == $career_id ? 'selected' : '';
                                    echo "<option value='" . $row['id_career'] . "' $selected>" . $row['career_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <button class="btn btn-success" name="edit_tutor">Guardar <i class="fa-solid fa-floppy-disk"></i></button>
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
