<?php
    include_once '../controlador/opbasededatos.php';
	session_start();
    
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
	$domicilio = $_POST['domicilio'];
	$datosBancarios = $_POST['datosBancarios'];
	
	$BDD = new Mysql();	
	$row = $BDD->editarUsuario($correo, $nombre, $apellidos, $domicilio, $datosBancarios);	
	if ($row){
		$_SESSION['error'] = "Perfil modificado con éxito.";	
		$_SESSION['nombre'] = $nombre;	
		$_SESSION['correo'] = $correo;	
		$_SESSION['apellidos'] = $apellidos;	
		$_SESSION['domicilio'] = $domicilio;	
		$_SESSION['datosBancarios'] = $datosBancarios;				
	} else {
		$_SESSION['error'] = "El perfil no se ha modificado.";				
	}
	
	
	header('Location: ../index.php');
	
?>