<?php
    require_once '../controlador/opbasededatosMongoDB.php';
	session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
	    $correo = $_SESSION['correo'];
		/*$BDD = new Mysql();
	    $antiguopass = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['antiguopass']))));
	    $nuevopass = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['nuevopass']))));
		$repitenuevopass = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['repitenuevopass']))));*/
		
		$antiguopass = $_POST['antiguopass'];
	    $nuevopass = $_POST['nuevopass'];
		$repitenuevopass = $_POST['repitenuevopass'];		
		
		if (strcmp($nuevopass, $repitenuevopass) == 0){		
			$mongo = new MongoDBConector();
			$row = $mongo->modificarContrasenaUsuario($correo, $antiguopass, $nuevopass);
			if ($row){
				$_SESSION['error'] = "Contraseña modificada con éxito.";			
			} else {
				$_SESSION['error'] = "Tu antigua contraseña no coincide. No se han realizado cambios.";			
			}
			
		} else {
			$_SESSION['error'] = "Las contraseñas no coinciden. No se han realizado cambios.";
		}
	} 
	header('Location: ../index.php');
	
?>