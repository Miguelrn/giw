<?php    
	require_once './controlador/opbasededatosMongoDB.php';
?>
<script>
	var llevarAProducto = function(idProducto, idCategoria){
		$('#zona_central').load('vista/infoproducto.php?idProd='+idProducto+'&idCat='+idCategoria);					
	};
</script>
<div id="sliderFrame">
	<div id="slider">
		<!-- Se debe enlazar a contenido usando href. -->
		<?php 
		$mongo = new MongoDBConector();
		$cursor = $mongo->consultaAzarDiscosInicio();
		
		foreach ($cursor as $row) {
		?>
		<a href="#" onclick="llevarAProducto(<?php echo "'". $row['_id'] . '\',\'' . $row['categoria']?>')"> <img src="vista/images/caratulas/<?php echo $row['foto'] ?>" width="360" height="360"
			alt="<?php echo $row['nombre'] ?>" /> </a>		
		<?php 
		}
		unset($cursor);	
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
			$mongo = new MongoDBConector();
			$cursor = $mongo->consultaAzarDiscosInicio();
			
			foreach ($cursor as $row) {
			?>
			<td>
				<a href="#" onclick="llevarAProducto(<?php echo "'". $row['_id'] . '\',\'' . $row['categoria']?>')">
					<img src="vista/images/caratulas/<?php echo $row['foto'] ?>" width="100px" height="100px"></img>
					<p class="fuenteSubtitulo"><?php echo $row['nombre'] ?></br><?php echo $row['precio'] . '€' ?></p>
				</a>
			</td>				
			<?php 
			}
			unset($cursor);
		?>	
	</tr>
	<tr>
		<td colspan="3">
			<p class="fuenteTitulo">Recomendados para ti</p>
		</td>
	</tr>
	<tr>
		<?php 
			if (session_id() == "") {
				@session_start();
			}
			if(isset($_SESSION['logueado']) && $_SESSION['logueado'] && isset($_SESSION['edad'])){ //es un usuario logueado
				$edad = $_SESSION['edad'];
				$mongo = new MongoDBConector();			
				$cursor = $mongo->consultaDiscosPorEdad($edad);
			} else {				
				$mongo = new MongoDBConector();
				$cursor = $mongo->consultaAzarDiscosInicio();
			}
			foreach ($cursor as $row) {
			?>
			<td>	
				<a href="#" onclick="llevarAProducto(<?php echo "'". $row['_id'] . '\',\'' . $row['categoria']?>')">
					<img src="vista/images/caratulas/<?php echo $row['foto'] ?>" width="100px" height="100px"></img>
					<p class="fuenteSubtitulo"><?php echo $row['nombre'] ?></br><?php echo $row['precio'] . '€' ?></p>
				</a>
			</td>				
			<?php 
			}
			unset($cursor);	
		?>	
	</tr>
</table>