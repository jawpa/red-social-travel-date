<?php 
	if(!isset($_SESSION)) 
    { 
        session_start(); 			// solución para pasar los datos de session-avatar
    } 
	
	function Presentacion()
	{
?>	
	<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Bienvendo, <?php echo(ucwords($_SESSION['usuario'])); ?> </h1>
        <img src="imagenes/<?php echo($_SESSION['avatar']); ?>" alt="avatar">
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

<?php 

	}
?> 

<!-- <?php //echo($_SESSION['avatar']); ?> -->