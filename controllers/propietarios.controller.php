<?php
error_reporting(0);
// TODO: Requerimientos
require_once('../models/propietarios.model.php');
$Propietario = new PropietarioModel;
switch ($_GET['op']) {

    case 'todos':
        $todos = array();
        $datos = $Propietario->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $idpropietario = $_POST['id_propietario'];
        $datos = array();
        $datos = $Propietario->uno($idpropietario);
        $respuesta = mysqli_fetch_assoc($datos);
        echo json_encode($respuesta);
        break;

    case 'insertar':
        $Nombres = $_POST['nombre'];
        $Apellidos = $_POST['cedula'];
        $Vehiculo = $_POST['id_vehiculo'];
        $datos = array();
        $datos = $Propietario->Insertar($Nombres, $Apellidos, $Vehiculo);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $idpropietario = $_POST['id_propietario'];
        $Nombres = $_POST['nombre'];
        $Apellidos = $_POST['cedula'];
        $Vehiculo = $_POST['id_vehiculo'];
        $datos = array();
        $datos = $Propietario->Actualizar($idpropietario, $Nombres, $Apellidos, $Vehiculo);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $idpropietario = $_POST['id_propietario'];
        $datos = array();
        $datos = $Propietario->Eliminar($idpropietario);
        echo json_encode($datos);
        break;
}
