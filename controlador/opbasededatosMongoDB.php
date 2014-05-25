<?php

class MongoDBConector { 
  
    private $host="localhost";
    private $user="root";
    private $clave="";
    private $bd="GIW_grupo07";
    private $conexion;  
 
    public function conectar(){
    	// connect
        $this->conexion = new Mongo("mongodb://localhost");
		// select a database
		$db = $this->conexion->GIW_grupo07;
		
		return $db;
    }
	
	public function eliminarBDD(){
		$db = $this->conectar();
		$db->command(array("dropDatabase" => 1));
		$this->cerrar();
		
		unset($db);
	}
	
	public function conseguirArticulo($nombre){
		$datos = array( 'nombre' => $nombre );
		$db = $this->conectar();
        $collection = $db->articulo;
        $cursor = $collection->find($datos);
		$this->cerrar();
		
		unset($datos);
		unset($consulta);
		unset($db);
		
		return $cursor;		
	}
	
	public function consultaDisco($idDisco){
		$datos = array( '_id' => new MongoId($idDisco) );
		$db = $this->conectar();
        $collection = $db->articulo;
        $doc = $collection->findOne($datos);
		$this->cerrar();
		
		unset($datos);
		unset($consulta);
		unset($db);
		
		return $doc;		
	}
	
	public function consultaArticulosPorCategoria($categoria){
		$datos = array( 'categoria' => $categoria );
		$db = $this->conectar();
        $collection = $db->articulo;
        $cursor = $collection->find($datos);
		$this->cerrar();
		
		unset($datos);
		unset($db);
		unset($collection);
		
		return $cursor;	
	}
	
	public function conseguirPedidos($correo){
		$datos = array( '$correo' => $correo );
		$db = $this->conectar();
        $collection = $db->usuario;
        $cursor = $collection->find($datos);
		$this->cerrar();
		
		$pedidos = null;
		foreach ($cursor as $doc){
			$pedidos = $doc['pedidos'];
		}
		
		$this->cerrar();
		unset($datos);
		unset($db);
		unset($collection);
		
		return $pedidos;			
	}
	
	public function conseguirArticulosDePedido($ids_articulos){		
		$arrays = array();
		
		foreach ($ids_articulos as $id){
			array_push($arrays, array("_id" => new MongoId($id)));
		}	
		
		$datos = array('$or' => $arrays);		
		$db = $this->conectar();
        $collection = $db->articulo;
        $cursor = $collection->find($datos);
		$this->cerrar();
		
		unset($datos);
		unset($db);
		unset($collection);
		
		return $cursor;
	}
	
	public function conseguirNumeroPedidos($correo){
		$datos = array( '$correo' => $correo );
		$db = $this->conectar();
        $collection = $db->usuario;
        $doc = $collection->findOne($datos);
		$this->cerrar();
		
		$pedidos = $doc['pedidos'];
		$count = count($pedidos);
		
		$this->cerrar();
		unset($datos);
		unset($db);
		unset($collection);
		
		return $count;			
	}
	
	
	public function conseguirTopValorados(){
		
		$db = $this->conectar();
		$collection = $db->articulo;
		$cursor = $collection->find();
		$cursor->sort(array('descuento' => -1));
		$cursor->limit(3);
		$this->cerrar();
		unset($db);
		unset($collection);
		
		return $cursor;
	}
	
	
	public function conseguirTopRebajas() {
		$db = $this->conectar();
		$collection = $db->articulo;
		$cursor = $collection->find();
		$cursor->sort(array('descuento' => -1));
		$cursor->limit(3);
		$this->cerrar();
		unset($db);
		unset($collection);
		
		return $cursor;
	}
	
	/*public function consultaAzarDiscosInicio(){
		$db = $this->conectar();
		$collection = $db->articulo;
		$cursor = $collection->find();
		$cursor->sort(array('descuento' => -1));
		$cursor->limit(5);
		
		unset($db);
		unset($collection);
		
		return $cursor;
	}*/
	
	private function updateRandom(){
		return array('$set' => array ("random" => mt_rand(0, 10000000)));
	}
	
