<?php 
require_once "../Modelos/FrecuenciaPago.php";

$frecuencias = new FrecuenciaPago();

switch($_GET["op"]){
    case "selectFrecuencias":
        $res = "";
        $rspta = $frecuencias->getFrecuenciasPago();
        while ($reg = $rspta->fetch_object()) {
            $res .=  '<option value=' . $reg->idFrecuenciaPago . '>' . $reg->nombre . '</option>';
        }
        echo $res;
        
        break;
}

?>