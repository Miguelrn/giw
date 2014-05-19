<?php
	session_start();
    require_once '../controlador/opbasededatosMongoDB.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    	$BDD = new Mysql();
	    /*$nombre = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['nombre']))));
	    $apellidos = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['apellidos']))));
		$edad = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['edad']))));
	    $correo = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['correo']))));        
	    $pass = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['pass']))));
	    $reppass = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['reppass']))));
		$domicilio = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['domicilio']))));
		$datosBancarios = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['datosBancarios']))));*/
		
		if (strcmp($pass, $reppass) == 0){
			//Crea una salt al azar
			$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
			//Crea una contraseña en salt
			$password = hash('sha512', $pass.$random_salt);
			$mongo = new MongoDBConector();		
			$row = $mongo::insertarUsuario($correo, $password, $nombre,  $apellidos, $edad, $domicilio);
				
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
	}
?>

