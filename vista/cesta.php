<?php
	if (session_id() == "") {
		@session_start();
	}
	if(!isset($_SESSION['tipoUsuario'])){
		$_SESSION['tipoUsuario'] = 0;
	}
	if($_SESSION['tipoUsuario'] == 0){//es un usuario normal
	
		if (isset($_SESSION['discos'])){
			
			$numProd = count($_SESSION['discos']);
			$prod = $_SESSION['discos'][$numProd-1][1];		
			$total = $_SESSION['precioDiscos'];		
			
		} else {
			$numProd = 0;
			$prod = "Ninguno";		
			$total = 0;
		}
	
?>

<div id="cestaTotal">
	<div class="fuenteTitulo">
		MI CESTA
		<!-- <a href="vercesta.php"><img id="carrito" src="vista/images/carrito.png" width="45px"; align="center";></a> -->
	</div>
	
	<br/> 		
	<div class="fuenteSubtitulo">
		Último producto: <br/> <?php print "$prod" ?>
	</div>
	
	<br/> 
	<div class="fuenteSubtitulo">
		Productos: <?php print "$numProd" ?>
	</div>
	
	<br/> 
	<div class="fuenteSubtitulo">
		Precio total: <?php print "$total" ?>  €
	</div>
	
	<br/> 
	<div class="divCesta">
		<script>		
			var mostrarCesta = function(){
				$('#zona_central_dir').load('vista/directorio.php?dir='+encodeURIComponent("Mi Cesta -> Ver cesta"));		
				$('#zona_central').load('./vista/vercesta.php');
			};
		</script>
		<button onclick="mostrarCesta()">Ver cesta</button>
	</div>
	
	<div class="divCesta">
		<script>
			var tramitarCompra = function(){				
				$('#zona_central_dir').load('vista/directorio.php?dir='+encodeURIComponent("Mi Cesta -> Tramitar compra"));		
				$('#zona_central').load('./vista/tramite.php');
			};
		</script>
		<button onclick="tramitarCompra()">Tramitar compra</button>
	</div>
</div>

<?php 
	}else if($_SESSION['tipoUsuario'] == 1){//es un usuario admin
	
		include_once('vista/admin.php');
?>



<?php
	}else if($_SESSION['tipoUsuario'] == 2){//es un repartidor
	
		include_once('vista/repartidor.php');		
	}
	
?>
		
