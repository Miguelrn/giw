<?php

	include '../controlador/opbasededatos.php';

	ini_set("display_errores", "stdout");

	error_reporting(E_ALL | E_STRICT);

	

	$idDisco = $_GET['idProd'];//variable que vendra de catalogo...

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

</div>



<!--



/-----------------------------------/



-->

