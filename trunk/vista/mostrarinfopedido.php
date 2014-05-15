<?php
	require_once '../controlador/opbasededatosMongoDB.php';
	if (session_id() == "") {
		@session_start();
	}
	
	ini_set("display_errores", "stdout");
	error_reporting(E_ALL | E_STRICT);
	
	
	$correoRepartidor = $_SESSION['correo'];
	$idPedido = $_GET['idPedido'];
	$_SESSION['pedidoMod'] = $idPedido;
	$BDD = new Mysql();
	if(!isset($_SESSION['idRepartidor'])){
		
		$row = $BDD->conseguirIdRepartidor($correoRepartidor);
		$idRepartidor = $row['id_repartidor'];
		$_SESSION['idRepartidor'] = $idRepartidor;
	}else{
		//$idRepartidor = $_SESSION['idRepartidor'];
	}
	$row = $BDD->conseguirPedidoAsociadoArepartidor($idRepartidor, $idPedido);
	//mostrar mensaje confirmacion¿?
	//header('Location: ../../index.php');
	
	//if(isset($row['idPedido'])){
?>
		<script>
			function modificar(campo){
				$('#zona_central').load('./vista/formestadolocalizacion.php?campo='+campo);
			}
		</script>
		<div>
			<table>
				<!--<caption>PEDIDO <?php $idPedido?></caption>-->
				<tr>
					<th>ID</th>
					<th>CORREO</th>
					<th>PRECIO</th>
					<th>LOCALIZACIÓN ACTUAL</th>
					<th>ESTADO</th>
					<th>FECHA</th>
				</tr>
				<tr>
					<th><?php echo $row['id_pedido']?></th>
					<th><?php echo $row['correo']?></th>
					<th><?php echo $row['precio']?></th>
					<th><?php echo $row['localizacion_actual']?></th>
					<th><?php echo $row['estado']?></th>
					<th><?php echo $row['fecha']?></th>
				</tr>
				<tr>
					<th></th>
					<th></th>
					<th></th>
					<th><button onclick="modificar('localizacion')">Modificar localización</button></th>
					<th><button onclick="modificar('estado')">Modificar estado</button></th>
					<th></th>
				</tr>
			</table>
		</div>
<?php 
	//}
?>