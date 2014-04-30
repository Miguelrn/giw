<?php
	//recibe la nota y la opinion
	require_once '../controlador/opbasededatos.php';
	
	$opinion = $_POST['opinion'];
	$nota = $_POST['Nota'];
	$correo = $_POST['correo'];
	$idArticulo = $_POST['idDisco'];
	echo $opinion;
	echo $nota;
	echo $correo;
	echo $idArticulo;
	
	$BDD = new Mysql();
	$row = $BDD->aniadeOpinionUser($correo, $opinion, $nota, $idArticulo);
	
	//se deberia comprobar si falla
	
	header('Location: ../index.php');
?>