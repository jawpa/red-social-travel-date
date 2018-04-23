<?php 

    session_start();

    include 'lib/config.php';

    if (isset($_SESSION['usuario'])) {
       header("Location: index.php");
    }
 ?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Registro TravelDate.com</title>

    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    
    <!-- Custom styles for this template -->
    <link href="estilos/signin.css" rel="stylesheet">

    
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h2 class="form-signin-heading">Registrarse en TravelDate.Com</h2>
        <label for="nombrecompleto" class="sr-only">Nombre Completo</label>
        <input type="text" id="nombrecompleto" name="nombre" class="form-control" placeholder="Nombre Completo" value="<?php //echo($_POST['nombre']); ?>" required autofocus>
        <label for="usuario" class="sr-only">Usuario</label>
        <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" value="<?php //echo($_POST['usuario']); ?>" required autofocus>
        <label for="inputEmail" class="sr-only">Dirección de EMail</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Dirección de Mail" value="<?php //echo($_POST['mail']); ?>" required autofocus>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" name="contrasena" class="form-control" placeholder="Contraseña" required>
        <label for="inputPassword" class="sr-only">Repita Contraseña</label>
        <input type="password" id="inputPassword" name="repcontrasena" class="form-control" placeholder="Repita Contraseña" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="check"> Acepto los <a href="#">términos y condicionnes</a>
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="registrar">Registrarse</button>
        
      </form>
       <p class="enlace"><a class="btn btn-lg btn-success btn-block" type="submit" name="loguear" href="login.php">Ya estás registrado?</a></p> 
    </div> <!-- /container -->

    <?php 

      

      if (isset($_POST['registrar'])) {
        $nombre = mysqli_real_escape_string($link,$_POST['nombre']);
        $usuario = mysqli_real_escape_string($link,$_POST['usuario']);
        $email = mysqli_real_escape_string($link,$_POST['email']);
        $contrasena = mysqli_real_escape_string($link,$_POST['contrasena']);
        $repcontrasena = mysqli_real_escape_string($link,$_POST['repcontrasena']);

            
        $comprobarusuario = mysqli_num_rows(mysqli_query($link,"SELECT * FROM usuarios WHERE usuario = '$usuario'"));
        $comprobaremail = mysqli_num_rows(mysqli_query($link,"SELECT * FROM usuarios WHERE email = '$email'"));



        if ($comprobarusuario) {

          echo("el nombre de usuario ya existe, elige otro");
        
        }
        else{
          
          if($comprobaremail){
           
            echo "El email ya está en uso, use otro";
          
          }else{

              if($contrasena != $repcontrasena){
           
                echo("la contraseña está mal escrita");
              }
              else{
                    $insertar = "INSERT INTO usuarios (nombre,usuario,contrasena,email,fecha_reg,avater) values ('$nombre','$usuario','$contrasena','$email', now(),'defecto.jpg')";

                    if (mysqli_query($link, $insertar)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $insertar . "<br>" . mysqli_error($link);
                    }

              }
            
          }
        }

     
      }

      
      
    ?>



    
  </body>
</html>
