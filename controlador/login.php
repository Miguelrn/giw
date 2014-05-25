<?php
	session_start();
	require_once '../controlador/opbasededatosMongoDB.php';
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
    	$mongo = new MongoDBConector();	
	    //$correo = $mongo->limpia_sql(htmlspecialchars(trim(strip_tags($_GET['correo']))));        
	    //$pass = $mongo->limpia_sql(htmlspecialchars(trim(strip_tags($_GET['pass']))));
		
		$correo = $_GET['correo'];
		$pass = $_GET['pass'];
		$row = $mongo->conseguirUsuario($correo, $pass);
		if(isset($row)){//es un usuario valido normal
			$_SESSION['tipoUsuario'] = 0;
			if ((!isset($_SESSION['logueado']) || isset($_SESSION['logueado']) && $_SESSION['logueado'] == false) && $row){		
				$_SESSION['logueado'] = true;	
				$_SESSION['nombre'] = $row['nombre'];	
				$_SESSION['correo'] = $row['correo'];
				$_SESSION['edad'] = $row['edad'];		
				$_SESSION['apellidos'] = $row['apellidos'];	
				$_SESSION['domicilio'] = $row['domicilio'];	
				$_SESSION['datosBancarios'] = $row['datosBancarios'];	
				
			} else {
				$_SESSION['logueado'] = false;		
				$_SESSION['error'] = "Usuario o contraseña incorrecto.";
			}
		} else {
			$_SESSION['logueado'] = false;		
			$_SESSION['error'] = "Usuario o contraseña incorrecto.";
		}
	}	
	header('Location: ../index.php');

?>