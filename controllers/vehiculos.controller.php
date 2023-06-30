<?php
//TODO: Requerimientos Externos. Aqui estan todas los archivos externos
require_once('../models/vehiculos.model.php');
//TODO: Manejo de alertas y errores de php
error_reporting(0);
//TODO: Importacion de Clase vehiculos
$Vehiculos = new VehiculosModel;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $Vehiculos->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $idvehiculo = $_POST['id_vehiculo'];
        $datos = array();
        $datos = $Vehiculos->uno($idvehiculo);
        $respuesta = mysqli_fetch_assoc($datos);
        echo json_encode($respuesta);
        break;

    case 'insertar':
        $Marca = $_POST['Marca'];
        $Modelo = $_POST['Modelo'];
        $Placa = $_POST['Placa'];
        $datos = array();
        $datos = $Vehiculos->Insertar($Marca, $Modelo, $Placa);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $idvehiculo = $_POST['id_vehiculo'];
        $Marca = $_POST['Marca'];
        $Modelo = $_POST['Modelo'];
        $Placa = $_POST['Placa'];
        $datos = array();
        $datos = $Vehiculos->Actualizar($idvehiculo, $Marca, $Modelo, $Placa);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $idvehiculo = $_POST['id_vehiculo'];
        $datos = array();
        $datos = $Vehiculos->Eliminar($idvehiculo);
        echo json_encode($datos);
        break;
}
