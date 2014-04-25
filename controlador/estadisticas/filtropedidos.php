<?php    
	include_once '../opbasededatos.php';

    $inicio = $_GET['inicio'];
	$final = $_GET['final'];
	
	$bbd = new Mysql();
	$result = $bbd->filtrarPedidosPorFecha($inicio, $final);
?>
<?php 
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
?>
	<?php echo $row['fecha'] . ':' . $row['precio'] . '.' ?>
<?php 
	}
?>