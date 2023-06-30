<?php
error_reporting(0);
// TODO: Requerimientos
require_once('../models/mecanicos.model.php');
$Mecanico = new MecanicoModel;
switch ($_GET['op']) {

    case 'todos':
        $todos = array();
        $datos = $Mecanico->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $idmecanico = $_POST['id_mecanico'];
        $datos = array();
        $datos = $Mecanico->uno($idmecanico);
        $respuesta = mysqli_fetch_assoc($datos);
        echo json_encode($respuesta);
        break;

    case 'insertar':
        $Nombres = $_POST['nombre'];
        $Cedula = $_POST['cedula'];
        $datos = array();
        $datos = $Mecanico->Insertar($Nombres, $Cedula);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $idmecanico = $_POST['id_mecanico'];
        $Nombres = $_POST['nombre'];
        $Cedula = $_POST['cedula'];
        $datos = array();
        $datos = array();
        $datos = $Mecanico->Actualizar($idmecanico, $Nombres, $Apellidos, $Vehiculo);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $idmecanico = $_POST['id_mecanico'];
        $datos = array();
        $datos = $Mecanico->Eliminar($idmecanico);
        echo json_encode($datos);
        break;
}
