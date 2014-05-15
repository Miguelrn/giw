<?php
	require_once '../controlador/opbasededatosMongoDB.php';
	
	if(session_id() == ""){
		session_start();
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$BDD = new Mysql();
		$productos = $_SESSION['discos'];//consultar todos los items desde BD? o cookie? desde BD
		
		$correo = $_SESSION['correo'];
		$precioDiscos = $_SESSION['precioDiscos'];
		
		$id_pedido = $BDD->insertarPedido($correo, $precioDiscos);
		for ($i=0, $len=count($productos); $i<$len; $i++) {
			$idDisco = $productos[$i][0];	
			$resultado = $BDD->modificarProducto($idDisco);
			$resArtPedido = $BDD->insertarArticuloEnPedido($idDisco, $id_pedido);
		}	
		$_SESSION['error'] = "Compra realizada correctamente."; 
		unset($_SESSION['discos']);
		unset($_SESSION['precioDiscos']);
	}	
	header('Location: ../index.php');
	
?>