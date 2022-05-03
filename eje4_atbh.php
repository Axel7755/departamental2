<?php
//Conexion a abase de datos
//para listar los datos de las unidades de aprendisaje
$host = "localhost";
$user = "root";
$pass = "";
$db = "escuela";
//$con = new mysqli($host,$user,$pass,$db) or die("problemas al conectar");
if(isset($_POST['idMateria'])){
    $idmateria = $_POST['idMateria'];

}else{
    $con = new mysqli($host,$user,$pass,$db) or die("problemas al conectar");
        $sql="DELETE FROM materia WHERE ID =".$_GET['id'];
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
    <title>EJERCICIO 4 - FORMULARIOS (CRUD)</title>
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
    <form action="guardar.html" method="post">
        <table style="margin: 0 auto; " border="1px">
            <tr>
                <td>
                    <?php
                        echo'<label for="nombre">Nombre de materia</label>';
                    ?>
                </td>
                <td>
                    <input type="text" name="nombre" id="nombre" size="50">
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
                        <option value="1">Primer Semestre</option>
                        <option value="2">Segundo Semestre</option>
                        <option value="3">Tercero Semestre</option>
                        <option value="4">Cuarto Semestre</option>
                        <option value="5">Quinto Semestre</option>
                        <option value="6">Sexto Semestre</option>
                        <option value="7">Septimo Semestre</option>
                        <option value="8">Octavo Semestre</option>
                        <option value="9">Noveno Semestre</option>
                        <option value="10">Decimo Semestre</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    echo'<<label for="profesor">Profesor</label>';
                    ?>  
                </td>
                <td>
                    <select  name="profesor" id="profesor">
                        <option value="1">Efrain Arredondo Morales</option>
                        <option value="2">Rosendo Vazques Roddriguez</option>
                        <option value="3">Julia Elena Hernandez Rios</option>
                        <option value="4">Victor Hugo Escobedo Carranza</option>
                        <option value="5">Margarita Hernandez Venegas</option>
                        <option value="6">Roberto Oswaldo Cruz Legia</option>
                        <option value="7">Sergio Dominguez Sanches</option>
                        <option value="8">Angel osiris Rodriguez Vazques</option>
                        <option value="9">Uriel Villegas</option>
                        <option value="10">Karina Rodriguez Megia</option>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td>
                    <label for="creditos_tepic">Creditos tepic</label>
                </td>
                <td>
                    <input type="number" name="creditos_tepic" id="creditos_tepic">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="vigencia">Vigencia</label>
                </td>
                <td>
                    <input type="month" name="vigencia" id="vigencia">
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
            <tr>
                <td>
                    1
                </td>
                <td>
                    Tecnologias para la web
                </td>
                <td>
                    Cuarto semestre
                </td>
                <td>
                    Roberto Oswaldo Cruz Legia
                </td>
                <td>
                    7.5
                </td>
                <td>
                    Agosto 2021
                </td>
                <td>
                    <a href="actualizar.html?id=1&semestre=Cuarto semestre">Update</a>
                    <a href="eliminar.html?id=1&materia= Tecnologias para la web">Delete</a>
                </td>
            </tr>   
            <tr>
                <td>
                    2
                </td>
                <td>
                    Analisis de imagenes
                </td>
                <td>
                    Septimo semestre
                </td>
                <td>
                    Roberto Oswaldo Cruz Legia
                </td>
                <td>
                    7.5
                </td>
                <td>
                    Agosto 2021
                </td>
                <td>
                    <a href="actualizar.html?id=2&semestre=Septimo semestre">Update</a>
                    <a href="eliminar.html?id=2&materia= Analisis de imagenes">Delete</a>
                </td>
            </tr>
            <tr>
                <td>
                    3
                </td>
                <td>
                    Realidad virtual
                </td>
                <td>
                    Octavo semestre
                </td>
                <td>
                    Roberto Oswaldo Cruz Legia
                </td>
                <td>
                    7.5
                </td>
                <td>
                    Agosto 2022
                </td>
                <td>
                    <a href="">Update</a>
                    <a href="">Delete</a>
                </td>
            </tr>   
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
                 <a href="actualizar.php?id='.$row["id"].'"</a>
                 <a href="eliminar.php?id='.$row["id"].'">Delete</a>
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
    <a href="index.php">Regresar a la pagina principal</a>
</body>
</html>