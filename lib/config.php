<?php 
$link = mysqli_connect("localhost", "root", "1234", "redsocial");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
  printf("Falló la conexión: %s\n", mysqli_connect_error());
  exit();
}  

// $contrasena = mysqli_real_escape_string($link,$_POST['contrasena']);
//         $repcontrasena = mysqli_real_escape_string($link,$_POST['repcontrasena']);


 ?>