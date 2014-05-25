<?php
//isset($_SESSION['logueado']) &&
//echo isset($_SESSION['logueado']);
//echo isset($_SESSION['logueado']);

ini_set("display_errores", "stdout");
error_reporting(E_ALL | E_STRICT);
	
if (isset($_SESSION['logueado'])){	
	$usuarioLogueado = $_SESSION['logueado'];
} else {
	$usuarioLogueado = false;
}

?>

<script>
	var cargaEditarPerfil = function(){
		$('#zona_central_dir').load('vista/directorio.php?dirabs='+encodeURIComponent("Editar perfil"));		
		$("#zona_central").load("vista/editarperfil.php");
	}
</script>

<?php
if ($usuarioLogueado){	
?>		
	<div align="center">
		<table>	
			<tbody>			
				<tr>							
					<td colspan="2" align="right">
						<p style="line-height: 0px;" class="fuenteSubtitulo" align="right">Bienvenido <?php echo $_SESSION['nombre'] ?></p>							
					</td>			
				</tr>	
				<tr>
					<td align="right">
						<?php if ($_SESSION['tipoUsuario'] == 0){?>
						<button onclick="cargaEditarPerfil();">Editar Perfil</button>	
						<?php } ?>	
					</td>
					<td align="right">
						<form name="logout" action="./controlador/logout.php" method="get" accept-charset="utf-8">
							<input name="start_logout" class="button button_normal type" type="submit" value="Salir">
						</form>	
					</td>	
				</tr>
			</tbody>
		</table>		
	</div>
<?php
} else {
?>
<form id="login" action="./controlador/login.php" method="get" accept-charset="utf-8">
	<table>
		<tbody>
			<tr>
				<td>
				<input style="width: 120px;" maxlength="101" type="email" name="correo" placeholder="Correo" required="">
				</td>
				<td>
				<input style="width: 80px;" maxlength="80" type="password" name="pass" placeholder="Contraseña" required="">
				</td>
				<td>
				<input name="start_login" class="button button_normal type" type="submit" value="Entrar">
				</td>
			</tr>
		</tbody>
	</table>
</form>
<div>
	<table>
		<tbody>
			<tr>
				<td>
				<script>
					var registro = function() {
						$('#zona_central_dir').load('vista/directorio.php?dirabs='+encodeURIComponent("Registro"));	
						$('#zona_central').load('./vista/registro.php');
					}
				</script><a class="fuenteSubtitulo" href="#" onclick="registro()">Registrarme</a>
				<a class="fuenteSubtitulo"> | </a><a class="fuenteSubtitulo" href="#" onclick="olvidada()">¿Contraseña olvidada?</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?php
}
?>
