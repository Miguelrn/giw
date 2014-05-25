<?php
	class Filtros {
		
		// MOSTRAR.PHP
		
		public function filtraIdentificadorDisco($value){			
			
			// La longitud de la cadena debe ser 24
			$length = strlen($value);
			if ($length != 24){ return false; }
			
			// No pueden aparecer letras en mayúsculas.
			$contieneMayusculas = $this->contieneMayusculas($value);			
			if ($contieneMayusculas){ return false; }		
			
			// Debe tener números.
			$containsNumber = $this->contieneNumero($value);
			if (!$containsNumber){ return false; }
						
			// desinfectado
			$value = $this->desinfecta($value);
			
			// desinfectado final
			$value = $this->desinfectaComillas($value);
			
			return $value;
		}
		
		public function filtraNombreUsuario($value){
			
			// Sólo una palabra
			$count = str_word_count($value);
			if ($count != 1){ return false; }
			
			// La longitud de la palabra debe tener más de 3 caracteres y menos de 20.
			$length = strlen($value);
			if ($length <= 3 || $length > 20){ return false; }
			
			// No debe tener números.
			$containsNumber = $this->contieneNumero($value);
			if ($containsNumber){ return false; }
			
			// desinfectado
			$value = $this->desinfecta($value);
			
			// desinfectado final
			$value = $this->desinfectaComillas($value);
			
			return $value;
		}
		
		public function filtraTitulo($value){
						
			// Sólo una palabra
			$count = str_word_count($value);
			if ($count != 1){ return false; }
			
			// La longitud de la palabra debe tener más de 3 caracteres y menos de 20.
			$length = strlen($value);
			if ($length <= 3 || $length > 20){ return false; }
			
			// No deben aparecer números.
			$containsNumber = $this->contieneNumero($value);
			if ($containsNumber){ return false; }			
			
			// desinfectado
			$value = $this->desinfecta($value);
			
			// desinfectado final
			$value = $this->desinfectaComillas($value);
			
			return $value;
		}
		
		// REGISTRAR.PHP
		
		public function filtraNombrePersona($value){
			$value = $this->desinfecta($value);
			$value = filter_var($value, FILTER_SANITIZE_STRING);
			$count = str_word_count($value);
			if ($count != 1){ return false; }
			$length = strlen($value);
			if ($length <= 2 || $length >= 20){ return false; }
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
			if ($length <= 2 || $length >= 40){ return false; }
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
			if ($length <= 0 || $length > 2){ return false; }
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
			if ($length < 4){ return false; }	
			if (!ctype_alnum($value)) { return false; }	// caracteres alfanuméricos.
			return $value;
		}
		
		public function filtraDomicilio($value){
			$value = $this->desinfecta($value);
			$value = filter_var($value, FILTER_SANITIZE_STRING);
			
			$length = strlen($value);
			if ($length < 4 || $length > 200){ return false; }
			//if (!ctype_alnum($value)) { return false; }		
			
			return $value;
		}		
		
		// GENERALES
		
		public function contieneMayusculas($value){
			return preg_match('/[A-Z]/', $value) != 0;
		}
	
		public function contieneCaracteres($value, $car){
			return strcspn($value, $car) != strlen($value);
		}
		
		public function contieneNumero($value){
			// strcspn devuelve la cantidad de caracteres que hubo antes
			// de encontrarse con el primer caracter del primer string
			// que aparezca en el segundo string			
			return is_numeric($value) || (strcspn($value, '0123456789') != strlen($value));
		}
		
		public function desinfectaComillas($value){
			return str_replace("\"","",$value);
		}
		
		public function desinfectaSignos($value){			
			$value = str_replace(";", "", $value);
			$value = str_replace(".", "", $value);
			$value = str_replace("-", "", $value);
			$value = str_replace("_", "", $value);
			return $value;
		}
		
		public function desinfecta($value){
			$value = htmlspecialchars_decode(trim(strip_tags(stripslashes($value))));
			return $value;			
		}
		
		
	}
?>