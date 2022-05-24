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
    
    $InsertInto = "INSERT INTO rubro(id,nombre_rubro,subtemas) VALUES (NULL,'$rubro',$subtemas)";
    if($conexion->query($InsertInto)==true){
        $Respuesta["estado"]=1;
        $Respuesta["id"]=mysqli_insert_id($conexion);
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
    
    $Select = "SELECT * FROM rubro";
    $res = $conexion->query($Select);
        if($res->num_rows > 0){
            $Respuesta["estado"]=1;
            $Respuesta["mensaje"]="Rejistros Encontrados";
            $Respuesta["rubros"]=array();
            while($row = $res->fetch_assoc()){
                $Rubro = array();
                $Rubro["id"] = $row["id"];
                $Rubro["nombre_rubro"] = $row["nombre_rubro"];
                $Rubro["subtemas"] = $row["subtemas"];
                array_push($Respuesta["rubros"],$Rubro);
            }
        }else{
            $Respuesta["estado"] = 0;
            $Respuesta["mensaje"] = "Rejistros no encontrados";
        }

    echo json_encode($Respuesta);
}

function accionError(){
    $Respuesta["estado"]=0;
    $Respuesta["mensaje"]="Accion no valida";
    echo json_encode($Respuesta);
}
?>