<?php
require_once('../config/config.php');
class PropietarioModel
{

    public function todos()
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM propietarios INNER JOIN vehiculos ON vehiculos.id_vehiculo = propietarios.id_vehiculo";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }

    public function Insertar($Nombres, $Apellidos, $Vehiculo)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `propietarios` (`nombre`, `cedula`, `id_vehiculo`) VALUES ('$Nombres', '$Apellidos', $Vehiculo)";
        if (mysqli_query($con, $cadena)) {
            return 'ok';
        } else {
            return mysqli_error($con);
        }
    }
    public function uno($idpropietario)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT *FROM `propietarios` where id_propietario = $idpropietario";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    public function Actualizar($idpropietario, $Nombres, $Apellidos, $Vehiculo)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `propietarios` SET `nombre`='$Nombres',`cedula`='$Apellidos',`id_vehiculo`='$Vehiculo'WHERE id_propietario=$idpropietario";
        if (mysqli_query($con, $cadena)) {
            return 'ok';
        } else {
            return mysqli_error($con);
        }
    }
    public function Eliminar($idpropietario)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM `propietarios` WHERE id_propietario=$idpropietario ";
        if (mysqli_query($con, $cadena)) {
            return 'ok';
        } else {

            return mysqli_error($con);
        }
    }
}
