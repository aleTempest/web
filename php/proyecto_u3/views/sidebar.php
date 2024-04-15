<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-video"></i>
        </div>
        <div class="sidebar-brand-text mx-3">cine</div>
    </a>
    <!-- TODO Arreglar estado active de la pagina actual y implementar iconos en cada item que falte-->
    <div class="sidebar-heading">
        Proyecto
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    <!-- Empleados -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmployees" aria-expanded="false" aria-controls="collapseEmployees">
            <i class="fa-solid fa-user"></i>
            <span>Empleados</span>
        </a>
        <div id="collapseEmployees" class="collapse" aria-labelledby="headingEmployees" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Principal</h6>
                <a class="collapse-item" href="index.php?controller=EmployeesController&action=index">Lista de
                    empleados</a>
                <a class="collapse-item" href="index.php?controller=EmployeesController&action=add">Añadir empleado</a>
            </div>
        </div>
    </li>

    <!-- Productos -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
            <i class="fa-solid fa-mug-hot"></i>
            <span>Productos</span>
        </a>
        <div id="collapseProducts" class="collapse" aria-labelledby="headingProducts" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Principal</h6>
                <a class="collapse-item" href="index.php?controller=ProductsController&action=index">Lista de
                    productos</a>
                <a class="collapse-item" href="index.php?controller=ProductsController&action=add">Añadir productos</a>
            </div>
        </div>
    </li>

    <!-- Ventas -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSales" aria-expanded="false" aria-controls="collapseSales">
            <i class="fa-solid fa-money-check-dollar"></i>
            <span>Ventas</span>
        </a>
        <div id="collapseSales" class="collapse" aria-labelledby="headingSales" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Principal</h6>
                <a class="collapse-item" href="index.php?controller=SalesController&action=index">Lista de
                    ventas</a>
                <a class="collapse-item" href="index.php?controller=SalesController&action=add">Añadir venta</a>
                <a class="collapse-item" href="index.php?controller=SalesController&action=today">Ventas de hoy</a>
                <a class="collapse-item" href="index.php?controller=SalesController&action=top">Top de ventas</a>
            </div>
        </div>
    </li>


    <!-- Películas -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMovies" aria-expanded="false" aria-controls="collapseMovies">
            <i class="fas fa-fw fa-film"></i>
            <span>Películas</span>
        </a>
        <div id="collapseMovies" class="collapse" aria-labelledby="headingMovies" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Principal</h6>
                <a class="collapse-item" href="./index.php?controller=PeliculasController&action=index">Peliculas</a>
                <a class="collapse-item" href="./index.php?controller=GenerosController&action=index">Generos</a>
                <a class="collapse-item" href="./index.php?controller=HorariosController&action=index">Horarios</a>
                <a class="collapse-item" href="./index.php?controller=BoletosController&action=index">Venta de
                    boletos</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Utilities Collapse Menu -->
    <!--
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>
-->
    <!-- Divider
    <hr class="sidebar-divider">
    -->
    <!-- Heading 
    <div class="sidebar-heading">
        Addons
    </div>
    -->
    <!-- Nav Item - Pages Collapse Menu 
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item active" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>
    -->
    <!-- Nav Item - Charts 
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>
    -->
    <!-- Nav Item - Tables 
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>
    -->
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->
