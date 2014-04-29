<?php
	include_once '../controlador/opbasededatos.php';
	$idAccion = $_GET['idAccion'];
	
	if($idAccion == 0){//añadir disco

?>
<div>
	<form style="text-align: center" name="register" action="controlador/admin/aniadirdisco.php" method="POST" accept-charset="utf-8">
		<fieldset>
			<legend>Añadir Disco</legend>
			<input type="text" maxlength="20" name="nombre" placeholder="Nombre Disco" required=""></br>
			<input type="text" maxlength="20" name="cantidad" placeholder="Cantidad" required=""></br>
			<input type="text" maxlength="20" name="descripcion" placeholder="Descripción" required=""></br>
			<input type="text" maxlength="20" name="idCat" placeholder="Id Categoria" required=""></br>
			<input type="text" maxlength="20" name="anio" placeholder="Año" required=""></br>
			<input type="text" maxlength="20" name="valoracion" placeholder="Valoracion" required=""></br>
			<input type="text" maxlength="20" name="ruta" placeholder="Nombre imagen" required=""></br>
			<input type="text" maxlength="20" name="precio" placeholder="Precio" required=""></br>
			<input class="button button_large type" name="enviar" type="submit" value="Añadir">
		</fieldset>		
	</form>
</div>

<?php
	}else if($idAccion == 1){//borrar disco
?>

<div>
	<form style="text-align: center" name="register" action="controlador/admin/eliminardisco.php" method="POST" accept-charset="utf-8">
		<fieldset>
			<legend>Eliminar Disco</legend>
			<input type="text" maxlength="20" name="idDisco" placeholder="Id" required=""></br>
			<input class="button button_large type" name="enviar" type="submit" value="Eliminar">
		</fieldset>		
	</form>
</div>

<?php
	}else if($idAccion == 2){//modificar disco
?>

<div>
	<form style="text-align: center" name="register" action="controlador/admin/modificardisco.php" method="POST" accept-charset="utf-8">
		<fieldset>
			<legend>Modificar Disco</legend>
			<input type="text" maxlength="20" name="idDisco" placeholder="Id" required=""></br>
			<input type="text" maxlength="20" name="nombre" placeholder="Nombre Disco" required=""></br>
			<input type="text" maxlength="20" name="cantidad" placeholder="Cantidad" required=""></br>
			<input type="text" maxlength="20" name="descripcion" placeholder="Descripción" required=""></br>
			<input type="text" maxlength="20" name="idCat" placeholder="Id Categoria" required=""></br>
			<input type="text" maxlength="20" name="anio" placeholder="Año" required=""></br>
			<input type="text" maxlength="20" name="valoracion" placeholder="Valoracion" required=""></br>
			<input type="text" maxlength="20" name="ruta" placeholder="Nombre imagen" required=""></br>
			<input type="text" maxlength="20" name="precio" placeholder="Precio" required=""></br>
			<input class="button button_large type" name="enviar" type="submit" value="Modificar">
		</fieldset>		
	</form>
</div>

<?php
	}else if($idAccion == 3){//consultar disco
		
		$BDD = new Mysql();
		$resultado = $BDD->consultarDiscos();
	?>
	<table>
	  <tr>
	    <th>ID</th>
	    <th>Nombre</th>
	    <th>Cantidad</th>
	    <th>Categoría</th>
	    <th>Año</th>
	    <th>Valoración</th>
	    <th>Precio</th>
	  </tr>
  <?php	
		
		while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
			
	?>
			<tr>
				<th><?php print $row['id_articulo']?></th>
				<th><?php print $row['nombre']?></th>
				<th><?php print $row['cantidad']?></th>
				<th><?php print $row['id_categoria']?></th>
				<th><?php print $row['anno']?></th>
				<th><?php print $row['valoracion']?></th>
				<!--<tr><?php print $row['foto']?></tr>-->
				<th><?php print $row['precio']?>€</th>
			</tr>

		
	<?php }//cierra el while ?>
	
	</table>	

<?php
	}else if($idAccion == 4){//borrar usuario
?>

<div>
	<form style="text-align: center" name="register" action="controlador/admin/eliminarusuario.php" method="POST" accept-charset="utf-8">
		<fieldset>
			<legend>Eliminar Usuario</legend>
			<input type="text" maxlength="20" name="email" placeholder="Email" required=""></br>
			<input class="button button_large type" name="enviar" type="submit" value="Eliminar">
		</fieldset>		
	</form>
</div>

<?php
	}else if($idAccion == 5){//consultar usuario

		$BDD = new Mysql();
		$resultado = $BDD->consultarUsuarios();
	?>
	<table>
	  <tr>
	    <th>Correo</th>
	    <!--<th>Contraseña</th>-->
	    <th>Nombre</th>
	    <th>Apellidos</th>
	    <th>Domicilio</th>
	    <th>Datos Bancarios</th>
	  </tr>
  <?php	
		
		while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
			
	?>
			<tr>
				<th><?php print $row['correo']?></th>
				<!--<tr><?php print $row['contrasena']?></tr>-->
				<th><?php print $row['nombre']?></th>
				<th><?php print $row['apellidos']?></th>
				<th><?php print $row['domicilio']?></th>
				<th><?php print $row['datosBancarios']?></th>
			</tr>

		
	<?php }//cierra el while ?>
	
	</table>

<?php
	}else if($idAccion == 6){//borrar pedido
?>
<div>
	<form style="text-align: center" name="register" action="controlador/admin/eliminarpedido.php" method="POST" accept-charset="utf-8">
		<fieldset>
			<legend>Eliminar Pedido</legend>
			<input type="text" maxlength="20" name="idPedido" placeholder="Id pedido" required=""></br>
			<input class="button button_large type" name="enviar" type="submit" value="Eliminar">
		</fieldset>		
	</form>
</div>

<?php
	}else if($idAccion == 7){//consultar pedido


		$BDD = new Mysql();
		$resultado = $BDD->consultarPedidos();
	?>
	<table>
	  <tr>
	    <th>Correo</th>
	    <!--<th>Contraseña</th>-->
	    <th>Id pedido</th>
	    <th>Precio</th>
	    <th>Localizacion</th>
	    <th>Estado</th>
	  </tr>
  <?php	
		
		while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
			
	?>
			<tr>
				<th><?php print $row['correo']?></th>
				<!--<tr><?php print $row['contrasena']?></tr>-->
				<th><?php print $row['id_pedido']?></th>
				<th><?php print $row['precio']?>€</th>
				<th><?php print $row['localizacion_actual']?></th>
				<th><?php print $row['estado']?></th>
			</tr>

		
	<?php }//cierra el while ?>
	
	</table>

<?php
	}else if($idAccion == 8){//mostrar estadisticas
	
		include 'estadisticas.php';
	}
?>
		