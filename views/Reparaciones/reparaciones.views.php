<?php
include_once('../../config/sesiones.php');
if (isset($_SESSION["em_id"])) {
    $_SESSION["ruta"] = "Reparaciones";
?>
    <!DOCTYPE html>
    <html lang="en">
    <title> <?php echo $_SESSION["ruta"] ?></title>

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
                                    <button type="button" onclick="cargaselect()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalReparacion">Nuevo <?php echo $_SESSION["ruta"] ?> </button>
                                </div>
                                <div class="card-body">

                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Placa</th>
                                                <th>Mecanico</th>
                                                <th>Fecha</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ReparacionTabla"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalReparacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="TituloModalReparacion">Nueva Reparacion</h1>
                            <button type="button" onclick="limpiar()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form id="Reparacion_form">
                            <div class="modal-body">
                                <input type="hidden" name="id_reparacion" id="id_reparacion">

                                <div class="form-group">
                                    <label for="id_vehiculo" class="control-label">Placa</label>
                                    <select name="id_vehiculo" id="id_vehiculo" class="form-control">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_mecanico" class="control-label">Mecanico</label>
                                    <select name="id_mecanico" id="id_mecanico" class="form-control">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_reparacion" class="control-label">Fecha</label>
                                    <input type="date" name="fecha_reparacion" id="fecha_reparacion" class="form-control" required>
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
            <script src="reparaciones.js"></script>
    </body>

    </html>

<?php
} else {
    header("Location:../../index.php");
}
?>