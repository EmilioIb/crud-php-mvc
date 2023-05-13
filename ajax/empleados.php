<?php 
require_once "../Modelos/Empleados.php";

$empleados = new Empleados();

//Definir variables
$idEmpleado = isset($_POST["idEmpleado"]) ? $_POST["idEmpleado"] : "";
$nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
$aPaterno = isset($_POST["aPaterno"]) ? trim($_POST["aPaterno"]) : "";
$aMaterno = isset($_POST["aMaterno"]) ? trim($_POST["aMaterno"]) : "";
$empresa = isset($_POST["empresa"]) ? $_POST["empresa"] : "";
$turno = isset($_POST["turno"]) ? $_POST["turno"] : "";
$sueldo = isset($_POST["sueldo"]) ? $_POST["sueldo"] : "";
$frecuenciaPago = isset($_POST["frecuenciaPago"]) ? $_POST["frecuenciaPago"] : "";

switch($_GET["op"]){
    case "guardaryeditar":
        if(empty($idEmpleado)){
            $rspta = $empleados->insertar($nombre,$aPaterno,$aMaterno,$sueldo,$frecuenciaPago,$turno,$empresa);
            echo $rspta ? "Empleado insertado." : "Empleado no se pudo insertar.";
        }else{
            $rspta = $empleados->actualizar($idEmpleado,$nombre,$aPaterno,$aMaterno,$sueldo,$frecuenciaPago,$turno,$empresa);
            echo $rspta ? "Empleado actualizado." : "Empleado no se pudo actualizar.";
        }
        break;

    case "listar":
        $rspta = $empleados->listar();
        $data = array();

        while($reg = $rspta->fetch_object()){
            $data[] = array(
                "0" => $reg->idEmpleado,
                "1" => $reg->nombreEmpleado,
                "2" => $reg->empresa,
                "3" => $reg->turno,
                "4" => $reg->sueldoBruto,
                "5" => $reg->frecuenciaPago,
                "6" => $reg->sueldoNeto,
                "7" => $reg->activo,
            );
        };

        echo json_encode($data);
        break;
    case "mostrar":
        $rspta = $empleados->mostrar($idEmpleado);
        echo json_encode($rspta);
        break;

    case "eliminar":
        $rspta = $empleados->eliminar($idEmpleado);
        echo $rspta ? "Empleado eliminado." : "Empleado no se pudo eliminar.";
        break;

    case "activar":
        $rspta = $empleados->activar($idEmpleado);
        echo $rspta ? "Empleado activado." : "Empleado no se pudo activar.";
        break;

    case "desactivar":
        $rspta = $empleados->desactivar($idEmpleado);
        echo $rspta ? "Empleado desactivado." : "Empleado no se pudo desactivar.";
        break;
}

?>