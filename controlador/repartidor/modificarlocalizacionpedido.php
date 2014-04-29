<?php 
	require_once '../opbasededatos.php';
	if (session_id() == "") {
		@session_start();
	}
	
	ini_set("display_errores", "stdout");
	error_reporting(E_ALL | E_STRICT);
	
	$localizacion = $_POST['localizacion'];
	$idPedido = $_SESSION['pedidoMod'];
	
	$BDD = new Mysql();
	$BDD->modificarLocalizacionPedido($idPedido, $localizacion);
	//Confirmacion?
	header('Location: ../../index.php');
?>