<?php
	require_once '../../controlador/opbasededatos.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$BDD = new Mysql();
		$nombreDisco = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['nombre']))));
		$cantidad = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['cantidad']))));
		$descripcion = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['descripcion']))));
		$idCategoria = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['idCat']))));
		$annio = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['anio']))));
		$ruta = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['ruta']))));
		$precio = $_POST['precio'];
		
		$row = $BDD->insertarDisco($nombreDisco, $cantidad, $descripcion, $idCategoria, $annio, $valoracion, $ruta, $precio);
	}

	//mostrar mensaje confirmacion¿?
	header('Location: ../../index.php');
?>

