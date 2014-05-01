<?php
//include_once '../modelo/producto.php';
//include_once '../modelo/usuario.php';

class Mysql { // estaba puesto en minúsculas todo
  
    private $host="localhost";
    private $user="root";
    private $clave="";
    private $bd="giw_grupo7";
    private $conexion;  
    private $sql;

 
    public function conectar(){
        $this->conexion=mysqli_connect($this->host,$this->user,$this->clave);
        mysqli_select_db($this->conexion, $this->bd);
    }
		
	public function conseguirCategoria($idc){
		$consulta="select nombre_categoria from categoria where id_categoria like '$idc' ";
		$this->conectar();
        $resultado=mysqli_query($this->conexion, $consulta);
		$r=mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		$this->cerrar();
		unset($consulta);
		unset($resultado);
		return $r;
	}
	
	public function consultaDisco($idDisco){
		$consulta ="SELECT articulo.id_articulo, articulo.nombre AS nombre_disco, cantidad, nombre_categoria, articulo.id_categoria, anno, 
					foto, precio, autor.id_autor, autor.nombre AS nombre_autor, descuento
					FROM articulo, autor_articulo, autor, categoria
					WHERE autor_articulo.id_autor = autor.id_autor AND autor_articulo.id_articulo = articulo.id_articulo AND
				         articulo.id_articulo = '$idDisco' AND articulo.cantidad > 0";
		$this->conectar();
		$resultado=mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function consultaDiscoyOpiniones($idDisco){
		$consulta ="SELECT articulo.id_articulo, articulo.nombre AS nombre_disco, cantidad, articulo.id_categoria, nombre_categoria, anno, 
					avg(valoracion_articulo.nota) as valoracion, foto, precio, autor.id_autor, autor.nombre AS nombre_autor, descuento
					FROM articulo, autor_articulo, autor, valoracion_articulo, categoria
					WHERE (autor_articulo.id_autor = autor.id_autor AND autor_articulo.id_articulo = articulo.id_articulo AND
				         articulo.id_articulo = '$idDisco' AND articulo.cantidad > 0 AND valoracion_articulo.id_articulo = articulo.id_articulo AND
						 articulo.id_categoria = categoria.id_categoria)";
		$this->conectar();
		$resultado=mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
		
	//dada una categoria devuelve todos los elementos de ella 
	public function consultaArticulosCategoria($id_categoria){
		$consulta ="select * from articulo where id_categoria = '$id_categoria'";
		$this->conectar();
		$resultado=mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	//dada una categoria devuelve todos los elementos de ella 
	public function consultaArticulosCategoriaPorNombre($nombre_categoria){
		$consulta ="select * 
					from articulo as art, categoria as cat 
					where art.id_categoria = cat.id_categoria and 
						  cat.nombre_categoria LIKE '$nombre_categoria'";
		$this->conectar();
		$resultado=mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	

	public function insertarPedido($correo, $precio){
		$date = date("Y-m-d");
		$consulta = "insert into pedido (correo, precio, fecha) values  ('$correo', '$precio', '$date')";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);		
		$this->cerrar();
		unset($consulta);	
		return mysqli_insert_id($this->conexion);
	}
		
	public function insertarArticuloEnPedido($id_articulo, $id_pedido){
		$consulta = "insert into articulo_pedido (id_articulo, id_pedido) values 
		('$id_articulo', '$id_pedido')";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function conseguirArticulosDePedido($id_pedido){
		$consulta = "select * from articulo natural join articulo_pedido where id_pedido = '$id_pedido'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		//$r=mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		$this->cerrar();
		unset($consulta);
		//unset($resultado);
		return $resultado;
	}
	
	public function conseguirPedidos($correo){
		$consulta = "select distinct id_pedido, fecha, precio, estado, localizacion_actual
						from articulo_pedido natural join pedido where correo = '$correo'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		//$r=mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		$this->cerrar();
		unset($consulta);
		//unset($resultado);
		return $resultado;
	}
	
	public function conseguirNumeroPedidos($correo){
		$consulta = "select count(*) from pedido where correo = '$correo'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		//$r=mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		$this->cerrar();
		unset($consulta);
		//unset($resultado);
		$r = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		return $r['count(*)'];
	}
	
	
	/*
	 *	ELIGE UNA SERIE DE 5 DISCOS AL AZAR. 
	 */
	public function consultaAzarDiscosInicio(){
		$consulta ="select * from articulo order by RAND() limit 5";
		$this->conectar();
		$resultado=mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	

	public function consultaAzarDiscoCategoria($idCategoria){
		$consulta ="select * from articulo where id_categoria = '$idCategoria' order by RAND() limit 5";
		$this->conectar();
		$resultado=mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}

	/*
	 * Actualizar la cantidad del producto una vez tramitada la compra
	 * */
	 public function modificarProducto($idDisco){
	 	$consulta1 = "select cantidad from articulo where id_articulo = '$idDisco'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta1);
		$row = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		$cantidad = $row['cantidad'] - 1;
		$consulta2 = "update articulo set cantidad = '$cantidad' where id_articulo = $idDisco";
		$update = mysqli_query($this->conexion,$consulta2);
		unset($consulta1);
		unset($consulta2);
		unset($resultado);
		unset($row);
		unset($cantidad);
		$this->cerrar();
		return mysqli_affected_rows($this->conexion) > 0;
	 }
	
	public function insertarUsuario($correo, $contrasena, $nombre, $apellidos, $domicilio, $datosBancarios){
		$consulta = "insert into usuario (correo, contrasena, nombre, apellidos, domicilio, datosBancarios) values 
		('$correo', '$contrasena', '$nombre', '$apellidos', '$domicilio', '$datosBancarios')";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		/*$r=mysqli_fetch_array($resultado, MYSQLI_ASSOC);*/
		$this->cerrar();
		unset($consulta);
		/*unset($resultado);*/
		return $resultado;
	}
	
	public function insertarUsuarioRegistro($correo, $contrasena, $nombre, $apellidos, $edad, $domicilio, $datosBancarios){
		$consulta = "insert into usuario (correo, contrasena, nombre, apellidos, edad, domicilio, datosBancarios) values 
		('$correo', '$contrasena', '$nombre', '$apellidos', '$edad', '$domicilio', '$datosBancarios')";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		/*$r=mysqli_fetch_array($resultado, MYSQLI_ASSOC);*/
		$this->cerrar();
		unset($consulta);
		/*unset($resultado);*/
		return $resultado;
	}
	
	public function editarUsuario($correo, $nombre, $apellidos, $domicilio, $datosBancarios){
		$consulta = "update usuario SET nombre='$nombre', apellidos='$apellidos', 
		domicilio='$domicilio', datosBancarios='$datosBancarios' where correo = '$correo'";		
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return mysqli_affected_rows($this->conexion) > 0;
	}
	
	public function cambiarPasswordUsuario($correo, $antiguopass, $nuevopass){
		$consulta = "update usuario SET contrasena='$nuevopass' where correo = '$correo' AND contrasena = '$antiguopass'";		
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return mysqli_affected_rows($this->conexion) > 0;
	}
	
	public function conseguirDatosUsuario($correo, $pass){
		$consulta = "select * from usuario where correo = '$correo' AND contrasena = '$pass'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$r=mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		$this->cerrar();
		unset($consulta);
		unset($resultado);
		return $r;
	}
	
	//// ADMIN y REPARTIDOR
	
	public function conseguirDatosAdmin($correo, $pass){
		$consulta = "select * from administrador where email = '$correo' AND contrasena = '$pass'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$r=mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		$this->cerrar();
		unset($consulta);
		unset($resultado);
		return $r;
	}
	
	public function conseguirDatosRepartidor($correo, $pass){
		$consulta = "select * from repartidor where email = '$correo' AND contrasena = '$pass'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$r=mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		$this->cerrar();
		unset($consulta);
		unset($resultado);
		return $r;
	}
	
	public function modificarDisco($idDisco, $nombreDisco, $cantidad, $descripcion, $idCategoria, $annio, $valoracion, $ruta, $precio){
		$consulta = "UPDATE articulo SET nombre='$nombreDisco', cantidad='$cantidad', descripcion='$descripcion', id_categoria='$idCategoria',
					anno='$annio', valoracion='$valoracion', foto='$ruta', precio='$precio' WHERE id_articulo='$idDisco';";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$r=mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		$this->cerrar();
		unset($consulta);
		unset($resultado);
		return $r;
	}
	
	public function insertarDisco($nombreDisco, $cantidad, $descripcion, $idCategoria, $annio, $valoracion, $ruta, $precio){
		$consulta = "insert into articulo (nombre, cantidad, descripcion, Id_categoria, anno, valoracion, foto, precio) values 
		('$nombreDisco', '$cantidad', '$descripcion', '$idCategoria', '$annio', '$valoracion', '$ruta', '$precio')";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		/*$r=mysqli_fetch_array($resultado, MYSQLI_ASSOC);*/
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function eliminarDisco($idDisco){
		$consulta = "delete from articulo WHERE id_articulo = '$idDisco'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$r = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		$this->cerrar();
		unset($consulta);
		unset($resultado);
		return $r;
	}
	
	public function eliminarUsuario($correo){
		///////Conseguir el nombre de la base de datos//////////
		$consulta = "delete from usuario WHERE correo = '$correo'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$r = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		$this->cerrar();
		unset($consulta);
		unset($resultado);
		return $r;
	}
	
	public function eliminarPedido($idPedido){
		$consulta = "delete from pedido WHERE id_pedido = '$idPedido'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$r = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		$this->cerrar();
		unset($consulta);
		unset($resultado);
		return $r;
	}
	
	public function consultarDiscos(){
		$consulta = "select * from articulo";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;	
	}
	
	public function consultarUsuarios(){
		$consulta = "select * from usuario";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function consultarPedidos(){
		$consulta = "select * from pedido";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;	
	}
	
	////////// ESTADISTICAS
	
	public function filtrarPedidosPorFecha($inicio, $fin){
		$consulta = "select precio, fecha from pedido WHERE fecha >= '$inicio' AND fecha <= '$fin' ORDER BY fecha";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;	
	}
	
	////////// REPARTIDOR
	
	public function conseguirIdRepartidor($correo){
		$consulta = "select id_repartidor from repartidor wher email = '$correo";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		//$row=mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		$this->cerrar();
		unset($consulta);
		//unset($resultado);
		return $resultado;
	}
	
	public function conseguirPedidoAsociadoArepartidor($idRep, $idPedido){
		$consulta = "select distinct id_pedido, correo, precio, localizacion_actual, estado, fecha 
					 from articulo_pedido natural join pedido where id_repartidor = '$idRep' and id_pedido = '$idPedido'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$row=mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		$this->cerrar();
		unset($consulta);
		unset($resultado);
		return $row;
	}
	
	public function modificarEstadoPedido($idPedido, $estado){
		$consulta = "update pedido SET estado='$estado' where id_pedido = '$idPedido'";	
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return mysqli_affected_rows($this->conexion) > 0;
	}
	
	public function modificarLocalizacionPedido($idPedido, $localizcion){
		$consulta = "update pedido SET localizacion_actual='$localizcion' where id_pedido = '$idPedido'";	
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return mysqli_affected_rows($this->conexion) > 0;
	}
	
	public function busquedaNormal($keywords){
		$consulta ="select * from articulo where nombre like '%$keywords%'";
		$this->conectar();
		$resultado=mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function busquedaPorValoracion($keywords){
		$consulta ="select * from articulo natural join valoracion_articulo where nota >= $keywords";
		$this->conectar();
		$resultado=mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function busquedaPorPrecioMinimo($keywords){
		$consulta ="SELECT * FROM articulo WHERE precio >= $keywords";
		$this->conectar();
		$resultado=mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function busquedaPorPrecioMaximo($keywords){
		$consulta ="select * from articulo where precio <= $keywords";
		$this->conectar();
		$resultado=mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
		
	}
	
	public function busquedaPorTipoDeMusica($keywords){
		$consulta = "select * from articulo natural join categoria where nombre_categoria like '%$keywords%'";
		$this->conectar();
		$resultado=mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function conseguirTopValorados(){
		$consulta = "select articulo.nombre, articulo.id_articulo, articulo.id_categoria
					from articulo, valoracion_articulo
					where articulo.id_articulo = valoracion_articulo.id_articulo
					order by valoracion_articulo.nota desc
					limit 0, 3";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;			
	}
	
	public function conseguirTopRebajas(){
		$consulta = "select * from articulo order by descuento desc limit 0, 3";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;			
	}	
	
	public function conseguirDiscoPorFechas($ini, $fin){
		$consulta = "select * from articulo where anno >= '$ini' and anno < '$fin'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;	
	}
	

   	public function opinionSobreDisco($correoUser, $idDisco){
   		$consulta = "select * from valoracion_articulo where correo ='$correoUser' and id_articulo='$idDisco'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$r=mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		$this->cerrar();
		unset($consulta);			
		unset($resultado);
   		return $r;
   	}
	
	public function aniadeOpinionUser($correo, $opinion, $nota, $idArticulo){
		$consulta = "insert into valoracion_articulo (correo, id_articulo, nota, opinion) values 
		('$correo', '$idArticulo', '$nota', '$opinion')";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function buscaOpiniones($idDisco){
		$consulta = "select * from valoracion_articulo where id_articulo = '$idDisco'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function discoconopiniones($idDisco){//si el disco tiene opiniones sobre el
		$consulta = "select * from valoracion_articulo where id_articulo = '$idDisco'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return mysqli_affected_rows($this->conexion) > 0;
	}
	
	public function aplicaDescuento($idDisco, $descuento){
		$consulta = "update articulo SET descuento='$descuento' where id_articulo = '$idDisco'";	
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return mysqli_affected_rows($this->conexion) > 0;
	}
	
	public function modificarEdad($correo, $edad){
		$consulta = "update usuario SET Edad='$edad' where correo = '$correo'";	
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return mysqli_affected_rows($this->conexion) > 0;
	}
   
    public function cerrar () {
        @mysql_close($this->conexion);
    }
}
?>