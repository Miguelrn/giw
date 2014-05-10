<?php
	//recibe la nota y la opinion
	require_once '../controlador/opbasededatos.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$BDD = new Mysql();
		$opinion = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['opinion']))));
		$nota = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['Nota']))));
		$correo = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['correo']))));
		$idArticulo = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['idDisco']))));
	
		$row = $BDD->aniadeOpinionUser($correo, $opinion, $nota, $idArticulo);
	}	
	//se deberia comprobar si falla
	
	header('Location: ../index.php');
?>