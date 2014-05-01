<?php
require_once 'opbasededatos.php';
ini_set("display_errores", "stdout");
error_reporting(E_ALL | E_STRICT);

$categoria = $_GET['categoria'];
$artista = $_GET['artista'];
$valPrecio = $_GET['valPrecio'];
$valNota = $_GET['valNota'];

if ($valPrecio == 1) {
	echo '<h1>0 y 10</h1>';
} else if ($valPrecio == 2) {
	echo '<h1>10 y 20</h1>';
} else if ($valPrecio == 3) {
	echo '<h1>20 y 30</h1>';
}else{
	echo '<h1>Ninguno</h1>';
};

?>

<script>
	console.log("procesar busqueda avanzada");
</script>