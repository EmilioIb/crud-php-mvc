<?php 
require_once "../Modelos/Empresas.php";

$empresas = new Empresas();

switch($_GET["op"]){
    case "selectEmpresas":
        $res = "";
        $rspta = $empresas->getEmpresas();
        while ($reg = $rspta->fetch_object()) {
            $res .=  '<option value=' . $reg->idEmpresa . '>' . $reg->nombre . '</option>';
        }
        echo $res;
        
        break;
}

?>