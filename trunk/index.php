<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Smart Music - The best songs and artists are in our web.">
		<meta name="keywords" content="smart, music, store, music, CDs, songs, artists,
			rockandroll, pop, electronica, clasica, jazz, rap, blues, randb, folclorica,
			1970, 1980, 1990, 2000, 2010">
		<meta name="author" content="GRUPO 07 - GIW
									 ANTONIO NU�EZ GUERRERO 
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
				<?php //include_once 'vista/cronologico.php'; ?>
				<?php //include_once 'vista/tops_discos/top_valorados.php' ?>
				<?php include_once 'vista/tops_discos/top_rebajas.php' ?>		
			</div>
			<div class="cuerpo contenido">
				<div id="zona_central_dir">
					<?php include_once 'vista/directorio.php'; ?>						
				</div>	
				<div id="zona_central" >
					<?php include_once 'vista/contenido.php'; ?>							
				</div>				
			</div>
			<div class="cuerpo carrito">
				<?php include_once 'vista/cesta.php'; ?>
				<?php include_once 'vista/pedidos.php'; ?>					
			</div>		
		</div>	
	</body>
</html>
