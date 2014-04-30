<?php
	require_once '../controlador/opbasededatos.php';
	//include 'categorias.php';
	//include 'variables.php';
	//include_once 'controlador/opbasededatos.php';
	ini_set("display_errores", "stdout");
	error_reporting(E_ALL | E_STRICT);
	//error_reporting(E_ALL);
	$fechaInicio = $_GET['ini'];
	$fechaFin = $_GET['fin'];
	$nombre = $_GET['nombre'];
	
	echo "hola";
	// no coje la variable que esta en categorias ¿?
?>
<table class="catalogo">
	<tr>
		<td colspan="5">
		<h1 class="fuenteTitulo">
		<?php
				
			printf();
		?>
		</h1>
		</td>
	</tr>

	<?php
	$BDD = new Mysql();
	$resultado = $BDD->conseguirDiscoPorFechas($fechaInicio, $fechaFin);
	$numCelda = 0;
	?>	
	<script>
		var llevarAProducto = function(idProducto,idCategoria){
			$('#zona_central').load('vista/infoproducto.php?idProd='+idProducto+'&idCat='+idCategoria);					
		};
	</script>	
	<?php	
		//la primera
		//header("Content-Type: image/jpeg");
		//deberia servir para mostrar una imagen
		while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {//falta darle formato a las tr
			if ($numCelda % 4 == 0){
				print("<tr>");
			}
	?>
			<!-- <?php echo $row['id_articulo'] . ',\'' . $categoriaCatalogo?> -->	
			<td><a href="#" onclick="llevarAProducto(<?php echo $row['id_articulo'] . ',' . $row['id_categoria']?>)">
				<img src="vista/images/caratulas/<?php echo $row['foto'] ?>" width="100px" height="100px"></img></br>
		
	<p class="fuenteSubtitulo">
	<?php 
			print("$row[nombre]\n");
			print("$row[precio]€</a></td>");
			$numCelda++;
			
			if ($numCelda % 4 == 0){
				print("</tr>");					
			}
	
		}
		
	//la ultima
	?>
	</p>
</table>

<!--<img src="vista/images/image-slider-1.jpg" width="100px" height="100px"></img>
$img =  trim($img);
header('Content-Type: image/jpeg');
echo $img;
-->

