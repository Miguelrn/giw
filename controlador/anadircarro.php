<?php
	session_start();
	require_once '../controlador/opbasededatosMongoDB.php';
	require_once '../controlador/filtros.php';
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		
		$filtros = new Filtros();
		$BDD = new MongoDBConector();
		$idDisco = $filtros->filtraIdentificadorDisco($_GET['_id']); 
		$nombreDisco = utf8_decode(urldecode($_GET['nombre']));
		$precioDisco = $_GET['precio'];	
		
		//echo $idDisco;
		
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