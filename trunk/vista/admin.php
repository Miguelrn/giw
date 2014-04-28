<!-- insertar disco, borrar disco, modificar disco -->

<div>
	<script>
			var accion = function(idAccion){
				$('#zona_central').load('./vista/paneladmin.php?idAccion='+idAccion);
			};
	</script>
	<div>
		<button onclick="accion(0)">Añadir Disco</button>
	</div>
	<div>
		<button onclick="accion(1)">Borrar Disco</button>
	</div>
	<div>
		<button onclick="accion(2)">Modificar Disco</button>
	</div>
	<div>
		<button onclick="accion(3)">Consultar Disco</button>
	</div>
	<div>
		<button onclick="accion(4)">Eliminar Usuario</button>
	</div>
	<div>
		<button onclick="accion(5)">Consultar Usuario</button>
	</div>
	<div>
		<button onclick="accion(6)">Eliminar Pedido</button>
	</div>
	<div>
		<button onclick="accion(7)">Consultar Pedido</button>
	</div>
	<div>
		<button onclick="accion(8)">Estadísticas</button>
	</div>
	
	
</div>