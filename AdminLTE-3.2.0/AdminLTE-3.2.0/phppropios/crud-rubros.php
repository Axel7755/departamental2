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
    case "id_read":
        accionReadIdPHP($conexion);
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
    $conexion->close();
}


function accionUpdatePHP($conexion){
    $rubro=$_POST["rubro"];
    $subtemas=$_POST["subtemas"];
    $id = $_POST['id'];
    
    $Update = "UPDATE `rubro` SET `nombre_rubro` = '$rubro', `subtemas` = '$subtemas' WHERE `rubro`.`id` = $id";
    if($conexion->query($Update)==true){
        $Respuesta["estado"]=1;
        $Respuesta["id"]=mysqli_insert_id($conexion);
        $Respuesta["mensaje"]="El rejistro se actualizo correctamente";
    }else{
        $Respuesta["estado"]=0;
        $Respuesta["id"]=-1;
        $Respuesta["mensaje"]="Ocurrio un error desconocido";
    }
    
    echo json_encode($Respuesta);
    $conexion->close();
}

function accionDeletePHP($conexion){
    $id = $_POST['id'];
    $borrar ="DELETE FROM rubro WHERE id = '$id'";
    if($conexion->query($borrar)==true){
        //afected_rows//rejistros afectados
        $Respuesta["estado"]=1;
        $Respuesta["mensaje"]="El rejistro se elimino correctamente";

    }else{
        $Respuesta["estado"]=0;
        $Respuesta["mensaje"]="Error desconocido. El rejistro no se pudo eliminar";
    }
    
    
    echo json_encode($Respuesta);
    $conexion->close();
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
    $conexion->close();
}

function accionReadIdPHP($conexion){
    $id = $_POST['id'];
    $Select = "SELECT * FROM rubro WHERE id=$id";
    $res = $conexion->query($Select);
        if($res->num_rows > 0){
            $Respuesta["estado"]=1;
            $Respuesta["mensaje"]="Rejistros Encontrados";
            while($row = $res->fetch_assoc()){               
                $Respuesta["id"] = $row["id"];
                $Respuesta["nombre_rubro"] = $row["nombre_rubro"];
                $Respuesta["subtemas"] = $row["subtemas"];
            }
        }else{
            $Respuesta["estado"] = 0;
            $Respuesta["mensaje"] = "Rejistros no encontrados";
        }
        echo json_encode($Respuesta);
        $conexion->close();
}

function accionError(){
    $Respuesta["estado"]=0;
    $Respuesta["mensaje"]="Accion no valida";
    echo json_encode($Respuesta);
}
?>