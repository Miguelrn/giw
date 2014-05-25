<?php

	require_once '../controlador/opbasededatosMongoDB.php';

	ini_set("display_errores", "stdout");

	error_reporting(E_ALL | E_STRICT);
	if (session_id() == "") {
		@session_start();
	}

	$idDisco = $_GET['idProd'];//variable que vendra de catalogo...
	if (isset($_GET['idCat'])){		
		$idCategoria = $_GET['idCat'];
	} else {
		$idCategoria = false;
	}
	
	$mongo = new MongoDBConector();
	
	/*$idDisco = $mongo->limpia_sql($idDisco);
	$idCategoria = $mongo->limpia_sql($idCategoria);
	*/
	/*if($mongo->discoconopiniones($idDisco)){//el disco tiene opiniones sobre el
		$resultado = $mongo->consultaDiscoyOpiniones($idDisco);
	}
	else {*/
	$row = $mongo->consultaDisco($idDisco);
	
	/*$cursor->getNext();
	$row = iterator_to_array($cursor, false);*/
	/*$row = null;
	foreach ($cursor as $doc){
		echo $doc['foto'];	
	}*/
	//}
	//$row = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

?>	

<script>

	var anadirAlCarro = function(id, nombre, precio){

		// console.log("id:"+id+"nombre:"+encodeURIComponent(nombre)+"precio:"+precio);
		
		// console.log('./controlador/anadircarro.php?id='+id+'&nombre='+encodeURIComponent(nombre)+'&precio='+precio);

		$("#cestaTotal").load('./controlador/anadircarro.php?id='+id+'&nombre='+encodeURIComponent(nombre)+'&precio='+precio);		

	}

</script>

<div style="position:relative; float: left; width: 600px;" class="fuentesSubtitulo">
	
	<div style="position:relative; float: left; width=50%; margin-left: 20px;" class="infoProducto" id="caratula">		

		<img src=<?php print ("vista/images/caratulas/$row[foto]") ?> width="320px" height="320px"></img>		

	</div>

	<div style="position:relative; float: left; width=50%; margin-left: 10px;" class="infoProducto" id="informacionDisco">

		<!-- informacion -->

		<?php		

			print("</br>");

			print("<h3 class=\"fuenteDescripcion\">Nombre: $row[nombre] - $row[autor] </h3>");

			print("<h3 class=\"fuenteDescripcion\">Año: $row[anno] </h3>");
			
			print("<h3 class=\"fuenteDescripcion\">Categoría: $row[categoria] </h3>");

			if($row['cantidad'] > 0 ){
				print("<h3 class=\"fuenteDescripcion\">En stock</h3>");
			}else if ($row['cantidad']  == 0 ){
				print("<h3 class=\"fuenteDescripcion\">Sin stock</h3>");
			}
			

			print("<h3 class=\"fuenteDescripcion\">Precio: $row[precio]€</h3>");
			
			
		?>

		</br>

		<?php 
		if ( (isset($_SESSION['logueado']) && $_SESSION['logueado'] == true && $_SESSION['tipoUsuario'] == 0)){
			$precio = $row['precio'];	   					
		?>
			<button onclick="anadirAlCarro(<?php echo "'" . $idDisco . '\',\'' . $row['nombre'] . '\',' . $precio ?>)">
				Añadir al carro
			</button>			
				
		<?php } ?>

	</div>
</div>

<?php if((isset($_SESSION['logueado']) && ($_SESSION['logueado'] == 1))){//solo podran opinar usuarios logueados ?>


	
		
<?php }//fin de comentarios para usuarios logueados ?>	
	
	<!-- Muestra 5 discos similares, de la misma categoria del visitado -->
    <script>
		var llevarAProducto = function(idProducto, idCategoria){
			$('#zona_central').load('vista/infoproducto.php?idProd='+idProducto+'&idCat='+idCategoria);					
		};
	</script>
	<div style="position:relative; float: left; width: 600px;">
		<table class="contenido" id="tablaDestacados">
		<tr>
			<td colspan="3">
				<p class="fuenteTitulo">Discos Similares</p>
			</td>
		</tr>	
		<tr>
			<?php 
				if ($idCategoria){
					$cursor = $mongo->consultaAzarDiscoCategoria($idCategoria);
					
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
				}
			?>	
		</tr>
		</table>
	</div>

	<!-- Comentarios de todos usuarios, no se muestran los comentarios del usuario actual -->	
	<?php 
		/*$cursor = $mongo->buscaOpiniones($idDisco);//devuelve todas las opiniones del disco idDisco
		
		echo "<p class=\"fuenteSubtitulo\">Otros usuarios opinaron:</p>";

		foreach ($cursor as $row) { ?>
			<fieldset>
				<legend>Nota: <?php echo $row['nota']; ?></legend>
				<textarea rows="4" cols="70" readonly><?php echo $row['opinion']; ?></textarea>
			</fieldset>					
		<?php }
		unset($cursor);*/
	?>
	
</div>



