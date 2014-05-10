<?php
	require_once '../../controlador/opbasededatos.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$BDD = new Mysql();
		$idDisco = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['idDisco']))));
		$row = $BDD->eliminarDisco($idDisco);
	}	
		
	//comprobar que se elimino correctamente ¿?
	header('Location: ../../index.php');

?>