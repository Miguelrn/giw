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
	
?>