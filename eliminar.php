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
    <title>Eliminar Materias</title>
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
    <h1>Eliminar unidad de aprendizaje</h1>
    <form action="materias.php" method="post">
        <table border="1px">
        <?php
     $sql = "SELECT ma.id AS id, nombre_materia,nombre_semestre, CONCAT(nombre,'',a_materno,'',a_paterno) AS nombre, creditos, vigencia,Proposito FROM
      materia ma JOIN profesor pro ON(ma.id_prof=pro.ID) JOIN semestre sem ON (ma.id_sem=sem.ID) WHERE ma.id =".$_GET['id'];
     $res =$con->query($sql);
     
     if($res->num_rows>0){
         while($row = $res->fetch_assoc()){
            echo'
            <tr>
            <td>
                <b>Nombre de materia</b>
            </td>
            <td>'.
            $row["nombre_materia"].'
            </td>
        </tr>
        <tr>
            <td>
                <b>Semestre</b>
            </td>
            <td>'.
            $row["nombre_semestre"].'
            </td>
        </tr>
        <tr>
            <td>
                <b>Profesor</b>
            </td>
            <td>'.
            $row["nombre"].'
            </td>
        </tr>
        <tr>
            <td>
                <b>Creditos tepic</b>
            </td>
            <td>'.
            $row["creditos"].'
            </td>
        </tr>
        <tr>
            <td>
                <b >Vigencia</b>
            </td>
            <td>'.
            $row["vigencia"].'
            </td>
        </tr>
        <tr>
            <td>
                <b>Proposito</b>
            </td>
            <td>
            '.
            $row["Proposito"].'
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
                    <input type="submit" value="Eliminar Materia" id="Eliminar" name="Eliminar">
                    <input type="hidden" id="idMateria" name="idMateria" value="<?php echo $_GET['id'];?>">
                    <a href="materias.php">Cancelar</a>
                </td>
            </tr>
        </table>
    </form>
    <?php
       /* $con = new mysqli($host,$user,$pass,$db) or die("problemas al conectar");
        $sql="DELETE FROM materia WHERE ID =".$_GET['id'];
        $con->query($sql);*/
    ?>
</body>
</html>