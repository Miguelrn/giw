<script>
	var procesarBusquedaAvanzada = function() {
		var e = document.getElementById('artista');
		var artista = e.value == "" ? "ninguno" : e.value ;
		
		e = document.getElementById('disco');
		var disco = e.value == "" ? "ninguno" : e.value ;
		
		e = document.getElementById('comboBoxPrecio');
		var valPrecio = e.options[e.selectedIndex].value;
		
		e = document.getElementById('comboBoxCategoria');
		var categoria = encodeURIComponent(e.options[e.selectedIndex].value);
		
		e = document.getElementById('comboBoxNota');
		var valNota = e.options[e.selectedIndex].value;
		
		console.log('./controlador/procesarBusquedaAvanzada.php?categoria='+categoria+
		'&artista='+artista+'&disco='+disco+'&valNota='+valNota+'&valPrecio='+valPrecio);
		
		$('#zona_central').load('./controlador/procesarBusquedaAvanzada.php?categoria='+categoria+
		'&artista='+artista+'&disco='+disco+'&valNota='+valNota+'&valPrecio='+valPrecio);
		
		
	}
</script>

<p align="center" class="fuenteTitulo">Busqueda avanzada</p>

<form align="center" onsubmit="procesarBusquedaAvanzada()" method="get" accept-charset="utf-8">
	<input type="text" id="disco" placeholder="Nombre de disco"/>
	<br />
	<br />
	<input type="text" id="artista" placeholder="Artista"/>
	<br />
	<br />
	<label class="fuenteSubtitulo">Categoria: </label>
	<br />
	<select id="comboBoxCategoria">
			<option value="ninguno">Ninguno</option>
			<option value="rockandroll">Rock</option>
			<option value="pop">Pop</option>
			<option value="electronica">Electronica/Dance</option>
			<option value="clasica">Clasica</option>
			<option value="jazz">Jazz</option>
			<option value="rap">Rap</option>
			<option value="blues">Blues</option>
			<option value="r&b">R&B</option>
			<option value="folclorica">Folclorica</option>
	</select>
	<br />
	<br />
	<label class="fuenteSubtitulo">Precio:</label>
	<br />
	<select id="comboBoxPrecio">
		<option value="ninguno">Ninguno</option>
		<option value="1">Entre 0 y 10</option>
		<option value="2">Entre 10 y 20</option>
		<option value="3">Entre 20 y 30</option>
	</select>
	<br />
	<br />
	<label class="fuenteSubtitulo">Valoración mínima:</label>
	<br />
	<select  id="comboBoxNota">
		<option value="ninguno">Ninguno</option>
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