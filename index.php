<?php 
	session_start();
	include 'lib/config.php';
	include 'lib/header.php';
	include 'lib/footer.php';
	include 'lib/presentacion_usuario.php';

	if (!isset($_SESSION['usuario'])) {
		header("Location: login.php");
	}

 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" href="../../favicon.ico">

    <title>Travel-date.com</title>

    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="estilos/jumbotron.css" rel="stylesheet">

    
  </head>

  <body>
	<?php echo(Cabezal()); ?>
 
    <?php echo(Presentacion()); ?>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>
      <div>
      	<h2>Últimos usuarios registrados</h2>
      	<ul>
      		<?php $registrados = mysqli_query($link,"SELECT avatar, usuario, fecha_reg FROM usuarios ORDER BY fecha_reg DESC LIMIT 8");
      			while ($reg = mysqli_fetch_array($registrados)) {
      		?>
				<li>
					<img src="imagenes/<?php echo($reg['avatar']); ?>" alt="">
					<p><a href="#"></a><?php echo($reg['usuario']); ?></p> 
					<p class="dia">Se registró: <?php echo($reg['fecha_reg']); ?></p>
				</li>
      		<?php		
      			} 

      		?>
      	</ul>
      </div>

      <hr>
	 	
	 	<?php echo(Footer()); ?>
      
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    
  </body>
</html>
