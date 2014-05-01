<?php
	require_once '../../controlador/opbasededatos.php';
	
	$BDD = new Mysql();
	
	$idDisco = $_POST['idDisco'];
	$descuento = $_POST['descuento'];
	
	$row = $BDD->aplicaDescuento($idDisco,$descuento);
	
	//puede fallar si el disco no existe o si da numeros negativos ¿?
	
	
	
	header('Location: ../../index.php');
	
?>