<?php    
	require_once '../opbasededatos.php';
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		$BDD = new Mysql();
	    $inicio = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_GET['inicio']))));
		$final = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_GET['final']))));
		
		$result = $BDD->filtrarPedidosPorFecha($inicio, $final);
	?>
	<?php 
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	?>
		<?php echo $row['fecha'] . ':' . $row['precio'] . '.' ?>
	<?php 
		}
	}	
?>