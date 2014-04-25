<?php
	session_start();

	$num = $_GET['num'];
	
	$_SESSION['precioDiscos'] = $_SESSION['precioDiscos']  - $_SESSION['discos'][$num][2];
	array_splice($_SESSION['discos'], $num, 1);
	
	if (count($_SESSION['discos']) == 0){
		unset($_SESSION['discos']);
	}
	
	header('Location: ../vista/vercesta.php');
	
?>
