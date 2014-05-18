<?php
	require_once '../controlador/opbasededatosMongoDB.php';
	ini_set("display_errores", "stdout");
	error_reporting(E_ALL | E_STRICT);
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		//error_reporting(E_ALL);
		$mongo = new MongoDBConector();
		$categoriaCatalogo = $_GET['categoria'];
	?>
	<table class="catalogo">
		<tr>
			<td colspan="5">
			<h1 class="fuenteTitulo">
			<?php
			 print($categoriaCatalogo);
			?>
			</h1>
			</td>
		</tr>
	
		<?php
		
		$cursor = $mongo->consultaArticulosPorCategoria($categoriaCatalogo);
		//$num_results = $result->num_rows;
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
			foreach ($cursor as $row) {//falta darle formato a las tr
				if ($numCelda % 4 == 0){
					print("<tr>");
				}
		?>
				
				<!-- <?php echo $row['id_articulo'] . ',\'' . $categoriaCatalogo?> -->	
				<td><a href="#" onclick="llevarAProducto(<?php echo "'" . $row['_id'] . "','" . $row['categoria']?>')">
					<img src="vista/images/caratulas/<?php echo $row['foto'] ?>" 
					width="100px" height="100px"></img></br>
			
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
<?php } ?>


