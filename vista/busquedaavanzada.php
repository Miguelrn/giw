<script>
	function procesarBusquedaAvanzada() {
		var categoria = document.getElementById('categoria');
		var artista = document.getElementById('artista');
		var e = document.getElementById('comboBoxPrecio');
		var valNota = e.options[e.selectedIndex].value;
		e = document.getElementById('comboBoxNota');
		var valPrecio = e.options[e.selectedIndex].value;
		
		$('#zona_central').load('./controlador/procesarBusquedaAvanzada.php?categoria='+categoria+'&artista='+artista+'&valNota='+valNota
								+'&valPrecio='+valPrecio);
	}
</script>
<p align="center" class="fuenteTitulo">Busqueda avanzada</p>
<form align="center" onsubmit="procesarBusquedaAvanzada()" method="get" accept-charset="utf-8">
	<input type="text" id="categoria" placeholder="Tipo de música"/>
	<br />
	<br />
	<input type="text" id="artista" placeholder="Artista"/>
	<br />
	<br />
	<label class="fuenteSubtitulo">Precio:</label>
	<br />
	<select id="comboBoxPrecio">
		<option value="0">Ninguno</option>
		<option value="1">Entre 0 y 10</option>
		<option value="2">Entre 10 y 20</option>
		<option value="3">Entre 20 y 30</option>
	</select>
	<br />
	<br />
	<label class="fuenteSubtitulo">Valoración mínima:</label>
	<br />
	<select  id="comboBoxNota">
		<option value="0">Ninguno</option>
		<option value="1">1</option><option value="2">2</option>
		<option value="3">3</option><option value="4">4</option>
		<option value="5">5</option><option value="6">6</option>
		<option value="7">7</option><option value="8">8</option>
		<option value="9">9</option><option value="10">10</option>
	</select>
	<br />
	<br />
	<button type="submit">Buscar</button>
</form>