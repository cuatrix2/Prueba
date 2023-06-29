<?php
//TODO: archivos requeridos
require_once('../config/config.php');
//require_once('../models/empleadosroles.model.php');

class empleadoModel
{
    public function login($em_correo, $em_contrasena)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM empleado WHERE em_correo = '$em_correo' and em_contrasena='$em_contrasena'";
        print $cadena;
        $datos = mysqli_query($con, $cadena);
        return $datos;
   }
   public function todos(){
    $con = new ClaseConexion();
    $con = $con->ProcedimientoConectar();
    $cadena = "SELECT * FROM empleado  INNER JOIN rol on empleado.rol_id = rol.rol_id ORDER BY em_apellido ";
    $datos = mysqli_query($con, $cadena);
    return $datos;
}

public function Insertar($Nombres, $Apellidos, $cedula, $telefono, $em_correo, $em_contrasena, $idRoles) {
    $con = new ClaseConexion();
    $con = $con->ProcedimientoConectar();
    $cadena = "INSERT INTO `empleado`(`em_nombre`, `em_apellido`, `em_cedula`, `em_telefono`, `em_correo`, `em_contrasena`, `rol_id`) VALUES ('$Nombres', '$Apellidos', '$cedula', '$telefono', '$em_correo', '$em_contrasena', '$idRoles')";
    if (mysqli_query($con, $cadena)) {
        return 'ok';
    } else {
        return mysqli_error($con);
    }
}
    public function uno($idempleado){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT *FROM `empleado` where em_id = $idempleado";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    public function Actualizar($idempleado,$Nombres, $Apellidos,$cedula, $telefono, $em_correo, $em_contrasena, $idRoles){
        $con = new ClaseConexion();
        $con=$con->ProcedimientoConectar();
        $cadena = "UPDATE `empleado` SET `em_nombre`='$Nombres',`em_apellido`='$Apellidos',`em_cedula`='$cedula',`em_telefono`='$telefono',`em_correo`='$em_correo',`em_contrasena`='$em_contrasena',`rol_id`='$idRoles' WHERE em_id=$idempleado";
        if (mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        }
    }
    public function Eliminar($idempleado){
        $con = new ClaseConexion();
        $con=$con->ProcedimientoConectar();
        $cadena = "DELETE FROM `empleado` WHERE em_id=$idempleado ";
        if (mysqli_query($con, $cadena)){
            return 'ok';
        }else{
           
            return mysqli_error($con);
        }
    }
}