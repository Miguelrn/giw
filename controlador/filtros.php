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
		
		// REGISTRAR.PHP
		
		public function filtraNombrePersona($value){
			$value = $this->desinfecta($value);
			$value = filter_var($value, FILTER_SANITIZE_STRING);
			$count = str_word_count($value);
			if ($count != 1){ return false; }
			$length = strlen($value);
			if ($length < 3 || $length > 20){ return false; }
			$types = is_numeric($value);
			if ($types){ return false; }	
			$containsNumber = $this->contieneNumero($value);
			if ($containsNumber){ return false; }		
			$value = str_replace("\"","",$value);
			return $value;
		}
		
		public function filtraApellidosPersona($value){
			$value = $this->desinfecta($value);
			$value = filter_var($value, FILTER_SANITIZE_STRING);
			$count = str_word_count($value);
			if ($count != 1){ return false; }
			$length = strlen($value);
			if ($length < 3 || $length > 40){ return false; }
			$types = is_numeric($value);
			if ($types){ return false; }	
			$containsNumber = $this->contieneNumero($value);
			if ($containsNumber){ return false; }	
			$value = str_replace("\"","",$value);
			return $value;
		}
		
		public function filtraEdad($value){
			$value = $this->desinfecta($value);
			$value = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
			$count = str_word_count($value);
			if ($count != 0){ return false; }
			$length = strlen($value);
			if ($length == 0 || $length > 2){ return false; }
			$types = is_numeric($value);
			if (!$types){ return false; }	
			$containsNumber = $this->contieneNumero($value);
			if (!$containsNumber){ return false; }	
			$value = str_replace("\"","",$value);
			if ($value <= 3 || $value >= 130){ return false; }
			return $value;
		}
		
		public function filtraCorreo($value){
			$value = htmlspecialchars_decode(strip_tags(stripslashes($value)));
			$value = filter_var($value, FILTER_SANITIZE_EMAIL);
			$count = str_word_count($value);			
			if ($count != 3){ return false; } // a@a.a
			$containsArroba = $this->contieneArroba($value);
			if (!$containsArroba){ return false; }	
			$containsPunto = $this->contienePunto($value);
			if (!$containsPunto){ return false; }		
			$length = strlen($value);
			if ($length < 5 || $length > 100){ return false; }		
			return $value;
		}
		
		public function filtraPassword($value){
			//$value = $this->desinfecta($value);
			$value = filter_var($value, FILTER_SANITIZE_STRING);			
			$length = strlen($value);
			if ($length < 3 || $length > 14){ return false; }			
			return $value;
		}
		
		public function filtraDomicilio($value){
			$value = $this->desinfecta($value);
			$value = filter_var($value, FILTER_SANITIZE_STRING);
			
			$length = strlen($value);
			if ($length < 10 || $length > 200){ return false; }
			
			return $value;
		}
		
		
		// GENERALES
		
		public function contieneArroba($value){
			return strcspn($value, '@') != strlen($value);
		}
		
		public function contienePunto($value){
			return strcspn($value, '.') != strlen($value);
		}
		
		public function contieneNumero($value){
			return strcspn($value, '0123456789') != strlen($value);
		}
		
		public function desinfecta($value){
			$value = str_replace(";", "", $value);
			$value = str_replace(".", "", $value);
			$value = str_replace("-", "", $value);
			$value = str_replace("_", "", $value);
			$value = htmlspecialchars_decode(trim(strip_tags(stripslashes($value))));
			// echo "Desinfectado: " . $value;
			return $value;			
		}
		
		
	}
?>