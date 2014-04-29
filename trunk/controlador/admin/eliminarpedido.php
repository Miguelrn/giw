<?php
	require_once '../../controlador/opbasededatos.php';
	$idPedido = $_POST['idPedido'];
	$BDD = new Mysql();
	$row = $BDD->eliminarPedido($idPedido);
	
	//comprobar que se elimino correctamente ¿?
	header('Location: ../../index.php');

?>