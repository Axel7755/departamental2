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
    <title>Actualizar Semestre</title>
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
    <h1>Actualizar Semestre</h1>
    <?php
    echo'<form action="Actualizarsem.php?id='.$_GET["id"].'"" method="post">';
    ?>
        <table border="1px">
        <?php
        $idactualizar=$_GET['id'];
        $sql = "SELECT * FROM semestre WHERE ID = $idactualizar";
     $res =$con->query($sql);
      
     if($res->num_rows>0){
         while($row = $res->fetch_assoc()){
            echo'
            <tr>
            <td>
                <label for="nombrep">Nombre</label>
            </td>
            <td>
                <input type="text" name="nombrese" id="nombrese" value="'.$row["nombre_semestre"].'" size="50">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Guardar" id="btnguardarsem" name="btnguardarsem">
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
        if(isset($_POST['btnguardarsem'])){
            $nombrep=$_POST['nombrese'];
            echo"
            $matid
            $nombrep,";
            $sql="UPDATE `semestre` SET `nombre_semestre` = '$nombrep'  WHERE `semestre`.`ID` = $idactualizar";
            
            
            
            if($con->query($sql)==true){
                header("Location:Semestre.php");
  
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