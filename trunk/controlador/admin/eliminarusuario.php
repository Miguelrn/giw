<?php
	include '../../controlador/opbasededatos.php';
	
	$email = $_POST['email'];
	$BDD = new Mysql();
	$row = $BDD->eliminarUsuario($email);
	
	//comprobar que se elimino correctamente ¿?
	header('Location: ../../index.php');

?>