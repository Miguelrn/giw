<?php
	require_once '../../controlador/opbasededatos.php';

	ini_set("display_errores", "stdout");
	error_reporting(E_ALL | E_STRICT);
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    	$BDD = new Mysql();
		$idDisco = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['idDisco']))));
		$nombreDisco = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['nombre']))));
		$cantidad = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['cantidad']))));
		$descripcion = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['descripcion']))));
		$idCategoria = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['idCat']))));
		$annio = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['anio']))));
		$ruta = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['ruta']))));
		$precio = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['precio']))));
		
		$row = $BDD->modificarDisco($idDisco, $nombreDisco, $cantidad, $descripcion, $idCategoria, $annio, $valoracion, $ruta, $precio);
	}	
	header('Location: ../../index.php');
?>