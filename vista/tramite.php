<?php 

	if (session_id() == ""){

		session_start();

	}

	

	if (isset($_SESSION['logueado'])){

		if (!isset($_SESSION['discos']) || count($_SESSION['discos']) == 0){

		 $_SESSION['error'] = "No hay discos en la cesta para comprar.";			

?>

		<script>location.reload();</script>

<?php

}

} else {

$_SESSION['error'] = "No has iniciado sesión.";
?>

		 <script>location.reload();</script>

<?php

}
?>

<!-- formulario de tramite -->

<div align="center">

	<!-- datos personales , tu cesta , direccion, pago, confirmacion -->

	<form name="tramitar" action="controlador/tramitar.php" method="POST" accept-charset="utf-8">

		

		<div>

			<p class="fuenteTitulo">Datos personales</p>

			<p class="fuenteSubtitulo">Nombre: <?php 

				if (isset($_SESSION['nombre'])){

					$nombre = $_SESSION['nombre']; 

				} else {

					$nombre = "Desconocido";					

				}

				echo $nombre

			?> </br>

			Apellidos: <?php 

				if (isset($_SESSION['apellidos'])){

					$apellidos = $_SESSION['apellidos']; 

				} else {

					$apellidos = "Desconocido";					

				}

				echo $apellidos

			?> </br>

			Correo: <?php 

				if (isset($_SESSION['correo'])){

					$correo = $_SESSION['correo']; 

				} else {

					$correo = "Desconocido";					

				}

				echo $correo

			?></p>

		</div>

		<div>

			<p class="fuenteTitulo">Tu cesta</p>

			<?php 

				if (isset($_SESSION['discos'])){
					$productos = $_SESSION['discos'];//consultar todos los items desde BD? o cookie? desde BD	

					$subTotal = 0;	 ?>						

					<p class="fuenteSubtitulo">

					<?php

					for ($i = 0, $len = count($productos); $i < $len; $i++) {

						echo $productos[$i][1];

						echo "</br>";

						$subTotal = $subTotal + $productos[$i][2];
						$total = $subTotal; // + $subTotal * 0.21;

					}
					?>	

					<?php

					} else {

					$total = 0;
					$subTotal = 0;

					}
			?></p>

		</div>

		<!--<div>

			<p class="fuenteTitulo">Direccion</p>

			

		</div>-->

		<div>

			<p class="fuenteTitulo">Datos de facturación</p>

			   <!--  <p class="fuenteSubtitulo">
			     	
				Subtotal: <?php echo "$subTotal"; ?>€ <br />
				 </p> -->
				 <p class="fuenteTitulo">
				Total: <?php echo $total ?>€ </br>
				 </p>		

				<?php

				if (isset($_SESSION['datosBancarios'])) {
					$banco = $_SESSION['datosBancarios'];
				} else {
					$banco = "Desconocido";
				}
				// echo $banco
			?> </p>
				<div id="registration_element_form">		   
<p class="fuenteSubtitulo">Datos Bancarios: </p>			
<input type="text" maxlength="100" name="datosbancarios" value="<?php echo $banco; ?>" placeholder="Datos Bancarios" required="">	      
				</div>		     
			 </br>			

		</div>

		<div>
			<button type="submit" value="Confirmacion">Realizar pago</button>
		</div>
	</form>

</div>



