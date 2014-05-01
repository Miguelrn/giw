<?php

	require_once '../controlador/opbasededatos.php';

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

	$BDD = new Mysql();

	if($BDD->discoconopiniones($idDisco)){//el disco tiene opiniones sobre el
		$resultado = $BDD->consultaDiscoyOpiniones($idDisco);
	}
	else {
		$resultado = $BDD->consultaDisco($idDisco);
	}
	$row = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

?>	

<script>

	var anadirAlCarro = function(id, nombre, precio){

		console.log("id:"+id+"nombre:"+encodeURIComponent(nombre)+"precio:"+precio);

		$("#cestaTotal").load('./controlador/anadircarro.php?id='+id+'&nombre='+encodeURIComponent(nombre)+'&precio='+precio);		

	}

</script>

<div class="fuentesSubtitulo">

	<div class="infoProducto" id="caratula">		

		<img src=<?php print ("vista/images/caratulas/$row[foto]") ?> width="300px" height="300px"></img>		

	</div>

	<div class="infoProducto" id="informacionDisco">

		<!-- informacion -->

		<?php		

			print("</br>");

			print("<h3 class=\"fuenteDescripcion\">Nombre: $row[nombre_disco] - $row[nombre_autor] </h3>");

			print("<h3 class=\"fuenteDescripcion\">Año: $row[anno] </h3>");

			//print("<h3 class=\"fuenteDescripcion\">Puntuación: $row[valoracion] </h3>");number_format($row['valoracion'],2,".",",");
			print("<h3 class=\"fuenteDescripcion\">Puntuación:");
			if(isset($row['valoracion'])){
				echo number_format($row['valoracion'],2,".",",");
			}
			else{
				echo " -";
			}	
			echo "</h3>";

			print("<h3 class=\"fuenteDescripcion\">Cantidad disponible: $row[cantidad] </h3>");

			print("<h3 class=\"fuenteDescripcion\">Precio: $row[precio]€</h3>");

		?>

		</br>

		<?php 
			if ( (isset($_SESSION['logueado']) && $_SESSION['logueado'] == true && $_SESSION['tipoUsuario'] == 0) || 

				   (!isset($_SESSION['logueado']))){		

		?>

		<button onclick="anadirAlCarro(<?php echo $idDisco . ',\'' . $row['nombre_disco'] . '\',' . $row['precio'] ?>)">
			Añadir al carro
		</button>

		<?php } ?>

	</div>
</div>
<?php if((isset($_SESSION['logueado']) && ($_SESSION['logueado'] == 1))){//solo podran opinar usuarios logueados ?>
<div class="fuenteSubtitulo">	
	<!-- pide al usuario que valore el disco, y de una opinion sobre el disco si no la habia dado previamente-->
	<div>
		<?php
			$correo = $_SESSION['correo'];
			$row = $BDD->opinionSobreDisco($correo, $idDisco);
			
			if($row['opinion'] == '' && $row['nota'] == ''){//si alguna de las dos cosas esta vacia le va pedir su opinion y la nota
				?> 
				
				<form id="consulta" name="consulta" action="./controlador/modificaopinion.php" method="post" accept-charset="utf-8">
					<textarea name="opinion" rows="4" cols="70" placeholder="Escriba aqui su opinion" requiered=''></textarea>
					</br>
					Nota:
					<select name="Nota">
						<optgroup label="Nota">
							<option value="0">0</option>
						    <option value="1">1</option> 
						    <option value="2">2</option>
						    <option value="3">3</option>
						    <option value="4">4</option>
						    <option value="5">5</option>
						    <option value="6">6</option>
						    <option value="7">7</option>
						    <option value="8">8</option>
						    <option value="9">9</option>
						    <option value="10">10</option>
						</optgroup>       
					</select></br>
					
					<input type="hidden" name="correo" value="<?php echo $_SESSION['correo']?>"/>
					<input type="hidden" name="idDisco" value="<?php echo $idDisco ?>" />
					
					<input type="submit" value="Calificar">
				</form>
				<?php
			}
			else{//tiene opinion muestro su opinion, opcionalmente se podria dar la opcion de cambiar su nota...
				?><fieldset>
					<legend>Nota: <?php echo $row['nota']; ?></legend>
					<textarea rows="4" cols="70" readonly><?php echo $row['opinion']; ?></textarea>

				</fieldset>
				<?php
				
				
			}
			
		?>
		
	</div>
		
<?php }//fin de comentarios para usuarios logueados ?>	
	
	<!-- Muestra 5 discos similares, de la misma categoria del visitado -->
	<script>
		var llevarAProducto = function(idProducto, idCategoria){
			$('#zona_central').load('vista/infoproducto.php?idProd='+idProducto+'&idCat='+idCategoria);					
		};
	</script>
	<table class="contenido" id="tablaDestacados">
	<tr>
		<td colspan="3">
			<p class="fuenteTitulo">Discos Similares</p>
		</td>
	</tr>	
	<tr>
		<?php 
			if ($idCategoria){
				$resultado = $BDD->consultaAzarDiscoCategoria($idCategoria);
				
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
			}
		?>	
	</tr>
	</table>


	<!-- Comentarios de todos usuarios, no se muestran los comentarios del usuario actual -->
	<?php 
		$resultado = $BDD->buscaOpiniones($idDisco);//devuelve todas las opiniones del disco idDisco
		
		if ($resultado){
			echo "<p class=\"fuenteSubtitulo\">Otros usuarios opinaron:</p>";
		}
		
		//$correo = $_SESSION['correo'];
		while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		
			if(!isset($_SESSION['correo']) || ($row['correo'] != $_SESSION['correo'])){?>
			<fieldset>
				<legend>Nota: <?php echo $row['nota']; ?></legend>
				<textarea rows="4" cols="70" readonly><?php echo $row['opinion']; ?></textarea>
			</fieldset>	
		<?php 
			}//cierra if
		}//cierra while
		mysqli_free_result($resultado);
		?>
</div>



