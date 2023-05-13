<?php
    require_once "../config/conexion.php";

    class Empresas{
        public function _construct(){

        }

        public function getEmpresas(){
            $query = "SELECT idEmpresa, nombre FROM empresas;";
            return consultaTraerDatos($query);
        }
    }

?>