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
	
	public function conseguirUsuario($nombre, $password){
		$busqueda = array( 'nombre' => $nombre, 'password' => $password );
		$db = $this->conectar();
        $collection = $db->usuario;
        $cursor = $collection->find($busqueda);
		$this->cerrar();
		unset($consulta);
		unset($db);
		return $cursor;
	}
	
	public function conseguirArticulo($nombre){
		$busqueda = array( 'nombre' => $nombre );
		$db = $this->conectar();
        $collection = $db->articulo;
        $cursor = $collection->find($busqueda);
		$this->cerrar();
		unset($consulta);
		unset($db);
		return $cursor;		
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
	
	public function consultaArticulosCategoriaPorNombre($nombre_categoria){
	
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
	
	public function conseguirTopValorados(){
		
	}
	
	public function conseguirTopRebajas(){
		
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