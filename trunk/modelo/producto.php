<?php
class Producto {
	
   		private $id_prod;//id
   		private $cat_prod;//tipo
   		private $cantidad_prod; // cantidad
   		private $precio_prod;//precio
		private $nombre_prod;//nombre
		private $foto_prod;//foto
		private $descri_prod;//descripcion
		private $anio_prod;//año de disco
		private $valoracion_prod;// valoracion del disco
		private $autor_prod; // autor
		
		public function setProducto($foto_prod1, $id_prod1, $categoria1, $nombre_prod1, 
									$descri_prod1, $precio_prod1, $anio_prod1, $valoracion_prod1, 
									$cantidad_prod1, $autor_prod1)
		{
			$this->descri_prod=$descri_prod1;
			$this->id_prod=$id_prod1;
			$this->cat_prod=$categoria1;
			$this->precio_prod=$precio_prod1;
			$this->nombre_prod=$nombre_prod1;
			$this->foto_prod=$foto_prod1;
			$this->anio_prod=$anio_prod1;
			$this->valoracion_prod= $valoracion_prod1;
			$this->cantidad_prod= $cantidad_prod1;
			$this->autor_prod = $autor_prod1;
		}
	
		public function getfoto_prod()
		{
			return $this->foto_prod;
			
		}
		public function getid_prod()
		{
			return $this->id_prod;
			
		}
		public function getcat_prod()
		{
			return $this->cat_prod;
			
		}
		public function getnombre_prod()
		{
			return $this->nombre_prod;
			
		}
		public function getdescri_prod()
		{
			return $this->descri_prod;
			
		}
		public function getprecio_prod()
		{
			return $this->precio_prod;
			
		}
		public function getanio_prod()
		{
			return $this->anio_prod;
			
		}
		public function getvaloracion_prod()
		{
			return $this->valoracion_prod;
			
		}
		public function getcantidad_prod()
		{
			return $this->cantidad_prod;
			
		}
}

?>