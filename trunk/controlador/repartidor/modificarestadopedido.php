<?php 
	require_once '../opbasededatos.php';
	if (session_id() == "") {
		@session_start();
	}
	
	ini_set("display_errores", "stdout");
	error_reporting(E_ALL | E_STRICT);
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$BDD = new Mysql();
		$estado = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['estado']))));
		$idPedido = $_SESSION['pedidoMod'];
		
		$BDD->modificarEstadoPedido($idPedido, $estado);
	}	
	//Confirmacion?
	header('Location: ../../index.php');
?>