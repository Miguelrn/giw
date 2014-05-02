<a class="cabecera" id="logo" onclick="inicio()" title="Volver al inicio"></a>
<div class="cabecera" id="bus-avanzada">
	<script>
		function mostrarResultados() {
			var num = document.getElementById('keywords');
			var resultado = num.value;
			/*var e = document.getElementById("tipoBusqueda");
			 var strUser = e.options[e.selectedIndex].value;*/
			$('#zona_central_dir').load('vista/directorio.php?dirabs=' + encodeURIComponent("Busqueda"));
			$('#zona_central').load('./controlador/buscador.php?keywords=' + resultado);
			//$('#zona_central').load('./controlador/buscador.php?keywords='+resultado+'&tipoBusqueda='+strUser);
		}

		function mostrarBusquedaAvanzada() {
			$('#zona_central_dir').load('vista/directorio.php?dirabs=' + encodeURIComponent("Busqueda avanzada"));
			$('#zona_central').load('./vista/busquedaavanzada.php');
		}
	</script>
	<form action="javascript:void(0);"  accept-charset="utf-8">
		<!--<select name="SCat" id="tipoBusqueda" class="realSelect">
		<option value="0">Todos los productos</option><option value="1">Valoración</option><option value="2">Tipo de música</option><option value="3">Precio</option>
		</select>-->
		<input type="text" id="keywords" name="keywords" size="30" maxlength="30" placeholder="Buscador">
		<button onclick="mostrarResultados()">
			Buscar
		</button>
		<button onclick="mostrarBusquedaAvanzada()">
			Busqueda Avanzada
		</button>
		<div>
			<script>
				var inicio = function() {
					location.reload();
				};
				var nosotros = function() {
					$('#zona_central_dir').load('vista/directorio.php?dirabs=' + encodeURIComponent("Sobre nosotros"));
					$('#zona_central').load('./vista/menu/sobrenosotros.php');
				};
				var pago = function() {
					$('#zona_central_dir').load('vista/directorio.php?dirabs=' + encodeURIComponent("Formas de pago"));
					$('#zona_central').load('./vista/menu/formasdepago.php');
				};
				var legal = function() {
					$('#zona_central_dir').load('vista/directorio.php?dirabs=' + encodeURIComponent("Aviso legal"));
					$('#zona_central').load('./vista/menu/avisolegal.php');
				};
			</script>
		</div>
	</form>
	<div id="info">
		<a class="fuenteTitulo" href="#" onclick="inicio()">Inicio</a> | <a class="fuenteTitulo" href="#" onclick="nosotros()">Sobre nosotros</a> | <a class="fuenteTitulo" href="#" onclick="pago()">Formas de pago</a> | <a class="fuenteTitulo" href="#" onclick="legal()">Aviso Legal</a>
	</div>
</div>
<div class="cabecera" id="usuario">
	<?php
	include_once 'usuario.php';
?>
</div>

