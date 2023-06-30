<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="../Dashboard/home.php">
                <i class="bi bi-grid"></i>
                <span>HOME</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-database-add"></i><span>Datos</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="../Vehiculos/vehiculos.views.php">
                        <i class="bi bi-circle"></i><span>Vehiculos</span>
                    </a>
                </li>
                <li>
                    <a href="../Propietarios/propietarios.views.php">
                        <i class="bi bi-circle"></i><span>Propietarios</span>
                    </a>
                </li>
                <li>
                    <a href="../Reparaciones/reparaciones.views.php">
                        <i class="bi bi-circle"></i><span>Reparaciones</span>
                    </a>
                </li>
                <li>
                    <a href="../Mecanicos/mecanicos.views.php">
                        <i class="bi bi-circle"></i><span>Mecanicos</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-database-add"></i><span>Administración</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <?php
                    if (error_reporting(0)) {
                        $rol_id = $_SESSION['rol_id'];

                        if ($rol_id == '2') {
                            echo '<li>
                        <a href="../Tabla/Tabla.views.php">
                            <i class="bi bi-circle"></i><span>Data Tables</span>
                        </a>
                    </li>';
                        } elseif ($rol_id == '1') {
                            echo '<li>
                        <a href="../Tabla/Tabla.views.php">
                            <i class="bi bi-circle"></i><span>Data Tables</span>
                        </a>
                    </li>';
                        } elseif ($rol_id == '1') {
                            echo '<li>
                        <a href="../Empleados/empleados.views.php">
                            <i class="bi bi-circle"></i><span>Empleados</span>
                        </a>
                    </li>';
                        }
                    }


                    ?>
                <li>
                    <a href="../Empleados/empleados.views.php">
                        <i class="bi bi-circle"></i><span>Empleados</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-heading">Registro</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span class="d-none d-md-block dropdown-toggle ps-2"><?php error_reporting(0);
                                                                        echo  $_SESSION['em_nombre'] . ' ' . $_SESSION['em_apellido'] ?></span>
            </a>
        </li><!-- End Profile Page Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" href="../../Index.php">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li><!-- End Login Page Nav -->


    </ul>

</aside>