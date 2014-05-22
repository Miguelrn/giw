<?php
	require_once './controlador/opbasededatosMongoDB.php';
	require_once './controlador/filtros.php';
	
    $ident = $_GET['ident'];
    $name = $_GET['name'];
	$title = $_GET['title'];	
	
	// echo "iden:" . $ident . " name:" . $name . " title:" . $title;
	
	// FILTRO
	
	$filtros = new Filtros();
	
	$ident = $filtros->filtraIdentificadorDisco($ident);
	$title = $filtros->filtraTitulo($title);
	$name = $filtros->filtraNombreUsuario($name);
	
	if ($ident == false || $title == false || $name == false){
		echo "No has superado el filtro -> ident:".$ident." title:".$title." name:".$name;
		return;
	}
	
	// CONSULTA
	
	$mongo = new MongoDBConector();		
	$doc = $mongo->consultaDisco($ident);
	
	if ($doc){
		$nombre = $doc['nombre'];
		$cantidad = $doc['cantidad'];
		$categoria = $doc['categoria'];
		$autor = $doc['autor'];
		$anno = $doc['anno'];	
		$foto = $doc['foto'];	
		$precio = $doc['precio'];
	} else {
		echo "No se ha encontrado ese disco.";
	}
	
	
?>

<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $title ?></title>		
	</head>
	<body>
		<h1><?php echo "Bienvenido " . $name ?></h1>
		<img src="vista/images/caratulas/<?php echo $foto; ?>" width="300px" height="300px"></img>
		<h3><?php echo "Nombre del articulo: " . $nombre ?></h3>
		<h3><?php echo "Cantidad: " . $cantidad ?></h3>
		<h3><?php echo "Autor: " . $autor ?></h3>
		<h3><?php echo "Año del disco: " . $anno ?></h3>
		<h3><?php echo "Precio: " . $precio ?></h3>
	</body>
</html>

<!--
	http://localhost/tienda/mostrar.php?ident=""&name=""&title=""
	http://localhost/tienda/mostrar.php?ident="5379e9ad52cf7da40f00002a"&name="Enrique"&title="Lalala"
-->



