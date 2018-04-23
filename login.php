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

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    
    <!-- Custom styles for this template -->
    <link href="estilos/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h2 class="form-signin-heading">Login</h2>
        <label for="inputEmail" class="sr-only">Usuario</label>
        <input type="text" id="inputEmail" class="form-control" name="usuario" placeholder="Usuario" pattern="[A-Za-z_-0-9]{1,20}" required autofocus>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" class="form-control" name="contrasena" placeholder="Contraseña" pattern="[A-Za-z_-0-9]{1,20}" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Acordate
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="loguear">Loguearse</button>
      </form>
      <p class="enlace"><a class="btn btn-lg btn-success btn-block" type="submit" name="loguear" href="registro.php">Querés registrarte?</a></p> 

    </div> <!-- /container -->

  <?php 

    if (isset($_POST['loguear'])) {

      $usuario = mysqli_real_escape_string($link,$_POST['usuario']); // eliminamos los caracteres espaciales
      $usuario = strip_tags($_POST['usuario']); // eliminamos las etiquetas
      $usuario = trim($_POST['usuario']);  //eliminamos los espacios en blanco

      // $contrasena = password_hash($_POST['contrasena'],PASSWORD_BCRYPT); // eliminamos los caracteres espaciales
      // $contrasena = strip_tags(password_hash($_POST['contrasena'],PASSWORD_BCRYPT)); // eliminamos las etiquetas
      // $contrasena = trim(password_hash($_POST['contrasena'],PASSWORD_BCRYPT));  //eliminamos los espacios en blanco

      $contrasena = mysqli_real_escape_string($link,$_POST['contrasena']); // eliminamos los caracteres espaciales
      $contrasena = strip_tags($_POST['contrasena']); // eliminamos las etiquetas
      $contrasena = trim($_POST['contrasena']);  //eliminamos los espacios en blanco

      // $query = mysqli_query($link,"SELECT * FROM usuarios WHERE usuario = 'usuario' AND contrasena = 'contrasena'");

      $resultado = mysqli_query($link,"SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'");

      $comprobarusuario = mysqli_num_rows($resultado);


      if($comprobarusuario == 1){
        while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
          if ($usuario = $row['usuario'] && $contrasena = $row['contrasena']) {
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['id_usuario'] = $row['id_usuario'];
            header('Location:index.php');
          }
        }
      }else{
        echo('los datos ingresados son incorrectos');
      }
    }




   ?>
   
  </body>
</html>


