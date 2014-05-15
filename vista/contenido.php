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
		$BDD = new Mysql();
		$resultado = $BDD->consultaAzarDiscosInicio();
		
		while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		?>
		<a href="#" onclick="llevarAProducto(<?php echo $row['id_articulo'] . ',' . $row['id_categoria']?>)"> <img src="vista/images/caratulas/<?php echo $row['foto'] ?>" width="360" height="360"
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
				<a href="#" onclick="llevarAProducto(<?php echo $row['id_articulo'] . ',' . $row['id_categoria']?>)">
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
			if (session_id() == "") {
				@session_start();
			}
			if(isset($_SESSION['logueado']) && $_SESSION['logueado'] && isset($_SESSION['edad'])){ //es un usuario logueado
				$edad = $_SESSION['edad'];
				$BDD = new Mysql();			
				$resultado = $BDD->consultaDiscosPorEdad($edad);
			} else {				
				$BDD = new Mysql();
				$resultado = $BDD->consultaAzarDiscosInicio();
			}
			while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
			?>
			<td>	
				<a href="#" onclick="llevarAProducto(<?php echo $row['id_articulo'] . ',' . $row['id_categoria']?>)">
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