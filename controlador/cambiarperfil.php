<?php
    require_once '../controlador/opbasededatosMongoDB.php';
	session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    	/*$BDD = new Mysql();
	    $nombre = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['nombre']))));
	    $apellidos = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['apellidos']))));
		$edad = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['edad']))));
	    $correo = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['correo']))));
		$domicilio = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['domicilio']))));
		$datosBancarios = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['datosBancarios']))));
		*/
		
		$nombre = $_POST['nombre'];
	    $apellidos = $_POST['apellidos'];
		$edad = $_POST['edad'];
	    $correo = $_POST['correo'];
		$domicilio = $_POST['domicilio'];
		$datosBancarios = $_POST['datosBancarios'];
		
		$mongo = new MongoDBConector();
		$row = $mongo->modificarUsuario($correo, $nombre, $datosBancarios, $apellidos, $edad, $domicilio);
		
		//$row = $BDD->editarUsuarioModificarPerfil($correo, $nombre, $apellidos, $edad, $domicilio, $datosBancarios);	
		if ($row){
			$_SESSION['error'] = "Perfil modificado con éxito.";	
			$_SESSION['nombre'] = $nombre;	
			$_SESSION['edad'] = $edad;	
			$_SESSION['correo'] = $correo;	
			$_SESSION['apellidos'] = $apellidos;	
			$_SESSION['domicilio'] = $domicilio;	
			$_SESSION['datosBancarios'] = $datosBancarios;				
		} else {
			$_SESSION['error'] = "El perfil no se ha modificado.";				
		}
	}
	
	header('Location: ../index.php');
	
?>