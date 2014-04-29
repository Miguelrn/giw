<?php    
	require_once './controlador/opbasededatos.php';
?>
<script>
	var llevarAProducto = function(idProducto){
		$('#zona_central').load('vista/infoproducto.php?idProd='+idProducto);					
	};
</script>
<div id="sliderFrame">
	<div id="slider">
		<!-- Se debe enlazar a contenido usando href. -->
		<?php 
		$BDD = new Mysql();
		$resultado = $BDD->consultaAzarDiscosInicio();
		
		while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		?>
		<a href="#" onclick="llevarAProducto(<?php echo $row['id_articulo'] ?>)"> <img src="vista/images/caratulas/<?php echo $row['foto'] ?>" width="360" height="360"
			alt="<?php echo $row['nombre'] ?>" /> </a>		
		<?php 
		}
		mysqli_free_result($resultado);
		?>		
	</div>
</div>
<table class="contenido" id="tablaDestacados">
	<tr>
		<td colspan="3">
			<p class="fuenteTitulo">Destacados</p>
		</td>
	</tr>	
	<tr>
		<?php 
			$BDD = new Mysql();
			$resultado = $BDD->consultaAzarDiscosInicio();
			
			while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
			?>
			<td>	
				<a href="#" onclick="llevarAProducto(<?php echo $row['id_articulo'] ?>)">
					<img src="vista/images/caratulas/<?php echo $row['foto'] ?>" width="100px" height="100px"></img>
					<p class="fuenteSubtitulo"><?php echo $row['nombre'] ?></br><?php echo $row['precio'] . '€' ?></p>
				</a>
			</td>				
			<?php 
			}
			mysqli_free_result($resultado);
		?>	
	</tr>
	<tr>
		<td colspan="3">
			<p class="fuenteTitulo">Recomendados para ti</p>
		</td>
	</tr>
	<tr>
		<?php 
			$BDD = new Mysql();
			$resultado = $BDD->consultaAzarDiscosInicio();
			
			while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
			?>
			<td>	
				<a href="#" onclick="llevarAProducto(<?php echo $row['id_articulo'] ?>)">
					<img src="vista/images/caratulas/<?php echo $row['foto'] ?>" width="100px" height="100px"></img>
					<p class="fuenteSubtitulo"><?php echo $row['nombre'] ?></br><?php echo $row['precio'] . '€' ?></p>
				</a>
			</td>				
			<?php 
			}
			mysqli_free_result($resultado);
		?>	
	</tr>
</table>