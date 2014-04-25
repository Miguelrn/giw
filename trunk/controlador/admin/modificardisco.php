<?php
	include '../../controlador/opbasededatos.php';

	ini_set("display_errores", "stdout");
	error_reporting(E_ALL | E_STRICT);

	$idDisco = $_POST['idDisco'];
	$nombreDisco = $_POST['nombre'];
	$cantidad = $_POST['cantidad'];
	$descripcion = $_POST['descripcion'];
	$idCategoria = $_POST['idCat'];
	$annio = $_POST['anio'];
	$valoracion = $_POST['valoracion'];
	$ruta = $_POST['ruta'];
	$precio = $_POST['precio'];
	
	$BDD = new Mysql();
	$row = $BDD->modificarDisco($idDisco, $nombreDisco, $cantidad, $descripcion, $idCategoria, $annio, $valoracion, $ruta, $precio);
	
	header('Location: ../../index.php');
?>