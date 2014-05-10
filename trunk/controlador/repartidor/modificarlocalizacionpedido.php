<?php 
	require_once '../opbasededatos.php';
	if (session_id() == "") {
		@session_start();
	}
	
	ini_set("display_errores", "stdout");
	error_reporting(E_ALL | E_STRICT);
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$BDD = new Mysql();
		$localizacion = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['localizacion']))));
		$idPedido = $_SESSION['pedidoMod'];
		
		$BDD->modificarLocalizacionPedido($idPedido, $localizacion);
		//Confirmacion?
	}	
	header('Location: ../../index.php');
?>