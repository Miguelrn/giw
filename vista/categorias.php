<ul class="categorias">
	<script>
		var cargaCatalogo = function(num){
			$('#zona_central').load('vista/catalogo.php?categoria='+num);
		};		
	</script>	
	<li class="fuenteTitulo">MÚSICA</li>
	<li class="fuenteSubtitulo">
		<a href="#rockandroll" onclick="cargaCatalogo(1)">Rock 'N' Roll</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#pop" onclick="cargaCatalogo(2)">Pop</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#electronica" onclick="cargaCatalogo(3)">Electrónica</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#clasica" onclick="cargaCatalogo(4)">Clásica</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#jazz" onclick="cargaCatalogo(5)">Jazz</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#rap" onclick="cargaCatalogo(6)">Rap</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#blues" onclick="cargaCatalogo(7)">Blues</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#randb" onclick="cargaCatalogo(8)">R&B</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#folclorica" onclick="cargaCatalogo(9)">Folclórica</a>
	</li>
</ul>

<?php include_once 'tops_discos/top_rebajas.php' ?>
