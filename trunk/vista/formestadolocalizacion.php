<?php 
	$campo = $_GET['campo'];
	
	if($campo == 'estado'){
		
?>
	<form form style="text-align: center" name="register" action="controlador/repartidor/modificarestadopedido.php" 
		method="POST" accept-charset="utf-8">
		<fieldset>
			<label>Introduce el estado del pedido</label>
			<input type="text" maxlength="20" name="estado" required=""></input>
			<input class="button button_large type" name="enviar" type="submit" value="Modificar"></input>
		</fieldset>
	</form>

<?php 
	}else {
		//print("localizacion");
		
?>
	<form form style="text-align: center" name="register" action="controlador/repartidor/modificarlocalizacionpedido.php" 
		method="POST" accept-charset="utf-8">
		<fieldset>
			<label>Introduce la localización del pedido</label>
			<input type="text" maxlength="50" name="localizacion" required=""></input>
			<input class="button button_large type" name="enviar" type="submit" value="Modificar"></input>
		</fieldset>
	</form>
	
<?php
	}
?>