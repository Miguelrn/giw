<?php
	class Filtros {
		
		// MOSTRAR.PHP
		
		public function filtraTitulo($value){
			// Lalala
			$count = str_word_count($value);
			if ($count != 1){ return false; }
			$length = strlen($value);
			if ($length < 4 || $length > 20){ return false; }
			$types = is_numeric($value);
			if ($types){ return false; }	
			$containsNumber = preg_match('/(.*)[0-9]+(.*)/', $myString);
			if ($containsNumber){ return false; }
			$value = str_replace("\"","",$value);
			return htmlspecialchars_decode(strip_tags(stripslashes(stripslashes($value))));
		}
		
		public function filtraIdentificadorDisco($value){
			// 5379e9ad52cf7da40f00002a
			/*$count = str_word_count($value);
			if ($count != 1){ return false; }
			$length = strlen($value);
			if ($length != 25){ return false; }*/
			//$containsNumber = preg_match('/(.*)[0-9]+(.*)/', $myString);
			//if (!$containsNumber){ return false; }
			$value = str_replace("\"","",$value);
			return htmlspecialchars_decode(strip_tags(stripslashes(stripslashes($value))));
		}
		
		public function filtraNombreUsuario($value){
			// Enrique
			$count = str_word_count($value);
			if ($count != 1){ return false; }
			$length = strlen($value);
			if ($length < 4 || $length > 20){ return false; }
			$types = is_numeric($value);
			if ($types){ return false; }	
			$containsNumber = preg_match('/(.*)[0-9]+(.*)/', $myString);
			if ($containsNumber){ return false; }
			$value = str_replace("\"","",$value);
			return htmlspecialchars_decode(strip_tags(stripslashes(stripslashes($value))));
		}
		
		
		
	}
?>