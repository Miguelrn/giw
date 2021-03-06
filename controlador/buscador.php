<?php
require_once 'opbasededatosMongoDB.php';
ini_set("display_errores", "stdout");
error_reporting(E_ALL | E_STRICT);

	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		$BDD = new Mysql();
	    //Recogemos las claves enviadas
	    $keywords = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_GET['keywords']))));
		//$tipoBusqueda = $_GET['tipoBusqueda'];
	
	    //Conectamos con la base de datos en la que vamos a buscar
	    
		$resultadoBusqueda = $BDD->busquedaNormal($keywords);
		//Busqueda por nombre de artículo
		/*if($tipoBusqueda == 0){
			$resultadoBusqueda = $BDD->busquedaNormal($keywords);
		
		//Por valoracion	
		}else if ($tipoBusqueda == 1){
			$resultadoBusqueda = $BDD->busquedaPorValoracion($keywords);
		
		//Por tipo de música	
		}else if($tipoBusqueda == 2){
			$resultadoBusqueda = $BDD->busquedaPorTipoDeMusica($keywords);
		
		//Por precio mínimo	
		}else {
			$resultadoBusqueda = $BDD->busquedaPorPrecioMaximo($keywords);
		}*/
	    $count_results = mysqli_num_rows($resultadoBusqueda);
	
	    //Si hay resultados
	    if ($count_results > 0 && $keywords != "") {
	
			if ($count_results > 1){
	        	echo '<h2 class="fuenteTitulo">Se han encontrado '.$count_results.' resultados.</h2>';			
			} else {
				echo '<h2 class="fuenteTitulo">Se ha encontrado '.$count_results.' resultado.</h2>';			
			}
	
	        echo '<ul>';
	        while ($row = mysqli_fetch_array($resultadoBusqueda, MYSQLI_ASSOC)) {
	            //En este caso solo mostramos el titulo y fecha de la entrada
	            //echo '<li><a href="#" onclick>'.$row['nombre'].'</a></li>';
	            
				//Mostrar la foto en la búsqueda
				/*echo '<li><a href="#" onclick="llevarAProducto('.$row['id_articulo'].')"> <img src="vista/images/caratulas/'.$row['foto'].'" width="180" height="180"
				  alt="'.$row['nombre'].'" /> </a></li>';*/
				 
				//Mostrar un enlace con el nombre del disco en la búsqueda
				echo '<li class="fuenteSubtitulo"><a href="#" onclick="llevarAProducto('.$row['id_articulo'].')">'.$row['nombre'].'</a></li>';
					
	        }
	        echo '</ul>';
	    }
	    else {
	        //Si no hay registros encontrados
	        echo '<h2>No se encuentran resultados con los criterios de búsqueda.</h2>';
	    }
	}
?>
<script>
	var llevarAProducto = function(idProducto){
		$('#zona_central').load('vista/infoproducto.php?idProd='+idProducto);					
	};
</script>