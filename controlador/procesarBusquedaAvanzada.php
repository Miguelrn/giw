<?php
	require_once 'opbasededatos.php';
	ini_set("display_errores", "stdout");
	error_reporting(E_ALL | E_STRICT);
	
	$categoria = urldecode($_GET['categoria']);
	$artista = $_GET['artista'];
	$disco = $_GET['disco'];
	$valPrecio = $_GET['valPrecio'];
	$valNota = $_GET['valNota'];
	
	//Conectamos con la base de datos en la que vamos a buscar
    $BDD = new Mysql();
	$resultadoBusqueda = $BDD->busquedaAvanzada($categoria, $disco, $artista, $valPrecio, $valNota);
	
	$count_results = 0;
	if($resultadoBusqueda != null){
		if($valNota != "ninguno"){
			while ($row = mysqli_fetch_array($resultadoBusqueda, MYSQLI_ASSOC)) {
				//Sacar la nota media para cada articulo
				$nota_media = $row['sum_nota'] / $row['num_val'];
				if($nota_media  >= $valNota){
					$count_results++;
				}
			}
			
		}else {
			$count_results = mysqli_num_rows($resultadoBusqueda);
		}
	}
	
	//Si hay resultados
	if ($count_results > 0 /*&& $keywords != ""*/) {
		if ($count_results > 1) {
			echo '<h2 class="fuenteTitulo">Se han encontrado ' . $count_results . ' resultados.</h2>';
		} else {
			echo '<h2 class="fuenteTitulo">Se ha encontrado ' . $count_results . ' resultado.</h2>';
		}
	
		echo '<ul>';
		$resultadoBusqueda = $BDD->busquedaAvanzada($categoria, $disco, $artista, $valPrecio, $valNota);
		if($valNota != "ninguno"){
			while ($row = mysqli_fetch_array($resultadoBusqueda, MYSQLI_ASSOC)) {
				//Mostrar un enlace con el nombre del disco en la búsqueda
				$nota_media = $row['sum_nota'] / $row['num_val'];
				if($nota_media >= $valNota){
					echo '<li class="fuenteSubtitulo"><a href="#" onclick="llevarAProducto(' . $row['id_articulo'] . ')">' . $row['nombre'] . '</a></li>';
				}
		
			}
			
		}else {
			while ($row = mysqli_fetch_array($resultadoBusqueda, MYSQLI_ASSOC)) {
				echo '<li class="fuenteSubtitulo"><a href="#" onclick="llevarAProducto(' . $row['id_articulo'] . ')">' . $row['nombre'] . '</a></li>';
			}
		}
		echo '</ul>';
	} else {
		//Si no hay registros encontrados
		echo '<h2>No se encuentran resultados con los criterios de búsqueda.</h2>';
	}
?>