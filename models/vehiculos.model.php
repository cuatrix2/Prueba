<?php
//TODO:Clase Vehiculos es un modelo
require_once('../config/config.php');
class VehiculosModel
{
    //TODO:Funcion para obtener todos los registros de la base de datos
    public function todos()
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `vehiculos`";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }

    public function uno($idvehiculo)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `vehiculos` where id_vehiculo=$idvehiculo ";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    public function Insertar($Marca, $Modelo, $Placa)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `vehiculos`(`Marca`,`Modelo`,`Placa`) VALUES ('$Marca', '$Modelo', '$Placa')";
        if (mysqli_query($con, $cadena)) {
            return 'ok';
        } else {
            return mysqli_error($con);
        }
    }

    public function Actualizar($idvehiculo, $Marca, $Modelo, $Placa) {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `vehiculos` SET `Marca`='$Marca', `Modelo`='$Modelo', `Placa`='$Placa' WHERE `id_vehiculo`='$idvehiculo'";
        
        if (mysqli_query($con, $cadena)) {
            return 'ok';
        } else {
            return mysqli_error($con);
        }
    }


    public function Eliminar($idvehiculo)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM `vehiculos` WHERE id_vehiculo=$idvehiculo ";
        if (mysqli_query($con, $cadena)) {
            return 'ok';
        } else {

            return mysqli_error($con);
        }
    }
}
