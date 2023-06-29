<?php
include_once('../../config/sesiones.php');
if (isset($_SESSION["em_id"])) {
    $_SESSION["ruta"] = "Empleados";
?>
    <!DOCTYPE html>
    <html lang="en">
    <title> Empleado</title>

    <head>
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
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Launch demo modal</button>
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
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

        <?php
    } else {
        header("Location:../../index.php");
    }
        ?>