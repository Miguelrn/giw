<ul class="categorias">
	<script>
		var cargaCatalogo = function(nombre){		
			$('#zona_central_dir').load('vista/directorio.php?dir='+encodeURIComponent(" Categorias -> " + nombre));
			$('#zona_central').load('vista/catalogo.php?categoria='+encodeURIComponent(nombre));	
		};		
	</script>	
	<li class="fuenteTitulo">CATEGORÍAS</li>
	<li class="fuenteSubtitulo">
		<a href="#rockandroll" onclick="cargaCatalogo('Rock & Roll')">Rock N' Roll</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#pop" onclick="cargaCatalogo('Pop')">Pop</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#electronica" onclick="cargaCatalogo('Electronica')">Electrónica</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#clasica" onclick="cargaCatalogo('Clasica')">Clásica</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#jazz" onclick="cargaCatalogo('Jazz')">Jazz</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#rap" onclick="cargaCatalogo('Rap')">Rap</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#blues" onclick="cargaCatalogo('Blues')">Blues</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#randb" onclick="cargaCatalogo('R&B')">R&B</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#folclorica" onclick="cargaCatalogo('Folclorica')">Folclórica</a>
	</li>
</ul>
