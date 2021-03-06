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
			$subTotal = $_SESSION['precioDiscos'];	
			$total = $subTotal + $subTotal * 0.21;	
			
		} else {
			$numProd = 0;
			$prod = "Ninguno";
			$subTotal = 0;		
			$total = 0;
		}
	
?>

<div id="cestaTotal">
	<div class="fuenteTitulo">
		<a id="img-carrito" onclick="mostrarCesta()">
			MI CARRITO
			<img width="36px" height="36px" id="carrito" src="./vista/images/carrito.png"/>
		</a>
	</div>
	<br/> 		
	<div class="fuenteSubtitulo">
		Último producto: <br/> <?php print "$prod" ?>
	</div>
	
	<br/> 
	<div class="fuenteSubtitulo">
		Productos: <?php print "$numProd" ?>
	</div>
	
	<br />
	<div class="fuenteSubtitulo">
		Subtotal: <?php print "$subTotal" ?> €
	</div>
	
	<br/> 
	<div class="fuenteSubtitulo">
		Total: <?php print "$total" ?>  €
	</div>
	
	<br/> 
	<div class="divCesta">
		<script>		
			var mostrarCesta = function(){
				$('#zona_central_dir').load('vista/directorio.php?dir='+encodeURIComponent("Mi Carrito -> Ver carrito"));		
				$('#zona_central').load('./vista/vercesta.php');
			};
		</script>
		<button onclick="mostrarCesta()">Ver carrito</button>
	</div>
	
	<div class="divCesta">
		<script>
			var tramitarCompra = function(){				
				$('#zona_central_dir').load('vista/directorio.php?dir='+encodeURIComponent("Mi Carrito -> Tramitar compra"));		
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
		
