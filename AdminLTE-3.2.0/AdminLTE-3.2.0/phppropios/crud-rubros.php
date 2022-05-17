<?php
//el servidor debe de contestar en formato JSON
//Temporal
include 'conexion.php';
$Respuesta = array();
$accion = $_POST["accion"];

    switch ($accion){
        case "create":
            accionCReatePHP($conexion);
            break;
    case "delete":
        accionDeletePHP($conexion);
        break;
    case "update":
        accionUpdatePHP($conexion);
        break;
    case "read":
        accionReadPHP($conexion);
        break;
    default:
        accionError();

    }

function accionCreatePHP($conexion){
    $rubro=$_POST["rubro"];
    $subtemas=$_POST["subtemas"];
    
    $InsertInto = "INSERT INTO rubo(id,nombre_rubro) VALUES (NULL,'$rubro',$subtemas)"
    if($con->query($InsertInto)==true){
        $Respuesta["estado"]=1;
        $Respuesta["id"]=mysql_insert_id($conexion);
        $Respuesta["mensaje"]="El rejistro se agrego correctamente";
    }else{
        $Respuesta["estado"]=0;
        $Respuesta["id"]=-1;
        $Respuesta["mensaje"]="Ocurrio un error desconocido";
    }
    
    echo json_encode($Respuesta);
}


function accionUpdatePHP($conexion){
    $Respuesta["estado"]=1;
    $Respuesta["mensaje"]="El rejistro se actualizo correctamente";
    echo json_encode($Respuesta);
}

function accionDeletePHP($conexion){
    $Respuesta["estado"]=1;
    $Respuesta["mensaje"]="El rejistro se elimino correctamente";
    echo json_encode($Respuesta);
}

function accionReadPHP($conexion){
    $Respuesta["estado"]=1;
    $Respuesta["mensaje"]="Rejistros Encontrados";
    echo json_encode($Respuesta);
}

function accionError(){
    $Respuesta["estado"]=0;
    $Respuesta["mensaje"]="Accion no valida";
    echo json_encode($Respuesta);
}
?>