<?php
    require_once '../controlador/opbasededatos.php';
	session_start();
    
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
	$edad = $_POST['edad'];
    $correo = $_POST['correo'];
	$domicilio = $_POST['domicilio'];
	$datosBancarios = $_POST['datosBancarios'];
	
	$BDD = new Mysql();	
	$row = $BDD->editarUsuarioModificarPerfil($correo, $nombre, $apellidos, $edad, $domicilio, $datosBancarios);	
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
	
	
	header('Location: ../index.php');
	
?>