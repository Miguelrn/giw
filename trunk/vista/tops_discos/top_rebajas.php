<?php
	require_once './controlador/opbasededatosMongoDB.php';
	
	$BDD = new Mysql();
	$resultado = $BDD -> conseguirTopRebajas();
?>
<script>
	var cargaDiscoRebajado = function(idProducto, idCategoria) {
		$('#zona_central_dir').load('vista/directorio.php?dir='+encodeURIComponent("Top rebajas"));			
		$('#zona_central').load('vista/infoproducto.php?idProd='+idProducto+'&idCat='+idCategoria);
	}
</script>
</br>
<ul class="categorias">
<li class="fuenteTitulo">
	TOP REBAJAS
</li>
</ul>
<ol class="categorias" style="margin-left: 40px">
<?php 
	while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
?>
<li class="fuenteSubtitulo">
	<a href="#<?php echo $row['nombre'] ?>" 
		onclick="cargaDiscoRebajado(<?php echo $row['id_articulo'] ?>, <?php echo $row['id_categoria'] ?>)"><?php echo $row['nombre'] ?></a>
</li>
<?php
}
?>		
</ol>
	
