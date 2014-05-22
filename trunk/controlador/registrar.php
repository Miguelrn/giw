<?php
	@session_start();
    require_once '../controlador/opbasededatosMongoDB.php';
    require_once '../controlador/filtros.php';
	
	
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
	    /*$nombre = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['nombre']))));
	    $apellidos = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['apellidos']))));
		$edad = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['edad']))));
	    $correo = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['correo']))));        
	    $pass = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['pass']))));
	    $reppass = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['reppass']))));
		$domicilio = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['domicilio']))));
		$datosBancarios = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['datosBancarios']))));*/
		$filtros = new Filtros();
				
		$nombre = $filtros->filtraNombrePersona($_POST['nombre']);
	    $apellidos = $filtros->filtraApellidosPersona($_POST['apellidos']);
		$edad = $filtros->filtraEdad($_POST['edad']);
	    $correo = $filtros->filtraCorreo($_POST['correo']);        
	    $pass = $filtros->filtraPassword($_POST['pass']);
	    $reppass = $filtros->filtraPassword($_POST['reppass']);
		$domicilio = $filtros->filtraDomicilio($_POST['domicilio']);
		
		if ($nombre == false || $apellidos == false || $edad == false || $correo == false ||
			$pass == false || $reppass == false || $domicilio == false){
			
			$_SESSION['error'] = "No fue posible realizar el registro.";
			$_SESSION['logueado'] = false;			
			header('Location: ../index.php');
			return;
			
		}
		
		if (strcmp($pass, $reppass) == 0){
			//Crea una salt al azar
			//Crea una contraseña en salt
			$mongo = new MongoDBConector();		
			$mongo->insertarUsuario($correo, $password, $nombre,  $apellidos, $edad, $domicilio);
				
			/*if ($row){	*/				
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
				
			/*} else {			
				$_SESSION['error'] = "Hubo un problema al registrar. Intente nuevamente más tarde.";
				$_SESSION['logueado'] = false;	
				header('Location: ../index.php');
				
			}*/
		} else {		
			$_SESSION['error'] = "No fue posible realizar el registro. Las contraseñas no coinciden.";
			$_SESSION['logueado'] = false;			
			header('Location: ../index.php');
			
		}
	}
?>

