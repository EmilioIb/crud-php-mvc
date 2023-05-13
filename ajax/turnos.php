<?php 
require_once "../Modelos/Turnos.php";

$turnos = new Turnos();

switch($_GET["op"]){
    case "selectTurnos":
        $res = "";
        $rspta = $turnos->getTurnos();
        while ($reg = $rspta->fetch_object()) {
            $res .=  '<option value=' . $reg->idTurno . '>' . $reg->nombre . '</option>';
        }

        echo $res;
        break;
}

?>