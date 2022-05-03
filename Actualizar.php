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
    <title>Actualizar materia</title>
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
    <h1>Actualizar unidad de aprendizaje</h1>
    <?php
    echo'<form action="Actualizar.php?id='.$_GET["id"].'"" method="post">';
    ?>
        <table border="1px">
        <?php
        $idmateria1=$_GET['id'];
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
            <td>
                <input type="text" name="nombre" id="nombre" size="50" value="'.$row["nombre_materia"].'">
            </td>
        </tr>
        <tr>
            <td>
                <b>Semestre</b>
            </td>
            <td>
            <select  name="semestre" id="semestre" >';
            $con = new mysqli($host,$user,$pass,$db) or die("problemas al conectar");
                $sql2 = "SELECT nombre_semestre FROM
                        semestre";
                $res2 =$con->query($sql2);
                        
                if($res2->num_rows>0){
                    while($row2 = $res2->fetch_assoc()){
                    $semestre = $row2["nombre_semestre"];
                    if($row2["nombre_semestre"]==$row["nombre_semestre"]){
                        echo"<option selected>$semestre</option>";
                    }else{
                        echo"<option>$semestre</option>";
                    }
                    }
                    //$con->close();
                    }
                echo'
            </select>
            </td>
        </tr>
        <tr>
            <td>
                <b>Profesor</b>
            </td>
            <td>
            <select  name="profesor" id="profesor">';
            $con = new mysqli($host,$user,$pass,$db) or die("problemas al conectar");
                        $sql2 = "SELECT CONCAT(nombre,' ',a_paterno,' ',a_materno) AS nomprofe FROM
                        profesor";
                        $res2 =$con->query($sql2);
                        
                        if($res2->num_rows>0){
                            while($row2 = $res2->fetch_assoc()){
                                $profesor = $row2["nomprofe"];
                                if($row2["nomprofe"]==$row["nombre"]){
                                    echo"<option selected>$profesor</option>";
                                }else{
                                    echo"<option>$profesor</option>";
                                }
                            }
                           // $con->close();
                        }
            echo'
            </select>
            </td>
        </tr>
        <tr>
            <td>
                <b>Creditos tepic</b>
            </td>
            <td>
            <input type="number" name="creditos_tepic" id="creditos_tepic" value="'.$row["creditos"].'">
            </td>
        </tr>
        <tr>
            <td>
                <b >Vigencia</b>
            </td>
            <td>
            <input type="date" name="vigencia" id="vigencia" value="'.$row["vigencia"].'">
            </td>
        </tr>
        <tr>
            <td>
                <b>Proposito</b>
            </td>
            <td>
                <textarea rows="5" cols="50" name="proposito" id="proposito">
                '.$row["Proposito"].'
                </textarea>
            
            </td>
        </tr>
        <tr>
                <td>
                    
                </td>
                <td>
                    <input type="submit" value="ActualizarMateria" id="Actualizar" name="btActualizar">
                </td>
            </tr>';
         }
     }  
     //$con->close();
    ?>                      
        </table>
        <?php 
    //$auxnom=$row["nombre_materia"];
    //if(($_POST['nombre'])!=$auxnom){
    if(isset($_POST['btActualizar'])){     
      $NomMateria = $_POST['nombre'];
            $Sem = $_POST['semestre'];
            $sql="SELECT ID FROM `semestre` WHERE nombre_semestre = '$Sem'";
            $res = $con->query($sql);
            if($res->num_rows > 0){
                while($row = $res->fetch_assoc()){
                    $Semid = $row["ID"];
                }
            }else{
                $numid = 1;
            }

            $Prof = $_POST['profesor'];
            $sql="SELECT ID FROM `profesor` WHERE CONCAT(nombre,' ',a_paterno,' ',a_materno) = '$Prof'";
            $res = $con->query($sql);
            if($res->num_rows > 0){
                while($row = $res->fetch_assoc()){
                $Profid = $row["ID"];
                }
            }else{
                $numid = 1;
            }

            $Cred = $_POST['creditos_tepic'];
            $Vig = $_POST['vigencia'];
            date('d-m-Y',strtotime($Vig ));
            $prop = $_POST['proposito'];
            echo"<br><p style='color: blue;'>$NomMateria</p><br>";

            /* $sql="INSERT INTO `materia` (`ID`, `nombre_materia`, `id_sem`, `id_prof`, `creditos`, `vigencia`,
            `Proposito`) VALUES ($matid, '$NomMateria', $Semid, $Profid, $Cred, '$Vig', '$prop')";  */                             
            
            /*$sql="UPDATE materia SET nombre_materia = '$NomMateria',id_sem = $Semid,id_prof = $Profid,
            creditos = $Cred,vigencia = $Vig,Proposito = '$prop' WHERE ID = $_GET['id']";*/
            $sql="UPDATE `materia` SET `nombre_materia` = '$NomMateria', `id_sem` = '$Semid', `id_prof` = '$Profid', `creditos` = '$Cred', `vigencia` = '$Vig', `Proposito` = '$prop' WHERE `materia`.`ID` = $idmateria1";
            echo"<br><p style='color: blue;'>$NomMateria</p><br>";
            
            
            if($con->query($sql)==true){
                header("Location:materias.php");
  
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