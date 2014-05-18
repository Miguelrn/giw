<?php
	if (session_id() == "") {
		@session_start();
	}
	if (isset($_SESSION['correo'])){
		
		/*$BDD = new Mysql();
		$numPed = $BDD->conseguirNumeroPedidos($_SESSION['correo']);*/
		$mongo = new MongoDBConector();
		$numPed = $mongo->conseguirNumeroPedidos($_SESSION['correo']);
		
	} else {
		$numPed = 0;
	}	
	
?>

<?php if($_SESSION['tipoUsuario'] == 0){ ?>
<div id="cestaTotal">
	</br>
	<div class="fuenteTitulo">
		<a id="img-pedido" onclick="mostrarPedidos()">
			MIS PEDIDOS
			<img width="36px" height="36px" id="pedidos" src="./vista/images/pedido.png"/>
		</a>
	</div>
	
	</br>
	<div class="fuenteSubtitulo">
		Pedidos: <?php echo "$numPed" ?>
	</div>	
	
	</br>
	<div class="divCesta">
		<script>
			var mostrarPedidos = function(){
				$('#zona_central_dir').load('vista/directorio.php?dir='+encodeURIComponent("Mis Pedidos -> Ver pedidos"));						
				$('#zona_central').load('./vista/verpedidos.php');
			};
		</script>
		<button onclick="mostrarPedidos()">Ver pedidos</button>
	</div>
</div>
<?php } ?>