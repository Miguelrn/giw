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
			
			$value = filter_var($value, FILTER_SANITIZE_STRING);	
			
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
			
			$value = filter_var($value, FILTER_SANITIZE_STRING);	
			
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
			
			$value = filter_var($value, FILTER_SANITIZE_STRING);	
			
			return $value;
		}
		
		/**
		 * Ejemplo: 
		 * http://localhost/tienda/mostrar.php?ident=537de7d783a7942c08000001&name=lalaa&title=jejejejej
		 */
				
		// REGISTRAR.PHP
		
		public function filtraNombrePersona($value){			
			
			// Sólo debe contener una palabra.
			$count = str_word_count($value);
			if ($count != 1){ return false; }
			
			// No debe tener números.
			$containsNumber = $this->contieneNumero($value);
			if ($containsNumber){ return false; }			
			
			// La longitud de la cadena debe ser menor que 20 y mayor que 2.
			$length = strlen($value);
			if ($length <= 2 || $length > 20){ return false; }
			
			// desinfectado
			$value = $this->desinfecta($value);
			
			// desinfectado final
			$value = $this->desinfectaComillas($value);			
			
			$value = filter_var($value, FILTER_SANITIZE_STRING);	
			
			return $value;
		}
		
		public function filtraApellidosPersona($value){
			
			// Sólo debe contener como mucho dos palabras.
			$count = str_word_count($value);
			if ($count > 2){ return false; }
			
			// No debe tener números.
			$containsNumber = $this->contieneNumero($value);
			if ($containsNumber){ return false; }			
			
			// La longitud de la cadena debe ser menor que 40 y mayor que 2.
			$length = strlen($value);
			if ($length <= 2 || $length > 40){ return false; }
			
			// desinfectado
			$value = $this->desinfecta($value);
			
			// desinfectado final
			$value = $this->desinfectaComillas($value);		
			
			$value = filter_var($value, FILTER_SANITIZE_STRING);	
			
			return $value;
		}
		
		public function filtraEdad($value){
						
			// Sólo debe ser un número.		
			if (!is_numeric($value)){ return false; }			
			
			// La longitud de la cadena debe ser menor que 3 y mayor que 0.
			$length = strlen($value);
			if ($length <= 0 || $length > 3){ return false; }
			
			// El valor numérico debe ser mayor que 3 y menor que 130.
			if ($value <= 3 || $value >= 130){ return false; }
			
			// desinfectado
			$value = $this->desinfecta($value);
			
			// desinfectado final
			$value = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
			
			return $value;
		}
		
		public function filtraCorreo($value){
						
			// Sólo debe contener tres palabras (pal1@pal2.pal3).
			$count = str_word_count($value);
			if ($count != 3){ return false; }
			
			// Debe contener un arroba y un punto.
			$cArroba = $this->contieneCaracter($value, '@');
			$cPunto = $this->contieneCaracter($value, '.');
			if (!$cArroba || !$cPunto){ return false; }
			
			// La longitud de la cadena debe estar entre 5 y 100.
			$length = strlen($value);
			if ($length < 5 || $length > 100){ return false; }
			
			// desinfectado
			$value = $this->desinfecta($value);
			
			// desinfectado final
			$value = $this->desinfectaComillas($value);	
			$value = filter_var($value, FILTER_SANITIZE_EMAIL);
			
			return $value;
		}
		
		public function filtraPassword($value){
			
			// Sólo puede contener dígitos y letras.
			if (!ctype_alnum($value)) { return false; }	// caracteres alfanuméricos.			
			
			// La longitud mínima es de 4 caracteres. Longitud máxima 80.
			$length = strlen($value);
			if ($length < 5 || $length > 100){ return false; }
			
			// desinfectado
			$value = $this->desinfecta($value);
			
			// desinfectado final	
			$value = filter_var($value, FILTER_SANITIZE_STRING);	
			
			return $value;
		}
		
		public function filtraDomicilio($value){					
			
			// No debe ser de longitud superior a 200 caracteres. 
			// Tampoco puede ser inferior a 4 caracteres.
			$length = strlen($value);
			if ($length < 4 || $length > 200){ return false; }		
			
			// desinfectado
			$value = $this->desinfecta($value);
			
			// desinfectado final
			$value = filter_var($value, FILTER_SANITIZE_STRING);
			
			return $value;
		}		
		
		// GENERALES
		
		public function contieneMayusculas($value){
			return preg_match('/[A-Z]/', $value) != 0;
		}
	
		public function contieneCaracter($value, $car){
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