	public function consultaAzarDiscosInicio(){
		$db = $this->conectar();
		$collection = $db->articulo;
		//$random = array("random" => mt_rand(0, 10000000));
		//$update = array('$set' => array ("random" => mt_rand(0, 10000000)));
		$cursor = $collection->find();
		//$db->articulo->update(array("nombre", $row["nombre"]), $this->updateRandom() );
		/*foreach ($cursor as $row) {
			$db->articulo->update(array(), $this->updateRandom() );
		}*/
		$db->articulo->update(array(), $this->updateRandom() , array('multiple' => true));
		
		 
		//$cursor = $collection->update(array(), array("random" => mt_rand(0, 10000000), array('multiple' => true)));
		unset($cursor);
		$cursor = $collection->find();
		$cursor->sort(array('random' => -1));
		$cursor->limit(5);
		$this->cerrar();
		
		unset($db);
		unset($collection);
		
		return $cursor;
	}
	
	/*public function consultaAzarDiscosInicio(){
		$db = $this->conectar();
		$collection = $db->articulo;
		//$cursor = $collection->find()->limit(5)->skip(RAND());
		$cursor = $collection->find();
		$cursor->sort(array('descuento' => -1) * rand(0, 59));
		$cursor->limit(5);
		
		//var c = db.someCollection;
		//c.find().limit( -1 ).skip( _rand() * c.count() )
		
		unset($db);
		unset($collection);
		
		return $cursor;
	}*/
	
	public function __call($method_name, $arguments){
		//la lista de metodos sobrecargados
		$accepted_methods = array("insertarArticulo");
    	if(!in_array($method_name, $accepted_methods)) {
      		trigger_error("Metodo <strong>$method_name</strong> no existe", E_USER_ERROR);
    	}
 
    	//metodo sin argumentos
	    if(count($arguments) == 0) {
	      $this->$method_name();
 
	      
	    }elseif(count($arguments) == 9) {
	      $this->{$method_name.'9'}($arguments[0], $arguments[1], $arguments[2], $arguments[3], $arguments[4], $arguments[5],
		  $arguments[6], $arguments[7], $arguments[8]);
 
	      //metodo con 10 argumentos
	    } elseif(count($arguments) == 10) {
	      $this->{$method_name.'10'}($arguments[0], $arguments[1], $arguments[2], $arguments[3], $arguments[4], $arguments[5],
		  $arguments[6], $arguments[7], $arguments[8], $arguments[9]);
 
	    } else {
	      return false;
		}
	}
	
	public function insertarArticulo9($nombre, $cantidad, $descripcion, $categoria, $autor, $anno, $foto, $precio, $descuento){
		$datos = array ( 'nombre' => $nombre,
						 'cantidad' => $cantidad,
						 'descripcion' => $descripcion,
						 'categoria' => $categoria,
						 'autor' => $autor,
						 'anno' => $anno,
						 'foto' => $foto,
						 'precio' => $precio,
						 'descuento' => $descuento,
						 'random' => NULL);
						 
		$db = $this->conectar();
		$collection = $db->articulo;
		$cursor = $collection->insert($datos);
		$this->cerrar();
		
		unset($datos);
		unset($db);
		unset($collection);
		unset($cursor);
	}
									 
	public function insertarArticulo10($nombre, $cantidad, $descripcion, $categoria, $autor, $anno, $foto, $precio, $descuento,
									 $valoraciones){
									 	
		$datos = array ('nombre' => $nombre,
						 'cantidad' => $cantidad,
						 'descripcion' => $descripcion,
						 'categoria' => $categoria,
						 'autor' => $autor,
						 'anno' => $anno,
						 'foto' => $foto,
						 'precio' => $precio,
						 'descuento' => $descuento,
						 'valoraciones' => $valoraciones,
						 'random' => NULL);
						 
		$db = $this->conectar();
		$collection = $db->articulo;
		$cursor = $collection->insert($datos);
		$this->cerrar();
		
		unset($datos);
		unset($db);
		unset($collection);
		unset($cursor);
	}
	
	public function existeUsuario($correo){
		$datos = array( 'correo' => $correo );
		$db = $this->conectar();
        $collection = $db->usuario;
        $cursor = $collection->findOne($datos);
		$this->cerrar();
		
		unset($datos);
		unset($consulta);
		unset($db);
		if ($cursor == null){ return false; }
		else { return true; }		
	}	
	
	public function conseguirUsuario($correo, $password){
		$datos = array( 'correo' => $correo);
		$db = $this->conectar();
        $collection = $db->usuario;
        $doc = $collection->findOne($datos);
		
		$salt = $doc['salt'];
		$pass = hash('sha512', $password.$salt); //Hash de la contraseña con salt única.
		unset($datos);
		unset($doc);
		$datos = array( 'correo' => $correo, 'contrasena' => $pass );
		$doc = $collection->findOne($datos);
		
		$this->cerrar();
		unset($datos);
		unset($collection);
		unset($db);
		
		/*if($doc['pass'] == $pass){
			return $doc;
		}else {
			return NULL;
		}*/
		return $doc;
			
	}
	
