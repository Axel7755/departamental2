<?php
//Conexion a abase de datos
//para listar los datos de las unidades de aprendisaje
$host = "localhost";
$user = "root";
$pass = "";
$db = "escuela";


//$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de docentes (CRUD)</title>
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
        echo"<h1>Alta de docentes (CRUD)</h1>";
        //Conbinand php y html
    ?>
        <!--<h1>Alta de materia (CRUD)</h1>-->
    <!-- action redirecciona al archivo que se le ponga--> 
    <form action="profesores.php" method="post">
        <table style="margin: 0 auto; " border="1px">
            <tr>
                <td>
                    <label for="nombrep">Nombre</label>
                </td>
                <td>
                    <input type="text" name="nombrep" id="nombrep" size="50">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="apellidoP">Apelldio Paterno</label>                  
                </td>
                <td>
                    <input type="text" name="apellidoP" id="apellidoP" size="50">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="apellidoM">Apelldio Materno</label>
                </td>
                <td>
                    <input type="text" name="apellidoM" id="apellidoM" size="50">
                </td>
            </tr>
            <tr>
            <tr>
                <td>
                    <label for="apellidoM">Numero de emplado</label>
                </td>
                <td>
                    <input type="text" name="Numemp" id="apellidoM" size="50">
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
            if(isset($_POST['nombrep'])){

                $sql="SELECT * FROM `profesor`";
                $res = $con->query($sql);
                if($res->num_rows > 0){
                    while($row = $res->fetch_assoc()){
                        $matid = ($row["ID"])+1;
                        }
                }else{
                    $matid = 1;
                }
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
                
                $sql="INSERT INTO `profesor` (`ID`, `nombre`, `a_paterno`, `a_materno`, `num_empleado`)VALUES
                 ($matid, '$nombrep', '$apellidoP', '$apellidoM','$Numemp')";                               
                
                if($con->query($sql)==true){
                    header("Location:profesores.php");
      
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
                 Apellido Paterno
             </th>
             <th>
                 Apellido Materno
             </th>
             <th>
                 Numero de empleado
             </th>
         </tr>
     </thead>
     <tbody>
     <?php
     $con = new mysqli($host,$user,$pass,$db) or die("problemas al conectar");
     $sql = "SELECT * FROM profesor ";
     $res =$con->query($sql);
     
     if($res->num_rows>0){
         while($row = $res->fetch_assoc()){
            echo'
         <tr>
             <td>'.
                 $row["ID"].'
             </td>
             <td>'.
                $row["nombre"].'
             </td>
             <td>'.
                $row["a_paterno"].'
             </td>
             <td>'.
                 $row["a_materno"].'
             </td>
             <td>'.
                $row["num_empleado"].'
             </td>
             <td>
                <a href="Actualizarp.php?id='.$row["ID"].'">Actualizar</a>
                <a href="eliminarp.php?id='.$row["ID"].'">Eliminar</a>
             </td>
         </tr>';
         }
     }  
     $con->close();
    ?>
    </tbody>     
 </table>
    <a href="index.php">Regresar a la pagina principal</a>
</body>
</html>