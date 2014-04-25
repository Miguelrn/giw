<?php
	include '../../controlador/opbasededatos.php';

	$nombreDisco = $_POST['nombre'];
	$cantidad = $_POST['cantidad'];
	$descripcion = $_POST['descripcion'];
	$idCategoria = $_POST['idCat'];
	$annio = $_POST['anio'];
	$valoracion = $_POST['valoracion'];
	$ruta = $_POST['ruta'];
	$precio = $_POST['precio'];
	
	$BDD = new Mysql();
	$row = $BDD->insertarDisco($nombreDisco, $cantidad, $descripcion, $idCategoria, $annio, $valoracion, $ruta, $precio);

	//mostrar mensaje confirmacion¿?
	header('Location: ../../index.php');
?>

