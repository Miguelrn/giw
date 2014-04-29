<?php
	include '../controlador/opbasededatos.php';	
	
	$BDD = new Mysql();
	$resultado = $BDD->conseguirTopRebajas();

?>
<script>
	var cargaDiscoRebajado = function(id){
		$('#zona_central').load('vista/catalogo.php?infoproducto='+id);
	}
</script>
<div id="topRebajas">
	<div class="fuenteTitulo">
		TOP REBAJAS
	</div>
	<?php 
		while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
	?>
	<li class="fuenteSubtitulo">
		<a href="#<?php $row['nombreDisco'] ?>" 
			onclick="cargaCatalogo(<?php $row['idDisco'] ?>)"><?php $row['nombreDisco'] ?></a>
	</li>
	<?php 
		}
	?>
	
</div>
