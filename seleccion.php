<?php
            session_start();    
               
                 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     if(empty($_SESSION['Usuario'])){
        $Usu="Usuario";
      }else{
        $Usu=$_SESSION['Usuario'];
      }
      echo "Hola ".$Usu;
    ?>
    <style>
        
    </style>
    <li><a href="Semestre.php">
        Semestres
    </a></li>
    <li><a href="profesores.php">
        Docentes
    </a></li>
    <li><a href="materias.php">
        Materias
    </a></li>
    <a href="login.php">Regresar a la pagina principal</a>
</body>
</body>
</html>