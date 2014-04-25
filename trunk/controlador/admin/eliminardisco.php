<?php
	include '../../controlador/opbasededatos.php';
	$idDisco = $_POST['idDisco'];
	$BDD = new Mysql();
	$row = $BDD->eliminarDisco($idDisco);
	
	//comprobar que se elimino correctamente ¿?
	header('Location: ../../index.php');

?>