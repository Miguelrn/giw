<?php
	require_once '../../controlador/opbasededatos.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		$BDD = new Mysql();
		$idPedido = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['idPedido']))));
	
		$row = $BDD->eliminarPedido($idPedido);
		
		//comprobar que se elimino correctamente ¿?
	}
	header('Location: ../../index.php');

?>