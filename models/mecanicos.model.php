<?php
require_once('../config/config.php');
class MecanicoModel
{

    public function todos()
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM mecanico";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }

    public function Insertar($Nombres, $Cedula)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `mecanico`(`nombre`, `cedula`) VALUES ('$Nombres', '$Cedula')";
        if (mysqli_query($con, $cadena)) {
            return 'ok';
        } else {
            return mysqli_error($con);
        }
    }
    public function uno($idmecanico)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT *FROM `mecanico` where id_mecanico = $idmecanico";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    public function Actualizar($idmecanico, $Nombres, $Cedula)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `mecanico` SET `nombre`='$Nombres',`cedula`='$Cedula', WHERE id_propietario=$idmecanico";
        if (mysqli_query($con, $cadena)) {
            return 'ok';
        } else {
            return mysqli_error($con);
        }
    }
    public function Eliminar($idmecanico)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM `mecanico` WHERE id_mecanico=$idmecanico ";
        if (mysqli_query($con, $cadena)) {
            return 'ok';
        } else {

            return mysqli_error($con);
        }
    }
}
