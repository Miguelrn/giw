<?php
    require_once '../controlador/opbasededatos.php';
	session_start();
    
    $correo = $_SESSION['correo'];
    $antiguopass = $_POST['antiguopass'];
    $nuevopass = $_POST['nuevopass'];
	$repitenuevopass = $_POST['repitenuevopass'];
	
	if (strcmp($nuevopass, $repitenuevopass) == 0){		
		$BDD = new Mysql();	
		$row = $BDD->cambiarPasswordUsuario($correo, $antiguopass, $nuevopass);			
		if ($row){
			$_SESSION['error'] = "Contraseña modificada con éxito.";			
		} else {
			$_SESSION['error'] = "Tu antigua contraseña no coincide. No se han realizado cambios.";			
		}
		
	} else {
		$_SESSION['error'] = "Las contraseñas no coinciden. No se han realizado cambios.";
	}
	 
	header('Location: ../index.php');
	
?>