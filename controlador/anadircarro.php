<?php
	session_start();

	$idDisco = $_GET['id'];
	$nombreDisco = utf8_decode(urldecode($_GET['nombre']));
	$precioDisco = $_GET['precio'];	
	
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
	
	header('Location: ../vista/cesta.php');
	
?>