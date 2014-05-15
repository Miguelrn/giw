<?php
	require_once '../controlador/opbasededatosMongoDB.php';

	/**
	 * Aqui pondría las consultas para insertar los datos en mongo DB, por si no funcionase
	 * el tema del import y el export.
	 */
	$mongo = new MongoDBConector();
    $cursor = $mongo->conseguirArticulo("ABBA");	
	foreach ($cursor as $doc) {
	    //var_dump($doc);
	    echo $doc['categoria'];
	}
	
	
	$mongo->insertarUsuario("test@test.com", "test", "nombreTest",  "apellidoTest", "10", "domicilioTest");
	// echo "</br>Existe usuario:" . ($mongo->existeUsuario("test@test.com") ? "Si" : "No");
	// $mongo->eliminarUsuario("test@test.com");
	$mongo->modificarUsuario("test@test.com", "testModificado", "nombreTest", "datosBancariosTest", "apellidoTest", "10", "domicilioTest");
	
?>