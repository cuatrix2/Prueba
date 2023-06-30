<?php
include_once('../../config/sesiones.php');
if (isset($_SESSION["em_id"])) {
    $_SESSION["ruta"] = "Empleados";
?>
    <!DOCTYPE html>
    <html lang="en">
    <title> Empleado</title>
   
        <?php require_once('../html/head.php')  ?>
    </head>

    <body>
        <!-- ======= Header ======= -->
        <?php require_once('../html/header.php') ?>
        <!-- End Header -->

        <!-- ======= Sidebar ======= -->

        <?php require_once('../html/menu.php') ?>
        <!-- End Sidebar-->

        <main id="main" class="main">

            <div class="pagetitle">
                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $_SESSION["ruta"] ?></h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb-4">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Lista de <?php echo $_SESSION["ruta"] ?></h6>
                                    <button onclick="cargaSelectRoles()" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEmpleado">Nuevo Empleado</button>
                                </div>
                                <div class="card-body">

                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Cedula</th>
                                                <th>Telefono</th>
                                                <th>Correo</th>
                                                <th>Rol</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="EmpleadoTabla"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="TituloModalEmpleo">Nuevo Empleado</h1>
                            <button type="button" onclick="limpiar()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                    <form id= "Empleados_form">
                        <div class="modal-body">
                        <input type="hidden" name="em_id" id="em_id">

                        <div class="form-group">
                                    <label for="em_nombre" class="control-label">Nombres</label>
                                    <input type="text" name="em_nombre" id="em_nombre" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="em_apellido" class="control-label">Apellidos</label>
                                        <input type="text" name="em_apellido" id="em_apellido" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="em_cedula" class="control-label">Cedula</label>
                                        <input type="text" name="em_cedula" id="em_cedula" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="em_telefono" class="control-label">Telefono</label>
                                        <input type="text" name="em_telefono" id="em_telefono" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="em_correo" class="control-label">Correo</label>
                                        <input type="mail" name="em_correo" id="em_correo" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="em_contrasena" class="control-label">Contrasena</label>
                                        <input type="text" name="em_contrasena" id="em_contrasena" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="rol_id" class="control-label">Rol</label>
                                        <select name="rol_id" id="rol_id" class="form-control">
                                        </select>
                                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="limpiar()" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            <!--scripts-->
        <?php include_once('../html/scripts.php')  ?>
        <script src="empleados.js"></script>
</body>
</html>

        <?php
    } else {
        header("Location:../../index.php");
    }
        ?>