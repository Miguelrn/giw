<?php
	$correo = $_POST['correo'];
	$edad = $_POST['edad'];

	require_once '../../controlador/opbasededatos.php';
	
	$BDD = new Mysql();
	
	$row = $BDD->modificarEdad($correo, $edad);
	
	//edad negativa puede dar fallos...
	
	header('Location: ../../index.php');
?>