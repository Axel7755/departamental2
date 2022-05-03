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
    <title>Eliminar docente</title>
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
    p{
        color: #00FF00;
    }
</style>
<body>
    <h1>Eliminar Docente</h1>
    <?php
    echo'<form action="eliminarp.php?id='.$_GET["id"].'"" method="post">';
    ?>
        <table border="1px">
        <?php
     $sql = "SELECT * FROM profesor WHERE ID =".$_GET['id'];
     $res =$con->query($sql);
     
     if($res->num_rows>0){
         while($row = $res->fetch_assoc()){
            echo'
            <tr>
            <td>
                <b>ID</b>
            </td>
            <td>'.
            $row["ID"].'
            </td>
        </tr>
            <tr>
            <td>
                <b>Nombre</b>
            </td>
            <td>'.
            $row["nombre"].'
            </td>
        </tr>
        <tr>
            <td>
                <b>Apellido Paterno</b>
            </td>
            <td>'.
            $row["a_paterno"].'
            </td>
        </tr>
        <tr>
            <td>
                <b>Apellido Materno</b>
            </td>
            <td>'.
            $row["a_materno"].'
            </td>
        </tr>
        <tr>
            <td>
                <b>Numero de empleado</b>
            </td>
            <td>'.
            $row["num_empleado"].'
            </td>
        </tr>
        <tr>';
         }
     }  
     $con->close();
     
    ?>            
                <td>
                    
                </td>
                <td>
                    <input type="submit" value="Eliminar docente" id="Eliminar" name="Eliminar">
                    <a href="profesores.php">Cancelar</a>
                </td>
            </tr>
        </table>
    </form>
    <?php
        if(isset($_POST['Eliminar'])){
            $idmastro = $_GET['id'];
            $con = new mysqli($host,$user,$pass,$db) or die("problemas al conectar");
            $sql="DELETE FROM profesor WHERE ID =$idmastro";
            
            if($con->query($sql)==true){
                header("Location:profesores.php");
  
            }else{
                echo "<br><p style='color: blue;'>Error al subir la materia</p>";
            }
            $con->close();        
        }
    ?>
    <?php
       /* $con = new mysqli($host,$user,$pass,$db) or die("problemas al conectar");
        $sql="DELETE FROM materia WHERE ID =".$_GET['id'];
        $con->query($sql);*/
    ?>
</body>
</html>