	public function insertarUsuario($correo, $contrasena, $nombre,  $apellidos, $edad, $domicilio){
												
		$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
		$password = hash('sha512', $contrasena.$random_salt);
																	
		$datos = array( 'correo' => $correo,
						'contrasena' => $password, 
						'nombre' => $nombre,
						'apellidos' => $apellidos, 
						'edad' => $edad, 
						'domicilio' => $domicilio, 
						'pedidos' => array(), 
						'datosBancarios' => "", 
						'salt' => $random_salt );					
		$db = $this->conectar();
        $collection = $db->usuario;
        $cursor = $collection->insert($datos);
		$this->cerrar();
		
		unset($datos);
		unset($db);
		unset($collection);
		unset($cursor);	
		
	}
	
	public function modificarUsuario($correo, $contrasena, $nombre, 
									 $datosBancarios, $apellidos, $edad, $domicilio){
												
		$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
		$password = hash('sha512', $contrasena.$random_salt);
					
		$usuarioQueSeModificara = array ( 'correo' => $correo );																			
		$datos = array( 'contrasena' => $password, 
						'nombre' => $nombre,
						'apellidos' => $apellidos, 
						'edad' => $edad, 
						'domicilio' => $domicilio, 
						'datosBancarios' => $datosBancarios, 
						'salt' => $random_salt );					
		$db = $this->conectar();
        $collection = $db->usuario;
        $cursor = $collection->update($usuarioQueSeModificara, $datos);
		$this->cerrar();
		
		unset($datos);
		unset($consulta);
		unset($db);	
	}
	
	public function eliminarUsuario($correo){
		$datos = array( 'correo' => $correo );
		$db = $this->conectar();
        $collection = $db->usuario;
        $cursor = $collection->remove($datos);
		$this->cerrar();
		
		unset($datos);
		unset($consulta);
		unset($db);			
	}
	
    public function cerrar () {
      	/*$conexiones = $this->conexion->getConnections();	
		foreach ( $conexiones as $con ){
		    // Iterar sobre todas las conexiones, y cuando el tipo es "SECONDARY" cerramos la conexión
		    if ( $con['connection']['connection_type_desc'] == "SECONDARY" ){
		        $cerrada = $a->close( $con['hash'] );
		    }
		}*/
    }
	
	public function limpia_sql($texto){
		$textoAux = "";
		//echo $texto."0";
		if (get_magic_quotes_gpc()){
			$texto = stripslashes($texto);//quita /
		}	
		if (!is_numeric($texto)){
			return mysqli_real_escape_string($texto);
		}
		else	
			return $texto;
	}
	
	public function consultaAzarDiscoCategoria($idCategoria){
		$db = $this->conectar();
		$collection = $db->articulo;
		$cursor = $collection->find();
		$db->articulo->update(array(), $this->updateRandom() , array('multiple' => true));
		unset($cursor);
		$busqueda = array('categoria' => $idCategoria);
		$cursor = $collection->find($busqueda);
		$cursor->sort(array('random' => -1));
		$cursor->limit(5);
		$this->cerrar();
		
		unset($db);
		unset($collection);
		
		return $cursor;
	}
	
	
	public function buscaOpiniones($idDisco){
		$db = $this->conectar();
		$collection = $db->opiniones;//no existe, es de la practica 2 (aqui no se va implementar)
		$cursor = $collection->find();
		$db->articulo->update(array(), $this->updateRandom() , array('multiple' => true));
		unset($cursor);
		$busqueda = array('_id' => $idDisco);
		$cursor = $collection->find($busqueda);
		$this->cerrar();
		
		unset($db);
		unset($collection);
		
		return $cursor;
	}
	
	public function insertarPedido($correo, $precio, $idsArticulos){//busca el usuario y updatea sus pedidos
	
		$date = date("Y-m-d");																	
		$datos = array( 'precio' => $precio,
						'localizacion'=> 'Almacenes Centrales', 
						'estado' => 'pendiente',
						'fecha' => $date);//array con la nueva compra
		$usuario = array('correo' => $correo);			
		$db = $this->conectar();
		$collection = $db->usuario;
		$consultaUsuario = array ('correo' => $correo);//query
        $cursor = $collection->find($consultaUsuario);
		$pedidos = $cursor['pedidos'];
		$cursor = $pedidos->insert($datos);

		$this->cerrar();
		

	}


