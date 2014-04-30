<a class="cabecera" id="logo" onclick="inicio()" title="Volver al inicio"></a>
<div class="cabecera" id="bus-avanzada">
	<script>
		function mostrarResultados() {
			var num = document.getElementById('keywords');
			var resultado = num.value;
			console.log(resultado);
			$('#zona_central').load('./controlador/buscador.php?keywords=' + resultado);
		}
	</script>
	<form action="javascript:void(0);" onsubmit="mostrarResultados()" accept-charset="utf-8">
		<select name="SCat" id="category" class="realSelect">
			<option value="0">Todos los productos</option><option value="0">Valoración</option><option value="2">Tipo de música</option><option value="3">Precio</option>
		</select>
		<input type="text" id="keywords" name="keywords" list="busAvanzada" size="40" maxlength="30" placeholder="Buscador">
		<button>
			Buscar
		</button>
		<div>
			<script>
				var inicio = function() {
					location.reload();
				};
				var nosotros = function() {
					$('#zona_central').load('./vista/menu/sobrenosotros.php');
				};
				var pago = function() {
					$('#zona_central').load('./vista/menu/formasdepago.php');
				};
				var legal = function() {
					$('#zona_central').load('./vista/menu/notalegal.php');
				};
			</script>
		</div>
	</form>
	<div id="info">
		<a class="fuenteTitulo" href="#" onclick="inicio()">Inicio</a> | <a class="fuenteTitulo" href="#" onclick="nosotros()">Sobre nosotros</a> | <a class="fuenteTitulo" href="#" onclick="pago()">Formas de pago</a> | <a class="fuenteTitulo" href="#" onclick="legal()">Nota Legal</a>
	</div>
</div>
<div class="cabecera" id="usuario">
	<?php
	include_once 'usuario.php';
?>
</div>

