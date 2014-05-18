<?php

class MongoDBConector { 
  
    private $host="localhost";
    private $user="root";
    private $clave="";
    private $bd="GIW_grupo07";
    private $conexion;  
 
    public function conectar(){
    	// connect
        $this->conexion = new MongoClient("mongodb://localhost");
		// select a database
		$db = $this->conexion->GIW_grupo07;
		
		return $db;
    }
	
	public function eliminarBDD(){
		$db = $this->conectar();
		$db->command(array("dropDatabase" => 1));
		//$db->dropDatabase();
		
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
		$datos = array( '_id' => $idDisco );
		$db = $this->conectar();
        $collection = $db->articulo;
        $cursor = $collection->find($datos);
		$this->cerrar();
		
		unset($datos);
		unset($consulta);
		unset($db);
		
		return $cursor;		
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
	
	public function conseguirTopValorados(){
		$consulta = "select articulo.nombre, articulo.id_articulo, articulo.id_categoria
					from articulo, valoracion_articulo
					where articulo.id_articulo = valoracion_articulo.id_articulo
					order by valoracion_articulo.nota desc
					limit 0, 3";
					
		$db = $this->conectar();
		$collection = $db->articulo;
		$cursor = $collection->find();
		$cursor->sort(array('descuento' => -1));
		$cursor->limit(3);
		
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
		
		unset($db);
		unset($collection);
		
		return $cursor;
	}
	
	public function __call($method_name, $arguments){
		//la lista de metodos sobrecargados
		$accepted_methods = array("insertarArticulo");
    	if(!in_array($method_name, $accepted_methods)) {
      		trigger_error("Metodo <strong>$method_name</strong> no existe", E_USER_ERROR);
    	}
 
    	//metodo sin argumentos
	    if(count($arguments) == 0) {
	      $this->$method_name();
 
	      //metodo con 9 argumentos
	    } elseif(count($arguments) == 9) {
	      $this->{$method_name.'1'}($arguments[0], $arguments[1], $arguments[2], $arguments[3], $arguments[4], $arguments[5],
		  $arguments[6], $arguments[7], $arguments[8]);
 
	      //metodo con 10 argumentos
	    } elseif(count($arguments) == 10) {
	      $this->{$method_name.'2'}($arguments[0], $arguments[1], $arguments[2], $arguments[3], $arguments[4], $arguments[5],
		  $arguments[6], $arguments[7], $arguments[8], $arguments[9]);
 
	    } else {
	      return false;
		}
	}
	
	public function insertarArticulo1($nombre, $cantidad, $descripcion, $categoria, $autor, $anno, $foto, $precio, $descuento){
		$datos = array ( 'nombre' => $nombre,
						 'cantidad' => $cantidad,
						 'descripcion' => $descripcion,
						 'categoria' => $categoria,
						 'autor' => $autor,
						 'anno' => $anno,
						 'foto' => $foto,
						 'precio' => $precio,
						 'descuento' => $descuento);
						 
		$db = $this->conectar();
		$collection = $db->articulo;
		$cursor = $collection->insert($datos);
		$this->cerrar();
		
		unset($datos);
		unset($db);
		unset($collection);
		unset($cursor);
	}
									 
	public function insertarArticulo2($nombre, $cantidad, $descripcion, $categoria, $autor, $anno, $foto, $precio, $descuento,
									 $valoraciones){
									 	
		$datos = array ( 'nombre' => $nombre,
						 'cantidad' => $cantidad,
						 'descripcion' => $descripcion,
						 'categoria' => $categoria,
						 'autor' => $autor,
						 'anno' => $anno,
						 'foto' => $foto,
						 'precio' => $precio,
						 'descuento' => $descuento,
						 'valoraciones' => $valoraciones
						 );
						 
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
	
	public function conseguirUsuario($nombre, $password){
		$datos = array( 'nombre' => $nombre, 'password' => $password );
		$db = $this->conectar();
        $collection = $db->usuario;
        $cursor = $collection->find($datos);
		$this->cerrar();
		
		unset($datos);
		unset($consulta);
		unset($db);
		
		return $cursor;
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
						'salt ' => $random_salt );					
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
		$datos = array( 'correo' => $correo,
						'contrasena' => $password, 
						'nombre' => $nombre,
						'apellidos' => $apellidos, 
						'edad' => $edad, 
						'domicilio' => $domicilio, 
						'datosBancarios' => $datosBancarios, 
						'salt ' => $random_salt );					
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
      	$conexiones = $this->conexion->getConnections();	
		foreach ( $conexiones as $con ){
		    // Iterar sobre todas las conexiones, y cuando el tipo es "SECONDARY" cerramos la conexión
		    if ( $con['connection']['connection_type_desc'] == "SECONDARY" ){
		        $cerrada = $a->close( $con['hash'] );
		    }
		}
    }
	
	public function limpia_sql($texto){
		$textoAux = "";
		//echo $texto."0";
		if (get_magic_quotes_gpc()){
			$texto = stripslashes($texto);//quita /
		}	
		if (!is_numeric($texto)){
			return mysql_real_escape_string($texto);
		}
		else	
			return $texto;
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
	
	public function consultaAzarDiscosInicio(){
		
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
	
	public function conseguirDatosUsuario($correo, $pass, $salt){
		
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