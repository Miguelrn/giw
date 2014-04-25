<?php
	session_start();
    include_once '../controlador/opbasededatos.php';
    
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];        
    $pass = $_POST['pass'];
    $reppass = $_POST['reppass'];
	$domicilio = $_POST['domicilio'];
	$datosBancarios = $_POST['datosBancarios'];
	
	if (strcmp($pass, $reppass) == 0){
		$BDD = new Mysql();	
		$row = $BDD->insertarUsuario($correo, $pass, $nombre, $apellidos, $domicilio, $datosBancarios);		
		if ($row){					
			$_SESSION['nombre'] = $nombre;	
			$_SESSION['correo'] = $correo;	
			$_SESSION['apellidos'] = $apellidos;	
			$_SESSION['domicilio'] = $domicilio;	
			$_SESSION['datosBancarios'] = $datosBancarios;	
			$_SESSION['logueado'] = true;	
		
			if (isset($_SESSION['error'])){
				unset($_SESSION['error']);
			}
			header('Location: ../index.php');
			
		} else {			
			$_SESSION['error'] = "Hubo un problema al registrar. Intente nuevamente más tarde.";
			$_SESSION['logueado'] = false;	
			header('Location: ../index.php');
			
		}
	} else {		
		$_SESSION['error'] = "No fue posible realizar el registro. Las contraseñas no coinciden.";
		$_SESSION['logueado'] = false;			
		header('Location: ../index.php');
		
	}
    
?>

