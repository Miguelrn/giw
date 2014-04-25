<?php 
	include '../opbasededatos.php';
	if (session_id() == "") {
		@session_start();
	}
	
	ini_set("display_errores", "stdout");
	error_reporting(E_ALL | E_STRICT);
	
	$estado = $_POST['estado'];
	$idPedido = $_SESSION['pedidoMod'];
	
	$BDD = new Mysql();
	$BDD->modificarEstadoPedido($idPedido, $estado);
	//Confirmacion?
	header('Location: ../../index.php');
?>