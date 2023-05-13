<?php
    require_once "../config/conexion.php";

    class Turnos{
        public function _construct(){

        }

        public function getTurnos(){
            $query = "SELECT * FROM turnos;";
            return consultaTraerDatos($query);
        }
    }

?>