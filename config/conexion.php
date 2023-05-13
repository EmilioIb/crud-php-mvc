<?php
    require_once "global.php";

    $conexion = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if(mysqli_connect_errno()){
        printf("Fallo la conexion a la base de datos");
        exit();
    }

    function consultaManejoDatos($query,$tipos,$valores){
        global $conexion;
        $stmt = $conexion->prepare($query);
        $stmt->bind_param($tipos, ...$valores);
        $res = $stmt->execute();
        return $res;
    }

    function consultaTraerDatos($query){
        global $conexion;
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }

    function consultaTraerDatosParam($query,$tipos,$valores){
        global $conexion;
        $stmt = $conexion->prepare($query);
        $stmt->bind_param($tipos, ...$valores);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }

    function consultaFila($query,$tipos,$valores){
        global $conexion;
        $stmt = $conexion->prepare($query);
        $stmt->bind_param($tipos, ...$valores);
        $stmt->execute();
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();
        return $row;
    }

?>