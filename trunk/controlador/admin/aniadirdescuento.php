<?php
	require_once '../../controlador/opbasededatos.php';
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$BDD = new Mysql();
	
		$idDisco = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['idDisco']))));
		$descuento = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['descuento']))));
		
		$row = $BDD->aplicaDescuento($idDisco,$descuento);
	}	
	
	//puede fallar si el disco no existe o si da numeros negativos ¿?
	
	
	
	header('Location: ../../index.php');
	
?>