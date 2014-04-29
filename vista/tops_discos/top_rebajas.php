<?php
	require_once './controlador/opbasededatos.php';
	
	$BDD = new Mysql();
	$resultado = $BDD -> conseguirTopRebajas();
?>
<script>
	var cargaDiscoRebajado = function(id) {
		$('#zona_central').load('vista/catalogo.php?infoproducto=' + id);
	}
</script>
</br>
<div id="topRebajas">
	<ul class="categorias">
	<li class="fuenteTitulo" align="center">
		TOP REBAJAS
	</li>
	</ul>
	<ol>
	<?php 
		while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
	?>
	<li class="fuenteSubtitulo">
		<a href="#<?php echo $row['nombre'] ?>" 
			onclick="cargaCatalogo(<?php echo $row['id_articulo'] ?>)"><?php echo $row['nombre'] ?></a>
	</li>
	<?php
	}
	?>		
	</ol>
	
</div>
