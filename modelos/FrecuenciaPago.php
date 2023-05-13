<?php
    require_once "../config/conexion.php";

    class FrecuenciaPago{
        public function _construct(){

        }

        public function getFrecuenciasPago(){
            $query = "SELECT * FROM frecuenciaPago;";
            return consultaTraerDatos($query);
        }
    }

?>