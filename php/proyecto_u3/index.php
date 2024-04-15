<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="./views/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <script src="https://kit.fontawesome.com/13fe039f9d.js" crossorigin="anonymous"></script>
    <!-- Custom styles for this template-->
    <link href="./views/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php echo file_get_contents('./views/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid mt-4">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <?php
                    if (isset($_GET['controller']) && isset($_GET['action'])) {
                        $controller = $_GET['controller'];
                        $action = $_GET['action'];
                        require_once "controllers/$controller.php";
                        $controller = new $controller();
                        $controller->$action();
                    } else {
                        require_once "controllers/EmployeesController.php";
                        $carreraController = new EmployeesController();
                        $carreraController->index();
                    }
                    ?>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <?php echo file_get_contents('./views/footer.php'); ?>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="./views/vendor/jquery/jquery.min.js"></script>
        <script src="./views/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="./views/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="./views/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="./views/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="./views/js/demo/chart-area-demo.js"></script>
        <script src="./views/js/demo/chart-pie-demo.js"></script>
        <script src="https://kit.fontawesome.com/13fe039f9d.js" crossorigin="anonymous"></script>
</body>

</html>
