<?php
	session_start();
	require_once '../controlador/opbasededatosMongoDB.php';
	require_once '../controlador/filtros.php';
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
    	$mongo = new MongoDBConector();
		$filtros = new Filtros();
		
	    //$correo = $mongo->limpia_sql(htmlspecialchars(trim(strip_tags($_GET['correo']))));        
	    //$pass = $mongo->limpia_sql(htmlspecialchars(trim(strip_tags($_GET['pass']))));
	    //echo "correo sin filtros: ".$_GET['correo']." | ";
		//echo "pass sin filtros: ".$_GET['pass']." | ";
		$correo = $filtros->filtraCorreo($_GET['correo']);
		$pass = $filtros->filtraPassword($_GET['pass']);
			
		$row = $mongo->conseguirUsuario($correo, $pass);
		//echo "correo con filtros: ".$correo." | ";
		//echo "pass con filtros: ".$pass." | ";
		if(isset($row)){//es un usuario valido normal
			if ((!isset($_SESSION['logueado']) || isset($_SESSION['logueado']) && 
				$_SESSION['logueado'] == false) && $row){
							
				$_SESSION['logueado'] = true;	
				$_SESSION['nombre'] = $row['nombre'];	
				$_SESSION['apellidos'] = $row['apellidos'];	
				$_SESSION['edad'] = $row['edad'];		
				$_SESSION['correo'] = $row['correo'];
				$_SESSION['domicilio'] = $row['domicilio'];	
				$_SESSION['datosBancarios'] = $row['datosBancarios'];	
				$_SESSION['tipoUsuario'] = 0;
				
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