	public function modificarProducto($nombreDisco){
		$db = $this->conectar();
        $collection = $db->usuario;
		$consultaDisco = array ('nombre' => $nombreDisco);//query
		$update = array('$inc' => array( 'cantidad' => -1 ));//update
        $cursor = $collection->findAndModify($consultaDisco,$update);//busca el disco por el nobre y lo decrementa en uno
		$this->cerrar();
		
		unset($datos);
		unset($consulta);
		unset($db);
		
		return $cursor;
	}
	
	
	
			
	/*public function conseguirCategoria($idc){
		
	}
	
	public function consultaDisco($idDisco){
		
	}
	
	public function consultaDiscoyOpiniones($idDisco){
		
	}

	public function consultaArticulosCategoria($id_categoria){
		
	}
	
	public function insertarPedido($correo, $precio){
		
	}
		
	public function insertarArticuloEnPedido($id_articulo, $id_pedido){
		
	}
	
	public function conseguirArticulosDePedido($id_pedido){
		
	}
	
	public function conseguirPedidos($correo){
		
	}
	
	public function conseguirNumeroPedidos($correo){
		
	}
	
	public function consultaAzarDiscoCategoria($idCategoria){
		
	}

	public function modificarProducto($idDisco){
	 	
	}
	
	public function insertarUsuario($correo, $contrasena, $nombre, $apellidos, $domicilio, $datosBancarios){
		
	}
	
	public function insertarUsuarioRegistro($correo, $contrasena, $nombre, $apellidos, $edad, $domicilio, $datosBancarios, $salt){
		
	}
	
	public function editarUsuario($correo, $nombre, $apellidos, $domicilio, $datosBancarios){
		
	}
	
	public function cambiarPasswordUsuario($correo, $antiguopass, $nuevopass){
		
	}
	
	
	//// ADMIN y REPARTIDOR
	
	public function conseguirDatosAdmin($correo, $pass){
		
	}
	
	public function conseguirDatosRepartidor($correo, $pass){
		
	}
	
	public function modificarDisco($idDisco, $nombreDisco, $cantidad, $descripcion, $idCategoria, $annio, $ruta, $precio){
		
	}
	
	public function insertarDisco($nombreDisco, $cantidad, $descripcion, $idCategoria, $annio, $ruta, $precio){
		
	}
	
	public function eliminarDisco($idDisco){
		
	}
	
	public function eliminarUsuario($correo){
		
	}
	
	public function eliminarPedido($idPedido){
		
	}
	
	public function consultarDiscos(){
		
	}
	
	public function consultarUsuarios(){
		
	}
	
	public function consultarPedidos(){
		
	}
	
	////////// ESTADISTICAS
	
	public function filtrarPedidosPorFecha($inicio, $fin){
		
	}
	
	////////// REPARTIDOR
	
	public function conseguirIdRepartidor($correo){
		
	}
	
	public function conseguirPedidoAsociadoArepartidor($idRep, $idPedido){
		
	}
	
	public function modificarEstadoPedido($idPedido, $estado){
		
	}
	
	public function modificarLocalizacionPedido($idPedido, $localizcion){
		
	}
	
	public function busquedaNormal($keywords){
		
	}
	
	public function busquedaPorValoracion($keywords){
		
	}
	
	public function busquedaPorPrecioMinimo($keywords){
		
	}
	
	public function busquedaPorPrecioMaximo($keywords){
				
	}
	
	public function busquedaPorTipoDeMusica($keywords){
		
	}
	
	public function busquedaAvanzada($categoria, $disco, $artista, $valPrecio, $valNota){
		
	}
	
	
	public function conseguirDiscoPorFechas($ini, $fin){
		
	}	

   	public function opinionSobreDisco($correoUser, $idDisco){
   		
   	}
	
	public function aniadeOpinionUser($correo, $opinion, $nota, $idArticulo){
		
	}
	
	public function buscaOpiniones($idDisco){
		
	}
	
	public function discoconopiniones($idDisco){//si el disco tiene opiniones sobre el
		
	}
	
	public function aplicaDescuento($idDisco, $descuento){
		
	}
	
	public function modificarEdad($correo, $edad){
		
	}
	
	public function consultaDiscosPorEdad($edad){
		
	}*/
	
	
}
?>