<ul class="categorias">
	<script>
		var cargaCatalogoCronologico = function(num, num2, nomb){
			$('#zona_central').load('vista/catalogocronologico.php?ini='+num+'&fin='+num2+'&nombre='+nomb);
		};			
	</script>	
	<li class="fuenteTitulo">POR ÉPOCAS</li>
	<li class="fuenteSubtitulo">
		<a href="#<70" onclick="cargaCatalogoCronologico(0,1970,'antes de los 70')">antes de los 70</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#70-80" onclick="cargaCatalogoCronologico(1970,1980,'de los 70')">de los 70</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#80-90" onclick="cargaCatalogoCronologico(1980, 1990, 'de los 80')">de los 80</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#90-2000" onclick="cargaCatalogoCronologico(1990, 2000, 'de los 90')">de los 90</a>
	</li>
	<li class="fuenteSubtitulo">
		<a href="#actual" onclick="cargaCatalogoCronologico(2000, 2014, 'actual')">actual</a>
	</li>
</ul>
