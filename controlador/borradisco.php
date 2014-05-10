<?php
	session_start();
	require_once '../controlador/opbasededatos.php';
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		$BDD = new Mysql();
		$num = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_GET['num']))));
		
		$_SESSION['precioDiscos'] = $_SESSION['precioDiscos']  - $_SESSION['discos'][$num][2];
		array_splice($_SESSION['discos'], $num, 1);
		
		if (count($_SESSION['discos']) == 0){
			unset($_SESSION['discos']);
		}
	}
	header('Location: ../vista/vercesta.php');
	
?>
