<?php
error_reporting(0);
// TODO: Requerimientos
require_once('../models/reparaciones.model.php');
$Reparaciones = new ReparacionesModel;
switch ($_GET['op']) {

    case 'todos':
        $todos = array();
        $datos = $Reparaciones->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $idreparacion = $_POST['id_reparacion'];
        $datos = array();
        $datos = $Reparaciones->uno($idreparacion);
        $respuesta = mysqli_fetch_assoc($datos);
        echo json_encode($respuesta);
        break;

    case 'insertar':
        $Vehiculo = $_POST['id_vehiculo'];
        $Mecanico = $_POST['id_mecanico'];
        $Fecha = $_POST['fecha_reparacion'];
        $datos = array();
        $datos = $Reparaciones->Insertar($Vehiculo, $Mecanico,$Fecha);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $idreparacion = $_POST['id_reparacion'];
        $Vehiculo = $_POST['id_vehiculo'];
        $Mecanico = $_POST['id_mecanico'];
        $Fecha = $_POST['fecha_reparacion'];
        $datos = array();
        $datos = array();
        $datos = $Reparaciones->Actualizar($idreparacion, $Vehiculo, $Mecanico, $Fecha);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $idreparacion = $_POST['id_reparacion'];
        $datos = array();
        $datos = $Reparaciones->Eliminar($idreparacion);
        echo json_encode($datos);
        break;
}