<?php
	require_once './controlador/opbasededatosMongoDB.php';
	require_once './controlador/filtros.php';
	
    $ident = $_GET['ident'];
    $name = $_GET['name'];
	$title = $_GET['title'];	
	
	// FILTRO
	
	$filtros = new Filtros();
	
	$ident = $filtros->filtraIdentificadorDisco($ident);
	$title = $filtros->filtraNombreDisco($ident);
	$name = $filtros->filtraNombreUsuario($ident);
	
	if ($ident == false || $title == false || $name == false){
		echo "Tu petición no ha superado el filtro";
		return;
	}
	
	// CONSULTA
	
	$mongo = new MongoDBConector();		
	$doc = $mongo->consultaDisco($ident);
	
	$nombre = $doc['nombre'];
	$cantidad = $doc['cantidad'];
	$categoria = $doc['categoria'];
	$autor = $doc['autor'];
	$anno = $doc['anno'];	
	$foto = $doc['foto'];	
	$precio = $doc['precio'];
	
?>
<title><? echo $title ?></title>
<h1><? echo "Bienvenido " . $name ?></h1>
<img src="vista/images/caratulas/<? echo $foto; ?>" width="300px" height="300px"></img>
<h2><? echo "Nombre del articulo: " . $name ?></h2>
<h2><? echo "Cantidad en almacén: " . $cantidad ?></h2>
<h2><? echo "Autor: " . $autor ?></h2>
<h2><? echo "Año del disco: " . $anno ?></h2>
<h2><? echo "Precio: " . $precio ?></h2>

<!--
	http://localhost/tienda/mostrar.php?ident=""&name=""&title=""
-->



