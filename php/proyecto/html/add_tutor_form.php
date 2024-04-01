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
    <title>Alta de tutor</title>
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
                    <h5 class="card-title fw-semibold mb-4">Agregar tutor</h5>
                    <form action="crud.php" method="post" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label class="form-label" for="tutor_name">Nombre</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" name="tutor_name" required>
                                <div class="invalid-feedback">
                                    Por favor, escribe un nombre válido.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="tutor_email">Email</label>
                            <div class="input-group has-validation">
                                <input name="tutor_email" type="email" class="form-control" aria-describedby="emailHelp" required>
                                <div class="invalid-feedback">
                                    Por favor, escribe un nombre válido.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="tutor_career">Carrera</label>
                            <select class="form-control" name="tutor_career">
                                <?php
                                while ($row = $res->fetch_assoc()) {
                                    echo '<option value="' . $row['id_career'] . '">' . $row['career_name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <button class="btn btn-success" name="new_tutor">Guardar <i class="fa-solid fa-floppy-disk"></i></button>
                    </form>
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
<script src="form_validation.js"></script>
</body>

</html>
