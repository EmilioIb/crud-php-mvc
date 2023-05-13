<?php
    require_once "../config/conexion.php";

    class Empleados{
        public function _construct(){

        }

        public function insertar($nombre,$aPaterno,$aMaterno,$sueldo,$frecuenciaPago,$turno,$empresa){
            $query = "INSERT INTO empleados(nombre,apellidoPaterno,apellidoMaterno,sueldo,idFrecuenciaPago,idTurno,idEmpresa) VALUES(?,?,?,?,?,?,?)";
            $tipos = "sssdiii";
            $valores = [$nombre,$aPaterno,$aMaterno,$sueldo,$frecuenciaPago,$turno,$empresa];
            return consultaManejoDatos($query,$tipos,$valores);
        }

        public function actualizar($idEmpleado,$nombre,$aPaterno,$aMaterno,$sueldo,$frecuenciaPago,$turno,$empresa){
            $query = "UPDATE empleados set nombre = ?, apellidoPaterno = ?, apellidoMaterno = ?, sueldo = ?, idFrecuenciaPago = ?, idTurno = ?, idEmpresa = ? WHERE idEmpleado = ?";
            $tipos = "sssdiiii";
            $valores = [$nombre,$aPaterno,$aMaterno,$sueldo,$frecuenciaPago,$turno,$empresa,$idEmpleado];
            return consultaManejoDatos($query,$tipos,$valores);
        }

        public function listar(){
            $query = "SELECT e.idEmpleado ,CONCAT_WS(' ',e.nombre,e.apellidoPaterno,e.apellidoMaterno) as nombreEmpleado, c.nombre as empresa, t.nombre as turno, e.sueldo as sueldoBruto ,f.nombre as frecuenciaPago, e.sueldo * f.multiplicador as sueldoNeto, e.activo from empleados e INNER JOIN empresas c on e.idEmpresa = c.idEmpresa INNER JOIN turnos t on e.idTurno = t.idTurno INNER JOIN frecuenciapago f on e.idFrecuenciaPago = f.idFrecuenciaPago ORDER BY nombreEmpleado;";
            return consultaTraerDatos($query);
        }

        public function mostrar($idEmpleado){
            $query = "SELECT * FROM empleados WHERE idEmpleado = ?;";
            $tipos = "i";
            $valores = [$idEmpleado];
            return consultaFila($query,$tipos,$valores);
        }

        public function eliminar($idEmpleado){
            $query = "DELETE FROM empleados where idEmpleado = ?";
            $tipos = "i";
            $valores = [$idEmpleado];
            return consultaManejoDatos($query,$tipos,$valores);
        }

        public function activar($idEmpleado){
            $query = "UPDATE empleados set activo = 1 WHERE  idEmpleado = ?";
            $tipos = "i";
            $valores = [$idEmpleado];
            return consultaManejoDatos($query,$tipos,$valores);
        }

        public function desactivar($idEmpleado){
            $query = "UPDATE empleados set activo = 0 WHERE  idEmpleado = ?";
            $tipos = "i";
            $valores = [$idEmpleado];
            return consultaManejoDatos($query,$tipos,$valores);
        }
    }

?>