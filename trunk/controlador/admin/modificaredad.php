<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		require_once '../../controlador/opbasededatos.php';
		$BDD = new Mysql();
		$correo = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['correo']))));
		$edad = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['edad']))));
	
		

		$row = $BDD->modificarEdad($correo, $edad);
		
		//edad negativa puede dar fallos...
	}
	header('Location: ../../index.php');
?>