<?php
	require_once '../../controlador/opbasededatos.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		$BDD = new Mysql();
		$email = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['email']))));
		$row = $BDD->eliminarUsuario($email);
	}
	//comprobar que se elimino correctamente ¿?
	header('Location: ../../index.php');

?>