<?php
	session_start();
	require_once '../controlador/opbasededatos.php';
    
    $correo = $_GET['correo'];        
    $pass = $_GET['pass'];
	
	$BDD = new Mysql();	
	$row = $BDD->conseguirDatosUsuario($correo, $pass);		
	if($row){//es un usuario valido normal
		$_SESSION['tipoUsuario'] = 0;
		if ((!isset($_SESSION['logueado']) || isset($_SESSION['logueado']) && $_SESSION['logueado'] == false) && $row){		
			$_SESSION['logueado'] = true;	
			$_SESSION['nombre'] = $row['nombre'];	
			$_SESSION['correo'] = $row['correo'];	
			$_SESSION['apellidos'] = $row['apellidos'];	
			$_SESSION['domicilio'] = $row['domicilio'];	
			$_SESSION['datosBancarios'] = $row['datosBancarios'];	
			
		} else {
			$_SESSION['logueado'] = false;		
			$_SESSION['error'] = "Usuario o contraseña incorrecto.";
		}
	}
	else{
		$row = $BDD->conseguirDatosAdmin($correo, $pass);
		if($row){//es un usuario admin
			$_SESSION['tipoUsuario'] = 1;	
			if ((!isset($_SESSION['logueado']) || isset($_SESSION['logueado']) && $_SESSION['logueado'] == false) && $row){		
				$_SESSION['logueado'] = true;	
				$_SESSION['correo'] = $row['email'];
				$_SESSION['nombre'] = "admin";
			}

		}
		else{
			$row = $BDD->conseguirDatosRepartidor($correo, $pass);
			if($row){//es un usuario repartidor
				$_SESSION['tipoUsuario'] = 2;
				if ((!isset($_SESSION['logueado']) || isset($_SESSION['logueado']) && $_SESSION['logueado'] == false) && $row){		
					$_SESSION['logueado'] = true;	
					$_SESSION['correo'] = $row['email'];
					$_SESSION['nombre'] = "repartidor";
			}	
			
			}
		}	
	}
	//echo $row['nombre'];
	header('Location: ../index.php');

?>