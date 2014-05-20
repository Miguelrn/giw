<?php
	class Filtros {
		
		// MOSTRAR.PHP
		
		public function filtraNombreDisco($value){
			$count = str_word_count($value);
			if ($count != 1){ return false; }
			$length  = strlen($value);
			if ($length < 4 || $length > 15){ return false; }
			
		}
		
		public function filtraIdentificadorDisco($value){
			
			
		}
		
		public function filtraNombreUsuario($value){
		
			
		}
		
		
		
	}
?>