<?php
	require_once '../controlador/opbasededatosMongoDB.php';

	ini_set("display_errores", "stdout");
	error_reporting(E_ALL | E_STRICT);
	
	$accion = $_GET['accion'];
		
?>

<?php if ($accion == 0) { ?>

<script>
	function verInfoPedido() {
		var num=document.getElementById('id');
		//console.log(num.value);
		var idPedido = num.value;
		$('#zona_central').load('./vista/mostrarinfopedido.php?idPedido='+idPedido);
	}
</script>

<div>
	<label>Introduce el id del pedido</label>
	<input type="text" maxlength="20" id="id"  required=""></input>
	<button onclick="verInfoPedido()">Continuar</button>
</div>

<?php } else if ($accion == 1) { 
	
	

		$BDD = new Mysql();
		$resultado = $BDD->consultarPedidos();
	?>
	<table>
	  <tr>
	    <th>Id pedido</th>
	    <th>Precio</th>
	    <th>Localizacion</th>
	    <th>Estado</th>
	  </tr>
  <?php	
		
		while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
			
	?>
			<tr>
				<th><?php print $row['id_pedido']?></th>
				<th><?php print $row['precio']?>€</th>
				<th><?php print $row['localizacion_actual']?></th>
				<th><?php print $row['estado']?></th>
			</tr>

		
	<?php }//cierra el while ?>
	
	</table>
<?php }?>