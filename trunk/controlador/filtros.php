<?php
	class Filtros {
		
		// MOSTRAR.PHP
		
		public function filtraTitulo($value){
			// Lalala
			$value = $this->desinfecta($value);
			$count = str_word_count($value);
			if ($count != 1){ return false; }
			$length = strlen($value);
			if ($length < 4 || $length > 20){ return false; }
			$types = is_numeric($value);
			if ($types){ return false; }	
			$containsNumber = $this->contieneNumero($value);
			if ($containsNumber){ return false; }
			$value = str_replace("\"","",$value);
			return $value;
		}
		
		public function filtraIdentificadorDisco($value){
			// 5379e9ad52cf7da40f00002a
			$value = $this->desinfecta($value);
			$length = strlen($value);
			if ($length != 26){ return false; }
			$containsNumber = $this->contieneNumero($value);
			if (!$containsNumber){ return false; }
			$value = str_replace("\"","",$value);
			return $value;
		}
		
		public function filtraNombreUsuario($value){
			// Enrique
			$value = $this->desinfecta($value);
			$count = str_word_count($value);
			if ($count != 1){ return false; }
			$length = strlen($value);
			if ($length < 4 || $length > 20){ return false; }
			$types = is_numeric($value);
			if ($types){ return false; }	
			$containsNumber = $this->contieneNumero($value);
			if ($containsNumber){ return false; }
			$value = str_replace("\"","",$value);
			return $value;
		}
		
		public function contieneNumero($value){
			return strcspn($value, '0123456789') != strlen($value);
		}
		
		public function desinfecta($value){
			$value = str_replace(";", "", $value);
			$value = str_replace(".", "", $value);
			$value = str_replace("-", "", $value);
			$value = str_replace("_", "", $value);
			$value = htmlspecialchars_decode(strip_tags(stripslashes($value)));
			// echo "Desinfectado: " . $value;
			return $value;			
		}
		
		
	}
?>