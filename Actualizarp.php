<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "escuela";
    $con = new mysqli($host,$user,$pass,$db) or die("problemas al conectar");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar docente</title>
</head>
<style>
    body{
        background-color: black;
        color: rgba(100, 100, 100, 0.685);
        
    }
    select{
        background-color: black;
        border-radius: 2px;
        color: rgba(100, 100, 100, 0.685);
        border-color:#e4007c ;
    }
    input{
        background-color: black;
        border-radius: 2px;
        border-color:#e4007c ;
        color: rgba(100, 100, 100, 0.685);
    }
    table{
        border-color: rgba(100, 100, 100, 0.685);
    }
    textarea{
        background-color: black;
        border-color: #e4007c;
        color: rgba(100, 100, 100, 0.685);
    }
</style>
<body>
    <h1>Actualizar docente</h1>
    <?php
    echo'<form action="Actualizarp.php?id='.$_GET["id"].'"" method="post">';
    ?>
        <table border="1px">
        <?php
        $idactualizar=$_GET['id'];
        $sql = "SELECT * FROM profesor WHERE ID =".$_GET['id'];
     $res =$con->query($sql);
     
     if($res->num_rows>0){
         while($row = $res->fetch_assoc()){
            echo'
            <tr>
            <td>
                <label for="nombrep">Nombre</label>
            </td>
            <td>
                <input type="text" name="nombrep" id="nombrep" value="'.$row["nombre"].'" size="50">
            </td>
        </tr>
        <tr>
            <td>
                <label for="apellidoP">Apelldio Paterno</label>                  
            </td>
            <td>
                <input type="text" name="apellidoP" id="apellidoP" value="'.$row["a_paterno"].'" size="50">
            </td>
        </tr>
        <tr>
            <td>
                <label for="apellidoM">Apelldio Materno</label>
            </td>
            <td>
                <input type="text" name="apellidoM" value="'.$row["a_materno"].'" id="apellidoM" size="50">
            </td>
        </tr>
        <tr>
        <tr>
            <td>
                <label for="apellidoM">Numero de emplado</label>
            </td>
            <td>
                <input type="text" name="Numemp" value="'.$row["num_empleado"].'" id="apellidoM" size="50">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Guardar" id="btnguardars" name="btnguardars">
            </td>
            <td>
                <input type="reset" value="Limpiar" id="btnlimpiarr" name="btnlimpiarr">
            </td>';
         }
         $con->close(); 
     }  
     
     //$con->close();
    ?>                      
        </table>
        <?php 
    //$auxnom=$row["nombre_materia"];
    //if(($_POST['nombre'])!=$auxnom){
        $con = new mysqli($host,$user,$pass,$db) or die("problemas al conectar");
        if(isset($_POST['btnguardars'])){
            $nombrep=$_POST['nombrep'];
            $apellidoP = $_POST['apellidoP'];
            $apellidoM = $_POST['apellidoM'];
            $Numemp = $_POST['Numemp'];
            echo"
            $matid
            $nombrep,
            $apellidoP ,
            $apellidoM,
            $Numemp ";
            $sql="UPDATE `profesor` SET `nombre` = '$nombrep', `a_paterno` = '$apellidoP', `a_materno` = '$apellidoM', `num_empleado` = '$Numemp'  WHERE `profesor`.`ID` = $idactualizar";
            echo"<br><p style='color: blue;'>$NomMateria</p><br>";
            
            
            if($con->query($sql)==true){
                header("Location:profesores.php");
  
            }else{
                echo "<br><p style='color: blue;'>Error al subir la materia</p>";
            }
          
            
            $con->close();
        }else{
            echo"<br><p style='color: blue;'>no entra</p>";
        }
    ?>
    </form>
    
</body>
</html>