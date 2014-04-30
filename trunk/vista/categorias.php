<ul class="categorias">
	<script>
		var cargaCatalogo = function(num){
			$('#zona_central').load('vista/catalogo.php?categoria='+num);
		};		
	</script>	
	<li class="fuenteTitulo">CATEGORÍAS</li>
	<li class="fuenteSubtitulo">
		<a href="#rockandroll" onclick="cargaCatalogo('Rock%20and%20Roll')">Rock & Roll</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#pop" onclick="cargaCatalogo('Pop')">Pop</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#electronica" onclick="cargaCatalogo(Electrónica)">Electrónica</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#clasica" onclick="cargaCatalogo(Clásica)">Clásica</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#jazz" onclick="cargaCatalogo(Jazz)">Jazz</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#rap" onclick="cargaCatalogo(Rap)">Rap</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#blues" onclick="cargaCatalogo(Blues)">Blues</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#randb" onclick="cargaCatalogo(R&B)">R&B</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#folclorica" onclick="cargaCatalogo(Folclórica)">Folclórica</a>
	</li>
</ul>
