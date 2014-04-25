<div>
	<script>
		var verInformacionPedido = function(){
			$('#zona_central').load('./vista/panelrepartidor.php?accion=0');			
		};
		var verPedidos = function(){
			$('#zona_central').load('./vista/panelrepartidor.php?accion=1');			
		};
	</script>
	<div>
		<button onclick="verInformacionPedido()">Ver información de pedido</button>
	</div>
	<div>
		<button onclick="verPedidos()">Ver pedidos</button>
	</div>
</div>