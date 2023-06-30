<?php
require_once('../config/config.php');
class ReparacionesModel{

    public function todos()
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT*FROM reparaciones INNER JOIN mecanico ON mecanico.id_mecanico = reparaciones.id_reparacion INNER JOIN vehiculos ON vehiculos.id_vehiculo = reparaciones.id_vehiculo";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }

    public function Insertar($Vehiculo, $Mecanico, $Fecha)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `reparaciones`(`id_vehiculo`, `id_mecanico`, `fecha_reparacion`) VALUES ('$Vehiculo', '$Mecanico', '$Fecha')";
        if (mysqli_query($con, $cadena)) {
            return 'ok';
        } else {
            return mysqli_error($con);
        }
    }
    public function uno($idreparacion)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT *FROM `reparaciones` where id_reparacion = $idreparacion";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    public function Actualizar($idreparacion, $Vehiculo, $Mecanico, $Fecha)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `reparaciones` SET `id_vehiculo`='$Vehiculo',`id_mecanico`='$Mecanico',`fecha_reparacion`='$Fecha'WHERE id_reparacion=$idreparacion";
        if (mysqli_query($con, $cadena)) {
            return 'ok';
        } else {
            return mysqli_error($con);
        }
    }
    public function Eliminar($idreparacion)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM `reparaciones` WHERE id_reparacion=$idreparacion ";
        if (mysqli_query($con, $cadena)) {
            return 'ok';
        } else {

            return mysqli_error($con);
        }
    }


}
