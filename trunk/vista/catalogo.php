<?php
	include '../controlador/opbasededatos.php';
	//include 'categorias.php';
	//include 'variables.php';
	//include_once 'controlador/opbasededatos.php';
	ini_set("display_errores", "stdout");
	error_reporting(E_ALL | E_STRICT);
	//error_reporting(E_ALL);
	$categoriaCatalogo = $_GET['categoria'];
	// no coje la variable que esta en categorias ¿?
?>
<table class="catalogo">
	<tr>
		<td colspan="5">
		<h1 class="fuenteTitulo">
		<?php
		switch($categoriaCatalogo) {
			case 1:
				print("Rock 'N' Roll");
				break;
			case 2 :
				print("Pop");
				break;
			case 3 :
				print("Electrónica");
				break;
			case 4 :
				print("Clásica");
				break;
			case 5 :
				print("Jazz");
				break;
			case 6 :
				print("Rap");
				break;
			case 7 :
				print("Blues");
				break;
			case 8 :
				print("R&B");
				break;
			case 9 :
				print("Folclórica");
				break;
			default :
				break;
		}
		?>
		</h1>
		</td>
	</tr>

	<?php
	$BDD = new Mysql();
	$resultado = $BDD->consultaArticulosCategoria($categoriaCatalogo);
	//$num_results = $result->num_rows;
	$numCelda = 0;
	?>		
	<?php	
		//la primera
		//header("Content-Type: image/jpeg");
		//deberia servir para mostrar una imagen
		while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {//falta darle formato a las tr
			if ($numCelda % 4 == 0){
				print("<tr>");
			}
	?>
			<script>
				var llevarAProducto = function(idProducto,idCategoria){
					$('#zona_central').load('vista/infoproducto.php?idProd='+idProducto+'&idCat='+idCategoria);					
				};
			</script>
				
			<td><a href="#" onclick="llevarAProducto(<?php echo $row['id_articulo'] ?>, <?php echo $categoriaCatalogo ?>)">
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

