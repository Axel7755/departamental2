<?php
//Conexion a abase de datos
//para listar los datos de las unidades de aprendisaje
$host = "localhost";
$user = "root";
$pass = "";
$db = "escuela";
if(isset($_POST['idMateria'])){
    $idmateria = $_POST['idMateria'];
    $con = new mysqli($host,$user,$pass,$db) or die("problemas al conectar");
        $sql="DELETE FROM materia WHERE ID =$idmateria";
        $con->query($sql);
        $con->close();

}

//$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de materias (CRUD)</title>
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
        border-color:  rgba(100, 100, 100, 0.685);
    }
    textarea{
        background-color: black;
        color: rgba(100, 100, 100, 0.685);
    }
</style>
<body>
    <?php 

        //Esto es php, despues veremos java tambien
        echo"<h1>Alta de materia (CRUD)</h1>";
        //Conbinand php y html
    ?>
        <!--<h1>Alta de materia (CRUD)</h1>-->
    <!-- action redirecciona al archivo que se le ponga--> 
    <form action="materias.php" method="post">
        <table style="margin: 0 auto; " border="1px">
            <tr>
                <td>
                    <?php
                        echo'<label for="nombre">Nombre de materia</label>';
                    ?>
                </td>
                <td>
                    <input type="text" name="nombrem" id="nombre" size="50">
                </td>
            </tr>
            <tr>
                <td>
                    <?php

                    echo'<label for="semestre">Semestre</label>';
                    
                    ?>                    
                </td>
                <td>
                    <select  name="semestre" id="semestre" >
                    <?php
                        $con = new mysqli($host,$user,$pass,$db) or die("problemas al conectar");
                        $sql = "SELECT nombre_semestre FROM
                        semestre";
                        $res =$con->query($sql);
                        
                        if($res->num_rows>0){
                            $i=1;
                            while($row = $res->fetch_assoc()){
                                $semestre = $row["nombre_semestre"];
                                echo"<option>$semestre</option>";
                                $i++;
                            }
                            $con->close();
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    echo'<label for="profesor">Profesor</label>';
                    ?>  
                </td>
                <td>
                    <select  name="profesor" id="profesor">
                        <?php
                        $con = new mysqli($host,$user,$pass,$db) or die("problemas al conectar");
                        $sql = "SELECT CONCAT(nombre,' ',a_paterno,' ',a_materno) AS nomprofe FROM
                        profesor";
                        $res =$con->query($sql);
                        
                        if($res->num_rows>0){
                            while($row = $res->fetch_assoc()){
                                $profesor = $row["nomprofe"];
                                echo"<option>$profesor</option>";
                            }
                            $con->close();
                        }
                        ?>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td>
                    <label for="creditos_tepic">Creditos tepic</label>
                </td>
                <td>
                    <input type="decimal" name="creditos_tepic" id="creditos_tepic">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="vigencia">Vigencia</label>
                </td>
                <td>
                    <input type="date" name="vigencia" id="vigencia">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="proposito">Proposito</label>
                </td>
                <td>
                   <textarea rows="5" cols="50" name="proposito" id="proposito">

                   </textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Guardar" id="btnguardar" name="btnguardar">
                </td>
                <td>
                    <input type="reset" value="Limpiar" id="btnlimpiarr" name="btnlimpiarr">
                </td>
            </tr>
        </table>
        <?php
            $con = new mysqli($host,$user,$pass,$db) or die("problemas al conectar");
            if(isset($_POST['nombrem'])){

                $sql="SELECT * FROM `materia`";
                $res = $con->query($sql);
                if($res->num_rows > 0){
                    while($row = $res->fetch_assoc()){
                        $matid = ($row["ID"])+1;
                        }
                }else{
                    $matid = 1;
                }
 
                $NomMateria = $_POST['nombrem'];

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

                $sql="INSERT INTO `materia` (`ID`, `nombre_materia`, `id_sem`, `id_prof`, `creditos`, `vigencia`,
                `Proposito`) VALUES ($matid, '$NomMateria', $Semid, $Profid, $Cred, '$Vig', '$prop')";                               
                
                if($con->query($sql)==true){
                    header("Location:materias.php");
      
                }else{
                    echo "<br><p style='color: blue;'>Error al subir la materia</p>";
                }
                
                $con->close();
                
            }
        ?>       
    </form>
    <br>
    <!--
        SELECT ma.id AS id, nombre_materia,nombre_semestre, CONCAT(nombre," ",a_materno," ",a_paterno) AS nombre, creditos, vigencia FROM
        materia ma JOIN profesor pro ON(ma.id_prof=pro.ID) JOIN semestre sem ON (ma.id_sem=sem.ID);
    -->
    

    
    <table style="margin: 0 auto; " border="1px">
     <thead>
         <tr>
             <th>
                 id
             </th>
             <th>
                 Nombre
             </th>
             <th>
                 Semestre
             </th>
             <th>
                 Profesor
             </th>
             <th>
                 Creditos
             </th>
             <th>
                 Vigencia
             </th>
             <th>
                 Acciones
             </th>
         </tr>
     </thead>
     <tbody>
     <?php
     $con = new mysqli($host,$user,$pass,$db) or die("problemas al conectar");
     $sql = "SELECT ma.id AS id, nombre_materia,nombre_semestre, CONCAT(nombre,'',a_materno,'',a_paterno) AS nombre, creditos, vigencia FROM
      materia ma JOIN profesor pro ON(ma.id_prof=pro.ID) JOIN semestre sem ON (ma.id_sem=sem.ID);";
     $res =$con->query($sql);
     
     if($res->num_rows>0){
         while($row = $res->fetch_assoc()){
            echo'
         <tr>
             <td>'.
                 $row["id"].'
             </td>
             <td>'.
                $row["nombre_materia"].'
             </td>
             <td>'.
                $row["nombre_semestre"].'
             </td>
             <td>'.
                 $row["nombre"].'
             </td>
             <td>'.
                $row["creditos"].'
             </td>
             <td>'.
                $row["vigencia"].'
             </td>
             <td>
                <a href="Actualizar.php?id='.$row["id"].'">Actualizar</a>
                <a href="eliminar.php?id='.$row["id"].'">Eliminar</a>
             </td>
         </tr>';
         }
     }  
     $con->close();
    ?>
    </tbody>
     <tfoot>
         <tr>
         <th>
                 id
             </th>
             <th>
                 Nombre
             </th>
             <th>
                 Semestre
             </th>
             <th>
                 Profesor
             </th>
             <th>
                 Creditos
             </th>
             <th>
                 Vigencia
             </th>
             <th>
                 Acciones
             </th>
         </tr>
     </tfoot>      
 </table>
    <a href="login.php">Regresar a la pagina principal</a>
</body>
</html>