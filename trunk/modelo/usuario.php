<?php
class Usuario {
	
   		private $correo;
   		private $nombre;
   		private $apellidos; 
   		private $domicilio;
		private $datos_bancarios;
		
		public function setUsuario($correo1, $nombre1, $apellidos1, $domicilio1, $datos_bancarios1)
		{
			$this->correo=$correo1;
			$this->nombre=$nombre1;
			$this->apellidos=$apellidos1;
			$this->domicilio=$domicilio1;
			$this->datos_bancarios=$datos_bancarios1;
		}
	
		public function getcorreo()
		{
			return $this->correo;
			
		}
		public function getnombre()
		{
			return $this->nombre;
			
		}
		public function getapellidos()
		{
			return $this->apellidos;
			
		}
		public function getdomicilio()
		{
			return $this->domicilio;
			
		}
		public function getdatos_bancarios()
		{
			return $this->datos_bancarios;
			
		}
}

?>