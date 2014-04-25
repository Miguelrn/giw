<a class="cabecera" id="logo" onclick="inicio()" title="Volver al inicio"></a>
<div class="cabecera" id="menu">
	<script>
		function mostrarResultados(){			
			var num=document.getElementById('keywords');
			var resultado = num.value;
			console.log(resultado);
			$('#zona_central').load('./controlador/buscador.php?keywords='+resultado);
		}
	</script>	
	<form action="javascript:void(0);" onsubmit="mostrarResultados()" accept-charset="utf-8">
		<input type="text" id="keywords" name="keywords" size="40" maxlength="30" placeholder="Buscador">
		<button>Buscar</button>
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
			<p>
				<a class="fuenteTitulo" href="#" onclick="inicio()">Inicio</a> | 
				<a class="fuenteTitulo" href="#" onclick="nosotros()">Sobre nosotros</a> | 
				<a class="fuenteTitulo" href="#" onclick="pago()">Formas de pago</a> | 
				<a class="fuenteTitulo" href="#" onclick="legal()">Nota Legal</a>
			</p>
		</div>
	</form>
</div>
<div class="cabecera" id="usuario">
	<?php
	include_once 'usuario.php';
	?>
</div>

