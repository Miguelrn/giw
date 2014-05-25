<?php
	require_once '../controlador/opbasededatosMongoDB.php';
	
	if(session_id() == ""){
		session_start();
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$BDD = new MongoDBConector();
		$productos = $_SESSION['discos'];//consultar todos los items desde BD? o cookie? desde BD		
		$correo = $_SESSION['correo'];
		$precioDiscos = $_SESSION['precioDiscos'];
		
		$BDD->insertarPedido($correo, $precioDiscos, $productos);
		
		
		/*$id_pedido = $BDD->insertarPedido($correo);//inserta un nuevo pedido en blanco y devuelve un id
		for ($i=0, $len=count($productos); $i<$len; $i++) {
			$id_pedido = $BDD->insertarPedido($correo, $id_pedido, $precioDisco);
			$nombreDisco = $productos[$i][1];
			$resultado = $BDD->modificarProducto($nombreDisco);
		}*/	
		$_SESSION['error'] = "Compra realizada correctamente."; 
		unset($_SESSION['discos']);
		unset($_SESSION['precioDiscos']);
	}	
	header('Location: ../index.php');
	
?>