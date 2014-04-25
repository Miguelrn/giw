<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Tienda de música">
		<meta name="keywords" content="Music, CDs">
		<meta name="author" content="GRUPO 07 - GIW
									 ANTONIO NUÑEZ GUERRERO 
									 DANIEL ALEJANDRO NOWENDSZTERN
									 JOSE MIGUEL RODRIGUEZ NAVARRO">
		<link href="vista/css/index.css" rel="stylesheet" type="text/css"  />
		<link href="vista/slider/js-image-slider.css" rel="stylesheet" type="text/css" />
	    <script src="vista/slider/js-image-slider.js" type="text/javascript"></script>
	    <script src="vista/jquery/jquery-2.1.0.min.js" type="text/javascript"></script>
	</head>
	<body id="content">
		<?php 
			//print_r($_SESSION); 
			if (isset($_SESSION['error'])){
		?>		
		<script>			
			alert("<?php echo $_SESSION['error']?>"); 			
		</script>	
		<?php
				unset($_SESSION['error']);
			}			
		?>	
		<div class="cabecera">
			<?php include_once 'vista/cabecera.php'; ?>
		</div>
		<div>			
			<div class="cuerpo categorias">
				<?php include_once 'vista/categorias.php'; ?>				
			</div>
			<div id="zona_central" class="cuerpo contenido">
				<?php include_once 'vista/directorio'; ?>
				<?php include_once 'vista/contenido.php'; ?>						
			</div>
			<div class="cuerpo cesta">
				<?php include_once 'vista/cesta.php'; ?>
				<?php include_once 'vista/pedidos.php'; ?>					
			</div>		
		</div>			
	</body>
</html>
