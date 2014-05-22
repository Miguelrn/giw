<?php
	require_once '../controlador/opbasededatosMongoDB.php';
	
	if(session_id() == ""){
		session_start();
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$BDD = new MongoDBConector();
		$productos = $_SESSION['discos'];//consultar todos los items desde BD? o cookie? desde BD
		
		$correo = $_SESSION['correo'];
		$correo = $_SESSION['correo'];
		$precioDiscos = $_SESSION['precioDiscos'];
		
		for ($i=0, $len=count($productos); $i<$len; $i++) {
			$id_pedido = $BDD->insertarPedido($correo, $precioDisco);
			$idDisco = $productos[$i][0];
			$resultado = $BDD->modificarProducto($idDisco);
		}	
		$_SESSION['error'] = "Compra realizada correctamente."; 
		unset($_SESSION['discos']);
		unset($_SESSION['precioDiscos']);
	}	
	header('Location: ../index.php');
	
?>