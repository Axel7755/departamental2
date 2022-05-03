<?php
   session_start();
  ?>
<!DOCTYPE html>

<html lang="es">
  <head>
  
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Inicia Sesión</title>
  </head>
  <style>
  .table tr td input {
      background-color: #CDFF63;
  }
  .name{
    font-size: 2.5em;
  }
  body{
      font-family: sans-serif;
  }
  table{
    text-align:center;
    background: #CDFF63 ;
    border-radius: 10px;
  } 
  </style>

    <body>
        
        <form action="login.php" method="POST">
        <table style="margin: 0 auto;">
            <thead>
                <tr>
                    <td>
                        <h1 class="titulo">Iniciar Sesión
                        </h1>
                    </td>
                </tr>
            <thead>
            <tr>
                <td>
                    <input class='name' type="text" name="nombreusuario" placeholder="Nombre de usuario"/><br/>
                <td>                
            </tr>
            <tr>
                <td>
                    <input class='name' type="password" name="contraseñal" placeholder="Contraseña"/><br/>
                <td>
            </tr>
            <tr>
                <td>
                    <input class="boton" type="submit" value="Entrar"/>
                <td>
            </tr>
            <tr>
                <td>
                    
                    <label for="nombre">¿No tienes cuenta?. <a href="signup.php">crea una</a> <a class="texto" href="index.php">Regresar al inicio</a></label>
                    
                </td>
            </tr>
        </table>
          
          <?php
          
           $host = "localhost";
           $user = "root";
           $pass = "";
           $db = "escuela";

            $con= new mysqli($host,$user,$pass,$db)or die("problemas al conectar");

            if(isset($_POST['nombreusuario'])){
 
            $NomUser = $_POST['nombreusuario'];
            $Conl = $_POST['contraseñal'];
            $sql="SELECT usuario,contraseña FROM `usuario` WHERE usuario = '$NomUser' AND contraseña = '$Conl'";
            $res = $con->query($sql);
            
            if($res->num_rows > 0){
              while($row=$res->fetch_array()){
                $var1 = $row["id"];
                $var2 = $row["usuario"];
                $usuario="$var2 ";
                //unset($_SESSION ['Contras']) elimina esa bariable de sesion
                $cons="$var1";
                $_SESSION ['Contras']=$cons;
                $_SESSION ['Usuario']=$usuario;
                header("Location:seleccion.php");
              }
              
            }else{
              echo "<br><p style='color: red;' class='texto danger'>Contraseña o nombre de usiario no validos</p>";
            }
            
            $con->close();
            
          }
        
               ?>
        </form>
      </div>
  </body>
</html>