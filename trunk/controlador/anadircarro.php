<?php
	session_start();
	require_once '../controlador/opbasededatos.php';
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		$BDD = new Mysql();
		$idDisco = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_GET['id']))));
		$nombreDisco = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags(utf8_decode(urldecode($_GET['nombre']))))));
		$precioDisco = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_GET['precio']))));	
		
		if (!isset($_SESSION['discos'])){
			$_SESSION['discos'] = array();
		}
		
		if (!isset($_SESSION['precioDiscos'])){
			$_SESSION['precioDiscos'] = 0;
		}
		$_SESSION['precioDiscos'] = $_SESSION['precioDiscos']  + $precioDisco;
		
		$lista = $_SESSION['discos']; 	
		$size = count($lista);
		$lista[$size] = array($idDisco, $nombreDisco, $precioDisco);
		$_SESSION['discos'] = $lista;
	}	
	header('Location: ../vista/cesta.php');
	
?>