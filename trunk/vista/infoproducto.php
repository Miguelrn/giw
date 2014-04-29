<?php

	require_once '../controlador/opbasededatos.php';

	ini_set("display_errores", "stdout");

	error_reporting(E_ALL | E_STRICT);

	

	$idDisco = $_GET['idProd'];//variable que vendra de catalogo...
	$idCategoria = $_GET['idCat'];

	$BDD = new Mysql();

	$resultado = $BDD->consultaDisco($idDisco);

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

			print("<h3 class=\"fuenteDescripcion\">Puntuación: $row[valoracion] </h3>");

			print("<h3 class=\"fuenteDescripcion\">Cantidad disponible: $row[cantidad] </h3>");

			print("<h3 class=\"fuenteDescripcion\">Precio: $row[precio]€</h3>");

		?>

		</br>

		<?php 

			if (session_id() == ""){

				@session_start();

			}

			if ( (isset($_SESSION['logueado']) && $_SESSION['logueado'] == true && $_SESSION['tipoUsuario'] == 0) || 

				   (!isset($_SESSION['logueado']))){		

		?>

		<button onclick="anadirAlCarro(<?php echo $idDisco . ',\'' . $row['nombre'] . '\',' . $row['precio'] ?>)">

			Añadir al carro

		</button>

		<?php } ?>

	</div>
	
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
		?>	
	</tr>
	</table>

</div>



