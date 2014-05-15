<?php
	require_once '../controlador/opbasededatosMongoDB.php';
	ini_set("display_errores", "stdout");
	error_reporting(E_ALL | E_STRICT);
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		//error_reporting(E_ALL);
		$BDD = new Mysql();
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
		
		$resultado = $BDD->consultaArticulosCategoriaPorNombre($categoriaCatalogo);
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
<?php } ?>


